<header class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href=" {{ route('home') }}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/DC_Comics_logo.svg" alt="DC Comics" width="30" height="24">
                    </a>

                    <h1>DC Comics</h1>
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                        </ul> --}}
                    <span class="navbar-text">
                        <a href="{{ route('admin.index') }}">Admin</a>
                    </span>
                </div>
        </div>
        </nav>
    </div>
    </div>
</header>
