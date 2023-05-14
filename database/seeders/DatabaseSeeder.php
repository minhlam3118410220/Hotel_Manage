<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admins')->insert([
            [
                "id" => 1,
                "username" => "admin",
                "password" => sha1('123456')
            ],          
        ]);

        DB::table('room_types')->insert([
            [
                "id" => 1,
                "title" => "Deluxe Double Room",
                "detail" => null,
                "price" => "3326400",
                "created_at" => "2023-04-18 03:56:41",
                "updated_at" => "2023-04-22 07:37:45"
            ],
            [
                "id" => 2,
                "title" => "Premium King Room",
                "detail" => null,
                "price" => "3719100",
                "created_at" => "2023-04-18 04:12:14",
                "updated_at" => "2023-04-22 07:38:11"
            ],
            [
                "id" => 3,
                "title" => "Premium Twin Room",
                "detail" => null,
                "price" => "3719100",
                "created_at" => "2023-04-18 04:12:56",
                "updated_at" => "2023-04-22 07:41:00",
            ],
            [
                "id" => 4,
                "title" => "Junior Suite",
                "detail" => null,
                "price" => "6050000",
                "created_at" => "2023-04-18 03:56:41",
                "updated_at" => "2023-04-22 07:37:45"
            ],
            [
                "id" => 5,
                "title" => "Premium Club King",
                "detail" => null,
                "price" => "5705700",
                "created_at" => "2023-04-18 03:56:41",
                "updated_at" => "2023-04-22 07:37:45"
            ],
            [
                "id" => 6,
                "title" => "Sona Suite",
                "detail" => null,
                "price" => "6780000",
                "created_at" => "2023-04-18 03:56:41",
                "updated_at" => "2023-04-22 07:37:45"
            ],
            
        ]);

        DB::table('rooms')->insert([
            [
                "id" => 1,
                "title" => "Room 1",
                "room_type_id" => 1,
                "created_at" => "2023-04-18 04:19:22",
                "updated_at" => "2023-04-22 08:22:47"
            ],
            [
                "id" => 2,
                "title" => "Room 2",
                "room_type_id" => 2,
                "created_at" => "2023-04-18 05:58:44",
                "updated_at" => "2023-04-22 08:22:58"
            ],
            [
                "id" => 3,
                "title" => "Room 3",
                "room_type_id" => 3,
                "created_at" => "2023-04-21 04:24:21",
                "updated_at" => "2023-04-22 08:23:06"
            ],
            [
                "id" => 4,
                "title" => "Room 4",
                "room_type_id" => 4,
                "created_at" => "2023-04-21 04:24:29",
                "updated_at" => "2023-04-21 04:24:29"
            ],
            [
                "id" => 5,
                "title" => "Room 5",
                "room_type_id" => 5,
                "created_at" => "2023-04-22 08:23:29",
                "updated_at" => "2023-04-22 08:23:29"
            ],
            [
                "id" => 6,
                "title" => "Room 6",
                "room_type_id" => 6,
                "created_at" => "2023-04-22 08:23:35",
                "updated_at" => "2023-04-22 08:23:35"
            ],
            
        ]);

        DB::table('customers')->insert([
            [
                "id" => 1,
                "full_name" => "Steve Roger",
                "email" => "steveroger@gmail.com",
                "password" =>  sha1('123456'),
                "mobile" => "0931321812",
                "photo" => null,
                "created_at" => "2023-04-18 09:20:31",
                "updated_at" => "2023-04-18 09:37:54"
            ],
            [
                "id" => 2,
                "full_name" => "Carol Danver",
                "email" => "caroldanver@gmail.com",
                "password" =>  sha1('123456'),
                "mobile" => "0931321812",
                "photo" => null,
                "created_at" => "2023-04-18 09:35:02",
                "updated_at" => "2023-04-18 09:35:02"
            ],
            [
                "id" => 3,
                "full_name" => "Bruce Banner",
                "email" => "brucebanner@gmail.com",
                "password" =>  sha1('123456'),
                "mobile" => "0922321333",
                "photo" => null,
                "created_at" => "2023-04-20 15:01:32",
                "updated_at" => "2023-04-20 15:01:32"
            ],
            [
                "id" => 4,
                "full_name" => "Kara Kent",
                "email" => "karakent@gmail.com",
                "password" =>  sha1('123456'),
                "mobile" => "0931327843",
                "photo" => null,
                "created_at" => "2023-04-20 15:04:15",
                "updated_at" => "2023-04-20 15:04:15"
            ],
            [
                "id" => 5,
                "full_name" => "Tony Stark",
                "email" => "tonystark@gmail.com",
                "password" =>  sha1('123456'),
                "mobile" => "0931321222",
                "photo" => null,
                "created_at" => "2023-04-20 15:07:19",
                "updated_at" => "2023-04-20 15:07:19"
            ],
           
            
        ]);

        DB::table('departments')->insert([
            [
                "id" => 1,
                "title" => "Hotel manager",
                "detail" => "salary 40000000",
                "created_at" => "2023-04-19 07:35:48",
                "updated_at" => "2023-04-22 08:27:21"
            ],
            [
                "id" => 2,
                "title" => "Manager",
                "detail" => "Salary 15000000",
                "created_at" => "2023-04-19 07:35:55",
                "updated_at" => "2023-04-22 08:29:15"
            ],
            [
                "id" => 3,
                "title" => "Front desk receptionist",
                "detail" => "Salary 8000000",
                "created_at" => "2023-04-22 08:25:35",
                "updated_at" => "2023-04-22 08:30:18"
            ],
            [
                "id" => 4,
                "title" => "Housekeeper",
                "detail" => "Salary 6000000",
                "created_at" => "2023-04-22 08:25:46",
                "updated_at" => "2023-04-22 08:28:58"
            ],
            [
                "id" => 5,
                "title" => "Restaurant staff",
                "detail" => "Salary 7000000",
                "created_at" => "2023-04-22 08:25:54",
                "updated_at" => "2023-04-22 08:29:50"
            ],
            [
                "id" => 6,
                "title" => "Accountant",
                "detail" => "Salary 1000000",
                "created_at" => "2023-04-22 08:26:02",
                "updated_at" => "2023-04-22 08:27:41"
            ],
            
        ]);

        DB::table('staff')->insert([
            [
                "id" => 1,
                "full_name" => "Bruce Wayne",
                "department_id" => 1,
                "photo" => null,
                "bio" => "Detail",
                "salary_type" => "monthly",
                "salary_amt" => "40000000",
                "created_at" => "2023-04-19 07:58:16",
                "updated_at" => "2023-04-22 08:31:34"
            ],
            [
                "id" => 2,
                "full_name" => "Diana Price",
                "department_id" => 2,
                "photo" => null,
                "bio" => "Detail",
                "salary_type" => "monthly",
                "salary_amt" => "15000000",
                "created_at" => "2023-04-19 07:58:16",
                "updated_at" => "2023-04-22 08:31:34"
            ],
            [
                "id" => 3,
                "full_name" => "Barry Allen",
                "department_id" => 5,
                "photo" => null,
                "bio" => "Detail",
                "salary_type" => "monthly",
                "salary_amt" => "7000000",
                "created_at" => "2023-04-19 07:58:16",
                "updated_at" => "2023-04-22 08:31:34"
            ],
            
        ]);

        DB::table('staff_payments')->insert([
            [
                "id" => 1,
                "staff_id" => 1,
                "amount" => 40000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            [
                "id" => 2,
                "staff_id" => 2,
                "amount" => 15000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            [
                "id" => 3,
                "staff_id" => 3,
                "amount" => 8000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            [
                "id" => 4,
                "staff_id" => 4,
                "amount" => 6000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            [
                "id" => 5,
                "staff_id" => 5,
                "amount" => 7000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            [
                "id" => 6,
                "staff_id" => 6,
                "amount" => 1000000,
                "payment_date" => "2023-04-10",
                "created_at" => "2023-04-19 13:53:37",
                "updated_at" => "2023-04-19 13:53:37"
            ],
            
        ]);

        DB::table('bookings')->insert([
            [
                "id" => 1,
                "customer_id" => 1,
                "room_id" => 1,
                "checkin_date" => "2023-04-01",
                "checkout_date" => "2023-04-03",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],
            [
                "id" => 2,
                "customer_id" => 2,
                "room_id" => 2,
                "checkin_date" => "2023-04-01",
                "checkout_date" => "2023-04-03",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],  
            [
                "id" => 3,
                "customer_id" => 3,
                "room_id" => 3,
                "checkin_date" => "2023-04-03",
                "checkout_date" => "2023-04-05",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],  
            [
                "id" => 4,
                "customer_id" => 4,
                "room_id" => 4,
                "checkin_date" => "2023-04-05",
                "checkout_date" => "2023-04-06",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],  
            [
                "id" => 5,
                "customer_id" => 5,
                "room_id" => 5,
                "checkin_date" => "2023-04-06",
                "checkout_date" => "2023-04-08",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],  
            [
                "id" => 6,
                "customer_id" => 1,
                "room_id" => 6,
                "checkin_date" => "2023-04-06",
                "checkout_date" => "2023-04-08",
                "total_adults" => "2",
                "total_children" => "1",
                "ref" => "front",
                "created_at" => "2023-04-19 14:53:37",
                "updated_at" => "2023-04-19 14:53:37"
            ],            
        ]);

        DB::table('services')->insert([
            [
                "id" => 1,
                "title" => "Basement parking",
                "small_desc" => "flaticon-036-parking",
                "detail_desc" => "Parking service at the hotel is one of the utilities provided to meet the travel needs of customers. The hotel provides a valet service to help guests easily  move to important places in the city in a convenient and safe way. ",
                "photo" => null,
                "created_at" => "2023-04-21 07:07:47",
                "updated_at" => "2023-04-22 02:42:54"
            ],    
            [
                "id" => 2,
                "title" => "Sky Executive Lounge",
                "small_desc" => "flaticon-012-cocktail",
                "detail_desc" => "Located on the 14th floor, Mai's Sky Executive Lounge is a private area offering exclusive privileges and services for guests staying in our Premium Club and Suite. This tranquil space will give you a chance to escape from the bustling Saigon, admire the landscape of our city, and enjoy a fragrant cup of tea simultaneously.",
                "photo" => null,
                "created_at" => "2023-04-21 07:07:57",
                "updated_at" => "2023-04-22 03:12:58"
            ],
            [
                "id" => 3,
                "title" => "Four Elements Spa",
                "small_desc" => "flaticon-026-bed",
                "detail_desc" => "Four Elements Spa has been inspired by ancient wisdoms to its spa rituals. This haven of relaxation embraces elemental energies to combine traditional Asian techniques with the best modern Western practices. We use only the highest quality products containing naturally therapeutic ingredients to soothe and heal your soul and spirit at the same time. Our experienced practitioners expertly deliver stress relief, body revitalization, and facial treatments in our four beautifully appointed treatment rooms. ",
                "photo" => null,
                "created_at" => "2023-04-21 07:08:12",
                "updated_at" => "2023-04-22 02:33:49"
            ],
            [
                "id" => 4,
                "title" => "Sky Executive Lounge",
                "small_desc" => "flaticon-012-cocktail",
                "detail_desc" => "Located on the 14th floor, Mai's Sky Executive Lounge is a private area offering exclusive privileges and services for guests staying in our Premium Club and Suite. This tranquil space will give you a chance to escape from the bustling Saigon, admire the landscape of our city, and enjoy a fragrant cup of tea simultaneously.",
                "photo" => null,
                "created_at" => "2023-04-21 07:07:57",
                "updated_at" => "2023-04-22 03:12:58"
            ],
            [
                "id" => 5,
                "title" => "Life Fitness Gym",
                "small_desc" => "flaticon-044-clock-1",
                "detail_desc" => "Keep up with your fitness routine at your convenience. Our 24-hour Life Fitness Gym is fully equipped with treadmills, cross-trainers, exercise bicycles, free weights, and a multi-gym area. Warm-up, cool down or find your bliss in the yoga and stretching zone, a good way to find positive things in life at ease. ",
                "photo" => null,
                "created_at" => "2023-04-21 07:08:35",
                "updated_at" => "2023-04-22 02:33:20"
            ],
            [
                "id" => 6,
                "title" => "The Fifth Element Pool Bar",
                "small_desc" => "flaticon-007-swimming-pool",
                "detail_desc" => "For complete rejuvenation, a refreshing dip in the pool is a must. Our outdoor pool and deck is located just steps from Four Elements Spa on the 5th floor.Feeling chilly? Stretch out on a sun lounger and let the sun do it's warming magic. Laze away the day, catch a nap or let us tempt you with our poolside offerings, including healthy snacks and drinks – or something a little more decadent – from The Fifth Element Bar. Towels, hats, sun cream and refreshments are available at our Pool Bar.",
                "photo" => null,
                "created_at" => "2023-04-21 07:08:46",
                "updated_at" => "2023-04-22 03:12:36"
            ],      
        ]);

        DB::table('testimmonials')->insert([
            [
                "id" => 1,
                "customer_id" => 2,
                "testi_cont" =>"After a construction project took longer than expected, my husband, my daughter and I needed a place to stay for a few nights. We know a lot about this city, neighborhood and the types of housing options available and absolutely love our vacation at Sona Hotel",
                "created_at" => "2023-04-21 10:08:34",
                "updated_at" => "2023-04-21 10:08:34"
            ],    
            [
                "id" => 2,
                "customer_id" => 1,
                "testi_cont" =>"After a construction project took longer than expected, my girl friend and I needed a place to stay for two nights.We love our vacation at Sona Hotel",
                "created_at" => "2023-04-21 10:08:34",
                "updated_at" => "2023-04-21 10:08:34"
            ],      
        ]);

        DB::table('banners')->insert([
            [
                "id" => 1,
                "banner_src" => null,
                "alt_text" => "Banner 1",
                "publish_status" => "on",
                "created_at" => "2023-04-21 15:14:37",
                "updated_at" => "2023-04-22 02:17:37"
            ],
             [
                "id" => 2,
                "banner_src" => null,
                "alt_text" => "Banner 2",
                "publish_status" => "on",
                "created_at" => "2023-04-21 15:21:44",
                "updated_at" => "2023-04-22 02:17:50"
            ],   
            [
                "id" => 3,
                "banner_src" => null,
                "alt_text" => "Banner 3",
                "publish_status" => "on",
                "created_at" => "2023-04-21 15:21:54",
                "updated_at" => "2023-04-22 02:18:06"
            ],   
                   
        ]);

        DB::table('room_type_images')->insert([
            [
                "id" => 1,
                "room_type_id" => 1,
                "img_src" => null,
                "img_alt" => null,
                "created_at" => "2023-04-21 15:14:37",
                "updated_at" => "2023-04-22 02:17:37"
            ],
            
                   
        ]);

    }
}
