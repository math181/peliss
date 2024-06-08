function mostrarCarrito() {
    var carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    var itemsDiv = document.getElementById('items');
    var totalDiv = document.getElementById('total'); 
    itemsDiv.innerHTML = '';
    var total = 0;
    carrito.forEach(function(item, index) {
        var newItem = document.createElement('div');
        newItem.className = 'item';
        newItem.innerHTML = item.producto + ' - Q' + item.precio + ' <button onclick="eliminarPelicula(' + index + ')">Eliminar</button>';
        itemsDiv.appendChild(newItem);
        total += item.precio; 
    });
    totalDiv.textContent = 'Total: Q' + total.toFixed(2); 
}

mostrarCarrito();



