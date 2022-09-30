<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên user...">
            </div>

            <div class="form-group">
                <label for="menu">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập Email...">
            </div>

            <div class="form-group">
                <label for="menu">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập Password...">
            </div>

            <div class="form-group">
                <label for="menu">Role</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập Password...">
            </div>






            <div class="form-group">
                <label for="roleUser">Cấp bậc</label>
                <select class="form-control" id="roleUser" name="roleUser">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm user</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/users/create.blade.php ENDPATH**/ ?>