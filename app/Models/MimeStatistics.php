<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeRegisterLog
 * @package App\Models
 */
class MimeStatistics extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_statistics';

    /**
     * @var array
     */
    protected $fillable = ['member_count', 'profile_count'];
}
