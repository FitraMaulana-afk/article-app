<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use App\Enums\PublishStatusEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'id',
        'user_id',
        'post_category_id',
        'title',
        'description',
        'image',
        'link',
        'slug',
        'status',
        'post_status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function getIsPublishAttribute(): bool
    {
        return (int) $this->status === PublishStatusEnum::status['PUBLISH'];
    }

    public function getIsDraftAttribute(): bool
    {
        return (int) $this->status === PublishStatusEnum::status['DRAFT'];
    }
    public function getIsPendingAttribute(): bool
    {
        return (int) $this->status === PublishStatusEnum::status['PENDING'];
    }

    public function getIsMainAttribute(): bool
    {
        return (int) $this->status === PostStatusEnum::post_status['MAIN'];
    }

    public function getIsNormalAttribute(): bool
    {
        return (int) $this->status === PostStatusEnum::post_status['NORMAL'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class,        'post_category_id',);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id',);
    }
}
