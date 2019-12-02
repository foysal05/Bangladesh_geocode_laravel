<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" ></script>       
<!-- Fonts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="container">

            @if(session()->has('message-success'))
                <div class="alert alert-success">
                    {{ session()->get('message-success') }}
                </div>
            @elseif(session()->has('message-danger'))
                <div class="alert alert-danger">
                    {{ session()->get('message-danger') }}
                </div>
            @endif

<div class="row">

 <div class="col-lg-4">
                <fieldset>
                    <legend>Address</legend>
                    <form action="" method="POST">
                     <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Division</label>
                      @php
                          $divisions=App\Division::get();
                      @endphp
                    <select  name="division" required class="form-control form-control-lg" id="select_division">
                       <option value="">Select Division</option>
                        @foreach ($divisions as $division)
                             <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
                    <div class="form-group" id="select_distric_div">
                        <label for="exampleInputEmail1">District</label>
                        <select class="form-control form-control-lg select_distric_for_upazila" id="select_distric">
                        <option>Select District</option>
                        </select>
                 </div>

                    <div class="form-group" id="select_upazila_div">
                        <label for="exampleInputEmail1">Upazila</label>
                        <select class="form-control form-control-lg select_upazila_union" id="select_upazila">
                        <option>Select Upazila</option>
                        </select>
                 </div>
                    <div class="form-group" id="select_union_div">
                        <label for="exampleInputEmail1">Union</label>
                        <select class="form-control form-control-lg" id="select_union">
                        <option>Select Upazila</option>
                        </select>
                 </div>
                
                
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
                </fieldset>
</div>
</div>

             </div>
        </div>
    </body>
   
    <script>
  // Get district list
$(document).ready(function () {

    $("#select_division").change(function () {
        var url = $('#url').val();
       
        var formData = {
            id: $(this).val()
        };
        // console.log(formData);
        // get section for student
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/' + 'ajaxDistricList',
            success: function (data) {

              
                var a = '';
               $.each(data, function (i, item) {
                    if (item.length) {
                        $('#select_distric').find('option').not(':first').remove();
                        $('#select_distric_div ul').find('li').not(':first').remove();

                        $.each(item, function (i, distric) {
                            $('#select_distric').append($('<option>', {
                                value: distric.id,
                                text: distric.name
                            }));

                            $("#select_distric_div ul").append("<li data-value='" + distric.id + "' class='option'>" + distric.name + "</li>");
                        });
                    } else {
                        $('#select_distric_div .current').html('SELECT DISTRIC *');
                        $('#select_distric').find('option').not(':first').remove();
                        $('#select_distric_div ul').find('li').not(':first').remove();
                    }
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});

//Get Upazila List
$(document).ready(function () {

    $(".select_distric_for_upazila").change(function () {
        var url = $('#url').val();
       
        var formData = {
            id: $(this).val()
        };
    //    console.log(formData);
        // get section for student
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/' + 'ajaxUpazilaList',
            success: function (data) {

                // console.log(data);
                var a = '';
               $.each(data, function (i, item) {
                    if (item.length) {
                        $('#select_upazila').find('option').not(':first').remove();
                        $('#select_upazila_div ul').find('li').not(':first').remove();

                        $.each(item, function (i, distric) {
                            $('#select_upazila').append($('<option>', {
                                value: distric.id,
                                text: distric.name
                            }));

                            $("#select_upazila_div ul").append("<li data-value='" + distric.id + "' class='option'>" + distric.name + "</li>");
                        });
                    } else {
                        $('#select_upazila_div .current').html('SELECT DISTRIC *');
                        $('#select_upazila').find('option').not(':first').remove();
                        $('#select_upazila_div ul').find('li').not(':first').remove();
                    }
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
//Get Union List
$(document).ready(function () {

    $(".select_upazila_union").change(function () {
        var url = $('#url').val();
       
        var formData = {
            id: $(this).val()
        };
    //    console.log(formData);
        // get section for student
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/' + 'ajaxUnionList',
            success: function (data) {

                // console.log(data);
                var a = '';
               $.each(data, function (i, item) {
                    if (item.length) {
                        $('#select_union').find('option').not(':first').remove();
                        $('#select_union_div ul').find('li').not(':first').remove();

                        $.each(item, function (i, union) {
                            $('#select_union').append($('<option>', {
                                value: union.id,
                                text: union.name
                            }));

                            $("#select_union_div ul").append("<li data-value='" + union.id + "' class='option'>" + union.name + "</li>");
                        });
                    } else {
                        $('#select_union_div .current').html('SELECT DISTRIC *');
                        $('#select_union').find('option').not(':first').remove();
                        $('#select_union_div ul').find('li').not(':first').remove();
                    }
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});

    </script>
</html>
