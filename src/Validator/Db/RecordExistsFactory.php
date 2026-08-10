<?php

declare(strict_types=1);

namespace Laminas\ApiTools\ContentValidation\Validator\Db;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Validator\Db\RecordExists;
use Override;
use Psr\Container\ContainerInterface;

class RecordExistsFactory implements FactoryInterface
{
    /**
     * Required for v2 compatibility.
     *
     * @var null|array
     */
    private $options;

    /**
     * Create and return a RecordExists validator instance.
     *
     * @param string $requestedName
     * @param null|array $options
     * @return RecordExists
     */
    #[Override]
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        if (isset($options['adapter'])) {
            return new RecordExists(ArrayUtils::merge(
                $options,
                ['adapter' => $container->get($options['adapter'])]
            ));
        }

        return new RecordExists($options);
    }
}
