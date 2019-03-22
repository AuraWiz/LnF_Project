@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    <form method="post" action="{{route('post.index')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ภาพผู้สูญหาย</label>
							<div class="col-md-6">
								<input type="file" name="pic" required>
							</div>
						</div>
              <input type="hidden" name="user" value="{{ Auth::user()->name }}">
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ชื่อผู้สูญหาย</label>
							<div class="col-md-6">
								<input type="text" name="name" required autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เพศ</label>
							<div class="col-md-6">
								<input type="radio" name="gender" value="ชาย">ชาย
								<input type="radio" name="gender" value="หญิง">หญิง
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">รายละเอียดเพิ่มเติม</label>
							<div class="col-md-6">
								<textarea rows="5" cols="25" name="info" maxlength="300"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ผู้ลงประกาศ</label>
							<div class="col-md-6">
								<input type="text" name="ownername" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เบอร์ติดต่อ</label>
							<div class="col-md-6">
								<input type="text" name="ownertel" required>
							</div>
						</div>

						<div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
								<input class="btn btn-primary" type="reset" value="Reset">
								<input class="btn btn-primary" type="Submit" value="Post">
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
