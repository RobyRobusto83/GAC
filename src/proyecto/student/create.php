<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
include_once "../curse/curse_external.php";
$curses = getCurseList();
include_once "../tables/tables_external.php";
$tables = getListWhitDiningName();
?>
<div class="row">
    <div class="col-11">
        <h1 class="text-center" style="color:red;">Nuevo alumno</h1>
    </div>
    <div class="col-1">
        <a href="list.php" class="btn btn-info mb-2">Volver <i class="fas fa-angle-double-left"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="save.php" method="POST">
            <div class="form-group">
                <label for="name"><strong>Nombre</strong></label>
                <input name="name" placeholder="Nombre" type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname"><strong>Apellidos</strong></label>
                <input name="surname" placeholder="Apellidos" type="text" id="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dni"><strong>DNI<strong></label>
                <input name="dni" placeholder="12345678A" type="text" id="dni" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="curse"><strong>Curso</strong></label>
                <select class="form-control" name="curse" id="curse">
                  <?php foreach ($curses as $element) { ?>
                   <option value="<?php echo $element->id ?>"><?php echo $element->name ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="account"><strong>Cuenta Bancaria</strong></label>
                <input name="account" placeholder="ESXXXXXXXXXXXXXXXXXX" type="text" id="account" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="table"><strong>Mesa en Comedor</strong></label>
                <select class="form-control" name="table" id="table">
                  <?php foreach ($tables as $element) { ?>
                   <option value="<?php echo $element->id ?>"><?php echo $element->name ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Guardar <i class="fa fa-check"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<?php
defaultFooter();
