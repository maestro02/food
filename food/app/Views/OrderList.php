<!DOCTYPE html>
<html lang="de" >
	<head >
		<meta charset="UTF-8" >
		<title >IT-Bern Pizzabestellung</title >
		<meta name="description" content="DAS Pizza-Bestell-Organistionstool der Hirslanden IT-Bern" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" >
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" >
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		        crossorigin="anonymous" ></script >
		<link rel="stylesheet" href="/** @noinspection PhpUndefinedVariableInspection */<?= base_url().'/../css/swgoh.css' ?>" >
		<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	</head >
	<body >
	<h1>Pizzatag!</h1>
	<div>Willkommen auf der Bestellseite der Hirslanden IT in Bern. Nachfolgend kannst du eine Pizza-Bestellung aufgeben. Der Dispatcher wird dann die Bestellung im La Carbonara für uns alle platzieren.</div>

    <?= $datecheck; ?>

	<?= form_open('bestellen') ?>
		<div class="accordion" id="accordionExample" >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="headingOne" >
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
					        aria-expanded="true" aria-controls="collapseOne" >
						Für wen bestellst du?
					</button >
				</h2 >
				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
				     data-bs-parent="#accordionExample" >
					<div class="accordion-body" >
						<?php
						foreach ($personal as $p) {
							echo '<div class="custom-control custom-radio form-check-inline">
							<input type="radio" class="custom-control-input" id="'.$p->id.'" name="person" value="'.$p->id.'">
							<label class="custom-control-label" for="'.$p->id.'">'.$p->first_name.'</label>
							</div>';
						}
						?>
					</div >
				</div >
			</div >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="headingTwo" >
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
						Menü
					</button >
				</h2 >
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
				     data-bs-parent="#accordionExample" >
					<div class="accordion-body" >
						<?php
						foreach ($menu as $p) {
							if ($p->type === 'menu'){
								echo '<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="'.$p->id.'" name="food" value="'.$p->id.'">
							<label class="custom-control-label" for="'.$p->id.'"><b>Menü '.$p->id.': '.$p->foodname.'</b><span 
							class="price w3-right w3-tag w3-dark-grey w3-round" style="padding-left:5px;">Fr. '.number_format((float)$p->price, 2,
										'.', '').'</span><p class="w3-text-grey" 
							>'.$p->details.'</p ></label ></div>';
							}
						}
						?>
						<p ><a href="http://www.lacarbonara.ch/assets/tagesmenue.pdf" >Link zum
								Originaldokument</a ></p >
					</div >
				</div >
			</div >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="headingThree" >
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" >
						Pizza
					</button >
				</h2 >
				<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
				     data-bs-parent="#accordionExample" >
					<div class="accordion-body" >
						<?php
						foreach ($menu as $p) {
							if ($p->type === 'pizza') {
								echo '<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="'.$p->id.'" name="food" value="'.$p->id.'">
							<label class="custom-control-label" for="'.$p->id.'"><b>'.$p->foodname.'</b><span 
							class="price w3-right w3-tag w3-dark-grey w3-round" style="padding-left:5px;">Fr. '.number_format((float)$p->price, 2,
										'.', '').'</span><p class="w3-text-grey" 
							>'.$p->details.'</p ></label ></div>';
							}
						}
						?>
					</div >
				</div >
			</div >
			<div class="accordion-item" >
				<h2 class="accordion-header" id="headingFour" >
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" >
						Getränk
					</button >
				</h2 >
				<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
				     data-bs-parent="#accordionExample" >
					<div class="accordion-body" >
						<?php
						foreach ($menu as $p) {
							if ($p->type === 'drink') {
								echo '<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="'.$p->id.'" name="drink" value="'.$p->id.'">
							<label class="custom-control-label" for="'.$p->id.'"><b>'.$p->foodname.'</b><span 
							class="price w3-right w3-tag w3-dark-grey w3-round" style="padding-left:5px;">Fr. '.number_format((float)$p->price, 2,
										'.', '').'</span></label ></div>';
							}
						}
						?>
					</div >
				</div >
			</div >
		</div >
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Bestellen</button>
		</div>
	</form >
	</body >
</html >