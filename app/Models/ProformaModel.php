<?php

namespace App\Models;

use CodeIgniter\Model;

class ProformaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'proforma';
	protected $primaryKey           = 'id_proforma';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['num_proforma','montant_lettre','cond_vente','natre_transac','date_proforma','delai_livraison','cond_paiment','totalHT','totalTTC','etat'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function AllProforma ()
	{
		$proformas = $this->db->table('proforma')->select('proforma.*, client.nom_cli')
		->join('client', 'client.id_cli = proforma.cli_id',"left")->get()->getResultArray();
		return $proformas;
	}

	public function nb_doc ()
	{
		$nb = $this->countAll();
		return $nb;
}

public function nb_doc_attente()
	{
		$nb = $this->where('etat', 0)->countAllResults();
		return $nb;
}

public function nb_doc_valide()
	{
		$nb = $this->where('etat', 1)->countAllResults();
		return $nb;
}

}
