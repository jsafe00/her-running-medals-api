<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Medal;
use Illuminate\Database\Seeder;


class EventsMedalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventAWUM2021 =  Event::create([
            'eventName' => 'All Women\'s Ultra Marathon 2020 (Virtual Run)',
            'location' => 'Cebu City, Cebu',
            'date' =>'2020-10-18'
        ]);

        Medal::create([
            'event_id' => $eventAWUM2021->id,
            'category' => '50KM',
            'image' => 'img/awum2021.jpg'
        ]);

        Comment::create([
            'commentable_type' => 'App\Models\Event',
            'commentable_id' => $eventAWUM2021->id,
            'body' => 'Will definitely join next year!'
        ]);


        $eventCCM2020 = Event::create([
            'eventName' => 'Cebu Marathon 2020',
            'location' => 'Cebu City, Cebu',
            'date' =>'2020-01-12'
        ]);

        Medal::create([
            'event_id' => $eventCCM2020->id,
            'category' => '42KM',
            'image' => 'img/cebumarathon2020.jpg'
        ]);


        $eventMM2019 = Event::create([
            'eventName' => 'Masskara Marathon 2019',
            'location' => 'Bacolod City, Negros Occidental',
            'date' =>'2019-10-13'
        ]);

        Medal::create([
            'event_id' => $eventMM2019->id,
            'category' => '42KM',
            'image' => 'img/masskara2019.jpg'
        ]);

        $eventDC2DC2019 = Event::create([
            'eventName' => 'Digos City to Davao City Ultramarathon 2019',
            'location' => 'Davao City, Davao',
            'date' =>'2019-09-08'
        ]);

        $eventDC2DC2019 = Medal::create([
            'event_id' => $eventDC2DC2019->id,
            'category' => '60KM',
            'image' => 'img/dc2dc.jpg'
        ]);

        Comment::create([
            'commentable_type' => 'App\Models\Medal',
            'commentable_id' => $eventDC2DC2019->id,
            'body' => 'Cool Design!'
        ]);

        $eventBIM2019 = Event::create([
            'eventName' => 'Bohol International Marathon 2019',
            'location' => 'Tagbilaran City, Bohol',
            'date' =>'2019-08-25'
        ]);

        Medal::create([
            'event_id' => $eventBIM2019->id,
            'category' => '42KM',
            'image' => 'img/boholmarathon2019.jpg'
        ]);

        $eventCN50 = Event::create([
            'eventName' => 'Cebu North UltraMarathon 2019',
            'location' => 'Bogo City, Cebu',
            'date' =>'2019-08-25'
        ]);

        Medal::create([
            'event_id' => $eventCN50->id,
            'category' => '50KM',
            'image' => 'img/cn50.jpg'
        ]);

        Comment::create([
            'commentable_type' => 'App\Models\Event',
            'commentable_id' => $eventCN50->id,
            'body' => 'Food!Food!Lots of Food!'
        ]);

        $eventMegawear2019 = Event::create([
            'eventName' => 'Megawear Half Marathon 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-07-07'
        ]);

        Medal::create([
            'event_id' => $eventMegawear2019->id,
            'category' => '21KM',
            'image' => 'img/megawear2019.jpg'
        ]);

        $eventHS2019 = Event::create([
            'eventName' => 'Hunat Sugbu 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-06-23'
        ]);

        Medal::create([
            'event_id' => $eventHS2019->id,
            'category' => '21KM',
            'image' => 'img/hunatsugbu2019.jpg'
        ]);

        $eventIPIRun = Event::create([
            'eventName' => 'IPI Run 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-05-05'
        ]);

        Medal::create([
            'event_id' => $eventIPIRun->id,
            'category' => '21KM',
            'image' => 'img/ipirun.jpg'
        ]);

        $eventSiquijor2019 = Event::create([
            'eventName' => 'Siquijor Marathon 2019',
            'location' => 'Siquijor, Siquijor',
            'date' =>'2019-03-24'
        ]);

        $eventSiquijor2019 = Medal::create([
            'event_id' => $eventSiquijor2019->id,
            'category' => '42KM',
            'image' => 'img/siquijormarathon.jpg'
        ]);

        Comment::create([
            'commentable_type' => 'App\Models\Medal',
            'commentable_id' => $eventSiquijor2019->id,
            'body' => 'Wow!'
        ]);

        $eventAWUM2019 = Event::create([
            'eventName' => 'All Women Ultra Marathon 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-03-10'
        ]);

        Medal::create([
            'event_id' => $eventAWUM2019->id,
            'category' => '50KM',
            'image' => 'img/awum2019.jpg'
        ]);

        $eventSM2SM2019 = Event::create([
            'eventName' => 'SM2SM Run 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-02-17'
        ]);

        Medal::create([
            'event_id' => $eventSM2SM2019->id,
            'category' => '21KM',
            'image' => 'img/sm2sm2019.jpg'
        ]);

        $event711Run2019 = Event::create([
            'eventName' => '711 Run 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-02-03'
        ]);

        Medal::create([
            'event_id' => $event711Run2019->id,
            'category' => '42KM',
            'image' => 'img/711run.jpg'
        ]);

        $eventCCM2019 = Event::create([
            'eventName' => 'Cebu Marathon 2019',
            'location' => 'Cebu City, Cebu',
            'date' =>'2019-01-13'
        ]);

        Medal::create([
            'event_id' => $eventCCM2019->id,
            'category' => '21KM',
            'image' => 'img/cebumarathon2019.jpg'
        ]);

        $eventMagmaTrailRun2018 = Event::create([
            'eventName' => 'Magma Trail Run 2018',
            'location' => 'Danao, Cebu',
            'date' =>'2018-08-18'
        ]);

        Medal::create([
            'event_id' => $eventMagmaTrailRun2018->id,
            'category' => '30KM',
            'image' => 'img/magmatrailrun2018.jpg'
        ]);

        $eventMM2018 = Event::create([
            'eventName' => 'Masskara Half Marathon 2018',
            'location' => 'Bacolod, Negros Occidental',
            'date' =>'2018-10-14'
        ]);

        Medal::create([
            'event_id' => $eventMM2018->id,
            'category' => '21KM',
            'image' => 'img/masskara2018.jpg'
        ]);

        $eventBIM2018 = Event::create([
            'eventName' => 'Bohol International Marathon 2018',
            'location' => 'Panglao, Bohol',
            'date' =>'2018-08-26'
        ]);

        Medal::create([
            'event_id' => $eventBIM2018->id,
            'category' => '42KM',
            'image' => 'img/boholmarathon2018.jpg'
        ]);

        $eventMegawear2018 = Event::create([
            'eventName' => 'Megawear Half Marathon 2018',
            'location' => 'Cebu City, Cebu',
            'date' =>'2018-07-08'
        ]);

        Medal::create([
            'event_id' => $eventMegawear2018->id,
            'category' => '21KM',
            'image' => 'img/megawear2018.jpg'
        ]);

        $eventHunatSugbu2018 = Event::create([
            'eventName' => 'Hunat Sugbu 8 2018',
            'location' => 'Cebu City, Cebu',
            'date' =>'2018-06-24'
        ]);

        Medal::create([
            'event_id' => $eventHunatSugbu2018->id,
            'category' => '21KM',
            'image' => 'img/hunatsugbu2018.jpg'
        ]);

        $eventRunrio2018 = Event::create([
            'eventName' => 'Runrio Triology Cebu leg 2 2018',
            'location' => 'Cebu City, Cebu',
            'date' =>'2018-05-06'
        ]);

        Medal::create([
            'event_id' => $eventRunrio2018->id,
            'category' => '32KM',
            'image' => 'img/runrio.jpg'
        ]);

        $eventOYM2018 = Event::create([
            'eventName' => 'On Your Mark  2018',
            'location' => 'Cebu City, Cebu',
            'date' =>'2018-04-08'
        ]);

        Medal::create([
            'event_id' => $eventOYM2018->id,
            'category' => '25KM',
            'image' => 'img/oymrun.jpg'
        ]);

        $eventAlicia2018 = Event::create([
            'eventName' => 'Alicia Panaramic Park Trail Run  2018',
            'location' => 'Alicia, Bohol',
            'date' =>'2018-02-10'
        ]);

        Medal::create([
            'event_id' => $eventAlicia2018->id,
            'category' => '21KM',
            'image' => 'img/alicia.jpg'
        ]);

        $eventCCM2018 = Event::create([
            'eventName' => 'Cebu Marathon 2018',
            'location' => 'Cebu City, Cebu',
            'date' =>'2018-01-14'
        ]);

        Medal::create([
            'event_id' => $eventCCM2018->id,
            'category' => '21KM',
            'image' => 'img/cebumarathon2018.jpg'
        ]);

        $eventHopeRun2017 = Event::create([
            'eventName' => 'Hope Run 2017',
            'location' => 'Cebu City, Cebu',
            'date' =>'2017-12-10'
        ]);

        Medal::create([
            'event_id' => $eventHopeRun2017->id,
            'category' => '21KM',
            'image' => 'img/hoperun2017.jpg'
        ]);

        $eventUPRun2017 = Event::create([
            'eventName' => 'UP Cebu Run 2017',
            'location' => 'Cebu City, Cebu',
            'date' =>'2017-10-21'
        ]);

        Medal::create([
            'event_id' => $eventUPRun2017->id,
            'category' => '21KM',
            'image' => 'img/uprun2017.jpg'
        ]);

        $eventBIM2017 = Event::create([
            'eventName' => 'Bohol International Marathon 2017',
            'location' => 'Tagbilaran City, Bohol',
            'date' =>'2017-08-27'
        ]);

        Medal::create([
            'event_id' => $eventBIM2017->id,
            'category' => '21KM',
            'image' => 'img/boholmarathon2017.jpg'
        ]);
    }
}
