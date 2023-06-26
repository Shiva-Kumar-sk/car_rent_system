<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Store;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $car = new Vehicle;
        $car->model = 'Maruti Dzire';
        $car->year = '2022';
        $car->fuel_type = 'petrol';
        $car->features = 'Maruti has equipped the Dzire with a 7-inch touchscreen infotainment system with Android Auto and Apple CarPlay, cruise control, climate control, a multi-info display, keyless entry with push button start, and LED headlamps with LED DRLs. Its safety features include dual airbags, ABS with EBD and rear parking sensors with camera.';
        $car->mileage = '22.6';
        $car->seating_capacity = '5';
        $car->image = 'http://127.0.0.1:8000/storage/image/swift.jpg';
        $car->branch_id = '1';
        $car->save();

        $car = new Vehicle;
        $car->model = 'Maruti Dzire';
        $car->year = '2023';
        $car->fuel_type = 'petrol';
        $car->features = 'Maruti has equipped the Dzire with a 7-inch touchscreen infotainment system with Android Auto and Apple CarPlay, cruise control, climate control, a multi-info display, keyless entry with push button start, and LED headlamps with LED DRLs. Its safety features include dual airbags, ABS with EBD and rear parking sensors with camera.';
        $car->mileage = '22.6';
        $car->seating_capacity = '5';
        $car->image = 'http://127.0.0.1:8000/storage/image/swift.jpg';
        $car->branch_id = '2';
        $car->save();

        $car = new Vehicle;
        $car->model = 'Maruti Dzire';
        $car->year = '2022';
        $car->fuel_type = 'petrol';
        $car->features = 'Maruti has equipped the Dzire with a 7-inch touchscreen infotainment system with Android Auto and Apple CarPlay, cruise control, climate control, a multi-info display, keyless entry with push button start, and LED headlamps with LED DRLs. Its safety features include dual airbags, ABS with EBD and rear parking sensors with camera.';
        $car->mileage = '22.6';
        $car->seating_capacity = '5';
        $car->image = 'http://127.0.0.1:8000/storage/image/swift.jpg';
        $car->branch_id = '3';
        $car->save();


        $car = new Vehicle;
        $car->model = 'Maruti Dzire';
        $car->year = '2023';
        $car->fuel_type = 'petrol';
        $car->features = 'Maruti has equipped the Dzire with a 7-inch touchscreen infotainment system with Android Auto and Apple CarPlay, cruise control, climate control, a multi-info display, keyless entry with push button start, and LED headlamps with LED DRLs. Its safety features include dual airbags, ABS with EBD and rear parking sensors with camera.';
        $car->mileage = '22.6';
        $car->seating_capacity = '5';
        $car->image = 'http://127.0.0.1:8000/storage/image/swift.jpg';
        $car->branch_id = '4';
        $car->save();

        //   $store = new Store;
        //   $store->branch = 'Bhadohi';
        //   $store->save();

        //   $store = new Store;
        //   $store->branch = 'Mirzapur';
        //   $store->save();

    }
}
