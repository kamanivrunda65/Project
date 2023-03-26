@include('layouts.header')
<style>
    .file-upload-wrap .MultiFile-list>.MultiFile-label>span .MultiFile-label {
    width: 40%;
    margin: 5px;
}
</style>
<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="filters pb-40px d-flex flex-wrap align-items-center justify-content-between">
            <h3 class="fs-22 fw-medium mr-0">Add new post</h3>
            <ul class="breadcrumb-list">
                <li><a href="#">Home</a><span><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path></svg></span></li>
                <li>Add new post</li>
            </ul>
        </div><!-- end filters -->
        <form method="post" class="row" route="{{url('/')}}/post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                <div class="card card-item">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Your Name</label>
                            <input type="text" name="user_name" class="form-control form--control fs-14" value="{{Auth::user()->name}}" readonly>
                        </div><!-- end form-group -->
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Post Title</label>
                            <input type="text" name="blog_title" class="form-control form--control fs-14" placeholder="Please choose an appropriate title for the post.">
                            @error('blog_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Post Content</label>
                            <textarea name="blog_content" class="form-control form--control fs-14" rows="9"></textarea>
                            @error('blog_content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox fs-14">
                                <input type="checkbox" class="custom-control-input"  id="agreeCheckBox" data-com.bitwarden.browser.user-edited="yes" required>
                                <label class="custom-control-label custom--control-label" for="agreeCheckBox">By posting, you agreed to the <a href="terms-and-conditions.html" class="text-color hover-underline">Terms of Service </a> and <a href="privacy-policy.html" class="text-color hover-underline">Privacy Policy.</a></label>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn theme-btn" type="submit">Publish Your Post</button>
                        </div><!-- end form-group -->
                    </div><!-- end card-body -->
                </div>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="card card-item">
                    <div class="card-body">
                        
                        <div class="form-group mb-0">
                            <label class="fs-14 text-black fw-medium lh-20">Tags</label>
                            <input class="input-tags input--tags" type="text" name="tags" placeholder="e.g. javascript">
                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div><!-- end form-group -->
                    </div><!-- end card-body -->
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-20">Featured Image</label>
                            <div class="file-upload-wrap file-upload-layout-2">
                                <input type="file" name="image[]" class="multi file-upload-input" multiple>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files here or click to upload.</span>
                            </div>
                        </div><!-- end form-group -->
                    </div><!-- end card-body -->
                </div>
            </div><!-- end col-lg-4 -->
        </form>
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->
@include('layouts.footer')