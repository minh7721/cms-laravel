<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh mục cha</option>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($menu->id); ?>" <?php echo e($product->menu_id == $menu->id ? 'selected' : ''); ?>>
                            <?php echo e($menu->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="row d-flex justify-content-between">
                <div style="width: 49%;" class="form-group">
                    <label for="price">Giá gốc</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?php echo e($product->price); ?>" placeholder="Nhập giá gốc sản phẩm">
                </div>
                <div style="width: 49%;" class="form-group">
                    <label for="price_sale">Giá giảm</label>
                    <input type="number" name="price_sale" class="form-control" value="<?php echo e($product->price_sale); ?>" id="price_sale" placeholder="Nhập giá sản phẩm sau giảm">
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea name="description" class="form-control"><?php echo e($product->description); ?></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control"><?php echo e($product->content); ?></textarea>
            </div>

            <div class="form-group w-50">
                <label>Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="<?php echo e($product->thumb); ?>" target="_blank">'
                        <img src="<?php echo e($product->thumb); ?>" width="100px;" alt="">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="<?php echo e($product->thumb); ?>">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        <?php echo e($product->active == 1 ? 'checked' : ''); ?>>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        <?php echo e($product->active == 0 ? 'checked' : ''); ?>>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>