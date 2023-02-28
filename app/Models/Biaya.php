<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Biaya extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama' => '10'
        ],
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
