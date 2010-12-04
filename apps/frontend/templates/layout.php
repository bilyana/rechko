<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="bg" lang="bg">

<head>
	<?php use_stylesheet('main') ?>
	<?php use_javascript(sfConfig::get('app_js_library')) ?>
	<?php use_javascript('main') ?>
	<?php if ($sf_user->isEditor()): ?>
		<?php use_javascript('admin') ?>
	<?php endif ?>

	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<title>
		<?php echo prepare_document_title(get_slot('title')) ?>
		<?php if ( ! include_slot('sitename') ): ?>
			—
			<?php echo sfConfig::get('app_sitename') ?>
		<?php endif ?>
	</title>
	<link rel="icon" href="/favicon.png" type="image/png">
	<?php include_stylesheets() ?>
</head>

<body class="module-<?php echo $this->getModuleName() ?> action-<?php echo $this->getActionName() ?>">

	<?php include_slot('header') ?>

	<?php if (has_slot('title')): ?>
		<h1 id="first-heading"><?php include_slot('title') ?></h1>
	<?php endif ?>
	<div id="sitename">
		<?php if ( ! include_slot('sitename') ): ?>
			<p><?php echo link_to(sfConfig::get('app_sitename'), '@homepage') ?></p>
		<?php endif ?>
	</div>

	<div id="content"><?php echo $sf_content ?></div>

	<?php include_partial('global/personal') ?>

	<?php if ( ! include_slot('footer') ): ?>
		<?php include_partial('global/footer') ?>
	<?php endif ?>

	<?php include_javascripts() ?>
</body>

</html>