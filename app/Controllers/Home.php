<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use App\Models\FactureModel;
use App\Models\LivraisonModel;
use App\Models\ProformaModel;
use App\Models\RecuModel;
use App\Models\ClientModel;

class Home extends BaseController
{
	public function index()
	{
		if (!session()->get('isLoggedIn')) {
			return redirect()->to(base_url('pages-login'));
		}
		$clientModel = new ClientModel();
		$ProformaModel = new ProformaModel();
		$FactureModel = new FactureModel();
		$CommandeModel = new CommandeModel();
		$LivraisonModel = new LivraisonModel();
		$data = [
			"nb_client" => $clientModel->nb_client(),
        
			'nb_proforma' => $ProformaModel->nb_doc(),
			'nb_proforma_attente' => $ProformaModel->nb_doc_attente(),
			'nb_proforma_valide' => $ProformaModel->nb_doc_valide(),

			'nb_commande' => $CommandeModel->nb_doc(),
			'nb_commande_attente' => $CommandeModel->nb_doc_attente(),
			'nb_commande_valide' => $CommandeModel->nb_doc_valide(),

			'nb_livraison' => $LivraisonModel->nb_doc(),
			'nb_livraison_attente' => $LivraisonModel->nb_doc_attente(),
			'nb_livraison_valide' => $LivraisonModel->nb_doc_valide(),

			'nb_facture' => $FactureModel->nb_doc(),
			'nb_facture_attente' => $FactureModel->nb_doc_attente(),
			'nb_facture_valide' => $FactureModel->nb_doc_valide(),

			'title_meta' => view('partials/title-meta', ['title' => 'Tableau de Bord']),
			'page_title' => view('partials/page-title', ['title' => 'Tableau de Bord', 'li_1' => 'Bienvenue sur MC GESTION COMMERCIAL'])
		];
		
		return view('index', $data);
	}

	// Pages
	public function show_pages_login()
	{
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('pages-login', $data);
	}
	public function show_pages_register()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Register'])
		];
		return view('pages-register', $data);
	}
	public function show_pages_recoverpw()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Recover_Password'])
		];
		return view('pages-recoverpw', $data);
	}
	public function show_pages_profile()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'Pages', 'li_2' => 'Profile'])
		];
		return view('pages-profile', $data);
	}
	public function show_pages_maintenance()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Maintenance'])
		];
		return view('pages-maintenance', $data);
	}
	public function show_pages_comingsoon()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Coming_Soon'])
		];
		return view('pages-comingsoon', $data);
	}
	public function show_pages_404()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Error_404'])
		];
		return view('pages-404', $data);
	}
	public function show_pages_500()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Error_500'])
		];
		return view('pages-500', $data);
	}

	public function generer_num($doc = '')
	{
		$facture = new FactureModel();
		$recu = new RecuModel();
		$proforma = new ProformaModel();
		$commande = new CommandeModel();
		$livraison = new LivraisonModel();

		if ($doc == 'FA') {
			$last = $facture->orderBy('id_facture', 'DESC')->findColumn('num_facture');
			$last_id = $last[0];
		} elseif ($doc == 'BL') {
			$last = $livraison->orderBy('id_livraison', 'DESC')->findColumn('num_livraison');
			$last_id = $last[0];
		} elseif ($doc == 'BC') {
			$last = $commande->orderBy('id_commande', 'DESC')->findColumn('num_commande');
			$last_id = $last[0];
		} elseif ($doc == 'FP') {
			$last = $proforma->orderBy('id_proforma', 'DESC')->findColumn('num_proforma');
			$last_id = $last[0];
		} elseif ($doc == 'RC') {
			$last = $recu->orderBy('id_recu', 'DESC')->findColumn('num_recu');
			$last_id = $last[0];
		}

		if ($last_id) {
			$tab = explode("-", $last_id);
		$rang_doc = str_pad($tab[3] + 1, 6, "0", STR_PAD_LEFT);
		} else {
			$rang_doc = '000001';
		}
		
		$annee = date("Y");
		$mois = date("m");
		

		$num = $doc."-".$annee."-".$mois."-".$rang_doc;
		return $num;
	}
}
