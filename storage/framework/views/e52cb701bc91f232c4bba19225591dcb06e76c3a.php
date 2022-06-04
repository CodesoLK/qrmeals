                    
                    <?php if($category->parent_id != null): ?>
                   
                        <div class="col-lg-12">
                            
                            <nav class="tabbable ">
                                <ul class="nav nav-pills bg-white mb-2">
                                    <li class="nav-item nav-item-category ">
                                        <a class="nav-link  mb-sm-3 mb-md-0 active" onClick="enterCategory(<?php echo e($category->parent_id); ?>, '<?php echo e($categ_id); ?>')" href="javascript:void(0)"> <i class="fa fa-arrow-left">  </i> BACK </a>
                                    </li> 
                                    <li class="nav-item nav-item-category ">
                                        <p class="display-4" ><?php echo e($category->name); ?></p>
                                    </li>                           
                                </ul>
                            </nav>
                        </div>
                   
                    <?php endif; ?>
                    <?php if(!$category->aitems->isEmpty() && !$category->subcategorys->isEmpty()): ?>
                    <?php $__currentLoopData = $category->aitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="strip">
                                <?php if(!empty($item->image)): ?>
                                <figure>
                                    <a onClick="setCurrentItem(<?php echo e($item->id); ?>)" href="javascript:void(0)"><img src="<?php echo e($item->logom); ?>" loading="lazy" data-src="<?php echo e(config('global.restorant_details_image')); ?>" class="img-fluid lazy" alt=""></a>
                                </figure>
                                <?php endif; ?>
                                <div class="res_title"><b><a onClick="setCurrentItem(<?php echo e($item->id); ?>)" href="javascript:void(0)"><?php echo e($item->name); ?></a></b></div>
                                <div class="res_description"><?php echo e($item->short_description); ?></div>
                                <div class="row">
                                    <div class="col-4"><div class="res_mimimum"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></div></div>
                                    <div class="col-8">
                                        <div class="allergens" style="text-align: right;">
                                            <?php $__currentLoopData = $item->allergens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="<?php echo e($allergen->title); ?>" >
                                                 <img  src="<?php echo e($allergen->image_link); ?>" />
                                             </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             
                                        </div>
                                    </div>
                                </div>
                                
                                
                           
                            </div>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('restorants.partials.category', [
                    'categorys' => $category->subcategorys,
                    'section' => $categ_id
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                <div class="alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                    <strong>No data!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php endif; ?><?php /**PATH C:\wamp\www\resources\views/restorants/partials/subcateg.blade.php ENDPATH**/ ?>