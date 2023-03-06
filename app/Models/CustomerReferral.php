<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReferral extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_customer_id',
        'child_customer_id',
        'referral_code',
        'current_parent_referral_level'
    ];
}
