<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Store;
use App\Models\Rate;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $car = new Vehicle;
        // $car->company = 'Mahindra';
        // $car->model = 'Scorpio N';
        // $car->year = '2022';
        // $car->fuel_type = 'Diesel';
        // $car->features = 'On the inside, the Scorpio N features an electric sunroof, dual-zone climate control, and drive modes. There s also a new touchscreen infotainment system, a Sony music player and AdrenoX connected car technology. Also, customers can choose from six- and seven-seat configurations, plus, captain seats in the second row.';
        // $car->mileage = '11';
        // $car->seating_capacity = '7';
        // $car->image = 'http://127.0.0.1:8000/storage/image/scorpio_n.jpg';
        // $car->save();

        // $car = new Vehicle;
        // $car->company = 'Mahindra';
        // $car->model = 'Thar';
        // $car->year = '2023';
        // $car->fuel_type = 'Petrol/Diesel';
        // $car->features = 'The Mahindra Thar has 2 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 2184 cc and 1497 cc while the Petrol engine is 1997 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Thar has a mileage of 15.2 kmpl & Ground clearance of Thar is 226mm. The Thar is a 4 seater 4 cylinder car and has length of';
        // $car->mileage = '15.2';
        // $car->seating_capacity = '4';
        // $car->image = 'http://127.0.0.1:8000/storage/image/thar.jpg';
        // $car->save();

        // $car = new Vehicle;
        // $car->company = 'Mahindra';
        // $car->model = 'Bolero ';
        // $car->year = '2021';
        // $car->fuel_type = 'Diesel';
        // $car->features = 'The Mahindra Bolero has 1 Diesel Engine on offer. The Diesel engine is 1493 cc . It is available with Manual transmission.Depending upon the variant and fuel type the Bolero has a mileage of 16.0 kmpl . The Bolero is a 7 seater 3 cylinder car and has length of 3995mm, width of 1745mm and a wheelbase of 2680mm.';
        // $car->mileage = '16';
        // $car->seating_capacity = '7';
        // $car->image = 'http://127.0.0.1:8000/storage/image/bolero.jpg';
        // $car->save();


        // $car = new Vehicle;
        // $car->company = 'Suzuki';
        // $car->model = 'Maruti Dzire';
        // $car->year = '2023';
        // $car->fuel_type = 'petrol';
        // $car->features = 'Maruti has equipped the Dzire with a 7-inch touchscreen infotainment system with Android Auto and Apple CarPlay, cruise control, climate control, a multi-info display, keyless entry with push button start, and LED headlamps with LED DRLs. Its safety features include dual airbags, ABS with EBD and rear parking sensors with camera.';
        // $car->mileage = '22.6';
        // $car->seating_capacity = '5';
        // $car->image = 'http://127.0.0.1:8000/storage/image/swift.jpg';
        // $car->save();

        //   $store = new Store;
        //   $store->branch = 'Bhadohi';
        //   $store->save();

        //   $store = new Store;
        //   $store->branch = 'Mirzapur';
        //   $store->save();

        //   $store = new Store;
        //   $store->branch = 'Jaunpur';
        //   $store->save();

        //   $store = new Store;
        //   $store->branch = 'Varanasi';
        //   $store->save();







        // $rate = new Rate;
        // $rate->vehicle_id = '1';
        // $rate->cost = '120';
        // $rate->save();

        // $rate = new Rate;
        // $rate->vehicle_id = '2';
        // $rate->cost = '99';
        // $rate->save();

        // $rate = new Rate;
        // $rate->vehicle_id = '3';
        // $rate->cost = '99';
        // $rate->save();

        // $rate = new Rate;
        // $rate->vehicle_id = '4';
        // $rate->cost = '95';
        // $rate->save();



        $car = new Car;
        $car->vehicle_id = '1';
        $car->branch_id = '4';
        $car->vehicle_number = 'up 65 EB8793';
        $car->vehicle_color = 'black';
        $car->vehicle_status = '1';
        $car->save();


        $car = new car;
        $car->vehicle_id = '3';
        $car->branch_id = '4';
        $car->vehicle_number = 'up 61 Q6548';
        $car->vehicle_color = 'white';
        $car->vehicle_status = '1';
        $car->save();


        $car = new car;
        $car->vehicle_id = '1';
        $car->branch_id = '1';
        $car->vehicle_number = 'up 65 V9086';
        $car->vehicle_color = 'black';
        $car->vehicle_status = '1';
        $car->save();


        $car = new car;
        $car->vehicle_id = '2';
        $car->branch_id = '1';
        $car->vehicle_number = 'up 65 GH9866';
        $car->vehicle_color = 'red';
        $car->vehicle_status = '1';
        $car->save();



        $car = new car;
        $car->vehicle_id = '2';
        $car->branch_id = '2';
        $car->vehicle_number = 'up 65 H6675';
        $car->vehicle_color = 'red';
        $car->vehicle_status = '1';
        $car->save();





        $car = new car;
        $car->vehicle_id = '4';
        $car->branch_id = '3';
        $car->vehicle_number = 'up 65 K9746';
        $car->vehicle_color = 'white';
        $car->vehicle_status = '1';
        $car->save();



        $car = new car;
        $car->vehicle_id = '3';
        $car->branch_id = '3';
        $car->vehicle_number = 'up 61 H2643';
        $car->vehicle_color = 'white';
        $car->vehicle_status = '1';
        $car->save();


        $car = new car;
        $car->vehicle_id = '1';
        $car->branch_id = '3';
        $car->vehicle_number = 'up 65 V0965';
        $car->vehicle_color = 'black';
        $car->vehicle_status = '1';
        $car->save();


        $car = new car;
        $car->vehicle_id = '4';
        $car->branch_id = '1';
        $car->vehicle_number = 'up 65 :LK8979';
        $car->vehicle_color = 'white';
        $car->vehicle_status = '1';
        $car->save();



        $car = new car;
        $car->vehicle_id = '4';
        $car->branch_id = '2';
        $car->vehicle_number = 'up 65 J9685';
        $car->vehicle_color = 'red';
        $car->vehicle_status = '1';
        $car->save();




    }
}
