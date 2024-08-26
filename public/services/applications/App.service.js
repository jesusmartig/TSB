/**
 * Modulo: Service Contacts HTTP_AJAX
 * Author: Darwin Montes Lopez
 * year: 2024
 */

const token = sessionStorage.getItem('token');
export default {
    /**
     * Display a listing of the resource.
     * @param url
     * @return response
     */
    async Index(url) {
        try {
            const response = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + sessionStorage.getItem('token') + '',
                }
            })
            const {data} = await response.json();
            return data;
        } catch (error) {
            return error;
        }
    },

    /**
     * Store a newly created resource in storage.
     * @param url
     * @param request
     * @return Response
     */
    async Store(url, request) {
        try {
            const response = await fetch(url, {
                method: "post", body: JSON.stringify(request), headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + sessionStorage.getItem('token') + '',
                }
            });
            const {data} = await response.json();
            return data;
        } catch (error) {
            return error;
        }
    },

    /**
     * Update the specified resource in storage.
     * @param url
     * @param request
     * @return Response
     */
    async Update(url, request) {
        try {
            const response = await fetch(url, {
                method: "PATCH", body: JSON.stringify(request), headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token + '',
                }
            });
            const {data} = await response.json();
            return data;
        } catch (error) {
            return error;
        }
    },

    /**
     * Remove the specified resource from storage.
     * @param url
     * @param request
     * @return Response
     */
    async setDestroy(url, request) {
        try {
            const response = await fetch(url, {
                method: "delete", body: JSON.stringify(request), headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token + '',
                }
            });
            const {data} = await response.json();
            return data;
        } catch (error) {
            return error;
        }
    },

    /**
     * Upload file newly created resource in storage.
     * @param url
     * @param e
     * @return Response
     */
    async Upload(url, e) {
        let IMAGE_SIZE_AVATAR = 2048000
        if (e.target.files[0].size > IMAGE_SIZE_AVATAR) {
            console.log('1')
        } else {
            let formData = new FormData($("#RtmForm")[0]);
            formData.append('archives', e.target.files[0]);
            const response = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token + '',
                }, method: "post", body: formData,
            });
            const {data} = await response.json();
            $('#Url').attr('src', data);
            $('.Shares').val(data);
        }
    },
}
