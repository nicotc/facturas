<!DOCTYPE html>
<html>

<head>
    <title>Presupuesto - #202211001 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{ asset('lte-dist/css/adminlte.min.css') }}">

</head>

<body>

    <table class="table table-borderless" style="margin-top: 5cm" >
        <tr>
            <td colspan="3" style="text-align: center; vertical-align: middle;">
                <img src="{{ asset('/lte-dist/img/logo.png') }}" width="300"  >
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; vertical-align: middle;">
                <h1>{{ $contactClient->name }}</h1>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; vertical-align: middle;">
                <h2># {{ $budget->correlative }}</h2>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle;">
              <b>Orden de compra:</b><br> <h5>$ {{ $presupuesto }}</h5>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                   <b>Relacion de Gastos:</b><br> <h5>$ {{ $gastos }}</h5>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                        <b>Utilidad:</b><br> <h5>$ {{ $presupuesto - $gastos }}</h5>
                    </td>
        </tr>
    </table>












</body>

</html>
