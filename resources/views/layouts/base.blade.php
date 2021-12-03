<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('head-title')
    
    <!--FILES CORE -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo1.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"-->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    @yield('head-link')
    
</head>
<body>
    <header> 
      <nav class="navbar navbar-expand-lg navbar-dark  navbarpople">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
              <img src="assets/images/logo.png" alt="logo-ctrlf" width="35" height="35" class="d-inline-block align-text-top">
               <strong>CTRLF</strong>inance
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" {{ Request::is('dashboard') ? 'aria-current= page' : '' }} href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('lancamento') ? 'active' : '' }}" {{ Request::is('lancamento') ? 'aria-current= page' : '' }} href="{{ route('aporte.lancamento') }}">Lançamento</a>
                </li>
                <!--li class="nav-item">
                  <a class="nav-link" href="#">Investimento</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Historico</a>
                </li-->
                <li class="nav-item dropdown">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" width="35" height="35" class="d-inline-block align-text-top rounded-circle"> 
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/user.png')}}" alt="User" width="35" height="35" class="d-inline-block align-text-top rounded-circle"> 
                        </a>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a></li>
                      <!--li><a class="dropdown-item" href="#">Configuração</a></li-->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();" class="dropdown-item">Sair</a>
                            </li>
                        </form>
                    </ul>
                </li>
              </ul>
            </div>
        </div>
      </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link px-2 text-muted">Dashboard</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Termos de privacidade</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ajuda</a></li>
      </ul>
      <p class="text-center text-muted">Copyright &copy; 2021 - {{ date('Y') }}<a href="#" class="px-2 text-muted">CTRLFinance.com.br</a></p>
    </footer>
        <!--   Core JS Files   -->
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

      @yield('footer-script')
</body>
</html>