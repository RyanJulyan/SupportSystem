<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Support System
                </div>
                
                <div class="card-body">
                    <form method="GET" action="{{ url('ticket/') }}" id="find_ticket_form">
                        @csrf
                        <div class="form-group row">
                            <label for="find_ticket" class="col-md-4 col-form-label text-md-right">{{ __('Find Ticket by GUID') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input id="find_ticket" type="text" class="form-control" name="find_ticket" required>
                                
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" id="basic-addon1"
                                    onclick="event.preventDefault(); setAction(); document.getElementById('find_ticket_form').submit();">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="links">
                    <a href="{{ route('new-ticket') }}">Log Tickets</a>
                    <a href="{{ route('tickets') }}">View Tickets</a>
                    <a href="{{ route('tickets') }}">Change Ticket Status</a>
                    <a href="{{ route('complex-query') }}">Complex Query</a>
                    <a href="{{ route('file-manipulation') }}">File Manipulation</a>
                    <a target="_blank" href="https://github.com/RyanJulyan/SupportSystem">GitHub</a>
                </div>

            </div>
        </div>
    <script>
        function setAction(){
            document.getElementById('find_ticket_form').action = document.getElementById('find_ticket_form').action + "/" + document.getElementById('find_ticket').value ;
        }
    </script>
    </body>
</html>
