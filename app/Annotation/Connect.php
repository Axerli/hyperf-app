<?php

declare(strict_types = 1);

namespace App\Annotation;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;

#[Attribute(Attribute::TARGET_METHOD)]
class Connect extends AbstractAnnotation
{
    public string $connection = '';

    public function __construct(string $name)
    {
        $this->connection = $name;
        parent::__construct($name);
    }
}