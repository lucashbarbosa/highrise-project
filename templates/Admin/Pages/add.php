<form method = "POST">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Name</label>
      <input type="text" name = "name" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Title</label>
      <input type="text" name = "title" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Template</label>
      <select id="inputState" name = "template_id" class="form-control">
      <option>Select</option>
        <?php foreach ($templates as $template){
            $template = (object) $template;
        ?>
        <option value = "<?=$template->id?>"><?= $template->name?></option>

        <?php } ?>
      </select>
    </div>

    <button class="btn btn-primary" type = "submit">Save</button>
  </div>

</form>
