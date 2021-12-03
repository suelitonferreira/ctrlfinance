<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTRLFinance - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo1.png')}}" type="image/x-icon">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    
</head>
<body class="text-center">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark  navbarpople">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="#">
              <img src="{{ asset('assets/images/logo.png')}}" alt="logo-ctrlf" width="35" height="35" class="d-inline-block align-text-top">
              <strong>CTRLF</strong>inance
            </a>
        </div>
      </nav>
    </header>
    <main class="form-signin">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('assets/images/logo.png')}}" alt="logo-ctrlf" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Efetue seu Login</h1>
                <x-jet-validation-errors class="alert alert-danger" />
                @if (session('status'))
                    {{ session('status') }}   
                @endif
            
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus >
                <label for="email" value="{{ __('Email') }}">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" >
                <label for="password" value="{{ __('Password') }}">Senha</label>
            </div>
            <div class="checkbox mb-3">
                <label for="remember_me">
                    <input type="checkbox" id="remember_me" name="remember" > Lembre de mim
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            @if (Route::has('register'))
                <p class="mt-5 mb-3 text-muted">Não tem uma conta? <a href="{{ route('register') }}">Registre-se agora.</a></p>
            @endif
            @if (Route::has('password.request'))
                <p class=" text-muted">Esqueçeu sua senha? <a href="{{ route('password.request') }}">Altere aqui.</a></p>
            @endif
        </form>
    </main>
    <footer class="footer py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Termos de privacidade</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ajuda</a></li>
      </ul>
      <p class="text-center text-muted">Copyright &copy; 2021 - {{ date('Y') }} <a href="#" class="px-2 text-muted">controfinance.com.br</a></p>
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>