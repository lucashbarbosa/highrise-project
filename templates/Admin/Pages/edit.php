<?php
debug($formdata);

$fields = $formdata['fields'];
$page = $formdata['page'];

?>

<h3> Pages - Edit </h3>


<h2 class="mt-5 mb-5"><?= $page['name'] ?></h2>
<form method="POST">
    <div class="form-row">

        <?php foreach ($fields as $field) {
            $field = (object)$field;
        ?>
            <div class="form-group col-md-12">
                <label for="inputEmail4"><?= $field->field ?></label>
                <?php if ($field->data_type == "text") { ?>
                    <input type="text" name="<?= $field->field ?>" class="form-control" value="<?= $page[$field->field] ?>" id="inputEmail4" placeholder="<?= $field->field ?>">
                <?php } else if ($field->data_type == "textarea") { ?>

                    <div id="editor" data-field = "teste">
                        <?= $page[$field->field] ?>
                    </div>

                    <input type="hidden" class = "editor-content" name = "<?= $field->field?> ">

                <?php } ?>
            </div>
        <?php } ?>


        <button class="btn btn-primary" type="submit">Save</button>
    </div>

</form>
