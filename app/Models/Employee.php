<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['first_name', 'last_name', 'company_id', 'email', 'phone_number'])]

class Employee extends Model
{
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
