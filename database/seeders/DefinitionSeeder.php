<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $definitions = [
            // team_status
            ['group_key' => 'team_status', 'value' => 'active', 'description_tr' => 'Aktif', 'description_en' => 'Active'],
            ['group_key' => 'team_status', 'value' => 'inactive', 'description_tr' => 'Pasif', 'description_en' => 'Inactive'],
            ['group_key' => 'team_status', 'value' => 'banned', 'description_tr' => 'Yasaklandı', 'description_en' => 'Banned'],

            // Gender
            ['group_key' => 'personal_gender', 'value' => 'male', 'description_tr' => 'Erkek', 'description_en' => 'Male'],
            ['group_key' => 'personal_gender', 'value' => 'female', 'description_tr' => 'Kadın', 'description_en' => 'Female'],
            ['group_key' => 'personal_gender', 'value' => 'other', 'description_tr' => 'Diğer', 'description_en' => 'Other'],

            // Team Gende
            ['group_key' => 'group_gender', 'value' => 'male', 'description_tr' => 'Erkek', 'description_en' => 'Male'],
            ['group_key' => 'group_gender', 'value' => 'female', 'description_tr' => 'Kadın', 'description_en' => 'Female'],
            ['group_key' => 'group_gender', 'value' => 'other', 'description_tr' => 'Diğer', 'description_en' => 'Other'],
            ['group_key' => 'group_gender', 'value' => 'mixed', 'description_tr' => 'Karışık', 'description_en' => 'Mixed'],

            // match_status
            ['group_key' => 'match_status', 'value' => 'pending', 'description_tr' => 'Beklemede', 'description_en' => 'Pending'],
            ['group_key' => 'match_status', 'value' => 'confirmed', 'description_tr' => 'Onaylandı', 'description_en' => 'Confirmed'],
            ['group_key' => 'match_status', 'value' => 'completed', 'description_tr' => 'Tamamlandı', 'description_en' => 'Completed'],
            ['group_key' => 'match_status', 'value' => 'canceled', 'description_tr' => 'İptal Edildi', 'description_en' => 'Canceled'],

            // player_status
            ['group_key' => 'player_status', 'value' => 'available', 'description_tr' => 'Müsait', 'description_en' => 'Available'],
            ['group_key' => 'player_status', 'value' => 'injured', 'description_tr' => 'Sakat', 'description_en' => 'Injured'],
            ['group_key' => 'player_status', 'value' => 'suspended', 'description_tr' => 'Cezalı', 'description_en' => 'Suspended'],

            // court_status
            ['group_key' => 'court_status', 'value' => 'available', 'description_tr' => 'Müsait', 'description_en' => 'Available'],
            ['group_key' => 'court_status', 'value' => 'maintenance', 'description_tr' => 'Bakımda', 'description_en' => 'Under Maintenance'],
            ['group_key' => 'court_status', 'value' => 'unavailable', 'description_tr' => 'Kullanılamaz', 'description_en' => 'Unavailable'],

            // participant_status
            // participant_status (for match or team join status)
            ['group_key' => 'participant_status', 'value' => 'invited', 'description_tr' => 'Davetli', 'description_en' => 'Invited'],
            ['group_key' => 'participant_status', 'value' => 'joined', 'description_tr' => 'Katıldı', 'description_en' => 'Joined'],
            ['group_key' => 'participant_status', 'value' => 'declined', 'description_tr' => 'Reddedildi', 'description_en' => 'Declined'],
            ['group_key' => 'participant_status', 'value' => 'pending_response', 'description_tr' => 'Yanıt Bekleniyor', 'description_en' => 'Pending Response'],
            ['group_key' => 'participant_status', 'value' => 'kicked', 'description_tr' => 'Çıkarıldı', 'description_en' => 'Kicked'],

            // request_status
            ['group_key' => 'request_status', 'value' => 'waiting_for_approval', 'description_tr' => 'Beklemede', 'description_en' => 'Waiting for Approval'],
            ['group_key' => 'request_status', 'value' => 'accepted', 'description_tr' => 'Kabul Edildi', 'description_en' => 'Accepted'],
            ['group_key' => 'request_status', 'value' => 'rejected', 'description_tr' => 'Reddedildi', 'description_en' => 'Rejected'],
        ];

        foreach ($definitions as $definition) {
            DB::table('definitions')->insert([
                'id' => Str::uuid(),
                'group_key' => $definition['group_key'],
                'value' => $definition['value'],
                'description_tr' => $definition['description_tr'],
                'description_en' => $definition['description_en'],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
