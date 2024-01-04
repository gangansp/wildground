<?php

namespace App\Controllers;

class ArticleDetail extends BaseController
{

    public function index()
    {
        $id = $this->request->getGet('id');

        $client = \Config\Services::curlrequest();
        // News Category
        $responseCategory = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlecategory', [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayCategory = json_decode($responseCategory->getBody(), true);

        // Detail
        $responseDetail = $client->request('get', 'http://localhost/web-cms/public/articleapi/getdetailarticle/' . $id, [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $responseDetail = json_decode($responseDetail->getBody(), true);

        // Related
        $responseRelated = $client->request('get', 'http://localhost/web-cms/public/articleapi/getarticlebycategory/' . $responseDetail['data']['category_code'], [
            'headers' => [
                'Token' => 'LKZXDyjarFYB5qxJJf4c5eEL3slOR2q9S2s75BYKAPQO9ZlWBFOaqXpYtwAFYs7w',
            ],
        ]);
        $arrayRelated = json_decode($responseRelated->getBody(), true);

        $data = [
            'title' => $responseDetail['data']['title'],
            'response' =>  $responseDetail,
            'related' => $arrayRelated,
            'category' => $arrayCategory,

        ];
        echo view('articleDetail/wrapper', $data);
    }
}
