<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeUserProfileLog
 * @package App\Models
 */
class MimeUserProfileLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_user_profile_logs';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'identity'];
}
