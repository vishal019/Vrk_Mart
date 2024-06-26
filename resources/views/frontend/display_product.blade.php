<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Shop Item - Start Bootstrap Template</title>
        
    </head>

    <body>

      
        <!-- Navigation-->
        <x-navbar/>
        <!-- Product section-->
        <section class="py-5">
            
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ url('img/products/'.$smartphone->mobile_image) }}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{$smartphone->brand_name}} {{$smartphone->mobile_model}}</h1>
                        <div class="fs-5 mb-5">
                            {{-- <span class="text-decoration-line-through">₹45.00</span> --}}
                            <span>₹{{$smartphone->price}}</span>
                        </div>
                        <p class="lead">{{$smartphone->description}}</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <form action="buynow_product" method="post">
                                @csrf
                                <input type="hidden" value="{{$smartphone->price}}" name="price">
                                <input type="hidden" value="{{$smartphone->id}}" name="id">

                            <button  class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Buy Now
                            </button>
                        </form>
                            
                            &nbsp &nbsp
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          \
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($all_product as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ url('img/products/'.$product->mobile_image) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->brand_name}} {{$product->mobile_model}}</h5>
                                    <!-- Product price-->
                                    Rs:{{$product->price}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <x-footer/>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
