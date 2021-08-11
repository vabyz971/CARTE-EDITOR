<?= $this->extend('layouts/base_html') ?>
<?= $this->section('title') ?><?=lang('Auth.register')?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
      <form class="box" action="<?= route_to('register') ?>" method="post">
          <?= csrf_field() ?>

          <h1 class="title">
            <?=lang('Auth.register')?>
          </h1>

          <?= view('App\Views\_message_block') ?>

          <div class="field">
          <label class="label"><?=lang('Auth.email')?></label>
              <div class="control has-icons-left has-icons-right">
                  <input class="input <?php if(session('errors.email')) : ?>is-danger<?php endif ?>"
                  type="email"
                  name="email"
                  value="<?= old('email') ?>"
                  aria-describedby="emailHelp"
                  placeholder="<?=lang('Auth.email')?>">
                  <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                  </span>
              </div>
              <small id="emailHelp" class="help is-warning"><?=lang('Auth.weNeverShare')?></small>
          </div>


      <div class="field">
        <label class="label"><?=lang('Auth.username')?></label>
        <div class="control has-icons-left has-icons-right">
          <input class="input <?php if(session('errors.username')) : ?>is-danger<?php endif ?>"
          type="text"
          name="username"
          value="<?= old('username') ?>"
          placeholder="<?=lang('Auth.username')?>">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>

      <div class="columns field is-desktop">
        <div class='column control is-expanded'>
          <label class="label"><?=lang('Auth.password')?></label>
          <div class="control has-icons-left has-icons-right">
            <input class="input <?php if(session('errors.password')) : ?>is-danger<?php endif ?>"
            type="password"
            name="password"
            autocomplete="off"
            placeholder="<?=lang('Auth.password')?>">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </div>
        </div>
        <div class='column control is-expanded'>
          <label class="label"><?=lang('Auth.repeatPassword')?></label>
          <div class="control has-icons-left has-icons-right">
            <input class="input <?php if(session('errors.pass_confirm')) : ?>is-danger<?php endif ?>"
            type="password"
            name="pass_confirm"
            autocomplete="off"
            placeholder="<?=lang('Auth.repeatPassword')?>">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link"><?=lang('Auth.register')?></button>
        </div>
      </div>
    </div>
  </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
