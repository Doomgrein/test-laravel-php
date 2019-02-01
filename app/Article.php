<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['id', 'title', 'text', 'created_at'];

    /**
     * Связь: многие ко многим через таблицу "article_user"
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function relUsers()
    {
        return $this->belongsToMany(
            User::class,
            'article_user',
            'article_id',
            'post_id'
            );
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'article_user')->withTimestamps();
    }
}
