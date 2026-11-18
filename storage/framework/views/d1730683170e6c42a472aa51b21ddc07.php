<?php $__env->startSection('title',$property->title); ?>
<?php $__env->startSection('content'); ?>
<div class="crumb"><a href="<?php echo e(route('home')); ?>">← All listings</a> / <?php echo e($property->city); ?></div>
<section class="detail-hero"><div class="detail-art">⌂</div><div class="detail-copy"><div class="hero-pill"><?php echo e($property->property_type); ?> · <?php echo e($property->status); ?></div><h1><?php echo e($property->title); ?></h1><p>📍 <?php echo e($property->address); ?>, <?php echo e($property->city); ?></p><div class="big-price">$<?php echo e(number_format($property->price,0)); ?></div><div class="features large"><span>🛏 <?php echo e($property->bedrooms); ?> bedrooms</span><span>🛁 <?php echo e($property->bathrooms); ?> bathrooms</span><span>⌗ <?php echo e(number_format($property->area_sqft)); ?> sqft</span></div></div></section>
<div class="detail-desc"><h2>About this home</h2><p><?php echo e($property->description); ?></p><p class="muted">Demo listing only. No real properties are being offered for sale.</p></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\think-ai-works-all-five-project-folders\05-taw-php-realestate-listings\resources\views/properties/show.blade.php ENDPATH**/ ?>