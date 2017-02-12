<?php

namespace MuCr\AppBundle\DTO;

use MuCr\AppBundle\Entity\Artist as EntityArtist;
use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class Artist extends AbstractDTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * @var int
     */
    private $creationYear;

    /**
     * @var RecordLabel
     */
    private $recordLabel;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Artist
     */
    public function setName(string $name): Artist
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     *
     * @return Artist
     */
    public function setCountry(?string $country): Artist
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreationYear(): ?int
    {
        return $this->creationYear;
    }

    /**
     * @param int|null $creationYear
     *
     * @return Artist
     */
    public function setCreationYear(?int $creationYear): Artist
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * @return RecordLabel|null
     */
    public function getRecordLabel(): ?RecordLabel
    {
        return $this->recordLabel;
    }

    /**
     * @param RecordLabel|null $recordLabel
     *
     * @return Artist
     */
    public function setRecordLabel(?RecordLabel $recordLabel = null): Artist
    {
        $this->recordLabel = $recordLabel;

        return $this;
    }

    /**
     * @param EntityArtist|EntityInterface $entity
     *
     * @return DTOInterface
     */
    public static function createFromEntity(EntityInterface $entity): DTOInterface
    {
        /** @var Artist|EntityInterface $dto */
        $dto = static::create()
            ->setName($entity->getName())
            ->setCountry($entity->getCountry())
            ->setCreationYear($entity->getCreationYear())
        ;

        if (null !== ($recordLabel = $entity->getRecordLabel())) {
            $dto->setRecordLabel($recordLabel);
        }

        return $dto;
    }
}
