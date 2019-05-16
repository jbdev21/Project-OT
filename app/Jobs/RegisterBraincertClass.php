<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\ClassSession;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RegisterBraincertClass implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $session;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ClassSession $session)
    {
        $this->session = $session;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['apikey'] = 'TwnyF7Rl6zJt0lGwDnpz';
        $data['task'] = 'schedule';
        $data['title'] = 'schedule';
        $data['timezone'] = '37';
        $data['date'] = '2018-03-16';
        $data['start_time'] = '06:00PM';
        $data['end_time'] = '06:40PM';
        $data_string = http_build_query($data);
        $ch = curl_init('https://api.braincert.com/v2');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);

        $res = json_decode($result);
        //var_dump($res);
        echo $res->error;
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('your-request-uri', [
            'form_params' => [
                'sample-form-data' => 'value'
            ]
        ]);


    }

    private function sendRequest()
    {
        $endpoint = 'https://api.braincert.com/v2';
        $data = [
            'apikey' => setting('braincert_api_key'),
            'task' => 'schedule',
            'title' => '',
            'timezone' => setting('braincert_timezone'),
            'date' => date('Y-m-d',strtotime($this->session->date_time)),
            'start_time' => date('h:iA', strtotime($this->session->date_time)),
            'end_time' => 
        ]
    }
}
