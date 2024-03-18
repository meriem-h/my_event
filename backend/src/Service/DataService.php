<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DataService
{
    private $client;
    
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function concertData(): array
    {
        
        $response = $this->client->request(
            'GET',
            'https://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=&refine.city=Paris&refine.category=concert&timezone=Europe%2Fparis'
            
        );

        $data_content = [];
        // $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();

        return ([
            "concert" => $content
        ]);
    }

    public function danseData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=&refine.city=Paris&refine.category=danse&timezone=Europe%2Fparis'
            
        );

        $data_content = [];
        $content = $response->getContent();

        return ([
            "danse" => $content
        ]);
    }

    public function expoData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=&rows=20&facet=tags&refine.tags=mus%C3%A9e&refine.tags=%C3%A9v%C3%A9nement&refine.tags=exposition&refine.category=conference&timezone=Europe%2Fparis'
            
        );

        $data_content = [];
        $content = $response->getContent();

        return ([
            "donnees" => $content
        ]);
    }
}
