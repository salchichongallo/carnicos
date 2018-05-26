<?php if (! session()->has('message')) return; ?>

<span>
    <?php echo escape(session('message')); ?>
</span>

<?php session()->delete('message'); ?>
