<?php /* C:\xampp\htdocs\blog\resources\views/post/editpost.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="Post" action="<?php echo e(action('PostController@update',$id)); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ภาพผู้สูญหาย</label>
							<div class="col-md-6">
								<img src="<?php echo e(asset('storage/'.$post->url)); ?>" width="300" height="auto" >
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ชื่อผู้สูญหาย</label>
							<div class="col-md-6">
								<input type="text" name="name" value="<?php echo e($post->name); ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เพศ</label>
							<div class="col-md-6">
                <?php if($post->gender =="ชาย"): ?>
                <input type="radio" name="gender" value="ชาย" checked="checked">ชาย
                <input type="radio" name="gender" value="หญิง">หญิง
                <?php elseif($post->gender =="หญิง"): ?>
								<input type="radio" name="gender" value="ชาย">ชาย
								<input type="radio" name="gender" value="หญิง" checked="checked">หญิง
                <?php endif; ?>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">รายละเอียดเพิ่มเติม</label>
							<div class="col-md-6">
								<textarea rows="5" cols="25" name="info" maxlength="300" value="<?php echo e($post->info); ?>"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ผู้ลงประกาศ</label>
							<div class="col-md-6">
								<input type="text" name="ownername" value="<?php echo e($post->owner); ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เบอร์ติดต่อ</label>
							<div class="col-md-6">
								<input type="text" name="ownertel" value="<?php echo e($post->owner_info); ?>"  required>
							</div>
						</div>

						<div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
								<input class="btn btn-primary" type="Submit" value="Post">
							</div>
						</div>
            <input type="hidden" name="_method" value="PATCH">
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>