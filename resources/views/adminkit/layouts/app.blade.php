<!DOCTYPE html>
<html lang="en">

@include('adminkit.layouts.head')

<body>
    <div class="wrapper">
        @include('adminkit.layouts.sidebar')

        <div class="main">
            @include('adminkit.layouts.nav')

            <main class="content">
                <div class="container-fluid p-0">
                    @if (session()->has('success'))
                        <div class="alertt alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alertt alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="{{ route('home') }}"
                                    target="_blank"><strong>ANS-Hotels</strong></a> &copy;
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @include('adminkit.js')

</body>

</html>
