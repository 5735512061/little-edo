<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
	protected $table = 'reserves';

	protected $fillable = [
    	'name', 'tel', 'date', 'time', 'quantity', 'comment'
    ];

    protected $primaryKey = 'id';
}
