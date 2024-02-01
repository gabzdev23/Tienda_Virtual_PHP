<?php
    require "vendor/autoload.php";
    use Dompdf\Dompdf;

    $errores = [];
    $msgExito = [];

    if(!empty($_POST["btnPagar"])) {
        session_start();
        $idUsuario = $_SESSION["idUsuario"];

        $query = "SELECT SUM(carrito.precio) AS sub_total, SUM(carrito.envio) AS shipping_cost, SUM(carrito.cantidad) AS cantidad FROM carrito WHERE id_usua= $idUsuario";

        $executeQuery = mysqli_query($conexion, $query);
        $res = mysqli_fetch_assoc($executeQuery);

        $cantidad = $res["cantidad"];
        $subTotal = $res["sub_total"];
        $total = $res["sub_total"] + $res["shipping_cost"];

        $fecha = date("d/m/Y");

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $pais = $_POST["pais"];
        $codPost = $_POST["codPost"];
        $ciudad = $_POST["ciudad"];
        $telefono = $_POST["telefono"];

        
        
        $html="
        <html>
        <head>
            <meta charset='UTF-8' />
        </head>
        <body>
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    margin: 0 auto;
                }
                header {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 50px;
                }
                h1 {
                    font-weight: 700;
                }

                table {
                    margin-top: 20px;
                    border-radius: 5px;
                    width: 100%;
                }

                td {
                    font-size: 14px;
                    text-align: center;
                    padding-bottom: 20px;
                    padding-top: 10px;
                }

                .num-factura p {
                    font-size: 20px;
                    font-weight: 700;
                }
                .num-factura span {
                    font-size: 30px;
                }

                .firma {
                    border: 1px solid #252525;
                    border-radius: 2px;
                    width: 45%;
                    height: 60px;
                }

                .cont-firmas {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 30px;
                }
            </style>

            <header>
                <div>
                    <h1>Tienda Shoes</h1>
                    <p>Falcon - Punto Fijo</p>
                    <p>Telefono: 0000000</p>
                </div>

                <div class='num-factura' >
                    <p>Factura N°</p>
                    <span>00667</span>
                </div>
            </header>

            <table border='1' cellpadding='5' cellspacing='0'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$nombre</td>
                        <td>$apellido</td>
                        <td>$telefono</td>
                        <td>$direccion</td>
                        <td>$ciudad</td>
                        <td>$pais</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th colspan='2'>Total</th>
                    </tr>
                    <tr>
                        <td>$fecha</td>
                        <td>Botas</td>
                        <td>$cantidad</td>
                        <td>$$subTotal</td>
                        <td colspan='2'>$$total</td>
                    </tr>
                </tfoot>
            </table>

            <div class='cont-firmas'>
                <fieldset class='firma'>
                    <legend>Elaborada Por</legend>
                </fieldset>
                <fieldset class='firma'>
                    <legend>Recibi conforme</legend>
                </fieldset>
            </div>
        </body>
    </html>
        ";

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("factura.pdf", array('Attachment'=> '0'));
    }