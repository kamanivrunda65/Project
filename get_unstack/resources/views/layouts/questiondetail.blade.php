@include('layouts.header')
<style>
    .answer-body-wrap, .question-post-body-wrap {
    padding: 15px 0 15px 15px;
    width: calc(91%);
}
</style>
<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-40px pb-40px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="hero-content">
                    <h2 class="section-title pb-2 fs-24 lh-34">Find the best answer to your technical question, <br>
                        help others answer theirs
                    </h2>
                    <p class="lh-26">If you are going to use a passage of Lorem Ipsum, you need to be sure there
                        <br> isn't anything embarrassing hidden in the middle of text.
                    </p>
                    <ul class="generic-list-item pt-3">
                        <li><span class="icon-element icon-element-xs shadow-sm d-inline-block mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="la-icon" height="20px" viewBox="0 0 24 24" width="20px" fill="#6c727c"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/></svg></span> Anybody can ask a question</li>
                        <li><span class="icon-element icon-element-xs shadow-sm d-inline-block mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="la-icon" height="20px" viewBox="0 0 24 24" width="20px" fill="#6c727c"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg></span> Anybody can answer</li>
                        <li><span class="icon-element icon-element-xs shadow-sm d-inline-block mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="la-icon" height="20px" viewBox="0 0 320 512" width="20px"><path fill="#6c727c" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg></span> The best answers are voted up and rise to the top</li>
                    </ul>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="hero-btn-box text-right py-3">
                    <a href="/question" class="btn theme-btn">Ask a Question</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->


<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="question-main-bar mb-50px">
                    <div class="question-highlight">
                        <div class="media media-card shadow-none rounded-0 mb-0 bg-transparent p-0">
                            <div class="media-body">
                                <h5 class="fs-20"><a href="#">{{$data->question}}</a></h5>
                                <div class="meta d-flex flex-wrap align-items-center fs-13 lh-20 py-1">
                                    <div class="pr-3">
                                        <span>Asked</span>
                                        <span class="text-black">{{date('d M,Y', strtotime($data->created_at))}}</span>
                                    </div>
                                    
                                    <div class="pr-3">
                                        <span class="pr-1">Viewed</span>
                                        <span class="text-black">89 times</span>
                                    </div>
                                </div>
                                <div class="tags">
                                    <?php $tags=explode(",",$data->tags);?>
                                    @foreach ($tags as $tag)
                                        <a href="#" class="tag-link">{{$tag}}</a>
                                    @endforeach
                                    
                                  
                                </div>
                            </div>
                        </div><!-- end media -->
                    </div><!-- end question-highlight -->
                    <div class="question d-flex">
                        <div class="votes votes-styled w-auto">
                            <div id="vote" class="upvotejs">
                                <span class="count">{{$data->votes}}</span>
                                <button class="btn btn-success" title="This answer is useful" onclick="questionvotes({{$data->id}},{{Auth::user()->id}})">Vote</button>
                                <a class="star" data-toggle="tooltip" data-placement="right" title="Bookmark this question."></a>
                            </div>
                        </div><!-- end votes -->
                        <div class="question-post-body-wrap flex-grow-1">
                            <div class="question-post-body">
                                <p>{{$data->discription}}</p>
                                
                               
                            </div><!-- end question-post-body -->
                            <div class="question-post-user-action">
                                
                                <div class="media media-card user-media owner align-items-center">
                                    <a href="#" class="media-img d-block">
                                        {{-- <img src="#" alt="avatar"> --}}
                                        <img src="{{URL::asset('asset/'.$userdata->profile_pic)}}" alt="avatar">
                                    </a>
                                    <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <h5 class="pb-1"><a href="#">{{$userdata->name}}</a></h5>
                                           
                                        </div>
                                       
                                    </div>
                                </div><!-- end media -->
                                
                            </div><!-- end question-post-user-action -->
                            <div class="comments-wrap">
                                <ul class="comments-list" id="question-comment">
                                   
                                </ul>
                                <div class="comment-form">
                                    <div class="comment-link-wrap text-center">
                                        <a class="collapse-btn comment-link" data-toggle="collapse" href="#addCommentCollapse" role="button" aria-expanded="false" aria-controls="addCommentCollapse" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Add a comment</a>
                                    </div>
                                    <div class="collapse border-top border-top-gray mt-2 pt-3" id="addCommentCollapse">
                                        <form  class="row pb-3" id="questioncomment" method="post">
                                            @csrf
                                            <div class="col-lg-12">
                                                <h4 class="fs-16 pb-2">Leave a Comment</h4>
                                                <div class="divider mb-2"><span></span></div>
                                            </div><!-- end col-lg-12 -->
                                            
                                            <input class="form-control form--control form-control-sm fs-13" type="hidden" name="user_name" value="{{Auth::user()->name}}" readonly>
                                            <input class="form-control form--control form-control-sm fs-13" type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly>
                                            <input class="form-control form--control form-control-sm fs-13" type="hidden" name="question_id" value="{{$data->id}}" readonly>
                                                   
                                           
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="fs-13 text-black lh-20">Message</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control form--control form-control-sm fs-13" name="comment" rows="5" placeholder="Your comment here..."></textarea>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            <div class="col-lg-12">
                                                <div class="input-box d-flex flex-wrap align-items-center justify-content-between">
                                                    <button class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray" type="submit">Post Comment</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </form>
                                    </div><!-- end collapse -->
                                </div>
                            </div><!-- end comments-wrap -->
                        </div><!-- end question-post-body-wrap -->
                    </div><!-- end question -->
                    <div class="subheader d-flex align-items-center justify-content-between">
                        <div class="subheader-title">
                            <h3 class="fs-16">1 Answer</h3>
                        </div><!-- end subheader-title -->
                        
                    </div><!-- end subheader -->
                    <div class="answer-wrap " id="answer-part">
                        
                        
                       
                        
                    </div><!-- end answer-wrap -->
                    <div class="subheader">
                        <div class="subheader-title">
                            <h3 class="fs-16">Your Answer</h3>
                        </div><!-- end subheader-title -->
                    </div><!-- end subheader -->
                    <div class="post-form">
                        <form method="post" class="pt-3" route="{{url('/')}}/questiondetail/{id}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-box">
                                <label class="fs-14 text-black lh-20 fw-medium">Body</label>
                                <div class="form-group">
                                    <textarea class="form-control form--control form-control-sm fs-13 user-text-editor" name="answer" rows="6" placeholder="Your answer here..."></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                            <input type="hidden" name="user_name" value="{{Auth::user()->name}}" >
                            <input type="hidden" name="question_id" value="{{$data->id}}" >
                            <div class="input-box">
                                <label class="fs-14 text-black fw-medium">Image</label>
                                <div class="form-group">
                                    
                                    <div class="file-upload-wrap file-upload-layout-2">
                                        <input type="file" name="answerfile" class="multi file-upload-input" >
                                       
                                        <span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files here or click to upload.</span>
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end input-box -->
                            <button class="btn theme-btn theme-btn-sm" type="submit" >Post Your Answer</button>
                        </form>
                    </div>
                </div><!-- end question-main-bar -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="card card-item">
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
                    <div class="card card-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-3">
                                <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18" fill="#6c727c"><path d="M1 6l8 5 8-5V4L9 9 1 4c0-1.1.9-2 2-2h12c1.09 0 2 .91 2 2v10c0 1.09-.91 2-2 2H3c-1.09 0-2-.91-2-2V6z"></path></svg>
                                <h3 class="fs-17">Love this site?</h3>
                            </div>
                            <div class="divider"><span></span></div>
                            <p class="fs-14 lh-20 py-3">Get the <span class="text-dark fw-medium">weekly newsletter!</span> In it, you'll get:</p>
                            <ul class="generic-list-item generic-list-item-bullet fs-14 pb-3">
                                <li class="lh-20">The week's top questions and answers</li>
                                <li class="lh-20">Important community announcements</li>
                                <li class="lh-20">Questions that need answers</li>
                            </ul>
                            <button class="btn theme-btn theme-btn-gray w-100">Sign up for the digest</button>
                            <p class="fs-14 pt-1 text-center">See an example newsletter</p>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Related Questions</h3>
                            <div class="divider"><span></span></div>
                            <div class="sidebar-questions pt-3">
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">How to select the dom element with event.target</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">2 mins ago</span>
                                            <span class="pr-1">. by</span>
                                            <a href="#" class="author">Sudhir Kumbhare</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">How can you cut an onion without crying?</a></h5>
                                        <small class="meta">
                                            <span class="pr-1">48 mins ago</span>
                                            <span class="pr-1">. by</span>
                                            <a href="#" class="author">wimax</a>
                                        </small>
                                    </div>
                                </div><!-- end media -->
                                <div class="media media-card media--card media--card-2">
                                    <div class="media-body">
                                        <h5><a href="question-details.html">How to change the behavior of dropdown buttons in HTML</a></h5>
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
                                <div class="tag-item">
                                    <a href="#" class="tag-link tag-link-md">analytics</a>
                                    <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                </div><!-- end tag-item -->
                                <div class="tag-item">
                                    <a href="#" class="tag-link tag-link-md">computer</a>
                                    <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                </div><!-- end tag-item -->
                                <div class="tag-item">
                                    <a href="#" class="tag-link tag-link-md">python</a>
                                    <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                </div><!-- end tag-item -->
                                <div class="tag-item">
                                    <a href="#" class="tag-link tag-link-md">javascript</a>
                                    <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                </div><!-- end tag-item -->
                                <div class="tag-item">
                                    <a href="#" class="tag-link tag-link-md">c#</a>
                                    <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                </div><!-- end tag-item -->
                                <div class="collapse" id="showMoreTags">
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">java</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">swift</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">html</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">angular</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">flutter</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">machine-language</a>
                                        <span class="item-multiplier fs-13">
                                    <span>×</span>
                                    <span>32924</span>
                                </span>
                                    </div><!-- end tag-item -->
                                </div><!-- end collapse -->
                                <a class="collapse-btn fs-13" data-toggle="collapse" href="#showMoreTags" role="button" aria-expanded="false" aria-controls="showMoreTags">
                                    <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-11"></i></span>
                                    <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-11"></i></span>
                                </a>
                            </div>
                        </div>
                    </div><!-- end card -->
                   
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->

<div id="popup-box-answer-comment"></div>

@push('question-comment')
    <script>
       
 //page-data      
    var qdata={{Js::from($data)}};
    var id=qdata.id;
    var user=qdata.user_id;
    var userid={{Auth::user()->id}}
    //console.log(qdata);
    // console.log(id);
    //console.log(userid);

//post-question-coment
    $('form#questioncomment').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: 'http://localhost:8000/api/postanswer',
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

//show-question-comment


    showquestioncomment()
    function showquestioncomment(){
        fetch("http://localhost:8000/api/questioncomment").then(response=>response.json()).then((res)=>{
            //console.log(res);
          // console.log(id);
            qcdata=""
            res.forEach(element => {
                
                if(id==element.question_id){
                const formateddate=dateformate(element.created_at)
                qcdata +=` <li>
                            <div class="comment-actions">
                               
                            </div>
                            <div class="comment-body">
                                <span class="comment-copy">${element.comment}</span>
                                <span class="comment-separated">-</span>
                                <a href="#" class="comment-user" title="15,467 reputation">${element.user_name}</a>
                                <span class="comment-separated">-</span>
                                <a href="#" class="comment-date">${formateddate}</a>
                            </div>
                        </li>`;
                    }
            });
        
            document.getElementById('question-comment').innerHTML= qcdata;
        })
    }
//show answer
    showanswer()
    function showanswer(){
        fetch("http://localhost:8000/api/answer").then(response=>response.json()).then((res)=>{
           // console.log(res);
            answerpart=""
            res.forEach(element => {

                if(id==element.question_id){
                    var formateddate=dateformate(element.created_at);
                    var editdate=dateformate(element.updated_at);
                    answerpart+=`<div class="row1">
                               
                                <div class="votes votes-styled w-auto" >
                                    <div id="vote2" class="upvotejs">
                                        <span class="count">${element.votes}</span>
                                        <button class="btn btn-info" title="This answer is useful" onclick="answervote(${element.id},${userid})">Vote</button>
                                        <br><br>`

                        if(user=={{Auth::user()->id}}){
                            if(element.correct_answer==0)
                            {
                            answerpart+= `<button class="btn btn-sm btn-success" onclick="rightanswer(${element.id},${id})" title="The question owner accepted this answer"><i class="la la-check"></i></button>`
                            }else{
                            answerpart+= `<button class="btn btn-sm btn-danger" onclick="wronganswer(${element.id},${id})" title="The question owner accepted this answer"><i class="la la-close"></i></button>`
  
                            }
                        }
                     
                            if(element.correct_answer==1)
                            {
                                answerpart+=   `<a class="star check star-on" data-toggle="tooltip" data-placement="right" title="The question owner accepted this answer"></a>`
                            }
                            
                           
                        
                    answerpart+=`</div>
                                </div>
                               
                                <div class="answer-body-wrap " >
                                    <div class="answer-body" >${element.answer}</div>
                                    <div class="question-post-user-action" >`
                     if(element.user_id==userid){
                    answerpart+=`<div class="post-menu">
                                            <a onclick="deleteanswer(${element.id})" class="btn">Delete</a>
                                        </div>`
                     }
                    answerpart+=`<div class="media media-card user-media align-items-center">
                                            <a href="profile" class="media-img d-block">
                                                <img src="{{URL::asset('asset/${element.profile_pic}')}}" alt="avatar">
                                            </a>
                                            <div class="media-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="pb-1"><a href="profile">${element.user_name}</a></h5>
                                            
                                                </div>
                                                <small class="meta d-block text-right">
                                                        <span class="text-black d-block lh-18">answered</span>
                                                        <span class="d-block lh-18 fs-12">${formateddate}</span>
                                                </small>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="comments-wrap">`
                                        showanswercomment(element.id)
                            answerpart+= `<ul class="comments-list" id="${element.id}">
                                   
                                        </ul>
                                        <div class="comment-form">
                                            <div class="comment-link-wrap text-center">
                                                <a onclick="popupanswercomment(${element.id})" class="comment-reply hover-underline " data-toggle="modal" data-target="#replyModal">
                                                    Add a comment</a>

                                            </div>
                                           
                                        </div>
                                    </div><!-- end comments-wrap -->
                                </div>
                               </div>`;
                }
            });
            document.getElementById('answer-part').innerHTML= answerpart;
          


        })
    }
//show answer comment
    function showanswercomment(id){
        fetch("http://localhost:8000/api/answercomment").then(response=>response.json()).then((res)=>{
            //console.log(res);
            acdata=""
            count=res.length;
            res.forEach(element => {
                if(id==element.answer_id){
                var formateddate=dateformate(element.created_at);
                acdata+=` <li>
                                       
                                        <div class="comment-body">
                                            <span class="comment-copy">${element.comment}</span>
                                            <span class="comment-separated">-</span>
                                            <a href="user-profile.html" class="comment-user owner" title="224,110 reputation">${element.user_name}</a>
                                            <span class="comment-separated">-</span>
                                            <a href="#" class="comment-date">${formateddate}</a>
                                        </div>
                                    </li>`;
                                }
            });
            document.getElementById(id).innerHTML= acdata;
        })
    }

//delete-answer
    function deleteanswer(id)
    {
        //console.log(id);
        fetch("http://localhost:8000/api/deleteanswer/"+id).then(response=>response.json()).then((res)=>{
            console.log(res);
        })
    }
//answer-vote
    function answervote(id,uid){
        // console.log(id);
        // console.log(uid);
        fetch("http://localhost:8000/api/answervote/"+id+"/"+uid).then(response=>response.json()).then((res)=>{
            console.log(res);
            showanswer();
        })
    }

//question-cotes
    function questionvotes(qid,uid)
    {
        // console.log(qid);
        // console.log(uid);
        fetch("http://localhost:8000/api/questionvote/"+qid+"/"+uid).then(response=>response.json()).then((res)=>{
            //console.log(res);
            //alert(res);
            // showanswer();
            location.reload();
        })
    }

//post-answer-comment
    function postcomment(){
        // var id=5;
        // console.log(id);
        event.preventDefault();
        let FormData = $("#answercomment").serializeArray() ;  
        console.log(FormData);
        var result = {};
        $.each(FormData, function() {
            result[this.name] = this.value;   
        });
        
        $.ajax({
        url: 'http://localhost:8000/api/acomment',
        type: 'POST',
        data: result,
        success: function(response) {
            console.log(response);
            showanswer();
        },
        error: function(error) {
            console.log(error);
        }
    });
    }
//popupcommentbox
 function popupanswercomment(id)
 {
    //console.log(id);
    popupbox=`<div class="modal fade modal-container" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="replyModalTitle">Replay to this Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="answercomment">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="qid" value="{{$data->id}}">
                    <input type="hidden" name="answer_id" value="${id}">
                                            
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Message</label>
                        <textarea class="form-control form--control" rows="5" placeholder="Write message here..." name="comment"></textarea>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100" onclick="postcomment()">
                            Reply <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>`
 document.getElementById('popup-box-answer-comment').innerHTML=popupbox;
 }


//right-answer
 function rightanswer(aid,qid)
 {
    // console.log(id);
    // console.log(qid);
    fetch("http://localhost:8000/api/rightanswer/"+aid+"/"+qid).then(response=>response.json()).then((res)=>{
        //console.log(res);
        // showanswer();
        showanswer();
    })
 }
//wrong-answer
function wronganswer(aid,qid)
 {
    // console.log(id);
    // console.log(qid);
    fetch("http://localhost:8000/api/wronganswer/"+aid+"/"+qid).then(response=>response.json()).then((res)=>{
        //console.log(res);
        showanswer();
    })
 }
    </script>


@endpush
@include('layouts.footer')