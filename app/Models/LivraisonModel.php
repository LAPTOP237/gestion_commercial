<?php

namespace App\Models;

use CodeIgniter\Model;

class LivraisonModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'livraison';
	protected $primaryKey           = 'id_livraison';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['cli_id','id_livraison', 'num_livraison', 'date_livraison', 'adresse_livraison', 'nb_colis', 'etat', 'commande_num'];

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

	public function All ()
	{
		$proformas = $this->db->table('livraison')->select('livraison.*, client.nom_cli')
		->join('client', 'client.id_cli = livraison.cli_id',"left")->get()->getResultArray();

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

