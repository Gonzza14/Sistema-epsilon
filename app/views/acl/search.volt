<?php use Phalcon\Tag; ?>

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(["acl/index", "Go Back"]); ?></li>
            <li class="next"><?php echo $this->tag->linkTo(["acl/new", "Create "]); ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Resultado de busqueda</h1>
</div>

<?php echo $this->getContent(); ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rol</th>
            <th>Accion</th>
            <th>Componente</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($page->items as $acl): ?>
            <tr>
                <td><?php echo $acl->IDROL ?></td>
            <td><?php echo $acl->accion ?></td>
            <td><?php echo $acl->componente ?></td>

                <td><?php echo $this->tag->linkTo(["acl/edit/" . $acl->IDROL, "Edit"]); ?></td>
                <td><?php echo $this->tag->linkTo(["acl/delete/" . $acl->IDROL, "Delete"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?php echo $page->current, "/", $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo("acl/search", "First") ?></li>
                <li><?php echo $this->tag->linkTo("acl/search?page=" . $page->before, "Previous") ?></li>
                <li><?php echo $this->tag->linkTo("acl/search?page=" . $page->next, "Next") ?></li>
                <li><?php echo $this->tag->linkTo("acl/search?page=" . $page->last, "Last") ?></li>
            </ul>
        </nav>
    </div>
</div>