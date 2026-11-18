<?php $__env->startSection('title','Find your next home'); ?>
<?php $__env->startSection('content'); ?>
<section class="hero"><div class="hero-pill">CURATED HOMES · MADE SIMPLE</div><h1>Find a place that <em>feels like home.</em></h1><p>Explore beautifully considered homes, compare spaces, and find your next chapter.</p></section>
<form class="filters" method="GET" action="<?php echo e(route('home')); ?>">
<label>Search<input name="q" value="<?php echo e(request('q')); ?>" placeholder="Keyword or feature"></label>
<label>City<input name="city" value="<?php echo e(request('city')); ?>" placeholder="City"></label>
<label>Home type<select name="type"><option value="">All types</option><?php $__currentLoopData = ['House','Apartment','Condo','Townhouse']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type); ?>" <?php if(request('type')===$type): echo 'selected'; endif; ?>><?php echo e($type); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></label>
<label>Max price<input type="number" name="max_price" min="0" value="<?php echo e(request('max_price')); ?>" placeholder="Any price"></label><button class="btn" type="submit">Search homes</button>
</form>
<div class="section-title"><h2>Available listings</h2><span><?php echo e($properties->total()); ?> homes found</span></div>
<div class="grid"><?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<a href="<?php echo e(route('properties.show',$property)); ?>" class="listing"><div class="listing-photo theme-<?php echo e($loop->index % 5); ?>"><span class="photo-icon">⌂</span><span class="tag"><?php echo e($property->property_type); ?></span></div><div class="listing-body"><div class="location">📍 <?php echo e($property->city); ?></div><h3><?php echo e($property->title); ?></h3><div class="price">$<?php echo e(number_format($property->price,0)); ?></div><div class="features"><span>🛏 <?php echo e($property->bedrooms); ?> beds</span><span>🛁 <?php echo e($property->bathrooms); ?> baths</span><span>⌗ <?php echo e(number_format($property->area_sqft)); ?> sqft</span></div></div></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="empty">No homes match your filters. Try adjusting your search.</div><?php endif; ?></div>
<div class="paginate"><?php echo e($properties->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\think-ai-works-all-five-project-folders\05-taw-php-realestate-listings\resources\views/properties/index.blade.php ENDPATH**/ ?>