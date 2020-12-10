<!DOCTYPE html>
<html>

    <head>
        <title>What's wrong with my car? - @yield('title')</title>
    </head>

    <body>
        <h1>What's wrong with my car? - @yield('title')</h1>

        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            @yield('content')
        </div>

    </body>

</html>
