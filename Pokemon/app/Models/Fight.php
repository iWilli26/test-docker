<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fight extends Model
{
    public static function addFight(Request $request)
    {
        $content = json_decode($request->getContent());
        Fight::create([
            'winner_id' => $content->winner,
            'loser_id' => $content->loser,
        ]);
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fight';
    public $timestamps = false;
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $fillable = [
        'winner_id',
        'loser_id',
    ];
}