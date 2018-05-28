<?php

namespace Meat\Repositories;

use Meat\Product\Presentation;

interface PresentationRepository
{
    public function exists(string $presentation): bool;

    public function add(Presentation $presentation): bool;

    public function find(string $presentation): Presentation;
}
