<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('sidebar'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-register">
                    <h1 class="page-title">Registro Tendero</h1>

                    <?php partial('message'); ?>

                    <form action="?menu=nuevo_registro" method="POST" class="page-register__form">
                        <label for="name" class="form-control">
                            <span>Nombre propietario:</span>
                            <input name="name" type="text" class="input" id="name" autofocus />
                        </label>

                        <label for="nit" class="form-control">
                            <span>NIT:</span>
                            <input name="nit" type="text" class="input" id="nit" />
                        </label>

                        <label for="email" class="form-control">
                            <span>Email:</span>
                            <input name="email" type="email" class="input" id="email" />
                        </label>

                        <label for="password" class="form-control">
                            <span>Contraseña:</span>
                            <input name="password" type="password" class="input" id="password" />
                        </label>

                        <label for="neighborhood" class="form-control">
                            <span>Barrio:</span>
                            <select id="neighborhood" class="input" name="neighborhood">
                                <?php
                                    foreach ($neighborhoods as $neighborhood) {
                                        $name = "{$neighborhood->getName()} ({$neighborhood->getCity()->getName()})";
                                        $name = escape($name);
                                        echo "<option value=\"{$neighborhood->getId()}\">{$name}</option>";
                                    }
                                ?>
                            </select>
                        </label>

                        <label for="store" class="form-control">
                            <span>Punto de venta:</span>
                            <select id="store" class="input" name="store">
                                <?php
                                    foreach ($stores as $store) {
                                        $name = escape($store->getName());
                                        echo "<option value=\"{$store->getId()}\">{$name}</option>";
                                    }
                                ?>
                            </select>
                        </label>

                        <label for="address" class="form-control">
                            <span>Dirección:</span>
                            <input name="address" type="text" class="input" id="address" />
                        </label>

                        <label for="phone" class="form-control">
                            <span>Teléfono:</span>
                            <input name="phone" type="text" class="input" id="phone" />
                        </label>

                        <button type="submit" class="btn btn--primary btn--wide">
                            Enviar
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
