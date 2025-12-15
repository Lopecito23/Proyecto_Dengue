<?php

// Ya tienes esta inclusión, la mantenemos como base.
include_once '../model/MasterModel.php';

class SeguimientosController
{
    // Usamos una propiedad para almacenar la instancia de MasterModel
    protected $obj;

    public function __construct()
    {
        // 1. Inicializar el MasterModel para que esté disponible en todos los métodos (getCreate, getList, etc.)
        $this->obj = new MasterModel();
    }

    // --- FUNCIÓN DE UTILIDAD: Obtener Zoocriaderos (Para la vista) ---
    public function getZoocriaderos()
    {
        // Usamos la instancia del modelo ($this->obj)
        $sql = "SELECT id_zoocriadero, direccion FROM zoocriadero ORDER BY direccion";
        $resultado = $this->obj->select($sql);

        $zoocriaderos_data = [];
        if ($resultado) {
            // Usar pg_fetch_all si trabajas con PostgreSQL
            $zoocriaderos_data = pg_fetch_all($resultado);
        }
        return $zoocriaderos_data;
    }

    // --- FUNCIÓN DE UTILIDAD: Obtener Actividades (Ajustada para usar $this->obj) ---
    public function getActividades()
    {
        $sql = "SELECT id_actividad, nombre FROM actividad ORDER BY nombre";
        $resultado = $this->obj->select($sql);

        $actividades_data = [];
        if ($resultado) {
            $actividades_data = pg_fetch_all($resultado);
        }
        return $actividades_data;
    }

    // --- FUNCIÓN PRINCIPAL: Carga del Formulario (Ajustada para inyectar datos) ---
    public function getCreate()
    {
        // 1. Obtener los datos necesarios para la vista (actividades y zoocriaderos)
        $actividades_data = $this->getActividades();
        $zoos = $this->getZoocriaderos(); // <-- Obtener Zoocriaderos (la vista espera la variable $zoos)

        // 2. Empacar y Extracción para que las variables sean accesibles en la vista
        $data_form = [
            'actividades_data' => $actividades_data,
            'zoos' => $zoos, // La vista espera $zoos
        ];

        extract($data_form);

        // 3. Incluir la vista
        include_once '../view/Seguimientos/createSeguimientos.php'; // Cambia esta ruta si no es correcta
    }

    // --- FUNCIÓN AJAX: Obtener Tanques por Zoocriadero ---
    public function getTanquesByZoocriadero()
    {
        // 1. Obtener el ID del Zoocriadero enviado por AJAX
        $id_zoocriadero = $_GET['id_zoocriadero'] ?? null;
        $options = '<option value="">No se encontraron tanques</option>';

        if (is_numeric($id_zoocriadero)) {
            // 2. Consulta SQL: Asume que 'tanques' tiene las columnas 'id' y 'nombre', 
            // y la clave foránea 'id_zoocriadero'
            $sql = "SELECT id, nombre FROM tanques WHERE id_zoocriadero = $id_zoocriadero ORDER BY nombre";

            $resultado = $this->obj->select($sql);
            $tanques = [];
            if ($resultado) {
                $tanques = pg_fetch_all($resultado);
            }

            // 3. Generar las opciones HTML
            if (!empty($tanques)) {
                $options = '<option value="">Seleccione un tanque</option>';
                foreach ($tanques as $tanque) {
                    $options .= '<option value="' . $tanque['id'] . '">' . htmlspecialchars($tanque['nombre']) . '</option>';
                }
            } else {
                $options = '<option value="">No hay tanques asignados</option>';
            }
        }

        echo $options;
        exit;
    }

    // --- MÉTODOS ORIGINALES (Ajustados para usar $this->obj) ---
  public function postCreate()
{
    // Captura de datos del formulario via POST
    
    // 1. Datos de Referencia (Obligatorios/Esenciales)
    $fecha = $_POST['fecha'];
    // Captura el ID del responsable desde el campo oculto
    $id_responsable = $_POST['id_responsable']; 
    
    // 2. Asociación Zoocriadero/Tanque (Se asume que la FK es el tanque)
    $id_tanque = $_POST['id_tanque'];
    $id_actividad = $_POST['id_actividad']; 

    // 3. Parámetros del Agua
    $temperatura = $_POST['temperatura'];
    $ph = $_POST['ph'];
    $cloro = $_POST['cloro']; 

    // 4. Conteos
    $num_alevines = $_POST['num_alevines'];
    $num_machos = $_POST['num_machos'];
    $num_hembras = $_POST['num_hembras'];
    $num_muertes = $_POST['num_muertes'] ?? 0; // Usar 0 si no se ingresa
    $total = $_POST['total'] ?? null; // Puede ser opcional/nulo

    // 5. Observaciones
    $observaciones = $_POST['observaciones']; // En el formulario se llama 'observaciones'
    
    
    // --- Lógica de Inserción ---
    
    // Usando el MasterModel inicializado en el constructor
    $obj = $this->obj; 

    // Obtener el ID de autoincremento
    $id = $obj->autoIncrement("seguimientos", "id_seguimiento"); 

    // Construcción de la consulta SQL de inserción
    // NOTA IMPORTANTE: Los campos de texto y fecha (como $fecha y $observaciones)
    // deben ir entre comillas simples en el SQL, y los numéricos no.
    
    $sql = "INSERT INTO seguimientos 
            (id_seguimiento, fecha, id_responsable, id_tanque, id_actividad, 
             temperatura, ph, cloro, num_alevines, num_machos, num_hembras, 
             num_muertes, total, observaciones) 
            VALUES 
            ($id, 
             '$fecha', 
             $id_responsable, 
             $id_tanque, 
             $id_actividad, 
             $temperatura, 
             $ph, 
             $cloro, 
             $num_alevines, 
             $num_machos, 
             $num_hembras, 
             $num_muertes, 
             $total, 
             '$observaciones')";

    $ejecutar = $obj->insert($sql);

    // --- Lógica de Redirección/Respuesta ---

    if ($ejecutar) {
        // Redireccionar al formulario de nuevo con un mensaje de éxito (si tu framework lo soporta)
        redirect(getUrl("Seguimientos", "Seguimientos", "getCreate"));
    } else {
        // En caso de fallo de inserción (ej: error SQL)
        echo "Error al intentar insertar el seguimiento. Consulta: " . htmlspecialchars($sql);
    }
}


    public function getList()
    {
        $sql = "SELECT s.*, a.nombre AS actividad_nombre
                 FROM seguimiento s
                 JOIN actividad a ON s.id_actividad = a.id_actividad
                 ORDER BY s.id_seguimiento";

        $resultado = $this->obj->select($sql);
        if ($resultado) {
            $seguimientos_data = pg_fetch_all($resultado);
        } else {
            $seguimientos_data = [];
        }

        include_once '../view/Seguimientos/listSeguimientos.php';
    }
}

?>