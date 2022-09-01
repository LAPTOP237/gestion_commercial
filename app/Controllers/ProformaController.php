<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\LigneproformaModel;
use App\Models\ProformaModel;

class ProformaController extends Home
{
	public function index()
	{
		$ProformaModel = new ProformaModel();
		$data = [
			'proformas' => $ProformaModel->AllProforma(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Proformas']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Proformas', 'li_1' => 'Proforma', 'li_2' => 'Listes des Proformas'])
		];
		return view('list-proforma', $data);
	}

	public function show_add_proforma()
	{

		$LigneProformaModel = new LigneproformaModel();

		$clientModel = new ClientModel();
		$num_proforma = $this->generer_num('FP');

		$data = [
			'num_proforma' => $num_proforma,
			'clients' => $clientModel->orderBy('id_cli', 'DESC')->findAll(),
			'lignes' => $LigneProformaModel->orderBy('id_ligne_proforma', 'DESC')->findAll(),
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Proformas']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Proformas', 'li_1' => 'Proforma', 'li_2' => 'Nouveau Proforma'])
		];
		return view('add-proforma', $data);
	}

	function fetch_all_ligne()
	{

		$num = $this->generer_num('FP');

		$LigneProforma = new LigneproformaModel();
		$proformas = $LigneProforma->where('proforma_num', $num)->orderBy('id_ligne_proforma', 'DESC')->findAll();
		echo json_encode($proformas);
	}
	function add_proforma()
	{
		helper(['form', 'url']);

		$crudModel = new ProformaModel();
		$crudModel->save([
			'num_proforma'      =>  $this->request->getVar('num_proforma'),
			'cond_paiement'     =>  $this->request->getVar('cond_paiement'),
			'cond_vente'    =>  $this->request->getVar('cond_vente'),
			'totalHT'    =>  $this->request->getVar('totalHT'),
			'totalTTC'    =>  $this->request->getVar('totalTTC'),
			'delai_livraison'    =>  $this->request->getVar('delai_livraison'),
			'montant_lettre'    =>  $this->request->getVar('montant_lettre'),
			'nature_transac'    =>  $this->request->getVar('nature_transac'),
			'date_proforma'    =>  $this->request->getVar('date_proforma'),
			'cli_id'    =>  $this->request->getVar('cli_id')


		]);

		$message = '<div class="alert alert-success">Proforma Ajouté avec succes</div>';

		return redirect()->to(base_url('/list-proforma'));
	}

	function action_ligne()
	{
		if ($this->request->getVar('action')) {
			helper(['form', 'url']);

			$success = 'yes';
			if ($this->request->getVar('action') == 'Add') {
				$crudModel = new LigneproformaModel();
				$crudModel->save([
					'proforma_num'      =>  $this->request->getVar('proforma_num'),
					'montantHT'     =>  $this->request->getVar('montantHT'),
					'montantTTC'    =>  $this->request->getVar('montantTTC'),
					'tauxTVA'    =>  $this->request->getVar('tauxTVA'),
					'designation'    =>  $this->request->getVar('designation'),
					'quantite'    =>  $this->request->getVar('quantite'),
					'PU'    =>  $this->request->getVar('PU')


				]);

				$message = '<div class="alert alert-success">Ligne Ajouté avec succes</div>';
			}

			if ($this->request->getVar('action') == 'Edit') {
				$crudModel = new LigneproformaModel();

				$id = $this->request->getVar('hidden_id');

				$data = [
					'proforma_num'      =>  $this->request->getVar('proforma_num'),
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
		if ($this->request->getVar('id')) {
			$crudModel = new LigneproformaModel();

			$ligne_data = $crudModel->where('id_ligne_proforma', $this->request->getVar('id'))->first();

			echo json_encode($ligne_data);
		}
	}

	function delete_ligne()
	{
		if ($this->request->getVar('id')) {
			$id = $this->request->getVar('id');

			$crudModel = new LigneproformaModel();

			$crudModel->where('id_ligne_proforma', $id)->delete($id);

			echo '<div class="alert alert-success">Ligne supprimé avec succès</div>';
		}
	}
	function fetch_single_proforma($num_proforma)
	{

		$crudModel = new ProformaModel();

		$ligne_data = $crudModel->where('num_proforma', $num_proforma)->first();

		return $ligne_data;
	}
	function Alligne($num_proforma)
	{

		$LigneProforma = new LigneproformaModel();
		$proformas = $LigneProforma->where('proforma_num', $num_proforma)->orderBy('id_ligne_proforma', 'DESC')->findAll();
		return $proformas;
	}

	function GenProforma($id)
	{
		$crudModel = new ProformaModel();
		$ClientModel = new ClientModel();
		$doc = $crudModel->where('id_proforma', $id)->first();
		$num_proforma = $doc['num_proforma'];
		$client = $ClientModel->where('id_cli', $doc['cli_id'])->first();

		$ligne = $this->Alligne($num_proforma);

		$data = [
			'client' =>	$client,
			'doc'		=>	$doc,
			'ligne'		=>	$ligne,
			'title_meta' => view('partials/title-meta', ['title' => 'Gestion des Proformas']),
			'page_title' => view('partials/page-title', ['title' => 'Gestion des Proformas', 'li_1' => 'Proforma', 'li_2' => 'Generation PDF'])
		];
		return view('pdf-proforma', $data);
	}

	function destroy_proforma($id)
	{

		$crudModel = new ProformaModel();
		$crudModel->where('id_proforma', $id)->delete($id);

		return redirect()->to(base_url('/list-proforma'));
	}

	function update_proforma($id)
	{
		return redirect()->to(base_url('/list-proforma'));
	}

	public function changeEtat(){
		$crudModel = new ProformaModel();

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
