@extends('layouts.admin-master')

@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>User Name</th>
                                <th class="text-right">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><img src="{{asset('/uploads/products/').'/'.$product->photo}}" width="200px" height="200px"/></td>
                                    <td class="text-right">{{$product->user[0]->name}}</td>
                                    <td class="text-right">{{$product->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

@endsection
