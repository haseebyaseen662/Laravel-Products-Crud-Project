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
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-dark">Create</a>
            </div>
         </div>
         <div class="row d-flex justify-content-center">
           <?php if(Session::has('success')): ?>
            <div class="col-md-10 mt-4">
                 <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                 </div>
            </div>
           <?php endif; ?>
            <div class="col-md-8">
              <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Products</h4>
                </div>
                <div class="card-body">
                     <table class="table">
                         <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Action</th>
                         </tr>
                         <?php if($products->isNotEmpty()): ?>
                         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td>
                                <?php if($product->image != ""): ?>
                                    <img width="50" src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" alt="">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->sku); ?></td>
                            <td>$<?php echo e($product->price); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($product->created_at)->format('d M, Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('products.edit',$product->id)); ?>" class="btn btn-dark">Edit</a>
                                <a href="#" onclick="event.preventDefault(); deleteProduct(<?php echo e($product->id); ?>);" class="btn btn-danger">Delete</a>
                             <form id="delete-product-form-<?php echo e($product->id); ?>" action="<?php echo e(route('Products.destroy', $product->id)); ?>" method="POST" style="display: none;">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('DELETE'); ?>
                             </form>

                            </td>
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                         <?php endif; ?>
                     </table>
                </div>
              </div> 
            </div>
         </div>
       </div>
  </body>
</html>

<script>
function deleteProduct(productId) {
    // Confirm with the user before deleting the product
    if (confirm('Are you sure you want to delete this product?')) {
        const formId = 'delete-product-form-' + productId;
        const form = document.getElementById(formId);

        if (form) {
            form.submit();
        }
    }
}
</script>
<?php /**PATH C:\xampp\htdocs\laravel11crud\resources\views/products/list.blade.php ENDPATH**/ ?>