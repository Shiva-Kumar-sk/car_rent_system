
@extends('layouts.app')
@section('title', 'Home Page')
@section('heading', $cars->model)
@section('link_text', 'All Vehicles')
@section('link', '/car_home')

@section('content')


<div class="row">
   <div class="col-sm-12 mb-4">
       <div><img src="{{ $cars->image }}" class="card-img-top" alt="car Image"></div>
       <div ><b class="text-primary "> Year </b>{{$cars->year}}</div>
       <div ><b class="text-primary "> Fuel Type </b>{{$cars->fuel_type}}</div>
       <div ><b class="text-primary "> Mileage </b>{{$cars->mileage}}</div>
       <div ><b class="text-primary "> Seating Capacity </b>{{$cars->seating_capacity}}</div>
       <div ><b class="text-primary "> &#8377 </b>{{$cars->Vehicle->cost}} <b> /HOUR</b></div>
       <div class="border border-info p-2 rounded"><b class="text-primary "> Features </b>{{$cars->features}}</div>
    </div>

</div>


<div class="row mb-5">
    <form method="POST" action="{{ route('car.store') }}">
        @csrf
    
        <div class="col-sm-6">
          
            <div class="form group">
                <label>Pick up date time</label>  
                <input type="datetime-local" class="form-control" name="day1" id="day1">
            </div>
            

            

        </div>

        <div class="col-sm-6">
            <div class="form group mb-3">
            <label>Drop off date time</label>  
            <input type="datetime-local" class="form-control" name="day2" id="day2">
            </div>
            <div >

            </div>
           
        </div> 

        <input type="hidden" id="hidden-input1" name="hour_data">
        <input type="hidden" id="hidden-input2" name="money_data">
    
        <input class="btn btn-success" type="submit" name="submit" value="submit" onclick="calculate()">
    

</div>
   

  
    
</form>
<button class="btn btn-primary mb-3" onclick="calculate()">calculate money</button>


<p id="output"></p>
<p id="outputmoney"></p>

<script>
    function calculate(){
        var day1 = document.getElementById('day1').value;
        var day2 = document.getElementById('day2').value;
        const date1 = new Date(day1);
        const date2 = new Date(day2);
        const time = Math.abs(date2 - date1);
        // const hours = Math.ceil(time / (1000*60*60));
        const hours = time / (1000*60*60);

        // for send data
        document.getElementById('output').innerHTML = hours + 'hour' ;
       document.getElementById('outputmoney').innerHTML = hours * {{$cars->Vehicle->cost}} + ' &#8377';

       var hour_data = hours;
      var money_data = hours * {{$cars->Vehicle->cost}};


        document.getElementById('hidden-input1').value = hour_data;
        document.getElementById('hidden-input2').value = money_data;

        


    }
</script>
@endsection
