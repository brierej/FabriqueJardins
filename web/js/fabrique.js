function activateTab(num){
    $("#tabs").tabs({
        active: num
    });
}

function validateForm(){
    var serializedArray = $('#billing-form').serializeArray();
}

function calcTarif(element){
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

    // console.log(choixSurface);
    // console.log(options);

    tarif = tarifOptions(options, choixSurface);

    $('#tarif').text(tarif + '€');
    $('#sMontant').val(tarif);
    updateOptionPrice(choixSurface);
    updateRecap(options, choixSurface);
}

function updateRecap(options, choixSurface) {
    surfaceLabels = {
        "massif_0-25": "Massif de 0 à 25 m²",
        "massif_26-50": "Massif de 26 à 50m²",
        "piscine_0-25": "Piscine de 0 à 25 m²",
        "piscine_26-50": "Piscine de 26 à 50m²",
        "balcon_terrasse_0-25": "Balcon/Terrasse de 0 à 25m²",
        "balcon_terrasse_26-50": "Balcon/Terrasse de 26 à 50m²",
        "potager_0-25": "Potager de 0 à 25m²",
        "potager_26-50": "Potager de 26 à 50m²",
        "jardin_ville": "Jardin de ville",
        "jardin_bourg": "Jardin de bourg",
        "jardin_campagne": "Jardin de campagne",
    };
    $tarifsOptions = getTarifsArray();
    optionsLabels = {
        "option_3D": "Mise en forme 3D (+" + $tarifsOptions[choixSurface]['option_3D'] + ' €)',
        "option_dossier_tech": "Dossier technique +" + $tarifsOptions[choixSurface]['option_dossier_tech'] + ' €)',
        "option_guide_entretien": "Guide d'entretien +" + $tarifsOptions[choixSurface]['option_guide_entretien'] + ' €)',
        "option_choix_pro": "Choix de l'entreprise +" + $tarifsOptions[choixSurface]['option_choix_pro'] + ' €)',
        "choix_deplacement_dpt": "Choix de l'entreprise +" + $tarifsOptions[choixSurface]['choix_deplacement_dpt'] + ' €)',
        "choix_deplacement_gorges": "Choix de l'entreprise +" + $tarifsOptions[choixSurface]['choix_deplacement_gorges'] + ' €)'
    };

    var list = document.createElement('ul');
    var optionsElement = $('#recapOptions');

    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }

    for (var i = 0; i < options.length; i++) {
        var item = document.createElement('li');
        item.appendChild(document.createTextNode(optionsLabels[options[i]]));
        list.appendChild(item);
    }

    // console.log(list.innerHTML);
    if (options.length > 0) {
        optionsElement.html('Options : ' + list.innerHTML);
    } else {
        optionsElement.html('');
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
        "option_choix_pro": 41,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['massif_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 54,
        "option_guide_entretien": 54,
        "option_choix_pro": 81,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['piscine_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 27,
        "option_guide_entretien": 27,
        "option_choix_pro": 41,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['piscine_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 54,
        "option_guide_entretien": 54,
        "option_choix_pro": 81,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['balcon_terrasse_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 27,
        "option_guide_entretien": 27,
        "option_choix_pro": 41,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['balcon_terrasse_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 81,
        "option_guide_entretien": 54,
        "option_choix_pro": 81,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['potager_0-25'] = {
        "base": 95,
        "option_3D": 27,
        "option_dossier_tech": 54,
        "option_guide_entretien": 54,
        "option_choix_pro": 41,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['potager_26-50'] = {
        "base": 190,
        "option_3D": 54,
        "option_dossier_tech": 109,
        "option_guide_entretien": 109,
        "option_choix_pro": 81,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['jardin_ville'] = {
        "base": 380,
        "option_3D": 109,
        "option_dossier_tech": 190,
        "option_guide_entretien": 244,
        "option_choix_pro": 244,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['jardin_bourg'] = {
        "base": 760,
        "option_3D": 217,
        "option_dossier_tech": 380,
        "option_guide_entretien": 244,
        "option_choix_pro": 244,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    tarif['jardin_campagne'] = {
        "base": 1140,
        "option_3D": 326,
        "option_dossier_tech": 570,
        "option_guide_entretien": 244,
        "option_choix_pro": 244,
        "choix_deplacement_dpt" : 30,
        "choix_deplacement_gorges" : 0
    };
    return tarif;
}

function updateOptionPrice(surface) {
    console.log('updateOptionPrice');
    tarif = getTarifsArray();
    $('#option_3D_price').text(tarif[surface]['option_3D'] + '€');
    $('#option_dossier_tech_price').text(tarif[surface]['option_dossier_tech'] + '€');
    $('#option_guide_entretien_price').text(tarif[surface]['option_guide_entretien'] + '€');
    $('#option_choix_pro_price').text(tarif[surface]['option_choix_pro'] + '€');
    $('#choix_deplacement_dpt').text(tarif[surface]['choix_deplacement_dpt'] + ' €');
    $('#choix_deplacement_gorges').text(tarif[surface]['choix_deplacement_gorges'] + ' €');
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

function selectSurface(element) {
    $('.surface_box').removeClass('surface_checked');
    $(element).addClass('surface_checked');
}

function checkTab6() {
        alert('#billing-form-email');
        activateTab(5);
}


$('#template-contactform-submit').click(function( event ) {
    var error = false;
    console.log($('#template-contactform-firstname').val());
    console.log($('#template-contactform-firstname').hasClass('required'));
    console.log(typeof $('#template-contactform-firstname').value === 'undefined');

    if ($('#template-contactform-email').hasClass('required') && $('#template-contactform-email').val() === '') {
        $('#template-contactform-email').addClass('error');
        error = true;
    } else {
        $('#template-contactform-email').removeClass('error');
    }
    if ($('#template-contactform-subject').hasClass('required') && $('#template-contactform-subject').val() === '') {
        $('#template-contactform-subject').addClass('error');
        error = true;
    } else {
        $('#template-contactform-subject').removeClass('error');
    }
    if ($('#template-contactform-message').hasClass('required') && $('#template-contactform-message').val() === '') {
        $('#template-contactform-message').addClass('error');
        error = true;
    } else {
        $('#template-contactform-message').removeClass('error');
    }

    if (!error) {
        $('#template-contactform').submit();
    }
    event.preventDefault();
});

function verifForm(formCheckpoint) {
    switch (formCheckpoint) {
        case 'questionnaire1' :
            alert(formCheckpoint);
            var radio = null;
            if (!radio) {
                alert('Veuillez choisir le type de prestation souhaitée');
            } else {
                activateTab(1);
            }
            break;
    }
}

function recapUpdate(){
    form = $('#billing-form');
    console.log(form.serialize());
    $.ajax({
        data: form.serialize(),
        url: '/commande/recapUpdate',
        success : function(){

        }
    });
}