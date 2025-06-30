<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // // 1. Yetkiler
        // $permissions = [
        //     'create_match',
        //     'edit_match',
        //     'delete_match',
        //     'view_team',
        //     'manage_subscriptions',
        // ];

        // foreach ($permissions as $perm) {
        //     Permission::firstOrCreate(['name' => $perm]);
        // }

        // // 2. Roller
        // $admin = Role::firstOrCreate(['name' => 'admin']);
        // $teamLeader = Role::firstOrCreate(['name' => 'team_leader']);
        // $player = Role::firstOrCreate(['name' => 'player']);

        // // 3. Yetki-rol eşlemesi
        // $admin->syncPermissions(Permission::all());
        // $teamLeader->syncPermissions(['create_match', 'edit_match', 'view_team']);
        // $player->syncPermissions(['view_team']);

        // // 4. Test kullanıcıları oluştur ve rolleri ata
        // $adminUser = User::where(['email' => 'admin@example.com'])->first();
        // $adminUser->assignRole('admin');

        // $teamLeaderUser = User::where(['email' => 'teamleader@example.com'])->first();
        // $teamLeaderUser->assignRole('team_leader');

        // $playerUser = User::where(['email' => 'player@example.com'])->first();
        // $playerUser->assignRole('player');

        // // 5. Takımlar oluştur ve takım liderini pivot ile ata
        // Team::factory()
        //     ->count(3)
        //     ->create()
        //     ->each(function ($team) use ($teamLeaderUser) {
        //         // Eğer pivot tabloda 'role' alanı varsa belirt
        //         $team->users()->attach($teamLeaderUser->id, ['role' => 'team_leader']);

        //         // Eğer team_leader_id yoksa bu satırı kaldır veya yorum satırına al
        //         // $team->update(['team_leader_id' => $teamLeaderUser->id]);
        //     });
    }
}
