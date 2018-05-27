<?php

namespace Itm\Contracts\Hashing;

interface Hasher
{
    public function make($value): string;

    public function check($value, $hashedValue): bool;
}
