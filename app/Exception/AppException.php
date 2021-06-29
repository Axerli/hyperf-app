<?php

declare(strict_types = 1);

namespace App\Exception;

use App\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class AppException extends ServerException
{
    /**
     * AppException constructor.
     * @param int            $code
     * @param string|null    $message
     * @param Throwable|null $previous
     */
    public function __construct(int $code = 0, ?string $message = null, Throwable $previous = null)
    {
        if ($message === null) {
            $message = ErrorCode::getMessage($code);
        }

        parent::__construct($message, $code, $previous);
    }
}