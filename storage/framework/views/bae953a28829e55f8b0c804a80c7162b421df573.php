<?php /* C:\xampp\htdocs\blog\resources\views/post/managepost.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Post</div>

                <div class="card-body">
                  <table class="table table-hover">
                      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(Auth::user()->name == $row['user']): ?>
                      <tr>

                          <td width="310px" aling="center">
                              <img src="<?php echo e(asset('storage/'.$row['url'])); ?>" width="300" height="auto">
                          </td>
                          <td width="400px">
                            <b>คุณ</b> <?php echo e($row['name']); ?></br>
                            <b>เพศ</b> <?php echo e($row['gender']); ?></br>
                            <b>รายละเอียดเพิ่มเติม</b></br><?php echo e($row['info']); ?></br>
                            <b>หากพบตัวติดต่อได้ที่</b></br>
                            <b>คุณ</b> <?php echo e($row['owner']); ?></br>
                            <b>เบอร์</b> <?php echo e($row['owner_info']); ?></br>
                          </td>
                          <td width="100px" aling="center">
                            <a class="btn btn-primary" href="<?php echo e(action('PostController@edit',$row['id'])); ?>">Update</a>
                          </td>
                          <td width="100px" aling="center">
                            <form method="post" action="<?php echo e(action('PostController@destroy',$row['id'])); ?>">
                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="_method" value="DELETE">
                              <button class="btn btn-danger">Delete</button>
                            </form>

                          </td>
                      </tr>
                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>