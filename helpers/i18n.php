<?php declare(strict_types=1);
    namespace Helpers;

    class i18n
    {
        public static function get_by_language(string $language = 'en'): array
        {
            return self::get_copy_by_language_from_file($language);
        }

        protected static function get_copy_by_language_from_file(string $language = 'de'): array
        {
            if(!file_exists(ROOT_FILE . "/helpers/copy/" . $language . ".csv")) {
                return [];
            }
            $copy = [];
            $handle = fopen(ROOT_FILE . "/helpers/copy/" . $language . ".csv", "r");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $value = explode('|', $data[1]);
                $copy[$data[0]] = $value;
            }
            fclose($handle);
            return $copy;
        }
    }