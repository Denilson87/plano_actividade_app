<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{

    use HasFactory, Sortable;
    protected $table = 'activity';

    protected $fillable = [
        'activity',
        'location',
        'date',
        'employee',
        'resourse',
        'status',
        'obs',
    ];

    public $sortable = [
        'activity',
        'date',
    ];

    protected $guarded = [
        'id',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('activity', 'like', '%' . $search . '%');
        });
    }
}
