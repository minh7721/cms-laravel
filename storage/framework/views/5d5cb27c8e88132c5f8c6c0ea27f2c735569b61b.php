<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts.shared.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    <?php echo $__env->make('layouts.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header -->

    <!-- Start Slider -->
    <?php echo $__env->make('layouts.shared.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Slider -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <div class="flex justify-between truncate ">
                <a class="font-normal py-1.5 px-9" href="/">Tất cả</a>
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="font-normal py-1.5 px-9 <?php echo e($menu->id == $menu_id ? ' bg-xanhLaDam rounded-36px text-white ' : ''); ?>" href="/category/<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-9 flex flex-col justify-center">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-row sm:flex-col my-8">
                        <div class="w-full mr-6">
                            <img class="w-full rounded-36px" src="<?php echo e($product->thumb); ?>" alt="">
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu"><?php echo e($product->name); ?></p>
                            <div class="flex flex-row text-xs tracking-spaceChu">
                                <p class="text-xanhLaDam mr-2 text-base"><?php echo e($product->menu->name); ?> •</p>
                                <p class="font-normal mr-2 text-base">Hoàng Minh •</p>
                                <p class="font-normal opacity-50 text-base"><?php echo e($product->created_at); ?></p>
                            </div>
                            <p class="font-normal opacity-50 text-base"><?php echo e($product->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="mt-20">
                    <div class="flex justify-center">
                        <button class="border-4 border-black border rounded-36px mb-10"
                                style="width:200px; height: 50px;">Xem
                            thêm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
<?php echo $__env->make('layouts.shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/layouts/PostByCategory.blade.php ENDPATH**/ ?>