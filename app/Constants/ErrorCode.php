<?php

declare(strict_types = 1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @method static getMessage(int $code)
 */
#[Constants]
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error!")
     */
    public const SERVER_ERROR = 500;

    /**
     * @Message("Unauthorized")
     */
    public const UNAUTHORIZED = 401;

    /**
     * @Message("Params Invalid")
     */
    public const PARAM_INVALID = 100;
}
