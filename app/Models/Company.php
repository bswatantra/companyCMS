<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'website', 'logo'];


    public function employees()
    {
        return $this->hasMany(Employee::class);
    }


    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => @$value ? asset('storage/' . $value) : ''
        );
    }
}
