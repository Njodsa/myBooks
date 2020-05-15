<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
  protected $fillable = ['name', 'authorname', 'isbn','genres','price'];
}
