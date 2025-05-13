<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(count($cart) > 0): ?>
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4">Product</th>
                    <th class="py-2 px-4">Quantity</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="py-2 px-4"><?php echo e($item['title']); ?></td>
                        <td class="py-2 px-4"><?php echo e($item['quantity']); ?></td>
                        <td class="py-2 px-4">$<?php echo e(number_format($item['price'], 2)); ?></td>
                        <td class="py-2 px-4">$<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
						<td class="py-2 px-4">
						<form action="<?php echo e(route('cart.remove', $loop->index)); ?>" method="POST" class="inline">
						<?php echo csrf_field(); ?>
						<button class="text-red-600" onclick="return confirm('Remove this item?')">Remove</button>
						</form>
						</td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="mt-6">
            <form action="<?php echo e(route('cart.checkout')); ?>" method="POST" class="inline">
			<?php echo csrf_field(); ?>
				<button class="bg-blue-500 text-white px-6 py-2 rounded">
					Proceed to Checkout
				</button>
			</form>

        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\BBvb-main\resources\views/cart/index.blade.php ENDPATH**/ ?>