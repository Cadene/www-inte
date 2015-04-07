type_participation = "";
participation = $('#participation_form')
participation.find(".particip_img").click(function() {
    type_participation = $(this).attr("data-content");
    $("#participation_form img.active").removeClass("active");
    $(this).addClass("active")
})
participation.find(".particip_img").tooltip();
//participation.find("#help1").popover()
var d = new Date();
var n = d.getTime();
jQuery.get("php/w_admin.php", {
        method: 'getTarifs',
        id_projet: localStorage.projet,
        id: localStorage.user,
        token: localStorage.token,
        date: n
    },
    function(data) {
        console.log(data)
        participation.find(".tarif").each(function() {
            $(this).html("" + data[$(this).attr('data-name')] + "€")
        })
    },
    "json");


participation.find("#participer_btn").click(function() {

    if (type_participation == "") {
        alert("Veuiller choisir un type de participation");
        return
    }
    participation.find("#_participation").hide()
    participation.find("#_inscription").show()

})

participation.find('#cancel_participation').click(function() {
    participation.find("#_participation").show()
    participation.find("#_inscription").hide()
})
participation.find('#envoyer_participation').click(function() {

    ret = "true"



    nom = participation.find('#_inscription input[name="nom"]').val();
    prenom = participation.find('#_inscription input[name="prenom"]').val();

    societe = participation.find('#_inscription input[name="societe"]').val();

    phone = participation.find('#_inscription input[name="phone"]').val();

    mail = participation.find('#_inscription input[name="mail"]').val();
    addresse = participation.find('#_inscription input[name="address"]').val();




    htlm = "<table><tr><td>Participation</td><td>" + type_participation + "</td></tr><tr><td>nom</td><td>" + nom + "</td></tr><tr><td>prenom</td><td>" + prenom + "</td></tr><tr><td>adresse</td><td>" + addresse + "</td></tr><tr><td>societe</td><td>" + societe + "</td></tr><tr><td>mail</td><td>" + mail + "</td></tr><tr><td>phone</td><td>" + phone + "</td></tr></table>"




    jQuery.post("php/manager.php", {
            method: 'sendmail',
            message: htlm,
            id: localStorage.user,
            token: localStorage.token
        },

        function(data) {

            if (data.etat == "false") {
                alert(data.message);
                return
            } else {

                alert("votre demande a bien été enregistrée,merci pour votre collaboration !")

                $().interstitial('close');



            }



        }, "json");



});