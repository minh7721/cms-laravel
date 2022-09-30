<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên bài viết</label>
                <input disabled type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input disabled type="text" name="slug" value="<?php echo e($product->slug); ?>" class="form-control" id="slug" >
            </div>

            <div class="form-group">
                <label for="">Người đăng</label>
                <input disabled type="text" name="userName" value="<?php echo e($product->user->name); ?>" class="form-control" id="userName" >
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

            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea disabled name="description" class="form-control"><?php echo e($product->description); ?></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <p><?php echo $product->content; ?></p>
            </div>

            <div class="form-group">
                <label>Tag</label>
                <select disabled class="form-control" name="tag">
                    <option value="0">Tag</option>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->id); ?>" <?php echo e($product->tag_id == $tag->id ? 'selected' : ''); ?>><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group w-50">
                <label>Ảnh bài viết</label>
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
            <?php if( $role == 1): ?>
                <a  class="btn btn-primary btn-sm" href="/admin/product/edit/<?php echo e($product->id); ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="" class="btn btn-danger btn-sm"
                   onclick="removeRow(<?php echo e($product->id); ?>, '/admin/product/destroy/')">
                    <i class="fa fa-trash"></i>
                </a>
            <?php elseif($role == 2): ?>
                <?php if($currentUser == $product->user_id): ?>
                    <a  class="btn btn-primary btn-sm" href="/admin/product/edit/<?php echo e($product->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($product->id); ?>, '/admin/product/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>

                <?php elseif($currentUser != $product->user_id): ?>
                    <a  class="disabled btn btn-primary btn-sm" href="/admin/product/edit/<?php echo e($product->id); ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="disabled btn btn-danger btn-sm"
                       onclick="removeRow(<?php echo e($product->id); ?>, '/admin/product/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
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