<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">
                                        <i class="fas fa-fw fa-unlock-alt"></i>
                                        Change Password for
                                    </h1>
                                    <h5 class="mb-4">
                                        <?= $this->session->userdata('email'); ?>
                                    </h5>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth/changePassword') ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Enter New Password..." autofocus='true'>
                                        <?php
                                        if (form_error('password1') == '')
                                            echo "<small class='text-danger pl-3'> &nbsp; </small>"
                                        ?>
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password...">
                                        <?php
                                        if (form_error('password2') == '')
                                            echo "<small class='text-danger pl-3'> &nbsp; </small>"
                                        ?>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>