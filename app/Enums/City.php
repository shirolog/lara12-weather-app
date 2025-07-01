<?php 

namespace App\Enums;

enum City: string {
    case Takamatsu = 'Takamatsu';
    case Tokyo = 'Tokyo';
    case Osaka = 'Osaka';
    case Sapporo = 'Sapporo';
    case Fukuoka = 'Fukuoka';
    case Nagoya = 'Nagoya';

    public function getCordinates(): array {

        return match($this) {

            self::Takamatsu => ['latitude' => 34.3400, 'longitude' => 134.0433],
            self::Tokyo => ['latitude' => 35.6895, 'longitude' => 139.6917],
            self::Osaka => ['latitude' => 34.6937, 'longitude' => 135.5023],
            self::Sapporo => ['latitude' => 43.0621, 'longitude' => 141.3544],
            self::Fukuoka => ['latitude' => 33.5902, 'longitude' => 130.4017],
            self::Nagoya => ['latitude' => 35.1815, 'longitude' => 136.9066],
        };
    }

    public function getKanjiName(): string {

        return match($this) {
            self::Takamatsu => '高松',
            self::Tokyo => '東京',
            self::Osaka => '大阪',
            self::Sapporo => '札幌',
            self::Fukuoka => '福岡',
            self::Nagoya => '名古屋',
        };
    }

    public static function getAllCities():array {
        
        return array_map(fn($city) => [
            'english_name' => $city->value,
            'kanji_name' => $city->getKanjiName(),
        ], City::cases());
    }
    
}