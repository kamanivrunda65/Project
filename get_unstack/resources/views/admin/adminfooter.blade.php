
</section>
<!--main content end-->
</section>
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
<script src="assets/admin_assets/js/bootstrap.js"></script>
<script src="assets/admin_assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/admin_assets/js/scripts.js"></script>
<!-- <script src="assets/admin_assets/js/jquery.slimscroll.js"></script> -->
<script src="assets/admin_assets/js/jquery.nicescroll.js"></script>

@stack('blog-script')
@stack('question')
</body>

</html>
 

