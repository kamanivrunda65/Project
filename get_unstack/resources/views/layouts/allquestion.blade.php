@include('layouts.header')
<!--======================================
    START HERO AREA
======================================-->
<section class="hero-area pt-80px pb-80px hero-bg-1">
<div class="overlay"></div>
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
                <h2 class="section-title pb-3 text-white">Share & grow knowledge with us!</h2>
                <p class="section-desc text-white">If you are going to  a passage of Lorem Ipsum, you need to be sure there
                    <br> isnt anything embarrassing hidden in the middle of text.
                </p>
                <div class="hero-btn-box py-4">
                    <a href="{{route('askquestion')}}" class="btn theme-btn theme-btn-white">Ask a Question <i class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div><!-- end hero-content -->
        </div><!-- end col-lg-9 -->
        <div class="col-lg-3">
            <div class="hero-list hero-list-bg">
                <div class="d-flex align-items-center pb-30px">
                    <img src="assets/images/anonymousHeroQuestions.svg" alt="question icon" class="mr-3">
                    <p class="fs-15 text-white lh-20">Anybody can ask a question</p>
                </div>
                <div class="d-flex align-items-center pb-30px">
                    <img src="assets/images/anonymousHeroAnswers.svg" alt="question answer icon" class="mr-3">
                    <p class="fs-15 text-white lh-20">Anybody can answer</p>
                </div>
                <div class="d-flex align-items-center">
                    <img src="assets/images/anonymousHeroUpvote.svg" alt="vote icon" class="mr-3">
                    <p class="fs-15 text-white lh-20">The best answers are voted up and rise to the top</p>
                </div>
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
<section class="question-area pt-40px">
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="sidebar pt-10px">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="fs-17 pb-3">Trending Questions</h3>
                        <div class="divider"><span></span></div>
                        <div class="sidebar-questions pt-3" id="trending-question">
                           
                            
                        </div><!-- end sidebar-questions -->
                    </div>
                </div><!-- end card -->
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="fs-17 pb-3">Related Tags</h3>
                        <div class="divider"><span></span></div>
                        <div class="tags pt-4" id="tags-data">
                           
                        </div>
                    </div>
                </div><!-- end card -->
               
            </div><!-- end sidebar -->
        </div><!-- end col-lg-3 -->
        <div class="col-lg-9 px-0">
            <div class="question-main-bar border-left border-left-gray pt-10px pb-40px">
                <div class="filters pb-4 pl-3">
                    <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                        <h3 class="fs-22 fw-medium">All Questions</h3>
                        <a href="{{route('askquestion')}}" class="btn theme-btn theme-btn-sm">Ask Question</a>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <p class="pt-1 fs-15 fw-medium lh-20" id="totalquestion"> </p>
                        <div class="filter-btn-group d-flex flex-wrap align-items-center">
                            <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="allquestion(1,10,'new')">Newest</button>
                            <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="allquestion(1,10,'view')">Views</button>
                            <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="allquestion(1,10,'vote')">Votes</button>
                            <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2"onclick="allquestion(1,10,'unanswer')">Unanswered</button>
                               
                        </div><!-- end filter-option-box -->
                        {{-- <div class="btn-group btn--group mb-3" role="group" aria-label="Filter button group">
                            <a onclick="allquestion(1,10,'new')" class="btn ">Newest</a>
                            <a onclick="allquestion(1,10,'view')" class="btn">Views</a>
                            <a onclick="allquestion(1,10,'vote')" class="btn">Votes</a>
                            <a onclick="allquestion(1,10,'unanswer')" class="btn">Unanswered</a>
                        </div> --}}
                    </div>
                </div><!-- end filters -->
                <div class="questions-snippet border-top border-top-gray" id="questions">
                  
                </div><!-- end questions-snippet -->
                <div class="pager pt-30px px-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination generic-pagination pr-1" id="page-number">
                           
                        </ul>
                    </nav>
                    <p class="fs-13 pt-2">Showing 1-10 results </p>
                </div>
            </div><!-- end question-main-bar -->
        </div><!-- end col-lg-7 -->
        
    </div><!-- end row -->
</div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
     END QUESTION AREA
================================= -->

@push('show-question')
<script>
//show-questions
 function allquestion(page, perPage,condition){
    fetch(`http://localhost:8000/api/questiondata?page=${page}&perPage=${perPage}&condition=${condition}`).then(response=>response.json()).then((res)=>{
    // console.log(res);
    //console.log(condition);
    questions="";
    count=1;
   
    res.data.forEach(element => {
        const formateddate=dateformate(element.created_at)
        count++
        questions+=`<div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                        <div class="votes text-center votes-2">
                            <div class="vote-block">
                                <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">${element.votes}</span>
                                <span class="vote-text d-block fs-13 lh-18">votes</span>
                            </div>
                            <div class="answer-block answered my-2">
                                <span class="answer-counts d-block lh-20 fw-medium">${element.answers}</span>
                                <span class="answer-text d-block fs-13 lh-18">answers</span>
                            </div>
                            <div class="view-block">
                                <span class="view-counts d-block lh-20 fw-medium">${element.views}</span>
                                <span class="view-text d-block fs-13 lh-18">views</span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5 class="mb-2 fw-medium"><a href="{{url('/')}}/questiondetail/${element.id}">${element.question}</a></h5>
                            <p class="mb-2 truncate lh-20 fs-15">${element.discription}</p>
                            <div class="tags" id="tags">`
        let tags=element.tags;
        const myArray = tags.split(",");
        //console.log(myArray);
        myArray.forEach(myfunction);
        function myfunction(items){
            questions += ' <a href="#" class="tag-link">'+items+'</a>';
        }         
                   
         questions+=      `</div>
                   <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                <a href="user-profile.html" class="media-img d-block">
                                    <img src="{{URL::asset('asset/${element.profile_pic}')}}" alt="avatar">
                                </a>
                                <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                    <div>
                                        <h5 class="pb-1"><a href="#">${element.name}</a></h5>
                                       
                                    </div>
                                    <small class="meta d-block text-right">
                                        <span class="text-black d-block lh-18">asked</span>
                                        <span class="d-block lh-18 fs-12">${formateddate}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div><!-- end media -->`;
                    
    });
    
                            const pagedata = document.getElementById('page-number');
                            pagedata.innerHTML = '';
                            const totalPages = Math.ceil(res.total / res.perPage);
                            for (let i = 1; i <= totalPages; i++) {
                                const button = document.createElement('button');
                            button.textContent = i;
                            button.classList='btn btn-primary space';
                            button.addEventListener('click', () => allquestion(i, res.perPage,condition));
                            if (i === res.page) {
                                button.classList.add('active');
                            }
                            pagedata.appendChild(button);
                        }
    document.getElementById('questions').innerHTML= questions;
    document.getElementById('totalquestion').innerHTML= res.total+" questions";
    
})
    }
    allquestion(1,10,"new")
   

</script>
@endpush
@include('layouts.footer')
