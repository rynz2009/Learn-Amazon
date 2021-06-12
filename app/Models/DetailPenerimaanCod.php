<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenerimaanCod extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'detail_penerimaan_cods';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'awb',
        'nilai_awb',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kode_pcods()
    {
        return $this->belongsToMany(PenerimaanCod::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
