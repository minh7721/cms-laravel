<?php $__env->startSection('content'); ?>
    <table>
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 150px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php echo \App\Helpers\Helper::menu($menus); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cms-laravel/resources/views/admin/menu/list.blade.php ENDPATH**/ ?>