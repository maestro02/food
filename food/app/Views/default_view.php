<?php namespace Assets; ?>
<!doctype html>
<head >
	<title >Swiss Guards</title >
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" >
</head >
<body >
<table id="chrlist" class="table table-striped table-hover" style="width: 100%;" >
	<thead >
	<tr >
		<th class="sort" >Name</th >
		<th class="sort" >Beschreibung</th >
		<th class="sort" >Seite</th >
	</tr >
	</thead >
	<tbody class="list" >
	<?php asort($toons);
	foreach ($toons as $t) {
		if ($t->image) {
			?>
			<tr >
				<td class="name" ><img src="<?php echo base_url().'/../assets/units/'.$t->baseId.'.png'; ?>"
				                       alt="<?php echo $t->nameKeyDe; ?>" width="30" height="30" /><span
							class="name" > <?php echo $t->nameKeyDe; ?></span ></a></td >
				<td class="abbreviation" ><?php echo $t->descKeyDe; ?></td >
				<td class="side" ><?php echo $t->forceAlignment; ?></td >
			</tr >
		<?php }
	} ?>
	</tbody >
</table >

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous" ></script >
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous" ></script >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous" ></script >
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.js" ></script >
<script >
    $(document).ready(function () {
        $("#chrlist").tablesorter({
            sortList: [[0, 0]]
        });
    });
</script >
</body >
</html >
