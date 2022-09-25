<?php use App\Helpers\Helper; ?>


<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/product/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
            <div class="form-group">
                <input value="<?php echo e($search); ?>" type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên danh mục cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>
    <form action="" method="GET">
        <div class="row mt-1 ml-1 d-flex align-items-center">
               <select name="category" class="form-select p-2 mb-3" aria-label="Default select example">
                   <option value="0" selected>Lọc theo danh mục</option>
                   <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php echo e($category == $menu->id ? 'selected' : ''); ?> value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>

                <select name="status" class="form-select p-2 mb-3 ml-3" aria-label="Default select example">
                    <option value="0">Trạng thái</option>
                    <option <?php echo e($status == 'active' ? 'selected' : ''); ?> value="active">Kích hoạt</option>
                    <option <?php echo e($status == 'inactive' ? 'selected' : ''); ?> value="inactive">Chưa kích hoạt</option>
                </select>

            <button class="btn btn-primary mb-3 ml-3 p-2" style="width: 80px;">Lọc</button>
        </div>
    </form>
    <table>
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Giá gốc</th>
            <th>Giá khuyến mãi</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 150px;">Active</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->menu->name); ?></td>
                <td><?php echo e($product->description); ?></td>
                <td>
                    <a href="<?php echo e($product->thumb); ?>" target="_blank">
                        <img src="<?php echo e($product->thumb); ?>" style="width: 50px;">
                    </a>
                </td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->price_sale); ?></td>
                <td><?php echo Helper::active($product->active); ?></td>
                <td><?php echo e($product->updated_at); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/admin/product/preview/<?php echo e($product->id); ?>">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a class="btn btn-primary btn-sm" href="/admin/product/edit/<?php echo e($product->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($product->id); ?>, '/admin/product/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $products->appends(request()->all())->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/product/list.blade.php ENDPATH**/ ?>