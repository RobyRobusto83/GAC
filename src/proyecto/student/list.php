<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
include_once "student_functions.php";
$elements = getList();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center" style="color:red;">Alumnos</h1>
    </div>
    <div class="col-12">
        <a href="create.php" class="btn btn-info mb-2">Nuevo alumno <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Curso</th>
                        <th>Cuenta Bancaria</th>
                        <th>Mesa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>                 	
                    <?php foreach ($elements as $element) { ?>
                        <tr>
                            <td>
                                <?php echo $element->name ?>
                            </td>
                            <td>
                                <?php echo $element->surname ?>
                            </td>
                            <td>
                                <?php echo $element->dni ?>
                            </td>
                            <td>
                                <?php echo $element->curse ?>
                            </td>
                            <td>
                                <?php echo $element->account ?>
                            </td>
                            <td>
                                <?php echo $element->table_name ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $element->id ?>">
		                        Editar <i class="fa fa-edit"></i>
		                 </a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $element->id ?>">
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
