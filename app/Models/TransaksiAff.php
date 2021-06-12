<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiAff extends Model
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

    public $table = 'transaksi_affs';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_transaksi',
        'kode_produk_id',
        'tanggal',
        'nama',
        'alamat',
        'kota',
        'propinsi',
        'no_wa',
        'jumlah',
        'total_harga',
        'ongkir',
        'grand_total',
        'no_awb',
        'status',
        'pembayaran',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function kode_produk()
    {
        return $this->belongsTo(ListProduct::class, 'kode_produk_id');
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
