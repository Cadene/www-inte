

var compte = $("#mon_compte"),
    user_page = $("#_user_page"),
    user_menu = $("#_user_menu"),
    artist_page = $("#_artist_page"),
    artist_menu = $("#_artist_menu"),
    artist_new = $("#_artist_new"),
    artist_info = $("#_artist_info"),
    rediger = compte.find("#_rediger"),
    messages = compte.find(" #_reception");



/***********************************************************************************************/
/* Functions Ajax
/***********************************************************************************************/
/*
function get_ville($letters) {
  // détection de la saisie dans le champ de recherche
  
    
    
 
    // on commence à traiter à partir du 2ème caractère saisie
    if( $field.val().length > 1 )
    {
      // on envoie la valeur recherché en GET au fichier de traitement
      $.ajax({
    type : 'GET', // envoi des données en GET ou POST
    url : 'ajax-search.php' , // url du fichier de traitement
    data : 'q='+$(this).val() , // données à envoyer en  GET ou POST
    beforeSend : function() { // traitements JS à faire AVANT l'envoi
        $field.after('<img src="ajax-loader.gif" alt="loader" id="ajax-loader" />'); // ajout d'un loader pour signifier l'action
    },
    success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
        $('#ajax-loader').remove(); // on enleve le loader
        $('#results').html(data); // affichage des résultats dans le bloc
    }
      });
    }       
  });
});
}*/
/*
$('#ville').keyup( function(){
    $field = $(this);
    $('#results').html(''); // on vide les resultats
    $('#ajax-loader').remove(); // on retire le loader
}*/

var countries = [
    { value: 'Andorra', data: 'AD' },
    // ...
    { value: 'Zimbabwe', data: 'ZZ' }
];

$('#autocomplete-ajax').autocomplete({
    lookup: countries,
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
});


// id: user_id
function put_user_fields(id) {
    $.ajax({
        type: 'get',
        url: 'users/get/' + id + '.json',
        success: function(data) {

        	user = data.user.User;
            //console.log(data);
            //alert(data.user.User.id);
            user_page.find('input[name="nom"]').val(user.nom);
		    user_page.find('input[name="prenom"]').val(user.prenom);
		    user_page.find('input[name="date_naissance"]').val(user.birthday);
		    user_page.find('input[name="ville"]').val(data.user.Citie.name);
		    //inscription.find('input[name="adresse"]').val(user.adresse);
		    user_page.find('input[name="tel"]').val(user.tel);
		    user_page.find('input[name="email"]').val(user.email);
            //inscription.find('input[name="cb"]').val(data.user.cb);
            //$("#profile_img").attr("src", "img/profils/" + localStorage.user + ".jpg");
            //$("#title_user").html('<img alt="140x140" src="img/profils/' + localStorage.user + '.jpg" class="img-circle" width="50px" /> ' + data.user.prenom + ' ' + data.user.nom + ' ')
        }
    });
}

// id:artist_id
function put_artist_fields(id) {
	$.ajax({
        type: 'get',
        url: 'artists/get/' + id + '.json',
        success: function(data) {
        	console.log(data);
        	artist = data.artist.Artist;
            //console.log(data);
            //alert(data.user.User.id);
            artist_info.find('input[name="id"]').val(artist.id);
            artist_info.find('input[name="groupe"]').val(artist.groupe);
		    artist_info.find('input[name="genre"]').val(artist.genre);
		    artist_info.find("select[name='talent']").val(artist.talent);
		    //artist_info.find('textarea[name="presentation"]').val(artist.presentation);
            CKEDITOR.instances['editor'].setData(artist.presentation);
            artist_info.find('textarea[name="introduction"]').val(artist.introduction);
        }
    });
}

// id:user_id
function put_artists_names(id) {
    $.ajax({
        type: 'get',
        url: 'users/get/' + id + '.json',
        success: function(data) {

        	artists = data.user.Artist;

        	for (var i=0; i < artists.length; i++) {
        		artist = artists[i];
        		console.log(artist);
        		$('#create_artist').after('<br/><div id="artist_'+artist.id+'" name="'+artist.id+'" class="m-btn purple artist_button" >Cliquez pour modifier l\'artiste '+artist.groupe+'</div>');
        	}

        	console.log(data);
        }
    });
}

function create_artist(groupe, genre, talent, presentation, introduction, token, user_id) {
	r = confirm("Voulez vous continuer ?");
    if (r == true) {
        if (presentation == undefined) {
        	presentation = '';
        }
        if (introduction == undefined) {
            introduction = '';
        }
    	$.ajax({
	        type: 'get',
	        url: 'artists/create.json',
	        data: {
	        	groupe: groupe,
	        	genre: genre,
	        	talent: talent,
	        	presentation: presentation,
                introduction: introduction,
	        	token: token,
	        	user_id: user_id
	        },
	        success: function(data) {

	        	alert('L\'artiste est créé et un mail a été envoyé aux administrateurs qui vont le valider dans peu de temps !');
	            console.log(data);
	            $().interstitial('close');
	        }
	    });
    } else {
        return
    }
}

function maj_artist (artist_id, groupe, genre, talent, presentation, introduction, token, user_id) {
	r = confirm("Voulez vous continuer ?");
    if (r == true) {
        if (presentation == undefined) {
        	presentation = '';
        }
        if (introduction == undefined) {
            introduction = '';
        }
    	$.ajax({
	        type: 'get',
	        url: 'artists/maj/' + artist_id +'.json',
	        data: {
	        	groupe: groupe,
	        	genre: genre,
	        	talent: talent,
	        	presentation: presentation,
                introduction: introduction,
	        	token: token,
	        	user_id: user_id
	        },
	        success: function(data) {
	        	alert('Changement(s) effectué(s) avec succès :)');
	            console.log(data);
	        }
	    });
    } else {
        return
    }
}

// id : user_id
function maj_user (prenom, nom, email, password, token, user_id) {
	r = confirm("Voulez vous continuer ?");
    if (r == true) {
        $.ajax({
	        type: 'get',
	        url: 'users/maj/' + user_id + '.json',
	        data: {
	        	nom: nom,
	        	prenom: prenom,
	        	email: email,
	        	password: password,
	        	token: token
	        },
	        success: function(data) {
	            console.log(data);
	        	user = data.user;
	            user_page.find('input[name="nom"]').val(user.nom);
	            user_page.find('input[name="prenom"]').val(user.prenom);
	            user_page.find('input[name="email"]').val(user.email);
	            
	            alert('Changement(s) effectué(s) avec succès :)');

	            localStorage.nom = user.nom;
	            localStorage.prenom = user.prenom;
	            localStorage.email = user.email;

	            $("#myaccount").val(user.prenom + " " + user.nom);
	        }
	    });
    } else {
        return
    }
}

/***********************************************************************************************/
/* On click
/***********************************************************************************************/

function clean_page() {
	user_page.attr('class', 'tab-pane');
	artist_page.attr('class', 'tab-pane');
	artist_new.attr('class', 'tab-pane');
}


user_menu.click(function() {
	clean_page();
	user_page.attr('class', 'tab-pane active');
});

artist_menu.click(function() {
	clean_page();
	artist_page.attr('class', 'tab-pane active');
	put_artists_names(localStorage.user);
	$(".artist_button").remove();
});

// Move to maj artist
$(document).on('click', '.artist_button', function(ev) {
	id = $(this).attr('name');
	clean_page();
	artist_info.attr('class', 'tab-pane active');
	put_artist_fields(id);
});

// Move to page artist_new 
artist_page.find("#create_artist").click(function() {
	clean_page();
	artist_new.attr('class', 'tab-pane active');
	groupe = artist_new.find('input[name="create_groupe"]').val('')
    genre = artist_new.find('input[name="create_genre"]').val('');
    talent = artist_new.find("select[name='create_talent']").val('musique');
    CKEDITOR.instances['create_editor'].setData('');
    introduction = artist_new.find('textarea[name="create_introduction"]').val('');
});

// Validate create artist
artist_new.find("#create_artist_button").click(function() {
	groupe = artist_new.find('input[name="create_groupe"]').val();
    genre = artist_new.find('input[name="create_genre"]').val();
    talent = artist_new.find("select[name='create_talent']").val();
    presentation = CKEDITOR.instances['create_editor'].getData();
    introduction = artist_new.find('textarea[name="create_introduction"]').val();
	create_artist(groupe, genre, talent, presentation, introduction, localStorage.token, localStorage.user);
});

//Validate maj artist
artist_info.find("#update_artist_button").click(function() {
	id = artist_info.find('input[name="id"]').val();
	groupe = artist_info.find('input[name="groupe"]').val();
    genre = artist_info.find('input[name="genre"]').val();
    talent = artist_info.find("select[name='talent']").val();
    presentation = presentation = CKEDITOR.instances['editor'].getData();
    introduction = artist_info.find('textarea[name="introduction"]').val();
	maj_artist(id, groupe, genre, talent, presentation, introduction, localStorage.token, localStorage.user);
});

//Validate maj user
user_page.find("#update_profil_infos").click(function() {
	nom = user_page.find('input[name="nom"]').val();
    prenom = user_page.find('input[name="prenom"]').val();
    email = user_page.find('input[name="email"]').val();
    password = user_page.find('input[name="password"]').val();
    maj_user(prenom, nom, email, password, localStorage.token, localStorage.user)
}); 



if (localStorage.user != "-1") {

    put_user_fields(localStorage.user);
    /*user = data.user.User;
    fuck = data.user;*/
    

} else {

    $().interstitial('close');

}







/* Mise à jour */


/*old_pass = inscription.find('input[name="pass_old"]').val();
        pass_conf = inscription.find('input[name="pass_conf"]').val();
        mail_conf = inscription.find('input[name="mail_conf"]').val();
        cb = inscription.find('input[name="cb"]').val();

        date_naissance = inscription.find('input[name="date_naissance"]').val();
        ville = inscription.find('input[name="ville"]').val();
        adresse = inscription.find('input[name="adresse"]').val();
        tel = inscription.find('input[name="tel"]').val();
        
        if ((mail != mail_conf) && (infos.find('#new_mail').is(":visible"))) {
            alert("Veuillez verifié le mail saisie");
            return
        }
        if (!infos.find('#new_mail').is(":visible")) {
            mail = "";
        }
        if ((pass != pass_conf) && (infos.find('#new_pass').is(":visible"))) {
            alert("Veuillez verifié le mot de passe saisie");
            return
        }
        if (!infos.find('#new_pass').is(":visible")) {
            pass = "";
        }
        $('#_mes_infos .requiered').each(function() {
            if ($(this).val() == "") {
                $(this).css("border-color", "red");
                ret = "false";
            } else {
                $(this).css("border-color", "#CCCCCC")
            }
        })
        if (ret == "false") {
            alert("les champs en rouge sont obligatoires");
            return
        }*/


/*


            compte = $("#mon_compte")
            infos = $("#_mes_infos");
            rediger = compte.find("#_rediger")
            messages = compte.find(" #_reception")


            if (localStorage.user != "-1") {
                alert('test');
                get_user(localStorage.user);
            } else {
                $().interstitial('close');
            }

            inscription.find("#modifier").click(function() {
                inscription.find(".cache").show();
                $(this).hide()
            })

            infos.find('#annonces_add_photo').bind("change", function() {
                handleFiles(this, infos.find('#profile_img'));
            });

            infos.find("#update").click(function() {
                r = confirm("Voulez vous continuer ?");
                if (r == true) {
                    ret = "true"
                    var d = new Date();
                    var n = d.getTime();

                    nom = inscription.find('input[name="nom"]').val();
                    prenom = inscription.find('input[name="prenom"]').val();
                    date_naissance = inscription.find('input[name="date_naissance"]').val();
                    ville = inscription.find('input[name="ville"]').val();
                    adresse = inscription.find('input[name="adresse"]').val();
                    tel = inscription.find('input[name="tel"]').val();
                    mail = inscription.find('input[name="mail"]').val();
                    pass = inscription.find('input[name="pass"]').val();
                    old_pass = inscription.find('input[name="pass_old"]').val();
                    pass_conf = inscription.find('input[name="pass_conf"]').val();
                    mail_conf = inscription.find('input[name="mail_conf"]').val();
                    cb = inscription.find('input[name="cb"]').val();
                    if ((mail != mail_conf) && (infos.find('#new_mail').is(":visible"))) {
                        alert("Veuillez verifié le mail saisie");
                        return
                    }
                    if (!infos.find('#new_mail').is(":visible")) {
                        mail = "";
                    }
                    if ((pass != pass_conf) && (infos.find('#new_pass').is(":visible"))) {
                        alert("Veuillez verifié le mot de passe saisie");
                        return
                    }
                    if (!infos.find('#new_pass').is(":visible")) {
                        pass = "";
                    }
                    $('#_mes_infos .requiered').each(function() {
                        if ($(this).val() == "") {
                            $(this).css("border-color", "red");
                            ret = "false";
                        } else {
                            $(this).css("border-color", "#CCCCCC")
                        }
                    })
                    if (ret == "false") {
                        alert("les champs en rouge sont obligatoires");
                        return
                    }
                    jQuery.get("php/w_login.php", {
                            method: 'updateUser',
                            mail: mail,
                            pass: pass,
                            nom: nom,
                            prenom: prenom,
                            date_naissance: date_naissance,
                            ville: ville,
                            adresse: adresse,
                            tel: tel,
                            mail: mail,
                            pass: pass,
                            id: localStorage.user,
                            token: localStorage.token,
                            old_pass: old_pass,
                            cb: cb,
                            date: n
                        },
                        function(data) {
                            if (data.etat == "false") {
                                alert(data.message);
                                return
                            } else {
                                alert(data.message);
                                if (change == "true") {
                                    upload_photo(compte.find("#profile_img").get(0), localStorage.user);
                                };
                                get_user();
                                return
                            }

                        }, "json");


                } else {
                    return
                }

            })
            compte.find("input[name='destinataire']").tokenInput("php/w_login.php?method=getlist&param=user&id=" + localStorage.user + "&token=" + localStorage.token, {
                tokenValue: 'id',
                theme: "facebook"
            });
            rediger.find("#send_message").click(function() {

                sujet = rediger.find('#sujet').val();
                a = rediger.find("#a").val();
                text = rediger.find("#text").val();

                jQuery.get("php/w_login.php", {
                        method: 'send_Message',
                        a: a,
                        sujet: sujet,
                        text: text,
                        id: localStorage.user,
                        token: localStorage.token
                    },
                    function(data) {
                        if (data.etat == "false") {
                            alert(data.message);
                            return
                        } else {
                            alert(data.message);
                            rediger.find('#sujet').val("");
                            rediger.find("#a").val("");
                            rediger.find("#text").val("");
                        }

                    }, "json");


            })

            function get_mails() {


            }




            

            compte.find(" #get_messages").click(function() {

                jQuery.get("php/w_login.php", {
                        method: 'getMessage',
                        type: "reception",
                        id: localStorage.user,
                        token: localStorage.token,
                        inf: 0,
                        maxi: 30
                    },
                    function(data) {
                        if (data.etat == "false") {
                            alert(data.message);
                        } else {
                            table = messages.find('#table_mail');
                            table.html('<tr> <th scope="col">De</th> <th scope="col">Sujet</th><th scope="col">Date</th></tr>')
                            i = 0;
                            while (i < data.content.length) {
                                table.append('<tr class="header"><td>' + data.content[i].prenom + '  ' + data.content[i].nom + '</td><td>' + data.content[i].sujet + '</td> <td>' + data.content[i].date + '</td></tr><tr style="display:none" class="text_message"><td colspan="3" style=" padding: 15px; background: rgba(70, 6, 165, 0.06);"><img class="closed" alt="140x140" src="img/icons/close.png" width="20px"  style="float:right"></br>' + data.content[i].text + '</td> </tr>');


                                ;
                                i++
                            }

                            table.find(".header").click(function() {
                                table.find(".text_message").hide();
                                $(this).next('.text_message').show();
                            });
                            table.find(".text_message .closed").click(function() {
                                $(this).parent().parent().hide();
                            })

                        }

                    }, "json");

            });



            compte.find(" #participation_menu").click(function() {

                    jQuery.get("php/w_login.php", {
                            method: 'getParticipationsUser',
                            id: localStorage.user,
                            token: localStorage.token
                        },
                        function(data) {
                            if (data.etat == "false") {
                                alert(data.message);
                            }

                            table = compte.find('#table_participation');
                            table.html('<tr> <th scope="col">Date</th> <th scope="col">Projet</th> <th scope="col">Type de participation</th><th scope="col">Montant</th></tr>')
                            i = 0;
                            while (i < data.content.length) {
                                table.append('<tr class="header"><td>' + data.content[i].date + '</td><td>' + data.content[i].title + '</td><td>' + data.content[i].type_participation + '</td> <td>' + data.content[i].montant + ' €</td></tr>');


                                ;
                                i++
                            }


                        }

                    }, "json");

            });


        compte.find(" #sent_messages").click(function() {

            jQuery.get("php/w_login.php", {
                    method: 'getMessage',
                    type: "sent",
                    id: localStorage.user,
                    token: localStorage.token,
                    inf: 0,
                    maxi: 30
                },
                function(data) {
                    if (data.etat == "false") {
                        alert(data.message);
                    } else {
                        table = compte.find('#table_mail_sent');
                        table.html('<tr> <th scope="col">A</th> <th scope="col">Sujet</th><th scope="col">Date</th></tr>')
                        i = 0;
                        while (i < data.content.length) {
                            table.append('<tr class="header"><td>' + data.content[i].prenom + '  ' + data.content[i].nom + '</td><td>' + data.content[i].sujet + '</td> <td>' + data.content[i].date + '</td></tr><tr style="display:none" class="text_message"><td colspan="3" style=" padding: 15px; background: rgba(70, 6, 165, 0.06);"><img class="closed" alt="140x140" src="img/icons/close.png" width="20px"  style="float:right"></br>' + data.content[i].text + '</td> </tr>');


                            ;
                            i++
                        }

                        table.find(".header").click(function() {
                            table.find(".text_message").hide();
                            $(this).next('.text_message').show();
                        });
                        table.find(".text_message .closed").click(function() {
                            $(this).parent().parent().hide();
                        })

                    }

                }, "json");

        });

        //phoy to load
        function handleFiles(input, photo) {

            change = "true"
            var file = input.files[0];

            if (!file.type.match(/image.* /)) {
                alert('not a photo');
            };
            var img = document.createElement("img");
            var reader = new FileReader();
            img.onload = function(e) {


                photo.attr('src', img.src);

            }
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);

        }


        function upload_photo(img, name) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            var MAX_WIDTH = 480;
            var MAX_HEIGHT = 510;
            var width = img.naturalWidth;
            var height = img.naturalHeight;

            if (width > height) {
                if (width > MAX_WIDTH) {
                    height *= MAX_WIDTH / width;
                    width = MAX_WIDTH;
                }
            } else {
                if (height > MAX_HEIGHT) {
                    width *= MAX_HEIGHT / height;
                    height = MAX_HEIGHT;
                }
            }
            canvas.width = MAX_WIDTH;
            canvas.height = MAX_HEIGHT;
            ctx.drawImage(img, 0, 0, MAX_WIDTH, MAX_HEIGHT);


            var fd = new FormData();
            var dataurl = canvas.toDataURL("image/jpg");
            var url = " php/upload.php";
            fd.append("method", "upload");
            fd.append("nom", name);
            fd.append("photo", dataurl);
            fd.append("rep", 'profil');
            fd.append("key", "××××××××××××");
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url);
            xhr.send(fd);




        }


        /*----------------------------------------------------------------*/