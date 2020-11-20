<div class="over-menu"></div>
<div class="fixed-page">
    <div class="col-12 menu" id="menu">
        <nav id="nav" role="navigation">

            <ul>
                <li style="border: none !important"><img src="/webroot/img/logo.png"
                        style="width: 100px; padding: 0px !important; "></li>
                <li class="anchor-item "><a class="router-trigger" data-controller="menu" data-from="main-menu"
                        data-target='the-project'>The Project</a></li>
                <li class="anchor-item"><a class="router-trigger" data-controller="menu" data-from="main-menu"
                        data-target='research'>Research</a></li>
                <li class="anchor-item"><a href="/">Case Studies</a></li>
                <li class="anchor-item"><a href="/">Mapping</a></li>
                <li class="anchor-item"><a href="/">Publications</a></li>
                <li class="anchor-item"><a href="/">Team</a></li>
                <li class="anchor-item"><a href="/">News</a></li>
                <li class="anchor-item"><a href="/">Links</a></li>
            </ul>
        </nav>
    </div>
    <div id="main-menu" class='col-10 offset-1 '>


        <div id="show-main-menus">


            <div class="row" style="margin-top: 100px">
                <div class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger sp"
                    style=" background-image: url('/webroot/img/sp.jpg'); " data-controller="city" data-from="main-menu"
                    data-target='sp'>
                    <div class="main-city-cover">
                        <p> SÃO PAULO </p>
                    </div>

                </div>

                <div class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger lyon"
                    style=" background-image: url('/webroot/img/lyon.jpg'); " data-controller="city"
                    data-from="main-menu" data-target='lyon'>
                    <div class="main-city-cover">
                        <p> LYON </p>
                    </div>
                </div>

                <div class="col-12 col-md-4 main-city-menu main-menu-trigger router-trigger london"
                    style=" background-image: url('/webroot/img/london.jpg'); " data-controller="city"
                    data-from="main-menu" data-target='london'>
                    <div class="main-city-cover">
                        <p> LONDON </p>
                    </div>
                </div>
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
                                <i class="fas fa-home"></i>
                                </span>
                                <h3>Producing <br> in highrise</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">
                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <span class="icon-wrap">
                                <i class="fas fa-home"></i>
                                </span>
                                <h3>Narrating <br> the highrise</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mb-4  mb-lg-0">
                            <div class="service aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <span class="icon-wrap">
                                <i class="fas fa-home"></i>
                                </span>
                                <h3>Research Framework</h3>
                                <a href="#" class="btn btn-outline-dark btn-sm mt-2" >Explore</a>
                            </div> <!-- /.service -->
                        </div> <!-- /.col-md-4 -->
                    </div> <!-- /.row -->
                    <div class="more-services mt-5 ">
                        <a href="#" class="btn btn-lg btn-other-cities btn-block">Other Cities</a>
                    </div>
                </div>
            </div>
            <!-- <div class="row axes">

                <div class="col-6 col-md-2  axes-content">
                    <span>Living</span>
                </div>
                <div class="col-6 col-md-2 offset-1 axes-content">
                    <span>Producing</span>
                </div>
                <div class="col-6 col-md-2 offset-1 axes-content">
                    <span>Narrating</span>
                </div>
                <div class="col-6 col-md-2 offset-1 axes-content">
                    <span>Research Framework</span>
                </div>
                <div class="col-6 col-md-2 axes-content">
                    <span>Other Cities</span>
                </div>
            </div> -->
            <!-- <div class="row">
        <div class="col-12 main-menu-trigger oc" style="text-align: center; background-color: tomato; height: 170px ;background-image: url('webroot/img/others.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed "
            data-from="main-menu" data-target='oc'>OTHER CITIES</div>

    </div> -->

        </div>
    </div>
    <?= $this->element('sp') ?>
    <?= $this->element('lyon') ?>
    <?= $this->element('london') ?>
    <?= $this->element('otherCities') ?>
    <?= $this->element('menu-pages/the_project') ?>
    <?= $this->element('menu-pages/case_studies') ?>
    <?= $this->element('menu-pages/contact') ?>
    <?= $this->element('menu-pages/links') ?>
    <?= $this->element('menu-pages/mapping') ?>
    <?= $this->element('menu-pages/news') ?>
    <?= $this->element('menu-pages/publications') ?>
    <?= $this->element('menu-pages/research') ?>
    <?= $this->element('menu-pages/team') ?>
</div>
<!-- <div id='contact' class='col-12 contact-page'
    style="background-image: url('/webroot/img/research.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; padding-top: 0">
    <div class="city-cover" style="padding-top: 50px">

        <div class="col-10 offset-1 city-menu-item-data" style="padding: 5%; background-color: #fff; -webkit-box-shadow: 7px 7px 5px 0px rgba(163, 165, 168, 0.85);
-moz-box-shadow:    7px 7px 5px 0px rgba(163, 165, 168, 0.85);
box-shadow:         7px 7px 5px 0px rgba(163, 165, 168, 0.85);">
            <h1> Contact us </h1>
            <form>
                <div class="form-group">
                    <div class="form-inline">

                        <input type="email" class="form-control col-5" id="exampleFormControlInput1"
                            placeholder="Your Email">

                        <input type="email" class="form-control col-6 offset-1" id="exampleFormControlInput1"
                            placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="btn btn-primary">Send</div>
            </form>

        </div>
    </div>

</div> -->
