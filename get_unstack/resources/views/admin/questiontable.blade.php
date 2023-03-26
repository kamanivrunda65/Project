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
      Question Table
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-9 m-b-xs">
       <a href="questiontable"> <button class="btn  btn-danger">All Data</button></a>
      </div>
      <div class="col-sm-3">
      <form  id="searchquestion" method="post" > 
        {{-- route="{{url('/')}}/questiontable" --}}
        @csrf
        <div class="input-group">
          <input type="text" class="input-sm form-control" name="search"  placeholder="Search" value="">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit" >Go!</button>
            
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
                <th>Question</th>
                <th>Tags</th>
                <th>Discription</th>
                <th>Date</th>
                <th>Change</th>
              </tr>
        </thead>
        @if(isset($resultquestion))
        
        <tbody>
          @foreach ($resultquestion as $data)
          
        
        <tr>
          <td>{{$data->id}}</td>
          <td>{{$data->user_id}}</td>
          <td>{{$data->question}}</td>
          <td>{{$data->tags}}</td>
          <td>{{$data->discription}}</td>
          
          <td>{{$data->created_at}}</td>
          <td><button class="btn btn-sm btn-danger" onclick="deletequestion({{$data->id}})">Delete</button> <button class="btn btn-sm btn-primary">Edit</button></td>
          </tr>
        
       @endforeach 
        </tbody>
      @else
      <tbody id="question-data">
        
        
      </tbody>
      
      @endif
      
                  </table>
                </div>
                {{-- <footer class="panel-footer">
                  <div class="row">
                    
                    <div class="col-sm-5 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
   
  @push('question')
    
  
<script>
  function showquestion()
  {
    fetch("http://localhost:8000/api/questiondata").then(response=>response.json()).then((res)=>{
        // console.log(res);
        questiondata="";
        count=1;
        page=""
        res.forEach(element => {
            questiondata +=`<tr>
                        <td>${count}</td>
                        <td>${element.user_id}</td>
                        <td>${element.question}</td>
                        <td>${element.tags}</td>
                        <td>${element.discription}</td>
                        <td>${element.created_at}</td>
                        <td><button class="btn btn-sm btn-danger" onclick="deletequestion(${element.id})">Delete</button> <button class="btn btn-sm btn-primary">Edit</button></td>
                        </tr>`;
                        count++;
                        // console.log(count);
                        // let r=count%6;
                        // if(r==1){
                        //   // console.log(r);
                        //   page+=`<li><a href="#">1</a></li>`
                        // }
        });
        document.getElementById('question-data').innerHTML= questiondata;
       // document.getElementById('page').innerHTML= page;
    });
  }
  showquestion()
  function deletequestion(id)
  {
    //console.log(id);
    fetch("http://localhost:8000/api/deletequestion/"+id).then(response=>response.json()).then((res)=>{
      showquestion()
    });
  }
  
  
  
</script>
@endpush
@include('admin.adminfooter')