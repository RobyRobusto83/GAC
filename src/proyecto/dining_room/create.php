<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
?>
<div class="row">
    <div class="col-11">
        <h1 class="text-center" style="color:red;">Nuevo comedor</h1>
    </div>
    <div class="col-1">
        <a href="list.php" class="btn btn-info mb-2">Volver <i class="fas fa-angle-double-left"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="save.php" method="POST">
            <div class="form-group">
                <label for="symbol"><strong>Identificador</strong></label>
                <input name="symbol" placeholder="Identificador" type="text" id="symbol" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name"><strong>Nombre</strong></label>
                <input name="name" placeholder="Nombre" type="text" id="name" class="form-control" required>
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
