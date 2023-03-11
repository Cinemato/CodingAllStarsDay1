<?php
    $previously = libxml_use_internal_errors(true);
    // error_reporting(E_ERROR | E_PARSE);
    // require("vendor/autoload.php");
    // use Browser\Caspr;
    // include_once('simplehtmldom/simple_html_dom.php');
    
    // // Check for blurry images
    // // Create DOM from URL or file
    
    // // Find all images
    // // foreach($html->find('img') as $element) {
    // //     if (strpos($element->src, 'blur') !== false) {
    // //         echo $element->src . "<br>";
    // //     }
    // // }
    
    // $html = file_get_html('https://ammardab3an99.github.io/');

    // $is_blur = false;
    // foreach($html->find('img') as $element) {
    //     if (strpos($element->src, 'blur') !== false) {
    //         $is_blur = true;
    //     }
    // }

    // if($is_blur === true) {
    //     echo "FAIL | Blurry Images";
    // }
   

    // $html = file_get_html('https://umair1814.github.io/');
    // foreach($html->find('title') as $element) {
    //     $result = $detect->detect($element->text(), 4);
    //     if(!array_key_exists("hindi", $result)) {
    //         $is_hindi = false;
    //     }
    //     break;
    // }

    // if(!$is_hindi) {
    //     echo "FAIL | Not Hindi";
    // }
    require("vendor/autoload.php");
    require_once('languagedetect/Text/LanguageDetect.php');
    include_once('simplehtmldom/simple_html_dom.php');
    $detect = new Text_LanguageDetect();

    $input = $_POST['links'];
    
    $links = explode (",", $input);
    foreach($links as $l) {
        echo $l . ' | ';
        $is_hindi = true;
    $url = $l;

    if(substr_compare($url, '.html', strlen($url)-strlen('.html'), strlen('.html')) === 0) {
        $url = dirname($url);
    }
    $url = rtrim($url, "/");
    $html = file_get_contents($url);

    $doc = new DOMDocument();
    $doc->loadHTML($html); //helps if html is well formed and has proper use of html entities!

    $xpath = new DOMXpath($doc);

    $nodes = $xpath->query('//a');
    $hindi_link = '';

    foreach($nodes as $node) {
        $link = $node->getAttribute('href');
        if($link === null) {
            continue;
        }
        
        if($link[0] === 'w') {
            $is_hindi = false;
            break;
        }

        if($link[0] == '/') {
            $link = $url . $link;
        }

        if(($link[1] !== 't' || $link[0] !== 'h' ) && $link[0] !== '/') {
            $link = $url . '/' . $link;
        }

        $html2 = file_get_html($link);
        foreach($html2->find('title') as $element) {
            $result = $detect->detect($element->text(), 4);
            if(!array_key_exists("hindi", $result)) {
                $is_hindi = false;
                break;
            }
        }

        if($is_hindi == false) {
            $hindi_link = $link;
            break;
        }
    }

    if($is_hindi == false) {
        echo "FAIL => Not Hindi => " . $hindi_link . '<br>';
    }
    else {
        echo "PASS" . '<br>';
    }
    }
?>