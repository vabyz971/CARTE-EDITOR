<?= $this->extend('layouts/base_html') ?>
<?= $this->section('title') ?><?=lang('Auth.loginTitle')?><?= $this->endSection() ?>
<?= $this->section('content') ?>
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half">
        <form class="box" action="<?= route_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <h1 class="title">
              <?=lang('Auth.loginTitle')?>
            </h1>

            <?= view('App\Views\_message_block') ?>

          <?php if ($config->validFields === ['email']): ?>
              <div class="field">
                <label class="label"><?=lang('Auth.email')?></label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input <?php if(session('errors.login')) : ?>is-danger<?php endif ?>"
                  type="email"
                  name="email"
                  placeholder="<?=lang('Auth.email')?>">
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <p class="help is-danger"><?= session('errors.login') ?></p>
              </div>
          <?php else: ?>
              <div class="field">
              <label class="label"><?=lang('Auth.emailOrUsername')?></label>
                  <div class="control has-icons-left has-icons-right">
                      <input class="input <?php if(session('errors.login')) : ?>is-danger<?php endif ?>"
                      type="text"
                      name="login"
                      placeholder="<?=lang('Auth.emailOrUsername')?>">
                      <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                      </span>
                  </div>
                  <p class="help is-danger"><?= session('errors.login') ?></p>
              </div>
          <?php endif; ?>

        <div class="field">
          <label class="label"><?=lang('Auth.password')?></label>
          <div class="control has-icons-left">
            <input class="input <?php if(session('errors.login')) : ?>is-danger<?php endif ?>"
            type="password"
            name="password"
            placeholder="<?=lang('Auth.password')?>">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </div>
          <p class="help is-danger"><?= session('errors.password') ?></p>
        </div>

        <div class="field">
          <div class="control">
            <?php if ($config->allowRegistration) : ?>
            					<p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button type="submit" class="button is-link"><?=lang('Auth.loginAction')?></button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
