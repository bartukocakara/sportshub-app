<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Doğrulama
    |--------------------------------------------------------------------------
    |
    | Aşağıdaki öğeler doğrulama(validation) işlemleri sırasında kullanılan varsayılan hata
    | mesajlarını içermektedir. `size` gibi bazı kuralların birden çok çeşidi
    | bulunmaktadır. Her biri ayrı ayrı düzenlenebilir.
    |
    */

    'accepted' => ':attribute kabul edilmelidir.',
    'accepted_if' => ':attribute, :other :value olduğunda kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after' => ':attribute değeri :date tarihinden sonra olmalıdır.',
    'after_or_equal' => ':attribute değeri :date tarihinden sonra veya eşit olmalıdır.',
    'alpha' => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num' => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array' => ':attribute dizi olmalıdır.',
    'before' => ':attribute değeri :date tarihinden önce olmalıdır.',
    'before_or_equal' => ':attribute değeri :date tarihinden önce veya eşit olmalıdır.',
    'between' => [
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'file' => ':attribute :min - :max arasındaki kilobayt değeri olmalıdır.',
        'string' => ':attribute :min - :max arasında karakterden oluşmalıdır.',
        'array' => ':attribute :min - :max arasında nesneye sahip olmalıdır.',
    ],
    'boolean' => ':attribute sadece doğru veya yanlış olmalıdır.',
    'confirmed' => ':attribute tekrarı eşleşmiyor.',
    'current_password' => 'Parola hatalı.',
    'date' => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute ile :date aynı tarihler olmalıdır.',
    'date_format' => ':attribute :format biçimi ile eşleşmiyor.',
    'declined' => ':attribute kabul edilmemelidir.',
    'declined_if' => ':attribute, :other :value olduğunda kabul edilmemelidir.',
    'different' => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits' => ':attribute :digits haneden oluşmalıdır.',
    'digits_between' => ':attribute :min ile :max arasında haneden oluşmalıdır.',
    'dimensions' => ':attribute görsel ölçüleri geçersiz.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'email' => ':attribute alanına girilen e-posta adresi geçersiz.',
    'ends_with' => ':attribute, şunlardan biriyle bitmelidir :values',
    'enum' => 'Seçili :attribute geçersiz.',
    'exists' => 'Seçili :attribute geçersiz.',
    'file' => ':attribute dosya olmalıdır.',
    'filled' => ':attribute alanının doldurulması zorunludur.',
    'gt' => [
        'numeric' => ':attribute, :value değerinden büyük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutundan büyük olmalı.',
        'string'  => ':attribute, :value karakterden uzun olmalı.',
        'array'   => ':attribute, :value taneden fazla olmalı.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value kadar veya daha fazla olmalı.',
        'file'    => ':attribute, :value kilobayt boyutu kadar veya daha büyük olmalı.',
        'string'  => ':attribute, :value karakter kadar veya daha uzun olmalı.',
        'array'   => ':attribute, :value tane veya daha fazla olmalı.',
    ],
    'image' => ':attribute alanı resim dosyası olmalıdır.',
    'in' => ':attribute değeri geçersiz.',
    'in_array' => ':attribute alanı :other içinde mevcut değil.',
    'integer' => ':attribute tamsayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON değişkeni olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value değerinden küçük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutundan küçük olmalı.',
        'string'  => ':attribute, :value karakterden kısa olmalı.',
        'array'   => ':attribute, :value taneden az olmalı.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value kadar veya daha küçük olmalı.',
        'file'    => ':attribute, :value kilobayt boyutu kadar veya daha küçük olmalı.',
        'string'  => ':attribute, :value karakter kadar veya daha kısa olmalı.',
        'array'   => ':attribute, :value tane veya daha az olmalı.',
    ],
    'mac_address' => ':attribute geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'numeric' => ':attribute değeri en çok :max olmalıdır.',
        'file' => ':attribute boyutu en çok :max kilobayt olmalıdır.',
        'string' => ':attribute uzunluğu en çok :max karakter olmalıdır.',
        'array' => ':attribute en çok :max nesneye sahip olmalıdır.',
    ],
    'mimes' => ':attribute dosya biçimi :values olmalıdır.',
    'mimetypes' => ':attribute dosya biçimi :values olmalıdır.',
    'min' => [
        'numeric' => ':attribute değeri en az :min olmalıdır.',
        'file' => ':attribute boyutu en az :min kilobayt olmalıdır.',
        'string' => ':attribute uzunluğu en az :min karakter olmalıdır.',
        'array' => ':attribute en az :min nesneye sahip olmalıdır.',
    ],
    'multiple_of' => ':attribute, :value değerinin katları olmalıdır.',
    'not_in' => 'Seçili :attribute geçersiz.',
    'not_regex' => ':attribute biçimi geçersiz.',
    'numeric' => ':attribute sayı olmalıdır.',
    'password' => 'Parola geçersiz.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'prohibited' => ':attribute alanını gönderemezsiniz.',
    'prohibited_if' => ':other değeri :value olduğunda :attribute alanını gönderemezsiniz.',
    'prohibited_unless' => 'Değerler\'de :other olmadığı sürece :attribute alanını gönderemezsiniz.',
    'prohibits' => ':attribute alanı ile :other alanını birlikte gönderemezsiniz.',
    'regex' => ':attribute biçimi geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı, :değerler için girişler içermelidir.',
    'required_if' => ':attribute alanı, :other :value değerine sahip olduğunda zorunludur.',
    'required_unless' => ':attribute alanı, :other alanı :value değerlerinden birine sahip olmadığında zorunludur.',
    'required_with' => ':attribute alanı :values varken zorunludur.',
    'required_with_all' => ':attribute alanı herhangi bir :values değeri varken zorunludur.',
    'required_without' => ':attribute alanı :values yokken zorunludur.',
    'required_without_all' => ':attribute alanı :values değerlerinden herhangi biri yokken zorunludur.',
    'same' => ':attribute ile :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute :size olmalıdır.',
        'file' => ':attribute :size kilobyte olmalıdır.',
        'string' => ':attribute :size karakter olmalıdır.',
        'array' => ':attribute :size nesneye sahip olmalıdır.',
    ],
    'starts_with' => ':attribute şunlardan biri ile başlamalıdır: :values',
    'string' => ':attribute dizge olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute daha önceden kayıt edilmiş.',
    'uploaded' => ':attribute yüklemesi başarısız.',
    'url' => ':attribute biçimi geçersiz.',
    'uuid' => ':attribute bir UUID formatına uygun olmalı.',
    'duplicated_user_channel' => 'Bu mesaj türünün kanalına aynı kullanıcıyı iki kez ekleyemezsiniz.',

    /*
    |--------------------------------------------------------------------------
    | Özelleştirilmiş doğrulama mesajları
    |--------------------------------------------------------------------------
    |
    | Bu alanda her niteleyici (attribute) ve kural (rule) ikilisine özel hata
    | mesajları tanımlayabilirsiniz. Bu özellik, son kullanıcıya daha gerçekçi
    | metinler göstermeniz için oldukça faydalıdır.
    |
    | Örnek:
    | 'invalid_extension'     => 'Dosyanın uzantısı geçersiz.',
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Özelleşmiş Mesaj',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Özelleştirilmiş niteleyici isimleri
    |--------------------------------------------------------------------------
    |
    | Bu alandaki bilgiler "email" gibi niteleyici isimlerini "E-Posta adres"
    | gibi daha okunabilir metinlere çevirmek için kullanılır. Bu bilgiler
    | hata mesajlarının daha temiz olmasını sağlar.
    |
    | Örnek:
    |
    | 'email' => 'E-Posta adresi',
    | 'password' => 'Şifre',
    |
    */

    'attributes' => [
        'email' => 'E-Posta adresi',
        'password' => 'Şifre',
        'last_name' => 'Soyad',
        'first_name' => 'Ad',
        'images' => 'Görseller',
        'image' => 'Resim',
        'images.*.id' => 'Görseller id',
        'images.*.order' => 'Görseller sıra',
        'images.*.file' => 'Görseller dosya',
        'court_id' => 'Saha alanı',
        'user_id' => 'Kullanıcı alanı',
        'rate' => 'Değerlendirme alanı',
        'comment' => 'Yorum alanı',
        'title' => 'Başlık',
        'sport_type_id' => 'Spor Türü',
        'address' => 'Adres',
        'address.title' => 'Adres Başlığı',
        'address.zip_code' => 'Posta Kodu',
        'address.detail' => 'Adres Detayı',
        'address.latitude' => 'Enlem',
        'address.longitude' => 'Boylam',
        'address.neighborhood' => 'Mahalle',
        'address.building_number' => 'Bina Numarası',
        'phone' => 'Telefon',
        'court_status_id' => 'Saha Durumu',
        'settings' => 'Ayarlar',
        'settings.*.id' => 'Ayar ID',
        'settings.*.value' => 'Ayar Değeri',
        'to_user_id' => 'Kullanıcı alanı',
        'team_id' => 'Takım alanı',
        'description' => 'Açıklama',
        'court_reservation_pricing_ids' => 'Saha Fiyat Kimlikleri',
        'court_reservation_pricing_ids.*' => 'Saha Fiyat Kimliği',
        'teams' => 'Takımlar',
        'teams.*.title' => 'Takım Başlığı',
        'teams.*.user_ids' => 'Kullanıcı Kimlikleri',
        'start_date' => 'Başlangıç Tarihi',
        'expiring_date' => 'Son Tarih',
        'from_hour' => 'Başlangıç Saati',
        'to_hour' => 'Bitiş Saati',
        'max_player' => 'Maksimum Oyuncu',
        'min_player' => 'Minimum Oyuncu',
        'min_team' => 'Minimum Takım',
        'max_team' => 'Maksimum Takım',
        'gender' => 'Cinsiyet',
        'request_player_message' => 'Oyuncu İsteği Mesajı',
        'request_court_message' => 'Saha İsteği Mesajı',
        'match_setting_fields' => 'Maç Ayar Alanları',
        'match_setting_fields.*.id' => 'Ayar Kimliği',
        'match_setting_fields.*.value' => 'Ayar Değeri',
        'match_teams' => 'Maç Takımları',
        'match_teams.*.id' => 'Takım Kimliği',
        'match_teams.*.user_ids.*' => 'Kullanıcı Kimlikleri',
        'mtp_ids' => 'Maç Takım Oyuncu Kimlikleri',
        'match_team_players' => 'Maç Takım Oyuncuları',
        'match_team_players.*.id' => 'Maç Takım Oyuncu Kimliği',
        'match_team_players.*.match_team_id' => 'Maç Takım Kimliği',
        'player_court_setting_fields' => 'Oyuncu Sahası Ayar Alanları',
        'player_court_setting_fields.*.id' => 'Ayar Kimliği',
        'player_court_setting_fields.*.value' => 'Ayar Değeri',
        'player_match_setting_fields' => 'Oyuncu Maç Ayar Alanları',
        'player_match_setting_fields.*.id' => 'Ayar Kimliği',
        'player_match_setting_fields.*.value' => 'Ayar Değeri',
        'player_skill_fields' => 'Oyuncu Beceri Alanları',
        'player_skill_fields.*.id' => 'Becer Kimliği',
        'player_skill_fields.*.value' => 'Becer Değeri',
        'users.*.user_id' => 'Kullanıcı Kimliği',
        'request_title' => 'İstek Başlığı',
        'player_team_setting_fields' => 'Oyuncu Takım Ayar Alanları',
        'player_team_setting_fields.*.id' => 'Ayar Kimliği',
        'player_team_setting_fields.*.value' => 'Ayar Değeri',
        'match_id' => 'Maç alanı',
        'status' => 'Oyuncu davet durm alanı',
        'team_status_id' => 'Takım durum alanı',
        'city_id' => 'Şehir alanı',
        'team_setting_fields' => ' Takım Ayar Alanları',
        'team_setting_fields.*.id' => 'Ayar Kimliği',
        'team_setting_fields.*.value' => 'Ayar Değeri',
        'district_id' => 'İlçe alanı',
        'detail' => 'Detay',
        'longitude' => 'Boylam',
        'latitude' => 'Enlem',
        'street_name' => 'Sokak adı',
        'neighborhood' => 'Mahalle',
        'building_number' => 'Bina numarası',
        'street_name' => 'Sokak adı',
        'player_setting_fields' => ' Oyuncu Ayar Alanları',
        'player_setting_fields.*.id' => 'Ayar Kimliği',
        'player_setting_fields.*.value' => 'Ayar Değeri',
        'title_tr' => 'Başlık türkçe',
        'title_en' => 'Başlık ingilizce',
        'order' => 'Sıralama',
        'active' => 'Aktif',
        'default_value' => 'Varsayılan değer',
        'team_max_player' => 'Takım maksimum oyuncu sayısı',
        'team_min_player' => 'Takım minimum oyuncu sayısı',
        'match_min_player' => 'Maç minimum oyuncu sayısı',
        'match_max_player' => 'Maç maksimum oyuncu sayısı',
    ],

];
