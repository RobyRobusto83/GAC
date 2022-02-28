<?php
include_once "../private_header.php";
if (!isset($_GET["id"])) exit("No id provided");
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
$id = $_GET["id"];
include_once "dining_functions.php";
$employee = getByID($id);
?>
<div class="row">
    <div class="col-11">
        <h1 class="text-center" style="color:red;">Editar comedor</h1>
    </div>
    <div class="col-1">
        <a href="list.php" class="btn btn-info mb-2">Volver <i class="fas fa-angle-double-left"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $employee->id ?>">
            <div class="form-group">
                <label for="symbol">Identificador</label>
                <input value="<?php echo $employee->symbol ?>" name="symbol" placeholder="Identificador" type="text" id="symbol" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input value="<?php echo $employee->name ?>" name="name" placeholder="Nombre" type="text" id="name" class="form-control" required>
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
