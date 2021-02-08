<input class="this-page" type="hidden" value=<?= $page['page_id'] ?> />


<form action="/admin/free/save/<?= $page['page_id'] . "/" . $page['id'] ?>" enctype="multipart/form-data" method="POST">

    <div class="form-group col-12">
        <label>Title</label>
        <input type="text" name="title" value="<?= isset($page['title']) ? $page['title'] : "" ?>" class="form-control" placeholder="Title">
    </div>
    <div class="content">
        <div class="form-group col-12">
            <p>Add new image to system</p>

            <input class="btn btn-primary" type="file" size="32" name="image" value="">
            <br>
            <button type="submit" class="btn btn-primary mt-3 mb-2">Save</button><br>




        </div>
    </div>
    <label>Text</label>
            <textarea rows="150" name="html" value="" class="form-control editor"><?= isset($page['html']) ? $page['html'] : "" ?></textarea>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
<div class="col-12 mt-5">
    <h3>Gallery Images </h3>
    <small class="mb-5">obs: Copy the url to use in your file</small></br>
    <div class="row mt-5">
        <?php foreach ($page['images'] as $image) { ?>
            <div class="col-2 mr-4 mb-4" style="box-shadow: -1px 0px 20px 9px #8e8e8e; background-color: transparent; text-align: left; padding:5px; ">
                <button class="copy-clipboard url btn btn-success mb-1" data-reference="<?= "copy-" . $image['image_id'] ?>">Click To Copy URL</button><br>
                <div class="<?= "copy-" . $image['image_id'] ?> hidden"><?= $_SERVER['HTTP_HOST'] ?>/webroot/uploaded_files/<?= $image['url'] ?> </div>
                <img class="w-100 <?= "id-" . $image['image_id'] ?>" data-id="<?= $image['image_id'] ?>" src="/webroot/uploaded_files/<?= $image['url'] ?>">
            </div>
        <?php } ?>
    </div>
</div>

<a class="btn btn-secondary ml-2 mt-3" href="/admin/pages/">Back</a>
