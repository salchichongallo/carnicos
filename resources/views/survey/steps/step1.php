<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('sidebar'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-survey">
                    <h1 class="page-title">Encuesta</h1>

                    <p class="t-center">
                        <?php $name = $customer->getUser()->getName(); ?>
                        Estimado <?php echo escape($name); ?>, sería de gran ayuda que llenara la siguiente
                        encuesta con el fin de mejorar nuestros productos.
                    </p>

                    <p class="survey__question t-center">
                        ¿Consume productos cárnicos embutidos?
                    </p>

                    <div class="actions actions--center">
                        <form action="?menu=pregunta_1" method="POST">
                            <input type="hidden" name="question" value="no" />
                            <button type="submit" class="btn btn--min-width">
                                No
                            </button>
                        </form>

                        <form action="?menu=pregunta_1" method="POST">
                            <input type="hidden" name="question" value="si" />
                            <button type="submit" class="btn btn--primary btn--min-width m-l">
                                Sí
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
