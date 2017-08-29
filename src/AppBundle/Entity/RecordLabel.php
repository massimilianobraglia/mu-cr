<?php declare(strict_types=1);

namespace MuCr\AppBundle\Entity;

use AppBundle\Exception\Dto\MalformedDtoException;
use MuCr\AppBundle\Dto\DtoInterface;
use MuCr\AppBundle\Dto\RecordLabel as DtoRecordLabel;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): RecordLabel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return DtoInterface|DtoRecordLabel
     */
    public function createDto(): DtoInterface
    {
        return DtoRecordLabel::createFromEntity($this);
    }

    /**
     * @param DtoRecordLabel|DtoInterface $dto
     *
     * @return EntityInterface
     *
     * @throws MalformedDtoException
     */
    public static function createFromDto(DtoInterface $dto): EntityInterface
    {
        if (! $dto->isValid()) {
            throw new MalformedDtoException('Missing name');
        }

        return static::create($dto->name);
    }
}
