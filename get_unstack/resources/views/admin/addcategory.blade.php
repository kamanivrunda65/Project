@include('admin.adminheader')
<style>
    .modal-dialog {
        width: 800px;
        margin: 100px auto;
    }
  
    </style>

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->

  <div class="panel panel-default">
    <div class="panel-heading">
      Category
    </div>
    <div class="row w3-res-tb">
        <div class="container">
            <form class="form-inline" role="form" id="categoryform">
                @csrf
                <div class="form-group">
                    <label>Category name</label>
                    <input type="text" class=" form-control"  name="categoryname" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    <hr>
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
            <th>Category Name</th>
            <th>Total Blog</th>
            <th data-breakpoints="xs">Date</th>
            <th>status</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Change</th>
          </tr>
        </thead>
       <tbody id="category-table">

       </tbody>
      </table>
    </div>
    
  </div>
  <!---728x90--->
</div>
</section>
 
</section>



<script>
    $('form#categoryform').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();
      //  console.log(formData);
    $.ajax({
        url: 'http://localhost:8000/api/postcategory',
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
showcategory()
function showcategory()
{
    fetch("http://localhost:8000/api/category").then(response=>response.json()).then((res)=>{
        //console.log(res);
        categorydata="";
        count=1;
        res.forEach(element => {
            var formateddate=dateformate(element.created_at);
            categorydata+=`<tr>
                <td>${count}</td>
                <td>${element.categoryname}</td>
                <td>${element.total}</td>
                <td>${formateddate}</td>
                <td>`
                    if(element.status==0)
                    {
                        categorydata+=`<button class="btn btn-primary" onclick="statuschange(${element.id},${element.status})">Inable</button>`
                    }
                    else{
                        categorydata+=`<button class="btn btn-warning" onclick="statuschange(${element.id},${element.status})">Disable</button>`
                    }
           
                
            categorydata+=`</td>
                <td><button class="btn btn-danger">Delete</button>  <button class="btn btn-info">Edit</button></td>
                </tr>`
        });
        document.getElementById('category-table').innerHTML=categorydata;
    })
}
function statuschange(id,status)
{
    //console.log(id);
    fetch("http://localhost:8000/api/categorystatus/"+id+"/"+status).then(response=>response.json()).then((res)=>{
       // console.log(res);
        location.reload();
    })
}
</script>
@include('admin.adminfooter')