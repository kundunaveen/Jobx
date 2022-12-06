<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Employee\EducationController;
use App\Http\Controllers\Employee\EmployeeExperienceController;
use App\Http\Controllers\Employee\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'adminaccount'])->group(function () {
    Route::prefix('cms')->name('cms.')->group(function () {
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/edit', [SettingController::class, 'edit'])->name('edit');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });
    });
});

Route::get('/admin/login', [App\Http\Controllers\Admin\ThemeController::class, 'login'])->name('admin.login');
Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'home'])->name('admin.dashboard');

Route::post('/admin/change-password', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('/admin/check-password-validation', [App\Http\Controllers\Admin\AdminController::class, 'checkPasswordValidation'])->name('checkPasswordValidation');

Route::get('/admin/employee', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.manageEmployee');
Route::any('/admin/employee/add', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('admin.addEmployee');
Route::any('/admin/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('admin.editEmployee');
Route::post('/admin/employee/delete', [App\Http\Controllers\Admin\EmployeeController::class, 'delete'])->name('admin.deleteEmployee');
Route::post('/admin/employee/delete-employee-image', [App\Http\Controllers\Admin\EmployeeController::class, 'deleteEmployeeImage']);
Route::post('/admin/employee/delete-employee-video', [App\Http\Controllers\Admin\EmployeeController::class, 'deleteEmployeeVideo']);
Route::post('/admin/employee/get-states', [App\Http\Controllers\Admin\EmployeeController::class, 'getStates']);
Route::post('/admin/employee/get-cities', [App\Http\Controllers\Admin\EmployeeController::class, 'getCities']);
Route::post('/admin/employee/change-status', [App\Http\Controllers\Admin\EmployeeController::class, 'changeStatus']);

Route::get('/admin/employer', [App\Http\Controllers\Admin\EmployerController::class, 'index'])->name('admin.manageEmployer');
Route::any('/admin/employer/add', [App\Http\Controllers\Admin\EmployerController::class, 'create'])->name('admin.addEmployer');
Route::any('/admin/employer/edit/{id}', [App\Http\Controllers\Admin\EmployerController::class, 'edit'])->name('admin.editEmployer');
Route::post('/admin/employer/delete', [App\Http\Controllers\Admin\EmployerController::class, 'delete'])->name('admin.deleteEmployer');
Route::post('/admin/update-comapany-image', [App\Http\Controllers\Admin\EmployerController::class, 'updateCompanyLogo'])->name('admin.updateCompanyLogo');
Route::post('/admin/employer/delete-company-image', [App\Http\Controllers\Admin\EmployerController::class, 'deleteCompanyImage']);
Route::post('/admin/employer/delete-company-video', [App\Http\Controllers\Admin\EmployerController::class, 'deleteCompanyVideo']);
Route::post('/admin/employer/get-states', [App\Http\Controllers\Admin\EmployerController::class, 'getStates']);
Route::post('/admin/employer/get-cities', [App\Http\Controllers\Admin\EmployerController::class, 'getCities']);
Route::post('/admin/employer/change-status', [App\Http\Controllers\Admin\EmployerController::class, 'changeStatus']);

Route::get('/admin/manage-attribute', [App\Http\Controllers\Admin\ManageAttributeController::class, 'index'])->name('admin.manageAttribute');
Route::any('/admin/manage-attribute/add', [App\Http\Controllers\Admin\ManageAttributeController::class, 'create'])->name('admin.addManageAttribute');
Route::any('/admin/manage-attribute/edit/{id}', [App\Http\Controllers\Admin\ManageAttributeController::class, 'edit'])->name('admin.editManageAttribute');
Route::post('/admin/manage-attribute/delete', [App\Http\Controllers\Admin\ManageAttributeController::class, 'delete'])->name('admin.deleteAttribute');
Route::get('/admin/manage-attribute/category', [App\Http\Controllers\Admin\ManageAttributeController::class, 'manageCategory'])->name('admin.categories');
Route::any('/admin/manage-attribute/category/add', [App\Http\Controllers\Admin\ManageAttributeController::class, 'createCategory'])->name('admin.categories.create');
Route::any('/admin/manage-attribute/category/edit/{id}', [App\Http\Controllers\Admin\ManageAttributeController::class, 'editCategory'])->name('admin.editAttributeCategory');
Route::post('/admin/manage-attribute/category/delete', [App\Http\Controllers\Admin\ManageAttributeController::class, 'deleteCategory'])->name('admin.categories.delete');
Route::post('/admin/manage-attribute/getValues', [App\Http\Controllers\Admin\ManageAttributeController::class, 'getValues']);

Route::get('/admin/manage-vacancy', [App\Http\Controllers\Admin\VacancyController::class, 'index'])->name('admin.manageVacancy');
Route::any('/admin/manage-vacancy/add', [App\Http\Controllers\Admin\VacancyController::class, 'create'])->name('admin.addVacancy');
Route::any('/admin/manage-vacancy/edit/{id}', [App\Http\Controllers\Admin\VacancyController::class, 'edit'])->name('admin.editVacancy');
Route::post('/admin/manage-vacancy/delete', [App\Http\Controllers\Admin\VacancyController::class, 'delete'])->name('admin.deleteVacancy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front-end.home');
Route::get('/', [App\Http\Controllers\FrontEnd\DashboardController::class, 'home'])->name('front-end.home');
Route::post('/check-admin-user', [App\Http\Controllers\FrontEnd\ThemeController::class, 'checkAdmin'])->name('check.admin');
Route::post('/check-user', [App\Http\Controllers\Admin\ThemeController::class, 'checkUser'])->name('check.user');


Route::get('/admin/job-skills', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('admin.jobSkills');
Route::any('/admin/job-skills/add', [App\Http\Controllers\Admin\SkillController::class, 'create'])->name('admin.addSkill');
Route::any('/admin/job-skills/edit/{id}', [App\Http\Controllers\Admin\SkillController::class, 'edit'])->name('admin.editSkill');
Route::post('/admin/job-skills/delete', [App\Http\Controllers\Admin\SkillController::class, 'delete'])->name('admin.deleteSkill');

//####################### Employee Routes #########################//
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employee-profile', [App\Http\Controllers\Employee\HomeController::class, 'home'])->name('employee.home');
    Route::any('/employee-profile/edit', [App\Http\Controllers\Employee\HomeController::class, 'editProfile'])->name('employee.profile.edit');
    Route::post('/employee/change-password', [App\Http\Controllers\Employee\HomeController::class, 'changePassword'])->name('employee.change.password');
    Route::post('/employee/check-password-validation', [App\Http\Controllers\Employee\HomeController::class, 'checkPasswordValidation']);
    Route::get('/employee-dashboard', [App\Http\Controllers\Employee\DashboardController::class, 'home'])->name('employee.dashboard');
    Route::post('/employee/job-filter', [App\Http\Controllers\Employee\JobPostController::class, 'jobsFilterBy'])->name('employee.jobs-filtersBy');
    Route::any('/employee/job-applied/{id}', [App\Http\Controllers\Employee\JobPostController::class, 'applyJob'])->name('employee.job.apply')->middleware('employee.check-profile-fill-or-not');
    Route::get('/employee/job-preview/{id}', [App\Http\Controllers\Employee\JobPostController::class, 'previewJob'])->name('employee.job.preview');
    Route::post('/employee/get-states', [App\Http\Controllers\Employee\HomeController::class, 'getStates']);
    Route::post('/employee/get-cities', [App\Http\Controllers\Employee\HomeController::class, 'getCities']);

    Route::get('/employee/job-withdrawn/{vacancy_id}', [App\Http\Controllers\Employee\JobPostController::class, 'jobWithdrawn'])->name('employee.job-withdrawn');
});


Route::prefix('employee')->name('employee.')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('experience')->name('experience.')->middleware('auth')->group(function () {
        Route::get('/create', [EmployeeExperienceController::class, 'create'])->name('create');
        Route::post('/store', [EmployeeExperienceController::class, 'store'])->name('store');
        Route::get('/edit/{uuid}', [EmployeeExperienceController::class, 'edit'])->name('edit');
        Route::put('/update/{uuid}', [EmployeeExperienceController::class, 'update'])->name('update');
        Route::get('/destroy/{uuid}', [EmployeeExperienceController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('education')->name('education.')->middleware('auth')->group(function () {
        Route::get('/create', [EducationController::class, 'create'])->name('create');
        Route::post('/store', [EducationController::class, 'store'])->name('store');
        Route::get('/edit/{uuid}', [EducationController::class, 'edit'])->name('edit');
        Route::put('/update/{uuid}', [EducationController::class, 'update'])->name('update');
        Route::get('/destroy/{uuid}', [EducationController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/store', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit/{uuid}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/update/{uuid}', [ProjectController::class, 'update'])->name('update');
        Route::get('/destroy/{uuid}', [ProjectController::class, 'destroy'])->name('destroy');
    });
});


//####################### Employer Routes #########################//
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employer-profile', [App\Http\Controllers\Employer\HomeController::class, 'home'])->name('employer.home');
    Route::get('/employer-dashboard', [App\Http\Controllers\Employer\DashboardController::class, 'home'])->name('employer.dashboard');
    Route::any('/employer-profile/edit', [App\Http\Controllers\Employer\HomeController::class, 'editProfile'])->name('employer.profile.edit');
    Route::post('/employer/change-password', [App\Http\Controllers\Employer\HomeController::class, 'changePassword'])->name('employer.change.password');
    Route::post('/employer/check-password-validation', [App\Http\Controllers\Employer\HomeController::class, 'checkPasswordValidation']);

    Route::any('/employer/post-job', [App\Http\Controllers\Employer\JobPostController::class, 'create'])->name('employer.post.job');

    Route::any('/employer/edit-post-job/{id}', [App\Http\Controllers\Employer\JobPostController::class, 'edit'])->name('employer.edit.post.job');
    Route::get('/employer/posted-jobs', [App\Http\Controllers\Employer\JobPostController::class, 'index'])->name('employer.posted.jobs');
    Route::get('/employer/job/candidates/{id}', [App\Http\Controllers\Employer\JobPostController::class, 'jobCandidates'])->name('employer.job.candidates');
    Route::post('/employer/post-job/delete', [App\Http\Controllers\Employer\JobPostController::class, 'delete'])->name('employer.deleteVacancy');
    Route::get('/employer/applicants', [App\Http\Controllers\Employer\ApplicationController::class, 'index'])->name('employer.applications');
    Route::get('/employer/new-applicants', [App\Http\Controllers\Employer\ApplicationController::class, 'newApplicants']);
    Route::get('/employer/job-applicants/{id}', [App\Http\Controllers\Employer\ApplicationController::class, 'jobApplicants']);

    Route::get('/employer/update-applicant-status', [App\Http\Controllers\Employer\ApplicationController::class, 'updateStatus'])->name('employer.update-applicant-status');
    Route::get('/employer/applicant-status-update/{applicant_id}', [App\Http\Controllers\Employer\ApplicationController::class, 'applicantStatusUpdate'])->name('employer.applicant-status-update');

    Route::get('/employer/view-employee-profile/{id}', [App\Http\Controllers\Employer\ApplicationController::class, 'viewEmployeeProfile'])->name('employer.view-employee-profile');

    Route::post('/employer-profile/getStates', [App\Http\Controllers\Employer\HomeController::class, 'getStates']);
    Route::post('/employer-profile/getCities', [App\Http\Controllers\Employer\HomeController::class, 'getCities']);

    Route::get('/company-rating-store-update', [App\Http\Controllers\AjaxController::class, 'companyRatingStoreUpdate'])->name('company-rating-store-update');
});


Route::get('/companies', [App\Http\Controllers\FrontEnd\DashboardController::class, 'companies'])->name('companies');
Route::get('/company/show/{company_id}', [App\Http\Controllers\FrontEnd\DashboardController::class, 'companyShow'])->name('company-show');
Route::get('/jobs', [App\Http\Controllers\FrontEnd\DashboardController::class, 'jobs']);
Route::get('/employee/job-search', [App\Http\Controllers\Employee\HomeController::class, 'searchJob'])->name('search.job');

Route::prefix('favorite-vacancy')->name('favorite-vacancy.')->group(function () {
    Route::get('/add', [App\Http\Controllers\AjaxController::class, 'addFavoriteVacancy'])->name('add');
    Route::get('/destroy', [App\Http\Controllers\AjaxController::class, 'destroyFavoriteVacancy'])->name('destroy');
});

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::prefix('autocomplete-search')->name('autocomplete-search.')->group(function () {
        Route::get('/vacancy', [AjaxController::class, 'vacancyAutoCompleteSearch'])->name('vacancy');
        Route::get('/location', [AjaxController::class, 'locationAutoCompleteSearch'])->name('location');
    });
});

Route::get('/about-us', [App\Http\Controllers\FrontEnd\CmsController::class, 'aboutUs'])->name('frontend.about_us');
Route::get('/privacy-policy', [App\Http\Controllers\FrontEnd\CmsController::class, 'privacyPolicy'])->name('frontend.privacy_policy');
Route::get('/terms-conditions', [App\Http\Controllers\FrontEnd\CmsController::class, 'termsConditions'])->name('frontend.terms_conditions');
