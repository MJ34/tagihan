<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class BankSekolah extends Model
{
    use HasFactory;

    use SearchableTrait;

    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama_bank' => '10',
            'nama_rekening' => '10'
        ],
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($bank) {
            $bank->user_id = auth()->user()->id;
        });

        static::updating(function ($bank) {
            $bank->user_id = auth()->user()->id;
        });
    }
}
