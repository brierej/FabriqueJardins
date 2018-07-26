<?php
/**
 * Created by PhpStorm.
 * User: Nid
 * Date: 8/10/2017
 * Time: 9:55 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Pricing;
use AppBundle\Entity\Product;
use AppBundle\Entity\Realisation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisationsAction(Request $request)
    {
        $realisations = $this->getDoctrine()
            ->getRepository(Realisation::class)
            ->findBy(array('type' => 'realisations'));

        if (!$realisations) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        $files = array();
        foreach($realisations as $realisation) {

            $path = getcwd().'/media/'.$realisation->getType().'/'.$realisation->getCode();
            $tmp_files = scandir($path);
            foreach($tmp_files as $tmp_file) {
                if (is_file($path.'/'.$tmp_file) && !preg_match('#slider-#', $tmp_file) )
                    $files[$realisation->getCode()][] = $tmp_file;
            }
        }

        $filesVrac = array();
        $path = getcwd().'/media/'.$realisation->getType();
        $tmp_files = scandir($path);
        foreach($tmp_files as $tmp_file) {
            if (is_file($path.'/'.$tmp_file))
                $filesVrac[] = $tmp_file;
        }

        return $this->render('catalog/realisations.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'realisations' => $realisations,
            'files' => $files,
            'filesVrac' => $filesVrac
        ]);
    }

    /**
     * @Route("/realisations/{realisation}", name="realisation")
     */
    public function realisationAction(Request $request, $realisation)
    {
        $realisationProject = $this->getDoctrine()
            ->getRepository(Realisation::class)
            ->findOneBy(array('code' => $realisation));

        if (!$realisationProject) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        $files = array();
        $path = getcwd().'/media/realisations/'.$realisation;
        $tmp_files = scandir($path);
        foreach($tmp_files as $tmp_file) {
            if (is_file($path.'/'.$tmp_file)  && !preg_match('#slider-#', $tmp_file))
                $files[] = $tmp_file;
        }

        return $this->render('catalog/realisation.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'datas' => $realisationProject,
            'files' => $files
        ]);
    }

    /**
     * @Route("/conception-jardin/lieux", name="lieux")
     */
    public function lieuxAction(Request $request)
    {
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

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        foreach($products as $product) {

            $path = getcwd().'/media/'.$product->getType().'/'.$product->getCode();
    //            var_dump($path); die;
            $tmp_files = scandir($path);
            foreach($tmp_files as $tmp_file) {
                if (is_file($path.'/'.$tmp_file))
                    $files[$product->getCode()][] = $tmp_file;
            }
        }


        return $this->render('catalog/portfolio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $products,
            'pricings' => $pricings,
            'files' => $files,
            'context' => 'lieux'
        ]);
    }

     /**
     * @Route("/conception-jardin/philosophies", name="philosophies")
     */
    public function philosophiesAction(Request $request)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(array('type' => 'philosophie'));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        foreach($products as $product) {

            $path = getcwd().'/media/'.$product->getType().'/'.$product->getCode();
    //            var_dump($path); die;
            $tmp_files = scandir($path);
            foreach($tmp_files as $tmp_file) {
                if (is_file($path.'/'.$tmp_file))
                    $files[$product->getCode()][] = $tmp_file;
            }
        }

        return $this->render('catalog/portfolio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $products,
            'files' => $files,
            'context' => 'philosophies'
        ]);
    }

    /**
     * @Route("/conception-jardin/ambiances", name="ambiances")
     */
    public function ambiancesAction(Request $request)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(array('type' => 'ambiance'));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        foreach($products as $product) {

            $path = getcwd().'/media/'.$product->getType().'/'.$product->getCode();
    //            var_dump($path); die;
            $tmp_files = scandir($path);
            foreach($tmp_files as $tmp_file) {
                if (is_file($path.'/'.$tmp_file))
                    $files[$product->getCode()][] = $tmp_file;
            }
        }

//        var_dump($files); die;

        return $this->render('catalog/portfolio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $products,
            'files' => $files,
            'context' => 'ambiances'
        ]);
    }

    /**
 * @Route("/conception-jardin/ambiances/{ambiance}", name="ambiance")
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

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        $path = getcwd().'/media/ambiance/'.$ambiance;
        $tmp_files = scandir($path);
        foreach($tmp_files as $tmp_file) {
            if (is_file($path.'/'.$tmp_file))
                $files[] = $tmp_file;
        }

        return $this->render('catalog/catalogue-ambiances.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'datas' => $products,
            'files' => $files
        ]);
    }

    /**
     * @Route("/conception-jardin/philosophie/{philosophie}", name="philosophie")
     */
    public function philosophieAction(Request $request, $philosophie)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneBy(array('code' => $philosophie));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        $path = getcwd().'/media/philosophie/'.$philosophie;
        $tmp_files = scandir($path);
        foreach($tmp_files as $tmp_file) {
            if (is_file($path.'/'.$tmp_file))
                $files[] = $tmp_file;
        }

        return $this->render('catalog/catalogue-philosophy.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'datas' => $products,
            'files' => $files
        ]);
    }

    /**
     * @Route("/conception-jardin/lieux/{lieu}", name="lieu")
     */
    public function lieuAction(Request $request, $lieu)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneBy(array('code' => $lieu));

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // Récupère les images du dossier correspondant à l'ambiance
        $files = array();
        $path = getcwd().'/media/lieu/'.$lieu;
        $tmp_files = scandir($path);
        foreach($tmp_files as $tmp_file) {
            if (is_file($path.'/'.$tmp_file))
                $files[] = $tmp_file;
        }

        return $this->render('catalog/catalogue-places.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'datas' => $products,
            'files' => $files
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
}