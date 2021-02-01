<h3> Pages - Edit </h3>


<h2 class="mt-5 mb-5"><?= $page['page_name'] ?></h2>


        <?= $this->element("/admin/menu_templates/". $page['template_name'] ."_edit", $page) ?>


</form>
