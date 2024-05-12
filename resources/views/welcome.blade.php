@extends('layouts.master')
@section('content')
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


    <div class="wrapper">
        <form action="/register" method="POST" onsubmit="return confirmRedirect()" enctype="multipart/form-data">
            @csrf
            <h1>{{__('form.Registration')}}</h1>
            @if ($errors->has('username'))
                <h5 style="color: #FF2D20">{{ $errors->first('username') }}</h5>
            @endif

            @if(session()->has('message'))
                <h5 style="color: #00b129">{{ session('message') }}</h5>
            @endif

            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="{{__('form.FullName')}}" name="name"/>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="{{__('form.Username')}}" name="username"/>
                    <i class="bx bxs-user"></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="date" placeholder="{{__('form.Birthdate')}}" name="birthdate"/>
                    <i class='bx bxs-calendar'></i>
                </div>
                <div class="input-field">
                    <input type="tel" placeholder="{{__('form.Phone')}}" name="phone"/>
                    <i class="bx bxs-phone"></i>
                </div>
            </div>

            <div class="input-box">

                <div class="input-field">
                    <input type="text" placeholder="{{__('form.Address')}}" name="address"/>
                    <i class='bx bxs-home'></i>
                </div>
                <div class="input-field">
                    <input type="email" placeholder="{{__('form.Email')}}" name="email"/>
                    <i class="bx bxs-envelope"></i>
                </div>

            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="password" placeholder="{{__('form.password')}}" name="password"/>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="{{__('form.confirmpassword')}}" name="confirm-password"/>
                    <i class="bx bxs-lock-alt"></i>
                </div>
            </div>


            <div class="upload-image">
                <label for="imageUpload" class="">{{__('form.Image')}}</label><br>
                <input type="file" id="imageUpload" name="image" accept="image/*"><br><br>
                <!-- <input type="submit" value="Upload"> -->

            </div>

            <label>
                <input type="checkbox" dir="ltr" name="declaration"/>{{__('form.checkbox')}}
            </label>
            <!-- <button type="submit" class="btn">Register</button> -->
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="{{__('form.Register')}}" name="submit">
            </div>
        </form>
    </div>

@endsection
