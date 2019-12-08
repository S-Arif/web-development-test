<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'website', 'logo'];

    public function employee() : HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/images/' . $value): asset('images/logo_placeholder.jpg');
    }
}
