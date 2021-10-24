<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Register</h2>
                    <form method="POST" action="<?= base_url('auth/registration') ?>" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Full Name" value="<?= set_value('name'); ?>" />
                            <?= form_error('name', '<small>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="email" placeholder="Your Email" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<small>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password1" id="password1" placeholder="Password" />
                            <?= form_error('password1', '<small>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password2" id="password2" placeholder="Repeat password" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('assets/'); ?>images/regis.png" alt="sing up image"></figure>
                    <a href="<?= base_url('auth'); ?>" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

</div>