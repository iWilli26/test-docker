<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pc';
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'entity_id';
    /**
     * The user who mastered this energy.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'pokemon_id', 'pokemon_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level',
        'is_active',
    ];
}