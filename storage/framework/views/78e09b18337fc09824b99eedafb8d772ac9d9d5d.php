<?php /* C:\xampp\htdocs\blog\resources\views/home.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="table table-striped">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td width="310px" aling="center">
                                <img src="<?php echo e(asset('storage/'.$row['url'])); ?>"  class="img-thumbnail">
                            </td>
                            <td width="500px">
                              <b>คุณ</b> <?php echo e($row['name']); ?></br>
                              <b>เพศ</b> <?php echo e($row['gender']); ?></br>
                              <b>รายละเอียดเพิ่มเติม</b></br><?php echo e($row['info']); ?></br>
                              <b>หากพบตัวติดต่อได้ที่</b></br>
                              <b>คุณ</b> <?php echo e($row['owner']); ?></br>
                              <b>เบอร์</b> <?php echo e($row['owner_info']); ?></br>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>