<input class="this-page" type="hidden" value=<?= isset($page['page_id']) ? $page['page_id'] : "" ?> />


<div class="btn btn-primary show-mosaic-form mb-4">Add new mosaic item</div>

<form class="mosaic-form hidden" action="/admin/mosaic/save/<?= $page['page_id'] . "/" . $page['id'] . "/new" ?>" enctype="multipart/form-data" method="POST">
    <div class="form-group col-12">
        <label>Cover text</label><br>
        <input type="text" name="cover_text" class="form-control" placeholder="text">
    </div>
    <div class="form-group col-12">
        <small> mininum resolution 280x400, if the image is out of this resolution/proportion, the page will automatically resize </small>
        <br><label>Cover Image</label><br>
        <input class="btn btn-primary mb-2" type="file" size="32" name="image" value=""> </br>
    </div>

    <div class="form-group col-12">
        <label>Item title</label>
        <input type="text" name="title" class="form-control" placeholder="Title">
    </div>
    <div class="form-group col-12">
        <label>Text</label>
        <div class="form-group col-12">
            <textarea rows="15" name="text" class="form-control editor"></textarea>
        </div>
    </div>


    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
<hr />
<div class="col-12">
    <div class="row">

        <?php foreach ($page['itens'] as $item) {
            $item = (object)$item; ?>

            <div class="- mb-3 mr-3 mosaic-preview mosaic-img " data-target="mosaic-<?= $item->id ?>" style="background-image: url('/webroot/uploaded_files/<?= $item->cover_photo_url ?>' ); height: 400px; width: 280px; padding: 0">
                <div class="mosaic-options">
                    <p> <?= $item->cover_text ?> </p>
                </div>
            </div>

            <div class="col-12 edit-mosaic hidden  mosaic-<?= $item->id ?>">
                <form action="/admin/mosaic/save/<?= $page['page_id'] . "/" . $page['id']  ?>" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="mosaic-id" value="<?= $item->id ?>">
                    <div class="form-group col-12">
                        <label>Cover text</label>
                        <input type="text" name="cover_text" value="<?= isset($item->cover_text) ? $item->cover_text : "" ?>" class="form-control" placeholder="text">
                    </div>
                    <div class="form-group col-12">
                        <small> mininum resolution 280x400, if the image is out of this resolution/proportion, the page will automatically resize </small>
                        <label>Cover Image</label><br>
                        <input class="btn btn-primary mb-2" type="file" size="32" name="image" value=""> </br>
                        <div class="col-3 " style="background-image: url('/webroot/uploaded_files/<?= $item->cover_photo_url ?>'); height: 400px; width: 280px; padding: 0"></div>
                    </div>

                    <div class="form-group col-12">
                        <label>Item title</label>
                        <input type="text" name="title" value="<?= isset($item->title) ? $item->title : "" ?>" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group col-12">
                        <label>Text</label>
                        <div class="form-group col-12">
                            <textarea rows="15" name="text" class="form-control editor"><?= isset($item->text) ? $item->text : "" ?></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                </form>
            </div>

        <?php } ?>

    </div>
</div>







<a class="btn btn-secondary ml-2 mt-3" href="/admin/pages/">Back</a>
