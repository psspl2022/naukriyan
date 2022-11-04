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
//header('Access-Control-Allow-Origin:  https://www.prakharsoftwares.com');
header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Origin:  http://127.0.0.1:8000');
header('Access-Control-Allow-Methods:   GET');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization, X-CSRF-Token, X-Requested-With');
Route::post('/add-professional-detail-stage', 'StageRegistration@addProfessionalDetail');
Route::post('/add-certification-detail-stage', 'StageRegistration@addCertificationDetail');
Route::get('becil-data', 'GetBecilJobsDataController@getBecilData');
Route::get('get-allskills/{key}', 'getAllskills@index');
Route::post('file-upload', 'JobseekerController@testUpload');
Route::post('file-upload/profile', 'JobseekerController@testUploadImage');

Route::get('/get-jobseeker-info/{id}', 'JobseekerController@getJobseekerInfo');

Route::get('/getjobscategory/prakharsoftwares', 'PrakharDataController@getJobsBySectorPsspl');
Route::get('/getjobs/prakharsoftwares', 'PrakharDataController@getJobsByCategory');
Route::get('/get-keywords', 'JobseekerController@getKeywords');
Route::get('chatbot-query', 'ChatBotController@index');
Route::get('/master/companies/list', 'EmpcompaniesdetailsController@allCompaniesList');

Route::get('/get/average/ratings', 'WebsiteInfoController@getAverageRating');
Route::get('/get/sociallinks', 'WebsiteInfoController@getPortalSocialLinks');
Route::get('/test/mail', 'UserprofileController@checkEmailtest');
Route::get('/faq/data', 'FaqsController@getData');
Route::get('get-web-info', 'WebsiteInfoController@getWebInfoData');
Route::get('/count-row', 'WebsiteInfoController@countRow');
Route::post('/add-websiteinfo', 'WebsiteInfoController@update');
Route::get('/get-webinfo-data', 'WebsiteInfoController@getData');

Route::get('recommended-job', 'RecommendedJobController@recommendedJobs');
Route::post('create-job-post', 'CareerController@createJobPost');
Route::get('get-career-jobs', 'CareerController@getJobLists');
Route::get('edit-career-job/{id}', 'CareerController@editJob');
Route::post('update-career-job', 'CareerController@updateJob');
Route::post('delete-job/{id}', 'CareerController@deleteJob');
Route::get('get-applied-user-list', 'CareerApplyJobController@appliedJobs');

Route::get('single-job/{slug}', 'CareerController@singleJob');
Route::post('apply-career-job', 'CareerApplyJobController@applyJob');
Route::get('download-resume-career/{id}', 'CareerApplyJobController@downloadResume');

Route::post('send-message-to-employer', 'MyInboxController@send_message_to_employer');
Route::post('send-message-to-jobseeker', 'MyInboxController@send_message_to_jobseeker');
Route::get('get-message-for-jobseeker', 'MyInboxController@get_message_for_jobseeker');

Route::get('get-send-mail-lists', 'MyInboxController@getSendMailLists');

Route::get('get-unread-message', 'MyInboxController@getUnreadMessage');
Route::get('/get-single-inbox-message/{id}', 'MyInboxController@getSingleInboxMessage');
Route::get('/mark-as-read/{id}', 'MyInboxController@markAsRead');
Route::get('/download-attachment/{id}', 'MyInboxController@downloadAttachment');

Route::get('user-notifications', 'JobmanagerController@userNotifications');
Route::get('get-all-activity-count/count', 'DashboardController@countAllDataForJobEmployer');
Route::get('get-all-activity-count/count/jobseeker', 'DashboardController@countAllDataForJobSeeker');
Route::get('user-info', 'UserprofileController@userInfo');
Route::get('search-venue/{query?}', 'VenuesController@searchVenue');

Route::get('/jobs/filter/{q?}', 'JobmanagerController@filterjob');
Route::get('share-job/{id}', 'JobmanagerController@sharejob');
Route::get('/master/location/group', 'CitiesController@getLocationByGroup');
//for jobs in main header Top Metropolitan cities
Route::get('/master/location', 'CitiesController@getLocation');


Route::get('/', function () {
    return view('public/index');
});
//demo
// Route::get('/jobs/search/demo','JobmanagerController@browsejobDemo');
Route::post('/add-newsletter', 'NewsletterController@store');
//Route::get('/jobs/search', 'JobmanagerController@browsejob');
//Route::get('/jobs/search/{q?}/{l?}/{e?}/{j?}', 'JobmanagerController@searchjob');
Route::get('/get-joblist', 'JobmanagerController@browsejob');
Route::get('/get-job-type', 'JobtypeController@index');
Route::get('/get-job-sector', 'JobsectorController@index');
Route::get('/get-industries', 'IndustryController@index');
Route::get('/get-functional-role', 'FunctionalroleController@index');
Route::get('/get-qualification', 'QualificationController@index');



//browsejob
Route::get('/unique-company', 'FrontAllUserController@unique_company');
Route::get('email-verify/{token}', 'FrontAllUserController@EmailVerify')->name('email-verify');
Route::get('email-verify-jobseeker/{token}', 'FrontJobseekerController@EmailVerifyJobseeker')->name('email-verify-jobseeker');

Route::post('/apply-job/{id}', 'ApplyJobController@store');
Route::get('/jobseeker-apply-job', 'ApplyJobController@applyJobList');
Route::get('/get-applyjobdata/{id}', 'ApplyJobController@getsingleapplyjob');
Route::get('/saved-job/{id}', 'SavedJobController@store');
Route::get('/check-user-saved-job', 'SavedJobController@checkUserSavedJob');

Route::get('/contact-us', 'FrontAllUserController@contactus');
Route::get('/about-us', 'FrontAllUserController@aboutus');
Route::get('/advertise-with-us', 'FrontAllUserController@advertise');
Route::get('/faqs', 'FrontAllUserController@faqs');
Route::get('/privacy-policy', 'FrontAllUserController@privacypolicy');
Route::get('/term-condition', 'FrontAllUserController@termcondition');
Route::get('/forget', 'FrontAllUserController@forgetpassword');
Route::get('/view-job-bl/{id}', 'FrontJobseekerController@viewjob');
Route::get('/get-joblistsingle/{id}', 'FrontJobseekerController@viewjobsingle');
Route::post('/add-contactus-detail', 'ContactUsController@store');
Route::get('/session-data-blade', 'UserprofileController@get_blade_sessionuser');
Route::get('/newsandnotification', 'NewsAndNotificationController@index');

//top employers
Route::get('get-top-employers', 'EmpcompaniesdetailsController@getTopEmployers');

Route::post('/forget-password/user', 'Auth\ForgotPasswordController@forgetPassword');

Route::get('forget-password/{token}', 'Auth\ForgotPasswordController@forgetPasswordForm')->name('forget-password-user.form');
Route::post('forget-password/user/reset', 'Auth\ForgotPasswordController@forgetPasswordStore')->name('reset-password-store-user');

//Home Page
Route::get('get-sectors', 'JobmanagerController@getSectors');
Route::get('get-jobs-by-category', 'JobmanagerController@getJobsByCategory');
Route::get('get-job-sectors', 'JobmanagerController@getJobSectors');
Route::get('/viewjobs/{id}', 'JobmanagerController@showSingleJob');
Route::get('/check-user-apply-job', 'JobmanagerController@checkUserApplyJob');
Route::get('/jobs/search/{q?}', 'JobmanagerController@browsejob');

Route::post('jobseekerregister', 'FrontJobseekerController@store')->name('jobseekerregister');
Route::post('jobseekerlogin', 'Auth\FrontuserloginController@login')->name('jobseekerlogin');
Route::get('/userprofile', 'UserprofileController@jobseeker');
Route::get('/checkuser', 'UserprofileController@check_user');
Route::get('/jobseeker-logout', 'UserprofileController@logout');
Route::get('check-cand-contact/{id}', 'Auth\FrontuserloginController@check_contact');
Route::get('check-cand-email/{id}', 'Auth\FrontuserloginController@check_email');

Route::get('get-resume-link', 'UserprofileController@getResumeLink');

//Employer
Route::post('employerregister', 'FrontAllUserController@store')->name('employerregister');
Route::get('check-emp-contact/{id}', 'Auth\FrontuserloginController@check_empcontact');
Route::get('check-emp-email/{id}', 'Auth\FrontuserloginController@check_empemail');
Route::get('/', 'FrontAllUserController@index');

//jobseeker route
Route::group(['middleware' => 'jobseeker'], function () {
    Route::post('/add-professional-detail', 'UserprofileController@addProfessionalDetail');
    Route::get('/get-jobseeker-package', 'PackagemanagerController@getpackagejobseeker');
    Route::get('/jobseeker-profile', 'UserprofileController@jobseeker_profile');
    //getall skill

    Route::get('/qualification-get', 'UserprofileController@qualification');

    Route::post('/add-education-detail', 'UserprofileController@saveEducationalDetail');

    Route::get('edit-educational-info/{id}', 'UserprofileController@editEducationalInfo');

    Route::post('update-educational-info', 'UserprofileController@updateEducationalInfo');

    Route::post('/update-education-detail', 'UserprofileController@update_qualification_detail');

    Route::get('/get-educational-info', 'UserprofileController@getEducationalInfo');

    Route::get('/educational-info', 'UserprofileController@AllEducationInfo');

    Route::post('/add-personal-detail', 'UserprofileController@update_personal_detail');
    Route::post('/add-others-detail', 'UserprofileController@update_others_detail');
    Route::get('/profile/percentage', 'ProfileCompleteController@ProfilePercentage');

    Route::post('/add-certification-detail', 'UserprofileController@update_certification_detail');
    Route::post('/add-social-links-detail', 'UserprofileController@update_sociallinks_detail');

    Route::get('/jobtype-get', 'UserprofileController@jobtype');
    Route::get('/jobshift-get', 'UserprofileController@jobshift');
    Route::get('/industry-get', 'UserprofileController@industry');
    Route::get('/functionalrole-get', 'UserprofileController@functionalrole');
    //   add proffesional route was here 
    Route::post('/update-professional-detail', 'UserprofileController@update_professional_detail');
    Route::get('/get-professional-detail', 'UserprofileController@getProfessionalDetail');
    Route::get('/delete-professional-detail/{id}', 'UserprofileController@deleteProfessionalDetail');
    Route::get('/edit-professional-info/{id}', 'UserprofileController@editProfessionalDetail');
    Route::get('/delete-educational-detail/{id}', 'UserprofileController@deleteEducationalDetail');
    Route::post('/add-resume-detail', 'UserprofileController@update_resume_detail');
    //browse job
    Route::get('/get-jobseeker-package', 'PackagemanagerController@getpackagejobseeker');


    Route::post('/apply-job/{id}', 'ApplyJobController@store');
    Route::get('/jobseeker-apply-job', 'ApplyJobController@applyJobList');
    Route::get('/get-applyjobdata/{id}', 'ApplyJobController@getsingleapplyjob');
    Route::get('/saved-job/{id}', 'SavedJobController@store');
    Route::get('/check-user-saved-job', 'SavedJobController@checkUserSavedJob');
    //browse job
    //edit profile
    Route::get('get-user-skill', 'UserprofileController@getUserSkill');
    Route::post('delete-user-skill/{id}', 'UserprofileController@deleteUserSkill');
    Route::get('edit-user-skill/{id}', 'UserprofileController@editUserSkill');
    Route::post('update-user-skill', 'UserprofileController@updateUserSkill');
    Route::post('add-skill-info', 'UserprofileController@update_skills_detail');

    Route::get('get-certificate-info', 'UserprofileController@getUserCertInfo');
    Route::get('delete-user-certificate/{id}', 'UserprofileController@deleteUserCertInfo');
    Route::get('edit-certificate-info/{id}', 'UserprofileController@editUserCertInfo');
    Route::post('update-user-cert', 'UserprofileController@updateUserCertInfo');

    //edit profile close
    //saved job
    Route::get('/get-saved-job', 'SavedJobController@index');
    //change password
    Route::post('/update-password-jobseeker', 'FrontJobseekerController@update_password');
    //package purchase
    Route::get('/view-package-jobseeker/{id}', 'PackagemanagerController@show');
    Route::get('/buy-package-jobseeker/{id}', 'PackageSubscriptionController@buyJobseeker');
    Route::get('/check-user-buy-package-jobseeker', 'PackageSubscriptionController@checkUserBuyPackage');
    //support
    Route::post('/add-support-js', 'SupportController@store_jobseeker');
    Route::get('/supportlist-js', 'SupportController@index');
    Route::get('/follow/{id}/{id2}', 'SavedJobController@follow');
    Route::get('/check-follow', 'SavedJobController@checkfollow');
    Route::get('/follow-list', 'SavedJobController@follow_list');
    Route::get('/unfollow-companies/{id}/{id2}', 'SavedJobController@unfollow_companies');
    Route::get('/view-job-only/{id}', 'JobmanagerController@showjobdetailOnly');
    Route::get('/view-question-only/{id}', 'JobmanagerController@showQuestions');

    Route::get('/assign-ratings-company', 'RatingController@assignRatings');
    Route::get('/get-ratings', 'RatingController@getRatings');
});

//employer route
Route::group(['middleware' => 'employer'], function () {
    Route::get('/get/all/institutename/qualification', 'ViewProfileTrackController@getAllQualificationInstitute');
    Route::post('/send/bulk/mail', 'viewresumeController@ResumeViewSendMail');
    Route::get('/resume/filter', 'ViewProfileTrackController@getResumeFilterDemo');
    Route::get('/check/profile/view', 'ViewProfileTrackController@checkProfileVieworNot');
    Route::get('/store/profile/view/{id}', 'ViewProfileTrackController@store');
    Route::get('/get/comment/user', 'SaveCommentController@index');
    Route::post('/save/comment/user', 'SaveCommentController@store');
    Route::post('/add/save/search', 'SearchController@AddSearchUrl');
    Route::get('/get/save/search', 'SearchController@getAllSearchUrl');
    Route::get('/educational-info/searchresume', 'viewresumeController@AllEducationInfo');
    Route::get('/professional-info/searchresume', 'viewresumeController@AllProfessionalInfo');
    Route::get('/skill-info/searchresume', 'viewresumeController@AllSkillInfo');
    Route::get('/qualification/name', 'QualificationController@index');
    Route::get('/qualification/name/group', 'QualificationController@getQualificationByGroup');
    Route::get('employer-notification', 'JobmanagerController@employerNotification');

    Route::get('/get-employer-package', 'PackagemanagerController@getpackageemployer');
    Route::get('/getindustry', 'IndustryController@index');
    //in job post
    Route::get('/getindustry/master', 'IndustryController@indexdemo');
    Route::get('/getfunctionalrole', 'FunctionalroleController@index');
    Route::get('/getcompanies', 'EmpcompaniesdetailsController@index');
    Route::get('/getstates', 'StatesController@index');
    Route::get('/getjobpostedtype', 'JobpostedtypeController@index');
    Route::get('/getjobsector', 'JobsectorController@index');
    Route::get('/getcareerlevel', 'CareerlevelController@index');
    Route::get('/getqualification', 'QualificationController@index');
    Route::get('/getjobtype', 'JobtypeController@index');
    Route::get('/getjobshift', 'JobshiftController@index');
    Route::get('/getjobbenefit', 'JobRewardController@index');
    Route::get('/getjobcategory', 'JobcategoryController@index');
    Route::get('/getsalaries', 'SalaryController@index');
    Route::get('/get-city-id/{id}', 'EmpcompaniesdetailsController@getcity');
    //Services
    Route::get('/get-services', 'ServicesController@index');

    Route::get('/edit-job/{id}', 'JobmanagerController@edit');
    Route::post('/update-jobs/{id}', 'JobmanagerController@update');
    Route::get('/jobse', 'JobmanagerController@index');
    Route::get('/jobs-by-sessionuser', 'JobmanagerController@sessionuser');

    Route::get('/deactive-jobme/{id}', 'JobmanagerController@deactiveme');
    Route::get('/active-jobme/{id}', 'JobmanagerController@activeme');
    Route::get('subscriber-package-info/{id}', 'ReportController@SubscriberPackageInfo');


    Route::post('/add-job-front', 'JobmanagerController@store_front');
    Route::post('/update-jobs-front/{id}', 'JobmanagerController@update_front');
    Route::get('/editpostjoby/{id}', 'JobmanagerController@edit');

    //Service User Registration
    Route::post('/add-services-registration', 'ServicesController@store');

    //venue
    Route::post('/add-venue', 'VenuesController@store');
    Route::get('/venue', 'VenuesController@index');
    Route::get('/deactive-venues/{id}', 'VenuesController@deactive');
    Route::get('/active-venues/{id}', 'VenuesController@active');
    Route::post('/update-venues/{id}', 'VenuesController@update');
    Route::get('/venues/{id}', 'VenuesController@destroy');
    Route::get('/get-venuedata/{id}', 'VenuesController@getsinglevenue');
    Route::post('/update-venue/{id}', 'VenuesController@update');
    Route::get('/employer-profile', 'UserprofileController@employer_profile');
    Route::get('/employer-companyprofile', 'UserprofileController@employer_companyprofile');
    Route::post('/add-personal-detail-employer', 'UserprofileController@update_employer_personaldetail');
    Route::post('/add-company-detail-employer', 'UserprofileController@update_employer_companydetail');
    Route::post('/update/employer/profileimage', 'UserprofileController@EmployerProfileImageUpload');
    Route::post('/update/employer/logo', 'UserprofileController@EmployerLogoUpload');
    Route::post('/update/employer/banner', 'UserprofileController@EmployerBannerUpload');
    Route::get('/get-states', 'StatesController@index');
    Route::get('/get-cities', 'CitiesController@index');
    Route::get('/get-cities/data/{id}', 'CitiesController@getCityByState');
    Route::get('/get-countries', 'CountriesController@index');
    //get jobwith employerid
    Route::get('/getjob-employerid', 'UserprofileController@jobpost_employerid');

    //sub user(it added in subuser middleware and also create login panel)
    Route::get('/subuser', 'SubuserController@index');
    Route::get('/get-subuserdata/{id}', 'SubuserController@getsinglesubuser');
    Route::post('/add-subuser', 'SubuserController@store');
    Route::post('/update-subuser/{id}', 'SubuserController@update');
    Route::get('/active-subuser/{id}', 'SubuserController@active');
    Route::get('/deactive-subuser/{id}', 'SubuserController@deactive');
    Route::get('/checkemail/{email}', 'SubuserController@checkEmail');
    //sub user close
    //shortlist

    Route::get('/count-applyjob/{id}', 'JobmanagerController@count_applyjob');
    Route::get('/count-shortlist/{id}', 'JobmanagerController@count_shortlist');
    Route::get('/count-interview/{id}', 'JobmanagerController@count_interview');
    Route::get('/count-offer/{id}', 'JobmanagerController@count_offer');
    Route::get('/count-save/{id}', 'JobmanagerController@count_save');
    Route::get('/jobs-application/{id}', 'JobmanagerController@jobapplication');
    Route::get('scheduled-interview', 'JobmanagerController@getScheduledInterviewLists');
    Route::get('/rejected/{id}', 'JobmanagerController@reject');
    Route::get('/shortlisted/{id}', 'JobmanagerController@shortlist');
    Route::get('/interview-scheduled', 'JobmanagerController@interview_scheduled');
    Route::get('/offer/{id}', 'JobmanagerController@offer');
    Route::get('/hire/{id}', 'JobmanagerController@hire');
    Route::get('/save/{id}', 'JobmanagerController@save');
    //change password
    Route::post('/update-password-employer', 'FrontAllUserController@update_password');
    //package purchase
    Route::get('/view-package/{id}', 'PackagemanagerController@show');
    Route::get('/buy-package/{id}', 'PackageSubscriptionController@buy');
    Route::get('/test-package/{id}', 'PackageSubscriptionController@index');
    Route::get('/check-user-buy-package', 'PackageSubscriptionController@checkUserBuyPackage');
    //tagged and view resume
    // MY RESULE FILTER
    Route::get('/resume-filters', 'viewresumeController@filterResume');
    // Route::get('/demo/filter/resume','SearchController@filterresumeDemo');
    Route::get('/getresume', 'viewresumeController@index');
    Route::get('/export-resumes/{ids}', 'viewresumeController@exportResumes');
    Route::get('/get-tag', 'viewresumeController@gettag');
    Route::post('/add-resume-tag', 'viewresumeController@add_resume_tag');
    Route::post('/add-new-tag', 'viewresumeController@add_new_tag');
    //Route::post('/resumeview-sendmail/{msg}/{candidate}', 'viewresumeController@send_mail');
    Route::get('/get-industry', 'IndustryController@index');
    Route::get('/get-functionalrole', 'FunctionalroleController@index');
    Route::get('/get-resume/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}/{id7}/{id8}/{id9}', 'viewresumeController@getresume');
    Route::get('/gettagresume', 'viewresumeController@tagresume');
    Route::get('/searchtagresume/{id}', 'viewresumeController@searchtagresume');
    //report
    Route::get('/getreport', 'ReportController@index');
    Route::get('/getreport/{id1}/{id2}', 'ReportController@bydate');
    //support
    Route::post('/add-support', 'SupportController@store_employer');
    Route::get('/supportlist', 'SupportController@index');
    //followers
    Route::get('count-job', 'UserprofileController@count_job');
    Route::get('count-active-job', 'UserprofileController@count_active_job');
    Route::get('count-followers', 'UserprofileController@count_followers');
    Route::get('/follower-list', 'SavedJobController@follower_list');

    //question
    Route::get('/question-emp', 'QuestionController@index_emp');
    Route::post('/add-question-mcq-emp', 'QuestionController@store_mcq_emp');
    Route::post('/add-question-yesno-emp', 'QuestionController@store_yesno_emp');
    Route::post('/add-question-descriptive-emp', 'QuestionController@store_descriptive_emp');
    // Route::get('/edit-question/{id}','QuestionController@edit');
    // Route::get('/deactive-question/{id}','QuestionController@deactive');
    // Route::get('/active-question/{id}','QuestionController@active');
    // Route::post('/update-question/{id}','QuestionController@update');
    Route::get('/question-emp/{id}', 'QuestionnarieListController@destroy_emp');

    //questionnarie 
    Route::get('/questionnarie-name_emp', 'QuestionnarieListController@questionnarie_name_emp');
    Route::post('/add-new-questionnarie_emp/{name}', 'QuestionnarieListController@add_new_questionnarie_name_emp');
    Route::post('/add-questionnarie_emp/{name}/{question_id}', 'QuestionnarieListController@add_question_to_questionnarie_emp');
    Route::get('getquestionnarie-question_emp', 'QuestionnarieListController@getquestionnarie_question_emp');
    Route::get('/searchquestionnarie_emp/{questionnarie_id}', 'QuestionnarieListController@searchquestionnarie_emp');
    Route::get('/consultant-job-session', 'EmployerController@getConsultantJobs');
    Route::get('/consultant-job-application/{job_id}/{tabValue}', 'EmployerController@getConsultantJobsApplication');

    Route::get('/update-consultant-candidate', 'EmployerController@update');
    //candidate details 
    Route::get('/jobseeker/personal/info/{jsid}', 'viewresumeController@getJsInfo');
    Route::get('/jobseeker/certificate/info/{jsid}', 'viewresumeController@getCertificateInfo');
    Route::get('/jobseeker/proffesional/info/{jsid}', 'viewresumeController@getProffesionalInfo');
    Route::get('/jobseeker/skill/info/{jsid}', 'viewresumeController@getSkillInfo');
    Route::get('/jobseeker/education/info/{jsid}', 'viewresumeController@getEducationInfo');
    //tracker
    //dashboard counter
    Route::get('get-subuser-activity', 'DashboardController@CountSubuserActivity');
    Route::get('emp/tracker-list', 'EmpTrackerDetailsController@index');
    Route::get('emp/unique-source/tracker', 'EmpTrackerDetailsController@getUniqueSourceEmployer');
    Route::get('emp/export/tracker', 'EmpTrackerDetailsController@exportTrackerDataEmployer');
    Route::get('emp/export/tracker-checked/{id}', 'EmpTrackerDetailsController@ExportTrackerCheckedDataEmployer');
    //empProfileCheck
    Route::get('/check/empProfile/complete', 'DashboardController@CheckEmpProfileComplete');
    //client section start
    Route::post('/add-client', 'ClientNameController@store');
    Route::get('/client', 'ClientNameController@index');
    Route::get('/get-clientdata/{id}', 'ClientNameController@getsingleclient');
    Route::post('/update-client/{id}', 'ClientNameController@update');
    Route::get('/active-client/{id}', 'ClientNameController@active');
    Route::get('/deactive-client/{id}', 'ClientNameController@deactive');

    Route::get('/client-list', 'ClientNameController@clientList');
    //client section End
    Route::post('/post/job/update-employer', 'UserprofileController@UpdateEmployerPostJob');
    Route::get('/get-resumedata/{id}', 'EmpTrackerDetailsController@getsingleResume');
    //designation Searh Tracker Start
    Route::get('/get/emp/designation', 'DesignationListController@getTrackerDesignation');
    //designation Search Tracker End

    //consolidateData
    Route::get('/bulk-data1', 'ConsolidateDataController@index');
    Route::post('/import-consolidate1', 'ConsolidateDataController@store');
    Route::get('/getUniqueSource1', 'ConsolidateDataController@getUniqueSource');
    Route::get('/export-data1', 'ConsolidateDataController@exportBulkData');
    Route::get('/export-data-checked1/{id}', 'ConsolidateDataController@ExportBulkCheckedData');
});

//consultant
Route::get('/consultant-profile', 'ConsultantController@consultantProfile');
Route::post('/consultant-registration', 'ConsultantController@consultantRegistration');
Route::post('/consultant-login', 'ConsultantController@login_consultant');
Route::get('/download-agreement', 'ConsultantController@get_download');

Route::get('/verify-email-consultant', 'ConsultantController@sendEmailOTP');
Route::post('/consultant-email-verify', 'ConsultantController@verifyEmailOTP');

//consultant route
Route::group(['middleware' => 'consultant'], function () {
    Route::get('/get-consultant-jobs', 'ConsultantController@index');

    Route::get('/show-consultant-job-detail/{id}', 'ConsultantController@showJobDetails');

    Route::get('/consultant-job', 'ConsultantController@acceptJob');
    Route::get('/get-accepted-consultant-jobs', 'ConsultantController@getAcceptedJobByConsultant');
    Route::get('/get-job-position-company', 'ConsultantController@getJobPositionCompany');
    Route::get('/get-job-position-list/{company_id}', 'ConsultantController@getJobPositionLists');

    Route::get('/get-applied-active-jobs', 'ConsultantController@getAppliedActiveJobs');
    Route::get('/get-applied-inactive-jobs', 'ConsultantController@getAppliedInactiveJobs');

    Route::get('/get-candidate-lists', 'ConsultantCandidateController@index');
    Route::post('/store-candidate-register', 'ConsultantCandidateController@store');

    Route::get('/get-candidate-report', 'ConsultantCandidateController@reports');

    Route::get('/consultant-packages', 'ReportController@AllPackageInfo');
    Route::get('/count-data', 'ConsultantDashboardController@countDataConsultant');

    Route::get('/update-consultant-candidate', 'ConsultantCandidateController@update');
    Route::get('/get-consultant-apllied-list', 'ConsultantController@getConsultantAppliedList');
    Route::get('/consultant-logout', 'ConsultantController@consultantLogout');
    Route::post('/update-password-consultant', 'ConsultantProfileController@update');
    Route::get('/get-consultant-profile', 'ConsultantProfileController@index');
    Route::get('/get-consultant-company-info', 'ConsultantController@getConsultantCompanyInfo');
    Route::post('/update-consultant-profile', 'ConsultantProfileController@updateConsultantPersonalInfo');
    Route::post('/update-consultant-company', 'ConsultantProfileController@updateConsultantCompanyInfo');
    Route::post('/update-consultant-profile-image', 'ConsultantProfileController@updateConsultantProfileImage');
    Route::get('/get-commission-last-date/{id}', 'ConsultantController@getCommissionAndJobLastDate');

    Route::get('/get-industries121', 'IndustryController@index');
    Route::get('/get-states', 'StatesController@index');
    Route::get('/get-companies', 'EmpcompaniesdetailsController@getCompaniesLists');

    Route::get('/get-notification', 'ConsultantNotificationController@index');
    //graph

});


//for login
Route::post('/subuser-login', 'SubuserController@loginSubuser');

//close
Route::group(['middleware' => 'subuser'], function () {
    //tracker
    Route::get('/get-subuser-profile', 'SubuserController@getSubuserData');
    Route::post('add-tracker', 'TrackerController@store');
    Route::get('get-designation', 'DesignationListController@index');
    Route::get('tracker-list', 'TrackerController@index');
    Route::get('tracker-details/{id}', 'TrackerController@edit');
    Route::post('update-tracker', 'TrackerController@update');

    Route::get('unique-source/tracker', 'TrackerController@getUniqueSourceEmployer');
    Route::get('/export/tracker', 'TrackerController@exportTrackerDataEmployer');
    Route::get('/export/tracker-checked/{id}', 'TrackerController@ExportTrackerCheckedDataEmployer');
    Route::post('update-tracker/resume', 'TrackerController@uploadResume');
    Route::post('/update/password/subuser', 'SubuserController@updatePassword');
    Route::post('update/subuser/profileimage', 'SubuserController@updateSubUserProfileImage');
    Route::get('/get/dashboard-data', 'SubUserDashboardController@dashboard');
    Route::post('/update/subuser/profile', 'SubuserController@updateHimself');
    Route::get('/checkemail-tracker/{email}', 'TrackerController@checkEmailTracker');
    //reference
    Route::get('reference-list', 'ReferenceController@index');
    Route::post('/add-reference', 'ReferenceController@store');
});

Auth::routes();
//signup

//admin route
Route::group(['middleware' => ['auth:admin']], function () {

    // GOVERNMENT JOB ROUTES
    Route::post('/create-govt-job', 'JobmanagerController@saveGovtJob');
    Route::post('/import-govt-job', 'JobmanagerController@uploadBulkGovtJob');
    Route::get('/get-govt-job', 'JobmanagerController@getGovtJob');
    Route::delete('/delete-govt-job', 'JobmanagerController@deleteGovtJob');
    Route::get('/edit-govt-job', 'JobmanagerController@editGovtJob');
    Route::post('/update-govt-job', 'JobmanagerController@updateGovtJob');

    // IMPORT JOBSEEKER
    Route::post('/import-jobseeker-job', 'JobseekerController@uploadJobseeker');

    //Dashboard
    Route::get('get-admin-dashboard-count/count', 'AdminDashboardController@countDataAdmin');

    //Newsletter
    Route::get('/newsletter', 'NewsletterController@index');
    Route::post('/newsletter-broadcast', 'NewsletterController@BroadcastMessage');

    //questionnarie
    Route::get('/questionnarie-name', 'QuestionnarieListController@questionnarie_name');
    Route::post('/add-new-questionnarie/{name}', 'QuestionnarieListController@add_new_questionnarie_name');
    Route::post('/add-questionnarie/{name}/{question_id}', 'QuestionnarieListController@add_question_to_questionnarie');
    Route::get('getquestionnarie-question', 'QuestionnarieListController@getquestionnarie_question');
    Route::get('/searchquestionnarie/{questionnarie_id}', 'QuestionnarieListController@searchquestionnarie');

    //Contact Us
    Route::get('/contact-us-list', 'ContactUsController@index');
    Route::post('/add-countries', 'CountriesController@store');
    Route::get('/countries', 'CountriesController@index');
    Route::get('/edit-countries/{id}', 'CountriesController@edit');
    Route::post('/update-countries/{id}', 'CountriesController@update');
    Route::get('/countries/{id}', 'CountriesController@destroy');

    //states
    Route::post('/add-states', 'StatesController@store');
    Route::get('/states', 'StatesController@index');
    Route::get('/edit-states/{id}', 'StatesController@edit');
    Route::post('/update-states/{id}', 'StatesController@update');
    Route::get('/states/{id}', 'StatesController@destroy');

    //cities
    Route::post('/add-cities', 'CitiesController@store');
    Route::get('/cities', 'CitiesController@index');
    Route::get('/edit-cities/{id}', 'CitiesController@edit');
    Route::post('/update-cities/{id}', 'CitiesController@update');
    Route::get('/get-states/{id}', 'CitiesController@show');
    Route::get('/cities/{id}', 'CitiesController@destroy');

    //industry
    Route::post('/add-industry', 'IndustryController@store');
    Route::get('/industry', 'IndustryController@index');
    Route::get('/edit-industries/{id}', 'IndustryController@edit');
    Route::post('/update-industries/{id}', 'IndustryController@update');
    //Route::get('/get-states/{id}','IndustryController@show');
    Route::get('/industries/{id}', 'IndustryController@destroy');

    //functionalrole
    Route::post('/add-functionalrole', 'FunctionalroleController@store');
    Route::get('/functionalrole', 'FunctionalroleController@index');
    Route::get('/edit-functionalrole/{id}', 'FunctionalroleController@edit');
    Route::post('/update-functionalrole/{id}', 'FunctionalroleController@update');
    //Route::get('/get-states/{id}','FunctionalRoleController@show');
    Route::get('/functionalrole/{id}', 'FunctionalroleController@destroy');

    //package
    Route::post('/add-package', 'PackagemanagerController@store');
    Route::get('/package', 'PackagemanagerController@index');
    Route::get('/edit-package/{id}', 'PackagemanagerController@edit');
    Route::post('/update-package/{id}', 'PackagemanagerController@update');
    Route::get('/package/{id}', 'PackagemanagerController@destroy');
    Route::get('/deactive-package/{id}', 'PackagemanagerController@deactive');
    Route::get('/active-package/{id}', 'PackagemanagerController@active');


    //jobmanager
    Route::post('/add-job', 'JobmanagerController@store');
    Route::get('/job', 'JobmanagerController@index');
    Route::get('/edit-job/{id}', 'JobmanagerController@edit');
    Route::post('/update-job/{id}', 'JobmanagerController@update');
    Route::get('/job/{id}', 'JobmanagerController@destroy');
    Route::get('/deactive-job/{id}', 'JobmanagerController@deactive');
    Route::get('/active-job/{id}', 'JobmanagerController@active');
    Route::get('/job-filter/{company_id?}/{email?}/{status?}', 'JobmanagerController@filter');
    //advertisement
    Route::post('/add-advertisement', 'AdvertisementController@store');
    Route::get('/advertisement', 'AdvertisementController@index');
    Route::get('/edit-advertisement/{id}', 'AdvertisementController@edit');
    Route::post('/update-advertisement/{id}', 'AdvertisementController@update');
    //Route::get('/get-states/{id}','advertisementController@show');
    Route::get('/advertisement/{id}', 'AdvertisementController@destroy');
    Route::get('/deactive-advertisement/{id}', 'AdvertisementController@deactive');
    Route::get('/active-advertisement/{id}', 'AdvertisementController@active');
    //comapany
    Route::post('/add-companies', 'EmpcompaniesdetailsController@store');
    Route::get('/companies', 'EmpcompaniesdetailsController@index');
    Route::get('/edit-companies/{id}', 'EmpcompaniesdetailsController@edit');
    Route::post('/update-companies/{id}', 'EmpcompaniesdetailsController@update');
    Route::get('/geteditcompany-city/{id}', 'EmpcompaniesdetailsController@geteditcompanycity');
    //Route::get('/get-states/{id}','EmpcompaniesdeailsController@show');
    Route::get('/companies/{id}', 'EmpcompaniesdetailsController@destroy');
    Route::get('/get-city/{id}', 'EmpcompaniesdetailsController@getcity');
    Route::get('/deactive-companies/{id}', 'EmpcompaniesdetailsController@deactive');
    Route::get('/active-companies/{id}', 'EmpcompaniesdetailsController@active');
    Route::get('/marked-top-enable/{id}', 'EmpcompaniesdetailsController@markedtopenable');
    Route::get('/marked-top-disable/{id}', 'EmpcompaniesdetailsController@markedtopdisable');
    Route::get('/marked-featured-enable/{id}', 'EmpcompaniesdetailsController@markedfeaturedenable');
    Route::get('/marked-featured-disable/{id}', 'EmpcompaniesdetailsController@markedfeatureddisable');
    Route::get('/export-companies', 'EmpcompaniesdetailsController@exportcompanydetails');
    Route::get('/export-companies-checked/{id}', 'EmpcompaniesdetailsController@exportcompanydetailschecked');
    Route::get('/companies-filter/{industry_id?}/{employee_range?}/{cin_no?}/{status?}', 'EmpcompaniesdetailsController@filter');
    Route::get('get-industries-list', 'IndustryController@getIndustries');
    Route::get('get-employee-range-list', 'EmpcompaniesdetailsController@getEmployeeRange');

    //usermanager>employer
    Route::get('/employer', 'AllUsersController@index');
    Route::post('/add-employer', 'AllUsersController@store');
    Route::get('/edit-employer/{id}', 'AllUsersController@edit');
    Route::post('/update-employer/{id}', 'AllUsersController@update');
    //Route::get('/getdataid','AllUsersController@getdataid');//just for testing
    Route::get('/company-edit-enable/{id}', 'AllUsersController@companyeditenable');
    Route::get('/company-edit-disable/{id}', 'AllUsersController@companyeditdisable');
    Route::get('/deactive-employer/{id}', 'AllUsersController@deactive');
    Route::get('/active-employer/{id}', 'AllUsersController@active');
    Route::get('/export-employer', 'AllUsersController@exportemployerdetails');
    Route::get('/export-employer-checked/{id}', 'AllUsersController@exportSelectedEmployerDetail');
    Route::get('/employer-filter/{industry_id?}/{company_id?}/{email?}/{status?}/{from_date?}/{to_date?}', 'AllUsersController@filter');
    Route::get('/get-companies-list', 'EmpcompaniesdetailsController@getCompaniesList');

    //usermanager>consultant
    Route::get('/consultant', 'AllUsersController@index_consultant');
    Route::post('/add-consultant', 'AllUsersController@store_consultant');
    Route::get('/edit-consultant/{id}', 'AllUsersController@edit_consultant');
    Route::get('/deactive-consultant/{id}', 'AllUsersController@deactive');
    Route::get('/active-consultant/{id}', 'AllUsersController@active');
    Route::post('/update-consultant/{id}', 'AllUsersController@update_consultant');
    Route::get('/export-consultant', 'AllUsersController@exportconsultantdetails');
    Route::get('/export-consultant-checked/{id}', 'AllUsersController@exportSelectedConsultantDetail');
    Route::get('/consultant-filter/{industry_id?}/{company_id?}/{email?}/{status?}', 'AllUsersController@filterConsultant');

    //usermanager>Jobseeker
    Route::post('/add-jobseeker', 'JobseekerController@store');
    Route::get('/imported-jobseeker', 'JobseekerController@importedJobseeker');
    Route::post('/send-credentials-to-jobseeker', 'JobseekerController@sendCredential');
    Route::get('/jobseeker', 'JobseekerController@index');
    Route::get('/edit-jobseeker/{id}', 'JobseekerController@edit');
    Route::get('/deactive-jobseeker/{id}', 'JobseekerController@deactive');
    Route::get('/active-jobseeker/{id}', 'JobseekerController@active');
    Route::post('/update-jobseeker/{id}', 'JobseekerController@update');
    Route::get('/export-jobseeker', 'JobseekerController@exportjobseekerdetails');
    Route::get('export-jobseeker-checked/{id}', 'JobseekerController@exportCheckedJobSeekerDetails');
    Route::get('/jobseeker-filter/{industry_id?}/{company_id?}/{email?}/{status?}/{from_date?}/{to_date?}', 'JobseekerController@filterJobseeker');
    //reports
    Route::get('/resume-filter-admin/{from_date?}/{to_date?}/{keyword?}/{skill?}', 'ProfileCompleteController@filterResume');
    Route::get('get-jobs-list', 'ProfileCompleteController@getJobs');
    Route::get('/export-resume', 'ProfileCompleteController@exportresumedetails');
    Route::get('export-resume-checked/{id}', 'ProfileCompleteController@exportCheckedresumeDetails');
    Route::get('resume-filter/byJobs/{job_title?}/{from_date?}/{to_date?}{status?}/{keyword?}', 'ProfileCompleteController@filterResumeByJobs');
    Route::get('/export-resume-jobs', 'ProfileCompleteController@exportresumedetailsByjobs');
    Route::get('export-resume-jobs-checked/{id}', 'ProfileCompleteController@exportCheckedresumeDetailsByJobs');

    //profile By Video
    Route::get('/profile-by-video', 'ProfileCompleteController@profileByVideo');
    Route::get('/set-video-resume/{id}', 'ProfileCompleteController@setTop3VideoResume');



    //question
    Route::get('/question', 'QuestionController@index');
    Route::post('/add-question-mcq', 'QuestionController@store_mcq');
    Route::post('/add-question-yesno', 'QuestionController@store_yesno');
    Route::post('/add-question-descriptive', 'QuestionController@store_descriptive');
    Route::get('/edit-question/{id}', 'QuestionController@edit');
    Route::get('/deactive-question/{id}', 'QuestionController@deactive');
    Route::get('/active-question/{id}', 'QuestionController@active');
    Route::post('/update-question/{id}', 'QuestionController@update');
    Route::get('/question/{id}', 'QuestionController@destroy');

    //enquiry
    Route::get('/enquiry', 'EnquiryController@index');
    Route::get('/edit-enquiry/{id}', 'EnquiryController@edit');
    Route::post('/update-enquiry/{id}', 'EnquiryController@update');

    //master data-jobpostedtype
    Route::get('/jobpostedtype', 'JobpostedtypeController@index');
    Route::post('/add-jobpostedtype', 'JobpostedtypeController@store');
    Route::get('/jobpostedtype/{id}', 'JobpostedtypeController@destroy');
    Route::get('/deactive-jobposted/{id}', 'JobpostedtypeController@deactive');
    Route::get('/active-jobposted/{id}', 'JobpostedtypeController@active');
    Route::get('/edit-jobposted/{id}', 'JobpostedtypeController@edit');
    Route::post('/update-jobposted/{id}', 'JobpostedtypeController@update');

    //job category
    Route::get('/jobcategory', 'JobcategoryController@index');
    Route::post('/add-jobcategory', 'JobcategoryController@store');
    Route::get('/jobcategory/{id}', 'JobcategoryController@destroy');
    Route::get('/deactive-jobcategory/{id}', 'JobcategoryController@deactive');
    Route::get('/active-jobcategory/{id}', 'JobcategoryController@active');
    Route::get('/edit-jobcategory/{id}', 'JobcategoryController@edit');
    Route::post('/update-jobcategory/{id}', 'JobcategoryController@update');

    //job sector
    Route::get('/jobsector', 'JobsectorController@index');
    Route::post('/add-jobsector', 'JobsectorController@store');
    Route::get('/jobsector/{id}', 'JobsectorController@destroy');
    Route::get('/deactive-jobsector/{id}', 'JobsectorController@deactive');
    Route::get('/active-jobsector/{id}', 'JobsectorController@active');
    Route::get('/edit-jobsector/{id}', 'JobsectorController@edit');
    Route::post('/update-jobsector/{id}', 'JobsectorController@update');

    //career level
    Route::get('/careerlevel', 'CareerlevelController@index');
    Route::post('/add-careerlevel', 'CareerlevelController@store');
    Route::get('/careerlevel/{id}', 'CareerlevelController@destroy');
    Route::get('/deactive-careerlevel/{id}', 'CareerlevelController@deactive');
    Route::get('/active-careerlevel/{id}', 'CareerlevelController@active');
    Route::get('/edit-careerlevel/{id}', 'CareerlevelController@edit');
    Route::post('/update-careerlevel/{id}', 'CareerlevelController@update');

    //jobtype
    Route::get('/jobtype', 'JobtypeController@index');
    Route::post('/add-jobtype', 'JobtypeController@store');
    Route::get('/jobtype/{id}', 'JobtypeController@destroy');
    Route::get('/deactive-jobtype/{id}', 'JobtypeController@deactive');
    Route::get('/active-jobtype/{id}', 'JobtypeController@active');
    Route::get('/edit-jobtype/{id}', 'JobtypeController@edit');
    Route::post('/update-jobtype/{id}', 'JobtypeController@update');

    //jobshift
    Route::get('/jobshift', 'JobshiftController@index');
    Route::post('/add-jobshift', 'JobshiftController@store');
    Route::get('/jobshift/{id}', 'JobshiftController@destroy');
    Route::get('/deactive-jobshift/{id}', 'JobshiftController@deactive');
    Route::get('/active-jobshift/{id}', 'JobshiftController@active');
    Route::get('/edit-jobshift/{id}', 'JobshiftController@edit');
    Route::post('/update-jobshift/{id}', 'JobshiftController@update');

    //qualification
    Route::get('/qualification', 'QualificationController@index');
    Route::post('/add-qualification', 'QualificationController@store');
    Route::get('/qualification/{id}', 'QualificationController@destroy');
    Route::get('/deactive-qualification/{id}', 'QualificationController@deactive');
    Route::get('/active-qualification/{id}', 'QualificationController@active');
    Route::get('/edit-qualification/{id}', 'QualificationController@edit');
    Route::post('/update-qualification/{id}', 'QualificationController@update');

    //salary
    Route::get('/salary', 'SalaryController@index');
    Route::post('/add-salary', 'SalaryController@store');
    Route::get('/salary/{id}', 'SalaryController@destroy');
    Route::get('/deactive-salary/{id}', 'SalaryController@deactive');
    Route::get('/active-salary/{id}', 'SalaryController@active');
    Route::get('/edit-salary/{id}', 'SalaryController@edit');
    Route::post('/update-salary/{id}', 'SalaryController@update');

    //jobreward
    Route::get('/jobbenefit', 'JobRewardController@index');
    Route::post('/add-jobbenefit', 'JobRewardController@store');
    Route::get('/jobbenefit/{id}', 'JobRewardController@destroy');
    Route::get('/deactive-jobbenefit/{id}', 'JobRewardController@deactive');
    Route::get('/active-jobbenefit/{id}', 'JobRewardController@active');
    Route::get('/edit-jobbenefit/{id}', 'JobRewardController@edit');
    Route::post('/update-jobbenefit/{id}', 'JobRewardController@update');

    //jobfair
    Route::get('/jobfair', 'JobFairController@index');
    Route::post('/add-jobfair', 'JobFairController@store');
    Route::get('/jobfair/{id}', 'JobFairController@destroy');
    Route::get('/deactive-jobfair/{id}', 'JobFairController@deactive');
    Route::get('/active-jobfair/{id}', 'JobFairController@active');
    Route::get('/edit-jobfair/{id}', 'JobFairController@edit');
    Route::post('/update-jobfair/{id}', 'JobFairController@update');

    //jobwalkins
    Route::get('/jobwalkins', 'JobWalkinsController@index');
    Route::post('/add-jobwalkins', 'JobWalkinsController@store');
    Route::get('/jobwalkins/{id}', 'JobWalkinsController@destroy');
    Route::get('/deactive-jobwalkins/{id}', 'JobWalkinsController@deactive');
    Route::get('/active-jobwalkins/{id}', 'JobWalkinsController@active');
    Route::get('/edit-jobwalkins/{id}', 'JobWalkinsController@edit');
    Route::post('/update-jobwalkins/{id}', 'JobWalkinsController@update');

    //news and notification
    // Route::get('/newsandnotification','NewsAndNotificationController@index');
    Route::post('/add-news-notification', 'NewsAndNotificationController@store');
    Route::get('/edit-news/{id}', 'NewsAndNotificationController@edit');
    Route::post('/update-news/{id}', 'NewsAndNotificationController@update');
    Route::get('/newsandnotification/{id}', 'NewsAndNotificationController@destroy');
    Route::get('/deactive-news/{id}', 'NewsAndNotificationController@deactive');
    Route::get('/active-news/{id}', 'NewsAndNotificationController@active');
    //top employer
    Route::get('top-employers', 'EmpcompaniesdetailsController@topEmployers');
    Route::post('top-employers/update-status/status/{status}/id/{id}', 'EmpcompaniesdetailsController@updateEmployerStatus');
    Route::post('top-employers/mark-as-top/status/{status}/id/{id}', 'EmpcompaniesdetailsController@markTopEmployer');
    Route::post('top-employers/change-position/position/{position}/id/{id}', 'EmpcompaniesdetailsController@changePosition');

    //admin-change-password
    Route::get('/change-password', 'AdminController@getpassword');
    Route::post('/update-password', 'AdminController@update');
    //add admin user
    Route::post('/add-adminuser', 'AdminuserController@store');
    Route::get('/adminuser', 'AdminuserController@index');

    //admin role

    Route::get('/adminuser-name', 'RoleController@user');
    Route::get('/adminuser-nameall', 'RoleController@userall');
    Route::get('/getMenu', 'RoleController@getMenu');
    Route::post('/add-role', 'RoleController@store');
    Route::get('/rolelist', 'RoleController@index');
    Route::get('/edit-role/{id}', 'RoleController@edit');
    Route::post('/update-role/{id}/{roles}', 'RoleController@update');
    Route::get('/assign-role/{id}', 'RoleController@assignRole');
    //support
    Route::get('/get-support-list', 'SupportController@index_all');
    Route::get('/view-support-conversation/{id}', 'SupportController@view');
    //consultant
    Route::get('/allconsultant', 'ConsultantController@showconsultant');
    Route::get('/jobsconsultant', 'ConsultantController@consultantjobs');
    Route::get('/acceptjd', 'ConsultantController@jdaccept');
    Route::get('/update-consultant-status', 'ConsultantController@update_status');
    Route::get('/update-consultant-agreement', 'ConsultantController@update_agreement');
    Route::get('/get-emp-details/{job_id}', 'ConsultantController@getEmployerDetailByConsultantJob');
    Route::get('/only-verified-consultant/{job_id}', 'ConsultantController@verifiedConsultant');
    Route::get('/verified-consultant-list-assigned/{job_id}', 'ConsultantController@verifiedConsultantAfterAssigned');
    Route::get('/assign-job-consultant', 'ConsultantController@assignJobConsultant');
    //getremaining vaccancy
    Route::get('/get-remaining-vaccancy/{job_id}', 'ConsultantController@getRemainingVaccancy');
    Route::get('/only-candidate-list/{job_id}', 'ConsultantController@getCandidateDetails');
    Route::get('/update-candidate-status', 'ConsultantController@updateCandidateStatus');
    Route::get('/download-resume', 'ConsultantCandidateController@resumeDownload');
    Route::get('/assign-percent-consultant', 'ConsultantController@assignPercentageConsultant');
    Route::get('/update-remarks', 'ConsultantProfileController@UpdateRemarks');
    //consolidateData
    Route::get('/bulk-data', 'ConsolidateDataController@index');
    Route::post('/import-consolidate', 'ConsolidateDataController@store');
    Route::get('/getUniqueSource', 'ConsolidateDataController@getUniqueSource');
    Route::get('/export-data', 'ConsolidateDataController@exportBulkData');
    Route::get('/export-data-checked/{id}', 'ConsolidateDataController@ExportBulkCheckedData');

    Route::get('get/all/applied/candidate/{id}', 'JobmanagerController@getAllAppliedCandidateList');
    //tracker
    Route::get('/get/data/tracker', 'TrackerController@showAdmin');
    Route::get('/getUniqueSource/tracker', 'TrackerController@getUniqueSource');
    Route::get('/export-tracker', 'TrackerController@exportBulkData');
    Route::get('/export-tracker-checked/{id}', 'TrackerController@ExportBulkCheckedData');
    Route::get('/delete-tracker-checked/{id}', 'TrackerController@DeleteCheckedData');
    Route::get('/get-trackerdata/{id}', 'TrackerController@getsingleTrackerDetails');
    //client List
    Route::get('/admin/client', 'ClientNameController@AdminClientList');
    Route::get('/admin/active-client/{id}', 'ClientNameController@Adminactive');
    Route::get('/admin/deactive-client/{id}', 'ClientNameController@Admindeactive');

    Route::get('/get-jobsdata/{id}', 'JobmanagerController@getsingleJobsDetails');
    Route::get('/getClientList', 'JobmanagerController@getClientList');

    //Self-Registration
    Route::get('candidate_self_registration_list', 'SelfRegisterController@candidateSelfRegistrationList');

    //Becil User Data Export
    Route::get('becildata-exportuser', 'BecilUserProfileController@exportuserdetails');

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('config:clear');
        // $exitCode = Artisan::call('debugbar:clear');
        return ["status" => 1, "msg" => "Cache cleared successfully!"];
    });
});


//admin login
Route::prefix('admin')->group(function () {
    //Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/register', 'Auth\AdminRegisterController@create')->name('admin.register');

    //otp
    Route::get('/view-otp/{email}', 'Auth\AdminLoginController@ShowOtpForm')->name('admin.otp.show');
    Route::get('/resend-otp/{email}', 'Auth\AdminLoginController@ResendOTP')->name('admin.otp.resend');
    Route::post('/verify-otp', 'Auth\AdminLoginController@verifyOTP')->name('admin.otp.verify');
    //forgetPassword
    Route::get('/view-reset', 'Auth\AdminLoginController@ShowResetForm')->name('password.show.form');
    Route::post('/send-reset-link', 'Auth\AdminLoginController@SendResetLink')->name('password.send');

    Route::get('forget-password/{token}', 'Auth\AdminLoginController@forgetPasswordForm')->name('forget-password.form');
    Route::post('forget-password/reset', 'Auth\AdminLoginController@forgetPasswordStore')->name('reset-password-store');
});

//Self Register
Route::get('/online-registration', 'SelfRegisterController@candidateSelfRegistration')->name('online-registration');
Route::get('/candidate-self-registration', 'SelfRegisterController@candidateSelfRegistrationRedirect')->name('candidate-self-registration');

Route::post('/post_candidate_self_registration', 'SelfRegisterController@postCandidateSelfRegistration')->name('post_candidate_self_registration');
Route::post('/edit_candidate_self_registration', 'SelfRegisterController@editCandidateSelfRegistration')->name('edit_candidate_self_registration');
Route::post('/update_candidate_self_registration', 'SelfRegisterController@updateCandidateSelfRegistration')->name('update_candidate_self_registration');

Route::get('/candidate_self_registration_details/{id}', 'SelfRegisterController@candidateSelfRegistrationDetails')->name('candidate_self_registration_details');

//Fetch District
Route::post('fetch_district', 'SelfRegisterController@fetchDistrict');
//export
Route::get('export-online-registration-checked/{id}', 'SelfRegisterController@exportCheckedOnlineRegistration');

//Get Video Resume
Route::get('/get-video-resume', 'ProfileCompleteController@getVideoResume');

//Becil-Jobs Users Data
Route::get('get-all-becil-user-detail', 'BecilUserProfileController@getAlluserDetail');
// Route::get('/testb','BecilUserProfileController@testing');

// Workshops - Webinars
Route::post('store-resume-building-workshop', 'WorkshopController@storeResumeBuilding');
Route::post('store-linkedin-workshop', 'WorkshopController@storeLinkedIn');
