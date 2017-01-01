<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'email',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function approved_by()
    {
        return $this->belongsTo('App\Models\User', 'approved_by');
    }

    public function scopeUserPosts($query, $id)
    {
        return $query->where('user_id', 1);
    }

    public function getStatusAttribute($value)
    {
        if ($value == 0){
            return 'pending';
        }else if($value == 1){
            return 'published';
        }else{
            return 'spam';
        }

    }
}
