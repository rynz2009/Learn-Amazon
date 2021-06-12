<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const STATUS_RADIO = [
        'Proses'     => 'Proses Pengerjaan',
        'Pengiriman' => 'Proses Pengiriman',
        'Sukses'     => 'Barang Sampai',
        'Return'     => 'Barang Return',
        'Pending'    => 'Pending',
    ];

    public const PEMBAYARAN_RADIO = [
        'BCA'     => 'Transfer BCA',
        'BRI'     => 'Transfer BRI',
        'MANDIRI' => 'Transfer Mandiri',
        'CASH'    => 'Cash ( On Hand )',
        'COD'     => 'COD ( Cash On Delivery )',
    ];

    public $table = 'transaksis';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_transaksi',
        'tanggal',
        'nama',
        'no_wa',
        'alamat',
        'propinsi',
        'kota',
        'kecamatan',
        'ongkir',
        'no_awb',
        'status',
        'keterangan',
        'pembayaran',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function kodeTransaksiDetailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'kode_transaksi_id', 'id');
    }

    public function kode_cs()
    {
        return $this->belongsToMany(CustomerService::class);
    }

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
