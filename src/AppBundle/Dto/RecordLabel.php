<?php declare(strict_types=1);

namespace MuCr\AppBundle\Dto;

use MuCr\AppBundle\Entity\EntityInterface;
use MuCr\AppBundle\Entity\RecordLabel as EntityRecordLabel;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class RecordLabel extends AbstractDto
{
    /**
     * @var ?string
     */
    public $name;

    public static function create(): self
    {
        return new static;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        if ("" === trim($this->name)) {
            return false;
        }

        return true;
    }

    /**
     * @param EntityRecordLabel|EntityInterface $entity
     *
     * @return DtoInterface
     */
    public static function createFromEntity(EntityInterface $entity): DtoInterface
    {
        $dto = static::create();
        $dto->name = $entity->getName();

        return $dto;
    }
}
