<?php if (! session()->has('message')) return; ?>

<section class="alert alert--<?php echo session()->get('message_type', 'info'); ?>">
    <p><?php echo escape(session('message')); ?></p>
    <i class="icon icon--hover alert__close">close</i>
</section>

<?php
    session()->delete('message');
    session()->delete('message_type');
?>
