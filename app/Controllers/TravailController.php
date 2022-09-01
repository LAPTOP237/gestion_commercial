<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TravailModel;

class TravailController extends BaseController
{

	public function index()
	{
		$TravailModel = new TravailModel();
		$data = [
			'travaux' => $TravailModel->orderBy('commande_num', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Travaux']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Travaux', 'li_1' => 'Travaux', 'li_2' => 'Listes des Travaux'])
		];
		return view('travaux', $data);
	}

	function fetch_all()
	{
		$TravailModel = new TravailModel();
		$travaux = $TravailModel->orderBy('commande_num', 'DESC')->findAll();
		echo json_encode($travaux);

	}

	function action()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new TravailModel();
            		$crudModel->save([
            			'commande_num'      =>  $this->request->getVar('commande_num'),
                        'libelle'     =>  $this->request->getVar('libelle'),
                        'delai'    =>  $this->request->getVar('delai'),
                        'lien_fichier'    =>  $this->request->getVar('lien_fichier'),
                        'responsable_id' =>  $this->request->getVar('responsable_id'),
            		]);

            		$message = '<div class="alert alert-success">Travail ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new TravailModel();

                    $id = $this->request->getVar('hidden_id_etat');

                    $data = [
                        'commande_num'      =>  $this->request->getVar('commande_num'),
                        'libelle'     =>  $this->request->getVar('libelle'),
                        'delai'    =>  $this->request->getVar('delai'),
                        'lien_fichier'    =>  $this->request->getVar('lien_fichier'),
                        'responsable_id' =>  $this->request->getVar('responsable_id'),
                    ];

                    $crudModel->update($id, $data);

                    $message = '<div class="alert alert-success">Travail mise à jour avec succes</div>';
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
            $crudModel = new TravailModel();

            $client_data = $crudModel->where('id_travail', $this->request->getVar('id'))->first();

            echo json_encode($client_data);
        }
    }

    function delete()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new TravailModel();

            $crudModel->where('id_travail', $id)->delete($id);

            echo '<div class="alert alert-success">Travail supprimé avec succès</div>';
        }
    }

    public function changeEtat(){
		$crudModel = new TravailModel();

				$id = $this->request->getVar('hidden_id_etat');

				$data = [
					'etat'      =>  $this->request->getVar('etat'),
				];

				$crudModel->update($id, $data);

				$output = array(
					'success'		=>	'yes',
					'message'		=>	'Etat changé avec succès'
				);

				echo json_encode($output);

	}
}