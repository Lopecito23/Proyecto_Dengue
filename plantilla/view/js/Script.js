$(document).ready(function() {
    
    // Escuchar el evento de cambio en el SELECT del Zoocriadero
    $('#id_zoocriadero').on('change', function() {
        var zoocriaderoId = $(this).val();
        var $tanqueSelect = $('#id_tanque');
        
        // 1. Limpiar y deshabilitar el SELECT de Tanques
        $tanqueSelect.html('<option value="">Cargando tanques...</option>').prop('disabled', true);
        
        if (zoocriaderoId) {
            
            // 2. Ejecutar la llamada AJAX
            $.ajax({
                url: URL_TANQUES_AJAX, // Usamos la constante definida en el PHP
                type: 'GET',
                // Enviamos la ID del Zoocriadero bajo la clave que el PHP espera: id_zoocriadero
                data: { id_zoocriadero: zoocriaderoId },
                success: function(response) {
                    // 3. Si la llamada es exitosa, cargar el HTML de vuelta
                    $tanqueSelect.html(response).prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    // Manejo de errores: MUY IMPORTANTE SI SIGUE DANDO 404
                    console.error("Error AJAX al cargar tanques:", status, error);
                    $tanqueSelect.html('<option value="">Error al cargar (Ver consola)</option>').prop('disabled', true);
                }
            });
        } else {
            // Si se selecciona la opción "Seleccione..."
            $tanqueSelect.html('<option value="">Seleccione primero un Zoocriadero</option>').prop('disabled', true);
        }
    });
    
});