
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e($title); ?></title>
    <?php echo $__env->make('admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Đăng ký</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Đăng ký ngay tài khoản mới</p>
            <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/auth/register/create" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="Tên của bạn...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password2" value="<?php echo e(old('password2')); ?>" class="form-control" placeholder="Nhập lại password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">








                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo csrf_field(); ?>
            </form>













            <a href="/auth/login" class="text-center">Đăng nhập ngay</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH /var/www/backpack-test/cms-laravel/resources/views/auth/register.blade.php ENDPATH**/ ?>