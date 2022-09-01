<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\CommandeModel;
use App\Models\FactureModel;
use App\Models\LignefactureModel;
use App\Models\LivraisonModel;
use App\Models\RecuModel;

class FactureController extends Home
{
	public function index()
	{
		$CrudModel = new FactureModel();
		$data = [
			'factures' => $CrudModel->All(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Factures']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Factures', 'li_1' => 'Facture', 'li_2' => 'Listes des Factures'])
		];
		return view('list-facture', $data);
	}
	public function index2()
	{
		$ClientModel = new ClientModel();
		$factureModel = new FactureModel();
		$CrudModel = new RecuModel();
		$num_recu = $this->generer_num('RC');
		$data = [
			'num_recu' => $num_recu,
			'factures' => $factureModel->orderBy('id_facture', 'DESC')->findAll(),
			'clients' => $ClientModel->orderBy('id_cli', 'DESC')->findAll(),
			'recu' => $CrudModel->All(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Factures']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Factures', 'li_1' => 'Réglement', 'li_2' => 'Reçu'])
		];
		return view('add-recu', $data);
	}

	public function show_add_facture()
	{
		
		$LignecommandeModel = new LignefactureModel();
		
		$clientModel = new ClientModel();
		$commandeModel = new CommandeModel();
		$livraisonModel = new LivraisonModel();
		$num_facture = $this->generer_num('FA');
		
		$data = [
			'commandes' => $commandeModel->orderBy('id_commande', 'DESC')->findAll(),
			'livraisons' => $livraisonModel->orderBy('id_livraison', 'DESC')->findAll(),
			'num_facture' => $num_facture,
			'clients' => $clientModel->orderBy('id_cli', 'DESC')->findAll(),
			'lignes' => $LignecommandeModel->orderBy('id_ligne_facture', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Factures']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Factures', 'li_1' => 'Facture', 'li_2' => 'Nouvelle Facture'])
		];
		return view('add-facture', $data);
	}

	function fetch_all_ligne()
	{
		
        $num = $this->generer_num('FA');
		
		$LigneModel = new LignefactureModel();
		$factures = $LigneModel->where('facture_num', $num)->orderBy('id_ligne_facture', 'DESC')->findAll();
		echo json_encode($factures);
	
	}
	function add_facture()
	{
		helper(['form', 'url']);

            		$crudModel = new FactureModel();
            		$crudModel->save([
            			'num_facture'      =>  $this->request->getVar('num_facture'),
						'commande_num'      =>  $this->request->getVar('commande_num'),
                        'livraison_num'     =>  $this->request->getVar('livraison_num'),
                        'cond_vente'    =>  $this->request->getVar('cond_vente'),
						'cond_paiement'    =>  $this->request->getVar('cond_paiement'),
                        'totalHT'    =>  $this->request->getVar('totalHT'),
						'date_echeance'    =>  $this->request->getVar('date_echeance'),
						// 'delai_livraison'    =>  $this->request->getVar('delai_livraison'),
                        'totalTTC'    =>  $this->request->getVar('totalTTC'),
                        'date_facture'    =>  $this->request->getVar('date_facture'),
						'montant_lettre'    =>  $this->request->getVar('montant_lettre'),
                        'cli_id'    =>  $this->request->getVar('cli_id')
                    

            		]);

            		$message = '<div class="alert alert-success">facture ajouté avec succes</div>';

					return redirect()->to(base_url('/list-facture'));
            	
	}

	function action_ligne()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new LignefactureModel();
            		$crudModel->save([
            			'facture_num'      =>  $this->request->getVar('facture_num'),
                        'montantHT'     =>  $this->request->getVar('montantHT'),
                        'montantTTC'    =>  $this->request->getVar('montantTTC'),
                        'tauxTVA'    =>  $this->request->getVar('tauxTVA'),
                        'designation'    =>  $this->request->getVar('designation'),
                        'quantite'    =>  $this->request->getVar('quantite'),
                        'PU'    =>  $this->request->getVar('PU'),
						'remise'    =>  $this->request->getVar('remise')
                    

            		]);

            		$message = '<div class="alert alert-success">Ligne Ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new LignefactureModel();

                    $id = $this->request->getVar('hidden_id');

                    $data = [
						'facture_num'      =>  $this->request->getVar('facture_num'),
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
            $crudModel = new LignefactureModel();

            $ligne_data = $crudModel->where('id_ligne_facture', $this->request->getVar('id'))->first();

            echo json_encode($ligne_data);
        }
    }

    function delete_ligne()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new LignefactureModel();

            $crudModel->where('id_ligne_facture', $id)->delete($id);

            echo '<div class="alert alert-success">Ligne supprimé avec succès</div>';
        }
    }

	function fetch_all_recu()
	{
		
		$Model = new RecuModel();
		$recu = $Model->All();
		echo json_encode($recu);
	
	}

	function fetch_single_data_recu()
    {
        if($this->request->getVar('id'))
        {
            $crudModel = new RecuModel();

            $data = $crudModel->where('id_recu', $this->request->getVar('id'))->first();

            echo json_encode($data);
        }
    }

	function delete_recu()
    {
        if($this->request->getVar('id'))
        {
            $id = $this->request->getVar('id');

            $crudModel = new RecuModel();

            $crudModel->where('id_recu', $id)->delete($id);

            echo '<div class="alert alert-success">supprimé avec succès</div>';
        }
    }

	function action_recu()
	{
		if($this->request->getVar('action'))
		{
			helper(['form', 'url']);

            	$success = 'yes';
            	if($this->request->getVar('action') == 'Add')
            	{
            		$crudModel = new RecuModel();
            		$crudModel->save([
            			'num_recu'      =>  $this->request->getVar('num_recu'),
                        'montant_chiffre'     =>  $this->request->getVar('montant_chiffre'),
                        'montant_lettre'    =>  $this->request->getVar('montant_lettre'),
                        'motif_reglement'    =>  $this->request->getVar('motif_reglement'),
                        'mode_reglement'    =>  $this->request->getVar('mode_reglement'),
                        'avance'    =>  $this->request->getVar('avance'),
                        'reste'    =>  $this->request->getVar('reste'),
						'facture_num'    =>  $this->request->getVar('facture_num'),
						'cli_id'  =>  $this->request->getVar('cli_id')
                    

            		]);

            		$message = '<div class="alert alert-success">Ajouté avec succes</div>';
            	}

                if($this->request->getVar('action') == 'Edit')
                {
                    $crudModel = new RecuModel();

                    $id = $this->request->getVar('hidden_id');

                    $data = [
						'num_recu'      =>  $this->request->getVar('num_recu'),
                        'montant_chiffre'     =>  $this->request->getVar('montant_chiffre'),
                        'montant_lettre'    =>  $this->request->getVar('montant_lettre'),
                        'motif_reglement'    =>  $this->request->getVar('motif_reglement'),
                        'mode_reglement'    =>  $this->request->getVar('mode_reglement'),
                        'avance'    =>  $this->request->getVar('avance'),
                        'reste'    =>  $this->request->getVar('reste'),
						'facture_num'    =>  $this->request->getVar('facture_num'),
						'cli_id'  =>  $this->request->getVar('cli_id')
                    ];

                    $crudModel->update($id, $data);

                    $message = '<div class="alert alert-success">* mise à jour avec succes</div>';
                }
           

            $output = array(
            	'success'		=>	$success,
            	'message'		=>	$message
            );

            echo json_encode($output);
		}
	}

	function GenRecu($id)
	{
		$crudModel = new RecuModel();
		$ClientModel = new ClientModel();
		$doc = $crudModel->where('id_recu', $id)->first();
		$client = $ClientModel->where('id_cli', $doc['cli_id'])->first();

		

		$data = [
			'client' =>	$client,
			'doc'		=>	$doc,
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Fcatures']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Fcatures', 'li_1' => 'Reglement', 'li_2' => 'Generation PDF'])
		];
		return view('pdf-recu', $data);
	}

	function fetch_single_facture($num_proforma)
	{

		$crudModel = new FactureModel();

		$ligne_data = $crudModel->where('num_facture', $num_proforma)->first();

		return $ligne_data;
	}
	function Alligne($num_proforma)
	{

		$LigneProforma = new LignefactureModel();
		$proformas = $LigneProforma->where('facture_num', $num_proforma)->orderBy('id_ligne_facture', 'DESC')->findAll();
		return $proformas;
	}

	function GenFacture($id)
	{
		$crudModel = new FactureModel();
		$ClientModel = new ClientModel();
		$doc = $crudModel->where('id_facture', $id)->first();
		$num_proforma = $doc['num_facture'];
		$client = $ClientModel->where('id_cli', $doc['cli_id'])->first();

		$ligne = $this->Alligne($num_proforma);

		$data = [
			'client' =>	$client,
			'doc'		=>	$doc,
			'ligne'		=>	$ligne,
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Factures']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Factures', 'li_1' => 'Facture', 'li_2' => 'Generation PDF'])
		];
		return view('pdf-facture', $data);
	}

	function destroy_facture($id)
	{

		$crudModel = new FactureModel();
		$crudModel->where('id_facture', $id)->delete($id);

		return redirect()->to(base_url('/list-facture'));
	}

	function update_facture($id)
	{
		return redirect()->to(base_url('/list-facture'));
	}

	public function changeEtat(){
		$crudModel = new FactureModel();

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
