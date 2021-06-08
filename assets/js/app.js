import { config } from './config.js';

    var formUsuarioValidation = $('#formUsuario').validate({
        rules: {
            nombre: "required",
            correo: {
                required: true,
                email: true
            },
            password: "required"
        },
        messages: {
            nombre: "Debe ingresar un nombre",
            correo: {
                required: "Debe ingresar un correo",
                email: "Debe ingresar un correo válido"
            },
            password: "Debe ingresar una contraseña"
        }
    });

    document.getElementById('formUsuario').addEventListener('submit', function(e){
        e.preventDefault();
        if(formUsuarioValidation.valid()){
            registrar();
            resetForm('formUsuario');
        }
    });

    document.getElementById('btnCancelar').addEventListener('click', function(e){
        resetForm('formUsuario');
    });

    function registrar(e) {
        const data = serialize('formUsuario');
        const formData = getFormData(data);
        setLoading('btnGuardar');
        fetch(`${config.baseURL}/usuarios.php`, {
            method: 'POST',
            body: formData
        })
            .then(resp => resp.json())
            .then(val => {
                rmLoading('btnGuardar', 'Guardar');
                alertify.success(val.message);
            });
        resetForm('formUsuario');
    }

    function serialize(formId) {
        const form = document.getElementById(formId);
        let data = {};
        const elements = Array.from(form.elements);
        elements.forEach(element => {
            const { name, value } = element;
            switch (element.tagName) {
                case 'INPUT':
                    data[name] = value;
                    break;
                default:
                    break;
            }
        });
        return data;
    }

    function toQueryString(o) {
        let query = Object.keys(o)
            .map(property => `${property}=${encodeURIComponent(o[property])}`)
            .join("&");
        return query;
    }

    function getFormData(object) {
        const formData = new FormData();
        for (const property in object) {
            formData.append(property, object[property]);
        }
        return formData;
    }

    function resetForm(formId) {
        const form = document.forms.namedItem(formId);
        form.reset();
    }

    function setLoading(target){
        let tg = document.getElementById(target);
        tg.innerHTML = '<i class="fas fa-spinner"></i>';
        tg.disabled = true;
    }

    function rmLoading(target, val){
        let tg = document.getElementById(target);
        tg.innerHTML = val;
        tg.disabled = false;
    }