<?php $menus = (object) $menus[0] ?>
<h1 class="h3 mb-0 text-gray-800">Menu Configuration </h1>
<div class="col-12 mt-5">
    <form action = "/admin/menus/save/<?= $menus->id?>"  method = "post" >
        <h1 class="h4 mb-0 text-gray-800">Edit Menu </h1><br>
        <div class="row">
            <div class="col">
                <span> Menu Name </span>
                <input type="text" class="form-control" name="name" placeholder="First name" readonly
                    value="<?= isset($menus->name) ? $menus->name : ""?>">
            </div>

            <div class="col">
                <span> Display Name </span>
                <input type="text" class="form-control" name=display_name placeholder="Last name"
                    value="<?= isset($menus->display_name) ? $menus->display_name : ""?>">
            </div>
            <div class="col">
                <span> Order </span>
                <input type="text" class="form-control" name="order" placeholder="Last name"
                    value="<?= isset($menus->order) ? $menus->order : ""?>">
            </div>
        </div>
        <button type = "submit" class = "btn btn-primary mt-3" value = "Save">Save </button>
    </form>

    <hr class="my-3"/>

    <div class="row">
        <div class="col">
            <h1 class="h4  text-gray-800">Pages</h1><br>

            <?php foreach ($menus->sub_menus as $page){
            $page = (object)$page;
            $names[] = $page->display_name;
        ?>
            <a href='/admin/submenu/edit/<?= $page->id ?>' class="btn btn-primary"><?= $page->display_name ?></a>
            <?php } ?>
        </div>
    </div>


        <h5 class = "mt-5">Select above to add or remove pages </h5>

        <div class="row ">
            <div class="col">
                <form>
                    <?php foreach($data['submenus'] as $pages) {
                        $pages = (object) $pages; ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" <?= in_array($pages->display_name, $names ) ? "checked" : ""?>
                            type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1"><?= $pages->display_name; ?></label>
                    </div>
                    <?php } ?>

                    <button type = "submit" class = "btn btn-primary mt-3" value = "Save">Save </button>
                </form>
            </div>


    </div>
