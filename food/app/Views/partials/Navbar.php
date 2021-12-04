<div class="header" >
	<nav class="navbar navbar-dark navbar-expand-lg navbar-doggleable-lg bg-dark fixed-top" role="navigation" >
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
		        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" >
			<span class="navbar-toggler-icon" ></span >
		</button >
		<a class="navbar-brand mr-auto" href="<?php echo base_url(''); ?>" >&emsp;<img
					src="<?php echo base_url().'/../assets/favicon/favicon-32x32.png'; ?>" width="30" height="30"
					class="align-top" alt="Swiss Guards" > Swiss Guards</a >

		<div class="navbar-collapse collapse" id="navbarContent" >
			<ul class="nav navbar-nav ml-auto" >
				<li class="nav-item active" >
					<a class="nav-link" href="<?php echo base_url(''); ?>" >Home <span
								class="sr-only" >(current)</span ></a >
				</li >
				<?php if (!$is_logged_in) { ?>
					<li class="nav-item" >
						<a class="nav-link active" href="<?php echo site_url('bewerben'); ?>" >
							<?= lang("app.Navbar.Bewerben") ?>
						</a >
					</li >
				<?php } ?>
				<li class="nav-item dropdown" >
					<a href="#" class="nav-link active dropdown-toggle" id="shipDropdown" data-toggle="dropdown"
					   role="button" aria-expanded="false" aria-haspopup="true" >Swiss Guards<span
								class="caret" ></span ></a >
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="shipDropdown" >
						<a class="dropdown-item"
						   href="<?php echo site_url('visit'); ?>" ><?php echo 'Neue Mitglieder'/*$this->lang->language['new_member']*/ ?></a >
						<div class="dropdown-divider" ></div >
						<?php //if ($this->ion_auth->logged_in()) { ?>
						<!--	<a class="dropdown-item"-->
					<!--	   href="--><?php //echo site_url('members'); ?><!--" >-->
					<?php //echo 'Mitgliederliste'/*$this->lang->language['mitgliederliste']*/ ?><!--</a >-->
					<!--	<a class="dropdown-item"-->
					<!--	   href="--><?php //echo site_url('squadrecommendation'); ?><!--" >-->
					<?php //echo 'Teamempfehlungen'/*$this->lang->language['squad_view_titel']*/ ?><!--</a >-->
					<!--	<div class="dropdown-divider" ></div >-->
					<?php //} ?>
					<a class="dropdown-item"
					   href="<?php echo site_url('raid-rules'); ?>" ><?php echo 'Raidregeln'/*$this->lang->language['raid_rules']*/ ?></a >
					<a class="dropdown-item"
					   href="<?php echo site_url('linklist'); ?>" ><?php echo 'Linkliste'/*$this->lang->language['link_view_head']*/ ?></a >
				</div >
			</li >
			<li class="nav-item" >
				<a class="nav-link active" href="<?php echo site_url('hstr'); ?>" >HSTR</a >
			</li >
			<li class="nav-item" >
				<a class="nav-link active" href="<?php echo site_url('geo-tb'); ?>" >Geo-TB</a >
			</li >
			<li class="nav-item" >
				<a class="nav-link active" href="<?php echo base_url(lang("app.Main.Lang.lang_short").'/toons'); ?>" >
					<?= lang("app.Navbar.Char") ?>
				</a >
			</li >
			<li class="nav-item" >
				<a class="nav-link active" href="<?php echo base_url(lang("app.Main.Lang.lang_short").'/ships'); ?>" >
					<?= lang("app.Navbar.Ships") ?>
				</a >
			</li >
			<li class="nav-item" >
				<a class="nav-link active" href="<?php echo site_url('shops'); ?>" >
					<?php echo 'Shops'/*$this->lang->language['shops']*/
					; ?>
				</a >
			</li >

			<!-- Language switcher -->
			<li class="nav-item dropdown" >
				<a href="#" class="nav-link active dropdown-toggle" id="charDropdown" data-toggle="dropdown"
				   role="button" aria-expanded="false" aria-haspopup="true" >
					<?= lang("app.Main.Lang.lang_short") ?>
					<span class="caret" ></span >
				</a >
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="charDropdown" >
					<a href="<?= base_url('lang/'.lang("app.Main.Lang.foreign_short")) ?>"
					   class="dropdown-item" >
						<img src="
						<?php if ($_SESSION['lang'] === 'en') {
							echo base_url().'/../assets/flags/Germany.png';
						} else {
							echo base_url().'/../assets/flags/UK.png';
						} ?>" alt="<?= lang("app.Main.Lang.foreign_long") ?>" width="30px" height="30px" />
						&nbsp;<?= lang("app.Main.Lang.foreign_long") ?>
					</a >
				</div >
			</li >
		</ul >
	</div >&emsp;
	</nav >
</div >