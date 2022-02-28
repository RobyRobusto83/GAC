<?php
include_once "html_functions.php";
$items = navLinks();
?>

<nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" id="botonMenu" aria-label="Mostrar u ocultar menú">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($items as $item) { ?>
                <li class="nav-item<?php if ($item['active']) { echo " active";} ?>">
                    <a class="nav-link" href="<?php echo $item['href']; ?>"><?php echo $item['literal']; ?> <i class="fa <?php echo $item['fa_icon']; ?>"></i></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
