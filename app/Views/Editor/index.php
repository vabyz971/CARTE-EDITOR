<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<div class="container is-fluid">

    <div class="pb-5 mb-0 pt-5">
        <b-input size="is-large" v-model="name" type="text" placeholder="<?= lang('Editor.input_label_name') ?>" required></b-input>
    </div>

    <section class="section m-2 p-2">
        <div class="columns">
            <!-- <div class="column is-one-quarter">
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
            </div> -->
            <div class="column is-flex is-justify-content-center">
                <div class="card column">
                    <form action="" method="post">
                        <?= csrf_field() ?>
                        <div class="columns m-2 p-1">
                            <div class="column">
                                <div class="field">
                                    <b-field label="Content">
                                        <b-input v-model="content" maxlength="500" type="textarea" required></b-input>
                                    </b-field>
                                </div>
                            </div>
                            <div class="column">
                                <div class="section p-2">
                                    <b-field label="<?= lang('Editor.input_label_destinater') ?>">
                                        <b-input v-model="destinater" type="text" placeholder="<?= lang('Editor.input_placeholder_you') ?>" required></b-input>
                                    </b-field>
                                    <b-field label="<?= lang('Editor.input_label_adresse') ?>">
                                        <b-input v-model="address" type="text" placeholder="<?= lang('Editor.input_placeholder_adresse') ?>" required></b-input>
                                    </b-field>
                                    <b-field label="<?= lang('Editor.input_label_codePostal') ?>">
                                        <b-input v-model="codePost" type="number" placeholder="<?= lang('Editor.input_placeholder_codePostal') ?>" required></b-input>
                                    </b-field>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="buttons">
        <b-button @click="addCard" type="is-primary" size="is-large" expanded><?= lang('Editor.btn_submit') ?></b-button>
    </div>

</div>


<?= $this->section('script') ?>
<script>
    // $(document).ready(function() {

    //     // Button Submit form
    //     $('#submit').on('click', function() {

    //         var _name = $('#name').val();
    //         var _content = $('#content').val();
    //         var _destinater = $('#destinater').val();
    //         var _adresse = $('#adresse').val();
    //         var _codePost = $('#codePost').val();

    //         $.ajax({
    //             type: "POST",
    //             url: "<?= site_url('/editor') ?>",
    //             dataType: "JSON",
    //             data: {
    //                 name: _name,
    //                 content: _content,
    //                 destinater: _destinater,
    //                 adresse: _adresse,
    //                 codePost: _codePost,
    //             },
    //             success: function(data) {
    //                 toastr["success"](data.message);
    //                 $('#name').val("");
    //                 $('#content').val("");
    //                 $('#destinater').val("");
    //                 $('#adresse').val("");
    //                 $('#codePost').val("");
    //             }
    //         });
    //     });

    //     // Parameter Notification
    //     toastr.options = {
    //         "closeButton": false,
    //         "debug": false,
    //         "newestOnTop": false,
    //         "progressBar": true,
    //         "positionClass": "toast-top-center",
    //         "preventDuplicates": false,
    //         "onclick": null,
    //         "showDuration": "300",
    //         "hideDuration": "1000",
    //         "timeOut": "5000",
    //         "extendedTimeOut": "1000",
    //         "showEasing": "swing",
    //         "hideEasing": "linear",
    //         "showMethod": "fadeIn",
    //         "hideMethod": "fadeOut"
    //     }
    // })

    //Composen Vue.js
    var app = new Vue({
        el: '#app',
        name: 'editor',
        data() {
            return {

                // Variable Form Card
                name: '',
                content: '',
                destinater: '',
                address: '',
                codePost: '',

            }
        },
        methods: {
            addCard() {
                if (this.name != '' && this.content != '' && this.destinater != '' && this.address != '' && this.codePost != '') {
                    $.ajax({
                        url: '<?= site_url("/editor") ?>',
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            name: this.name,
                            content: this.content,
                            destinater: this.destinater,
                            adresse: this.address,
                            codePost: this.codePost,
                        },
                        success: function(data) {
                            this.$buefy.toast.open({
                                duration: 5000,
                                message: "<?= lang('Editor.success_add_carte') ?>",
                                position: "is-top",
                                type: "is-success",
                                hasIcon: true,
                            });
                        },
                        error: function(data) {
                            this.$buefy.toast.open({
                                duration: 5000,
                                message: "<?= lang('Editor.fail_form_carte') ?>",
                                position: "is-top",
                                type: "is-danger",
                                hasIcon: true,
                            });
                        }
                    });
                } else {
                    this.$buefy.toast.open({
                        duration: 5000,
                        message: "<?= lang('Editor.fail_form_carte') ?>",
                        position: "is-top",
                        type: "is-danger",
                        hasIcon: true,
                    });
                }

            },
        }
    })
</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>