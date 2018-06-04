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

                    <p class="survey__question t-center">
                        Cuál es la forma en la que le gusta o le gustaría
                        adquirir los productos cárnicos embutidos:
                    </p>

                    <form action="?menu=pregunta_7" method="POST" class="survey__radios">
                        <div class="survey__radio">
                            <label for="pr1">
                                <input type="radio" name="presentation" id="pr1" class="m-r" />
                                <span>En el punto de compra habitual</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="pr2">
                                <input type="radio" name="presentation" id="pr2" class="m-r" />
                                <span>Domicilio, solicitado telefónicamente al punto habitual de compra</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="pr3">
                                <input type="radio" name="presentation" id="pr3" class="m-r" />
                                <span>Domicilio, solicitado a través de página web</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="pr4">
                                <input type="radio" name="presentation" id="pr4" class="m-r" />
                                <span>Domicilio, solicitado a través de página web</span>
                            </label>
                        </div>

                        <div class="survey__actions">
                            <div class="actions actions--end">
                                <a href="?menu=bienvenido" class="btn m-r">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn--primary">
                                    Siguiente
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
