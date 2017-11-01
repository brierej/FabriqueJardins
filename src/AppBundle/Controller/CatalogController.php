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
     * @return Response
     * @Route("/admin/initProducts", name="initProducts")
     */
    public function initProductsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ambiances['jardin-d-ombre'] = array(
            'code' => 'jardin-d-ombre',
            'title' => 'Jardin d\'ombre',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-hispano-mauresque'] = array(
            'code' => 'jardin-hispano-mauresque',
            'title' => 'Jardin hispano-mauresque',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-mediterraneen'] = array(
            'code' => 'jardin-mediterraneen',
            'title' => 'Jardin méditérranéen',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-oriental-zen'] = array(
            'code' => 'jardin-oriental-zen',
            'title' => 'Jardin oriental-zen',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-exotique'] = array(
            'code' => 'jardin-exotique',
            'title' => 'Jardin exotique',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-medieval'] = array(
            'code' => 'jardin-medieval',
            'title' => 'Jardin médiéval',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-anglais-mixed-border'] = array(
            'code' => 'jardin-anglais-mixed-border',
            'title' => 'Jardin anglais mixed-border',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-contemporain-moderne'] = array(
            'code' => 'jardin-contemporain-moderne',
            'title' => 'Jardin contemporain moderne',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );
        $ambiances['jardin-a-la-francaise'] = array(
            'code' => 'jardin-a-la-francaise',
            'title' => 'Jardin à la française',
            'subtitle' => 'Duis mollis, est non commodo luctus. Donec sed odio dui',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.',
            'image' => '5.jpg',
            'plants' => array(
                'Integer vitae libero ac risus egestas placerat.',
                'Vestibulum commodo felis quis tortor.',
                'Ut aliquam sollicitudin leo.',
                'Cras iaculis ultricies nulla.'
            ),
            'plants_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur facilis cumque amet suscipit odio.',
            'carac' => array(
                'Vestibulum auctor dapibus neque.',
                'Nunc dignissim risus id metus.',
                'Cras ornare tristique elit.'
            ),
            'gallery' => array(
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'
            )
        );

        foreach($ambiances as $ambiance) {
            $this->createAmbianceAction($ambiance);
        }

        return new Response('Product init done');
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