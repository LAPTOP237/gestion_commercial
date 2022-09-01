<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class ClientController extends BaseController
{

	public function index()
	{
		$ClientModel = new ClientModel();
		$data = [
			'clients' => $ClientModel->orderBy('id_cli', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des clients']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des clients', 'li_1' => 'Client', 'li_2' => 'Listes des clients'])
		];
		return view('client', $data);
	}

	function fetch_all()
	{
		$ClientModel = new ClientModel();
		$clients = $ClientModel->orderBy('id_cli', 'DESC')->findAll();
		echo json_encode($clients);

	}

	function action()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new ClientModel();
            		$crudModel->save([
            			'nom_cli'      =>  $this->request->getVar('nom_cli'),
                        'contact'     =>  $this->request->getVar('contact'),
                        'localisation'    =>  $this->request->getVar('localisation'),
                        'registrte'    =>  $this->request->getVar('registre'),
                        'contribuable'    =>  $this->request->getVar('contribuable'),
                        'BP'    =>  $this->request->getVar('BP'),
                        'email'    =>  $this->request->getVar('email')
                    

            		]);

            		$message = '<div class="alert alert-success">Client Ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new ClientModel();

                    $id = $this->request->getVar('hidden_id');

                    $data = [
                        'nom_cli'      =>  $this->request->getVar('nom_cli'),
                        'contact'     =>  $this->request->getVar('contact'),
                        'localisation'    =>  $this->request->getVar('localisation'),
                        'registrte'    =>  $this->request->getVar('registre'),
                        'contribuable'    =>  $this->request->getVar('contribuable'),
                        'BP'    =>  $this->request->getVar('BP'),
                        'email'    =>  $this->request->getVar('email')
                    ];

                    $crudModel->update($id, $data);

                    $message = '<div class="alert alert-success">Client mise à jour avec succes</div>';
                }
           

            $output = array(
            	'success'		=>	$success,
            	'message'		=>	$message
            );

            echo json_encode($output);
		}
	}

    function fetch_single_data()
    {
        if($this->request->getVar('id'))
        {
            $crudModel = new ClientModel();

            $client_data = $crudModel->where('id_cli', $this->request->getVar('id'))->first();

            echo json_encode($client_data);
        }
    }

    function delete()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new ClientModel();

            $crudModel->where('id_cli', $id)->delete($id);

            echo '<div class="alert alert-success">Client supprimé avec succès</div>';
        }
    }
}

	
