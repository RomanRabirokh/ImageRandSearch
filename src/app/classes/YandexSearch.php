<?php


namespace classes;

use interfaces\ImageSearch;

/**
 * Class YandexSearch
 * @package classes
 */
class YandexSearch implements ImageSearch
{


    /**
     * @param string $searchText
     * @param int $number
     * @return string
     */
    public function getImage(string $searchText, int $number): string
    {

        $url= 'https://yandex.ua/images/search';
        $params['text'] = $this->codeUrl($searchText);
        $params['size']= 'large';
        // без защиты
        $params['ncrnd']='0.143474640968911';

        var_dump($url. $this->parseUrl($params));
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $url . $this->parseUrl($params));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $out = curl_exec($curl);

            if ($errno = curl_errno($curl)) {
                $error_message = curl_strerror($errno);
                Application::getLogErrors()->saveLog("cURL error ({$errno}):\n {$error_message}");
                echo "cURL error ({$errno}):\n {$error_message}";
            }
            curl_close($curl);

            //return json_decode($out, true)['items'][0]['link'];
        }
        file_put_contents('site.html', $out);
        die;
    }

    /**
     * @param $text
     * @return string
     */
    protected function codeUrl($text)
    {
        return urlencode($text);
    }


    /**
     * @param $params
     * @return string
     */
    protected function parseUrl($params)
    {
        $str = '';
        foreach ($params as $key => $param) {
            if (empty($str)) {
                $str .= "?$key=$param";
            } else {
                $str .= "&$key=$param";
            }
        }
        return $str;
    }
}
