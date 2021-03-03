<?php

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++)
        {
            $company = new Company();
            $company->name = Str::random(10);
            $company->email = Str::random(10).'@gmail.com';
            $company->logo = Str::random(10).'.jpg';
            $company->website = Str::random(10);
            $company->save();
        }   
    }
}
