<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'person_id',
        'barber_id',
        'appointment_date',
        'total'
    ];

    //relacion con la tabla people de uno a uno
    public function client()
    {
        return $this->belongsTo(People::class, 'person_id');
    }

    //relacion con la tabla people de uno a uno
    public function barber()
    {
        return $this->belongsTo(People::class, 'barber_id');
    }

    //relacion con la tabla services de muchos a muchos
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
