<!DOCTYPE html>
<html lang="en" dir="rtl">
<title>{{$setting->title}} | {{$ticket->custom_id}}</title>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="pagestyle" href="{{asset('assets/sales')}}/css/app.min.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="{{asset('assets/sales')}}/img/favicon.png">
    <link href="{{asset('assets/sales')}}/css/style.css" rel="stylesheet"/>

    <style>


        body {
            direction: ltr;
            margin: 0;
            padding: 0;
        }

        @page {
            /*size: A4;*/
            margin: 0;
        }
        @font-face {
            font-family: 'Almarai-Regular';
            font-style: normal;
            font-weight: 400;
            src: url({{url('assets/sales/webfonts/Almarai-Regular.ttf')}}) format('ttf');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        *{
            font-family: 'Almarai-Regular';
        }

        /*@media print {*/
        /*    .page {*/
        /*        margin: 0;*/
        /*        border: initial;*/
        /*        border-radius: initial;*/
        /*        width: initial;*/
        /*        min-height: initial;*/
        /*        box-shadow: initial;*/
        /*        background: initial;*/
        /*        page-break-after: always;*/
        /*    }*/
        /*}*/

    </style>
</head>

<body onload="window.print()">


<div class="multisteps-form container">
    <div class="row">
        <div class=" col-lg-3 p-1 m-auto ">
            <div class=" bill">
                <h4 class="font-weight-bolder ps-2">Bill</h4>
                <img src="{{asset($setting->logo)}}" style="max-height: 170px;max-width: 170px" alt="logo">
                <p>{{$setting->title}}</p>
                <div class="info">
                    <h6 class="billTitle"> ticket <span dir="rtl"> {{$ticket->custom_id}}#</span></h6>
                    <ul>
                        <li><label> Cashier Name : </label> <strong> {{auth()->user()->name}} </strong></li>
                        <li><label> Customer phone : </label> <strong >{{$ticket->phone}}</strong></li>
                        <li><label> Visit Date : </label>
                            <strong> {{date('d  / m / Y',strtotime($ticket->day))}} </strong></li>
                        <li><label> Reservation Duration : </label> <strong> {{$ticket->hours_count}} h </strong></li>
                        <li><label> Print Time : </label> <strong> {{$date}} </strong></li>
                    </ul>
                </div>

                @if(count($models))
                    <div class="info">
                        <h6 class="billTitle"> visitors</h6>
                        <div class="items">
                            <div class="itemsHead row">
                                <span class="col">type</span>
                                <span class="col"> Quantity </span>
                                <span class="col"> price </span>
                            </div>
                            @foreach($models as $model)
                                <div class="item row">
                                    <span class="col">{{$model->type->title}}</span>
                                    <span class="col"> {{$model->count_all}} </span>
                                    <span class="col"> {{$model->sum_all}} EGP </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(count($ticket->products))

                    <div class="info">
                        <h6 class="billTitle"> products</h6>
                        <div class="items">
                            <div class="itemsHead row">
                                <span class="col">type</span>
                                <span class="col"> Quantity </span>
                                <span class="col"> price </span>
                            </div>
                            @foreach($ticket->products as $product)
                                <div class="item row">
                                    <span class="col">{{$product->product->title}}</span>
                                    <span class="col"> {{$product->qty}} </span>
                                    <span class="col"> {{$product->total_price}} EGP </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="info">
                    <h6 class="billTitle"> Totals </h6>
                    <ul>

                        @if(isset($titles) && isset($vat) && isset($sum))
                            <li><label> Products : </label> <strong>   {{$sum}} EGP</strong></li>
                            @foreach($titles as $key=>$title)
                                <li><label> {{$title}} : </label> <strong>   {{$vat[$key]}} EGP</strong></li>
                            @endforeach

                        @endif
                        @if(count($models))
                            <li><label> Visitors Count : </label> <strong>   {{count($models)}}</strong></li>
                        @endif


                        <li><label> Ticket Price : </label> <strong> <?php $ticket_price = 0;?>  @foreach($models as $model) <?php ($ticket_price+=$model->sum_all/1.14)?> @endforeach {{round($ticket_price,2)}} EGP</strong></li>{{--update--}}
                        @if($ticket->ent_tax != 0)
                            <li><label> Ent.Tax : </label> <strong>   {{$ticket->ent_tax}} EGP</strong></li>
                        @endif
                        @if($ticket->vat != 0)
                            <li><label> VAT : </label> <strong> <?php $vat = 0;?>  @foreach($models as $model) <?php $vat+=($model->sum_all - ($model->sum_all/1.14)) ?> @endforeach {{round($vat,2)}} EGP</strong></li>{{--update--}}
                            <li><label> Total VAT : </label> <strong>   {{$ticket->vat}} EGP</strong></li>
                        @endif
                        @if($ticket->discount_value != 0)
                            <li><label> Discount : </label> <strong> {{$ticket->discount_value}} {{($ticket->discount_type == 'per') ? '%' : 'EGP'}}</strong></li>
                        @endif
                        @if($ticket->total_top_up_price)
                            <li><label> Top Up : {{$ticket->total_top_up_hours}} H</label> <strong> {{$ticket->total_top_up_price}} EGP</strong></li>
                        @endif
                        <li><label> total price : </label> <strong>   {{$ticket->grand_total}} EGP</strong></li>
                        <li><label> paid : </label> <strong>  {{$ticket->paid_amount}} EGP</strong></li>
                        <li><label> Remaining : </label> <strong>  {{$ticket->rem_amount}} EGP</strong></li>
                    </ul>
                </div>
                <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($ticket->custom_id, $generatorPNG::TYPE_CODE_128)) }}"
                     class="barcode">
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function () {
        window.close();
    }, 1000);
</script>
</body>

</html>
