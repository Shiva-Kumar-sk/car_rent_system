@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            {{$data}}
            

            <form method="POST" action="">
                @csrf

                <div class="form group mb-3">
                    <label> Actual Drop off date time</label>  
                    <input type="datetime-local" required class="form-control" name="actual_drop_time" id="actual_drop_time" value="{{old('actual_drop_time')}}">
                    <span class="text-danger">
                        @error('actual_drop_time')
                        {{$message}}
                            
                        @enderror
                    </span>
                </div>

                <input class="btn btn-success mb-3" type="submit" name="submit" value="Drop Car" onclick="calculate()">
        
            </form>
              <div class="col-3"><button class="btn btn-primary mb-3" onclick="calculate()">calculate money</button>
                <p id="output"></p>

            

            <script>
                var data1 = JSON.parse("{{ json_encode($data->drop_of_date)}}");
                var jobs = {!! json_encode($data) !!};

function myFunction() {
    
    var jobs = {!! json_encode($data->drop_of_date) !!};

  alert(jobs);
}
                function calculate(){
                    var drop_of_date = {!! json_encode($data->drop_of_date) !!};
                    var actual_drop_time = document.getElementById('actual_drop_time').value;
                    const date1 = new Date(drop_of_date);
                    const date2 = new Date(actual_drop_time);
                    const time = Math.abs(date2 - date1);
                 
                    const hours = time / (1000*60*60);
            
                    // for send data
                    var hour_data = hours;
               
            
                  document.getElementById('output').innerHTML = hour_data.toFixed(2) + 'hour' ;
              
            
            
                    document.getElementById('hidden-input1').value = hour_data;
                    document.getElementById('hidden-input2').value = money_data;
            
                    
            
            
                }
            </script>
           
            
        </div>
    </div>
</div>
@endsection