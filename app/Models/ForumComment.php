<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'details_id',
        'user_id',
        'comments_details',
    ];

    public function detail()
    {
        return $this->belongsTo(ForumDetail::class, 'details_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
