<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <i class="fa fa-user-circle fa-7x mb-5"></i>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth/index') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete='off' value="<?= set_value('email') ?>" autofocus='true'>
                                        <?php
                                        if (form_error('email') == '')
                                            echo "<small class='text-danger pl-3'> &nbsp; </small>"
                                        ?>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        <?php
                                        if (form_error('password') == '')
                                            echo "<small class='text-danger pl-3'> &nbsp; </small>"
                                        ?>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgetPassword') ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
$input = ['email', 'password'];
for ($i = 0; $i < count($input); $i++) {
    if (form_error($input[$i]) != '')
        echo "<script>document.getElementById('" . $input[$i] . "').classList.add('is-invalid');</script>";
}
?>