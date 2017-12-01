<?php
/**
 * Created by PhpStorm.
 * User: Nid
 * Date: 1/11/2017
 * Time: 11:25 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/admin/edit-product/{productId}", name="edit_product")
     */
    public function editController(Request $request, $productId)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $product = $repository->findOneBy(array('id' => $productId));

        $form = $this->createFormBuilder($product)
            ->add('code', TextType::class)
            ->add('title', TextType::class)
            ->add('subtitle', TextType::class)
            ->add('origins', TextareaType::class)
            ->add('influences', TextareaType::class)
            ->add('description', TextareaType::class)
            ->add('features', TextareaType::class)
            ->add('materials', TextareaType::class)
            ->add('decorations', TextareaType::class)
            ->add('plants', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Valider'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('listProducts');
        }

        return $this->render('admin/forms/edit-product.html.twig', array(
            'form' => $form->createView(),
            'product' => $product
        ));
    }

    /**
     * @Route("/admin/listProducts", name="listProducts")
     */
    public function listProductsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();

        return $this->render('admin/list-products.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $products,
        ]);
    }
}