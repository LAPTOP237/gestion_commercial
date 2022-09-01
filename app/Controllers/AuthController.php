<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsercompteModel;

class AuthController extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Connexion'])
		];
		return view('pages-login', $data);
	}

	public function login()
	{
		$session = session();
        $userModel = new UsercompteModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
           // $authenticatePassword = password_verify($password, $pass);
            if($password == $pass){
                $ses_data = [
                    'id_user_compte' => $data['id_user_compte'],
                    'username' => $data['username'],
                    'userrole' => $data['role'],
					'useretat' => $data['etat'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/'));
            
            }else{
                $session->setFlashdata('msg', 'Mot de passe incorrect');
                return redirect()->to(base_url('pages-login'));
            }
        }else{
            $session->setFlashdata('msg', 'Ce nom utilisateur n\'existe pas');
            return redirect()->to(base_url('pages-login'));
        }
	}



	
}
