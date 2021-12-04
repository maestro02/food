<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Personal extends Entity
{
	protected $attributes = [
		'id' => null,
		'first_name' => null,
		'last_name' => null,
		'email' => null,
		'is_male' => false,
	];
}