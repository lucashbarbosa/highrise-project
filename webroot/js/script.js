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
        $("#banner-text").css({ 'height': $(window).height() }, function () {
            $(".explore").css({ 'postion': 'absolute' })
        });
        $(".main-city-menu").css({ 'height': $(window).height() * 0.5 });


    }


    $(window).resize(function () {
        layoutManager();
    });


    $(document).on('click', '.explore', function () {


        $(window).scrollTo($("#banner-text"), 1200);
        $('#banner-video').get(0).pause();

    });







    function contentManager() {
    }

    $(".endpoint").click(function (){
        $target = $(this).attr('data-target');
        $(".tab-pane").addClass('hidden')
        $("."+ $target).removeClass('hidden');
    })



    //only-images scripts


    //publication scripts

    $(document).on('click', ".explore-publication-trigger", function(){
        id = $(this).attr('data-publication-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").addClass('hidden');
        $(id).removeClass('hidden');

    });


    $(document).on('click', ".explore-publication-back-trigger", function(){
        id = $(this).attr('data-publication-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").removeClass('hidden');
        $(id).addClass('hidden');

    });



    //cartographies _options

    $(document).on('mouseenter', '.cartographies-img', function(){
        $(this).find('.cartographies-options').removeClass('hidden');
    });
    $(document).on('mouseleave', '.cartographies-img', function(){
        $(this).find('.cartographies-options').addClass('hidden');
    });




    $(document).on('click', ".explore-cartography-trigger", function(){
        id = $(this).attr('data-cartography-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").addClass('hidden');
        $(id).removeClass('hidden');

    });


    $(document).on('click', ".explore-cartography-back-trigger", function(){
        id = $(this).attr('data-cartography-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").removeClass('hidden');
        $(id).addClass('hidden');

    });


    //team scripts

    $(document).on('click', ".explore-team-trigger", function(){
        id = $(this).attr('data-team-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").addClass('hidden');
        $(id).removeClass('hidden');

    });


    $(document).on('click', ".explore-team-back-trigger", function(){
        id = $(this).attr('data-cartography-id');
        subpage = $(this).attr('data-subpage-name');
        console.log([id, subpage])
        $("." + subpage + "-preview").removeClass('hidden');
        $(id).addClass('hidden');

    });



    $(document).on('mouseenter', '.teams-img', function(){
        $(this).find('.teams-options').removeClass('hidden');
    });
    $(document).on('mouseleave', '.teams-img', function(){
        $(this).find('.teams-options').addClass('hidden');
    });
});
