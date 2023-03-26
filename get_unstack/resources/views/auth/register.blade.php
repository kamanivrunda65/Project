@include('layouts.header')

<!--======================================
    START SIGN UP AREA
======================================-->
<section class="sign-up-area pt-80px pb-80px position-relative">
<div class="container">
    <form  class="card card-item" method="post"  action="{{ route('register') }}">
        @csrf
        <div class="card-body row p-0">
            <div class="col-lg-6">
                <div class="form-content p-5 h-100 d-flex align-items-center justify-content-center flex-column bg-diagonal-gradient-primary-2 radius-top-left-8 radius-bottom-left-8 text-left">
                    <h3 class="fs-35 pb-4 fw-bold text-white w-100">Join the Get-Unstack Community</h3>
                    <div class="hero-list w-100">
                        <div class="d-flex align-items-center pb-30px">
                            <svg width="26" height="26" class="mr-2"><path fill="#ffffff" opacity=".5" d="M4.2 4H22a2 2 0 012 2v11.8a3 3 0 002-2.8V5a3 3 0 00-3-3H7a3 3 0 00-2.8 2z"></path><path fill="#ffffff" d="M1 7c0-1.1.9-2 2-2h18a2 2 0 012 2v12a2 2 0 01-2 2h-2v5l-5-5H3a2 2 0 01-2-2V7zm10.6 11.3c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2c-.6 0-1.2.4-1.2 1.2 0 .7.5 1.1 1.2 1.2zm2.2-5.4l1-.9c.3-.4.4-.9.4-1.4 0-1-.3-1.7-1-2.2-.6-.5-1.4-.7-2.4-.7-.8 0-1.4.2-2 .5-.7.5-1 1.4-1 2.8h1.9v-.1c0-.4 0-.7.2-1 .2-.4.5-.6 1-.6s.8.1 1 .4a1.3 1.3 0 010 1.8l-.4.3-1.4 1.3c-.3.4-.4 1-.4 1.6 0 0 0 .2.2.2h1.5c.2 0 .2-.1.2-.2l.1-.7.5-.7.6-.4z"></path></svg>
                            <p class="fs-15 text-white lh-20 fw-medium">Get unstuck — ask a question</p>
                        </div>
                        <div class="d-flex align-items-center pb-30px">
                            <svg width="26" height="26" class="mr-2"><path fill="#ffffff" d="M12 .7a2 2 0 013 0l8.5 9.6a1 1 0 01-.7 1.7H4.2a1 1 0 01-.7-1.7L12 .7z"></path><path fill="#ffffff" opacity=".5" d="M20.6 16H6.4l7.1 8 7-8zM15 25.3a2 2 0 01-3 0l-8.5-9.6a1 1 0 01.7-1.7h18.6a1 1 0 01.7 1.7L15 25.3z"></path></svg>
                            <p class="fs-15 text-white lh-20 fw-medium">Unlock new privileges like voting and commenting</p>
                        </div>
                        <div class="d-flex align-items-center pb-30px">
                            <svg width="26" height="26" class="mr-2"><path fill="#ffffff" d="M14.8 3a2 2 0 00-1.4.6l-10 10a2 2 0 000 2.8l8.2 8.2c.8.8 2 .8 2.8 0l10-10c.4-.4.6-.9.6-1.4V5a2 2 0 00-2-2h-8.2zm5.2 7a2 2 0 110-4 2 2 0 010 4z"></path><path fill="#ffffff" opacity=".5" d="M13 0a2 2 0 00-1.4.6l-10 10a2 2 0 000 2.8c.1-.2.3-.6.6-.8l10-10a2 2 0 011.4-.6h9.6a2 2 0 00-2-2H13z"></path></svg>
                            <p class="fs-15 text-white lh-20 fw-medium">Save your favorite tags, filters, and jobs</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg width="26" height="26" class="mr-2"><path fill="#ffffff" d="M21 4V2H5v2H1v5c0 2 2 4 4 4v1c0 2.5 3 4 7 4v3H7s-1.2 2.3-1.2 3h14.4c0-.6-1.2-3-1.2-3h-5v-3c4 0 7-1.5 7-4v-1c2 0 4-2 4-4V4h-4zM5 11c-1 0-2-1-2-2V6h2v5zm11.5 2.7l-3.5-2-3.5 1.9L11 9.8 7.2 7.5h4.4L13 3.8l1.4 3.7h4L15.3 10l1.4 3.7h-.1zM23 9c0 1-1 2-2 2V6h2v3z"></path></svg>
                            <p class="fs-15 text-white lh-20 fw-medium">Earn reputation and badges</p>
                        </div>
                    </div>
                    <div class="w-100">
                        <p class="text-white pt-60px pb-3">Already have an account?</p>
                        <a href="login" class="btn theme-btn theme-btn-white px-5 lh-24">Log in</a>
                    </div>
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-5 mx-auto">
                <div class="form-action-wrapper py-5">
                    <div class="form-group">
                        <h3 class="fs-22 pb-3 fw-bold">Sign up to Get-Unstack</h3>
                        <div class="divider"><span></span></div>
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Display name</label>
                        <input type="text" name="name" id="name" class="form-control form--control  @error('name') is-invalid @enderror" placeholder="Enter name" value="{{old('name')}}"  required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Email</label>
                        <input type="text" name="email" id="email" class="form-control form--control  @error('email') is-invalid @enderror" placeholder="Email address" value="{{old('email')}}"  required autocomplete="email">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Password</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field  @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password">

                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                </button>
                            </div>

                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div><!-- end form-group -->

                    <div class="form-group">
                       
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field  " id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

                            

                        </div>

                       
                        <p class="fs-13 lh-18">Passwords must contain at least eight characters, including at least 1 letter and 1 number.</p>
                    </div><!-- end form-group -->

                    <div class="form-group">
                        <button id="send-message-btn" class="btn theme-btn w-100 text-white" type="submit" >Sign up <i class="la la-arrow-right icon ml-1"></i></button>
                    </div><!-- end form-group -->
                    <p class="fs-13 lh-18 pb-3">By clicking “Sign up”, you agree to our <a href="#" class="text-color hover-underline">terms of conditions</a>, <a href="privacy-policy.html" class="text-color hover-underline">privacy policy</a></p>
                    <div class="social-icon-box">
                        <div class="pb-3 d-flex align-items-center">
                            <hr class="flex-grow-1 border-top-gray"><span class="mx-2 text-gray-2 fw-medium text-uppercase fs-14">or</span><hr class="flex-grow-1 border-top-gray">
                        </div>
                        <button class="btn theme-btn google-btn d-flex align-items-center justify-content-center w-100 mb-2" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg></span>
                            <span class="flex-grow-1">Sign up with Google</span>
                        </button>
                        <button class="btn theme-btn facebook-btn d-flex align-items-center justify-content-center w-100 mb-2" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg></span>
                            <span class="flex-grow-1">Sign up with Facebook</span>
                        </button>
                        <button class="btn theme-btn twitter-btn d-flex align-items-center justify-content-center w-100" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></span>
                            <span class="flex-grow-1">Sign up with Twitter</span>
                        </button>
                    </div>
                </div><!-- end form-action-wrapper -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </form>
</div><!-- end container -->
<div class="position-absolute top-0 left-0 w-100 h-100 z-index-n1">
    <svg class="w-100 h-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#2d86eb" opacity="0.06"></path>
    </svg>
</div>
</section>
<!--======================================
    END SIGN UP AREA
======================================-->

@include('layouts.footer')
