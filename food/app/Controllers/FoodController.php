<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\OrderModel;
use App\Models\PersonalModel;

class FoodController extends BaseController
{
	public function index()
	{
		helper(['form', 'url']);
		if ($this->request->getMethod() === 'post') {
			$order = new OrderModel();
			$o = [
				'person' => $this->request->getPost('person'),
				'food' => $this->request->getPost('food'),
				'drink' => $this->request->getPost('drink'),
				'order_date' => date('d.m.Y')
			];
			$order->save($o);

			if ($order->find($o['person'])) {
				$order->save($o);
			} else {
				$order->insert($o);
			}

			$data['o'] = $o;

			$this->send_confirmation($o);

			echo view('Success');
		} else {
			$personal = new PersonalModel();
			$menu = new MenuModel();
			$data['menu'] = $menu->asObject()->findAll();
			$data['personal'] = $personal->asObject()->findAll();
			echo view('OrderList', $data);
		}
	}

	public function send_confirmation($data)
	{
		$person = new PersonalModel();
		$food = new MenuModel();
		$drink = new MenuModel();

		$person = $person->asObject()->find($data['person']);
		$food = $food->asObject()->find($data['food']);
		if ($data['drink']) {
			$drink = $drink->asObject()->find($data['drink']);
		} else {
			$drink = null;
		}

		/**
		 * --------------------------------------------------------------------------
		 * Mail
		 * --------------------------------------------------------------------------
		 */
		$to = $person->email;
		$subject = 'Deine Pizza-Bestellung für '.date('d.m.Y');
		$header = 'From: mittag@food.maestro02.ch' . "\r\n";
		$header .= 'Reply-To: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'CC: raphael.suter@maestro02.ch' . "\r\n";
		$header .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
		$header .= 'MIME-Version: 1.0' . "\r\n";

		$body = '<html lang="de" ><body ><div >Hallo '.$person->first_name.'</div ><br ><div >
				Deine Bestellung für '.date('d.m.Y').' ist erfolgreich gespeichert und wird dem Dispatcher via IT-Bern-Mail
				gemeldet.</div >
				<br ><div ><b >Folgendes hast du bestellt: </b ></div ><table ><tr ><th >was</th ><th >Preis</th ></tr >
				<tr ><td >'.$food->foodname.'</td >
				<td >Fr. '.number_format((float)$food->price, 2, '.', '').'</td ></tr >';
		if ($drink) {
			$body .= "<tr >
					<td >".$drink->foodname."</td >
					<td >Fr. ".number_format((float)$drink->price, 2, '.', '')."</td ></tr >";
		}
		$body .= '<tr ><th >Total</th >
				<th >Fr. '.number_format((float)$drink->price + $food->price, 2, '.', '').'</th >
				</tr ></table ><br ><div >Liebe Grüsse und häb e Guete</div ><br ><div >Räfus Pizza-Bestell-Lösung</div ></body ></html >';

		mail($to, $subject, $body, $header);

		//mail('raphael.suter@maestro02.ch', 'Test', 'Testmail')

	}
}