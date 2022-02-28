<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
include_once "dining_functions.php";
$employees = getList();
?>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center" style="color:red;">Comedores</h1>
        </div>
    </div>
<div class="row">
    <div class="col-12">
        <a href="create.php" class="btn btn-info mb-2">Nuevo comedor <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody> 
                	
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td>
                                <?php echo $employee->symbol ?>
                            </td>
                            <td>
                                <?php echo $employee->name ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $employee->id ?>">
                                Editar <i class="fa fa-edit"></i>
                            </a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $employee->id ?>">
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
