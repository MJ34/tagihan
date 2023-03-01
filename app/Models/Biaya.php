<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Biaya extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    use SearchableTrait;
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama' => '10'
        ],
    ];
    protected $append = ['nama_biaya_full'];

    protected function namaBiayaFull() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->nama . ' - ' . $this->formatRupiah('jumlah'),
        );
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($biaya) {
            $biaya->user_id = auth()->user()->id;
        });

        static::updating(function ($biaya) {
            $biaya->user_id = auth()->user()->id;
        });
    }
}
