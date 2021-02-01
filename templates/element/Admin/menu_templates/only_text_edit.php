

<form method = "POST" action = "/admin/pages/edit/only_text/<?=$page['id']?>">
  <div class="form-group col-12">
    <label>Title</label>
    <input type="text" name = "title" value = "<?= isset($page['title']) ? $page['title'] : ""?>" class="form-control" placeholder="Title">
  </div>
  <div class="form-group col-12">
    <label>Text</label>
    <textarea rows = "15" name = "text" value = "" class="form-control" ><?= isset($page['text']) ? $page['text'] : ""?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
</form>


<a class="btn btn-secondary ml-2" href = "/admin/pages/" >Back</a>
