<?php

namespace MuCr\AppBundle\DTO;

use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
interface DTOInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return DTOInterface
     */
    public static function createFromEntity(EntityInterface $entity): self;

    /**
     * @return bool
     */
    public function isValid(): bool;
}
