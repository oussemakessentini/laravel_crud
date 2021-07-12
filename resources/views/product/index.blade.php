@extends('product.layout')

@section('content')
<br><br><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Laravel Product List </h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('product.create')}}"> create new product </a>
        </div>
    </div>

</div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
        
    @endif


    <table class="table table-bordered">
        <tr>
            <th width="150px">Product Name </th>
            <th width="150px">Product Code </th>
            <th width="300px">Product Details </th>
            <th width="100px">Product Logo </th>
            <th width="280px">Product Actions </th>
        </tr>
        @foreach ($product as $item)
        <tr>
            
                
            
            <td> {{$item->product_name}}</td>
            <td>{{$item->product_code}} </td>
            <td>{{str_limit($item->details , $limit = 50) }}</td>
            <td><img src="{{ URL::to($item->logo)}}" height="70px;" width="80px;"> </td>
            <td>
                <a class="btn btn-info" href="{{URL::to('show/product/'.$item->id)}}">Show</a>
                <a class="btn btn-primary" href="{{URL::to('edit/product/'.$item->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{URL::to('delete/product/'.$item->id)}}" onclick="return confirm ('are you sure ?')">Delete</a>
             </td>
             
        </tr>
        @endforeach
    </table>

    {!! $product->links() !!}

    
@endsection