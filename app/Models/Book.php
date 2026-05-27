<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    protected $fillable = ['title', 'ISBN', 'available_copies'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
