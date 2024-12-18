<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validierung
    |--------------------------------------------------------------------------
    |
    | Die folgenden Elemente enthalten die Standardfehlermeldungen, die während
    | der Validierung verwendet werden. Einige Regeln wie `size` haben mehrere
    | Varianten. Jede Regel kann individuell angepasst werden.
    |
    */

    'accepted' => ':attribute muss akzeptiert werden.',
    'accepted_if' => ':attribute muss akzeptiert werden, wenn :other :value ist.',
    'active_url' => ':attribute ist keine gültige URL.',
    'after' => ':attribute muss ein Datum nach :date sein.',
    'after_or_equal' => ':attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => ':attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
    'alpha_num' => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => ':attribute muss ein Array sein.',
    'boolean' => ':attribute muss entweder wahr oder falsch sein.',
    'confirmed' => ':attribute Bestätigung stimmt nicht überein.',
    'current_password' => 'Das aktuelle Passwort ist falsch.',
    'date' => ':attribute muss ein gültiges Datum sein.',
    'date_equals' => ':attribute und :date müssen identische Daten sein.',
    'date_format' => ':attribute entspricht nicht dem Format :format.',
    'declined' => ':attribute darf nicht akzeptiert werden.',
    'declined_if' => ':attribute darf nicht akzeptiert werden, wenn :other :value ist.',
    'different' => ':attribute und :other müssen unterschiedlich sein.',
    'digits' => ':attribute muss :digits Stellen haben.',
    'digits_between' => ':attribute muss zwischen :min und :max Stellen haben.',
    'dimensions' => ':attribute hat ungültige Bildabmessungen.',
    'distinct' => ':attribute Feld hat einen doppelten Wert.',
    'email' => ':attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => ':attribute muss mit einem der folgenden Werte enden: :values',
    'enum' => 'Das ausgewählte :attribute ist ungültig.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'file' => ':attribute muss eine Datei sein.',
    'filled' => ':attribute Feld muss ausgefüllt sein.',
    'gt' => [
        'numeric' => ':attribute muss größer als :value sein.',
        'file' => ':attribute muss größer als :value Kilobytes sein.',
        'string' => ':attribute muss länger als :value Zeichen sein.',
        'array' => ':attribute muss mehr als :value Einträge haben.',
    ],
    'gte' => [
        'numeric' => ':attribute muss größer oder gleich :value sein.',
        'file' => ':attribute muss größer oder gleich :value Kilobytes sein.',
        'string' => ':attribute muss länger oder gleich :value Zeichen sein.',
        'array' => ':attribute muss mindestens :value Einträge haben.',
    ],
    'image' => ':attribute muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribute ist ungültig.',
    'in_array' => ':attribute Feld existiert nicht in :other.',
    'integer' => ':attribute muss eine ganze Zahl sein.',
    'ip' => ':attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => ':attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => ':attribute muss eine gültige IPv6-Adresse sein.',
    'json' => ':attribute muss ein gültiger JSON-String sein.',
    'lt' => [
        'numeric' => ':attribute muss kleiner als :value sein.',
        'file' => ':attribute muss kleiner als :value Kilobytes sein.',
        'string' => ':attribute muss kürzer als :value Zeichen sein.',
        'array' => ':attribute muss weniger als :value Einträge haben.',
    ],
    'lte' => [
        'numeric' => ':attribute muss kleiner oder gleich :value sein.',
        'file' => ':attribute muss kleiner oder gleich :value Kilobytes sein.',
        'string' => ':attribute muss kürzer oder gleich :value Zeichen sein.',
        'array' => ':attribute darf maximal :value Einträge haben.',
    ],
    'mac_address' => ':attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'numeric' => ':attribute darf nicht größer als :max sein.',
        'file' => ':attribute darf nicht größer als :max Kilobytes sein.',
        'string' => ':attribute darf nicht länger als :max Zeichen sein.',
        'array' => ':attribute darf nicht mehr als :max Einträge haben.',
    ],
    'mimes' => ':attribute muss eine Datei des Typs :values sein.',
    'mimetypes' => ':attribute muss eine Datei des Typs :values sein.',
    'min' => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file' => ':attribute muss mindestens :min Kilobytes groß sein.',
        'string' => ':attribute muss mindestens :min Zeichen lang sein.',
        'array' => ':attribute muss mindestens :min Einträge haben.',
    ],
    'multiple_of' => ':attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :attribute ist ungültig.',
    'not_regex' => ':attribute Format ist ungültig.',
    'numeric' => ':attribute muss eine Zahl sein.',
    'password' => 'Das Passwort ist falsch.',
    'present' => ':attribute Feld muss vorhanden sein.',
    'prohibited' => ':attribute Feld ist nicht erlaubt.',
    'prohibited_if' => ':attribute Feld ist nicht erlaubt, wenn :other :value ist.',
    'prohibited_unless' => ':attribute Feld ist nicht erlaubt, es sei denn, :other ist in :values enthalten.',
    'prohibits' => ':attribute Feld verbietet :other.',
    'regex' => ':attribute Format ist ungültig.',
    'required' => ':attribute Feld wird benötigt.',
    'required_array_keys' => ':attribute Feld muss Schlüssel für :values enthalten.',
    'required_if' => ':attribute Feld wird benötigt, wenn :other :value ist.',
    'required_unless' => ':attribute Feld wird benötigt, es sei denn, :other ist in :values enthalten.',
    'required_with' => ':attribute Feld wird benötigt, wenn :values vorhanden ist.',
    'required_with_all' => ':attribute Feld wird benötigt, wenn :values vorhanden ist.',
    'required_without' => ':attribute Feld wird benötigt, wenn :values nicht vorhanden ist.',
    'required_without_all' => ':attribute Feld wird benötigt, wenn keines der :values vorhanden ist.',
    'same' => ':attribute und :other müssen übereinstimmen.',
    'size' => [
        'numeric' => ':attribute muss :size sein.',
        'file' => ':attribute muss :size Kilobytes groß sein.',
        'string' => ':attribute muss :size Zeichen lang sein.',
        'array' => ':attribute muss :size Einträge haben.',
    ],
    'starts_with' => ':attribute muss mit einem der folgenden Werte beginnen: :values',
    'string' => ':attribute muss ein Text sein.',
    'timezone' => ':attribute muss eine gültige Zeitzone sein.',
    'unique' => ':attribute ist bereits vergeben.',
    'uploaded' => ':attribute konnte nicht hochgeladen werden.',
    'url' => ':attribute Format ist ungültig.',
    'uuid' => ':attribute muss eine gültige UUID sein.',
    'duplicated_user_channel' => 'Sie können denselben Benutzer nicht zweimal dem Kanal dieses Nachrichtentyps hinzufügen.',

    /*
    |--------------------------------------------------------------------------
    | Individuelle Validierungsmeldungen
    |--------------------------------------------------------------------------
    |
    | Hier können Sie für jede Kombination von Attribut (attribute) und Regel (rule)
    | eine individuelle Fehlermeldung festlegen. Dies ist nützlich, um dem
    | Endbenutzer realistischere Texte anzuzeigen.
    |
    | Beispiel:
    | 'invalid_extension'     => 'Die Datei hat eine ungültige Erweiterung.',
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Individuelle Nachricht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Individuelle Attributnamen
    |--------------------------------------------------------------------------
    |
    | Hier können Sie Attribute wie "email" in leserliche Texte wie
    | "E-Mail-Adresse" umwandeln. Dies trägt dazu bei, dass die Fehlermeldungen
    | sauberer und verständlicher werden.
    |
    | Beispiel:
    |
    | 'email' => 'E-Mail-Adresse',
    | 'password' => 'Passwort',
    |
    */

    'attributes' => [
        'email' => 'E-Mail-Adresse',
        'password' => 'Passwort',
        'last_name' => 'Nachname',
        'first_name' => 'Vorname',
        'images' => 'Bilder',
        'image' => 'Bild',
        'images.*.id' => 'Bilder ID',
        'images.*.order' => 'Bilder Reihenfolge',
        'images.*.file' => 'Bilder Datei',
        'court_id' => 'Platz ID',
        'user_id' => 'Benutzer ID',
        'rate' => 'Bewertung',
        'comment' => 'Kommentar',
        'title' => 'Titel',
        'sport_type_id' => 'Sportart ID',
        'address' => 'Adresse',
        'address.title' => 'Adresse Titel',
        'address.zip_code' => 'Postleitzahl',
        'address.detail' => 'Adressdetails',
        'address.latitude' => 'Breitengrad',
        'address.longitude' => 'Längengrad',
        'address.neighborhood' => 'Stadtviertel',
        'address.building_number' => 'Hausnummer',
        'phone' => 'Telefon',
        'court_status_id' => 'Platzstatus ID',
        'settings' => 'Einstellungen',
        'settings.*.id' => 'Einstellungen ID',
        'settings.*.value' => 'Einstellungen Wert',
        'to_user_id' => 'An Benutzer ID',
        'team_id' => 'Team ID',
        'description' => 'Beschreibung',
        'court_reservation_pricing_ids' => 'Platzpreis IDs',
        'court_reservation_pricing_ids.*' => 'Platzpreis ID',
        'teams' => 'Teams',
        'teams.*.title' => 'Team Titel',
        'teams.*.user_ids' => 'Benutzer IDs',
        'start_date' => 'Startdatum',
        'expiring_date' => 'Ablaufdatum',
        'from_hour' => 'Startzeit',
        'to_hour' => 'Endzeit',
        'max_player' => 'Maximale Spieler',
        'min_player' => 'Minimale Spieler',
        'min_team' => 'Minimales Team',
        'max_team' => 'Maximales Team',
        'gender' => 'Geschlecht',
        'request_player_message' => 'Spieleranfrage Nachricht',
        'request_court_message' => 'Platzanfrage Nachricht',
        'match_setting_fields' => 'Match-Einstellungen',
        'match_setting_fields.*.id' => 'Einstellungen ID',
        'match_setting_fields.*.value' => 'Einstellungen Wert',
        'match_teams' => 'Match Teams',
        'match_teams.*.id' => 'Team ID',
        'match_teams.*.user_ids.*' => 'Benutzer IDs',
        'mtp_ids' => 'Match-Team-Spieler IDs',
        'match_team_players' => 'Match Team Spieler',
        'match_team_players.*.id' => 'Match-Team-Spieler ID',
        'match_team_players.*.match_team_id' => 'Match-Team ID',
        'player_court_setting_fields' => 'Spieler-Platz-Einstellungen',
        'player_court_setting_fields.*.id' => 'Einstellungen ID',
        'player_court_setting_fields.*.value' => 'Einstellungen Wert',
        'player_match_setting_fields' => 'Spieler-Match-Einstellungen',
        'player_match_setting_fields.*.id' => 'Einstellungen ID',
        'player_match_setting_fields.*.value' => 'Einstellungen Wert',
        'player_skill_fields' => 'Spieler-Fähigkeiten',
        'player_skill_fields.*.id' => 'Fähigkeiten ID',
        'player_skill_fields.*.value' => 'Fähigkeiten Wert',
        'users.*.user_id' => 'Benutzer ID',
        'request_title' => 'Anfrage Titel',
        'player_team_setting_fields' => 'Spieler-Team-Einstellungen',
        'player_team_setting_fields.*.id' => 'Einstellungen ID',
        'player_team_setting_fields.*.value' => 'Einstellungen Wert',
        'match_id' => 'Match ID',
        'status' => 'Spieler Team Anfrage Status ID',
        'team_status_id' => 'Teamstatus ID',
        'city_id' => 'Stadt ID',
        'team_setting_fields' => 'Team-Einstellungen',
        'team_setting_fields.*.id' => 'Einstellungen ID',
        'team_setting_fields.*.value' => 'Einstellungen Wert',
        'district_id' => 'Bezirk ID',
        'detail' => 'Detail',
        'longitude' => 'Längengrad',
        'latitude' => 'Breitengrad',
        'street_name' => 'Straßenname',
        'neighborhood' => 'Stadtviertel',
        'building_number' => 'Hausnummer',
        'street_name' => 'Straßenname',
        'player_setting_fields' => 'Spieler-Einstellungen',
        'player_setting_fields.*.id' => 'Einstellungen ID',
        'player_setting_fields.*.value' => 'Einstellungen Wert',
        'title_tr' => 'Titel Türkisch',
        'title_en' => 'Titel Englisch',
        'order' => 'Reihenfolge',
        'active' => 'Aktiv',
        'default_value' => 'Standardwert',
        'team_max_player' => 'Maximale Spieleranzahl im Team',
        'team_min_player' => 'Minimale Spieleranzahl im Team',
        'match_min_player' => 'Minimale Spieleranzahl im Match',
        'match_max_player' => 'Maximale Spieleranzahl im Match',
    ],


];
