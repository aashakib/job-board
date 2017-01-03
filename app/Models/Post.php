<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'email', 'created_at'
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

    public function scopeGetPostsByMonthInterval($query, $month)
    {
        return $query->where('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL '.$month.' MONTH)'));
    }

    public function getStatusAttribute($value)
    {
        if ($value == 0) {
            return 'pending';
        } else if ($value == 1) {
            return 'published';
        } else {
            return 'spam';
        }

    }
}
