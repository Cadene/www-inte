$('#carousel_fade_intro').carousel({
    interval: 2500,
    pause: false
})



$("#myTab_faq_ul span").click(function() {
    $(this).tab("show");
});
$("#myTab_faq_ul span").click(function() {
    $(this).tab("show");
    $("#myTab_faq_ul span.active").removeClass("active");
    $(this).addClass("active")
});



$('#carousel_horizontal_slide #carousel_horizontal_slide3,#carousel_horizontal_slide4, #carousel_vertical_slide, #carousel_fade_1, #carousel_fade_2').carousel({
    interval: false
})

$("#repeat_artist").click(function() {
    if (repeat) {
        $(this).removeClass("jp-repeat");
        $(this).addClass("jp-repeat-off");
        repeat = false;
        $('#carousel_horizontal_slide').carousel({
            interval: 5000
        })
    } else {
        $(this).removeClass("jp-repeat-off");
        $(this).addClass("jp-repeat");
        repeat = true;
        $('#carousel_horizontal_slide').carousel('pause')
    }

})

$(function() {
    $('#intro').css({
        'height': ($(window).height()) + 'px'
    });
    $(window).resize(function() {
        $('#intro').css({
            'height': ($(window).height()) + 'px'
        });
    });
});
$(document).ready(function() {});
$(function() {

    jQuery.get("php/manager.php", {
            method: 'getcities',
            id: 0,
            token: 0
        },
        function(data) {
            i = 0;
            while (i < data.content.length) {
                $('.cities_select').append('<option >' + data.content[i].nom + '</option>');;
                i++
            }
        }, "json");

    $('#more a, .main_menu li').bind('click', function(event) {
        var $anchor = $(this);
        $('[data-spy="scroll"]').each(function() {
            var $spy = $(this).scrollspy('refresh')
        });
        if ($anchor.attr('href') == "#")
            return;
        if ($anchor.attr('href') == "#mosaique-top") {
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 61
            }, 1500, 'easeInOutExpo');
        } else {
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top + 350
            }, 1500, 'easeInOutExpo');
        }
        event.preventDefault();
    });
});
$(document).ready(function() {

    if (localStorage.user != '-1' && localStorage.user != undefined) {
        //verif user à faire

        $("#mylogin").hide();
        $("#mylogout").show();
        $("#myaccount").show();
        $("#artist-login").show();
        $("#presta-login").show();
        $("#liker").show()
        $("#myaccount").val(localStorage.prenom + " " + localStorage.nom)

    } else {
        localStorage.user = '-1'
        localStorage.token = '-1'
        localStorage.projet = '-1'
        localStorage.artist = '-1'
        localStorage.salle = '-1'
    }

    $('.menu_services .item').click(function() {
        get_page($(this).attr('title'));
    });
    $("#services").find('#bt_home').click(function() {
        $("#services").find('.row[title="home"]').show(1000);
        $("#services").find('.row[title="details"]').hide(1000);
        $("#services").find('.row[title="details"]').html("");
        $("#services").find('#bt_home').hide();
    });

    $("#faq").find('#bt_home').click(function() {
        $("#faq").find('.row[title="home"]').show(1000);
        $("#faq").find('.row[title="details"]').hide(1000);
        $("#faq").find('.row[title="details"]').html("");
        $("#faq").find('#bt_home').hide();
    });
    $('#faq').delegate('.thumbnail .mask', 'click', function() {
        get_page_faq($(this).attr('data-type'));
    });

    $('#artists').delegate('.thumbnail .mask', 'click', function() {
        get_page_artists($(this).attr('id'));
    });
    $("#artists").find('#bt_home').click(function() {
        $("#artists").find('.row[title="home"]').show(1000);
        $("#artists").find('.row[title="details"]').hide(1000);
        $("#artists").find('.row[title="details"]').html("");
        $("#artists").find('#bt_home').hide();
    });
    $('#projects').delegate('.thumbnail .mask', 'click', function() {
        get_page_projects($(this).attr('id'));
    });
    $("#projects").find('#bt_home').click(function() {
        $("#projects").find('.row[title="home"]').show(1000);
        $("#projects").find('.row[title="details"]').hide(1000);
        $("#projects").find('.row[title="details"]').html("");
        $("#projects").find('#bt_home').hide();
    });
    $('#salles').delegate('.thumbnail .mask', 'click', function() {
        get_page_salles($(this).attr('id'));
    });
    $("#salles").find('#bt_home').click(function() {
        $("#salles").find('.row[title="home"]').show(1000);
        $("#salles").find('.row[title="details"]').hide(1000);
        $("#salles").find('.row[title="details"]').html("");
        $("#salles").find('#bt_home').hide();
    });
    $("input[type='submitt']").bind('click', function(e) {
        nom = $("input[name='name']").val()
        email = $("input[name='email']").val()
        if (email == '') {
            BootstrapDialog.alert('try with a valid email adress, thank you');
            return;
        }
        message = $("textarea[name='message']").val()
        jQuery.post("mail.php", {
            name: name,
            email: email,
            subject: 'mazasoft: ' + 'nom:' + nom + ' email: ' + email,
            message: message
        }, function(data) {
            BootstrapDialog.alert("Mail sent , Thank you!")
            $("textarea[name='message']").val("");
        }, "json");
    });
    $("#contacts input[type='submit']").click(function() {
        text = "Nom : " + $("#contacts input[name='name']").val() + "\n\t\n <br> Mail:" + $("#contacts input[name='email']").val() + '\n  <br>  Sujet:' + $("#contacts textarea").val()
        jQuery.post("php/manager.php", {
            method: 'sendmail',
            message: text,
            id: localStorage.user,
            token: localStorage.token
        }, function(data) {
            if (data.etat == "false") {
                BootstrapDialog.alert(data.message);
                return
            } else {
                BootstrapDialog.alert("votre message a bien été envoyé,merci pour votre collaboration !")
                $("#contacts textarea").val("")
                $("#contacts input[name='name']").val("")
                $("#contacts input[name='email']").val("")
            }
        }, "json");
    })

    function get_page(page) {
        var url = 'php/manager.php?method=page&name=' + page;
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.onload = function() {
            if (request.status == 200) {
                var result = request.responseText;
                $("#services").find('.row[title="details"]').html(result);
                $("#services").find('.row[title="home"]').hide(1000);
                $("#services").find('.row[title="details"]').show(1000);
                $("#services").find('#bt_home').show();
                $('#services .row[title="details"]').find('.subtitle').click(function() {
                    get_page($(this).attr('title'));
                });
            }
        }
        request.send(null);
    }

    
    get_artists("top", 'a', 1, 'false');

    function get_artists(order, letter, page, more) {
        jQuery.get("php/manager.php", {
            method: 'get_artists',
            order: order,
            letter: letter,
            page: page,
            id: localStorage.user,
            token: 0
        }, function(data) {
            if (data.length == 0) {
                $("#artists #artists_display").html("<h1 style=' font-weight: 300;color: #1199ee;'>Selection vide</h1>");
                return
            } else {
                if (more == "false")
                    $("#artists #artists_display").html('');
                i = 0;
                html = ""
                $("#artists #artists_display item.active").removeClass('active').addClass('inactive');
                while (i < data.content.length) {
                    if (i % 3 == 0 && i != 0)
                        html = html + '<div class="inactive item"> <ul class="thumbnails">';
                    if (i % 3 == 0 && i == 0)
                        html = html + ('<div class="active item"> <ul class="thumbnails">');
                    html = html + ('<li class="span3"><div class="thumbnail"><a class="mask" id="' + data.content[i].ID + '"><img class="img-circle coveri" src="img/profils/' + data.content[i].ID + '.jpg" alt="" title="' + data.content[i].ID + '" "> <span style="display:table" class="caption fade-caption img-circle"> <h3 style=" display: table-cell;      vertical-align: middle;">' + data.content[i].nom + ' ' + data.content[i].prenom + '</h3>   </span></a><div class="title hidden-desktop"><span class="blue">' + data.content[i].nom + ' ' + data.content[i].prenom + '</span></div><div class="fix"><p>' + data.content[i].presentation + '</p></div></div></li>');
                    if (i % 3 == 2)
                        html = html + ('</ul></div>');
                    i++;
                }
                if (i % 3 != 2)
                    (html = html + '</ul></div>');
                $("#artists #artists_display").html(html)
            }
        }, "json");
    }
    get_projets('top', 'a', 1, 'false')

    function get_projets(order, letter, page, more) {
        jQuery.get("php/manager.php", {
            method: 'get_projets',
            order: order,
            letter: letter,
            page: page,
            id: localStorage.user,
            token: 0
        }, function(data) {
            if (data.length == 0) {
                $("#projects #projet_display").html("<h1 style=' font-weight: 300;color: #1199ee;'>Selection vide</h1>");
                return
            } else {
                if (more == "false")
                    $("#projets #projet_display").html('');
                html = ""
                i = 0;
                $("#projects #projet_display item.active").removeClass('active').addClass('inactive');
                while (i < data.content.length) {
                    if (i % 3 == 0 && i != 0) {
                        html = html + '<div class="inactive item"> <ul class="thumbnails">';
                    }
                    if (i % 3 == 0 && i == 0) {
                        html = html + '<div class="active item"> <ul class="thumbnails">';
                    }
                    html = html + '<li class="span3"><div class="thumbnail"><a class="mask" id="' + data.content[i].ID + '"><img class="img-circle coveri" src="img/projets/' + data.content[i].ID + '/cover.jpg" alt="" title="' + data.content[i].ID + '" "> <span style="display:table" class="caption fade-caption img-circle"> <h3 style=" display: table-cell;      vertical-align: middle;">' + data.content[i].title + '</h3>   </span></a><div class="title hidden-desktop"><span class="blue">' + data.content[i].title + '</span> </div> <div class="progressbar" value="' + data.content[i].montant_cumul + '" final="' + data.content[i].montant + '"><div class="progress-label">Loading...</div>  </div><div class="infos"> <p class="invested">  </p><p  class="timeleft"><strong >' + data.content[i].days + ' <small>days</small></strong>  <br> <span id=""> restant </span><strong></strong></p> </div> <div class="content fix"><p>' + data.content[i].presentation + '</p></div></div></li>';
                    if (i % 3 == 2)
                        (html = html + '</ul></div>');
                    i++;
                }
                if (i % 3 != 2)
                    (html = html + '</ul></div>');
                $("#projects #projet_display").html(html)
                progress();
            }
        }, "json");
    }
    get_salles('top', 'a', 1, 'false')

    function get_salles(order, letter, page, more) {
        jQuery.get("php/manager.php", {
            method: 'get_salles',
            order: order,
            letter: letter,
            page: page,
            id: localStorage.user,
            token: 0
        }, function(data) {
            if (data.length == 0) {
                $("#salles #salle_display").html("<h1 style=' font-weight: 300;color: #1199ee;'>Selection vide</h1>");
                return
            } else {
                if (more == "false")
                    $("#salles #salle_display").html('');
                html = ""
                i = 0;
                $("#salles #salle_display item.active").removeClass('active').addClass('inactive');
                while (i < data.content.length) {
                    if (i % 3 == 0 && i != 0) {
                        html = html + '<div class="inactive item"> <ul class="thumbnails">';
                    }
                    if (i % 3 == 0 && i == 0) {
                        html = html + '<div class="active item"> <ul class="thumbnails">';
                    }
                    html = html + '<li class="span3 "><div class="thumbnail"><a class="mask" id="' + data.content[i].ID + '"><img class="img-circle coveri" src="img/salles/' + data.content[i].ID + '/cover.jpg" alt="" title="' + data.content[i].ID + '" "> <span style="display:table" class="caption fade-caption img-circle"> <h3 style=" display: table-cell;      vertical-align: middle;">' + data.content[i].title + '</h3>   </span></a><div class="title hidden-desktop"><span class="blue">' + data.content[i].title + '</span> </div> <div class="content fix"><p>' + data.content[i].presentation + '</p></div></div></li>';
                    if (i % 3 == 2)
                        (html = html + '</ul></div>');
                    i++;
                }
                if (i % 3 != 2)
                    (html = html + '</ul></div>');
                $("#salles #salle_display").html(html)
            }
        }, "json");
    }

    function get_page_artists(id) {
        var url = 'php/manager.php?method=page&name=artist&id=' + localStorage.user + '&token=' + localStorage.token + '&param=' + id;
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.onload = function() {
            if (request.status == 200) {
                var result = request.responseText;
                $("#artists").find('.row[title="details"]').html(result);
                $("#artists").find('.row[title="home"]').hide(1000);
                $("#artists").find('.row[title="details"]').show(1000);
                $("#artists").find('#bt_home').show();
                $('#artists .row[title="details"]').find('.video').click(function() {
                    $('#artists .row[title="details"]').find("#ecran").html(' <iframe width="100%" height="300" src="http://www.youtube.com/embed/' + $(this).attr('titles') + '?&wmode=transparent&showinfo=0&theme=dark&frameborder=0&hd=1&autoplay=1"></iframe>');
                });

            }
        }
        request.send(null);
    }

    function get_page_projects(id) {
        var url = 'php/manager.php?method=page&name=project&id=' + localStorage.user + '&token=' + localStorage.token + '&param=' + id;
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.onload = function() {
            if (request.status == 200) {
                var result = request.responseText;
                $("#projects").find('.row[title="details"]').html(result);
                $("#projects").find('.row[title="home"]').hide(1000);
                $("#projects").find('.row[title="details"]').show(1000);
                $("#projects").find('#bt_home').show();
                $('#projects .row[title="details"] .progressbar').each(function() {
                    prc = parseInt(100 * parseInt($(this).attr("value")) / parseInt($(this).attr("final")));
                    $(this).progressbar({
                        value: prc
                    });
                    $(this).find(".progress-label").text($(this).attr("value") + "€");
                    $(this).parent().find(".invested").html('<strong>' + prc + '%</strong> <br> <span id=""> out of ' + $(this).attr("final") + '€  </span>');
                    $(".invested").remove()
                });
            }
        }
        request.send(null);
    }

    function get_page_salles(id) {
        var url = 'php/manager.php?method=page&name=salle&id=' + localStorage.user + '&token=' + localStorage.token + '&param=' + id;
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.onload = function() {
            if (request.status == 200) {
                var result = request.responseText;
                $("#salles").find('.row[title="details"]').html(result);
                $("#salles").find('.row[title="home"]').hide(1000);
                $("#salles").find('.row[title="details"]').show(1000);
                $("#salles").find('#bt_home').show();
            }
        }
        request.send(null);
    }

    function get_page_faq(id) {
        var url = 'php/manager.php?method=page&name=faq&id=' + localStorage.user + '&token=' + localStorage.token + '&param=' + id;
        var request = new XMLHttpRequest();
        request.open("GET", url);
        request.onload = function() {
            if (request.status == 200) {
                var result = request.responseText;
                $("#faq").find('.row[title="details"]').html(result);
                $("#faq").find('.row[title="home"]').hide(1000);
                $("#faq").find('.row[title="details"]').show(1000);
                $("#faq").find('#bt_home').show();
            }
        }
        request.send(null);
    }



    $('.alphabet li div a').bind('click', function() {
        switch ($(this).closest('.alphabet').attr('type')) {
            case 'artist':
                get_artists("alphabet", $(this).attr('title'), 1, 'false');
                break;
            case 'projet':
                get_projets("alphabet", $(this).attr('title'), 1, 'false');
                break;
            case 'salle':
                get_salles("alphabet", $(this).attr('title'), 1, 'false');
                break;
        }
    })

    $('#projects .cities_select').change(function() {
        get_projets('ville', $("#projects .cities_select option:selected").html(), 1, 'false');
    })
    $('#salles .cities_select').change(function() {
        get_salles('ville', $("#salles .cities_select option:selected").html(), 1, 'false');
    })


    $('.tri li  a').bind('click', function() {
        switch ($(this).closest('.tri').attr('type')) {
            case 'artist':
                get_artists($(this).attr('title'), '', 1, 'false');
                break;
            case 'projet':
                get_projets($(this).attr('title'), '', 1, 'false');
                break;
            case 'salle':
                get_salles($(this).attr('title'), '', 1, 'false');
                break;
        }
    })
    if (getUrlParameter('type') != null) {
        var res = getUrlParameter('type').split("_");
        var type_nav = res[0]
        var id_nav = res[1]
    } else {
        var type_nav = "";
        var id_nav = ""
    }
    if (type_nav == "artist" && id_nav != "") {;
        get_page_artists(id_nav);
        $('li[href="#artists-top"]').click()
    }
    if (type_nav == "salle" && id_nav != "") {;
        get_page_salles(id_nav);
        $('li[href="#salles-top"]').click()
    }
    if (type_nav == "projet" && id_nav != "") {;
        get_page_projects(id_nav);
        $('li[href="#projects-top"]').click()
    }
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=662836323774088&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

})

/* Show nav labels on hover (later on scroll) */



//$('.nav li a[href="#mosaique"]').css('display','block');


$("#mosaique-top, #mosaique").hover(
    function () {
        //$('.nav li a[href]').css('display','none');
        $('.nav li a[href="#mosaique"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#mosaique"]').css('display','none');
    }
);

$("#artists-top, #artists").hover(
    function () {
        $('.nav li a[href="#artist-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#artist-top"]').css('display','none');
    }
);

$("#projects-top, #projects").hover(
    function () {
        $('.nav li a[href="#projects-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#projects-top"]').css('display','none');
    }
);

$("#salles-top, #salles").hover(
    function () {
        $('.nav li a[href="#salles-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#salles-top"]').css('display','none');
    }
);

$("#team-top, #team").hover(
    function () {
        $('.nav li a[href="#team-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#team-top"]').css('display','none');
    }
);

$("#faq-top, #faq").hover(
    function () {
        $('.nav li a[href="#faq-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#faq-top"]').css('display','none');
    }
);

$("#contact-top").hover(
    function () {
        $('.nav li a[href="#contact-top"]').css('display','block');
    }, 
    function () {
        $('.nav li a[href="#contact-top"]').css('display','none');
    }
);

/* */


$("#mylogin").bind("click", function() {

    $().interstitial('open', {
        'url': 'login.html'
    });
})
$("#mylogout").bind("click", function() {
    $(this).hide();
    $("#mylogin").show();
    $("#myaccount").hide();
    localStorage.user = '-1'
    localStorage.token = '-1'
    localStorage.projet = '-1'
    localStorage.artist = '-1'
    localStorage.salle = '-1'

    $(".participer").hide();
    $("#login_header").hide()
    $("#liker").hide()
});
$("#myaccount").bind("click", function() {
    if (localStorage.user != "-1") {
        $().interstitial('open', {
            'url': 'compte.html'
        });
    }
})
$("#artist-login ").bind("click", function() {
    if (localStorage.user != "-1") {
        $().interstitial('open', {
            'url': 'artist_login.html'
        });
    } else {
        BootstrapDialog.alert("veuillez vous enregistrer pour acceder à cette rubrique")
    }
})


$("#salle-have").bind("click", function() {
    if (localStorage.user != "-1") {
        $().interstitial('open', {
            'url': 'salle.html'
        });
    } else {
        BootstrapDialog.alert("veuillez vous enregistrer pour acceder à cette rubrique")
    }
})

function progress() {
    $(".progressbar").each(function() {
        prc = parseInt(100 * parseInt($(this).attr("value")) / parseInt($(this).attr("final")));
        $(this).progressbar({
            value: prc
        });
        $(this).find(".progress-label").text($(this).attr("value") + "€");
        $(this).parent().find(".invested").html('<strong>' + prc + '%</strong> <br> <span id=""> out of ' + $(this).attr("final") + '€  </span>');
    })
}
$(".progressbar").each(function() {
    prc = parseInt(100 * parseInt($(this).attr("value")) / parseInt($(this).attr("final")));
    $(this).progressbar({
        value: prc
    });
    $(this).find(".progress-label").text($(this).attr("value") + "€");
    $(this).parent().find(".invested").html('<strong>' + prc + '%</strong> <br> <span id=""> out of ' + $(this).attr("final") + '€  </span>');
})
$("body").delegate(".progressbar", "change", function() {
    $(this).progressbar({
        value: 37
    });
});
$('body').delegate("#comment_btn", "click", function() {
    var id_comment = $(this).attr("comment");
    var comment = $(' textarea[comment="' + $(this).attr("comment") + '"]').val()
    if (comment == "") {
        BootstrapDialog.alert(' veuillez entrer un commentaire ');
        return
    }
    if (localStorage.user == -1) {
        BootstrapDialog.alert(' veuillez vous enregistrer ');
        return
    }
    jQuery.post("php/manager.php", {
        method: 'set_comment',
        id: localStorage.user,
        token: localStorage.token,
        comment: comment,
        id_comment: $(this).attr("comment")
    }, function(data) {
        if (data.etat == "false") {
            BootstrapDialog.alert(data.message);
        } else {
            BootstrapDialog.alert(data.message);
            jQuery.get("php/manager.php", {
                method: 'get_comments',
                id: localStorage.user,
                token: localStorage.token,
                id_comment: id_comment
            }, function(data2) {
                $(".commentaires[comment='" + id_comment + "'] .text").html(data2.content[0])
            }, "json");
        }
    }, "json");
});
$('body').delegate(".like", "click", function() {
    var id_like = $(this).attr("like");
    var hada = $(this)
    if (localStorage.user == -1) {
        BootstrapDialog.alert(' veuillez vous enregistrer ');
        return
    }
    jQuery.post("php/manager.php", {
        method: 'set_like',
        id: localStorage.user,
        token: localStorage.token,
        id_like: id_like
    }, function(data) {
        if (data.etat == "true") {
            hada.html('<img src="img/icons/like.png" style="">  ' + data.likes);
        } else {
            BootstrapDialog.alert("error")
        }
    }, "json");
});
$('body').delegate(".share", "click", function() {

    var imageUrl = $(this).attr("data-img");
    var shareTitle = $(this).attr("data-title");
    var desc = $(this).attr("data-desc");
    var url = $(this).attr("data-url");

    window.open('https://www.facebook.com/dialog/feed? app_id=662836323774088&dscription=' + desc + '&name=' + shareTitle + '&picture=' + imageUrl + ' &display=popup&caption=' + shareTitle + ' &link=' + url + '&redirect_uri=' + url + '');
})

function get_comments(id_comment) {
    jQuery.get("php/manager.php", {
        method: 'get_comments',
        id: localStorage.user,
        token: localStorage.token,
        id_comment: id_comment
    }, function(data) {
        $(".commentaires[comment='" + id + "'] .text").html(data.content)
    }, "json");
}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}

$(window).load(function() {
    $("#status").fadeOut();
    $("#preloader").delay(350).fadeOut("slow");



    myPlaylist = new jPlayerPlaylist({
        jPlayer: "#jquery_jplayer_1",
        cssSelectorAncestor: "#jp_container_1"
    }, [], {
        swfPath: "js",
        supplied: "oga, mp3",
        wmode: "window",
        smoothPlayBar: true,
        keyEnabled: true
    });
    jQuery.get("php/manager.php", {
        method: 'get_mp3',
        id: localStorage.user,
        token: 0
    }, function(data) {
        j = 0;
        while (j < data.length) {
            myPlaylist.add({
                title: data[j],
                mp3: "./data/audio/" + data[j] + ".mp3",
            });
            j++;
        }
        $("#jquery_jplayer_1").jPlayer("play");
    }, "json");
})