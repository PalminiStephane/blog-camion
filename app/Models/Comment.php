<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $with =  ('user');

    protected $fillable = ['comment', 'user_id', 'post_id'];
    //protected $guarded = ['id', 'created_at', 'updated_at']; inverse de fillable

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}