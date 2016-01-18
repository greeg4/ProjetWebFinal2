
$(document).ready(function () {

    $('#submit_search_td').remove();

    $('#choix_liste_deroulante').change(function () {
        // trouver le nom de l'attribut
        var attribut = $(this).attr('name');
        //récupérer la valeur du select 
        var val = $(this).val();
        //construire la chaîne d'url
        var refresh = 'index.php?' + attribut + '=' + val;
        //alert(refresh);
        window.location.href = refresh;
    });

    //VERIF FORMULAIRE AVEC REGEX 
    //www.sitepoint.com/jquery-basic-regex-selector-examples/ 
    $('input#nom_client').blur(function () {
        var regex = new RegExp(/[0-9\?!\.,;]/);
        var ch = $(this).val();
        if (regex.test(ch)) {
            $('input#nom_client').val('');
            $('div#error').css({
                'color': 'red',
                'font-size': '70%',
                'font-weight': 'bold'
            }),
                    $('div#error').html("Que des lettres. Merci."),
                    $('input#nom_client').focus(function () {
                $('div#error').fadeOut();
            })
        }
    });

    //ENVOI DU FORMULAIRE CONTACT PAR AJAX

    $('input#submit_reserv').on('click', function (event) {

        event.preventDefault();// ou return false à la fin
        var type;
        var nom_client = $('input#nom_client').val();
        var pren_client = $('input#pren_client').val();
        var comm_client = document.getElementById('comm_client').value;
        var email = $('input#email').val();
        if ($('input#Homme').is(':checked')) {
            type = 0;
        }
        if ($('input#Femme').is(':checked')) {
            type = 1;
        }

        if ((type == 1 || type == 0) && $.trim(nom_client) != '' && $.trim(pren_client) != '' && $.trim(comm_client) != '' && $.trim(email) != '') {
            var data_form = $('form#form_contact').serialize();
            //alert(data_form);
            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", 
                url: '../admin/lib/php/ajax/AjaxContact_submit.php',

                success: function (data) { 
                    //effacer les valeurs
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);

                    if (data.retour == 1) {  
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Demande enregistrée.");
                    }
                    else if (data.retour == 2) {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Déjà présent dans la BD");
                    }
                    else {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //callback en cas d'échec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        } //fin if
        //si champs manquants
        else {
            $('section#resultat').css({
                'color': 'red',
                'font-weight': 'bold'
            }),
                    $('section#resultat').html("Complétez tout les champs. Merci.");

        }

    });

    //ENVOI DU AJOUT DVD PAR AJAX

    $('input#submit_dvd').on('click', function (event) {

        event.preventDefault();

        var Titre_dvd = $('input#Titre_dvd').val();
        var Prix_dvd = $('input#Prix_dvd').val();
        var Genre_dvd = $('input#Genre_dvd').val();
        var Realisateur_dvd = $('input#Realisateur_dvd').val();
        var Support_dvd = $('input#Support_dvd').val();

        if ($.trim(Titre_dvd) != '' && $.trim(Prix_dvd) != '' && $.trim(Genre_dvd) != '' && $.trim(Realisateur_dvd) != '' && $.trim(Support_dvd) != '') {
            var data_form = $('form#form_ajout_dvd').serialize();
            //alert(data_form);
            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", //type du retour des données par le php
                url: '../admin/lib/php/ajax/AjaxJeu_submit.php',
                //callback exécuté en cas de succès uniquement :
                success: function (data) {  
                    //effacer les valeurs
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);

                    if (data.retour == 1) {  
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Demande enregistrée.");
                    }
                    else if (data.retour == 2) {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Déjà présent dans la BD.");
                    }
                    else {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //callback en cas d'échec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        } //fin if
        //si champs manquants
        else {
            $('section#resultat').css({
                'color': 'red',
                'font-weight': 'bold'
            }),
                    $('section#resultat').html("Complétez tout les champs. Merci.");

        }

    });

    //ENVOI DU FORMULAIRE AJOUT REALISATEUR PAR AJAX

    $('input#submit_real').on('click', function (event) {

        event.preventDefault();// ou return false à la fin

        var Nom_real = $('input#Nom_real').val();
        var Pays_real = $('input#Pays_real').val();

        if ($.trim(Nom_real) != '' && $.trim(Pays_real) != '') {
            var data_form = $('form#form_ajout_real').serialize();

            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", 
                url: '../admin/lib/php/ajax/AjaxDev_submit.php',
                //callback exécuté en cas de succès uniquement :
                success: function (data) {  
                    //effacer les valeurs
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);

                    if (data.retour == 1) {  
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Demande enregistrée");
                    }
                    else if (data.retour == 2) {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Déjà présent dans la BD");
                    }
                    else {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //callback en cas d'échec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        } //fin if
        //si champs manquants
        else {
            $('section#resultat').css({
                'color': 'red',
                'font-weight': 'bold'
            }),
                    $('section#resultat').html("Complétez tout les champs. Merci.");

        }

    });


    //ENVOI DU FORMULAIRE CREATION DE CPTE PAR AJAX

    $('input#submit_ccompte').on('click', function (event) {

        event.preventDefault();// ou return false à la fin
        var nom_cc = $('input#nom_cc').val();
        var pren_cc = $('input#pren_cc').val();
        var adresse_cc = $('input#adresse_cc').val();
        var ville_cc = $('input#ville_cc').val();
        var cp_cc = $('input#cp_cc').val();
        var pays_cc = $('input#pays_cc').val();
        var num_cc = $('input#num_cc').val();


        if ($.trim(nom_cc) != '' && $.trim(pren_cc) != '' && $.trim(adresse_cc) != '' && $.trim(ville_cc) != '' && $.trim(cp_cc) != '' && $.trim(pays_cc) != '' && $.trim(num_cc) != '') {
            var data_form = $('form#form_ccompte').serialize();
            //alert(data_form);
            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", 
                url: '../admin/lib/php/ajax/AjaxCCompte_submit.php',
                //callback exécuté en cas de succès uniquement :
                success: function (data) { 
                    //effacer les valeurs
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);

                    if (data.retour >= 0) {  
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Demande enregistrée ! Votre identifiant est :" + data.retour + " ! ");
                    }
                    else if (data.retour == -1) {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Déjà présent dans la DB");
                    }
                    else {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //callback en cas d'échec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        } //fin if
        //si champs manquants
        else {
            $('section#resultat').css({
                'color': 'red',
                'font-weight': 'bold'
            }),
                    $('section#resultat').html("Complétez tout les champs. Merci.");

        }

    });

    //ENVOI DU FORMULAIRE DE COMMANDE PAR AJAX

    $('input#submitcatalogue').on('click', function (event) {

        event.preventDefault();// ou return false à la fin
        var Id_client = $('input#id_client').val();

        if ($.trim(Id_client) != '') {
            var data_form = $('form#formachat').serialize();
            
            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", 
                url: '../admin/lib/php/ajax/AjaxCat_submit.php',
                //callback exécuté en cas de succès uniquement :
                success: function (data) { p 
                    //effacer les valeurs
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);

                    if (data.retour == 1) {  
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Demande enregistrée");
                    }
                    else if (data.retour == 2) {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Mauvais identifiant!");
                    }
                    else {
                        $('section#resultat').css({
                            'color': 'red',
                            'font-weight': 'bold'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //callback en cas d'échec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        } //fin if
        //si champs manquants
        else {
            $('section#resultat').css({
                'color': 'red',
                'font-weight': 'bold'
            }),
                    $('section#resultat').html("Remplissez tous les champs !");

        }

    });

    //CACHER CONSEIL

    $('#cacher').click(function () {
        $('#avertisst').toggle();
        if ($('#avertisst').is(':visible')) {
            $(this).val('Cacher le conseil');
        }
        else {
            $(this).val('Afficher le conseil');
        }
    });

    //n'affiche pas quand java est déjà actif
    $('#no-js').remove();

    //vérifier les champs du formulaire
    $('#form_reservation').on('submit', function (event) { 
        $('[type=text]').each(function () {

            if (!$(this).val().length) {
                event.preventDefault();
                $(this).css('border', 'px solid red');
            }
        });
    });

    $('#form_reservation').submit(function () {

    });
});