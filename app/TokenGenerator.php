<?php

class TokenGenerator
{

    public function generateToken($length = 32)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }


        if (preg_match('/^[A-Za-z0-9]+$/', $token)) {
            return $token;
        } else {
            
            return $this->generateToken($length);
        }
    }
}


// $tokenGenerator = new TokenGenerator();
// $token = $tokenGenerator->generateToken();
// echo "Token generado: " . $token;

?>
