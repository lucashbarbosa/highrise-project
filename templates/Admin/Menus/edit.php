<?php


?>
<h1 class="h3 mb-0 text-gray-800">Menu Configuration </h1>
<div class="col-12 mt-5">

    <h1 class="h4 mb-0 text-gray-800">Edit Menu </h1><br>
    <div class="row">
        <div class="col">
            <span> Menu Name </span>
            <input type="text" class="form-control" name="name" placeholder="First name" readonly value="<?= isset($menus->name) ? $menus->name : "" ?>">
        </div>

        <div class="col">
            <span> Display Name </span>
            <input type="text" class="form-control" readonly name=display_name placeholder="Last name" value="<?= isset($menus->display_name) ? $menus->display_name : "" ?>">
        </div>
        <div class="col">
            <span> Order </span>
            <input type="text" class="form-control" readonly name="order" placeholder="Last name" value="<?= isset($menus->order) ? $menus->order : "" ?>">
        </div>
    </div>
    <input type="hidden" class="menu_id" value="<?= $menus->name ?>">


    <hr class="my-3" />

    <div class="row">
        <div class="col">
            <h1 class="h4  text-gray-800">Menu Structure</h1><br>
            <div class="folder-structure">

                <div class="folder-level">
                    <p class="folder-item"><i class="fa fa-folder-open"></i> &nbsp; <?= $menus->display_name ?> -
                    <span class="add-submenu" data-menu-id = "<?= $menus->id?>" data-submenu-id = "<?= $menus->id?>" data-submenu-pai = "true" data-toggle="modal" data-target="#add-submenu">
                                    <span class="menu-trigger"> <i class="fa fa-plus"></i> add new submenu</span>
                                </span>
                    </p>

                    <div class="folder-level">
                        |

                        <?php
                        if(!is_null($menus->submenus)){
                        foreach ($menus->submenus as $submenu) { ?>

                            <p class="folder-item">
                                <i class="fa fa-file"> </i>&nbsp;
                                <?= $submenu->name ?> <i class="fa fa-arrow-right"> </i>
                                            <span> <small><?= $submenu->page_name ?> </small> </span> - <i class="fa fa-edit menu-trigger"></i>  <i class="fa fa-arrow-right"> </i>
                                <span class="add-submenu" data-menu-id = "<?= $menus->id?>" data-submenu-id = "<?= $submenu->id?>"  data-toggle="modal" data-target="#add-submenu">
                                    <span class="menu-trigger"> <i class="fa fa-plus"></i> add new submenu</span>
                                </span><br>
                                <?php
                                if (count($submenu->tree) > 0) {

                                    foreach ($submenu->tree as $tree) {
                                        $tree = (object) $tree;

                                ?>
                                        <span class="folder-item" style="margin-left: 40px;">
                                            <i class="fa fa-file"> </i>&nbsp;
                                            <span> <?= $tree->name ?> </span> <i class="fa fa-arrow-right"> </i>
                                            <span> <small><?= $tree->page_name ?> </small> </span>

                                                <span class="menu-trigger remove-submenu" data-menu-remove-id = "<?= $submenu->id ?>"  data-submenu-remove-id = "<?= $tree->id ?>">  <i class="fa fa-minus-circle"></i> Remove </span>


                                        </span><br>
                                <?php

                                    }
                                }
                                ?>
                            </p><br>
                        <?php  } } ?>



                        </p>

                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade" id="addpage" tabindex="-1" role="dialog" aria-labelledby="addpageLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select one or more pages to add to this sub-menu
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php foreach ($pages as $page) {
                            $page = (object) $page; ?>
                            <div class="btn btn-success btn-sm mb-1" data-page-id="<?= $page->id ?>"><?= $page->name ?>
                            </div></br>
                        <?php } ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="add-submenu" tabindex="-1" role="dialog" aria-labelledby="addpageLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select submenu page
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action = "/admin/submenus-dto/add" method = "post">
                            <input type = "hidden" class = "add_menu_id" name = "menu_id">
                            <input type = "hidden" class = "add_submenu_id" name = "submenu_id">
                            <input type = "hidden" class = "submenu_pai" name = "submenu_pai" value = "false">
                            <div class="row">
                                <div class="col">
                                    <span>Submenu name</span>
                                    <input type="text" class="form-control" required name="submenu_name" placeholder="Submenu Name">
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <span>Select the page</span>
                                        <select required name = "page_id" class="form-control" >
                                            <?php foreach ($pages as $page) {
                                                $page = (object) $page; ?>
                                                <option value="<?= $page->id ?>"><?= $page->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
