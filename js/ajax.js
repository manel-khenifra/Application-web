$(document).ready(function(){
    $('#formuR').submit(function(event){

        event.preventDefault();

        var depart = $("#depart").val();
        var arrivee = $("#arrivee").val();
        var nbPlace = $("#nbPlace").val();

        $.ajax({ //l'objet ajax qui fait appel au dispatcher ajax

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'afficherVoyages',
                    'depart1': depart,
                    'arrivee1': arrivee,
                    'nbPlace1': nbPlace
            },

            timeout: 4000,

            success: function (data) {
                $('#msg').html(data);
            },
          
            error: function() {
                $('#msg').html("Erreur!");
            },

            complete : function(data){
                $('#notif_r').html("Recherche terminée");
            }

        });

    });

    $('#accueil').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'index'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });

    $('#voyage').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'recherche'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });

    $('#pageInscription').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'inscription'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });

    $('#formuI').submit(function(event){

        event.preventDefault();

        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var pseudo = $("#pseudo").val();
        var mdp = $("#mdp").val();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'inscription',
                    'nom1': nom,
                    'prenom1': prenom,
                    'pseudo1': pseudo,
                    'mdp1': mdp
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });

    $('#pageConnexion').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'connexion'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });

    $('#formuC').submit(function(event){

        event.preventDefault();

        var pseudo = $("#pseudo").val();
        var mdp = $("#mdp").val();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'profil',
                    'pseudo1': pseudo,
                    'mdp1': mdp
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            },

            complete : function(data){

                $('#pageConnexion').hide();
                $('#menu_profil').empty();
                $('#menu_profil').append('<a id="pageProfil" class="text-info" href="#"><span class="glyphicon glyphicon-user"></span> Profil</a>')
                $('#menu_deco').empty();
                $('#menu_deco').append('<a id="pageDeco" class="text-info" href="#"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a>');             
            }

        });

    });

    $('#pageDeco').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'deconnexion'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            },

            complete : function(data){
                
                $('#menu_profil').empty();
                $('#menu_deco').empty();
                $('#pageConnexion').show();
            }

        });

    });

    $('#pageProfil').click(function(event){

        event.preventDefault();

        $.ajax({

            url: 'ajax.php',

            type: 'POST',

            data: {
                    'action': 'profil'
            },

            timeout: 4000,

            success: function (data) {
                $('#page_maincontent').html(data);
            },
          
            error: function() {
                $('#page_maincontent').html("Erreur!");
            }

        });

    });
    
});