<?php $__env->startSection('title','Staff login'); ?>
<?php $__env->startSection('content'); ?>
<div class="auth"><div class="hero-pill">STAFF ACCESS</div><h1>Welcome back</h1><p class="muted">Sign in to manage EstateNest listings.</p>
<?php if($errors->any()): ?><div class="alert error"><?php echo e($errors->first()); ?></div><?php endif; ?>
<form method="POST" action="<?php echo e(route('login.submit')); ?>"><?php echo csrf_field(); ?><label>Email<input type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username"></label><label>Password<input type="password" name="password" required autocomplete="current-password"></label><button class="btn full" type="submit">Sign in</button></form><p class="muted">Staff accounts are created privately through the database seeder.</p></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\think-ai-works-all-five-project-folders\05-taw-php-realestate-listings\resources\views/auth/login.blade.php ENDPATH**/ ?>