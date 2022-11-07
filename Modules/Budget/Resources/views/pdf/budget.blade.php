<!DOCTYPE html>
<html>
<head>
    <title>Presupuesto  - #202211001 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
                                <strong> Cod#: {{ $budget->correlative }} </strong>
                            </td>
                        <tr>
                            <td  class="attribute-label-center" >
                             Fecha de Emisión:
                            </td>
                        </tr>
                        <tr class="attribute-value-center">
                            <td>
                                <strong> {{ $budget->created_at->format('d/m/Y') }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="attribute-label-center">
                                Fecha de Expira:
                            </td>
                        </tr>
                        <tr class="attribute-value-center" >
                            <td>
                                <strong>{{ $budget->created_at->addDay(5)->format('d/m/Y') }} </strong>
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
                        <td></td>
                        <td width="35%" class="attribute-label">
                            Nombre y Apellido o Razón Social:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $contactClient->name }}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td width="35%" class="attribute-label">
                            Domicilio Fiscal:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $contactClient->address }}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td width="35%" class="attribute-label">
                            Teléfono:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $contactClient->phone }}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td width="35%" class="attribute-label">
                            Email:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $contactClient->email }}
                        </td>
                        <td></td>
                    <tr>
                        <td></td>
                        <td width="35%" class="attribute-label">
                            RIF / C.I.:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $contactClient->type }}-{{ $contactClient->rif }}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td width="35%" class="attribute-label">
                            Dierección de la obra:
                        </td>
                        <td width="55%" class="attribute-value-left">
                            {{ $budget->AddressName }}
                        </td>
                        <td></td>
                    </tr>


                </table>
    </div>


    <div class="container" style="margin-top:5px">
        <table width="100%" style="border: 1px solid #000000;">
            <thead style="border: 1px solid #000000;">
                <tr>
                    <th style="width:2cm">
                        <strong>Modelo</strong>
                    </th>
                    <th style="width:1cm">
                        <strong>Cant</strong>
                    </th>
                    <th style="width:10cm">
                        <strong>Descripción</strong>
                    </th>
                    <th style="width:3cm">
                        <strong>Precio Unitario</strong>
                    </th>
                    <th style="width:3cm">
                        <strong>Monto</strong>
                    </th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            @if(count($budgetItems) <= 6){
                @foreach ($budgetItems as $item)
                    <tr style="text-align: center; border: 1px solid #000000;" class="item-description">
                        <td>
                            <img style="width: 2cm;" src="{{ asset('lte-dist/img/AdminLTELogo.png') }}" ">
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>
                            USD {{ $item->costoUnitario }}
                        </td>
                        <td>
                            USD {{ $item->Total }}
                            @php
                                $total += $item->Total;
                            @endphp
                        </td>
                    </tr>
                @endforeach
             @endif

            <tr>
                <td colspan="3" style="text-align: right;">
                    <strong>Total:</strong>
                </td>
                <td  colspan="2" style="text-align: right; padding-right:0.5cm" >
                  USD {{$total}}
                </td>
            </tr>


        </table>
    </div>

    <div class="notes">
        <div class="notes-label">
            Nota: algun texto aqui
        </div>
    </div>
<footer>
    <div class="container" style="margin-top:5px">
        <table width="100%" style="">
            <tr>
                <td class="observaciones-titulo">
                   CONDICIONES DE CONTRATACIÓN:
                </td>
            </tr>
            <tr>
                <td class="observaciones">
                        <strong>1.</strong>PRESUPUESTO VÁLIDO POR CINCO (5) DÍAS HÁBILES
                </td>
            </tr>
            <tr>
                <td class="observaciones">
                    <strong>2.</strong>TIEMPO DE ENTREGA DE TREINTA (30) A NOVENTA (90) DÍAS DEPENDIENDO DE CADA OBRA
                </td>
            </tr>
            <tr>
                <td class="observaciones">
                    <strong>3.</strong>UNA VEZ ENTREGADO Y APROBADO EL PRESUPUESTO SE DEBE CANCELAR EL 70% DEL MISMO PARA EL INICIO DE LA OBRA Y EL 30 %
                    ANTES DE INSTALAR.
                </td>
            </tr>
            <tr>
                <td class="observaciones">
                    <strong>4.</strong>UNA VEZ APROBADO Y ENTREGADO EL 70% DEL TRABAJO, NO EXISTIRÁ, NINGUN TIPO DE DEVOLUCION DE DINERO.
                </td>
            </tr>
            <tr>
                <td class="observaciones">
                    <strong>5.</strong>TODA MODIFICACION DE TRABAJO GENERADA LUEGO DE HABER FINIQUITADO EL PRESUPUESTO, TENDRÁ UN COSTO ADICIONAL.
                </td>
            </tr>
        </table>

        <table width="100%" style="margin-top:10px">
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


