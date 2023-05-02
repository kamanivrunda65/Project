<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Booking form</title>
</head>
<style>
    .text{
        text-align: left;
        padding-left:50px;
    }
</style>
@if (isset($alertBox))
    <script>
        var alertchange = alert('This date is already booked by another user. Please choose another date.');
        if (alertchange) {
            window.location.href = 'booking';
        }
    </script>
@endif
@if (isset($alertBox2))
    <script>
        var alertchange = alert('This time slot is already booked by another user. Please choose another time slot.');
        if (alertchange) {
            window.location.href = 'booking';
        }
    </script>
@endif
<body>
    
    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card border-success" style="border-width: 10px;"><br>
                        <center>
                        <div  >
                            <h3>Contact Us </h3>
                        </div>
                        <form style="padding:10px;" id="booking-form" method="post" action="{{url('/')}}/booking">
                            @csrf
                            <br>
                            <div class="form-group row">
                                <label f class="col-sm-2 col-form-label">UserName</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                            </div>
                           
                            <br>
                            <div class="form-group row">
                                <label f class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="booking_date" required>
                                    </div>
                            </div>
                            
                            <br>
                            
                            <div class="form-group row">
                                <label f class="col-sm-2 col-form-label">Day</label>
                                <div class="col-sm-10">
                                <select  class="form-control " name="day_type" id="day_type" required>
                                    <option value="full_day">Full Day</option>
                                    <option value="half_day">Half Day</option>
                                </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"  id="slots-container" style="display: none;">
                                
                                <div id="slots" class="col-sm-10 text">
                                   
                                    <input type="radio" name="slot" value="8am-10am"><label >8 AM - 10 AM</label><br>
                                    <input type="radio" name="slot" value="10am-12pm"><label >10 AM - 12 PM</label><br>
                                    <input type="radio" name="slot" value="12pm-2pm"><label >12 PM - 2 PM</label><br>
                                    <input type="radio" name="slot" value="2pm-4pm"><label >2 PM - 4 PM</label><br>
                                    <input type="radio" name="slot" value="4pm-6pm"><label >4 PM - 6 PM</label><br>
                                    <input type="radio" name="slot" value="6pm-8pm"><label >6 PM - 8 PM</label><br>
                                </div>
                            </div>
                            <br>
                            <div class="form-group" >
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<script>
    var dayslot = document.getElementById('day_type');
        var slotsContainer = document.getElementById('slots-container');
        dayslot.addEventListener('change', function() 
        {
            if (dayslot.value === 'full_day') 
            {
                slotsContainer.style.display = 'none';
            } 
            else 
            {
                slotsContainer.style.display = 'block';
            }
        });



   
</script>
</html>