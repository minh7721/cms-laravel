<div <?php echo e($attributes->class('inline-block w-[18px] h-[18px] bg-gray-50 dark:bg-gray-800 rounded border dark:border-gray-600 flex items-center justify-center')); ?> <?php echo e($attributes->except('checked', 'class')); ?>>
    <?php if($checked): ?>
    <svg viewBox="0 0 18 18" fill="currentColor" width="18" height="18"><use href="#icon-checkmark" /></svg>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/components/checkmark.blade.php ENDPATH**/ ?>