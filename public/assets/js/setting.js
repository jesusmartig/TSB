(function ($) {
    // Obtenemos el token de la sessionStorage
    const token = sessionStorage.getItem('token');
    // Agregamos el token Authorization
    var Url = window.location.href;
    fetch(Url, {
        headers: {
            'Accept': 'application/json', 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + token + '',
        }
    });
    // Validamos si el token existe
    if (token === null) {
        location.href = '/login';
    } else {
        Greet();
        document.getElementById('useName').innerHTML = sessionStorage.getItem('attributes');
    }

    //metodos de mostar alerta
    showToastPosition = function (position, message) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Positioning',
            text: message,
            position: String(position),
            icon: 'info',
            stack: false,
            loaderBg: '#f96868'
        })
    }

    //metodos de restear alerta
    resetToastPosition = function () {
        $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
        $(".jq-toast-wrap").css({
            "top": "", "left": "", "bottom": "", "right": ""
        }); //to remove previous position style
    }


})(jQuery);

//Funcion que nos genera el sludo
function Greet() {

    const name = sessionStorage.getItem('attributes');

    let dateDay = new Date();

    let hours = dateDay.getHours();

    let greeting;

    if (hours >= 0 && hours < 12) {
        greeting = "Buenos Días";
    }

    if (hours >= 12 && hours < 18) {
        greeting = "Buenas Tardes";
    }

    if (hours >= 18 && hours < 24) {
        greeting = "Buenas Noches";
    }

    document.getElementById('greeting').innerHTML = `${greeting}, <span class="text-black fw-bold">${name}</span>`;
}

function Logout() {

    // Obtenemos el token de la sessionStorage
    const token = sessionStorage.getItem('token');

    // Obtenemos los datos del formulario
    let formData = {};
    $("#logout-form").serializeArray().map(function (x) {
        formData[x.name] = x.value;
    });

    // Configuramos la ruta
    var Url = 'api/authenticate/logout';
    // Hacemos el envio de la peticion
    fetch(Url, {
        method: "post", body: JSON.stringify(formData), headers: {
            'Accept': 'application/json', 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + token + '',
        }
    });
    // Eliminamos los valores de la sessionStorage
    sessionStorage.clear();
    location.reload();
}
