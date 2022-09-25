<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/menus/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
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
                <th>Tên</th>
                <th>Danh mục cha</th>
                <th>Mô tả</th>
                <th>slug</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 150px;">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php echo \App\Helpers\Helper::menu($menus); ?>

        </tbody>
    </table>

    <?php echo $menus->appends(request()->all())->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/menu/list.blade.php ENDPATH**/ ?>