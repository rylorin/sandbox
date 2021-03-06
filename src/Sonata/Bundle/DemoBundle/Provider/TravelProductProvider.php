<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Bundle\DemoBundle\Provider;

use JMS\Serializer\SerializerInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Bundle\DemoBundle\Controller\TravelController;
use Sonata\ProductBundle\Model\BaseProductProvider;

/**
 * This file has been generated by the EasyExtends bundle ( https://sonata-project.org/easy-extends ).
 *
 * References :
 *   custom repository : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en#querying:custom-repositories
 *   query builder     : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/query-builder/en
 *   dql               : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/dql-doctrine-query-language/en
 *
 * @author <yourname> <youremail>
 */
class TravelProductProvider extends BaseProductProvider
{
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->setOptions([
            'product_add_modal' => true,
        ]);
    }

    public function getBaseControllerName(): string
    {
        return TravelController::class;
    }

    public function buildEditForm(FormMapper $formMapper, $isVariation = false): void
    {
        parent::buildEditForm($formMapper, $isVariation);

        $formMapper
            ->with('Product')
                ->add('travelDate');

        if ($isVariation) {
            $formMapper
                ->add('travelDays')
                ->add('travellers');
        }

        $formMapper->end();
    }

    public function getTemplatesPath(): string
    {
        return '@SonataDemo\Travel';
    }
}
