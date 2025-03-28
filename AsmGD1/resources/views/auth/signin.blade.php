<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
                box-sizing: border-box;
        }

        body {
                background: #f6f5f7;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                font-family: 'Montserrat', sans-serif;
                height: 95vh;
                margin: -20px 0 50px;
        }

        
        h2 {
                text-align: center;
                margin: 20px auto;
        }

        p {
                font-size: 14px;
                font-weight: 100;
                line-height: 20px;
                letter-spacing: 0.5px;
                margin: 20px 0 30px;
        }

        span {
                font-size: 12px;
        }

        a {
                color: #333;
                font-size: 14px;
                text-decoration: none;
                margin: 15px 0;
        }

        button {
                border-radius: 20px;
                border: 1px solid #a1204e;
                background-color: #a1204e;
                color: #FFFFFF;
                font-size: 12px;
                font-weight: bold;
                padding: 12px 45px;
                letter-spacing: 1px;
                text-transform: uppercase;
                transition: transform 80ms ease-in;
                /* margin-top: 10px; */
        }

        button:hover{
                color: #a1204e;
                background-color: #FFFFFF;
        }
        button:active {
                transform: scale(0.95);
        }

        button:focus {
                outline: none;
        }

        button.ghost {
                background-color: transparent;
                border-color: #FFFFFF;
        }
        button.ghost:hover{
                background-color: transparent;
                color: #FFFFFF;
        }
        form {
                background-color: #FFFFFF;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 50px;
                height: 100%;
                text-align: center;
        }

        input {
                background-color: #eee;
                border: none;
                padding: 12px 15px;
                margin: 8px 0;
                width: 100%;
                border-radius: 7px;
        }

        input:focus{
                outline: 2px solid #a1204e;
        }
        .container {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                position: relative;
                overflow: hidden;
                width: 1024px;
                max-width: 100%;
                min-height: 480px;
        }

        .form-container {
                position: absolute;
                top: 0;
                height: 100%;
                transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
                left: 0;
                width: 50%;
                z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
                transform: translateX(100%);
        }

        .sign-up-container {
                left: 0;
                width: 50%;
                opacity: 0;
                z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
                transform: translateX(100%);
                opacity: 1;
                z-index: 5;
                animation: show 0.6s;
        }

        @keyframes show {

                0%,
                49.99% {
                        opacity: 0;
                        z-index: 1;
                }

                50%,
                100% {
                        opacity: 1;
                        z-index: 5;
                }
        }

        .overlay-container {
                position: absolute;
                top: 0;
                left: 50%;
                width: 50%;
                height: 100%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
                z-index: 100;
        }

        .container.right-panel-active .overlay-container {
                transform: translateX(-100%);
        }

        .overlay {
                background: #FF416C;
                background: -webkit-linear-gradient(to right, #a1204e, #FF416C);
                background: linear-gradient(to right, #a1204e, #FF416C);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 0 0;
                color: #FFFFFF;
                position: relative;
                left: -100%;
                height: 100%;
                width: 200%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
                transform: translateX(50%);
        }

        .overlay-panel {
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                padding: 0 40px;
                text-align: center;
                top: 0;
                height: 100%;
                width: 50%;
                transform: translateX(0);
                transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
                transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
                transform: translateX(0);
        }

        .overlay-right {
                right: 0;
                transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
                transform: translateX(20%);
        }

        .social-container {
                margin: 10px 0;
        }

        .social-container a {
                border: 1px solid #DDDDDD;
                border-radius: 50%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin: 0 5px;
                height: 40px;
                width: 40px;
        }

        
        
        .error-mess{
                color: #FF416C;
                margin: 10px auto;
                font-weight: 500;
                font-size: 1rem;
        }
        .sign-up-container .social-container, .sign-up-container h2{
                margin: 5px auto;
                transform: translateY(-10px);
        }
        .forgot_pass{
               margin: 6px 0;
               transform: translateX(100%);
        }
        .forgot_pass:hover{
                text-decoration: underline;
        }
</style>
<?php 
    $error = $_SESSION['error'] ?? [];
    unset($_SESSION['error']);
//     debug($error);
?>
<body>
        <h2>Sign in/up Form</h2>
        <div class="container" id="container">
                <div class="form-container sign-up-container">
                        <form action="{{ route('signup') }}" method="post">
                                @csrf
                                <h2>Create Account</h2>
                                <div class="social-container">
                                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                @if ($errors->has('email') || $errors->has('password') || $errors->has('name'))
                                <div class="alert alert-danger error-mess">
                                        {{ $errors->first() }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success">
                                        {{ session('success') }}
                                </div>
                                @endif
                                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"/>
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/>
                                <input type="password" placeholder="Password" name="password" />
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                <button>Sign Up</button>
                        </form>
                </div>
                <div class="form-container sign-in-container">
                        <form action="{{ route('signin') }}" method="post">
                                @csrf
                                <h2>Sign in</h2>
                                <div class="social-container">
                                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                @if ($errors->has('email'))
                                        <div class="alert alert-danger error-mess">
                                                {{ $errors->first('email') }}
                                        </div>
                                @endif
                                @if (session('success'))
                                        <div class="alert alert-success">
                                                {{ session('success') }}
                                        </div>
                                @endif
                                <input type="email" placeholder="Email" name="email" autofocus />
                                <input type="password" placeholder="Password" name="password" />
                                <a href="{{ route('password.request') }}" class="forgot_pass">Forgot your password?</a>
                                <button>Sign In</button>
                        </form>
                </div>
                <div class="overlay-container">
                        <div class="overlay">
                                <div class="overlay-panel overlay-left">
                                        <h1>Welcome Back!</h1>
                                        <p>To keep connected with us please login with your personal info</p>
                                        <button class="ghost" id="signIn">Sign In</button>
                                </div>
                                <div class="overlay-panel overlay-right">
                                        <h1>Hello, Friend!</h1>
                                        <p>Enter your personal details and start journey with us</p>
                                        <button class="ghost" id="signUp">Sign Up</button>
                                </div>
                        </div>
                </div>
        </div>
        <a href="/">Back</a>

</body>

</html>
<script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        const err = document.querySelector('.sign-up-container .error-mess')
        if(err){        
                container.classList.add('right-panel-active'); 
        }
        signUpButton.addEventListener('click', () => {
                container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
                container.classList.remove('right-panel-active');
        });
</script>