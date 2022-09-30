<label for="query" class="sr-only">Search</label>
<div class="relative search <?php if(!empty($queryError)): ?> has-error <?php endif; ?>">
    <input wire:model.debounce.750ms="query" name="query" id="query" type="text" placeholder="Search... RegEx welcome!" />
    <?php if(!empty($query)): ?>
    <div class="clear-search">
        <button wire:click="clearQuery">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-cross" /></svg>
        </button>
    </div>
    <?php endif; ?>
    <?php if(!empty($queryError)): ?>
    <p class="mt-1 text-red-600 text-xs"><?php echo e($queryError); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/partials/search-input.blade.php ENDPATH**/ ?>