<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-main">
        <?php partial('nav'); ?>

        <div class="app-content-wrapper">
            <main class="app-content-wrapper__content">
                <h1 class="page-title">
                    Ofertas para
                    <b>
                        <?php echo escape(cookie('city')); ?>
                    </b>
                </h1>
            </main>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
