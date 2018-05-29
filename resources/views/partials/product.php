<?php
    $name = escape($product->getName());
    $description = escape($product->getPresentation()->getId());
?>
<article class="product" data-id="<?php echo $product->getCode(); ?>">
    <span class="product__name"><?php echo $name; ?></span>
    <span class="product__desc"><?php echo $description; ?></span>
</article>
