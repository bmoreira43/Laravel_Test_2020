<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">URL Shortner</a>
         
            <ul class="navbar-nav">
                <li class="nav-item list-inline-item">
                    <a class="nav-link" href="/generate-shorten-link">List URL</a>
                </li>
                @if( auth()->check() )
                    <li class="nav-item list-inline-item">
                        <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                @else
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" href="/login">Log In</a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif
            </ul>
        </nav>
        
    </div>
</div>