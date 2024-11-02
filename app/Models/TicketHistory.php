<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketHistory extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function changedby(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        if ($filters['ticket_id'] ?? false) {
            $query->where('ticket_id', request('ticket_id'));
        }

        if ($filters['date'] ?? false) {
            $query->where('changed_date',  'like', '%' . request('date') . '%');
        }

        if ($filters['changed_by'] ?? false) {
            $query->whereHas('changedby', function($qry) use($filters) {
                $qry->where('name', 'like', '%' . $filters['changed_by'] . '%');
            });
        }
    }
}
