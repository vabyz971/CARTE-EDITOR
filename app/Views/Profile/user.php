<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section">
  <?= view('App\Views\_message_block') ?>
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
    </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>