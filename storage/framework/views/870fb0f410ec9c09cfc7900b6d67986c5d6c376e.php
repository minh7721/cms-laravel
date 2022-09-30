<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logs - <?php echo e(config('app.name')); ?></title>

    <style>[x-cloak] { display: none !important; }</style>
    <?php if(isset($cssPath)): ?>
        <style><?php echo file_get_contents($cssPath); ?></style>
    <?php endif; ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="h-full px-5 bg-gray-100 dark:bg-gray-900"
    x-data="{
        selectedFileIdentifier: <?php if(isset($selectedFile)): ?> '<?php echo e($selectedFile->identifier); ?>' <?php else: ?> null <?php endif; ?>,
        selectFile(name) {
            if (name && name === this.selectedFileIdentifier) {
                this.selectedFileIdentifier = null;
            } else {
                this.selectedFileIdentifier = name;
            }
            this.$dispatch('file-selected', this.selectedFileIdentifier);
        }
    }"
    @scan-files.window="$store.fileViewer.initScanCheck('<?php echo e(route('blv.is-scan-required')); ?>', '<?php echo e(route('blv.scan-files')); ?>')"
    x-init="$nextTick(() => {
        $store.fileViewer.reset();
        $dispatch('scan-files');
        <?php if(isset($selectedFile)): ?> $store.fileViewer.foldersOpen.push('<?php echo e($selectedFile->subFolderIdentifier()); ?>'); <?php endif; ?>
    })"
>
<div class="flex h-full max-h-screen max-w-full">
    <div class="hidden md:flex md:w-88 md:flex-col md:fixed md:inset-y-0">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('log-viewer::file-list', ['selectedFileIdentifier' => isset($selectedFile) ? $selectedFile->identifier : null])->html();
} elseif ($_instance->childHasBeenRendered('kt6r6ZF')) {
    $componentId = $_instance->getRenderedChildComponentId('kt6r6ZF');
    $componentTag = $_instance->getRenderedChildComponentTagName('kt6r6ZF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('kt6r6ZF');
} else {
    $response = \Livewire\Livewire::mount('log-viewer::file-list', ['selectedFileIdentifier' => isset($selectedFile) ? $selectedFile->identifier : null]);
    $html = $response->html();
    $_instance->logRenderedChild('kt6r6ZF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

    <div class="md:pl-88 flex flex-col flex-1 min-h-screen max-h-screen max-w-full">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('log-viewer::log-list')->html();
} elseif ($_instance->childHasBeenRendered('7eifZBD')) {
    $componentId = $_instance->getRenderedChildComponentId('7eifZBD');
    $componentTag = $_instance->getRenderedChildComponentTagName('7eifZBD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7eifZBD');
} else {
    $response = \Livewire\Livewire::mount('log-viewer::log-list');
    $html = $response->html();
    $_instance->logRenderedChild('7eifZBD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>

<?php echo \Livewire\Livewire::scripts(); ?>

<?php if(isset($jsPath)): ?>
    <script><?php echo file_get_contents($jsPath); ?></script>
<?php endif; ?>

<?php echo $__env->make('log-viewer::icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/index.blade.php ENDPATH**/ ?>