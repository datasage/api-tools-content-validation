<?php

declare(strict_types=1);

namespace LaminasTest\ApiTools\ContentValidation\TestAsset;

use Laminas\InputFilter\InputFilter;
use Override;

class CustomValidationInputFilter extends InputFilter
{
    /**
     * @param mixed $context
     * @return bool
     */
    #[Override]
    public function isValid($context = null)
    {
        return true;
    }
}
