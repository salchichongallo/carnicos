<?php

namespace App\Http\Controllers;

use Itm\Session\Session;
use App\Database\Seeds\DatabaseSeeder;

class AdminController extends Controller
{
    public function initApp(DatabaseSeeder $databaseSeeder, Session $session)
    {
        $databaseSeeder->run();

        $session->set('message', 'Base de datos creada con éxito.');

        return redirect('?menu=bienvenido');
    }
}
