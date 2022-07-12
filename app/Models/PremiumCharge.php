<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumCharge extends Model
{
    use HasFactory;
    protected $primaryKey="c_id";
    public $timestamps=false;
    public $incrementing=false;
}
