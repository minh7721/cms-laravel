<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input disabled type="text" name="name" value="<?php echo e($slider->name); ?>" class="form-control" id="name" placeholder="Nhập tiêu đề hình ">
            </div>
            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input disabled type="text" name="url" class="form-control" id="url" value="<?php echo e($slider->url); ?>" placeholder="ĐƯờng dẫn hình ảnh">
            </div>

            <div class="form-group w-50">
                <label>Hình ảnh</label>
                <div id="image_show">
                    <a href="<?php echo e($slider->thumb); ?>">
                        <img src="<?php echo e($slider->thumb); ?>" style="width: 100px;">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label for="">Sắp xếp</label>
                <input disabled type="number" name="sort_by" class="form-control" id="sort_by" value="<?php echo e($slider->sort_by); ?>" placeholder="Sắp xếp...">
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p><?php echo e($slider->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'); ?></p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/slider/edit/<?php echo e($slider->id); ?>">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo e($slider->id); ?>,'/admin/slider/destroy/')">
                    <i class="fa fa-trash"></i> xóa
                </a>
            </div>
        </div>
        <!-- /.card-body -->
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/slider/preview.blade.php ENDPATH**/ ?>