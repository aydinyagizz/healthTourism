<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/')->group(function () {
    Route::get( '/', [\App\Http\Controllers\AdminFrontend\AdminFrontendController::class, 'adminFrontendIndex'])->name('admin.frontend.index');
    Route::get( '/blog', [\App\Http\Controllers\AdminFrontend\AdminFrontendBlogController::class, 'adminFrontendBlog'])->name('admin.frontend.blog');
    Route::get( '/cities', [\App\Http\Controllers\AdminFrontend\AdminFrontendCityController::class, 'adminFrontendCity'])->name('admin.frontend.city');
    Route::get( '/citiesDetail/{slug}', [\App\Http\Controllers\AdminFrontend\AdminFrontendCityController::class, 'adminFrontendCityDetail'])->name('admin.frontend.city.detail');
    Route::get( '/treatment', [\App\Http\Controllers\AdminFrontend\AdminFrontendDiseasesController::class, 'adminFrontendDiseases'])->name('admin.frontend.diseases');
    Route::get( '/treatmentDetail/{slug}', [\App\Http\Controllers\AdminFrontend\AdminFrontendDiseasesController::class, 'adminFrontendDiseasesDetail'])->name('admin.frontend.diseases.detail');
    Route::match(['get', 'post'], '/offer', [\App\Http\Controllers\AdminFrontend\AdminFrontendOfferController::class, 'adminFrontendOffer'])->name('admin.frontend.offer');
    Route::post( '/offerPost', [\App\Http\Controllers\AdminFrontend\AdminFrontendOfferController::class, 'adminFrontendOfferPost'])->name('admin.frontend.offer.post');
    Route::post('/api/fetch-get-diseases', [\App\Http\Controllers\AdminFrontend\AdminFrontendOfferController::class, 'adminFrontendOfferGetDiseases'])->name('fetch-get-diseases');
    Route::post('/api/fetch-agency-count', [\App\Http\Controllers\AdminFrontend\AdminFrontendOfferController::class, 'adminFrontendOfferGetAgencyCount'])->name('fetch.get.agency.count');
});



\Illuminate\Support\Facades\Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::match(['get', 'post'], '/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


// ADMİN
Route::prefix('/admin')->middleware(['is_admin', 'role:Admin'])->group(function () {
    Route::get('/home', [\App\Http\Controllers\Admin\AdminController::class, 'adminIndex'])->name('admin.index');

    Route::get( '/user', [\App\Http\Controllers\Admin\UserController::class, 'userList'])->name('admin.user.list');
    Route::post( '/userAdd', [\App\Http\Controllers\Admin\UserController::class, 'userAdd'])->name('admin.user.add');
    Route::post( '/userDelete', [\App\Http\Controllers\Admin\UserController::class, 'userDelete'])->name('admin.user.delete');
    Route::post( '/userUpdate/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userUpdate'])->name('admin.user.update');
    Route::get( '/userDetail/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userDetail'])->name('admin.user.detail');
    Route::get( '/userDetailLog/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userDetailLog'])->name('admin.user.detail.log');
    Route::post( '/userPermissions/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userPermissions'])->name('admin.user.permissions');
    Route::post('/userImport',[\App\Http\Controllers\Admin\UserController::class,'userImport'])->name('admin.user.import');


    Route::get( '/blogCategory', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'blogCategoryList'])->name('admin.blog.category.list');
    Route::post( '/blogCategoryAdd', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'blogCategoryAdd'])->name('admin.blog.category.add');
    Route::post( '/blogCategoryDelete', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'blogCategoryDelete'])->name('admin.blog.category.delete');
    Route::post( '/blogCategoryUpdate/{id}', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'blogCategoryUpdate'])->name('admin.blog.category.update');


    Route::get( '/blog', [\App\Http\Controllers\Admin\BlogController::class, 'blogList'])->name('admin.blog.list');
    Route::post( '/blogAdd', [\App\Http\Controllers\Admin\BlogController::class, 'blogAdd'])->name('admin.blog.add');
    Route::post( '/blogDelete', [\App\Http\Controllers\Admin\BlogController::class, 'blogDelete'])->name('admin.blog.delete');
    Route::post( '/blogUpdate/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'blogUpdate'])->name('admin.blog.update');

    Route::get( '/aboutUs', [\App\Http\Controllers\Admin\AboutUsController::class, 'aboutUsList'])->name('admin.about.us.list');
    Route::post( '/aboutUsUpdate', [\App\Http\Controllers\Admin\AboutUsController::class, 'aboutUsUpdate'])->name('admin.about.us.update');

    Route::get( '/services', [\App\Http\Controllers\Admin\ServicesController::class, 'servicesList'])->name('admin.services.list');
    Route::post( '/servicesAdd', [\App\Http\Controllers\Admin\ServicesController::class, 'servicesAdd'])->name('admin.services.add');
    Route::post( '/servicesDelete', [\App\Http\Controllers\Admin\ServicesController::class, 'servicesDelete'])->name('admin.services.delete');
    Route::post( '/servicesUpdate/{id}', [\App\Http\Controllers\Admin\ServicesController::class, 'servicesUpdate'])->name('admin.services.update');

    Route::get( '/pricing', [\App\Http\Controllers\Admin\PricingController::class, 'pricingList'])->name('admin.pricing.list');
    Route::post( '/pricingAdd', [\App\Http\Controllers\Admin\PricingController::class, 'pricingAdd'])->name('admin.pricing.add');
    Route::post( '/pricingDelete', [\App\Http\Controllers\Admin\PricingController::class, 'pricingDelete'])->name('admin.pricing.delete');
    Route::post( '/pricingUpdate/{id}', [\App\Http\Controllers\Admin\PricingController::class, 'pricingUpdate'])->name('admin.pricing.update');


    Route::get( '/city', [\App\Http\Controllers\Admin\CityController::class, 'cityList'])->name('admin.city.list');
    Route::post( '/cityAdd', [\App\Http\Controllers\Admin\CityController::class, 'cityAdd'])->name('admin.city.add');
    Route::get( '/cityUpdate/{id}', [\App\Http\Controllers\Admin\CityController::class, 'cityUpdate'])->name('admin.city.update');
    Route::post( '/cityUpdatePost/{id}', [\App\Http\Controllers\Admin\CityController::class, 'cityUpdatePost'])->name('admin.city.update.post');
    Route::post( '/cityDelete', [\App\Http\Controllers\Admin\CityController::class, 'cityDelete'])->name('admin.city.delete');


    Route::get( '/treatmentCategory', [\App\Http\Controllers\Admin\DiseasesCategoryController::class, 'diseaseCategoryList'])->name('admin.disease.category.list');
    Route::post( '/treatmentCategoryAdd', [\App\Http\Controllers\Admin\DiseasesCategoryController::class, 'diseaseCategoryAdd'])->name('admin.disease.category.add');
    Route::post( '/treatmentCategoryDelete', [\App\Http\Controllers\Admin\DiseasesCategoryController::class, 'diseaseCategoryDelete'])->name('admin.disease.category.delete');
    Route::post( '/treatmentCategoryUpdate/{id}', [\App\Http\Controllers\Admin\DiseasesCategoryController::class, 'diseaseCategoryUpdate'])->name('admin.disease.category.update');

//    Route::get( '/diseases', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesList'])->name('admin.diseases.list');
    Route::get( '/treatment', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesList'])->name('admin.diseases.list');
    Route::post( '/treatmentAdd', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesAdd'])->name('admin.diseases.add');
    Route::post( '/treatmentDelete', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesDelete'])->name('admin.diseases.delete');
    Route::get( '/treatmentUpdate/{id}', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesUpdate'])->name('admin.diseases.update');
    Route::post( '/treatmentUpdatePost/{id}', [\App\Http\Controllers\Admin\DiseasesController::class, 'diseasesUpdatePost'])->name('admin.diseases.update.post');

});




//USER
Route::prefix('/user')->middleware(['is_user', 'role:User'])->group(function () {

    Route::get('/home', [\App\Http\Controllers\User\UserController::class, 'userIndex'])->name('user.index');

    Route::get('/edit', [\App\Http\Controllers\User\UserEditController::class, 'userEdit'])->name('user.edit');
    Route::post( '/edit/profileDetail', [\App\Http\Controllers\User\UserEditController::class, 'userEditProfileDetail'])->name('user.edit.profile.detail');
    Route::post( '/edit/email', [\App\Http\Controllers\User\UserEditController::class, 'userEditEmail'])->name('user.edit.email');
    Route::post( '/edit/password', [\App\Http\Controllers\User\UserEditController::class, 'userEditPassword'])->name('user.edit.password');

//
//    Route::get('/config', [\App\Http\Controllers\User\UserConfigController::class, 'userConfig'])->name('user.config');
//    Route::post( '/config/template', [\App\Http\Controllers\User\UserConfigController::class, 'userConfigTemplate'])->name('user.config.template');
//
//    Route::get( '/aboutUs', [\App\Http\Controllers\User\UserAboutUsController::class, 'aboutUsList'])->name('user.about.us.list')->middleware(['permission:about us view']);
//    Route::post( '/aboutUsUpdate', [\App\Http\Controllers\User\UserAboutUsController::class, 'aboutUsUpdate'])->name('user.about.us.update')->middleware('permission:about us update');
//
//    Route::get( '/services', [\App\Http\Controllers\User\UserServicesController::class, 'servicesList'])->name('user.services.list')->middleware(['permission:services view']);
//    Route::post( '/servicesAdd', [\App\Http\Controllers\User\UserServicesController::class, 'servicesAdd'])->name('user.services.add')->middleware('permission:services create');
//    Route::post( '/servicesDelete', [\App\Http\Controllers\User\UserServicesController::class, 'servicesDelete'])->name('user.services.delete')->middleware('permission:services delete');
//    Route::post( '/servicesUpdate/{id}', [\App\Http\Controllers\User\UserServicesController::class, 'servicesUpdate'])->name('user.services.update')->middleware('permission:services update');
//
//    Route::get( '/pricing', [\App\Http\Controllers\User\UserPricingController::class, 'pricingList'])->name('user.pricing.list')->middleware(['permission:pricing view']);
//    Route::post( '/pricingAdd', [\App\Http\Controllers\User\UserPricingController::class, 'pricingAdd'])->name('user.pricing.add')->middleware('permission:pricing create');
//    Route::post( '/pricingDelete', [\App\Http\Controllers\User\UserPricingController::class, 'pricingDelete'])->name('user.pricing.delete')->middleware('permission:pricing delete');
//    Route::post( '/pricingUpdate/{id}', [\App\Http\Controllers\User\UserPricingController::class, 'pricingUpdate'])->name('user.pricing.update')->middleware('permission:pricing update');
//
//    Route::get( '/faq', [\App\Http\Controllers\User\UserFaqController::class, 'faqList'])->name('user.faq.list')->middleware(['permission:faq view']);
//    //middleware(['permission:faq view', 'permission:faq create'])
//    Route::post( '/faqAdd', [\App\Http\Controllers\User\UserFaqController::class, 'faqAdd'])->name('user.faq.add')->middleware('permission:faq create');
//    Route::post( '/faqDelete', [\App\Http\Controllers\User\UserFaqController::class, 'faqDelete'])->name('user.faq.delete')->middleware('permission:faq delete');
//    Route::post( '/faqUpdate/{id}', [\App\Http\Controllers\User\UserFaqController::class, 'faqUpdate'])->name('user.faq.update')->middleware('permission:faq update');
//
//    Route::get( '/socialMedia', [\App\Http\Controllers\User\UserSocialMediaController::class, 'socialMediaList'])->name('user.social.media.list');
//    Route::post( '/socialMediaAdd', [\App\Http\Controllers\User\UserSocialMediaController::class, 'socialMediaAdd'])->name('user.social.media.add');
//    Route::post( '/socialMediaDelete', [\App\Http\Controllers\User\UserSocialMediaController::class, 'socialMediaDelete'])->name('user.social.media.delete');
//    Route::post( '/socialMediaUpdate/{id}', [\App\Http\Controllers\User\UserSocialMediaController::class, 'socialMediaUpdate'])->name('user.social.media.update');
//
//
//    Route::get( '/frontendHome', [\App\Http\Controllers\User\UserHomeController::class, 'homeList'])->name('user.home.list');
//    Route::post( '/homeUpdate', [\App\Http\Controllers\User\UserHomeController::class, 'homeUpdate'])->name('user.home.update');

    Route::get( '/offers', [\App\Http\Controllers\User\UserOffersController::class, 'offersList'])->name('user.offers.list');

    Route::post('/offer/update-status/{id}', [\App\Http\Controllers\User\UserOffersController::class, 'updateStatus'])->name('offer.update-status');

});




//Route::fallback(function () {
//    return view('welcome'); // Varsayılan sayfa veya hata sayfasını buraya yönlendirin.
//});








//Route::middleware(\App\Http\Middleware\ResolveDynamicDomain::class)->group(function() {
//    if(\App\DynamicDomain::get()) {
//        Route::get('/', [\App\Http\Controllers\Domain\DynamicDomainController::class, 'index']);
//    } else {
//        Route::prefix('/{slug}')->group(function () {
//            Route::get('/', [\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex'])->name('user.frontend.index');
//
//        });
//    }
//});



//Route::group(function() {
//    if(\App\DynamicDomain::get()) {
//        Route::get('/', [\App\Http\Controllers\Domain\DynamicDomainController::class, 'index']);
//    } else {
//        Route::prefix('/{slug}')->group(function () {
//            Route::get('/', [\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex'])->name('user.frontend.index');
//
//        });
//    }
//});

//Route::group([], function () {
//    // Örneğin, /{slug} şeklinde bir URL rotası tanımladığınızı varsayalım
//    Route::get('/{slug}', function ($slug) {
//        // Users tablosunda "domain" sütununu sorgula
//        $user = \Illuminate\Support\Facades\DB::table('users')->where('slug', $slug)->first();
//
//        if ($user && $user->domain) {
//            dd("geldi");
//            // Eğer domain varsa ilgili alana yönlendirme yap
//                  // Route::get('/', [\App\Http\Controllers\Domain\DynamicDomainController::class, 'index']);
//
//            //return \Illuminate\Support\Facades\Redirect::away($user->domain);
//        } else {
//            // Eğer domain bulunamazsa 404 sayfasına yönlendirme yap
//            Route::get('/', [\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex']);
//        }
//    })->name('user.frontend.index');
//});






Route::get('web/{slug}', function ($slug) {
    // Users tablosunda "slug" sütununu sorgula
    $user = \Illuminate\Support\Facades\DB::table('users')->where('slug', $slug)->first();

    if (isset($user->domain)) {
        // Eğer domain varsa ilgili alana yönlendirme yap
        return \Illuminate\Support\Facades\Redirect::away('https://' . $user->domain);

    } else {
        // Eğer domain bulunamazsa başka bir işlem yapabilirsiniz
        // Örneğin, hata mesajı gösterebilir veya farklı bir sayfaya yönlendirebilirsiniz
        //      return \Illuminate\Support\Facades\Redirect::action([\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex']);
        return app(\App\Http\Controllers\UserFrontend\UserFrontendController::class)->userFrontendIndex(request(), $slug, app(\Flasher\Prime\FlasherInterface::class));

    }
})->where('slug', '^(?!.*\..*$).*')->name('user.frontend.index');

//Route::get('/{slug}', function ($slug) {
//    // Users tablosunda "domain" sütununu sorgula
//    $user = \Illuminate\Support\Facades\DB::table('users')->where('slug', $slug)->first();
//
//    if (isset($user->domain)) {
//        // Eğer domain varsa ilgili alana yönlendirme yap
//        return \Illuminate\Support\Facades\Redirect::away('https://' . $user->domain);
//    } else {
//        // Eğer domain bulunamazsa başka bir işlem yapabilirsiniz
//        // Örneğin, hata mesajı gösterebilir veya farklı bir sayfaya yönlendirebilirsiniz
//        Route::get('/', [\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex']);
//
//    }
//})->where('slug', '^(?!.*\..*$).*')->name('user.frontend.index');




//USER FRONTEND
//Route::prefix('/{slug}')->group(function () {
//    Route::get('/', [\App\Http\Controllers\UserFrontend\UserFrontendController::class, 'userFrontendIndex'])->name('user.frontend.index');
//
//});
