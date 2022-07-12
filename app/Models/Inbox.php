<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;
    protected $primaryKey="inbox_id";
    public $timestamps=false;
    public $incrementing=false;
}
