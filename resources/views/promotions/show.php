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
                    <h1 class="page-title">
                        Ofertas para
                        <b>
                            <?php echo escape(cookie('city')); ?>
                        </b>
                    </h1>

                    <div class="products">
                        <?php
                            foreach ($products as $product) {
                                partial('product', compact('product'));
                            }
                        ?>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
