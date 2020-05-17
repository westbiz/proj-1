<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 评论，一对多 多态关联 
    protected $table = 'tx_comments';

    protected $fillable = [
    	'content',
    	'user_id',
    	// 'product_id', 产品关联
    	// 'article_id', 文章关联
    	// 'picture_id', 图片关联
    	// 'news_id', 新闻关联
    	// 'video_id', 视频关联
    ];

    // 定义一对多多态关联
    public function commentable()
	{
	    return $this->morphTo();
	}
}
