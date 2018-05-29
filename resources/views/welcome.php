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
                    <section id="app-modal" class="modal modal--opened">
                        <div class="modal__container">
                            <form method="POST" action="?menu=cambiar_ciudad" class="modal__content">
                                <h1 class="modal__title">¡Bienvenido!</h1>

                                <p>Selecciona tu ciudad para continuar:</p>

                                <div class="page-welcome__cities-container">
                                    <select name="city">
                                        <?php
                                            foreach($cities as $city) {
                                                $name = escape($city->getName());
                                                echo "<option value=\"{$name}\">{$name}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="actions actions--end">
                                    <input type="submit" class="btn btn--inline" value="Continuar">
                                </div>
                            </form>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
