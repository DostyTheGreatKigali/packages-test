<!DOCTYPE html>

<html>

<head>

    <title>Laravel Table Inline Editing Example - ItSolutionStuff.com</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

    <script>$.fn.poshytip={defaults:null}</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

</head>

<body>



<div class="container">

    <h1>Laravel Table Inline Editing Example - ItSolutionStuff.com</h1>

    <table class="table table-bordered data-table">

        <thead>

            <tr>

                <th>No</th>

                <th>Name</th>

                <th>Email</th>

            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>

                    <td>

                        <a href="" class="update" data-name="name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter name">{{ $user->name }}</a>

                    </td>

                    <td>

                        <a href="" class="update" data-name="email" data-type="text" data-pk="{{ $user->id }}" data-title="Enter email">{{ $user->email }}</a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>



</body>



<script type="text/javascript">

    $.fn.editable.defaults.mode = 'inline';



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': '{{csrf_token()}}'

        }

    });



    $('.update').editable({

           url: "{{ url('users-update') }}",

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'

    });

</script>

{{-- https://www.tutsmake.com/laravel-8-ajax-post-form-data-with-validation/ --}}
{{-- <script>
    if ($("#contactUsForm").length > 0) {
    $("#contactUsForm").validate({
    rules: {
    name: {
    required: true,
    maxlength: 50
    },
    email: {
    required: true,
    maxlength: 50,
    email: true,
    },
    message: {
    required: true,
    maxlength: 300
    },
    },
    messages: {
    name: {
    required: "Please enter name",
    maxlength: "Your name maxlength should be 50 characters long."
    },
    email: {
    required: "Please enter valid email",
    email: "Please enter valid email",
    maxlength: "The email name should less than or equal to 50 characters",
    },
    message: {
    required: "Please enter message",
    maxlength: "Your message name maxlength should be 300 characters long."
    },
    },
    submitHandler: function(form) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#submit').html('Please Wait...');
    $("#submit"). attr("disabled", true);

    $.ajax({
    url: "{{url('store')}}",
    type: "POST",
    data: $('#contactUsForm').serialize(),
    success: function( response ) {
    $('#submit').html('Submit');
    $("#submit"). attr("disabled", false);
    alert('Ajax form has been submitted successfully');
    document.getElementById("contactUsForm").reset();
    }
    });
    }
    })
    }
    </script> --}}

</html>
