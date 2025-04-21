<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use SoftDeletes;

    protected $table = 'members';
    protected $primaryKey = 'member_id';
    protected $dates = ['deleted_at', 'allocation_deleted_at'];
    protected $fillable = ['name', 'email', 'role', 'image', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'class_id');
    }
}
