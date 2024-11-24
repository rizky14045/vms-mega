<?php

namespace App\Models;

use App\Models\Tenant;
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
    public function tenant()
    {
        return $this->hasOne(Tenant::class, 'id', 'tenant_id');
    }
    public function checkInBy()
    {
        return $this->hasOne(User::class, 'id', 'check_in_by');
    }
    public function checkOutBy()
    {
        return $this->hasOne(User::class, 'id', 'check_out_by');
    }
}
