<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // 标签，多对多 多态关联 
    protected $table = 'tx_tags';

    protected $fillable = [
    	'name',
    	// 'product_id', 产品关联
    	// 'article_id', 文章关联
    	// 'picture_id', 图片关联
    	// 'news_id', 新闻关联
    	// 'video_id', 视频关联
    ];
}
