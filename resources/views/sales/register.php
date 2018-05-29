<!DOCTYPE html>
<html lang="es">
<?php partial('head'); ?>
<body>
<?php partial('header'); ?>

<div class="container app-full">
    <div class="container app-main">
        <?php partial('sidebar'); ?>

        <div class="app-content-wrapper">
            <main class="app-content-wrapper__content">
                <h1 class="page-title">Registrar Venta</h1>

                <?php partial('message'); ?>

                <form action="?menu=nueva_venta" method="POST">
                    <button type="submit" class="btn btn--primary btn--wide">
                        Enviar
                    </button>
                </form>
            </main>
        </div>
    </div>
</div>

<?php partial('footer'); ?>
</body>
</html>
