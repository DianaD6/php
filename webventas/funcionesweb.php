<?php
//MYSQL FUNCTION
function conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "comprasweb";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    return $conn;
}
function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//ALTA CATEGORIA
function generarIdCategoría()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT MAX(id_categoria) FROM categoria;");
    $stmt->execute();

    $maxId = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxId = $maxId['MAX(id_categoria)'];

    if ($maxId != null) {
        if (substr($maxId, 1, 1) <= 9) {
            $nuevoId = "C" . str_pad((substr($maxId, 1) + 1), 3, 0, STR_PAD_LEFT);
        }
    } else {
        $nuevoId = "C001";
    }

    return $nuevoId;
}

function insertarCategoria($nombreCategoria, $idCategoria)
{
    $conn = conectar();
    try {
        $stmt = $conn->prepare("INSERT INTO categoria (ID_CATEGORIA, NOMBRE) VALUES (:idCategoria,:nombre)");
        $stmt->bindParam(':idCategoria', $idCategoria);
        $stmt->bindParam(':nombre', $nombreCategoria);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    echo "<br>La categoría <strong>" . $nombreCategoria . "</strong> con el ID <strong>" . $idCategoria . "</strong> ha sido creada con éxito.";
}

function obtenerCategoriasPorNombre($nombreCategoria) //funcion que busca categorias por el nombre recibido
{
    $conn = conectar();
    $nombresCategorias = array();
    $stmt = $conn->prepare("SELECT nombre FROM categoria WHERE nombre = :nombreCategoria");
    $stmt->bindParam(':nombreCategoria', $nombreCategoria);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $nombresCategorias = $stmt->fetchAll();

    return $nombresCategorias;
}


//ALTA PRODUCTO

function obtenerCategorias()
{
    $conn = conectar();
    $categorias = array();
    $stmt = $conn->prepare("SELECT nombre FROM categoria");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $categorias = $stmt->fetchAll();

    return $categorias;
}

function obtenerIdCategoriaPorNombre($nombreCategoria)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT ID_CATEGORIA FROM categoria WHERE nombre = :nombreCategoria");
    $stmt->bindParam(':nombreCategoria', $nombreCategoria);
    $stmt->execute();
    $idCategoria = $stmt->fetch(PDO::FETCH_ASSOC);

    return $idCategoria['ID_CATEGORIA'];
}

function generarIdProducto()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT MAX(id_producto) FROM producto;");
    $stmt->execute();
    $maxId = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxId = $maxId['MAX(id_producto)'];

    if ($maxId != null) {
        if (substr($maxId, 1, 1) <= 9) {
            $nuevoId = "P" . str_pad((substr($maxId, 1) + 1), 4, 0, STR_PAD_LEFT);
        }
    } else {
        $nuevoId = "P0001";
    }

    return $nuevoId;
}

function insertarProducto($idProducto, $nombreProducto, $precio, $idCategoria)
{
    $conn = conectar();
    try {
        $stmt = $conn->prepare("INSERT INTO producto VALUES (:idProducto, :nombre, :precio, :idCategoria)");
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':nombre', $nombreProducto);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':idCategoria', $idCategoria);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    echo "<br>El producto <strong>" . $nombreProducto . "</strong> con el ID <strong>" . $idProducto . "</strong> ha sido creado con éxito.";
}
function obtenerProductoPorNombre($nombreProducto, $nombreCategoria)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT producto.* FROM producto, categoria WHERE categoria.ID_CATEGORIA = producto.ID_CATEGORIA
    AND producto.nombre = :nombreProducto AND categoria.nombre = :nombreCategoria");
    $stmt->bindParam(':nombreProducto', $nombreProducto);
    $stmt->bindParam(':nombreCategoria', $nombreCategoria);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $producto;
}

//ALTA ALMACEN
function generarNumeroAlmacen()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT MAX(num_almacen) FROM almacen;");
    $stmt->execute();

    $maxNum = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxNum = $maxNum['MAX(num_almacen)'];

    if ($maxNum != null) {
        if (substr($maxNum, 1, 1) <= 9) {
            $nuevoNum = $maxNum + 1;
        }
    } else {
        $nuevoNum = "1";
    }

    return $nuevoNum;
}

function insertarAlmacen($numAlmacen, $localidad)
{
    $conn = conectar();
    try {
        $stmt = $conn->prepare("INSERT INTO almacen VALUES (:numAlmacen, :localidad)");
        $stmt->bindParam(':numAlmacen', $numAlmacen);
        $stmt->bindParam(':localidad', $localidad);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    echo "<br>El almacen numero <strong>" . $numAlmacen . "</strong> en <strong>" . $localidad . "</strong> ha sido creado con éxito.";
}

//APROVISIONAR PRODUCTOS
function obtenerProductos()
{
    $conn = conectar();
    $productos = array();
    $stmt = $conn->prepare("SELECT * FROM producto");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $productos = $stmt->fetchAll();

    return $productos;
}

function obtenerAlmacenes()
{
    $conn = conectar();
    $almacenes = array();
    $stmt = $conn->prepare("SELECT num_almacen FROM almacen");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $almacenes = $stmt->fetchAll();

    return $almacenes;
}

function actualizarInsertar($cantidad, $idProducto, $numAlmacen)
{
    $conn = conectar();
    $stmt = $conn->prepare("UPDATE almacena
    SET cantidad = cantidad + :cantidad
    WHERE ID_PRODUCTO = :idProducto AND NUM_ALMACEN = :numAlmacen");
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':idProducto', $idProducto);
    $stmt->bindParam(':numAlmacen', $numAlmacen);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Se ha actualizado el almacen <strong>" . $numAlmacen . "</strong> correctamente.";
    } else {
        $stmt = $conn->prepare("INSERT INTO almacena VALUES(:numAlmacen, :idProducto, :cantidad)");
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':numAlmacen', $numAlmacen);
        $stmt->execute();
        echo "Se ha introducido un nuevo producto en el almacen <strong>" . $numAlmacen . "</strong>";
    }
}

//CONSULTA DE STOCK
function obtenerCantidadProductos($idProducto)
{
    $conn = conectar();
    $productos = array();
    $stmt = $conn->prepare("SELECT NUM_ALMACEN, cantidad FROM almacena
    WHERE ID_PRODUCTO = :idProducto");
    $stmt->bindParam(':idProducto', $idProducto);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $productos = $stmt->fetchAll();

    return $productos;
}
function mostrarCantidadProductos($productos)
{
    echo "<br><table border=1>";
    echo "<tr><td>Almacen</td><td>Cantidad</td></tr>";
    foreach ($productos as $producto) {
        echo "</tr>";
        echo "<td>" . $producto["NUM_ALMACEN"] . "</td>";
        echo "<td>" . $producto["cantidad"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function obtenerProductoPorId($idProducto)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT nombre from producto where id_producto = :idProducto;");
    $stmt->bindParam(':idProducto', $idProducto);
    $stmt->execute();
    $nombreProducto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $nombreProducto["nombre"];
}

//CONSULTA ALMACENES
function obtenerProductosPorAlmacen($numAlmacen)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT a.NUM_ALMACEN, p.ID_PRODUCTO, p.NOMBRE, a.CANTIDAD , almacen.LOCALIDAD FROM almacena a, producto p, almacen WHERE a.ID_PRODUCTO = p.ID_PRODUCTO
    AND almacen.NUM_ALMACEN = a.NUM_ALMACEN
    AND a.num_almacen = :numAlmacen");
    $stmt->bindParam(':numAlmacen', $numAlmacen);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $productos = $stmt->fetchAll();

    return $productos;
}

function mostrarProductosPorAlmacen($productos)
{
    echo "<br><table border=1>";
    echo "</tr>";
    foreach ($productos[0] as $key => $valor) { //hacemos el table header accediendo a la key del primer producto
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    foreach ($productos as $producto) {
        echo "</tr>";
        foreach ($producto as $key => $valor) { //por cada producto creamos una fila 
            echo "<td>" . $valor . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

//CONSULTA DE COMPRAS POR CLIENTE
function obtenerNifCliente()
{
    $conn = conectar();
    $nifs = array();
    $stmt = $conn->prepare("SELECT nif FROM cliente");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $nifs = $stmt->fetchAll();

    return $nifs;
}

function obtenerNombreApellidoPorNif($nif)
{
    $conn = conectar();
    $nombre = array();
    $stmt = $conn->prepare("SELECT nombre, apellido FROM cliente WHERE nif = :nif");
    $stmt->bindParam(':nif', $nif);
    $stmt->execute();

    $stmt->execute();
    $nombre = $stmt->fetch(PDO::FETCH_ASSOC);

    return $nombre;
}


// function obtenerComprasPorCliente($nif, $fechaInicio, $fechaFin)
// {
    
//     $conn = conectar();
//     $stmt = $conn->prepare("SELECT producto.ID_PRODUCTO, producto.NOMBRE, compra.UNIDADES, producto.PRECIO, producto.PRECIO * compra.UNIDADES AS TOTAL, compra.FECHA_COMPRA
//     FROM compra, producto
//     WHERE compra.ID_PRODUCTO = producto.ID_PRODUCTO
//     AND compra.nif = :nif
//     AND compra.FECHA_COMPRA BETWEEN :fechaInicio AND :fechaFin");
//     $stmt->bindParam(':nif', $nif);
//     $stmt->bindParam(':fechaInicio', $fechaInicio);
//     $stmt->bindParam(':fechaFin', $fechaFin);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $compras = $stmt->fetchAll();

//     return $compras;
// }

function obtenerComprasPorCliente($nif, $fechaInicio, $fechaFin)
{
    $consulta = "SELECT producto.ID_PRODUCTO, producto.NOMBRE, compra.UNIDADES, producto.PRECIO, producto.PRECIO * compra.UNIDADES AS TOTAL, compra.FECHA_COMPRA
    FROM compra, producto
    WHERE compra.ID_PRODUCTO = producto.ID_PRODUCTO
    AND compra.nif = :nif";

    $conn = conectar();
    $stmt = $conn->prepare($consulta);
    if (!empty($fechaInicio) && !empty($fechaFin)) {
        $consulta = $consulta . " AND compra.FECHA_COMPRA BETWEEN :fechaInicio AND :fechaFin";
        $stmt = $conn->prepare($consulta);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
    }

    $stmt->bindParam(':nif', $nif);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $compras = $stmt->fetchAll();

    return $compras;
}

function mostrarComprasPorCliente($compras)
{
    if (empty($compras)) {
        echo "<br>No existe registro de compras entre las fechas seleccionadas";
        die();
    }

    echo "<br><br><table border=1>";
    echo "</tr>";
    foreach ($compras[0] as $key => $valor) { //hacemos el table header accediendo a la key del primer producto
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    foreach ($compras as $compra) {
        echo "</tr>";
        foreach ($compra as $key => $valor) { //por cada producto creamos una fila 
            echo "<td>" . $valor . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function obtenerMontanteTotalComprasPorNif($nif)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT count(*) FROM compra
    WHERE nif= :nif");
    $stmt->bindParam(':nif', $nif);
    $stmt->execute();

    $totalCompras = $stmt->fetch(PDO::FETCH_ASSOC);

    return $totalCompras["count(*)"];
}


//ALTA CLIENTES

function insertarCliente($nif, $nombre, $apellido, $cp, $direccion, $ciudad)
{
    $conn = conectar();
    try {
        $stmt = $conn->prepare("INSERT INTO cliente VALUES (:nif, :nombre, :apellido, :cp, :direccion, :ciudad)");
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    echo "<br>Cliente <strong>" . $nombre . " " . $apellido . "</strong> con NIF <strong>" . $nif . "</strong> ha sido creado con éxito.";
}

function obtenerClientePorNif($nif) //funcion que busca categorias por el nombre recibido
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE nif = :nif");
    $stmt->bindParam(':nif', $nif);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $clientes = $stmt->fetchAll();

    return $clientes;
}

//COMPRA DE PRODUCTO
function obtenerMaximoStockPorProducto($idProducto)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT MAX(cantidad)
    FROM almacena
    WHERE id_producto = :idProducto;");
    $stmt->bindParam(':idProducto', $idProducto);
    $stmt->execute();
    $maxStock = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxStock = $maxStock['MAX(cantidad)'];


    return $maxStock;
}

function actualizarAlmacena($idProducto, $cantidad)
{
    $maxStock = obtenerMaximoStockPorProducto($idProducto);
    $conn = conectar();
    $query = "UPDATE almacena 
    SET cantidad = cantidad - :cantidad 
    WHERE id_producto = :idProducto 
    AND cantidad = :maxStock";


    if ($cantidad <= $maxStock) {

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':maxStock', $maxStock);
        $stmt->execute();
    } else {
        $diferencia = $cantidad - $maxStock;

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':cantidad', $maxStock);
        $stmt->bindParam(':maxStock', $maxStock);
        $stmt->execute();

        actualizarAlmacena($idProducto, $diferencia);
    }
}

function insertarCompra($nif, $idProducto, $cantidad){
    $hoy = date("Y-m-d");
    $conn = conectar();
    try {
        $stmt = $conn->prepare("INSERT INTO compra VALUES (:nif,:idProducto, :fechaCompra, :cantidad)");
        $stmt->bindParam(':nif', $nif);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':fechaCompra', $hoy);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }
    echo "Su compra ha sido realizada con éxito. <br> ¡Muchas gracias!";
}
