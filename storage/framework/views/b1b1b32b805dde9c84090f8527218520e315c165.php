<?php use App\Helpers\Helper; ?>


<?php $__env->startSection('content'); ?>
    <table>
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá gốc</th>
            <th>Giá khuyến mãi</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 100px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->menu->name); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->price_sale); ?></td>
                <td><?php echo Helper::active($product->active); ?></td>
                <td><?php echo e($product->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/product/edit/<?php echo e($product->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/admin/menus/" class="btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($product->id); ?>, '/admin/product/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $products->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/product/list.blade.php ENDPATH**/ ?>