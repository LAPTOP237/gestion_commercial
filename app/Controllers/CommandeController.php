<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\CommandeModel;
use App\Models\LignecommandeModel;

class CommandeController extends Home
{
	
	public function index()
	{
		$CrudModel = new CommandeModel();
		$data = [
			'commandes' => $CrudModel->All(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Commandes']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Commandes', 'li_1' => 'Commande', 'li_2' => 'Listes des Commandes'])
		];
		return view('list-commande', $data);
	}

	public function show_add_commande()
	{
		
		$LignecommandeModel = new LignecommandeModel();
		
		$clientModel = new ClientModel();
		$num_commande = $this->generer_num('BC');
		
		$data = [
			'num_commande' => $num_commande,
			'clients' => $clientModel->orderBy('id_cli', 'DESC')->findAll(),
			'lignes' => $LignecommandeModel->orderBy('id_ligne_commande', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Commandes']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Commandes', 'li_1' => 'Commande', 'li_2' => 'Nouvelle Commande'])
		];
		return view('add-commande', $data);
	}

	function fetch_all_ligne()
	{
		
        $num = $this->generer_num('BC');
		
		$LigneModel = new LignecommandeModel();
		$commandes = $LigneModel->where('commande_num', $num)->orderBy('id_ligne_commande', 'DESC')->findAll();
		echo json_encode($commandes);
	
	}
	function add_commande()
	{
		helper(['form', 'url']);

            		$crudModel = new CommandeModel();
            		$crudModel->save([
            			'num_commande'      =>  $this->request->getVar('num_commande'),
						'proforma_num'      =>  $this->request->getVar('proforma_num'),
                        'cond_paiement'     =>  $this->request->getVar('cond_paiement'),
                        'cond_vente'    =>  $this->request->getVar('cond_vente'),
                        'totalHT'    =>  $this->request->getVar('totalHT'),
                        'totalTTC'    =>  $this->request->getVar('totalTTC'),
                        'date_commande'    =>  $this->request->getVar('date_commande'),
                        'cli_id'    =>  $this->request->getVar('cli_id')
                    

            		]);

            		$message = '<div class="alert alert-success">Commande Ajouté avec succes</div>';

					return redirect()->to(base_url('/list-commande'));
            	
	}

	function action_ligne()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new LignecommandeModel();
            		$crudModel->save([
            			'commande_num'      =>  $this->request->getVar('commande_num'),
                        'montantHT'     =>  $this->request->getVar('montantHT'),
                        'montantTTC'    =>  $this->request->getVar('montantTTC'),
                        'tauxTVA'    =>  $this->request->getVar('tauxTVA'),
                        'designation'    =>  $this->request->getVar('designation'),
                        'quantite'    =>  $this->request->getVar('quantite'),
                        'PU'    =>  $this->request->getVar('PU')
                    

            		]);

            		$message = '<div class="alert alert-success">Ligne Ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new LignecommandeModel();

                    $id = $this->request->getVar('hidden_id');

                    $data = [
						'commande_num'      =>  $this->request->getVar('commande_num'),
                        'montantHT'     =>  $this->request->getVar('montantHT'),
                        'montantTTC'    =>  $this->request->getVar('montantTTC'),
                        'tauxTVA'    =>  $this->request->getVar('tauxTVA'),
                        'designation'    =>  $this->request->getVar('designation'),
                        'quantite'    =>  $this->request->getVar('quantite'),
                        'PU'    =>  $this->request->getVar('PU')
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
            $crudModel = new LignecommandeModel();

            $ligne_data = $crudModel->where('id_ligne_commande', $this->request->getVar('id'))->first();

            echo json_encode($ligne_data);
        }
    }

    function delete_ligne()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new LignecommandeModel();

            $crudModel->where('id_ligne_commande', $id)->delete($id);

            echo '<div class="alert alert-success">Ligne supprimé avec succès</div>';
        }
    }

	function fetch_single_commande($num)
	{

		$crudModel = new CommandeModel();

		$ligne_data = $crudModel->where('num_commande', $num)->first();

		return $ligne_data;
	}
	function Alligne($num)
	{

		$Ligne = new LignecommandeModel();
		$proformas = $Ligne->where('commande_num', $num)->orderBy('id_ligne_commande', 'DESC')->findAll();
		return $proformas;
	}

	function destroy_commande($id)
	{

		$crudModel = new CommandeModel();
		$crudModel->where('id_commande', $id)->delete($id);

		return redirect()->to(base_url('/list-commande'));
	}

	function update_commande($id)
	{
		return redirect()->to(base_url('/list-commande'));
	}
	function GenCommande($id)
	{
		$crudModel = new CommandeModel();
		$ClientModel = new ClientModel();
		$doc = $crudModel->where('id_commande', $id)->first();
		$num_proforma = $doc['num_commande'];
		$client = $ClientModel->where('id_cli', $doc['cli_id'])->first();

		$ligne = $this->Alligne($num_proforma);

		$data = [
			'client' =>	$client,
			'doc'		=>	$doc,
			'ligne'		=>	$ligne,
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Commandes']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Commandes', 'li_1' => 'Commande', 'li_2' => 'Generation PDF'])
		];
		return view('pdf-commande', $data);
	}
	public function changeEtat(){
		$crudModel = new CommandeModel();

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
