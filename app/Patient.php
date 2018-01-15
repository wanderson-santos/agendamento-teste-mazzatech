<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
	use SoftDeletes;
	
    protected $fillable = ["name", "email", "observation", "rg", "phone", "cellphone", "civil_status", "sex", "birth", "street", "number", "district", "state", "cep"];

    /**
     * Relatioship
     */
    public function schedules()
    {
        return $this->hasMany('\App\Schedule', 'patient_id')
        			->where('start', '>', date('Y-m-d H:i'))
                    ->orderBy('start', 'asc');
    }

    public function schedulesPrev()
    {
        return $this->hasMany('\App\Schedule', 'patient_id')
                    ->where('start', '<', date('Y-m-d H:i'))
                    ->orderBy('start', 'desc');

    }

    public function schedulesCancel()
    {
        return $this->hasMany('\App\Schedule', 'patient_id')
                    ->onlyTrashed();   
    }

}