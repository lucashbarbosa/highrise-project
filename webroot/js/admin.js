$(document).ready(function () {



    $('.editor').summernote({
        height: '500'
    });
    // bkLib.onDomLoaded(function () { nicEditors.allTextAreas() });


    $(".remove-image").click(function () {
        image = $(this).attr("data-image");
        page = $(".this-page").val();
        console.log({ image, page })

        removeImage(image, page);
    })

    function removeImage(image, page) {

        $.ajax({
            type: "POST",
            url: "/admin/images/removeImageFromPage/" + image + "/" + page,
            dataType: "JSON",
            success: function (response, error, err) {

                $(".id-" + image).parent().remove();
            }
        });
    }


    $(".add-submenu").click(function () {
        menuId = $(this).attr("data-menu-id")
        subMenuId = $(this).attr("data-submenu-id")
        submenuPai  = $(this).attr("data-submenu-pai")

        if(submenuPai == 'true') {

        $(".submenu_pai").val(submenuPai)
        }

        $(".add_menu_id").val(menuId)
        $(".add_submenu_id").val(subMenuId)

    });



    $(".remove-submenu").click(function () {
        menuId = $(this).attr("data-menu-remove-id")
        subMenuId = $(this).attr("data-submenu-remove-id")


        $.ajax({
            type: "POST",
            url: "/admin/submenus-dto/remove-submenu/" + menuId + "/" + subMenuId,
            dataType: "HTML",
            success: function (response, error, err) {
                location.reload()
            }
        });


    });




    const copyToClipboard = str => {
        const el = document.createElement('textarea');
        el.value = str;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        alert("Copied to clipboard!");
      };

      $(".copy-clipboard").click(function () {
        reference = $(this).attr("data-reference");

        text = $("."+reference).text();

        copyToClipboard(text);

    })
    // function copyToClipboard(copyTextarea) {

    //     copyTextarea.focus();
    //     console.log(copyTextarea.select());

    //     try {
    //       var successful = document.execCommand('copy');

    //       var msg = successful ? 'successful' : 'unsuccessful';
    //       console.log('Copying text command was ' + msg);
    //     } catch (err) {
    //       console.log('Oops, unable to copy');
    //     }

    //   }




})
