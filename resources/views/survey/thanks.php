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

                    <i class="emoji emoji--xlarge">🎉</i>
                    <div class="text text--xlarge m-t">¡Gracias!</div>

                    <h1 class="text text--paragraph t-center m-t">
                        <div>Hemos enviado un <b>bono</b></div>
                        <div>de descuento a su correo electrónico.</div>
                    </h1>

                    <div class="t-center m-t">
                        <a href="?menu=bienvenido" class="btn btn--inline">
                            Ir al inicio
                        </a>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
