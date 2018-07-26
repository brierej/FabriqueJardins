<?php
/**
 * Created by PhpStorm.
 * User: Nid
 * Date: 19/10/2017
 * Time: 8:37 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use AppBundle\Entity\Questionnaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        if (!$products) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        // replace this example code with whatever you need
        return $this->render('admin/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $products
        ]);
    }

    /**
     * @Route("/admin/questionnaires", name="admin_questionnaires")
     */
    public function viewQuestionnaireAction()
    {
        $questionnaires = $this->getDoctrine()
            ->getRepository(Questionnaire::class)
            ->findAll();

        if (!$questionnaires) {
            throw $this->createNotFoundException(
                'No questionnaire found'
            );
        }

        // replace this example code with whatever you need
        return $this->render('admin/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'questionnaires' => $questionnaires
        ]);
    }

}