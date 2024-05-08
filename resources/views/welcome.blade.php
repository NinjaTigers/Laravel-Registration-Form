<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registration Form</title>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>


<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Validation Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-x-btn"
                        onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close-btn"
                        onclick="closeModal()">Close
                </button>
            </div>
        </div>
    </div>
</div>
@include('Header')

<div class="wrapper">
    <form action="/register" method="POST" onsubmit="return confirmRedirect()" enctype="multipart/form-data">
          @csrf
        <h1>Registration</h1>
        @if ($errors->has('username'))
        <h5 style="color: #FF2D20">{{ $errors->first('username') }}</h5>
        @endif
        <div class="input-box">
            <div class="input-field">
                <input type="text" placeholder="Full Name" name="name"/>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Username" name="username"/>
                <i class="bx bxs-user"></i>
            </div>
        </div>

        <div class="input-box">
            <div class="input-field">
                <input type="date" placeholder="Birthdate" name="birthdate"/>
                <i class='bx bxs-calendar'></i>
            </div>
            <div class="input-field">
                <input type="tel" placeholder="Phone" name="phone"/>
                <i class="bx bxs-phone"></i>
            </div>
        </div>

        <div class="input-box">

            <div class="input-field">
                <input type="text" placeholder="Address" name="address"/>
                <i class='bx bxs-home'></i>
            </div>
            <div class="input-field">
                <input type="email" placeholder="Email" name="email"/>
                <i class="bx bxs-envelope"></i>
            </div>

        </div>

        <div class="input-box">
            <div class="input-field">
                <input type="password" placeholder="password" name="password"/>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="confirm password" name="confirm-password"/>
                <i class="bx bxs-lock-alt"></i>
            </div>
        </div>


        <div class="upload-image">
            <label for="imageUpload" class="">Select an image:</label><br>
            <input type="file" id="imageUpload" name="image" accept="image/*"><br><br>
            <!-- <input type="submit" value="Upload"> -->

        </div>

        <label>
            <input type="checkbox" name="declaration"/>I hereby declare that the above information
            provided is true and correct
        </label>
        <!-- <button type="submit" class="btn">Register</button> -->
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
</div>

<!--Important link from source https://bootsnipp.com/snippets/rlXdE-->
<!-- Footer -->
@include('Footer')


</body>
<script src="{{ asset('js/API_Ops.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>
