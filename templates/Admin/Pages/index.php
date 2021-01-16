
<div class="col-12">
    <h3 class = "black"> Pages Management </h3>
    <hr class="">

    <a class="btn btn-primary mb-5" href = "/admin/pages/add"> Add New Page</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Title</th>
      <th scope="col">Template Name</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($pages as $page){

        $page = (object)$page;

    ?>
    <tr>
      <th><?= $page->id?></th>
      <td><?= $page->name?></td>
      <td><?= $page->title?></td>
      <td><?= $page->template_name?></td>
      <td>View</td>
      <td><a href = "/admin/pages/edit/<?=$page->id?>">Edit</td>
    </tr>
        <?php } ?>
  </tbody>
</table>

</div>
