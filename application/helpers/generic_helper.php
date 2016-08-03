<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function check_phone($phone)
{
    $phone = preg_replace('~[^0-9]+~', '', $phone);
    // $phone = substr($phone, 2);
    if (!empty($phone) && strlen($phone) == 10) {
        return $phone;
    } else {
        return false;
    }
}

function check_email($email)
{
    if (preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) {
        return $email;
    } else {
        return false;
    }

}

function set_seo($data)
{
    $ci = get_instance();
    if (!empty($data['title'])) {
        $ci->mustache->write('title', $data['title']);
    }
    if (!empty($data['meta_keywords'])) {
        $ci->mustache->write('keywords', $data['meta_keywords']);
    }
    if (!empty($data['meta_description'])) {
        $ci->mustache->write('description', $data['meta_description']);
    }
}

function set_smm($data, $page_name = false)
{
    $ci = get_instance();
    $meta = "";
    $smm['og:type'] = 'website';
    $smm['twitter:card'] = "summary";
    $smm['og:url'] = current_url();
    if (!empty($data['title'])) {
        $smm['og:title'] = $data['title'];
        $smm['twitter:title'] = $data['title'];
    }
    if (!empty($data['description'])) {
        $smm['og:description'] = $data['description'];
        $smm['twitter:description'] = $data['description'];
    }
    if (!empty($data['image'])) {
        $smm['og:image'] = base_url() . 'uploads/' . $page_name . '/968x504/' . $data['image'];
        $smm['twitter:image'] = base_url() . 'uploads/' . $page_name . '/968x504/' . $data['image'];
    }
    foreach ($smm as $key => $value) {
        $meta .= '<meta name="' . $key . '" content="' . $value . '"/>';
    }
    $meta .= '<link rel="image_src" href="' . base_url() . 'uploads/' . $page_name . '/968x504/' . $data["image"] . '"/>';
    $ci->mustache->write('meta', $meta);

}

/**
 * Возвращает человекоприятного вида даты
 *
 * @param int $date Дата
 * @param bool $is_time - Дополнительно возвращать время
 * @param bool $transform - Преобразовывать вчерашнюю и сегодняшнюю дату
 * @return string
 */
function hr_date($date, $is_time = TRUE, $transform = TRUE)
{

    // получаем значение даты и времени
    list($day, $time) = explode(' ', $date);

    switch ($day) {
        // Если дата совпадает с сегодняшней
        case date('Y-m-d'):
            if ($transform) {
                $result = 'Today';
                break;
            }

        //Если дата совпадает со вчерашней
        case date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"))):
            if ($transform) {
                $result = 'Yesterday';
                break;
            }

        default: {
            // Разделяем отображение даты на составляющие
            list($y, $m, $d) = explode('-', $day);

            $month_str = array(
                'January', 'February', 'March',
                'April', 'May', 'June',
                "July", "August", "September",
                'October', 'November', 'December'
            );
            $month_int = array(
                '01', '02', '03',
                '04', '05', '06',
                '07', '08', '09',
                '10', '11', '12'
            );

            // Замена числового обозначения месяца на словесное (склоненное в падеже)
            $m = str_replace($month_int, $month_str, $m);
            // Формирование окончательного результата
            // $result = $d.' '.$m.' '.$y;
            $result = $m . ', ' . $d . ' ' . $y;
        }
    }
    if ($is_time) {
        // Получаем отдельные составляющие времени
        // Секунды нас не интересуют

        list($h, $m, $s) = explode(':', $time);
        $result .= ' at ' . $h . ':' . $m;
    }
    return $result;
}
/**
 * Возвращает массив коментариев с красивой датой
 *
 * @param array $arr Массив коментариев с датой
 * @return array
 */
function convert_comments_date($arr)
{
    foreach ($arr as &$item) {
        $item['created_date'] = hr_date($item['created_date']);
    }
    return $arr;
}
/**
 * Вывод данных в json
 * @param array $response Данные
 * @return bool TRUE
 */
function send_json($response)
{
    header('Content-Type: application/json');
    echo (json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    return TRUE;
}
