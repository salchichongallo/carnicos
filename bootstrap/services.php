<?php

$app->singleton(
    \Itm\Contracts\Hashing\Hasher::class,
    \Itm\Hashing\BcryptHasher::class
);
