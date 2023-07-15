@extends("./layout.layout")

@section("content")
    <div class="login">
        <h1>Login your Account</h1>

        @if(Session()->has("successMsg"))
            <p id="successMsg">{{session("successMsg")}}</p>
        @endif

        @if(Session()->has("errorMsg"))
            <p id="errorMsg">{{session("errorMsg")}}</p>
        @endif
        
        <form action="{{route("loginUser")}}" method="POST">
            @csrf
            <div class="hand1" id="hand1"></div>
            <div class="hand2" id="hand2"></div>
            <img class="head" src="img/giant-panda-vector-graphics-bear-illustration-drawing-bear-removebg-preview.png" alt="">
            
            <label for="" class="username">Username</label>
            <input name="username" type="text" placeholder="Enter your Username" value="{{old("username")}}">
            <span>
                @error("username")
                    {{$message}}
                @enderror
            </span>

            <label for="">Password</label>
            <input name="password" id="password" type="password" placeholder="Enter your Password">
            <span>
                @error("password")
                    {{$message}}
                @enderror
            </span>
            
            <p class="span">Don't have an Account <a href="{{route("register")}}">Register here</a></p>

            <button name="login">Login</button>
            <img src="./img/panda_foot-removebg-preview.png" alt="" class="foot1">
            <img src="./img/panda_foot-removebg-preview.png" alt="" class="foot2">
        </form>
    </div>

    <script src="js/login.js"></script>
@endsection