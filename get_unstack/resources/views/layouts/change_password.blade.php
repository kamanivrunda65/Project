@include('layouts.header')
<style>
    .error{
    color:red;
}
.radius-bottom-right-8 {
    border-bottom-right-radius: 8px !important;
}

.radius-top-right-8 {
    border-top-right-radius: 8px !important;
}
</style>
@if (isset($alertBox) && $alertBox)
    <script>
        var alertchange = alert('Your Password change successfully');
        if (alertchange) {
            window.location.href = 'profile';
        }
    </script>
@endif
@if (isset($alertwrong) && $alertwrong)
    <script>
        var alertchange = alert('Incorrect Password');
        if (alertchange) {
            window.location.href = 'changepassword';
        }
    </script>
@endif
<!--======================================
        START HERO AREA
======================================-->
{{-- <section class="hero-area bg-white shadow-sm overflow-hidden pt-60px pb-50px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-9">
                <div class="hero-content d-flex align-items-center">
                    <div class="icon-element shadow-sm flex-shrink-0 mr-3 border border-gray lh-55">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" height="55px" viewBox="0 0 24 24" width="32px"> <g> <path fill="none" d="M0 0h24v24H0z" height="24" width="24"/> <path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"/> </g> </svg>
                    </div>
                    <h2 class="section-title fs-30">Change Password</h2>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4 col-md-3">
                <div class="hero-btn-box text-right py-3">
                    <a href="setting" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i class="la la-gear mr-1"></i> Edit Profile</a>
                </div>
            </div><!-- end col-lg-4 -->
        </div>
    </div><!-- end container -->
</section>--}}
<!--====================================== 
        END HERO AREA
======================================-->

<!-- ================================
         START USER DETAILS AREA
================================= -->
{{-- <section class="user-details-area pt-60px pb-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div id="change-password" >
                    <div class="user-panel-main-bar">
                        <div class="user-panel">
                            <div class="bg-gray p-3 rounded-rounded">
                                <h3 class="fs-17">Change password</h3>
                            </div>
                            <form method="post" class="pt-20px" id="changepassword" action="/changepassword" >
                                @csrf
                                <div class="settings-item mb-30px">
                                    <div class="form-group">
                                        <label class="fs-13 text-black lh-20 fw-medium">Current Password</label>
                                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                        <input name="user_password" type="hidden" value="{{Auth::user()->password}}">
                                        <input class="form-control form--control password-field" type="password" name="current_password" id="current_password" placeholder="Current password">
                                        @error('current_password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="fs-13 text-black lh-20 fw-medium">New Password</label>
                                        <input class="form-control form--control password-field" type="password" name="password"  id="password" placeholder="New password">
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="fs-13 text-black lh-20 fw-medium">New Password (again)</label>
                                        <input class="form-control form--control password-field" type="password" name="new_confirm" id="new_confirm" placeholder="New password again">
                                        @error('new_confirm')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <p class="fs-14 lh-18 py-2">Passwords must contain at least eight characters, including at least 1 letter and 1 number.</p>
                                       
                                        <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button" data-toggle="tooltip" data-placement="right" title="Show/hide password">
                                            <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                            <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                        </button>
                                    </div>
                                    
                                    <div class="submit-btn-box pt-3">
                                        <button class="btn theme-btn" type="submit"  >Change Password</button>
                                    </div>
                                </div><!-- end settings-item -->
                                <div class="border border-gray p-4">
                                    <h4 class="fs-18 mb-2">Forgot your password</h4>
                                    <p class="pb-3">Don't worry it's happen with everyone. We'll help you to get back your password</p>
                                    <a href="recover-password.html" class="btn theme-btn theme-btn-sm theme-btn-white">Recover Password <i class="la la-arrow-right ml-1"></i></a>
                                </div>
                            </form>
                        </div><!-- end user-panel -->
                    </div><!-- end user-panel-main-bar -->
                </div><!-- end tab-pane -->
            </div><!-- end col-lg-12 -->
         
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area --> --}}
<!-- ================================
         END USER DETAILS AREA
================================= -->


<section class="login-area pt-100px pb-80px position-relative">
    <div class="container">
        <form method="post" class="card card-item login-form" id="changepassword" >
            @csrf
            <div class="card-body row p-0">
                <div class="col-lg-5 mx-auto">
                    <div class="form-action-wrapper py-5">
                        <div class="form-group">
                            <h3 class="fs-22 pb-3 fw-bold">Change Password in GET-UNSTACK</h3>
                            <div class="divider"><span></span></div>
                        </div>
                        <div class="settings-item mb-30px">
                            <div class="form-group">
                                <label class="fs-13 text-black lh-20 fw-medium">Current Password</label>
                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                <input name="user_password" type="hidden" value="{{Auth::user()->password}}">
                                <input class="form-control form--control password-field" type="password" name="current_password" id="current_password" placeholder="Current password">
                                @error('current_password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label class="fs-13 text-black lh-20 fw-medium">New Password</label>
                                <input class="form-control form--control password-field" type="password" name="password"  id="password" placeholder="New password">
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="fs-13 text-black lh-20 fw-medium">New Password (again)</label>
                                <input class="form-control form--control password-field" type="password" name="password_confirmation" id="password_confirmation" placeholder="New password again">
                                @error('password_confirmation')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <p class="fs-14 lh-18 py-2">Passwords must contain at least eight characters, including at least 1 letter and 1 number.</p>
                               
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button" data-toggle="tooltip" data-placement="right" title="Show/hide password">
                                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                </button>
                            </div>
                            
                            <div class="submit-btn-box pt-3">
                                <button class="btn theme-btn" type="submit"  >Change Password</button>
                            </div>
                        </div><!-- end settings-item -->
                        
                    </div><!-- end form-action-wrapper -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-6">
                    <div class="form-content p-4 h-100 d-flex align-items-center justify-content-center flex-column bg-diagonal-gradient-primary radius-top-right-8 radius-bottom-right-8 text-center">
                        <h3 class="fs-35 pb-3 fw-bold text-white">Forgot your password</h3>
                        <p class="text-white fs-16">Don't worry it's happen with everyone. We'll help you to get back your password
                            
                        </p>
                        <br>
                        <a href={{route('forgotpassword')}} class="btn theme-btn theme-btn-sm theme-btn-white">Recover Password <i class="la la-arrow-right ml-1"></i></a>

                    </div>
                </div><!-- end col-lg-6 -->
               
            </div><!-- end row -->
        </form>
    </div><!-- end container -->
    <svg class="position-absolute bottom-0 left-0 w-100 z-index-n1" id="wave" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(248.597, 214.005, 202.895, 1)" offset="0%"/><stop stop-color="rgba(250.873, 203.862, 99.942, 1)" offset="100%"/></linearGradient></defs><path style="transform:translate(0, 0px); opacity:0.1" fill="url(#sw-gradient-0)" d="M0,98L48,155.2C96,212,192,327,288,375.7C384,425,480,408,576,334.8C672,261,768,131,864,81.7C960,33,1056,65,1152,114.3C1248,163,1344,229,1440,269.5C1536,310,1632,327,1728,294C1824,261,1920,180,2016,130.7C2112,82,2208,65,2304,106.2C2400,147,2496,245,2592,253.2C2688,261,2784,180,2880,179.7C2976,180,3072,261,3168,310.3C3264,359,3360,376,3456,367.5C3552,359,3648,327,3744,294C3840,261,3936,229,4032,236.8C4128,245,4224,294,4320,326.7C4416,359,4512,376,4608,334.8C4704,294,4800,196,4896,147C4992,98,5088,98,5184,81.7C5280,65,5376,33,5472,73.5C5568,114,5664,229,5760,245C5856,261,5952,180,6048,138.8C6144,98,6240,98,6336,147C6432,196,6528,294,6624,294C6720,294,6816,196,6864,147L6912,98L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z"/><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(232.659, 165.487, 143.914, 1)" offset="0%"/><stop stop-color="rgba(253.15, 195.918, 69.406, 1)" offset="100%"/></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.2" fill="url(#sw-gradient-1)" d="M0,343L48,343C96,343,192,343,288,302.2C384,261,480,180,576,155.2C672,131,768,163,864,196C960,229,1056,261,1152,285.8C1248,310,1344,327,1440,326.7C1536,327,1632,310,1728,277.7C1824,245,1920,196,2016,220.5C2112,245,2208,343,2304,359.3C2400,376,2496,310,2592,236.8C2688,163,2784,82,2880,98C2976,114,3072,229,3168,236.8C3264,245,3360,147,3456,155.2C3552,163,3648,278,3744,277.7C3840,278,3936,163,4032,155.2C4128,147,4224,245,4320,277.7C4416,310,4512,278,4608,269.5C4704,261,4800,278,4896,302.2C4992,327,5088,359,5184,383.8C5280,408,5376,425,5472,432.8C5568,441,5664,441,5760,392C5856,343,5952,245,6048,204.2C6144,163,6240,180,6336,220.5C6432,261,6528,327,6624,359.3C6720,392,6816,392,6864,392L6912,392L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z"/></svg>
</section>
@include('layouts.footer')
