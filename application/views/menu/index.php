<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error(
                'menu',
                '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">',
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
            ); ?>

            <?= $this->session->flashdata('message'); ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" onclick="showAdd();">Add New Menu</button>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= array_search($m, $menu) + 1 ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#newMenuModal" onclick="showEdit('<?= $m['id'] ?>','<?= $m['menu'] ?>');">edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#confirmModal" onclick="showConfirm('<?= $m['id'] . '/' . $m['menu'] ?>');">delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu') ?>" method="POST">
                <div class="modal-body" id="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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
    function showEdit(id, menu) {
        $('#newMenuModalLabel').html('Edit Menu');
        $('#id').remove();
        $('#modal-body').append("<input type='hidden' id='id' name='id'>");
        $('#id').val(id);
        $('#menu').val(menu);
        $('#submit').val('Edit');
        $('#submit').html('Edit');
        $('#newMenuModal').modal('show');
    }

    function showAdd() {
        $('#id').remove();
        $('#newMenuModalLabel').html('Add New Menu');
        $('#menu').val('');
        $('#submit').val('Add');
        $('#submit').html('Add');
        $('#newMenuModal').modal('show');
    }

    function showConfirm(param) {
        var splitParam = param.split('/');
        $('#confirm-modal-body').text('Are you sure to delete menu "' + splitParam[1] + '" ?');
        $('#confirmDelete').on('click', function() {
            window.location = "<?= base_url('menu/delete/') ?>" + splitParam[0];
        });
    }
    window.onload = function() {
        $('.form-control').attr('autocomplete', 'Off');
    }
</script>