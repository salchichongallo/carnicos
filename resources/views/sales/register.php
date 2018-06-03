<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('sidebar'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-sale">
                    <h1 class="page-title">Registrar Venta</h1>

                    <?php partial('message'); ?>

                    <div id="bill-app"></div>
                </main>
            </div>
        </div>
    </div>

    <script>
        window.__PRODUCTS__ = <?php echo collect($products)->toJson(); ?>;
    </script>
    <?php partial('footer'); ?>
</body>
</html>
