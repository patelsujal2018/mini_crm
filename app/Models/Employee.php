<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function company()
    {
        return $this->hasOne('App\Models\Company','id','company_id');
    }
}
