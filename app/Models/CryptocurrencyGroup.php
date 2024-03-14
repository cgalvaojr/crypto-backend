<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptocurrencyGroup extends Model
{
    use HasFactory;
    protected $table = 'cryptocurrency_group';
    protected $primaryKey = ['group_id'];
    public $timestamps = false;
    protected $fillable = [
        "group_id",
        "cryptocurrency_id",
    ];
}
