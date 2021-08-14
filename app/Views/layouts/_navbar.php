<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?= route_to('home') ?>">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMain">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarMain" class="navbar-menu">
    <div class="navbar-end">
      <a class="navbar-item" href="<?= route_to('/') ?>" >
        <span class="icon is-medium">
          <i class="fas fa-home"></i>
        </span>
        <span><?=lang('Dashboard.home')?></span>
      </a>

      <?php if(logged_in()): ?>
      <a class="navbar-item" href="<?= route_to('editor') ?>">
        <span class="icon is-medium">
          <i class="fas fa-edit"></i>
        </span>
        <span><?=lang('Dashboard.editor')?></span>
      </a>
      <?php endif; ?>
    </div>

    <div class="navbar-end m-0">
      <div class="navbar-item">
        <div class="buttons">
          <?php if(logged_in()): ?>
            <?php if(in_groups('admin','superadmin')): ?>
            <a class="button is-success" href="<?= route_to('Admin') ?>">
              <strong><?=lang('Dashboard.dashboard')?></strong>
              <span class="icon pl-5">
                <i class="fas fa-tachometer-alt"></i>
              </span>
            </a>
            <?php endif; ?>
            <a class="button <?php if(in_groups('admin','superadmin')): ?> is-primary <?php else: ?> is-success <?php endif ?>" href="<?= route_to('profile') ?>">
              <strong><?=lang('Dashboard.profile')?></strong>
              <span class="icon pl-5">
                <i class="fas fa-id-card"></i>
              </span>
            </a>
            <a class="button is-danger is-outlined" href="<?= route_to('logout') ?>">
              <strong><?=lang('Auth.logOut')?></strong>
              <span class="icon pl-5">
                <i class="fas fa-sign-out-alt"></i>
              </span>
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
