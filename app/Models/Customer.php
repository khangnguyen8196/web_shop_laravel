<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;



class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable

{
    use HasFactory;
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'referral_code',
        'status',
        'role_id',
        'is_email_verified',

    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function attemptLogin($email, $password)
    {
        $customer = static::where('email', $email)->first();
    
        if (!$customer || !Hash::check($password, $customer->password)) {
            return null;
        }
    
        return $customer;
    }

    public function logActivity($activity, $details)
    {
        $this->logs()->create([
            'activity' => $activity,
            'details' => $details,
        ]);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
