<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo e($user->name); ?>" placeholder="Nhập tên user...">
            </div>

            <div class="form-group">
                <label for="menu">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" id="email" placeholder="Nhập Email...">
            </div>

            <div class="form-group">
                <label for="menu">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập Password...">
            </div>














        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật user</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>