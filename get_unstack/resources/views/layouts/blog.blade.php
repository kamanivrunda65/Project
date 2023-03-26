@include('layouts.header')
<style>
    
element.style {
}
.gallery-item img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -ms-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
    width: 100%;
    height: 100%;
}
</style>
<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area pattern-bg-2 bg-white shadow-sm overflow-hidden pt-50px pb-50px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="hero-content">
            <ul class="breadcrumb-list pb-2">
                <li><a href="#">Home</a><span><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg></span></li>
                <li><a href="#">{{$blogdata->category}}</a><span><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg></span></li>
                <li>{{$blogdata->blog_title}}</li>
            </ul>
            <h2 class="section-title">{{$blogdata->blog_title}}</h2>
            <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 mt-4 bg-transparent">
                <a href="#" class="media-img media-img--sm d-block mr-2 rounded-full">
                    <img src="{{URL::asset('asset/'.$userdata->profile_pic)}}" data-src="{{URL::asset('asset/'.$userdata->profile_pic)}}" alt="avatar" class="rounded-full lazy">
                </a>
                <div class="media-body">
                    <h5 class="fs-14 fw-medium">By <a href="#">{{$userdata->name}}</a></h5>
                    <small class="meta d-block lh-20">
                        <span class="mr-2">{{date('d M,Y', strtotime($blogdata->created_at))}}</span>
                        <span class="mr-2 fs-15">.</span>
                        <a href="#comments" class="page-scroll text-gray"><i class="la la-comment mr-1"></i>{{$blogdata->comments}}</a>
                    </small>
                </div>
            </div>
        </div><!-- end hero-content -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START BLOG AREA
================================= -->
<section class="blog-area pt-80px pb-80px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-item">
                    <div class="card-body">
                        <p class="card-text pb-3">{{$blogdata->blog_content}}</p>
                        <h4 class="pb-3 fs-22">Some real life examples</h4>
                        <div class="row" id="blog-image">
                           
                        </div><!-- end row -->
                        <hr class="border-top-gray">
                        <h4 class="pb-3 fs-20 pt-2">Tags:</h4>
                        <div class="tags pb-3" id="blog-tag">
                          
                        </div>
                        <h4 class="pb-2 fs-20">Share:</h4>
                        <div class="social-icon-box">
                            <a class="mr-1 icon-element icon-element-xs shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Facebook">
                                <svg focusable="false" class="svg-inline--fa fa-facebook-f fa-w-10 la-icon" width="15px" height="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                            </a>
                            <a class="mr-1 icon-element icon-element-xs shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Twitter">
                                <svg focusable="false" class="svg-inline--fa fa-twitter fa-w-16 la-icon" width="15px" height="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                            </a>
                            <a class="mr-1 icon-element icon-element-xs shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Linkedin">
                                <svg focusable="false" class="svg-inline--fa fa-linkedin fa-w-14 la-icon" width="15px" height="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
                            </a>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
                <div class="card card-item">
                    <div class="card-body">
                        <h4 class="pb-3 fs-20">{{$blogdata->comments}} Comments</h4>
                        <ul class="comments-list pt-3" id="comments">
                          
                        </ul>
                    </div><!-- end card-body -->
                </div><!-- end card -->
                <form method="post" class="card card-item" id="blogcomment">
                    @csrf
                    <div class="card-body row">
                        <div class="form-group col-lg-12">
                            <h4 class="fs-20">Leave a Reply</h4>
                        </div><!-- end form-group -->
                       <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                       <input type="hidden" name="blog_id" value="{{$blogdata->id}}">
                       <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                        <div class="form-group col-lg-12">
                            <label class="fs-13 text-black lh-20">Message</label>
                            <textarea class="form-control form--control" name="comment" rows="5" placeholder="Your comment here..."></textarea>
                        </div><!-- end form-group -->
                        <div class="form-group col-lg-12 mb-0">
                            <button class="btn theme-btn" type="submit">Post Comment </button>
                        </div><!-- end form-group -->
                    </div><!-- end card-body -->
                </form>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Search blog</h3>
                            <div class="divider"><span></span></div>
                            <form method="post" class="pt-4">
                                <div class="form-group mb-0">
                                    <input class="form-control form--control form--control-bg-gray" type="text" name="search" placeholder="Type your search words...">
                                    <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Categories</h3>
                            <div class="divider"><span></span></div>
                            <div class="category-list pt-4">
                                <a href="#" class="cat-item d-flex align-items-center justify-content-between mb-3 hover-y">
                                    <span class="cat-title">Technology</span>
                                    <span class="cat-number">238</span>
                                </a>
                                <a href="#" class="cat-item d-flex align-items-center justify-content-between mb-3 hover-y">
                                    <span class="cat-title">Project Management</span>
                                    <span class="cat-number">238</span>
                                </a>
                                <a href="#" class="cat-item d-flex align-items-center justify-content-between mb-3 hover-y">
                                    <span class="cat-title">Business</span>
                                    <span class="cat-number">238</span>
                                </a>
                                <a href="#" class="cat-item d-flex align-items-center justify-content-between mb-3 hover-y">
                                    <span class="cat-title">Digital design</span>
                                    <span class="cat-number">238</span>
                                </a>
                            </div>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Trending Posts</h3>
                            <div class="divider"><span></span></div>
                            <div class="sidebar-questions pt-3">
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">Using web3 to call precompile contract</a></h5>
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
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Trending Tags</h3>
                            <div class="divider"><span></span></div>
                            <div class="tags pt-4">
                                <a href="#" class="tag-link tag-link-md">analytics</a>
                                <a href="#" class="tag-link tag-link-md">computer</a>
                                <a href="#" class="tag-link tag-link-md">python</a>
                                <a href="#" class="tag-link tag-link-md">java</a>
                                <a href="#" class="tag-link tag-link-md">swift</a>
                                <a href="#" class="tag-link tag-link-md">javascript</a>
                                <a href="#" class="tag-link tag-link-md">c#</a>
                                <a href="#" class="tag-link tag-link-md">html</a>
                                <a href="#" class="tag-link tag-link-md">machine-language</a>
                            </div>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Follow & Connect</h3>
                            <div class="divider"><span></span></div>
                            <div class="social-icon-box pt-3">
                                <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Follow on Facebook">
                                    <svg focusable="false" class="svg-inline--fa fa-facebook-f fa-w-10" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                                </a>
                                <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Follow on Twitter">
                                    <svg focusable="false" class="svg-inline--fa fa-twitter fa-w-16" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                                </a>
                                <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Follow on Linkedin">
                                    <svg focusable="false" class="svg-inline--fa fa-linkedin fa-w-14" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
                                </a>
                                <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Follow on Instagram">
                                    <svg focusable="false" class="svg-inline--fa fa-instagram-square fa-w-14" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
         END BLOG AREA
================================= -->

<!-- ================================
         START BLOG AREA
================================= -->
<section class="blog-area pt-80px pb-50px bg-gray">
    <div class="container">
        <h2 class="section-title fs-30">Related posts</h2>
        <div class="row mt-40px">
            <div class="col-lg-4">
                <div class="card card-item hover-y">
                    <a href="blog-single.html" class="card-img">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="Card image">
                    </a>
                    <div class="card-body pt-0">
                        <a href="#" class="card-link">Digital design</a>
                        <h5 class="card-title fw-medium"><a href="blog-single.html">Designers should always keep their users in mind</a></h5>
                        <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 mt-4 bg-transparent">
                            <a href="#" class="media-img media-img--sm d-block mr-2 rounded-full">
                                <img src="images/img1.jpg" alt="avatar" class="rounded-full">
                            </a>
                            <div class="media-body">
                                <h5 class="fs-14 fw-medium">By <a href="#">Arden Smith</a></h5>
                                <small class="meta d-block lh-20">
                                    <span>Feb 25, 2021</span>
                                </small>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="card card-item hover-y">
                    <a href="blog-single.html" class="card-img">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="Card image">
                    </a>
                    <div class="card-body pt-0">
                        <a href="#" class="card-link">Project Management</a>
                        <h5 class="card-title fw-medium"><a href="blog-single.html">What You Can Learn About Managing Projects</a></h5>
                        <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 mt-4 bg-transparent">
                            <a href="#" class="media-img media-img--sm d-block mr-2 rounded-full">
                                <img src="images/img2.jpg" alt="avatar" class="rounded-full">
                            </a>
                            <div class="media-body">
                                <h5 class="fs-14 fw-medium">By <a href="#">Kevin Martin</a></h5>
                                <small class="meta d-block lh-20">
                                    <span>Feb 25, 2021</span>
                                </small>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="card card-item hover-y">
                    <a href="blog-single.html" class="card-img">
                        <img class="lazy" src="images/img-loading.png" data-src="images/img11.jpg" alt="Card image">
                    </a>
                    <div class="card-body pt-0">
                        <a href="#" class="card-link">Business</a>
                        <h5 class="card-title fw-medium"><a href="blog-single.html">Open space – new trend in office design</a></h5>
                        <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 mt-4 bg-transparent">
                            <a href="#" class="media-img media-img--sm d-block mr-2 rounded-full">
                                <img src="images/img3.jpg" alt="avatar" class="rounded-full">
                            </a>
                            <div class="media-body">
                                <h5 class="fs-14 fw-medium">By <a href="#">Tim Brooks</a></h5>
                                <small class="meta d-block lh-20">
                                    <span>Feb 25, 2021</span>
                                </small>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
         END BLOG AREA
================================= -->

<div id="popup-box"></div>


@push('blod-details')
<script>
    var userdata={{Js::from($userdata)}}
    console.log(userdata)
    var blogdata={{Js::from($blogdata)}}
    console.log(blogdata)
    blogimage=""
    blogtag=""

//console.log(blogdata.id)

// blog-show-images
        if(blogdata.image.includes(",")==true){
            const myArray = blogdata.image.split(",");
            //console.log(myArray);5
            for(let i=0;i<myArray.length;i++){
                var image = myArray[i];
            blogimage+=`<div class="col-lg-6">
                                <a href="images/img6.jpg" class="gallery-item overflow-hidden mb-4" data-fancybox="gallery">
                                    <img class="lazy" src="{{URL::asset('asset/${image}')}}" data-src="images/img6.jpg" alt="review image">
                                </a>
                            </div><!-- end col-lg-6 -->`
                        }
        }else{
            blogimage+=`<div class="col-lg-6">
                                <a href="images/img6.jpg" class="gallery-item overflow-hidden mb-4" data-fancybox="gallery">
                                    <img class="lazy" src="{{URL::asset('asset/${blogdata.image}')}}" data-src="images/img6.jpg" alt="review image">
                                </a>
                            </div><!-- end col-lg-6 -->`
        }
        document.getElementById('blog-image').innerHTML= blogimage;




// blog-show-tags
        if(blogdata.tags.includes(",")==true){
            const myArray = blogdata.tags.split(",");
            //console.log(myArray);5
            for(let i=0;i<myArray.length;i++){
                var tag = myArray[i];
                blogtag+=` <a href="#" class="tag-link tag-link-md">${tag}</a>`
            }
        }else{
                blogtag+=` <a href="#" class="tag-link tag-link-md">${blogdata.tags}</a>`
        }
        document.getElementById('blog-tag').innerHTML= blogtag;



//blog-post-comment

 $('form#blogcomment').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: 'http://localhost:8000/api/bcomment',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            location.reload();
        },
        error: function(error) {
            console.log(error);
        }
    });
 });


//show-blog-comment
 showblogcomment()
 function showblogcomment(){
        fetch("http://localhost:8000/api/blogcomment").then(response=>response.json()).then((res)=>{
            //console.log(res);
            blogcommentdata=""
            res.forEach(element => {
               // console.log('bid=',element.blog_id)
                if(blogdata.id==element.blog_id){
                var formateddate=dateformate(element.created_at);
                blogcommentdata+=`<li class="mb-3 ">
                                <div class="comment-avatar">
                                    <img class="lazy" src="{{URL::asset('asset/${element.profile_pic}')}}" data-src="{{URL::asset('asset/${element.profile_pic}')}}" alt="avatar">
                                </div>
                                <div class="comment-body pt-0">
                                    <span class="comment-user text-black">${element.user_name}</span>
                                    <span class="comment-separated">-</span>
                                    <span class="comment-date text-gray">${formateddate}</span>
                                    <p class="comment-text pt-1 pb-2 lh-22">${element.comment}</p>
                                    <button onclick="popupcomment(${element.id})" class="comment-reply hover-underline btn-sm btn-primary" data-toggle="modal" data-target="#replyModal"><i class="la la-reply mr-1"></i>Reply</button>
                                    
                                </div>
                            </li>`
                            showblogsubcomment(element.id)
                            blogcommentdata+= `<div id="${element.id}"></div>`;
                        }
            });
            document.getElementById('comments').innerHTML= blogcommentdata;
        })
 }



//post-blog-subcomment
 function postblogsubcomment(){
   
    event.preventDefault();
    let FormData = $("#blogsubcomment").serializeArray() ;  
    //console.log(FormData);
    var result = {};
    $.each(FormData, function() {
        result[this.name] = this.value;   
    });
        
    //console.log(result);
    $.ajax({
        url: 'http://localhost:8000/api/bsubcomment',
        type: 'POST',
        data: result,
        success: function(response) {
            console.log(response);
            location.reload();
        },
        error: function(error) {
            console.log(error);
            
        }
    });
 
 }

//show-blog-sub-comment


 function showblogsubcomment(id){
    //console.log(id);
    fetch("http://localhost:8000/api/blogsubcomment").then(response=>response.json()).then((res)=>{
        //console.log(res);
        blogsubcomment=""
        res.forEach(element => {
            if(id==element.comment_id){
            var formateddate=dateformate(element.created_at);
            blogsubcomment+=`<li class="mb-3 comment-reply">
                                <div class="comment-avatar">
                                    <img class="lazy" src="{{URL::asset('asset/${element.profile_pic}')}}" data-src="{{URL::asset('asset/${element.profile_pic}')}}" alt="avatar">
                                </div>
                                <div class="comment-body pt-0">
                                    <span class="comment-user text-black">${element.user_name}</span>
                                    <span class="comment-separated">-</span>
                                    <span class="comment-date text-gray">${formateddate}</span>
                                    <p class="comment-text pt-1 pb-2 lh-22">${element.subcomment}</p>
                                </div>
                            </li>`;
                        }
        });
        document.getElementById(id).innerHTML=blogsubcomment;
    })
 }

//popupcommentbox
 function popupcomment(id)
 {
    //console.log(id);
    popupbox=`<div class="modal fade modal-container" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="replyModalTitle">Replay to this comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="blogsubcomment">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="bid" value="{{$blogdata->id}}">
                    <input type="hidden" name="comment_id" value="${id}">
                                            
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Message</label>
                        <textarea class="form-control form--control" rows="5" placeholder="Write message here..." name="comment"></textarea>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100" onclick="postblogsubcomment()">
                            Reply <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>`
document.getElementById('popup-box').innerHTML=popupbox;
 }
</script>
    
@endpush
@include('layouts.footer')