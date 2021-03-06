<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\OrderModel;
use App\Models\PersonalModel;
use ReflectionException;
use Smalot\PdfParser\Parser;

class FoodController extends BaseController
{
	public function index():void
	{
		$data['datecheck'] = $this->getMenu();

		helper(['form', 'url']);
		if ($this->request->getMethod() === 'post') {
			$order = new OrderModel();
			$o = [
				'person' => $this->request->getPost('person'),
				'food' => $this->request->getPost('food'),
				'drink' => $this->request->getPost('drink'),
				'order_date' => date('Y-m-d')
			];

			if ($order->find($o['person'])) {
				$order->save($o);
			} else {
				$order->insert($o);
			}

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

	public function send_confirmation($data):void
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

		$body = '<html lang="de" ><body style="font-family: Arial,sans-serif; font-size: 16px; line-height:20px;line-height:30px"><div >Hallo '.$person->first_name.'</div ><br >
				<div >Deine Bestellung für '.date('d.m.Y').' ist erfolgreich gespeichert und wird dem Dispatcher via IT-Bern-Mail gemeldet.</div ><br >
				<div ><b >Folgendes hast du bestellt: </b ></div >
				<table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;" >
					<thead>
						<tr >
							<th align="left" scope="col" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;line-height:30px">was</th >
							<th align="left" scope="col" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;line-height:30px">Preis</th >
						</tr >
					</thead>
					<tbody>
						<tr >
							<td align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">'.$food->foodname.'</td >
							<td align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Fr. '.number_format((float)$food->price, 2, '.', '').'</td >
						</tr >';
		if ($drink) {
			$body .= '	<tr >
							<td align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">'.$drink->foodname.'</td >
							<td align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Fr. '.number_format((float)$drink->price, 2, '.', '').'</td >
						</tr >';
		}
		
		($drink) ? ($totalprice = $drink->price + $food->price) : ($totalprice = $food->price);
		
		$body .= '		<tr >
							<th align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Total</th >
							<th align="left" valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Fr. '.number_format((float)$totalprice, 2, '.', '').'</th >
						</tr >
					</tbody>
				</table ><br >
				<div >Liebe Grüsse und häb e Guete</div ><br ><div >Räfus Pizza-Bestell-Lösung</div ></body ></html >';

		mail($to, $subject, $body, $header);



	}

	public function getMenu()
	{
		$menu = new MenuModel();

		$url = 'http://www.lacarbonara.ch/assets/tagesmenue.pdf';

		$parser = new Parser();
		try {
			$pdf = $parser->parseFile($url);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		$text = $pdf->getText();

		$checkDate = date('d.m.Y');
		
		//return $text;
		return;

		if (strpos($text, $checkDate) > 0){
			$datecheck = 'Datum stimmt: '.$checkDate;

			$elements = explode('>>> ', $text);

			$counter = 0;
			foreach ($elements as $part){
			    //while ($counter < 4){
			       if ($counter > 0){
					$pos = strpos($part, '<');
					$text1 = substr($part, 0, $pos-2);
					$rest = substr($part, $pos+4, strlen($part)-1);
					$pos = strpos($rest, 'Fr. ');
					$text2 = substr($rest, 2, $pos-5);
					$text3 = (float)substr($rest, $pos+4, $pos+5);
					$text3 -= 3;

					$m = [
						'id' => $counter,
						'name' => $text1,
						'desc' => $text2,
						'price' => $text3,
						'date' => $checkDate,
						'type' => 'menu'
					];
					try{
						$menu->save($m);
					} catch (ReflectionException $e){
						echo $e->getMessage();
					}
				//}
				$counter++; 
			    }
				
			}
		} else {
			$datecheck = 'Datum '.$checkDate.' ergibt: '.strpos($text, $checkDate);
		}
		
		return $datecheck;
	}


}