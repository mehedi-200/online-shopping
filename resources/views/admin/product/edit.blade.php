@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.edit').' '.__('app.product')}}</h6>
            </div>
            <div class="theme-card-body">
                <form action="{{route('product.update',[$products->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label">{{__('app.category')}}</label>
                        <div class="col-lg-8">
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">--- {{__('app.select').' '.__('app.category')}} ---</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label">{{__('app.sub_category')}}</label>
                        <div class="col-lg-8">

                            <select name="subcategory_id" id="subCat" class="form-control " required>
                                <option value="">---{{__('app.select').' '.__('app.sub_category')}}---</option>
                            </select>

                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name"  class="col-lg-4 text-lg-right form-label">{{__('app.name')}} :</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" value="{{$products->name}}" placeholder="{{__('app.product').' '.__('app.name')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.title')}} :</label>
                        <div class="col-lg-8">
                            <input type="text" name="title" value="{{$products->title}}" placeholder="{{__('app.product').' '.__('app.title')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.price')}} :</label>
                        <div class="col-lg-8">
                            <input type="number" name="price" value="{{$products->price}}" placeholder="{{__('app.product').' '.__('app.price')}} " class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.description')}} :</label>
                        <div class="col-lg-8">
                            <textarea name="details"  placeholder="{{__('app.product').' '.__('app.description').' '.__('app.here')}} !" id="" cols="10" rows="5" class="form-control" required>{{$products->details}}
                            </textarea>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="image" class="col-lg-4 text-lg-right form-label">{{__('app.image')}} :</label>
                        <div class="col-lg-8">
                            <input type="file" name="image"  class="form-control"  accept="image/*">
                        </div>
                    </div>
                    <div id="file-inputs">

                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="image" class="col-lg-4 text-lg-right form-label">{{__('app.more').' '.__('app.image')}} :</label>
                        <div class="col-lg-8">
                            <button type="button" class="btn-success text-white btn btn-sm" id="add-more">{{__('app.add').' '.__('app.more')}}</button>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.featured').' '.__('app.product')}}</label>
                        <div class="col-lg-8">
                            <input type="checkbox" name="featured" value="featured" @if($products->featured == 'featured') checked @endif>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.new').' '.__('app.arrival')}}l :</label>
                        <div class="col-lg-8">
                            <input type="checkbox" name="new_arrival" value="arrival"  @if($products->new_arrival =='arrival') checked @endif >
                        </div>
                    </div>

                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm" type="submit">{{__('app.submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
@section('css')

@endsection
@section('js')

        <script>

            $("#category").on("change", function () {
            var category_id = $(this).val();
            var base_url = "{{url('/')}}";
            $('#subCat').empty().append('<option value="">---{{__('app.select').' '.__('app.sub_category')}}---</option>');
            $.ajax({
            type: "GET",
            url: base_url+"/admin/product/edit-subcategory-by-category/" + category_id,
            success: function (response) {
            $.each(response, function (i, obj) {
            $('#subCat').append($('<option>', {
            value: obj.id,
            text: obj.name
        }));
        });
        }
        });
        });

    </script>
    <script>
    $(document).ready(function(){
    $('#add-more').click(function(){
    $('#file-inputs').append(`
    <div class="custom-form-group custom-form-group-sm mb-3 row" >
        <label for="image" class="col-lg-4 text-lg-right form-label">Image :</label>
        <div class="col-lg-8">
            <input type="file" name="image2[]"  class="form-control"  accept="image/*">
        </div>
    </div>

    `);
    });
    });
    </script>
@endsection
