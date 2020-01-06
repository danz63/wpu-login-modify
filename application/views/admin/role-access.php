<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <h5>Role : <?= $role['role'] ?></h5>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= array_search($m, $menu) + 1 ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <div class="custom-checkbox">
                                    <input type="checkbox" class="switchOnOff" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>" data-url="<?= base_url() ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->