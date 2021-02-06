<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'images';

	protected $fillable = [
    	'type','detail','image','heading',
    ];

    protected $primaryKey = 'id';
}
