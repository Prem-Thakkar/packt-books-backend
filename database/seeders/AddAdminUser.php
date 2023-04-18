<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Str;

class AddAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = new AdminUser;
        $adminUser->email = 'admin@admin.com';
        $adminUser->password = bcrypt('Admin@123');
        $adminUser->token = Str::random(25);
        $adminUser->save();
    }
}
