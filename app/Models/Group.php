<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;
    protected $table = 'group';
    public $timestamps = false;
    protected $fillable = [
        "name",
    ];

    public function cryptos(): BelongsToMany
    {
        return $this->belongsToMany(Cryptocurrency::class, 'cryptocurrency_group', 'group_id', 'cryptocurrency_id' );
    }
}
