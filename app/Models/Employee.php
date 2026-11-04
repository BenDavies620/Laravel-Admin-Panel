<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['first_name', 'last_name', 'company_id', 'email', 'phone_number'])]

class Employee extends Model
{
    use HasFactory;
    
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
