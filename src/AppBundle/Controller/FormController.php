<?php
/**
 * Created by PhpStorm.
 * User: j.briere
 * Date: 16/10/2017
 * Time: 11:20
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    /**
     * @Route("forms/{form_type}", name="form")
     */

    public function formAction(Request $request, $form_type)
    {
        // replace this example code with whatever you need
        return $this->render('forms/'.$form_type.'.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}