<?php
include_once "../private_header.php";
include_once "../html_functions.php";
headerFromPage('../');
include_once "../nav.php";
include_once "attendance_function.php";
$start = date("Y-m-d");
$end = date("Y-m-d");
if (isset($_GET["start"])) {
    $start = $_GET["start"];
}
if (isset($_GET["end"])) {
    $end = $_GET["end"];
}
$students = getStudentWithAttendanceCount($start, $end);
$curses = getCurseWithAttendanceCount($start, $end);
$tables = getTableWithAttendanceCount($start, $end)
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center" style="color:red;">Registro de asistencia</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="report.php" class="form-inline mb-2">
            <label for="start">Desde:&nbsp;</label>
            <input required id="start" type="date" name="start" value="<?php echo $start ?>" class="form-control mr-2">
            <label for="end">Hasta:&nbsp;</label>
            <input required id="end" type="date" name="end" value="<?php echo $end ?>" class="form-control">
            <button class="btn btn-success ml-2">Filtrar</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 class="text-center" style="color:red;">Por Mesa</h2>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Número presencias </th>
                    <th>Número ausencias </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tables as $student) { ?>
                    <tr>
                        <td>
                            <?php echo $student->name ?>
                        </td>
                        <td>
                            <?php echo $student->presence_count ?>
                        </td>
                        <td>
                            <?php echo $student->absence_count ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 class="text-center" style="color:red;">Por Curso</h2>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Curso</th>
                    <th>Número presencias </th>
                    <th>Número ausencias </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($curses as $student) { ?>
                    <tr>
                        <td>
                            <?php echo $student->name ?>
                        </td>
                        <td>
                            <?php echo $student->presence_count ?>
                        </td>
                        <td>
                            <?php echo $student->absence_count ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 class="text-center" style="color:red;">Por alumno</h2>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Número presencias </th>
                        <th>Número ausencias </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td>
                                <?php echo $student->name ?>
                            </td>
                            <td>
                                <?php echo $student->presence_count ?>
                            </td>
                            <td>
                                <?php echo $student->absence_count ?>
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
