<?php

use App\Models\UsersModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($authHeader)
{
    if (is_null($authHeader)) {
        throw new Exception("Failed Authentication JWT");
    }

    return explode(" ", $authHeader)[1];
}

function validateJWT($encodedToken)
{
    $decodedToken = JWT::decode($encodedToken, new Key(getenv('JWT_SECRET_KEY'), 'HS256'));
    $user = new UsersModel();

    $data = $user->where('email', $decodedToken->email)->first();
    if (!$data) {
        throw new Exception("Authentication data not found");
    }
    return $data;
}

function createJWT($id, $name, $email)
{
    $requestTime = time();
    $TokenTime = getenv('JWT_TIME_TO_LIVE');
    $expiredTime = $requestTime + $TokenTime;
    $payload = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'iat' => $requestTime,
        'exp' => $expiredTime,
    ];

    $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'), 'HS256');

    return $jwt;
}

function getID($encodedToken)
{
    $decodedToken = JWT::decode($encodedToken, new Key(getenv('JWT_SECRET_KEY'), 'HS256'));
    return $decodedToken->id;
}
