<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getNameAttribute($value)
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
