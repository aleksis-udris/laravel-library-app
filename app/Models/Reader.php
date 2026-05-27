<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reader extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    protected $fillable = ['name', 'email'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
