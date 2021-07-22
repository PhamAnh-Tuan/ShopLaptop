<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | GearVN</title>
    <base href="{{ asset('') }}public/frontend/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="css/font-awesome.min.css" rel="stylesheet"> --}}
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="fonts/all.min.css" rel="stylesheet">
    {{-- Cart --}}
    <link href="css/sweetalert.css" rel="stylesheet">
    {{--  --}}
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link rel="icon" href="images/logo_free-file.png" type="image/x-icon">
</head>
<!--/head-->

<body>

    @include('site.layout.header')
    @yield('content')
    @include('site.layout.footer')

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <script src="js/sweetalert.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>

    <script src="https://kit.fontawesome.com/cbd66b8cb3.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
        $(document).ready(function() {
            $('.add-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ url('save-cart') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function() {
                        swal({
                                title: "Tuyệt!",
                                text: "Đã thêm sản phẩm vào giỏ hàng.",
                                imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg',
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/cart') }}";
                            });

                    }

                });
            });
        });

    </script>
    <script src="js/effect/hoa-dao-roi.js"></script>
</body>

</html>
