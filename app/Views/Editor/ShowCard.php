<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<div class="container">
    <section class="section is-large ">
    <h3 class="title is-3"><?= $carte->name ?></h3>
        <div class="card">
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <div class="control m-4">
                            <?= $carte->content ?>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <section class="section p-2">
                        <div class="field">
                            <label class="label"><?= lang('Editor.input_label_destinater') ?></label>
                            <div class="control">
                                <?= $carte->destinater ?>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?= lang('Editor.input_label_adresse') ?></label>
                            <div class="control">
                                <?= $carte->adresse ?>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?= lang('Editor.input_label_codePostal') ?></label>
                            <div class="control">
                                <?= $carte->code_postal ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>