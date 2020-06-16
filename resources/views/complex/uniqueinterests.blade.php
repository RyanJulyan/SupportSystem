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
                /* height: 100%; */
                margin: 0;
            }

            .full-height {
                height: 100%;
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
                    <a href="{{ url('/') }}">Support System</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Complex Queries
                </div>

                <div class="links">
                    <a href="{{ route('animal-lovers') }}">Animal Lovers 1 doc</a>
                    <a href="{{ route('children-sport-lovers') }}">Children & Sport Lovers</a>
                    <a href="{{ route('unique-interests') }}">Unique Interests </a>
                    <a href="{{ route('more-interests') }}">5 or 6 interests</a>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">Unique Interests & People With No Documents</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover DataTable">
                                <thead>
                                <tr>
                                    <th>Interest Name</th>
                                    <th>People No Documents</th>

                                </tr>

                                </thead>
                                <tbody>
                                    @foreach ($data->table as $table)
                                        <tr>
                                            <td>{{$table->name}}</td>
                                            <td>{{$table->total_no_document}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
