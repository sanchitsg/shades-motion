<?php

/*
|--------------------------------------------------------------------------------------------------
|   Web Routes
|--------------------------------------------------------------------------------------------------
|   The following URLs are available for Web Front:
|   1. Home Page.
|   2. Team Page.
|   3. Work Page.
|   4. Sectional Content.
|--------------------------------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------------------------------
|   HOME PAGE ROUTES.
|   The following set of URLs are for Home Page Controller.
|   Please make sure to add any futher url additions required for Home Page here.
|--------------------------------------------------------------------------------------------------
*/
Route::get('/','HomeController@getHomePage');


/*
|--------------------------------------------------------------------------------------------------
|   TEAM PAGE ROUTES.
|   The following set of URLs are for Team Page Controller.
|   Please make sure to add any futher url additions required for Team Page here.
|--------------------------------------------------------------------------------------------------
*/
Route::get('/team','TeamController@getTeamPage');


/*
|--------------------------------------------------------------------------------------------------
|   WORK PAGE ROUTES.
|   The following set of URLs are for Work Page Controller.
|   Please make sure to add any futher url additions required for Work Page here.
|--------------------------------------------------------------------------------------------------
*/
Route::get('/work/{type?}','WorkController@getWorkPage');
Route::get('/work-ajax','WorkController@getWorkPageAjax');


/*
|--------------------------------------------------------------------------------------------------
|   SECTIONAL ROUTES.
|   The following set of URLs are for various sections of the website.
|   Please make sure to add any futher url additions required for various sections of the website.
|--------------------------------------------------------------------------------------------------
*/
Route::post('/submit-contact-from','ContactController@postContacts');