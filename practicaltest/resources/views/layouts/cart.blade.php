@include('layouts.header')
<style>
.space{
    margin-right: 200px;
}   

.inline {
    display:block;
    flex-basis: auto;
} 
</style>

<br>
<br>
<button class="btn btn-warning" onclick="removeall()">Remove All</button>
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Total Prize</th>
            <th scope="col">Questity</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody id="cart-data">

        
          
        </tbody>
      </table>
    
</div>
<script>
//cartdata
    cartdata()
    function cartdata()
    {
        fetch("http://localhost:8000/api/cartdata").then(response=>response.json()).then((res)=>{
            cartdata="";
            count=0;
            
            res.forEach(element => {
                count++;
                cartdata+=`<tr>
                    <td>${element.product_name}</td>
                    <td>${element.total_price}</td>
                    <td><div class="row">
                        <div class="col-lg-3">${element.quantity}</div>
                        <div class="col-lg-9">
                        <form method="post" id="quantityform" action="{{url('/')}}/cart">
                            @csrf
                            <input type="hidden" name="cart_id" value=${element.id}>
                            <select class="form-select " aria-label="Default select example" name="quantity">
                                <option selected>Open this select menu</option>`
                                for (var i=1;i<=element.stock;i++){
                    cartdata+=  `<option value="${i}">${i}</option>`
                                }
                                
                 cartdata+=`</select>
                              
                              <button class="btn btn-primary ">Submit</button>
                        </form>
                        </div></div></td>
                    <td><button class="btn btn-danger" onclick="removecart(${element.id})">Remove</button></td>
                            </tr>`
            });
            if(count==0)
            {
                document.getElementById('cart-data').innerHTML="<h4>No Data Found</h4>";
            }
            else{
            document.getElementById('cart-data').innerHTML=cartdata;
            }
        })
    }

//remove-item
    function removecart(id)
    {
        fetch("http://localhost:8000/api/dropcart/"+id).then(response=>response.json()).then((res)=>{
           // console.log(res);
            location.reload();
        })
    }
//removeall
function removeall()
{
    fetch("http://localhost:8000/api/dropalldata").then(response=>response.json()).then((res)=>{
           // console.log(res);
            location.reload();
        });
}
</script>
@include('layouts.footer')