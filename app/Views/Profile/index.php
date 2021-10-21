<?= $this->extend('layouts/base_html') ?>

<?= $this->section('content') ?>

<section class="section">
  <div class="columns">
    <div class="column is-half">
      <h2 class="title is-2"><?= lang('Dashboard.information') ?></h2>
      <div class="is-flex flex-direction">
        <figure class="image is-128x128 avatar-wrapper">
          <img class="profile-pic" src="<?= user()->avatar; ?>">
          <div class="upload-button">
            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
          </div>
          <input class="file-upload" type="file" name="avatar" accept="image/*">
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
      <section class="pb-4">
        <b-autocomplete rounded v-model="name" :data="filteredDataArray" placeholder="<?= lang('Dashboard.addFrendlyUser') ?>" icon="magnify" maxlength="10" clearable @select="option => selected = option">
          <template #empty><?= lang('Dashboard.emptyListUser') ?></template>
        </b-autocomplete>
        <template v-if="selected">
          <div class="buttons pt-2">
            <b-button type="is-primary" @click="addFrendlyUser" rounded expanded><?= lang('Dashboard.submitInputAddFriend') ?></b-button>
          </div>
        </template>
      </section>
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
                    <strong><?= $friend->username; ?></strong>
                    <?php if ($friend->etat == "waiting") : ?>
                      <span class="tag is-warning"><?= lang('Dashboard.waiting') ?></span>
                    <?php endif; ?>
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
      <?php else : ?>
        <h2 class="title is-2">Nous n'avez pas d'amie :(</h2>
      <?php endif; ?>

    </div>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">
  $(document).ready(function() {

    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".file-upload").on('change', function() {
      readURL(this);
    });

    $(".upload-button").on('click', function() {
      $(".file-upload").click();
    });
  });


  var app = new Vue({
    el: "#app",
    name: 'profile',
    data() {
      return {
        data: [
          <?php foreach ($users as $user) : ?> '<?= $user->username ?>',
          <?php endforeach ?>
        ],
        name: '',
        selected: null
      }
    },
    methods: {

      addFrendlyUser() {
        $.ajax({
          type: "POST",
          url: "<?= site_url('/profile') ?>",
          dataType: "JSON",
          data: {
            username: this.selected
          },
          success: function(data) {
            app.notificationSuccess();
          },
          error: function(data) {
            app.notificationError();
          }
        })
      },
      notificationSuccess() {
        this.$buefy.toast.open({
          duration: 5000,
          message: "<?= lang('Dashboard.notifAddUserFriend') ?>",
          position: 'is-top',
          type: 'is-success'
        })
      },
      notificationError() {
        this.$buefy.toast.open({
          duration: 5000,
          message: "<?= lang('Dashboard.notifIsWaitingUserFriend') ?>",
          position: 'is-bottom',
          type: 'is-danger'
        })
      }
    },
    computed: {
      filteredDataArray() {
        return this.data.filter((option) => {
          return option
            .toString()
            .toLowerCase()
            .indexOf(this.name.toLowerCase()) >= 0
        })
      }
    }
  });
</script>


<?= $this->endSection() ?>