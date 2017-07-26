<?php
/**
 * Following code is largely borrowed/inspired by:
 * https://github.com/artikcloud/tutorial-php-yourFirstWebapp/blob/master/ArtikCloudProxy.php
 * ARTIK Cloud helper class that communicates to ARTIK Cloud
 * */
class ArtikCloudProxy {
    # General Configuration
    const CLIENT_ID = "24d850a7ea4d4f43951aed102c3f5a67";
    const DEVICE_ID = "e6a46a06b7234721b3a8e7ac2db6079f";
    const API_URL = "https://api.artik.cloud/v1.1";

    # API paths
    const API_USERS_SELF = "/users/self";
    const API_MESSAGES_LAST = "/messages/last?sdids=<DEVICES>&count=<COUNT>";
    const API_MESSAGES_POST = "/messages";

    # my attempt at path for getNormalizedMessages()
    const API_MESSAGES_NORM = "/messages?sdids=<DEVICES>&startDate=<SDATE>&endDate=<EDATE>";

    # Members
    public $token = null;
    public $user = null;

    public function __construct(){ }

    /**
     * Sets the access token and looks for the user profile information
     */
    public function setAccessToken($someToken){
        $this->token = $someToken;
        $this->user = $this->getUsersSelf();
    }

    /**
     * API call GET
     */
    public function getCall($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization:bearer '.$this->token));
        $json = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($status == 200){
            $response = json_decode($json);
        }
        else{
            var_dump($json);
        	$response = $json;
        }
       return $response;
    }

    /**
     * GET /users/self API
     */
    public function getUsersSelf(){
        return $this->getCall(ArtikCloudProxy::API_URL . ArtikCloudProxy::API_USERS_SELF);
    }

    /**
     * GET /historical/normalized/messages/last API
     */
    public function getMessagesLast($deviceCommaSeparatedList, $countByDevice){
        $apiPath = ArtikCloudProxy::API_MESSAGES_LAST;
        $apiPath = str_replace("<DEVICES>", $deviceCommaSeparatedList, $apiPath);
        $apiPath = str_replace("<COUNT>", $countByDevice, $apiPath);
        return $this->getCall(ArtikCloudProxy::API_URL.$apiPath);
    }

    /**
     * my attempt at writing the getNormalizedMessages() API call
     * GET /messages API
     */
    public function getHistoricalMessages($deviceCommaSeparatedList, $startDate, $endDate){
        $apiPath = ArtikCloudProxy::API_MESSAGES_NORM;
        $apiPath = str_replace("<DEVICES>", $deviceCommaSeparatedList, $apiPath);
        $apiPath = str_replace("<SDATE>", $startDate, $apiPath);
        $apiPath = str_replace("<EDATE>", $endDate, $apiPath);
        return $this->getCall(ArtikCloudProxy::API_URL.$apiPath);
    }
}
