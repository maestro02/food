<html >
<body >
<div >Hallo <?= $person->first_name ?></div >
<br >

<div >Deine Bestellung für <?= date('d.m.Y') ?> ist erfolgreich gespeichert und wird dem Dispatcher via IT-Bern-Mail
	gemeldet.
</div >
<br >

<div ><b >Folgendes hast du bestellt: </b ></div >
<table >
	<tr >
		<th >was</th >
		<th >Preis</th >
	</tr >
	<tr >
		<td ><?= $food->foodname ?></td >
		<td >Fr. <?= number_format((float)$food->Price, 2, '.', '') ?></td >
	</tr >
	<?php
	if ($drink) {
		?>
		<tr >
		<td ><?= $drink->foodname ?></td >
		<td >Fr. <?= number_format((float)$drink->Price, 2, '.', '') ?></td >
		</tr >
	<?php } ?>
	<tr >
		<th >Total</th >
		<th >Fr. <?= number_format((float)$drink->Price + $food->Price, 2, '.', '') ?></th >
	</tr >
</table >
<br >

<div >Liebe Grüsse und häb e Guete</div >
<br >

<div >Räfus Pizza-Bestell-Lösung</div >

</body >
</html >
