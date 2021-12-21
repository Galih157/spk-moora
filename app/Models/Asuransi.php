<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    protected $table = 'asuransi';

    protected $guarded = [];

    public function keuntungan()
    {
        return $this->hasMany(KeuntunganAsuransi::class, 'id_asuransi');
    }
}
