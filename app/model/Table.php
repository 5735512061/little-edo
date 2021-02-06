<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
	protected $table = 'tables';

	protected $fillable = [
    	'number', 'seat','status'
    ];

    protected $primaryKey = 'id';
}
