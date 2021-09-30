<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Bus;
use App\Models\Ruta;
use App\Models\Encomienda;
use App\Models\Venta;
use App\Models\Boleto;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'estado',
        'rol',
        'ci'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function bus() {
    	return $this->hasMany('App\Models\Bus');
    }
    public function usuarios() {
    	return $this->hasMany(User::class, 'usuario_id');
    }
    public function clientes() {
    	return $this->hasMany(User::class, 'cliente_id');
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Rol');
    }
    //permisos roles
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'no autorizado');
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('nombre', $role)->first()){
            return true;
        }
        return false;
    }
    
    
}
