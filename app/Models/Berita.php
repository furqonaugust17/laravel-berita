<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Berita extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['judul', 'author', 'berita', 'gambar', 'slug'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $slug = Str::slug($model->judul);
            $count = 1;

            while (static::withTrashed()->where('slug', $slug)->exists()) {
                $slug = Str::slug($model->judul) . '-' . $count++;
            }

            $model->slug = $slug;
        });
    }
}
