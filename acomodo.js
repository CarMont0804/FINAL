function mostrarImagen(imagen) {
    // Ocultar todas las miniaturas de imágenes
    var miniaturas = document.querySelectorAll('.miniatura');
    miniaturas.forEach(function(miniatura) {
        miniatura.style.display = 'none';
    });

    // Mostrar la imagen en grande
    var imagenGrande = document.createElement('img');
    imagenGrande.src = imagen.src;
    imagenGrande.classList.add('imagen-grande');
    document.body.appendChild(imagenGrande);

    // Escuchar el evento de clic en la imagen en grande para cerrarla
    imagenGrande.addEventListener('click', function() {
        document.body.removeChild(this);
        // Mostrar nuevamente todas las miniaturas de imágenes
        miniaturas.forEach(function(miniatura) {
            miniatura.style.display = 'inline-block';
        });
    });
}
