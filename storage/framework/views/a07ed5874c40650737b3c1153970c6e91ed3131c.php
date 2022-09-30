<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts.shared.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    <?php echo $__env->make('layouts.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên bài viết</label>
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
                            <input class="custom-control-input custom-control-input-danger" value="1" type="radio" id="active" name="active" checked="">
                            <label for="customRadio4" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="0" type="radio" id="no_active" name="active">
                            <label for="customRadio4" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="ml-3">
                    <button type="submit" class="btn btn-outline-danger">Tạo bài viết</button>
                </div>
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
<?php echo $__env->make('layouts.shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/layouts/post/create.blade.php ENDPATH**/ ?>