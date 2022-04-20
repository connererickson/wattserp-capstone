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

Route::get('/', function () {
    return view('home');
});
Route::get('/phpinfo', function () {
    return view('phpinfo');
});

Auth::routes();
//Override the existing logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('pages/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('pages/form_builder', 'FormsController@index')->name('form_builder');
Route::post('pages/form_builder/save_form', 'FormsController@save_form')->name('form_builder.save_form');

Route::group(['prefix' => 'pages/settings'], function () {
	Route::get('/', 'MySettingsController@index')->name('settings');
	Route::get('/index', 'MySettingsController@index')->name('settings.index');
	Route::get('/information', 'MySettingsController@information')->name('settings.information');
	Route::get('/edit_information', 'MySettingsController@edit_information')->name('settings.information.edit');
	Route::patch('/update_information', 'MySettingsController@update_information')->name('settings.update_information');
	Route::get('/security', 'MySettingsController@security')->name('settings.security');
	Route::post('/update_password', 'MySettingsController@update_password')->name('settings.update_password');
});

Route::get('mydebug')->name('mydebug');

Route::group(['prefix' => 'pages/admin'], function () {
	Route::get('/', 'AdminController@index')->name('admin');
	Route::get('/index', 'AdminController@index')->name('admin.index');
});
Route::group(['prefix' => 'pages/admin/users'], function () {
	Route::get('/index', 'AdminUsersController@index')->name('admin.users.index');
	Route::get('/create', 'AdminUsersController@create')->name('admin.users.create');
	Route::post('/store', 'AdminUsersController@store')->name('admin.users.store');
	Route::get('/edit/{id}', 'AdminUsersController@edit')->name('admin.users.edit');
	Route::patch('/update/{id}', 'AdminUsersController@update')->name('admin.users.update');
});
Route::group(['prefix' => 'pages/admin/permissions'], function () {
	Route::get('/index', 'AdminPermissionsController@index')->name('admin.permissions.index');
	Route::post('/update', 'AdminPermissionsController@update')->name('admin.permissions.update');
});
Route::group(['prefix' => 'pages/admin/modules'], function () {
	Route::get('/index', 'AdminModulesController@index')->name('admin.modules.index');
	Route::post('/update', 'AdminModulesController@update')->name('admin.modules.update');
});
Route::group(['prefix' => 'pages/employees'], function () {
	Route::get('/', 'EmployeesController@index')->name('employees');
	Route::get('/index', 'EmployeesController@index')->name('employees.index');
	Route::get('/create', 'EmployeesController@create')->name('employees.create');
	Route::post('/store', 'EmployeesController@store')->name('employees.store');
	Route::get('/edit/{id}', 'EmployeesController@edit')->name('employees.edit');
	Route::patch('/update/{id}', 'EmployeesController@update')->name('employees.update');
	Route::get('/employee/{id}', 'EmployeesController@employee')->name('employees.employee');
	Route::get('/create_ec/{id}', 'EmployeesController@create_ec')->name('employees.create_ec');
	Route::post('/store_ec', 'EmployeesController@store_ec')->name('employees.store_ec');
	Route::get('/edit_ec/{id}', 'EmployeesController@edit_ec')->name('employees.edit_ec');
	Route::patch('/update_ec/{id}', 'EmployeesController@update_ec')->name('employees.update_ec');
});
Route::group(['prefix' => 'pages/channel_partners'], function () {
	Route::get('/', 'ChannelPartnerController@index')->name('channel_partners');
	Route::get('/channel_partners', 'ChannelPartnerController@index')->name('channel_partners.index');
	Route::get('/create', 'ChannelPartnerController@create')->name('channel_partners.create');
	Route::post('/store', 'ChannelPartnerController@store')->name('channel_partners.store');
	Route::get('/edit/{id}', 'ChannelPartnerController@edit')->name('channel_partners.edit');
	Route::patch('/update/{id}', 'ChannelPartnerController@update')->name('channel_partners.update');
	Route::get('/member/{id}', 'ChannelPartnerController@member')->name('channel_partners.member');
});
Route::group(['prefix' => 'pages/channel_parters/profile'], function(){
   Route::get('/', 'ChannelPartnerController@profile_index')->name('profile');
   Route::get('/index', 'ChannelPartnerController@profile_index')->name('profile.index');
   Route::get('/create', 'ChannelPartnerController@profile_create')->name('profile.create');
   Route::post('/store', 'ChannelPartnerController@profile_store')->name('profile.store');
   Route::get('/edit/{id}', 'ChannelPartnerController@profile_edit')->name('profile.edit');
   Route::patch('/update/{id}', 'ChannelPartnerController@profile_update')->name('profile.update');
});
Route::group(['prefix' => 'pages/channel_partners/resources'], function(){
   Route::get('/', 'ChannelPartnerController@resources_index')->name('resources');
   Route::get('/index', 'ChannelPartnerController@resources_index')->name('resources.index');
});
Route::group(['prefix' => 'pages/safety'], function () {
	Route::get('/', 'SafetyController@index')->name('safety');
	Route::get('/index', 'SafetyController@index')->name('safety.index');
});
Route::group(['prefix' => 'pages/safety/training_courses'], function () {
	Route::get('/', 'TrainingController@index')->name('safety.training_courses');
	Route::get('/training_courses_index', 'TrainingController@training_courses_index')->name('safety.training.training_courses_index');
	Route::get('/create_training_course', 'TrainingController@create_training_course')->name('safety.training.create_training_course');
	Route::post('/store_training_course', 'TrainingController@store_training_course')->name('safety.training.store_training_course');
	Route::get('/edit_training_course/{id}', 'TrainingController@edit_training_course')->name('safety.training.edit_training_course');
	Route::patch('/update_training_course/{id}', 'TrainingController@update_training_course')->name('safety.training.update_training_course');
	Route::post('/delete_training_course','TrainingController@delete_training_course');
	Route::get('/scheduled_training_index', 'TrainingController@scheduled_training_index')->name('safety.training.scheduled_training_index');
	Route::post('/schedule_training','TrainingController@schedule_training');
	Route::post('/unschedule_training','TrainingController@unschedule_training');
	Route::post('/store_scheduled_training', 'TrainingController@store_scheduled_training')->name('safety.training.store_scheduled_training');
	Route::get('/edit_scheduled_training', 'TrainingController@edit_scheduled_training')->name('safety.training.edit_scheduled_training');
	Route::patch('/update_scheduled_training', 'TrainingController@update_scheduled_training')->name('safety.training.update_scheduled_training');
	Route::get('/training_results_index', 'TrainingController@training_results_index')->name('safety.training.training_results_index');
	Route::get('/training_result', 'TrainingController@training_result')->name('safety.training.training_result');
	Route::get('/slideshow/{id}', 'TrainingController@slideshow')->name('safety.training.slideshow');
	Route::get('/certificate/{id}', 'TrainingController@certificate')->name('safety.training.certificate');
});
Route::group(['prefix' => 'pages/safety/training/slides'], function () {
	Route::get('/create_slide/{training_course_id}', 'SlideController@create_slide')->name('safety.training.slides.create_slide');
	Route::post('/store_slide', 'SlideController@store_slide')->name('safety.training.slides.store_slide');
	Route::get('/edit_slide/{id}', 'SlideController@edit_slide')->name('safety.training.slides.edit_slide');
	Route::patch('/update_slide/{id}', 'SlideController@update_slide')->name('safety.training.slides.update_slide');
	Route::post('/delete_slide', 'SlideController@delete_slide')->name('safety.training.slides.delete_slide');
	Route::post('/reorder_slide', 'SlideController@reorder_slide')->name('safety.training.slides.reorder_slide');
});
Route::group(['prefix' => 'pages/safety/forms'], function () {
	Route::get('/', 'FormsController@index')->name('safety.forms');
	Route::get('/forms_index', 'FormsController@forms_index')->name('safety.forms.forms_index');
	Route::post('/create_form', 'FormsController@create_form')->name('safety.forms.create_form');
	Route::post('/submit_eod', 'FormsController@submit_eod')->name('safety.forms.submit_eod');
	Route::post('/submit_hazardanalysis', 'FormsController@submit_hazardanalysis')->name('safety.forms.submit_hazardanalysis');
	Route::post('/submit_writeup', 'FormsController@submit_writeup')->name('safety.forms.submit_writeup');
	Route::post('/submit_serviceform', 'FormsController@submit_serviceform')->name('safety.forms.submit_serviceform');
	Route::post('/submit_inspection', 'FormsController@submit_inspection')->name('safety.forms.submit_inspection');
	Route::post('/store_form', 'FormsController@store_form')->name('safety.forms.store_form');
	Route::get('/edit_form/{name}', 'FormsController@edit_form')->name('safety.forms.edit_form');
	Route::patch('/update_form/{id}', 'FormsController@update_form')->name('safety.forms.update_form');
	Route::get('/scheduled_forms_index', 'FormsController@scheduled_forms_index')->name('safety.forms.scheduled_forms_index');
	Route::get('/schedule_form', 'FormsController@schedule_form')->name('safety.forms.schedule_form');
	Route::post('/store_scheduled_form', 'FormsController@store_scheduled_form')->name('safety.forms.store_scheduled_form');
	Route::get('/edit_scheduled_form', 'FormsController@edit_scheduled_form')->name('safety.forms.edit_scheduled_form');
	Route::patch('/update_scheduled_form', 'FormsController@update_scheduled_form')->name('safety.forms.update_scheduled_form');
	Route::get('/form_results_index', 'FormsController@form_results_index')->name('safety.forms.form_history_index');
	Route::get('/form_result', 'FormsController@form_result')->name('safety.forms.form_result');
	Route::post('/form_notification', 'FormsController@form_notification')->name('safety.forms.form_notification');
});

Route::group(['prefix' => 'pages/leads'], function () {
	Route::get('/', 'LeadsController@index')->name('leads');
	Route::get('/settings/settings', 'LeadsController@settings_index')->name('leads.settings.index');
	Route::get('/settings/project_attributes', 'LeadsController@project_attributes')->name('leads.settings.project_attributes');
	Route::get('/leads', 'LeadsController@index')->name('leads.index');
	Route::get('/create_portfolio', 'LeadsController@create_portfolio')->name('leads.create_portfolio');
	Route::post('/store_portfolio', 'LeadsController@store_portfolio')->name('leads.store_portfolio');
	Route::get('/edit_portfolio/{id}', 'LeadsController@edit_portfolio')->name('leads.edit_portfolio');
	Route::patch('/update_portfolio/{id}', 'LeadsController@update_portfolio')->name('leads.update_portfolio');
	Route::get('/portfolio/{id}', 'LeadsController@portfolio')->name('leads.portfolio');
	Route::post('/store_portfolio_contact', 'LeadsController@store_portfolio_contact')->name('leads.store_portfolio_contact');
	Route::patch('/update_portfolio_contact/{id}', 'LeadsController@update_portfolio_contact')->name('leads.update_portfolio_contact');
	Route::get('/create_proposal/{id}', 'LeadsController@create_proposal')->name('leads.create_proposal');
	Route::post('/store_proposal', 'LeadsController@store_proposal')->name('leads.store_proposal');
	Route::get('/proposal/{id}', 'LeadsController@proposal')->name('leads.proposal');
	Route::get('/project/{id}', 'LeadsController@project')->name('leads.project');
	Route::get('/create_request/{id}', 'LeadsController@create_request')->name('leads.create_request');
	Route::get('/create_design/{id}', 'LeadsController@create_design')->name('leads.create_design');
	Route::post('/store_design', 'LeadsController@store_design')->name('leads.store_design');
	Route::get('/design/{id}', 'LeadsController@design')->name('leads.design');
	Route::post('/store_project_address', 'LeadsController@store_project_address')->name('leads.store_project_address');
	Route::patch('/update_project_address/{id}', 'LeadsController@update_project_address')->name('leads.update_project_address');
});
Route::group(['prefix' => 'pages/projects'], function () {
	Route::get('/', 'ProjectsController@index')->name('projects');
	Route::get('/projects', 'ProjectsController@index')->name('projects.index');
	Route::get('/edit_project/{id}', 'ProjectController@edit')->name('projects.edit');
	Route::patch('/update_project/{id}', 'ProjectsController@update')->name('projects.update');
	Route::get('/project/{id}', 'ProjectsController@project')->name('projects.project');
});
Route::group(['prefix' => 'pages/archive'], function () {
	Route::get('/', 'ArchiveController@index')->name('archive');
	Route::get('/archive', 'ArchiveController@index')->name('archive.index');
	Route::get('/archive/{id}', 'ArchiveController@project')->name('archive.project');
});
Route::group(['prefix' => 'pages/inventory'], function () {
	Route::get('/', 'InventoryController@index')->name('inventory');
	Route::get('/index', 'InventoryController@index')->name('inventory.index');
});
Route::group(['prefix' => 'pages/inventory/manage'], function () {
	Route::get('/', 'InventoryController@manage')->name('inventory.manage');
	Route::get('/parts_index', 'InventoryController@parts_index')->name('inventory.manage.parts_index');
	Route::post('/update_stock', 'InventoryController@update_stock')->name('inventory.manage.update_stock');
	Route::post('/edit_vendor_price', 'InventoryController@edit_vendor_price')->name('inventory.manage.edit_vendor_price');
	Route::post('/edit_vendor_quantity', 'InventoryController@edit_vendor_quantity')->name('inventory.manage.edit_vendor_quantity');
	Route::post('/delete_vendor_row', 'InventoryController@delete_vendor_row')->name('inventory.manage.delete_vendor_row');
	Route::post('/update_low_stock_notification', 'InventoryController@update_low_stock_notification')->name('inventory.manage.update_low_stock_notification');
});
Route::group(['prefix' => 'pages/inventory/pull'], function () {
	Route::get('/', 'InventoryController@pull')->name('inventory.pull');
	Route::get('/pulls_index', 'InventoryController@pulls_index')->name('inventory.pull.pulls_index');
	Route::get('/create_pull', 'InventoryController@create_pull')->name('inventory.pull.create_pull');
	Route::post('/store_pull', 'InventoryController@store_pull')->name('inventory.pull.store_pull');
	Route::get('/edit_pull/{id}', 'InventoryController@edit_pull')->name('inventory.pull.edit_pull');
	Route::patch('/update_pull/{id}', 'InventoryController@update_pull')->name('inventory.pull.update_pull');
});
Route::group(['prefix' => 'pages/inventory/receive'], function () {
	Route::get('/', 'InventoryController@receive')->name('inventory.receive');
	Route::get('/receive_index', 'InventoryController@receive_index')->name('inventory.pull.receive_index');
	Route::get('/create_receipt', 'InventoryController@create_receipt')->name('inventory.pull.create_receipt');
	Route::post('/store_receipt', 'InventoryController@store_receipt')->name('inventory.pull.store_receipt');
});
Route::group(['prefix' => 'pages/inventory/order'], function () {
	Route::get('/', 'InventoryController@order')->name('inventory.order');
	Route::get('/orders_index', 'InventoryController@orders_index')->name('inventory.order.orders_index');
	Route::get('/create_order', 'InventoryController@create_order')->name('inventory.order.create_order');
	Route::post('/store_order', 'InventoryController@store_order')->name('inventory.order.store_order');
	Route::get('/edit_order/{id}', 'InventoryController@edit_order')->name('inventory.order.edit_order');
	Route::patch('/update_order/{id}', 'InventoryController@update_order')->name('inventory.order.update_order');
});
Route::group(['prefix' => 'pages/inventory/print'], function () {
	Route::get('/', 'InventoryController@printout')->name('inventory.printout');
});
Route::group(['prefix' => 'pages/repository'], function () {
	Route::get('/', 'RepositoryController@index')->name('repository');
	Route::get('/index', 'RepositoryController@index')->name('repository.index');
});
Route::group(['prefix' => 'pages/repository/manage'], function () {
	Route::get('/', 'RepositoryController@manage')->name('repository.manage');
	Route::get('/parts_index', 'RepositoryController@parts_index')->name('repository.manage.parts_index');
	Route::get('/create_part', 'RepositoryController@create_part')->name('repository.manage.create_part');
	Route::post('/store_part', 'RepositoryController@store_part')->name('repository.manage.store_part');
	Route::get('/edit_part/{id}', 'RepositoryController@edit_part')->name('repository.manage.edit_part');
	Route::patch('/update_part/{id}', 'RepositoryController@update_part')->name('repository.manage.update_part');
    Route::get('/upload_import_file', 'RepositoryController@upload_import_file')->name('repository.manage.upload_import_file');
    Route::post('/process_import_file', 'RepositoryController@process_import_file')->name('respository.manage.process_import_file');
    Route::get('/import_headings_form', 'RepositoryController@import_headings_form')->name('repository.manage.import_headings_form');
    Route::post('/process_import_headings', 'RepositoryController@process_import_headings')->name('repository.manage.process_import_headings');
    Route::post('/import_parts', 'RepositoryController@import_parts')->name('repository.manage.import_parts');
	Route::post('/generate_sku', 'RepositoryController@generate_sku')->name('repository.manage.generate_sku');
	Route::post('/parts_list', 'RepositoryController@parts_list')->name('repository.manage.parts_list');
	Route::post('/get_part', 'RepositoryController@get_part')->name('repository.manage.get_part');
	Route::post('/add_vendor', 'RepositoryController@add_vendor')->name('repository.manage.add_vendor');
	Route::post('/remove_vendor', 'RepositoryController@remove_vendor')->name('repository.manage.remove_vendor');
	Route::post('/update_tags', 'RepositoryController@update_tags')->name('repository.manage.update_tags');
	Route::post('/upload_part_image', 'RepositoryController@upload_part_image')->name('repository.manage.upload_part_image');
	Route::post('/crop_part_image', 'RepositoryController@crop_part_image')->name('repository.manage.crop_part_image');

});
Route::group(['prefix' => 'pages/repository/administrate'], function () {
	Route::get('/', 'RepositoryController@administrate')->name('repository.administrate');
	Route::post('create_unit', 'RepositoryController@create_unit')->name('repository.administrate.create_unit');
	Route::post('delete_unit', 'RepositoryController@delete_unit')->name('repository.administrate.delete_unit');
	Route::post('create_color', 'RepositoryController@create_color')->name('repository.administrate.create_color');
	Route::post('delete_color', 'RepositoryController@delete_color')->name('repository.administrate.delete_color');
	Route::post('/update_type_filter', 'RepositoryController@update_type_filter')->name('repository.administrate.update_type_filter');
	Route::post('create_type', 'RepositoryController@create_type')->name('repository.administrate.create_type');
	Route::post('delete_type', 'RepositoryController@delete_type')->name('repository.administrate.delete_type');
	Route::post('create_tag', 'RepositoryController@create_tag')->name('repository.administrate.create_tag');
	Route::post('move_tag', 'RepositoryController@move_tag')->name('repository.administrate.move_tag');
	Route::post('copy_tag', 'RepositoryController@copy_tag')->name('repository.administrate.copy_tag');
	Route::post('remove_tags', 'RepositoryController@remove_tags')->name('repository.administrate.remove_tags');
	Route::post('delete_tags', 'RepositoryController@delete_tags')->name('repository.administrate.delete_tags');
});
Route::group(['prefix' => 'pages/directory'], function () {
	Route::get('/', 'DirectoryController@index')->name('directory');
	Route::get('/index', 'DirectoryController@index')->name('directory.index');
	Route::get('/create', 'DirectoryController@create')->name('directory.create');
	Route::post('/store', 'DirectoryController@store')->name('directory.store');
	Route::get('/edit/{id}', 'DirectoryController@edit')->name('directory.edit');
	Route::patch('/update/{id}', 'DirectoryController@update')->name('directory.update');
	Route::get('/manage/{type}/{company_name}/{id}', 'DirectoryController@manage')->name('directory.manage');
	Route::get('/utilities', 'DirectoryController@utilities')->name('directory.utilities');
	Route::get('/municipalities', 'DirectoryController@municipalities')->name('directory.municipalities');
	Route::get('/vendors', 'DirectoryController@vendors')->name('directory.vendors');
	Route::get('/suppliers', 'DirectoryController@suppliers')->name('directory.suppliers');
	Route::get('/partners', 'DirectoryController@partners')->name('directory.partners');
    Route::get('/ckc_companies', 'DirectoryController@ckc_companies')->name('directory.ckc_companies');
	Route::get('/manufacturers', 'DirectoryController@manufacturers')->name('directory.manufacturers');
	Route::get('/others', 'DirectoryController@others')->name('directory.others');
	Route::post('/store_contact', 'DirectoryController@store_contact')->name('directory.store_contact');
	Route::post('/update_contact', 'DirectoryController@update_contact')->name('directory.update_contact');
    Route::post('/store_news', 'DirectoryController@store_news')->name('directory.store_news');
    Route::post('/store_address', 'DirectoryController@store_address')->name('directory.store_address');
    Route::post('/update_address', 'DirectoryController@update_address')->name('directory.update_address');
    Route::post('/store_stakeholdercorrespondence', 'DirectoryController@store_stakeholdercorrespondence')->name('directory.store_stakeholdercorrespondence');
});
Route::group(['prefix' => 'pages/utility_rates'], function () {
    Route::get('/', 'UtilityRatesController@index')->name('utility_rates');
    Route::get('/index/{id}', 'UtilityRatesController@index')->name('utility_rates.index');
    Route::get('/rate/{id}', 'UtilityRatesController@rate')->name('utility_rates.rate');
    Route::get('/create/{id}', 'UtilityRatesController@create')->name('utility_rates.create');
    Route::post('/store', 'UtilityRatesController@store')->name('utility_rates.store');
    Route::get('/edit/{id}', 'UtilityRatesController@edit')->name('utility_rates.edit');
    Route::patch('/update/{id}', 'UtilityRatesController@update')->name('utility_rates.update');
});

//APPLICATIONS ROUTES
Route::group(['prefix' => 'pages/applications'], function () {
    Route::get('/', 'ApplicationsController@weather')->name('weather');
    Route::post('/store_location', 'ApplicationsController@store_location')->name('applications.store_location');
});

//AJAX ROUTES HERE
Route::get('ajax',function(){
   return view('message');
});
Route::post('/getmsg','AjaxController@index');
Route::post('pages/install_module','AjaxController@install_module');
Route::post('pages/remove_module','AjaxController@remove_module');
Route::post('pages/save_dashboard_layout','AjaxController@save_dashboard_layout');
Route::post('pages/load_dashboard_layout','AjaxController@load_dashboard_layout');
Route::post('pages/dashboard_modules/superadmin_permissions','AjaxController@superadmin_permissions');
Route::post('pages/leads/proposal/get_counties','AjaxController@get_counties');
Route::post('pages/leads/settings/save_project_attribute', 'AjaxController@save_project_attribute');
Route::post('pages/leads/settings/delete_project_attribute', 'AjaxController@delete_project_attribute');
Route::post('pages/leads/proposal/insert_project_meta', 'AjaxController@insert_project_meta');
Route::post('pages/leads/proposal/remove_project_meta', 'AjaxController@remove_project_meta');
Route::post('pages/repository/get_documents', 'AjaxController@get_part_documents');
Route::post('pages/repository/upload_document', 'AjaxController@upload_part_document');
Route::post('pages/directory/delete_news', 'AjaxController@delete_news');
Route::post('pages/directory/save_news', 'AjaxController@save_news');
Route::post('pages/directory/delete_stakeholdercorrespondence', 'AjaxController@delete_stakeholdercorrespondence');
Route::post('pages/directory/save_stakeholdercorrespondence', 'AjaxController@save_stakeholdercorrespondence');

//DASHBOARD MODULES HERE
Route::get('dashboard_modules/superadmin_permissions')->name('dashboard_modules.superadmin_permissions');
Route::get('dashboard_modules/allusers_event')->name('dashboard_modules.allusers_event');
Route::get('dashboard_modules/user_event')->name('dashboard_modules.user_event');
Route::get('dashboard_modules/erp_updates')->name('dashboard_modules.erp_updates');
Route::get('dashboard_modules/mashed_potatoes')->name('dashboard_modules.mashed_potatoes');

//punch processing
Route::post('process_clock_in', function(Request $request) {
	$emp_id = $request['emp_id'];
	return DB::table('time_punches')->where(id, 0)->update(array('emp_id' => $emp_id));
});

//DEBUGGING
/*Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    Log::info( json_encode($query->sql) );
    Log::info( json_encode($query->bindings) );
    Log::info( json_encode($query->time)   );
});*/
