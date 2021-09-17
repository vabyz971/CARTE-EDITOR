<?php if (session()->has('message')) : ?>
	<div class="notification is-success">
		<button class="delete"></button>
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="notification is-danger">
		<button class="delete"></button>
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="notification is-danger">
		<button class="delete"></button>
		<?php foreach (session('errors') as $error) : ?>
			<li><?= $error ?></li>
		<?php endforeach ?>
	</ul>
<?php endif ?>
