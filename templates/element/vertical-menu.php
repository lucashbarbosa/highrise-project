<?php $controller = isset($controller) ? $controller : ""?>
<div class="col-12 menu" id="menu">
        <nav id="nav" role="navigation">

            <ul>
                <li style="border: none !important"><a href = "/"><img src="/webroot/img/logo.png" style="width: 100px; padding: 0px !important; "></a></li>
                <li class="anchor-item "><a class = "<?= $controller == 'symposium' ? 'active' : ''?>" href ='symposium'>Symposium</a></li>
                <li class="anchor-item "><a class = "<?= $controller == 'the-project' ? 'active' : ''?>" href ='the-project'>The Project</a></li>
                <li class="anchor-item"><a  class = "<?= $controller == 'research-themes' ? 'active' : ''?>" href ='research-themes'>Research Themes</a></li>
                <li class="anchor-item"><a  class = "<?= $controller == 'case-studies' ? 'active' : ''?>" href ='case-studies'>Case Studies</a></li>
                <li class="anchor-item"><a  class = "<?= $controller == 'mapping' ? 'active' : ''?>" href ='mapping'>Mapping</a></li>
                <li class="anchor-item"><a  class = "<?= $controller == 'topics' ? 'active' : ''?>" href ='topics'>Topics</a></li>
                <li class="anchor-item"><a  class = "<?= $controller == 'products' ? 'active' : ''?>" href ='products'>Products</a></li>

                <li class="anchor-item"><a  class = "<?= $controller == 'search' ? 'active' : ''?>" href ='search'>Search <i class="fas fa-search"></i> </a></li>

            </ul>
        </nav>
    </div>
