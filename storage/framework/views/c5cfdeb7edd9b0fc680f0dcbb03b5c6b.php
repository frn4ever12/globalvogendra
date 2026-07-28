<?php $__env->startSection('content'); ?>
    <section>
        <div class="row">
            <div class="col-lg-4 col-sm-12" style="padding: 0.5rem;text-align:center;">
                <div style="background-color:rgb(37, 37, 37); color:white;padding:1rem;border-radius: 4px 4px 0px 0px;">
                    <div>
                        <h3><?php echo e(\App\Models\Country::count() ?? 0); ?></h3>
                        <p style="padding: 0.5rem 0;"><b>Total Countries</b></p>
                    </div>
                </div>
                <div>
                    <a style="background-color: rgba(37, 37, 37, 0.80);padding:0.5rem 0;display:block; color: white;border-radius: 0px 0px 4px 4px;">View More&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12" style="padding: 0.5rem;text-align:center;">
                <div style="background-color:rgb(11, 169, 11); color:white;padding:1rem;border-radius: 4px 4px 0px 0px;">
                    <div>
                        <h3><?php echo e(\App\Models\University::count() ?? 0); ?></h3>
                        <p style="padding: 0.5rem 0;"><b>Total Universities</b></p>
                    </div>
                </div>
                <div>
                    <a style="background-color: rgba(11, 169, 11, 0.80);padding:0.5rem 0;display:block; color: white;border-radius: 0px 0px 4px 4px;">View More&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12" style="padding: 0.5rem;text-align:center;">
                <div style="background-color:rgb(3, 5, 108); color:white;padding:1rem;border-radius: 4px 4px 0px 0px;">
                    <div>
                        <h3><?php echo e(\App\Models\Program::count() ?? 0); ?></h3>
                        <p style="padding: 0.5rem 0;"><b>Total Programs</b></p>
                    </div>
                </div>
                <div>
                    <a style="background-color: rgba(3, 5, 108, 0.80);padding:0.5rem 0;display:block; color: white;border-radius: 0px 0px 4px 4px;">View More&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.includes.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\global consultancy\resources\views/dashboard.blade.php ENDPATH**/ ?>