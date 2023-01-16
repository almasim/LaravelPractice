<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController; 
use App\Http\Controllers\Home\AboutController; 
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;

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

Route::get('/', function () {
    return view('frontend.index');
});

// Route::get(DemoController::class)->group(function () {
//     Route::get('/about','Index')->name('about.page')->middleware('check');
//     Route::get('/contact','ContactMethod')->name('contact.page');
// });


//Admin All route
Route::middleware(['auth'])->group(function(){ 
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout','destroy')->name('admin.logout');
        Route::get('/admin/profile','Profile')->name('admin.profile');
        Route::get('/edit/profile','EditProfile')->name('edit.profile');
        Route::post('/store/profile','StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });
});


//HomeSlide All route
Route::middleware(['auth'])->group(function(){ 
    Route::controller(HomeSliderController::class)->group(function(){
        Route::get('/home/slide','HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });
});

//AboutPage All route

Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');
    Route::get('/about/multi','AboutMulti')->name('about.multi');
    Route::post('/store/multi/image', 'StoreMultiImages')->name('store.multi.image');
    Route::get('/all/multi','AllMulti')->name('all.multi.image');
    Route::get('/edit/multi/{id}','EditMulti')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImages')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});

//Portfolio All route 
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio','AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::post('/update/portfolio','UpdatePortfolio')->name('update.portfolio');
    Route::get('/edit/port/{id}','EditPortfolio')->name('edit.port');
    Route::post('/upperdate/portfolio', 'UpperdatePortfolio')->name('upperdate.portfolio');
    Route::get('/delete/port/{id}','DeletePortfolio')->name('delete.port');
    Route::get('/details/portfolio/{id}','DetailsPortfolio')->name('portfolio.details');
    Route::get('/portfolio','HomePortfolio')->name('home.portfolio');
});

//BlogCategory All route
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
});

//Blog All route
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog','AddBlog')->name('add.blog');
    Route::get('/edit/blog/{id}','EditBlog')->name('edit.blog');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::post('/update/blog','UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}','DeleteBlog')->name('delete.blog');
    Route::get('/details/blog/{id}','DetailsBlog')->name('details.blog');
    Route::get('/category/blog/{id}','CategoryBlog')->name('category.blog');
    Route::get('/blog','HomeBlog')->name('home.blog');
});

//Contact All route footer.update
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','Contact')->name('contact.me');
    Route::get('/contact/message','ContactMessage')->name('contact.message');
    Route::post('/store/message','StoreMessage')->name('store.message');
    Route::get('/delete/message/{id}','DeleteMessage')->name('delete.message');
});

//Footer All route footer.update
Route::controller(FooterController::class)->group(function(){
    Route::get('/footer/setup','FooterSetup')->name('footer.setup');
    Route::post('/footer/update','FooterUpdate')->name('footer.update');
});

Route::get('/dashboard', function () {
    return view('admin.index'); //. is literaly admin/index
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
