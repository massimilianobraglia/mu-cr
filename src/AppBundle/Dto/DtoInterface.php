<?php declare(strict_types=1);

namespace MuCr\AppBundle\Dto;

use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
interface DtoInterface
{
    public static function createFromEntity(EntityInterface $entity): self;

    public function isValid(): bool;
}
