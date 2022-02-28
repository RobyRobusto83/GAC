<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
include_once "tables_functions.php";
$items = getListWhitDiningName();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center" style="color:red;">Mesas</h1>
    </div>
    <div class="col-12">
        <a href="../tables/create.php" class="btn btn-info mb-2">Nueva Mesa <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Comedor</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td>
                                <?php echo $item->dining_name ?>
                            </td>
                            <td>
                                <?php echo $item->name ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $item->id ?>">
                                Editar <i class="fa fa-edit"></i>
                            </a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $item->id ?>">
                                Borrar <i class="fa fa-trash"></i>
                            </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
defaultFooter();
