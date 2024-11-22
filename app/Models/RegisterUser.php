<?php

namespace App\Models;

use App\Models\DetailVisitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function visitors()
    {
        return $this->hasMany(DetailVisitor::class, 'register_user_id', 'id');
    }
}
