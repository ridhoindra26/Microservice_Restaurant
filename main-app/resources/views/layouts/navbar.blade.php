<nav class="navbar navbar-expand-lg bg-danger" data-bs-theme="dark">
    <div class="container-xl container-fluid">
        <a class="navbar-brand" href="#">Restaurant Review</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        @if(Session::has('user'))
        <a href="/user" class="text-white"><span class="material-symbols-rounded">person</span></a>
        @else
        <a href="/register" class="btn btn-secondary" type="submit">Register</a>
        <a href="/login" class="btn btn-primary ms-1" type="submit">Login</a>
        @endif
        </div>
    </div>
</nav>