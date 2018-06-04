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
                        Cuáles de los siguientes productos consume:
                    </p>

                    <div class="products">
                        <?php
                            foreach ($products as $product) {
                                partial('product', compact('product'));
                            }
                        ?>
                    </div>

                    <div class="survey__actions">
                        <form action="?menu=pregunta_2" method="POST" class="actions actions--end">
                            <a href="?menu=bienvenido" class="btn m-r">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn--primary">
                                Siguiente
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>

    <script>
        document.querySelectorAll('.page-survey .product')
            .forEach((element) => new window.Product(element));
    </script>
</body>
</html>
