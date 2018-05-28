<header>
    <div class="container app-header">
        <a href="?menu=bienvenido" class="app-logo">
        </a>

        <?php if (auth()->check()) {
            $user = auth()->user();
        ?>
            <div class="auth-actions">
                <span><?php echo escape($user->getName()); ?></span>
                <span class="auth-actions__sep">|</span>
                <a href="?menu=notificaciones">
                    <i class="icon icon--hover">notifications</i>
                </a>
                <form method="POST" action="?menu=logout">
                    <button type="submit" class="btn flex-middle">
                        <i class="icon">exit_to_app</i>
                    </button>
                </form>
            </div>
        <?php } else { ?>
            <div class="auth-actions">
                <a href="?menu=login" class="btn btn--inline m-r">Login</a>
            </div>
        <?php } ?>
    </div>
</header>
