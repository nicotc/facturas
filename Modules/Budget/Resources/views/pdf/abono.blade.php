<!DOCTYPE html>
<html>
<head>
    <title>Presupuesto  - #202211001 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

    <style type="text/css">
        /* -- Base -- */

        body {
            font-family: "DejaVu Sans";
        }

        html {
            margin: 0px;
            padding: 0px;
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
        }

        hr {
            color: rgba(0, 0, 0, 0.2);
            border: 0.5px solid #EAF1FB;
        }

        /* -- Header -- */

        .header-container {
            margin-top: -30px;
            width: 100%;
            padding: 0px 30px;
        }

        .header-logo {

            text-transform: capitalize;
            color: #817AE3;
            padding-top: 0px;
            height: 140px;
        }


        .company-name {

            font-size: 20px;
            font-weight: 650;
            color: #595959;
            margin-bottom: 0px;
        }

        .company-address-container {
            width: 60%;
            margin-bottom: 2px;
            padding-left: 10px;
            padding-right: 6px;
        }

        .company-address {
            margin-top: 12px;
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            word-wrap: break-word;
        }

        .company-rif-container{
            width: 40%;
            margin-bottom: 2px;
            padding-left: 10px;
            padding-right: 6px;
        }

        .company-rif{
            margin-top: 12px;
            font-size: 12px;
            line-height: 15px;
            word-wrap: break-word;
            padding: -40px;
        }
        /* -- Content Wrapper  */

        .content-wrapper {
            display: block;
            padding-top: 0px;
            padding-bottom: 20px;
        }

        .customer-address-container {
            display: block;
            float: left;
            width: 45%;
            padding: 10px 0 0 30px;
        }

        /* -- Shipping -- */
        .shipping-address-container {
            float: right;
            display: block;
        }

        .shipping-address-container--left {
            float: left;
            display: block;
            padding-left: 0;
        }

        .shipping-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 5px;
            width: 160px;
            word-wrap: break-word;
        }

        /* -- Billing -- */

        .billing-address-container {
            display: block;
            float: left;
        }

        .billing-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 5px;
            width: 160px;
            word-wrap: break-word;
        }

        /*  -- Estimate Details -- */

        .invoice-details-container {
            display: block;
            float: right;
            padding: 10px 30px 0 0;
        }

        .attribute-label {
            font-size: 12px;
            line-height: 18px;
            text-align: left;
            color: #55547A
        }

        .attribute-value-left {
            font-size: 12px;
            line-height: 18px;
            text-align: left;
            }


.attribute-value-center {
            font-size: 12px;
            line-height: 18px;
            text-align: center;
            }


.attribute-label-center{
        font-size: 12px;
        line-height: 18px;
        text-align: center;
        color: #55547A
        }


        .attribute-value {
            font-size: 12px;
            line-height: 18px;
            text-align: right;
        }

        /* -- Items Table -- */

        .items-table {
            margin-top: 35px;
            padding: 0px 30px 10px 30px;
            page-break-before: avoid;
            page-break-after: auto;
        }

        .items-table hr {
            height: 0.1px;
        }

        .item-table-heading {
            font-size: 13.5;
            text-align: center;
            color: rgba(0, 0, 0, 0.85);
            padding: 5px;
            color: #55547A;
        }

        tr.item-table-heading-row th {
            border-bottom: 0.620315px solid #E8E8E8;
            font-size: 12px;
            line-height: 18px;
        }

        tr.item-row td {
            font-size: 12px;
            line-height: 18px;
        }

        .item-cell {
            font-size: 13;
            text-align: center;
            padding: 5px;
            padding-top: 10px;
            color: #040405;
        }

        .item-description {
            color: #595959;
            font-size: 11px;
            line-height: 12px;
        }

        .item-cell-table-hr {
            margin: 0 30px 0 30px;
        }

        /* -- Total Display Table -- */

        .total-display-container {
            padding: 0 25px;
        }


        .total-display-table {
            border-top: none;
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
            margin-top: 20px;
            float: right;
            width: auto;
        }

        .total-table-attribute-label {
            font-size: 12px;
            color: #55547A;
            text-align: left;
            padding-left: 10px;
        }

        .total-table-attribute-value {
            font-weight: bold;
            text-align: right;
            font-size: 12px;
            color: #040405;
            padding-right: 10px;
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .total-border-left {
            border: 1px solid #E8E8E8 !important;
            border-right: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        .total-border-right {
            border: 1px solid #E8E8E8 !important;
            border-left: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        /* -- Notes -- */
        .notes {
            font-size: 12px;
            color: #595959;
            margin-top: 15px;
            margin-left: 30px;
            width: 442px;
            text-align: left;
            page-break-inside: avoid;
        }

        .notes-label {
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            color: #040405;
            width: 108px;
            white-space: nowrap;
            height: 19.87px;
            padding-bottom: 10px;
        }

        .observaciones-titulo {
                font-size: 0.7em;
                color: #595959;
                }

        .observaciones {
           font-size: 0.5em;
            color: #595959;
        }
        /* -- Helpers -- */

        .text-primary {
            color: #5851DB;
        }

        .text-center {
            text-align: center
        }

        table .text-left {
            text-align: left;
        }

        table .text-right {
            text-align: right;
        }

        .border-0 {
            border: none;
        }

        .py-2 {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .py-8 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .py-3 {
            padding: 3px 0;
        }

        .pr-20 {
            padding-right: 20px;
        }

        .pr-10 {
            padding-right: 10px;
        }

        .pl-20 {
            padding-left: 20px;
        }

        .pl-10 {
            padding-left: 10px;
        }

        .pl-0 {
            padding-left: 0;
        }


        td .bordeexterno {
            border:hidden;
        }

        table .bordeexterno  {
            margin-top: 10px;
            border: 2px solid #000000;
            text-align: center;

        }

        .frase{
            font-size: 1.2em;
            color: #595959;
            text-align: center
        }

        .container {
            width: 19.5cm;
            margin: 0 auto;
            padding: 0 0.5cm;
        }


        footer{
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5cm;
        }

    </style>
</head>

<body>
    <div class="header-container">
        <table width="100%" >
            <tr>
                <td width="10%" class="header-section-left">
                    <img class="header-logo"  src="{{ asset('lte-dist/img/AdminLTELogo.png') }}" >
                </td>
                <td width="50%" class="company-address-container company-address">
                    <div class="company-address">
                        <div class="company-name">
                            <strong>{{ strtoupper("Remodela tu mundo 88, C.A.") }}</strong>
                        </div>
                        <div class="company-address">
                           Avenida ávila, Los dos caminos
                        </div>
                        <div class="company-phone">
                            Teléfono: 0212-2834649
                        </div>
                        <div class="company-email">
                            Correo: remodelatumundo@gmail.com
                        </div>
                        <div class="company-email">
                                Ig: remodelatumundo
                            </div>
                        <div>
                            <strong> RIF: J-40900000-0</strong>
                        </div>
                    </div>
                </td>
                <td width="40%" class="company-rif-container company-rif">

                    <table >
                        <tr>
                            <td class="attribute-label-center">
                                <strong> Numero de Presupuesto </strong>
                            </td>
                        <tr>
                            <td  class="attribute-label-center" >
<strong>{{ $budget->correlative }}</strong>
                            </td>
                        </tr>
                        <tr class="attribute-value-center">
                            <td>
<strong> Fecha de Emisión:</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="attribute-label-center">
<strong> {{ $budget->created_at->format('d/m/Y') }}</strong>
                            </td>
                        </tr>
                        <tr class="attribute-value-center" >
                            <td>
                          <strong>  {{ $services->name }}</strong>
                            </td>
                        </tr>
                      <tr>
                        <td>
                            <strong>&nbsp;</strong>
                        </td>
                        <td>
                            <strong>&nbsp;</strong>
                        </td>
                        <td>
                            <strong>&nbsp;</strong>
                        </td>
                        <td>
                            <strong>&nbsp;</strong>
                        </td>
                        <td>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <hr class="header-bottom-divider">
<div class="container">
    <table width="100%" style="border: 1px solid #000000;">

        <tr>
            <td style="font-size: 12px;">
                <b>Nombre y Apellido o Razón Social:</b>
            </td>
            <td style="font-size: 14px;">
                {{ $contactClient->name }}
            </td>
            <td style="font-size: 12px;">
                <b>RIF / C.I.:</b>
            </td>
            <td style="font-size: 14px;">
                {{ $contactClient->type }}-{{ $contactClient->rif }}
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;">
                <b>Teléfono:</b>
            </td>
            <td style="font-size: 14px;">
                {{ $contactClient->phone }}
            </td>
            <td style="font-size: 12px;">
                <b>Email:</b>
            </td>
            <td style="font-size: 14px;">
                {{ $contactClient->email }}
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;">
                <b> Domicilio Fiscal:</b>
            </td>
            <td style="font-size: 14px;" colspan="3">
                {{ $contactClient->address }}
            </td>

        </tr>
        <tr>
            <td style="font-size: 12px;"><b>Dierección de la obra:</b></td>
            <td style="font-size: 14px;" colspan="3">
                {{ $budget->AddressName }}
            </td>
    </table>
</div>


    <div class="container" style="margin-top:5px">
        {{-- <h5 class="mt-3 mb-3">Abono de pago a orden de compra {{$abono->numero_orden}}</h5> --}}
<h5 class="mb-3">Comprobante de cobro</h5>
        <table class="table">
            <tr>
                <th>
                    Orden de compra # {{$abono->numero_orden}}
                </th>
                <th>
                    $ {{$presupuesto}}
                </th>
            </tr>
        </table>


        <table class="table">
            <thead>
            <tr>
                <th>
                    Fecha
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Abono
                </th>
            </tr>
            </thead>
            <tbody>
            @php
                $totalAbonos = 0;
            @endphp
            @forelse ($abonos as $ab)
                <tr>
                    <td>
                       {{ $ab->fecha }}
                    </td>
                    <td>
                        {{ $ab->descripcion }}
                    </td>
                    <td>
                       $ {{ $ab->abonado }}
                       @php
                           $totalAbonos = $totalAbonos+ $ab->abonado;
                       @endphp
                    </td>
                </tr>
            @empty

            @endforelse

            <tr>
                <td>
                   <b> {{ $abono->fecha }}</b>
                </td>
                <td>
                    <b> {{ $abono->descripcion }}</b>
                </td>
                <td>
                   <b>$ {{ $abono->abonado }}</b>
                   @php
                       $totalAbonos = $totalAbonos+ $abono->abonado;
                   @endphp
                </td>
            </tr>
        </tbody>

            <tfoot>
            <tr>
                <td colspan="2">
                    <b class="float-right">Total Abonado</b>
                </td>
                <td >
                    <b>$ {{$totalAbonos}}</b>
                </td>

            </tr>
            </tfoot>
        </table>


        <table class="table">
                    <tr>
                        <th>
                           Resta por pagar
                        </th>
                        <th>
                            $ {{$presupuesto-$totalAbonos}}
                        </th>
                    </tr>
                </table>

        {{-- @dump($abono) --}}



    </div>


<footer>
    <div class="container" style="margin-top:5px">
        <table width="100%" style="">
            <tr>
                <td style="text-align: center;">
                    <hr style="border-top: 1px solid black;">
                   <b>Firma</b>
                </td>
                <td style="text-align: center;">

                </td>
                <td style="text-align: center">
                    <hr style="border-top: 1px solid black;">
                    <b>Firma</b>
                </td>
            </tr>

        </table>

        <table width="100%" style="margin-top:30px">
            <tr>
                <td class="frase">
                    ¡DALE ESE CAMBIO QUE TANTO NECESITA TU ESPACIO!
                </td>
            </tr>
        </table>
    </div>
</footer>
</body>
</html>


