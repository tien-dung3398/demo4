<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
 public function getAuthPassword(){
     return $this->password;
 }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany(Role::class,'admin_role','admin_id','role_id');
    }
    public function hasRoles ($role){
        return NULL !== $this->roles()->whereIn('name',$role)->first();
    }
    public function hasRole ($role){
        return NULL !== $this->roles()->where('name',$role)->first();
    }
 
}
