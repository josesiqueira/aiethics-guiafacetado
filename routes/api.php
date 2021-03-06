<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('classifications', 'ClassificationController@index');

Route::get('classifications/{slug}', 'ClassificationController@getClassificationBySlug');

Route::get('classifications/{slug}/entities', 'EntityController@getByClassificationSlug');

Route::post('classifications/{slug}/entities', 'EntityController@getByClassificationSlug');

Route::get('classifications/{slug}/facets', 'ClassificationController@getFacetsByClassificationSlug');

Route::get('classifications/{slug}/facets/references', 'ClassificationController@getFacetsReferencesByClassificationSlug');

Route::get('entities/{slug}', 'EntityController@getBySlug');

Route::get('entities/{slug}/approaches', 'EntityController@getApproachesByEntity');

Route::get('entities/{slug}/references', 'EntityController@getReferencesByEntitySlug');

Route::get('entities/{slug}/values', 'EntityController@getValuesByEntitySlug');

Route::get('entities/page_views/{id}', 'EntityController@addPageView');

Route::get('facet_groups/{classificationSlug}', 'FacetGroupController@getFacetGroupsByClassificationSlug');

Route::get('approaches', 'ApproachController@index');

Route::get('approaches/{slug}', 'ApproachController@getApproachBySlug');

Route::get('approaches/{slug}/references', 'ApproachController@getReferencesByApproachSlug');

Route::get('approaches/{slug}/entities', 'ApproachController@getEntitiesByApproachSlug');

Route::get('classification/{id}', 'ClassificationController@getClassificationSlugById');