//Admin start
import AdminHome from "./components/admin/AdminHome.vue";

// GOVERNMENT JOB SECTION
import AddGovtJob from './components/admin/govtjob/New';
import GovtJobList from './components/admin/govtjob/List';
import GovtJobEdit from './components/admin/govtjob/Edit';

//Admin User
import AdminuserList from "./components/admin/adminuser/List.vue";
import AddAdminuser from "./components/admin/adminuser/New.vue";
import EditAdminuser from "./components/admin/adminuser/Edit.vue";

//Admin User Role
import AdminuserRoleList from "./components/admin/role/List.vue";
import AddAdminuserRole from "./components/admin/role/New.vue";
import EditAdminuserRole from "./components/admin/role/Edit.vue";

//Job Posted type
import JobPostedTypeList from "./components/admin/MasterData/JobPostedtype/List.vue";
import AddJobPostedType from "./components/admin/MasterData/JobPostedtype/New.vue";
import EditJobPostedType from "./components/admin/MasterData/JobPostedtype/Edit.vue";

//Job Category
import JobCategoryList from "./components/admin/MasterData/JobCategory/List.vue";
import AddJobCategory from "./components/admin/MasterData/JobCategory/New.vue";
import EditJobCategory from "./components/admin/MasterData/JobCategory/Edit.vue";

//Job Sector
import JobSectorList from "./components/admin/MasterData/JobSector/List.vue";
import AddJobSector from "./components/admin/MasterData/JobSector/New.vue";
import EditJobSector from "./components/admin/MasterData/JobSector/Edit.vue";

//Job Sector
import CareerLevelList from "./components/admin/MasterData/CareerLevel/List.vue";
import AddCareerLevel from "./components/admin/MasterData/CareerLevel/New.vue";
import EditCareerLevel from "./components/admin/MasterData/CareerLevel/Edit.vue";

//Job Type
import JobTypelList from "./components/admin/MasterData/JobType/List.vue";
import AddJobType from "./components/admin/MasterData/JobType/New.vue";
import EditJobType from "./components/admin/MasterData/JobType/Edit.vue";

//Job Shift
import JobShiftlList from "./components/admin/MasterData/JobShift/List.vue";
import AddJobShift from "./components/admin/MasterData/JobShift/New.vue";
import EditJobShift from "./components/admin/MasterData/JobShift/Edit.vue";

//Qualification
import QualificationList from "./components/admin/MasterData/Qualification/List.vue";
import AddQualification from "./components/admin/MasterData/Qualification/New.vue";
import EditQualification from "./components/admin/MasterData/Qualification/Edit.vue";

//Salary
import SalaryList from "./components/admin/MasterData/Salary/List.vue";
import AddSalary from "./components/admin/MasterData/Salary/New.vue";
import EditSalary from "./components/admin/MasterData/Salary/Edit.vue";

//Job Reward and benefit
import JobBenefitList from "./components/admin/MasterData/JobRewardBenefit/List.vue";
import AddJobBenefit from "./components/admin/MasterData/JobRewardBenefit/New.vue";
import EditJobBenefit from "./components/admin/MasterData/JobRewardBenefit/Edit.vue";

//Job Fair
import JobFairList from "./components/admin/MasterData/JobFair/List.vue";
import AddJobFair from "./components/admin/MasterData/JobFair/New.vue";
import EditJobFair from "./components/admin/MasterData/JobFair/Edit.vue";

//Job Walkins
import JobWalkinsList from "./components/admin/MasterData/JobWalkins/List.vue";
import AddJobWalkins from "./components/admin/MasterData/JobWalkins/New.vue";
import EditJobWalkins from "./components/admin/MasterData/JobWalkins/Edit.vue";

//News And notification
import NewsAndNotificationList from "./components/admin/extrafeature/newsandnotification/List.vue";
import AddNewsAndNotification from "./components/admin/extrafeature/newsandnotification/New.vue";
import EditNewsAndNotification from "./components/admin/extrafeature/newsandnotification/Edit.vue";
import ViewNewsAndNotification from "./components/admin/extrafeature/newsandnotification/View.vue";

// Top Employer
import TopEmployer from "./components/admin/extrafeature/topemployer/List";

//jobs
import JobsList from "./components/admin/jobs/List.vue";
import AddJobs from "./components/admin/jobs/New.vue";
import EditJobs from "./components/admin/jobs/Edit.vue";
import ViewJobs from "./components/admin/jobs/View.vue";

//countries
import Countries from "./components/admin/settings/countries/List.vue";
import AddCountries from "./components/admin/settings/countries/New.vue";
import EditCountries from "./components/admin/settings/countries/Edit.vue";

//states
import States from "./components/admin/settings/states/List.vue";
import AddStates from "./components/admin/settings/states/New.vue";
import EditStates from "./components/admin/settings/states/Edit.vue";

//cities
import Cities from "./components/admin/settings/cities/List.vue";
import AddCities from "./components/admin/settings/cities/New.vue";
import EditCities from "./components/admin/settings/cities/Edit.vue";

//industry
import Industry from "./components/admin/settings/industry/List.vue";
import AddIndustry from "./components/admin/settings/industry/New.vue";
import EditIndustry from "./components/admin/settings/industry/Edit.vue";

//functionalrole
import Functionalrole from "./components/admin/settings/functionalrole/List.vue";
import AddFunctionalrole from "./components/admin/settings/functionalrole/New.vue";
import EditFunctionalrole from "./components/admin/settings/functionalrole/Edit.vue";

//change-password
//(for those user who login)
import ChangePassword from "./components/admin/settings/changepassword/Update.vue";

//advertisement
import Advertisement from "./components/admin/advertisement/List.vue";
import AddAdvertisement from "./components/admin/advertisement/New.vue";
import EditAdvertisement from "./components/admin/advertisement/Edit.vue";

//packagemanager
import Packagemanager from "./components/admin/packagemanager/List.vue";
import AddPackagemanager from "./components/admin/packagemanager/New.vue";
import EditPackagemanager from "./components/admin/packagemanager/Edit.vue";

//jobmanager
import Jobmanager from "./components/admin/jobmanager/List.vue";
import AddJobmanager from "./components/admin/jobmanager/New.vue";
import EditJobmanager from "./components/admin/jobmanager/Edit.vue";
import AppliedCandidateList from "./components/admin/jobmanager/AppliedCandidate.vue";

//comapnies
import Company from "./components/admin/companies/List.vue";
import AddCompany from "./components/admin/companies/New.vue";
import EditCompany from "./components/admin/companies/Edit.vue";

//usermanager>employer
import Employer from "./components/admin/usermanager/employer/List.vue";
import AddEmployer from "./components/admin/usermanager/employer/New.vue";
import EditEmployer from "./components/admin/usermanager/employer/Edit.vue";

//usermanager>jobseeker
import Jobseeker from "./components/admin/usermanager/jobseeker/List.vue";
import AddJobseeker from "./components/admin/usermanager/jobseeker/New.vue";
import EditJobseeker from "./components/admin/usermanager/jobseeker/Edit.vue";
import SendCredentialToJobseeker from "./components/admin/usermanager/jobseeker/SendCredentialToJobseeker";

//usermanager>consultant
import Consultant from "./components/admin/usermanager/consultant/List.vue";
import AddConsultant from "./components/admin/usermanager/consultant/New.vue";
import EditConsultant from "./components/admin/usermanager/consultant/Edit.vue";

//Question
import Question from "./components/admin/question/List.vue";
import AddQuestion from "./components/admin/question/New.vue";
import EditQuestion from "./components/admin/question/Edit.vue";

//Enquiry
import Enquiry from "./components/admin/enquiry/List.vue";
import AddEnquiry from "./components/admin/enquiry/New.vue";
import EditEnquiry from "./components/admin/enquiry/Edit.vue";

//Support
import ManageSupport from "./components/admin/support/ManageSupport.vue";
import SearchSupport from "./components/admin/support/SearchSupport.vue";
import ViewSupportConversation from "./components/admin/support/ViewSupportConversation.vue";
//reports
import AdminResumeList from "./components/admin/reports/ResumeList.vue"
import AdminResumeListByJob from "./components/admin/reports/ResumeListByJobs.vue"
import AdminVideoResume from "./components/admin/videoResume/List.vue"

//Newletter
import NewsLetter from "./components/admin/newsletter/List.vue";
import NewsLetterMailing from "./components/admin/newsletter/MassMailing.vue";

//ContactUs
import ContactUs from "./components/admin/contactus/List.vue";
//tracker
import AdminTrackerList from "./components/admin/tracker/List.vue";

// Admin section End

//(reset password without login)
import ForgetPassword from "./components/public/front/ForgetPassword.vue";
import ResetPassword from "./components/public/front/ResetPassword.vue";

//Footer Links
import AboutUs from "./components/public/front/Aboutus.vue";
import AdvertiseWithUs from "./components/public/front/Advertisewithus.vue";
import ContactUsLink from "./components/public/front/Contactus.vue";
import FAQs from "./components/public/front/Faq.vue";
import PrivacyPolicy from "./components/public/front/Privacypolicy";
import TermsOfUse from "./components/public/front/Termconditions";

//Jobseeker
import Dashboard from "./components/public/Jobseeker/Dashboard.vue";
import Userinfo from "./components/public/Jobseeker/Userinfo.vue";
import Browsejob from "./components/public/Jobseeker/Browsejob.vue";
import GuestBrowsejob from "./components/public/Jobseeker/GuestBrowsejob.vue";
import Profileview from "./components/public/Jobseeker/Profileview.vue";
import Appliedjob from "./components/public/Jobseeker/Appliedjob.vue";
import Savedjob from "./components/public/Jobseeker/Savedjob.vue";
import Upcominginterview from "./components/public/Jobseeker/Upcominginterview.vue";
import Package from "./components/public/Jobseeker/Package.vue";
import SomethingNew from "./components/public/Jobseeker/SomethingNew";

//open when jobseeker login
import ViewjobJobseeker from "./components/public/Jobseeker/ViewjobJobseeker.vue";
import Shortlisted from "./components/public/Jobseeker/Shortlisted.vue";
import RecruiterMessage from "./components/public/Jobseeker/RecruiterMessage.vue";
import ChangePasswordJobseeker from "./components/public/Jobseeker/ChangePassword.vue";
import BuyPackageJobseeker from "./components/public/Jobseeker/BuyPackageJobseeker.vue";
import SupportlistJS from "./components/public/Jobseeker/SupportlistJS.vue";
import CompanyFollowing from "./components/public/Jobseeker/CompanyFollowing.vue";
import ResumeFormatList from "./components/public/Jobseeker/ResumeFormatList.vue";
import ResumeSampleOne from "./components/public/Jobseeker/ResumeSample1.vue";
import ResumeSampleTwo from "./components/public/Jobseeker/ResumeSample2.vue";
import ViewApplyQuestion from "./components/public/Jobseeker/ViewApplyQuestion.vue";

//Employer
import EmpDashboard from "./components/public/Employer/EmpDashboard.vue";
import Subuserlist from "./components/public/Employer/Subuserlist.vue";
import Enquirieslist from "./components/public/Employer/Enquirieslist.vue";
import Followdetails from "./components/public/Employer/Followdetails.vue";
import Messagedisplay from "./components/public/Employer/Messagedisplay.vue";
import Reports from "./components/public/Employer/Reports.vue";
import Supportlist from "./components/public/Employer/Supportlist.vue";
import Resumeview from "./components/public/Employer/Resumeview.vue";
import Taggedview from "./components/public/Employer/Taggedview.vue";
import Venues from "./components/public/Employer/Venues.vue";
import Questionnaires from "./components/public/Employer/Questionnaires.vue";
import Accountexicutive from "./components/public/Employer/Accountexicutive.vue";
import JobApplication from "./components/public/Employer/JobApplication.vue";
import Subscription from "./components/public/Employer/Subscription";

import Managejobs from "./components/public/Employer/Managejobs.vue";
import Postjob from "./components/public/Employer/Postjob.vue";
import Pricing from "./components/public/Employer/Pricing.vue";
import Editemployer from "./components/public/Employer/Editemployer.vue";
import Postnewjob from "./components/public/Employer/Postnewjob.vue";
import Editpostjob from "./components/public/Employer/Editpostjob.vue";
import Vieworganization from "./components/public/Employer/Vieworganization.vue";
import Viewemployeeprofile from "./components/public/Employer/Viewemployeeprofile.vue";
import ChangePasswordEmployer from "./components/public/Employer/ChangePassword.vue";
import BuyPackage from "./components/public/Employer/BuyPackage.vue";
import PackageInfo from "./components/public/Employer/PackageInfo";
import ScheduledInterview from "./components/public/Employer/ScheduledInterview";
import Notification from "./components/public/Employer/notification.vue";
import JobseekerNotification from "./components/public/Jobseeker/notification.vue";
import CandidateDetails from "./components/public/Employer/CandidateDetails.vue";
import Verified from "./components/public/front/verified.vue";
import SearchResume from "./components/public/Employer/SearchResume.vue";

import TrackerList from "./components/public/subuser/TrackerList.vue";
import AddTracker from "./components/public/subuser/AddTracker.vue";
import TrackerDetails from "./components/public/subuser/TrackerDetails.vue";

//employer
import EmpTrackerList from "./components/public/Employer/EmpTrackerList.vue"
import EmpClientList from "./components/public/Employer/ClientList.vue"
import AdminClientList from "./components/admin/MasterData/Client/List.vue"
import EmpConsolidateDataList from "./components/public/Employer/EmpConsolidateDataList.vue"

//question
import EmpQuestionList from "./components/public/Employer/EmpQuestion/List.vue";
import AddEmpQuestion from "./components/public/Employer/EmpQuestion/New.vue";
import FrontComingSoon from "./components/public/front/Comingsoon.vue";

import SingleJob from "./components/public/front/SingleJob.vue";

// CAREER COMPONENTS
import CareerPostJob from "./components/admin/career/PostJob.vue";
import CareerJobList from "./components/admin/career/JobList.vue";
import CareerEditJob from "./components/admin/career/EditJob.vue";
import CareerApplyJob from "./components/admin/career/ApplyJobList.vue";

//Questionnarie
import QuestionnarieList from "./components/admin/questionnarie/List.vue";
import AddQuestionnarie from "./components/admin/questionnarie/New.vue";
import EditQuestionnarie from "./components/admin/questionnarie/Edit.vue";

// Homepage
import Homepage from "./components/public/front/Home.vue";

//website info
import WebsiteInfo from "./components/admin/websiteinfo/Edit.vue";
import WebsiteInfoList from "./components/admin/websiteinfo/List.vue";

//Registration Message
import RegistrationMessage from "./components/public/jobseeker/MessageJobseeker.vue";
//video resume
import ResumeVideo from "./components/public/front/VideoResume.vue";
//consolidateData
import ConsolidateData from "./components/admin/consolidateData/List.vue";
import UploadConsolidateData from "./components/admin/consolidateData/Upload.vue";

//Subuser
import SubuserLogin from "./components/public/subuser/SubuserLogin.vue";
import SubuserDashboard from "./components/public/subuser/DashboardSubuser.vue";
import SubuserHeader from "./components/public/subuser/SubuserHeader.vue";
import SubuserFooter from "./components/public/subuser/SubuserFooter.vue";
import SubuserUpdateProfile from "./components/public/subuser/EditSubUserProfile.vue";

//Testing Page
import TestPage from "./components/public/Employer/TestPage.vue";

//Candidate Self Registration
import selfRegistration from "./components/admin/self_registration/List.vue";

//Becil Candidate User
import BecilCandidateList from './components/admin/reports/BecilCandidateList.vue';

//Workshop
import ResumeBuildingWorkshop from './components/public/Workshop/ResumeBuilding.vue';

import Thankyou from './components/public/Workshop/Thankyou.vue';

//Profile Stage
import MainStage from './components/public/jobseeker/MainStage.vue';

// noinspection JSUnresolvedVariable,JSUnresolvedFunction
export const routes = [
    {
        path: "*",
        name: "NotFound",
        component: () =>
            System.import(
                /* webpackChunkName: "400" */ "./components/public/front/NotFound"
            ),
    },
    {
        path: "/",
        component: Homepage,
    },
    {
        path: "/SearchResume",
        component: SearchResume,
    },
    {
        path: "/tracker-list",
        component: TrackerList
    },
    {
        path: "/add-tracker",
        component: AddTracker
    },
    {
        path: "/tracker-details/:trackid",
        component: TrackerDetails
    },
    {
        path: '/emp/tracker-list',
        component: EmpTrackerList
    },
    {
        path: '/emp/consolidatedata-list',
        component: EmpConsolidateDataList
    },
    {
        path: '/emp/client-list',
        component: EmpClientList
    },
    {
        path: '/admin/client/list',
        component: AdminClientList
    },
    {
        path: "/Verified",
        component: Verified,
    },
    {
        path: "/emp-notification",
        component: Notification,
    },
    {
        path: "/jobseeker-notification",
        component: JobseekerNotification,
    },
    {
        path: "/candidate-details/:jsid",
        component: CandidateDetails,
    },
    {
        path: "/career",
        component: () =>
            System.import(
                /*webpackChunkName: "career" */ "./components/public/front/Career.vue"
            ),
    },
    {
        path: "/job/:slug",
        component: SingleJob,
    },
    {
        path: "/forget-password",
        component: ForgetPassword,
    },
    {
        path: "/reset-password",
        component: ResetPassword,
    },
    {
        path: "/about-us",
        component: AboutUs,
    },
    {
        path: "/advertise-with-us",
        component: AdvertiseWithUs,
    },
    {
        path: "/contact-us",
        component: ContactUsLink,
    },
    {
        path: "/faqs",
        component: FAQs,
    },
    {
        path: "/privacy-policy",
        component: PrivacyPolicy,
    },
    {
        path: "/terms-of-use",
        component: TermsOfUse,
    },
    {
        path: '/video-resume/:tabId?',
        component: ResumeVideo,
    },
    // {
    //     path: "/video-resume/:tabId?",
    //     component: () =>
    //         System.import(
    //             /*webpackChunkName: "terms-of-use" */ "./components/public/front/VideoResume.vue"
    //         ),
    // },
    {
        path: "/admin",
        component: AdminHome,
    },
    {
        path: "/questionnarie-list",
        component: QuestionnarieList,
    },
    {
        path: "/add-questionnarie",
        component: AddQuestionnarie,
    },
    {
        path: "/edit-questionnarie/:questionnarieid",
        component: EditQuestionnarie,
    },

    //websiteinfo
    {
        path: "/edit-website-info/:id",
        component: WebsiteInfo,
    },
    {
        path: "/website-info-list",
        component: WebsiteInfoList,
    },

    //jobseeker
    {
        path: "/dashboard",
        component: Dashboard,
    },
    {
        path: "/recommended-jobs",
        component: () =>
            System.import(
                /* webpackChunkName: 'recommended-job' */ "./components/public/Jobseeker/RecommendedJobs.vue"
            ),
    },
    {
        path: "/userinfo/:tabId?",
        component: Userinfo,
    },
    {
        name: "browsejob",
        path: "/browsejob",
        props(route) {
            return route.query || {}
        },
        component: Browsejob,
    },
    {
        path: "/browsejob/:kw/:location/:experience/:jobtype",
        component: Browsejob,
    },
    {
        path: "/guestbrowsejob",
        component: GuestBrowsejob,
    },
    {
        path: "/profileview",
        component: Profileview,
    },
    {
        path: "/appliedjob",
        component: Appliedjob,
    },
    {
        path: "/inbox",
        component: () =>
            System.import(
                /* webpackChunkName: "inbox" */ "./components/public/Jobseeker/Inbox.vue"
            ),
    },
    {
        path: "/inbox-single/:id",
        component: () =>
            System.import(
                /* webpackChunkName: "single-inbox" */ "./components/public/Jobseeker/InboxSingle"
            ),
    },
    {
        path: "/send-mail",
        component: () =>
            System.import(
                /* webpackChunkName: "send-mail-jobseeker" */ "./components/public/Jobseeker/SendMail"
            ),
    },

    /* Employer Inbox*/
    {
        path: "/emp-inbox",
        component: () =>
            System.import(
                /* webpackChunkName: "Emp-inbox" */ "./components/public/Employer/Inbox.vue"
            ),
    },
    {
        path: "/emp-inbox-single/:id",
        component: () =>
            System.import(
                /* webpackChunkName: "emp-single-inbox" */ "./components/public/Employer/InboxSingle"
            ),
    },
    {
        path: "/emp-send-mail",
        component: () =>
            System.import(
                /* webpackChunkName: "emp-send-mail-jobseeker" */ "./components/public/Employer/SendMail"
            ),
    },

    {
        path: "/edit-viewjobs/:viewjobsid",
        name: "testing",
        component: ViewjobJobseeker,
    },
    {
        path: "/savedjob",
        component: Savedjob,
    },
    {
        path: "/upcominginterview",
        component: Upcominginterview,
    },
    {
        path: "/shortlisted",
        component: Shortlisted,
    },
    {
        path: "/recruitermessage",
        component: RecruiterMessage,
    },
    {
        path: "/package",
        component: Package,
    },
    {
        path: "/something-new",
        component: SomethingNew
    },
    {
        path: "/jobseeker-changepassword",
        component: ChangePasswordJobseeker,
    },
    {
        path: "/buy-package-jobseeker/:jobseekerpackagesid",
        component: BuyPackageJobseeker,
    },
    {
        path: "/support-list",
        component: SupportlistJS,
    },
    {
        path: "/company-followings",
        component: CompanyFollowing,
    },
    {
        path: "/resume-format-list",
        component: ResumeFormatList,
    },
    {
        path: "/resume-sample-1",
        component: ResumeSampleOne,
    },
    {
        path: "/resume-sample-2",
        component: ResumeSampleTwo,
    },
    {
        path: "/confirm-apply-view-questions/:jbsid",
        component: ViewApplyQuestion,
    },

    //Employer
    {
        path: "/package-info/package/:id",
        component: PackageInfo,
    },
    {
        path: "/empdashboard",
        component: EmpDashboard,
    },
    {
        path: "/subuserlist",
        component: Subuserlist,
    },
    {
        path: "/enquirieslist",
        component: Enquirieslist,
    },
    {
        path: "/followdetails",
        component: Followdetails,
    },
    {
        path: "/messagedisplay",
        component: Messagedisplay,
    },
    {
        path: "/reports",
        component: Reports,
    },
    {
        path: "/supportlist",
        component: Supportlist,
    },
    {
        name: 'resumeview',
        path: "/resumeview",
        props(route) {
            return route.query || {}
        },
        component: Resumeview,
    },
    {
        path: "/taggedview",
        component: Taggedview,
    },
    {
        path: "/venues",
        component: Venues,
    },
    {
        path: "/scheduled-interview",
        component: ScheduledInterview,
    },
    {
        path: "/questionnaires",
        component: Questionnaires,
    },
    {
        path: "/accountexicutive",
        component: Accountexicutive,
    },
    {
        path: "/managejobs",
        component: Managejobs,
    },
    {
        path: "/jobapplication/:jobid",
        component: JobApplication,
    },
    {
        path: "/subscription",
        component: Subscription
    },
    {
        path: "/postjob",
        component: Postjob,
    },
    {
        path: "/pricing",
        component: Pricing,
    },
    {
        path: "/editemployer",
        component: Editemployer,
    },
    {
        path: "/postnewjob",
        component: Postnewjob,
    },
    {
        path: "/editpostjob/:jobid",
        component: Editpostjob,
    },
    {
        path: "/vieworganization",
        component: Vieworganization,
    },
    {
        path: "/viewemployeeprofile",
        component: Viewemployeeprofile,
    },
    {
        path: "/employer-changepassword",
        component: ChangePasswordEmployer,
    },
    {
        path: "/buy-package/:buypackagesid",
        component: BuyPackage,
    },
    {
        path: "/add-question-emp",
        component: AddEmpQuestion,
    },
    {
        path: "/view-question-emp",
        component: EmpQuestionList,
    },

    // CAREER SECTION
    {
        path: "/career-job-list",
        component: CareerJobList,
    },
    {
        path: "/career-post-job",
        component: CareerPostJob,
    },
    {
        path: "/career-edit-job/:id",
        component: CareerEditJob,
    },
    {
        path: "/career-apply-job",
        component: CareerApplyJob,
    },

    // GOVERNMENT JOB ROUTE
    {
        path: "/add-govt-job",
        component: AddGovtJob
    },

    {
        path: "/govt-jobs-list",
        component: GovtJobList
    },

    {
        path: "/edit-govt-job/:id",
        component: GovtJobEdit
    },

    //Adminuser
    {
        path: "/adminuser-list",
        component: AdminuserList,
    },
    {
        path: "/add-adminuser",
        component: AddAdminuser,
    },
    {
        path: "/edit-adminuser/:adminuserid",
        component: EditAdminuser,
    },
    //Adminuser Role
    {
        path: "/adminuser-role-list",
        component: AdminuserRoleList,
    },
    {
        path: "/add-adminuser-role",
        component: AddAdminuserRole,
    },
    {
        path: "/edit-adminuser-role/:roleid",
        component: EditAdminuserRole,
    },

    //jobs
    {
        path: "/jobs-list",
        component: JobsList,
    },
    {
        path: "/add-jobs",
        component: AddJobs,
    },
    {
        path: "/edit-jobs/:jobsid",
        component: EditJobs,
    },
    {
        path: "/view-jobs/:jobsid",
        component: ViewJobs,
    },
    //jobs
    {
        path: "/newsandnotification-list",
        component: NewsAndNotificationList,
    },
    {
        path: "/add-newsandnotification",
        component: AddNewsAndNotification,
    },
    {
        path: "/edit-newsandnotification/:newsandnotificationsid",
        component: EditNewsAndNotification,
    },
    {
        path: "/view-newsandnotification/:newsandnotificationsid",
        component: ViewNewsAndNotification,
    },
    // Top Employer
    {
        path: "/topemployer-list",
        component: TopEmployer,
    },

    //settings
    {
        path: "/countries-list",
        component: Countries,
    },
    {
        path: "/add-countries",
        component: AddCountries,
    },
    {
        path: "/edit-countries/:countriesid",
        component: EditCountries,
    },
    {
        path: "/states-list",
        component: States,
    },
    {
        path: "/add-states",
        component: AddStates,
    },
    {
        path: "/edit-states/:statesid",
        component: EditStates,
    },
    {
        path: "/cities-list",
        component: Cities,
    },
    {
        path: "/add-cities",
        component: AddCities,
    },
    {
        path: "/edit-cities/:citiesid",
        component: EditCities,
    },
    {
        path: "/industry-list",
        component: Industry,
    },
    {
        path: "/add-industry",
        component: AddIndustry,
    },
    {
        path: "/edit-industries/:industryid",
        component: EditIndustry,
    },
    {
        path: "/functionalrole-list",
        component: Functionalrole,
    },
    {
        path: "/add-functionalrole",
        component: AddFunctionalrole,
    },
    {
        path: "/edit-functionalrole/:functionalroleid",
        component: EditFunctionalrole,
    },
    {
        path: "/advertisement-list",
        component: Advertisement,
    },
    {
        path: "/add-advertisement",
        component: AddAdvertisement,
    },
    {
        path: "/edit-advertisement/:advertisementid",
        component: EditAdvertisement,
    },
    //packagemanager
    {
        path: "/packagemanager-list",
        component: Packagemanager,
    },
    {
        path: "/add-packagemanager",
        component: AddPackagemanager,
    },
    {
        path: "/edit-packagemanager/:packagemanagerid",
        component: EditPackagemanager,
    },
    //jobmanager
    {
        path: "/jobmanager-list",
        component: Jobmanager,
    },
    {
        path: "/add-jobmanager",
        component: AddJobmanager,
    },
    {
        path: "/edit-jobmanager/:jobmanagerid",
        component: EditJobmanager,
    },
    {
        path: "/view/apply/candidate/:jobmanagerid",
        component: AppliedCandidateList,
    },

    {
        path: "/companies-list",
        component: Company,
    },
    {
        path: "/add-companies",
        component: AddCompany,
    },
    {
        path: "/edit-companies/:companiesid",
        component: EditCompany,
    },
    {
        path: "/employer-list",
        component: Employer,
    },
    {
        path: "/add-employer",
        component: AddEmployer,
    },
    {
        path: "/edit-employer/:employerid",
        component: EditEmployer,
    },
    {
        path: "/jobseeker-list",
        component: Jobseeker,
    },
    {
        path: "/send-credential-to-jobseeker",
        component: SendCredentialToJobseeker,
    },
    {
        path: "/add-jobseeker",
        component: AddJobseeker,
    },
    {
        path: "/edit-jobseeker/:jobseekerid",
        component: EditJobseeker,
    },
    {
        path: "/consultant-list",
        component: Consultant,
    },
    {
        path: "/add-consultant",
        component: AddConsultant,
    },
    {
        path: "/edit-consultant/:consultantid",
        component: EditConsultant,
    },
    {
        path: "/question-list",
        component: Question,
    },
    {
        path: "/add-question",
        component: AddQuestion,
    },
    {
        path: "/edit-question/:questionid",
        component: EditQuestion,
    },
    //enquiry
    {
        path: "/enquiry-list",
        component: Enquiry,
    },
    {
        path: "/add-enquiry",
        component: AddEnquiry,
    },
    {
        path: "/edit-enquiry/:enquiryid",
        component: EditEnquiry,
    },
    {
        path: "/change-password",
        component: ChangePassword,
    },
    //master
    //jobpostedtype
    {
        path: "/job-posted-type",
        component: JobPostedTypeList,
    },
    {
        path: "/add-jobpostedtype",
        component: AddJobPostedType,
    },
    {
        path: "/edit-jobpostedtype/:jobpostedid",
        component: EditJobPostedType,
    },
    //job category
    {
        path: "/job-category",
        component: JobCategoryList,
    },
    {
        path: "/add-jobcategory",
        component: AddJobCategory,
    },
    {
        path: "/edit-jobcategory/:jobcategoryid",
        component: EditJobCategory,
    },
    //job sector
    {
        path: "/job-sector",
        component: JobSectorList,
    },
    {
        path: "/add-jobsector",
        component: AddJobSector,
    },
    {
        path: "/edit-jobsector/:jobsectorid",
        component: EditJobSector,
    },
    //career level
    {
        path: "/career-level",
        component: CareerLevelList,
    },
    {
        path: "/add-careerlevel",
        component: AddCareerLevel,
    },
    {
        path: "/edit-careerlevel/:careerlevelid",
        component: EditCareerLevel,
    },
    //jobtype
    {
        path: "/job-type",
        component: JobTypelList,
    },
    {
        path: "/add-jobtype",
        component: AddJobType,
    },
    {
        path: "/edit-jobtype/:jobtypeid",
        component: EditJobType,
    },
    //jobshift
    {
        path: "/job-shift",
        component: JobShiftlList,
    },
    {
        path: "/add-jobshift",
        component: AddJobShift,
    },
    {
        path: "/edit-jobshift/:jobshiftid",
        component: EditJobShift,
    },
    //qualification
    {
        path: "/qualification-list",
        component: QualificationList,
    },
    {
        path: "/add-qualification",
        component: AddQualification,
    },
    {
        path: "/edit-qualification/:qualificationid",
        component: EditQualification,
    },
    //salary
    {
        path: "/salary-list",
        component: SalaryList,
    },
    {
        path: "/add-salary",
        component: AddSalary,
    },
    {
        path: "/edit-salary/:salaryid",
        component: EditSalary,
    },
    //JOb Benefit
    {
        path: "/jobreward-list",
        component: JobBenefitList,
    },
    {
        path: "/add-jobbenefit",
        component: AddJobBenefit,
    },
    {
        path: "/edit-jobbenefit/:jobbenefitid",
        component: EditJobBenefit,
    },
    //JOb Fair
    {
        path: "/jobfair-list",
        component: JobFairList,
    },
    {
        path: "/add-jobfair",
        component: AddJobFair,
    },
    {
        path: "/edit-jobfair/:jobfairid",
        component: EditJobFair,
    },
    //JOb Walkins
    {
        path: "/jobwalkins-list",
        component: JobWalkinsList,
    },
    {
        path: "/add-jobwalkins",
        component: AddJobWalkins,
    },
    {
        path: "/edit-jobwalkins/:jobwalkinsid",
        component: EditJobWalkins,
    },
    //support
    {
        path: "/manage-support",
        component: ManageSupport,
    },
    {
        path: "/search-support",
        component: SearchSupport,
    },
    {
        path: "/view-support-conversation/:conversationsid",
        component: ViewSupportConversation,
    },
    //reports
    {
        path: "/resume-list",
        component: AdminResumeList,
    },
    {
        path: "/resume-list-by-jobs",
        component: AdminResumeListByJob,
    },
    {
        path: "/profile-video-resume",
        component: AdminVideoResume,
    },
    {
        path: "/consolidate-data",
        component: ConsolidateData,
    },
    {
        path: "/upload-consolidate-data",
        component: UploadConsolidateData,
    },
    //admin-consultant
    //subuser Start
    {
        path: "/subuser-login",
        component: SubuserLogin
    },
    {
        path: "/subuser-dashboard",
        component: SubuserDashboard
    },
    {
        path: "/subuser-header",
        component: SubuserHeader
    },
    {
        path: "/subuser-footer",
        component: SubuserFooter
    },
    {
        path: '/update-subuser',
        component: SubuserUpdateProfile
    },
    //
    {
        path: '/emp/testpage',
        component: TestPage
    },
    //subuserEnd
    {
        path: "/consultantjob",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/ConsultantJobs.vue"
            ),
    },
    {
        path: "/acceptjd",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/Acceptjd.vue"
            ),
    },
    {
        path: "/allconsultant",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/AllConsultant.vue"
            ),
    },
    {
        path: "/assign-job/:jobid",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/AssignJob.vue"
            ),
    },
    {
        path: "/modify-recruitment",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/ModifyRecruitment.vue"
            ),
    },
    {
        path: "/change-recruit-status/:recjobid",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/admin/consultant/ChangeRecruitmentStatus.vue"
            ),
    },
    {
        path: "/newsletter-list",
        component: NewsLetter,
    },
    {
        path: "/newsletter-mailing",
        component: NewsLetterMailing,
    },
    {
        path: '/admin/tracker/list',
        component: AdminTrackerList
    },
    {
        path: "/contactus-list",
        component: ContactUs,
    },
    {
        path: "/coming-soon",
        component: FrontComingSoon,
    },

    //
    {
        path: "/manage-jobs-consultant",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/public/Employer/ManageJdConsultant.vue"
            ),
    },
    {
        path: "/assigned-jobs-consultant",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/public/Employer/AssignedJdConsultant.vue"
            ),
    },
    {
        path: "/jobapplication-consultant/:postid",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/public/Employer/JobApplicationConsultant.vue"
            ),
    },
    // Consultant Router
    {
        path: "/consultant-dashboard",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Dashboard" */ "./components/public/consultant/Dashboard"
            ),
    },

    {
        path: "/jobs/position",
        component: () =>
            System.import(
                /* webpackChunkName: "Job-Position" */ "./components/public/consultant/PositionList.vue"
            ),
    },

    {
        path: "/jobs/position/:id",
        component: () =>
            System.import(
                /* webpackChunkName: "Job-Position" */ "./components/public/consultant/PositionDetail.vue"
            ),
    },

    {
        path: "/jobs/manage-position",
        component: () =>
            System.import(
                /* webpackChunkName: "Manage-Position" */ "./components/public/consultant/ManagePositionList.vue"
            ),
    },

    {
        path: "/candidates",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidates" */ "./components/public/consultant/Candidate.vue"
            ),
    },

    {
        path: "/candidate-register",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/CandidateRegister"
            ),
    },
    {
        path: "/consultant-signup",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/ConsultantSignUp.vue"
            ),
    },
    {
        path: "/consultant-login",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/ConsultantLogin.vue"
            ),
    },
    {
        path: "/thanq",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/Thanq.vue"
            ),
    },
    {
        path: "/verify-otp",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/OtpAuthenticate.vue"
            ),
    },
    {
        path: "/change-cred-con",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/ChangePasswordConsultant.vue"
            ),
    },
    {
        path: "/edit-profile-consultant",
        component: () =>
            System.import(
                /* webpackChunkName: "Candidate-Register" */ "./components/public/consultant/EditProfileConsultant.vue"
            ),
    },
    {
        path: "/consultant-reports",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Report" */ "./components/public/consultant/Reports.vue"
            ),
    },
    {
        path: "/package-consultant",
        component: () =>
            System.import(
                /* webpackChunkName: "Consultant-Report" */ "./components/public/consultant/PackageConsultant.vue"
            ),
    },
    {
        path: "/register-success",
        component: RegistrationMessage,
    },
    //self registration
    {
        path: "/self-registration-list",
        component: selfRegistration,
    },
    //Becil Candidate list
    {
        path: '/becil-candidate-list',
        component: BecilCandidateList
    },

    //Workshop
    {
        path: '/resume-building-workshop',
        component: ResumeBuildingWorkshop
    },
    {
        path: '/thankyou',
        component: Thankyou
    },

    //ProfileStage
    {
        path: '/profile-stage',
        component: MainStage
    },


];
