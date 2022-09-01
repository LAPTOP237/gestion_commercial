<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\CommandeModel;
use App\Models\LignelivraisonModel;
use App\Models\LivraisonModel;

class LivraisonController extends Home
{
	public function index()
	{
		$CrudModel = new LivraisonModel();
		$data = [
			'livraisons' => $CrudModel->All(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Livraisons']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Livraisons', 'li_1' => 'Livraison', 'li_2' => 'Listes des Livraisons'])
		];
		return view('list-livraison', $data);
	}

	public function show_add_livraison()
	{
		
		$LignelivraisonModel = new LignelivraisonModel();
		$commandeModel = new CommandeModel();
		$clientModel = new ClientModel();
		$num_livraison = $this->generer_num('BL');
		
		$data = [
			'num_livraison' => $num_livraison,
			'clients' => $clientModel->orderBy('id_cli', 'DESC')->findAll(),
			'commandes' => $commandeModel->orderBy('id_commande', 'DESC')->findAll(),
			'lignes' => $LignelivraisonModel->orderBy('id_ligne_livraison', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Livraisons']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Livraisons', 'li_1' => 'Livraison', 'li_2' => 'Nouvelle Livraison'])
		];
		return view('add-livraison', $data);
	}

	function fetch_all_ligne()
	{
		
        $num = $this->generer_num('BL');
		
		$LigneModel = new LignelivraisonModel();
		$livraisons = $LigneModel->where('livraison_num', $num)->orderBy('id_ligne_livraison', 'DESC')->findAll();
		echo json_encode($livraisons);
	
	}
	function add_livraison()
	{
		helper(['form', 'url']);

            		$crudModel = new LivraisonModel();
            		$crudModel->save([
            			'num_livraison'      =>  $this->request->getVar('num_livraison'),
						'commande_num'      =>  $this->request->getVar('commande_num'),
                        'date_livraison'     =>  $this->request->getVar('date_livraison'),
                        'adresse_livraison'    =>  $this->request->getVar('adresse_livraison'),
                        'nb_colis'    =>  $this->request->getVar('nb_colis'),
                        'cli_id'    =>  $this->request->getVar('cli_id')
                    

            		]);

            		$message = '<div class="alert alert-success">Livraison Ajouté avec succes</div>';

					return redirect()->to(base_url('/list-livraison'));
            	
	}

	function action_ligne()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new LignelivraisonModel();
            		$crudModel->save([
            			'livraison_num'      =>  $this->request->getVar('livraison_num'),
                        'designation'     =>  $this->request->getVar('designation'),
                        'quantite'    =>  $this->request->getVar('quantite'),
                        'conditionnement'    =>  $this->request->getVar('conditionnement'),
                    

            		]);
					

            		$message = '<div class="alert alert-success">Ligne Ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new LignelivraisonModel();

                    $id = $this->request->getVar('hidden_id');

                    $data = [
						'livraison_num'      =>  $this->request->getVar('livraison_num'),
                        'designation'     =>  $this->request->getVar('designation'),
                        'quantite'    =>  $this->request->getVar('quantite'),
                        'conditionnement'    =>  $this->request->getVar('conditionnement'),
                    ];
					

                    $crudModel->update($id, $data);

                    $message = '<div class="alert alert-success">Ligne mise à jour avec succes</div>';
                }
           

            $output = array(
            	'success'		=>	$success,
            	'message'		=>	$message
            );

            echo json_encode($output);
		}
	}

    function fetch_single_data_ligne()
    {
        if($this->request->getVar('id'))
        {
            $crudModel = new LignelivraisonModel();

            $ligne_data = $crudModel->where('id_ligne_livraison', $this->request->getVar('id'))->first();

            echo json_encode($ligne_data);
        }
    }

    function delete_ligne()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new LignelivraisonModel();

            $crudModel->where('id_ligne_livraison', $id)->delete($id);

            echo '<div class="alert alert-success">Ligne supprimé avec succès</div>';
        }
    }

	function fetch_single_livraison($num)
	{

		$crudModel = new LivraisonModel();

		$ligne_data = $crudModel->where('num_livraison', $num)->first();

		return $ligne_data;
	}
	function Alligne($num)
	{

		$Ligne = new LignelivraisonModel();
		$proformas = $Ligne->where('livraison_num', $num)->orderBy('id_ligne_livraison', 'DESC')->findAll();
		return $proformas;
	}

	function destroy_livraison($id)
	{

		$crudModel = new LivraisonModel();
		$crudModel->where('id_livraison', $id)->delete($id);

		return redirect()->to(base_url('/list-livraison'));
	}

	function update_livraison($id)
	{
		return redirect()->to(base_url('/list-livraison'));
	}
	function GenLivraison($id)
	{
		$crudModel = new LivraisonModel();
		$ClientModel = new ClientModel();
		$doc = $crudModel->where('id_livraison', $id)->first();
		$num_proforma = $doc['num_livraison'];
		$client = $ClientModel->where('id_cli', $doc['cli_id'])->first();

		$ligne = $this->Alligne($num_proforma);

		$data = [
			'client' =>	$client,
			'doc'		=>	$doc,
			'ligne'		=>	$ligne,
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Livraisons']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Livraisons', 'li_1' => 'Livraison', 'li_2' => 'Generation PDF'])
		];
		return view('pdf-livraison', $data);
	}

	public function changeEtat(){
		$crudModel = new LivraisonModel();

				$id = $this->request->getVar('hidden_id');

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
