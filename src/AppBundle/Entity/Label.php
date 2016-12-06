<?php

namespace MuCr\AppBundle\Entity;

use MuCr\AppBundle\DTO\DTOInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
class Label extends AbstractEntity
{
    public function createDTO(): DTOInterface
    {
        throw new \RuntimeException("Not implemented");
    }

    public static function createFromDTO(DTOInterface $dto): EntityInterface
    {
        throw new \RuntimeException("Not implemented");
    }
}
