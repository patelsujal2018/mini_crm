<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100;$i++)
        {
            $employee = new Employee();
            $employee->firstname = Str::random(10);
            $employee->lastname = Str::random(10);
            $employee->company_id = 1;
            $employee->email = Str::random(10).'@gmail.com';
            $employee->phone = mt_rand(100000000, 9999999999);
            $employee->save();
        }        
    }
}
