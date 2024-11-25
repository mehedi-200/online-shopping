@extends('layouts.frontent')
@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="direction py-3">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{url('/')}}" class="text-radical-red">{{__('app.home')}} <i class="fa fa-angle-right pl-1"></i></a>
                </li>
                <li class="list-inline-item">
                    <span>{{__('app.shopping').' '.__('app.cart')}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="pb-5">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered summery-table">
                    <thead>
                    <tr>
                        <th class="cart_product">{{__('app.product')}}</th>
                        <th class="text-left">{{__('app.details')}}</th>
                        <th>{{__('app.available')}}</th>
                        <th>{{__('app.unit').' '.__('app.price')}}</th>
                        <th>{{__('app.quantity')}}</th>
                        <th>{{__('app.sub').' '.__('app.total')}}</th>
                        <th class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $total = 0;
                     @endphp
                    @foreach($addToCart as $cart)
                        <tr class="cart-item">
                            <td style="overflow:hidden;">
                                <div class="ratio-vertics">
                                    <a href="#"><img src="{{asset('product/'.$cart->product->image)}}"></a>
                                </div>
                            </td>
                            <td class="text-left">
                                <a href="#" class="product-title d-block two-line-text">{{$cart->product->name}} </a>
                                <small class="d-block text-muted">{{__('app.id')}}: #{{$cart->product->id * $cart->product->id * $cart->product->id}}</small>
                                <small class="d-block text-muted" ><div id="two_line_details_for_shopping_card_page">{{$cart->product->details}}</div></small>




                            </td>
                            <td><span>In stock</span></td>
                            <td><span id="unit_total" class="unit-total{{$cart->id}}">${{number_format($cart->unit_price,2)}}</span></td>
                            <td>
                                <div class="quantity-box d-flex mr-3">
                                    <input type="number" name="quantity" value="{{$cart->quantity}}" min="1" class="form-control form-control-sm quantity changes-number-{{$cart->id}}">
                                    <div>
                                        <button class="btn cart-qty-plus increase-qty" data-id="{{$cart->id}}">
                                            <span class="text"><i class="fa fa-angle-up"></i></span>
                                        </button>
                                        <button class="btn cart-qty-minus increase-qty" data-id="{{$cart->id}}">
                                            <span class="text"><i class="fa fa-angle-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="price" id="product_total_price">
                                $<span class="change-sub-total-{{$cart->id}}">{{number_format($cart->total_price,2)}}</span>
                            </td>
                            <td class="action">
                                <a type="button" href="javascript:void(0)" data-id="{{$cart->product_id}}" class="btn btn-sm btn-danger cart-item-remover destroy-purchase-item "><i class="fa fa-times"></i></a>
                            </td>
                            @php
                            $total +=$cart->total_price;
                            @endphp
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot class="bg-light-white">
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="3" class="text-right"><strong>{{__('app.total')}}</strong></td>
                        <td colspan="2" class="text-center"><strong id="shopping_card_total_amount">$<span class="all-total-price-shopping-card-">{{number_format($total, 2)}}</span></strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="py-5 d-flex flex-wrap justify-content-between">
                <a href="{{route('productsByProduct')}}" class="btn btn-sm btn-outline-radical-red mb-2 rounded-0">{{__('app.continue').' '.__('app.shopping')}}</a>
                <a href="{{route('checkout_card')}}"  class="btn btn-sm btn-radical-red mb-2 rounded-0">{{__('app.proceed').' '.__('app.checkout')}} <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>

@endsection

{{--javascript work below--}}

@section('js')
    <script>
        $(document).on('click','.increase-qty',function (){
               let id = $(this).data('id');
               let qty = parseInt($('.changes-number-'+id).val());
               let url = "{{url('/')}}";
               $.ajax({
                   type:'GET',
                   url:url+'/update-card-sub-total-for-shopping-card/'+id+'/'+qty,
                   success:function (response)
                   {
                       if(response.status === 200)
                       {
                           $('.change-sub-total-'+id).text(response.total);
                           $('.all-total-price-shopping-card-').text(response.all_total);

                       } else if(response.status === 404) {
                           alert(response.id);
                       }
                   },
                   error:function(){
                       alert(qty);
                   }
               })
        });
    </script>
@endsection

