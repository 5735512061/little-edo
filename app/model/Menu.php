<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $table = 'menus';

	protected $fillable = [
    	'admin_id', 'adminAsst_id', 'group', 'thaiName','engName','japName', 'detail', 'image', 'price', 'flag'
    ];

    protected $primaryKey = 'id';
}
