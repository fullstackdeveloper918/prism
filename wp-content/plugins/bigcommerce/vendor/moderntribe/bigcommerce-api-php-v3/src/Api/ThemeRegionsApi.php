<?php
/**
 * ThemeRegionsApi
 *
 * @package  BigCommerce\Api\v3
 */

/**
 * BigCommerce API
 *
 * A Swagger Document for the BigCommmerce v3 API.
 *
 * OpenAPI spec version: 3.0.0b
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace BigCommerce\Api\v3\Api;

use \BigCommerce\Api\v3\Configuration;
use \BigCommerce\Api\v3\ApiClient;
use \BigCommerce\Api\v3\ApiException;
use \BigCommerce\Api\v3\ObjectSerializer;

class ThemeRegionsApi
{

    /**
     * API Client
     *
     * @var \BigCommerce\Api\v3\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \BigCommerce\Api\v3\ApiClient $apiClient The api client to use
     */
    public function __construct(\BigCommerce\Api\v3\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
    * Get API client
    *
    * @return \BigCommerce\Api\v3\ApiClient get the API client
    */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
    * Set the API client
    *
    * @param \BigCommerce\Api\v3\ApiClient $apiClient set the API client
    *
    * @return ThemeRegionsApi
    */
    public function setApiClient(\BigCommerce\Api\v3\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation getRegions
     * Get an ordered list of unique regions defined in a template file.
     *
     *
     * @param array $params = []
     *     - template_file string The template file, for example: &#x60;pages/home&#x60;. (required)
     * @return \BigCommerce\Api\v3\Model\ThemeRegionsResponse
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getRegions(array $params = [])
    {
        list($response) = $this->getRegionsWithHttpInfo($params);
        return $response;
    }


    /**
     * Operation getRegionsWithHttpInfo
     *
     * @see self::getRegions()
     * @param array $params = []
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \BigCommerce\Api\v3\Model\ThemeRegionsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRegionsWithHttpInfo(array $params = [])
    {
        

        // parse inputs
        $resourcePath = "/content/regions";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        foreach ( $params as $key => $param ) {
            $queryParams[ $key ] = $this->apiClient->getSerializer()->toQueryValue( $param );
        }

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\ThemeRegionsResponse',
                '/content/regions'
            );
            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\ThemeRegionsResponse', $httpHeader), $statusCode, $httpHeader];

         } catch (ApiException $e) {
            switch ($e->getCode()) {
            
                case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ThemeRegionsResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            
                case 404:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            
                case 422:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            
            }

            throw $e;
        }
    }
}