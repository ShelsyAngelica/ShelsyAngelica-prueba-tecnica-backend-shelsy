<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone_number',
        'percentage',
        'position_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
