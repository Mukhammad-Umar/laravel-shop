
<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="rem1">
        <td class="invert">1</td>
        <td class="invert-image"><a href=""><img src="<?php echo e(asset('public/images/' . $cart->image)); ?>" alt=" " class="img-responsive"></a></td>
        <td class="invert">
            <div class="quantity">
                <div class="quantity-select">
                    <div class="entry value-minus">&nbsp;</div>
                    <div class="entry value"><span>1</span></div>
                    <div class="entry value-plus active">&nbsp;</div>
                </div>
            </div> 
        </td>
        <td class="invert"><?php echo e($cart->name); ?></td>
        <td class="invert">$<?php echo e($cart->price); ?></td>
        <td class="invert">
            <button type="button" class="btn btn-danger listbuttonremove" id="<?php echo e($cart->id); ?>">
            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/shop/cart-standard.blade.php ENDPATH**/ ?>