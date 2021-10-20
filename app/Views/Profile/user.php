<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section">
  <div class="columns">
    <div class="column is-half">
      <h2 class="title is-2"><?= lang('Dashboard.information') ?></h2>
      <div class="is-flex flex-direction">
        <?php if ($user->avatar) : ?>
          <figure class="image is-128x128">
            <img src="<?= $user->avatar; ?>" alt="image de profile">
          </figure>
        <?php endif; ?>
        <div class="ml-4">
          <h4 class="title is-4"><?= $user->username; ?></h4>
          <h6 class="subtitle is-6"><?= lang('Date.memberby', ['member' => $user->created_at]) ?></h6>
        </div>
      </div>

    </div>
    <div class="column is-half">
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
                      <a href="<?= route_to('profile_user', $friend->username) ?>" class="level-item" aria-label="reply">
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
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>