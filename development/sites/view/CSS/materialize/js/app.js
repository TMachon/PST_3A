$(".dropdown-trigger").dropdown();

$(document).ready(function(){
	$('.fixed-action-btn').floatingActionButton();
});

$(document).ready(function(){
    $('select').formSelect();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewAvatar')
                .attr('src', e.target.result)
                .width('30%')
                .height('30%');
        };
        reader.readAsDataURL(input.files[0]);
    }
}


function redirectViderBDTutorial() {
    if (confirm("En supprimant les tutoriels, les commentaires seront aussi supprimés. Continuer ?"))
        window.location.href = "../controller/viderBDTutorial.php";
}

function redirectViderBDForums() {
    if (confirm("En supprimant les forums, les commentaires seront aussi supprimés. Continuer ?"))
        window.location.href = "../controller/viderBDForums.php";
}

function redirectViderBDComptes() {
    if (confirm("Voulez-vous vraiment supprimer les comptes des utilisateurs ?")) window.location.href = "../controller/viderBDComptes.php";
}

function redirectViderBDAnswerTurorial() {
    if (confirm("Voulez-vous vraiment supprimer les réponses des tutoriels ?")) window.location.href = "../controller/viderBDAnswerT.php";
}

function redirectViderBDAnswerForum() {
    if (confirm("Voulez-vous vraiment supprimer les réponses des forums ?")) window.location.href = "../controller/viderBDAnswerF.php";
}

// Vérifier la ReGex d'une adresse email
function validateEmail(email) {
    var re =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}

function verifConnection() {
    if ($("[name=mail]").val() == "") alert("L'adresse mail n'a pas été renseignée !");
    else if(!validateEmail($("[name=mail]").val())) alert("Email invalide !");

    if ($("[name=password]").val() == "") alert("Un mot de passe est obligatoire pour se connecter !");   
}

function verifInscription() {
    if ($("[name=mail]").val() == "") alert("L'adresse mail n'a pas été renseignée !");
    else if(!validateEmail($("[name=mail]").val())) alert("Email invalide !");

    if ($("[name=prenom]").val() == "") alert("Le nom n'a pas été renseigné !");
    if ($("[name=nom]").val() == "") alert("Le prénom n'a pas été renseigné !");
    if ($("[name=password]").val() == "") alert("Un mot de passe est obligatoire pour s'inscrire !");
}

function verifModifierPassword() {
    if ( $("[name=ActualPassword]").val() == "" || $("[name=NewPassword]").val() == "" || $("[name=ConfirmedNewPassword]").val() == "")
        alert("Vous devez renseigner chaque champ pour modifier le mot de passe !");

    else if ($("[name=NewPassword]").val() != $("[name=ConfirmedNewPassword]").val()){
        alert("Les champs ne correspondent pas !")
    }

}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

function supprimerForum(idForum) {
    if (confirm("Voulez-vous vraiment supprimer ce forum ?")) window.location.href = "../controller/supprimerForum.php?id_for=" + idForum;
}

function supprimerTutoriel(idTutoriel) {
    if (confirm("Voulez-vous vraiment supprimer ce tutoriel ?")) window.location.href = "../controller/supprimerTutoriel.php?id_tuto=" + idTutoriel;
}

function supprimerDemande(idDemande) {
    if (confirm("Voulez-vous vraiment supprimer cette demande d'information ?")) window.location.href = "../controller/supprimerDemande.php?id_demande=" + idDemande;
}

$(document).ready(function(){
    $('.carousel').carousel(
    {
        indicators : true
    });
});

$('.carousel.carousel-slider').carousel();

function readURLSeveralImages(input) {
    if (input.files) {

        for(var i = 0; i < input.files.length; i++){
            var reader = new FileReader();

            /*reader.onload = function (e) {
                $("#DivIllustrations").append("<a class=\"carousel-item\">");
                $($.parseHTML("<img id=\"illustrations\">"))
                    .attr('src', e.target.result)
                    .appendTo('#DivIllustrations');
                $("#DivIllustrations").append("</a>");
            };*/

            $("#DivIllustrations").append("<a class=\"carousel-item\" id=\"a_img\">");
            reader.onload = function (e) {
                alert(e.target.result);
                    $($.parseHTML("<img id=\"creation_illustrations\">"))
                        .attr('src', e.target.result)
                        .appendTo('#a_img');
                        $("#a_img").append("</a>");
            };

            reader.readAsDataURL(input.files[i]);
        }
    }
}