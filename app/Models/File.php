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
    protected $allowedFilters = [
        'url',
    ];
}
