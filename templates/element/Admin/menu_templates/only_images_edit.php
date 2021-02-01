<input class="this-page" type="hidden" value=<?= $page['page_id'] ?> />
<form action="/admin/only-images/save/<?= $page['page_id'] ?>" enctype="multipart/form-data" method="POST">

    <div class="form-group col-12">
        <label>Title</label>
        <input type="text" name="title" value="<?= isset($page['title']) ? $page['title'] : "" ?>" class="form-control" placeholder="Title">
    </div>
    <input class = "btn btn-primary" type="file" size="32" name="image" value=""> </br>
    <button type="submit" class="btn btn-primary mt-3">Add</button>
</form>
<div class="col-12 mt-5">
    <h3>Gallery Images </h3>
    <div class="row">
        <?php foreach ($page['images'] as $image) { ?>
            <div class="col-2 ">
                <div class="btn btn-sm btn-secondary mb-2 remove-image" data-image = "<?= $image['image_id'] ?>">Remove Image (X) </div>
                <img class="w-100 <?= "id-". $image['image_id'] ?>" data-id="<?= $image['image_id'] ?>" src="/webroot/uploaded_files/<?= $image['url'] ?>">
            </div>
        <?php } ?>
    </div>
</h3>

<a class="btn btn-secondary ml-2" href="/admin/pages/">Back</a>
