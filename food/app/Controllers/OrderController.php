<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\OrderModel;
use App\Models\PersonalModel;

class OrderController extends BaseController
{
	public function invite():\CodeIgniter\HTTP\RedirectResponse
	{
		// ToDo: add people to personal table

		$person = new PersonalModel();
		$person = $person->asArray()->findAll();

		foreach ($person as $p){
			if ($p){
				$this->send_invite($p['email'], $p['first_name']);
			}
		}
		return redirect()->to(base_url());
	}

	public function send_invite($email, $first_name):void
	{
		/**
		 * --------------------------------------------------------------------------
		 * Mail
		 * --------------------------------------------------------------------------
		 */
		$to = $email;
		$subject = 'Pizzaday! Gib deine Bestellung auf';
		$header = 'From: mittag@food.maestro02.ch' . "\r\n";
		$header .= 'Reply-To: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'CC: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
		$header .= 'MIME-Version: 1.0' . "\r\n";

		$body = '<html lang="de" ><body ><div >Hallo '.$first_name.'</div ><br ><div >
				Es ist Freitag und somit Zeit für Pizza.
				Bitte gibt deine Bestellung über nachfolgenden Link bis spätestens 11:00 Uhr auf, damit der Dispatcher die Bestellung für dich aufgeben kann.</div >
				<br >
				<a href="https://food.maestro02.ch" class="btn btn-primary btn-lg" tabindex="-1" role="button" >Bestellung erfassen</a>
				<br >
				<br ><div >Liebe Grüsse</div ><br ><div >Räfus Pizza-Bestell-Lösung</div ></body ></html >';

		mail($to, $subject, $body, $header);
	}

	public function send_order_list():\CodeIgniter\HTTP\RedirectResponse
	{
		$orderList = new OrderModel();
		$personList = new PersonalModel();
		$menuList = new MenuModel();

		$orderList = $orderList->asObject()->where('order_date', date('Y-m-d'))->orderBy('food', 'ASC')->findAll();

		$order = [];

		foreach ($orderList as $o){
			if ($o){
				if ($menuList->asObject()->find($o->food)->type === 'menu'){
					$food_name = 'Menu '. $menuList->asObject()->find($o->food)->id . ': '. $menuList->asObject()->find($o->food)->foodname;
				} else {
					$food_name = $menuList->asObject()->find($o->food)->foodname;
				}

				$res = [
					'name' => $personList->asObject()->find($o->person)->first_name,
					'food_name' => $food_name,
					'drink_name' => $menuList->asObject()->find($o->drink)->foodname,
					'total_price' => $menuList->asObject()->find($o->food)->price+$menuList->asObject()->find($o->drink)->price
				];
				$order[] = $res;
			}
		}

		$this->send_order($order);

		return redirect()->to(base_url());

	}

	public function send_order($order):void
	{
		/**
		 * --------------------------------------------------------------------------
		 * Mail
		 * --------------------------------------------------------------------------
		 */

		// ToDo: Change To-Address to IT-Bern

		$to = 'raphael.suter@maestro02.ch';
		$subject = 'Bitte Pizzabestellung auslösen!';
		$header = 'From: mittag@food.maestro02.ch' . "\r\n";
		$header .= 'Reply-To: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'CC: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
		$header .= 'MIME-Version: 1.0' . "\r\n";

		// ToDo: Table design in E-Mail

		$body = '<html lang="de" ><body ><div >Hallo Dispatcher</div ><br >
				<div >Es ist 11 Uhr und Zeit die Bestellung aufzugeben.</div><br>
				<dic>Nachfolgend findest du alle eingegangenen Bestellungen:</div><br>
				<table >
					<tr >
						<th >Wer</th >
						<th >Essen</th >
						<th >Getränk</th >
						<th >Preis</th >
					</tr >';
		foreach ($order as $o){
			$body .= '<tr >
				<td >'.$o['name'].'</td >
				<td >'.$o['food_name'].'</td >
				<td >'.$o['drink_name'].'</td >
				<td >Fr. '.number_format((float)$o['total_price'], 2, '.', '').'</td >
			</tr >';
		}
		$body .= '</table ><br>
			Bitte löse die Bestellung im Restaurant La Carbonara über die Telefonnummer +41 31 332 14 40 (Für Jabber: +41313321440) aus.
			<br ><br>
			<div >Liebe Grüsse</div ><br >
			<div >Räfus Pizza-Bestell-Lösung</div >
			</body ></html >';

		mail($to, $subject, $body, $header);
	}
}