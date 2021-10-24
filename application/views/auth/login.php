<div class="main">

    <!-- Sign in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="<?= base_url('assets/'); ?>images/login.png" alt="sing up image"></figure>
                    <a href="<?= base_url('auth/registration'); ?>" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login | KETOKO</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" class="register-form" id="login-form" action="<?= base_url('auth'); ?>">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<small>', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                            <?= form_error('password', '<small>', '</small>'); ?>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>