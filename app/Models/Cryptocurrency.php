<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;
    protected $table = 'cryptocurrency';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        "name",
        'symbol',
        'cmc_rank',
        'market_cap',
        'price',
        'volume_24h',
        'percent_change_24h'
    ];
}
