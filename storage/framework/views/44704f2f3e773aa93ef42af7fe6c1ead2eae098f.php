<div class="file-item-container"
    x-bind:class="[selectedFileIdentifier && selectedFileIdentifier === '<?php echo e($logFile->identifier); ?>' ? 'active' : '']"
    wire:key="log-file-<?php echo e($logFile->identifier); ?>"
    wire:click="selectFile('<?php echo e($logFile->identifier); ?>')"
    x-on:click="selectFile('<?php echo e($logFile->identifier); ?>')"
    x-data="dropdown"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['dropdown-button']"
>
    <div class="file-item">
        <p class="file-name"><?php echo e($logFile->name); ?></p>
        <span class="file-size"><?php echo e($logFile->sizeFormatted()); ?></span>
        <button type="button" class="file-dropdown-toggle"
                x-ref="button" x-on:click.stop="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-more" /></svg>
        </button>
    </div>

    <div
        x-ref="panel"
        x-show="open"
        x-bind="transitions"
        x-on:click.outside="close($refs.button)"
        :id="$id('dropdown-button')"
        class="dropdown w-48"
        :class="direction"
    >
        <div class="py-2">
            <button wire:click="clearCache('<?php echo e($logFile->identifier); ?>')" x-on:click.stop="cacheRecentlyCleared = false;" x-data="{ cacheRecentlyCleared: <?php echo json_encode($cacheRecentlyCleared, 15, 512) ?> }" x-init="setTimeout(() => cacheRecentlyCleared = false, 2000)">
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading.class="hidden" fill="currentColor"><use href="#icon-database" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading.class.remove="hidden" class="hidden spin" fill="currentColor"><use href="#icon-spinner" /></svg>
                <span x-show="!cacheRecentlyCleared" wire:loading.class="hidden">Rebuild index</span>
                <span x-show="!cacheRecentlyCleared" wire:loading wire:target="clearCache('<?php echo e($logFile->identifier); ?>')">Rebuilding...</span>
                <span x-show="cacheRecentlyCleared" class="text-emerald-500">Index rebuilt</span>
            </button>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('downloadLogFile', $logFile)): ?>
            <a href="<?php echo e($logFile->downloadUrl()); ?>" x-on:click.stop="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-download" /></svg>
                Download
            </a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleteLogFile', $logFile)): ?>
            <div class="divider"></div>
            <button x-on:click.stop="if (confirm('Are you sure you want to delete the log file \'<?php echo e($logFile->name); ?>\'')) { $wire.call('deleteFile', '<?php echo e($logFile->identifier); ?>') }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-trashcan" /></svg>
                Delete
            </button>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/partials/file-list-item.blade.php ENDPATH**/ ?>