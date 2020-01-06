<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <style>
                    .alert p {
                        margin-bottom: 0.5rem !important;
                    }

                    .alert {
                        padding-bottom: 0.25rem !important;
                    }
                </style>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary mb-3" onclick="showAddSub();">Add New Submenu</button>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= array_search($sm, $subMenu) + 1 ?></th>
                            <td><?= $sm['title'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $sm['is_active'] ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="newSubMenuModal" onclick="showEdit('<?= $sm['id'] ?>','<?= $sm['title'] ?>','<?= $sm['menu_id'] ?>','<?= $sm['url'] ?>','<?= $sm['icon'] ?>');">edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#confirmModal" onclick="showConfirm('<?= $sm['id'] . '/' . $sm['title'] ?>');">delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu') ?>" method="POST">
                <div class="modal-body" id="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title name">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">-- Select Menu --</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
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

<!-- Modal Confirm Delete -->
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
<!-- End Of Modal Confirm Delete -->

<script>
    function showEdit(id, title, menu_id, url, icon) {
        $('#newSubMenuModalLabel').html('Edit Submenu');
        $('#id').remove();
        $('#modal-body').append("<input type='hidden' id='id' name='id'>");
        $('#id').val(id);
        $('#title').val(title);
        $('#title').val(title);
        $('#menu_id option[value=' + menu_id + ']').prop('selected', true);
        $('#url').val(url);
        $('#icon').val(icon);
        $('#submit').val('Edit');
        $('#submit').html('Edit');
        $('#newSubMenuModal').modal('show');
    }

    function showAddSub() {
        $('#id').remove();
        $('#newSubMenuModalLabel').html('Add New Submenu');
        $('#title').val('');
        $('#submit').val('Add');
        $('#submit').html('Add');
        $('#newSubMenuModal').modal('show');
    }

    function showConfirm(param) {
        var splitParam = param.split('/');
        $('#confirm-modal-body').text('Are you sure to delete Submenu "' + splitParam[1] + '" ?');
        $('#confirmDelete').on('click', function() {
            window.location = "<?= base_url('menu/deleteSubMenu/') ?>" + splitParam[0];
        });
    }
    window.onload = function() {
        $('.form-control').attr('autocomplete', 'Off');
    }
</script>