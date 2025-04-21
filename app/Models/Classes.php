<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;

    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    protected $dates = ['deleted_at'];
    protected $fillable = ['class_name', 'class_time', 'video_id'];

    public function members()
    {
        return $this->hasMany(Members::class, 'class_id', 'class_id');
    }
}
