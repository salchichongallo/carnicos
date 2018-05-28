<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('nav'); ?>

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

                        <label for="salepoint" class="form-control">
                            <span>Punto de venta:</span>
                            <select id="salepoint" class="input" name="salepoint">
                                <?php
                                    foreach ($salePoints as $salePoint) {
                                        $name = escape($salePoint->getName());
                                        echo "<option value=\"{$salePoint->getId()}\">{$name}</option>";
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

                        <input type="submit" value="Enviar" class="btn btn--primary btn--wide" />
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
