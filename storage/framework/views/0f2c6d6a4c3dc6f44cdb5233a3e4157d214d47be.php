<div class="h-full w-full py-5 log-list" <?php if($refreshAutomatically): ?> wire:poll <?php endif; ?>
    x-cloak
    x-data
    x-on:file-selected.window="$wire.call('selectFile', $event.detail)"
>
    <div class="flex flex-col h-full w-full mx-3 mb-4">
        <div class="px-4 mb-4 flex items-start">
            <div class="flex-1 flex items-center mr-6">
                <?php if(isset($selectedFileIdentifier)): ?>
                <div><?php echo $__env->make('log-viewer::partials.log-list-level-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <?php endif; ?>
            </div>
            <div class="flex-1 flex items-center <?php if(empty($selectedFileIdentifier)): ?> justify-end <?php endif; ?> min-h-[38px]">
                <?php if(isset($selectedFileIdentifier)): ?>
                <div class="flex-1"><?php echo $__env->make('log-viewer::partials.search-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <div class="ml-5"><?php echo $__env->make('log-viewer::partials.log-list-share-page-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <?php endif; ?>
                <div class="ml-2"><?php echo $__env->make('log-viewer::partials.site-settings-dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
            </div>
        </div>

        <?php if(isset($selectedFileIdentifier)): ?>
        <div class="relative overflow-hidden text-sm h-full" x-data x-init="$nextTick(() => {  })">
            <div id="log-item-container" class="log-item-container h-full overflow-y-auto px-4" x-on:scroll="(event) => $store.logViewer.onScroll(event)">
                <div class="inline-block min-w-full max-w-full align-middle">
<table wire:key="<?php echo e(\Illuminate\Support\Str::random(16)); ?>"
       class="table-fixed min-w-full max-w-full border-separate"
       style="border-spacing: 0"
       x-init="$nextTick(() => { $store.logViewer.reset(); if (<?php echo e($expandAutomatically ? 'true' : 'false'); ?>) { $store.logViewer.stacksOpen.push(0) } })"
>
<thead class="bg-gray-50">
<tr>
    <th scope="col" class="w-[60px] pl-4 pr-2 sm:pl-6 lg:pl-8"><span class="sr-only">Level icon</span></th>
    <th scope="col" class="w-[90px] hidden lg:table-cell">Level</th>
    <th scope="col" class="w-[180px] hidden sm:table-cell">Time</th>
    <th scope="col" class="w-[110px] hidden lg:table-cell">Env</th>
    <th scope="col">
        <div class="flex justify-between">
            <span>Description</span>
            <div>
                <label for="log-sort-direction" class="sr-only">Sort direction</label>
                <select id="log-sort-direction" wire:model="direction" class="bg-gray-100 dark:bg-gray-900 px-2 font-normal mr-3 outline-none rounded focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-600">
                    <option value="desc">Newest first</option>
                    <option value="asc">Oldest first</option>
                </select>
                <label for="items-per-page" class="sr-only">Items per page</label>
                <select id="items-per-page" wire:model="perPage" class="bg-gray-100 dark:bg-gray-900 px-2 font-normal outline-none rounded focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-600">
                    <option value="10">10 items per page</option>
                    <option value="25">25 items per page</option>
                    <option value="50">50 items per page</option>
                    <option value="100">100 items per page</option>
                    <option value="250">250 items per page</option>
                    <option value="500">500 items per page</option>
                </select>
            </div>
        </div>
    </th>
    <th scope="col"><span class="sr-only">Log index</span></th>
</tr>
</thead>

<?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tbody class="log-group <?php if($index === 0): ?> first <?php endif; ?>" id="tbody-<?php echo e($index); ?>" data-index="<?php echo e($index); ?>">
    <tr class="log-item <?php echo e($log->level->getClass()); ?>"
        x-on:click="$store.logViewer.toggle(<?php echo e($index); ?>)"
        x-bind:class="[$store.logViewer.isOpen(<?php echo e($index); ?>) ? 'active' : '', $store.logViewer.shouldBeSticky(<?php echo e($index); ?>) ? 'sticky z-2' : '']"
        x-bind:style="{ top: $store.logViewer.stackTops[<?php echo e($index); ?>] || 0 }"
    >
        <td class="log-level log-level-icon">
<?php if($log->level->getClass() === 'danger'): ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-danger" /></svg>
<?php elseif($log->level->getClass() === 'warning'): ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-warning" /></svg>
<?php else: ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-info" /></svg><?php endif; ?>
        </td>
        <td class="log-level truncate hidden lg:table-cell"><?php echo e($log->level->getName()); ?></td>
        <td class="whitespace-nowrap text-gray-900 dark:text-gray-200"><?php echo highlight_search_result($log->time->toDateTimeString(), $query); ?></td>
        <td class="whitespace-nowrap text-gray-500 dark:text-gray-300 dark:opacity-90 hidden lg:table-cell"><?php echo highlight_search_result($log->environment, $query); ?></td>
        <td class="max-w-[1px] w-full truncate text-gray-500 dark:text-gray-300 dark:opacity-90"><?php echo highlight_search_result($log->text, $query); ?></td>
        <td class="whitespace-nowrap text-gray-500 dark:text-gray-300 dark:opacity-90 text-xs"><?php echo $__env->make('log-viewer::partials.log-list-link-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
    </tr>
    <tr x-show="$store.logViewer.isOpen(<?php echo e($index); ?>)"><td colspan="6">
        <pre class="log-stack"><?php echo highlight_search_result($log->fullText, $query); ?></pre>
        <?php if($log->fullTextIncomplete): ?>
        <div class="py-4 px-8 text-gray-500 italic">
            The contents of this log have been cut short to the first <?php echo e(bytes_formatted(\Opcodes\LogViewer\Facades\LogViewer::maxLogSize())); ?>.
            The full size of this log entry is <strong><?php echo e($log->fullTextLengthFormatted()); ?></strong>
        </div>
        <?php endif; ?>
    </td></tr>
</tbody>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tbody class="log-group">
<tr>
    <td colspan="6">
        <div class="bg-white text-gray-600 dark:bg-gray-800 dark:text-gray-200 p-12">
            <div class="text-center font-semibold">No results</div>
            <?php if(!empty($query)): ?>
            <div class="text-center mt-6">
                <button class="px-3 py-2 border dark:border-gray-700 text-gray-800 dark:text-gray-200 hover:border-emerald-600 dark:hover:border-emerald-700 rounded-md" wire:click="clearQuery">Clear search query</button>
            </div>
            <?php endif; ?>
        </div>
    </td>
</tr>
</tbody>
<?php endif; ?>
</table>
                </div>
            </div>

            <div class="absolute hidden inset-0 top-9 px-4 z-20" wire:loading.class.remove="hidden">
                <div class="rounded-md bg-white text-gray-800 dark:bg-gray-700 dark:text-gray-200 opacity-90 w-full h-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 spin" fill="currentColor"><use href="#icon-spinner" /></svg>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="flex h-full items-center justify-center text-gray-500 dark:text-gray-400">
            <span wire:loading.remove>Please select a file...</span>
            <span wire:loading>Loading...</span>
        </div>
        <?php endif; ?>

        <?php if($logs?->hasPages()): ?>
        <div class="px-4">
            <?php echo e($logs->links('log-viewer::pagination')); ?>

        </div>
        <?php endif; ?>

        <div class="grow flex flex-col justify-end text-right px-4 mt-3">
            <p class="text-xs text-gray-400 dark:text-gray-500">
                <span>Memory: <span class="font-semibold"><?php echo e($memoryUsage); ?></span></span>
                <span class="mx-1.5">&middot;</span>
                <span>Duration: <span class="font-semibold"><?php echo e($requestTime); ?></span></span>
                <span class="mx-1.5">&middot;</span>
                <span>Version: <span class="font-semibold"><?php echo e($version); ?></span></span>
            </p>
        </div>
    </div>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/livewire/log-list.blade.php ENDPATH**/ ?>