

drop function recherche(ville_dep varchar, ville_arr varchar, nbp integer);

create or replace function recherche(ville_dep varchar, ville_arr varchar, nbp integer) returns table(v_dep varchar, v_arr varchar, 
	parcours_id varchar, v_h_dep integer, v_h_arr integer, v_corresp integer, v_dist integer, v_tarif integer, v_nbp integer) as $$
	
	begin
		
		return query with RECURSIVE parcours(v_dep, v_arr, parcours_id, v_h_dep, v_h_arr, v_corresp, v_dist, v_tarif, v_nbp)
		as
		   (select ville_dep, jabaianb.trajet.arrivee, cast(jabaianb.voyage.id as varchar), jabaianb.voyage.heuredepart, 
		   	jabaianb.voyage.heuredepart+(jabaianb.trajet.distance/60), 0, jabaianb.trajet.distance, jabaianb.voyage.tarif, 
		   	jabaianb.voyage.nbplace
		    from jabaianb.voyage 
		    	join jabaianb.trajet on jabaianb.trajet.id = jabaianb.voyage.trajet
		    where  jabaianb.trajet.depart = ville_dep and jabaianb.voyage.heuredepart+(jabaianb.trajet.distance/60) <= 24 and 
		    jabaianb.trajet.distance <= 1440 and nbp <= jabaianb.voyage.nbplace 
		    union all
		    select dep.v_dep || ' ' || arr.depart, arr.arrivee, dep.parcours_id || ' ' || jabaianb.voyage.id, jabaianb.voyage.heuredepart, 
		    jabaianb.voyage.heuredepart+(arr.distance/60), dep.v_corresp+1, dep.v_dist+arr.distance, dep.v_tarif+jabaianb.voyage.tarif,
		    jabaianb.voyage.nbplace
		    from jabaianb.trajet as arr
		    	join jabaianb.voyage on arr.id = jabaianb.voyage.trajet
		    	join parcours as dep on arr.depart = dep.v_arr 
		    where dep.v_dep not like '%' || arr.arrivee || '%' and jabaianb.voyage.heuredepart > dep.v_h_arr and  dep.v_h_dep <> 0 
		    and jabaianb.voyage.heuredepart+(arr.distance/60) <= 24 and dep.v_dist <= 1440 and nbp <= jabaianb.voyage.nbplace)

		select* from parcours where parcours.v_arr = ville_arr; 
		
	end;
$$ language plpgsql;

select* from recherche('Paris', 'Nice', 1);