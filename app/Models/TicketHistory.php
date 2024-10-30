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
        if ($filters['ticket_id'] ?? false) {
            $query->where('ticket_id', request('ticket_id'));
        }
    }
}
