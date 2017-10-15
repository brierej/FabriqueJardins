<?php
/**
 * Created by PhpStorm.
 * User: Nid
 * Date: 8/10/2017
 * Time: 9:55 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogController extends Controller
{
    /**
     * @Route("/catalogue/ambiances", name="ambiances")
     */
    public function ambianceAction()
    {
        return $this->render('catalog/catalog-ambiances.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/catalogue/lieux", name="lieux")
     */
    public function lieuxAction()
    {
        return $this->render('catalog/catalog-places.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/catalogue/philosophie", name="philosophie")
     */
    public function philosophieAction()
    {
        return $this->render('catalog/catalog-philosophy.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}