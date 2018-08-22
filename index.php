<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 30.07.18
     * Time: 19:37
     */
    ini_set('default_charset', 'UTF-8');

    /**
     *  Путь к папке
     */
    const DIR_NAME = __DIR__ . '/datafiles';
    if (is_dir(DIR_NAME)) {
        /** @var string[] $items Полный список элементов в этой папке */
        $items = scandir(DIR_NAME, SCANDIR_SORT_ASCENDING);

        /** @var string[] $files Список файлов в этой папке */
        $files = array_filter(
            $items, function($value) {
           return is_file(DIR_NAME . DIRECTORY_SEPARATOR . $value);
        });

        /** @var string[] $result Список имен файлов, соответствующих данному шаблону */
        $result = preg_grep('/^([a-z0-9]*)\.ixt$/iu', $files);

        foreach ($result as $item) {
            echo $item . '<br />';
        }
    }