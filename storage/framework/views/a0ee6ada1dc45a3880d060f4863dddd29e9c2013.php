<?php use App\Helpers\Helper; ?>


<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/slider/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-12">
            <select>
                <option></option>
            </select>
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
            <th>Tiêu đề ảnh</th>
            <th>Url</th>
            <th>Hình ảnh</th>
            <th>Sắp xếp</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 150px;">Option</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($slider->id); ?></td>
                <td><?php echo e($slider->name); ?></td>
                <td><?php echo e($slider->url); ?></td>
                <td>
                    <a>
                        <img src="<?php echo e($slider->thumb); ?>" style="height: 60px;">
                    </a>
                </td>
                <td><?php echo e($slider->sort_by); ?></td>
                <td><?php echo Helper::active($slider->active); ?></td>
                <td><?php echo e($slider->updated_at); ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/admin/slider/preview/<?php echo e($slider->id); ?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="/admin/slider/edit/<?php echo e($slider->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($slider->id); ?>, '/admin/slider/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $sliders->appends(request()->all())->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/slider/list.blade.php ENDPATH**/ ?>