<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    use HasFactory;
    protected $primaryKey="commission_id";
    public $timestamps=false;
    public $incrementing=false;
}
