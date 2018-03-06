function activateTab(num){
    $("#tabs").tabs({
        active: num
    });
}

function validateForm(){
    var serializedArray = $('#billing-form').serializeArray();
    console.log(serializedArray);
}

function calcTarif(add){
    var serializedArray = $('#billing-form').serializeArray();
    var options = [];
    var tarif = 0;

    for (var i = 0; i < serializedArray.length; i++) {
        if (serializedArray[i].name == 'choix_surface')
            var choixSurface = serializedArray[i].value;
        if (serializedArray[i].name.substr(0, 6) == 'option') {

            options.push(serializedArray[i].name);
        }
    }

    console.log(choixSurface);
    console.log(options);

    tarif = tarifOptions(options, choixSurface);

    $('#tarif').text(tarif + '€');
    updateOptionPrice(choixSurface);
    updateRecap(options, choixSurface);
}

function updateRecap(options, choixSurface) {
    surfaceLabels = {
        "massif_0-25": "Massif de 0 à 25 m²",
        "massif_26-50": "Massif de 26 à 50m²",
        "balcon_terrasse_0-25": "Balcon/Terrasse de 0 à 25m²",
        "balcon_terrasse_26-50": "Balcon/Terrasse de 26 à 50m²",
        "potager_0-25": "Potager de 0 à 25m²",
        "potager_26-50": "Potager de 26 à 50m²",
        "jardin_ville": "Jardin de ville",
        "jardin_bourg": "Jardin de bourg",
        "jardin_campagne": "Jardin de campagne",
    };
    optionsLabels = {
        "option_3D": "Mise en forme 3D",
        "option_dossier_tech": "Dossier technique",
        "option_guide_entretien": "Guide d'entretien",
        "option_choix_pro": "Choix de l'entreprise"
    };

    var list = document.createElement('ul');
    var optionsElement = $('#recapOptions');
    for(var i = 0; i < options.length; i++) {
        // Create the list item:
        var item = document.createElement('li');

        // Set its contents:
        item.appendChild(document.createTextNode(optionsLabels[options[i]]));

        // Add it to the list:
        list.appendChild(item);
    }
    console.log(list.innerHTML);
    // Finally, return the constructed list:
    if (options.length > 0) {
        optionsElement.html('Options : ' + list.innerHTML);
    }

    $('#recapSurface').text(surfaceLabels[choixSurface]);
}

function getTarifsArray() {
    var tarif = [];
    tarif['massif_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 27,
        "option_guide_entretien": 27,
        "option_choix_pro": 41
    };
    tarif['massif_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 54,
        "option_guide_entretien": 54,
        "option_choix_pro": 81
    };
    tarif['balcon_terrasse_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 27,
        "option_guide_entretien": 27,
        "option_choix_pro": 41
    };
    tarif['balcon_terrasse_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 81,
        "option_guide_entretien": 54,
        "option_choix_pro": 81
    };
    tarif['potager_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 54,
        "option_guide_entretien": 54,
        "option_choix_pro": 41
    };
    tarif['potager_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 109,
        "option_guide_entretien": 109,
        "option_choix_pro": 81
    };
    tarif['jardin_ville'] = {
        "base": 380,
        "option_3D": 109,
        "option_dossier_tech": 190,
        "option_guide_entretien": 244,
        "option_choix_pro": 244
    };
    tarif['jardin_bourg'] = {
        "base": 760,
        "option_3D": 217,
        "option_dossier_tech": 380,
        "option_guide_entretien": 244,
        "option_choix_pro": 244
    };
    tarif['jardin_campagne'] = {
        "base": 1140,
        "option_3D": 326,
        "option_dossier_tech": 570,
        "option_guide_entretien": 244,
        "option_choix_pro": 244
    };
    return tarif;
}

function updateOptionPrice(surface) {
    tarif = getTarifsArray();
    $('#option_3D_price').text(tarif[surface]['option_3D'] + '€');
    $('#option_dossier_tech_price').text(tarif[surface]['option_dossier_tech'] + '€');
    $('#option_guide_entretien_price').text(tarif[surface]['option_guide_entretien'] + '€');
    $('#option_choix_pro_price').text(tarif[surface]['option_choix_pro'] + '€');
}

function tarifOptions(options, surface){
    var res = 0;
    tarif = getTarifsArray();
    res = tarif[surface]['base'];
    for (var i = 0; i < options.length; i++) {
        res += tarif[surface][options[i]];
    }

    return res;
}