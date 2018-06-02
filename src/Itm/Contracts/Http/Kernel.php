<?php

namespace Itm\Contracts\Http;

use Itm\Http\{Request, Response};

interface Kernel
{
    public function bootstrap(): void;

    public function handle(Request $request): Response;
}
