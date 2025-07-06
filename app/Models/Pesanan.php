<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'nama_pembeli',
        'email_pembeli',
        'alamat',
        'no_hp',
        'jumlah',
        'total_harga',
        'status',
        'reference',
        'merchant_ref',
        'payment_method',
        'checkout_url',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'total_harga' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Status pesanan yang tersedia
     */
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_EXPIRED = 'expired';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    /**
     * Mendapatkan daftar status yang tersedia
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'Menunggu Pembayaran',
            self::STATUS_PAID => 'Sudah Dibayar',
            self::STATUS_EXPIRED => 'Kedaluwarsa',
            self::STATUS_FAILED => 'Gagal',
            self::STATUS_CANCELED => 'Dibatalkan',
        ];
    }

    /**
     * Mendapatkan produk terkait pesanan
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    /**
     * Mendapatkan status pesanan yang diformat
     */
    public function getStatusLabelAttribute()
    {
        return self::getStatuses()[$this->status] ?? $this->status;
    }

    /**
     * Mendapatkan total harga yang diformat dengan mata uang
     */
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }
}
