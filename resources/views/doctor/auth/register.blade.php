@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('front_assets/izitoast/css/iziToast.min.css') }}">
    {{-- {!! NoCaptcha::renderJs() !!} --}}
@endsection
@section('content')
    <!-- Form Start -->
    <!-- Age Confirmation Start -->
    <div class="bg-cover">
        <div class="age-container" id="div1">
            <div class="">
                <div class="">
                    <div class="image">
                        <img class="img-18" src="{{ asset('front_assets/service-imgs/18.png') }}" alt="" />
                        <h2>Are you over 18?</h2>
                    </div>
                    <div class="btn-wraper">
                        <button class="btn-no" onclick="showWarn()" id="showWarn">
                            No
                        </button>
                        <button id="yes" class="btn-yes" onclick="toggleDiv()">Yes</button>

                    </div>
                    <div class="warnbox d-flex align-content-center justify-content-center" id="warning">
                        <i class="fa fa-warning warnit"></i>
                        <p class="warnmsg">Our services are not intended for underage
                            individuals.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-wrapper" id="div2" style="display: none">
            <div class="form-container bg-white">
                <div class="row container-fluid wow fadeInUp">
                    <div class="col-md-6 form_imgdiv bg-light left_part">
                        <div id="gmap">
                            <div class="">
                                <div class="d-flex">
                                    <img src="{{ asset('front_assets/img/Mapsana Logo.png') }}" alt="mapsana"
                                        height="60px" class="mb-5" srcset="">
                                </div>
                                <p class="display-6  text-dark">Let us help you keep a healthy living style.</p>
                                <p class="mb-0 regpad">Our registration process is easy, taking no more than 10 mintues to
                                    complete your profile.</p>

                            </div>
                            <img src="{{ asset('front_assets/img/Doctors-pana.png') }}" class="" width="500px"
                                alt="doctor-img">
                        </div>
                        <div class="otpAnim" id="otpanimation">
                            <img src="{{ asset('front_assets/gif_animations/enterotp.gif') }}" height="480"
                                alt="submit otp picture" srcset="">
                        </div>
                    </div>
                    <div class="col-md-6 form_div">
                        <h3 id="formhead">Sign up to get started</h3>

                        <form class="signup-form" id="signup-form">
                            @csrf
                            <div class="form-row mb-3 p-1 input-group">
                                <div class="col-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" placeholder="John" class="form-control" required
                                        id="firstname" />
                                </div>
                                <div class="col-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" placeholder="Smith" class="form-control" required
                                        id="lastname" />
                                </div>
                            </div>
                            <div class="form-group mb-3 p-1">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="john@gmail.com" />
                                <span id="emailspan"></span>
                            </div>
                            <div class="form-row input-group mt-3 p-1">
                                <div class="col-6">
                                    <label for="n-id">National ID</label>
                                    <input type="number" class="form-control" required id="n-id" autocomplete="off"
                                        name="nid" placeholder="XXXXX-XXXXXXXX-X" />
                                    <span id="nidspan"></span>
                                </div>
                                <div class="col-6">
                                    <label for="no-reg">Registration Number</label>
                                    <input type="number" class="form-control" required id="no-reg" name="reg_no"
                                        placeholder="XXXXXX" />
                                    <span id="no-regspan"></span>
                                </div>
                            </div>
                            <div class="form-group mt-3 p-1">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" required onfocus="this.showPicker();"
                                    name="dob" id="dob" />
                            </div>
                            <div class="form-group mt-3 p-1">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="********" id="password"
                                    name="password"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    required />
                            </div>
                            <div class="p-2 pb-0">
                                <p class="small mb-0" style="color: black">
                                    <b>Password must contain</b>
                                </p>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="invalid m-0" id="lowupchar">
                                            one lowercase & one uppercase
                                            character.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="invalid m-0" id="spCheck">
                                            one special character.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="invalid m-0" id="numchar">
                                            atleast one number.
                                        </p>
                                    </li>
                                    <li>
                                        <p class="invalid m-0" id="eight">
                                            minimum 8 characters.
                                        </p>
                                    </li>
                                </ul>
                            </div>

                            <div class="form-group mt-3 p-1">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="policy" id="policy"
                                        required />
                                    <label class="form-check-label" for="policy">I declare that i am have no police
                                        record
                                        or register that not allowed me work with children, etc and ready to share my
                                        actualized
                                        CV.</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="terms" id="terms"
                                        required />
                                    <label class="form-check-label" for="terms">I agreed to the term of use and privacy
                                        policy.</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="approval" id="approval"
                                        required />
                                    <label class="form-check-label" for="approval">I have an concuous and i agreed that my
                                        personal and professional information will be verified and i will be not able to use
                                        this platform till to be approved.</label>
                                </div>
                            </div>

                            {{-- <div class="form-group mt-3 p-1">
                                {!! NoCaptcha::display(['data-captcha-required' => 'true']) !!}
                                <span id="recaptchaspan"></span>
                            </div> --}}

                            <div class="p-1 mb-3 d-flex justify-content-center">
                                <button type="submit" class="mt-0  mb-2 btn-primary sign-up form-control btn-signup">
                                    Sign up
                                </button>
                            </div>
                        </form>

                        <div class="otp-container p-4" id="otpbox" style="display: none">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('front_assets/img/pinimage.png') }}" width="80" height="80"
                                    alt="" />
                            </div>
                            <div class="otp-heading d-flex flex-column align-items-center justify-content-center mt-3">
                                <h3>Enter verification code</h3>
                                <p class="text-center text-dark">
                                    We have just sent a verification
                                    <br />
                                    code to <span class="useremail">john123@gmail.com</span>
                                </p>
                            </div>
                            <div class="otp-form d-flex flex-column align-items-center justify-content-center mt-3">
                                <form action="" id="otp">
                                    @csrf
                                    <input type="hidden" name="otpemail" class="form-control" id="otpemail"
                                        placeholder="" />
                                    <input type="number" name="otpnumber[]" min="0" max="9"
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                        id="numberOne" form-control rounded autofocus />
                                    <input type="number" name="otpnumber[]" min="0" max="9"
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                        id="numberOne" form-control rounded autofocus />
                                    <input type="number" name="otpnumber[]" min="0" max="9"
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                        id="numberOne" form-control rounded autofocus />
                                    <input type="number" name="otpnumber[]" min="0" max="9"
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                        id="numberOne" form-control rounded autofocus />
                                    <div class="twobtn">
                                        <a id="sendmail" href="javascript:void(0)">Send the code again</a>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            Verify
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Age Confirmation End -->
@endsection
@section('script')
    <script src="{{ asset('front_assets/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/toastr.js') }}"></script>
    <script src="{{ asset('front_assets/js/signup.js') }}"></script>
    <script>
        $('#signup-form').on('submit', function(e) {
            e.preventDefault();
            var email = $("input#email").val();
            var url = '{{ url('/doctor/register') }}';
            var formData = $(this).serialize();
            // var recaptchaResponse = grecaptcha.getResponse();
            // formData += '&g-recaptcha-response=' + recaptchaResponse;
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                beforeSend: function() {
                    $("#spinner").addClass("show");
                },
                complete: function() {
                    $("#spinner").removeClass("show");
                },
                success: function(response) {
                    var typeOfResponse = response.type;
                    var res = response.msg;
                    if (typeOfResponse == 0) {
                        let validator_error = response.validator_error;
                        if (validator_error != undefined && validator_error == 1) {
                            if (res.email != undefined) {
                                $('#emailspan').text(res.email[0]);
                                $('#emailspan').addClass("text-danger");
                                $("#email").focus();
                            } else {
                                $('#emailspan').text('');
                                $('#emailspan').removeClass("text-danger");
                            }
                            if (res.reg_no != undefined) {
                                $('#no-regspan').text(res.reg_no[0]);
                                $('#no-regspan').addClass("text-danger");
                                $("#no-reg").focus();

                            } else {
                                $('#no-regspan').text('');
                                $('#no-regspan').removeClass("text-danger");
                            }
                            if (res.nid != undefined) {
                                $('#nidspan').text(res.nid[0]);
                                $('#nidspan').addClass("text-danger");
                                $("#n-id").focus();
                            } else {
                                $('#nidspan').text('');
                                $('#nidspan').removeClass("text-danger");
                            }
                            // if (res.grecaptcharesponse != undefined) {
                            //     $('#recaptchaspan').text(res.grecaptcharesponse[0]);
                            //     $('#recaptchaspan').addClass("text-danger");
                            //     $("#recaptchaspan").focus();
                            // } else {
                            //     $('#recaptchaspan').text('');
                            //     $('#recaptchaspan').removeClass("text-danger");
                            // }
                        } else {
                            iziToast.error({
                                title: 'Error',
                                message: res,
                                position: 'topRight'
                            });
                        }
                        // grecaptcha.reset();
                    } else if (typeOfResponse == 1) {
                        $(".useremail").text(email);
                        $('input#otpemail').val(email);
                        showOTPdiv();
                    }
                }
            });
        });

        $('#otp').on('submit', function(e) {
            e.preventDefault();

            var email = $("input#email").val();
            var url = '{{ url('/doctor/register/verify/otp') }}';
            $.ajax({
                type: "POST",
                url: url,
                data: $('#otp').serialize(),
                beforeSend: function() {
                    $("#spinner").addClass("show");
                },
                complete: function() {
                    $("#spinner").removeClass("show");
                },
                success: function(response) {
                    var typeOfResponse = response.type;
                    var res = response.msg;
                    if (typeOfResponse == 0) {
                        iziToast.error({
                            title: 'Error',
                            message: res,
                            position: 'topRight'
                        });
                    } else if (typeOfResponse == 1) {
                        iziToast.success({
                            title: 'Success',
                            message: "Account is verified",
                            position: 'topRight'
                        });
                        window.location.href = "{{ url('/doctor/login') }}";
                    }
                }
            });
        });

        $('#sendmail').on('click', function(e) {
            e.preventDefault();

            var email = $("input#email").val();
            var url = '{{ url('/doctor/register/send/otp') }}' + '/' + email;
            $.ajax({
                type: "GET",
                url: url,
                // data: $('#otp').serialize(),
                beforeSend: function() {
                    $("#spinner").addClass("show");
                },
                complete: function() {
                    $("#spinner").removeClass("show");
                },
                success: function(response) {
                    var typeOfResponse = response.type;
                    var res = response.msg;
                    if (typeOfResponse == 0) {
                        iziToast.error({
                            title: 'Error',
                            message: res,
                            position: 'topRight'
                        });
                    } else if (typeOfResponse == 1) {
                        iziToast.success({
                            title: 'Success',
                            message: res,
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    </script>
@endsection
