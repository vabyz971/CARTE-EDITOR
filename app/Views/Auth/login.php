<?= $this->extend('layouts/base_html') ?>

<?= $this->section('title') ?>Connexion<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="container">
      <h1 class="title">
        Connexion
      </h1>
<form action="" method="post">
    <?= csrf_field() ?>
    
    <div class="field">
    <label class="label">Pseudo</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="username" placeholder="Votre nom">
            <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
            </span>
        </div>
    </div>

<div class="field">
  <label class="label">Mot de passe</label>
  <div class="control has-icons-left">
    <input class="input" type="password" name="password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
    Si vous n'avez encore <a href="<?= site_url('auth/register') ?>">de compte</a>
    </label>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Connexion</button>
  </div>
</div>
</form>

    </div>
  </section>

<?= $this->endSection() ?>