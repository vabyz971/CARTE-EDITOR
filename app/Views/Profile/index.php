<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section">
  <?= view('App\Views\_message_block') ?>
  <div class="columns">
    <div class="column is-half">
      <h2 class="title is-2"><?= lang('Dashboard.information') ?></h2>
      <div class="is-flex flex-direction">
        <figure class="image is-128x128">
          <img src="<?= user()->avatar; ?>" alt="image de profile">
        </figure>
        <div class="ml-4">
          <h4 class="title is-4"><?= user()->username; ?></h4>
          <h6 class="subtitle is-6"><?= lang('Date.memberby', ['member' => user()->created_at]) ?></h6>
        </div>
      </div>

    </div>
    <div class="column is-half">
    </div>
  </div>
  <div class="columns mt-4">
    <div class="column is-half">
      <h3 class="title is-3"><?= lang('Dashboard.updateInfoUser') ?></h3>
      <div class="is-flex-direction-row">
        <form action="<?= route_to('profile/edit') ?>" method="post">
          <?= csrf_field() ?>

          <div class="columns ">
            <div class="column control">
              <label class="label"><?= lang('Auth.username') ?></label>
              <div class="control has-icons-left has-icons-right">
                <input class="input <?php if (session('errors.username')) : ?>is-danger<?php endif ?>" type="text" name="username" value="<?= old('username') ?>" placeholder="<?= lang('Auth.username') ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="column control">
              <label class="label"><?= lang('Auth.email') ?></label>
              <div class="control has-icons-left has-icons-right">
                <input class="input <?php if (session('errors.email')) : ?>is-danger<?php endif ?>" type="email" name="email" value="<?= old('email') ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="columns">
            <div class='column control'>
              <label class="label"><?= lang('Auth.password') ?></label>
              <div class="control has-icons-left has-icons-right">
                <input class="input <?php if (session('errors.password')) : ?>is-danger<?php endif ?>" type="password" name="password" autocomplete="off" placeholder="<?= lang('Auth.password') ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
            </div>
            <div class='column control'>
              <label class="label"><?= lang('Auth.repeatPassword') ?></label>
              <div class="control has-icons-left has-icons-right">
                <input class="input <?php if (session('errors.pass_confirm')) : ?>is-danger<?php endif ?>" type="password" name="pass_confirm" autocomplete="off" placeholder="<?= lang('Auth.repeatPassword') ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <button type="submit" class="button is-link"><?= lang('Auth.save') ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="column is-half">
      <h3 class="title is-3"><?= lang('Dashboard.listFrendlyUser') ?></h3>
      <?php if ($friends) : ?>
        <?php foreach ($friends as $friend) : ?>
          <div class="box">
            <article class="media">
              <?php if ($friend->avatar) : ?>
                <div class="media-left">
                  <figure class="image is-64x64">
                    <img src="<?= $friend->avatar ?>" alt="Image">
                  </figure>
                </div>
              <?php endif; ?>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong><?= $friend->username ?></strong>
                  </p>
                </div>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="<?= route_to('profile_user', $friend->id) ?>" class="level-item" aria-label="reply">
                      <span class=" is-small">
                        Voir Profile
                      </span>
                    </a>
                  </div>
                </nav>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <h2 class="title is-2">Nous n'avez pas d'amie :(</h2>
      <?php endif; ?>
    </div>
  </div>
</section>
<?= $this->endSection() ?>