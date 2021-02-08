<!-- Heading -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion <?= isset($loginPage) ? 'hidden' : '' ?>"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-city"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HIGHRISE</div>
    </a>

    <!-- Divider -->


    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading ">
        Configurações
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/menus/index">
            <i class="fas fa-fw fa-table"></i>
            <span>Menus</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/pages/index">
            <i class="fas fa-fw fa-table"></i>
            <span>Pages</span></a>
    </li>

    <li class="nav-item hidden">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Templates:</h6>
                <?php foreach($data['templates'] as $template) {
                    $template = (object) $template;
                ?>
                <a class="collapse-item" href="/admin/city/<?= $template->id ?>"><?= $template->name?></a>
                <?php } ?>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>
