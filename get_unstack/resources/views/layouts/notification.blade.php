@include('layouts.header')
<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-60px pb-50px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-content d-flex align-items-center">
                    <div class="icon-element shadow-sm flex-shrink-0 mr-3 border border-gray">
                        <svg class="svg-icon-color-5" height="55" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg"><g><path d="m411 262.862v-47.862c0-69.822-46.411-129.001-110-148.33v-21.67c0-24.813-20.187-45-45-45s-45 20.187-45 45v21.67c-63.59 19.329-110 78.507-110 148.33v47.862c0 61.332-23.378 119.488-65.827 163.756-4.16 4.338-5.329 10.739-2.971 16.267s7.788 9.115 13.798 9.115h136.509c6.968 34.192 37.272 60 73.491 60 36.22 0 66.522-25.808 73.491-60h136.509c6.01 0 11.439-3.587 13.797-9.115s1.189-11.929-2.97-16.267c-42.449-44.268-65.827-102.425-65.827-163.756zm-170-217.862c0-8.271 6.729-15 15-15s15 6.729 15 15v15.728c-4.937-.476-9.94-.728-15-.728s-10.063.252-15 .728zm15 437c-19.555 0-36.228-12.541-42.42-30h84.84c-6.192 17.459-22.865 30-42.42 30zm-177.67-60c34.161-45.792 52.67-101.208 52.67-159.138v-47.862c0-68.925 56.075-125 125-125s125 56.075 125 125v47.862c0 57.93 18.509 113.346 52.671 159.138z"/><path d="m451 215c0 8.284 6.716 15 15 15s15-6.716 15-15c0-60.1-23.404-116.603-65.901-159.1-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213c36.831 36.831 57.114 85.8 57.114 137.887z"/><path d="m46 230c8.284 0 15-6.716 15-15 0-52.086 20.284-101.055 57.114-137.886 5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0-42.497 42.497-65.901 98.999-65.901 159.099 0 8.284 6.716 15 15 15z"/></g></svg>
                    </div>
                    <h2 class="section-title fs-30">Notifications</h2>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-8 -->
            
        </div>
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START USER DETAILS AREA
================================= -->
<section class="user-details-area pt-60px pb-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="notification-content-wrap" id="notification-data">
                   
                    
                </div><!-- end notification-content-wrap -->
                <div class="notification-content-wrap" id="notification-seen-data">
                   
                    
                </div><!-- end notification-content-wrap -->
            </div><!-- end col-lg-9 -->
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
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-details-area -->
<!-- ================================
         END USER DETAILS AREA
================================= -->
@push('notification')
<script>
    var uid={{Auth::user()->id}}
    console.log(uid);
    allnotification()
    function allnotification()
    {
        fetch("http://localhost:8000/api/notification").then(response=>response.json()).then((res)=>{
           // console.log(res);
            notification="Recent<br>"
            count=0
            number=0
            notificationseen="Seen Notification<br><br>"
            res.forEach(element => {
                if(uid==element.user_id && element.status==0){
                    count++;
                var formateddate=dateformate(element.created_at);
                notification+=`<a onclick="link('${element.link}','${element.id}')"> <div class="media media-card media--card shadow-none rounded-0 align-items-center bg-transparent">
                        <div class="media-img media-img-sm flex-shrink-0">
                            <img src="{{URL::asset('asset/${element.pic}')}}" alt="avatar">
                        </div>
                        <div class="media-body p-0 border-left-0">
                            <h5 class="fs-14 fw-regular">${element.msg}</h5>
                            <small class="meta d-block lh-24">
                                <span>${formateddate}</span>
                            </small>
                        </div>
                        <button class="btn border border-gray fs-17 ml-2" type="button" onclick="" data-toggle="tooltip" data-placement="top" title="Delete"><i class="la la-trash"></i></button>
                    </div><!-- end media --></a>`;

                }
                if(uid==element.user_id && element.status==1){
                  number++  
                var formateddate=dateformate(element.created_at);
                notificationseen+=`<a href="${element.link}"> <div class="media media-card media--card shadow-none rounded-0 align-items-center bg-transparent">
                        <div class="media-img media-img-sm flex-shrink-0">
                            <img src="{{URL::asset('asset/${element.pic}')}}" alt="avatar">
                        </div>
                        <div class="media-body p-0 border-left-0">
                            <h5 class="fs-14 fw-regular">${element.msg}</h5>
                            <small class="meta d-block lh-24">
                                <span>${formateddate}</span>
                            </small>
                        </div>
                        <button class="btn border border-gray fs-17 ml-2" type="button" onclick="" data-toggle="tooltip" data-placement="top" title="Delete"><i class="la la-trash"></i></button>
                    </div><!-- end media --></a>`;

                }
            });
            if(count==0)
            {
                notification+=`<br><div class="bg-gray p-3 rounded-rounded d-flex align-items-center justify-content-between">
                                    <h3 class="fs-17">No Update</h3>
                                </div><br>`
            }
            if(number!=0){
                document.getElementById('notification-seen-data').innerHTML=notificationseen;
            }
            document.getElementById('notification-data').innerHTML=notification;
            

        })
    }

//link
 function link(link,id)
 {
    console.log(link);
    fetch("http://localhost:8000/api/linkopen/"+id).then(response=>response.json()).then((res)=>{
        console.log(res);
        window.location.href=link;
    })
 }
</script>
    
@endpush
@include('layouts.footer')
