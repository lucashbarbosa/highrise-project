<?php $pageName = "london"?>
<div id = '<?= $pageName ?>' class='col-12  menu-page' style="display: none; background-color: red;  background-image: url('/webroot/img/<?= $pageName ?>.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed ">
<div class = "city-cover">
<div class = "btn btn-primary back <?= $pageName ?>-back" data-target = '<?= $pageName ?>' data-previous = "">back</div>
<div class="col-8 offset-2">
            <h2>Highrise - <?= $pageName ?></h2>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#menu1">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#menu2">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#menu3">Active</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo.</p>
                </div>
            </div>
            <hr>
            <p class="act"><b>Active Tab</b>: <span></span></p>
            <p class="prev"><b>Previous Tab</b>: <span></span></p>
        </div>
</div>
</div>
