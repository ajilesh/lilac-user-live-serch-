<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Designation extends Model
{
    use HasFactory;
    public $table = 'designation';
    public $guarded = [];
    public function users()
    {
        return $this->hasMany(Users::class);
    }
}
