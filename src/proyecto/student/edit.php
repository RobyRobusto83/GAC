<?php
include_once "../private_header.php";
if (!isset($_GET["id"])) exit("No id provided");
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
$id = $_GET["id"];
include_once "student_functions.php";
$item = getByID($id);
include_once "../curse/curse_external.php";
$curses = getCurseList();
include_once "../tables/tables_external.php";
$tables = getListWhitDiningName();
?>
<div class="row">
    <div class="col-11">
        <h1 class="text-center" style="color:red;">Modificar datos del alumno</h1>
    </div>
    <div class="col-1">
        <a href="list.php" class="btn btn-info mb-2">Volver <i class="fas fa-angle-double-left"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $item->id ?>">
            <div class="form-group">
                <label for="name"><strong>Nombre</strong></label>
                <input value="<?php echo $item->name ?>" name="name" placeholder="Nombre" type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname"><strong>Apellidos</strong></label>
                <input value="<?php echo $item->surname ?>" name="surname" placeholder="Apellidos" type="text" id="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dni"><strong>DNI</strong></label>
                <input value="<?php echo $item->dni ?>" name="dni" placeholder="DNI" type="text" id="dni" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="curse"><strong>Curso</strong></label>
                <select class="form-control" name="curse" id="curse">                               	
                  <?php foreach ($curses as $element) { ?>
                   <option value="<?php echo $element->id ?>"<?php if ($element->id === $item->curse_id) {echo "selected";} ?>><?php echo $element->name ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="account"><strong>Cuenta bancaria</strong></label>
                <input value="<?php echo $item->account ?>" name="account" placeholder="Cuenta bancaria" type="text" id="account" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="table"><strong>Mesa en Comedor</strong></label>
                <select class="form-control" name="table" id="table">

                  <?php foreach ($tables as $element) { ?>
                   <option value="<?php echo $element->id ?>"<?php if ($element->id === $item->table_id) {echo "selected";} ?>><?php echo $element->name ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    Guardar <i class="fa fa-check"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<?php
defaultFooter();
