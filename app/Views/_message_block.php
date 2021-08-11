<?php if (session()->has('message')) : ?>
	<div class="notification is-success">
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="notification is-danger">
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="notification is-danger">
	<?php foreach (session('errors') as $error) : ?>
		<li><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>
