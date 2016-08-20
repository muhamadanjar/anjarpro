<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	
	protected $table = 'users';
    protected $primaryKey = 'id';

	
	protected $fillable = ['name', 'email', 'password'];


	protected $hidden = ['password', 'remember_token'];

	public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function assignRole($role){
        return $this->roles()->attach($role);
    }
     
    public function revokeRole($role){
        return $this->roles()->detach($role);
    }

    public function hasRole($name){
        foreach($this->roles as $role)
        {
            if ($role->name === $name) return true;
        }
        return false;
    }

    public function modules(){
        return $this->belongsToMany('App\mmodule','m_user_group_detil','groupid','moduleid','privid');
    }

    



}
