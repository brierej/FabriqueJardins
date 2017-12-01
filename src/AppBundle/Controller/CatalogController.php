<?php
/**
 * Created by PhpStorm.
 * User: Nid
 * Date: 8/10/2017
 * Time: 9:55 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    /**
     * @Route("/catalogue/{catalogueType}", name="catalogue_type")
     */
    public function catalogueAction(Request $request, $catalogueType)
    {
        return $this->render('catalog/portfolio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'type' => $catalogueType,
        ]);
    }

    /**
     * @Route("/ambiances/{ambiance}", name="ambiances")
     */
    public function ambianceAction(Request $request, $ambiance)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneBy(array('code' => $ambiance));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // replace this example code with whatever you need
//        if (isset($ambiances[$ambiance]) && !empty($ambiances[$ambiance]))
//            $datas = $ambiances[$ambiance];
//        else
//            return $this->render('catalog/catalogue-ambiances.html.twig');
        return $this->render('catalog/catalogue-ambiances.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'datas' => $products,
        ]);
    }

    public function createAmbianceAction(array $data)
    {
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setCode($data['code']);
        $product->setDescription($data['description']);
        $product->setSubtitle($data['subtitle']);
        $product->setTitle($data['title']);

        $em->persist($product);

        $em->flush();

        return new Response('Product saved with id '.$product->getId());
    }

    /**
     * @Route("/lieux/{place}", name="lieux")
     */
    public function placeAction(Request $request, $place)
    {
        // replace this example code with whatever you need
        return $this->render('catalog/lieux/'.$place.'.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/philosophie/{philosophy}", name="philosophie")
     */
    public function philosophyAction(Request $request, $philosophy)
    {
        // replace this example code with whatever you need
        return $this->render('catalog/philosophie/'.$philosophy.'.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}