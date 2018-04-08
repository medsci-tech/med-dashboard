<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeWechatRegisterLog
 * @package App\Models
 */
class MimeWechatRegisterLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_wechat_register_logs';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'identity', 'openid'];
}
