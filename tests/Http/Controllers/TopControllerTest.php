<?php

class TopControllerTest extends TestCase
{
    public function testTopAnime()
    {
        $this->get('/v3/top/anime')
            ->seeStatusCode(200)
            ->seeJsonStructure([
                'top' => [
                    [
                        'mal_id',
                        'rank',
                        'title',
                        'url',
                        'image_url',
                        'type',
                        'start_date',
                        'end_date',
                        'members',
                        'score',
                    ]
                ]
            ]);
    }

    public function testTopManga()
    {
        $this->get('/v3/top/manga')
            ->seeStatusCode(200)
            ->seeJsonStructure([
                'top' => [
                    [
                        'mal_id',
                        'rank',
                        'title',
                        'url',
                        'type',
                        'volumes',
                        'start_date',
                        'end_date',
                        'members',
                        'score',
                        'image_url',
                    ]
                ]
            ]);
    }

    public function testTopPeople()
    {
        $this->get('/v3/top/people')
            ->seeStatusCode(200)
            ->seeJsonStructure([
                'top' => [
                    [
                        'mal_id',
                        'rank',
                        'title', // todo should be `name`
                        'url',
                        'name_kanji',
                        'favorites',
                        'image_url',
                        'birthday',
                    ]
                ]
            ]);
    }

    public function testTopCharacters()
    {
        $this->get('/v3/top/people')
            ->seeStatusCode(200)
            ->seeJsonStructure([
                'top' => [
                    [
                        'mal_id',
                        'rank',
                        'title', // todo should be `name`
                        'url',
                        'name_kanji',
                        'favorites',
                        'image_url',
                        'animeography' => [
                            [
                                'mal_id',
                                'type',
                                'name',
                                'url'
                            ]
                        ],
                        'mangaography' => [
                            [
                                'mal_id',
                                'type',
                                'name',
                                'url'
                            ]
                        ],
                    ]
                ]
            ]);
    }

    public function test404()
    {
        $this->get('/v3/top/anime/999')
            ->seeStatusCode(404);
    }
}
