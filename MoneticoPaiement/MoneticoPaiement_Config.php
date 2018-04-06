<?php
/***************************************************************************************
* Warning !! MoneticoPaiement_Config contains the key, you have to protect this file with all     *   
* the mechanism available in your development environment.                             *
* You may for instance put this file in another directory and/or change its name       *
***************************************************************************************/

define ("MONETICOPAIEMENT_KEY", "87A3C12B8D840EA2A3C63B48351F5D74C6F72695");
define ("MONETICOPAIEMENT_EPTNUMBER", "2821788");
define ("MONETICOPAIEMENT_VERSION", "3.0");
define ("MONETICOPAIEMENT_URLSERVER", "https://p.monetico-services.com/test/");
define ("MONETICOPAIEMENT_COMPANYCODE", "lafabrique");
define ("MONETICOPAIEMENT_URLOK", "http://www.lafabriquedejardins.fr/success");
define ("MONETICOPAIEMENT_URLKO", "http://www.lafabriquedejardins.fr/error");

define ("MONETICOPAIEMENT_CTLHMAC","V4.0.sha1.php--[CtlHmac%s%s]-%s");
define ("MONETICOPAIEMENT_CTLHMACSTR", "CtlHmac%s%s");
define ("MONETICOPAIEMENT_PHASE2BACK_RECEIPT","version=2\ncdr=%s");
define ("MONETICOPAIEMENT_PHASE2BACK_MACOK","0");
define ("MONETICOPAIEMENT_PHASE2BACK_MACNOTOK","1\n");
define ("MONETICOPAIEMENT_PHASE2BACK_FIELDS", "%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*");
define ("MONETICOPAIEMENT_PHASE1GO_FIELDS", "%s*%s*%s%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s");
define ("MONETICOPAIEMENT_URLPAYMENT", "paiement.cgi");
?>
