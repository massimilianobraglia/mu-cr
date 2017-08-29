<?php declare(strict_types=1);

namespace MuCr\AppBundle\Dto;

use MuCr\AppBundle\Entity\Artist as EntityArtist;
use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class Artist extends AbstractDto
{
    /**
     * @var ?string
     */
    public $name;

    /**
     * @var ?string
     */
    public $country;

    /**
     * @var ?int
     */
    public $creationYear;

    /**
     * @var ?RecordLabel
     */
    public $recordLabel;

    public static function create(): self
    {
        return new static();
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
     * @param EntityArtist|EntityInterface $entity
     *
     * @return DtoInterface|self
     */
    public static function createFromEntity(EntityInterface $entity): DtoInterface
    {
        if (! $entity instanceof EntityArtist) {
            throw new \InvalidArgumentException('Expected ' . EntityArtist::class . ', got ' . get_class($entity));
        }

        /** @var self $dto */
        $dto = static::create();
        $dto->name = $entity->getName();
        $dto->country = $entity->getCountry();
        $dto->creationYear = $entity->getCreationYear();

        $recordLabel = $entity->getRecordLabel();
        if (null !== $recordLabel) {
            $dto->recordLabel = $recordLabel;
        }

        return $dto;
    }
}
