<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Admin.includes.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
    </style>
</head>

<body class="bg-white nav-md">
    <div class="container body">
        <div class="main_container">
            <?php echo $__env->make('Admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- page content -->
            <div class="bg-white right_col" role="main">
                <div class="x_content">
                    <?php echo $__env->make('Admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <?php echo $__env->make('Admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /footer content -->
        </div>
    </div>


    <?php echo $__env->make('Admin.includes.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\global consultancy\resources\views/Admin/includes/main.blade.php ENDPATH**/ ?>