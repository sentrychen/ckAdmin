<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\components;


class RestException extends RestHttpException
{
    public function __construct($message, $code = 400)
    {
        parent::__construct($code, $message, $code);
    }
}
