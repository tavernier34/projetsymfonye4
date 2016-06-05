/**
 * Created by termi on 05/06/2016.
 */

$(function () {
    // Document.ready -> link up remove event handler
    $(".deleteLink").click(function(){
        // R�cup�ration de la ligne en cours
        var oTR = $(this).parent().parent();
        // R�cup�ration de l'id du film : row-NUMERO -> suppression de 'row-'
        var idNote = oTR.attr("id").substring(4);
        // R�cup�ration du titre
        var titre = oTR.find("#titre").html();

        if (idNote != '' && confirm("Voulez-vous supprimer la note '" + titre + "' ? "))
        {
            // Affiche l'image d'attente
            $('#loader').show('slow', null);

            // Perform the ajax post
            /*$.post("/admin/film/delete", { "id": idFilm },
             function (data) {
             // Successful requests get here
             if (data.status == 0) {
             $('#row-' + data.id).fadeOut('slow');
             $('#update-message').attr("class", 'label label-success');
             }
             else
             $('#update-message').attr("class", 'label label-important');
             $('#update-message').text(data.message);
             $('#update-message').show('slow', null).delay(6000).hide('slow'); 
             });*/
            $.ajax({
                url: "/app_dev.php/admin/professeur/delete",
                type: "post",
                data: { "id": idNote },
                success: function(data){
                    if (data.status == 0) {
                        $('#row-' + data.id).fadeOut('slow');
                        $('#update-message').attr("class", 'label label-success');
                    }
                    else
                        $('#update-message').attr("class", 'label label-important');
                    $('#update-message').text(data.message);
                    $('#update-message').show('slow', null).delay(6000).hide('slow');
                },
                error:function(){
                    alert("Erreur d'acc�s � la m�thode de suppression");
                }
            });
            // Cache l'image d'attente
            $('#loader').hide();
        }
    });
});

