<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softdeletes;
    protected $table = 'product';
    protected $primaryKey = 'id';
	protected $dates = ['deleted_at'];
    protected $fillable=['name','price','sPrice','picture'];

}
