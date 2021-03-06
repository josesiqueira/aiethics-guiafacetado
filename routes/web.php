<?php

Route::get('/', function () {
    return redirect('/app');
});

Route::get('/app/{vue_capture?}', 'VueController@index')->where('vue_capture', '[\/\w\.-]*');

Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Classifications
    Route::get('/classifications', 'ClassificationController@index')->name('classifications');
    Route::get('/classifications/{id}', 'ClassificationController@edit')->name('classifications.edit');
    Route::post('/classifications', 'ClassificationController@store')->name('classifications.store');
    Route::put('/classifications/{id}', 'ClassificationController@update')->name('classifications.update');
    Route::put('/classifications/{id}/update_publish', 'ClassificationController@updatePublishedStatus')->name('classifications.publish');

    // Entities
    Route::get('/classifications/{classificationId}/entities/{id}', 'EntityController@edit')->name('entities.edit');
    Route::get('/classifications/{classificationId}/entities', 'EntityController@index')->name('classifications.entities');
    Route::post('/classifications/{classificationId}/entities', 'EntityController@store')->name('entities.store');
    Route::put('/classifications/{classificationId}/entities/{id}', 'EntityController@update')->name('entities.update');
    Route::put('/classifications/{classificationId}/entities/{id}/update_publish', 'EntityController@updatePublishedStatus')->name('entities.publish');

    Route::get('/classifications/{classificationId}/entities/{entityId}/classification', 'EntityController@classification')->name('entities.classification');
    Route::post('/classifications/{classificationId}/entities/{entityId}/classification', 'EntityController@classification')->name('entities.classification.post');

    // Facets References
    Route::get('/classifications/{classificationId}/entities/{entityId}/references', 'EntityController@references')->name('entities.references');
    Route::post('/classifications/{classificationId}/entities/{entityId}/references', 'EntityController@references')->name('entities.references.post');
    Route::delete('/entities/{entityId}/references/{id}', 'EntityController@detachReference')->name('entities.detach.reference');

    // Facets
    Route::get('/classifications/{classificationId}/facets/{id}', 'FacetController@edit')->name('facets.edit');
    Route::get('/classifications/{classificationId}/facets', 'FacetController@index')->name('classifications.facets');
    Route::post('/classifications/{classificationId}/facets', 'FacetController@store')->name('facets.store');
    Route::put('/classifications/{classificationId}/facets/{id}', 'FacetController@update')->name('facets.update');
    Route::delete('/classifications/{classificationId}/facets/{id}', 'FacetController@destroy')->name('users.delete');

    // Facets Values
    Route::get('/classifications/{classificationId}/facets/{facetId}/values', 'FacetController@values')->name('facets.values');
    Route::get('/classifications/{classificationId}/facets/{facetId}/values/{id}', 'FacetController@editValue')->name('facets.edit.values');
    Route::post('/classifications/{classificationId}/facets/{facetId}/values', 'FacetController@storeValue')->name('facets.store.values');
    Route::put('/classifications/{classificationId}/facets/{facetId}/values/{id}', 'FacetController@updateValue')->name('facets.update.values');
    Route::delete('/values/{id}', 'FacetController@destroyValue')->name('facets.destroy.values');

    // Facets References
    Route::get('/classifications/{classificationId}/facets/{facetId}/references', 'FacetController@references')->name('facets.references');
    Route::post('/classifications/{classificationId}/facets/{facetId}/references', 'FacetController@references')->name('facets.references.post');
    Route::delete('/facets/{facetId}/references/{id}', 'FacetController@detachReference')->name('facets.detach.reference');

    http://localhost:8080/admin/facets/1/reference/43

    // Facets Groups
    Route::get('/facets_groups', 'FacetGroupController@index')->name('facets_groups');
    Route::get('/facets_groups/{id}', 'FacetGroupController@edit')->name('facets_groups.edit');
    Route::post('/facets_groups', 'FacetGroupController@store')->name('facets_groups.store');
    Route::put('/facets_groups/{id}', 'FacetGroupController@update')->name('facets_groups.update');

    // Users
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/users/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::put('/users/{id}', 'UserController@update')->name('users.update');
    Route::delete('/users/{id}', 'UserController@destroy')->name('users.delete');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');

    // Approaches
    Route::get('approaches', 'ApproachController@index')->name('approaches');
    Route::get('approaches/{slug}', 'ApproachController@getApproachBySlug')->name('approach.slug');
    Route::get('approaches/{slug}/references', 'ApproachController@getReferencesByApproachSlug')->name('approach.references');
    Route::get('approaches/{slug}/entities', 'ApproachController@getEntitiesByApproachSlug')->name('approach.entities');
});
