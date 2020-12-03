<div class="over-menu"></div>
<div class="fixed-page">
    <?= $this->element('vertical-menu')?>
    <div id="main-menu" class='col-10 offset-1 '>


        <div id="show-main-menus">


            <div class="row" style="margin-top: 100px">

                <a href = "sao-paulo" class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger sp"
                    style=" background-image: url('/webroot/img/sp.jpg'); " >
                    <div class="main-city-cover">
                        <p> SÃO PAULO </p>
                    </div>

                </a>

                <a href = "lyon" class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger lyon"
                    style=" background-image: url('/webroot/img/lyon.jpg'); ">
                    <div class="main-city-cover">
                        <p> LYON </p>
                    </div>
                </a>

                <a href = "london" class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger london"
                    style=" background-image: url('/webroot/img/london.jpg'); ">
                    <div class="main-city-cover">
                        <p> LONDON </p>
                    </div>
                </a>
            </div>
            <div class="services-v1">
            <h4>Research Themes </h4>
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">


                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                <span class="icon-wrap">
                                <i class="fas fa-home"></i>
                                </span>
                                <h3>Living <br> in highrise</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">
                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <span class="icon-wrap">
                                <i class="fas fa-industry"></i>
                                </span>
                                <h3>Producing <br> in highrise</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">
                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <span class="icon-wrap">
                                <i class="fas fa-volume-up"></i>
                                </span>
                                <h3>Narrating <br> the highrise</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">
                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <span class="icon-wrap">
                                <i class="fab fa-searchengin"></i>
                                </span>
                                <h3>Research Framework</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2" >Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                    </div> <!-- /.row -->
                    <div class="more-services mt-5 ">
                        <a  class="btn btn-lg btn-other-cities btn-block router-trigger" data-controller="city"
                    data-from="main-menu" data-target='other-cities'>Other Cities</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class = "page-render">

    </div>
</div>

