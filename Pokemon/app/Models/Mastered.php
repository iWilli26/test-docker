<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Mastered extends Model
{
    public static function addEnergy(Request $request)
    {
        $content = json_decode($request->getContent());
        //if it already exists, dont add it
        $count = DB::table('mastered')->where('energy_id', $content->energyId)->count();
        if ($count == 0) {
            DB::table('mastered')->insert([
                'user_id' => $content->userId,
                'energy_id' => $content->energyId,
            ]);
        }
    }

    public static function getEnergyByName($name)
    {
        //use models to get the energy with the name
        /** 
         * @param  \Illuminate\Http\Request  $request
         * @param  string  $name
         * @return \Illuminate\Http\Response*/
        return (DB::table('energy')->where('name', $name)->first());
    }

    public static function checkEnergy($userId, $energyId)
    {
        $count = DB::table('mastered')->where('user_id', '=', $userId)->where('energy_id', '=', $energyId)->count();
        if ($count == 0) {
            return false;
        }
        return true;
    }

    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mastered';
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
}