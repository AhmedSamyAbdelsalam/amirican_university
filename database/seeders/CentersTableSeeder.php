<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Center::create([
            'region'=>'Europ',
            'country'=>'United Kingdom',
            'state'=>'Manchester',
            'name'=>'European College for Science & Arts',
            'email'=>'info@EuropeanCollege-edu.uk',
            'address'=>'35 Factory Street, Loughborough, Leicestershire, England, United Kingdom.',
            'url'=>'www.EuropeanCollege-edu.uk',]);

        Center::create([
            'region'=>'Middle East & Africa',
            'country'=>'Egypt',
            'state'=>'Cairo',
            'name'=>'Canadian Institute For Training & Development',
            'email'=>'contactus@ citdtraining.com',
            'address'=>'35 Elobour Buildings,Salah Salem St,Cairo,Egypt',
            'url'=>'www.citdtraining.com',]);
        Center::create([
            'region'=>'Africa',
            'country'=>'Egypt',
            'state'=>'New Cairo',
            'name'=>'Diplomatic Training Center',
            'email'=>'diplomatictraining.eg@gmail.com',
            'address'=>' 51 Mohi El Din Abu El Ezz Street - Dokki -Giza,-Egypt',
            'url'=>'www.diplomaticeg.com',]);






    }
}
