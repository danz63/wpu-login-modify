<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        readURL(this);
    });


    $(".form-group div.input-group-text").on('click', function() {

        var j = $(this).parent().parent().parent();

        if (j.find('input').attr("type") == "text") {
            j.find('input').attr('type', 'password');
            j.find('i').addClass("fa-fw");
            j.find('i').addClass("fa-eye-slash");
            j.find('i').removeClass("fa-eye");

        } else if (j.find('input').attr("type") == "password") {
            j.find('input').attr('type', 'text');
            j.find('i').addClass("fa-fw");
            j.find('i').addClass("fa-eye");
            j.find('i').removeClass("fa-eye-slash");
        }
    });

    $('.switchOnOff').bootstrapToggle({
        onstyle: 'success',
        offstyle: 'danger',
        size: 'sm'
    });
    $('.switchOnOff').change(function() {
        const roleId = $(this).data('role');
        const menuId = $(this).data('menu');
        const url = $(this).data('url');
        $.ajax({
            url: url + 'admin/changeAccess',
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function(data) {
                document.location.href = url + 'admin/roleAccess/' + roleId;
            }
        });
    });
</script>
</body>

</html>