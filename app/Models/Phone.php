<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'phone'
    ];

    /**
     * Get the contact that owns the phone.
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
