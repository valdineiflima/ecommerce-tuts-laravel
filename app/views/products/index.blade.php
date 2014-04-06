@extends('layouts.main')

@section('content')
    <div id="admin">
    
        <h1>Products Admin Panel</h1>
        <p>Here you can view, delete or create new products.</p>
        
        <h2>Products</h2><hr>
        
        <ul>
            @foreach($products as $product)
            <li>
                {{ $product->title }} - 
                {{ Form::open(array('url' => 'admin/products/destroy', 'class' => 'form-inline')) }}
                    {{ Form::hidden('id', $product->id) }}
                    {{ Form::submit('delete') }}
                {{ Form::close() }}
            </li>
            @endforeach
        </ul>
        <h2>Create new product</h2>
        @if($errors->has())
            <div id="form-errors">
                <p>The following errors has ocurred</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ Form::open(array('url' => 'admin/products/create')) }}
            <p>
                {{ Form::label('name') }}
                {{ Form::text('name') }}
            </p>
            {{ Form::submit('Create Product', array('class' => 'secondary-cart-btn')) }}

        {{ Form::close() }}
    </div><!-- end admin -->   
@stop