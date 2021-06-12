<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Belanja extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_BELANJA_RADIO = [
        'Profit' => 'Belanja Profit',
        'Modal'  => 'Belanja Modal',
    ];

    public const SUMBER_BAYAR_RADIO = [
        'BCA'     => 'BCA',
        'MANDIRI' => 'MANDIRI',
        'BRI'     => 'BRI',
        'CASH'    => 'CASH',
    ];

    public $table = 'belanjas';

    public static $searchable = [
        'tanggal',
        'nama_barang',
        'sumber_bayar',
    ];

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal',
        'nama_barang',
        'jumlah_barang',
        'harga',
        'keterangan',
        'sumber_bayar',
        'type_belanja',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function kode_hpps()
    {
        return $this->belongsToMany(Hpp::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
