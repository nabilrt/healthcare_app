<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientPayment extends Model
{
    use HasFactory;
    protected $primaryKey="payment_id";
    public $timestamps=false;
    public $incrementing=false;
}
