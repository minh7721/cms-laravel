<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input disabled type="text" name="name" value="<?php echo e($menu->name); ?>" class="form-control" id="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="parent_id" disabled>
                    <option value="0" <?php echo e($menu->parent_id == 0 ? 'selected' : ''); ?>>Danh mục cha</option>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuParent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($menuParent->id); ?>"
                            <?php echo e($menu->parent_id == $menuParent->id ? 'selected' : ''); ?>>
                            <?php echo e($menuParent->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea disabled name="description" class="form-control"><?php echo e($menu->description); ?></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <p><?php echo $menu->content; ?></p>
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p><?php echo e($menu->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'); ?></p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/menus/edit/<?php echo e($menu->id); ?>">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo e($menu->id); ?>,'/admin/menus/destroy/')">
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/admin/menu/preview.blade.php ENDPATH**/ ?>