<?php


namespace App\Application\Actions\User;

use App\Application\Actions\Connection;
use Psr\Http\Message\ResponseInterface as Response;

class ListUserInfoAction
{
    protected function action(): Response
    {
        $connection = new Connection();

        $data = $connection->getData("SELECT * FROM users U INNER JOIN direcctions D ON D.id_user = U.id");

        return $this->respondWithData($data);
    }
}