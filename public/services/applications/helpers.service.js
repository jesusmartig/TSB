/**
 * Modulo: Service Contacts HTTP_AJAX
 * Author: Darwin Montes Lopez
 * year: 2024
 */
export default {

    getMessage(message, url) {
        Swal.fire({
            toast: true,
            icon: 'success',
            title: message,
            animation: false,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        }).then((result) => {
            location.reload();
            location.assign(url);
        });
    },

    getAllGetParams: function (id = null) {
        const result = [];
        let parts = [];

        location.pathname
            .split("/")
            .forEach(function (item) {
                parts = item.split("/");
                if (parts[0] !== "") {
                    result.push(parts);
                }
            });
        return result[id][0]
    },
}
