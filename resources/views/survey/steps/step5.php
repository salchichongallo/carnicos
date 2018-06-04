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
                        Cuál de las siguientes variables considera es la
                        más importante para usted, a la hora de adquirir
                        un embutido cárnico. Enumérelas de 1 a 5,
                        donde 1 es la menos importante y 5 es la más
                        importante.
                    </p>

                    <form action="?menu=pregunta_5" method="POST" class="survey__radios">
                        <label for="price" class="form-control survey__input">
                            <span>Precio:</span>
                            <input name="price" type="number" class="input" min="1" max="5" id="price" autofocus />
                        </label>

                        <label for="flavor" class="form-control survey__input">
                            <span>Sabor:</span>
                            <input name="flavor" type="number" class="input" min="1" max="5" id="flavor" />
                        </label>

                        <label for="quality" class="form-control survey__input">
                            <span>Calidad:</span>
                            <input name="quality" type="number" class="input" min="1" max="5" id="quality" />
                        </label>

                        <label for="quality" class="form-control survey__input">
                            <span>Calidad:</span>
                            <input name="quality" type="number" class="input" min="1" max="5" id="quality" />
                        </label>

                        <label for="wrapper" class="form-control survey__input">
                            <span>Empaque:</span>
                            <input name="wrapper" type="number" class="input" min="1" max="5" id="wrapper" />
                        </label>

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
