<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Test</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 text-gray-900">

    <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <!-- Keep your existing nav -->

    <main class="py-8">
        <div class="container mx-auto px-4">
            <?php echo $__env->yieldContent('content'); ?> <!-- Correct slot for normal Blade views -->
        </div>
    </main>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\BBvb-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>