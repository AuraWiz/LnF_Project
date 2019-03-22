@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Post</div>

                <div class="card-body">
                  <table class="table table-hover">
                      @foreach ($posts as $row)
                      @if(Auth::user()->name == $row['user'])
                      <tr>

                          <td width="310px" aling="center">
                              <img src="{{ asset('storage/'.$row['url']) }}" width="300" height="auto">
                          </td>
                          <td width="400px">
                            <b>คุณ</b> {{$row['name']}}</br>
                            <b>เพศ</b> {{$row['gender']}}</br>
                            <b>รายละเอียดเพิ่มเติม</b></br>{{$row['info']}}</br>
                            <b>หากพบตัวติดต่อได้ที่</b></br>
                            <b>คุณ</b> {{$row['owner']}}</br>
                            <b>เบอร์</b> {{$row['owner_info']}}</br>
                          </td>
                          <td width="100px" aling="center">
                            <a class="btn btn-primary" href="{{action('PostController@edit',$row['id'])}}">Update</a>
                          </td>
                          <td width="100px" aling="center">
                            <form method="post" action="{{action('PostController@destroy',$row['id'])}}">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <button class="btn btn-danger">Delete</button>
                            </form>

                          </td>
                      </tr>
                      @endif
                      @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
