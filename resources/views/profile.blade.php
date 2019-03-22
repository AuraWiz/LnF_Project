@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                   <table>
						<tr>
							<td width="70">Name</td>
							<td>
								{{ Auth::user()->name }}
							</td>
						</tr>

							<td width="70">Email</td>
							<td>
								{{ Auth::user()->email }}
							</td>
						</tr>
						<tr>
							<td height="70" width="70"></td>
							<td >
								<?php
									$content = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=1609350&appid=a0cf15ae70f37b25435af5950cd1624e");
									$list = json_decode($content);
									$temp = $list->main->temp;
									$desc = $list->weather[0]->description;
									echo "Today, ".ceil($temp- 273.15)." celsius, ".$desc;
								?>
							</td>
						</tr>
				</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
