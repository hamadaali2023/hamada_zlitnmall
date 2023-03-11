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
  Route::get('/', 'userController@showAdminlogin');
  
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
    
    ], 
    function() {
        Route::get('/Admin', function () {
            return view('account.pages.Interface');
        });
        
       Route::get('/Zlitn', "userController@interface");
       Route::get('/Admin/profile', 'userController@Adminprofile');
   
   }
);

 /*------End-Acess Admin url -----*/

  // categories 
  Route::get('Admin/Categories', "adminController@ShowCategories")->middleware('permission:قراءة-التصنيفات');
  Route::post('Admin/CategoriesStore', "adminController@storeCategories")->middleware('permission:أنشاء-تصنيف');
  Route::get('Admin/UpdatCategory/{id}', "adminController@UpdatCategory")->middleware('permission:تعديل-تصنيف');
  Route::get('Admin/DeleteCategory/{id}', "adminController@DeleteCategory")->middleware('permission:حذف-تصنيف');
  Route::post('Admin/UpdatCategorysubmit', "adminController@UpdatCategorysubmit")->middleware('permission:تعديل-تصنيف');
  Route::post('/Admin/searchCategories', "adminController@searchCategories")->middleware('permission:قراءة-التصنيفات');

  // sections 
  Route::get('/Admin/Cites', "adminController@Showcity")->middleware('permission:قراءة-المدن');
  Route::post('Admin/CitesStore', "adminController@storecity")->middleware('permission:أنشاء-مدينة');
  Route::post('Admin/CitesStoreupdate', "adminController@CitesStoreupdate")->middleware('permission:تعديل-المدينة');
  Route::get('/Admin/UpdatCity/{id}', "adminController@Citesupdate")->middleware('permission:تعديل-المدينة');
  Route::get('/Admin/DeleteCity/{id}', "adminController@Citesdelete")->middleware('permission:حذف-المدينة');


  Route::get('/Admin/shops', "adminController@shops")->middleware('permission:قراءة-المحلات');
  Route::post('/Admin/ShopStore','adminController@storeshop')->middleware('permission:أنشاء-محل');
  Route::get('/Admin/Deleteshop/{id}','adminController@Deleteshop')->middleware('permission:حذف-محل');
  Route::get('/Admin/Updateshop/{id}','adminController@Updateshop')->middleware('permission:تعديل-محل');
  Route::post('/Admin/Shopupdate','adminController@Shopupdate')->middleware('permission:تعديل-محل');






// route Role permissions
Route::resource('Role', 'RoleController', ['only' => 'index'])->middleware('permission:قراءة-الصلحيات');

Route::resource('Role', 'RoleController', ['only' => 'store'])->middleware('permission:أنشاء-صالحية');

Route::resource('Role', 'RoleController', ['only' => 'edit'])->middleware('permission:تعديل-صالحية');
Route::resource('Role', 'RoleController', ['only' => 'update'])->middleware('permission:تعديل-صالحية');

Route::resource('Role', 'RoleController', ['only' => 'destroy'])->middleware('permission:مسح-صالحية');
// end route Role permissions

// route Product permissions
Route::get('/Admin/products', "adminController@Showproducts")->middleware('permission:قراءة-المنتجات');

Route::post('/Admin/productsStore', "adminController@storeproducts")->middleware('permission:أنشاء-منتج');
Route::post('/Admin/product_Status/{id}', "adminController@product_Status")->middleware('permission:السماح-بنشر-المنتج');

Route::get('/Admin/Deleteproduct/{id}', "adminController@Deleteproduct")->middleware('permission:مسح-منتج');

Route::get('/Admin/Updateproduct/{id}', "adminController@Updateproduct")->middleware('permission:تعديل-منتج');
// end route Product permissions

// route User permissions
Route::post('/add-role', 'userController@addRole')->middleware('permission:قراءة-المستخدمين');

Route::get('/Admin/user', "userController@CreateUser")->middleware('permission:قراءة-المستخدمين');

Route::post('/Admin/userstore', "userController@storeuser")->middleware('permission:أنشاء-مستخدم');

Route::get('/Admin/DeleteUser/{id}', "userController@DeleteUser")->middleware('permission:حذف-مستخدم');

Route::get('/Admin/UpdateUser/{id}', "userController@UpdateUser")->middleware('permission:تعديل-مستخدم');

Route::post('/Admin/userUpdate', "userController@userUpdate")->middleware('permission:تعديل-مستخدم');

Route::post('/Admin/userUpdateRole/{id}', "userController@userRoleUpdate")->middleware('permission:تعديل-مستخدم');
// end route user permissions



/*-----------------------------------الأعلانات----------------------------------------------------------*/
Route::get('admin/Adv', 'AdvController@show');
Route::get('admin/Adv/{id}/edit', 'AdvController@edit'); // edit page view
Route::post('admin/Adv/{id}/edit','AdvController@update'); // submit form in edit page
Route::get('admin/Adv/{id}/delete','AdvController@delete'); // submit form in edit page
Route::get('admin/Adv/create','AdvController@create'); // submit form in edit page
Route::post('Admin/Adv/create','AdvController@createAdv'); // submit form in edit page
/*-----------------------------------الأعلانات----------------------------------------------------------*/











