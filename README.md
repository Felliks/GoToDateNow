# GoToDateNow test work

## Задача №1.
Написать класс init, от которого нельзя сделать наследника, состоящий из 3 методов:

### create() 
* доступен только для методов класса.
* создает таблицу test, содержащую 5 полей:
1) id		•	целое, автоинкрементарное
2) script_name		•	строковое, длиной 25 символов
3) start_time		•	целое
4) end_time		•	целое
5) result		•	один вариант из 'normal', 'illegal', 'failed', 'success'

### fill()
* доступен только для методов класса
* заполняет таблицу случайными данными
### get()
* доступен извне класса
* выбирает из таблицы test, данные по критерию: result среди значений 'normal' и 'success'

В конструкторе выполняются методы create и fill

Задание должно быть выполнено с обработкой исключений.
Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

## Задача №2.
Знания MySQL + оптимизировать запросы

Имеется 3 таблицы: info, data, link, есть запрос для получения данных:
```sql
select * from data,link,info where link.info_id = info.id and link.data_id = data.id
```

предложить варианты оптимизации:
* таблиц
* запроса.

Запросы для создания таблиц:

```sql
CREATE TABLE `info` (
        `id` int(11) NOT NULL auto_increment,
       `name` varchar(255) default NULL,
        `desc` text default NULL,
        PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `data` (
        `id` int(11) NOT NULL auto_increment,
        `date` date default NULL,
        `value` INT(11) default NULL,
        PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `link` (
        `data_id` int(11) NOT NULL,
        `info_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
```

## Задача №3.
Создать класс, методы которого в папке /datafiles найдут все файлы, имена которых состоят из цифр и букв латинского алфавита, имеют расширение ixt и выведет на экран имена этих файлов, упорядоченных по имени.

Задание должно быть выполнено с использованием регулярных выражений.
Весь код должен быть прокомментирован в стиле PHPDocumentor'а.