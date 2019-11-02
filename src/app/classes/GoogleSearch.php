<?php

namespace classes;

use interfaces\ImageSearch;

/**
 * Class GoogleSearch
 * @package classes
 */
class GoogleSearch implements ImageSearch
{
    /**
     * @var array|false|string
     */
    protected $key;

    /**
     * GoogleSearch constructor.
     */
    public function __construct()
    {
        $this->key = getenv('GOOGLE_API_KEY');
    }

    //https://developers.google.com/custom-search/v1/cse/list

    /**
     * @param string $searchText
     * @param int $number
     * @return string
     */
    public function getImage(string $searchText, int $number): string
    {
        $url = 'https://www.googleapis.com/customsearch/v1';
        $params['q'] = $this->codeUrl($searchText);
        $params['cx'] = '006962642290752346598:o30wrmksh4a';
        $params['key'] = $this->key;
        $params['imgSize'] = 'xxlarge';
        $params['searchType'] = 'image';
        $rand = $number;
        Application::getLog()->saveLog("Rand image: $rand");
        $params['start'] = $rand;
        $params['num'] = 1;


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

            return json_decode($out, true)['items'][0]['link'];
        }
        return false;
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
