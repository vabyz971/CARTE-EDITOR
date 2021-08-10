<?= $this->extend('layouts/base_html') ?>

<?= $this->section('title') ?>Inscription<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="container">
      <h1 class="title">
        Inscription
      </h1>
<form action="" method="POST">
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
  <label class="label">Mail</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="email" name="email" placeholder="Votre Email">
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
  <label class="label">Confirmer votre mot de passe</label>
  <div class="control has-icons-left">
    <input class="input" type="password" name="password2">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </div>
</div>


<div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>


<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">S'inscrire</button>
  </div>
  <div class="control">
    <a href="<?= site_url("auth/") ?>" class="button is-link is-light">Déjâ un compte</a>
  </div>
</div>
</form>

    </div>
  </section>

<?= $this->endSection() ?>