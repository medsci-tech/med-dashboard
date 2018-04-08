<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeWechatLoginLog
 * @package App\Models
 */
class MimeWechatLoginLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_wechat_login_logs';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'identity', 'openid'];
}
