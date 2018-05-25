<?php

namespace Itm\Contracts\Http;

use Itm\Http\{Request, Response};

interface Kernel
{
    public function handle(Request $request): Response;
}
