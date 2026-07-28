<?php $__env->startSection('head'); ?>
    <?php echo $__env->make('Admin.includes.datatables-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <style>
        .banner-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
            cursor: move;
        }
        .banner-item:hover {
            background: #f0f0f0;
        }
        .banner-preview {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;margin-bottom: 1.5rem;">
        <h3>Hero Banners</h3>
        <div>
            <a href="<?php echo e(route('admin.hero-banner.create')); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i>&nbsp;
                <span>Add New</span>
            </a>
        </div>
    </div>

    <div class="row" id="bannersContainer">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3">
                <div class="banner-item" data-id="<?php echo e($banner->id); ?>">
                    <div class="card">
                        <?php if($banner->desktop_image): ?>
                            <img src="<?php echo e(asset('storage/' . $banner->desktop_image)); ?>" class="banner-preview" alt="<?php echo e($banner->title); ?>">
                        <?php else: ?>
                            <div class="banner-preview bg-light d-flex align-items-center justify-content-center">
                                <span class="text-muted">No Image</span>
                            </div>
                        <?php endif; ?>
                        <div class="card-body p-2">
                            <h6 class="card-title"><?php echo e($banner->title); ?></h6>
                            <p class="card-text small text-muted"><?php echo e($banner->subtitle); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge <?php echo e($banner->status ? 'bg-success' : 'bg-danger'); ?>">
                                    <?php echo e($banner->status ? 'Active' : 'Inactive'); ?>

                                </span>
                                <div>
                                    <a href="<?php echo e(route('admin.hero-banner.edit', $banner->id)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" data-route="<?php echo e(route('admin.hero-banner.destroy', $banner->id)); ?>"
                                        class="btn btn-sm btn-danger deleteBtn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($banners->count() === 0): ?>
        <div class="alert alert-info text-center">
            <h4>No Banners Found</h4>
            <p>Click "Add New" to create your first hero banner.</p>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('Admin.includes.datatables-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        // Initialize Sortable
        var bannersContainer = document.getElementById('bannersContainer');
        new Sortable(bannersContainer, {
            animation: 150,
            handle: '.banner-item',
            onEnd: function() {
                saveBannerOrder();
            }
        });

        // Save banner order
        function saveBannerOrder() {
            var bannerIds = [];
            $('.banner-item').each(function() {
                bannerIds.push($(this).data('id'));
            });

            $.ajax({
                url: '<?php echo e(route('admin.hero-banner.reorder')); ?>',
                type: 'POST',
                data: {
                    banner_ids: bannerIds,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Banners reordered');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/Admin/HeroBanner/index.blade.php ENDPATH**/ ?>