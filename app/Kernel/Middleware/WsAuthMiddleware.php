<?php

declare(strict_types=1);

namespace App\Kernel\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class WsAuthMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$this->isAuth($request)) {
            return $this->container
                ->get(\Hyperf\HttpServer\Contract\ResponseInterface::class)
                ->raw('Unauthorized!');
        }

        return $handler->handle($request);
    }

    protected function isAuth(ServerRequestInterface $request): bool
    {
        $query = $request->getQueryParams();
        // @todo Authorized
        //WsContext::setUser($userId);

        return true;
    }
}