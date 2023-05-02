@include('layouts.header')

<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm pt-60px pb-60px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="hero-content">
            <div class="d-flex align-items-center pb-3">
                <div class="icon-element shadow-sm flex-shrink-0 mr-3 border border-gray">
                    <svg class="svg-icon-color-gray la-icon" height="38" viewBox="0 0 512 512" width="38" xmlns="http://www.w3.org/2000/svg"><path d="m40 424h208a8.00008 8.00008 0 0 0 8-8v-30.47632l40.2334-101.761a19.99983 19.99983 0 0 0 -18.43164-27.76268h-123.251a23.97611 23.97611 0 0 0 -22.06055 14.54541c-.02734.06543-.05468.13086-.08105.19678l-41.83836 105.25781h-66.5708a8.00008 8.00008 0 0 0 -8 8v16a24.02718 24.02718 0 0 0 24 24zm200-16h-64a8.00917 8.00917 0 0 1 -8-8v-8h72zm-92.76855-131.23145a7.992 7.992 0 0 1 7.31933-4.76855h123.251a3.99957 3.99957 0 0 1 3.67578 5.57568c-.0293.06983-.05859.13965-.08594.21l-38.83107 98.21432h-134.77149zm-115.23145 115.23145h120v8a23.88238 23.88238 0 0 0 1.37622 8h-113.37622a8.00917 8.00917 0 0 1 -8-8z"></path><path d="m272 408v16h136a8.00008 8.00008 0 0 0 8-8v-88h56a24.02718 24.02718 0 0 0 24-24v-192a24.02718 24.02718 0 0 0 -24-24h-264a24.02718 24.02718 0 0 0 -24 24v128h16v-128a8.00917 8.00917 0 0 1 8-8h264a8.00917 8.00917 0 0 1 8 8v192a8.00917 8.00917 0 0 1 -8 8h-176v16h16v56h-40v16h112a8.00008 8.00008 0 0 0 8-8v-64h8v80zm104-24h-48v-56h16v16a8 8 0 0 0 16 0v-16h16z"></path><path d="m322.34277 245.65674 24 24 11.31446-11.31348-18.34375-18.34326 18.34375-18.34326-11.31446-11.31348-24 24a8 8 0 0 0 0 11.31348z"></path><path d="m437.65723 269.65674 24-24a8 8 0 0 0 0-11.31348l-24-24-11.31446 11.31348 18.34375 18.34326-18.34375 18.34326z"></path><path d="m331.074 232h121.852v16.001h-121.852z" transform="matrix(.394 -.919 .919 .394 16.989 505.764)"></path><path d="m216 152h16v16h-16z"></path><path d="m248 152h56v16h-56z"></path><path d="m216 184h16v16h-16z"></path><path d="m248 184h32v16h-32z"></path><path d="m216 216h16v16h-16z"></path><path d="m248 216h48v16h-48z"></path><path d="m320 152h32v16h-32z"></path></svg>
                    {{-- <svg class="svg-icon-color-5 la-icon" height="32" viewBox="0 0 512 512" width="32" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m163.685 407.141-.085.085c-2.938 2.92-2.951 7.669-.03 10.606 1.466 1.474 3.392 2.212 5.318 2.212 1.912 0 3.825-.727 5.288-2.182l.085-.085c2.938-2.92 2.951-7.669.03-10.606-2.919-2.937-7.668-2.951-10.606-.03z"/><path d="m224.896 383.146-.085.085c-2.929 2.929-2.929 7.678 0 10.606 1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197l.085-.085c2.929-2.929 2.929-7.678 0-10.606-2.928-2.929-7.677-2.929-10.606 0z"/><path d="m234.213 258.792c0-15.045-12.24-27.286-27.286-27.286-15.061 0-27.313 12.24-27.313 27.286 0 15.061 12.253 27.314 27.313 27.314 15.046 0 27.286-12.253 27.286-27.314zm-39.599 0c0-6.774 5.524-12.286 12.313-12.286 6.774 0 12.286 5.511 12.286 12.286 0 6.79-5.511 12.314-12.286 12.314-6.789 0-12.313-5.524-12.313-12.314z"/><path d="m284.709 393.223c-20.875 0-37.858 16.983-37.858 37.859 0 20.891 16.983 37.887 37.858 37.887 20.891 0 37.886-16.996 37.886-37.887 0-20.875-16.995-37.859-37.886-37.859zm0 60.747c-12.604 0-22.858-10.267-22.858-22.887 0-12.604 10.254-22.859 22.858-22.859 12.62 0 22.886 10.255 22.886 22.859 0 12.62-10.266 22.887-22.886 22.887z"/><path d="m113.529 422.137c-14.326 0-25.981 11.643-25.981 25.954 0 14.327 11.655 25.982 25.981 25.982s25.981-11.655 25.981-25.982c0-14.312-11.655-25.954-25.981-25.954zm0 36.935c-6.055 0-10.981-4.926-10.981-10.982 0-6.04 4.926-10.954 10.981-10.954s10.981 4.914 10.981 10.954c0 6.056-4.926 10.982-10.981 10.982z"/><path d="m404.722 387.2-.085.085c-2.929 2.929-2.929 7.678 0 10.606 1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197l.085-.085c2.929-2.929 2.929-7.678 0-10.606-2.928-2.929-7.677-2.929-10.606 0z"/><path d="m420.725 444.473-.085.085c-2.938 2.92-2.951 7.669-.03 10.606 1.466 1.474 3.392 2.212 5.318 2.212 1.912 0 3.825-.727 5.288-2.182l.085-.085c2.938-2.92 2.951-7.669.03-10.606-2.92-2.937-7.669-2.951-10.606-.03z"/><path d="m421.534 353.968c13.873 0 25.16-11.287 25.16-25.16 0-13.889-11.287-25.188-25.16-25.188-13.889 0-25.188 11.299-25.188 25.188 0 13.873 11.299 25.16 25.188 25.16zm0-35.348c5.602 0 10.16 4.57 10.16 10.188 0 5.602-4.558 10.16-10.16 10.16-5.617 0-10.188-4.558-10.188-10.16 0-5.618 4.57-10.188 10.188-10.188z"/><path d="m472.925 36.227h-102.782c-15.624 0-28.334 13.436-28.334 29.95 0 14.527 9.855 26.664 22.875 29.359v247.84l-78.598-103.496c-10.075-13.249-20.527-40.372-20.58-62.83l-.293-117.325c15.133-1.489 26.995-14.286 26.995-29.804.001-16.498-13.435-29.921-29.949-29.921h-110.69c-16.515 0-29.95 13.423-29.95 29.922 0 15.517 11.863 28.315 26.995 29.804v117.324c-.052 22.436-10.786 49.569-20.848 62.834l-25.058 32.996c-2.505 3.299-1.861 8.004 1.437 10.509 1.356 1.03 2.95 1.528 4.531 1.528 2.265 0 4.503-1.022 5.978-2.964l25.061-33c11.003-14.506 22.699-43.238 23.553-69.089h25.462c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.379l.063-24.997h25.317c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.279l.063-24.997h25.216c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.179l.063-24.997h86.6v117.208c.062 26.573 12.519 56.87 23.93 71.875l52.917 69.681c-17.871-5.739-35.407-6.694-53.721-3.063-19.13 3.791-37.225 12.075-56.797 22.25-39.41-28.311-98.047-22.141-137.213-8.94l14.663-19.092c2.523-3.285 1.905-7.994-1.38-10.517-3.287-2.522-7.994-1.905-10.517 1.38l-45.526 59.277c-11.658 15.199-20.404 36.102-23.996 57.349-3.869 22.885-1.571 44.467 6.47 60.769 7.64 15.488 24.12 33.95 59.25 33.95h257.238c18.876 0 34.649-5.623 46.191-16.317 10.264 10.083 24.32 16.317 39.81 16.317 31.347 0 56.85-25.503 56.85-56.852v-250.951c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v48.215c-11.265 5.47-27.619 4.862-37.687-1.871-12.654-8.445-30.919-10.281-46.013-5.509v-28.914h25.098c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.098v-25.025h25.098c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.098v-24.997h25.098c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-25.098v-24.996h83.7v73.486c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-74.049c13.02-2.695 22.875-14.833 22.875-29.359 0-16.515-12.711-29.951-28.334-29.951zm-321.356 8.646c-8.244 0-14.95-6.707-14.95-14.951 0-8.228 6.707-14.922 14.95-14.922h110.69c8.244 0 14.95 6.694 14.95 14.922 0 8.244-6.707 14.951-14.95 14.951zm-103.098 324.192 12.11-15.767c30.111-17.327 97.718-32.201 140.776-7.43-.563.302-1.119.599-1.686.902-43.488 23.296-92.546 49.548-166.947 52.625 3.967-11.503 9.407-22.065 15.747-30.33zm287.062 127.935h-257.238c-22.015 0-37.423-8.608-45.797-25.585-7.858-15.93-8.299-36.906-4.008-56.862 80.632-2.283 134.661-31.202 178.263-54.559 50.111-26.844 86.429-46.289 139.046-16.681l18.884 24.866v86.97c0 10.452 2.848 20.247 7.789 28.671-8.845 8.75-21.242 13.18-36.939 13.18zm81.831-233.986c8.081 5.404 18.454 8.106 28.834 8.105 5.865 0 11.731-.865 17.185-2.591v186.62c0 23.077-18.774 41.852-41.85 41.852s-41.85-18.774-41.85-41.852v-194.001c11.258-5.462 27.611-4.854 37.681 1.867zm55.561-181.914h-102.782c-7.353 0-13.334-6.694-13.334-14.922 0-8.244 5.982-14.95 13.334-14.95h102.782c7.353 0 13.334 6.707 13.334 14.95 0 8.227-5.982 14.922-13.334 14.922z"/></g></g></svg> --}}
                </div>
                <h2 class="section-title fs-30 la-icon">{{ucfirst($tagname)}}</h2>
            </div>
            <p class="section-desc text-black" id="total-tag-question"></p>
        </div><!-- end hero-content -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->
<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-80px pb-40px">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-9">
                <div class="question-tabs mb-50px">
                    <ul class="nav nav-tabs generic-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item"><div class="anim-bar"></div></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-selected="true">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  data-toggle="tab" href="#best" role="tab"  >Blogs</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content pt-40px" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="question-main-bar all-question-bar">
                                <div class="filters d-flex align-items-center justify-content-between pb-4">
                                    <h3 class="fs-17 fw-medium">All Questions</h3>
                                    <div class="filter-btn-group d-flex flex-wrap align-items-center">
                                        <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="tagquestion(1,10,'new')">Newest</button>
                                        <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="tagquestion(1,10,'view')">Views</button>
                                        <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2" onclick="tagquestion(1,10,'vote')">Votes</button>
                                        <button class="btn border border-gray bg-white  text-gray    fs-14 d-inline-block mr-2"onclick="tagquestion(1,10,'unanswer')">Unanswered</button>
                                           
                                    </div><!-- end filter-option-box -->
                                </div><!-- end filters -->
                                <div class="questions-snippet">
                                    <div class="question-main-bar border-left border-left-gray pt-10px pb-40px" id="tags-questions">
                                   
                                    </div><!-- end media -->
                                    <div class="pager pt-30px">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination generic-pagination pr-1" id="page-number">
                                               
                                            </ul>
                                        </nav>
                                        
                                    </div>
                                </div><!-- end questions-snippet -->
                            </div><!-- end question-main-bar -->
                        </div><!-- end tab-pane -->
                        <div class="tab-pane fade" id="best" role="tabpanel" aria-labelledby="best-tab">
                            <div class="question-main-bar best-question-bar">
                                <div class="filters pb-4">
                                    <h3 class="fs-17 fw-medium">Blog</h3>
                                </div><!-- end filters -->
                                <div class="questions-snippet">
                                    <div class="row" id="tag-blog">
                                    
                                    </div><!-- end media -->
                                    <div class="pager pt-30px">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination generic-pagination pr-1" id="page-data-blog">
                                               
                                            </ul>
                                        </nav>
                                        
                                    </div>
                                </div><!-- end questions-snippet -->
                            </div><!-- end question-main-bar -->
                        </div><!-- end tab-pane -->
                        
                    </div><!-- end tab-content -->
                    
                </div><!-- end question-tabs -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-17 pb-3">Number Achievement</h3>
                            <div class="divider"><span></span></div>
                            <div class="row no-gutters text-center" id="achievement">
                                
                               
                            </div><!-- end row -->
                        </div>
                    </div><!-- end card -->
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
                            <h3 class="fs-17 pb-3">Trending Tags</h3>
                            <div class="divider"><span></span></div>
                            <div class="tags pt-4" id="tags-data">
                               
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

@push('tags-all-data')
<script>
//tag-question
     var tag={{Js::from($tagname)}};
    // console.log(tag);
    tagquestion(1,10,'new')
    function tagquestion(page,perPage,condition)
    {
        fetch(`http://localhost:8000/api/questiondata?page=${page}&perPage=${perPage}&condition=${condition}&tag=${tag}`).then(response=>response.json()).then((res)=>{
            // console.log(res);
            tagquestions="";
    count=0;
   
    res.data.forEach(element => {
        var tagdata=element.tags;
        
        // if(tagdata.includes(tag)==true){
            
        // console.log(element.tags)
        
        const formateddate=dateformate(element.created_at)
        count++
        tagquestions+=`<div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
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
            tagquestions += ' <a href="#" class="tag-link">'+items+'</a>';
        }         
                   
         tagquestions+=      `</div>
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
                // }
                    
    });
    //console.log(tagquestions);
    document.getElementById("tags-questions").innerHTML= tagquestions;
                            const pagedata = document.getElementById('page-number');
                            pagedata.innerHTML = '';
                            const totalPages = Math.ceil(res.total / res.perPage);
                            for (let i = 1; i <= totalPages; i++) {
                                const button = document.createElement('button');
                            button.textContent = i;
                            button.classList='btn btn-primary space';
                            button.addEventListener('click', () => tagquestion(i, res.perPage,condition));
                            if (i === res.page) {
                                button.classList.add('active');
                            }
                            pagedata.appendChild(button);
                        }
   
    document.getElementById('total-tag-question').innerHTML="<b>"+res.total+" Questions</b>";
    
    })
        }
//tag-blog
   tagblog(1,9,"all")
   function tagblog(page,perPage,category)
   {
    fetch(`http://localhost:8000/api/blogdata?page=${page}&perPage=${perPage}&category=${category}&tag=${tag}`).then(response=>response.json()).then((res)=>{
        //console.log(res);
        tagblogdata=""
        count=1;
        res.data.forEach(element => {
            var formateddate=dateformate(element.created_at);
           tagblogdata+= ` <div class="col-lg-4 responsive-column-half" >
                    <div class="card card-item hover-y">
                        <a href="/blog/${element.id}" class="card-img">`
                            if(element.image.includes(",")==true){
                                const myArray = element.image.split(",");
                                let image = myArray[0];
                                tagblogdata += `<img class="lazy" src="{{URL::asset('asset/${image}')}}" data-src="{{URL::asset('asset/${image}')}}" alt="Card image">`
                            }
                            else{
                                tagblogdata += `<img class="lazy" src="{{URL::asset('asset/${element.image}')}}" data-src="{{URL::asset('asset/${element.image}')}}" alt="Card image">`
                            }           
             tagblogdata += `</a>
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
                </div><!-- end col-lg-4 -->`;
                        count++;
        });
        document.getElementById("tag-blog").innerHTML=tagblogdata
        
        const pagedata = document.getElementById('page-data-blog');
                            pagedata.innerHTML = '';
                            const totalPages = Math.ceil(res.total / res.perPage);
                            for (let i = 1; i <= totalPages; i++) {
                                const button = document.createElement('button');
                            button.textContent = i;
                            button.classList='btn btn-primary space';
                            button.addEventListener('click', () => tagblog(i, res.perPage,category));
                            if (i === res.page) {
                                button.classList.add('active');
                            }
                            pagedata.appendChild(button);
                        }
    })
   } 
</script>
@endpush
@include('layouts.footer')