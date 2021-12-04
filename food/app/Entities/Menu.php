<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Menu extends Entity
{
	protected $attributes = [
		'id' => null,
		'name' => null,
		'desc' => null,
		'price' => 0.0,
		'date' => null,
	];
}