<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">My Products</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="mb-4">
        <a href="<?php echo e(route('products.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Product</a>
    </div>

    <?php if($products->count()): ?>
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Quantity</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t">
                    <td class="py-2 px-4"><?php echo e($product->title); ?></td>
                    <td class="py-2 px-4">$<?php echo e($product->price); ?></td>
                    <td class="py-2 px-4"><?php echo e($product->quantity); ?></td>
                    <td class="py-2 px-4">
                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="text-blue-600">Edit</a>

                        <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="text-red-600 ml-2" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\BBvb-main\resources\views/products/index.blade.php ENDPATH**/ ?>