<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('asdasd'),
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'asd',
                'email' => 'asd@asd.com',
                'password' => bcrypt('asdasd'),
            ]
        );
        DB::table('products')->insert([
            [
                'name' => 'Dokter Jiwa',
                'description' => 'Sudah menangani lebih dari 100ribu pasien gila',
                'price' => '12341',
                'person_name' => 'Dr. Strange',
                'images' => 'product_images/drstrange.jpg',
                'category_id' => '3',
            ],
            [
                'name' => 'Programmer React',
                'description' => 'Sudah menangani lebih dari 100ribu client gila',
                'price' => '12341',
                'person_name' => 'Christopher Alvin',
                'images' => 'product_images/ca.png',
                'category_id' => '5',
            ],
            [
                'name' => 'Pelukis Handal',
                'description' => 'Sudah menangani lebih dari 100ribu pelukis gila',
                'price' => '12341',
                'person_name' => 'Pablo Picasso',
                'images' => 'product_images/artist.jpeg',
                'category_id' => '1',
            ],
            [
                'name' => 'Dosen Mantap',
                'description' => 'Sudah menangani lebih dari 100ribu mahasiswa gila',
                'price' => '12341',
                'person_name' => 'Einsteinless Steel',
                'images' => 'product_images/teacher.jpeg',
                'category_id' => '2',
            ],
            [
                'name' => 'Kuli Imba',
                'description' => 'Sudah menangani lebih dari 100ribu rumah-rumahan',
                'price' => '12341',
                'person_name' => 'Kuli',
                'images' => 'product_images/kuli.jpg',
                'category_id' => '6',
            ],
            [
                'name' => 'Fotografer Salah Fokus',
                'description' => 'Sudah memfoto lebih dari 100ribu foto yang ngeblur',
                'price' => '12341',
                'person_name' => 'Cekrek',
                'images' => 'product_images/fotografer.jpg',
                'category_id' => '4',
            ],
        ]);
        
        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '1',
                'day' => '1',
                'hour' => '00.00 - 10.00',
            ],
            [
                'product_id' => '1',
                'day' => '2',
                'hour' => '00.00 - 14.00',
            ],
            [
                'product_id' => '1',
                'day' => '3',
                'hour' => '00.00 - 00.00',
            ],
            [
                'product_id' => '1',
                'day' => '4',
                'hour' => '00.00 - 00.00',
            ],
            [
                'product_id' => '1',
                'day' => '5',
                'hour' => '00.00 - 00.00',
            ],
            [
                'product_id' => '1',
                'day' => '6',
                'hour' => '00.00 - 00.00',
            ],
            [
                'product_id' => '1',
                'day' => '7',
                'hour' => '00.00 - 00.00',
            ]
        ]);

        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '2',
                'day' => '1',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '2',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '3',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '4',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '5',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '6',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '7',
                'hour' => '07.00 - 15.00',
            ]
        ]);

        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '3',
                'day' => '1',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '3',
                'day' => '2',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '2',
                'day' => '3',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '3',
                'day' => '4',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '3',
                'day' => '5',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '3',
                'day' => '6',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '3',
                'day' => '7',
                'hour' => '07.00 - 15.00',
            ]
        ]);

        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '4',
                'day' => '1',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '2',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '3',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '4',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '5',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '6',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '4',
                'day' => '7',
                'hour' => '07.00 - 15.00',
            ]
        ]);

        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '5',
                'day' => '1',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '2',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '3',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '4',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '5',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '6',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '5',
                'day' => '7',
                'hour' => '07.00 - 15.00',
            ]
        ]);

        DB::table('product_operational_hours')->insert([
            [
                'product_id' => '6',
                'day' => '1',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '2',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '3',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '4',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '5',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '6',
                'hour' => '07.00 - 15.00',
            ],
            [
                'product_id' => '6',
                'day' => '7',
                'hour' => '07.00 - 15.00',
            ]
        ]);

        DB::table('books')->insert([
            [
                'book_id' => '35Z7hCtBiJ3g2aCV5Etf1557762125',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '0.00-1.00',
                'status' => 'Paid'
            ],
            [
                'book_id' => '35Z7hCtBiJ3g2aCV5Etf1557762125',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '1.00-2.00',
                'status' => 'Paid'
            ],
            [
                'book_id' => '35Z7hCtBiJ3g2aCV5Etf1557762125',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '2.00-3.00',
                'status' => 'Paid'
            ],
            [
                'book_id' => 'aqDuILpYUZcyseU81qRL1557770640',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '11.00-12.00',
                'status' => 'On Payment Review'
            ],
            [
                'book_id' => 'aqDuILpYUZcyseU81qRL1557770640',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '12.00-13.00',
                'status' => 'On Payment Review'
            ],
            [
                'book_id' => 'aqDuILpYUZcyseU81qRL1557770640',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Tuesday',
                'date' => '14-05-2019',
                'hour' => '13.00-14.00',
                'status' => 'On Payment Review'
            ],
            [
                'book_id' => 'TAUphvEmHS5V8ZZPzwZd1557770671',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Monday',
                'date' => '20-05-2019',
                'hour' => '0.00-1.00',
                'status' => 'Not paid'
            ],
            [
                'book_id' => 'TAUphvEmHS5V8ZZPzwZd1557770671',
                'product_id' => '1',
                'user_id' => '1',
                'day' => 'Monday',
                'date' => '20-05-2019',
                'hour' => '1.00-2.00',
                'status' => 'Not paid'
            ],
        ]);

        DB::table('payments')->insert([
            [
                'book_id' => '35Z7hCtBiJ3g2aCV5Etf1557762125',
                'payment_bank' => 'BCA',
                'payment_date' => '14-05-2019',
                'payment_receipt_number' => 'asd',
                'payment_receipt_image' => 'payment_receipt/35Z7hCtBiJ3g2aCV5Etf1557762125.png',
            ],
            [
                'book_id' => 'aqDuILpYUZcyseU81qRL1557770640',
                'payment_bank' => 'BCA',
                'payment_date' => '14-05-2019',
                'payment_receipt_number' => 'asd',
                'payment_receipt_image' => 'payment_receipt/aqDuILpYUZcyseU81qRL1557770640DJyUP.png',
            ],
        ]);

        DB::table('categories')->insert([
            [
                'categories' => 'Artist',
                'icon' => 'category_images/profesi-artist.png',
            ],
            [
                'categories' => 'Education',
                'icon' => 'category_images/profesi-education.png',
            ],
            [
                'categories' => 'Health',
                'icon' => 'category_images/profesi-health.png',
            ],
            [
                'categories' => 'Photographer',
                'icon' => 'category_images/profesi-photographer.png',
            ],
            [
                'categories' => 'Programmer',
                'icon' => 'category_images/profesi-programmer.png',
            ],
            [
                'categories' => 'Technician',
                'icon' => 'category_images/profesi-technician.png',
            ],
        ]);

        DB::table('contact_us')->insert([
            [
                'name' => 'Bill Gates',
                'email' => 'bill.gates@microsoft.com',
                'message' => 'Aplikasi yang sangat memudahkan masyarakat yang membutuhkan jasa.',
            ],
        ]);
    }
}
