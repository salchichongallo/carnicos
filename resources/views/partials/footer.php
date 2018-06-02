<script src="./assets/app.js"></script>

<?php if (request()->menu === 'registrar_venta') { ?>
    <script src="./assets/sale.js"></script>
<?php } ?>

<footer class="container app-footer">
    <?php if (auth()->check()) { ?>
        <span class="app-last-visit">
            <?php
                $timestamp = auth()
                    ->user()
                    ->getLastVisit()
                    ->getTimestamp();

                // format: day, 'month day' de month de year
                $lastVisit = strftime('%A, %e de %B de %Y', $timestamp);

                echo 'Última visita: '.$lastVisit;
            ?>
        </span>
    <?php } ?>
</footer>
