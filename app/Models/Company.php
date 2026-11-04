<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['name', 'email', 'logo', 'website'])]

class Company extends Model
{
    use HasFactory;

    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
