<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-login">
                                <a href="#endpoints-POSTapi-auth-login">User login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-register">
                                <a href="#endpoints-POSTapi-auth-register">User registration</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-logout">
                                <a href="#endpoints-POSTapi-auth-logout">Log the user out (Invalidate the token).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-refresh">
                                <a href="#endpoints-POSTapi-auth-refresh">Refresh a token.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-auth-me">
                                <a href="#endpoints-GETapi-auth-me">Get the authenticated User.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-brands">
                                <a href="#endpoints-GETapi-brands">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-brands">
                                <a href="#endpoints-POSTapi-brands">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-brands--id-">
                                <a href="#endpoints-GETapi-brands--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-brands--id-">
                                <a href="#endpoints-PUTapi-brands--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-brands--id-">
                                <a href="#endpoints-DELETEapi-brands--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-brands-active">
                                <a href="#endpoints-GETapi-brands-active">Get active brands for select options</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories">
                                <a href="#endpoints-GETapi-categories">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-categories">
                                <a href="#endpoints-POSTapi-categories">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories--id-">
                                <a href="#endpoints-GETapi-categories--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-categories--id-">
                                <a href="#endpoints-PUTapi-categories--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-categories--id-">
                                <a href="#endpoints-DELETEapi-categories--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories-with-products">
                                <a href="#endpoints-GETapi-categories-with-products">Get categories with products for homepage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories-slug--slug-">
                                <a href="#endpoints-GETapi-categories-slug--slug-">Get category by slug with products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products">
                                <a href="#endpoints-GETapi-products">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-products">
                                <a href="#endpoints-POSTapi-products">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--id-">
                                <a href="#endpoints-GETapi-products--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-products--id-">
                                <a href="#endpoints-PUTapi-products--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-products--id-">
                                <a href="#endpoints-DELETEapi-products--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products-featured">
                                <a href="#endpoints-GETapi-products-featured">Get featured products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products-category--categorySlug-">
                                <a href="#endpoints-GETapi-products-category--categorySlug-">Get products by category slug</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products-brand--brandSlug-">
                                <a href="#endpoints-GETapi-products-brand--brandSlug-">Get products by brand slug</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products-search">
                                <a href="#endpoints-GETapi-products-search">Search products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products-on-sale">
                                <a href="#endpoints-GETapi-products-on-sale">Get products currently on sale</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--product_id--sale-campaigns">
                                <a href="#endpoints-GETapi-products--product_id--sale-campaigns">Get sale campaigns for specific product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vouchers">
                                <a href="#endpoints-GETapi-vouchers">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-vouchers">
                                <a href="#endpoints-POSTapi-vouchers">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vouchers--id-">
                                <a href="#endpoints-GETapi-vouchers--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-vouchers--id-">
                                <a href="#endpoints-PUTapi-vouchers--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-vouchers--id-">
                                <a href="#endpoints-DELETEapi-vouchers--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-vouchers-validate">
                                <a href="#endpoints-POSTapi-vouchers-validate">Validate voucher code</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vouchers-active">
                                <a href="#endpoints-GETapi-vouchers-active">Get active vouchers for public display</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-comments">
                                <a href="#endpoints-GETapi-comments">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-comments">
                                <a href="#endpoints-POSTapi-comments">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-comments--id-">
                                <a href="#endpoints-GETapi-comments--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-comments--id-">
                                <a href="#endpoints-PUTapi-comments--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-comments--id-">
                                <a href="#endpoints-DELETEapi-comments--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-comments-product--productId-">
                                <a href="#endpoints-GETapi-comments-product--productId-">Get comments for a specific product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-my-comments">
                                <a href="#endpoints-GETapi-my-comments">Get user's comments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders">
                                <a href="#endpoints-GETapi-orders">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-orders">
                                <a href="#endpoints-POSTapi-orders">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders--id-">
                                <a href="#endpoints-GETapi-orders--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-orders--order_id--cancel">
                                <a href="#endpoints-POSTapi-orders--order_id--cancel">Cancel order (only pending orders)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders-stats">
                                <a href="#endpoints-GETapi-orders-stats">Get order statistics for user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-profile">
                                <a href="#endpoints-GETapi-profile">Get user profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-profile">
                                <a href="#endpoints-PUTapi-profile">Update user profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-change-password">
                                <a href="#endpoints-POSTapi-change-password">Change password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user-stats">
                                <a href="#endpoints-GETapi-user-stats">Get user statistics</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-delete-account">
                                <a href="#endpoints-DELETEapi-delete-account">Delete account</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-address-books">
                                <a href="#endpoints-GETapi-address-books">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-address-books">
                                <a href="#endpoints-POSTapi-address-books">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-address-books--id-">
                                <a href="#endpoints-GETapi-address-books--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-address-books--id-">
                                <a href="#endpoints-PUTapi-address-books--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-address-books--id-">
                                <a href="#endpoints-DELETEapi-address-books--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news">
                                <a href="#endpoints-GETapi-news">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news--news_id-">
                                <a href="#endpoints-GETapi-news--news_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news-latest">
                                <a href="#endpoints-GETapi-news-latest">Get latest news</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-contacts">
                                <a href="#endpoints-POSTapi-contacts">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-contacts">
                                <a href="#endpoints-GETapi-contacts">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-contacts--contact_id-">
                                <a href="#endpoints-GETapi-contacts--contact_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sale-campaigns">
                                <a href="#endpoints-GETapi-sale-campaigns">Display a listing of sale campaigns.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-sale-campaigns">
                                <a href="#endpoints-POSTapi-sale-campaigns">Store a newly created sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sale-campaigns--id-">
                                <a href="#endpoints-GETapi-sale-campaigns--id-">Display the specified sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-sale-campaigns--id-">
                                <a href="#endpoints-PUTapi-sale-campaigns--id-">Update the specified sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-sale-campaigns--id-">
                                <a href="#endpoints-DELETEapi-sale-campaigns--id-">Remove the specified sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sale-campaigns-active">
                                <a href="#endpoints-GETapi-sale-campaigns-active">Get active sale campaigns.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sale-campaigns-featured">
                                <a href="#endpoints-GETapi-sale-campaigns-featured">Get featured sale campaigns.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sale-campaigns--saleCampaign_id--products">
                                <a href="#endpoints-GETapi-sale-campaigns--saleCampaign_id--products">Get products in sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-sale-campaigns--saleCampaign_id--products">
                                <a href="#endpoints-POSTapi-sale-campaigns--saleCampaign_id--products">Add products to sale campaign.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">
                                <a href="#endpoints-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">Remove product from sale campaign.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 18, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-auth-login">User login</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"Z5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "Z5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="Z5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>Z5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-register">User registration</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"password\": \"4[*UyPJ\\\"}6\",
    \"phone\": \"hdtqtqxbajwbpilpm\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "password": "4[*UyPJ\"}6",
    "phone": "hdtqtqxbajwbpilpm"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
</span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="4[*UyPJ"}6"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>4[*UyPJ"}6</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-register"
               value="hdtqtqxbajwbpilpm"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>hdtqtqxbajwbpilpm</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-logout">Log the user out (Invalidate the token).</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-auth-refresh">Refresh a token.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-refresh">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/refresh"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-refresh">
</span>
<span id="execution-results-POSTapi-auth-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-refresh"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-refresh">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-refresh" data-method="POST"
      data-path="api/auth/refresh"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-refresh"
                    onclick="tryItOut('POSTapi-auth-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-refresh"
                    onclick="cancelTryOut('POSTapi-auth-refresh');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-refresh"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/refresh</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-auth-me">Get the authenticated User.</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/auth/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-auth-me" data-method="GET"
      data-path="api/auth/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me"
                    onclick="tryItOut('GETapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me"
                    onclick="cancelTryOut('GETapi-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-brands">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-brands">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Adidas&quot;,
            &quot;description&quot;: &quot;Adidas l&agrave; thương hiệu thể thao nổi tiếng với thiết kế năng động v&agrave; chất lượng vượt trội.&quot;,
            &quot;slug&quot;: &quot;adidas&quot;,
            &quot;logo&quot;: &quot;brands/adidas-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Bahringer PLC&quot;,
            &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
            &quot;slug&quot;: &quot;bahringer-plc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
            &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
            &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;D&#039;Amore Ltd&quot;,
            &quot;description&quot;: &quot;Ab fugiat facere nihil et. Ipsam ex distinctio quasi consequuntur quia. Et aliquam eligendi cumque cum quas sequi minima.&quot;,
            &quot;slug&quot;: &quot;damore-ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=business+porro&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Davis-Klein&quot;,
            &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
            &quot;slug&quot;: &quot;davis-klein&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Douglas, Cummings and Senger&quot;,
            &quot;description&quot;: &quot;Doloremque consequatur nisi recusandae. Deserunt corrupti dolores harum eaque. Impedit eveniet in quia porro quos inventore. Expedita tempore amet natus velit unde labore aut.&quot;,
            &quot;slug&quot;: &quot;douglas-cummings-and-senger&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001122?text=business+voluptatem&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Herschel&quot;,
            &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
            &quot;slug&quot;: &quot;herschel&quot;,
            &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;JanSport&quot;,
            &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
            &quot;slug&quot;: &quot;jansport&quot;,
            &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Kuvalis, Waters and Bogan&quot;,
            &quot;description&quot;: &quot;Optio odit est qui laborum est earum iure accusantium. Fugit consequatur eius labore. Quasi quis laudantium sit optio deserunt cupiditate. Repellendus occaecati blanditiis et officiis doloribus quisquam et.&quot;,
            &quot;slug&quot;: &quot;kuvalis-waters-and-bogan&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005500?text=business+sed&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Lockman, Mueller and Hickle&quot;,
            &quot;description&quot;: &quot;Quia omnis sed sunt amet labore nostrum recusandae. Totam odio eveniet quibusdam. Quaerat adipisci rerum quis repudiandae et dolores.&quot;,
            &quot;slug&quot;: &quot;lockman-mueller-and-hickle&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ee?text=business+reprehenderit&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Nike&quot;,
            &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
            &quot;slug&quot;: &quot;nike&quot;,
            &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
            &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
            &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Samsonite&quot;,
            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
            &quot;slug&quot;: &quot;samsonite&quot;,
            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Schmidt Ltd&quot;,
            &quot;description&quot;: &quot;Labore corrupti molestiae occaecati voluptatem atque numquam ipsam ipsum. Suscipit sint ullam et ut magnam et. Ipsam enim sunt odio minima voluptatem.&quot;,
            &quot;slug&quot;: &quot;schmidt-ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0055ee?text=business+tempora&quot;,
            &quot;status&quot;: &quot;inactive&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Schuppe-Collins&quot;,
            &quot;description&quot;: &quot;Porro mollitia quasi totam quia tempore laboriosam. Molestiae voluptatem repudiandae accusamus qui quia rerum hic. Totam ea adipisci beatae dolores neque incidunt error. Eos sequi perspiciatis rerum exercitationem officiis.&quot;,
            &quot;slug&quot;: &quot;schuppe-collins&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0033aa?text=business+minus&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/brands?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 2,
    &quot;last_page_url&quot;: &quot;http://localhost/api/brands?page=2&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/brands?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/brands?page=2&quot;,
            &quot;label&quot;: &quot;2&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/brands?page=2&quot;,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: &quot;http://localhost/api/brands?page=2&quot;,
    &quot;path&quot;: &quot;http://localhost/api/brands&quot;,
    &quot;per_page&quot;: 15,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 15,
    &quot;total&quot;: 16
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-brands" data-method="GET"
      data-path="api/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-brands"
                    onclick="tryItOut('GETapi-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-brands"
                    onclick="cancelTryOut('GETapi-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-brands">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"slug\": \"dtdsufvyvddqamniihfqc\",
    \"logo\": \"oynlazghdtqtqxbajwbpi\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "slug": "dtdsufvyvddqamniihfqc",
    "logo": "oynlazghdtqtqxbajwbpi",
    "status": "active"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-brands">
</span>
<span id="execution-results-POSTapi-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-brands" data-method="POST"
      data-path="api/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-brands"
                    onclick="tryItOut('POSTapi-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-brands"
                    onclick="cancelTryOut('POSTapi-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-brands"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-brands"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-brands"
               value="dtdsufvyvddqamniihfqc"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>dtdsufvyvddqamniihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="POSTapi-brands"
               value="oynlazghdtqtqxbajwbpi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>oynlazghdtqtqxbajwbpi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-brands"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-brands--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-brands--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Nike&quot;,
        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
        &quot;slug&quot;: &quot;nike&quot;,
        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
        &quot;products&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                &quot;price&quot;: &quot;1200000.00&quot;,
                &quot;quantity&quot;: 30,
                &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                &quot;color&quot;: &quot;Xanh Navy&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;category_id&quot;: 5,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                &quot;price&quot;: &quot;1608008.00&quot;,
                &quot;quantity&quot;: 18,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                &quot;color&quot;: &quot;Xanh&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
            },
            {
                &quot;id&quot;: 18,
                &quot;category_id&quot;: 6,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Mini Cute fuga&quot;,
                &quot;description&quot;: &quot;Voluptatum delectus enim voluptates laboriosam. Explicabo sed qui ut similique. Illum voluptatem placeat nam mollitia nam sapiente. Optio aut iste nemo porro quisquam consequuntur nihil. Nihil modi sint ea similique suscipit.&quot;,
                &quot;price&quot;: &quot;1888311.00&quot;,
                &quot;quantity&quot;: 64,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0022dd?text=fashion+eaque&quot;,
                &quot;slug&quot;: &quot;balo-mini-cute-fuga-9512&quot;,
                &quot;color&quot;: &quot;Đen&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;
            },
            {
                &quot;id&quot;: 19,
                &quot;category_id&quot;: 4,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;T&uacute;i Adidas Classic at&quot;,
                &quot;description&quot;: &quot;Ducimus explicabo veniam aliquid modi autem. Illo culpa incidunt velit ut itaque ut temporibus. Velit et aut dignissimos non voluptatem quis cumque vel. Accusantium ipsum ducimus enim quo facilis. Corrupti sunt qui eos aliquam eius ab. Exercitationem illo rerum rerum tenetur odio.&quot;,
                &quot;price&quot;: &quot;203465.00&quot;,
                &quot;quantity&quot;: 88,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007755?text=fashion+sint&quot;,
                &quot;slug&quot;: &quot;tui-adidas-classic-at-1661&quot;,
                &quot;color&quot;: &quot;X&aacute;m&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;
            },
            {
                &quot;id&quot;: 29,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Gaming RGB tempore&quot;,
                &quot;description&quot;: &quot;Vel at et aliquid iure. Consectetur maxime accusantium debitis nostrum veritatis. Autem praesentium voluptatem repellendus unde sit doloribus excepturi. Velit quia dicta beatae et non sint delectus molestiae.&quot;,
                &quot;price&quot;: &quot;1863570.00&quot;,
                &quot;quantity&quot;: 91,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/006622?text=fashion+vel&quot;,
                &quot;slug&quot;: &quot;balo-gaming-rgb-tempore-1817&quot;,
                &quot;color&quot;: &quot;Đỏ&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;
            },
            {
                &quot;id&quot;: 40,
                &quot;category_id&quot;: 3,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face quaerat&quot;,
                &quot;description&quot;: &quot;Quis praesentium est ad quis. Voluptas itaque ducimus sint nihil in. Similique sint velit reprehenderit delectus ipsum odit est ullam. Dolores nihil doloribus et sit aliquam repudiandae quis tenetur.&quot;,
                &quot;price&quot;: &quot;995359.00&quot;,
                &quot;quantity&quot;: 92,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa33?text=fashion+aut&quot;,
                &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-quaerat-3731&quot;,
                &quot;color&quot;: &quot;V&agrave;ng&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;
            },
            {
                &quot;id&quot;: 51,
                &quot;category_id&quot;: 5,
                &quot;brand_id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh JanSport vero&quot;,
                &quot;description&quot;: &quot;Commodi omnis aliquam distinctio aut. Provident maxime facilis dolor. Sit consequatur accusamus aut rem autem. Qui omnis aspernatur dolor sint aut. Sit officiis nesciunt velit impedit quis. Voluptas aut et aut facere sint ea quibusdam.&quot;,
                &quot;price&quot;: &quot;999804.00&quot;,
                &quot;quantity&quot;: 42,
                &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008855?text=fashion+animi&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-vero-2020&quot;,
                &quot;color&quot;: &quot;Hồng&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-brands--id-" data-method="GET"
      data-path="api/brands/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-brands--id-"
                    onclick="tryItOut('GETapi-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-brands--id-"
                    onclick="cancelTryOut('GETapi-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-brands--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-brands--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"slug\": \"dtdsufvyvddqamniihfqc\",
    \"logo\": \"oynlazghdtqtqxbajwbpi\",
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "slug": "dtdsufvyvddqamniihfqc",
    "logo": "oynlazghdtqtqxbajwbpi",
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-brands--id-">
</span>
<span id="execution-results-PUTapi-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-brands--id-" data-method="PUT"
      data-path="api/brands/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-brands--id-"
                    onclick="tryItOut('PUTapi-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-brands--id-"
                    onclick="cancelTryOut('PUTapi-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/brands/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-brands--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-brands--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-brands--id-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-brands--id-"
               value="dtdsufvyvddqamniihfqc"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>dtdsufvyvddqamniihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="PUTapi-brands--id-"
               value="oynlazghdtqtqxbajwbpi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>oynlazghdtqtqxbajwbpi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-brands--id-"
               value="active"
               data-component="body">
    <br>
<p>Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>inactive</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-brands--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/brands/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-brands--id-">
</span>
<span id="execution-results-DELETEapi-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-brands--id-" data-method="DELETE"
      data-path="api/brands/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-brands--id-"
                    onclick="tryItOut('DELETEapi-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-brands--id-"
                    onclick="cancelTryOut('DELETEapi-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-brands--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-brands-active">Get active brands for select options</h2>

<p>
</p>



<span id="example-requests-GETapi-brands-active">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/brands-active" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/brands-active"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-brands-active">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Adidas&quot;,
            &quot;slug&quot;: &quot;adidas&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Bahringer PLC&quot;,
            &quot;slug&quot;: &quot;bahringer-plc&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Davis-Klein&quot;,
            &quot;slug&quot;: &quot;davis-klein&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Herschel&quot;,
            &quot;slug&quot;: &quot;herschel&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;JanSport&quot;,
            &quot;slug&quot;: &quot;jansport&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Lockman, Mueller and Hickle&quot;,
            &quot;slug&quot;: &quot;lockman-mueller-and-hickle&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Nike&quot;,
            &quot;slug&quot;: &quot;nike&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
            &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Samsonite&quot;,
            &quot;slug&quot;: &quot;samsonite&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Schuppe-Collins&quot;,
            &quot;slug&quot;: &quot;schuppe-collins&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;The North Face&quot;,
            &quot;slug&quot;: &quot;the-north-face&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-brands-active" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-brands-active"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-brands-active"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-brands-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-brands-active">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-brands-active" data-method="GET"
      data-path="api/brands-active"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-brands-active', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-brands-active"
                    onclick="tryItOut('GETapi-brands-active');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-brands-active"
                    onclick="cancelTryOut('GETapi-brands-active');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-brands-active"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/brands-active</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-brands-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-brands-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-categories">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
            &quot;slug&quot;: &quot;balo-du-lich&quot;,
            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 14
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 10
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Balo Laptop&quot;,
            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
            &quot;slug&quot;: &quot;balo-laptop&quot;,
            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 16
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Balo Mini&quot;,
            &quot;description&quot;: &quot;Balo nhỏ gọn d&agrave;nh cho việc đi chơi, dạo phố&quot;,
            &quot;slug&quot;: &quot;balo-mini&quot;,
            &quot;image&quot;: &quot;categories/balo-mini.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 5
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Balo Thể Thao&quot;,
            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c hoạt động thể thao, gym với thiết kế năng động&quot;,
            &quot;slug&quot;: &quot;balo-the-thao&quot;,
            &quot;image&quot;: &quot;categories/balo-the-thao.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 4
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
            &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
            &quot;slug&quot;: &quot;tui-xach&quot;,
            &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products_count&quot;: 6
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/categories?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/categories?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/categories?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/categories&quot;,
    &quot;per_page&quot;: 15,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 6,
    &quot;total&quot;: 6
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-categories">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"slug\": \"dtdsufvyvddqamniihfqc\",
    \"image\": \"oynlazghdtqtqxbajwbpi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "slug": "dtdsufvyvddqamniihfqc",
    "image": "oynlazghdtqtqxbajwbpi"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-categories">
</span>
<span id="execution-results-POSTapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-categories" data-method="POST"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categories"
                    onclick="tryItOut('POSTapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categories"
                    onclick="cancelTryOut('POSTapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-categories"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-categories"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-categories"
               value="dtdsufvyvddqamniihfqc"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>dtdsufvyvddqamniihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-categories"
               value="oynlazghdtqtqxbajwbpi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>oynlazghdtqtqxbajwbpi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-categories--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Balo Học Sinh&quot;,
        &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
        &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
        &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
        &quot;products_count&quot;: 10
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories--id-" data-method="GET"
      data-path="api/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories--id-"
                    onclick="tryItOut('GETapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories--id-"
                    onclick="cancelTryOut('GETapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-categories--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"slug\": \"dtdsufvyvddqamniihfqc\",
    \"image\": \"oynlazghdtqtqxbajwbpi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "slug": "dtdsufvyvddqamniihfqc",
    "image": "oynlazghdtqtqxbajwbpi"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-categories--id-">
</span>
<span id="execution-results-PUTapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-categories--id-" data-method="PUT"
      data-path="api/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-categories--id-"
                    onclick="tryItOut('PUTapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-categories--id-"
                    onclick="cancelTryOut('PUTapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-categories--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-categories--id-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-categories--id-"
               value="dtdsufvyvddqamniihfqc"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>dtdsufvyvddqamniihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-categories--id-"
               value="oynlazghdtqtqxbajwbpi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>oynlazghdtqtqxbajwbpi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-categories--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-categories--id-">
</span>
<span id="execution-results-DELETEapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-categories--id-" data-method="DELETE"
      data-path="api/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-categories--id-"
                    onclick="tryItOut('DELETEapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-categories--id-"
                    onclick="cancelTryOut('DELETEapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-categories-with-products">Get categories with products for homepage</h2>

<p>
</p>



<span id="example-requests-GETapi-categories-with-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories-with-products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories-with-products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories-with-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
            &quot;slug&quot;: &quot;balo-du-lich&quot;,
            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 42,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;T&uacute;i Laptop Herschel nihil&quot;,
                    &quot;description&quot;: &quot;Sed velit odit tempore unde. Explicabo pariatur ratione neque sed nihil a eius. Sed perspiciatis autem officiis qui. Quia quam sed sint tempora quis aperiam accusantium. Non ut debitis cum pariatur.&quot;,
                    &quot;price&quot;: &quot;993902.00&quot;,
                    &quot;quantity&quot;: 54,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009944?text=fashion+impedit&quot;,
                    &quot;slug&quot;: &quot;tui-laptop-herschel-nihil-7427&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 47,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 8,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face aspernatur&quot;,
                    &quot;description&quot;: &quot;Esse similique et quia nostrum totam. Pariatur voluptatem unde facere aut unde fugiat rem. Mollitia dolorum amet veritatis molestiae id quae. Tempore ut nihil quod libero praesentium at.&quot;,
                    &quot;price&quot;: &quot;1394690.00&quot;,
                    &quot;quantity&quot;: 66,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ffbb?text=fashion+earum&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-aspernatur-8589&quot;,
                    &quot;color&quot;: &quot;N&acirc;u&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                        &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                        &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 26,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 13,
                    &quot;name&quot;: &quot;T&uacute;i Adidas Classic accusantium&quot;,
                    &quot;description&quot;: &quot;Ducimus rerum consequatur numquam rerum ut aut et. Quis id atque excepturi et fugit quod. Ullam quae consequatur est adipisci autem qui non. Asperiores vel nemo sunt tenetur aut. Non veritatis placeat molestias dignissimos omnis vel sit nulla. Culpa ipsum quos voluptatibus error enim animi.&quot;,
                    &quot;price&quot;: &quot;1825668.00&quot;,
                    &quot;quantity&quot;: 66,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/005522?text=fashion+sint&quot;,
                    &quot;slug&quot;: &quot;tui-adidas-classic-accusantium-3695&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 13,
                        &quot;name&quot;: &quot;Douglas, Cummings and Senger&quot;,
                        &quot;description&quot;: &quot;Doloremque consequatur nisi recusandae. Deserunt corrupti dolores harum eaque. Impedit eveniet in quia porro quos inventore. Expedita tempore amet natus velit unde labore aut.&quot;,
                        &quot;slug&quot;: &quot;douglas-cummings-and-senger&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001122?text=business+voluptatem&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 53,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 3,
                    &quot;name&quot;: &quot;Balo Nike Sportswear modi&quot;,
                    &quot;description&quot;: &quot;Repellendus possimus in vel doloribus. Vitae accusamus sint minima libero laborum alias libero. Dignissimos omnis sit aliquam sit. Ipsam corrupti quasi vel est alias nisi omnis.&quot;,
                    &quot;price&quot;: &quot;1356418.00&quot;,
                    &quot;quantity&quot;: 81,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/003388?text=fashion+ducimus&quot;,
                    &quot;slug&quot;: &quot;balo-nike-sportswear-modi-9947&quot;,
                    &quot;color&quot;: &quot;Xanh&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Samsonite&quot;,
                        &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                        &quot;slug&quot;: &quot;samsonite&quot;,
                        &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 55,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 16,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face quibusdam&quot;,
                    &quot;description&quot;: &quot;Voluptas cumque a nisi fugiat praesentium. Quis qui beatae harum rerum dolorum cupiditate in. Nisi beatae et consectetur repellat molestias nesciunt rerum quis. Consequatur qui sed aut molestiae.&quot;,
                    &quot;price&quot;: &quot;1385735.00&quot;,
                    &quot;quantity&quot;: 69,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/002288?text=fashion+ad&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-quibusdam-3106&quot;,
                    &quot;color&quot;: &quot;T&iacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 16,
                        &quot;name&quot;: &quot;Bahringer PLC&quot;,
                        &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                        &quot;slug&quot;: &quot;bahringer-plc&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 38,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 3,
                    &quot;name&quot;: &quot;Balo Nike Sportswear fugit&quot;,
                    &quot;description&quot;: &quot;Sunt tenetur voluptatem eaque sunt et iste odio. Consequatur et nihil alias eveniet. Excepturi nostrum autem culpa dolorem.&quot;,
                    &quot;price&quot;: &quot;669646.00&quot;,
                    &quot;quantity&quot;: 3,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008866?text=fashion+tempore&quot;,
                    &quot;slug&quot;: &quot;balo-nike-sportswear-fugit-6267&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Samsonite&quot;,
                        &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                        &quot;slug&quot;: &quot;samsonite&quot;,
                        &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 31,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 15,
                    &quot;name&quot;: &quot;Balo Nike Sportswear nostrum&quot;,
                    &quot;description&quot;: &quot;Quia sit eum voluptatem earum. Dolorum cum sequi deleniti qui corporis voluptatum. Cumque libero animi aut dolore facere quas nihil. At ab consequatur dolorem enim sunt in dolores eveniet. Dolor enim quos culpa reprehenderit. Iure aliquam placeat est.&quot;,
                    &quot;price&quot;: &quot;1552442.00&quot;,
                    &quot;quantity&quot;: 22,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0022dd?text=fashion+perferendis&quot;,
                    &quot;slug&quot;: &quot;balo-nike-sportswear-nostrum-3521&quot;,
                    &quot;color&quot;: &quot;N&acirc;u&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 15,
                        &quot;name&quot;: &quot;Kuvalis, Waters and Bogan&quot;,
                        &quot;description&quot;: &quot;Optio odit est qui laborum est earum iure accusantium. Fugit consequatur eius labore. Quasi quis laudantium sit optio deserunt cupiditate. Repellendus occaecati blanditiis et officiis doloribus quisquam et.&quot;,
                        &quot;slug&quot;: &quot;kuvalis-waters-and-bogan&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005500?text=business+sed&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 17,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 6,
                    &quot;name&quot;: &quot;Balo Du Lịch Samsonite reprehenderit&quot;,
                    &quot;description&quot;: &quot;Quisquam voluptatibus corrupti quis perspiciatis autem. Occaecati et expedita facilis doloremque sed sapiente autem. Eligendi nesciunt eos amet autem perspiciatis deleniti illum. Rerum atque eligendi non et odio nihil. Animi et cum id et.&quot;,
                    &quot;price&quot;: &quot;1230124.00&quot;,
                    &quot;quantity&quot;: 24,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ff99?text=fashion+laborum&quot;,
                    &quot;slug&quot;: &quot;balo-du-lich-samsonite-reprehenderit-8804&quot;,
                    &quot;color&quot;: &quot;Đỏ&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 6,
                        &quot;name&quot;: &quot;Herschel&quot;,
                        &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
                        &quot;slug&quot;: &quot;herschel&quot;,
                        &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 33,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 7,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport aliquam&quot;,
                    &quot;description&quot;: &quot;Eos repudiandae amet natus eius fuga molestiae. Perferendis vel vel officiis aliquam cupiditate et consequatur. Et voluptate quidem iste voluptates tenetur. Provident magni dicta alias voluptate enim sequi cumque. Laboriosam accusamus magnam mollitia quam corporis. Est est soluta sint laboriosam officia.&quot;,
                    &quot;price&quot;: &quot;1939330.00&quot;,
                    &quot;quantity&quot;: 45,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007711?text=fashion+illum&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-aliquam-7541&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;D&#039;Amore Ltd&quot;,
                        &quot;description&quot;: &quot;Ab fugiat facere nihil et. Ipsam ex distinctio quasi consequuntur quia. Et aliquam eligendi cumque cum quas sequi minima.&quot;,
                        &quot;slug&quot;: &quot;damore-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=business+porro&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 32,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 7,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face omnis&quot;,
                    &quot;description&quot;: &quot;Voluptatem labore temporibus libero harum sapiente voluptatum. Quis tenetur et voluptatem fugit deleniti aliquam commodi. Consequatur iste quam quae praesentium quia.&quot;,
                    &quot;price&quot;: &quot;1811742.00&quot;,
                    &quot;quantity&quot;: 99,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/002244?text=fashion+pariatur&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-omnis-5127&quot;,
                    &quot;color&quot;: &quot;Hồng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;D&#039;Amore Ltd&quot;,
                        &quot;description&quot;: &quot;Ab fugiat facere nihil et. Ipsam ex distinctio quasi consequuntur quia. Et aliquam eligendi cumque cum quas sequi minima.&quot;,
                        &quot;slug&quot;: &quot;damore-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=business+porro&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 34,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 9,
                    &quot;name&quot;: &quot;T&uacute;i Adidas Classic sunt&quot;,
                    &quot;description&quot;: &quot;Ut non expedita quam ab. Possimus non quia quia non repudiandae. Nemo est incidunt numquam quidem illum. Ut ab animi illo omnis fuga.&quot;,
                    &quot;price&quot;: &quot;785711.00&quot;,
                    &quot;quantity&quot;: 80,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aaaa?text=fashion+et&quot;,
                    &quot;slug&quot;: &quot;tui-adidas-classic-sunt-6359&quot;,
                    &quot;color&quot;: &quot;X&aacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Schmidt Ltd&quot;,
                        &quot;description&quot;: &quot;Labore corrupti molestiae occaecati voluptatem atque numquam ipsam ipsum. Suscipit sint ullam et ut magnam et. Ipsam enim sunt odio minima voluptatem.&quot;,
                        &quot;slug&quot;: &quot;schmidt-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0055ee?text=business+tempora&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 29,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Gaming RGB tempore&quot;,
                    &quot;description&quot;: &quot;Vel at et aliquid iure. Consectetur maxime accusantium debitis nostrum veritatis. Autem praesentium voluptatem repellendus unde sit doloribus excepturi. Velit quia dicta beatae et non sint delectus molestiae.&quot;,
                    &quot;price&quot;: &quot;1863570.00&quot;,
                    &quot;quantity&quot;: 91,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/006622?text=fashion+vel&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-tempore-1817&quot;,
                    &quot;color&quot;: &quot;Đỏ&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 50,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 16,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport provident&quot;,
                    &quot;description&quot;: &quot;Dolorem magnam natus explicabo enim rerum ducimus officia. Ab tempora et dolor officia. Et incidunt voluptatem officia dignissimos. Aperiam consequatur ex non recusandae reprehenderit quasi. Officiis ab est commodi.&quot;,
                    &quot;price&quot;: &quot;1195721.00&quot;,
                    &quot;quantity&quot;: 59,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001177?text=fashion+eius&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-provident-8218&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 16,
                        &quot;name&quot;: &quot;Bahringer PLC&quot;,
                        &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                        &quot;slug&quot;: &quot;bahringer-plc&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 1,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;Balo JanSport SuperBreak Classic&quot;,
                    &quot;description&quot;: &quot;Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung t&iacute;ch 25L ph&ugrave; hợp cho việc đi học h&agrave;ng ng&agrave;y.&quot;,
                    &quot;price&quot;: &quot;899000.00&quot;,
                    &quot;quantity&quot;: 50,
                    &quot;image&quot;: &quot;products/balo-jansport-superbreak-classic.jpg&quot;,
                    &quot;slug&quot;: &quot;balo-jansport-superbreak-classic&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 2,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                    &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                    &quot;price&quot;: &quot;1200000.00&quot;,
                    &quot;quantity&quot;: 30,
                    &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                    &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                    &quot;color&quot;: &quot;Xanh Navy&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 13,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 3,
                    &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                    &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                    &quot;price&quot;: &quot;1328286.00&quot;,
                    &quot;quantity&quot;: 25,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                    &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Samsonite&quot;,
                        &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                        &quot;slug&quot;: &quot;samsonite&quot;,
                        &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Balo Laptop&quot;,
            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
            &quot;slug&quot;: &quot;balo-laptop&quot;,
            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 27,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 10,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport natus&quot;,
                    &quot;description&quot;: &quot;Modi facilis omnis nam sapiente rerum. Et nesciunt rerum vero veniam corrupti sunt aut. Necessitatibus eum eos iste tempore odit dolor. Temporibus rerum at temporibus consequatur aut minima error. Sed doloribus vitae laudantium sunt. Incidunt odit ut qui voluptatem porro.&quot;,
                    &quot;price&quot;: &quot;1296300.00&quot;,
                    &quot;quantity&quot;: 47,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0055ee?text=fashion+pariatur&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-natus-4146&quot;,
                    &quot;color&quot;: &quot;Đỏ&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                        &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                        &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 40,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face quaerat&quot;,
                    &quot;description&quot;: &quot;Quis praesentium est ad quis. Voluptas itaque ducimus sint nihil in. Similique sint velit reprehenderit delectus ipsum odit est ullam. Dolores nihil doloribus et sit aliquam repudiandae quis tenetur.&quot;,
                    &quot;price&quot;: &quot;995359.00&quot;,
                    &quot;quantity&quot;: 92,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa33?text=fashion+aut&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-quaerat-3731&quot;,
                    &quot;color&quot;: &quot;V&agrave;ng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 41,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
                    &quot;description&quot;: &quot;Eos expedita voluptatibus est asperiores veritatis. Quas illum fuga sunt non officiis. Qui cum corporis soluta harum. Fugit et aut fugiat repellat. In maiores et natus voluptatem in architecto qui.&quot;,
                    &quot;price&quot;: &quot;1447336.00&quot;,
                    &quot;quantity&quot;: 81,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077cc?text=fashion+magnam&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-1858&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 36,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 11,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air pariatur&quot;,
                    &quot;description&quot;: &quot;Rerum rem labore error voluptatem rem velit delectus. Molestiae placeat distinctio qui in delectus quia laborum sint. Neque alias accusamus inventore nulla et.&quot;,
                    &quot;price&quot;: &quot;1595016.00&quot;,
                    &quot;quantity&quot;: 50,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009955?text=fashion+doloribus&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-pariatur-7164&quot;,
                    &quot;color&quot;: &quot;N&acirc;u&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 11,
                        &quot;name&quot;: &quot;Lockman, Mueller and Hickle&quot;,
                        &quot;description&quot;: &quot;Quia omnis sed sunt amet labore nostrum recusandae. Totam odio eveniet quibusdam. Quaerat adipisci rerum quis repudiandae et dolores.&quot;,
                        &quot;slug&quot;: &quot;lockman-mueller-and-hickle&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ee?text=business+reprehenderit&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 43,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 14,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face sit&quot;,
                    &quot;description&quot;: &quot;Error ducimus porro omnis nulla debitis repudiandae. Et sit maxime nihil provident fuga natus ullam. Qui in vero provident.&quot;,
                    &quot;price&quot;: &quot;581461.00&quot;,
                    &quot;quantity&quot;: 61,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/003377?text=fashion+eum&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-sit-5148&quot;,
                    &quot;color&quot;: &quot;Trắng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 14,
                        &quot;name&quot;: &quot;Davis-Klein&quot;,
                        &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                        &quot;slug&quot;: &quot;davis-klein&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 44,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;T&uacute;i X&aacute;ch Nữ Thời Trang voluptatibus&quot;,
                    &quot;description&quot;: &quot;Laudantium illo voluptatem excepturi doloribus voluptates. Dolor qui ut laborum sit corporis eius. Dolore facilis necessitatibus vero sint rerum cum. Corrupti eius assumenda magni quia corrupti deserunt quia laudantium.&quot;,
                    &quot;price&quot;: &quot;1387882.00&quot;,
                    &quot;quantity&quot;: 35,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001188?text=fashion+quisquam&quot;,
                    &quot;slug&quot;: &quot;tui-xach-nu-thoi-trang-voluptatibus-1040&quot;,
                    &quot;color&quot;: &quot;Trắng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 24,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 9,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport unde&quot;,
                    &quot;description&quot;: &quot;Sint et aliquam quo. Autem voluptatum id cupiditate esse aspernatur doloribus. Ab quia temporibus minus earum autem earum.&quot;,
                    &quot;price&quot;: &quot;1187859.00&quot;,
                    &quot;quantity&quot;: 67,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0022cc?text=fashion+dolore&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-unde-1457&quot;,
                    &quot;color&quot;: &quot;T&iacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Schmidt Ltd&quot;,
                        &quot;description&quot;: &quot;Labore corrupti molestiae occaecati voluptatem atque numquam ipsam ipsum. Suscipit sint ullam et ut magnam et. Ipsam enim sunt odio minima voluptatem.&quot;,
                        &quot;slug&quot;: &quot;schmidt-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0055ee?text=business+tempora&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 48,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 16,
                    &quot;name&quot;: &quot;Balo Du Lịch Samsonite repellendus&quot;,
                    &quot;description&quot;: &quot;Facere voluptas magnam possimus nam. Sunt error ab voluptatibus nihil quibusdam non totam. Et labore id nam.&quot;,
                    &quot;price&quot;: &quot;1433491.00&quot;,
                    &quot;quantity&quot;: 56,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008866?text=fashion+quo&quot;,
                    &quot;slug&quot;: &quot;balo-du-lich-samsonite-repellendus-7651&quot;,
                    &quot;color&quot;: &quot;X&aacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 16,
                        &quot;name&quot;: &quot;Bahringer PLC&quot;,
                        &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                        &quot;slug&quot;: &quot;bahringer-plc&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Balo Mini&quot;,
            &quot;description&quot;: &quot;Balo nhỏ gọn d&agrave;nh cho việc đi chơi, dạo phố&quot;,
            &quot;slug&quot;: &quot;balo-mini&quot;,
            &quot;image&quot;: &quot;categories/balo-mini.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 25,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 3,
                    &quot;name&quot;: &quot;Balo Mini Cute earum&quot;,
                    &quot;description&quot;: &quot;Voluptatum inventore eum quod explicabo. Quisquam rerum hic dolore vel qui non aspernatur. Sunt sed veniam est nihil tenetur quia. Eius consequatur qui ut cumque.&quot;,
                    &quot;price&quot;: &quot;1649955.00&quot;,
                    &quot;quantity&quot;: 73,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0011cc?text=fashion+similique&quot;,
                    &quot;slug&quot;: &quot;balo-mini-cute-earum-8617&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Samsonite&quot;,
                        &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                        &quot;slug&quot;: &quot;samsonite&quot;,
                        &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 18,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Mini Cute fuga&quot;,
                    &quot;description&quot;: &quot;Voluptatum delectus enim voluptates laboriosam. Explicabo sed qui ut similique. Illum voluptatem placeat nam mollitia nam sapiente. Optio aut iste nemo porro quisquam consequuntur nihil. Nihil modi sint ea similique suscipit.&quot;,
                    &quot;price&quot;: &quot;1888311.00&quot;,
                    &quot;quantity&quot;: 64,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0022dd?text=fashion+eaque&quot;,
                    &quot;slug&quot;: &quot;balo-mini-cute-fuga-9512&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 37,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 8,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air excepturi&quot;,
                    &quot;description&quot;: &quot;Odit ea consequatur repellendus quos neque. Nisi inventore sed dignissimos et voluptas. Voluptatibus deserunt autem quo aut. Non rerum occaecati libero ratione. Minus molestiae quod occaecati sapiente id.&quot;,
                    &quot;price&quot;: &quot;1776705.00&quot;,
                    &quot;quantity&quot;: 9,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc99?text=fashion+autem&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-excepturi-9172&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                        &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                        &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 16,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 9,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air quibusdam&quot;,
                    &quot;description&quot;: &quot;Quis sed quas voluptatum repudiandae sint. Omnis voluptas ut voluptate. Illum assumenda quo dolores alias dolore itaque.&quot;,
                    &quot;price&quot;: &quot;1070223.00&quot;,
                    &quot;quantity&quot;: 68,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ff55?text=fashion+impedit&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-quibusdam-9544&quot;,
                    &quot;color&quot;: &quot;Đỏ&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;Schmidt Ltd&quot;,
                        &quot;description&quot;: &quot;Labore corrupti molestiae occaecati voluptatem atque numquam ipsam ipsum. Suscipit sint ullam et ut magnam et. Ipsam enim sunt odio minima voluptatem.&quot;,
                        &quot;slug&quot;: &quot;schmidt-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0055ee?text=business+tempora&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 11,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 10,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
                    &quot;description&quot;: &quot;Qui ea enim earum. Deserunt commodi aliquid repellat perspiciatis sit quaerat sunt. Assumenda sit excepturi consectetur aut iure. Repellat aut velit est pariatur dolor facere sapiente. Perspiciatis animi doloribus ducimus a optio qui quisquam.&quot;,
                    &quot;price&quot;: &quot;1992332.00&quot;,
                    &quot;quantity&quot;: 72,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc77?text=fashion+quae&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-2618&quot;,
                    &quot;color&quot;: &quot;V&agrave;ng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                        &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                        &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Balo Thể Thao&quot;,
            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c hoạt động thể thao, gym với thiết kế năng động&quot;,
            &quot;slug&quot;: &quot;balo-the-thao&quot;,
            &quot;image&quot;: &quot;categories/balo-the-thao.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 28,
                    &quot;category_id&quot;: 4,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air dolorum&quot;,
                    &quot;description&quot;: &quot;Dolorum aliquid sunt possimus est at molestiae. Quibusdam quis minima facere omnis consequatur nulla enim quo. Atque deleniti error quae velit perspiciatis. Possimus porro in assumenda sit. Architecto labore veniam doloremque quae quis dolore dolor.&quot;,
                    &quot;price&quot;: &quot;1957567.00&quot;,
                    &quot;quantity&quot;: 7,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009911?text=fashion+sapiente&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-dolorum-7321&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 19,
                    &quot;category_id&quot;: 4,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;T&uacute;i Adidas Classic at&quot;,
                    &quot;description&quot;: &quot;Ducimus explicabo veniam aliquid modi autem. Illo culpa incidunt velit ut itaque ut temporibus. Velit et aut dignissimos non voluptatem quis cumque vel. Accusantium ipsum ducimus enim quo facilis. Corrupti sunt qui eos aliquam eius ab. Exercitationem illo rerum rerum tenetur odio.&quot;,
                    &quot;price&quot;: &quot;203465.00&quot;,
                    &quot;quantity&quot;: 88,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007755?text=fashion+sint&quot;,
                    &quot;slug&quot;: &quot;tui-adidas-classic-at-1661&quot;,
                    &quot;color&quot;: &quot;X&aacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 23,
                    &quot;category_id&quot;: 4,
                    &quot;brand_id&quot;: 14,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport autem&quot;,
                    &quot;description&quot;: &quot;Ipsum et ex officia quam. Distinctio neque qui harum at velit beatae sint. Est ab corporis odio exercitationem. Autem dolore incidunt a quia est.&quot;,
                    &quot;price&quot;: &quot;306351.00&quot;,
                    &quot;quantity&quot;: 21,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ee33?text=fashion+et&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-autem-1527&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 14,
                        &quot;name&quot;: &quot;Davis-Klein&quot;,
                        &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                        &quot;slug&quot;: &quot;davis-klein&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 52,
                    &quot;category_id&quot;: 4,
                    &quot;brand_id&quot;: 7,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face ex&quot;,
                    &quot;description&quot;: &quot;Qui occaecati voluptatem nam excepturi temporibus. Accusantium minus recusandae et vero sed ipsam accusantium. At nemo consequuntur minus ab. Dolor nobis qui et sapiente repellat ut praesentium. Dolorum quam eligendi et eaque id accusantium.&quot;,
                    &quot;price&quot;: &quot;1051773.00&quot;,
                    &quot;quantity&quot;: 100,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ee99?text=fashion+repellendus&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-ex-6692&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;D&#039;Amore Ltd&quot;,
                        &quot;description&quot;: &quot;Ab fugiat facere nihil et. Ipsam ex distinctio quasi consequuntur quia. Et aliquam eligendi cumque cum quas sequi minima.&quot;,
                        &quot;slug&quot;: &quot;damore-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=business+porro&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
            &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
            &quot;slug&quot;: &quot;tui-xach&quot;,
            &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;products&quot;: [
                {
                    &quot;id&quot;: 46,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 10,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air cumque&quot;,
                    &quot;description&quot;: &quot;Debitis ipsam ex aperiam et quisquam quis voluptatum. Accusantium ipsa dolorem cupiditate quas. Earum sed numquam odit. Laudantium rerum explicabo accusantium ea. Quidem error consequatur sed in sint iure. Dolor itaque alias repudiandae in.&quot;,
                    &quot;price&quot;: &quot;1988821.00&quot;,
                    &quot;quantity&quot;: 79,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=fashion+earum&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-cumque-1025&quot;,
                    &quot;color&quot;: &quot;Trắng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                        &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                        &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 35,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face et&quot;,
                    &quot;description&quot;: &quot;Saepe sed dolorem at. Architecto quia animi numquam similique ut cum quis. Voluptas deserunt illum amet aut saepe consequuntur quasi. Qui fuga harum exercitationem accusantium et earum doloremque.&quot;,
                    &quot;price&quot;: &quot;1330552.00&quot;,
                    &quot;quantity&quot;: 8,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+ab&quot;,
                    &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-et-2389&quot;,
                    &quot;color&quot;: &quot;N&acirc;u&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 51,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport vero&quot;,
                    &quot;description&quot;: &quot;Commodi omnis aliquam distinctio aut. Provident maxime facilis dolor. Sit consequatur accusamus aut rem autem. Qui omnis aspernatur dolor sint aut. Sit officiis nesciunt velit impedit quis. Voluptas aut et aut facere sint ea quibusdam.&quot;,
                    &quot;price&quot;: &quot;999804.00&quot;,
                    &quot;quantity&quot;: 42,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008855?text=fashion+animi&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-vero-2020&quot;,
                    &quot;color&quot;: &quot;Hồng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 30,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 15,
                    &quot;name&quot;: &quot;Balo Gaming RGB sunt&quot;,
                    &quot;description&quot;: &quot;Quisquam in quibusdam totam. Ipsum quibusdam quo consectetur architecto perferendis. Omnis magni cumque ea laudantium et. Sint ut dolores quibusdam dicta cumque tempora. Vel sunt voluptatibus laborum asperiores ut omnis. Qui perspiciatis quos quaerat occaecati consequuntur rerum et.&quot;,
                    &quot;price&quot;: &quot;1916643.00&quot;,
                    &quot;quantity&quot;: 17,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aaaa?text=fashion+nihil&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-sunt-6874&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 15,
                        &quot;name&quot;: &quot;Kuvalis, Waters and Bogan&quot;,
                        &quot;description&quot;: &quot;Optio odit est qui laborum est earum iure accusantium. Fugit consequatur eius labore. Quasi quis laudantium sit optio deserunt cupiditate. Repellendus occaecati blanditiis et officiis doloribus quisquam et.&quot;,
                        &quot;slug&quot;: &quot;kuvalis-waters-and-bogan&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005500?text=business+sed&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 9,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                    &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                    &quot;price&quot;: &quot;1608008.00&quot;,
                    &quot;quantity&quot;: 18,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                    &quot;color&quot;: &quot;Xanh&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories-with-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories-with-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories-with-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories-with-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories-with-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories-with-products" data-method="GET"
      data-path="api/categories-with-products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories-with-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories-with-products"
                    onclick="tryItOut('GETapi-categories-with-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories-with-products"
                    onclick="cancelTryOut('GETapi-categories-with-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories-with-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories-with-products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories-with-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories-with-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-categories-slug--slug-">Get category by slug with products</h2>

<p>
</p>



<span id="example-requests-GETapi-categories-slug--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories/slug/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories/slug/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories-slug--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Category not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories-slug--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories-slug--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories-slug--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories-slug--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories-slug--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories-slug--slug-" data-method="GET"
      data-path="api/categories/slug/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories-slug--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories-slug--slug-"
                    onclick="tryItOut('GETapi-categories-slug--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories-slug--slug-"
                    onclick="cancelTryOut('GETapi-categories-slug--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories-slug--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/slug/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories-slug--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories-slug--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-categories-slug--slug-"
               value="consequatur"
               data-component="url">
    <br>
<p>The slug of the slug. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 40,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face quaerat&quot;,
            &quot;description&quot;: &quot;Quis praesentium est ad quis. Voluptas itaque ducimus sint nihil in. Similique sint velit reprehenderit delectus ipsum odit est ullam. Dolores nihil doloribus et sit aliquam repudiandae quis tenetur.&quot;,
            &quot;price&quot;: &quot;995359.00&quot;,
            &quot;quantity&quot;: 92,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa33?text=fashion+aut&quot;,
            &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-quaerat-3731&quot;,
            &quot;color&quot;: &quot;V&agrave;ng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 41,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
            &quot;description&quot;: &quot;Eos expedita voluptatibus est asperiores veritatis. Quas illum fuga sunt non officiis. Qui cum corporis soluta harum. Fugit et aut fugiat repellat. In maiores et natus voluptatem in architecto qui.&quot;,
            &quot;price&quot;: &quot;1447336.00&quot;,
            &quot;quantity&quot;: 81,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077cc?text=fashion+magnam&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-1858&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 42,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;T&uacute;i Laptop Herschel nihil&quot;,
            &quot;description&quot;: &quot;Sed velit odit tempore unde. Explicabo pariatur ratione neque sed nihil a eius. Sed perspiciatis autem officiis qui. Quia quam sed sint tempora quis aperiam accusantium. Non ut debitis cum pariatur.&quot;,
            &quot;price&quot;: &quot;993902.00&quot;,
            &quot;quantity&quot;: 54,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009944?text=fashion+impedit&quot;,
            &quot;slug&quot;: &quot;tui-laptop-herschel-nihil-7427&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 43,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 14,
            &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face sit&quot;,
            &quot;description&quot;: &quot;Error ducimus porro omnis nulla debitis repudiandae. Et sit maxime nihil provident fuga natus ullam. Qui in vero provident.&quot;,
            &quot;price&quot;: &quot;581461.00&quot;,
            &quot;quantity&quot;: 61,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/003377?text=fashion+eum&quot;,
            &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-sit-5148&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Davis-Klein&quot;,
                &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                &quot;slug&quot;: &quot;davis-klein&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 44,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch Nữ Thời Trang voluptatibus&quot;,
            &quot;description&quot;: &quot;Laudantium illo voluptatem excepturi doloribus voluptates. Dolor qui ut laborum sit corporis eius. Dolore facilis necessitatibus vero sint rerum cum. Corrupti eius assumenda magni quia corrupti deserunt quia laudantium.&quot;,
            &quot;price&quot;: &quot;1387882.00&quot;,
            &quot;quantity&quot;: 35,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001188?text=fashion+quisquam&quot;,
            &quot;slug&quot;: &quot;tui-xach-nu-thoi-trang-voluptatibus-1040&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 45,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 16,
            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch Nữ Thời Trang laudantium&quot;,
            &quot;description&quot;: &quot;Cupiditate totam eaque et. Quo ipsum eaque cumque enim alias. Praesentium commodi itaque itaque quod tempore minus dolor. Et exercitationem commodi velit fuga eum sunt. Et dolorem quidem perferendis provident.&quot;,
            &quot;price&quot;: &quot;154837.00&quot;,
            &quot;quantity&quot;: 0,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ee00?text=fashion+unde&quot;,
            &quot;slug&quot;: &quot;tui-xach-nu-thoi-trang-laudantium-3744&quot;,
            &quot;color&quot;: &quot;N&acirc;u&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Bahringer PLC&quot;,
                &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                &quot;slug&quot;: &quot;bahringer-plc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;category_id&quot;: 4,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air dolorum&quot;,
            &quot;description&quot;: &quot;Dolorum aliquid sunt possimus est at molestiae. Quibusdam quis minima facere omnis consequatur nulla enim quo. Atque deleniti error quae velit perspiciatis. Possimus porro in assumenda sit. Architecto labore veniam doloremque quae quis dolore dolor.&quot;,
            &quot;price&quot;: &quot;1957567.00&quot;,
            &quot;quantity&quot;: 7,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009911?text=fashion+sapiente&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-dolorum-7321&quot;,
            &quot;color&quot;: &quot;Đen&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Balo Thể Thao&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c hoạt động thể thao, gym với thiết kế năng động&quot;,
                &quot;slug&quot;: &quot;balo-the-thao&quot;,
                &quot;image&quot;: &quot;categories/balo-the-thao.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 46,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 10,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air cumque&quot;,
            &quot;description&quot;: &quot;Debitis ipsam ex aperiam et quisquam quis voluptatum. Accusantium ipsa dolorem cupiditate quas. Earum sed numquam odit. Laudantium rerum explicabo accusantium ea. Quidem error consequatur sed in sint iure. Dolor itaque alias repudiandae in.&quot;,
            &quot;price&quot;: &quot;1988821.00&quot;,
            &quot;quantity&quot;: 79,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=fashion+earum&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-cumque-1025&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 47,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 8,
            &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face aspernatur&quot;,
            &quot;description&quot;: &quot;Esse similique et quia nostrum totam. Pariatur voluptatem unde facere aut unde fugiat rem. Mollitia dolorum amet veritatis molestiae id quae. Tempore ut nihil quod libero praesentium at.&quot;,
            &quot;price&quot;: &quot;1394690.00&quot;,
            &quot;quantity&quot;: 66,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ffbb?text=fashion+earum&quot;,
            &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-aspernatur-8589&quot;,
            &quot;color&quot;: &quot;N&acirc;u&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 48,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 16,
            &quot;name&quot;: &quot;Balo Du Lịch Samsonite repellendus&quot;,
            &quot;description&quot;: &quot;Facere voluptas magnam possimus nam. Sunt error ab voluptatibus nihil quibusdam non totam. Et labore id nam.&quot;,
            &quot;price&quot;: &quot;1433491.00&quot;,
            &quot;quantity&quot;: 56,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008866?text=fashion+quo&quot;,
            &quot;slug&quot;: &quot;balo-du-lich-samsonite-repellendus-7651&quot;,
            &quot;color&quot;: &quot;X&aacute;m&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Bahringer PLC&quot;,
                &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                &quot;slug&quot;: &quot;bahringer-plc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 50,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 16,
            &quot;name&quot;: &quot;Balo Học Sinh JanSport provident&quot;,
            &quot;description&quot;: &quot;Dolorem magnam natus explicabo enim rerum ducimus officia. Ab tempora et dolor officia. Et incidunt voluptatem officia dignissimos. Aperiam consequatur ex non recusandae reprehenderit quasi. Officiis ab est commodi.&quot;,
            &quot;price&quot;: &quot;1195721.00&quot;,
            &quot;quantity&quot;: 59,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001177?text=fashion+eius&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-provident-8218&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Bahringer PLC&quot;,
                &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                &quot;slug&quot;: &quot;bahringer-plc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 51,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Học Sinh JanSport vero&quot;,
            &quot;description&quot;: &quot;Commodi omnis aliquam distinctio aut. Provident maxime facilis dolor. Sit consequatur accusamus aut rem autem. Qui omnis aspernatur dolor sint aut. Sit officiis nesciunt velit impedit quis. Voluptas aut et aut facere sint ea quibusdam.&quot;,
            &quot;price&quot;: &quot;999804.00&quot;,
            &quot;quantity&quot;: 42,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008855?text=fashion+animi&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-vero-2020&quot;,
            &quot;color&quot;: &quot;Hồng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/products?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 5,
    &quot;last_page_url&quot;: &quot;http://localhost/api/products?page=5&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=2&quot;,
            &quot;label&quot;: &quot;2&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=3&quot;,
            &quot;label&quot;: &quot;3&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=4&quot;,
            &quot;label&quot;: &quot;4&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=5&quot;,
            &quot;label&quot;: &quot;5&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products?page=2&quot;,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: &quot;http://localhost/api/products?page=2&quot;,
    &quot;path&quot;: &quot;http://localhost/api/products&quot;,
    &quot;per_page&quot;: 12,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 12,
    &quot;total&quot;: 55
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-products">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category_id\": \"consequatur\",
    \"name\": \"mqeopfuudtdsufvyvddqa\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"price\": 12,
    \"quantity\": 66,
    \"image\": \"dsufvyvddqamniihfqcoy\",
    \"slug\": \"nlazghdtqtqxbajwbpilp\",
    \"color\": \"mufinllwloauydlsmsjur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category_id": "consequatur",
    "name": "mqeopfuudtdsufvyvddqa",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "price": 12,
    "quantity": 66,
    "image": "dsufvyvddqamniihfqcoy",
    "slug": "nlazghdtqtqxbajwbpilp",
    "color": "mufinllwloauydlsmsjur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products">
</span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="POSTapi-products"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="brand_id"                data-endpoint="POSTapi-products"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the brands table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-products"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-products"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-products"
               value="12"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-products"
               value="66"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>66</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-products"
               value="dsufvyvddqamniihfqcoy"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>dsufvyvddqamniihfqcoy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-products"
               value="nlazghdtqtqxbajwbpilp"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>nlazghdtqtqxbajwbpilp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="color"                data-endpoint="POSTapi-products"
               value="mufinllwloauydlsmsjur"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>mufinllwloauydlsmsjur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-products--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;category_id&quot;: 1,
        &quot;brand_id&quot;: 4,
        &quot;name&quot;: &quot;Balo JanSport SuperBreak Classic&quot;,
        &quot;description&quot;: &quot;Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung t&iacute;ch 25L ph&ugrave; hợp cho việc đi học h&agrave;ng ng&agrave;y.&quot;,
        &quot;price&quot;: &quot;899000.00&quot;,
        &quot;quantity&quot;: 50,
        &quot;image&quot;: &quot;products/balo-jansport-superbreak-classic.jpg&quot;,
        &quot;slug&quot;: &quot;balo-jansport-superbreak-classic&quot;,
        &quot;color&quot;: &quot;Đen&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;JanSport&quot;,
            &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
            &quot;slug&quot;: &quot;jansport&quot;,
            &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        &quot;comments&quot;: [
            {
                &quot;id&quot;: 21,
                &quot;product_id&quot;: 1,
                &quot;user_id&quot;: 13,
                &quot;comment&quot;: &quot;Sản phẩm rất chất lượng, giao h&agrave;ng nhanh!&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 13,
                    &quot;name&quot;: &quot;Jennie D&#039;Amore&quot;,
                    &quot;email&quot;: &quot;prohaska.althea@example.com&quot;,
                    &quot;email_verified_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;phone&quot;: null,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 75,
                &quot;product_id&quot;: 1,
                &quot;user_id&quot;: 22,
                &quot;comment&quot;: &quot;M&igrave;nh rất h&agrave;i l&ograve;ng với sản phẩm n&agrave;y.&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 22,
                    &quot;name&quot;: &quot;Prof. Mohammad Kohler II&quot;,
                    &quot;email&quot;: &quot;bernhard.zoie@example.org&quot;,
                    &quot;email_verified_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;phone&quot;: null,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 99,
                &quot;product_id&quot;: 1,
                &quot;user_id&quot;: 1,
                &quot;comment&quot;: &quot;Shop giao h&agrave;ng nhanh, đ&oacute;ng g&oacute;i cẩn thận.&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin BaloZone&quot;,
                    &quot;email&quot;: &quot;admin@balozone.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;phone&quot;: &quot;0901234567&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--id-" data-method="GET"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--id-"
                    onclick="tryItOut('GETapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--id-"
                    onclick="cancelTryOut('GETapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-products--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category_id\": \"consequatur\",
    \"name\": \"mqeopfuudtdsufvyvddqa\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"price\": 12,
    \"quantity\": 66,
    \"image\": \"dsufvyvddqamniihfqcoy\",
    \"slug\": \"nlazghdtqtqxbajwbpilp\",
    \"color\": \"mufinllwloauydlsmsjur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category_id": "consequatur",
    "name": "mqeopfuudtdsufvyvddqa",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "price": 12,
    "quantity": 66,
    "image": "dsufvyvddqamniihfqcoy",
    "slug": "nlazghdtqtqxbajwbpilp",
    "color": "mufinllwloauydlsmsjur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--id-">
</span>
<span id="execution-results-PUTapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-products--id-" data-method="PUT"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--id-"
                    onclick="tryItOut('PUTapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--id-"
                    onclick="cancelTryOut('PUTapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="PUTapi-products--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="brand_id"                data-endpoint="PUTapi-products--id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the brands table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-products--id-"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-products--id-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-products--id-"
               value="12"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTapi-products--id-"
               value="66"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>66</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-products--id-"
               value="dsufvyvddqamniihfqcoy"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>dsufvyvddqamniihfqcoy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-products--id-"
               value="nlazghdtqtqxbajwbpilp"
               data-component="body">
    <br>
<p>Must match the regex /^[a-z0-9]+(?:-[a-z0-9]+)*$/. Must not be greater than 255 characters. Example: <code>nlazghdtqtqxbajwbpilp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="color"                data-endpoint="PUTapi-products--id-"
               value="mufinllwloauydlsmsjur"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>mufinllwloauydlsmsjur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-products--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--id-">
</span>
<span id="execution-results-DELETEapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-products--id-" data-method="DELETE"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--id-"
                    onclick="tryItOut('DELETEapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--id-"
                    onclick="cancelTryOut('DELETEapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products-featured">Get featured products</h2>

<p>
</p>



<span id="example-requests-GETapi-products-featured">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products-featured" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products-featured"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-featured">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 41,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
            &quot;description&quot;: &quot;Eos expedita voluptatibus est asperiores veritatis. Quas illum fuga sunt non officiis. Qui cum corporis soluta harum. Fugit et aut fugiat repellat. In maiores et natus voluptatem in architecto qui.&quot;,
            &quot;price&quot;: &quot;1447336.00&quot;,
            &quot;quantity&quot;: 81,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077cc?text=fashion+magnam&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-1858&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 42,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;T&uacute;i Laptop Herschel nihil&quot;,
            &quot;description&quot;: &quot;Sed velit odit tempore unde. Explicabo pariatur ratione neque sed nihil a eius. Sed perspiciatis autem officiis qui. Quia quam sed sint tempora quis aperiam accusantium. Non ut debitis cum pariatur.&quot;,
            &quot;price&quot;: &quot;993902.00&quot;,
            &quot;quantity&quot;: 54,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/009944?text=fashion+impedit&quot;,
            &quot;slug&quot;: &quot;tui-laptop-herschel-nihil-7427&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 43,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 14,
            &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face sit&quot;,
            &quot;description&quot;: &quot;Error ducimus porro omnis nulla debitis repudiandae. Et sit maxime nihil provident fuga natus ullam. Qui in vero provident.&quot;,
            &quot;price&quot;: &quot;581461.00&quot;,
            &quot;quantity&quot;: 61,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/003377?text=fashion+eum&quot;,
            &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-sit-5148&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Davis-Klein&quot;,
                &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                &quot;slug&quot;: &quot;davis-klein&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 44,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch Nữ Thời Trang voluptatibus&quot;,
            &quot;description&quot;: &quot;Laudantium illo voluptatem excepturi doloribus voluptates. Dolor qui ut laborum sit corporis eius. Dolore facilis necessitatibus vero sint rerum cum. Corrupti eius assumenda magni quia corrupti deserunt quia laudantium.&quot;,
            &quot;price&quot;: &quot;1387882.00&quot;,
            &quot;quantity&quot;: 35,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001188?text=fashion+quisquam&quot;,
            &quot;slug&quot;: &quot;tui-xach-nu-thoi-trang-voluptatibus-1040&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 46,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 10,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air cumque&quot;,
            &quot;description&quot;: &quot;Debitis ipsam ex aperiam et quisquam quis voluptatum. Accusantium ipsa dolorem cupiditate quas. Earum sed numquam odit. Laudantium rerum explicabo accusantium ea. Quidem error consequatur sed in sint iure. Dolor itaque alias repudiandae in.&quot;,
            &quot;price&quot;: &quot;1988821.00&quot;,
            &quot;quantity&quot;: 79,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ff88?text=fashion+earum&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-cumque-1025&quot;,
            &quot;color&quot;: &quot;Trắng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 47,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 8,
            &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face aspernatur&quot;,
            &quot;description&quot;: &quot;Esse similique et quia nostrum totam. Pariatur voluptatem unde facere aut unde fugiat rem. Mollitia dolorum amet veritatis molestiae id quae. Tempore ut nihil quod libero praesentium at.&quot;,
            &quot;price&quot;: &quot;1394690.00&quot;,
            &quot;quantity&quot;: 66,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00ffbb?text=fashion+earum&quot;,
            &quot;slug&quot;: &quot;balo-leo-nui-the-north-face-aspernatur-8589&quot;,
            &quot;color&quot;: &quot;N&acirc;u&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Gaming RGB tempore&quot;,
            &quot;description&quot;: &quot;Vel at et aliquid iure. Consectetur maxime accusantium debitis nostrum veritatis. Autem praesentium voluptatem repellendus unde sit doloribus excepturi. Velit quia dicta beatae et non sint delectus molestiae.&quot;,
            &quot;price&quot;: &quot;1863570.00&quot;,
            &quot;quantity&quot;: 91,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/006622?text=fashion+vel&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-tempore-1817&quot;,
            &quot;color&quot;: &quot;Đỏ&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 48,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 16,
            &quot;name&quot;: &quot;Balo Du Lịch Samsonite repellendus&quot;,
            &quot;description&quot;: &quot;Facere voluptas magnam possimus nam. Sunt error ab voluptatibus nihil quibusdam non totam. Et labore id nam.&quot;,
            &quot;price&quot;: &quot;1433491.00&quot;,
            &quot;quantity&quot;: 56,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/008866?text=fashion+quo&quot;,
            &quot;slug&quot;: &quot;balo-du-lich-samsonite-repellendus-7651&quot;,
            &quot;color&quot;: &quot;X&aacute;m&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Bahringer PLC&quot;,
                &quot;description&quot;: &quot;A eius iusto sunt quibusdam. Commodi qui repudiandae quaerat facere veniam. Commodi culpa molestiae vitae.&quot;,
                &quot;slug&quot;: &quot;bahringer-plc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc00?text=business+et&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-featured" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-featured"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-featured"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-featured" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-featured">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-featured" data-method="GET"
      data-path="api/products-featured"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-featured', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-featured"
                    onclick="tryItOut('GETapi-products-featured');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-featured"
                    onclick="cancelTryOut('GETapi-products-featured');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-featured"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products-featured</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-products-category--categorySlug-">Get products by category slug</h2>

<p>
</p>



<span id="example-requests-GETapi-products-category--categorySlug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products/category/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/category/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-category--categorySlug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [],
    &quot;first_page_url&quot;: &quot;http://localhost/api/products/category/1?page=1&quot;,
    &quot;from&quot;: null,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/products/category/1?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products/category/1?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/products/category/1&quot;,
    &quot;per_page&quot;: 12,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: null,
    &quot;total&quot;: 0
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-category--categorySlug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-category--categorySlug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-category--categorySlug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-category--categorySlug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-category--categorySlug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-category--categorySlug-" data-method="GET"
      data-path="api/products/category/{categorySlug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-category--categorySlug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-category--categorySlug-"
                    onclick="tryItOut('GETapi-products-category--categorySlug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-category--categorySlug-"
                    onclick="cancelTryOut('GETapi-products-category--categorySlug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-category--categorySlug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/category/{categorySlug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-category--categorySlug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products-category--categorySlug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>categorySlug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categorySlug"                data-endpoint="GETapi-products-category--categorySlug-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products-brand--brandSlug-">Get products by brand slug</h2>

<p>
</p>



<span id="example-requests-GETapi-products-brand--brandSlug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products/brand/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/brand/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-brand--brandSlug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [],
    &quot;first_page_url&quot;: &quot;http://localhost/api/products/brand/1?page=1&quot;,
    &quot;from&quot;: null,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/products/brand/1?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products/brand/1?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/products/brand/1&quot;,
    &quot;per_page&quot;: 12,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: null,
    &quot;total&quot;: 0
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-brand--brandSlug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-brand--brandSlug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-brand--brandSlug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-brand--brandSlug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-brand--brandSlug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-brand--brandSlug-" data-method="GET"
      data-path="api/products/brand/{brandSlug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-brand--brandSlug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-brand--brandSlug-"
                    onclick="tryItOut('GETapi-products-brand--brandSlug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-brand--brandSlug-"
                    onclick="cancelTryOut('GETapi-products-brand--brandSlug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-brand--brandSlug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/brand/{brandSlug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-brand--brandSlug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products-brand--brandSlug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>brandSlug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="brandSlug"                data-endpoint="GETapi-products-brand--brandSlug-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products-search">Search products</h2>

<p>
</p>



<span id="example-requests-GETapi-products-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products-search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products-search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-search">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Search query is required&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-search" data-method="GET"
      data-path="api/products-search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-search"
                    onclick="tryItOut('GETapi-products-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-search"
                    onclick="cancelTryOut('GETapi-products-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products-search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-products-on-sale">Get products currently on sale</h2>

<p>
</p>



<span id="example-requests-GETapi-products-on-sale">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products-on-sale" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products-on-sale"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products-on-sale">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 6,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 10,
            &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
            &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
            &quot;price&quot;: &quot;1562024.00&quot;,
            &quot;quantity&quot;: 72,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 20,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 6,
                &quot;original_price&quot;: &quot;1562024.00&quot;,
                &quot;sale_price&quot;: &quot;1062176.32&quot;,
                &quot;discount_percentage&quot;: &quot;32.00&quot;,
                &quot;discount_amount&quot;: &quot;499847.68&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 18,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
            &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
            &quot;price&quot;: &quot;1608008.00&quot;,
            &quot;quantity&quot;: 18,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
            &quot;color&quot;: &quot;Xanh&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 21,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 9,
                &quot;original_price&quot;: &quot;1608008.00&quot;,
                &quot;sale_price&quot;: &quot;1125605.60&quot;,
                &quot;discount_percentage&quot;: &quot;30.00&quot;,
                &quot;discount_amount&quot;: &quot;482402.40&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 48,
                &quot;sold_quantity&quot;: 4,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 1,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo JanSport SuperBreak Classic&quot;,
            &quot;description&quot;: &quot;Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung t&iacute;ch 25L ph&ugrave; hợp cho việc đi học h&agrave;ng ng&agrave;y.&quot;,
            &quot;price&quot;: &quot;899000.00&quot;,
            &quot;quantity&quot;: 50,
            &quot;image&quot;: &quot;products/balo-jansport-superbreak-classic.jpg&quot;,
            &quot;slug&quot;: &quot;balo-jansport-superbreak-classic&quot;,
            &quot;color&quot;: &quot;Đen&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 17,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 1,
                &quot;original_price&quot;: &quot;899000.00&quot;,
                &quot;sale_price&quot;: &quot;683240.00&quot;,
                &quot;discount_percentage&quot;: &quot;24.00&quot;,
                &quot;discount_amount&quot;: &quot;215760.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 31,
                &quot;sold_quantity&quot;: 0,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 6,
            &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
            &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
            &quot;price&quot;: &quot;1800000.00&quot;,
            &quot;quantity&quot;: 35,
            &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
            &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
            &quot;color&quot;: &quot;N&acirc;u&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Herschel&quot;,
                &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
                &quot;slug&quot;: &quot;herschel&quot;,
                &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 19,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 5,
                &quot;original_price&quot;: &quot;1800000.00&quot;,
                &quot;sale_price&quot;: &quot;1260000.00&quot;,
                &quot;discount_percentage&quot;: &quot;30.00&quot;,
                &quot;discount_amount&quot;: &quot;540000.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 45,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
            &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
            &quot;price&quot;: &quot;1683107.00&quot;,
            &quot;quantity&quot;: 28,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
            &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
            &quot;color&quot;: &quot;Hồng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 14,
                &quot;sale_campaign_id&quot;: 2,
                &quot;product_id&quot;: 10,
                &quot;original_price&quot;: &quot;1683107.00&quot;,
                &quot;sale_price&quot;: &quot;1144512.76&quot;,
                &quot;discount_percentage&quot;: &quot;32.00&quot;,
                &quot;discount_amount&quot;: &quot;538594.24&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 31,
                &quot;sold_quantity&quot;: 1,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
                    &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
                    &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: true,
                    &quot;priority&quot;: 90,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;flash-sale&quot;,
                            &quot;weekend&quot;,
                            &quot;quick-sale&quot;
                        ],
                        &quot;color&quot;: &quot;#ff6b35&quot;,
                        &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
            &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
            &quot;price&quot;: &quot;1200000.00&quot;,
            &quot;quantity&quot;: 30,
            &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
            &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
            &quot;color&quot;: &quot;Xanh Navy&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 18,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 2,
                &quot;original_price&quot;: &quot;1200000.00&quot;,
                &quot;sale_price&quot;: &quot;936000.00&quot;,
                &quot;discount_percentage&quot;: &quot;22.00&quot;,
                &quot;discount_amount&quot;: &quot;264000.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 32,
                &quot;sold_quantity&quot;: 1,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 5,
            &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
            &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
            &quot;price&quot;: &quot;935683.00&quot;,
            &quot;quantity&quot;: 47,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
            &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
            &quot;color&quot;: &quot;Hồng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;The North Face&quot;,
                &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                &quot;slug&quot;: &quot;the-north-face&quot;,
                &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 23,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 15,
                &quot;original_price&quot;: &quot;935683.00&quot;,
                &quot;sale_price&quot;: &quot;720475.91&quot;,
                &quot;discount_percentage&quot;: &quot;23.00&quot;,
                &quot;discount_amount&quot;: &quot;215207.09&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 48,
                &quot;sold_quantity&quot;: 0,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 3,
            &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
            &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
            &quot;price&quot;: &quot;1328286.00&quot;,
            &quot;quantity&quot;: 25,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
            &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
            &quot;color&quot;: &quot;Đen&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Samsonite&quot;,
                &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                &quot;slug&quot;: &quot;samsonite&quot;,
                &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 22,
                &quot;sale_campaign_id&quot;: 3,
                &quot;product_id&quot;: 13,
                &quot;original_price&quot;: &quot;1328286.00&quot;,
                &quot;sale_price&quot;: &quot;863385.90&quot;,
                &quot;discount_percentage&quot;: &quot;35.00&quot;,
                &quot;discount_amount&quot;: &quot;464900.10&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 50,
                &quot;sold_quantity&quot;: 0,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
                    &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
                    &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: false,
                    &quot;priority&quot;: 70,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;student&quot;,
                            &quot;education&quot;,
                            &quot;long-term&quot;
                        ],
                        &quot;color&quot;: &quot;#4285f4&quot;,
                        &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 3,
            &quot;name&quot;: &quot;Balo Samsonite Guardit 2.0&quot;,
            &quot;description&quot;: &quot;Balo du lịch cao cấp với ngăn laptop 15.6\&quot;, chống thấm nước. Thiết kế sang trọng, ph&ugrave; hợp cho c&ocirc;ng t&aacute;c.&quot;,
            &quot;price&quot;: &quot;3200000.00&quot;,
            &quot;quantity&quot;: 20,
            &quot;image&quot;: &quot;products/balo-samsonite-guardit-20.jpg&quot;,
            &quot;slug&quot;: &quot;balo-samsonite-guardit-20&quot;,
            &quot;color&quot;: &quot;Đen&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Samsonite&quot;,
                &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                &quot;slug&quot;: &quot;samsonite&quot;,
                &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 11,
                &quot;sale_campaign_id&quot;: 2,
                &quot;product_id&quot;: 4,
                &quot;original_price&quot;: &quot;3200000.00&quot;,
                &quot;sale_price&quot;: &quot;2016000.00&quot;,
                &quot;discount_percentage&quot;: &quot;37.00&quot;,
                &quot;discount_amount&quot;: &quot;1184000.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 41,
                &quot;sold_quantity&quot;: 5,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
                    &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
                    &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: true,
                    &quot;priority&quot;: 90,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;flash-sale&quot;,
                            &quot;weekend&quot;,
                            &quot;quick-sale&quot;
                        ],
                        &quot;color&quot;: &quot;#ff6b35&quot;,
                        &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 5,
            &quot;name&quot;: &quot;Balo The North Face Borealis 28L&quot;,
            &quot;description&quot;: &quot;Balo trekking chuy&ecirc;n nghiệp với nhiều ngăn tiện &iacute;ch, d&acirc;y đeo thoải m&aacute;i. L&yacute; tưởng cho c&aacute;c chuyến du lịch ngắn ng&agrave;y.&quot;,
            &quot;price&quot;: &quot;2500000.00&quot;,
            &quot;quantity&quot;: 25,
            &quot;image&quot;: &quot;products/balo-the-north-face-borealis-28l.jpg&quot;,
            &quot;slug&quot;: &quot;balo-the-north-face-borealis-28l&quot;,
            &quot;color&quot;: &quot;X&aacute;m&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;The North Face&quot;,
                &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                &quot;slug&quot;: &quot;the-north-face&quot;,
                &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;current_sale&quot;: {
                &quot;id&quot;: 10,
                &quot;sale_campaign_id&quot;: 2,
                &quot;product_id&quot;: 3,
                &quot;original_price&quot;: &quot;2500000.00&quot;,
                &quot;sale_price&quot;: &quot;1550000.00&quot;,
                &quot;discount_percentage&quot;: &quot;38.00&quot;,
                &quot;discount_amount&quot;: &quot;950000.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 47,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;sale_campaign&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
                    &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
                    &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
                    &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
                    &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;is_featured&quot;: true,
                    &quot;priority&quot;: 90,
                    &quot;metadata&quot;: {
                        &quot;tags&quot;: [
                            &quot;flash-sale&quot;,
                            &quot;weekend&quot;,
                            &quot;quick-sale&quot;
                        ],
                        &quot;color&quot;: &quot;#ff6b35&quot;,
                        &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
                    },
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            }
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/products-on-sale?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/products-on-sale?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/products-on-sale?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/products-on-sale&quot;,
    &quot;per_page&quot;: 12,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 10,
    &quot;total&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products-on-sale" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products-on-sale"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-on-sale"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products-on-sale" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-on-sale">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products-on-sale" data-method="GET"
      data-path="api/products-on-sale"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products-on-sale', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products-on-sale"
                    onclick="tryItOut('GETapi-products-on-sale');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products-on-sale"
                    onclick="cancelTryOut('GETapi-products-on-sale');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products-on-sale"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products-on-sale</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products-on-sale"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products-on-sale"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-products--product_id--sale-campaigns">Get sale campaigns for specific product</h2>

<p>
</p>



<span id="example-requests-GETapi-products--product_id--sale-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products/1/sale-campaigns" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products/1/sale-campaigns"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--product_id--sale-campaigns">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
            &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
            &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
            &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: false,
            &quot;priority&quot;: 70,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;student&quot;,
                    &quot;education&quot;,
                    &quot;long-term&quot;
                ],
                &quot;color&quot;: &quot;#4285f4&quot;,
                &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;pivot&quot;: {
                &quot;product_id&quot;: 1,
                &quot;sale_campaign_id&quot;: 3,
                &quot;original_price&quot;: &quot;899000.00&quot;,
                &quot;sale_price&quot;: &quot;683240.00&quot;,
                &quot;discount_percentage&quot;: &quot;24.00&quot;,
                &quot;discount_amount&quot;: &quot;215760.00&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 31,
                &quot;sold_quantity&quot;: 0,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            },
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 1,
                    &quot;original_price&quot;: &quot;899000.00&quot;,
                    &quot;sale_price&quot;: &quot;683240.00&quot;,
                    &quot;discount_percentage&quot;: &quot;24.00&quot;,
                    &quot;discount_amount&quot;: &quot;215760.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--product_id--sale-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--product_id--sale-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product_id--sale-campaigns"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--product_id--sale-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product_id--sale-campaigns">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--product_id--sale-campaigns" data-method="GET"
      data-path="api/products/{product_id}/sale-campaigns"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product_id--sale-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--product_id--sale-campaigns"
                    onclick="tryItOut('GETapi-products--product_id--sale-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--product_id--sale-campaigns"
                    onclick="cancelTryOut('GETapi-products--product_id--sale-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--product_id--sale-campaigns"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{product_id}/sale-campaigns</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--product_id--sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--product_id--sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETapi-products--product_id--sale-campaigns"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-vouchers">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-vouchers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/vouchers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vouchers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;code&quot;: &quot;WELCOME10&quot;,
            &quot;price&quot;: &quot;50000.00&quot;,
            &quot;end_at&quot;: &quot;2025-09-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 100,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;code&quot;: &quot;STUDENT15&quot;,
            &quot;price&quot;: &quot;75000.00&quot;,
            &quot;end_at&quot;: &quot;2025-12-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 200,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;code&quot;: &quot;SUMMER20&quot;,
            &quot;price&quot;: &quot;100000.00&quot;,
            &quot;end_at&quot;: &quot;2025-08-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 50,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;code&quot;: &quot;NEWUSER&quot;,
            &quot;price&quot;: &quot;30000.00&quot;,
            &quot;end_at&quot;: &quot;2026-06-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 500,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;code&quot;: &quot;LOYAL25&quot;,
            &quot;price&quot;: &quot;150000.00&quot;,
            &quot;end_at&quot;: &quot;2025-10-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 30,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;code&quot;: &quot;FLASH50&quot;,
            &quot;price&quot;: &quot;200000.00&quot;,
            &quot;end_at&quot;: &quot;2025-06-25T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 20,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/vouchers?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/vouchers?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/vouchers?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/vouchers&quot;,
    &quot;per_page&quot;: 15,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 6,
    &quot;total&quot;: 6
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vouchers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vouchers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vouchers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vouchers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vouchers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vouchers" data-method="GET"
      data-path="api/vouchers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vouchers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vouchers"
                    onclick="tryItOut('GETapi-vouchers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vouchers"
                    onclick="cancelTryOut('GETapi-vouchers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vouchers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vouchers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vouchers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vouchers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-vouchers">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-vouchers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/vouchers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"vmqeopfuudtdsufvy\",
    \"price\": 852,
    \"end_at\": \"2106-07-18\",
    \"quantity\": 45
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "vmqeopfuudtdsufvy",
    "price": 852,
    "end_at": "2106-07-18",
    "quantity": 45
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-vouchers">
</span>
<span id="execution-results-POSTapi-vouchers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-vouchers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-vouchers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-vouchers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-vouchers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-vouchers" data-method="POST"
      data-path="api/vouchers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-vouchers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-vouchers"
                    onclick="tryItOut('POSTapi-vouchers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-vouchers"
                    onclick="cancelTryOut('POSTapi-vouchers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-vouchers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/vouchers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-vouchers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-vouchers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-vouchers"
               value="vmqeopfuudtdsufvy"
               data-component="body">
    <br>
<p>Must match the regex /^[A-Z0-9]+$/. Must not be greater than 20 characters. Example: <code>vmqeopfuudtdsufvy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-vouchers"
               value="852"
               data-component="body">
    <br>
<p>Must be at least 1000. Example: <code>852</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="POSTapi-vouchers"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>now</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-vouchers"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-vouchers--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-vouchers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/vouchers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vouchers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;code&quot;: &quot;WELCOME10&quot;,
        &quot;price&quot;: &quot;50000.00&quot;,
        &quot;end_at&quot;: &quot;2025-09-18T02:22:19.000000Z&quot;,
        &quot;quantity&quot;: 100,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vouchers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vouchers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vouchers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vouchers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vouchers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vouchers--id-" data-method="GET"
      data-path="api/vouchers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vouchers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vouchers--id-"
                    onclick="tryItOut('GETapi-vouchers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vouchers--id-"
                    onclick="cancelTryOut('GETapi-vouchers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vouchers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vouchers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-vouchers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the voucher. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-vouchers--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-vouchers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/vouchers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"vmqeopfuudtdsufvy\",
    \"price\": 852,
    \"end_at\": \"2106-07-18\",
    \"quantity\": 45
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "vmqeopfuudtdsufvy",
    "price": 852,
    "end_at": "2106-07-18",
    "quantity": 45
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-vouchers--id-">
</span>
<span id="execution-results-PUTapi-vouchers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-vouchers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-vouchers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-vouchers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-vouchers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-vouchers--id-" data-method="PUT"
      data-path="api/vouchers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-vouchers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-vouchers--id-"
                    onclick="tryItOut('PUTapi-vouchers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-vouchers--id-"
                    onclick="cancelTryOut('PUTapi-vouchers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-vouchers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/vouchers/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/vouchers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-vouchers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the voucher. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTapi-vouchers--id-"
               value="vmqeopfuudtdsufvy"
               data-component="body">
    <br>
<p>Must match the regex /^[A-Z0-9]+$/. Must not be greater than 20 characters. Example: <code>vmqeopfuudtdsufvy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-vouchers--id-"
               value="852"
               data-component="body">
    <br>
<p>Must be at least 1000. Example: <code>852</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_at"                data-endpoint="PUTapi-vouchers--id-"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>now</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTapi-vouchers--id-"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-vouchers--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-vouchers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/vouchers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-vouchers--id-">
</span>
<span id="execution-results-DELETEapi-vouchers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-vouchers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-vouchers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-vouchers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-vouchers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-vouchers--id-" data-method="DELETE"
      data-path="api/vouchers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-vouchers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-vouchers--id-"
                    onclick="tryItOut('DELETEapi-vouchers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-vouchers--id-"
                    onclick="cancelTryOut('DELETEapi-vouchers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-vouchers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/vouchers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-vouchers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-vouchers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the voucher. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-vouchers-validate">Validate voucher code</h2>

<p>
</p>



<span id="example-requests-POSTapi-vouchers-validate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/vouchers/validate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers/validate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-vouchers-validate">
</span>
<span id="execution-results-POSTapi-vouchers-validate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-vouchers-validate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-vouchers-validate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-vouchers-validate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-vouchers-validate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-vouchers-validate" data-method="POST"
      data-path="api/vouchers/validate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-vouchers-validate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-vouchers-validate"
                    onclick="tryItOut('POSTapi-vouchers-validate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-vouchers-validate"
                    onclick="cancelTryOut('POSTapi-vouchers-validate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-vouchers-validate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/vouchers/validate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-vouchers-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-vouchers-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-vouchers-validate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-vouchers-active">Get active vouchers for public display</h2>

<p>
</p>



<span id="example-requests-GETapi-vouchers-active">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/vouchers-active" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/vouchers-active"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vouchers-active">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 6,
            &quot;code&quot;: &quot;FLASH50&quot;,
            &quot;price&quot;: &quot;200000.00&quot;,
            &quot;end_at&quot;: &quot;2025-06-25T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 20,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;code&quot;: &quot;LOYAL25&quot;,
            &quot;price&quot;: &quot;150000.00&quot;,
            &quot;end_at&quot;: &quot;2025-10-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 30,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;code&quot;: &quot;SUMMER20&quot;,
            &quot;price&quot;: &quot;100000.00&quot;,
            &quot;end_at&quot;: &quot;2025-08-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 50,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;code&quot;: &quot;STUDENT15&quot;,
            &quot;price&quot;: &quot;75000.00&quot;,
            &quot;end_at&quot;: &quot;2025-12-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 200,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;code&quot;: &quot;WELCOME10&quot;,
            &quot;price&quot;: &quot;50000.00&quot;,
            &quot;end_at&quot;: &quot;2025-09-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 100,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;code&quot;: &quot;NEWUSER&quot;,
            &quot;price&quot;: &quot;30000.00&quot;,
            &quot;end_at&quot;: &quot;2026-06-18T02:22:19.000000Z&quot;,
            &quot;quantity&quot;: 500,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vouchers-active" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vouchers-active"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vouchers-active"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vouchers-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vouchers-active">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vouchers-active" data-method="GET"
      data-path="api/vouchers-active"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vouchers-active', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vouchers-active"
                    onclick="tryItOut('GETapi-vouchers-active');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vouchers-active"
                    onclick="cancelTryOut('GETapi-vouchers-active');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vouchers-active"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vouchers-active</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vouchers-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vouchers-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-comments">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-comments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 25,
            &quot;product_id&quot;: 47,
            &quot;user_id&quot;: 4,
            &quot;comment&quot;: &quot;Balo đẹp, đ&uacute;ng như m&ocirc; tả. Sẽ mua lại!&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Trần Thị B&igrave;nh&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 47,
                &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face aspernatur&quot;
            }
        },
        {
            &quot;id&quot;: 81,
            &quot;product_id&quot;: 19,
            &quot;user_id&quot;: 16,
            &quot;comment&quot;: &quot;Chất liệu bền, thiết kế đẹp mắt.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Rossie Altenwerth&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 19,
                &quot;name&quot;: &quot;T&uacute;i Adidas Classic at&quot;
            }
        },
        {
            &quot;id&quot;: 82,
            &quot;product_id&quot;: 22,
            &quot;user_id&quot;: 3,
            &quot;comment&quot;: &quot;Sản phẩm rất chất lượng, giao h&agrave;ng nhanh!&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Nguyễn Văn An&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 22,
                &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face ut&quot;
            }
        },
        {
            &quot;id&quot;: 83,
            &quot;product_id&quot;: 4,
            &quot;user_id&quot;: 1,
            &quot;comment&quot;: &quot;Balo đẹp, gi&aacute; tốt, recommend!&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin BaloZone&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Balo Samsonite Guardit 2.0&quot;
            }
        },
        {
            &quot;id&quot;: 84,
            &quot;product_id&quot;: 30,
            &quot;user_id&quot;: 7,
            &quot;comment&quot;: &quot;Balo đẹp, đ&uacute;ng như m&ocirc; tả. Sẽ mua lại!&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Ho&agrave;ng Văn Em&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 30,
                &quot;name&quot;: &quot;Balo Gaming RGB sunt&quot;
            }
        },
        {
            &quot;id&quot;: 85,
            &quot;product_id&quot;: 47,
            &quot;user_id&quot;: 10,
            &quot;comment&quot;: &quot;Balo to vừa phải, ph&ugrave; hợp đi học.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Chasity Klein&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 47,
                &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face aspernatur&quot;
            }
        },
        {
            &quot;id&quot;: 86,
            &quot;product_id&quot;: 28,
            &quot;user_id&quot;: 15,
            &quot;comment&quot;: &quot;Gi&aacute; cả hợp l&yacute;, quality tốt.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 15,
                &quot;name&quot;: &quot;Dr. Nestor Renner&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;Balo Thể Thao Nike Air dolorum&quot;
            }
        },
        {
            &quot;id&quot;: 87,
            &quot;product_id&quot;: 41,
            &quot;user_id&quot;: 3,
            &quot;comment&quot;: &quot;Ngăn laptop được bảo vệ tốt.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Nguyễn Văn An&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 41,
                &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;
            }
        },
        {
            &quot;id&quot;: 89,
            &quot;product_id&quot;: 43,
            &quot;user_id&quot;: 4,
            &quot;comment&quot;: &quot;Kh&oacute;a k&eacute;o bền, mở đ&oacute;ng mượt m&agrave;.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Trần Thị B&igrave;nh&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 43,
                &quot;name&quot;: &quot;Balo Leo N&uacute;i The North Face sit&quot;
            }
        },
        {
            &quot;id&quot;: 90,
            &quot;product_id&quot;: 38,
            &quot;user_id&quot;: 4,
            &quot;comment&quot;: &quot;Ngăn laptop được bảo vệ tốt.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Trần Thị B&igrave;nh&quot;
            },
            &quot;product&quot;: {
                &quot;id&quot;: 38,
                &quot;name&quot;: &quot;Balo Nike Sportswear fugit&quot;
            }
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/comments?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 10,
    &quot;last_page_url&quot;: &quot;http://localhost/api/comments?page=10&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=2&quot;,
            &quot;label&quot;: &quot;2&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=3&quot;,
            &quot;label&quot;: &quot;3&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=4&quot;,
            &quot;label&quot;: &quot;4&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=5&quot;,
            &quot;label&quot;: &quot;5&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=6&quot;,
            &quot;label&quot;: &quot;6&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=7&quot;,
            &quot;label&quot;: &quot;7&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=8&quot;,
            &quot;label&quot;: &quot;8&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=9&quot;,
            &quot;label&quot;: &quot;9&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=10&quot;,
            &quot;label&quot;: &quot;10&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments?page=2&quot;,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: &quot;http://localhost/api/comments?page=2&quot;,
    &quot;path&quot;: &quot;http://localhost/api/comments&quot;,
    &quot;per_page&quot;: 10,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 10,
    &quot;total&quot;: 100
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comments" data-method="GET"
      data-path="api/comments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comments"
                    onclick="tryItOut('GETapi-comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comments"
                    onclick="cancelTryOut('GETapi-comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-comments">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"product_id\": \"consequatur\",
    \"comment\": \"mqeopfuudtdsufvyvddqa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": "consequatur",
    "comment": "mqeopfuudtdsufvyvddqa"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-comments">
</span>
<span id="execution-results-POSTapi-comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-comments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-comments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-comments" data-method="POST"
      data-path="api/comments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-comments"
                    onclick="tryItOut('POSTapi-comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-comments"
                    onclick="cancelTryOut('POSTapi-comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-comments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/comments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_id"                data-endpoint="POSTapi-comments"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-comments"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must be at least 10 characters. Must not be greater than 1000 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-comments--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/comments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-comments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;product_id&quot;: 37,
        &quot;user_id&quot;: 12,
        &quot;comment&quot;: &quot;Balo to vừa phải, ph&ugrave; hợp đi học.&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:22.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Prof. Garland Conn&quot;
        },
        &quot;product&quot;: {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air excepturi&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-excepturi-9172&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comments--id-" data-method="GET"
      data-path="api/comments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comments--id-"
                    onclick="tryItOut('GETapi-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comments--id-"
                    onclick="cancelTryOut('GETapi-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-comments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the comment. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-comments--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/comments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"product_id\": \"consequatur\",
    \"comment\": \"mqeopfuudtdsufvyvddqa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": "consequatur",
    "comment": "mqeopfuudtdsufvyvddqa"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-comments--id-">
</span>
<span id="execution-results-PUTapi-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-comments--id-" data-method="PUT"
      data-path="api/comments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-comments--id-"
                    onclick="tryItOut('PUTapi-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-comments--id-"
                    onclick="cancelTryOut('PUTapi-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/comments/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-comments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the comment. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_id"                data-endpoint="PUTapi-comments--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="PUTapi-comments--id-"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must be at least 10 characters. Must not be greater than 1000 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-comments--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/comments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-comments--id-">
</span>
<span id="execution-results-DELETEapi-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-comments--id-" data-method="DELETE"
      data-path="api/comments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-comments--id-"
                    onclick="tryItOut('DELETEapi-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-comments--id-"
                    onclick="cancelTryOut('DELETEapi-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-comments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the comment. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-comments-product--productId-">Get comments for a specific product</h2>

<p>
</p>



<span id="example-requests-GETapi-comments-product--productId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/comments/product/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/comments/product/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-comments-product--productId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 21,
            &quot;product_id&quot;: 1,
            &quot;user_id&quot;: 13,
            &quot;comment&quot;: &quot;Sản phẩm rất chất lượng, giao h&agrave;ng nhanh!&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 13,
                &quot;name&quot;: &quot;Jennie D&#039;Amore&quot;
            }
        },
        {
            &quot;id&quot;: 75,
            &quot;product_id&quot;: 1,
            &quot;user_id&quot;: 22,
            &quot;comment&quot;: &quot;M&igrave;nh rất h&agrave;i l&ograve;ng với sản phẩm n&agrave;y.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 22,
                &quot;name&quot;: &quot;Prof. Mohammad Kohler II&quot;
            }
        },
        {
            &quot;id&quot;: 99,
            &quot;product_id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;comment&quot;: &quot;Shop giao h&agrave;ng nhanh, đ&oacute;ng g&oacute;i cẩn thận.&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Admin BaloZone&quot;
            }
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/comments/product/1?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/comments/product/1?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/comments/product/1?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/comments/product/1&quot;,
    &quot;per_page&quot;: 10,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 3,
    &quot;total&quot;: 3
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comments-product--productId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comments-product--productId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comments-product--productId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comments-product--productId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comments-product--productId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comments-product--productId-" data-method="GET"
      data-path="api/comments/product/{productId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comments-product--productId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comments-product--productId-"
                    onclick="tryItOut('GETapi-comments-product--productId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comments-product--productId-"
                    onclick="cancelTryOut('GETapi-comments-product--productId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comments-product--productId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comments/product/{productId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comments-product--productId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comments-product--productId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>productId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="productId"                data-endpoint="GETapi-comments-product--productId-"
               value="1"
               data-component="url">
    <br>
<p>Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-my-comments">Get user&#039;s comments</h2>

<p>
</p>



<span id="example-requests-GETapi-my-comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/my-comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/my-comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-my-comments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-my-comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-my-comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-my-comments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-my-comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-my-comments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-my-comments" data-method="GET"
      data-path="api/my-comments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-my-comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-my-comments"
                    onclick="tryItOut('GETapi-my-comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-my-comments"
                    onclick="cancelTryOut('GETapi-my-comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-my-comments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/my-comments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-my-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-my-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-orders">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders" data-method="GET"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders"
                    onclick="tryItOut('GETapi-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders"
                    onclick="cancelTryOut('GETapi-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-orders">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"address_id\": \"consequatur\",
    \"payment_method_id\": \"consequatur\",
    \"comment\": \"mqeopfuudtdsufvyvddqa\",
    \"items\": [
        {
            \"product_id\": \"consequatur\",
            \"quantity\": 45
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "address_id": "consequatur",
    "payment_method_id": "consequatur",
    "comment": "mqeopfuudtdsufvyvddqa",
    "items": [
        {
            "product_id": "consequatur",
            "quantity": 45
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-orders">
</span>
<span id="execution-results-POSTapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-orders" data-method="POST"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-orders"
                    onclick="tryItOut('POSTapi-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-orders"
                    onclick="cancelTryOut('POSTapi-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address_id"                data-endpoint="POSTapi-orders"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the address_books table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_method_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_method_id"                data-endpoint="POSTapi-orders"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the payment_methods table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>voucher_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="voucher_id"                data-endpoint="POSTapi-orders"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the vouchers table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-orders"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>items</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
<br>
<p>Must have at least 1 items.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="items.0.product_id"                data-endpoint="POSTapi-orders"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="items.0.quantity"                data-endpoint="POSTapi-orders"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-orders--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders--id-" data-method="GET"
      data-path="api/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders--id-"
                    onclick="tryItOut('GETapi-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders--id-"
                    onclick="cancelTryOut('GETapi-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-orders--order_id--cancel">Cancel order (only pending orders)</h2>

<p>
</p>



<span id="example-requests-POSTapi-orders--order_id--cancel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/orders/1/cancel" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/orders/1/cancel"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-orders--order_id--cancel">
</span>
<span id="execution-results-POSTapi-orders--order_id--cancel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-orders--order_id--cancel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders--order_id--cancel"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-orders--order_id--cancel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders--order_id--cancel">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-orders--order_id--cancel" data-method="POST"
      data-path="api/orders/{order_id}/cancel"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders--order_id--cancel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-orders--order_id--cancel"
                    onclick="tryItOut('POSTapi-orders--order_id--cancel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-orders--order_id--cancel"
                    onclick="cancelTryOut('POSTapi-orders--order_id--cancel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-orders--order_id--cancel"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/orders/{order_id}/cancel</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-orders--order_id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-orders--order_id--cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="POSTapi-orders--order_id--cancel"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-orders-stats">Get order statistics for user</h2>

<p>
</p>



<span id="example-requests-GETapi-orders-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/orders-stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/orders-stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders-stats" data-method="GET"
      data-path="api/orders-stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders-stats"
                    onclick="tryItOut('GETapi-orders-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders-stats"
                    onclick="cancelTryOut('GETapi-orders-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders-stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-profile">Get user profile</h2>

<p>
</p>



<span id="example-requests-GETapi-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-profile" data-method="GET"
      data-path="api/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile"
                    onclick="tryItOut('GETapi-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile"
                    onclick="cancelTryOut('GETapi-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-profile">Update user profile</h2>

<p>
</p>



<span id="example-requests-PUTapi-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"phone\": \"hfqcoynlazghdtqtq\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "phone": "hfqcoynlazghdtqtq"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-profile">
</span>
<span id="execution-results-PUTapi-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-profile" data-method="PUT"
      data-path="api/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-profile"
                    onclick="tryItOut('PUTapi-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-profile"
                    onclick="cancelTryOut('PUTapi-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-profile"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-profile"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-profile"
               value="hfqcoynlazghdtqtq"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>hfqcoynlazghdtqtq</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-change-password">Change password</h2>

<p>
</p>



<span id="example-requests-POSTapi-change-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/change-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"consequatur\",
    \"new_password\": \"mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/change-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "consequatur",
    "new_password": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-change-password">
</span>
<span id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-change-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-change-password" data-method="POST"
      data-path="api/change-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-change-password"
                    onclick="tryItOut('POSTapi-change-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-change-password"
                    onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-change-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/change-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-change-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-change-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="POSTapi-change-password"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="POSTapi-change-password"
               value="mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-user-stats">Get user statistics</h2>

<p>
</p>



<span id="example-requests-GETapi-user-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user-stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user-stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user-stats" data-method="GET"
      data-path="api/user-stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-stats"
                    onclick="tryItOut('GETapi-user-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-stats"
                    onclick="cancelTryOut('GETapi-user-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user-stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEapi-delete-account">Delete account</h2>

<p>
</p>



<span id="example-requests-DELETEapi-delete-account">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/delete-account" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"password\": \"O[2UZ5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/delete-account"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "O[2UZ5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-delete-account">
</span>
<span id="execution-results-DELETEapi-delete-account" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-delete-account"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-delete-account"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-delete-account" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-delete-account">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-delete-account" data-method="DELETE"
      data-path="api/delete-account"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-delete-account', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-delete-account"
                    onclick="tryItOut('DELETEapi-delete-account');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-delete-account"
                    onclick="cancelTryOut('DELETEapi-delete-account');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-delete-account"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/delete-account</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-delete-account"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-delete-account"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="DELETEapi-delete-account"
               value="O[2UZ5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Example: <code>O[2UZ5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-address-books">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-address-books">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/address-books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/address-books"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-address-books">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-address-books" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-address-books"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-address-books"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-address-books" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-address-books">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-address-books" data-method="GET"
      data-path="api/address-books"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-address-books', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-address-books"
                    onclick="tryItOut('GETapi-address-books');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-address-books"
                    onclick="cancelTryOut('GETapi-address-books');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-address-books"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/address-books</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-address-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-address-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-address-books">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-address-books">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/address-books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"postal_code\": \"vmqeopfuu\",
    \"address\": \"dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr\",
    \"receiver_name\": \"byickznkygloigmkwxphl\",
    \"receiver_phone\": \"vazjrcnfbaqyw\",
    \"is_default\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/address-books"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "postal_code": "vmqeopfuu",
    "address": "dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr",
    "receiver_name": "byickznkygloigmkwxphl",
    "receiver_phone": "vazjrcnfbaqyw",
    "is_default": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-address-books">
</span>
<span id="execution-results-POSTapi-address-books" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-address-books"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-address-books"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-address-books" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-address-books">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-address-books" data-method="POST"
      data-path="api/address-books"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-address-books', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-address-books"
                    onclick="tryItOut('POSTapi-address-books');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-address-books"
                    onclick="cancelTryOut('POSTapi-address-books');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-address-books"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/address-books</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-address-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-address-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="POSTapi-address-books"
               value="vmqeopfuu"
               data-component="body">
    <br>
<p>Must match the regex /^[0-9]{5,10}$/. Must not be greater than 10 characters. Example: <code>vmqeopfuu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-address-books"
               value="dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Must be at least 10 characters. Example: <code>dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>receiver_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="receiver_name"                data-endpoint="POSTapi-address-books"
               value="byickznkygloigmkwxphl"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>byickznkygloigmkwxphl</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>receiver_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="receiver_phone"                data-endpoint="POSTapi-address-books"
               value="vazjrcnfbaqyw"
               data-component="body">
    <br>
<p>Must match the regex /^[0-9+-\s()]+$/. Must not be greater than 15 characters. Example: <code>vazjrcnfbaqyw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_default</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-address-books" style="display: none">
            <input type="radio" name="is_default"
                   value="true"
                   data-endpoint="POSTapi-address-books"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-address-books" style="display: none">
            <input type="radio" name="is_default"
                   value="false"
                   data-endpoint="POSTapi-address-books"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-address-books--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-address-books--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/address-books/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/address-books/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-address-books--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-address-books--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-address-books--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-address-books--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-address-books--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-address-books--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-address-books--id-" data-method="GET"
      data-path="api/address-books/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-address-books--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-address-books--id-"
                    onclick="tryItOut('GETapi-address-books--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-address-books--id-"
                    onclick="cancelTryOut('GETapi-address-books--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-address-books--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/address-books/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-address-books--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address book. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-address-books--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-address-books--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/address-books/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"postal_code\": \"vmqeopfuu\",
    \"address\": \"dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr\",
    \"receiver_name\": \"byickznkygloigmkwxphl\",
    \"receiver_phone\": \"vazjrcnfbaqyw\",
    \"is_default\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/address-books/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "postal_code": "vmqeopfuu",
    "address": "dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr",
    "receiver_name": "byickznkygloigmkwxphl",
    "receiver_phone": "vazjrcnfbaqyw",
    "is_default": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-address-books--id-">
</span>
<span id="execution-results-PUTapi-address-books--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-address-books--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-address-books--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-address-books--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-address-books--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-address-books--id-" data-method="PUT"
      data-path="api/address-books/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-address-books--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-address-books--id-"
                    onclick="tryItOut('PUTapi-address-books--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-address-books--id-"
                    onclick="cancelTryOut('PUTapi-address-books--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-address-books--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/address-books/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/address-books/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-address-books--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address book. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>postal_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="postal_code"                data-endpoint="PUTapi-address-books--id-"
               value="vmqeopfuu"
               data-component="body">
    <br>
<p>Must match the regex /^[0-9]{5,10}$/. Must not be greater than 10 characters. Example: <code>vmqeopfuu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-address-books--id-"
               value="dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Must be at least 10 characters. Example: <code>dtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjuryvojcybzvr</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>receiver_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="receiver_name"                data-endpoint="PUTapi-address-books--id-"
               value="byickznkygloigmkwxphl"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>byickznkygloigmkwxphl</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>receiver_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="receiver_phone"                data-endpoint="PUTapi-address-books--id-"
               value="vazjrcnfbaqyw"
               data-component="body">
    <br>
<p>Must match the regex /^[0-9+-\s()]+$/. Must not be greater than 15 characters. Example: <code>vazjrcnfbaqyw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_default</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-address-books--id-" style="display: none">
            <input type="radio" name="is_default"
                   value="true"
                   data-endpoint="PUTapi-address-books--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-address-books--id-" style="display: none">
            <input type="radio" name="is_default"
                   value="false"
                   data-endpoint="PUTapi-address-books--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-address-books--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-address-books--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/address-books/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/address-books/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-address-books--id-">
</span>
<span id="execution-results-DELETEapi-address-books--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-address-books--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-address-books--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-address-books--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-address-books--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-address-books--id-" data-method="DELETE"
      data-path="api/address-books/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-address-books--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-address-books--id-"
                    onclick="tryItOut('DELETEapi-address-books--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-address-books--id-"
                    onclick="cancelTryOut('DELETEapi-address-books--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-address-books--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/address-books/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-address-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-address-books--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the address book. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-news">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-news">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/news" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/news"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Top 10 Balo Học Sinh Được Y&ecirc;u Th&iacute;ch Nhất 2025&quot;,
            &quot;description&quot;: &quot;Kh&aacute;m ph&aacute; những mẫu balo học sinh hot nhất năm 2025 với thiết kế trẻ trung, chất lượng cao v&agrave; gi&aacute; cả phải chăng. Từ c&aacute;c thương hiệu nổi tiếng như Nike, Adidas đến JanSport.&quot;,
            &quot;thumbnail&quot;: &quot;news/top-10-balo-hoc-sinh-2025.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Hướng Dẫn Chọn Balo Du Lịch Ph&ugrave; Hợp&quot;,
            &quot;description&quot;: &quot;B&iacute; quyết chọn balo du lịch ph&ugrave; hợp cho từng loại h&igrave;nh du lịch. T&igrave;m hiểu về dung t&iacute;ch, chất liệu, t&iacute;nh năng v&agrave; c&aacute;ch bảo quản balo để c&oacute; những chuyến đi tuyệt vời.&quot;,
            &quot;thumbnail&quot;: &quot;news/huong-dan-chon-balo-du-lich.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Xu Hướng Thời Trang Balo 2025&quot;,
            &quot;description&quot;: &quot;Cập nhật những xu hướng mới nhất trong thiết kế balo năm 2025. Từ m&agrave;u sắc pastel nhẹ nh&agrave;ng đến thiết kế minimalist hiện đại, tất cả đều c&oacute; tại BaloZone.&quot;,
            &quot;thumbnail&quot;: &quot;news/xu-huong-thoi-trang-balo-2025.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;C&aacute;ch Bảo Quản Balo Để Bền L&acirc;u&quot;,
            &quot;description&quot;: &quot;Chia sẻ những mẹo hay để bảo quản balo của bạn lu&ocirc;n như mới. Từ c&aacute;ch vệ sinh, sắp xếp đồ đạc đến c&aacute;ch bảo quản khi kh&ocirc;ng sử dụng.&quot;,
            &quot;thumbnail&quot;: &quot;news/cach-bao-quan-balo.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Review Chi Tiết Balo The North Face Borealis&quot;,
            &quot;description&quot;: &quot;Đ&aacute;nh gi&aacute; chi tiết về mẫu balo The North Face Borealis 28L - lựa chọn h&agrave;ng đầu cho c&aacute;c chuyến trekking v&agrave; du lịch ngắn ng&agrave;y. Ưu nhược điểm v&agrave; so s&aacute;nh gi&aacute; cả.&quot;,
            &quot;thumbnail&quot;: &quot;news/review-tnf-borealis.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;So S&aacute;nh Balo Nike vs Adidas: Đ&acirc;u L&agrave; Lựa Chọn Tốt?&quot;,
            &quot;description&quot;: &quot;Ph&acirc;n t&iacute;ch chi tiết ưu nhược điểm của balo Nike v&agrave; Adidas. Gi&uacute;p bạn đưa ra quyết định đ&uacute;ng đắn khi lựa chọn giữa hai thương hiệu thể thao h&agrave;ng đầu thế giới.&quot;,
            &quot;thumbnail&quot;: &quot;news/so-sanh-nike-vs-adidas.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;Balo Laptop: Lựa Chọn Ho&agrave;n Hảo Cho D&acirc;n Văn Ph&ograve;ng&quot;,
            &quot;description&quot;: &quot;T&igrave;m hiểu về những mẫu balo laptop chất lượng cao, ph&ugrave; hợp cho d&acirc;n văn ph&ograve;ng v&agrave; sinh vi&ecirc;n. Đảm bảo bảo vệ tối đa cho thiết bị c&ocirc;ng nghệ của bạn.&quot;,
            &quot;thumbnail&quot;: &quot;news/balo-laptop-van-phong.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;Sale Khủng Th&aacute;ng 6: Giảm Gi&aacute; Đến 50% To&agrave;n Bộ Balo&quot;,
            &quot;description&quot;: &quot;Chương tr&igrave;nh khuyến m&atilde;i lớn nhất trong năm đ&atilde; bắt đầu! Giảm gi&aacute; l&ecirc;n đến 50% cho tất cả c&aacute;c d&ograve;ng balo. Nhanh tay sở hữu những mẫu balo y&ecirc;u th&iacute;ch với gi&aacute; ưu đ&atilde;i.&quot;,
            &quot;thumbnail&quot;: &quot;news/sale-thang-6.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;Est et error dicta similique occaecati.&quot;,
            &quot;description&quot;: &quot;Non ut dolorem tempora voluptate pariatur ut. Dolorem sed fugiat ipsum quidem dolore. Laudantium error et minima eos molestiae. Quos aperiam et cum consectetur eum exercitationem.&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/800x600.png/00aa66?text=business+dolorem&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;title&quot;: &quot;Maiores repellendus esse at deleniti dolorem perferendis assumenda cum est.&quot;,
            &quot;description&quot;: &quot;Ducimus veritatis officiis sapiente modi corrupti qui. Eum nisi doloremque ut. Maiores voluptatibus voluptas autem deleniti impedit. Officiis possimus quia mollitia quia dolores. Dolorem qui odit unde eos ipsum quam alias.&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/800x600.png/006644?text=business+sed&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/news?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 2,
    &quot;last_page_url&quot;: &quot;http://localhost/api/news?page=2&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/news?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/news?page=2&quot;,
            &quot;label&quot;: &quot;2&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/news?page=2&quot;,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: &quot;http://localhost/api/news?page=2&quot;,
    &quot;path&quot;: &quot;http://localhost/api/news&quot;,
    &quot;per_page&quot;: 10,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 10,
    &quot;total&quot;: 20
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news" data-method="GET"
      data-path="api/news"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news"
                    onclick="tryItOut('GETapi-news');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news"
                    onclick="cancelTryOut('GETapi-news');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-news--news_id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-news--news_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/news/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/news/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news--news_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Top 10 Balo Học Sinh Được Y&ecirc;u Th&iacute;ch Nhất 2025&quot;,
        &quot;description&quot;: &quot;Kh&aacute;m ph&aacute; những mẫu balo học sinh hot nhất năm 2025 với thiết kế trẻ trung, chất lượng cao v&agrave; gi&aacute; cả phải chăng. Từ c&aacute;c thương hiệu nổi tiếng như Nike, Adidas đến JanSport.&quot;,
        &quot;thumbnail&quot;: &quot;news/top-10-balo-hoc-sinh-2025.jpg&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news--news_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news--news_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news--news_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news--news_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news--news_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news--news_id-" data-method="GET"
      data-path="api/news/{news_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news--news_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news--news_id-"
                    onclick="tryItOut('GETapi-news--news_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news--news_id-"
                    onclick="cancelTryOut('GETapi-news--news_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news--news_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news/{news_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>news_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="news_id"                data-endpoint="GETapi-news--news_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the news. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-news-latest">Get latest news</h2>

<p>
</p>



<span id="example-requests-GETapi-news-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/news-latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/news-latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news-latest">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Top 10 Balo Học Sinh Được Y&ecirc;u Th&iacute;ch Nhất 2025&quot;,
            &quot;description&quot;: &quot;Kh&aacute;m ph&aacute; những mẫu balo học sinh hot nhất năm 2025 với thiết kế trẻ trung, chất lượng cao v&agrave; gi&aacute; cả phải chăng. Từ c&aacute;c thương hiệu nổi tiếng như Nike, Adidas đến JanSport.&quot;,
            &quot;thumbnail&quot;: &quot;news/top-10-balo-hoc-sinh-2025.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Hướng Dẫn Chọn Balo Du Lịch Ph&ugrave; Hợp&quot;,
            &quot;description&quot;: &quot;B&iacute; quyết chọn balo du lịch ph&ugrave; hợp cho từng loại h&igrave;nh du lịch. T&igrave;m hiểu về dung t&iacute;ch, chất liệu, t&iacute;nh năng v&agrave; c&aacute;ch bảo quản balo để c&oacute; những chuyến đi tuyệt vời.&quot;,
            &quot;thumbnail&quot;: &quot;news/huong-dan-chon-balo-du-lich.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Xu Hướng Thời Trang Balo 2025&quot;,
            &quot;description&quot;: &quot;Cập nhật những xu hướng mới nhất trong thiết kế balo năm 2025. Từ m&agrave;u sắc pastel nhẹ nh&agrave;ng đến thiết kế minimalist hiện đại, tất cả đều c&oacute; tại BaloZone.&quot;,
            &quot;thumbnail&quot;: &quot;news/xu-huong-thoi-trang-balo-2025.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;C&aacute;ch Bảo Quản Balo Để Bền L&acirc;u&quot;,
            &quot;description&quot;: &quot;Chia sẻ những mẹo hay để bảo quản balo của bạn lu&ocirc;n như mới. Từ c&aacute;ch vệ sinh, sắp xếp đồ đạc đến c&aacute;ch bảo quản khi kh&ocirc;ng sử dụng.&quot;,
            &quot;thumbnail&quot;: &quot;news/cach-bao-quan-balo.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Review Chi Tiết Balo The North Face Borealis&quot;,
            &quot;description&quot;: &quot;Đ&aacute;nh gi&aacute; chi tiết về mẫu balo The North Face Borealis 28L - lựa chọn h&agrave;ng đầu cho c&aacute;c chuyến trekking v&agrave; du lịch ngắn ng&agrave;y. Ưu nhược điểm v&agrave; so s&aacute;nh gi&aacute; cả.&quot;,
            &quot;thumbnail&quot;: &quot;news/review-tnf-borealis.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;So S&aacute;nh Balo Nike vs Adidas: Đ&acirc;u L&agrave; Lựa Chọn Tốt?&quot;,
            &quot;description&quot;: &quot;Ph&acirc;n t&iacute;ch chi tiết ưu nhược điểm của balo Nike v&agrave; Adidas. Gi&uacute;p bạn đưa ra quyết định đ&uacute;ng đắn khi lựa chọn giữa hai thương hiệu thể thao h&agrave;ng đầu thế giới.&quot;,
            &quot;thumbnail&quot;: &quot;news/so-sanh-nike-vs-adidas.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news-latest"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news-latest">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news-latest" data-method="GET"
      data-path="api/news-latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news-latest"
                    onclick="tryItOut('GETapi-news-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news-latest"
                    onclick="cancelTryOut('GETapi-news-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news-latest"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news-latest</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news-latest"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-contacts">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/contacts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"fullname\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"message\": \"hfqcoynlazghdtqtqxbaj\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/contacts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fullname": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "message": "hfqcoynlazghdtqtqxbaj"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contacts">
</span>
<span id="execution-results-POSTapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-contacts" data-method="POST"
      data-path="api/contacts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contacts"
                    onclick="tryItOut('POSTapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contacts"
                    onclick="cancelTryOut('POSTapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contacts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fullname</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fullname"                data-endpoint="POSTapi-contacts"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-contacts"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="POSTapi-contacts"
               value="hfqcoynlazghdtqtqxbaj"
               data-component="body">
    <br>
<p>Must be at least 10 characters. Must not be greater than 1000 characters. Example: <code>hfqcoynlazghdtqtqxbaj</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-contacts">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/contacts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/contacts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;fullname&quot;: &quot;Nguyễn Văn T&agrave;i&quot;,
            &quot;email&quot;: &quot;tai.nguyen@gmail.com&quot;,
            &quot;message&quot;: &quot;Xin ch&agrave;o, t&ocirc;i muốn hỏi về ch&iacute;nh s&aacute;ch đổi trả của cửa h&agrave;ng. T&ocirc;i vừa mua một chiếc balo nhưng k&iacute;ch thước kh&ocirc;ng ph&ugrave; hợp.&quot;,
            &quot;status&quot;: &quot;resolved&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;fullname&quot;: &quot;Trần Thị Lan&quot;,
            &quot;email&quot;: &quot;lan.tran@gmail.com&quot;,
            &quot;message&quot;: &quot;Balo t&ocirc;i đặt h&ocirc;m qua đ&atilde; được giao chưa ạ? T&ocirc;i cần gấp để đi c&ocirc;ng t&aacute;c.&quot;,
            &quot;status&quot;: &quot;resolved&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;fullname&quot;: &quot;L&ecirc; Văn Minh&quot;,
            &quot;email&quot;: &quot;minh.le@gmail.com&quot;,
            &quot;message&quot;: &quot;Cửa h&agrave;ng c&oacute; balo chống nước cho việc leo n&uacute;i kh&ocirc;ng? T&ocirc;i cần loại c&oacute; dung t&iacute;ch khoảng 40-50L.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;fullname&quot;: &quot;Phạm Thị Hương&quot;,
            &quot;email&quot;: &quot;huong.pham@gmail.com&quot;,
            &quot;message&quot;: &quot;Xin lỗi, t&ocirc;i nhận được balo nhưng kh&oacute;a k&eacute;o bị hỏng. Cửa h&agrave;ng c&oacute; thể hỗ trợ đổi sản phẩm kh&ocirc;ng?&quot;,
            &quot;status&quot;: &quot;resolved&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;fullname&quot;: &quot;Ho&agrave;ng Văn Đức&quot;,
            &quot;email&quot;: &quot;duc.hoang@gmail.com&quot;,
            &quot;message&quot;: &quot;T&ocirc;i muốn mua balo laptop, cửa h&agrave;ng c&oacute; những loại n&agrave;o ph&ugrave; hợp với laptop 15.6 inch?&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;fullname&quot;: &quot;Vũ Thị Mai&quot;,
            &quot;email&quot;: &quot;mai.vu@gmail.com&quot;,
            &quot;message&quot;: &quot;Cảm ơn shop đ&atilde; giao h&agrave;ng nhanh ch&oacute;ng. Balo rất đẹp v&agrave; chất lượng tốt!&quot;,
            &quot;status&quot;: &quot;resolved&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;fullname&quot;: &quot;Đinh Văn Hải&quot;,
            &quot;email&quot;: &quot;hai.dinh@gmail.com&quot;,
            &quot;message&quot;: &quot;Xin hỏi cửa h&agrave;ng c&oacute; &aacute;p dụng ch&iacute;nh s&aacute;ch giảm gi&aacute; cho kh&aacute;ch h&agrave;ng th&acirc;n thiết kh&ocirc;ng?&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;fullname&quot;: &quot;B&ugrave;i Thị Nga&quot;,
            &quot;email&quot;: &quot;nga.bui@gmail.com&quot;,
            &quot;message&quot;: &quot;T&ocirc;i cần tư vấn chọn balo ph&ugrave; hợp cho con trai lớp 6. Cảm ơn shop!&quot;,
            &quot;status&quot;: &quot;resolved&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;fullname&quot;: &quot;Demetris Botsford&quot;,
            &quot;email&quot;: &quot;zhoeger@hotmail.com&quot;,
            &quot;message&quot;: &quot;Itaque ut similique labore facilis esse facere. Est dignissimos voluptas inventore rerum accusantium optio. Illo quo quo ipsam hic. Illum a totam eius sed vel.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;fullname&quot;: &quot;Mrs. Dawn Prohaska I&quot;,
            &quot;email&quot;: &quot;cole.rocky@yahoo.com&quot;,
            &quot;message&quot;: &quot;Autem esse dignissimos sed eaque. Velit hic unde aut omnis. Dolor minus et perferendis. Consequuntur in ratione quae rerum alias necessitatibus ullam.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;fullname&quot;: &quot;Adell Waters&quot;,
            &quot;email&quot;: &quot;dedrick04@glover.com&quot;,
            &quot;message&quot;: &quot;Enim facilis consequatur quisquam quasi pariatur cumque dolorem. Incidunt corporis nesciunt culpa et. Explicabo voluptatibus quia et laborum. Fuga voluptatem esse aliquam qui deserunt.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;fullname&quot;: &quot;Kendra Hermiston&quot;,
            &quot;email&quot;: &quot;davonte.haag@yahoo.com&quot;,
            &quot;message&quot;: &quot;Ad illum molestias a placeat fugit. Repellat non dicta doloribus error. Dolorem eius debitis ut est cumque omnis illum.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;fullname&quot;: &quot;Prof. Modesta Kassulke&quot;,
            &quot;email&quot;: &quot;reinhold.champlin@yahoo.com&quot;,
            &quot;message&quot;: &quot;Error illum doloremque rerum recusandae. Reiciendis dolorum eligendi nihil deserunt. Tempore quam atque corrupti.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;fullname&quot;: &quot;Gilda Goldner&quot;,
            &quot;email&quot;: &quot;paige.wisozk@gmail.com&quot;,
            &quot;message&quot;: &quot;Quibusdam et voluptates et consequatur temporibus error quia. Saepe in libero sapiente officiis. Rerum sit libero perspiciatis magnam voluptatum.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;fullname&quot;: &quot;Miss Yolanda Feil&quot;,
            &quot;email&quot;: &quot;sadye.harvey@dietrich.com&quot;,
            &quot;message&quot;: &quot;Veniam ut commodi autem labore. Voluptatibus illum veritatis quae nihil quis veniam. Et et error quis sed. Voluptatibus ut repellat sed sint.&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/contacts?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 2,
    &quot;last_page_url&quot;: &quot;http://localhost/api/contacts?page=2&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/contacts?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/contacts?page=2&quot;,
            &quot;label&quot;: &quot;2&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/contacts?page=2&quot;,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: &quot;http://localhost/api/contacts?page=2&quot;,
    &quot;path&quot;: &quot;http://localhost/api/contacts&quot;,
    &quot;per_page&quot;: 15,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 15,
    &quot;total&quot;: 23
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contacts" data-method="GET"
      data-path="api/contacts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts"
                    onclick="tryItOut('GETapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts"
                    onclick="cancelTryOut('GETapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-contacts--contact_id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-contacts--contact_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/contacts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/contacts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts--contact_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;fullname&quot;: &quot;Nguyễn Văn T&agrave;i&quot;,
        &quot;email&quot;: &quot;tai.nguyen@gmail.com&quot;,
        &quot;message&quot;: &quot;Xin ch&agrave;o, t&ocirc;i muốn hỏi về ch&iacute;nh s&aacute;ch đổi trả của cửa h&agrave;ng. T&ocirc;i vừa mua một chiếc balo nhưng k&iacute;ch thước kh&ocirc;ng ph&ugrave; hợp.&quot;,
        &quot;status&quot;: &quot;resolved&quot;,
        &quot;created_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T02:22:23.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts--contact_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts--contact_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts--contact_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contacts--contact_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts--contact_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contacts--contact_id-" data-method="GET"
      data-path="api/contacts/{contact_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts--contact_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts--contact_id-"
                    onclick="tryItOut('GETapi-contacts--contact_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts--contact_id-"
                    onclick="cancelTryOut('GETapi-contacts--contact_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts--contact_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts/{contact_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contacts--contact_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contacts--contact_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>contact_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="contact_id"                data-endpoint="GETapi-contacts--contact_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the contact. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-sale-campaigns">Display a listing of sale campaigns.</h2>

<p>
</p>



<span id="example-requests-GETapi-sale-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sale-campaigns" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sale-campaigns">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Black Friday 2025&quot;,
            &quot;slug&quot;: &quot;black-friday-2025&quot;,
            &quot;description&quot;: &quot;Si&ecirc;u sale Black Friday - Giảm gi&aacute; khủng l&ecirc;n đến 70% tất cả sản phẩm balo&quot;,
            &quot;banner_image&quot;: &quot;campaigns/black-friday-2025.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-19T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-06-25T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: true,
            &quot;priority&quot;: 100,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;black-friday&quot;,
                    &quot;mega-sale&quot;,
                    &quot;limited-time&quot;
                ],
                &quot;color&quot;: &quot;#000000&quot;,
                &quot;description_short&quot;: &quot;Giảm gi&aacute; l&ecirc;n đến 70%&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;531088.16&quot;,
                    &quot;discount_percentage&quot;: &quot;66.00&quot;,
                    &quot;discount_amount&quot;: &quot;1030935.84&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 40,
                    &quot;sold_quantity&quot;: 4,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 2,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 8,
                    &quot;original_price&quot;: &quot;370894.00&quot;,
                    &quot;sale_price&quot;: &quot;207700.64&quot;,
                    &quot;discount_percentage&quot;: &quot;44.00&quot;,
                    &quot;discount_amount&quot;: &quot;163193.36&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 36,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 8,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 14,
                        &quot;name&quot;: &quot;Balo Học Sinh JanSport est&quot;,
                        &quot;description&quot;: &quot;Sed non nobis sapiente non sapiente et. Quasi consequuntur enim dolor. Quo est voluptas explicabo possimus quasi odit. Est eaque molestias quo natus. Quas omnis recusandae repellendus doloremque eveniet laudantium et quasi.&quot;,
                        &quot;price&quot;: &quot;370894.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0011aa?text=fashion+magni&quot;,
                        &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-est-1299&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 3,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 9,
                    &quot;original_price&quot;: &quot;1608008.00&quot;,
                    &quot;sale_price&quot;: &quot;498482.48&quot;,
                    &quot;discount_percentage&quot;: &quot;69.00&quot;,
                    &quot;discount_amount&quot;: &quot;1109525.52&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 28,
                    &quot;sold_quantity&quot;: 2,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 9,
                        &quot;category_id&quot;: 5,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                        &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                        &quot;price&quot;: &quot;1608008.00&quot;,
                        &quot;quantity&quot;: 18,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                        &quot;color&quot;: &quot;Xanh&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 4,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 10,
                    &quot;original_price&quot;: &quot;1683107.00&quot;,
                    &quot;sale_price&quot;: &quot;757398.15&quot;,
                    &quot;discount_percentage&quot;: &quot;55.00&quot;,
                    &quot;discount_amount&quot;: &quot;925708.85&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 40,
                    &quot;sold_quantity&quot;: 2,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 10,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
                        &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
                        &quot;price&quot;: &quot;1683107.00&quot;,
                        &quot;quantity&quot;: 28,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
                        &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 5,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 11,
                    &quot;original_price&quot;: &quot;1992332.00&quot;,
                    &quot;sale_price&quot;: &quot;1036012.64&quot;,
                    &quot;discount_percentage&quot;: &quot;48.00&quot;,
                    &quot;discount_amount&quot;: &quot;956319.36&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 44,
                    &quot;sold_quantity&quot;: 2,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 11,
                        &quot;category_id&quot;: 6,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
                        &quot;description&quot;: &quot;Qui ea enim earum. Deserunt commodi aliquid repellat perspiciatis sit quaerat sunt. Assumenda sit excepturi consectetur aut iure. Repellat aut velit est pariatur dolor facere sapiente. Perspiciatis animi doloribus ducimus a optio qui quisquam.&quot;,
                        &quot;price&quot;: &quot;1992332.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc77?text=fashion+quae&quot;,
                        &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-2618&quot;,
                        &quot;color&quot;: &quot;V&agrave;ng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 6,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 12,
                    &quot;original_price&quot;: &quot;1655267.00&quot;,
                    &quot;sale_price&quot;: &quot;761422.82&quot;,
                    &quot;discount_percentage&quot;: &quot;54.00&quot;,
                    &quot;discount_amount&quot;: &quot;893844.18&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 19,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 12,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 8,
                        &quot;name&quot;: &quot;Balo Gaming RGB omnis&quot;,
                        &quot;description&quot;: &quot;Accusamus commodi iure sed sapiente repellendus fugiat. Voluptas veritatis dignissimos in sint ipsum. Explicabo iste aut consequatur aut incidunt non minus assumenda. Non quos eos consequatur iste molestiae labore delectus. Cum dignissimos vel enim. Sed dolore aut quia.&quot;,
                        &quot;price&quot;: &quot;1655267.00&quot;,
                        &quot;quantity&quot;: 0,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077ff?text=fashion+tempora&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-omnis-6960&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 7,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;637577.28&quot;,
                    &quot;discount_percentage&quot;: &quot;52.00&quot;,
                    &quot;discount_amount&quot;: &quot;690708.72&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 12,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 8,
                    &quot;sale_campaign_id&quot;: 1,
                    &quot;product_id&quot;: 14,
                    &quot;original_price&quot;: &quot;1321639.00&quot;,
                    &quot;sale_price&quot;: &quot;766550.62&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;555088.38&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 44,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 14,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 11,
                        &quot;name&quot;: &quot;T&uacute;i Adidas Classic facilis&quot;,
                        &quot;description&quot;: &quot;Consequatur voluptas et inventore consequatur voluptatem cupiditate laborum. Vero et amet qui qui et reprehenderit. Incidunt ipsa corporis ea. Cupiditate voluptatem sequi impedit dicta. Nulla numquam veniam ut ratione itaque.&quot;,
                        &quot;price&quot;: &quot;1321639.00&quot;,
                        &quot;quantity&quot;: 42,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/005599?text=fashion+et&quot;,
                        &quot;slug&quot;: &quot;tui-adidas-classic-facilis-7403&quot;,
                        &quot;color&quot;: &quot;X&aacute;m&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Mega Sale Khai Trương&quot;,
            &quot;slug&quot;: &quot;mega-sale-khai-truong&quot;,
            &quot;description&quot;: &quot;Mega sale khai trương cửa h&agrave;ng mới - Ưu đ&atilde;i cực sốc&quot;,
            &quot;banner_image&quot;: &quot;campaigns/mega-sale-khai-truong.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-28T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-07-05T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;is_featured&quot;: true,
            &quot;priority&quot;: 95,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;grand-opening&quot;,
                    &quot;mega-sale&quot;,
                    &quot;new-store&quot;
                ],
                &quot;color&quot;: &quot;#34a853&quot;,
                &quot;description_short&quot;: &quot;Khai trương - Giảm 80%&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 24,
                    &quot;sale_campaign_id&quot;: 4,
                    &quot;product_id&quot;: 7,
                    &quot;original_price&quot;: &quot;1169763.00&quot;,
                    &quot;sale_price&quot;: &quot;269045.49&quot;,
                    &quot;discount_percentage&quot;: &quot;77.00&quot;,
                    &quot;discount_amount&quot;: &quot;900717.51&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 28,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 7,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 8,
                        &quot;name&quot;: &quot;Balo Gaming RGB iste&quot;,
                        &quot;description&quot;: &quot;Ipsum voluptatem assumenda sed quod repellendus laborum. Suscipit ipsa ab delectus veritatis provident consectetur aliquid. Est et ut eum sunt doloribus repudiandae. Sint omnis placeat velit molestias quod.&quot;,
                        &quot;price&quot;: &quot;1169763.00&quot;,
                        &quot;quantity&quot;: 0,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/000099?text=fashion+nobis&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-iste-7686&quot;,
                        &quot;color&quot;: &quot;Xanh&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 25,
                    &quot;sale_campaign_id&quot;: 4,
                    &quot;product_id&quot;: 11,
                    &quot;original_price&quot;: &quot;1992332.00&quot;,
                    &quot;sale_price&quot;: &quot;697316.20&quot;,
                    &quot;discount_percentage&quot;: &quot;65.00&quot;,
                    &quot;discount_amount&quot;: &quot;1295015.80&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 43,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 11,
                        &quot;category_id&quot;: 6,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
                        &quot;description&quot;: &quot;Qui ea enim earum. Deserunt commodi aliquid repellat perspiciatis sit quaerat sunt. Assumenda sit excepturi consectetur aut iure. Repellat aut velit est pariatur dolor facere sapiente. Perspiciatis animi doloribus ducimus a optio qui quisquam.&quot;,
                        &quot;price&quot;: &quot;1992332.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc77?text=fashion+quae&quot;,
                        &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-2618&quot;,
                        &quot;color&quot;: &quot;V&agrave;ng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 26,
                    &quot;sale_campaign_id&quot;: 4,
                    &quot;product_id&quot;: 14,
                    &quot;original_price&quot;: &quot;1321639.00&quot;,
                    &quot;sale_price&quot;: &quot;462573.65&quot;,
                    &quot;discount_percentage&quot;: &quot;65.00&quot;,
                    &quot;discount_amount&quot;: &quot;859065.35&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 19,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 14,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 11,
                        &quot;name&quot;: &quot;T&uacute;i Adidas Classic facilis&quot;,
                        &quot;description&quot;: &quot;Consequatur voluptas et inventore consequatur voluptatem cupiditate laborum. Vero et amet qui qui et reprehenderit. Incidunt ipsa corporis ea. Cupiditate voluptatem sequi impedit dicta. Nulla numquam veniam ut ratione itaque.&quot;,
                        &quot;price&quot;: &quot;1321639.00&quot;,
                        &quot;quantity&quot;: 42,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/005599?text=fashion+et&quot;,
                        &quot;slug&quot;: &quot;tui-adidas-classic-facilis-7403&quot;,
                        &quot;color&quot;: &quot;X&aacute;m&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
            &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
            &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
            &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: true,
            &quot;priority&quot;: 90,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;flash-sale&quot;,
                    &quot;weekend&quot;,
                    &quot;quick-sale&quot;
                ],
                &quot;color&quot;: &quot;#ff6b35&quot;,
                &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 2,
                    &quot;original_price&quot;: &quot;1200000.00&quot;,
                    &quot;sale_price&quot;: &quot;672000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;44.00&quot;,
                    &quot;discount_amount&quot;: &quot;528000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 32,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 2,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                        &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                        &quot;price&quot;: &quot;1200000.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                        &quot;color&quot;: &quot;Xanh Navy&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 10,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 3,
                    &quot;original_price&quot;: &quot;2500000.00&quot;,
                    &quot;sale_price&quot;: &quot;1550000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;38.00&quot;,
                    &quot;discount_amount&quot;: &quot;950000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 47,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 3,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo The North Face Borealis 28L&quot;,
                        &quot;description&quot;: &quot;Balo trekking chuy&ecirc;n nghiệp với nhiều ngăn tiện &iacute;ch, d&acirc;y đeo thoải m&aacute;i. L&yacute; tưởng cho c&aacute;c chuyến du lịch ngắn ng&agrave;y.&quot;,
                        &quot;price&quot;: &quot;2500000.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;products/balo-the-north-face-borealis-28l.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-the-north-face-borealis-28l&quot;,
                        &quot;color&quot;: &quot;X&aacute;m&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 11,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 4,
                    &quot;original_price&quot;: &quot;3200000.00&quot;,
                    &quot;sale_price&quot;: &quot;2016000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;37.00&quot;,
                    &quot;discount_amount&quot;: &quot;1184000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 41,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 4,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Samsonite Guardit 2.0&quot;,
                        &quot;description&quot;: &quot;Balo du lịch cao cấp với ngăn laptop 15.6\&quot;, chống thấm nước. Thiết kế sang trọng, ph&ugrave; hợp cho c&ocirc;ng t&aacute;c.&quot;,
                        &quot;price&quot;: &quot;3200000.00&quot;,
                        &quot;quantity&quot;: 20,
                        &quot;image&quot;: &quot;products/balo-samsonite-guardit-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-samsonite-guardit-20&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 12,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 5,
                    &quot;original_price&quot;: &quot;1800000.00&quot;,
                    &quot;sale_price&quot;: &quot;1080000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;40.00&quot;,
                    &quot;discount_amount&quot;: &quot;720000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 5,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
                        &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
                        &quot;price&quot;: &quot;1800000.00&quot;,
                        &quot;quantity&quot;: 35,
                        &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 13,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;905973.92&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;656050.08&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 14,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 10,
                    &quot;original_price&quot;: &quot;1683107.00&quot;,
                    &quot;sale_price&quot;: &quot;1144512.76&quot;,
                    &quot;discount_percentage&quot;: &quot;32.00&quot;,
                    &quot;discount_amount&quot;: &quot;538594.24&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 10,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
                        &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
                        &quot;price&quot;: &quot;1683107.00&quot;,
                        &quot;quantity&quot;: 28,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
                        &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 15,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;770405.88&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;557880.12&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 20,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 16,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 15,
                    &quot;original_price&quot;: &quot;935683.00&quot;,
                    &quot;sale_price&quot;: &quot;598837.12&quot;,
                    &quot;discount_percentage&quot;: &quot;36.00&quot;,
                    &quot;discount_amount&quot;: &quot;336845.88&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 33,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 15,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
                        &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
                        &quot;price&quot;: &quot;935683.00&quot;,
                        &quot;quantity&quot;: 47,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
            &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
            &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
            &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: false,
            &quot;priority&quot;: 70,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;student&quot;,
                    &quot;education&quot;,
                    &quot;long-term&quot;
                ],
                &quot;color&quot;: &quot;#4285f4&quot;,
                &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 1,
                    &quot;original_price&quot;: &quot;899000.00&quot;,
                    &quot;sale_price&quot;: &quot;683240.00&quot;,
                    &quot;discount_percentage&quot;: &quot;24.00&quot;,
                    &quot;discount_amount&quot;: &quot;215760.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 1,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo JanSport SuperBreak Classic&quot;,
                        &quot;description&quot;: &quot;Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung t&iacute;ch 25L ph&ugrave; hợp cho việc đi học h&agrave;ng ng&agrave;y.&quot;,
                        &quot;price&quot;: &quot;899000.00&quot;,
                        &quot;quantity&quot;: 50,
                        &quot;image&quot;: &quot;products/balo-jansport-superbreak-classic.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-jansport-superbreak-classic&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 18,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 2,
                    &quot;original_price&quot;: &quot;1200000.00&quot;,
                    &quot;sale_price&quot;: &quot;936000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;22.00&quot;,
                    &quot;discount_amount&quot;: &quot;264000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 32,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 2,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                        &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                        &quot;price&quot;: &quot;1200000.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                        &quot;color&quot;: &quot;Xanh Navy&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 19,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 5,
                    &quot;original_price&quot;: &quot;1800000.00&quot;,
                    &quot;sale_price&quot;: &quot;1260000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;30.00&quot;,
                    &quot;discount_amount&quot;: &quot;540000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 45,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 5,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
                        &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
                        &quot;price&quot;: &quot;1800000.00&quot;,
                        &quot;quantity&quot;: 35,
                        &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 20,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;1062176.32&quot;,
                    &quot;discount_percentage&quot;: &quot;32.00&quot;,
                    &quot;discount_amount&quot;: &quot;499847.68&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 18,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 21,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 9,
                    &quot;original_price&quot;: &quot;1608008.00&quot;,
                    &quot;sale_price&quot;: &quot;1125605.60&quot;,
                    &quot;discount_percentage&quot;: &quot;30.00&quot;,
                    &quot;discount_amount&quot;: &quot;482402.40&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 48,
                    &quot;sold_quantity&quot;: 4,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 9,
                        &quot;category_id&quot;: 5,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                        &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                        &quot;price&quot;: &quot;1608008.00&quot;,
                        &quot;quantity&quot;: 18,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                        &quot;color&quot;: &quot;Xanh&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 22,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;863385.90&quot;,
                    &quot;discount_percentage&quot;: &quot;35.00&quot;,
                    &quot;discount_amount&quot;: &quot;464900.10&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 50,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                },
                {
                    &quot;id&quot;: 23,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 15,
                    &quot;original_price&quot;: &quot;935683.00&quot;,
                    &quot;sale_price&quot;: &quot;720475.91&quot;,
                    &quot;discount_percentage&quot;: &quot;23.00&quot;,
                    &quot;discount_amount&quot;: &quot;215207.09&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 48,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 15,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
                        &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
                        &quot;price&quot;: &quot;935683.00&quot;,
                        &quot;quantity&quot;: 47,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;
                    }
                }
            ]
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/sale-campaigns?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/sale-campaigns?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/sale-campaigns?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/sale-campaigns&quot;,
    &quot;per_page&quot;: 10,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 4,
    &quot;total&quot;: 4
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sale-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sale-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sale-campaigns"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sale-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sale-campaigns">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sale-campaigns" data-method="GET"
      data-path="api/sale-campaigns"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sale-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sale-campaigns"
                    onclick="tryItOut('GETapi-sale-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sale-campaigns"
                    onclick="cancelTryOut('GETapi-sale-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sale-campaigns"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sale-campaigns</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-sale-campaigns">Store a newly created sale campaign.</h2>

<p>
</p>



<span id="example-requests-POSTapi-sale-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/sale-campaigns" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"slug\": \"amniihfqcoynlazghdtqt\",
    \"description\": \"Necessitatibus architecto aut consequatur debitis et id.\",
    \"banner_image\": \"ilpmufinllwloauydlsms\",
    \"start_date\": \"2106-07-18\",
    \"end_date\": \"2106-07-18\",
    \"status\": \"draft\",
    \"is_featured\": true,
    \"priority\": 13,
    \"metadata\": {
        \"color\": \"qeopfu\",
        \"tags\": [
            \"udtdsufvyvddqamniihfq\"
        ]
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "slug": "amniihfqcoynlazghdtqt",
    "description": "Necessitatibus architecto aut consequatur debitis et id.",
    "banner_image": "ilpmufinllwloauydlsms",
    "start_date": "2106-07-18",
    "end_date": "2106-07-18",
    "status": "draft",
    "is_featured": true,
    "priority": 13,
    "metadata": {
        "color": "qeopfu",
        "tags": [
            "udtdsufvyvddqamniihfq"
        ]
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sale-campaigns">
</span>
<span id="execution-results-POSTapi-sale-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sale-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sale-campaigns"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sale-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sale-campaigns">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sale-campaigns" data-method="POST"
      data-path="api/sale-campaigns"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sale-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sale-campaigns"
                    onclick="tryItOut('POSTapi-sale-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sale-campaigns"
                    onclick="cancelTryOut('POSTapi-sale-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sale-campaigns"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sale-campaigns</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sale-campaigns"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-sale-campaigns"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="POSTapi-sale-campaigns"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-sale-campaigns"
               value="Necessitatibus architecto aut consequatur debitis et id."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Necessitatibus architecto aut consequatur debitis et id.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="banner_image"                data-endpoint="POSTapi-sale-campaigns"
               value="ilpmufinllwloauydlsms"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ilpmufinllwloauydlsms</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="POSTapi-sale-campaigns"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after or equal to <code>today</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="POSTapi-sale-campaigns"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>start_date</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-sale-campaigns"
               value="draft"
               data-component="body">
    <br>
<p>Example: <code>draft</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>draft</code></li> <li><code>active</code></li> <li><code>expired</code></li> <li><code>cancelled</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-sale-campaigns" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="POSTapi-sale-campaigns"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-sale-campaigns" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="POSTapi-sale-campaigns"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>priority</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="priority"                data-endpoint="POSTapi-sale-campaigns"
               value="13"
               data-component="body">
    <br>
<p>Must be at least 0. Must not be greater than 100. Example: <code>13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>metadata</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="metadata.color"                data-endpoint="POSTapi-sale-campaigns"
               value="qeopfu"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>qeopfu</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>tags</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="metadata.tags[0]"                data-endpoint="POSTapi-sale-campaigns"
               data-component="body">
        <input type="text" style="display: none"
               name="metadata.tags[1]"                data-endpoint="POSTapi-sale-campaigns"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters.</p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-sale-campaigns--id-">Display the specified sale campaign.</h2>

<p>
</p>



<span id="example-requests-GETapi-sale-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sale-campaigns/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sale-campaigns--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Black Friday 2025&quot;,
        &quot;slug&quot;: &quot;black-friday-2025&quot;,
        &quot;description&quot;: &quot;Si&ecirc;u sale Black Friday - Giảm gi&aacute; khủng l&ecirc;n đến 70% tất cả sản phẩm balo&quot;,
        &quot;banner_image&quot;: &quot;campaigns/black-friday-2025.jpg&quot;,
        &quot;start_date&quot;: &quot;2025-06-19T17:17:58.000000Z&quot;,
        &quot;end_date&quot;: &quot;2025-06-25T17:17:58.000000Z&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;is_featured&quot;: true,
        &quot;priority&quot;: 100,
        &quot;metadata&quot;: {
            &quot;tags&quot;: [
                &quot;black-friday&quot;,
                &quot;mega-sale&quot;,
                &quot;limited-time&quot;
            ],
            &quot;color&quot;: &quot;#000000&quot;,
            &quot;description_short&quot;: &quot;Giảm gi&aacute; l&ecirc;n đến 70%&quot;
        },
        &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
        &quot;sale_products&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 6,
                &quot;original_price&quot;: &quot;1562024.00&quot;,
                &quot;sale_price&quot;: &quot;531088.16&quot;,
                &quot;discount_percentage&quot;: &quot;66.00&quot;,
                &quot;discount_amount&quot;: &quot;1030935.84&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 40,
                &quot;sold_quantity&quot;: 4,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 6,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 10,
                    &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                    &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                    &quot;price&quot;: &quot;1562024.00&quot;,
                    &quot;quantity&quot;: 72,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Laptop&quot;,
                        &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                        &quot;slug&quot;: &quot;balo-laptop&quot;,
                        &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                        &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                        &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 8,
                &quot;original_price&quot;: &quot;370894.00&quot;,
                &quot;sale_price&quot;: &quot;207700.64&quot;,
                &quot;discount_percentage&quot;: &quot;44.00&quot;,
                &quot;discount_amount&quot;: &quot;163193.36&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 36,
                &quot;sold_quantity&quot;: 5,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 8,
                    &quot;category_id&quot;: 3,
                    &quot;brand_id&quot;: 14,
                    &quot;name&quot;: &quot;Balo Học Sinh JanSport est&quot;,
                    &quot;description&quot;: &quot;Sed non nobis sapiente non sapiente et. Quasi consequuntur enim dolor. Quo est voluptas explicabo possimus quasi odit. Est eaque molestias quo natus. Quas omnis recusandae repellendus doloremque eveniet laudantium et quasi.&quot;,
                    &quot;price&quot;: &quot;370894.00&quot;,
                    &quot;quantity&quot;: 30,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0011aa?text=fashion+magni&quot;,
                    &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-est-1299&quot;,
                    &quot;color&quot;: &quot;N&acirc;u&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Laptop&quot;,
                        &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                        &quot;slug&quot;: &quot;balo-laptop&quot;,
                        &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 14,
                        &quot;name&quot;: &quot;Davis-Klein&quot;,
                        &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                        &quot;slug&quot;: &quot;davis-klein&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 3,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 9,
                &quot;original_price&quot;: &quot;1608008.00&quot;,
                &quot;sale_price&quot;: &quot;498482.48&quot;,
                &quot;discount_percentage&quot;: &quot;69.00&quot;,
                &quot;discount_amount&quot;: &quot;1109525.52&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 28,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 9,
                    &quot;category_id&quot;: 5,
                    &quot;brand_id&quot;: 1,
                    &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                    &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                    &quot;price&quot;: &quot;1608008.00&quot;,
                    &quot;quantity&quot;: 18,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                    &quot;color&quot;: &quot;Xanh&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                        &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                        &quot;slug&quot;: &quot;tui-xach&quot;,
                        &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Nike&quot;,
                        &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                        &quot;slug&quot;: &quot;nike&quot;,
                        &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 4,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 10,
                &quot;original_price&quot;: &quot;1683107.00&quot;,
                &quot;sale_price&quot;: &quot;757398.15&quot;,
                &quot;discount_percentage&quot;: &quot;55.00&quot;,
                &quot;discount_amount&quot;: &quot;925708.85&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 40,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 10,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 4,
                    &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
                    &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
                    &quot;price&quot;: &quot;1683107.00&quot;,
                    &quot;quantity&quot;: 28,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
                    &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
                    &quot;color&quot;: &quot;Hồng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                        &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                        &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                        &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;JanSport&quot;,
                        &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                        &quot;slug&quot;: &quot;jansport&quot;,
                        &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 5,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 11,
                &quot;original_price&quot;: &quot;1992332.00&quot;,
                &quot;sale_price&quot;: &quot;1036012.64&quot;,
                &quot;discount_percentage&quot;: &quot;48.00&quot;,
                &quot;discount_amount&quot;: &quot;956319.36&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 44,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 11,
                    &quot;category_id&quot;: 6,
                    &quot;brand_id&quot;: 10,
                    &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
                    &quot;description&quot;: &quot;Qui ea enim earum. Deserunt commodi aliquid repellat perspiciatis sit quaerat sunt. Assumenda sit excepturi consectetur aut iure. Repellat aut velit est pariatur dolor facere sapiente. Perspiciatis animi doloribus ducimus a optio qui quisquam.&quot;,
                    &quot;price&quot;: &quot;1992332.00&quot;,
                    &quot;quantity&quot;: 72,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc77?text=fashion+quae&quot;,
                    &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-2618&quot;,
                    &quot;color&quot;: &quot;V&agrave;ng&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Mini&quot;,
                        &quot;description&quot;: &quot;Balo nhỏ gọn d&agrave;nh cho việc đi chơi, dạo phố&quot;,
                        &quot;slug&quot;: &quot;balo-mini&quot;,
                        &quot;image&quot;: &quot;categories/balo-mini.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                        &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                        &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                        &quot;status&quot;: &quot;inactive&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 6,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 12,
                &quot;original_price&quot;: &quot;1655267.00&quot;,
                &quot;sale_price&quot;: &quot;761422.82&quot;,
                &quot;discount_percentage&quot;: &quot;54.00&quot;,
                &quot;discount_amount&quot;: &quot;893844.18&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 19,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 12,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 8,
                    &quot;name&quot;: &quot;Balo Gaming RGB omnis&quot;,
                    &quot;description&quot;: &quot;Accusamus commodi iure sed sapiente repellendus fugiat. Voluptas veritatis dignissimos in sint ipsum. Explicabo iste aut consequatur aut incidunt non minus assumenda. Non quos eos consequatur iste molestiae labore delectus. Cum dignissimos vel enim. Sed dolore aut quia.&quot;,
                    &quot;price&quot;: &quot;1655267.00&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077ff?text=fashion+tempora&quot;,
                    &quot;slug&quot;: &quot;balo-gaming-rgb-omnis-6960&quot;,
                    &quot;color&quot;: &quot;Cam&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                        &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                        &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                        &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                        &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                        &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 7,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 13,
                &quot;original_price&quot;: &quot;1328286.00&quot;,
                &quot;sale_price&quot;: &quot;637577.28&quot;,
                &quot;discount_percentage&quot;: &quot;52.00&quot;,
                &quot;discount_amount&quot;: &quot;690708.72&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 12,
                &quot;sold_quantity&quot;: 1,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 13,
                    &quot;category_id&quot;: 1,
                    &quot;brand_id&quot;: 3,
                    &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                    &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                    &quot;price&quot;: &quot;1328286.00&quot;,
                    &quot;quantity&quot;: 25,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                    &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                    &quot;color&quot;: &quot;Đen&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                        &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                        &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                        &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Samsonite&quot;,
                        &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                        &quot;slug&quot;: &quot;samsonite&quot;,
                        &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            },
            {
                &quot;id&quot;: 8,
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 14,
                &quot;original_price&quot;: &quot;1321639.00&quot;,
                &quot;sale_price&quot;: &quot;766550.62&quot;,
                &quot;discount_percentage&quot;: &quot;42.00&quot;,
                &quot;discount_amount&quot;: &quot;555088.38&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 44,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: true,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 14,
                    &quot;category_id&quot;: 2,
                    &quot;brand_id&quot;: 11,
                    &quot;name&quot;: &quot;T&uacute;i Adidas Classic facilis&quot;,
                    &quot;description&quot;: &quot;Consequatur voluptas et inventore consequatur voluptatem cupiditate laborum. Vero et amet qui qui et reprehenderit. Incidunt ipsa corporis ea. Cupiditate voluptatem sequi impedit dicta. Nulla numquam veniam ut ratione itaque.&quot;,
                    &quot;price&quot;: &quot;1321639.00&quot;,
                    &quot;quantity&quot;: 42,
                    &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/005599?text=fashion+et&quot;,
                    &quot;slug&quot;: &quot;tui-adidas-classic-facilis-7403&quot;,
                    &quot;color&quot;: &quot;X&aacute;m&quot;,
                    &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                    &quot;category&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                        &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                        &quot;slug&quot;: &quot;balo-du-lich&quot;,
                        &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    },
                    &quot;brand&quot;: {
                        &quot;id&quot;: 11,
                        &quot;name&quot;: &quot;Lockman, Mueller and Hickle&quot;,
                        &quot;description&quot;: &quot;Quia omnis sed sunt amet labore nostrum recusandae. Totam odio eveniet quibusdam. Quaerat adipisci rerum quis repudiandae et dolores.&quot;,
                        &quot;slug&quot;: &quot;lockman-mueller-and-hickle&quot;,
                        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ee?text=business+reprehenderit&quot;,
                        &quot;status&quot;: &quot;active&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                    }
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sale-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sale-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sale-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sale-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sale-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sale-campaigns--id-" data-method="GET"
      data-path="api/sale-campaigns/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sale-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sale-campaigns--id-"
                    onclick="tryItOut('GETapi-sale-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sale-campaigns--id-"
                    onclick="cancelTryOut('GETapi-sale-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sale-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sale-campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-sale-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sale campaign. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-sale-campaigns--id-">Update the specified sale campaign.</h2>

<p>
</p>



<span id="example-requests-PUTapi-sale-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/sale-campaigns/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"slug\": \"amniihfqcoynlazghdtqt\",
    \"description\": \"Necessitatibus architecto aut consequatur debitis et id.\",
    \"banner_image\": \"ilpmufinllwloauydlsms\",
    \"start_date\": \"2106-07-18\",
    \"end_date\": \"2106-07-18\",
    \"status\": \"expired\",
    \"is_featured\": false,
    \"priority\": 13,
    \"metadata\": {
        \"color\": \"qeopfu\",
        \"tags\": [
            \"udtdsufvyvddqamniihfq\"
        ]
    }
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "slug": "amniihfqcoynlazghdtqt",
    "description": "Necessitatibus architecto aut consequatur debitis et id.",
    "banner_image": "ilpmufinllwloauydlsms",
    "start_date": "2106-07-18",
    "end_date": "2106-07-18",
    "status": "expired",
    "is_featured": false,
    "priority": 13,
    "metadata": {
        "color": "qeopfu",
        "tags": [
            "udtdsufvyvddqamniihfq"
        ]
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-sale-campaigns--id-">
</span>
<span id="execution-results-PUTapi-sale-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-sale-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sale-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-sale-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sale-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-sale-campaigns--id-" data-method="PUT"
      data-path="api/sale-campaigns/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-sale-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-sale-campaigns--id-"
                    onclick="tryItOut('PUTapi-sale-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-sale-campaigns--id-"
                    onclick="cancelTryOut('PUTapi-sale-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-sale-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/sale-campaigns/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/sale-campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sale campaign. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="Necessitatibus architecto aut consequatur debitis et id."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Necessitatibus architecto aut consequatur debitis et id.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="banner_image"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="ilpmufinllwloauydlsms"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ilpmufinllwloauydlsms</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after or equal to <code>today</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="2106-07-18"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>start_date</code>. Example: <code>2106-07-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="expired"
               data-component="body">
    <br>
<p>Example: <code>expired</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>draft</code></li> <li><code>active</code></li> <li><code>expired</code></li> <li><code>cancelled</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-sale-campaigns--id-" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="PUTapi-sale-campaigns--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-sale-campaigns--id-" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="PUTapi-sale-campaigns--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>priority</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="priority"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="13"
               data-component="body">
    <br>
<p>Must be at least 0. Must not be greater than 100. Example: <code>13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>metadata</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="metadata.color"                data-endpoint="PUTapi-sale-campaigns--id-"
               value="qeopfu"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>qeopfu</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>tags</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="metadata.tags[0]"                data-endpoint="PUTapi-sale-campaigns--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="metadata.tags[1]"                data-endpoint="PUTapi-sale-campaigns--id-"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters.</p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-sale-campaigns--id-">Remove the specified sale campaign.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-sale-campaigns--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/sale-campaigns/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sale-campaigns--id-">
</span>
<span id="execution-results-DELETEapi-sale-campaigns--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sale-campaigns--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sale-campaigns--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-sale-campaigns--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sale-campaigns--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-sale-campaigns--id-" data-method="DELETE"
      data-path="api/sale-campaigns/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sale-campaigns--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-sale-campaigns--id-"
                    onclick="tryItOut('DELETEapi-sale-campaigns--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-sale-campaigns--id-"
                    onclick="cancelTryOut('DELETEapi-sale-campaigns--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-sale-campaigns--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sale-campaigns/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-sale-campaigns--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-sale-campaigns--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sale campaign. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-sale-campaigns-active">Get active sale campaigns.</h2>

<p>
</p>



<span id="example-requests-GETapi-sale-campaigns-active">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sale-campaigns-active" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns-active"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sale-campaigns-active">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
            &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
            &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
            &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: true,
            &quot;priority&quot;: 90,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;flash-sale&quot;,
                    &quot;weekend&quot;,
                    &quot;quick-sale&quot;
                ],
                &quot;color&quot;: &quot;#ff6b35&quot;,
                &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 2,
                    &quot;original_price&quot;: &quot;1200000.00&quot;,
                    &quot;sale_price&quot;: &quot;672000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;44.00&quot;,
                    &quot;discount_amount&quot;: &quot;528000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 32,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 2,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                        &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                        &quot;price&quot;: &quot;1200000.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                        &quot;color&quot;: &quot;Xanh Navy&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Nike&quot;,
                            &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                            &quot;slug&quot;: &quot;nike&quot;,
                            &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 10,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 3,
                    &quot;original_price&quot;: &quot;2500000.00&quot;,
                    &quot;sale_price&quot;: &quot;1550000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;38.00&quot;,
                    &quot;discount_amount&quot;: &quot;950000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 47,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 3,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo The North Face Borealis 28L&quot;,
                        &quot;description&quot;: &quot;Balo trekking chuy&ecirc;n nghiệp với nhiều ngăn tiện &iacute;ch, d&acirc;y đeo thoải m&aacute;i. L&yacute; tưởng cho c&aacute;c chuyến du lịch ngắn ng&agrave;y.&quot;,
                        &quot;price&quot;: &quot;2500000.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;products/balo-the-north-face-borealis-28l.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-the-north-face-borealis-28l&quot;,
                        &quot;color&quot;: &quot;X&aacute;m&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 2,
                            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                            &quot;slug&quot;: &quot;balo-du-lich&quot;,
                            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;The North Face&quot;,
                            &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                            &quot;slug&quot;: &quot;the-north-face&quot;,
                            &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 11,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 4,
                    &quot;original_price&quot;: &quot;3200000.00&quot;,
                    &quot;sale_price&quot;: &quot;2016000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;37.00&quot;,
                    &quot;discount_amount&quot;: &quot;1184000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 41,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 4,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Samsonite Guardit 2.0&quot;,
                        &quot;description&quot;: &quot;Balo du lịch cao cấp với ngăn laptop 15.6\&quot;, chống thấm nước. Thiết kế sang trọng, ph&ugrave; hợp cho c&ocirc;ng t&aacute;c.&quot;,
                        &quot;price&quot;: &quot;3200000.00&quot;,
                        &quot;quantity&quot;: 20,
                        &quot;image&quot;: &quot;products/balo-samsonite-guardit-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-samsonite-guardit-20&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 2,
                            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                            &quot;slug&quot;: &quot;balo-du-lich&quot;,
                            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Samsonite&quot;,
                            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                            &quot;slug&quot;: &quot;samsonite&quot;,
                            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 12,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 5,
                    &quot;original_price&quot;: &quot;1800000.00&quot;,
                    &quot;sale_price&quot;: &quot;1080000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;40.00&quot;,
                    &quot;discount_amount&quot;: &quot;720000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 5,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
                        &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
                        &quot;price&quot;: &quot;1800000.00&quot;,
                        &quot;quantity&quot;: 35,
                        &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 6,
                            &quot;name&quot;: &quot;Herschel&quot;,
                            &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
                            &quot;slug&quot;: &quot;herschel&quot;,
                            &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 13,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;905973.92&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;656050.08&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 10,
                            &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                            &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                            &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                            &quot;status&quot;: &quot;inactive&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 14,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 10,
                    &quot;original_price&quot;: &quot;1683107.00&quot;,
                    &quot;sale_price&quot;: &quot;1144512.76&quot;,
                    &quot;discount_percentage&quot;: &quot;32.00&quot;,
                    &quot;discount_amount&quot;: &quot;538594.24&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 10,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
                        &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
                        &quot;price&quot;: &quot;1683107.00&quot;,
                        &quot;quantity&quot;: 28,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
                        &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 4,
                            &quot;name&quot;: &quot;JanSport&quot;,
                            &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                            &quot;slug&quot;: &quot;jansport&quot;,
                            &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 15,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;770405.88&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;557880.12&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 20,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Samsonite&quot;,
                            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                            &quot;slug&quot;: &quot;samsonite&quot;,
                            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 16,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 15,
                    &quot;original_price&quot;: &quot;935683.00&quot;,
                    &quot;sale_price&quot;: &quot;598837.12&quot;,
                    &quot;discount_percentage&quot;: &quot;36.00&quot;,
                    &quot;discount_amount&quot;: &quot;336845.88&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 33,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 15,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
                        &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
                        &quot;price&quot;: &quot;935683.00&quot;,
                        &quot;quantity&quot;: 47,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;The North Face&quot;,
                            &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                            &quot;slug&quot;: &quot;the-north-face&quot;,
                            &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sale Sinh Vi&ecirc;n&quot;,
            &quot;slug&quot;: &quot;sale-sinh-vien&quot;,
            &quot;description&quot;: &quot;Ưu đ&atilde;i đặc biệt d&agrave;nh cho sinh vi&ecirc;n - Balo học tập gi&aacute; ưu đ&atilde;i&quot;,
            &quot;banner_image&quot;: &quot;campaigns/sale-sinh-vien.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-16T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-07-02T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: false,
            &quot;priority&quot;: 70,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;student&quot;,
                    &quot;education&quot;,
                    &quot;long-term&quot;
                ],
                &quot;color&quot;: &quot;#4285f4&quot;,
                &quot;description_short&quot;: &quot;Giảm 30% cho sinh vi&ecirc;n&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 1,
                    &quot;original_price&quot;: &quot;899000.00&quot;,
                    &quot;sale_price&quot;: &quot;683240.00&quot;,
                    &quot;discount_percentage&quot;: &quot;24.00&quot;,
                    &quot;discount_amount&quot;: &quot;215760.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 1,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo JanSport SuperBreak Classic&quot;,
                        &quot;description&quot;: &quot;Balo học sinh kinh điển với thiết kế đơn giản, chất liệu bền bỉ. Dung t&iacute;ch 25L ph&ugrave; hợp cho việc đi học h&agrave;ng ng&agrave;y.&quot;,
                        &quot;price&quot;: &quot;899000.00&quot;,
                        &quot;quantity&quot;: 50,
                        &quot;image&quot;: &quot;products/balo-jansport-superbreak-classic.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-jansport-superbreak-classic&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 4,
                            &quot;name&quot;: &quot;JanSport&quot;,
                            &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                            &quot;slug&quot;: &quot;jansport&quot;,
                            &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 18,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 2,
                    &quot;original_price&quot;: &quot;1200000.00&quot;,
                    &quot;sale_price&quot;: &quot;936000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;22.00&quot;,
                    &quot;discount_amount&quot;: &quot;264000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 32,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 2,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                        &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                        &quot;price&quot;: &quot;1200000.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                        &quot;color&quot;: &quot;Xanh Navy&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Nike&quot;,
                            &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                            &quot;slug&quot;: &quot;nike&quot;,
                            &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 19,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 5,
                    &quot;original_price&quot;: &quot;1800000.00&quot;,
                    &quot;sale_price&quot;: &quot;1260000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;30.00&quot;,
                    &quot;discount_amount&quot;: &quot;540000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 45,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 5,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
                        &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
                        &quot;price&quot;: &quot;1800000.00&quot;,
                        &quot;quantity&quot;: 35,
                        &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 6,
                            &quot;name&quot;: &quot;Herschel&quot;,
                            &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
                            &quot;slug&quot;: &quot;herschel&quot;,
                            &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 20,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;1062176.32&quot;,
                    &quot;discount_percentage&quot;: &quot;32.00&quot;,
                    &quot;discount_amount&quot;: &quot;499847.68&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 18,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 10,
                            &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                            &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                            &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                            &quot;status&quot;: &quot;inactive&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 21,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 9,
                    &quot;original_price&quot;: &quot;1608008.00&quot;,
                    &quot;sale_price&quot;: &quot;1125605.60&quot;,
                    &quot;discount_percentage&quot;: &quot;30.00&quot;,
                    &quot;discount_amount&quot;: &quot;482402.40&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 48,
                    &quot;sold_quantity&quot;: 4,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 9,
                        &quot;category_id&quot;: 5,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
                        &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
                        &quot;price&quot;: &quot;1608008.00&quot;,
                        &quot;quantity&quot;: 18,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
                        &quot;color&quot;: &quot;Xanh&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                            &quot;slug&quot;: &quot;tui-xach&quot;,
                            &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Nike&quot;,
                            &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                            &quot;slug&quot;: &quot;nike&quot;,
                            &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 22,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;863385.90&quot;,
                    &quot;discount_percentage&quot;: &quot;35.00&quot;,
                    &quot;discount_amount&quot;: &quot;464900.10&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 50,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Samsonite&quot;,
                            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                            &quot;slug&quot;: &quot;samsonite&quot;,
                            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 23,
                    &quot;sale_campaign_id&quot;: 3,
                    &quot;product_id&quot;: 15,
                    &quot;original_price&quot;: &quot;935683.00&quot;,
                    &quot;sale_price&quot;: &quot;720475.91&quot;,
                    &quot;discount_percentage&quot;: &quot;23.00&quot;,
                    &quot;discount_amount&quot;: &quot;215207.09&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 48,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 15,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
                        &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
                        &quot;price&quot;: &quot;935683.00&quot;,
                        &quot;quantity&quot;: 47,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;The North Face&quot;,
                            &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                            &quot;slug&quot;: &quot;the-north-face&quot;,
                            &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sale-campaigns-active" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sale-campaigns-active"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sale-campaigns-active"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sale-campaigns-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sale-campaigns-active">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sale-campaigns-active" data-method="GET"
      data-path="api/sale-campaigns-active"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sale-campaigns-active', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sale-campaigns-active"
                    onclick="tryItOut('GETapi-sale-campaigns-active');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sale-campaigns-active"
                    onclick="cancelTryOut('GETapi-sale-campaigns-active');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sale-campaigns-active"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sale-campaigns-active</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sale-campaigns-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sale-campaigns-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-sale-campaigns-featured">Get featured sale campaigns.</h2>

<p>
</p>



<span id="example-requests-GETapi-sale-campaigns-featured">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sale-campaigns-featured" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns-featured"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sale-campaigns-featured">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Flash Sale Cuối Tuần&quot;,
            &quot;slug&quot;: &quot;flash-sale-weekend&quot;,
            &quot;description&quot;: &quot;Flash sale cuối tuần - Cơ hội v&agrave;ng săn balo gi&aacute; rẻ&quot;,
            &quot;banner_image&quot;: &quot;campaigns/flash-sale-weekend.jpg&quot;,
            &quot;start_date&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;end_date&quot;: &quot;2025-06-21T17:17:58.000000Z&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;is_featured&quot;: true,
            &quot;priority&quot;: 90,
            &quot;metadata&quot;: {
                &quot;tags&quot;: [
                    &quot;flash-sale&quot;,
                    &quot;weekend&quot;,
                    &quot;quick-sale&quot;
                ],
                &quot;color&quot;: &quot;#ff6b35&quot;,
                &quot;description_short&quot;: &quot;Giảm ngay 50%&quot;
            },
            &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
            &quot;sale_products&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 2,
                    &quot;original_price&quot;: &quot;1200000.00&quot;,
                    &quot;sale_price&quot;: &quot;672000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;44.00&quot;,
                    &quot;discount_amount&quot;: &quot;528000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 32,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 2,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 1,
                        &quot;name&quot;: &quot;Balo Nike Heritage 2.0&quot;,
                        &quot;description&quot;: &quot;Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, ph&ugrave; hợp cho học sinh cấp 3.&quot;,
                        &quot;price&quot;: &quot;1200000.00&quot;,
                        &quot;quantity&quot;: 30,
                        &quot;image&quot;: &quot;products/balo-nike-heritage-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-nike-heritage-20&quot;,
                        &quot;color&quot;: &quot;Xanh Navy&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Nike&quot;,
                            &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                            &quot;slug&quot;: &quot;nike&quot;,
                            &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 10,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 3,
                    &quot;original_price&quot;: &quot;2500000.00&quot;,
                    &quot;sale_price&quot;: &quot;1550000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;38.00&quot;,
                    &quot;discount_amount&quot;: &quot;950000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 47,
                    &quot;sold_quantity&quot;: 3,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 3,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo The North Face Borealis 28L&quot;,
                        &quot;description&quot;: &quot;Balo trekking chuy&ecirc;n nghiệp với nhiều ngăn tiện &iacute;ch, d&acirc;y đeo thoải m&aacute;i. L&yacute; tưởng cho c&aacute;c chuyến du lịch ngắn ng&agrave;y.&quot;,
                        &quot;price&quot;: &quot;2500000.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;products/balo-the-north-face-borealis-28l.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-the-north-face-borealis-28l&quot;,
                        &quot;color&quot;: &quot;X&aacute;m&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 2,
                            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                            &quot;slug&quot;: &quot;balo-du-lich&quot;,
                            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;The North Face&quot;,
                            &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                            &quot;slug&quot;: &quot;the-north-face&quot;,
                            &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 11,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 4,
                    &quot;original_price&quot;: &quot;3200000.00&quot;,
                    &quot;sale_price&quot;: &quot;2016000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;37.00&quot;,
                    &quot;discount_amount&quot;: &quot;1184000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 41,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 4,
                        &quot;category_id&quot;: 2,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Samsonite Guardit 2.0&quot;,
                        &quot;description&quot;: &quot;Balo du lịch cao cấp với ngăn laptop 15.6\&quot;, chống thấm nước. Thiết kế sang trọng, ph&ugrave; hợp cho c&ocirc;ng t&aacute;c.&quot;,
                        &quot;price&quot;: &quot;3200000.00&quot;,
                        &quot;quantity&quot;: 20,
                        &quot;image&quot;: &quot;products/balo-samsonite-guardit-20.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-samsonite-guardit-20&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 2,
                            &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                            &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                            &quot;slug&quot;: &quot;balo-du-lich&quot;,
                            &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Samsonite&quot;,
                            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                            &quot;slug&quot;: &quot;samsonite&quot;,
                            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 12,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 5,
                    &quot;original_price&quot;: &quot;1800000.00&quot;,
                    &quot;sale_price&quot;: &quot;1080000.00&quot;,
                    &quot;discount_percentage&quot;: &quot;40.00&quot;,
                    &quot;discount_amount&quot;: &quot;720000.00&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 5,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 6,
                        &quot;name&quot;: &quot;Balo Laptop Herschel Pop Quiz&quot;,
                        &quot;description&quot;: &quot;Balo laptop thời trang với thiết kế vintage. Ngăn laptop 15\&quot; được đệm bảo vệ tối ưu.&quot;,
                        &quot;price&quot;: &quot;1800000.00&quot;,
                        &quot;quantity&quot;: 35,
                        &quot;image&quot;: &quot;products/balo-laptop-herschel-pop-quiz.jpg&quot;,
                        &quot;slug&quot;: &quot;balo-laptop-herschel-pop-quiz&quot;,
                        &quot;color&quot;: &quot;N&acirc;u&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 6,
                            &quot;name&quot;: &quot;Herschel&quot;,
                            &quot;description&quot;: &quot;Herschel Supply Co. nổi tiếng với thiết kế vintage v&agrave; hiện đại, ph&ugrave; hợp cho mọi lứa tuổi.&quot;,
                            &quot;slug&quot;: &quot;herschel&quot;,
                            &quot;logo&quot;: &quot;brands/herschel-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 13,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 6,
                    &quot;original_price&quot;: &quot;1562024.00&quot;,
                    &quot;sale_price&quot;: &quot;905973.92&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;656050.08&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 10,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 6,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 10,
                        &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
                        &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
                        &quot;price&quot;: &quot;1562024.00&quot;,
                        &quot;quantity&quot;: 72,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
                        &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
                        &quot;color&quot;: &quot;Cam&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 10,
                            &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                            &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                            &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                            &quot;status&quot;: &quot;inactive&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 14,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 10,
                    &quot;original_price&quot;: &quot;1683107.00&quot;,
                    &quot;sale_price&quot;: &quot;1144512.76&quot;,
                    &quot;discount_percentage&quot;: &quot;32.00&quot;,
                    &quot;discount_amount&quot;: &quot;538594.24&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 31,
                    &quot;sold_quantity&quot;: 1,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 10,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 4,
                        &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
                        &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
                        &quot;price&quot;: &quot;1683107.00&quot;,
                        &quot;quantity&quot;: 28,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
                        &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 4,
                            &quot;name&quot;: &quot;JanSport&quot;,
                            &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                            &quot;slug&quot;: &quot;jansport&quot;,
                            &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 15,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 13,
                    &quot;original_price&quot;: &quot;1328286.00&quot;,
                    &quot;sale_price&quot;: &quot;770405.88&quot;,
                    &quot;discount_percentage&quot;: &quot;42.00&quot;,
                    &quot;discount_amount&quot;: &quot;557880.12&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 20,
                    &quot;sold_quantity&quot;: 5,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 13,
                        &quot;category_id&quot;: 1,
                        &quot;brand_id&quot;: 3,
                        &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
                        &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
                        &quot;price&quot;: &quot;1328286.00&quot;,
                        &quot;quantity&quot;: 25,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
                        &quot;color&quot;: &quot;Đen&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 1,
                            &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                            &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                            &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                            &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Samsonite&quot;,
                            &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                            &quot;slug&quot;: &quot;samsonite&quot;,
                            &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                },
                {
                    &quot;id&quot;: 16,
                    &quot;sale_campaign_id&quot;: 2,
                    &quot;product_id&quot;: 15,
                    &quot;original_price&quot;: &quot;935683.00&quot;,
                    &quot;sale_price&quot;: &quot;598837.12&quot;,
                    &quot;discount_percentage&quot;: &quot;36.00&quot;,
                    &quot;discount_amount&quot;: &quot;336845.88&quot;,
                    &quot;discount_type&quot;: &quot;percentage&quot;,
                    &quot;start_date&quot;: null,
                    &quot;end_date&quot;: null,
                    &quot;max_quantity&quot;: 33,
                    &quot;sold_quantity&quot;: 0,
                    &quot;is_active&quot;: true,
                    &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                    &quot;product&quot;: {
                        &quot;id&quot;: 15,
                        &quot;category_id&quot;: 3,
                        &quot;brand_id&quot;: 5,
                        &quot;name&quot;: &quot;Balo Nike Sportswear rerum&quot;,
                        &quot;description&quot;: &quot;Doloremque aut laborum velit est suscipit aut. Magnam possimus fugiat magni saepe eaque ut et. Saepe rem enim totam sed quia omnis ex.&quot;,
                        &quot;price&quot;: &quot;935683.00&quot;,
                        &quot;quantity&quot;: 47,
                        &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00aa00?text=fashion+sed&quot;,
                        &quot;slug&quot;: &quot;balo-nike-sportswear-rerum-3524&quot;,
                        &quot;color&quot;: &quot;Hồng&quot;,
                        &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
                        &quot;category&quot;: {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;Balo Laptop&quot;,
                            &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                            &quot;slug&quot;: &quot;balo-laptop&quot;,
                            &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        },
                        &quot;brand&quot;: {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;The North Face&quot;,
                            &quot;description&quot;: &quot;The North Face l&agrave; thương hiệu outdoor nổi tiếng với c&aacute;c sản phẩm balo trekking v&agrave; leo n&uacute;i.&quot;,
                            &quot;slug&quot;: &quot;the-north-face&quot;,
                            &quot;logo&quot;: &quot;brands/tnf-logo.png&quot;,
                            &quot;status&quot;: &quot;active&quot;,
                            &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
                        }
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sale-campaigns-featured" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sale-campaigns-featured"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sale-campaigns-featured"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sale-campaigns-featured" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sale-campaigns-featured">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sale-campaigns-featured" data-method="GET"
      data-path="api/sale-campaigns-featured"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sale-campaigns-featured', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sale-campaigns-featured"
                    onclick="tryItOut('GETapi-sale-campaigns-featured');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sale-campaigns-featured"
                    onclick="cancelTryOut('GETapi-sale-campaigns-featured');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sale-campaigns-featured"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sale-campaigns-featured</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sale-campaigns-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sale-campaigns-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-sale-campaigns--saleCampaign_id--products">Get products in sale campaign.</h2>

<p>
</p>



<span id="example-requests-GETapi-sale-campaigns--saleCampaign_id--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/sale-campaigns/1/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sale-campaigns--saleCampaign_id--products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 6,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 10,
            &quot;name&quot;: &quot;Balo Gaming RGB aperiam&quot;,
            &quot;description&quot;: &quot;Debitis natus dolorum et. Optio sed sunt error culpa voluptas. Eos occaecati consectetur ipsum molestiae ut occaecati tempora. Autem quae veniam qui fuga.&quot;,
            &quot;price&quot;: &quot;1562024.00&quot;,
            &quot;quantity&quot;: 72,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/007744?text=fashion+rerum&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-aperiam-7459&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 6,
                &quot;original_price&quot;: &quot;1562024.00&quot;,
                &quot;sale_price&quot;: &quot;531088.16&quot;,
                &quot;discount_percentage&quot;: &quot;66.00&quot;,
                &quot;discount_amount&quot;: &quot;1030935.84&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 40,
                &quot;sold_quantity&quot;: 4,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 8,
            &quot;name&quot;: &quot;Balo Gaming RGB omnis&quot;,
            &quot;description&quot;: &quot;Accusamus commodi iure sed sapiente repellendus fugiat. Voluptas veritatis dignissimos in sint ipsum. Explicabo iste aut consequatur aut incidunt non minus assumenda. Non quos eos consequatur iste molestiae labore delectus. Cum dignissimos vel enim. Sed dolore aut quia.&quot;,
            &quot;price&quot;: &quot;1655267.00&quot;,
            &quot;quantity&quot;: 0,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077ff?text=fashion+tempora&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-omnis-6960&quot;,
            &quot;color&quot;: &quot;Cam&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Roob, Stehr and Considine&quot;,
                &quot;description&quot;: &quot;Deserunt sunt neque aut explicabo quis atque ex iure. Eligendi ducimus cum atque. Aspernatur reiciendis neque esse necessitatibus.&quot;,
                &quot;slug&quot;: &quot;roob-stehr-and-considine&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ee?text=business+autem&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 12,
                &quot;original_price&quot;: &quot;1655267.00&quot;,
                &quot;sale_price&quot;: &quot;761422.82&quot;,
                &quot;discount_percentage&quot;: &quot;54.00&quot;,
                &quot;discount_amount&quot;: &quot;893844.18&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 19,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;category_id&quot;: 5,
            &quot;brand_id&quot;: 1,
            &quot;name&quot;: &quot;Balo Gaming RGB rerum&quot;,
            &quot;description&quot;: &quot;Facilis dolor commodi dolores itaque consequuntur modi. Laborum reiciendis est libero facere sint neque. Est eius sed autem quod est in eum. Aut et temporibus velit hic error officiis explicabo.&quot;,
            &quot;price&quot;: &quot;1608008.00&quot;,
            &quot;quantity&quot;: 18,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/001144?text=fashion+sed&quot;,
            &quot;slug&quot;: &quot;balo-gaming-rgb-rerum-5919&quot;,
            &quot;color&quot;: &quot;Xanh&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;T&uacute;i X&aacute;ch&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại t&uacute;i x&aacute;ch thời trang cho nam v&agrave; nữ&quot;,
                &quot;slug&quot;: &quot;tui-xach&quot;,
                &quot;image&quot;: &quot;categories/tui-xach.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Nike&quot;,
                &quot;description&quot;: &quot;Nike l&agrave; thương hiệu thể thao h&agrave;ng đầu thế giới, nổi tiếng với c&aacute;c sản phẩm balo v&agrave; t&uacute;i thể thao chất lượng cao.&quot;,
                &quot;slug&quot;: &quot;nike&quot;,
                &quot;logo&quot;: &quot;brands/nike-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 9,
                &quot;original_price&quot;: &quot;1608008.00&quot;,
                &quot;sale_price&quot;: &quot;498482.48&quot;,
                &quot;discount_percentage&quot;: &quot;69.00&quot;,
                &quot;discount_amount&quot;: &quot;1109525.52&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 28,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;category_id&quot;: 3,
            &quot;brand_id&quot;: 14,
            &quot;name&quot;: &quot;Balo Học Sinh JanSport est&quot;,
            &quot;description&quot;: &quot;Sed non nobis sapiente non sapiente et. Quasi consequuntur enim dolor. Quo est voluptas explicabo possimus quasi odit. Est eaque molestias quo natus. Quas omnis recusandae repellendus doloremque eveniet laudantium et quasi.&quot;,
            &quot;price&quot;: &quot;370894.00&quot;,
            &quot;quantity&quot;: 30,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0011aa?text=fashion+magni&quot;,
            &quot;slug&quot;: &quot;balo-hoc-sinh-jansport-est-1299&quot;,
            &quot;color&quot;: &quot;N&acirc;u&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Balo Laptop&quot;,
                &quot;description&quot;: &quot;Balo chuy&ecirc;n dụng để đựng laptop v&agrave; c&aacute;c thiết bị c&ocirc;ng nghệ với lớp đệm bảo vệ&quot;,
                &quot;slug&quot;: &quot;balo-laptop&quot;,
                &quot;image&quot;: &quot;categories/balo-laptop.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Davis-Klein&quot;,
                &quot;description&quot;: &quot;Ipsum aspernatur consequatur velit rerum. Sunt debitis explicabo consequatur laboriosam. Et consequatur eius tempore occaecati corporis sint.&quot;,
                &quot;slug&quot;: &quot;davis-klein&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa99?text=business+sunt&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 8,
                &quot;original_price&quot;: &quot;370894.00&quot;,
                &quot;sale_price&quot;: &quot;207700.64&quot;,
                &quot;discount_percentage&quot;: &quot;44.00&quot;,
                &quot;discount_amount&quot;: &quot;163193.36&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 36,
                &quot;sold_quantity&quot;: 5,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 4,
            &quot;name&quot;: &quot;Balo Mini Cute ducimus&quot;,
            &quot;description&quot;: &quot;Quisquam eius consequatur facere deleniti. Voluptatem laboriosam aliquid esse ullam. Sed natus saepe sit modi molestias. Ipsum rem voluptatem incidunt et consequatur.&quot;,
            &quot;price&quot;: &quot;1683107.00&quot;,
            &quot;quantity&quot;: 28,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc66?text=fashion+odio&quot;,
            &quot;slug&quot;: &quot;balo-mini-cute-ducimus-4436&quot;,
            &quot;color&quot;: &quot;Hồng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;JanSport&quot;,
                &quot;description&quot;: &quot;JanSport chuy&ecirc;n sản xuất balo học sinh v&agrave; du lịch với thiết kế trẻ trung, năng động.&quot;,
                &quot;slug&quot;: &quot;jansport&quot;,
                &quot;logo&quot;: &quot;brands/jansport-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 10,
                &quot;original_price&quot;: &quot;1683107.00&quot;,
                &quot;sale_price&quot;: &quot;757398.15&quot;,
                &quot;discount_percentage&quot;: &quot;55.00&quot;,
                &quot;discount_amount&quot;: &quot;925708.85&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 40,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;category_id&quot;: 1,
            &quot;brand_id&quot;: 3,
            &quot;name&quot;: &quot;Balo Nike Sportswear ut&quot;,
            &quot;description&quot;: &quot;Impedit ut totam consequatur dolorem voluptatem ipsam. Qui deleniti pariatur a accusantium ea dolor ut. Eos sed delectus laudantium recusandae incidunt beatae omnis.&quot;,
            &quot;price&quot;: &quot;1328286.00&quot;,
            &quot;quantity&quot;: 25,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/0077aa?text=fashion+quia&quot;,
            &quot;slug&quot;: &quot;balo-nike-sportswear-ut-6782&quot;,
            &quot;color&quot;: &quot;Đen&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Balo Học Sinh&quot;,
                &quot;description&quot;: &quot;C&aacute;c loại balo d&agrave;nh cho học sinh, sinh vi&ecirc;n với thiết kế trẻ trung v&agrave; tiện dụng&quot;,
                &quot;slug&quot;: &quot;balo-hoc-sinh&quot;,
                &quot;image&quot;: &quot;categories/balo-hoc-sinh.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Samsonite&quot;,
                &quot;description&quot;: &quot;Samsonite l&agrave; thương hiệu h&agrave;ng đầu thế giới về h&agrave;nh l&yacute; v&agrave; balo du lịch cao cấp.&quot;,
                &quot;slug&quot;: &quot;samsonite&quot;,
                &quot;logo&quot;: &quot;brands/samsonite-logo.png&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 13,
                &quot;original_price&quot;: &quot;1328286.00&quot;,
                &quot;sale_price&quot;: &quot;637577.28&quot;,
                &quot;discount_percentage&quot;: &quot;52.00&quot;,
                &quot;discount_amount&quot;: &quot;690708.72&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 12,
                &quot;sold_quantity&quot;: 1,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;category_id&quot;: 6,
            &quot;brand_id&quot;: 10,
            &quot;name&quot;: &quot;Balo Thể Thao Nike Air et&quot;,
            &quot;description&quot;: &quot;Qui ea enim earum. Deserunt commodi aliquid repellat perspiciatis sit quaerat sunt. Assumenda sit excepturi consectetur aut iure. Repellat aut velit est pariatur dolor facere sapiente. Perspiciatis animi doloribus ducimus a optio qui quisquam.&quot;,
            &quot;price&quot;: &quot;1992332.00&quot;,
            &quot;quantity&quot;: 72,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/00cc77?text=fashion+quae&quot;,
            &quot;slug&quot;: &quot;balo-the-thao-nike-air-et-2618&quot;,
            &quot;color&quot;: &quot;V&agrave;ng&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Balo Mini&quot;,
                &quot;description&quot;: &quot;Balo nhỏ gọn d&agrave;nh cho việc đi chơi, dạo phố&quot;,
                &quot;slug&quot;: &quot;balo-mini&quot;,
                &quot;image&quot;: &quot;categories/balo-mini.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Bechtelar Ltd&quot;,
                &quot;description&quot;: &quot;Aut repudiandae dignissimos ut omnis. Sunt sint repellendus neque corporis eum velit ipsa.&quot;,
                &quot;slug&quot;: &quot;bechtelar-ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009977?text=business+labore&quot;,
                &quot;status&quot;: &quot;inactive&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 11,
                &quot;original_price&quot;: &quot;1992332.00&quot;,
                &quot;sale_price&quot;: &quot;1036012.64&quot;,
                &quot;discount_percentage&quot;: &quot;48.00&quot;,
                &quot;discount_amount&quot;: &quot;956319.36&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 44,
                &quot;sold_quantity&quot;: 2,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;category_id&quot;: 2,
            &quot;brand_id&quot;: 11,
            &quot;name&quot;: &quot;T&uacute;i Adidas Classic facilis&quot;,
            &quot;description&quot;: &quot;Consequatur voluptas et inventore consequatur voluptatem cupiditate laborum. Vero et amet qui qui et reprehenderit. Incidunt ipsa corporis ea. Cupiditate voluptatem sequi impedit dicta. Nulla numquam veniam ut ratione itaque.&quot;,
            &quot;price&quot;: &quot;1321639.00&quot;,
            &quot;quantity&quot;: 42,
            &quot;image&quot;: &quot;https://via.placeholder.com/400x400.png/005599?text=fashion+et&quot;,
            &quot;slug&quot;: &quot;tui-adidas-classic-facilis-7403&quot;,
            &quot;color&quot;: &quot;X&aacute;m&quot;,
            &quot;created_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-18T02:22:21.000000Z&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Balo Du Lịch&quot;,
                &quot;description&quot;: &quot;Balo d&agrave;nh cho c&aacute;c chuyến du lịch, trekking với dung t&iacute;ch lớn v&agrave; nhiều ngăn tiện &iacute;ch&quot;,
                &quot;slug&quot;: &quot;balo-du-lich&quot;,
                &quot;image&quot;: &quot;categories/balo-du-lich.jpg&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;brand&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Lockman, Mueller and Hickle&quot;,
                &quot;description&quot;: &quot;Quia omnis sed sunt amet labore nostrum recusandae. Totam odio eveniet quibusdam. Quaerat adipisci rerum quis repudiandae et dolores.&quot;,
                &quot;slug&quot;: &quot;lockman-mueller-and-hickle&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ee?text=business+reprehenderit&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T02:22:19.000000Z&quot;
            },
            &quot;pivot&quot;: {
                &quot;sale_campaign_id&quot;: 1,
                &quot;product_id&quot;: 14,
                &quot;original_price&quot;: &quot;1321639.00&quot;,
                &quot;sale_price&quot;: &quot;766550.62&quot;,
                &quot;discount_percentage&quot;: &quot;42.00&quot;,
                &quot;discount_amount&quot;: &quot;555088.38&quot;,
                &quot;discount_type&quot;: &quot;percentage&quot;,
                &quot;start_date&quot;: null,
                &quot;end_date&quot;: null,
                &quot;max_quantity&quot;: 44,
                &quot;sold_quantity&quot;: 3,
                &quot;is_active&quot;: 1,
                &quot;created_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-18T17:17:58.000000Z&quot;
            }
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost/api/sale-campaigns/1/products?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost/api/sale-campaigns/1/products?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost/api/sale-campaigns/1/products?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost/api/sale-campaigns/1/products&quot;,
    &quot;per_page&quot;: 12,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 8,
    &quot;total&quot;: 8
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sale-campaigns--saleCampaign_id--products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sale-campaigns--saleCampaign_id--products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sale-campaigns--saleCampaign_id--products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sale-campaigns--saleCampaign_id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sale-campaigns--saleCampaign_id--products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sale-campaigns--saleCampaign_id--products" data-method="GET"
      data-path="api/sale-campaigns/{saleCampaign_id}/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sale-campaigns--saleCampaign_id--products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sale-campaigns--saleCampaign_id--products"
                    onclick="tryItOut('GETapi-sale-campaigns--saleCampaign_id--products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sale-campaigns--saleCampaign_id--products"
                    onclick="cancelTryOut('GETapi-sale-campaigns--saleCampaign_id--products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sale-campaigns--saleCampaign_id--products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sale-campaigns/{saleCampaign_id}/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sale-campaigns--saleCampaign_id--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sale-campaigns--saleCampaign_id--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>saleCampaign_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="saleCampaign_id"                data-endpoint="GETapi-sale-campaigns--saleCampaign_id--products"
               value="1"
               data-component="url">
    <br>
<p>The ID of the saleCampaign. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-sale-campaigns--saleCampaign_id--products">Add products to sale campaign.</h2>

<p>
</p>



<span id="example-requests-POSTapi-sale-campaigns--saleCampaign_id--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/sale-campaigns/1/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"products\": [
        {
            \"product_id\": \"consequatur\",
            \"sale_price\": 45,
            \"discount_type\": \"fixed_amount\",
            \"max_quantity\": 56
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "products": [
        {
            "product_id": "consequatur",
            "sale_price": 45,
            "discount_type": "fixed_amount",
            "max_quantity": 56
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sale-campaigns--saleCampaign_id--products">
</span>
<span id="execution-results-POSTapi-sale-campaigns--saleCampaign_id--products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sale-campaigns--saleCampaign_id--products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sale-campaigns--saleCampaign_id--products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sale-campaigns--saleCampaign_id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sale-campaigns--saleCampaign_id--products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sale-campaigns--saleCampaign_id--products" data-method="POST"
      data-path="api/sale-campaigns/{saleCampaign_id}/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sale-campaigns--saleCampaign_id--products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sale-campaigns--saleCampaign_id--products"
                    onclick="tryItOut('POSTapi-sale-campaigns--saleCampaign_id--products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sale-campaigns--saleCampaign_id--products"
                    onclick="cancelTryOut('POSTapi-sale-campaigns--saleCampaign_id--products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sale-campaigns--saleCampaign_id--products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sale-campaigns/{saleCampaign_id}/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>saleCampaign_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="saleCampaign_id"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="1"
               data-component="url">
    <br>
<p>The ID of the saleCampaign. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>products</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="products.0.product_id"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>sale_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products.0.sale_price"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>45</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>discount_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="products.0.discount_type"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="fixed_amount"
               data-component="body">
    <br>
<p>Example: <code>fixed_amount</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>percentage</code></li> <li><code>fixed_amount</code></li></ul>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>max_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products.0.max_quantity"                data-endpoint="POSTapi-sale-campaigns--saleCampaign_id--products"
               value="56"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>56</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">Remove product from sale campaign.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/sale-campaigns/1/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sale-campaigns/1/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">
</span>
<span id="execution-results-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-" data-method="DELETE"
      data-path="api/sale-campaigns/{saleCampaign_id}/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
                    onclick="tryItOut('DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
                    onclick="cancelTryOut('DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sale-campaigns/{saleCampaign_id}/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>saleCampaign_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="saleCampaign_id"                data-endpoint="DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the saleCampaign. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="DELETEapi-sale-campaigns--saleCampaign_id--products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
