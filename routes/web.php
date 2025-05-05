

<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\RiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\tables\Basic as TablesBasic;
use GuzzleHttp\Client;
use PHPUnit\Architecture\Services\ServiceContainer;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;

// Main Page Route
// Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
Route::get('/dashboard', [ServiceController::class, 'index'])->name('dashboard');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/icons-ri', [RiIcons::class, 'index'])->name('icons-ri');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');


//----app admin routes----
Route::get('/dashboard/services', [ServiceController::class, 'index'])->name('dashboard-services');
Route::get('/dashboard/services/create', [ServiceController::class, 'create'])->name('dashboard-services-create');
Route::get('/dashboard/services/edit/{id}', [ServiceController::class, 'edit'])->name('dashboard-services-edit');
Route::post('/dashboard/services', [ServiceController::class, 'store'])->name('dashboard-services-store');
Route::put('/dashboard/services/{serviceId}', [ServiceController::class, 'update'])->name('dashboard-services-update');
Route::delete('/dashboard/services/{serviceId}', [ServiceController::class, 'destroy'])->name('dashboard-services-destroy');

//appointments Routes
Route::get('/dashboard/appointments', [AppointmentController::class, 'index'])->name('dashboard-appointments');
Route::get('/dashboard/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('dashboard-appointments-edit');
Route::get('/dashboard/appointments/create', [AppointmentController::class, 'create'])->name('dashboard-appointments-create');
Route::post('/dashboard/appointments', [AppointmentController::class, 'store'])->name('dashboard-appointments-store');
Route::post('/api/appointments', [AppointmentController::class, 'store_api'])->name('dashboard-appointments-store-api');
// Route::put('/dashboard/appointments/{appointment}', [AppointmentController::class, 'update'])->name('dashboard-appointments-update');
Route::delete('/dashboard/appointments/{id}', [AppointmentController::class, 'destroy'])->name('dashboard-appointments-destroy');
Route::post('/dashboard/appointments/status', [AppointmentController::class, 'updateStatus'])->name('dashboard-appointments-update-status');
Route::put('/dashboard/appointments/{id}', [AppointmentController::class, 'update'])->name('dashboard-appointments-update');

// Route::put('/dashboard/appointments/{appointmentId}', [AppointmentController::class, 'update'])->name('dashboard-appointments-update');
// Route::delete('/dashboard/appointments/{appointmentId}', [AppointmentController::class, 'destroy'])->name('dashboard-appointments-destroy');
// Route::get('/dashboard/appointments/{appointmentId}/details', [AppointmentController::class, 'show'])->name('dashboard-appointments-details');
// Route::get('/dashboard/appointments/{appointmentId}/edit', [AppointmentController::class, 'edit'])->name('dashboard-appointments-edit');
// Route::get('/dashboard/appointments/{appointmentId}/status', [AppointmentController::class, 'status'])->name('dashboard-appointments-status');

Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard-categories');
Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('dashboard-categories-create');
Route::get('/dashboard/categories/edit/{id}', [CategoryController::class, 'edit'])->name('dashboard-categories-edit');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('dashboard-categories-store');
Route::put('/dashboard/categories/{id}', [CategoryController::class, 'update'])->name('dashboard-categories-update');
Route::delete('/dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('dashboard-categories-destroy');


//categories Routes
// Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard-categories');
// Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('dashboard-categories-store');
// Route::put('/dashboard/categories/{id}', [CategoryController::class, 'update'])->name('dashboard-categories-update');
// Route::delete('/dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('dashboard-categories-destroy');

//sub-categories Routes
Route::get('/dashboard/sub-categories', [SubCategoryController::class, 'index'])->name('dashboard-sub-categories');
Route::get('/dashboard/sub-categories/create', [SubCategoryController::class, 'create'])->name('dashboard-sub-categories-create');
Route::get('/dashboard/sub-categories/edit/{id}', [SubCategoryController::class, 'edit'])->name('dashboard-sub-categories-edit');
Route::post('/dashboard/sub-categories', [SubCategoryController::class, 'store'])->name('dashboard-sub-categories-store');
Route::put('/dashboard/sub-categories/{id}', [SubCategoryController::class, 'update'])->name('dashboard-sub-categories-update');
Route::delete('/dashboard/sub-categories/{id}', [SubCategoryController::class, 'destroy'])->name('dashboard-sub-categories-destroy');



// Brands Routes
Route::get('/dashboard/brands', [BrandController::class, 'index'])->name('dashboard-brands');
Route::get('/dashboard/brands/create', [BrandController::class, 'create'])->name('dashboard-brands-create');
Route::get('/dashboard/brands/edit/{id}', [BrandController::class, 'edit'])->name('dashboard-brands-edit');
Route::post('/dashboard/brands', [BrandController::class, 'store'])->name('dashboard-brands-store');
Route::put('/dashboard/brands/{id}', [BrandController::class, 'update'])->name('dashboard-brands-update');
Route::delete('/dashboard/brands/{id}', [BrandController::class, 'destroy'])->name('dashboard-brands-destroy');

// Products Routes
Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard-products');
Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('dashboard-products-create');
Route::get('/dashboard/products/edit/{id}', [ProductController::class, 'edit'])->name('dashboard-products-edit');
Route::post('/dashboard/products', [ProductController::class, 'store'])->name('dashboard-products-store');
Route::put('/dashboard/products/{id}', [ProductController::class, 'update'])->name('dashboard-products-update');
Route::delete('/dashboard/products/{id}', [ProductController::class, 'destroy'])->name('dashboard-products-destroy');

//----Client Routes----
Route::get('/', [ClientController::class, 'home'])->name('home');

Route::get('/about-us', [ClientController::class, 'aboutUs'])->name('about-us');

Route::get('/shop', [ClientController::class, 'shop'])->name('shop');

Route::get('/services/{slug}', [ClientController::class, 'serviceDetails'])->name('service-details');

Route::get('/all-services', [ClientController::class, 'allServices'])->name('all-services');

Route::get('/store', [ClientController::class, 'store'])->name('store');

Route::post('request-advice', [ClientController::class, 'requestAdvice'])->name('request-advice');

Route::get('/shop', [ClientController::class, 'shop'])->name('shop');

Route::get('/api/shop', [ClientController::class, 'shop_api'])->name('api.shop');

Route::get('/make-appointment', [ClientController::class, 'makeAppointmentPage'])->name('make-appointment');

Route::post('/make-appointment', [ClientController::class, 'makeAppointmentStore'])->name('make-appointment.store');
// Product details route
Route::get('/products/{id}/details', [ClientController::class, 'productDetails'])->name('product.details');

// Subcategories by category route
Route::get('/categories/{category}/subcategories', [ClientController::class, 'getSubcategoriesByCategory']);


Route::get('/check', [ClientController::class, 'check'])->name('check');