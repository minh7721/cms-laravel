<nav class="flex flex-col h-full py-5" x-data
    x-on:reload-files.window="$wire.call('reloadFiles')"
>
    <div class="mx-3 mb-2">
        <h1 class="font-semibold text-emerald-800 dark:text-emerald-600 text-2xl flex items-center">
            Log Viewer
            <a href="https://www.github.com/opcodesio/log-viewer" target="_blank" class="ml-3 text-gray-400 hover:text-emerald-800 dark:hover:text-emerald-600 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><use href="#icon-github" /></svg>
            </a>
        </h1>
        <?php if($backUrl = config('log-viewer.back_to_system_url')): ?>
            <a href="<?php echo e($backUrl); ?>" class="inline-flex items-center text-sm text-gray-400 hover:text-emerald-800 dark:hover:text-emerald-600 mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1.5" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-arrow-left" /></svg>
                <?php echo e(config('log-viewer.back_to_system_label') ?? 'Back to '.config('app.name')); ?>

            </a>
        <?php endif; ?>

        <div class="flex justify-between mt-4 mr-1">
            <div class="relative">
                <div x-cloak x-show="$store.fileViewer.scanInProgress" class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline spin mr-1" fill="currentColor"><use href="#icon-spinner" /></svg>
                    Indexing logs...
                </div>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <label for="file-sort-direction" class="sr-only">Sort direction</label>
                <select id="file-sort-direction" wire:model="direction" class="bg-gray-100 dark:bg-gray-900 px-2 font-normal outline-none rounded focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-600">
                    <option value="desc">Newest first</option>
                    <option value="asc">Oldest first</option>
                </select>
            </div>
        </div>
    </div>

    <div id="file-list-container" class="relative h-full overflow-hidden" x-cloak>
        <div class="pointer-events-none absolute z-10 top-0 h-4 w-full bg-gradient-to-b from-gray-100 dark:from-gray-900 to-transparent"></div>
        <div class="file-list" x-ref="list" x-on:scroll="(event) => $store.fileViewer.onScroll(event)">
    <?php /** @var \Opcodes\LogViewer\LogFolder $folder */ ?>
    <?php $__currentLoopData = $folderCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-data="{ folder: '<?php echo e($folder->identifier); ?>' }" :id="'folder-'+folder"
             class="relative <?php if(!$folder->isRoot()): ?> folder-container <?php endif; ?>"
        >
            <?php if(!$folder->isRoot()): ?>
            <div class="folder-item-container"
                 x-on:click="$store.fileViewer.toggle(folder)"
                 x-bind:class="[$store.fileViewer.isOpen(folder) ? 'active' : '', $store.fileViewer.shouldBeSticky(folder) ? 'sticky z-10' : '']"
                 x-bind:style="{ top: $store.fileViewer.isOpen(folder) ? ($store.fileViewer.folderTops[folder] || 0) : 0 }"
            >
                <div class="file-item">
                    <?php echo $__env->make('log-viewer::partials.folder-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="file-name"><?php echo e($folder->cleanPath()); ?></div>
                </div>
            </div>
            <?php endif; ?>

            <div class="folder-files <?php if(!$folder->isRoot()): ?> pl-3 ml-1 border-l border-gray-200 dark:border-gray-800 <?php endif; ?>" <?php if(!$folder->isRoot()): ?> x-show="$store.fileViewer.isOpen(folder)" <?php endif; ?>>
            <?php $__currentLoopData = $folder->files(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('log-viewer::partials.file-list-item', ['logFile' => $logFile], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="pointer-events-none absolute z-10 bottom-0 h-4 w-full bg-gradient-to-t from-gray-100 dark:from-gray-900 to-transparent"></div>
    </div>
</nav>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/livewire/file-list.blade.php ENDPATH**/ ?>