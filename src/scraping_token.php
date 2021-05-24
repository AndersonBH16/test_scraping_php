<?php
error_reporting(0);

class ScrapingPage{
    private $url;
    private $tag_name;

    public function __construct(String $url, String $tag_name){
        $this->url = $url;
        $this->tag_name = $tag_name;
    }

    public function initCurl($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        return curl_exec($ch);
    }

    public function getToken_(){
        $responseFromCurl = $this->initCurl($this->url);
        $domPage = new DOMDocument;
        $domPage->loadHTML($responseFromCurl);
        $tags = $domPage->getElementsByTagName('input');

        for($i=0 ; $i<$tags->length ; $i++){
            $currentTag = $tags->item($i);

            if($currentTag->getAttribute('name') === $this->tag_name){
                return $currentTag->getAttribute('value');
            }
        }
    }
}

$token = (new ScrapingPage( $_POST['url'], $_POST['tag_name']))->getToken_();
echo $token;