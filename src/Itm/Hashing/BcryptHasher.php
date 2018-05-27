<?php

namespace Itm\Hashing;

use RuntimeException;
use Itm\Contracts\Hashing\Hasher;

class BcryptHasher implements Hasher
{
    /**
     * @var int
     */
    protected $rounds = 10;

    public function make($value): string
    {
        $hash = password_hash($value, PASSWORD_BCRYPT, [
            'cost' => $this->rounds,
        ]);

        if ($hash === false) {
            throw new RuntimeException('Bcrypt hashing not supported.');
        }

        return $hash;
    }

    public function check($value, $hashedValue): bool
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }

        return password_verify($value, $hashedValue);
    }

    public function setRounds($rounds): void
    {
        $this->rounds = (int) $rounds;
    }
}
