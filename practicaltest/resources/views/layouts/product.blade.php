@include('layouts.header')
<style>
    .image-size{
        height: 200px;
        width: 286px;
        border: 1px solid #000;
    }
</style>
<br>
<br>

    <div class="container row" id="product-data">
        {{-- <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
            </div>
        </div> --}}
    </div>

<script>
    allproduct()
    function allproduct()
    {
        fetch("http://localhost:8000/api/allproduct").then(response=>response.json()).then((res)=>{
            //console.log(res);
            allproduct=""
            res.forEach(element => {
                allproduct+=`<div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img src="{{URL::asset('${element.image}')}}" class="card-img-top image-size" alt="{{URL::asset('${element.image}')}}">
                    <div class="card-body">
                        <h5 class="card-title">${element.product_name}</h5>
                        <p class="card-text">Price : ${element.price}</p>
                        <button  onclick="addcart(${element.id})" class="btn btn-primary">Add to cart</button>
                    </div>
            </div>
        </div>`
            });
            document.getElementById('product-data').innerHTML=allproduct;
        })
    }
    function addcart(id)
    {
        fetch("http://localhost:8000/api/addcart/"+id).then(response=>response.json()).then((res)=>{
            //console.log(res);
            // allproduct();
            window.location.href="/cart";
        })
    }
</script>
@include('layouts.footer')