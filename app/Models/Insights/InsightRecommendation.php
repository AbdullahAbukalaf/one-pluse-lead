<?php

namespace App\Models\Insights;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Insights\InsightType;

class InsightRecommendation extends Model
{
    protected $table = 'insight_recommendations';

    protected $fillable = [
        'outline_title_en',
        'outline_title_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'name',
        'email',
        'country',
        'bought_before',
        'insight_type_id',
        'category_id',
        'recommendations',
        'is_active',
    ];

    protected $casts = [
        'bought_before' => 'boolean',
        'insight_type_id' => 'integer',
        'category_id' => 'integer',
        'is_active' => 'boolean',
    ];
        public function insightType()
    {
        return $this->belongsTo(InsightType::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
