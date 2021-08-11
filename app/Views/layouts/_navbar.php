<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
      <a class="navbar-item" href="<?= route_to('/') ?>" >
        Accueil
      </a>

      <a class="navbar-item" href="<?= route_to('editor') ?>">
        Editor
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php if(logged_in()): ?>
            <a class="button is-primary" href="<?= route_to('logout') ?>">
              <strong><?=lang('Auth.logOut')?></strong>
            </a>
          <?php else: ?>
          <a class="button is-primary" href="<?= route_to('login') ?>">
            <strong><?=lang('Auth.signIn')?></strong>
          </a>
          <a class="button is-light" href="<?= route_to('register') ?>">
            <?=lang('Auth.register')?>
          </a>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</nav>
