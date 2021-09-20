<?php if (session()->has('message')) : ?>
	<div class="notification notification_fide m-5 is-success">
		<button class="delete is-pulled-right"></button>
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('infos')) : ?>
	<div class="notification m-5 is-info">
		<button class="delete is-pulled-right"></button>
		<?= session('infos') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="notification m-5 is-danger">
		<button class="delete is-pulled-right"></button>
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="notification m-5 is-danger">
		<button class="delete is-pulled-right"></button>
		<?php foreach (session('errors') as $error) : ?>
			<li><?= $error ?></li>
		<?php endforeach ?>
	</ul>
<?php endif ?>