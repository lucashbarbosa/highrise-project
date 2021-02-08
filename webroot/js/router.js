$(document).ready(function () {




    const urlParams = $("#navigation-data")

    controller = urlParams.attr("data-url-controller")
    action = urlParams.attr("data-url-action")
    param1 = urlParams.attr("data-url-param1")
    param2 = urlParams.attr("data-url-param2")

    navigator(controller, action, param1, param2);

    function navigator(controller, action, param1, param2, from) {
        if (controller != "") {
            if (action != "") {
                if (param1 != "") {
                    //link com 2 menus
                } else {
                    //link com 1 menu
                    forward(action, from)
                }

            } else {
                forward(controller, from)
            }
        } else {
            //não faz nada, página inicial.
        }

    }

    async function loadPage(target) {
        try {


            const result = await $.ajax({
                type: "GET",
                url: "/twig/index/" + target,
                dataType: "HTML"

            });
            $(".page-render").html(result);
            console.log($(".active"))
        } catch (e) {
            $(".page-render").html(e.responseText);
            console.log(e.responseText);
        }
    }



    function setHistory(page, title, url) {
        window.history.pushState('page2', 'Title', '/page2.php');
    }

    async function forward(target, from) {

        await loadPage(target);


        $("." + target + "-back").attr('data-previous', from)
        $(".menu-page").hide();
        $("#" + target).show("slow", "swing", function () {
            $(window).scrollTo($(".menu"), 1200);
        });
        if (target != "menu") {
            $("#main-menu").hide()
        }
    }

    function back() {

        $(".menu-page").hide();
        $("#main-menu").show("slow", "swing")


    }


    $(document).on('click', '.back', function () {
        back();
    });

    $(document).on('click', ".router-trigger", function () {
        route = $(this);



        navigator(route.attr('data-controller'), route.attr('data-target'), "", "", route.attr('data-from'))
    });


    function setStorage(field, value) {
        localStorage.setItem(field, value);
    }
    function getStorage(field) {
        return localStorage.getItem(field);
    }
});
