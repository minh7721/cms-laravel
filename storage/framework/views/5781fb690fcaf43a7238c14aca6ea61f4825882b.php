<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <form action="" class="d-flex justify-content-end col-12">
            <div class="form-group">
                <input type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên danh mục cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 150px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php echo \App\Helpers\Helper::menu($menus); ?>

        </tbody>
    </table>

    <?php echo $menus->appends(request()->all())->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/menu/list.blade.php ENDPATH**/ ?>