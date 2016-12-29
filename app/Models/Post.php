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
}
