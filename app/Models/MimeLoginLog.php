<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeLoginLog
 * @package App\Models
 */
class MimeLoginLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_login_logs';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'identity'];
}
