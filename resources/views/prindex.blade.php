@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="col-md-12">
                <input type="text" wire:model="search" placeholder="Search Something ..." class="form-control mb-3" >
            </div>
            {{-- {{ $search }} --}}
            {{-- @foreach ($products as $productPrIndex) --}}
            @foreach ($products as $product)
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <div class="card-header">{{ $product->product_code }} | {{ $product->name }}</div>
           
                        <div class="card-body">
                            <img src={{ url($product->image) }} alt="" width="225 px">
                            <br>
                            {{ $product->type }}
                            <br>
                            {{ $product->unit }}
                        </div>
                        <div class="card-footer">

                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                            </form>
                        </div>

                        {{-- <div class="card-footer">
                            <button class="btn btn-success">Add to Cart</button>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        
            {{-- {{ $products-> links()}} --}}
    </div>
</div>
@endsection