<?php

namespace App\Controllers;

use App\Models\MenuModel;
use ReflectionException;
use Smalot\PdfParser\Parser;

class MenuCrawler extends BaseController
{
	public function menu():void
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

		if (strpos($text, $checkDate) > 0){
			$data['datecheck'] = 'Datum stimmt: '.$checkDate;

		$elements = explode('>>> ', $text);

		$counter = 0;
		foreach ($elements as $part){
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
					($menu->find($counter)) ? $menu->save($m) : $menu->insert($m);
				} catch (ReflectionException $e){
					echo $e->getMessage();
				}
			}
			$counter++;
		}
		} else {
			$data['datecheck'] = 'Datum '.$checkDate.' ergibt: '.strpos($text, $checkDate);
		}

		$data['menu'] = $menu->findAll();

		// return view('menuupdate', $data);
	}
}