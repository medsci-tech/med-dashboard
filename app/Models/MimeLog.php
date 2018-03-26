<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeLog
 * @package App\Models
 */
class MimeLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_logs';

    /**
     * @var array
     */
    protected $fillable = ['action', 'phone', 'data'];
}
