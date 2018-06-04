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
                        Seleccione el establecimiento habitual de su compra.
                    </p>

                    <form action="?menu=pregunta_6" id="form" method="POST" class="survey__center">
                        <label for="store" class="form-control survey__input">
                            <span>Establecimiento:</span>
                            <input list="stores" type="search" class="input" id="store" autofocus />

                            <input type="hidden" name="store" id="_store" />

                            <datalist id="stores">
                                <?php foreach ($stores as $store) {
                                    $id = $store->getId();

                                    $city = $store->getCity();

                                    $name = $store->getName();
                                    $name .= ' - '. $city->getName();
                                    $name = escape($name);
                                ?>
                                    <option data-value="<?php echo $id; ?>" value="<?php echo $name; ?>" />
                                <?php } ?>
                            </datalist>
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
    <script>
        const _store = document.getElementById('_store');

        function searchValue(value) {
            const options = Array.from(document.querySelectorAll('#stores option'));
            const option = options.find(opt => opt.value === value);

            try { return option.dataset.value; }
            catch (error) { return ''; }
        }

        function bindListValue({ target: { value } }) {
            _store.value = searchValue(value);
        }

        document.getElementById('store')
            .addEventListener('change', bindListValue);
    </script>
</body>
</html>
