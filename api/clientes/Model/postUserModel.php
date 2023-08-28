<?php 

include_once 'vendor/autoload.php';

    class postUserModel {


        public function insertUser(array $arrDados)
        {
            $db        = DB::connect();

            $name      = $arrDados['name'];
            $last_name = $arrDados['last_name'];
            $email     = $arrDados['email'];
            $password  = $arrDados['password'];

            $sql = "INSERT INTO users 
                        (name, last_name, email, password)
                    VALUES
                        ('$name', '$last_name', '$email', '$password')";

            $rs         = $db->prepare($sql);

            try {
                $rs->execute();
                return [
                    'STATUS'        => 'OK',
                    'id'            => $db->lastInsertId(),
                    'name'          => $name,
                    'last_name'     => $last_name,
                    'email'         => $email,
                    'password'      => $password
                ];
            } catch (Exception $e){

                return [
                    'STATUS' => 'NOK',
                    'MSG' => $e->getMessage()
                ];
            }  
        }

        public function loginUser(array $arrDados)
        {
            $db       = DB::connect();

            $email      = $arrDados['email'];
            $password   = $arrDados['password'];

            $sql = "SELECT * FROM users 
                        WHERE email = '$email' AND
                              password = '$password' ";

            $rs         = $db->prepare($sql);


            try {

                $rs->execute();
                $obj = $rs->fetchObject();

                if ($obj)
                {
                    $arrUser = [
                        'STATUS' => 'OK',
                        'AUTHORIZATION' => 'TRUE',
                        'DADOS' => $obj
                    ];
                } else {
                    $arrUser = [
                        'STATUS' => 'OK',
                        'AUTHORIZATION' => 'FALSE'
                    ];
                }
                
                return $arrUser;
            } catch (Exception $e) {
                return [
                    'STATUS' => 'NOK',
                    'MSG' => $e->getMessage()
                ];
            }


        }
    }


?>