<?php
header("Content-type: text/html; charset=utf-8");

//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$i = 0;
while ($i <= 10) {
    echo $i++ . "<br>";
}

//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – это ноль.
//1 – нечетное число.
//2 – четное число.
//3 – нечетное число.
//…
//10 – четное число.

echo "<br>";

$i = 0;         // ноль бы обработать отдельно, но обрабатываю внутри цикла
do {
    if (($i % 2) == 0) {
        if ($i == 0) {
            echo $i . " - это ноль " . "<br>";
            continue;
        }
        echo $i . " - это четное число " . "<br>";
    } else {
        echo $i . " - это нечетное число " . "<br>";
    }
} while ($i++ <= 10);

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений –
// массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область … (названия городов можно найти на maps.yandex.ru)


$citiesByRegion = [
    'Адыгея Республика' => ['Адыгейск', 'Майкоп'],
    'Башкортостан Республика' => ['Агидель', 'Баймак', 'Белебей', 'Белорецк', 'Бирск', 'Благовещенск', 'Давлеканово',
        'Дюртюли', 'Ишимбай', 'Кумертау', 'Межгорье', 'Мелеуз', 'Нефтекамск', 'Октябрьский', 'Салават', 'Сибай',
        'Стерлитамак', 'Туймазы', 'Уфа', 'Учалы', 'Янаул'],
    'Бурятия Республика' => ['Бабушкин', 'Гусиноозерск', 'Закаменск', 'Кяхта', 'Северобайкальск', 'Улан-Удэ'],
    'Алтай Республика' => ['Горно-Алтайск'],
    'Дагестан Республика' => ['Буйнакск', 'Дагестанские Огни', 'Дербент', 'Избербаш', 'Каспийск', 'Кизилюрт', 'Кизляр',
        'Махачкала', 'Хасавюрт', 'Южно-Сухокумск'],
    'Ингушетия Республика' => ['Карабулак', 'Магас', 'Малгобек', 'Назрань'],
];


foreach ($citiesByRegion as $region => $cities) {
    echo "Субъект РФ: " . $region . ". Города: <br>";
    foreach ($cities as $key => $city) {
        echo(" Город $city <br/>");
    }
    echo "<br>";
}


//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие
//латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).

$translation = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'ж' => 'j',
    'з' => 'z',
    'и' => 'i',
    'й' => 'i',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'c',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'sch',
    'ь' => '',
    'ъ' => '',
    'ы' => 'i',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya',];


function translation($word, $translation)
{
    $length = strlen(utf8_decode($word));
    $newString = '';
    $word = mb_strtolower($word, 'UTF-8');
    for ($i = 0; $i < $length; $i++) {
        $letter = mb_substr($word, $i, 1, 'UTF-8');
        if (array_key_exists($letter, $translation)) {
            $newString .= $translation[$letter];
        } else {
            $newString .= $letter;
        }
    }
    return $newString;
}

echo "<br>";
$tesrWord = "Привет";
echo "Слово на русском '$tesrWord' транслитерировано так: " . translation($tesrWord, $translation);
echo "<br><br>";

//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function underscore($string)
{
    return str_replace(" ", "_", $string);
}

echo underscore("Необходимо представить пункты меню как элементы массива и вывести их циклом.");
echo "<br><br>";

//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
//Необходимо представить пункты меню как элементы массива и вывести их циклом.
//Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

$mainMenu = [
    'главная',
    'тряпки мужские' => ['брюки', 'пиджаки', 'шляпы'],
    'тряпки жеские' => [
        'платьишко' => [
            'вечернее',
            'повседневное',
        ],
        'шляпка',
    ],
    'детские тряпки' => ['чепчики', 'штанишки'],
    'контакты',
];

function buildMenu($menuArray)
{
    $submenu = "<ul>";
    foreach ($menuArray as $key => $menu) {
        if (is_array($menu)) {
            $submenu .= "<li>" . $key . buildMenu($menu) . "</li>";
        } else {
            $submenu .= "<li>" . $menu . "</li>";
        }
    }
    $submenu .= "</ul>";
    return $submenu;
}


echo buildMenu($mainMenu);

echo "<br><br>";

//7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
//for (…){ // здесь пусто}

for ($i = 0; $i < 10; (print  $i++)) { // здесь пусто
}

echo "<br><br>";

//8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
$letter = "К";
foreach ($citiesByRegion as $region => $cities) {
    echo "Субъект РФ: " . $region . ". Города на букву $letter: <br>";
    foreach ($cities as $key => $city) {
        //mb_substr($city,0,1,'UTF-8');
        if (mb_substr($city, 0, 1, 'UTF-8') == $letter) {
            echo(" Город $city <br/>");
        }
    }
    echo "<br>";
}


//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
//производит транслитерацию и замену пробелов на подчеркивания
//(аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

function makeUrl($string, $translation)
{
    $newString = '';
    $newString = translation($string, $translation);
    $newString = underscore($newString);
    return $newString;
}

echo makeUrl("Необходимо представить пункты меню", $translation);
echo "<br><br>";


/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 14.09.2018
 * Time: 18:01
 */