<?php

namespace App\Http\Controllers;

use JonnyW\PhantomJs\Client;

class HomeController extends Controller
{
    public function test()
    {
        $client = Client::getInstance();
        $client->getEngine()->setPath(base_path() . '/phantomjs');
        /**
         * @see JonnyW\PhantomJs\Http\Request
         **/
        $request = $client->getMessageFactory()->createRequest('http://weixin.sogou.com/weixin?type=1&query=%E6%96%B0%E5%8A%A0%E5%9D%A1%E7%9C%BC&ie=utf8&_sug_=n&_sug_type_=', 'GET');

        /**
         * @see JonnyW\PhantomJs\Http\Response
         **/
        $response = $client->getMessageFactory()->createResponse();

        // Send the request
        $client->send($request, $response);

        if ($response->getStatus() === 200) {

            // Dump the requested page content
            echo $response->getContent();
        }


    }
}
