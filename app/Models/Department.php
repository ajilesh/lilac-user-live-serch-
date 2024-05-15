<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Department extends Model
{
    use HasFactory;
    public $table = 'department';
    public $guarded = [];
    public function users()
    {
        return $this->hasMany(Users::class);
    }
}
