<input class="this-page" type="hidden" value=<?= $page['page_id'] ?> />
<form action="/admin/only-images/save/<?= $page['page_id'] . "/" . $page['id'] ?>" enctype="multipart/form-data" method="POST">

    <div class="form-group col-12">
        <label>Gallery Title</label>
        <input type="text" name="title" value="<?= isset($page['title']) ? $page['title'] : "" ?>" class="form-control" placeholder="Title">
    </div>

    <div class="form-group col-12">
        <label>Before Gallery Text (optional)</label>
        <div class="form-group col-12">
            <textarea rows="15" name="before-text"  class="form-control editor"><?= isset($page['before_text']) ? $page['before_text'] : "" ?></textarea>
        </div>
    </div>
    <div class="form-group col-12">
        <label>After Gallery Text (optional)</label>
        <div class="form-group col-12">
            <textarea rows="15" name="after-text" value="" class="form-control editor"><?= isset($page['after_text']) ? $page['after_text'] : "" ?></textarea>
        </div>
    </div>

    <p>Add new image to Gallery</p>


    <input class="btn btn-primary" type="file" size="32" name="image" value=""> </br>
    <label>Image</label>
    <input type="text"  name="image-title" class="form-control" placeholder="Image Title">
    <button type="submit" class="btn btn-primary mt-3">Add</button>
</form>
<div class="col-12 mt-5">
    <h3>Gallery Images </h3>
    <small class="mb-5">obs: Each 5 images the system will create new row automatically </small></br>
    <div class="row mt-5">
        <?php foreach ($page['images'] as $image) { ?>
            <div class="col-2 mr-4 mb-4" style="box-shadow: -1px 0px 20px 9px #8e8e8e; background-color: transparent; text-align: right; padding:5px; ">
                <div class="btn btn-sm btn-secondary mb-2 remove-image" data-image="<?= $image['image_id'] ?>">Remove Image (X) </div>
                <p style="height: 20px"><?= isset($image['title']) ? $image['title'] : "" ?></p>
                <img class="w-100 <?= "id-" . $image['image_id'] ?>" data-id="<?= $image['image_id'] ?>" src="/webroot/uploaded_files/<?= $image['url'] ?>">
            </div>
        <?php } ?>
    </div>
</div>

<a class="btn btn-secondary ml-2 mt-3" href="/admin/pages/">Back</a>
