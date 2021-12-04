<?php namespace Assets; ?>
<!doctype html>
<html lang="de" >
<head >
	<title ><?= /** @var string $page_title */
		$page_title ?></title >
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" http-equiv="Content-Type" >

	<!-- Load Stylesheets -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" >
	<link rel="stylesheet" href="<?= base_url().'/../css/swgoh.css' ?>" >

	<!-- Load favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url().'/../assets/favicon/apple-icon-57x57.png' ?>" >
	<link rel="apple-touch-icon" sizes="60x60" href="<?= base_url().'/../assets/favicon/apple-icon-60x60.png' ?>" >
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url().'/../assets/favicon/apple-icon-72x72.png' ?>" >
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url().'/../assets/favicon/apple-icon-76x76.png' ?>" >
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url().'/../assets/favicon/apple-icon-114x114.png' ?>" >
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url().'/../assets/favicon/apple-icon-120x120.png' ?>" >
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url().'/../assets/favicon/apple-icon-144x144.png' ?>" >
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url().'/../assets/favicon/apple-icon-152x152.png' ?>" >
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url().'/../assets/favicon/apple-icon-180x180.png' ?>" >
	<link rel="icon" type="image/png" sizes="192x192"
	      href="<?= base_url().'/../assets/favicon/android-icon-192x192.png' ?>" >
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url().'/../assets/favicon/favicon-32x32.png' ?>" >
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url().'/../assets/favicon/favicon-96x96.png' ?>" >
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url().'/../assets/favicon/favicon-16x16.png' ?>" >
	<link rel="shortcut icon" type="image/png" sizes="16x16"
	      href="<?= base_url().'/../assets/favicon/favicon-16x16.png' ?>" >
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="<?= base_url().'/../assets/favicon/favicon.ico' ?>" >
	<link rel="manifest" href="<?= base_url().'/../assets/favicon/manifest.json' ?>" >
	<meta name="msapplication-TileColor" content="#ffffff" >
	<meta name="msapplication-TileImage" content="<?= base_url().'/../assets/favicon/ms-icon-144x144.png' ?>" >
	<meta name="theme-color" content="#ffffff" >

	<!-- Load scripts -->


	<!-- Set temporary styles for welcome message -->
	<style {csp-style-nonce} >
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }

        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }

        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
        }

        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }

        header li {
            display: inline-block;
        }

        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }

        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }

        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(221, 72, 20, .2);
            color: rgba(221, 72, 20, 1);
        }

        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }

        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }

        header .menu-toggle button {
            background-color: rgba(221, 72, 20, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }

        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(221, 72, 20, .8);
            color: rgba(255, 255, 255, .8);
        }

        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }

        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }

        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }

        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }

        section h1 {
            margin-bottom: 2.5rem;
        }

        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }

        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }

        section code {
            display: block;
        }

        section a {
            color: rgba(221, 72, 20, 1);
        }

        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }

        .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }

        .further h2:first-of-type {
            padding-top: 0;
        }

        footer {
            background-color: rgba(221, 72, 20, .8);
            text-align: center;
        }

        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }

        footer .copyrights {
            background-color: rgba(62, 62, 62, 1);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }

        @media (max-width: 559px) {
            header ul {
                padding: 0;
            }

            header .menu-toggle {
                padding: 0 1rem;
            }

            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }

            header .menu-toggle {
                display: block;
            }

            header .hidden {
                display: none;
            }

            header li.menu-item a {
                background-color: rgba(221, 72, 20, .1);
            }

            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
            }
        }
	</style >

</head >
<body >
<?php echo view('/partials/Navbar'); ?>
<main role="main" class="container" >
	<?= $this->renderSection('main') ?>
</main ><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous" ></script >
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous" ></script >
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous" ></script >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous" ></script >

<?= $this->renderSection('pageScripts') ?>
</body >
</html >
