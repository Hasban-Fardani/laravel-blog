<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }

    public function scopeSearch($query, $request)
    {
        // search by query
        $query->when($request->has('q'), function ($query) use ($request) {
            $searchTerm = $request->q;

            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('body', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        });

        // search by category
        $query->when($request->has('category'), function ($query) use ($request) {
            $categoryName = $request->category;
            $category = Category::where('name', $categoryName)->first();
            $query->where('category_id', $category->id);
        });

        // search by user
        $query->when($request->has('user'), function ($query) use ($request) {
            $userId = $request->user;
            $query->where('user_id', $userId);
        });

        return $query;
    }
}
