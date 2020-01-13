class Class_Save_Img
{
    static function save($file_post){
        // Пути загрузки файлов
        $path = $_SERVER['DOCUMENT_ROOT']."/web/img";
        
        // Массив допустимых значений типа файла
        $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
        
        // Максимальный размер файла
        $size = 1024000;
        
        // Проверяем тип файла
        $e=$file_post['name'];

        if(!empty($e)) {
            if (!in_array($file_post['type'], $types)) {
                echo('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
                exit();
            }
            // Проверяем размер файла
            if ($file_post['size'] > $size) {
                echo('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
                exit();
            }
            // Загрузка файла и вывод сообщения
            $file_name = $file_post['name'];

            if (!@copy($file_post['tmp_name'], $path . $file_name)) {
                echo('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
                exit();
            }
            /*add to db*/
            return $file_name;
        }
        return false;
    }
}
