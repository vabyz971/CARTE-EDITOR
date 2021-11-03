<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<div class="container is-fluid">

    <input class="input is-static subtitle is-1 pb-0 mb-0 pt-0" id="name" type="text" placeholder="<?= lang('Editor.input_label_name') ?>" required >

    <section class="section m-2 p-2">
        <div class="columns">
            <div class="column is-one-quarter">
                <aside class="menu">
                    <p class="menu-label mt-5 mb-2">
                        <?= lang('Editor.template') ?>
                    </p>
                    <ul class="menu-list">
                        <div class="select">
                            <select>
                                <option><?= lang('Editor.select_template') ?></option>
                                <option>Template 1</option>
                                <option>Template 2</option>
                                <option>Template 3</option>
                            </select>
                        </div>
                    </ul>
                    <p class="menu-label mt-5 mb-2">
                        <?= lang('Editor.parameter_police') ?>
                    </p>
                    <ul class="menu-list">
                        <div class="field is-expanded">
                            <label class="label"><?= lang('Editor.select_font') ?></label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="type_police">
                                        <option value="">Ariel</option>
                                        <option value="">Sens conplite</option>
                                        <option value="">BigCote</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-expanded">
                            <label class="label"><?= lang('Editor.select_font_size') ?></label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="type_police_size">
                                        <?php for ($i = 10; $i <= 24; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?> px</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </ul>
                </aside>
            </div>
            <div class="column is-flex is-justify-content-center">
                <div class="card column">
                    <form action="" method="post">
                        <?= csrf_field() ?>
                        <div class="columns m-2 p-1">
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" id="content" name="content" rows="12" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="section p-2">
                                    <div class="field">
                                        <label class="label"><?= lang('Editor.input_label_destinater') ?></label>
                                        <div class="control">
                                            <input class="input" id="destinater" type="text" placeholder="<?= lang('Editor.input_placeholder_you') ?>" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label"><?= lang('Editor.input_label_adresse') ?></label>
                                        <div class="control">
                                            <input class="input" id="adresse" type="text" placeholder="<?= lang('Editor.input_placeholder_adresse') ?>">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label"><?= lang('Editor.input_label_codePostal') ?></label>
                                        <div class="control">
                                            <input class="input" id="codePost" type="number" placeholder="<?= lang('Editor.input_placeholder_codePostal') ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <button class="button float is-success is-medium is-fullwidth mt-2 mb-5" id="submit"><?= lang('Editor.btn_submit') ?></button>

</div>


<?= $this->section('script') ?>
<script>
    $(document).ready(function() {

        // Button Submit form
        $('#submit').on('click', function() {

            var _name = $('#name').val();
            var _content = $('#content').val();
            var _destinater = $('#destinater').val();
            var _adresse = $('#adresse').val();
            var _codePost = $('#codePost').val();

            if (_name == "") {
                toastr["error"]("<?= lang('Editor.form_name_isNull'); ?>", "<?= lang('Editor.error'); ?>")
                $('#name').focus();
                return false;
            }

            if (_content == "") {
                toastr["warning"]("<?= lang('Editor.form_content_isNull'); ?>")
                $('#content').focus();
                return false;
            }

            if (_destinater == "") {
                toastr["warning"]("<?= lang('Editor.form_destinater_isNull'); ?>")
                $('#destinater').focus();
                return false;
            }

            if (_adresse == "") {
                toastr["warning"]("<?= lang('Editor.form_adresse_isNull'); ?>")
                $('#adresse').focus();
                return false;
            }

            if (_codePost == "") {
                toastr["warning"]("<?= lang('Editor.form_codePost_isNull'); ?>")
                $('#codePost').focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?= site_url('/editor') ?>",
                dataType: "JSON",
                data: {
                    name: _name,
                    content: _content,
                    destinater: _destinater,
                    adresse: _adresse,
                    codePost: _codePost,
                },
                success: function(data) {
                    toastr["success"](data.message);
                    $('#name').val("");
                    $('#content').val("");
                    $('#destinater').val("");
                    $('#adresse').val("");
                    $('#codePost').val("");
                }
            });
        });

        // Parameter Notification
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    })
</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>