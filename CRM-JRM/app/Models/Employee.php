<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
