document.addEventListener('DOMContentLoaded', function () {
    const observacionesSelect = document.getElementById('observaciones');
    const observacionTextoContainer = document.getElementById('observacion_texto_container');
    const conformidadClienteSelect = document.getElementById('conformidad_cliente');
    const conformidadTextoContainer = document.getElementById('conformidad_texto_container');

    if (observacionesSelect) {
        observacionesSelect.addEventListener('change', function () {
            if (this.value == '1') {
                observacionTextoContainer.style.display = '';
            } else {
                observacionTextoContainer.style.display = 'none';
            }
        });
    }

    if (conformidadClienteSelect) {
        conformidadClienteSelect.addEventListener('change', function () {
            if (this.value == '0') {
                conformidadTextoContainer.style.display = '';
            } else {
                conformidadTextoContainer.style.display = 'none';
            }
        });
    }
});