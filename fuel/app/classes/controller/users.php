<?php

use \Firebase\JWT\JWT;

class Controller_users extends Controller_Rest
{
	private $key = 'sebas007';
	private $algorithm = array('HS256');

	private function error($code = 500, $mensaje = 'Error', $descripcion = 'Error espontaneo')
	{
		return [
					'code' => $code, 
					'mensaje' => $mensaje,
					'descripcion' => $descripcion,
				];
	}

	private function errorAuth()
	{
		return [
					'code' => 401, 
					'mensaje' => 'Error de autenticación',
					'descripcion' => 'Token incorrecto o no ingresado.',
				];
	}

	private function exito($code = 200, $mensaje = 'Exito', $descripcion = "Tarea realizada con exito")
	{
		return [
					'code' => $code, 
					'mensaje' => $mensaje,
					'descripcion' => $descripcion
				];
	}

    public function post_create()
    {
        $user = new Model_users(); 

        $username = Input::post('username');
        $password = Input::post('password');


        $user->username = $username;
        $user->password = $password;


        if(isset($username) and isset($password))
        {
            if (empty($username) or empty($password))
            {
                return $this->error(404,'Error', 'Usuario o contraseña vacios.');
            }
            else 
            {
                try
                {
                    $user->save();
                    return $this->exito(200, 'Exito', 'Usuario creado.');
                }
                catch(exception $e)
                {
                    return $this->error(404,'Error', 'Usuario existente, introduzca uno nuevo.');
                }
            }
        }
        return $this->error(404,'Error', 'Introduzca un usuario o contraseña.');

}

    public function post_login()
    {
        $username = Input::post('username');
        $pass = Input::post('password');

        $user = Model_users::find('all', array('where' => array(array('username', $username),)));

        if(isset($username))
        {
            if(isset($pass))
            {
                if (!empty($user))
                {
                    foreach ($user as $key => $value)
                    {
                        $id = $user[$key]->id;
                        $username = $user[$key]->username;
                        $password = $user[$key]->password;
                    }
                }
                else return $this->error(402, 'Error', 'Usuario mal escrito o no registrada');
               

                if ($username == $username and $password == $pass)
                {
                    $token = array(
                        "id" => $id, 
                        "username" => $username, 
                        "password" => $password
                    );

                    $jwt = JWT::encode($token, $this->key);

                    return $this->exito(200, 'Exito',  $jwt);
                }
                else return $this->error(402, 'Error', 'Contraseña mal escrita o no registrada.');
            }
            else return $this->error(402, 'Error', 'Introduzca una contraseña.');
        }
        else return $this->error(402, 'Error', 'Introduzca un usuario.');
    }

    public function get_users()
    {
        try
        {
            if ($this->verificarUser()) 
            {
                $users = Model_users::find('all');
                return $users;
            }
            else return $this->error(402,'Error','Debes obtener un token.');
        }   
        catch(exception $e)
        {
            return  $this->errorAuth();
        }
    }

    public function get_user($id)
    {
        try
        {
            if ($this->verificarUser()) 
            {
                if ($id != null)
                {
                    $user = Model_users::find ('all', array(
                    'where' => array(
                        array('id', $id),
                        )
                    ));

                    if (! empty($user))
                    {
                        return $user;
                    }
                    else return $this->error(404, 'Usuario no encontrado', 'Introduzca un id correcto.');
                }
                else return $this->error(404, 'Página no encontrada', 'Rellene los campos vacios.');

            }
             else return $this->errorAuth(); 
        }
        catch(exception $e)
        {
            return  $this->errorAuth();
        }
    }

    public function post_update($id)
    {
        if($this->verificarUser())
        {
            $user = new Model_users();
            $user = Model_users::find('all', array('where' => array(array('id', $id),)));

            $username = Input::post('username');
            $password = Input::post('password');
            $email = Input::post('email');
            $foto = Input::post('foto');

            $checkUsername = Model_users::find('all', array('where' => array(array('username',$username),)));

            if (empty($username) or empty($password)){

                return $this->error(404, 'Error', 'User o pass vacios.');
            }

            if (! empty($user))
            {
                if (empty($checkUsername))
                {
                    foreach ($user as $key) 
                    {
                        if ($key['id'] == $id ){
                        $key->username = $username;
                        $key->password = $password;
                        $key->email = $email;
                        $key->foto = $foto;
                        $key->save();
                        
                    }
    
                    }
                    return $this->exito(200, 'Exito', 'Usuario modificado.');

                }
                else return $this->error(404, 'Email existente', 'Por favor, introduzca un email diferente.');
            }
            else return $this->error(404, 'Usuario no encontrado', 'Introduzca un id correcto.');
        }
        else return $this->errorAuth(); 
    }


    public function post_delete($id)
    {
        if($this->verificarUser())
        {
            $user = new Model_users();
            $user = Model_users::find('all', array(
            'where' => array(
                array('id', $id),
                )
            ));
        
            foreach ($user as $key){
                    $key -> delete();
                    return $this->exito(200, 'Exito', 'Usuario borrado.');
            }

        } else return $this->errorAuth(); 
    }


    private function verificarUser(){


        $auth = apache_request_headers();
        if(isset($auth['auth']))
        {
            if (!empty($auth))
            {
                $jwt = $auth["auth"];
                $key = 'sebas007';
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                $token = (array)$decoded;
                $entry = Model_Users::find('all', array('where' => array(array('username', $token["username"]),),));

                if (empty($entry))
                {
                    return false;
                }
                return true;
            }
            else return false;
        }
        else return false;

    }





}


