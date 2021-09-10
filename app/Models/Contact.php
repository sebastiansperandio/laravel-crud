<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
    ];

    /**
     * Get the phones for the contact.
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
    
}
