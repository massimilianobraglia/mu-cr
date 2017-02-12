<?php

namespace MuCr\AppBundle\EventListener;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use MuCr\AppBundle\Entity\EntityInterface;

/**
 * @author Massimiliano Braglia <massimiliano.braglia@fazland.com>
 */
class UpdateTimestampEventListener
{
    /**
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $object = $args->getObject();

        if (! $object instanceof EntityInterface) {
            return;
        }

        $object->updateTimestamp();
    }
}
