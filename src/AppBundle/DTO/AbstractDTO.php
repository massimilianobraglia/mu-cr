<?php

namespace MuCr\AppBundle\DTO;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@gmail.com>
 */
abstract class AbstractDTO implements DTOInterface
{
    /**
     * @return DTOInterface
     */
    public static function create(): DTOInterface
    {
        return new static();
    }
}
