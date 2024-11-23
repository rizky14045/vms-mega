<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\DetailVisitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
}
