<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
  protected $table = 'post';
	protected $fillable = ["user","name","gender","info","owner","owner_info","url"];
}
