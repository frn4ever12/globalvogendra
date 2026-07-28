<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($setting->name ?? 'Consultancy'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-page {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: stretch;
        }
        .right-side {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .login-form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .login-form-container h5 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

        @media (max-width: 767px) {
            .login-page {
                flex-direction: column;
            }

         
            .right-side {
                width: 100%;
                background-color: transparent;
                justify-content: center;
                padding: 20px;
            }

            .login-form-container {
                max-width: 90%;
                padding: 20px;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <div class="login-page">


        <div class="right-side">
            <div class="login-form-container">
                <div style="display:flex; align-items:center; justify-content:center">
                        <?php if($setting && $setting->image): ?>
                            <img src="<?php echo e(asset('storage/' . $setting->image)); ?>" style="width:60px" alt="">
                        <?php else: ?>
                            <img src="<?php echo e(asset('dist/img/logo.jpg')); ?>" style="width:60px" alt="">
                        <?php endif; ?>
                </div><br>
                <h5>Login</h5>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter email" value="<?php echo e(old('email')); ?>">
                        <?php if($errors->has('email')): ?>
                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password" autocomplete="current-password">
                        <?php if($errors->has('password')): ?>
                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH D:\global consultancy\resources\views/auth/login.blade.php ENDPATH**/ ?>