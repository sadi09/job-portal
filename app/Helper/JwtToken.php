<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtToken
{

    public static function CreateToken($email, $id, $type): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel_jwt', //issuer
            'iat' => time(), //issue time
            'exp' => time() + 60 * 60, // expire time
            'userEmail' => $email,
            'id' => $id,
            'type' => $type
        ];

        return JWT::encode($payload, $key, 'HS256');
    }


    public static function VerifyToken($token)
    {

        try {

            if ($token === null) {
                return 'token_null';
            }

            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode;
        } catch (Exception $e) {
            return 'unauthorized';
        }


    }

}
