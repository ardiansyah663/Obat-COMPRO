<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'Berat',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];

    // Mutator untuk menyimpan gambar
    public function setGambarAttribute($value)
    {
        // Log nilai yang diterima
        Log::info('Produk setGambarAttribute fixed:', [
            'value' => $value,
            'type' => gettype($value),
            'is_array' => is_array($value),
        ]);
        
        // Jika nilai adalah array (Filament mengirim array untuk file upload)
        if (is_array($value)) {
            // Jika array tidak kosong, gunakan nilai pertama
            if (!empty($value)) {
                $this->attributes['gambar'] = $value[0] ?? $value;
                Log::info('Produk setGambarAttribute array handling:', [
                    'set_value' => $this->attributes['gambar'],
                ]);
            } else {
                $this->attributes['gambar'] = null;
            }
        } else {
            // Jika bukan array, langsung simpan nilainya
            $this->attributes['gambar'] = $value;
        }
    }

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        $gambar = $this->attributes['gambar'] ?? null;
        
        // Log nilai gambar yang diambil
        Log::info('Produk getGambarUrlAttribute complete log:', [
            'gambar' => $gambar,
            'type' => gettype($gambar),
            'id' => $this->id ?? 'unknown',
            'attributes' => $this->getAttributes(),
        ]);
        
        if (!$gambar) {
            return null;
        }
        
        // Gunakan asset() untuk URL publik yang konsisten
        $url = asset('storage/' . $gambar);
        
        // Cek keberadaan file dengan berbagai path
        $filePath = storage_path('app/public/' . $gambar);
        $publicPath = public_path('storage/' . $gambar);
        
        Log::info('Produk file existence check:', [
            'gambar' => $gambar,
            'storage_path' => $filePath,
            'public_path' => $publicPath,
            'storage_exists' => file_exists($filePath),
            'public_exists' => file_exists($publicPath),
            'final_url' => $url,
        ]);
        
        return $url;
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($produk) {
            Log::info('Saving produk:', [
                'attributes' => $produk->getDirty(),
                'original' => $produk->getOriginal()
            ]);
        });

        static::saved(function ($produk) {
            Log::info('Produk saved:', [
                'id' => $produk->id,
                'attributes' => $produk->getAttributes()
            ]);
        });

        static::deleting(function ($produk) {
            Log::info('Deleting produk with image:', [
                'id' => $produk->id,
                'gambar' => $produk->gambar
            ]);

            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
        });
    }
}