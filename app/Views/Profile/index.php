<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section">
  <h2 class="title is-2">Information</h2>
  <div class="columns">
    <div class="column is-half">
      <div class="is-flex flex-direction">
        <figure class="image is-128x128">
          <img src="<?= user()->avatar; ?>" alt="image de profile">
        </figure>
        <div class="ml-4">
        <h4 class="title is-4"><?= user()->username; ?></h4>
        <h6 class="subtitle is-6"><?= lang('Date.memberby',['member' => user()->created_at]) ?></h6>
      </div>
      </div>

    </div>
    <div class="column is-half">
    </div>
  </div>
</section>
<?= $this->endSection() ?>
