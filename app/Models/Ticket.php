<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category() : HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function createdby() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function assignedto() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }

    // 'priority', 'status', 'created_by', 'assigned_to'
    public function scopeFilter($query, array $filters)
    {
        if($filters['priority'] ?? false){
            $query->where('priority', $filters['priority']);
        }

        if($filters['status'] ?? false) {
            $query->where('status', $filters['status']);
        }

        if ($filters['created_by'] ?? false) {
            $query->whereHas('createdby', function($qry) use($filters) {
                $qry->where('name', 'like', '%' . $filters['created_by'] . '%');
            });
        }
        
        if ($filters['assigned_to'] ?? false) {
            $query->whereHas('assignedto', function($qry) use($filters) {
                $qry->where('name', 'like', '%' . $filters['assigned_to'] . '%');
            });
        }

   
    }
}
