
@extends('layouts.app')
@section('title', 'Home Page')
@section('heading', $car->model)
@section('link_text', 'All Vehicles')
@section('link', '/car_home')

@section('content')



<div class="row">
   <div class="col-sm-12 mb-4">
       <div><img src="{{ $car->image }}" class="card-img-top" alt="car Image"></div>
       <div ><b class="text-primary "> Year </b>{{$car->year}}</div>
       <div ><b class="text-primary "> Fuel Type </b>{{$car->fuel_type}}</div>
       <div ><b class="text-primary "> Mileage </b>{{$car->mileage}}</div>
       <div ><b class="text-primary "> Seating Capacity </b>{{$car->seating_capacity}}</div>
       <div ><b class="text-primary "> &#8377 </b>{{$car->Vehicle_rate->cost}} <b> /HOUR</b></div>
       <div class="border border-info p-2 rounded"><b class="text-primary "> Features </b>{{$car->features}}</div>
    </div>

</div>


<div class="row mb-5">
   
    <div class="col-3"></div>
    <div class="col-6">

        <div class="col-md-6 mb-4">
            <form action="" method="GET" class="form-inline" id="myform">
                <div class="input-group">
                    <select name="branch" class="form-control ml-2" required onchange='submitForm();'>
                        <option value="">select nearest store</option>
                        @foreach ($branch as $branches)
                            <option value="{{ $branches->id }}" {{ request('branch') == $branches->id ? 'selected' : '' }}>{{ $branches->branch }}</option>
                        @endforeach
                    </select>
                    {{-- <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Select</button>
                    </div> --}}
                </div>
            </form>
            <script type='text/javascript'> 
                function submitForm(){ 
                  // Call submit() method on <form id='myform'>
                  document.getElementById('myform').submit(); 
                } 
            </script>
            
        </div>
  
  
        <form method="POST" action="">
            @csrf
            <div class="input-group">
                <select name="car" id="" class="form-control">
                    <option value="">select car</option>
                            @foreach ($vehicles as $cars)
                                <option value="{{ $cars->id }}"><span> number </span>{{ $cars->vehicle_number }} <span> color </span>{{ $cars->vehicle_color }}</option>
                            @endforeach
                </select>
                <span class="text-danger">
                    @error('car')
                    {{$message}}
                        
                    @enderror
                </span>
            </div>
            

        
        
            <div class="form group mt-3">
            
                <input type="text" required class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile Number" value="{{old('mobile')}}">
                <span class="text-danger">
                    @error('mobile')
                    {{$message}}
                        
                    @enderror
                </span>
            </div>
            
                <div class="form group">
                    <label>Pick up date time</label>  
                    <input type="datetime-local" required class="form-control" name="pick_up_date" id="pick_up_date" value="{{old('pick_up_date')}}">
                    <span class="text-danger">
                        @error('pick_up_date')
                        {{$message}}
                            
                        @enderror
                    </span>
                </div>
                

                

            

            
                <div class="form group mb-3">
                    <label>Drop off date time</label>  
                    <input type="datetime-local" required class="form-control" name="drop_of_date" id="drop_of_date" value="{{old('drop_of_date')}}">
                    <span class="text-danger">
                        @error('drop_of_date')
                        {{$message}}
                            
                        @enderror
                    </span>
                </div>
                

                
            
            
            {{-- <input type="hidden" id="cost" name="cost" value="{{$car->Vehicle_rate->cost}}"> --}}
            <input type="hidden" id="hidden-input1" name="hour_data">
            <input type="hidden" id="hidden-input2" name="money_data">
        
            <input class="btn btn-success" type="submit" name="submit" value="Book Car" onclick="calculate()">
        
        </form>
        

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    </div>
    <div class="col-3"><button class="btn btn-primary mb-3" onclick="calculate()">calculate money</button>


        <p id="output"></p>
        <p id="outputmoney"></p></div>
</div>
   

  
    
       


<script>
    function calculate(){
        var pick_up_date = document.getElementById('pick_up_date').value;
        var drop_of_date = document.getElementById('drop_of_date').value;
        const date1 = new Date(pick_up_date);
        const date2 = new Date(drop_of_date);
        const time = Math.abs(date2 - date1);
        // const hours = Math.ceil(time / (1000*60*60));
        const hours = time / (1000*60*60);

        // for send data
        var hour_data = hours;
      var money_data = hours * {{$car->Vehicle_rate->cost}};

      document.getElementById('output').innerHTML = hour_data.toFixed(2) + 'hour' ;
      document.getElementById('outputmoney').innerHTML = money_data.toFixed(2) + ' &#8377';

    //     document.getElementById('output').innerHTML = hours.toFixed(2) + 'hour' ;
    //    document.getElementById('outputmoney').innerHTML = hours.toFixed(2) * {{$car->Vehicle_rate->cost}} + ' &#8377';

    //    var hour_data = hours;
    //   var money_data = hours * {{$car->Vehicle_rate->cost}};


        document.getElementById('hidden-input1').value = hour_data;
        document.getElementById('hidden-input2').value = money_data;

        


    }
</script>
@endsection
