<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Models\UserModel;

class AuthController extends BaseController
{
    //use ResponseTrait; 

    public function register() {
        $rules = [
            "username" => "required|is_unique[users.username]", 
            "emal" => "required|is_unique[auth_identities.secret]", 
            "password" => "required|max_length[3]|max_length[255]", 

        ];
        if(!$this->validate($rules)) {            
            return $this->respond($this->authResponse(
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                $this->validator->getErrors(),
                true,
                []
            ), ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        $userObject = new userModel();
        $user = new User([
            "username" => $this->request->getVar("username"),
            "emal" => $this->request->getVar("emal"),
            "password" => $this->request->getVar("password"),
        ]);

        $userObject->save($user);

        return $this->respond($this->authResponse(
            ResponseInterface::HTTP_OK,
            "Usuario creado con éxito",
            false,
            []
        ), ResponseInterface::HTTP_OK);
    }

    public function login()
    {      

        if ($this->request->is('get')) {
       
            if(!auth("session")->loggedIn()) {
                return redirect()->to('login');
            }
            else {
                return redirect()->to(base_url());
            }
        }           

        $rules = [
            "username" => "required",             
            "password" => "required|max_length[3]|max_length[255]", 
        ];

        if(!$this->validate($rules)) {            
            return $this->respond($this->authResponse(
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                $this->validator->getErrors(),
                true,
                []
            ), ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        $credenciales = [
            "username" => $this->request->getVar("username"),             
            "password" => $this->request->getVar("password"), 
        ];

        $login = auth()->attempt($credenciales);
        
        echo "OK";
        /*if(!$login->isOK()) {
            return $this->respond($this->authResponse(
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                "Usuario o contraseña incorrecta",
                true,
                []
            ), ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        $userObject = new userModel();
        $userData = $userObject->findById(auth()->id());
        $token =  $userData->generateAccessToken("ICE Project")->raw_token;

        return $this->respond($this->authResponse(
            ResponseInterface::HTTP_OK,
            "Usuario logueado con éxito",
            false,
            []
        ), ResponseInterface::HTTP_OK); */
    }

    private function authResponse(int $status, string | array $message, bool $error, array $data) {
        return [
            "status" => $status,
            "message" => $message,
            "error" => $error,
            "data" => $data
        ];
    }
}
