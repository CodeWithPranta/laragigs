<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'logo',
        'company',
        'location',
        'website',
        'email',
        'tags',
        'description'
    ];

    public function scopeFilter($query, array $filters){
        //http://localhost:8000/?tag=laravel
        //dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%')
                  ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to user
    public function user(){
        // We can specify or not specify user_id if we use
        // different name then we must specify
        return $this->belongsTo(User::class, 'user_id');
    }
}

