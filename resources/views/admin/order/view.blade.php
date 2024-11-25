@extends('layouts.admin')
@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/view-paze/view.css')}}"/>
@endsection
@section('content')
    <div class="container">
        <div class="header">{{__('app.order').' '.__('app.summery')}}</div>
        <hr>

        <!-- Customer and Order Information -->
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="info-card flex-fill">
                    <div class="card-header">{{__('app.customer').' '.__('app.information')}}</div>
                    <div class="card-body">
                        <p><strong>{{__('app.name')}}:</strong> {{$order->customer->user ? $order->customer->user->name:''}}</p>
                        <p><strong>{{__('app.address')}}:</strong> {{$order->customer->address}}</p>
                        <p><strong>{{__('app.phone')}}:</strong> 0{{$order->customer->user ? $order->customer->user->phone:''}}</p>
                        <p><strong>{{__('app.email')}}:</strong> {{$order->customer->user ? $order->customer->user->email:''}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="info-card flex-fill">
                    <div class="card-header">{{__('app.order').' '.__('app.information')}}</div>
                    <div class="card-body">
                        <p><strong>{{__('app.order').' '.__('app.date')}}:</strong> {{$order->created_at->format('d/m/y')}}</p>
                        <p><strong>{{__('app.order').' '.__('app.id')}}:</strong> {{$order->id}}</p>
                        <p><strong>{{__('app.status')}}:</strong> <span class=" p-1 @if($order->status =='pending' || $order->status =='processing') alert alert-primary @endif @if($order->status =='completed') alert alert-success @endif @if($order->status == 'cancelled') alert alert-danger  @endif">{{$order->status}}</span></p>
                        <p><strong>{{__('app.payment').' '.__('app.type')}}:</strong> <span class=" p-1 ">{{$order->payment_type}}</span></p>
                        <p><strong>{{__('app.payment').' '.__('app.status')}}:</strong> <span class=" p-1 @if($order->payment_status =='unpaid') alert alert-danger @endif @if($order->payment_status =='PAID') alert alert-success @endif">{{$order->payment_status}}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><strong>{{__('app.id')}}</strong></th>
                    <th><strong>{{__('app.product')}}</strong></th>
                    <th><strong>{{__('app.image')}}</strong></th>
                    <th><strong>{{__('app.unit').' '.__('app.price')}}</strong></th>
                    <th><strong>{{__('app.quantity')}}</strong></th>
                    <th><strong>{{__('app.unit').' '.__('app.total')}}</strong></th>
                </tr>
                </thead>
                <tbody>
                @php
                $total = 0;
                @endphp
                @if($order->order_items )
                    @foreach($order->order_items as $item)
                <tr>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->product_name}}</td>
                    <td><img src="{{asset('product/'.$item->product->image)}}" alt="Product 1"></td>
                    <td>${{$item->unit_price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>${{$item->unit_total}}</td>
                </tr>
                        @php
                        $total +=$item->unit_total;
                        @endphp
                    @endforeach
                @endif
                <tr>
                    <td colspan="5" class="text-end me-2"><strong>{{__('app.total')}} :</strong></td>
                    <td>${{$total}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- Buttons -->
        <div class="btn-group @if($order->status == 'completed' or $order->status == 'cancelled')  d-none @endif">
                <button class="btn btn-success @if($order->status == 'pending')  d-none @endif  order-complete-or-cancel-button" data-id="{{$order->id}}" data-status="completed" id="complete-btn"><a href="javascript:void(0);">{{__('app.complete').' '.__('app.order')}}</a></button>
                <button class="btn btn-success @if($order->status =='processing')  d-none @endif order-complete-or-cancel-button  " data-id="{{$order->id}}" data-status="processing" id="complete-btn" style="border-top-left-radius: 23px;border-bottom-left-radius: 23px;"><a href="javascript:void(0);">{{__('app.processing').' '.__('app.order')}}</a></button>
                <button class="btn btn-danger "  id="cancel-btn" onclick="deleteItem('{{route('order.cancel',[$order->id])}}','order')">{{__('app.cancel').' '.__('app.order')}}</button>
        </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).on('click','.order-complete-or-cancel-button',function (){
            let status = $(this).data('status');
            let id     = $(this).data('id');
            let base_url = "{{url('/')}}";
            $.ajax({
                type:'GET',
                url :base_url+'/admin/order/order-cancel-or-completed/'+id+'/'+status,
                success:function (){
                    location.reload();
                },
                error:function ()
                {
                    alert('error');
                }
            })

        });
    </script>
@endsection
