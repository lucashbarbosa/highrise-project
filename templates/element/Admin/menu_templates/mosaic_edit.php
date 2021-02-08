<input class="this-page" type="hidden" value=<?= $page['page_id'] ?> />

<?php debug($page)?>
<form action="/admin/mosaic/save/<?= $page['page_id'] . "/" . $page['id'] ?>" enctype="multipart/form-data" method="POST">
    <div class="form-group col-12">
        <label>Cover text</label>
        <input type="text" name="cover_text" value="<?= isset($page['cover_text']) ? $page['cover_text'] : "" ?>" class="form-control" placeholder="text">
    </div>
    <div class="form-group col-12">
        <small> mininum resolution 280x400, if the image is out of this resolution/proportion, the page will automatically resize </small>
        <label>Cover Image</label><br>
        <?php if(!is_null($page['cover_photo_url'])) {?>
        <input class="btn btn-primary mb-2" type="file" size="32" name="image" value=""> </br>
        <?php if(!is_null($page['cover_photo_url'])) { ?>
        <div class="col-3 " style = "background-image: url('/webroot/uploaded_files/<?= $page['cover_photo_url'] ?>'); height: 400px; width: 280px; padding: 0"></div>
        <?php } ?>
    </div>

    <div class="form-group col-12">
        <label>Item title</label>
        <input type="text" name="title" value="<?= isset($page['title']) ? $page['title'] : "" ?>" class="form-control" placeholder="Title">
    </div>
    <div class="form-group col-12">
        <label>Item text</label>
        <input type="text" name="text" value="<?= isset($page['text']) ? $page['text'] : "" ?>" class="form-control" placeholder="text">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add</button>
</form>

<a class="btn btn-secondary ml-2 mt-3" href="/admin/pages/">Back</a>
