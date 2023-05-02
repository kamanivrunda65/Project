
<!-- ================================
    strat FOOTER AREA
================================= -->
<div id="login-form"></div>
<section class="footer-area pt-80px bg-dark position-relative">

<div class="container">
   <div class="row">
       <div class="col-lg-3 responsive-column-half">
           <div class="footer-item">
               <h3 class="fs-18 fw-bold pb-2 text-white">Company</h3>
               <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                   <li><a href="about">About</a></li>
                   <li><a href="contact">Contact</a></li>
                   <li><a href="careers">Careers</a></li>
                   <li><a href="advertising">Advertising</a></li>
               </ul>
           </div><!-- end footer-item -->
       </div><!-- end col-lg-3 -->
       <div class="col-lg-3 responsive-column-half">
           <div class="footer-item">
               <h3 class="fs-18 fw-bold pb-2 text-white">Legal Stuff</h3>
               <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                   <li><a href="privacy-policy">Privacy Policy</a></li>
                   <li><a href="terms-and-conditions">Terms of Service</a></li>
                   <li><a href="privacy-policy">Cookie Policy</a></li>
               </ul>
           </div><!-- end footer-item -->
       </div><!-- end col-lg-3 -->
       <div class="col-lg-3 responsive-column-half">
           <div class="footer-item">
               <h3 class="fs-18 fw-bold pb-2 text-white">Help</h3>
               <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                   <li><a href="faq">Knowledge Base</a></li>
                   <li><a href="contact">Support</a></li>
               </ul>
           </div><!-- end footer-item -->
       </div><!-- end col-lg-3 -->
       <div class="col-lg-3 responsive-column-half">
           <div class="footer-item">
               <h3 class="fs-18 fw-bold pb-2 text-white">Connect with us</h3>
               <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                   <li><a href="#"><i class="la la-facebook mr-1"></i> Facebook</a></li>
                   <li><a href="#"><i class="la la-twitter mr-1"></i> Twitter</a></li>
                   <li><a href="#"><i class="la la-linkedin mr-1"></i> LinkedIn</a></li>
                   <li><a href="#"><i class="la la-instagram mr-1"></i> Instagram</a></li>
               </ul>
           </div><!-- end footer-item -->
       </div><!-- end col-lg-3 -->
   </div><!-- end row -->
</div><!-- end container -->
<hr class="border-top-gray my-5">
<div class="container">
   <div class="row align-items-center pb-4 copyright-wrap">
       <div class="col-lg-6">
           <a href="index.html" class="d-inline-block">
               <img src="{{ URL::asset('assets/images/logo-dark.png')}}" alt="footer logo" class="footer-logo">
           </a>
       </div><!-- end col-lg-6 -->
   </div><!-- end row -->
</div><!-- end container -->
</section><!-- end footer-area -->
<!-- Modal -->
@if(Auth::check())
<div class="modal fade modal-container login-form " id="reviewModal"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered box" role="document">
        <div class="modal-content">
            @if(Auth::user()->user_review==1)
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="loginModalTitle">Your Review!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_btn">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="model-body container mt-10px mb-10px">
                <br>
               <center> <h5>Review Submited Successfully</h5></center>
            </div>
            <br>
            <div class="model-body container mt-10px mb-10px text-right">
                <button class="btn btn-danger" onclick="deletereview({{Auth::user()->id}})">Delete your Review</button>
            </div>
            @else
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="loginModalTitle">Add Your Review!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_btn">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="reviewform">
                    @csrf
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Review</label>
                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        <textarea class="form-control form--control" type="text" name="review" placeholder="review..." rows="5"></textarea>
                    </div>
                   
                    
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                             Submit <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                    </div>
                    
                   
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

<!-- ================================
     END FOOTER AREA
================================= -->
<script>
    function loginpopup()
    {
        window.location.href="/login";

    }
    $('form#reviewform').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: 'http://localhost:8000/api/review',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
});
</script>


<!-- template js files -->
<script src="{{ URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.lazy.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/main.js')}}"></script>
<!-- <script src="{{ URL::asset('assets/js/map.js')}}"></script> -->
<script src="{{ URL::asset('assets/js/jquery.multi-file.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery-te-1.4.0.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/selectize.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/upvote.vanilla.js')}}"></script>
<script src="{{ URL::asset('assets/js/upvote-script.js')}}"></script>
<script src="{{ URL::asset('assets/js/selectize.min.js')}}"></script>
@stack('custom-script')
@stack('question-script')
@stack('show-question')
@stack('question-comment')
@stack('blog-details')
@stack('front-blog')
@stack('profile')
@stack('forgot-password')
@stack('reset-password')
@stack('tags-all-data')
@stack('search-question')
@stack('notification')
<script>
//delete-review
 function deletereview(id)
 {
    fetch("http://localhost:8000/api/deletereview/"+id).then(response=>response.json()).then((res)=>{
        console.log(res);
        location.reload();
    })
 }
//date-formate
    function dateformate(date){
    const postDate = date;
    const dateObj = new Date(postDate);
    const timeDiff = Math.abs(Date.now() - dateObj.getTime());
    const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
    if (days > 7) {
            const data=dateObj.toDateString();
            return data;
    } else if (days >= 1) {
            const data=`${days} days ago`;
            return data;
    } else if (hours >= 1) {
            const data=`${hours} hours ago`;
            return data;
    } else {
            const data=`${minutes} minutes ago`;
            return data;
    }
    }
//show-tags
    alltags()
    function alltags()
    {
        fetch("http://localhost:8000/api/tags").then(response=>response.json()).then((res)=>{
           // console.log(res);
            alltag=""
            count=0
            res.forEach(element => {
                count++
                if(count<=5)
                {
                    alltag+=`<div class="tag-item">
                                    <a href="/tags/${element.tagname}" class="tag-link tag-link-md">${element.tagname}</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>${element.total_question+element.total_blog}</span>
                                        </span>
                                </div>`
                }
                
                else
                {
                    if(count==6)
                    {
                        alltag+=`<div class="collapse" id="showMoreTags">`
                    }
                    alltag+=`<div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">${element.tagname}</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                            </div>`
                }
            });
            alltag+=`</div>
            <a class="collapse-btn fs-13" data-toggle="collapse" href="#showMoreTags" role="button" aria-expanded="false" aria-controls="showMoreTags">
                                    <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-11"></i></span>
                                    <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-11"></i></span>
                    </a>`
                document.getElementById('tags-data').innerHTML=alltag;
        })
    }
//treanding-post
    treandingpost()
 function treandingpost()
 {
    fetch("http://localhost:8000/api/trendingpost").then(response=>response.json()).then((res)=>{
        //console.log(res);
        trendingpost=""
        res.forEach(element => {
            var formateddate=dateformate(element.created_at)
            trendingpost+=`<div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="/blog/${element.id}">${element.blog_title}</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">${formateddate}</span>
                                            <span class="pr-1">. by</span>
                                            <a href="/profile/${element.user_name}" class="author">${element.user_name}</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->`
        });
        document.getElementById('trending-post').innerHTML=trendingpost;
    })
 }

//blog-slider
    blogsection()
 function blogsection()
 {
    fetch("http://localhost:8000/api/blogsection").then(response=>response.json()).then((res)=>{
        //console.log(res);
        sectionblog="";
        res.forEach(element => {
            var formateddate=dateformate(element.created_at)
            sectionblog+=` 
                    <div class="card card-item hover-y">
                        <a href="/blog/${element.id}" class="card-img">`
                            if(element.image.includes(",")==true){
                                const myArray = element.image.split(",");
                                let image = myArray[0];
                                sectionblog += `<img class="lazy" src="{{URL::asset('asset/${image}')}}" data-src="{{URL::asset('asset/${image}')}}" alt="Card image">`
                            }
                            else{
                                sectionblog += `<img class="lazy" src="{{URL::asset('asset/${element.image}')}}" data-src="{{URL::asset('asset/${element.image}')}}" alt="Card image">`
                            }           
             sectionblog += `</a>
                        <div class="card-body pt-0">
                            <a href="/category/${element.category}" class="card-link">${element.categoryname}</a>
                            <h5 class="card-title fw-medium"><a href="/blog/${element.id}">${element.blog_title}</a></h5>
                            <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 mt-4 bg-transparent">
                                <a href="/profile/${element.user_name}" class="media-img media-img--sm d-block mr-2 rounded-full">
                                    <img src="{{URL::asset('asset/${element.profile_pic}')}}" alt="avatar" class="rounded-full">
                                </a>
                                <div class="media-body">
                                    <h5 class="fs-14 fw-medium">By <a href="/profile/${element.user_name}">${element.user_name}</a></h5>
                                    <small class="meta d-block lh-20">
                                        <span>${formateddate}</span>
                                    </small>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                `
        });
        document.getElementById("blog-section").innerHTML=sectionblog;
    })
 }
//show-category
    showcategory()
 function showcategory()
 {
    fetch("http://localhost:8000/api/category").then(response=>response.json()).then((res)=>{
       // console.log(res);
        categorydata=""
        res.forEach(element => {
            categorydata+=` <a onclick="showblog(1,10,${element.id})" class="cat-item d-flex align-items-center justify-content-between mb-3 hover-y">
                                <span class="cat-title">${element.categoryname}</span>
                                <span class="cat-number">${element.total}</span>
                            </a>`
        });
        document.getElementById('category-data').innerHTML= categorydata;
    })
 }
//show-question-related
    trendingquestion()
    function trendingquestion()
    {
        fetch("http://localhost:8000/api/trendingquestion").then(response=>response.json()).then((res)=>{
           // console.log(res);
            trendingquestion=""
            res.forEach(element => {
                var formateddate=dateformate(element.created_at);
                trendingquestion+=` <div class="media media-card media--card media--card-2">
                                <div class="media-body">
                                    <h5><a href="/questiondetail/${element.id}">${element.question}</a></h5>
                                    <small class="meta">
                                        <span class="pr-1">${formateddate}</span>
                                        <span class="pr-1">. by</span>
                                        <a href="#" class="author">${element.name}</a>
                                    </small>
                                </div>
                            </div><!-- end media -->`
            });
            document.getElementById("trending-question").innerHTML=trendingquestion;
        })
    }

//number-achivement
    achievement()
    function achievement()
    {
        fetch("http://localhost:8000/api/achievement").then(response=>response.json()).then((res)=>{
            //console.log(res);
            achievement=`<div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color">${res.question}</span>
                                        <p class="fs-14">Questions</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-2">${res.answer}</span>
                                        <p class="fs-14">Answers</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-3">${res.blog}</span>
                                        <p class="fs-14">Blogs</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column-half">
                                    <div class="icon-box pt-3">
                                        <span class="fs-20 fw-bold text-color-4">${res.user}</span>
                                        <p class="fs-14">Users</p>
                                    </div><!-- end icon-box -->
                                </div><!-- end col-lg-6 -->`
                document.getElementById('achievement').innerHTML=achievement;
        })
    }
</script>

</body>

</html>

<!-- ================================
    END FOOTER AREA
================================= -->


<!-- start back to top -->

<div id="back-to-top" data-toggle="tooltip" data-placement="top" title="Return to top">
<i class="la la-arrow-up la-icon" ></i>

</div>

<!-- end back to top -->
