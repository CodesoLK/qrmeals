<div id="render-<?php echo e($category->id); ?>">
                        <?php if($category->active == 1): ?>
                        
                        <div class="alert alert-default">
                            <div class="row">
                                <div class="col">
                                    <?php if($category->parent_id != null): ?>
                                <a href="javascript:void(0);" onclick="getCategory(<?php echo e($category->parent_id); ?>, <?php echo e($category->id); ?>)" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                                <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i> BACK</span>
                                            </a>
                                    <?php endif; ?>
                                    <span class="h1 font-weight-bold mb-0 text-white"><?php echo e($category->name); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <script>
                                            function setSelectedCategoryId(id){
                                                $('#category_id').val(id);
                                            }

                                            function setRestaurantId(id){
                                                $('#res_id').val(id);
                                            }

                                        </script>
                                        <?php if($canAdd): ?>
                                            <button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add item')); ?> in <?php echo e($category->name); ?>" onClick=(setSelectedCategoryId(<?php echo e($category->id); ?>)) >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('plans.current')); ?>" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i> <?php echo e(__('Menu size limit reaced')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <button class="btn btn-icon btn-1 btn-sm btn-warning" type="button" id="edit" data-toggle="modal" data-target="#modal-edit-category" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Edit category')); ?> <?php echo e($category->name); ?>" data-id="<?= $category->id ?>" data-name="<?= $category->name ?>" >
                                            <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                                        </button>

                                       

                                        <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-icon btn-1 btn-sm btn-danger" type="button" onclick="confirm('<?php echo e(__("Are you sure you want to delete this category?")); ?>') ? this.parentElement.submit() : ''" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Delete')); ?> <?php echo e($category->name); ?>">
                                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                                            </button>
                                        </form>

                                       

                                         <!-- UP -->
                                         
                                         

                                        <!-- DOWN -->
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($category->active == 1): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row row-grid">
                                    <?php $__currentLoopData = $category->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                            <a href="<?php echo e(route('items.edit', $item)); ?>">
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo e($item->logom); ?>" alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-primary text-uppercase"><?php echo e($item->name); ?></h3>
                                                        <p class="card-text description mt-3"><?php echo e($item->description); ?></p>

                                                        <span class="badge badge-primary badge-pill"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>

                                                        <p class="mt-3 mb-0 text-sm">
                                                            <?php if($item->available == 1): ?>
                                                            <span class="text-success mr-2"><?php echo e(__("AVAILABLE")); ?></span>
                                                            <?php else: ?>
                                                            <span class="text-danger mr-2"><?php echo e(__("UNAVAILABLE")); ?></span>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $category->subcategorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3">
                                                <a href="#">
                                                    <div class="card">
                                                        <img class="card-img-top" src="<?php echo e(asset('/uploads/restorants/subcategorys/')); ?>/<?php echo e($subcategory->image); ?>_medium.jpg" alt="...">
                                                        <div class="card-body">
                                                            <h3 class="card-title text-primary text-uppercase"><?php echo e($subcategory->name); ?></h3>
                                                            <p class="card-text description mt-3"><?php echo e($subcategory->description); ?></p>

                                                        </div>
                                                    </div>
                                                    <br/>
                                                </a>
                                                </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($canAdd): ?>
                                    <div class="col-lg-3" >
                                        <a   data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onclick=(setSelectedCategoryId(<?php echo e($category->id); ?>))>
                                            <div class="card">
                                                <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase"><?php echo e(__('Add item')); ?></h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    <div class="col-lg-3" >
                                        <a id="subcategory_add" data-toggle="tooltip" data-placement="top" onclick="return addSubs(<?php echo e($category->id); ?>)" href="javascript:void(0);" onclick=(setSelectedCategoryId(<?php echo e($category->id); ?>))>
                                            <div class="card">
                                                <img class="card-img-top" src="<?php echo e(asset('images')); ?>/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase">Add sub-category</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        </div><?php /**PATH C:\wamp\www\resources\views/items/partials/category.blade.php ENDPATH**/ ?>