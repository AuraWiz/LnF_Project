@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="Post" action="{{action('PostController@update',$id)}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ภาพผู้สูญหาย</label>
							<div class="col-md-6">
								<img src="{{asset('storage/'.$post->url)}}" width="300" height="auto" >
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ชื่อผู้สูญหาย</label>
							<div class="col-md-6">
								<input type="text" name="name" value="{{$post->name}}" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เพศ</label>
							<div class="col-md-6">
                @if($post->gender =="ชาย")
                <input type="radio" name="gender" value="ชาย" checked="checked">ชาย
                <input type="radio" name="gender" value="หญิง">หญิง
                @elseif($post->gender =="หญิง")
								<input type="radio" name="gender" value="ชาย">ชาย
								<input type="radio" name="gender" value="หญิง" checked="checked">หญิง
                @endif
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">รายละเอียดเพิ่มเติม</label>
							<div class="col-md-6">
								<textarea rows="5" cols="25" name="info" maxlength="300" value="{{$post->info}}"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">ผู้ลงประกาศ</label>
							<div class="col-md-6">
								<input type="text" name="ownername" value="{{$post->owner}}" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">เบอร์ติดต่อ</label>
							<div class="col-md-6">
								<input type="text" name="ownertel" value="{{$post->owner_info}}"  required>
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
@endsection
