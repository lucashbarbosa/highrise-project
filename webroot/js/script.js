$(document).ready(function () {

    contentManager()
    layoutManager()
    tabSystem();

    // setTimeout(function(){
    //     $(".banner-text").removeClass('hidden')
    //     $(".explore").removeClass('hidden')
    // },4500)

    // window.history.pushState('page2', 'Title', '/page2.php');



    $(".sub-menu-trigger").hover(

        function () {
            $(this).find('ul').removeClass('hidden');
        },

        function () {
            $(this).find('ul').addClass('hidden');
        }
    );


    function tabSystem() {

        $(".nav-tabs a").click(function () {
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function (event) {
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    }


    function layoutManager() {

        $(".menu-item").css({ 'height': $(window).height() });
        // alert($(window).height() / 2) - $(this).height();
        $(".img-scroll-wrapper").css({ 'padding-top': ($(window).height() / 2) - $(this).height() })
        $("#banner").css({ 'height': $(window).height() }, function () {
            $(".explore").css({ 'postion': 'absolute' })
        });
        $(".main-city-menu").css({ 'height': $(window).height() * 0.5 });

        // $(".menu").css({ 'padding-top': $(".menu").height() * 0.25 })
        // $(".menu-inside").css({ 'padding-top': $(".menu").height() * 0.25 })
        // $(".menu-page").css({ 'min-height': $(window).height() * 0.7 });



    }
    $(window).resize(function () {
        layoutManager();
    });


    $(document).on('click', '.explore', function () {


        $(window).scrollTo($(".menu"), 1200);

    });





    function contentManager() {
        // $(document).on('click', '.main-menu-trigger', function () {


        //     target = $(this).attr('data-target');
        //     from = $(this).attr('data-from');

        //     forward(target, from);
        // });

        // $(document).on('click', '.back', function () {
        //     target = $(this).attr('data-target');
        //     to = $(this).attr('data-previous');

        //     back(target, to);
        // });

        // $(document).on('click', '.other-cities', function () {
        //     target = $(this).attr('data-target');
        //     to = $(this).attr('data-previous');

        //     forward(target, to);
        // });
    }


    // function forward(target, from) {
    //     $("." + target + "-back").attr('data-previous', from)
    //     $(".menu-page").hide();
    //     $( "#" + target ).show( "slow", "swing", function() {

    //     });
    //     $("#main-menu").hide( )


        // $().animate({ 'height': $(window).height() * 0.7 }, 500, function () {
        //     // $(this).toggleClass('hidden');
        //     $(window).scrollTo($(".over-menu"), 500);
        // });




        // $("#"+from).animate({'height': '0'}, 500, function(){
        //     $(this).toggleClass('hidden');
        //     $(window).scrollTo($(".over-menu"), 500);
        // });


    // }

    // function back(target, to) {

    //     $("#" + to).show( "slow", "swing", function() {

    //     });
    //     $( "#" + target ).hide();
        // $("#" + target).animate({ 'height': '0' }, 500, function () {
        //     $("#" + to).css({ 'height': $(window).height() })
        //     $(this).toggleClass('hidden');
        //     $(this).css({ 'height': $(window).height() })

        // });
        // $("#"+to).toggleClass('hidden');


    // }


    $(".endpoint").click(function (){
        $target = $(this).attr('data-target');
        $(".tab-pane").addClass('hidden')
        $("."+ $target).removeClass('hidden');
    })
});
