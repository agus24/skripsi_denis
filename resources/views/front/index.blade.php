<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Config::get('app.name') }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/front.css') }}">
<style type="text/css">
    .parallax {
        height: 500px;
        width:100%;
        float:left;
    }
    .parallax .image {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url("{{ asset('storage/parallax.jpg') }}");
        -webkit-filter: grayscale(100%) blur(5px); /* Safari 6.0 - 9.0 */
        filter: grayscale(100%) blur(5px);
        z-index :0;
    }

    .parallax-content {
        position: absolute;
        color:white;
        text-align: center;
        width: 100%;
        margin-top: 11%;
        font-family: Courier;
        font-weight: bold;
        font-size:4em;
        text-shadow: 5px 5px black;
        text-transform: uppercase;
    }
</style>
</head>

<body class="menubar-hoverable header-fixed ">
    @include('front.navbar')
    <section id="shop">
        @include('front.shop')
    </section>

    @include('front.modal.login')
    @include('front.modal.signup')
    @include('front.modal.aboutus')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/User.js') }}"></script>
    <script>
        const prod = {!! $produks->toJson() !!};
        const baseUrl = "{{ url('/') }}";
        const user = new User;
        function JsonHandler(json) {
            this.json = json;
            this.find = (key,value) => {
                for(let i = 0 ; i < this.json.length ; i++){
                    if(this.json[i][key] == value) {
                        return i;
                    }
                }
                return false;
            }
        }
    </script>
    <script src="{{ asset('js/front.login.js') }}"></script>
    @include('front.script.cart')
</body>
</html>
