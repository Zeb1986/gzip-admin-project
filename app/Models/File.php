<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/** properties
 * @property int $id
 * @property int $chunks
 * @property int $size
 * @property int $duration
 * @property string $url
 * @property string $country_code
 * @property string $ip
 * @property boolean $success
 * @property timestamp $created_at
 * @property string $date
 * @property int $count
 */

class File extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $table = 'file';
    protected $allowedSorts = [
        'id',
        'chunks',
        'size',
        'duration',
        'url',
        'country_code',
        'ip',
        'success',
        'created_at',
    ];

//    public function getDateAttribute()
//    {
//        return $this->created_at->format('Y-m-d');
//    }
//
//    public function getCountAttribute()
//    {
//        return self::whereDate('created_at', $this->created_at)->count();
//    }

    public function getRecordCount()
    {
        return $this
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->get();
    }

}
