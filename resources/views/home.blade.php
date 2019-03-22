@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        @foreach ($posts as $row)
                        <tr>

                            <td width="310px" aling="center">
                                <img src="{{ asset('storage/'.$row['url']) }}"  class="img-thumbnail">
                            </td>
                            <td width="500px">
                              <b>คุณ</b> {{$row['name']}}</br>
                              <b>เพศ</b> {{$row['gender']}}</br>
                              <b>รายละเอียดเพิ่มเติม</b></br>{{$row['info']}}</br>
                              <b>หากพบตัวติดต่อได้ที่</b></br>
                              <b>คุณ</b> {{$row['owner']}}</br>
                              <b>เบอร์</b> {{$row['owner_info']}}</br>
                            </td>
                        </tr>
                        @endforeach
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
