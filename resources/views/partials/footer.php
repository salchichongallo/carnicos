<script src="./assets/bundle.js"></script>
<footer class="container app-footer">
    <?php if (auth()->check()) { ?>
        <span class="app-last-visit">
            <?php
                $timestamp = auth()
                    ->user()
                    ->getLastVisit()
                    ->getTimestamp();

                $lastVisit = strftime('%A, %e de %B de %Y', $timestamp);

                echo 'Última visita: '.$lastVisit;
            ?>
        </span>
    <?php } ?>
</footer>
