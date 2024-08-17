<?php

use App\Http\Controllers\user_management\create_user\CreateUserController;
use App\Http\Controllers\user_management\create_user\CreateUserControllerUi;
use App\Http\Controllers\user_management\delete_user\DeleteUserController;
use App\Http\Controllers\user_management\detail_user\DetailUserController;
use App\Http\Controllers\user_management\edit_user\EditUserController;
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
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
//use App\Http\Controllers\ChatGPTController;

use App\Http\Controllers\user_management\show_user\ShowUserControllerUi;
use App\Http\Controllers\user_management\show_user\ShowUserController;

use App\Http\Controllers\generate_story\generate\GenerateStoryControllerUi;
use App\Http\Controllers\generate_story\generate\GenerateStoryController;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');


//=====================================================================================================================
//use App\Http\Controllers\generate_story\generate\GenerateStoryControllerUi as GenerateStoryControllerUi;
//use App\Http\Controllers\generate_story\generate\GenerateStoryController as  GenerateStoryController;
use App\Http\Controllers\generate_story\summarize\SummarizeControllerUi as SummarizeControllerUi;
use App\Http\Controllers\generate_story\summarize\SummarizeController as  SummarizeController;



Route::get('/tables/basic',[ShowUserController::class,'index'])->name('tables.basic');
Route::get('/tables/users',[ShowUserControllerUi::class,'ShowAll']);

//Add new user
Route::get('/user-management/create-user', [CreateUserControllerUi::class, 'index']);
Route::post('/tables/add-user', [CreateUserController::class, 'index']);


//Detail
Route::get('/user-management/{id}/details-user', [DetailUserController::class, 'detail'])->name('users.detail');

//Edit
Route::get('/user-management/{id}/edit-user', [EditUserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [EditUserController::class, 'update'])->name('users.update');

//Delete
Route::delete('/user-management/{id}/delete-user', [DeleteUserController::class, 'destroy'])->name('users.destroy');

//UI Generate Form
Route::get("/story-management/generate-story-ui", [GenerateStoryControllerUi::class, "index"]);
Route::post("/story-management/generate-story", [GenerateStoryController::class, "index"]);

//summarize story
Route::get("/story-management/summarize-story-ui",[SummarizeControllerUi::class, "index"]);
Route::get("/story-management/summarize-story/{id}",[SummarizeController::class, "getStorySummary"]);
Route::post("/story-management/generate-detail",[GenerateStoryController::class, "generateDetail"]);
Route::post('/story-management/generate-story', [GenerateStoryController::class, 'index'])->name('generate.story');
Route::get('/generate-story-detail/{id}', [GenerateStoryController::class, 'generateDetail'])->name('generate.story.detail');


Route::get("/story-management/summarize-story",[SummarizeController::class, "index"]);

