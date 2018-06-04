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
                        Con qué frecuencia consume estos productos:
                    </p>

                    <form action="?menu=pregunta_3" method="POST" class="survey__radios">
                        <div class="survey__radio">
                            <label for="fr1">
                                <input type="radio" name="frequency" id="fr1" class="m-r" />
                                <span>Diariamente</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="fr2">
                                <input type="radio" name="frequency" id="fr2" class="m-r" />
                                <span>Entre una y tres veces por semana</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="fr3">
                                <input type="radio" name="frequency" id="fr3" class="m-r" />
                                <span>Entre cuatro y seis veces por semana</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="fr4">
                                <input type="radio" name="frequency" id="fr4" class="m-r" />
                                <span>Una vez al mes</span>
                            </label>
                        </div>

                        <div class="survey__radio">
                            <label for="fr5">
                                <input type="radio" name="frequency" id="fr5" class="m-r" />
                                <span>Más de una vez al mes</span>
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
