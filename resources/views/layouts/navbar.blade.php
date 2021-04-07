<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Blogpost</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item{{ Request::is('posts') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>
                <li class="nav-item{{ Request::is('posts/create') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create</a>
                </li>
            </ul>
        </div>
    </div>
</nav>