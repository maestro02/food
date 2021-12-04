<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pizza extends Entity
{
	protected $attributes = [
		'id' => null,
		'name' => null,
		'desc' => null,
		'price' => 0.0,
	];
}