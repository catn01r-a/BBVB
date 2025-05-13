<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

    <?php if($orders->count()): ?>
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4">Order ID</th>
                    <th class="py-2 px-4">Total Price</th>
                    <th class="py-2 px-4">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t">
                    <td class="py-2 px-4"><?php echo e($order->id); ?></td>
                    <td class="py-2 px-4">$<?php echo e(number_format($order->total_price, 2)); ?></td>
                    <td class="py-2 px-4"><?php echo e($order->created_at->format('Y-m-d H:i')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have no orders yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\BBvb-main\resources\views/orders/index.blade.php ENDPATH**/ ?>