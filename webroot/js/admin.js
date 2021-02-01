$(document).ready(function (){

    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });


    $(".remove-image").click(function () {
        image = $(this).attr("data-image");
        page = $(".this-page").val();
        console.log({image, page})

        removeImage(image, page);
    })

    function removeImage(image, page){

        $.ajax({
            type: "POST",
            url: "/admin/images/removeImageFromPage/"+ image + "/" + page,
            dataType: "JSON",
            success: function (response, error, err) {

                $(".id-"+image).parent().remove();
            }
        });
    }

})
