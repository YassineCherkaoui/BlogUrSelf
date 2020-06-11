<!DOCTYPE html>
<?php if (!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if (!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="<?php echo datalist_db_encoding; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo ucwords('BLOG ADMIN'); ?> | <?php echo (isset($x->TableTitle) ? $x->TableTitle : ''); ?></title>
	<link id="browser_favicon" rel="shortcut icon" href="<?php echo PREPEND_PATH; ?>resources/images/appgini-icon.png">

	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/yeti.css">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/lightbox/css/lightbox.css" media="screen">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/select2/select2.css" media="screen">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.css" media="screen">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/datepicker/css/datepicker.css" media="screen">
	<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>dynamic.css.php">

	<!--[if lt IE 9]>
			<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<![endif]-->
	<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery-1.12.4.min.js"></script>
	<script>
		var $j = jQuery.noConflict();
	</script>
	<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery.mark.min.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/prototype.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/scriptaculous.js?load=effects"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/select2/select2.min.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/jscookie/js.cookie.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>resources/datepicker/js/datepicker.packed.js"></script>
	<script src="<?php echo PREPEND_PATH; ?>common.js.php"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<?php if (isset($x->TableName) && is_file(dirname(__FILE__) . "/hooks/{$x->TableName}-tv.js")) { ?>
		<script src="<?php echo PREPEND_PATH; ?>hooks/<?php echo $x->TableName; ?>-tv.js"></script>
	<?php } ?>
<link rel="stylesheet" href="css/sb-admin.css">
</head>

<body>
	<div class="container theme-yeti theme-compact">
		<?php if (function_exists('handle_maintenance')) echo handle_maintenance(true); ?>

		<?php if (!$_REQUEST['Embedded']) { ?>
			<?php if (function_exists('htmlUserBar')) echo htmlUserBar(); ?>
			<div style="height: 70px;" class="hidden-print"></div>
		<?php } ?>

		<?php if (class_exists('Notification')) echo Notification::placeholder(); ?>

		<!-- process notifications -->
		<?php $notification_margin = ($_REQUEST['Embedded'] ? '15px 0px' : '-15px 0 -45px'); ?>
		<div style="height: 60px; margin: <?php echo $notification_margin; ?>;">
			<?php if (function_exists('showNotifications')) echo showNotifications(); ?>
		</div>

		<?php if (!defined('APPGINI_SETUP') && is_file(dirname(__FILE__) . '/hooks/header-extras.php')) {
			include(dirname(__FILE__) . '/hooks/header-extras.php');
		} ?>
		<!-- Add header template below here .. -->