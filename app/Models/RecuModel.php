<?php

namespace App\Models;

use CodeIgniter\Model;

class RecuModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'recu';
	protected $primaryKey           = 'id_recu';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_recu', 'montant_chiffre', 'montant_lettre', 'motif_reglement', 'mode_reglement', 'avance', 'reste', 'cli_id','facture_num', 'num_recu'];

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
		$proformas = $this->db->table('recu')->select('recu.*, client.nom_cli')
		->join('client', 'client.id_cli = recu.cli_id',"left")->get()->getResultArray();

		return $proformas;
		
}
}
