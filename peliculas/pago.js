document.addEventListener('DOMContentLoaded', function() {
    var pagoData = JSON.parse(localStorage.getItem('pago'));

    if (pagoData) {
        document.getElementById('usuario').value = pagoData.usuario;
        document.getElementById('peliculas').value = pagoData.carrito.map(item => item.id).join(', ');
        document.getElementById('monto').value = pagoData.total;
    }
});
