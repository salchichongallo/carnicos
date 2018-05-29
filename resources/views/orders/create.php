<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="container app-main">
            <?php partial('nav'); ?>

            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-order">
                    <h1 class="page-title">Nueva Orden</h1>

                    <?php partial('message'); ?>

                    <form action="?menu=nuevo_pedido" method="POST" id="orders" class="page-order__form">
                        <label class="form-control">
                            <span>Productos disponibles:</span>
                        </label>

                        <div class="products">
                            <?php
                                foreach ($products as $product) {
                                    partial('product', compact('product'));
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="code" class="form-control">
                                <span>Número orden:</span>
                                <input
                                    id="code"
                                    name="code"
                                    type="text"
                                    class="input"
                                    value="<?php echo 'ord-'. strtolower(str_random(5)); ?>"
                                />
                            </label>

                            <label for="_salepoint" class="form-control form-control--disabled">
                                <span>Punto de venta:</span>
                                <input
                                    disabled
                                    type="text"
                                    class="input"
                                    id="_salepoint"
                                    value="<?php echo escape($salePoint->getName()); ?>"
                                />
                                <input
                                    type="hidden"
                                    name="salepoint"
                                    value="<?php echo $salePoint->getId(); ?>"
                                />
                            </label>

                            <button type="submit" class="btn btn--primary btn--wide">
                                Realizar pedido
                            </button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
