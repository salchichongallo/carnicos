<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('sidebar'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content t-center">

                    <?php partial('message'); ?>

                    <i class="emoji emoji--xlarge">😖</i>
                    <div class="text text--xlarge">404</div>
                    <h1 class="text text--paragraph">Página no encontrada</h1>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
