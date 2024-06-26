<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
  
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
  
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
  
                        <div class="card card-default">
                            <div class="card-header">
                                Laravel - Razorpay Payment Gateway Integration
                            </div>
  
                        
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>'
                            
                            
                            <button onclick="startPayment()">Pay {{$price}}</button>
                            
                            
                            <script>
                                function startPayment() {
                                    var options = {
                                        key: "' . $YOUR_KEY_ID . '", // Enter the Key ID generated from the Dashboard
                                        amount: {{$price}}, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                        currency: "' . INR . '",
                                        name: "Acme Corp",
                                        description: "Test transaction",
                                        image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
                                        order_id: "' . $order_IluGWxBm9U8zJ8 . '", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                        prefill: {
                                            name: "Gaurav Kumar",
                                            email: "gaurav.kumar@example.com",
                                            contact: "9000090000"
                                        },
                                        notes: {
                                            address: "Razorpay Corporate Office"
                                        },
                                        theme: {
                                            "color": "#3399cc"
                                        },
                                        callback_url: "' . $callback_url . '"
                                    };
                                    var rzp = new Razorpay(options);
                                    rzp.open();
                                }
                            </script>
                        </div>
  
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>