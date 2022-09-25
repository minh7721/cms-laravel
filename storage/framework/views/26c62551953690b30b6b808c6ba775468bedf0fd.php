<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input disabled type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select disabled class="form-control" name="menu_id">
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
                    <input disabled type="number" name="price" class="form-control" id="price" value="<?php echo e($product->price); ?>" placeholder="Nhập giá gốc sản phẩm">
                </div>
                <div style="width: 49%;" class="form-group">
                    <label for="price_sale">Giá giảm</label>
                    <input disabled type="number" name="price_sale" class="form-control" value="<?php echo e($product->price_sale); ?>" id="price_sale" placeholder="Nhập giá sản phẩm sau giảm">
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea disabled name="description" class="form-control"><?php echo e($product->description); ?></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <p><?php echo $product->content; ?></p>
            </div>

            <div class="form-group w-50">
                <label>Ảnh sản phẩm</label>
                <div id="image_show">
                    <a href="<?php echo e($product->thumb); ?>" target="_blank">'
                        <img src="<?php echo e($product->thumb); ?>" width="100px;" alt="">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p><?php echo e($product->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'); ?></p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/product/edit/<?php echo e($product->id); ?>">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo e($product->id); ?>,'/admin/product/destroy/')">
                    <i class="fa fa-trash"></i> xóa
                </a>
            </div>
        </div>

        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/product/preview.blade.php ENDPATH**/ ?>