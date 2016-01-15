<?php
/*
 * KairosEmotionAPILib
 *
 * This file was automatically generated for kairos by APIMATIC BETA v2.0 on 01/15/2016
 */

namespace KairosEmotionAPILib\Controllers;

use KairosEmotionAPILib\APIException;
use KairosEmotionAPILib\APIHelper;
use KairosEmotionAPILib\Configuration;
use KairosEmotionAPILib\CustomAuthUtility;
use Unirest\Unirest;
class EmotionAnalysisController {

    /* private fields for configuration */

    /**
     * Content Type 
     * @var string
     */
    private $contentType;

    /**
     * Application ID 
     * @var string
     */
    private $appId;

    /**
     * Application Key 
     * @var string
     */
    private $appKey;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($contentType, $appId, $appKey)
    {
        $this->contentType = $contentType ? $contentType : Configuration::$contentType;
        $this->appId = $appId ? $appId : Configuration::$appId;
        $this->appKey = $appKey ? $appKey : Configuration::$appKey;
    }

    /**
     * Create a new media object to be processed.
     * @param  string|null     $source     Optional parameter: The source URL of the media.
     * @return mixed response from the API call*/
    public function createMedia (
                $source = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/media';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'source' => $source,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Content-Type' => $this->contentType
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers);

        //append custom auth authorization headers
        CustomAuthUtility::appendCustomAuthParams($request);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Returns the results of a specific uploaded piece of media.
     * @param  string     $id     Required parameter: The id of the media you are looking for the results from.
     * @return mixed response from the API call*/
    public function getMediaById (
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/media/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id' => $id,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Content-Type' => $this->contentType
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //append custom auth authorization headers
        CustomAuthUtility::appendCustomAuthParams($request);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Delete media results. It returns the status of the operation.
     * @param  string     $id     Required parameter: The id of the media.
     * @return mixed response from the API call*/
    public function deleteMediaById (
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/media/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id' => $id,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Content-Type' => $this->contentType
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers);

        //append custom auth authorization headers
        CustomAuthUtility::appendCustomAuthParams($request);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}