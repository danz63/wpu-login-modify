<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changePassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Your Current Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat Your New Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <style>
                    .input-group-text {
                        background-color: #FFFFFF !important;
                        border-radius: 0rem .35rem .35rem 0rem !important;
                        cursor: pointer;
                    }
                </style>
                <div class="form-group justify-content-end">
                    <button class="btn btn-primary" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->