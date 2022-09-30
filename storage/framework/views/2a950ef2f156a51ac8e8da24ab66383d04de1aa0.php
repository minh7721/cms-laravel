<?php use App\Helpers\Helper; ?>


<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/role/create" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
            <div class="form-group">
                <input value="<?php echo e($search); ?>" type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên role cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>
    <table class="table table-hover text-wrap">
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên</th>
            <th style="width: 150px;">Option</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($role->id); ?></td>
                <td><?php echo e($role->name); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/role/edit/<?php echo e($role->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($role->id); ?>, '/admin/role/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $roles->appends(request()->all())->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/role/list.blade.php ENDPATH**/ ?>