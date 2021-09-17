<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section has-background-light">
  <?= view('App\Views\_message_block') ?>

  <div class="container">
    <div class="columns">
      <div class="column">
        <article class="media notification is-info">
          <figure class="media-left">
            <span class="icon is-medium">
              <i class="fas fa-2x fa-paint-brush"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4 mb-2"><?= lang('Home.titlefuncPersoletter') ?></h1>
              <p class="is-size-5">
                <?= lang('Home.descfuncPersoletter') ?>
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column">
        <article class="media notification is-primary">
          <figure class="media-left">
            <span class="icon is-medium">
              <i class="fas fa-2x fa-users"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4 mb-2"><?= lang('Home.titlefuncFriend') ?></h1>
              <p class="is-size-5">
                <?= lang('Home.descfuncFriend') ?>
              </p>
            </div>
          </div>
        </article>
      </div>
      <div class="column">
        <article class="media notification is-warning">
          <figure class="media-left">
            <span class="icon is-medium">
              <i class="fas fa-2x fa-paint-brush"></i>
            </span>
          </figure>
          <div class="media-content">
            <div class="content">
              <h1 class="title is-size-4 mb-2"><?= lang('Home.titlefuncPersoletter') ?></h1>
              <p class="is-size-5">
                <?= lang('Home.descfuncPersoletter') ?>
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>