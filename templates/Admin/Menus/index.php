<div class="col-12">
    <h3 class = "black"> Pages Management </h3>
    <hr class="">



    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>

      <th scope="col">Display Name</th>

      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($data['menus'] as $menu){

        $menu = (object)$menu;

    ?>
    <tr>
      <th><?= $menu->id?></th>
      <td><?= $menu->display_name?></td>
      <td><?= $menu->name?></td>

      <td><a href = "/admin/menus/edit/<?= $menu->id ?>">Edit</td>
    </tr>
        <?php } ?>
  </tbody>
</table>

</div>
