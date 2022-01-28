<?php

/**
 * The Webshopapp Api Client Class
 */
class WebshopappApiClient
{
    /**
     * The Api Client version (do not change!)
     */
    const CLIENT_VERSION = '1.9.1';
    /**
     * The Api Hosts (do not change!)
     */
    const SERVER_HOST_LOCAL = 'https://api.webshopapp.dev/';
    const SERVER_HOST_LIVE  = 'https://api.webshopapp.com/';
    const SERVER_EU1_LIVE   = 'https://api.webshopapp.com/';
    const SERVER_US1_LIVE   = 'https://api.shoplightspeed.com/';

    /**
     * @var string|null
     */
    private $apiServer = null;

    /**
     * @var string|null
     */
    private $apiKey = null;

    /**
     * @var string|null
     */
    private $apiSecret = null;

    /**
     * @var string|null
     */
    private $apiLanguage = null;

    /**
     * @var int
     */
    private $apiCallsMade = 0;

    /**
     * @var array
     */
    private $responseHeaders = [];

    /**
     * @var WebshopappApiResourceAccount
     */
    public $account;

    /**
     * @var WebshopappApiResourceAccountMetafields
     */
    public $accountMetafields;

    /**
     * @var WebshopappApiResourceAccountPermissions
     */
    public $accountPermissions;

    /**
     * @var WebshopappApiResourceAccountRatelimit
     */
    public $accountRatelimit;

    /**
     * @var WebshopappApiResourceAdditionalcosts
     */
    public $additionalcosts;

    /**
     * @var WebshopappApiResourceAttributes
     */
    public $attributes;

    /**
     * @var WebshopappApiResourceBlogs
     */
    public $blogs;

    /**
     * @var WebshopappApiResourceBlogsArticles
     */
    public $blogsArticles;

    /**
     * @var WebshopappApiResourceBlogsArticlesImage
     */
    public $blogsArticlesImage;

    /**
     * @var WebshopappApiResourceBlogsArticlesTags
     */
    public $blogsArticlesTags;

    /**
     * @var WebshopappApiResourceBlogsComments
     */
    public $blogsComments;

    /**
     * @var WebshopappApiResourceBlogsTags
     */
    public $blogsTags;

    /**
     * @var WebshopappApiResourceBrands
     */
    public $brands;

    /**
     * @var WebshopappApiResourceBrandsImage
     */
    public $brandsImage;

    /**
     * @var WebshopappApiResourceCatalog
     */
    public $catalog;

    /**
     * @var WebshopappApiResourceCategories
     */
    public $categories;

    /**
     * @var WebshopappApiResourceCategoriesImage
     */
    public $categoriesImage;

    /**
     * @var WebshopappApiResourceCategoriesProducts
     */
    public $categoriesProducts;

    /**
     * @var WebshopappApiResourceCategoriesProductsBulk
     */
    public $categoriesProductsBulk;

    /**
     * @var WebshopappApiResourceCheckouts
     */
    public $checkouts;

    /**
     * @var WebshopappApiResourceCheckoutsOrder
     */
    public $checkoutsOrder;

    /**
     * @var WebshopappApiResourceCheckoutsPayment_methods
     */
    public $checkoutsPayment_methods;

    /**
     * @var WebshopappApiResourceCheckoutsProducts
     */
    public $checkoutsProducts;

    /**
     * @var WebshopappApiResourceCheckoutsShipment_methods
     */
    public $checkoutsShipment_methods;

    /**
     * @var WebshopappApiResourceCheckoutsValidate
     */
    public $checkoutsValidate;

    /**
     * @var WebshopappApiResourceContacts
     */
    public $contacts;

    /**
     * @var WebshopappApiResourceCountries
     */
    public $countries;

    /**
     * @var WebshopappApiResourceCustomers
     */
    public $customers;

    /**
     * @var WebshopappApiResourceCustomersLogin
     */
    public $customersLogin;

    /**
     * @var WebshopappApiResourceCustomersMetafields
     */
    public $customersMetafields;

    /**
     * @var WebshopappApiResourceCustomersTokens
     */
    public $customersTokens;

    /**
     * @var WebshopappApiResourceDashboard
     */
    public $dashboard;

    /**
     * @var WebshopappApiResourceDeliverydates
     */
    public $deliverydates;

    /**
     * @var WebshopappApiResourceDiscountrules
     */
    public $discountrules;

    /**
     * @var WebshopappApiResourceDiscounts
     */
    public $discounts;

    /**
     * @var WebshopappApiResourceEvents
     */
    public $events;

    /**
     * @var WebshopappApiResourceExternal_services
     */
    public $external_services;

    /**
     * @var WebshopappApiResourceFiles
     */
    public $files;

    /**
     * @var WebshopappApiResourceFilters
     */
    public $filters;

    /**
     * @var WebshopappApiResourceFiltersValues
     */
    public $filtersValues;

    /**
     * @var WebshopappApiResourceGroups
     */
    public $groups;

    /**
     * @var WebshopappApiResourceGroupsCustomers
     */
    public $groupsCustomers;

    /**
     * @var WebshopappApiResourceInvoices
     */
    public $invoices;

    /**
     * @var WebshopappApiResourceInvoicesItems
     */
    public $invoicesItems;

    /**
     * @var WebshopappApiResourceInvoicesMetafields
     */
    public $invoicesMetafields;

    /**
     * @var WebshopappApiResourceLanguages
     */
    public $languages;

    /**
     * @var WebshopappApiResourceLocations
     */
    public $locations;

    /**
     * @var WebshopappApiResourceMetafields
     */
    public $metafields;

    /**
     * @var WebshopappApiResourceOrders
     */
    public $orders;

    /**
     * @var WebshopappApiResourceOrdersCredit
     */
    public $ordersCredit;

    /**
     * @var WebshopappApiResourceOrdersMetafields
     */
    public $ordersMetafields;

    /**
     * @var WebshopappApiResourceOrdersProducts
     */
    public $ordersProducts;

    /**
     * @var WebshopappApiResourceOrdersCustomstatuses
     */
    public $ordersCustomstatuses;

    /**
     * @var WebshopappApiResourceOrdersEvents
     */
    public $ordersEvents;

    /**
     * @var WebshopappApiResourcePaymentmethods
     */
    public $paymentMethods;

    /**
     * @var WebshopappApiResourceProducts
     */
    public $products;
    /**
     * @var WebshopappApiResourceProductsAttributes
     */
    public $productsAttributes;

    /**
     * @var WebshopappApiResourceProductsFiltervalues
     */
    public $productsFilterValues;

    /**
     * @var WebshopappApiResourceProductsImages
     */
    public $productsImages;

    /**
     * @var WebshopappApiResourceProductsMetafields
     */
    public $productsMetaFields;

    /**
     * @var WebshopappApiResourceProductsRelations
     */
    public $productsRelations;

    /**
     * @var WebshopappApiResourceQuotes
     */
    public $quotes;

    /**
     * @var WebshopappApiResourceQuotesConvert
     */
    public $quotesConvert;

    /**
     * @var WebshopappApiResourceQuotesPaymentmethods
     */
    public $quotesPaymentMethods;

    /**
     * @var WebshopappApiResourceQuotesProducts
     */
    public $quotesProducts;

    /**
     * @var WebshopappApiResourceQuotesShippingmethods
     */
    public $quotesShippingMethods;

    /**
     * @var WebshopappApiResourceRedirects
     */
    public $redirects;

    /**
     * @var WebshopappApiResourceReturns
     */
    public $returns;

    /**
     * @var WebshopappApiResourceReviews
     */
    public $reviews;

    /**
     * @var WebshopappApiResourceSets
     */
    public $sets;

    /**
     * @var WebshopappApiResourceShipments
     */
    public $shipments;

    /**
     * @var WebshopappApiResourceShipmentsMetafields
     */
    public $shipmentsMetaFields;

    /**
     * @var WebshopappApiResourceShipmentsProducts
     */
    public $shipmentsProducts;

    /**
     * @var WebshopappApiResourceShippingmethods
     */
    public $shippingMethods;

    /**
     * @var WebshopappApiResourceShippingmethodsCountries
     */
    public $shippingMethodsCountries;

    /**
     * @var WebshopappApiResourceShippingmethodsValues
     */
    public $shippingMethodsValues;

    /**
     * @var WebshopappApiResourceShop
     */
    public $shop;

    /**
     * @var WebshopappApiResourceShopCompany
     */
    public $shopCompany;

    /**
     * @var WebshopappApiResourceShopJavascript
     */
    public $shopJavascript;

    /**
     * @var WebshopappApiResourceShopLimits
     */
    public $shopLimits;

    /**
     * @var WebshopappApiResourceShopMetafields
     */
    public $shopMetaFields;

    /**
     * @var WebshopappApiResourceShopScripts
     */
    public $shopScripts;

    /**
     * @var WebshopappApiResourceShopSettings
     */
    public $shopSettings;

    /**
     * @var WebshopappApiResourceShopTracking
     */
    public $shopTracking;

    /**
     * @var WebshopappApiResourceShopWebsite
     */
    public $shopWebsite;

    /**
     * @var WebshopappApiResourceSubscriptions
     */
    public $subscriptions;

    /**
     * @var WebshopappApiResourceSuppliers
     */
    public $suppliers;

    /**
     * @var WebshopappApiResourceTags
     */
    public $tags;

    /**
     * @var WebshopappApiResourceTagsProducts
     */
    public $tagsProducts;

    /**
     * @var WebshopappApiResourceTaxes
     */
    public $taxes;

    /**
     * @var WebshopappApiResourceTaxesOverrides
     */
    public $taxesOverrides;

    /**
     * @var WebshopappApiResourceTextpages
     */
    public $textPages;

    /**
     * @var WebshopappApiResourceThemeCategories
     */
    public $themeCategories;

    /**
     * @var WebshopappApiResourceThemeProducts
     */
    public $themeProducts;

    /**
     * @var WebshopappApiResourceTickets
     */
    public $tickets;

    /**
     * @var WebshopappApiResourceTicketsMessages
     */
    public $ticketsMessages;

    /**
     * @var WebshopappApiResourceTime
     */
    public $time;

    /**
     * @var WebshopappApiResourceTypes
     */
    public $types;

    /**
     * @var WebshopappApiResourceTypesAttributes
     */
    public $typesAttributes;

    /**
     * @var WebshopappApiResourceVariants
     */
    public $variants;

    /**
     * @var WebshopappApiResourceVariantsImage
     */
    public $variantsImage;

    /**
     * @var WebshopappApiResourceVariantsMetafields
     */
    public $variantsMetaFields;

    /**
     * @var WebshopappApiResourceVariantsBulk
     */
    public $variantsBulk;

    /**
     * @var WebshopappApiResourceVariantsMovements
     */
    public $variantsMovements;

    /**
     * @var WebshopappApiResourceWebhooks
     */
    public $webhooks;

    /**
     * @param string|null $apiServer
     * @param string|null $apiKey
     * @param string|null $apiSecret
     * @param string|null $apiLanguage
     * @throws WebshopappApiException
     */
    public function __construct(?string $apiServer, ?string $apiKey, ?string $apiSecret, ?string $apiLanguage)
    {
        if (!function_exists('curl_init'))
        {
            throw new WebshopAppApiException('WebshopappApiClient needs the CURL PHP extension.');
        }
        if (!function_exists('json_decode'))
        {
            throw new WebshopAppApiException('WebshopappApiClient needs the JSON PHP extension.');
        }

        $this->setApiServer($apiServer);
        $this->setApiKey($apiKey);
        $this->setApiSecret($apiSecret);
        $this->setApiLanguage($apiLanguage);

        $this->registerResources();
    }

    /**
     * @return string
     */
    public function getApiLanguage(): ?string
    {
        return $this->apiLanguage;
    }

    /**
     * @param string|null $apiServer
     */
    public function setApiServer(?string $apiServer)
    {
        $this->apiServer = $apiServer;
    }

    /**
     * @param string|null $apiKey
     */
    public function setApiKey(?string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @param string|null $apiSecret
     */
    public function setApiSecret(?string $apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return string
     */
    public function getApiSecret(): ?string
    {
        return $this->apiSecret;
    }

    /**
     * @param string|null $apiLanguage
     */
    public function setApiLanguage(?string $apiLanguage)
    {
        $this->apiLanguage = $apiLanguage;
    }

    /**
     * @return string
     */
    public function getApiServer(): ?string
    {
        return $this->apiServer;
    }

    /**
     * @return int
     */
    public function getApiCallsMade(): int
    {
        return $this->apiCallsMade;
    }

    /**
     * @param array $responseHeaders
     *
     * @return void
     */
    public function setResponseHeaders(array $responseHeaders): void
    {
        $this->responseHeaders = $responseHeaders;
    }

    /**
     * @return array
     */
    public function getResponseHeaders(): array
    {
        return $this->responseHeaders;
    }

    /**
     * @throws WebshopappApiException
     */
    private function checkLoginCredentials(): void
    {
        if (strlen($this->getApiKey()) !== 32 || strlen($this->getApiSecret()) !== 32)
        {
            throw new WebshopappApiException('Invalid login credentials.');
        }
        if (strlen($this->getApiLanguage()) !== 2)
        {
            throw new WebshopappApiException('Invalid API language.');
        }
    }

    private function registerResources(): void
    {
        $this->account                   = new WebshopappApiResourceAccount($this);
        $this->accountMetafields         = new WebshopappApiResourceAccountMetafields($this);
        $this->accountPermissions        = new WebshopappApiResourceAccountPermissions($this);
        $this->accountRatelimit          = new WebshopappApiResourceAccountRatelimit($this);
        $this->additionalcosts           = new WebshopappApiResourceAdditionalcosts($this);
        $this->attributes                = new WebshopappApiResourceAttributes($this);
        $this->blogs                     = new WebshopappApiResourceBlogs($this);
        $this->blogsArticles             = new WebshopappApiResourceBlogsArticles($this);
        $this->blogsArticlesImage        = new WebshopappApiResourceBlogsArticlesImage($this);
        $this->blogsArticlesTags         = new WebshopappApiResourceBlogsArticlesTags($this);
        $this->blogsComments             = new WebshopappApiResourceBlogsComments($this);
        $this->blogsTags                 = new WebshopappApiResourceBlogsTags($this);
        $this->brands                    = new WebshopappApiResourceBrands($this);
        $this->brandsImage               = new WebshopappApiResourceBrandsImage($this);
        $this->catalog                   = new WebshopappApiResourceCatalog($this);
        $this->categories                = new WebshopappApiResourceCategories($this);
        $this->categoriesImage           = new WebshopappApiResourceCategoriesImage($this);
        $this->categoriesProducts        = new WebshopappApiResourceCategoriesProducts($this);
        $this->categoriesProductsBulk    = new WebshopappApiResourceCategoriesProductsBulk($this);
        $this->checkouts                 = new WebshopappApiResourceCheckouts($this);
        $this->checkoutsOrder            = new WebshopappApiResourceCheckoutsOrder($this);
        $this->checkoutsPayment_methods  = new WebshopappApiResourceCheckoutsPayment_methods($this);
        $this->checkoutsProducts         = new WebshopappApiResourceCheckoutsProducts($this);
        $this->checkoutsShipment_methods = new WebshopappApiResourceCheckoutsShipment_methods($this);
        $this->checkoutsValidate         = new WebshopappApiResourceCheckoutsValidate($this);
        $this->contacts                  = new WebshopappApiResourceContacts($this);
        $this->countries                 = new WebshopappApiResourceCountries($this);
        $this->customers                 = new WebshopappApiResourceCustomers($this);
        $this->customersLogin            = new WebshopappApiResourceCustomersLogin($this);
        $this->customersMetafields       = new WebshopappApiResourceCustomersMetafields($this);
        $this->customersTokens           = new WebshopappApiResourceCustomersTokens($this);
        $this->dashboard                 = new WebshopappApiResourceDashboard($this);
        $this->deliverydates             = new WebshopappApiResourceDeliverydates($this);
        $this->discountrules             = new WebshopappApiResourceDiscountrules($this);
        $this->discounts                 = new WebshopappApiResourceDiscounts($this);
        $this->events                    = new WebshopappApiResourceEvents($this);
        $this->external_services         = new WebshopappApiResourceExternal_services($this);
        $this->files                     = new WebshopappApiResourceFiles($this);
        $this->filters                   = new WebshopappApiResourceFilters($this);
        $this->filtersValues             = new WebshopappApiResourceFiltersValues($this);
        $this->groups                    = new WebshopappApiResourceGroups($this);
        $this->groupsCustomers           = new WebshopappApiResourceGroupsCustomers($this);
        $this->invoices                  = new WebshopappApiResourceInvoices($this);
        $this->invoicesItems             = new WebshopappApiResourceInvoicesItems($this);
        $this->invoicesMetafields        = new WebshopappApiResourceInvoicesMetafields($this);
        $this->languages                 = new WebshopappApiResourceLanguages($this);
        $this->locations                 = new WebshopappApiResourceLocations($this);
        $this->metafields                = new WebshopappApiResourceMetafields($this);
        $this->orders                    = new WebshopappApiResourceOrders($this);
        $this->ordersCredit              = new WebshopappApiResourceOrdersCredit($this);
        $this->ordersMetafields          = new WebshopappApiResourceOrdersMetafields($this);
        $this->ordersProducts            = new WebshopappApiResourceOrdersProducts($this);
        $this->ordersCustomstatuses      = new WebshopappApiResourceOrdersCustomstatuses($this);
        $this->ordersEvents              = new WebshopappApiResourceOrdersEvents($this);
        $this->paymentMethods            = new WebshopappApiResourcePaymentmethods($this);
        $this->products                  = new WebshopappApiResourceProducts($this);
        $this->productsAttributes        = new WebshopappApiResourceProductsAttributes($this);
        $this->productsFilterValues      = new WebshopappApiResourceProductsFiltervalues($this);
        $this->productsImages            = new WebshopappApiResourceProductsImages($this);
        $this->productsMetaFields        = new WebshopappApiResourceProductsMetafields($this);
        $this->productsRelations         = new WebshopappApiResourceProductsRelations($this);
        $this->quotes                    = new WebshopappApiResourceQuotes($this);
        $this->quotesConvert             = new WebshopappApiResourceQuotesConvert($this);
        $this->quotesPaymentMethods      = new WebshopappApiResourceQuotesPaymentmethods($this);
        $this->quotesProducts            = new WebshopappApiResourceQuotesProducts($this);
        $this->quotesShippingMethods     = new WebshopappApiResourceQuotesShippingmethods($this);
        $this->redirects                 = new WebshopappApiResourceRedirects($this);
        $this->returns                   = new WebshopappApiResourceReturns($this);
        $this->reviews                   = new WebshopappApiResourceReviews($this);
        $this->sets                      = new WebshopappApiResourceSets($this);
        $this->shipments                 = new WebshopappApiResourceShipments($this);
        $this->shipmentsMetaFields       = new WebshopappApiResourceShipmentsMetafields($this);
        $this->shipmentsProducts         = new WebshopappApiResourceShipmentsProducts($this);
        $this->shippingMethods           = new WebshopappApiResourceShippingmethods($this);
        $this->shippingMethodsCountries  = new WebshopappApiResourceShippingmethodsCountries($this);
        $this->shippingMethodsValues     = new WebshopappApiResourceShippingmethodsValues($this);
        $this->shop                      = new WebshopappApiResourceShop($this);
        $this->shopCompany               = new WebshopappApiResourceShopCompany($this);
        $this->shopJavascript            = new WebshopappApiResourceShopJavascript($this);
        $this->shopLimits                = new WebshopappApiResourceShopLimits($this);
        $this->shopMetaFields            = new WebshopappApiResourceShopMetafields($this);
        $this->shopScripts               = new WebshopappApiResourceShopScripts($this);
        $this->shopSettings              = new WebshopappApiResourceShopSettings($this);
        $this->shopTracking              = new WebshopappApiResourceShopTracking($this);
        $this->shopWebsite               = new WebshopappApiResourceShopWebsite($this);
        $this->subscriptions             = new WebshopappApiResourceSubscriptions($this);
        $this->suppliers                 = new WebshopappApiResourceSuppliers($this);
        $this->tags                      = new WebshopappApiResourceTags($this);
        $this->tagsProducts              = new WebshopappApiResourceTagsProducts($this);
        $this->taxes                     = new WebshopappApiResourceTaxes($this);
        $this->taxesOverrides            = new WebshopappApiResourceTaxesOverrides($this);
        $this->textPages                 = new WebshopappApiResourceTextpages($this);
        $this->themeCategories           = new WebshopappApiResourceThemeCategories($this);
        $this->themeProducts             = new WebshopappApiResourceThemeProducts($this);
        $this->tickets                   = new WebshopappApiResourceTickets($this);
        $this->ticketsMessages           = new WebshopappApiResourceTicketsMessages($this);
        $this->time                      = new WebshopappApiResourceTime($this);
        $this->types                     = new WebshopappApiResourceTypes($this);
        $this->typesAttributes           = new WebshopappApiResourceTypesAttributes($this);
        $this->variants                  = new WebshopappApiResourceVariants($this);
        $this->variantsImage             = new WebshopappApiResourceVariantsImage($this);
        $this->variantsMetaFields        = new WebshopappApiResourceVariantsMetafields($this);
        $this->variantsBulk              = new WebshopappApiResourceVariantsBulk($this);
        $this->variantsMovements         = new WebshopappApiResourceVariantsMovements($this);
        $this->webhooks                  = new WebshopappApiResourceWebhooks($this);
    }

    /**
     * @param string $resourceUrl
     * @param array|null $params
     *
     * @return string
     */
    private function getUrl(string $resourceUrl, array $params = null): string
    {
        switch ($this->apiServer) {
            case 'live':
                $apiHost = self::SERVER_HOST_LIVE;
                break;
            case 'eu1':
                $apiHost = self::SERVER_EU1_LIVE;
                break;
            case 'us1':
                $apiHost = self::SERVER_US1_LIVE;
                break;
            case 'local':
            default:
                $apiHost = self::SERVER_HOST_LOCAL;
                break;
        }

        $apiHostParts     = parse_url($apiHost);
        $resourceUrlParts = parse_url($resourceUrl);

        $apiUrl = $apiHostParts['scheme'] . '://' . $this->getApiKey() . ':' . $this->getApiSecret() . '@' . $apiHostParts['host'] . '/';
        if (isset($apiHostParts['path']) && strlen(trim($apiHostParts['path'], '/')))
        {
            $apiUrl .= trim($apiHostParts['path'], '/') . '/';
        }
        $apiUrl .= $this->getApiLanguage() . '/' . $resourceUrlParts['path'] . '.json';

        if (isset($resourceUrlParts['query']))
        {
            $apiUrl .= '?' . $resourceUrlParts['query'];
        }
        elseif ($params && is_array($params))
        {
            $queryParameters = [];

            foreach ($params as $key => $value)
            {
                if (!is_array($value))
                {
                    $queryParameters[] = $key . '=' . urlencode($value);
                }
            }

            $queryParameters = implode('&', $queryParameters);

            if (!empty($queryParameters))
            {
                $apiUrl .= '?' . $queryParameters;
            }
        }

        return $apiUrl;
    }

    /**
     * Invoke the Webshopapp API.
     *
     * @param string $url The resource url (required)
     * @param string $method The http method (default 'get')
     * @param array|null $payload The query/post data
     * @param array $options
     * @return mixed The decoded response object
     * @throws WebshopappApiException
     */
    private function sendRequest(string $url, string $method, array $payload = null, array $options = [])
    {
        $this->checkLoginCredentials();

        if ($method == 'post' || $method == 'put')
        {
            if (!$payload || !is_array($payload))
            {
                throw new WebshopAppApiException(100, 'Invalid payload');
            }

            $multipart = array_key_exists('header', $options);

            $header = $multipart ? $options['header'] : 'application/json';

            $curlOptions = array(
                CURLOPT_URL           => $this->getUrl($url),
                CURLOPT_CUSTOMREQUEST => strtoupper($method),
                CURLOPT_HTTPHEADER    => array('Content-Type: ' . $header),
                CURLOPT_POST          => true,
                CURLOPT_POSTFIELDS    => $multipart ? $payload : json_encode($payload),
            );
        }
        elseif ($method == 'delete')
        {
            $curlOptions = array(
                CURLOPT_URL           => $this->getUrl($url),
                CURLOPT_CUSTOMREQUEST => 'DELETE',
            );
        }
        else
        {
            $curlOptions = array(
                CURLOPT_URL => $this->getUrl($url, $payload),
            );
        }

        $curlOptions += array(
            CURLOPT_HEADER         => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'WebshopappApiClient/' . self::CLIENT_VERSION . ' (PHP/' . phpversion() . ')',
            CURLOPT_SSLVERSION     => 6,
        );

        $curlHandle = curl_init();

        curl_setopt_array($curlHandle, $curlOptions);

        $headers = [];

        curl_setopt($curlHandle, CURLOPT_HEADERFUNCTION, function($curl, $header) use (&$headers) {
            $length = strlen($header);
            $header = explode(':', $header, 2);

            if (count($header) <= 1) {
                return $length;
            }

            $header              = array_map('trim', $header);
            $headers[$header[0]] = $header[1];

            return $length;
        });

        $responseBody = curl_exec($curlHandle);

        if ($headers) {
            $this->setResponseHeaders($headers);
        }

        if (curl_errno($curlHandle))
        {
            $this->handleCurlError($curlHandle);
        }

        $responseBody = json_decode($responseBody, true);
        $responseCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

        curl_close($curlHandle);

        $this->apiCallsMade ++;

        if ($responseCode < 200 || $responseCode > 299 || ($responseBody && array_key_exists('error', $responseBody)))
        {
            $this->handleResponseError($responseCode, $responseBody);
        }

        if ($responseBody && preg_match('/^checkout/i', $url) !== 1)
        {
            $responseBody = array_shift($responseBody);
        }

        return $responseBody;
    }

    /**
     * @param int   $responseCode
     * @param array $responseBody
     *
     * @throws WebshopappApiException
     */
    private function handleResponseError(int $responseCode, array $responseBody)
    {
        $errorMessage = 'Unknown error: ' . $responseCode;

        if ($responseBody && array_key_exists('error', $responseBody))
        {
            $errorMessage = $responseBody['error']['message'];
        }

        throw new WebshopappApiException($errorMessage, $responseCode);
    }

    /**
     * @param resource $curlHandle
     *
     * @throws WebshopappApiException
     */
    private function handleCurlError($curlHandle)
    {
        $errorMessage = 'Curl error: ' . curl_error($curlHandle);

        throw new WebshopappApiException($errorMessage, curl_errno($curlHandle));
    }

    /**
     * @param string $url
     * @param array  $payload
     * @param array  $options
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(string $url, array $payload, array $options = []): array
    {
        return $this->sendRequest($url, 'post', $payload, $options);
    }

    /**
     * @param string $url
     * @param array  $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function read(string $url, array $params = []): array
    {
        return $this->sendRequest($url, 'get', $params);
    }

    /**
     * @param string $url
     * @param array  $payload
     * @param array  $options
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(string $url, array $payload, array $options = []): array
    {
        return $this->sendRequest($url, 'put', $payload, $options);
    }

    /**
     * @param string $url
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(string $url): array
    {
        return $this->sendRequest($url, 'delete');
    }

    /**
     * @param string $url
     * @param array $params
     * @return int
     * @throws WebshopappApiException
     */
    public function getCount(string $url, array $params = []): int
    {
        $response = $this->read($url, $params);

        return $response['count'];
    }
}

class WebshopappApiException extends Exception
{
}

class WebshopappApiResourceAccount
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('account');
    }
}

class WebshopappApiResourceAccountMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('account/metafields', $params);
        }
        else
        {
            return $this->client->read('account/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('account/metafields/count', $params);

        return $response['count'];
    }
}

class WebshopappApiResourceAccountPermissions
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('account/permissions');
    }
}

class WebshopappApiResourceAccountRatelimit
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('account/ratelimit');
    }
}

class WebshopappApiResourceAdditionalcosts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $additionalCostId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $additionalCostId = null, array $params = []): array
    {
        if (!$additionalCostId)
        {
            return $this->client->read('additionalcosts', $params);
        }
        else
        {
            return $this->client->read('additionalcosts/' . $additionalCostId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('additionalcosts/count', $params);

        return $response['count'];
    }

    /**
     * @param int $additionalCostId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $additionalCostId, array $fields): array
    {
        $fields = array('additionalCost' => $fields);

        return $this->client->update('additionalcosts/' . $additionalCostId, $fields);
    }

    /**
     * @param int $additionalCostId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $additionalCostId): array
    {
        return $this->client->delete('additionalcosts/' . $additionalCostId);
    }
}

class WebshopappApiResourceAttributes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('attribute' => $fields);

        return $this->client->create('attributes', $fields);
    }

    /**
     * @param int|null $attributeId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $attributeId = null, array $params = []): array
    {
        if (!$attributeId)
        {
            return $this->client->read('attributes', $params);
        }
        else
        {
            return $this->client->read('attributes/' . $attributeId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('attributes/count', $params);
        
        return $response['count'];
    }

    /**
     * @param int $attributeId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $attributeId, array $fields): array
    {
        $fields = array('attribute' => $fields);

        return $this->client->update('attributes/' . $attributeId, $fields);
    }

    /**
     * @param int $attributeId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $attributeId): array
    {
        return $this->client->delete('attributes/' . $attributeId);
    }
}

class WebshopappApiResourceBlogs
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('blog' => $fields);

        return $this->client->create('blogs', $fields);
    }

    /**
     * @param int|null $blogId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $blogId = null, array $params = []): array
    {
        if (!$blogId)
        {
            return $this->client->read('blogs', $params);
        }
        else
        {
            return $this->client->read('blogs/' . $blogId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('blogs/count', $params);
        
        return $response['count'];
    }

    /**
     * @param int $blogId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $blogId, array $fields): array
    {
        $fields = array('blog' => $fields);

        return $this->client->update('blogs/' . $blogId, $fields);
    }

    /**
     * @param int $blogId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $blogId): array
    {
        return $this->client->delete('blogs/' . $blogId);
    }
}

class WebshopappApiResourceBlogsArticles
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('blogArticle' => $fields);

        return $this->client->create('blogs/articles', $fields);
    }

    /**
     * @param int|null $articleId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $articleId = null, array $params = []): array
    {
        if (!$articleId)
        {
            return $this->client->read('blogs/articles', $params);
        }
        else
        {
            return $this->client->read('blogs/articles/' . $articleId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('blogs/articles/count', $params);

        return $response['count'];
    }

    /**
     * @param int $articleId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $articleId, array $fields): array
    {
        $fields = array('blogArticle' => $fields);

        return $this->client->update('blogs/articles/' . $articleId, $fields);
    }

    /**
     * @param int $articleId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $articleId): array
    {
        return $this->client->delete('blogs/articles/' . $articleId);
    }
}

class WebshopappApiResourceBlogsArticlesImage
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $articleId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $articleId, array $fields): array
    {
        if (strpos($fields['attachment'], 'http') === false) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype             = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data'
                ];

                return $this->client->create('blogs/articles/' . $articleId . '/image', $fields, $options);
            } catch (RuntimeException $exception) {
                //
            }
        }

        $fields = array('blogArticleImage' => $fields);

        return $this->client->create('blogs/articles/' . $articleId . '/image', $fields);
    }

    /**
     * @param int $articleId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $articleId): array
    {
        return $this->client->read('blogs/articles/' . $articleId . '/image');
    }

    /**
     * @param int $articleId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $articleId): array
    {
        return $this->client->delete('blogs/articles/' . $articleId . '/image');
    }
}

class WebshopappApiResourceBlogsArticlesTags
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('blogArticleTag' => $fields);

        return $this->client->create('blogs/articles/tags', $fields);
    }

    /**
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('blogs/articles/tags', $params);
        }
        else
        {
            return $this->client->read('blogs/articles/tags/' . $relationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('blogs/articles/tags/count', $params);

        return $response['count'];
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('blogs/articles/tags/' . $relationId);
    }
}

class WebshopappApiResourceBlogsComments
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('blogComment' => $fields);

        return $this->client->create('blogs/comments', $fields);
    }

    /**
     * @param int|null $commentId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $commentId = null, array $params = []): array
    {
        if (!$commentId)
        {
            return $this->client->read('blogs/comments', $params);
        }
        else
        {
            return $this->client->read('blogs/comments/' . $commentId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('blogs/comments/count', $params);

        return $response['count'];
    }

    /**
     * @param int $commentId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $commentId, array $fields): array
    {
        $fields = array('blogComment' => $fields);

        return $this->client->update('blogs/comments/' . $commentId, $fields);
    }

    /**
     * @param int $commentId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $commentId): array
    {
        return $this->client->delete('blogs/comments/' . $commentId);
    }
}

class WebshopappApiResourceBlogsTags
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('blogTag' => $fields);

        return $this->client->create('blogs/tags', $fields);
    }

    /**
     * @param int|null $tagId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $tagId = null, array $params = []): array
    {
        if (!$tagId)
        {
            return $this->client->read('blogs/tags', $params);
        }
        else
        {
            return $this->client->read('blogs/tags/' . $tagId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('blogs/tags/count', $params);

        return $response['count'];
    }

    /**
     * @param int $tagId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $tagId, array $fields): array
    {
        $fields = array('blogTag' => $fields);

        return $this->client->update('blogs/tags/' . $tagId, $fields);
    }

    /**
     * @param int $tagId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $tagId): array
    {
        return $this->client->delete('blogs/tags/' . $tagId);
    }
}

class WebshopappApiResourceBrands
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('brand' => $fields);

        return $this->client->create('brands', $fields);
    }

    /**
     * @param int|null $brandId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $brandId = null, array $params = []): array
    {
        if (!$brandId)
        {
            return $this->client->read('brands', $params);
        }
        else
        {
            return $this->client->read('brands/' . $brandId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('brands/count', $params);

        return $response['count'];
    }

    /**
     * @param int $brandId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $brandId, array $fields): array
    {
        $fields = array('brand' => $fields);

        return $this->client->update('brands/' . $brandId, $fields);
    }

    /**
     * @param int $brandId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $brandId): array
    {
        return $this->client->delete('brands/' . $brandId);
    }
}

class WebshopappApiResourceBrandsImage
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $brandId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $brandId, array $fields): array
    {
        if (strpos($fields['attachment'], 'http') === false) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype             = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data'
                ];

                return $this->client->create('brands/' . $brandId . '/image', $fields, $options);
            } catch (RuntimeException $exception) {
                //
            }
        }

        $fields = array('brandImage' => $fields);

        return $this->client->create('brands/' . $brandId . '/image', $fields);
    }

    /**
     * @param int $brandId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $brandId): array
    {
        return $this->client->read('brands/' . $brandId . '/image');
    }

    /**
     * @param int $brandId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $brandId): array
    {
        return $this->client->delete('brands/' . $brandId . '/image');
    }
}

class WebshopappApiResourceCatalog
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('catalog', $params);
        }
        else
        {
            return $this->client->read('catalog/' . $productId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('catalog/count', $params);

        return $response['count'];
    }
}

class WebshopappApiResourceCategories
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('category' => $fields);

        return $this->client->create('categories', $fields);
    }

    /**
     * @param int|null $categoryId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $categoryId = null, array $params = []): array
    {
        if (!$categoryId)
        {
            return $this->client->read('categories', $params);
        }
        else
        {
            return $this->client->read('categories/' . $categoryId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('categories/count', $params);

        return $response['count'];
    }

    /**
     * @param int $categoryId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $categoryId, array $fields): array
    {
        $fields = array('category' => $fields);

        return $this->client->update('categories/' . $categoryId, $fields);
    }

    /**
     * @param int $categoryId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $categoryId): array
    {
        return $this->client->delete('categories/' . $categoryId);
    }
}

class WebshopappApiResourceCategoriesImage
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $categoryId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $categoryId, array $fields): array
    {
        if (strpos($fields['attachment'], 'http') === false) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype             = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data'
                ];

                return $this->client->create('categories/' . $categoryId . '/image', $fields, $options);
            } catch (RuntimeException $exception) {
                //
            }
        }

        $fields = array('categoryImage' => $fields);

        return $this->client->create('categories/' . $categoryId . '/image', $fields);
    }

    /**
     * @param int $categoryId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $categoryId): array
    {
        return $this->client->read('categories/' . $categoryId . '/image');
    }

    /**
     * @param int $categoryId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $categoryId): array
    {
        return $this->client->delete('categories/' . $categoryId . '/image');
    }
}

class WebshopappApiResourceCategoriesProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('categoriesProduct' => $fields);

        return $this->client->create('categories/products', $fields);
    }

    /**
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('categories/products', $params);
        }
        else
        {
            return $this->client->read('categories/products/' . $relationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('categories/products/count', $params);

        return $response['count'];
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('categories/products/' . $relationId);
    }
}

class WebshopappApiResourceCategoriesProductsBulk
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('categoriesProduct' => $fields);

        return $this->client->create('categories/products/bulk', $fields);
    }
}

class WebshopappApiResourceCheckouts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        return $this->client->create('checkouts', $fields);
    }

    /**
     * @param int|null $checkoutId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $checkoutId = null, array $params = []): array
    {
        if (!$checkoutId)
        {
            return $this->client->read('checkouts', $params);
        }
        else
        {
            return $this->client->read('checkouts/' . $checkoutId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('checkouts/count', $params);

        return $response['count'];
    }

    /**
     * @param int $checkoutId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $checkoutId, array $fields): array
    {
        return $this->client->update('checkouts/' . $checkoutId, $fields);
    }

    /**
     * @param int $checkoutId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $checkoutId): array
    {
        return $this->client->delete('checkouts/' . $checkoutId);
    }
}

class WebshopappApiResourceCheckoutsOrder
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $checkoutId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $checkoutId, array $fields): array
    {
        return $this->client->create('checkouts/' . $checkoutId . '/order', $fields);
    }
}

class WebshopappApiResourceCheckoutsPayment_methods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $checkoutId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $checkoutId): array
    {
        return $this->client->read('checkouts/' . $checkoutId . '/payment_methods');
    }
}

class WebshopappApiResourceCheckoutsProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $checkoutId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $checkoutId, array $fields): array
    {
        return $this->client->create('checkouts/' . $checkoutId . '/products', $fields);
    }

    /**
     * @param int $checkoutId
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $checkoutId, int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('checkouts/' . $checkoutId . '/products', $params);
        }
        else
        {
            return $this->client->read('checkouts/' . $checkoutId . '/products/' . $productId, $params);
        }
    }

    /**
     * @param int $checkoutId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $checkoutId, array $params = []): int
    {
        $response = $this->client->read('checkouts/' . $checkoutId . '/products/count', $params);

        return $response['count'];
    }

    /**
     * @param int $checkoutId
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $checkoutId, int $productId, array $fields): array
    {
        return $this->client->update('checkouts/' . $checkoutId . '/products/' . $productId, $fields);
    }

    /**
     * @param int $checkoutId
     * @param int $productId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $checkoutId, int $productId): array
    {
        return $this->client->delete('checkouts/' . $checkoutId . '/products/' . $productId);
    }
}

class WebshopappApiResourceCheckoutsShipment_methods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $checkoutId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $checkoutId): array
    {
        return $this->client->read('checkouts/' . $checkoutId . '/shipment_methods');
    }
}

class WebshopappApiResourceCheckoutsValidate
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $checkoutId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $checkoutId): array
    {
        return $this->client->read('checkouts/' . $checkoutId . '/validate');
    }
}

class WebshopappApiResourceContacts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $contactId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $contactId = null, array $params = []): array
    {
        if (!$contactId)
        {
            return $this->client->read('contacts', $params);
        }
        else
        {
            return $this->client->read('contacts/' . $contactId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('contacts/count', $params);

        return $response['count'];
    }
}

class WebshopappApiResourceCountries
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $countryId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $countryId = null, array $params = []): array
    {
        if (!$countryId)
        {
            return $this->client->read('countries', $params);
        }
        else
        {
            return $this->client->read('countries/' . $countryId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('countries/count', $params);

        return $response['count'];
    }
}

class WebshopappApiResourceCustomers
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('customer' => $fields);

        return $this->client->create('customers', $fields);
    }

    /**
     * @param int|null $customerId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $customerId = null, array $params = []): array
    {
        if (!$customerId)
        {
            return $this->client->read('customers', $params);
        }
        else
        {
            return $this->client->read('customers/' . $customerId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('customers/count', $params);

        return $response['count'];
    }

    /**
     * @param int $customerId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $customerId, array $fields): array
    {
        $fields = array('customer' => $fields);

        return $this->client->update('customers/' . $customerId, $fields);
    }

    /**
     * @param int $customerId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $customerId): array
    {
        return $this->client->delete('customers/' . $customerId);
    }
}

class WebshopappApiResourceCustomersLogin
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $customerId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $customerId, array $fields): array
    {
        $fields = array('customerLogin' => $fields);

        return $this->client->create('customers/' . $customerId . '/login', $fields);
    }
}

class WebshopappApiResourceCustomersMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $customerId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $customerId, array $fields): array
    {
        $fields = array('customerMetafield' => $fields);

        return $this->client->create('customers/' . $customerId . '/metafields', $fields);
    }

    /**
     * @param int $customerId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $customerId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('customers/' . $customerId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('customers/' . $customerId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $customerId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $customerId, array $params = []): int
    {
        $response = $this->client->read('customers/' . $customerId . '/metafields/count', $params);

        return $response['count'];
    }

    /**
     * @param int $customerId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $customerId, int $metaFieldId, array $fields): array
    {
        $fields = array('customerMetafield' => $fields);

        return $this->client->update('customers/' . $customerId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $customerId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $customerId, int $metaFieldId): array
    {
        return $this->client->delete('customers/' . $customerId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceCustomersTokens
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $customerId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $customerId, array $fields): array
    {
        $fields = array('customerToken' => $fields);

        return $this->client->create('customers/' . $customerId . '/tokens', $fields);
    }
}

class WebshopappApiResourceDashboard
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(array $params = []): array
    {
        return $this->client->read('dashboard', $params);
    }
}

class WebshopappApiResourceDeliverydates
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('deliverydate' => $fields);

        return $this->client->create('deliverydates', $fields);
    }

    /**
     * @param int|null $deliveryDateId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $deliveryDateId = null, array $params = []): array
    {
        if (!$deliveryDateId)
        {
            return $this->client->read('deliverydates', $params);
        }
        else
        {
            return $this->client->read('deliverydates/' . $deliveryDateId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('deliverydates/count', $params);

        return $response['count'];
    }

    /**
     * @param int $deliveryDateId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $deliveryDateId, array $fields): array
    {
        $fields = array('deliverydate' => $fields);

        return $this->client->update('deliverydates/' . $deliveryDateId, $fields);
    }

    /**
     * @param int $deliveryDateId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $deliveryDateId): array
    {
        return $this->client->delete('deliverydates/' . $deliveryDateId);
    }
}

class WebshopappApiResourceDiscountrules
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('discountRule' => $fields);

        return $this->client->create('discountrules', $fields);
    }

    /**
     * @param int|null $discountRuleId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $discountRuleId = null, array $params = []): array
    {
        if (!$discountRuleId)
        {
            return $this->client->read('discountrules', $params);
        }
        else
        {
            return $this->client->read('discountrules/' . $discountRuleId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('discountrules/count', $params);

        return $response['count'];
    }

    /**
     * @param int $discountRuleId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $discountRuleId, array $fields): array
    {
        $fields = array('discountRule' => $fields);

        return $this->client->update('discountrules/' . $discountRuleId, $fields);
    }

    /**
     * @param int $discountRuleId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $discountRuleId): array
    {
        return $this->client->delete('discountrules/' . $discountRuleId);
    }
}

class WebshopappApiResourceDiscounts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('discount' => $fields);

        return $this->client->create('discounts', $fields);
    }

    /**
     * @param int|null $discountId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $discountId = null, array $params = []): array
    {
        if (!$discountId)
        {
            return $this->client->read('discounts', $params);
        }
        else
        {
            return $this->client->read('discounts/' . $discountId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('discounts/count', $params);

        return $response['count'];
    }

    /**
     * @param int $discountId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $discountId, array $fields): array
    {
        $fields = array('discount' => $fields);

        return $this->client->update('discounts/' . $discountId, $fields);
    }

    /**
     * @param int $discountId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $discountId): array
    {
        return $this->client->delete('discounts/' . $discountId);
    }
}

class WebshopappApiResourceEvents
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $eventId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $eventId = null, array $params = []): array
    {
        if (!$eventId)
        {
            return $this->client->read('events', $params);
        }
        else
        {
            return $this->client->read('events/' . $eventId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('events/count', $params);

        return $response['count'];
    }

    /**
     * @param int $eventId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $eventId): array
    {
        return $this->client->delete('events/' . $eventId);
    }
}

class WebshopappApiResourceExternal_services
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('externalService' => $fields);

        return $this->client->create('external_services', $fields);
    }

    /**
     * @param int|null $externalServiceId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $externalServiceId = null, array $params = []): array
    {
        if (!$externalServiceId)
        {
            return $this->client->read('external_services', $params);
        }
        else
        {
            return $this->client->read('external_services/' . $externalServiceId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('external_services/count', $params);

        return $response['count'];
    }

    /**
     * @param int $externalServiceId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $externalServiceId): array
    {
        return $this->client->delete('external_services/' . $externalServiceId);
    }
}

class WebshopappApiResourceFiles
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        if (strpos($fields['attachment'], 'http') === false) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype             = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data'
                ];

                return $this->client->create('files', $fields, $options);
            } catch (RuntimeException $exception) {
                //
            }
        }

        $fields = array('file' => $fields);

        return $this->client->create('files', $fields);
    }

    /**
     * @param int|null $fileId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $fileId = null, array $params = []): array
    {
        if (!$fileId)
        {
            return $this->client->read('files', $params);
        }
        else
        {
            return $this->client->read('files/' . $fileId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('files/count', $params);

        return $response['count'];
    }

    /**
     * @param int $fileId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $fileId, array $fields): array
    {
        $fields = array('file' => $fields);

        return $this->client->update('files/' . $fileId, $fields);
    }

    /**
     * @param int $fileId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $fileId): array
    {
        return $this->client->delete('files/' . $fileId);
    }
}

class WebshopappApiResourceFilters
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('filter' => $fields);

        return $this->client->create('filters', $fields);
    }

    /**
     * @param int|null $filterId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $filterId = null, array $params = []): array
    {
        if (!$filterId)
        {
            return $this->client->read('filters', $params);
        }
        else
        {
            return $this->client->read('filters/' . $filterId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('filters/count', $params);

        return $response['count'];
    }

    /**
     * @param int $filterId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $filterId, array $fields): array
    {
        $fields = array('filter' => $fields);

        return $this->client->update('filters/' . $filterId, $fields);
    }

    /**
     * @param int $filterId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $filterId): array
    {
        return $this->client->delete('filters/' . $filterId);
    }
}

class WebshopappApiResourceFiltersValues
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $filterId
     * @param int|null $filterValueId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $filterId, int $filterValueId = null, array $params = []): array
    {
        if (!$filterValueId)
        {
            return $this->client->read('filters/' . $filterId . '/values', $params);
        }
        else
        {
            return $this->client->read('filters/' . $filterId . '/values/' . $filterValueId, $params);
        }
    }

    /**
     * @param int $filterId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $filterId, array $params = []): int
    {
        $response = $this->client->read('filters/' . $filterId . '/values/count', $params);

        return $response['count'];
    }

    /**
     * @param int $filterId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $filterId, array $fields): array
    {
        $fields = array('filterValue' => $fields);

        return $this->client->create('filters/' . $filterId . '/values', $fields);
    }

    /**
     * @param int $filterId
     * @param int $filterValueId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $filterId, int $filterValueId, array $fields): array
    {
        $fields = array('filterValue' => $fields);

        return $this->client->update('filters/' . $filterId . '/values/' . $filterValueId, $fields);
    }

    /**
     * @param int $filterId
     * @param int $filterValueId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $filterId, int $filterValueId): array
    {
        return $this->client->delete('filters/' . $filterId . '/values/' . $filterValueId);
    }
}

class WebshopappApiResourceGroups
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('group' => $fields);

        return $this->client->create('groups', $fields);
    }

    /**
     * @param int|null $groupId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $groupId = null, array $params = []): array
    {
        if (!$groupId)
        {
            return $this->client->read('groups', $params);
        }
        else
        {
            return $this->client->read('groups/' . $groupId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        $response = $this->client->read('groups/count', $params);

        return $response['count'];
    }

    /**
     * @param int $groupId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $groupId, array $fields): array
    {
        $fields = array('group' => $fields);

        return $this->client->update('groups/' . $groupId, $fields);
    }

    /**
     * @param int $groupId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $groupId): array
    {
        return $this->client->delete('groups/' . $groupId);
    }
}

class WebshopappApiResourceGroupsCustomers
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('groupsCustomer' => $fields);

        return $this->client->create('groups/customers', $fields);
    }

    /**
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('groups/customers', $params);
        }
        else
        {
            return $this->client->read('groups/customers/' . $relationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('groups/customers/count', $params);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('groups/customers/' . $relationId);
    }
}

class WebshopappApiResourceInvoices
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $invoiceId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $invoiceId = null, array $params = []): array
    {
        if (!$invoiceId)
        {
            return $this->client->read('invoices', $params);
        }
        else
        {
            return $this->client->read('invoices/' . $invoiceId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('invoices/count', $params);
    }

    /**
     * @param int $invoiceId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $invoiceId, array $fields): array
    {
        $fields = array('invoice' => $fields);

        return $this->client->update('invoices/' . $invoiceId, $fields);
    }
}

class WebshopappApiResourceInvoicesItems
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $invoiceId
     * @param int|null $itemId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $invoiceId, int $itemId = null, array $params = []): array
    {
        if (!$itemId)
        {
            return $this->client->read('invoices/' . $invoiceId . '/items', $params);
        }
        else
        {
            return $this->client->read('invoices/' . $invoiceId . '/items/' . $itemId, $params);
        }
    }

    /**
     * @param int $invoiceId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $invoiceId, array $params = []): int
    {
        return $this->client->getCount('invoices/' . $invoiceId . '/items/count', $params);
    }
}

class WebshopappApiResourceInvoicesMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $invoiceId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $invoiceId, array $fields): array
    {
        $fields = array('invoiceMetafield' => $fields);

        return $this->client->create('invoices/' . $invoiceId . '/metafields', $fields);
    }

    /**
     * @param int $invoiceId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $invoiceId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('invoices/' . $invoiceId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('invoices/' . $invoiceId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $invoiceId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $invoiceId, array $params = []): int
    {
        return $this->client->getCount('invoices/' . $invoiceId . '/metafields/count', $params);
    }

    /**
     * @param int $invoiceId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $invoiceId, int $metaFieldId, array $fields): array
    {
        $fields = array('invoiceMetafield' => $fields);

        return $this->client->update('invoices/' . $invoiceId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $invoiceId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $invoiceId, int $metaFieldId): array
    {
        return $this->client->delete('invoices/' . $invoiceId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceLanguages
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $languageId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $languageId = null, array $params = []): array
    {
        if (!$languageId)
        {
            return $this->client->read('languages', $params);
        }
        else
        {
            return $this->client->read('languages/' . $languageId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('languages/count', $params);
    }
}

class WebshopappApiResourceLocations
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $locationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $locationId = null, array $params = []): array
    {
        if (!$locationId)
        {
            return $this->client->read('locations', $params);
        }
        else
        {
            return $this->client->read('locations/' . $locationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('locations/count', $params);
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('locations' => $fields);

        return $this->client->create('locations', $fields);
    }

    /**
     * @param int $locationId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $locationId, array $fields): array
    {
        $fields = array('location' => $fields);

        return $this->client->update('locations/' . $locationId, $fields);
    }

    /**
     * @param int $locationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $locationId): array
    {
        return $this->client->delete('locations/' . $locationId);
    }
}

class WebshopappApiResourceMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('metafield' => $fields);

        return $this->client->create('metafields', $fields);
    }

    /**
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('metafields', $params);
        }
        else
        {
            return $this->client->read('metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('metafields/count', $params);
    }

    /**
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $metaFieldId, array $fields): array
    {
        $fields = array('metafield' => $fields);

        return $this->client->update('metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $metaFieldId): array
    {
        return $this->client->delete('metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceOrders
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $orderId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $orderId = null, array $params = []): array
    {
        if (!$orderId)
        {
            return $this->client->read('orders', $params);
        }
        else
        {
            return $this->client->read('orders/' . $orderId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('orders/count', $params);
    }

    /**
     * @param int $orderId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $orderId, array $fields): array
    {
        $fields = array('order' => $fields);

        return $this->client->update('orders/' . $orderId, $fields);
    }
}

class WebshopappApiResourceOrdersCredit
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $orderId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $orderId, array $fields): array
    {
        $fields = array('credit' => $fields);

        return $this->client->create('orders/' . $orderId . '/credit', $fields);
    }
}

class WebshopappApiResourceOrdersMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $orderId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $orderId, array $fields): array
    {
        $fields = array('orderMetafield' => $fields);

        return $this->client->create('orders/' . $orderId . '/metafields', $fields);
    }

    /**
     * @param int $orderId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $orderId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('orders/' . $orderId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('orders/' . $orderId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $orderId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $orderId, array $params = []): int
    {
        return $this->client->getCount('orders/' . $orderId . '/metafields/count', $params);
    }

    /**
     * @param int $orderId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $orderId, int $metaFieldId, array $fields): array
    {
        $fields = array('orderMetafield' => $fields);

        return $this->client->update('orders/' . $orderId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $orderId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $orderId, int $metaFieldId): array
    {
        return $this->client->delete('orders/' . $orderId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceOrdersProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $orderId
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $orderId, int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('orders/' . $orderId . '/products', $params);
        }
        else
        {
            return $this->client->read('orders/' . $orderId . '/products/' . $productId, $params);
        }
    }

    /**
     * @param int $orderId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $orderId, array $params = []): int
    {
        return $this->client->getCount('orders/' . $orderId . '/products/count', $params);
    }
}

class WebshopappApiResourceOrdersCustomstatuses
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('customStatus' => $fields);

        return $this->client->create('orders/customstatuses', $fields);
    }

    /**
     * @param int|null $customStatusId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $customStatusId = null, array $params = []): array
    {
        if (!$customStatusId)
        {
            return $this->client->read('orders/customstatuses', $params);
        }
        else
        {
            return $this->client->read('orders/customstatuses/' . $customStatusId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('orders/customstatuses/count', $params);
    }

    /**
     * @param int $customStatusId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $customStatusId, array $fields): array
    {
        $fields = array('customStatus' => $fields);

        return $this->client->update('orders/customstatuses/' . $customStatusId, $fields);
    }

    /**
     * @param int $customStatusId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $customStatusId): array
    {
        return $this->client->delete('orders/customstatuses/' . $customStatusId);
    }
}

class WebshopappApiResourceOrdersEvents
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $eventId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $eventId = null, array $params = []): array
    {
        if (!$eventId)
        {
            return $this->client->read('orders/events', $params);
        }
        else
        {
            return $this->client->read('orders/events/' . $eventId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('orders/events/count', $params);
    }
}

class WebshopappApiResourcePaymentmethods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $paymentMethodId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $paymentMethodId = null, array $params = []): array
    {
        if (!$paymentMethodId)
        {
            return $this->client->read('paymentmethods', $params);
        }
        else
        {
            return $this->client->read('paymentmethods/' . $paymentMethodId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('paymentmethods/count', $params);
    }
}

class WebshopappApiResourceProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('product' => $fields);

        return $this->client->create('products', $fields);
    }

    /**
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('products', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('products/count', $params);
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, array $fields): array
    {
        $fields = array('product' => $fields);

        return $this->client->update('products/' . $productId, $fields);
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId): array
    {
        return $this->client->delete('products/' . $productId);
    }
}

class WebshopappApiResourceProductsAttributes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $productId
     * @param int $attributeId Set to null for bulk update.
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, int $attributeId, array $fields): array
    {
        if (!$attributeId)
        {
            $fields = array('productAttributes' => $fields);

            return $this->client->update('products/' . $productId . '/attributes', $fields);
        }
        else
        {
            $fields = array('productAttribute' => $fields);

            return $this->client->update('products/' . $productId . '/attributes/' . $attributeId, $fields);
        }
    }

    /**
     * @param int $productId
     * @param int|null $attributeId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId, int $attributeId = null, array $params = []): array
    {
        if (!$attributeId)
        {
            return $this->client->read('products/' . $productId . '/attributes', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId . '/attributes/' . $attributeId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $productId, array $params = []): int
    {
        return $this->client->getCount('products/' . $productId . '/attributes/count', $params);
    }

    /**
     * @param int $productId
     * @param int $attributeId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId, int $attributeId): array
    {
        return $this->client->delete('products/' . $productId . '/attributes/' . $attributeId);
    }
}

class WebshopappApiResourceProductsFiltervalues
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId): array
    {
        return $this->client->read('products/' . $productId . '/filtervalues');
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $productId, array $params = []): int
    {
        return $this->client->getCount('products/' . $productId . '/filtervalues/count', $params);
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $productId, array $fields): array
    {
        $fields = array('productFiltervalue' => $fields);

        return $this->client->create('products/' . $productId . '/filtervalues', $fields);
    }

    /**
     * @param int $productId
     * @param int $filterValueId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId, int $filterValueId): array
    {
        return $this->client->delete('products/' . $productId . '/filtervalues/' . $filterValueId);
    }
}

class WebshopappApiResourceProductsImages
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $productId, array $fields): array
    {
        if (strpos($fields['attachment'], 'http') === false) {
            try {
                $attachment = $fields['attachment'];

                new SplFileObject($attachment);

                $mimetype             = mime_content_type($attachment);
                $fields['attachment'] = new CURLFile($attachment, $mimetype);

                $options = [
                    'header' => 'multipart/form-data'
                ];

                return $this->client->create('products/' . $productId . '/images', $fields, $options);
            } catch (RuntimeException $exception) {
                //
            }
        }

        $fields = array('productImage' => $fields);

        return $this->client->create('products/' . $productId . '/images', $fields);
    }

    /**
     * @param int $productId
     * @param int|null $imageId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId, int $imageId = null, array $params = []): array
    {
        if (!$imageId)
        {
            return $this->client->read('products/' . $productId . '/images', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId . '/images/' . $imageId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $productId, array $params = []): int
    {
        return $this->client->getCount('products/' . $productId . '/images/count', $params);
    }

    /**
     * @param int $productId
     * @param int $imageId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, int $imageId, array $fields): array
    {
        $fields = array('productImage' => $fields);

        return $this->client->update('products/' . $productId . '/images/' . $imageId, $fields);
    }

    /**
     * @param int $productId
     * @param int $imageId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId, int $imageId): array
    {
        return $this->client->delete('products/' . $productId . '/images/' . $imageId);
    }
}

class WebshopappApiResourceProductsMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $productId, array $fields): array
    {
        $fields = array('productMetafield' => $fields);

        return $this->client->create('products/' . $productId . '/metafields', $fields);
    }

    /**
     * @param int $productId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('products/' . $productId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $productId, array $params = []): int
    {
        return $this->client->getCount('products/' . $productId . '/metafields/count', $params);
    }

    /**
     * @param int $productId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, int $metaFieldId, array $fields): array
    {
        $fields = array('productMetafield' => $fields);

        return $this->client->update('products/' . $productId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $productId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId, int $metaFieldId): array
    {
        return $this->client->delete('products/' . $productId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceProductsRelations
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $productId, array $fields): array
    {
        $fields = array('productRelation' => $fields);

        return $this->client->create('products/' . $productId . '/relations', $fields);
    }

    /**
     * @param int $productId
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId, int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('products/' . $productId . '/relations', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId . '/relations/' . $relationId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $productId, array $params = []): int
    {
        return $this->client->getCount('products/' . $productId . '/relations/count', $params);
    }

    /**
     * @param int $productId
     * @param int $relationId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, int $relationId, array $fields): array
    {
        $fields = array('productRelation' => $fields);

        return $this->client->update('products/' . $productId . '/relations/' . $relationId, $fields);
    }

    /**
     * @param int $productId
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId, int $relationId): array
    {
        return $this->client->delete('products/' . $productId . '/relations/' . $relationId);
    }
}

class WebshopappApiResourceQuotes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('quote' => $fields);

        return $this->client->create('quotes', $fields);
    }

    /**
     * @param int|null $quoteId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $quoteId = null, array $params = []): array
    {
        if (!$quoteId)
        {
            return $this->client->read('quotes', $params);
        }
        else
        {
            return $this->client->read('quotes/' . $quoteId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('quotes/count', $params);
    }

    /**
     * @param int $quoteId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $quoteId, array $fields): array
    {
        $fields = array('quote' => $fields);

        return $this->client->update('quotes/' . $quoteId, $fields);
    }
}

class WebshopappApiResourceQuotesConvert
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $quoteId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $quoteId, array $fields): array
    {
        $fields = array('order' => $fields);

        return $this->client->create('quotes/' . $quoteId . '/convert', $fields);
    }
}

class WebshopappApiResourceQuotesPaymentmethods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $quoteId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $quoteId): array
    {
        return $this->client->read('quotes/' . $quoteId . '/paymentmethods');
    }
}

class WebshopappApiResourceQuotesProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $quoteId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $quoteId, array $fields): array
    {
        $fields = array('quoteProduct' => $fields);

        return $this->client->create('quotes/' . $quoteId . '/products', $fields);
    }

    /**
     * @param int $quoteId
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $quoteId, int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('quotes/' . $quoteId . '/products', $params);
        }
        else
        {
            return $this->client->read('quotes/' . $quoteId . '/products/' . $productId, $params);
        }
    }

    /**
     * @param int $quoteId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $quoteId, array $params = []): int
    {
        return $this->client->getCount('quotes/' . $quoteId . '/products/count', $params);
    }

    /**
     * @param int $quoteId
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $quoteId, int $productId, array $fields): array
    {
        $fields = array('quoteProduct' => $fields);

        return $this->client->update('quotes/' . $quoteId . '/products/' . $productId, $fields);
    }

    /**
     * @param int $quoteId
     * @param int $productId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $quoteId, int $productId): array
    {
        return $this->client->delete('quotes/' . $quoteId . '/products/' . $productId);
    }
}

class WebshopappApiResourceQuotesShippingmethods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $quoteId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $quoteId): array
    {
        return $this->client->read('quotes/' . $quoteId . '/shippingmethods');
    }
}

class WebshopappApiResourceRedirects
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('redirect' => $fields);

        return $this->client->create('redirects', $fields);
    }

    /**
     * @param int|null $redirectId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $redirectId = null, array $params = []): array
    {
        if (!$redirectId)
        {
            return $this->client->read('redirects', $params);
        }
        else
        {
            return $this->client->read('redirects/' . $redirectId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('redirects/count', $params);
    }

    /**
     * @param int $redirectId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $redirectId, array $fields): array
    {
        $fields = array('redirect' => $fields);

        return $this->client->update('redirects/' . $redirectId, $fields);
    }

    /**
     * @param int $redirectId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $redirectId): array
    {
        return $this->client->delete('redirects/' . $redirectId);
    }
}

class WebshopappApiResourceReturns
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $returnId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $returnId = null, array $params = []): array
    {
        if (!$returnId)
        {
            return $this->client->read('returns', $params);
        }
        else
        {
            return $this->client->read('returns/' . $returnId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('returns/count', $params);
    }

    /**
     * @param int $returnId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $returnId, array $fields): array
    {
        $fields = array('return' => $fields);

        return $this->client->update('returns/' . $returnId, $fields);
    }

    /**
     * @param int $returnId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $returnId): array
    {
        return $this->client->delete('returns/' . $returnId);
    }
}

class WebshopappApiResourceReviews
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('review' => $fields);

        return $this->client->create('reviews', $fields);
    }

    /**
     * @param int|null $reviewId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $reviewId = null, array $params = []): array
    {
        if (!$reviewId)
        {
            return $this->client->read('reviews', $params);
        }
        else
        {
            return $this->client->read('reviews/' . $reviewId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('reviews/count', $params);
    }

    /**
     * @param int $reviewId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $reviewId, array $fields): array
    {
        $fields = array('review' => $fields);

        return $this->client->update('reviews/' . $reviewId, $fields);
    }

    /**
     * @param int $reviewId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $reviewId): array
    {
        return $this->client->delete('reviews/' . $reviewId);
    }
}

class WebshopappApiResourceSets
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('set' => $fields);

        return $this->client->create('sets', $fields);
    }

    /**
     * @param int|null $setId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $setId = null, array $params = []): array
    {
        if (!$setId)
        {
            return $this->client->read('sets', $params);
        }
        else
        {
            return $this->client->read('sets/' . $setId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('sets/count', $params);
    }

    /**
     * @param int $setId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $setId, array $fields): array
    {
        $fields = array('set' => $fields);

        return $this->client->update('sets/' . $setId, $fields);
    }

    /**
     * @param int $setId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $setId): array
    {
        return $this->client->delete('sets/' . $setId);
    }
}

class WebshopappApiResourceShipments
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $shipmentId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shipmentId = null, array $params = []): array
    {
        if (!$shipmentId)
        {
            return $this->client->read('shipments', $params);
        }
        else
        {
            return $this->client->read('shipments/' . $shipmentId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('shipments/count', $params);
    }

    /**
     * @param int $shipmentId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $shipmentId, array $fields): array
    {
        $fields = array('shipment' => $fields);

        return $this->client->update('shipments/' . $shipmentId, $fields);
    }
}

class WebshopappApiResourceShipmentsMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $shipmentId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $shipmentId, array $fields): array
    {
        $fields = array('shipmentMetafield' => $fields);

        return $this->client->create('shipments/' . $shipmentId . '/metafields', $fields);
    }

    /**
     * @param int $shipmentId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shipmentId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('shipments/' . $shipmentId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('shipments/' . $shipmentId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $shipmentId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $shipmentId, array $params = []): int
    {
        return $this->client->getCount('shipments/' . $shipmentId . '/metafields/count', $params);
    }

    /**
     * @param int $shipmentId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $shipmentId, int $metaFieldId, array $fields): array
    {
        $fields = array('shipmentMetafield' => $fields);

        return $this->client->update('shipments/' . $shipmentId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $shipmentId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $shipmentId, int $metaFieldId): array
    {
        return $this->client->delete('shipments/' . $shipmentId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceShipmentsProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $shipmentId
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shipmentId, int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('shipments/' . $shipmentId . '/products', $params);
        }
        else
        {
            return $this->client->read('shipments/' . $shipmentId . '/products/' . $productId, $params);
        }
    }

    /**
     * @param int $shipmentId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $shipmentId, array $params = []): int
    {
        return $this->client->getCount('shipments/' . $shipmentId . '/products/count', $params);
    }
}

class WebshopappApiResourceShippingmethods
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $shippingMethodId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shippingMethodId = null, array $params = []): array
    {
        if (!$shippingMethodId)
        {
            return $this->client->read('shippingmethods', $params);
        }
        else
        {
            return $this->client->read('shippingmethods/' . $shippingMethodId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('shippingmethods/count', $params);
    }
}

class WebshopappApiResourceShippingmethodsCountries
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $shippingMethodId
     * @param int|null $countryId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shippingMethodId, int $countryId = null, array $params = []): array
    {
        if (!$countryId)
        {
            return $this->client->read('shippingmethods/' . $shippingMethodId . '/countries', $params);
        }
        else
        {
            return $this->client->read('shippingmethods/' . $shippingMethodId . '/countries/' . $countryId, $params);
        }
    }

    /**
     * @param int $shippingMethodId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $shippingMethodId, array $params = []): int
    {
        return $this->client->getCount('shippingmethods/' . $shippingMethodId . '/countries/count', $params);
    }
}

class WebshopappApiResourceShippingmethodsValues
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $shippingMethodId
     * @param int|null $valueId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $shippingMethodId, int $valueId = null, array $params = []): array
    {
        if (!$valueId)
        {
            return $this->client->read('shippingmethods/' . $shippingMethodId . '/values', $params);
        }
        else
        {
            return $this->client->read('shippingmethods/' . $shippingMethodId . '/values/' . $valueId, $params);
        }
    }

    /**
     * @param int $shippingMethodId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $shippingMethodId, array $params = []): int
    {
        return $this->client->getCount('shippingmethods/' . $shippingMethodId . '/values/count', $params);
    }
}

class WebshopappApiResourceShop
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop');
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(array $fields): array
    {
        $fields = array('shop' => $fields);

        return $this->client->update('shop', $fields);
    }
}

class WebshopappApiResourceShopCompany
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop/company');
    }
}

class WebshopappApiResourceShopJavascript
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop/javascript');
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(array $fields): array
    {
        $fields = array('shopJavascript' => $fields);

        return $this->client->update('shop/javascript', $fields);
    }
}

class WebshopappApiResourceShopLimits
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop/limits');
    }
}

class WebshopappApiResourceShopMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('shopMetafield' => $fields);

        return $this->client->create('shop/metafields', $fields);
    }

    /**
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('shop/metafields', $params);
        }
        else
        {
            return $this->client->read('shop/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('shop/metafields/count', $params);
    }

    /**
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $metaFieldId, array $fields): array
    {
        $fields = array('shopMetafield' => $fields);

        return $this->client->update('shop/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $metaFieldId): array
    {
        return $this->client->delete('shop/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceShopScripts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('shopScript' => $fields);

        return $this->client->create('shop/scripts', $fields);
    }

    /**
     * @param int|null $scriptId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $scriptId = null, array $params = []): array
    {
        if (!$scriptId)
        {
            return $this->client->read('shop/scripts', $params);
        }
        else
        {
            return $this->client->read('shop/scripts/' . $scriptId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('shop/scripts/count', $params);
    }

    /**
     * @param int $scriptId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $scriptId, array $fields): array
    {
        $fields = array('shopScript' => $fields);

        return $this->client->update('shop/scripts/' . $scriptId, $fields);
    }

    /**
     * @param int $scriptId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $scriptId): array
    {
        return $this->client->delete('shop/scripts/' . $scriptId);
    }
}

class WebshopappApiResourceShopSettings
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop/settings');
    }
}

class WebshopappApiResourceShopTracking
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('shopTracking' => $fields);

        return $this->client->create('shop/tracking', $fields);
    }

    /**
     * @param int|null $trackingId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $trackingId = null, array $params = []): array
    {
        if (!$trackingId)
        {
            return $this->client->read('shop/tracking', $params);
        }
        else
        {
            return $this->client->read('shop/tracking/' . $trackingId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('shop/tracking/count', $params);
    }

    /**
     * @param int $trackingId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $trackingId, array $fields): array
    {
        $fields = array('shopTracking' => $fields);

        return $this->client->update('shop/tracking/' . $trackingId, $fields);
    }

    /**
     * @param int $trackingId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $trackingId): array
    {
        return $this->client->delete('shop/tracking/' . $trackingId);
    }
}

class WebshopappApiResourceShopWebsite
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('shop/website');
    }
}

class WebshopappApiResourceSubscriptions
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('subscription' => $fields);

        return $this->client->create('subscriptions', $fields);
    }

    /**
     * @param int|null $subscriptionId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $subscriptionId = null, array $params = []): array
    {
        if (!$subscriptionId)
        {
            return $this->client->read('subscriptions', $params);
        }
        else
        {
            return $this->client->read('subscriptions/' . $subscriptionId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('subscriptions/count', $params);
    }

    /**
     * @param int $subscriptionId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $subscriptionId, array $fields): array
    {
        $fields = array('subscription' => $fields);

        return $this->client->update('subscriptions/' . $subscriptionId, $fields);
    }

    /**
     * @param int $subscriptionId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $subscriptionId): array
    {
        return $this->client->delete('subscriptions/' . $subscriptionId);
    }
}

class WebshopappApiResourceSuppliers
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('supplier' => $fields);

        return $this->client->create('suppliers', $fields);
    }

    /**
     * @param int|null $supplierId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $supplierId = null, array $params = []): array
    {
        if (!$supplierId)
        {
            return $this->client->read('suppliers', $params);
        }
        else
        {
            return $this->client->read('suppliers/' . $supplierId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('suppliers/count', $params);
    }

    /**
     * @param int $supplierId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $supplierId, array $fields): array
    {
        $fields = array('supplier' => $fields);

        return $this->client->update('suppliers/' . $supplierId, $fields);
    }

    /**
     * @param int $supplierId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $supplierId): array
    {
        return $this->client->delete('suppliers/' . $supplierId);
    }
}

class WebshopappApiResourceTags
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('tag' => $fields);

        return $this->client->create('tags', $fields);
    }

    /**
     * @param int|null $tagId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $tagId = null, array $params = []): array
    {
        if (!$tagId)
        {
            return $this->client->read('tags', $params);
        }
        else
        {
            return $this->client->read('tags/' . $tagId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('tags/count', $params);
    }

    /**
     * @param int $tagId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $tagId, array $fields): array
    {
        $fields = array('tag' => $fields);

        return $this->client->update('tags/' . $tagId, $fields);
    }

    /**
     * @param int $tagId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $tagId): array
    {
        return $this->client->delete('tags/' . $tagId);
    }
}

class WebshopappApiResourceTagsProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('tagsProduct' => $fields);

        return $this->client->create('tags/products', $fields);
    }

    /**
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('tags/products', $params);
        }
        else
        {
            return $this->client->read('tags/products/' . $relationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('tags/products/count', $params);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('tags/products/' . $relationId);
    }
}

class WebshopappApiResourceTaxes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('tax' => $fields);

        return $this->client->create('taxes', $fields);
    }

    /**
     * @param int|null $taxId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $taxId = null, array $params = []): array
    {
        if (!$taxId)
        {
            return $this->client->read('taxes', $params);
        }
        else
        {
            return $this->client->read('taxes/' . $taxId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('taxes/count', $params);
    }

    /**
     * @param int $taxId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $taxId, array $fields): array
    {
        $fields = array('tax' => $fields);

        return $this->client->update('taxes/' . $taxId, $fields);
    }

    /**
     * @param int $taxId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $taxId): array
    {
        return $this->client->delete('taxes/' . $taxId);
    }
}

class WebshopappApiResourceTaxesOverrides
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $taxId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $taxId, array $fields): array
    {
        $fields = array('taxOverride' => $fields);

        return $this->client->create('taxes/' . $taxId . '/overrides', $fields);
    }

    /**
     * @param int $taxId
     * @param int|null $taxOverrideId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $taxId, int $taxOverrideId = null, array $params = []): array
    {
        if (!$taxOverrideId)
        {
            return $this->client->read('taxes/' . $taxId . '/overrides', $params);
        }
        else
        {
            return $this->client->read('taxes/' . $taxId . '/overrides/' . $taxOverrideId, $params);
        }
    }

    /**
     * @param int $taxId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $taxId, array $params = []): int
    {
        return $this->client->getCount('taxes/' . $taxId . '/overrides/count', $params);
    }

    /**
     * @param int $taxId
     * @param int $taxOverrideId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $taxId, int $taxOverrideId, array $fields): array
    {
        $fields = array('taxOverride' => $fields);

        return $this->client->update('taxes/' . $taxId . '/overrides/' . $taxOverrideId, $fields);
    }

    /**
     * @param int $taxId
     * @param int $taxOverrideId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $taxId, int $taxOverrideId): array
    {
        return $this->client->delete('taxes/' . $taxId . '/overrides/' . $taxOverrideId);
    }
}

class WebshopappApiResourceTextpages
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('textpage' => $fields);

        return $this->client->create('textpages', $fields);
    }

    /**
     * @param int|null $testPageId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $testPageId = null, array $params = []): array
    {
        if (!$testPageId)
        {
            return $this->client->read('textpages', $params);
        }
        else
        {
            return $this->client->read('textpages/' . $testPageId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('textpages/count', $params);
    }

    /**
     * @param int $testPageId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $testPageId, array $fields): array
    {
        $fields = array('textpage' => $fields);

        return $this->client->update('textpages/' . $testPageId, $fields);
    }

    /**
     * @param int $testPageId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $testPageId): array
    {
        return $this->client->delete('textpages/' . $testPageId);
    }
}

class WebshopappApiResourceThemeCategories
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('themeCategory' => $fields);

        return $this->client->create('theme/categories', $fields);
    }

    /**
     * @param int|null $categoryId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $categoryId = null, array $params = []): array
    {
        if (!$categoryId)
        {
            return $this->client->read('theme/categories', $params);
        }
        else
        {
            return $this->client->read('theme/categories/' . $categoryId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('theme/categories/count', $params);
    }

    /**
     * @param int $categoryId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $categoryId, array $fields): array
    {
        $fields = array('themeCategory' => $fields);

        return $this->client->update('theme/categories/' . $categoryId, $fields);
    }

    /**
     * @param int $categoryId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $categoryId): array
    {
        return $this->client->delete('theme/categories/' . $categoryId);
    }
}

class WebshopappApiResourceThemeProducts
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('themeProduct' => $fields);

        return $this->client->create('theme/products', $fields);
    }

    /**
     * @param int|null $productId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $productId = null, array $params = []): array
    {
        if (!$productId)
        {
            return $this->client->read('theme/products', $params);
        }
        else
        {
            return $this->client->read('theme/products/' . $productId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('theme/products/count', $params);
    }

    /**
     * @param int $productId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $productId, array $fields): array
    {
        $fields = array('themeProduct' => $fields);

        return $this->client->update('theme/products/' . $productId, $fields);
    }

    /**
     * @param int $productId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $productId): array
    {
        return $this->client->delete('theme/products/' . $productId);
    }
}

class WebshopappApiResourceTickets
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('ticket' => $fields);

        return $this->client->create('tickets', $fields);
    }

    /**
     * @param int|null $ticketId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $ticketId = null, array $params = []): array
    {
        if (!$ticketId)
        {
            return $this->client->read('tickets', $params);
        }
        else
        {
            return $this->client->read('tickets/' . $ticketId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('tickets/count', $params);
    }

    /**
     * @param int $ticketId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $ticketId, array $fields): array
    {
        $fields = array('ticket' => $fields);

        return $this->client->update('tickets/' . $ticketId, $fields);
    }

    /**
     * @param int $ticketId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $ticketId): array
    {
        return $this->client->delete('tickets/' . $ticketId);
    }
}

class WebshopappApiResourceTicketsMessages
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $ticketId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $ticketId, array $fields): array
    {
        $fields = array('ticketMessage' => $fields);

        return $this->client->create('tickets/' . $ticketId . '/messages', $fields);
    }

    /**
     * @param int $ticketId
     * @param int|null $messageId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $ticketId, int $messageId = null, array $params = []): array
    {
        if (!$messageId)
        {
            return $this->client->read('tickets/' . $ticketId . '/messages', $params);
        }
        else
        {
            return $this->client->read('tickets/' . $ticketId . '/messages/' . $messageId, $params);
        }
    }

    /**
     * @param int $ticketId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $ticketId, array $params = []): int
    {
        return $this->client->getCount('tickets/' . $ticketId . '/messages/count', $params);
    }

    /**
     * @param int $ticketId
     * @param int $messageId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $ticketId, int $messageId, array $fields): array
    {
        $fields = array('ticketMessage' => $fields);

        return $this->client->update('tickets/' . $ticketId . '/messages/' . $messageId, $fields);
    }

    /**
     * @param int $ticketId
     * @param int $messageId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $ticketId, int $messageId): array
    {
        return $this->client->delete('tickets/' . $ticketId . '/messages/' . $messageId);
    }
}

class WebshopappApiResourceTime
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws WebshopappApiException
     */
    public function get(): array
    {
        return $this->client->read('time');
    }
}

class WebshopappApiResourceTypes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('type' => $fields);

        return $this->client->create('types', $fields);
    }

    /**
     * @param int|null $typeId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $typeId = null, array $params = []): array
    {
        if (!$typeId)
        {
            return $this->client->read('types', $params);
        }
        else
        {
            return $this->client->read('types/' . $typeId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('types/count', $params);
    }

    /**
     * @param int $typeId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $typeId, array $fields): array
    {
        $fields = array('type' => $fields);

        return $this->client->update('types/' . $typeId, $fields);
    }

    /**
     * @param int $typeId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $typeId): array
    {
        return $this->client->delete('types/' . $typeId);
    }
}

class WebshopappApiResourceTypesAttributes
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('typesAttribute' => $fields);

        return $this->client->create('types/attributes', $fields);
    }

    /**
     * @param int|null $relationId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $relationId = null, array $params = []): array
    {
        if (!$relationId)
        {
            return $this->client->read('types/attributes', $params);
        }
        else
        {
            return $this->client->read('types/attributes/' . $relationId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('types/attributes/count', $params);
    }

    /**
     * @param int $relationId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $relationId): array
    {
        return $this->client->delete('types/attributes/' . $relationId);
    }
}

class WebshopappApiResourceVariants
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('variant' => $fields);

        return $this->client->create('variants', $fields);
    }

    /**
     * @param int|null $variantId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $variantId = null, array $params = []): array
    {
        if (!$variantId)
        {
            return $this->client->read('variants', $params);
        }
        else
        {
            return $this->client->read('variants/' . $variantId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('variants/count', $params);
    }

    /**
     * @param int $variantId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $variantId, array $fields): array
    {
        $fields = array('variant' => $fields);

        return $this->client->update('variants/' . $variantId, $fields);
    }

    /**
     * @param int $variantId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $variantId): array
    {
        return $this->client->delete('variants/' . $variantId);
    }
}

class WebshopappApiResourceVariantsImage
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $variantId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $variantId, array $fields): array
    {
        $fields = array('variantImage' => $fields);

        return $this->client->create('variants/' . $variantId . '/image', $fields);
    }

    /**
     * @param int $variantId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $variantId): array
    {
        return $this->client->read('variants/' . $variantId . '/image');
    }

    /**
     * @param int $variantId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $variantId): array
    {
        return $this->client->delete('variants/' . $variantId . '/image');
    }
}

class WebshopappApiResourceVariantsMetafields
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $variantId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(int $variantId, array $fields): array
    {
        $fields = array('variantMetafield' => $fields);

        return $this->client->create('variants/' . $variantId . '/metafields', $fields);
    }

    /**
     * @param int $variantId
     * @param int|null $metaFieldId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $variantId, int $metaFieldId = null, array $params = []): array
    {
        if (!$metaFieldId)
        {
            return $this->client->read('variants/' . $variantId . '/metafields', $params);
        }
        else
        {
            return $this->client->read('variants/' . $variantId . '/metafields/' . $metaFieldId, $params);
        }
    }

    /**
     * @param int $variantId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(int $variantId, array $params = []): int
    {
        return $this->client->getCount('variants/' . $variantId . '/metafields/count', $params);
    }

    /**
     * @param int $variantId
     * @param int $metaFieldId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $variantId, int $metaFieldId, array $fields): array
    {
        $fields = array('variantMetafield' => $fields);

        return $this->client->update('variants/' . $variantId . '/metafields/' . $metaFieldId, $fields);
    }

    /**
     * @param int $variantId
     * @param int $metaFieldId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $variantId, int $metaFieldId): array
    {
        return $this->client->delete('variants/' . $variantId . '/metafields/' . $metaFieldId);
    }
}

class WebshopappApiResourceVariantsBulk
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(array $fields): array
    {
        $fields = array('variant' => $fields);

        return $this->client->update('variants/bulk', $fields);
    }
}

class WebshopappApiResourceVariantsMovements
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int|null $movementId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $movementId = null, array $params = []): array
    {
        if (!$movementId)
        {
            return $this->client->read('variants/movements', $params);
        }
        else
        {
            return $this->client->read('variants/movements/' . $movementId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('variants/movements/count', $params);
    }
}

class WebshopappApiResourceWebhooks
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    /**
     * @param WebshopappApiClient $client
     */
    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create(array $fields): array
    {
        $fields = array('webhook' => $fields);

        return $this->client->create('webhooks', $fields);
    }

    /**
     * @param int|null $webhookId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get(int $webhookId = null, array $params = []): array
    {
        if (!$webhookId)
        {
            return $this->client->read('webhooks', $params);
        }
        else
        {
            return $this->client->read('webhooks/' . $webhookId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count(array $params = []): int
    {
        return $this->client->getCount('webhooks/count', $params);
    }

    /**
     * @param int $webhookId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update(int $webhookId, array $fields): array
    {
        $fields = array('webhook' => $fields);

        return $this->client->update('webhooks/' . $webhookId, $fields);
    }

    /**
     * @param int $webhookId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete(int $webhookId): array
    {
        return $this->client->delete('webhooks/' . $webhookId);
    }
}
