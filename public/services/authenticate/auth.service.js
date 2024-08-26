/**
 * Modulo: Service Contacts HTTP_AJAX
 * Author: Darwin Montes Lopez
 * year: 2024
 */

function __(id) {
    return document.getElementById(id);
}

var Timer = function (callback, delay) {
    var timerId, start, remaining = delay;

    this.pause = function () {
        window.clearTimeout(timerId);
        remaining -= Date.now() - start;
    };

    this.resume = function () {
        start = Date.now();
        window.clearTimeout(timerId);
        timerId = window.setTimeout(callback, remaining);
    };

    this.resume();
};
export default {

    async setAuthenticate(url, request) {
        try {
            const response = await fetch(url, {
                method: "post", body: JSON.stringify(request), headers: {
                    'Content-Type': 'application/json', 'Accept': 'application/json'
                }
            });
            const {data} = await response.json();
            console.log(data)
            let load = new Timer(function () {
                __('messages').innerHTML = '<div class="alert alert-info"><strong><i class="fal fa fa-exclamation-circle"></i></strong><span style="font-size: 14px"> Autenticando…</span></div>';
            }, 100)
            let content = new Timer(function () {
                __('messages').innerHTML = '<div class="alert alert-success"><strong><i class="fal fas fa-check"></i></strong><span style="font-size: 14px"> Inicio de sesión correcto Redireccionando…</span></div>';
            }, 3200);
            let inicio = new Timer(function () {
                sessionStorage.setItem('token', data.token)
                sessionStorage.setItem('attributes', data.attributes.name)
                location.href = '/dashboard';
            }, 3300);

            return data;
        } catch (error) {
            __('messages').html('<div class="alert alert-danger alert-rounded">' + result.responseJSON['message'] + '</div>');
        }
    },

    async mostrarMensajeIntervalo(mensaje, intervalo) {
        setInterval(function () {
            console.log(mensaje);
            document.getElementById('mensaje').innerText = ``;
        }, intervalo);
    }
}
