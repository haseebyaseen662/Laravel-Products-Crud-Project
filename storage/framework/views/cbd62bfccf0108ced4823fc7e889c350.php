<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
       <div class="bg-dark py-3">
          <h4 class="text-white text-center">Simple Laravel 11 Crud</h4>
       </div>
       <div class="container">
       <div class="row justify-content-center mt-4">
            <div class="col-md-8 d-flex justify-content-end">
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-dark">Back</a>
            </div>
         </div>
         <div class="row d-flex justify-content-center">
            <div class="col-md-8">
              <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Edit Product</h4>
                </div>
                <form enctype="multipart/form-data" action="<?php echo e(route('Products.update',$product->id)); ?>" method="post">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label h5">Name</label>
                        <input type="text" value="<?php echo e(old('name',$product->name)); ?>" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Name" name="name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="invalid-feedback"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Sku</label>
                        <input type="text" value="<?php echo e(old('sku',$product->sku)); ?>" class="<?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Sku" name="sku">
                    <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="invalid-feedback"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Price</label>
                        <input type="text" value="<?php echo e(old('price',$product->price)); ?>" class="<?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Price" name="price">  
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="invalid-feedback"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Description</label>
                        <textarea class="form-control" placeholder="Enter Description" name="description" cols="30" rows="5"><?php echo e(old('description',$product->description)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" placeholder="" name="image">
                        <?php if($product->image != ""): ?>
                        <img class="w-50 my-3" src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
              </div> 
            </div>
         </div>
       </div>
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel11crud\resources\views/products/edit.blade.php ENDPATH**/ ?>