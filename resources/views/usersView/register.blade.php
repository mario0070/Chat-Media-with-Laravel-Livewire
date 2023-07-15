@extends("layout.layout")

@section("content")
    <div class="login">
        <h1>Register an Account</h1>
        <form action="{{route("registerUser")}}" method="POST">
            @csrf
            <div class="hand1" id="hand1"></div>
            <div class="hand2" id="hand2"></div>
            <img class="head" src="img/giant-panda-vector-graphics-bear-illustration-drawing-bear-removebg-preview.png" alt="">
            
            <label for="" class="">FullName</label>
            <input name="fullname" type="text" placeholder="Enter your Fullname" value="{{old("fullname")}}">
            <span>
                @error("fullname")
                    {{$message}}
                @enderror
            </span>

            <label for="" class="">Email Address</label>
            <input name="email" type="text" placeholder="Enter your valid Email Address" value="{{old("email")}}">
            <span>
                @error("email")
                    {{$message}}
                @enderror
            </span>

            <label for="" class="username">Username</label>
            <input name="username" type="text" placeholder="Your Prefer Username" value="{{old("username")}}">
            <span>
                @error("username")
                    {{$message}}
                @enderror
            </span>

            <label for="">Password</label>
            <input name="password" id="password" type="password" placeholder="Enter a strong Password">
            <span>
                @error("password")
                    {{$message}}
                @enderror
            </span>
            
            <p class="span">Already have an Account <a href="{{route("login")}}">Login here</a></p>

            <button name="login">Register</button>
            <img src="./img/panda_foot-removebg-preview.png" alt="" class="foot1">
            <img src="./img/panda_foot-removebg-preview.png" alt="" class="foot2">
        </form>
    </div>



    <script src="js/login.js"></script>
@endsection