<?php

use Itm\Http\RedirectResponse;
use Itm\Foundation\Application;
use Itm\Contracts\Hashing\Hasher;
use Itm\Contracts\View\ViewFactory;
use Meat\Contracts\Auth\AuthService;
use Itm\Contracts\Bus\{Bus, Command};
use Itm\Session\{Session, CookieSession};

function app($abstract = null, $parameters = [])
{
    $app = Application::getInstance();

    if (is_null($abstract)) {
        return $app;
    }

    return $app->make($abstract, $parameters);
}

function view(string $name, $parameters = [])
{
    return app(ViewFactory::class)->make($name, $parameters);
}

function partial(string $name, $parameters = [])
{
    return view($name, $parameters)->render();
}

function escape(string $text)
{
    return htmlspecialchars($text, ENT_COMPAT | ENT_HTML5);
}

function redirect(string $path)
{
    return (new RedirectResponse)->to($path);
}

function session($key = null)
{
    /** @var Session $session */
    $session = app(Session::class);

    if (is_null($key)) {
        return $session;
    }

    return $session->get($key);
}

function cookie($key = null)
{
    /** @var CookieSession $cookie */
    $cookie = app(CookieSession::class);

    if (is_null($key)) {
        return $cookie;
    }

    return $cookie->get($key);
}

function bcrypt($value)
{
    /** @var Hasher $hasher */
    $hasher = app(Hasher::class);

    return $hasher->make($value);
}

function dispatch(Command $command)
{
    /** @var Bus $bus */
    $bus = app(Bus::class);

    return $bus->dispatch($command);
}

function auth()
{
    /** @var AuthService $auth */
    $auth = app(AuthService::class);

    return $auth;
}
