<div x-data="dropdown"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['dropdown-button']"
    class="relative"
>
    <button type="button" class="menu-button"
            x-ref="button" x-on:click.stop="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-cog" /></svg>
    </button>

    <div
        x-ref="panel"
        x-show="open"
        x-bind="transitions"
        x-on:click.outside="close($refs.button)"
        :id="$id('dropdown-button')"
        style="min-width: 250px;"
        class="dropdown"
    >
        <div class="py-2">
            <div class="label">Settings</div>

            <button wire:click="toggleShorterStackTraces">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'log-viewer::components.checkmark','data' => ['checked' => $shorterStackTraces]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('log-viewer::checkmark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shorterStackTraces)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span class="ml-3">Shorter stack traces</span>
            </button>

            <div class="divider"></div>
            <div class="label">Actions</div>

            <button wire:click="clearCacheAll" x-data="{ cacheRecentlyCleared: <?php echo json_encode($cacheRecentlyCleared, 15, 512) ?> }" x-init="setTimeout(() => cacheRecentlyCleared = false, 2000)">
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading.class="hidden" wire:target="clearCacheAll" fill="currentColor"><use href="#icon-database" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading.class.remove="hidden" wire:target="clearCacheAll" class="hidden spin" fill="currentColor"><use href="#icon-spinner" /></svg>
                <span x-show="!cacheRecentlyCleared" wire:loading.class="hidden" wire:target="clearCacheAll">Rebuild indices for all files</span>
                <span x-show="!cacheRecentlyCleared" wire:loading wire:target="clearCacheAll">Please wait...</span>
                <span x-show="cacheRecentlyCleared" class="text-emerald-500">File indices cleared</span>
            </button>

            <button x-data="{ copied: false }" x-clipboard="window.location.href" x-on:click.stop="copied = true; setTimeout(() => copied = false, 2000)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-share" /></svg>
                <span x-show="!copied">Share this page</span>
                <span x-show="copied" class="text-emerald-500">Link copied!</span>
            </button>

            <div class="divider"></div>

            <button x-on:click="$store.logViewer.toggleTheme()">
                <svg x-show="$store.logViewer.theme === 'System'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-theme-auto" /></svg>
                <svg x-show="$store.logViewer.theme === 'Light'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-theme-light" /></svg>
                <svg x-show="$store.logViewer.theme === 'Dark'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-theme-dark" /></svg>
                <span>Theme: <span x-html="$store.logViewer.theme" class="font-semibold"></span></span>
            </button>

            <a href="https://www.github.com/opcodesio/log-viewer" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><use href="#icon-question" /></svg>
                Help
            </a>
        </div>
    </div>
</div>
<?php /**PATH /var/www/backpack-test/cms-laravel/vendor/opcodesio/log-viewer/src/../resources/views/partials/site-settings-dropdown.blade.php ENDPATH**/ ?>