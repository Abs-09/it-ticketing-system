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
}
