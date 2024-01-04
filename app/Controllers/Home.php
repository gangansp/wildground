<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $client = \Config\Services::curlrequest();
        //News Pinned
        $responseNewsPin = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlepinned', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayNewsPin = json_decode($responseNewsPin->getBody(), true);

        // News Latest
        $responseNewsLatest = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlelatest', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayNewsLatest = json_decode($responseNewsLatest->getBody(), true);

        // News Category
        $responseCategory = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlecategory', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayCategory = json_decode($responseCategory->getBody(), true);

        $data = [
            'title' => 'Home',
            'response_news_pin' =>  $arrayNewsPin,
            'response_news_latest' =>  $arrayNewsLatest,
            'response_category' =>  $arrayCategory,
        ];
        echo view('home/wrapper', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('keyword');


        $client = \Config\Services::curlrequest();
        $responseSearch = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlesearch/' . $keyword, [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arraySearch = json_decode($responseSearch->getBody(), true);

        // News Category
        $responseCategory = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlecategory', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayCategory = json_decode($responseCategory->getBody(), true);

        $data = [
            'title' => 'Pencarian: ' . $keyword,
            'keyword' => $keyword,
            'response' =>  $arraySearch,
            'category' =>  $arrayCategory,

        ];
        echo view('page/wrapper', $data);
    }

    public function category()
    {
        $code = $this->request->getGet('code');
        $name = $this->request->getGet('name');

        $client = \Config\Services::curlrequest();

        $responseArticle = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlebycategory/' . $code, [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayArticle = json_decode($responseArticle->getBody(), true);

        // News Category
        $responseCategory = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlecategory', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayCategory = json_decode($responseCategory->getBody(), true);

        $data = [
            'title' => 'Category: ' . $name,
            'category_name' => $name,
            'response' =>  $arrayArticle,
            'category' =>  $arrayCategory,

        ];
        echo view('page/wrapper', $data);
    }
}
