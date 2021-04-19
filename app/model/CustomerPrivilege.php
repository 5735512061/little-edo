<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CustomerPrivilege extends Model
{
	protected $table = 'customer_privileges';

	protected $fillable = [
    	'name', 'phone','address', 'privilege', 'code', 'date', 'card_id'
    ];

    protected $primaryKey = 'id';
}
