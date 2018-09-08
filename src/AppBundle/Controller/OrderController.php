<?php
/**
 * Created by PhpStorm.
 * User: j.briere
 * Date: 07/08/2018
 * Time: 18:45
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderController
{
    /**
     * @Route("/commande/recapUpdate", name="recapUpdate")
     */
    public function orderRecapAction(Request $request)
    {
        var_dump($request->request);

        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(array('type' => 'lieu'));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        $pricings = array();
        foreach($products as $product)
        {
            $pricing = $this->getDoctrine()
                ->getRepository(Pricing::class)
                ->findBy(array('product' => $product->getCode()));

            if (!$pricing) {
                $pricing = new Pricing();
            }

//            var_dump($product->getCode());
//            var_dump($pricing);
            $pricings[$product->getCode()][] = $pricing;
        }

        var_dump($pricings);

        die;
    }
}