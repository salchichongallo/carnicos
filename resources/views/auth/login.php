<!DOCTYPE html>
<html lang="es">
    <?php partial('head'); ?>
<body>
    <?php partial('header'); ?>

    <div class="container app-full">
        <div class="app-main">
            <div class="app-content-wrapper">
                <main class="app-content-wrapper__content page-login">

                    <h1 class="page-title">Login</h1>

                    <?php partial('message'); ?>

                    <form action="?menu=login" method="POST" class="page-login__form">
                        <label for="email" class="form-control">
                            <span>Email:</span>
                            <input name="email" type="email" class="input" id="email" placeholder="usuario@carnicos.co" autofocus />
                        </label>

                        <label for="password" class="form-control">
                            <span>Contraseña:</span>
                            <input name="password" type="password" class="input" id="password" />
                        </label>

                        <button type="submit" class="btn btn--primary btn--wide">
                            Iniciar Sesión
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <?php partial('footer'); ?>
</body>
</html>
