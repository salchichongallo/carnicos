<?php

namespace App\Database\Mappers;

use stdClass;
use DateTime;
use Meat\User;
use App\Database\Mapper;

class UserMapper implements Mapper
{
    public function toTable(User $user): array
    {
        return [
            'id' => $user->getId(),
            'nombre' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'direccion' => $user->getAddress(),
            'telefono' => $user->getPhone(),
            'total_login' => $user->getTotalLogin(),
            'ultimo_ingreso' => $user->getLastVisit(),
            'rol' => $user->getRole()->getName(),
            'barrio_id' => $user->getNeighborhood()->getId(),
        ];
    }

    public function fromTable(stdClass $table): User
    {
        $user = new User;

        $user->setId($table->id);
        $user->setName($table->nombre);
        $user->setEmail($table->email);
        $user->setPassword($table->password);
        $user->setAddress($table->direccion);
        $user->setPhone($table->telefono);
        $user->setTotalLogin($table->total_login);

        if (! is_null($table->ultimo_ingreso)) {
            $lastVisit = new DateTime;
            $lastVisit->setTimestamp(strtotime($table->ultimo_ingreso));
            $user->setLastVisit($lastVisit);
        }

        return $user;
    }
}
