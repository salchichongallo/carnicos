<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="app-main">
            <?php partial('sidebar'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-login">
                    <h1 class="page-title">Nuevo Punto de Venta</h1>

                    <?php partial('message'); ?>

                    <form action="?menu=crear_nueva_tienda" method="POST" class="page-register__form">
                        <label for="name" class="form-control">
                            <span>Nombre establecimiento:</span>
                            <input name="name" type="text" class="input" id="name" autofocus />
                        </label>

                        <label for="id" class="form-control">
                            <span>Identificación:</span>
                            <input name="id" type="text" class="input" id="id" />
                        </label>

                        <label for="address" class="form-control">
                            <span>Dirección:</span>
                            <input name="address" type="text" class="input" id="address" />
                        </label>

                        <label for="city" class="form-control">
                            <span>Ciudad:</span>
                            <select id="city" class="input" name="city">
                                <?php
                                    foreach ($cities as $city) {
                                        $name = escape($city->getName());
                                        echo "<option value=\"{$city->getId()}\">{$name}</option>";
                                    }
                                ?>
                            </select>
                        </label>

                        <label for="phone" class="form-control">
                            <span>Teléfono:</span>
                            <input name="phone" type="text" class="input" id="phone" />
                        </label>

                        <input type="submit" value="Crear" class="btn btn--primary btn--wide" />
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
