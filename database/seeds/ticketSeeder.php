<?php

use Illuminate\Database\Seeder;

class ticketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ticket::create([
            'image' => 'images/glastonbury.png',
            'event' => 'Glastonbury Festival 2018',
            'dateTime' => '2018-07-23 15:00:00' ,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, Interger a diam egestas, porttitor neque id, ultricies lectus',
            'price' =>'300.00'
            ]);
            
            \App\Ticket::create([
            'image' => 'images/reading&leeds.png',    
            'event' => "Reading & Leeds Festival",
            'dateTime' => '2018-08-27 12:00:00' ,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' =>'250.00' 
            ]);
            
            \App\Ticket::create([
            'image' => 'images/wireless.png',
            'event' => "Wireless Festival 2018",
            'dateTime' => '2018-07-06 12:00:00' ,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' =>'250.00'
            ]);
            
    }
}
