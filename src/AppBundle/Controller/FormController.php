<?php
/**
 * Created by PhpStorm.
 * User: j.briere
 * Date: 16/10/2017
 * Time: 11:20
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Pricing;
use AppBundle\Entity\Questionnaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Monetico;
use Symfony\Component\HttpFoundation\RedirectResponse;


define ("MONETICOPAIEMENT_KEY", "87A3C12B8D840EA2A3C63B48351F5D74C6F72695");
define ("MONETICOPAIEMENT_EPTNUMBER", "2821788");
define ("MONETICOPAIEMENT_VERSION", "3.0");
define ("MONETICOPAIEMENT_URLSERVER", "https://p.monetico-services.com/test/");
define ("MONETICOPAIEMENT_COMPANYCODE", "lafabrique");
define ("MONETICOPAIEMENT_URLOK", "http://lafabriquedejardins.fr");
define ("MONETICOPAIEMENT_URLKO", "http://lafabriquedejardins.fr");

define ("MONETICOPAIEMENT_CTLHMAC","V4.0.sha1.php--[CtlHmac%s%s]-%s");
define ("MONETICOPAIEMENT_CTLHMACSTR", "CtlHmac%s%s");
define ("MONETICOPAIEMENT_PHASE2BACK_RECEIPT","version=2\ncdr=%s");
define ("MONETICOPAIEMENT_PHASE2BACK_MACOK","0");
define ("MONETICOPAIEMENT_PHASE2BACK_MACNOTOK","1\n");
define ("MONETICOPAIEMENT_PHASE2BACK_FIELDS", "%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*");
define ("MONETICOPAIEMENT_PHASE1GO_FIELDS", "%s*%s*%s%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s");
define ("MONETICOPAIEMENT_URLPAYMENT", "paiement.cgi");


class FormController extends Controller
{
    /**
     * @Route("commande/paiement", name="payment")
     */
    public function paymentAction(Request $request)
    {
        $currentDate = new \DateTime();

        // Reference: unique, alphaNum (A-Z a-z 0-9), 12 characters max
        $sReference = "FJ" . $currentDate->format("YmdHis");
        // Amount : format  "xxxxx.yy" (no spaces)
        // $sMontant = 1.01;
        $sMontant = $request->request->get('tarif');
        // Currency : ISO 4217 compliant
        $sDevise  = "EUR";
        // free texte : a bigger reference, session context for the return on the merchant website
        $sTexteLibre = "Texte Libre";
        // transaction date : format d/m/y:h:m:s
        $sDate = $currentDate->format("d/m/Y:H:i:s");
        // Language of the company code
        $sLangue = "FR";
        // customer email
        $sEmail = $request->request->get('billing-form-email');
        $sOptions = "";

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------
// SECTION PAIEMENT FRACTIONNE - Section spécifique au paiement fractionné
//
// INSTALMENT PAYMENT SECTION - Section specific to the installment payment
// -------------------------------------------------------------------------------------------------------------------------------------------------------------

// between 2 and 4
// entre 2 et 4
//$sNbrEch = "4";
        $sNbrEch = "";

// date echeance 1 - format dd/mm/yyyy
//$sDateEcheance1 = date("d/m/Y");
        $sDateEcheance1 = "";

// montant �ch�ance 1 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance1 = "0.26" . $sDevise;
        $sMontantEcheance1 = "";

// date echeance 2 - format dd/mm/yyyy
        $sDateEcheance2 = "";

// montant �ch�ance 2 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance2 = "0.25" . $sDevise;
        $sMontantEcheance2 = "";

// date echeance 3 - format dd/mm/yyyy
        $sDateEcheance3 = "";

// montant �ch�ance 3 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance3 = "0.25" . $sDevise;
        $sMontantEcheance3 = "";

// date echeance 4 - format dd/mm/yyyy
        $sDateEcheance4 = "";

// montant �ch�ance 4 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance4 = "0.25" . $sDevise;
        $sMontantEcheance4 = "";


        $sArray = array(
            'reference' => $sReference,
            'devise' => $sDevise,
            'texteLibre' => $sTexteLibre,
            'date' => $sDate,
            'langue' => $sLangue,
            'email' => $sEmail,
            'montant' => $sMontant
        );

//        var_dump($request->request);
//        var_dump($sArray);

// =============================================================================================================================================================
// SECTION CODE : Cette section ne doit pas être modifiée
//
// CODE SECTION : This section must not be modified
// =============================================================================================================================================================

        $oEpt = new Monetico\MoneticoPaiement_Ept($sLangue);
        $oHmac = new Monetico\MoneticoPaiement_Hmac($oEpt);

// Control String for support
        $CtlHmac = sprintf(MONETICOPAIEMENT_CTLHMAC, $oEpt->sVersion, $oEpt->sNumero, $oHmac->computeHmac(sprintf(MONETICOPAIEMENT_CTLHMACSTR, $oEpt->sVersion, $oEpt->sNumero)));

// Data to certify
        $phase1go_fields = sprintf(MONETICOPAIEMENT_PHASE1GO_FIELDS,
            $oEpt->sNumero,
            $sDate,
            $sMontant,
            $sDevise,
            $sReference,
            $sTexteLibre,
            $oEpt->sVersion,
            $oEpt->sLangue,
            $oEpt->sCodeSociete,
            $sEmail,
            $sNbrEch,
            $sDateEcheance1,
            $sMontantEcheance1,
            $sDateEcheance2,
            $sMontantEcheance2,
            $sDateEcheance3,
            $sMontantEcheance3,
            $sDateEcheance4,
            $sMontantEcheance4,
            $sOptions);

// MAC computation
        $sMAC = $oHmac->computeHmac($phase1go_fields);

        $em = $this->getDoctrine()->getManager();
        $questionnaire = new Questionnaire();
        $questionnaire->setJson(json_encode($request->request->all()));
        $questionnaire->setReference($sArray['reference']);
        $questionnaire->setCreatedAt($currentDate);
        $em->persist($questionnaire);
        $em->flush();

        $typeJardin = $request->request->get('choix_surface');
        $pricing = $this->getDoctrine()
            ->getRepository(Pricing::class)
            ->findOneBy([
                'code' => $typeJardin
                ]);

        if (!$pricing) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        $basePrice = $pricing->getPrice();
        $options = array();
        if ($request->request->get('option_3D') == 'on') {
            $options[] = array(
                'code' => 'option_3D',
                'label' => 'Modélisation 3D',
                'price' => $pricing->getPrice3D()
            );
            $basePrice += $pricing->getPrice3D();
        }
        if ($request->request->get('option_dossier_tech') == 'on') {
            $options[] = array(
                'code' => 'option_dossier_tech',
                'label' => 'Dossier technique',
                'price' => $pricing->getPriceDossierTech()
            );
            $basePrice += $pricing->getPriceDossierTech();
        }
        if ($request->request->get('option_choix_pro') == 'on') {
            $options[] = array(
                'code' => 'option_choix_pro',
                'label' => 'Choix d\'entreprise',
                'price' => $pricing->getPriceChoixEntreprise()
            );
            $basePrice += $pricing->getPriceChoixEntreprise();
        }
        if ($request->request->get('option_guide_entretien') == 'on') {
            $options[] = array(
                'code' => 'option_guide_entretien',
                'label' => 'Guide d\'entretien',
                'price' => $pricing->getPriceGuideEntretien()
            );
            $basePrice += $pricing->getPriceGuideEntretien();
        }

        return $this->render('forms/paiement.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'payment_url' => $oEpt->sUrlPaiement,
            'payment_infos' => $oEpt,
            'payment_smac' => $sMAC,
            'payment_array' => $sArray,
            'form_infos' => $request->request->all(),
            'form_json' => json_encode($request->request),
            'total_price' => $basePrice,
            'options' => $options,
            'pricing' => $pricing,
        ));
    }

    /**
     * @Route("forms/{form_type}", name="form")
     */
    public function formAction(Request $request, $form_type)
    {
        $pricing = $this->getDoctrine()
            ->getRepository(Pricing::class)
            ->findAll();

        if (!$pricing) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

//        var_dump($pricing);
//
        // replace this example code with whatever you need
        return $this->render('forms/'.$form_type.'.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'pricing' => $pricing
        ));
    }

}