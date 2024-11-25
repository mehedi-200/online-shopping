@extends('layouts.frontent')
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/orderSuccessfull.css')}}"/>
@endsection
@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12  col-12" >

                <div id="orderSuccessIcon"><i class="fa-solid fa-circle-check"></i></div>

                <div class=" text-center" id="OrderSuccessTitle">Thank you for your purchase</div>
                <div class=" text-center" id="orderDeliveryTime">We've rechive your order will ship in 2-3 business days.</div>
                <div class="text-center text-secondary font-weight-bold">payment method : <span class="bg-primary alert p-1 text-white">{{$order->payment_type}}</span>  status : <span class="@if($order->payment_status === 'PAID') alert-success @else alert-danger @endif alert p-1 ">{{$order->payment_status}}</span> </div>
    {{--                <div class="3" id="orderDeliveryTime">Your order number is {{$order->id}}</div>--}}
                <div id="wrapingOrder">
                    <h3 class="text-secondary" style="font-family:arial black ;font-size:20px;">Order Summery</h3>
                    <table id="OrderSummery">

                        @php
                            $total = 0;
                        @endphp
                        @if($order->order_items)
                            @foreach($order->order_items as $item)
                                <tr id="orderDetailsRow">
                                    <td id="OrderDetail1"><img  src="{{asset('product/'.$item->product->image)}}" alt=""></td>
                                    <td id="OrderDetail2">{{$item->product->name}}</td>
                                    <td id="OrderDetail3">${{$item->unit_total}}</td>
                                </tr>
                                @php
                                    $total +=$item->unit_total;
                                @endphp
                            @endforeach
                        @endif
                        <tr id="orderDetailsRow"><td colspan="2" class="text-center">Total</td><td>${{$total}}</td></tr>
                    </table>
                </div>

                <div id="backButtonOrderPaze">
                    <a class="btn border-primary text-center text-secondary p-2 bg-white"  href="{{url('/')}}">Back to Home</a>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
