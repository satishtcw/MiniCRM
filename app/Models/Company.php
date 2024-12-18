<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Company extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'name',
        'email',
        'website',
        'logo',
    ];
	
	/**
     * Define the relationship between Company and Employee.
     */
	public function employees()
	{
		return $this->hasMany(Employee::class);
	}
	
}
