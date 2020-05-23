<?php


namespace App\Services;


class FileDbService
{
    public function saveFileFeedback(array $data)
    {
        $data = serialize($data); // Генерирует пригодное для хранения представление переменной
        // записываем в файл feedback.txt полученные данные
        return file_put_contents(storage_path('/app/db/feedback.txt'), $data, FILE_APPEND);
    }

    public function getFileFeedback()
    {
        if(file_exists(storage_path('/app/db/feedback.txt'))) {
            $data = file_get_contents(storage_path('/app/db/feedback.txt'));
            return unserialize($data);
        } else {
            return null;
        }
    }
    public function saveFileOrder(array $data)
    {
        $data = serialize($data); // Генерирует пригодное для хранения представление переменной
        // записываем в файл feedback.txt полученные данные
        return file_put_contents(storage_path('/app/db/order.txt'), $data, FILE_APPEND);
    }

    public function getFileOrder()
    {
        if(file_exists(storage_path('/app/db/order.txt'))) {
            $data = file_get_contents(storage_path('/app/db/order.txt'));
            return unserialize($data);
        } else {
            return null;
        }
    }
}
