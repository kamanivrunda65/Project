
<!-- ================================
    strat FOOTER AREA
================================= -->
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
<!-- ================================
     END FOOTER AREA
================================= -->

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
<script>
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


</script>



@stack('custom-script')
@stack('question-script')
@stack('show-question')
@stack('question-comment')
@stack('blod-details')
@stack('front-blog')
@stack('profile')
@stack('forgot-password')
@stack('reset-password')
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
