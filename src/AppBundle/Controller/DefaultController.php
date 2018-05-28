<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Entity\SalesOrder;
use AppBundle\Monetico\MoneticoPaiement_Ept;
use AppBundle\Monetico\MoneticoPaiement_Hmac;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/fabrique-jardins/{page}", name="page")
     */
    public function fabriqueAction(Request $request, $page)
    {
        // replace this example code with whatever you need
        return $this->render('pages/'.$page.'.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/questionnaire-particuliers", name="questionnaire-particuliers")
     */
    public function formParAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('forms/form-particuliers.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/questionnaire-professionnel", name="questionnaire-particuliers")
     */
    public function formProAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('forms/form-particuliers.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('forms/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/contactSave", name="contactSave")
     */
    public function contactSaveAction(Request $request)
    {
        var_dump($request->request->all());

        $em = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $contact->setFirstname($request->request->get('template-contactform-firstname'));
        $contact->setLastname($request->request->get('template-contactform-lastname'));
        $contact->setEmail($request->request->get('template-contactform-email'));
        $contact->setTelephone($request->request->get('template-contactform-telephone'));
        $contact->setSujet($request->request->get('template-contactform-sujet'));
        $contact->setMessage($request->request->get('template-contactform-message'));
        $em->persist($contact);
        $em->flush();

        // replace this example code with whatever you need
//        return $this->render('forms/contact.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
    }

    /**
     * @Route("/success", name="success")
     */
    public function successAction(Request $request)
    {
        $params['MAC'] = $request->query->get('MAC');
        $params['date'] = $request->query->get('date');
        $params['TPE'] = $request->query->get('TPE');
        $params['montant'] = $request->query->get('montant');
        $params['reference'] = $request->query->get('reference');
        $params['texte-libre'] = $request->query->get('texte-libre');
        $params['code-retour'] = $request->query->get('code-retour');
        $params['cvx'] = $request->query->get('cvx');
        $params['vld'] = $request->query->get('vld');
        $params['brand'] = $request->query->get('brand');
        $params['status3ds'] = $request->query->get('status3ds');
        $params['numauto'] = $request->query->get('numauto');
        $params['motifrefus'] = $request->query->get('motifrefus');
        $params['originecb'] = $request->query->get('originecb');
        $params['bincb'] = $request->query->get('bincb');
        $params['hpancb'] = $request->query->get('hpancb');
        $params['ipclient'] = $request->query->get('ipclient');
        $params['originetr'] = $request->query->get('originetr');
        $params['veres'] = $request->query->get('veres');
        $params['pares'] = $request->query->get('pares');
        $params['montantech'] = $request->query->get('montantech');
        $params['filtragecause'] = $request->query->get('filtragecause');
        $params['filtragevaleur'] = $request->query->get('filtragevaleur');
        $params['filtrage_etat'] = $request->query->get('filtrage_etat');
        $params['cbenregistree'] = $request->query->get('cbenregistree');
        $params['cbmasquee'] = $request->query->get('cbmasquee');
        $params['modepaiement'] = $request->query->get('modepaiement');

        $em = $this->getDoctrine()->getManager();
        $salesOrder = new SalesOrder();
        $salesOrder->setMac(isset($params['MAC']) ? $params['MAC'] : '');
        $salesOrder->setDate(isset($params['date']) ? $params['date'] : '');
        $salesOrder->setTpe(isset($params['TPE']) ? $params['TPE'] : '');
        $salesOrder->setMontant(isset($params['montant']) ? $params['montant'] : '');
        $salesOrder->setReference(isset($params['reference']) ? $params['reference'] : '');
        $salesOrder->setTexteLibre(isset($params['texte-libre']) ? $params['texte-libre'] : '');
        $salesOrder->setCodeRetour(isset($params['code-retour']) ? $params['code-retour'] : '');
        $salesOrder->setCvx(isset($params['cvx']) ? $params['cvx'] : '');
        $salesOrder->setVld(isset($params['vld']) ? $params['vld'] : '');
        $salesOrder->setBrand(isset($params['brand']) ? $params['brand'] : '');
        $salesOrder->setStatus3DS(isset($params['status3ds']) ? $params['status3ds'] : '');
        $salesOrder->setNumAuto(isset($params['numauto']) ? $params['numauto'] : '');
        $salesOrder->setMotifRefus(isset($params['motifrefus']) ? $params['motifrefus'] : '');
        $salesOrder->setOriginicb(isset($params['originecb']) ? $params['originecb'] : '');
        $salesOrder->setBincb(isset($params['bincb']) ? $params['bincb'] : '');
        $salesOrder->setHpancb(isset($params['hpancb']) ? $params['hpancb'] : '');
        $salesOrder->setIpclient(isset($params['ipclient']) ? $params['ipclient'] : '');
        $salesOrder->setOriginetr(isset($params['originetr']) ? $params['originetr'] : '');
        $salesOrder->setVeres(isset($params['veres']) ? $params['veres'] : '');
        $salesOrder->setPares(isset($params['pares']) ? $params['pares'] : '');
        $salesOrder->setMontantTech(isset($params['montantech']) ? $params['montantech'] : '');
        $salesOrder->setFiltrageCause(isset($params['filtragecause']) ? $params['filtragecause'] : '');
        $salesOrder->setFiltrageValeur(isset($params['filtragevaleur']) ? $params['filtragevaleur'] : '');
        $salesOrder->setFiltrageEtat(isset($params['filtrage_etat']) ? $params['filtrage_etat '] : '');
        $salesOrder->setCbenregistree(isset($params['cbenregistree']) ? $params['cbenregistree '] : '');
        $salesOrder->setCbmasquee(isset($params['cbmasquee']) ? $params['cbmasquee'] : '');
        $salesOrder->setModepaiement(isset($params['modepaiement']) ? $params['modepaiement'] : '');
        $em->persist($salesOrder);
        $em->flush();

        $sData = $params['TPE']."*".$params['date']."*".$params['montant']."*".$params['reference']."*".$params['texte-libre']."*3.0*".$params['code-retour']."*".$params['cvx']."*".
    $params['vld']."*".$params['brand']."*".$params['status3ds']."*".$params['numauto']."*".$params['motifrefus']."*".$params['originecb']."*".$params['bincb']."*".
    $params['hpancb']."*".$params['ipclient']."*".$params['originetr']."*".$params['veres']."*".$params['pares']."*";



        $oEpt = new MoneticoPaiement_Ept('FR');
        $oHmac = new MoneticoPaiement_Hmac($oEpt);

//        echo $oHmac->computeHmac($sData);
//        echo '<hr />';
//        echo $params['MAC'];

        if (strtoupper($oHmac->computeHmac($sData)) == strtoupper($params['MAC'])) {
            return new Response(
                "version=2\ncdr=0\n",
                Response::HTTP_OK,
                array('content-type' => 'text/html')
            );
        } else {
            return new Response(
                "version=2\ncdr=1\n",
                Response::HTTP_OK,
                array('content-type' => 'text/html')
            );
        }
    }

    /**
     * @Route("/successPayment", name="successPayment")
     */
    public function paymentSuccessAction(Request $request)
    {
        return $this->render('pages/success.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'request' => $request->request
        ]);
    }

    /**
     * @Route("/errorPayment", name="errorPayment")
     */
    public function paymentErrorAction(Request $request)
    {
        return $this->render('pages/error.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'request' => $request->request
        ]);
    }


}
