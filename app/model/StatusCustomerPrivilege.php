<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class StatusCustomerPrivilege extends Model
{
	protected $table = 'status_customer_privileges';

	protected $fillable = [
    	'customer_privilege_id','status','date'
    ];

    protected $primaryKey = 'id';
}
