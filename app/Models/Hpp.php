<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hpp extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'hpps';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_hpp',
        'nama',
        'harga',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kodeHppDetailTransaksis()
    {
        return $this->belongsToMany(DetailTransaksi::class);
    }

    public function kodeHppBelanjas()
    {
        return $this->belongsToMany(Belanja::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
