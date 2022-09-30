<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts.shared.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
<div class="text-mauChu md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    <?php echo $__env->make('layouts.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header -->


    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <div class="mt-11 flex justify-between">
                <a href="/" class="flex flex-row arrow-back">
                    <i class="py-1.5 fa-solid fa-less-than"></i>
                    <p class="ml-6 py-1.5 arrow-back__text">Quay lại</p>
                </a>
                <div class="flex flex-row ">
                    <p class="hidden md:block py-1.5 text-sm font-normal opacity-70">Chuyên mục</p>
                    <div class="bg-xanhLaDam ml-4 rounded-36px text-white py-1.5 px-9"><?php echo e($product->menu->name); ?></div>
                </div>
            </div>
            <div class="mt-16">
                <p class="text-3xl font-bold tight1"><?php echo e($product->name); ?></p>
            </div>
            <div class="mt-3 md:flex justify-between">
                <div class="flex flex-row">
                    <p class="text-xanhLaDam font-semibold text-base text-[14px] tracking-spaceChu"><?php echo e($product->menu->name); ?></p>
                    <p class="mx-2">•</p>
                    <p class="font-normal text-base text-[14px] tracking-spaceChu">Hoàng Nhật Minh</p>
                    <p class="mx-2">•</p>
                    <p class="font-normal opacity-50 text-base text-[14px] tracking-spaceChu"><?php echo e($product->created_at); ?></p>
                </div>
                <div class="columns-3 md:mt-0 mt-3">
                    <div class="text-white rounded-36px flex items-center justify-center py-1.5 px-6 mr-2" style="background-color: #ccc;">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="ml-2 hidden lg:block font-normal text-base text-sm">Gửi mail</p>
                    </div>

                    <div class="text-white rounded-36px flex items-center justify-center py-1.5 px-6 mr-2" style="background-color: #395185;">
                        <i class="fa-brands fa-facebook"></i>
                        <p class="ml-2 hidden lg:block font-normal text-base text-sm">Chia sẻ</p>
                    </div>

                    <div class="rounded-36px flex items-center justify-center py-1.5 px-6 border-2 border-black bg-white">
                        <i class="fa-solid fa-heart-circle-check"></i>
                        <p class="ml-2 hidden lg:block font-normal text-base text-sm">Lưu</p>
                    </div>
                </div>
            </div>

            <div class="mt-9">
                <img src="<?php echo e($product->thumb); ?>" class="w-full rounded-36px" alt="">
            </div>
            <div class="mt-9">
                <p class="font-normal text-base opacity-70"><?php echo $product->content; ?></p>
            </div>
            <div class="mt-9 w-full">
                <div class="grid grid-cols-3 gap-4">
                    <div class="md:col-span-2 col-span-3">
                        <img src="<?php echo e($product->thumb); ?>" class="md:h-full sm:w-full" alt="">
                    </div>
                    <div class="md:col-span-1 sm:col-span-3 flex md:flex-col ">
                        <img src="<?php echo e($product-> thumb); ?>" class="md:h-1/2 md:mb-3 sm:w-1/2 sm:mr-3 rounded-36px" alt="">
                        <img src="<?php echo e($product-> thumb); ?>" class="md:h-1/2 sm:w-1/2 rounded-36px" alt="">
                    </div>
                </div>
            </div>
            <div class="mt-9">
                <p class="font-semibold text-2xl">Lorem ipsum dolor sit amet, </p>
                <p class="mt-4 font-normal text-base opacity-70 tracking-[0.005em]">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sem id varius rutrum aliquam. Diam ullamcorper ut mattis fringilla nunc, sed eu nisi. Amet, duis auctor tempor sit mauris rhoncus. Pretium at massa sed morbi sit tincidunt arcu. Pharetra, turpis id elementum cursus amet, eu scelerisque ipsum. Suspendisse nulla congue mauris mattis diam sed venenatis non bibendum. Vestibulum, lobortis aenean lorem aenean sagittis. Et nibh ullamcorper justo cursus eget. Tortor faucibus volutpat, vel nullam sed massa ullamcorper in ultrices. Augue viverra tincidunt amet,
                </p>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 1: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 2: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 3: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 4: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 5: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
            </div>
            <div class="mt-9 flex flex-row">
                <div class="rounded-36px px-9 py-1.5 w-36 flex justify-center items-center" style="background-color: #E6E6E6;"><?php echo e($product->tag->tag); ?></div>
                <div class="ml-4 rounded-36px px-9 py-1.5 w-36 flex justify-center items-center" style="background-color: #E6E6E6;"><?php echo e($product->tag->tag); ?></div>
            </div>
            <div class="mt-9 flex flex-row justify-between">
                <div class="flex">
                    <p class="py-1.5 mr-4 font-semibold text-sm">Tin cùng chuyên mục</p>
                    <p class=" text-sm bg-xanhLaDam text-white rounded-36px px-6 py-1.5 flex justify-center items-center"><?php echo e($product->menu->name); ?></p>
                </div>
                <i class="py-1.5 fa-solid fa-greater-than hidden sm:block"></i>
                <a href="/category/<?php echo e($product->menu->id); ?>" class="sm:hidden text-sm font-normal text-mauChu">Xem tất cả</a>
            </div>
            <div class="mt-9 flex flex-col justify-center">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/<?php echo e($product1->slug); ?>" class="flex flex-row sm:flex-col my-8">
                            <div class="w-full mr-6">
                                <img class="w-full" src="<?php echo e($product1->thumb); ?>" alt="">
                            </div>
                            <div class="flex flex-col w-full">
                                <p class="mt-4 font-semibold text-lg tracking-spaceChu"><?php echo e($product1->name); ?></p>
                                <div class="flex flex-row text-xs tracking-spaceChu">
                                    <p class="text-xanhLaDam mr-2 text-base"><?php echo e($product1->menu->name); ?> •</p>
                                    <p class="font-normal mr-2 text-base">Hoàng Minh •</p>
                                    <p class="font-normal opacity-50 text-base"><?php echo e($product1->created_at); ?></p>
                                </div>
                                <p class="font-normal opacity-50 text-base"><?php echo e($product1->description); ?></p>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
























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
<?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/layouts/detail.blade.php ENDPATH**/ ?>