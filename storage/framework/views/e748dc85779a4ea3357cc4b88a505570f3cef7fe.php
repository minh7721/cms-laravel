<?php
    $levelsFound = array_filter($levels, fn ($level) => $level->count > 0);
    $levelsSelected = array_values(array_filter($levelsFound, fn ($level) => $level->selected));
    $totalLogsFound = array_sum(array_map(fn ($level) => $level->count, $levelsFound));
?>
<div class="flex items-center">
    <div class="mr-5 relative log-levels-selector"
        x-data="dropdown"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
    >
        <button type="button" class="dropdown-toggle badge none <?php if(count($levelsSelected)): ?> active <?php endif; ?>"
                x-ref="button" x-on:click.stop="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
        >
            <?php if(count($levelsSelected) > 2): ?>
            <span class="opacity-90 mr-1"><?php echo e(number_format($logs->total())); ?> entries in</span>
            <strong class="font-semibold"><?php echo e($levelsSelected[0]->level->getName()); ?> + <?php echo e(count($levelsSelected) - 1); ?> more</strong>
            <?php elseif(count($levelsSelected) > 0): ?>
            <span class="opacity-90 mr-1"><?php echo e(number_format($logs->total())); ?> entries in</span>
            <strong class="font-semibold"><?php echo e(implode(', ', array_map(fn ($levelCount) => $levelCount->level->getName(), $levelsSelected))); ?></strong>
            <?php elseif(count($levelsFound)): ?>
            <span class="opacity-90"><?php echo e(number_format($totalLogsFound)); ?> entries found. None selected</span>
            <?php else: ?>
            <span class="opacity-90">No entries found</span>
            <?php endif; ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-chevron-down" /></svg>
        </button>

        <div
            x-ref="panel"
            x-show="open"
            x-bind="transitions"
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            class="dropdown left min-w-[200px]"
            :class="direction"
        >
            <div class="py-2">
                <div class="label flex justify-between">
                    Severity
                    <?php if(count($levelsFound)): ?>
                        <?php if(count($levelsSelected) === count($levelsFound)): ?>
                        <span wire:click.stop="deselectAllLevels" class="cursor-pointer text-sky-700 dark:text-sky-500 font-normal hover:text-sky-800 dark:hover:text-sky-400">Deselect all</span>
                        <?php else: ?>
                        <span wire:click.stop="selectAllLevels" class="cursor-pointer text-sky-700 dark:text-sky-500 font-normal hover:text-sky-800 dark:hover:text-sky-400">Select all</span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $levelsFound; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levelCount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <button wire:click="toggleLevel('<?php echo e($levelCount->level->value); ?>')">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'log-viewer::components.checkmark','data' => ['class' => 'checkmark mr-2.5','checked' => $levelCount->selected]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('log-viewer::checkmark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'checkmark mr-2.5','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($levelCount->selected)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <span class="flex-1 inline-flex justify-between">
                        <span class="log-level <?php echo e($levelCount->level->getClass()); ?>"><?php echo e($levelCount->level->getName()); ?></span>
                        <span class="log-count"><?php echo e(number_format($levelCount->count)); ?></span>
                    </span>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="no-results">There are no severity filters to display because no entries have been found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/partials/log-list-level-buttons.blade.php ENDPATH**/ ?>