<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumPayment extends Model
{
    use HasFactory;
    protected $primaryKey="p_id";
    public $timestamps=false;
    public $incrementing=false;
}
