<?php

namespace app\models\Test;

use app\models\GoogleBase;
use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;
use Google\Client;
use Google\Service\Sheets;
use Google\Spreadsheet\Spreadsheet;

use Yii;

putenv('GOOGLE_APPLICATION_CREDENTIALS=' . YII::getAlias('@app/google-auth.json'));
class Test extends GoogleBase
{
    public function googleTest()
    {
        $client = new Client();
        $client->setClientId('109821646192509087359');
        $client->useApplicationDefaultCredentials();
        $client->setApplicationName("Client_Library_Examples");
        $client->setScopes([['https://www.googleapis.com/auth/drive', 'https://www.googleapis.com/auth/spreadsheets']]);
        $client->setAccessType('offline');
        $client->setDeveloperKey("AIzaSyDlBuCM5-sRdAHxCuTUM4L8GCfU3tb0vnA");

        $accessToken = $client->fetchAccessTokenWithAssertion()['access_token'];
        ServiceRequestFactory::setInstance(new DefaultServiceRequest($accessToken));

        $service = new Sheets($client);
        $ss1 = $service->spreadsheets->get('1cr8nsLo9dq-f1n2Tw7rG2sqnS-TtyXoF-G9qfwPRZ4M');

        $sheet = $ss1->getSheets()[0];

        var_dump($sheet);
    }
}