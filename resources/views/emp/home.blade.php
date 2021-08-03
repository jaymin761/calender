<html>
    <head>

    </head>
    <body>
        <h1>Welcome  {{ Auth::user()->email}}</h1>
        <h3>
            <a class="dropdown-item" href="{{ route('emp.logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('emp.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </h3>
    </body>
</html>
