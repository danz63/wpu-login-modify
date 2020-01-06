<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" onclick="showAdd();">Add New Role</button>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= array_search($r, $role) + 1 ?></th>
                            <td><?= $r['role'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleAccess/') . $r['id'] ?>" class="badge badge-warning">access</a>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#newRoleModal" onclick="showEdit('<?= $r['id'] ?>','<?= $r['role'] ?>');">edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#confirmModal" onclick="showConfirm('<?= $r['id'] . '/' . $r['role'] ?>');">delete</a>
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

<!-- Modal Add -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="POST">
                <div class="modal-body" id="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Of Modal Add -->

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="confirm-modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showEdit(id, role) {
        $('#newRoleModalLabel').html('Edit Role');
        $('#id').remove();
        $('#modal-body').append("<input type='hidden' id='id' name='id'>");
        $('#id').val(id);
        $('#role').val(role);
        $('#submit').val('Edit');
        $('#submit').html('Edit');
        $('#newRoleModal').modal('show');
    }

    function showAdd() {
        $('#id').remove();
        $('#newRoleModalLabel').html('Add New Role');
        $('#role').val('');
        $('#submit').val('Add');
        $('#submit').html('Add');
        $('#newRoleModal').modal('show');
    }

    function showConfirm(param) {
        var splitParam = param.split('/');
        $('#confirm-modal-body').text('Are you sure to delete role "' + splitParam[1] + '" ?');
        $('#confirmDelete').on('click', function() {
            window.location = "<?= base_url('admin/deleteRole/') ?>" + splitParam[0];
        });
    }
    window.onload = function() {
        $('.form-control').attr('autocomplete', 'Off');
    }
</script>