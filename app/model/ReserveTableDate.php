<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ReserveTableDate extends Model
{
	protected $table = 'reserve_table_dates';

	protected $fillable = [
    	'table_id','status','date','seat'
    ];

    protected $primaryKey = 'id';
}
