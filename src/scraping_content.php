<?php
error_reporting(0);

class ScrapingPage{
    private $url;
    private $tag_name;

    public function __construct(String $url, String $tag_name){
        $this->url = $url;
        $this->tag_name = $tag_name;
    }

    public function getToken($response){
        $domPage = new DOMDocument;
        $domPage->loadHTML($response);
        $tags = $domPage->getElementsByTagName('input');

        for($i=0 ; $i<$tags->length ; $i++){
            $currentTag = $tags->item($i);

            if($currentTag->getAttribute('name') === $this->tag_name){
                return $currentTag->getAttribute('value');
            }
        }
    }

    public function showContent(){
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        $response = curl_exec($ch);

//        $data = array(
//            "login_form[email]" => 'ander.bh.16@gmail.com',
//            "login_form[password]" => 'onlytestpass',
//            "login_form[_token]" => $this->getToken($response)
//        );

        $data = array(
            "__RequestVerificationToken" => $this->getToken($response),
            "ID_Usuario" => "20559807568",
            "Contrasena" => "MarcoM?JHImaT-%21",
            "btnLogin" => ""
        );

//        curl_setopt($ch, CURLOPT_URL, 'https://www.linio.com.pe/account/login_check');
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);

        return $response;
    }
}

$token = (new ScrapingPage( $_POST['url'], $_POST['tag_name']))->showContent();
echo $token;