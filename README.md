# ImageRandSearch


## English

The script allows you to get a random picture from Internet search engines from a list of names and synonyms for it and saves it in a directory.

### Launch
To start, you need to run the index.php script and set the necessary file settings

### Settings

#### env file

**GOOGLE_API_KEY** special key for the ability to use Google Image Search

**FILE_NAMES** file with a list of words, which should be random
**FILE_SIGNS** file with a list of second words

**FILE_LOGS** file for logs
FILE_LOGS_ERRORS file for errors

**FILE_ACCESS** empty file to store the request date, to block 1 request per day

## Russian

Скрипт позволяет из списка названий  и синонимов к ним, получать случайную  картинку из поисковиков интернета и сохраняет ее в каталог.

### Запуск
Для запуска нужно запустить скрипт index.php и установить нужные настройки файлов

### Настройки

#### Файл env

**GOOGLE_API_KEY** специальный ключ, для возможности пользоваться поиском google image

**FILE_NAMES** файл со списком слов по которым будет производится случайная выборка и поиск картинки, слова должны быть с новой строки
**FILE_SIGNS** файл со списком вторых слов, которые будут добавляется к первому слову

**FILE_LOGS** файл для логов
FILE_LOGS_ERRORS файл для ошибок

**FILE_ACCESS** пустой файл для хранения даты запроса, для блокировки 1 запрос в день

