<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:og="http://ogp.me/ns#"
  xmlns:fb="https://www.facebook.com/2008/fbml">
  <!-- 
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    Nous recrutons des web dev, web designers, contactez nous !! sacha@openingstage.fr
    -->
  <head>
    <title>Opening Stage </title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap-lightbox.min.css" rel="stylesheet">
    <link href="css/m-styles.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/token-input-facebook.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.css"/>
    <link href="css/jquery.interstitial.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/vnd.microsoft.icon"/>
    <!-- JS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.tokeninput.js"></script>

    <meta property="fb:app_id" content="662836323774088"/>
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-61108716-1', 'auto');
      ga('send', 'pageview');
      
    </script>   
  </head>
  <body data-target=".navbar" data-offset='64' onLoad="$.stellar();">

    <script>/*
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1394203894230759',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  function fbLogout() {
  FB.logout(function(response) {
    // Person is now logged out
    window.location.reload();
  });
}*/
</script>





    <div id="meta"></div>
    <div id="fb-root"></div>
    <script></script>
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <div class="navbar navbar-fixed-top" id="navigation">
      <a href="#mosaique-top" class="brand"><img src="img/logo.png" alt="" style="height:60px;cursor:pointer"></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right main_menu" style="float:right">
        <ul class="nav pull-right main_menu" style="float:right">
          <li href="#mosaique-top"><img src="img/icons/menu/n01.png" alt="" style="height:50px;cursor:pointer"><a href="#mosaique">Accueil </a></li>
          <li href="#artists-top"><img src="img/icons/menu/n02.png" alt="" style="height:50px;cursor:pointer"><a href="#artist-top" style="margin-left: -8;">Artistes</a></li>
          <li href="#projects-top"><img src="img/icons/menu/n03.png" alt="" style="height:50px;cursor:pointer"><a href="#projects-top" style=" margin-left: -10;">Projets</a></li>
          <li href="#salles-top"><img src="img/icons/menu/n04.png" alt="" style="height:50px;cursor:pointer"><a href="#salles-top" style=" margin-left: -5;">Salles</a></li>
          <li href="#faq-top"><img src="img/icons/menu/n05.png" alt="" style="height:50px;cursor:pointer"><a href="#faq-top" style=" margin-left: 6;">FAQ</a></li>
          <li href="#team-top"><img src="img/icons/menu/n06.png" alt="" style="height:50px;cursor:pointer"><a href="#team-top" style="">Equipe</a></li>
          <li href="#contact-top"><img src="img/icons/menu/n07.png" alt="" style="height:50px;cursor:pointer"><a href="#contact-top" style=" margin-left: -11;">Contact</a></li>
          <li href="#"><input type="button" style="display:none" id="myaccount"  value="mon compte" class="m-btn purple"></li>
          <li href="#"><input type="button" id="mylogin"  value="Connexion" class="m-btn purple"></li>
          <li href="#" ><input  type="button" id="mylogout" style="display:none ;background:rgb(204, 204, 204)" value="Deconnexion" class="m-btn "></li>
        </ul>
      </div>
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </a>
          <div class="span4" style="margin-left:-1px;" id="musicboitier">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio">
              <div class="jp-type-playlist">
                <div class="jp-gui jp-interface">
                  <ul class="jp-controls">
                    <li style="display:nonne"><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                    <li style="display:nonne"><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
                    <li style="display:none"><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                    <li style="display:none"><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                    <li style="display:none"><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                    <li style="display:none"><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                  </ul>
                  <div class="jp-progress visible-desktop">
                    <div class="jp-seek-bar">
                      <div class="jp-play-bar"></div>
                    </div>
                  </div>
                  <div class="jp-volume-bar visible-desktop">
                    <div class="jp-volume-bar-value  "></div>
                  </div>
                  <ul class="jp-toggles" style="display:none">
                    <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                    <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                  </ul>
                </div>
                <div class="jp-playlist">
                  <ul>
                    <li></li>
                  </ul>
                </div>
                <div class="jp-no-solution">
                  <span>Update Required</span>
                  To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="mosaique-top">
      <!--start services-desktop header-->
      <section id="mosaique-top-desktop"  class="visible-desktop" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="20" style="padding-bottom: 420px;padding-top: 200px;">
        <div id="carousel_fade_intro" class="carousel slide carousel-fade">
          <div class="carousel-inner">
            <div class="active item">
              <h1 class="header">OpeningStage </h1>
            </div>
            <div class="inactive item">
              <h1 class="header">Créez votre propre show !</h1>
            </div>
            <div class="inactive item">
              <h1 class="header">Encouragez les jeunes artistes que vous aimez</h1>
            </div>
            <div class="inactive item">
              <h1 class="header">Découvrez les talents de votre région
              </h1>
            </div>
          </div>
        </div>

        <!-- Bouton en carton
        <div class="fadeInUp delay animated hidden-phone" id="more">
          <a href="#mosaique-top" class="m-btn a-btn purple big icn-only"><i class="icon-sort-down icon-3x pull-left"></i></a>
        </div>
        -->

      </section>
      <!--start services-mobile header-->
      <section id="mosaique-top-mobile" class="hidden-desktop" style="padding-bottom: 420px;padding-top: 200px;">
        <h1 class="header">OpeningStage</h1>
        <p class="header">Encouragez les jeunes artistes que vous aimez !!  </p>
        <p class="header">Venez découvrir avec nous les talents de votre région !  </p>
        <p class="header">L'équipe d'OpeningStage est à votre écoute pour vous aider à créer votre propre show !   </p>
      </section>
    </section>
    <!--start services-->
    <section id="mosaique" style="padding: 0px;background: transparent;
      ">
      <div class="container" style="margin: 0px;width: 100%;background: transparent;position: absolute;margin-top: -145;">
        
      <!-- Mosaïque en carton
        <div class="" style="">
          <img src="img/mosaique.png" alt="" title="" style="margin-bottom: 20px;">
        </div>
      -->
      </div>
    </section>
    <section id="artists-top">
      <!--start works-desktop header-->
      <section id="artists-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.2" data-stellar-vertical-offset="20">
        <h1 class="header">Artistes</h1>
        <p class="header">Likez les artistes pour les voir sur scène !  </p>
      </section>
      <!--start works-mobile header-->
      <section id="artists-top-mobile"  class="hidden-desktop">
        <h1 class="header">artistes</h1>
        <p class="header">Likez les artistes pour les voir sur scène !  </p>
      </section>
    </section>
    <section id="artists">
      <div class="container">
        <div  title="details" class="row divide" style="margin-top:0px;margin-bottom:0px; display:none; ">
        </div>
        <div  title="home" class="row divide">
          <input id="artist-login"  value="JE SUIS UN ARTISTE" class="m-btn purple" style="float: right;right: 0;">
          <div class="span12 tri" type='artist' style="text-align:center">
            <ul class="nav_artists" style="margin-bottom: 20px;margin-top: 14px;">
            <li><a title="top">Top Artistes</a></li>
            <li><a title="talent">Par talents</a></li>
            <li><a title="nouveau">nouveaux</a></li>
            <li><a title="near">Près de chez vous</a></li>
            <li id="liker" style="display:none"><a title="liker">Mes artistes </a></li>
          </div>
          <div class="span12 alphabet" type='artist' style="text-align:center" >
            <ul class="nav_artists">
              <li>
                <div><a title="all">All</a><a title="a">A</a><a title="b">B</a><a title="c">C</a><a title="d">D</a><a title="e">E</a></div>
              </li>
              <li>
                <div><a title="f">F</a><a title="g">G</a><a title="h">H</a><a title="i">I</a><a title="j">J</a></div>
              </li>
              <li>
                <div><a title="k">K</a><a title="l">L</a><a title="m">M</a><a title="n">N</a><a title="o">O</a></div>
              </li>
              <li>
                <div><a title="p">P</a><a title="q">Q</a><a title="r">R</a><a title="s">S</a><a title="t">T</a></div>
              </li>
              <li>
                <div><a title="u">U</a><a title="v">V</a><a title="w">W</a><a title="x">X</a><a title="y">Y</a><a title="z">Z</a></div>
              </li>
            </ul>
          </div>
          <div class="span12">
            <div id="carousel_horizontal_slide" style="margin-top:25px;margin-bottom:0px" class="carousel slide horizontal">
              <div id="artists_display"class="carousel-inner"  style="margin: 0 10%;width: 80%;">
              </div>
              <button class="carousel-control left m-btn icn-only" href="#carousel_horizontal_slide" data-slide="prev"><i class="icon-chevron-left"></i></button>
              <button class="carousel-control right m-btn icn-only" href="#carousel_horizontal_slide" data-slide="next"><i class="icon-chevron-right"></i></button>
            </div>
          </div>
        </div>
        <div class="span12" style="text-align:center">
          <div id="bt_home" class="m-btn purple" style="height: 50px;width: 100px;margin: auto; color:white;padding: 15px;padding-bottom: 0px;text-align: center;font-weight: bold;display:none;">retour</div>
        </div>
      </div>
    </section>



    <section id="projects-top">
      <!--start works-desktop header-->
      <section id="projects-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.2" data-stellar-vertical-offset="20">
        <h1 class="header">Projets</h1>
        <p class="header">Participez à la réalisation du spectacle</p>
      </section>
      <!--start works-mobile header-->
      <section id="projects-top-mobile" class="hidden-desktop">
        <h1 class="header">Projets</h1>
        <p class="header">Participez à la réalisation du spectacle </p>
      </section>
    </section>

    <!--start works-->
    <section id="projects">
      <div class="container">
        <div  title="details" class="row divide" style="margin-top:0px;margin-bottom:0px; display:none; ">
        </div>
        <div  title="home" class="row divide">
          <div class="span12 " style="text-align:center"></div>
          <div class="span12 tri" type='projet' style="text-align:center">
            <ul class="nav_artists" style="margin-bottom: 20px;margin-top: 47px;">
            <li><a title="top">Top projets</a></li>
            <li><a title="nouveau">nouveaux</a></li>
            <li><a>Ville :</a><select class="cities_select" style="background:white;margin-top: -7px;width: 150;"></select> </li>
          </div>
          <div class="span12 alphabet"  type='projet' style="text-align:center; display:none;" >
            <ul class="nav_projects">
              <li>
                <div><a title="all">All</a><a title="a">A</a><a title="b">B</a><a title="c">C</a><a title="d">D</a><a title="e">E</a></div>
              </li>
              <li>
                <div><a title="f">F</a><a title="g">G</a><a title="h">H</a><a title="i">I</a><a title="j">J</a></div>
              </li>
              <li>
                <div><a title="k">K</a><a title="l">L</a><a title="m">M</a><a title="n">N</a><a title="o">O</a></div>
              </li>
              <li>
                <div><a title="p">P</a><a title="q">Q</a><a title="r">R</a><a title="s">S</a><a title="t">T</a></div>
              </li>
              <li>
                <div><a title="u">U</a><a title="v">V</a><a title="w">W</a><a title="x">X</a><a title="y">Y</a><a title="z">Z</a></div>
              </li>
            </ul>
          </div>
          <div class="span12">
            <div id="carousel_horizontal_slide3" style="margin-top:25px;margin-bottom:0px" class="carousel slide horizontal">
              <div id="projects_display" class="carousel-inner"  style="margin: 0 10%;width: 80%;">
              </div>
              <button class="carousel-control left m-btn icn-only" href="#carousel_horizontal_slide3" data-slide="prev"><i class="icon-chevron-left"></i></button>
              <button class="carousel-control right m-btn icn-only" href="#carousel_horizontal_slide3" data-slide="next"><i class="icon-chevron-right"></i></button>
            </div>
          </div>
        </div>
        <div class="span12" style="text-align:center">
          <div id="bt_home" class="m-btn purple" style="height: 50px;width: 100px;margin: auto; color:white;padding: 15px;padding-bottom: 0px;text-align: center;font-weight: bold;display:none;">retour</div>
        </div>
      </div>
    </section>

    <!--

    <section id="salles-top">
      <!-- start works-desktop header-->
      <!--
      <section id="salles-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.2" data-stellar-vertical-offset="20">
        <h1 class="header">Stage</h1>
        <p class="header">Decouvrez nos salles</p>
      </section>
      <!--start works-mobile header-->
      <!--
      <section id="salles-top-mobile" class="hidden-desktop">
        <h1 class="header">Stage</h1>
        <p class="header">Decouvrez nos salles</p>
      </section>
    </section>
    <!--start works-->
    <!--
    <section id="salles">
      <div class="container">
        <div  title="details" class="row divide" style="margin-top:0px;margin-bottom:0px; display:none; ">
        </div>
        <div  title="home" class="row divide">
          <div class="span12 " style="text-align:center"></div>
          <input id="salle-have"  value="J'AI UNE SALLE" class="m-btn purple" style="float: right;right: 0;">
          <div class="span12 tri" type='salle' style="text-align:center">
            <ul class="nav_artists" style="margin-bottom: 20px;">
            <li><a title="top">Top salles</a></li>
            <li >
            <li id="liker" style="display:"><a title="liker">Mes Salles</a></li>
            <li><a>Ville :</a><select class="cities_select" style="background:white;margin-top: -7px;width: 150;"></select> </li>
          </div>
          <div class="span12 alphabet" type='salle' style="text-align:center" >
            <ul class="nav_artists">
              <li>
                <div><a title="all">All</a><a title="a">A</a><a title="b">B</a><a title="c">C</a><a title="d">D</a><a title="e">E</a></div>
              </li>
              <li>
                <div><a title="f">F</a><a title="g">G</a><a title="h">H</a><a title="i">I</a><a title="j">J</a></div>
              </li>
              <li>
                <div><a title="k">K</a><a title="l">L</a><a title="m">M</a><a title="n">N</a><a title="o">O</a></div>
              </li>
              <li>
                <div><a title="p">P</a><a title="q">Q</a><a title="r">R</a><a title="s">S</a><a title="t">T</a></div>
              </li>
              <li>
                <div><a title="u">U</a><a title="v">V</a><a title="w">W</a><a title="x">X</a><a title="y">Y</a><a title="z">Z</a></div>
              </li>
            </ul>
          </div>
          <div class="span12">
            <div id="carousel_horizontal_slide4" style="margin-top:50px" class="carousel slide horizontal">
              <div id="salle_display" class="carousel-inner"  style="margin: 0 10%;width: 80%;">
              </div>
              <button class="carousel-control left m-btn icn-only" href="#carousel_horizontal_slide4" data-slide="prev"><i class="icon-chevron-left"></i></button>
              <button class="carousel-control right m-btn icn-only" href="#carousel_horizontal_slide4" data-slide="next"><i class="icon-chevron-right"></i></button>
            </div>
          </div>
        </div>
        <div class="span12" style="text-align:center">
          <div id="bt_home" class="m-btn purple" style="height: 50px;width: 100px;margin: auto; color:white;padding: 15px;padding-bottom: 0px;text-align: center;font-weight: bold;display:none;">retour</div>
        </div>
      </div>
    </section>

	-->

    <!--start FAQ header-->
    <section id="faq-top">
      <!--start faq-desktop header-->
      <section id="faq-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="20">
        <h1 class="header">FAQ</h1>
        <p class="header">Que fait-on ? </p>
      </section>
      <!--start faq-mobile header-->
      <section id="faq-top-mobile" class="hidden-desktop">
        <h1 class="header">FAQ</h1>
        <p class="header">Que fait-on ? </p>
      </section>
    </section>
    <!--start faq-->
    <!--start thumbnails section-->
    <section id="faq" style="min-height: 560px;">
      <div class="container">
        <div  title="home" class="row divide">
          <h1 style="font-weight: 400;
            border-bottom: 1px solid;
            padding-bottom: 20px;
            margin-top: 48px;
            margin-bottom: 58px;" ><img style="width: 77px;" src="img/logo.png"  />  Questions / Réponses </h1>
          <div id="carousel_horizontal_slide5" style="margin-top:50px" class="carousel slide horizontal">
            <div id="salle_display" class="carousel-inner" style="margin: 0 10%;width: 80%;">
              <div class="active item">
                <ul class="thumbnails">
                  <li class="span3 " style="
                    ">
                    <div class="thumbnail" style="
                      ">
                      <a class="mask" data-type="general" id="1">
                        <img class="img-circle coveri" src="img/icons/general.jpg" alt="" title="1" "=""> 
                        <span style="display:table" class="caption fade-caption img-circle">
                          <h3 style=" display: table-cell;      vertical-align: middle;">Géneral - En savoir plus</h3>
                        </span>
                      </a>
                      <div class="title hidden-desktop"><span class="blue">Géneral - En savoir plus</span> </div>
                      <div class="content fix" style="
                        text-align: center;
                        margin: auto;
                        width: 100%;
                        ">
                        <h2 style="font-weight: 100;">Géneral </h2>
                      </div>
                    </div>
                  </li>
                  <li class="span3 " style="
                    ">
                    <div class="thumbnail" style="
                      ">
                      <a class="mask" data-type="fan" id="1">
                        <img class="img-circle coveri" src="img/icons/fan.jpg" alt="" title="1" "=""> 
                        <span style="display:table" class="caption fade-caption img-circle">
                          <h3 style=" display: table-cell;      vertical-align: middle;">Fan - En savoir plus</h3>
                        </span>
                      </a>
                      <div class="title hidden-desktop"><span class="blue">Fan - En savoir plus</span> </div>
                      <div class="content fix" style="
                        text-align: center;
                        margin: auto;
                        width: 100%;
                        ">
                        <h2 style="font-weight: 100;">Fan </h2>
                      </div>
                    </div>
                  </li>
                  <li class="span3 " style="
                    ">
                    <div class="thumbnail" style="
                      ">
                      <a class="mask" data-type="artistes" id="1">
                        <img class="img-circle coveri" src="img/icons/artistes.jpg" alt="" title="1" "=""> 
                        <span style="display:table" class="caption fade-caption img-circle">
                          <h3 style=" display: table-cell;      vertical-align: middle;">Artistes - En savoir plus</h3>
                        </span>
                      </a>
                      <div class="title hidden-desktop"><span class="blue">Artistes - En savoir plus</span> </div>
                      <div class="content fix" style="
                        text-align: center;
                        margin: auto;
                        width: 100%;
                        ">
                        <h2 style="font-weight: 100;">Artistes </h2>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class=" item">
                <ul class="thumbnails">
                  <li class="span3 " style="
                    ">
                    <div class="thumbnail" style="
                      ">
                      <a class="mask" data-type="prestataires" id="1">
                        <img class="img-circle coveri" src="img/icons/prestataires.jpg" alt="" title="1" "=""> 
                        <span style="display:table" class="caption fade-caption img-circle">
                          <h3 style=" display: table-cell;      vertical-align: middle;">Prestataires - En savoir plus</h3>
                        </span>
                      </a>
                      <div class="title hidden-desktop"><span class="blue">Prestataires - En savoir plus</span> </div>
                      <div class="content fix" style="
                        text-align: center;
                        margin: auto;
                        width: 100%;
                        ">
                        <h2 style="font-weight: 100;">Prestataires </h2>
                      </div>
                    </div>
                  </li>
                  <li class="span3 " style="
                    ">
                    <div class="thumbnail" style="
                      ">
                      <a class="mask" data-type="crowdfunding" id="1">
                        <img class="img-circle coveri" src="img/icons/prestataires.jpg" alt="" title="1" "=""> 
                        <span style="display:table" class="caption fade-caption img-circle">
                          <h3 style=" display: table-cell;      vertical-align: middle;">Crowdfunding - En savoir plus</h3>
                        </span>
                      </a>
                      <div class="title hidden-desktop"><span class="blue">Crowdfunding - En savoir plus</span> </div>
                      <div class="content fix" style="
                        text-align: center;
                        margin: auto;
                        width: 100%;
                        ">
                        <h2 style="font-weight: 100;">Crowdfunding </h2>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <button class="carousel-control left m-btn icn-only" href="#carousel_horizontal_slide5" data-slide="prev"><i class="icon-chevron-left"></i></button>
            <button class="carousel-control right m-btn icn-only" href="#carousel_horizontal_slide5" data-slide="next"><i class="icon-chevron-right"></i></button>
          </div>
        </div>
        <div  title="details" class="row divide" style="margin-top:0px;margin-bottom:0px; display:none; ">		</div>
        <div class="span12" style="text-align:center">
          <div id="bt_home" class="m-btn purple" style="height: 50px;width: 100px;margin: auto; color:white;padding: 15px;padding-bottom: 0px;text-align: center;font-weight: bold;display:none;">retour</div>
        </div>
      </div>
    </section>
    <!--end thumbnails section-->
    <!--start team header-->
    <section id="team-top">
      <!--start team-desktop header-->
      <section id="team-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="20">
        <h1 class="header">Team</h1>
        <p class="header">Qui somme nous ?</p>
      </section>
      <!--start team-mobile header-->
      <section id="team-top-mobile" class="hidden-desktop">
        <h1 class="header">Qui somme nous ?</h1>
        <p class="header">Team</p>
      </section>
    </section>
    <!--start team-->
    <section id="team">
      <div class="container">
        <div class="row divide">
          <div class="span8 offset2">
            <h1 style="font-weight: 400;
              border-bottom: 1px solid;
              padding-bottom: 20px;
              margin-top: 48px;
              margin-bottom: 58px;">Notre équipe</h1>
            <p class="center"></p>
          </div>
          <div class="span12">
            <ul class="thumbnails" style="margin-left: -30px;">
              <li class="span4">
                <div class="thumbnail">
                  <div class="image-cover">	<img src="img/team/sacha.jpg" class="img-circle" alt=""></div>
                  <h2 style="font-weight: 100;">Sacha Khayat</h2>
                  <span>Founder</span>
                  <p>Si vous avez êtes déjà allés voir des concerts ou dans les salles de stand-up, vous l’avez déjà surement croisé. Chignon à la tête, bracelets aux poignets, Il s’est fait une spécialité de dénicher les meilleurs talents pour en parler le lendemain à tout le monde.
                    Aujourd’hui il se lance dans OpeningStage pour ne plus passer à coté d’artistes et leur donner une chance de se faire connaître.
                  </p>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="image-cover">	<img src="img/team/zine.jpg" class="img-circle" alt=""></div>
                  <h2 style="font-weight: 100;">Zine Addadi</h2>
                  <span>Marketing Manager</span>
                  <p style="min-height: 180px;">Si vous fréquentez les campus d’écoles de commerce ou  les bibliothèques, vous l’avez sûrement déjà croisé. Diplômé d’à peu près toutes les écoles, il s’est fait une  spécialité, les chiffres !
                    Aujourd’hui il se lance dans OpeningStage, pour apporter son savoir-faire et sa rigueur afin de fonder la structure financière du projet pour le concrétiser..
                  </p>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <div class="image-cover">	<img src="img/team/you.jpg" class="img-circle" whidt alt=""></div>
                  <h2 style="font-weight: 100;">Vous </h2>
                  <span style="opacity:0"> vous </span>
                  <p style="min-height: 180px;">Sans vous, OpeningStage ne pourrait pas fonctionner. Vous êtes les spectateurs, les artistes, vous êtes tout ! Ou que vous soyez vous êtes OpeningStage.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <!--start contact header-->
    <section id="contact-top">
      <!--start contact-desktop header-->
      <section id="contact-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="20">
        <h1 class="header">Contact</h1>
        <p class="header">Ecrivez-nous, on aime ça</p>
      </section>
      <!--start contact-mobile header-->
      <section id="contact-top-mobile" class="hidden-desktop">
        <h1 class="header">Contact</h1>
        <p class="header">Ecrivez-nous, on aime ça </p>
      </section>
    </section>


    <!--start contact-->
    <section id="contact">
      <div class="container">
        <div class="row divide">
          <div class="span8">
            <div class="row">
              <h2 style="color:#263164">Contactez-nous </h2>
              <forms action="" method="post" id="contacts">
                <div class="span3">
                  <label>Name:</label>
                  <input style="height: 32px;" type="text" name="name" value="" id="name" class="span3 input-xlarge"/>
                </div>
                <div class="span3">
                  <label>Email:</label>
                  <input style="height: 32px;" type="text" name="email" value="" id="email"  class="span3 input-xlarge"/>
                </div>
                <span class="honeypot">
                <label>Honeypot:</label>
                <input type="text" name="last" value="" id="last"/>
                </span>
                <div class="span6">
                  <label>Message:</label>
                  <textarea rows="6" name="message" class="span6"></textarea>
                </div>
                <div class="span6">
                  <div class="message"></div>
                  <input type="submit" value="Send Message" class="m-btn purple"/>
                </div>
              </forms>
            </div>
          </div>
          <!--start sidebar-->  
          <div class="span4" id="address" style="text-align:left">
            <h2 style="color:#263164">On reste en contact </h2>
            <h5 style="   margin-top: 31px;  font-size: 17px;font-weight: 400; color: rgb(115, 122, 129);"> Où nous trouver ?</h5>
            <p style="  margin-bottom:10px"><img src="https://cdn1.iconfinder.com/data/icons/MetroStation-PNG/128/MB__home.png" style="height: 30px;margin-right:15px" alt="">  adresse 55 rue de la Boétie, 75008 
              Paris  France
            </p>
            <h5 style="   font-size: 17px;font-weight: 400; color: rgb(115, 122, 129);">Besoin d’aide ou de plus d’infos ?</h5>
            <p style="  margin-bottom:10px"><img src="https://cdn1.iconfinder.com/data/icons/MetroStation-PNG/128/MB__mail.png" style="height: 30px;margin-right:15px" alt="">  sacha@openingstage.fr</p>
            <h5 style="   font-size: 17px;font-weight: 400; color: rgb(115, 122, 129);">Appellez nous</h5>
            <p style="  margin-bottom:10px"><img src="https://cdn1.iconfinder.com/data/icons/MetroStation-PNG/128/MB__phone.png" style="height: 30px;margin-right:15px" alt="">   (33) 6 87 75 67 65<br>
            </p>
          </div>
        </div>
      </div>
    </section>




    <section id="footer-top-desktop" class="visible-desktop" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="20">
      <h1 class="header">...</h1>
      <p class="header">OpeningStage <br> Penser la Scène autrement</p>
    </section>
    <section id="footer-top-mobile" class="hidden-desktop">
      <h1 class="header">...</h1>
      <p class="header">OpeningStage<br>  Penser la Scène autrement</p>
    </section>
    </section>
    <section id="footer" >
      <div class="container">
        <div class="row divide" style="margin-top:1%;margin-bottom:1%">
          <!--logo and copyright-->
          <div class="span3" style="
            float: left;
            ">
            <a href="#intro" class="brand"><img src="img/logo.png" style=" height: 60px;" alt=""></a>
          </div>
          <!--footer menu-->
          <!--link to social networks-->
          <a style="
            float: right;color: rgb(127, 143, 138);
            " href="https://www.facebook.com/openingstage">Rejoignez nous<img src="img/icons/facebook.png"> </a>
        </div>
      </div>
    </section>
    <!-- /.modal -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-dialog.min.js" type="text/javascript"></script>
    <script src="js/jquery.interstitial.js" type="text/javascript"></script>
    <script src="js/jquery.jplayer.min.js"></script>           
    <script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <script type="text/javascript"></script>
    <script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-lightbox.min.js"></script>
    <script type="text/javascript" src="js/selectivizr.js"></script>
    <script src="js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
    <script src="js/jquery.stellar.js" type="text/javascript"></script>
  </body>
</html>