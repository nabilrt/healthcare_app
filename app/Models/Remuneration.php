<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneration extends Model
{
    use HasFactory;
    protected $primaryKey="rm_id";
    public $timestamps=false;
    public $incrementing=false;
}
