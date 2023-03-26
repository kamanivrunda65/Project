@include('admin.adminheader')
<style>
  img {
    border: 0;
    height: 60px;
    width: 100px;
    -webkit-border-radius: 10%;
}
  </style>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->

  <div class="panel panel-default">
    <div class="panel-heading">
      Blog Table
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-9 m-b-xs">
       <a href="blogtable"> <button class="btn  btn-danger">All Data</button></a>
      </div>
      <div class="col-sm-3">
      <form method="post" id="searchform"> 
        {{-- route="{{url('/')}}/blogtable" --}}
        @csrf
        <div class="input-group">
          <input type="text" class="input-sm form-control" name="search"  placeholder="Search" value="">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit"  >Go!</button>
          </span>
        </div>
       </form>
      </div>
    </div>
    <div class="table-responsive">
    <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <!-- <th data-breakpoints="xs">ID</th> -->
            <th>No</th>
            <th>User</th>
            <th>blog Title</th>
            <th>Blog Content</th>
            <th>Blog Image</th>
            <th>Tags</th>
            <th>Category</th>
            <th data-breakpoints="xs">Date</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Change</th>
          </tr>
        </thead>
        @if(isset($result))
          <tbody>
            @foreach ($result as $data)
            
          
          <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->user_name}}</td>
            <td>{{$data->blog_title}}</td>
            <td>{{$data->blog_content}}</td>
            <td><image src="{{URL::asset('asset/'.$data->image)}}"></td>
            <td>{{$data->tags}}</td>
            <td>{{$data->categoryname}}</td>
            
            <td>{{$data->created_at}}</td>
            <td><button class="btn btn-sm btn-danger" onclick="deleteblog({{$data->id}})">Delete</button> <button class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
          
         @endforeach 
          </tbody>
        @else
        <tbody id="blog-data">
          
          
        </tbody>
        
        @endif
      </table>
    </div>
    <footer class="panel-footer">
      <div class=" text-right">
        <ul class="pagination pagination-sm m-t-none m-b-none" id="page-data">
            
        <ul>
      <div class="col-sm-7 text-right text-center-xs">                
    </footer>
  </div>
  <!---728x90--->
</div>
</section>
 
</section>
    <!-- content-wrapper ends -->
    @push('blog-script')
        
    
    <script>
      showblog(1,10)
      function showblog(page, perPage)
      {
        fetch(`http://localhost:8000/api/blogtabledata?page=${page}&perPage=${perPage}`).then(res=>res.json()).then((response)=>{
             console.log(response);
            blogdata="";
          //  pagedata=""
            count=1;
            response.data.forEach(element => {
                blogdata +=`<tr>
                            <td>${count}</td>
                            <td>${element.user_name}</td>
                            <td>${element.blog_title}</td>
                            <td>${element.blog_content}</td>
                            <td><image src="{{URL::asset('asset/${element.image}')}}"</td>
                            <td>${element.tags}</td>
                            <td>${element.categoryname}</td>
                            
                            <td>${element.created_at}</td>
                            <td><button class="btn btn-sm btn-danger" onclick="deleteblog(${element.id})">Delete</button> <button class="btn btn-sm btn-primary">Edit</button></td>
                            </tr>`;
                            count++;
                           
      

            });
          
                            const pagedata = document.getElementById('page-data');
                            pagedata.innerHTML = '';
                            const totalPages = Math.ceil(response.total / response.perPage);
                            for (let i = 1; i <= totalPages; i++) {
                                const button = document.createElement('button');
                            button.textContent = i;
                            button.classList='btn btn-primary space';
                            button.addEventListener('click', () => showblog(i, response.perPage));
                            if (i === response.page) {
                                button.classList.add('active');
                            }
                            pagedata.appendChild(button);
                          }
                      document.getElementById('blog-data').innerHTML= blogdata;
        });
      }
     
      
  function deleteblog(id)
  {
    //console.log(id);
    fetch("http://localhost:8000/api/deleteblog/"+id).then(response=>response.json()).then((res)=>{
      showblog()
    });
  }
    </script>
    @endpush
    @include('admin.adminfooter')
