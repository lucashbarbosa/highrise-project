$(document).ready(function () {

    contentManager()
    layoutManager()
    tabSystem();




    $(document).on("click", ".sub-menu-open", function(){

        $(".menu-page").css({'display': 'none'});



        $("."+ $(this).attr('data-target')).css({'display': 'block'})

    })



    function tabSystem(){}

    function layoutManager() {

        $(".menu-item").css({ 'height': $(window).height() });
        // alert($(window).height() / 2) - $(this).height();
        $(".img-scroll-wrapper").css({ 'padding-top': ($(window).height() / 2) - $(this).height() })
        $("#banner").css({ 'height': $(window).height() }, function () {
            $(".explore").css({ 'postion': 'absolute' })
        });
        $(".main-city-menu").css({ 'height': $(window).height() * 0.5 });


    }


    $(window).resize(function () {
        layoutManager();
    });


    $(document).on('click', '.explore', function () {


        $(window).scrollTo($(".menu"), 1200);

    });






    function contentManager() {
    }

    $(".endpoint").click(function (){
        $target = $(this).attr('data-target');
        $(".tab-pane").addClass('hidden')
        $("."+ $target).removeClass('hidden');
    })
});
