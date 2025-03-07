<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'province',
        'city',
        'last_name',
        'first_name',
        'middle_name',
        'sex',
        'age',
        'marital_status',
        'course',
        'position_applied',
    ];
}
