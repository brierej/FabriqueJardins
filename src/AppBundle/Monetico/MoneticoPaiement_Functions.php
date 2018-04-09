<?php

namespace AppBundle\Monetico;

class MoneticoPaiement_Functions
{

// ----------------------------------------------------------------------------
// function getMethode
//
// IN:
// OUT: Donn�es soumises par GET ou POST / Data sent by GET or POST
// description: Renvoie le tableau des donn�es / Send back the data array
// ----------------------------------------------------------------------------

    public function getMethode()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET")
            return $_GET;

        if ($_SERVER["REQUEST_METHOD"] == "POST")
            return $_POST;

        die ('Invalid REQUEST_METHOD (not GET, not POST).');
    }

// ----------------------------------------------------------------------------
// function HtmlEncode
//
// IN:  chaine a encoder / String to encode
// OUT: Chaine encod�e / Encoded string
//
// Description: Encode special characters under HTML format
//                           ********************
//              Encodage des caract�res sp�ciaux au format HTML
// ----------------------------------------------------------------------------
    public function HtmlEncode($data)
    {
        $SAFE_OUT_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890._-";
        $encoded_data = "";
        $result = "";
        for ($i = 0; $i < strlen($data); $i++) {
            if (strchr($SAFE_OUT_CHARS, $data{$i})) {
                $result .= $data{$i};
            } else if (($var = bin2hex(substr($data, $i, 1))) <= "7F") {
                $result .= "&#x" . $var . ";";
            } else
                $result .= $data{$i};

        }
        return $result;
    }
}