<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoDBModel;


/**
 * Class MimeRegisterLog
 * @package App\Models
 */
class MimeRegisterLog extends MongoDBModel
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'mime_register_logs';

    /**
     * @var array
     */
    protected $fillable = ['phone', 'identity'];
}
