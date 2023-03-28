<?php declare(strict_types=1);
    namespace Helpers;

    class i18n
    {
        public function __construct(string $language = 'en')
        {
            $copy = static::get_copy_by_language_from_json_file($language);
            if(!$copy) {
                echo 'failed to read file';
                exit();
            }
            foreach($copy as $label => $text) {
                $this->$label = $text;
            }
        }

        public function get_copy(string $label): string
        {
            return $this->$label ?? 'LABEL MISSING';
        }

        public static function get_by_language(string $language = 'en'): array
        {
//            return self::get_copy_by_language_from_csv_file($language);
            return self::get_copy_by_language_from_json_file($language);
        }

        protected static function get_copy_by_language_from_csv_file(string $language = 'de'): array
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

        protected static function get_copy_by_language_from_json_file(string $language = 'de'): array
        {
            if(!file_exists(ROOT_FILE . "/helpers/copy/" . $language . ".json")) {
                return [];
            }
            $json = file_get_contents(ROOT_FILE . "/helpers/copy/" . $language . ".json");
            return json_decode($json, true);
        }
    }