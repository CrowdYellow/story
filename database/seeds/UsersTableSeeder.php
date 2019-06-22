<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        //手机号
        $phone = [
            130, 131, 132, 133, 134, 135, 136, 137, 138, 139,
            144, 147,
            150, 151, 152, 153, 155, 156, 157, 158, 159,
            176, 177, 178,
            180, 181, 182, 183, 184, 185, 186, 187, 188, 189,
        ];

        // 生成数据集合
        $users = factory(User::class)
            ->times(50)
            ->make()
            ->each(function ($user, $index)
            use ($faker, $phone) {
                // 从头像数组中随机取出一个并赋值
                $user->nickname = $user->name;
                $user->phone = $faker->randomElement($phone) . mt_rand(1000, 9999) . mt_rand(1000, 9999);
            });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user         = User::find(1);
        $user->name   = 'Echo';
        $user->phone  = '13312345678';
        $user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();
    }
}
