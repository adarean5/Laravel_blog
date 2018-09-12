<?php



$stripe = App::make('App\Billing\Stripe');

Route::get('/', "PostController@index")->name('home');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/posts/tags/{tag}', 'TagController@index');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

/*Route::get('/', 'PostController@index');
Route::get('/postsOld/all', 'PostController@showall');
Route::get('/postsOld/{post}', 'PostController@show');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');*/
