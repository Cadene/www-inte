login = $("#login_form");
inscription = login.find("#new #_inscription");


/* Forgot */

$("#forgot").click(function() {

    email = login.find('#email').val();
    var date = new Date();
    var datetime = date.getTime();

    if (email == '') {
        alert('Veuillez entrer un mail valide');
        return
    }

    $.ajax({
        type: 'post',
        url: 'users/forgot.json',
        data: {
        	email: email,
        	date: datetime
        },
        success: function(data) {
            alert('Nous avons envoyé un lien d\'activation à l\'adresse email suivante ' + email);
        }
    });
});


/* Suscribe button */

login.find("#subscribe").click(function() {

    if ($("#email_sub").val() == "") {
        alert('Veuillez entrer un email valide.');
        return
    }
    inscription.find('input[name="mail"]').val($("#email_sub").val());
    login.find("#logino").hide(800);

    login.find("#new").show();
    $("#myTab_login span").click(function() {
        $(this).tab("show");
        $("#myTab_login span.active").removeClass("active");
        $(this).addClass("active")
    });
})


/* Sign in */

login.find('#signin').click(function() {

    email = login.find('#email').val();
    password = login.find('#pass').val();

    $.ajax({
        type: 'post',
        url: 'users/login.json',
        data: {
        	email: email,
        	password: password
        },
        success: function(data) {

        	console.log(data);

        	if (data.user == null) {
                alert("login ou mot de passe incorrect !");
            } else {
            	user = data.user.User;
	        	localStorage.user = user.id;
	            localStorage.token = user.token; // token à créer
	            localStorage.prenom = user.prenom;
	            localStorage.nom = user.nom
	            $().interstitial('close');
	            $("#mylogin").hide();
	            $("#mylogout").show();
	            $("#myaccount").show();
	            $("#artist-login").show();
	            $("#presta-login").show();
	            $("#liker").show()
	            $("#myaccount").val(user.prenom + " " + user.nom)
	        }
	    }
	});
});

/* Register */

inscription.find('#registration').click(function() {

    var d = new Date();
    var n = d.getTime();
    ret = "true"
    nl = 0;

    if (inscription.find('#inputEmail3').is(':checked')
    	&& inscription.find('#inputconditions').is(':checked')) {
    	nl = 1;
	}

    nom = inscription.find('input[name="nom"]').val();
    prenom = inscription.find('input[name="prenom"]').val();
    date_naissance = inscription.find('input[name="date_naissance"]').val();
    ville = inscription.find('input[name="ville"]').val();
    adresse = inscription.find('input[name="adresse"]').val();
    tel = inscription.find('input[name="tel"]').val();
    email = inscription.find('input[name="mail"]').val();
    password = inscription.find('input[name="pass"]').val();
    cb = inscription.find('input[name="cb"]').val();
    password_conf = inscription.find('input[name="pass_conf"]').val();
    email_conf = inscription.find('input[name="mail_conf"]').val();

    //if (ville == "" || email == "" || prenom == "" || nom == "" || password == "") {
    if (email == "" || prenom == "" || nom == "" || password == "") {
        alert("Veuillez saisir les informations obligatoires");
        return
    }
    /*
    if (email != email_conf) {
        alert("Veuillez verifié le mail saisie");
        return
    }
    if (password != password_conf) {
        alert("Veuillez verifié le mot de passe saisie");
        return
    }*/

    $('#new #_inscription .requiered').each(function() {
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

    $.ajax({
        type: 'get',
        url: 'users/register.json',
        data: {
        	email: email,
	    	nom: nom,
	    	prenom: prenom,
	   		password: password, // envoie non encodé 
        },
        success: function(data) {
            if (data.user != null) {
            	user = data.user.User;
            	localStorage.user = user.id;
                localStorage.token = user.token; // token à créer
                localStorage.prenom = user.prenom;
                localStorage.nom = user.nom
                $().interstitial('close');
                $("#mylogin").hide();
                $("#mylogout").show();
                $("#myaccount").html("Mon compte");
                $("#myaccount").val(user.prenom + " " + user.nom);
                $("#myaccount").show();
                $("#artist-login").show();
            } else {
                alert('Problème.');
            }
            console.log(data);
        }
    });

});

/*	  window.fbAsyncInit = function() {
	  alert("here")
  FB.init({
    appId      : '662836323774088', // App ID
    channelUrl : 'http://www.mazasoft.net/zine/', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
  
    if (response.status === 'connected') {
     setAPI();
    
    } else if (response.status === 'not_authorized') {
     
      FB.login();
    } else {
  
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function setAPI() {
  
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
		
		id_user=response.id ;
		img_user=response.username;
		name_user=response.name;
		url_user=response.link;
      console.log('Good to see y;ou, ' + JSON.stringify(response )+ '.');
    });
  }
	*/