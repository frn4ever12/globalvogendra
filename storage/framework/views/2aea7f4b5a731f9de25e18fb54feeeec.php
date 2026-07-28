<?php $__env->startSection('head'); ?>
    <style>
        .service-banner {
            position: relative;
            height: 400px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .service-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 86, 179, 0.8) 0%, rgba(40, 167, 69, 0.6) 100%);
        }
        .service-banner-content {
            position: relative;
            z-index: 1;
        }
        .sidebar {
            position: sticky;
            top: 100px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }
        .sidebar-link {
            display: block;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        .sidebar-link:hover {
            background-color: #f8f9fa;
            border-color: #0056b3;
            color: #0056b3;
        }
        .sidebar-link.active {
            background-color: #0056b3;
            color: white;
            border-color: #0056b3;
        }
        .service-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }
        .related-service-card {
            transition: all 0.3s ease;
        }
        .related-service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 86, 179, 0.15);
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Banner -->
    <?php if($service->banner_image): ?>
        <div class="service-banner" style="background-image: url('<?php echo e(asset('storage/' . $service->banner_image)); ?>');">
            <div class="container h-100 d-flex align-items-center">
                <div class="service-banner-content text-white">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem;"><?php echo e($service->title); ?></h1>
                    <?php if($service->short_title): ?>
                        <p class="lead mb-0"><?php echo e($service->short_title); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="service-banner" style="background: linear-gradient(135deg, #0056b3 0%, #28a745 100%);">
            <div class="container h-100 d-flex align-items-center">
                <div class="service-banner-content text-white">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem;"><?php echo e($service->title); ?></h1>
                    <?php if($service->short_title): ?>
                        <p class="lead mb-0"><?php echo e($service->short_title); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Breadcrumb -->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('services.index')); ?>" class="text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($service->title); ?></li>
            </ol>
        </nav>
    </div>

    <div class="container py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Image -->
                <?php if($service->featured_image): ?>
                    <div class="mb-4">
                        <img src="<?php echo e(asset('storage/' . $service->featured_image)); ?>" 
                             class="img-fluid rounded shadow" 
                             alt="<?php echo e($service->title); ?>"
                             loading="lazy">
                    </div>
                <?php endif; ?>

                <!-- Service Title -->
                <div class="mb-4">
                    <?php if($service->category): ?>
                        <span class="badge bg-success mb-2"><?php echo e($service->category); ?></span>
                    <?php endif; ?>
                    <?php if($service->featured): ?>
                        <span class="badge bg-warning text-dark mb-2"><i class="fa fa-star"></i> Featured</span>
                    <?php endif; ?>
                </div>

                <!-- Short Description -->
                <?php if($service->short_description): ?>
                    <div class="mb-4">
                        <p class="lead text-muted"><?php echo e($service->short_description); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Full Description -->
                <?php if($service->description): ?>
                    <div class="service-content mb-5">
                        <?php echo $service->description; ?>

                    </div>
                <?php endif; ?>

                <!-- Apply Now Button -->
                <?php if($service->button_link): ?>
                    <div class="mb-5">
                        <a href="<?php echo e($service->button_link); ?>" 
                           class="btn btn-lg btn-primary rounded-pill px-5 py-3"
                           style="background: linear-gradient(135deg, #0056b3, #003a80); border: none; box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);">
                            <?php echo e($service->button_text ?? 'Apply Now'); ?>

                        </a>
                    </div>
                <?php endif; ?>

                <!-- Contact Form -->
                <div class="card mb-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Contact Us About This Service</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('appointment.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" name="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Service</label>
                                    <input type="text" class="form-control" value="<?php echo e($service->title); ?>" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" name="message" rows="4" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Previous/Next Navigation -->
                <div class="row mb-5">
                    <div class="col-6">
                        <?php if($previousService): ?>
                            <a href="<?php echo e(route('service.detail', $previousService->slug)); ?>" 
                               class="btn btn-outline-primary w-100">
                                <i class="fa fa-arrow-left me-2"></i> Previous
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-6 text-end">
                        <?php if($nextService): ?>
                            <a href="<?php echo e(route('service.detail', $nextService->slug)); ?>" 
                               class="btn btn-outline-primary w-100">
                                Next <i class="fa fa-arrow-right ms-2"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Social Share -->
                <div class="card mb-5">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Share This Service</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" 
                               target="_blank" class="btn btn-primary">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo e(url()->current()); ?>" 
                               target="_blank" class="btn btn-info">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(url()->current()); ?>" 
                               target="_blank" class="btn btn-primary" style="background-color: #0077b5;">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo e(url()->current()); ?>" 
                               target="_blank" class="btn btn-success">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <?php if($relatedServices->count() > 0): ?>
                    <div class="mb-5">
                        <h4 class="fw-bold mb-4">Related Services</h4>
                        <div class="row g-4">
                            <?php $__currentLoopData = $relatedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="related-service-card bg-white rounded shadow-sm overflow-hidden" style="border: 1px solid #e9ecef;">
                                        <?php if($related->featured_image): ?>
                                            <img src="<?php echo e(asset('storage/' . $related->featured_image)); ?>" 
                                                 class="w-100" 
                                                 style="height: 150px; object-fit: cover;"
                                                 alt="<?php echo e($related->title); ?>"
                                                 loading="lazy">
                                        <?php endif; ?>
                                        <div class="p-3">
                                            <h6 class="fw-bold mb-2"><?php echo e($related->title); ?></h6>
                                            <a href="<?php echo e(route('service.detail', $related->slug)); ?>" 
                                               class="btn btn-sm btn-primary">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">All Services</h5>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('service.detail', $sidebarService->slug)); ?>" 
                                   class="sidebar-link <?php echo e($sidebarService->id === $service->id ? 'active' : ''); ?>">
                                    <i class="fa fa-chevron-right me-2" style="font-size: 12px;"></i>
                                    <?php echo e($sidebarService->title); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!-- Quick Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Quick Info</h5>
                        </div>
                        <div class="card-body">
                            <?php if($service->category): ?>
                                <div class="mb-3">
                                    <strong>Category:</strong>
                                    <p class="mb-0"><?php echo e($service->category); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <strong>Status:</strong>
                                <p class="mb-0">
                                    <span class="badge <?php echo e($service->status ? 'bg-success' : 'bg-danger'); ?>">
                                        <?php echo e($service->status ? 'Active' : 'Inactive'); ?>

                                    </span>
                                </p>
                            </div>
                            <?php if($service->icon): ?>
                                <div class="mb-3">
                                    <strong>Icon:</strong>
                                    <p class="mb-0"><i class="<?php echo e($service->icon); ?>"></i> <?php echo e($service->icon); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- CTA Card -->
                    <div class="card" style="background: linear-gradient(135deg, #0056b3, #003a80); color: white;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-3">Need Help?</h5>
                            <p class="mb-4">Contact us for more information about this service.</p>
                            <a href="<?php echo e(route('contact')); ?>" class="btn btn-light btn-lg rounded-pill px-4">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/Frontend/services/show.blade.php ENDPATH**/ ?>