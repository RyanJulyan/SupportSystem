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
                /* height: 100vh; */
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
                    File Manipulation
                </div>

                <div class="links">
                    <form method="POST" action="{{ route('file-upload') }}" id="upload_file" enctype="multipart/form-data">
                        @csrf
                        
                        
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="sortAlph" name="sort" value="Alphabetically" checked="true">
                            <label class="custom-control-label" for="sortAlph">Sort Alphabetically</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="sortLength" name="sort" value="Length">
                            <label class="custom-control-label" for="sortLength">Sort Length</label>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="uploaddata" id="uploaddata">
                            <label class="custom-file-label" for="uploaddata">Choose file</label>
                        </div>
                                
                        <div class="input-group-prepend">
                            <button class="btn btn-primary btn-block" id="basic-addon1"
                        onclick="event.preventDefault(); document.getElementById('upload_file').submit();">Upload</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">Unique row information</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover DataTable">
                                <thead>
                                <tr>
                                    <th>Sorted Data</th>

                                </tr>

                                </thead>
                                <tbody>
                                    @foreach ($data->sorted as $sorted)
                                        <tr>
                                            <td>{{$sorted}}</td>
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
