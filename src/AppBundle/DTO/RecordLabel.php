<?php

namespace MuCr\AppBundle\DTO;

use Doctrine\ORM\Mapping as ORM;
use MuCr\AppBundle\Entity\EntityInterface;
use MuCr\AppBundle\Entity\RecordLabel as EntityRecordLabel;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class RecordLabel extends AbstractDTO
{
    /**
     * @var string
     */
    private $name;

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
     * @return RecordLabel
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param EntityRecordLabel|EntityInterface $entity
     *
     * @return DTOInterface
     */
    public static function createFromEntity(EntityInterface $entity): DTOInterface
    {
        return static::create()
            ->setName($entity->getName())
        ;
    }
}
