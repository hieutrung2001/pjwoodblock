<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Woodblocks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            ['username' => 'admin', 'password' => '$2y$10$9AvpBJ3rZoHc7CAI8hknDepNOrjtHcQyyKsSFngRgAZmlw8jo8/HW', 'state' => 1, 'created' => time()],
        ]);

        DB::table('books')->insert([
            ['name' => 'Đại việt sử ký toàn thư', 'state' => 1, 'created' => time()],
            ['name' => 'Ngự chế văn sở tập', 'state' => 1, 'created' => time()],
            ['name' => 'Chế nghĩa tùng thoại', 'state' => 1, 'created' => time()],
            ['name' => 'Quốc triều đăng khoa lục', 'state' => 1, 'created' => time()],
            ['name' => 'Tứ thư nhân vật bị khảo', 'state' => 1, 'created' => time()],
            ['name' => 'Ngự chế thi sơ tập', 'state' => 1, 'created' => time()],
            ['name' => 'Thiên tự văn khải bản', 'state' => 1, 'created' => time()],

        ]);

        DB::table('dynasty')->insert([
            ['name' => 'Nhà Nguyễn', 'state' => 1, 'created' => time()],
        ]);

        $woodblocks = array(
            array('engraved_face' => '["Tồn nghi"]', 'quyen' => '["thư"]', 'code' => '03860', 'state' => 1, 'created' => time(), 'books_id' => 1, 'dynasty_id' => 1, 'front_image' => 'storage/images/03860.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-08360-25m-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["03","09"]', 'quyen' => '["03","03"]', 'code' => '08465', 'state' => 1, 'created' => time(), 'books_id' => 1, 'dynasty_id' => 1, 'front_image' => 'storage/images/08465.jpg', 'back_image' => 'storage/images/08465.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-08465%20-26M-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["43","44"]', 'quyen' => '["07","07"]', 'code' => '24539', 'state' => 1, 'created' => time(), 'books_id' => 2, 'dynasty_id' => 1, 'front_image' => 'storage/images/24539.jpg', 'back_image' => 'storage/images/24539.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-24539%20-37M-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["05","06"]', 'quyen' => '["12","12"]', 'code' => '25476', 'state' => 1, 'created' => time(), 'books_id' => 3, 'dynasty_id' => 1, 'front_image' => 'storage/images/25476.jpg', 'back_image' => 'storage/images/25476.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-25476-18m-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["Tồn nghi","13"]', 'quyen' => '["01","03"]', 'code' => '25900', 'state' => 1, 'created' => time(), 'books_id' => 4, 'dynasty_id' => 1, 'front_image' => 'storage/images/25900.jpg', 'back_image' => 'storage/images/25900.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-25900%20-26M-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["03","25"]', 'quyen' => '["09","09"]', 'code' => '26774', 'state' => 1, 'created' => time(), 'books_id' => 5, 'dynasty_id' => 1, 'front_image' => 'storage/images/26774.jpg', 'back_image' => 'storage/images/26774.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-27674%20-37M-point_converted.html', 'is_displayed' => 1),
            array('engraved_face' => '["21","22"]', 'quyen' => '["mục lục","mục lục"]', 'code' => '29141', 'state' => 1, 'created' => time(), 'books_id' => 6, 'dynasty_id' => 1, 'front_image' => 'storage/images/29141.jpg', 'back_image' => 'storage/images/29141.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-29141%20-38M-point_converted.html',),
            array('engraved_face' => '["Tồn nghi"]', 'quyen' => '["thư"]', 'code' => '24387', 'state' => 1, 'created' => time(), 'books_id' => 2, 'dynasty_id' => 1, 'front_image' => 'storage/images/24387.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-24387-32m-point_converted.html',),
            array('engraved_face' => '["Tồn nghi"]', 'quyen' => '["Tồn nghi"]', 'code' => '28867', 'state' => 1, 'created' => time(), 'books_id' => 6, 'dynasty_id' => 1, 'front_image' => 'storage/images/28867.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-28867%20-100M-point_converted.html',),
            array('engraved_face' => '["20","21"]', 'quyen' => '["Tồn nghi","Tồn nghi"]', 'code' => '28013', 'state' => 1, 'created' => time(), 'books_id' => 7, 'dynasty_id' => 1, 'front_image' => 'storage/images/28013.jpg', 'back_image' => 'storage/images/28013.jpg', 'link' => 'http://mocban.disanso.vn/examples/mocban-28013-60m-point_converted.html',)
        );
        for ($i = 0; $i < count($woodblocks); ++$i) {
            DB::table('woodblocks')->insert($woodblocks[$i]);
        }
    }
}
