<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên bài viết</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name" placeholder="Nhập tên bài viết">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh mục cha</option>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>










            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea name="description" class="form-control"><?php echo e(old('description')); ?></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control"><?php echo e(old('content')); ?></textarea>
            </div>

            <div class="form-group">
                <label>Tag</label>
                <select class="form-control" name="tag">
                    <option value="0">Tag</option>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group w-50">
                <label>Ảnh bài viết</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
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
            <button type="submit" class="btn btn-primary">Tạo bài viết</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/product/add.blade.php ENDPATH**/ ?>