<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
	protected $table = 'bestellung';
	protected $primaryKey = 'person';

	protected $allowedFields = [
		'person',
		'food',
		'drink',
		'order_date'
	];
}