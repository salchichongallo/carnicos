<?php

namespace Meat\Repositories;

use Meat\Product\Presentation;

interface PresentationRepository
{
    public function find(string $id): Presentation;

    public function add(Presentation $presentation): bool;
}
