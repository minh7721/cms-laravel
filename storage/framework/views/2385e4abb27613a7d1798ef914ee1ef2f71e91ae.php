<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập permission...">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm permission</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/permission/create.blade.php ENDPATH**/ ?>