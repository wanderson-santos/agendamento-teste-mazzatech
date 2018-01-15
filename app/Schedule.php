<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    
	public $dates = ['start', 'end'];

    protected $fillable = ['doctor_id', 'patient_id', 'title', 'description', 'start', 'end'];

    /**
     * Relatioship
     */
    public function doctor()
    {
    	return $this->belongsTo('\App\Doctor', 'doctor_id');
    }

    public function patient()
    {
    	return $this->belongsTo('\App\Patient', 'patient_id');
    }
}
