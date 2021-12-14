
console.log('v_ajax');


document.querySelector('.js_form_visit').addEventListener('click', function (e) {
    e.preventDefault();
    let js_get_form_info = this.closest('.js_get_form_info')
    let name = js_get_form_info.querySelector('.js_get_name');
    if (name.value.length < 4){
        name.classList.add('error')
        return;
    }else {
        name.classList.remove('error');
    }
    let phone = js_get_form_info.querySelector('.js_get_phone');
    if (phone.value.replace(/\D/g, '').length < 10){
        phone.classList.add('error')
        return;
    }else {
        phone.classList.remove('error');
    }
    let check = js_get_form_info.querySelector('.js_get_check');
    if (!check.checked){
        this.classList.add('error')
        return;
    }else {
        this.classList.remove('error')
    }
    let title = js_get_form_info.querySelector('.js_get_title');
    console.log('ready')
    //	Здесь нужно указать в каком формате мы будем принимать данные вот и все	отличие

    // принцип	тот же самый что и у обычного POST	запроса
    const request = new XMLHttpRequest();
    const url = window.ajaxUrl;
    const params = "action=ajax_visit_kindergarten" +
        "&name=" + name.value +
        "&phone=" + phone.value +
        "&title=" + title.textContent ;

    console.log('url = ' + url)
    request.responseType =	"json";
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {

        if (request.readyState === 4 && request.status === 200) {
            let obj = request.response;

            console.log(obj.result);
            if(obj.result === 'ok'){
                name.value = ''
                phone.value = ''
                check.checked = false

                $.magnificPopup.open({
                    items: {
                        src: '#success_send',
                    },
                    type: 'inline'
                });
            } else {
                $.magnificPopup.open({
                    items: {
                        src: '#error_send',
                    },
                    type: 'inline'
                });
            }
        }
    });
    request.send(params);
})

document.querySelector('.js_form_sub').addEventListener('click', function (e) {
    e.preventDefault();
    let js_get_form_info = this.closest('.js_get_form_info')
    let email = js_get_form_info.querySelector('.js_get_email');
    if (email.value.length < 4){
        email.classList.add('error')
        return;
    }else {
        email.classList.remove('error');
    }
    let title = js_get_form_info.querySelector('.js_get_title');
    console.log('ready')
    //	Здесь нужно указать в каком формате мы будем принимать данные вот и все	отличие

    // принцип	тот же самый что и у обычного POST	запроса
    const request = new XMLHttpRequest();
    const url = window.ajaxUrl;
    const params = "action=ajax_sub_kindergarten" +
        "&email=" + email.value +
        "&title=" + title.textContent ;

    console.log('url = ' + url)
    request.responseType =	"json";
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {

        if (request.readyState === 4 && request.status === 200) {
            let obj = request.response;

            console.log(obj.result);
            if(obj.result === 'ok'){
                email.value = ''
                $.magnificPopup.open({
                    items: {
                        src: '#success_send',
                    },
                    type: 'inline'
                });
            } else {
                $.magnificPopup.open({
                    items: {
                        src: '#error_send',
                    },
                    type: 'inline'
                });
            }
        }
    });
    request.send(params);
})

document.querySelector('.js_form_order').addEventListener('click', js_form_order)
document.querySelector('.js_form_order_mob').addEventListener('click', js_form_order)
document.querySelector('.js_form_order_price').addEventListener('click', js_form_order)

function js_form_order(e) {
    e.preventDefault();
    console.log('js-form-order')
    let js_get_form_info = this.closest('.js_get_form_info')
    let name = js_get_form_info.querySelector('.js_get_name');
    if (name.value.length < 4){
        name.classList.add('error')
        return;
    }else {
        name.classList.remove('error');
    }
    let phone = js_get_form_info.querySelector('.js_get_phone');
    if (phone.value.replace(/\D/g, '').length < 10){
        phone.classList.add('error')
        return;
    }else {
        phone.classList.remove('error');
    }
    let selected = js_get_form_info.querySelector('.js_get_selected');
    let title = js_get_form_info.querySelector('.js_get_title');
    // console.log(selected.value)
    // console.log(title.textContent.trim())
    // console.log('ready')
    //	Здесь нужно указать в каком формате мы будем принимать данные вот и все	отличие

    // принцип	тот же самый что и у обычного POST	запроса
    const request = new XMLHttpRequest();
    const url = window.ajaxUrl;
    const params = "action=ajax_order_kindergarten" +
        "&name=" + name.value +
        "&phone=" + phone.value +
        "&selected=" + selected.value +
        "&title=" + title.textContent.trim() ;

    console.log('url = ' + url)
    request.responseType =	"json";
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //
    request.addEventListener("readystatechange", () => {

        if (request.readyState === 4 && request.status === 200) {
            let obj = request.response;

            console.log(obj.result);
            if(obj.result === 'ok'){
                name.value = ''
                phone.value = ''

                $.magnificPopup.open({
                    items: {
                        src: '#success_send',
                    },
                    type: 'inline'
                });
            } else {
                $.magnificPopup.open({
                    items: {
                        src: '#error_send',
                    },
                    type: 'inline'
                });
            }
        }
    });
    request.send(params);
}