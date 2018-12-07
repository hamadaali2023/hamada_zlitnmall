<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


/**--------end website -------------**/
Route::get('/', function () {
    return view('website.homepage');
});

Route::get('/products', function () {
    return view('website.pages.products');
});
Route::get('/shopmen', function () {
    return view('website.pages.----');
});
Route::get('/shopwomen', function () {
    return view('website.pages.---');
});
Route::get('/shopchildren', function () {
    return view('website.pages.-----');
});

Route::get('/about', function () {
    return view('website.pages.about');
});

Route::get('/contact', function () {
    return view('website.pages.contact');
});

Route::get('/help', function () {
    return view('website.pages.help');
});
Route::get('/blog', function () {
    return view('website.pages.blog');
});
Route::get('/blogdetail', function () {
    return view('website.pages.blogdetail');
});
Route::get('/cart', function () {
    return view('website.pages.cart');
});
Route::get('/checkout', function () {
    return view('website.pages.checkout');
});
Route::get('/checkoutt', function () {
    return view('website.pages.checkout2');
});


Route::get('/elements', function () {
    return view('website.pages.elements');
});
/**--------end website -------------**/



// --------chick Admin 

Route::get('/AccessDenied', "userController@AccessDenied");
Route::post('/chickpassword', "userController@chickpassword");
Route::get('/AdminLogOut', "userController@AdminLogOut");
Route::get('/Admin/login',"userController@showAdminlogin" );
Route::post('/Admin/slogin',"userController@Adminlogin" );


// -------------end Chick  Admin ------------


Route::get('/home', 'HomeController@index')->name('home');

/*----------Acess Admin url -----*/
Route::group
(
    [ 
    'middleware' => 
    [
        'permission:Access_admin_panel',
       
    ]
    ], function() {
        Route::get('/Admin', function () {
            return view('account.pages.Interface');
        });
        
       Route::get('/ssss', "userController@interface");
       Route::get('/Admin/profile', 'userController@Adminprofile');
         // categories 
        Route::get('Admin/Categories', "adminController@ShowCategories");
        Route::post('Admin/CategoriesStore', "adminController@storeCategories");
        // sections 
        Route::get('/Admin/Sections', "adminController@ShowSections");
        Route::post('Admin/SectionsStore', "adminController@storeSections");


   
   }
);

 /*------End-Acess Admin url -----*/







// route Role permissions
Route::group(
    [ 
    'middleware' => [
        'permission:role-read',
        'permission:role-create',
        'permission:role-delete',
        'permission:role-edit'
        ]
    ], function() {
    Route::resource('Role', 'RoleController');
});

// end route Role permissions

// route Product permissions
Route::group(
    [ 
    'middleware' => [
        'permission:product-read',
        'permission:product-create',
        'permission:product-delete',
        'permission:product-edit'
        ]
    ], function() {
        Route::get('/Admin/products', "adminController@Showproducts");
        Route::post('/Admin/productsStore', "adminController@storeproducts");
        Route::get('/Admin/Deleteproduct/{id}', "adminController@Deleteproduct");
        Route::get('/Admin/Updateproduct/{id}', "adminController@Updateproduct");
});
// end route Product permissions



// route User permissions
Route::group(
    [ 
    'middleware' => [
        'permission:user-read',
        'permission:user-create',
        'permission:user-delete',
        'permission:user-edit'
        ]
    ], function() {
         // user Admin
    Route::post('/add-role', 'userController@addRole');
    Route::get('/Admin/user', "userController@CreateUser");
    Route::post('/Admin/userstore', "userController@storeuser");
    Route::get('/Admin/DeleteUser/{id}', "userController@DeleteUser");
    Route::get('/Admin/UpdateUser/{id}', "userController@UpdateUser");
    Route::post('/Admin/userUpdate', "userController@userUpdate");
    Route::post('/Admin/userUpdateRole/{id}', "userController@userRoleUpdate");
        
});

// end route user permissions

/* ------test api ----*/
Route::group(['middleware' => 'web'], function() {
    route::get('api/testapi','userController@testapi');
});


/* -----end test api ----*/


Route::get('/apiget', function () {
    return view('welcome');
});









