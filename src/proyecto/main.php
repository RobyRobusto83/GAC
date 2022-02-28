<?php
include_once "private_header.php";

include_once "html_functions.php";
headerFromPage();
include_once "nav.php";

include_once "main_functions.php";
$curses = getList();
?>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center" style="color:red;">Registro por curso</h1>
        </div>
        <div class="col-12">
            <span>Seleccione el curso</span>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($curses as $curse) { ?>
                        <tr>
                            <td>
                                <?php echo $curse->name ?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="attendance/registers.php?curse_id=<?php echo $curse->id ?>">
                                    Registrar Asistencia <i class="fa fa-edit"></i>
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