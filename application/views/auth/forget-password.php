<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        <i class="fas fa-fw fa-unlock-alt"></i>
                                        Forget Password?
                                    </h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" id="myform" method="POST" action="<?= base_url('auth/forgetPassword') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." autocomplete='off' autofocus='true'>
                                        <?php
                                        if (form_error('email') == '')
                                            echo "<small class='text-danger pl-3'> &nbsp; </small>"
                                        ?>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Back to Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>