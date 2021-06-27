<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * Get the user who owns the article.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
