@include('layouts.header')
<style>
    .profile-img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    width: 160px;
    height: 160px;
}
</style>
<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-60px">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-content d-flex align-items-center">
                    <div class="icon-element shadow-sm flex-shrink-0 mr-3 border border-gray lh-55">
                        <svg xmlns="http://www.w3.org/2000/svg" height="55px" viewBox="0 0 24 24" width="32px" fill="#2d86eb"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                    </div>
                    <h2 class="section-title fs-30">Settings</h2>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="hero-btn-box text-right py-3">
                    <a href="/profile" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i class="la la-user mr-1"></i>View Profile</a>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <ul class="nav nav-tabs generic-tabs generic--tabs generic--tabs-2 mt-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="true">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="email-settings-tab" data-toggle="tab" href="#email-settings" role="tab" aria-controls="email-settings" aria-selected="false">Email Settings</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" id="delete-account-tab" data-toggle="tab" href="#delete-account" role="tab" aria-controls="delete-account" aria-selected="false">Delete Account</a>
            </li>
        </ul>
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START USER DETAILS AREA
================================= -->
<section class="user-details-area pt-40px pb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content mb-50px" id="myTabContent">
                    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                        <div class="user-panel-main-bar">
                            <div class="user-panel">
                                <div class="bg-gray p-3 rounded-rounded">
                                    <h3 class="fs-17">Edit your profile</h3>
                                </div>
                                <form method="post" class="pt-35px" route="{{url('/')}}/setting" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="settings-item mb-10px">
                                        <h4 class="fs-14 pb-2 text-gray text-uppercase">Public information</h4>
                                        <div class="divider"><span></span></div>
                                        <div class="row pt-4 align-items-center">
                                            <div class="col-lg-6">
                                                <div class="edit-profile-photo d-flex flex-wrap align-items-center">
                                                    @if(Auth::user()->profile_pic!=null)
                                                    <img src="{{Storage::url(Auth::user()->profile_pic)}}"  class="profile-img mr-4">
                                                    @else
                                                    <img src="#"  class="profile-img mr-4">
                                                    @endif
                                                    <div>
                                                        <div class="file-upload-wrap file--upload-wrap">
                                                            <input type="file" id="profile_pic" name="profile_pic" class="multi file-upload-input" >
                                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload Photo</span>
                                                        </div>
                                                        <p class="fs-14">Maximum file size: 10 MB.</p>
                                                    </div>
                                                </div><!-- end edit-profile-photo -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Display name</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control" type="hidden" name="user_id" id="name" value="{{Auth::user()->id}}">
                                                        <input class="form-control form--control" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Location</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control" type="text" name="country" value="{{Auth::user()->country}}">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="fs-15 text-black lh-20 fw-medium">About me(Objective)</label>
                                                    {{-- <p>{{Auth::user()->objective}}</p> --}}
                                                    <div class="form-group">
                                                        <input class="form-control form--control " rows="3" cols="40" name="objective"  value="{{Auth::user()->objective}}">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </div><!-- end settings-item -->
                                    <div class="settings-item">
                                        <h4 class="fs-14 pb-2 text-gray text-uppercase">Web presence</h4>
                                        <div class="divider"><span></span></div>
                                        <div class="row pt-4">
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Website link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="web_link" value="{{Auth::user()->web_link}}">
                                                        <span class="la la-link input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Twitter link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="twitter_link" value="{{Auth::user()->twitter_link}}">
                                                        <span class="la la-twitter input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Facebook link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="facebook_link" value="{{Auth::user()->facebook_link}}">
                                                        <span class="la la-facebook input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Instagram link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="insta_link" value="{{Auth::user()->insta_link}}">
                                                        <span class="la la-instagram input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">Youtube link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="youtube_link" value="{{Auth::user()->youtube_link}}">
                                                        <span class="la la-youtube input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20 fw-medium">GitHub link</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-40px" type="text" name="github_link" value="{{Auth::user()->github_link}}">
                                                        <span class="la la-github input-icon"></span>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                           
                                            <div class="col-lg-12">
                                                <div class="submit-btn-box pt-3">
                                                    <button class="btn theme-btn" type="submit">Save changes</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </div><!-- end settings-item -->
                                </form>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                        <div class="user-panel-main-bar">
                            <div class="user-panel">
                                <div class="bg-gray p-3 rounded-rounded">
                                    <h3 class="fs-17">Change password</h3>
                                </div>
                                <form method="post" class="pt-20px" id="passwordform" >
                                    @csrf
                                    <div class="settings-item mb-30px">
                                        <div class="form-group">
                                            <label class="fs-13 text-black lh-20 fw-medium">Current Password</label>
                                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                            <input class="form-control form--control password-field" type="password" name="current_password" placeholder="Current password">
                                        </div>
                                        <div class="form-group">
                                            <label class="fs-13 text-black lh-20 fw-medium">New Password</label>
                                            <input class="form-control form--control password-field" type="password" name="new_password" placeholder="New password">
                                        </div>
                                        <div class="form-group">
                                            <label class="fs-13 text-black lh-20 fw-medium">New Password (again)</label>
                                            <input class="form-control form--control password-field" type="password" name="new_confirm" placeholder="New password again">
                                            <p class="fs-14 lh-18 py-2">Passwords must contain at least eight characters, including at least 1 letter and 1 number.</p>
                                            <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button" data-toggle="tooltip" data-placement="right" title="Show/hide password">
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                            </button>
                                        </div>
                                        <div class="submit-btn-box pt-3">
                                            <button class="btn theme-btn" type="submit" onclick="changepassword({{Auth::user()->id}})" >Change Password</button>
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
                    <div class="tab-pane fade" id="email-settings" role="tabpanel" aria-labelledby="email-settings-tab">
                        <div class="user-panel-main-bar">
                            <div class="user-panel">
                                <div class="bg-gray p-3 rounded-rounded">
                                    <h3 class="fs-17">Email Settings</h3>
                                </div>
                                <form method="post" class="pt-20px">
                                    <div class="settings-item mb-30px border-bottom border-bottom-gray pb-30px">
                                        <label class="fs-13 text-black lh-20 fw-medium">Email Address</label>
                                        <div class="input-group">
                                            <input class="form-control form--control" type="email" name="email" value="ardensmith81@gmail.com">
                                            <div class="input-group-append">
                                                <button class="btn theme-btn" type="button">Save</button>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Features & Announcements</label>
                                            <span class="fs-13 d-block lh-18 pb-3">New products and feature updates, as well as occasional company announcements</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option1" checked> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option2"> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">The Disilab</label>
                                            <span class="fs-13 d-block lh-18 pb-3">An email rounding up the best news, entertainment, and culture from the world of software development</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option3" checked> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option4"> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Tips & Reminders</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Timely advice and reminders to help you make the most of our features</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option5"> Off
                                                    </label>
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option6" checked> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Inbox</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Answers to your questions, comments, chat notifications, and more</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option7"> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option8" checked> Weekly
                                                    </label>
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option9"> Daily
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option10"> 3 hrs
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Community Milestones</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Notifications about bounties, reputation and more. Hint: sometimes involves swag.</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option11"> Off
                                                    </label>
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option12" checked> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Research</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Invitations to participate in surveys, usability tests, and more. Only a few per year.</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option13" checked> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option14"> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item mb-20px border-bottom border-bottom-gray pb-20px">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Recommended Jobs</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Occasional emails highlighting special jobs and companies</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option15" checked> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option16"> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                    <div class="settings-item">
                                        <div class="input-box">
                                            <label class="fs-14 text-black lh-20 fw-medium mb-0">Company Alerts</label>
                                            <span class="fs-13 d-block lh-18 pb-3">Content from companies you follow</span>
                                            <div class="form-group">
                                                <div class="btn-group btn--group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input type="radio" name="options" id="option17" checked> Off
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" name="options" id="option18"> Weekly
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end settings-item -->
                                </form>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->
                   
                    <div class="tab-pane fade" id="delete-account" role="tabpanel" aria-labelledby="delete-account-tab">
                        <div class="user-panel-main-bar">
                            <div class="user-panel">
                                <div class="delete-account-info card card-item border border-danger">
                                    <div class="card-body">
                                        <h3 class="fs-22 text-danger fw-bold">Delete Account</h3>
                                        <p class="pb-3 pt-2 lh-22 fs-15">Before confirming that you would like your profile deleted, we'd like to take a moment to explain the implications of deletion:</p>
                                        <ul class="generic-list-item generic-list-item-bullet fs-15">
                                            <li>Deletion is irreversible, and you will have no way to regain any of your original content, should this deletion be carried out and you change your mind later on.</li>
                                            <li>Your questions and answers will remain on the site, but will be disassociated and anonymized (the author will be listed as "user15319675") and will not indicate your authorship even if you later return to the site.</li>
                                        </ul>
                                        <p class="pb-3 pt-2 lh-22 fs-15">Once you delete your account, there is no going back. Please be certain.</p>
                                        <div class="custom-control custom-checkbox fs-15 mb-4">
                                            <input type="checkbox" class="custom-control-input" id="delete-terms">
                                            <label class="custom-control-label custom--control-label lh-22" for="delete-terms">I have read the information stated above and understand the implications of having my profile deleted. I wish to proceed with the deletion of my profile.</label>
                                        </div>
                                        <button type="button" class="btn btn-danger fw-medium" data-toggle="modal" data-target="#deleteModal" id="delete-button" disabled><i class="la la-trash mr-1"></i> Delete your account</button>
                                    </div>
                                </div>
                            </div><!-- end user-panel -->
                        </div><!-- end user-panel-main-bar -->
                    </div><!-- end tab-pane -->
                </div>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="card card-item p-4">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Number Achievement</h3>
                            <div class="divider"><span></span></div>
                            <div class="row no-gutters text-center">
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color">980k</span>
                                        <p class="fs-14">Questions</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-2">610k</span>
                                        <p class="fs-14">Answers</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-3">650k</span>
                                        <p class="fs-14">Answer accepted</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-4">320k</span>
                                        <p class="fs-14">Users</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12 pt-3">
                                    <p class="fs-14">To get answer of question <a href="signup.html" class="text-color hover-underline">Join<i class="la la-arrow-right ml-1"></i></a></p>
                                </div>
                            </div><!-- end row -->
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item p-4">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Trending Questions</h3>
                            {{-- <div class="divider"><span></span></div> --}}
                            <div class="sidebar-questions pt-3">
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details">Using web3 to call precompile contract</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">2 mins ago</span>
                                            <span class="pr-1">. by</span>
                                            <a href="#" class="author">Sudhir Kumbhare</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">Is it true while finding Time Complexity of the algorithm [closed]</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">48 mins ago</span>
                                            <span class="pr-1">. by</span>
                                            <a href="#" class="author">wimax</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">image picker and store them into firebase with flutter</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">1 hour ago</span>
                                            <span class="pr-1">. by</span>
                                            <a href="#" class="author">Antonin gavrel</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->
                            </div><!-- end sidebar-questions -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area -->
<!-- ================================
         END USER DETAILS AREA
================================= -->
@push('custom-script')
    

<script>
    function changepassword(id){
        event.preventDefault();     
        let FormData = $("#passwordform").serializeArray() ;  
        //console.log(FormData);
        var result = {};
        $.each(FormData, function() {
            result[this.name] = this.value;   
        });
        console.log(result);
        let header_for_post = {
            method: 'POST', 
            mode:'cors',
            headers :{"Content-Type":"application/json",},
            body: JSON.stringify(result), 
        }
        console.log(header_for_post);
        fetch("http://localhost:8000/api/changepassword", header_for_post).then((res) => res.json()).then((response) => {
            console.log(response);
        });
       
    }
</script>
@endpush
@include('layouts.footer')