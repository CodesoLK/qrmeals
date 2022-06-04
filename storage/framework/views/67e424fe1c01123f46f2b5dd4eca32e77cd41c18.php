                        <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <?php if(!empty($category->image)): ?>
                                <figure>
                                    <a onClick="enterCategory(<?php echo e($category->id); ?>, '<?php echo e($section); ?>')" href="javascript:void(0)"><img src="<?php echo e(asset('/uploads/restorants/subcategorys/')); ?>/<?php echo e($category->image); ?>_medium.jpg" loading="lazy" data-src="<?php echo e(config('global.restorant_details_image')); ?>" class="img-fluid lazy" alt=""></a>
                                </figure>
                                <?php endif; ?>
                                <div class="res_title"><b><a onClick="enterCategory(<?php echo e($category->id); ?>, '<?php echo e($section); ?>')" href="javascript:void(0)"><?php echo e($category->name); ?></a></b></div>
                                <div class="res_description"><?php echo e($category->description); ?></div>
                            </div>
                        </div>     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     <?php /**PATH C:\wamp\www\resources\views/restorants/partials/category.blade.php ENDPATH**/ ?>