<?php namespace App\Models;

use CodeIgniter\Model;

class PersonalModel extends Model
{
	protected $table = 'personal';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'first_name',
		'last_name',
		'email',
		'is_male'
	];
}