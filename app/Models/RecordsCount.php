<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
/** properties
 * @property int $id
 * @property string $date
 * @property int $count
 */
class RecordsCount extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $table = 'records_counts';
    protected $allowedSorts = [
        'date',
        'count',
    ];
    public static function renew()
    {
        $records = File::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->get();
       DB::table('records_counts')->truncate();
       DB::table('records_counts')->insert($records->toArray());
    }
}
