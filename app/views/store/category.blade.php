@extends('layouts.main')

@section('promo')
    <section id="promo-alt">
        <div id="promo1">
            <h1>The brand new MacBook Pro</h1>
            <p>With a special price, <span class="bold">today only!</span></p>
            <a href="#" class="secondary-btn">READ MORE</a>
            {{ HTML::image('img/macbook.png', 'Macbook Pro') }}
        </div><!-- end promo1 -->
        <div id="promo2">
            <h2>The iPhone 5 is now<br>availab le in our store!</h2>
            <a href="">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
            {{ HTML::image('img/iphone.png', 'iPhone') }}
        </div><!-- end promo2 -->
        <div id="promo3">
            {{ HTML::image('img/thunderbolt.png', 'Thunderbolt') }}
            <h2>The 27"<br>Thunderbolt display.<br>Simply Stunning</h2>
            <a href="#">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
        </div><!-- end promo3 -->
    </section><!-- end promo-alt -->
@stop
@section('content')
    <h2>Category Name</h2>
    <hr>
    <aside id="categories-menu">
        <h3>CATEGORIES</h3>
        <ul>
            @foreach($catnav as $cat)
                <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }} </li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->
    <div id="listings">
        @foreach($products as $product)
            <div class="product">
                <a href="/store/view/ {{ $product->id }}">{{ HTML::image($product->image, $product->title, array(
                    'class' => 'feature', 
                    'width' => '240', 
                    'height' => '127')) 
                }}</a>
                <h3><a href="/store/view/ {{ $product->id }}">{{ $product->title }}</a></h3>
                <p>{{ $product->description }}</p>
            

                <h5>Availability: 
                    <span class="{{ Availability::displayClass($product->availability)}}">
                        {{ Availability::display($product->availability)}}
                    </span>
                </h5>

                <p>
                    <a href="#" class="cart-btn">
                        <span class="price">${{ $product->price }}</span>
                        {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
                    </a>
                </p>
            </div>
        @endforeach
    </div><!-- end listings -->
@stop

@section('pagination')
    <section id="pagination">
        {{ $products->links() }}
    </section><!-- end pagination -->
@stop