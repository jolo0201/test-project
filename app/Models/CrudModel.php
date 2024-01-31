<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
	protected $table = 'tbl_data';

	protected $primaryKey = 'id';

	protected $allowedFields = ['lastname', 'firstname', 'middlename','age','birthdate','status'];

}

?>