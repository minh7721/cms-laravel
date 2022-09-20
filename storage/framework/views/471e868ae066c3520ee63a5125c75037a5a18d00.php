<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name" placeholder="Nhập tiêu đề hình ">
            </div>
             <div class="form-group">
                    <label for="">Đường dẫn</label>
                    <input type="text" name="url" class="form-control" id="url" value="<?php echo e(old('url')); ?>" placeholder="ĐƯờng dẫn hình ảnh">
             </div>

            <div class="form-group w-50">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="">Sắp xếp</label>
                <input type="number" name="sort_by" class="form-control" id="sort_by" value="<?php echo e(old('sort_by')); ?>" placeholder="Sắp xếp...">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" checked="">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm slider</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/slider/add.blade.php ENDPATH**/ ?>