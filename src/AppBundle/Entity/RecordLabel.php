<?php

namespace MuCr\AppBundle\Entity;

use MuCr\AppBundle\DTO\DTOInterface;
use MuCr\AppBundle\DTO\RecordLabel as DTORecordLabel;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="Label")
 */
class RecordLabel extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable="false")
     */
    private $name;

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
    public function setName(string $name): RecordLabel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return DTOInterface|DTORecordLabel
     */
    public function createDTO(): DTOInterface
    {
        return DTORecordLabel::createFromEntity($this);
    }

    /**
     * @param DTORecordLabel|DTOInterface $dto
     *
     * @return Artist|EntityInterface
     */
    public static function createFromDTO(DTOInterface $dto): EntityInterface
    {
        return static::create()
            ->setName($dto->getName())
        ;
    }
}
