<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Models\User;

use App\Constants\Status;
use App\Helpers\AttachmentHelper;
use App\Helpers\UniqueNumberHelper;

class Permission extends \Spatie\Permission\Models\Permission
{
	protected $table = 'permissions';

	protected $guard_name = 'web';

    protected $fillable = ['name','guard_name'];

    public static function get_all()
    {
        return Permission::orderBy('id', 'asc')->get();
    }

	public static function get($permission_id)
	{
		return Permission::where('permission_id' , $permission_id)->first();
	}

	public static function scopeStored($query)
    {
        return $query->where('name', '<>', 'Super Admin');
    }

	public static function scopeRoleId($query , $id)
	{
		return $query->where('id', $id);
	}

	public static function scopeName($query , $name)
	{
		return $query->where('name', $name);
	}

	public static function scopeSearch($query, $term)
	{
		$search_term = '%' . $term . '%';

		return $query->where(function($q) use ($search_term)
		{
			$q->where('name', 'like', $search_term)->orWhere('permission_no', 'like', $search_term);
		});
	}
}
