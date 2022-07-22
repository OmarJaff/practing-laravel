<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) => $query
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')->orWhere('excerpt', 'like', '%' . $search . '%'));


        $query->when($filters['category'] ?? false, fn($query, $category) => $query
               ->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );

        $query->when($filters['author']?? false, fn($query, $auther) => $query
            ->whereHas('author', fn($query) => $query->where('slug', $auther)));

        //this is another option less cleaner

//        if($filters['search'] ?? false) {
//           $query->where('name', 'like', '%' .request('search'). '%')
//                  ->orWhere('body', 'like', '%' .request('search'). '%')
//                    ->orWhere('excerpt', 'like', '%' .request('search'). '%');
//        }

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category() {
      return  $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
