<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naukriyan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Site Verification Tags-->
    <meta name="google-site-verification" content="FevFL3827wKfFqHUVJG7nvfIdeVdPBQvEOXSe2LucNo" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8H3RWJ7S3Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-8H3RWJ7S3Z');

    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css"
        type="text/css">
    <!--<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet"> -->
    <link href="{{ asset('assets/public/asset/css/bootstrap-responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        .required {
            color: red !important;
        }

        #naukriya_chat_boat.fabs {
            bottom: 0;
            position: fixed;
            margin: 1em;
            right: 0;
            z-index: 998;

        }

        #naukriya_chat_boat .fab {
            display: block;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            text-align: center;
            color: #f0f0f0;
            margin: 25px auto 0;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
            cursor: pointer;
            -webkit-transition: all .1s ease-out;
            transition: all .1s ease-out;
            position: relative;
            z-index: 998;
            overflow: hidden;
            background: #f5393d;
        }

        #naukriya_chat_boat .fab>i {
            font-size: 2em;
            line-height: 55px;
            -webkit-transition: all .2s ease-out;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            color: white !important;
        }

        #naukriya_chat_boat .fab:not(:last-child) {
            width: 0;
            height: 0;
            margin: 7px 10px 0;
            opacity: 0;
            visibility: hidden;
            line-height: 40px;
        }

        #naukriya_chat_boat .fab:not(:last-child)>i {
            font-size: 1.4em;
            line-height: 40px;
        }

        #naukriya_chat_boat .fab:not(:last-child).is-visible {
            width: 40px;
            height: 40px;
            margin: 15px auto 10;
            opacity: 1;
            visibility: visible;
        }

        #naukriya_chat_boat .fab:nth-last-child(1) {
            -webkit-transition-delay: 25ms;
            transition-delay: 25ms;
        }

        #naukriya_chat_boat .fab:not(:last-child):nth-last-child(2) {
            -webkit-transition-delay: 20ms;
            transition-delay: 20ms;
        }

        #naukriya_chat_boat .fab:not(:last-child):nth-last-child(3) {
            -webkit-transition-delay: 40ms;
            transition-delay: 40ms;
        }

        #naukriya_chat_boat .fab:not(:last-child):nth-last-child(4) {
            -webkit-transition-delay: 60ms;
            transition-delay: 60ms;
        }

        #naukriya_chat_boat .fab:not(:last-child):nth-last-child(5) {
            -webkit-transition-delay: 80ms;
            transition-delay: 80ms;
        }

        #naukriya_chat_boat .fab(:last-child):active,
        #naukriya_chat_boat .fab(:last-child):focus,
        #naukriya_chat_boat .fab(:last-child):hover {
            box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        }

        /*Chatbox*/

        #naukriya_chat_boat .chat {
            position: fixed;
            right: 85px;
            bottom: 20px;
            width: 400px;
            font-size: 12px;
            line-height: 22px;
            font-family: 'Roboto';
            font-weight: 500;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            display: none;
            box-shadow: 1px 1px 100px 2px rgba(0, 0, 0, 0.22);
            border-radius: 10px;
            -webkit-transition: all .2s ease-out;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        #naukriya_chat_boat .chat_fullscreen {
            position: fixed;
            right: 0px;
            bottom: 0px;
            top: 0px;
        }

        #naukriya_chat_boat .chat_header {
            /* margin: 10px; */
            font-size: 13px;
            font-family: 'Roboto';
            font-weight: 500;
            color: #f3f3f3;
            height: 55px;
            background: #f95602;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding-top: 8px;
        }

        #naukriya_chat_boat .chat_header2 {
            /* margin: 10px; */
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        #naukriya_chat_boat .chat_header .span {
            float: right;
        }

        #naukriya_chat_boat .chat_fullscreen_loader {
            display: none;
            float: right;
            cursor: pointer;
            /* margin: 10px; */
            font-size: 20px;
            opacity: 0.5;
            /* padding: 20px; */
            margin: -10px 10px;
        }

        #naukriya_chat_boat .chat.is-visible {
            display: block;
            -webkit-animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
        }

        #naukriya_chat_boat .is-hide {
            opacity: 0
        }

        #naukriya_chat_boat .chat_option {
            float: left;
            font-size: 15px;
            list-style: none;
            position: relative;
            height: 100%;
            width: 100%;
            text-align: relative;
            margin-right: 10px;
            letter-spacing: 0.5px;
            font-weight: 400
        }


        #naukriya_chat_boat .chat_option img {
            border-radius: 50%;
            width: 55px;
            float: left;
            margin: -30px 20px 10px 20px;
            border: 4px solid rgba(0, 0, 0, 0.21);
        }

        #naukriya_chat_boat .change_img img {
            width: 35px;
            margin: 0px 20px 0px 20px;
        }

        #naukriya_chat_boat .chat_option .agent {
            font-size: 12px;
            font-weight: 300;
        }

        #naukriya_chat_boat .chat_option .online {
            opacity: 0.4;
            font-size: 11px;
            font-weight: 300;
        }

        #naukriya_chat_boat .chat_color {
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin: 10px;
            float: left;
        }


        #naukriya_chat_boat .chat_body {
            background: #fff;
            width: 100%;

            display: inline-block;
            text-align: center;
            overflow-y: auto;

        }

        #naukriya_chat_boat #chat_body {
            height: 450px;
        }

        #naukriya_chat_boat .chat_login p,
        .chat_body li,
        p,
        a {
            -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
        }

        #naukriya_chat_boat .chat_body p {
            padding: 20px;
            color: #888
        }

        #naukriya_chat_boat .chat_body a {
            width: 10%;
            text-align: center;
            border: none;
            box-shadow: none;
            line-height: 40px;
            font-size: 15px;
        }



        #naukriya_chat_boat .chat_field {
            position: relative;
            margin: 5px 0 5px 0;
            width: 50%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 30px;
            font-weight: 500;
            color: #4b4b4b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            border: none;
            outline: none;
            display: inline-block;
        }

        #naukriya_chat_boat .chat_field.chat_message {
            height: 35px;
            resize: none;
            font-size: 13px;
            font-weight: 400;
        }

        #naukriya_chat_boat .chat_category {
            text-align: left;
        }

        #naukriya_chat_boat .chat_category {
            margin: 20px;
            background: rgba(0, 0, 0, 0.03);
            padding: 10px;
        }

        #naukriya_chat_boat .chat_category ul li {
            width: 100%;
            height: 40px;
            background: #fff;
            padding: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #e0e0e0;
            font-size: 13px;
            cursor: pointer;
            line-height: 30px;
            color: #888;
            text-align: center;
        }

        .chat_category ul {
            list-style: none;
            padding: 0;
        }

        .chat_category li:hover {
            background: #83c76d;
            color: #fff;
        }

        .chat_category li.active {
            background: #83c76d;
            color: #fff;
        }

        .tags {
            margin: 0px auto;
            bottom: 0px;
            display: block;
            width: 100%;
            padding: 0;
        }

        .tags li {
            padding: 5px 10px;
            border-radius: 40px;
            border: 1px solid rgb(249 86 2);
            margin: 5px;
            display: inline-block;
            color: rgb(249 86 2);
            cursor: pointer;
            width: 100%;

        }

        #naukriya_chat_boat .fab_field {
            width: 100%;
            display: inline-block;
            text-align: center;
            background: #fff;
            border-top: 1px solid #eee;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;

        }

        #naukriya_chat_boat .fab_field2 {
            bottom: 0px;
            position: absolute;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
            z-index: 999;
        }

        #naukriya_chat_boat .fab_field a {
            display: inline-block;
            text-align: center;
        }

        #naukriya_chat_boat #fab_camera {
            float: left;
            background: rgba(0, 0, 0, 0);
        }

        #naukriya_chat_boat #fab_send {
            float: right;
            background: rgb(244 68 47);
            border: 0;
        }

        #naukriya_chat_boat .fab_field #naukriya_chat_boat .fab {
            width: 35px;
            height: 35px;
            box-shadow: none;
            margin: 5px;
        }

        #naukriya_chat_boat .fab_field #naukriya_chat_boat .fab>i {
            font-size: 17px;
            line-height: 35px;
            color: #bbb;
        }

        #naukriya_chat_boat .fab_field #naukriya_chat_boat .fab>i:hover {
            color: #42a5f5;
        }

        .chat_conversion {}

        .chat_converse {
            position: relative;
            background: #fff;
            margin: 0px 0 0px 0;
            height: 300px;
            min-height: 0;
            font-size: 12px;
            line-height: 18px;
            overflow-y: auto;
            width: 100%;
            float: right;
            padding-bottom: 100px;
        }

        .chat_converse2 {
            height: 100%;
            max-height: 800px
        }

        .chat_list {
            opacity: 0;
            visibility: hidden;
            height: 0;
        }

        .chat_list .chat_list_item {
            opacity: 0;
            visibility: hidden;
        }

        .chat .chat_converse .chat_msg_item {
            position: relative;
            margin: 8px 42px 15px 42px;
            padding: 8px 10px;
            max-width: 100%;
            display: block;
            word-wrap: break-word;
            border-radius: 3px;
            -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
            clear: both;
            z-index: 999;
        }

        .status {
            margin: 45px -50px 0 0;
            float: right;
            font-size: 11px;
            opacity: 0.3;
        }

        .status2 {
            margin: -10px 20px 0 0;
            float: right;
            display: block;
            font-size: 11px;
            opacity: 0.3;
        }

        .chat .chat_converse .chat_msg_item .chat_avatar {
            position: absolute;
            top: 0;
        }

        .chat .chat_converse .chat_msg_item.chat_msg_item_admin .chat_avatar {
            left: -52px;
            background: rgba(0, 0, 0, 0.03);
        }

        .chat .chat_converse .chat_msg_item.chat_msg_item_user .chat_avatar {
            right: -52px;
            background: rgba(0, 0, 0, 0.6);
        }

        .chat .chat_converse .chat_msg_item .chat_avatar,
        .chat_avatar img {
            width: 40px;
            height: 40px;
            text-align: center;
            border-radius: 50%;
        }

        .chat .chat_converse .chat_msg_item.chat_msg_item_admin {
            margin-left: 60px;
            float: left;
            background: rgba(0, 0, 0, 0.03);
            color: #666;
        }

        .chat .chat_converse .chat_msg_item.chat_msg_item_user {
            margin-right: 20px;
            float: right;
            background: #f95602;
            color: #eceff1;
        }

        .chat .chat_converse .chat_msg_item.chat_msg_item_admin:before {
            content: '';
            position: absolute;
            top: 15px;
            left: -12px;
            z-index: 998;
            border: 6px solid transparent;
            border-right-color: rgba(255, 255, 255, .4);
        }

        .chat_form .get-notified label {
            color: #077ad6;
            font-weight: 600;
            font-size: 11px;
        }

        #naukriya_chat_boat input {
            position: relative;
            width: 90%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            color: #4b4b4b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            outline: none;
            background: #fff;
            display: inline-block;
            resize: none;
            padding: 5px;
            border-radius: 3px;
        }

        .chat_form .get-notified input {
            margin: 2px 0 0 0;
            border: 1px solid #83c76d;
        }

        .chat_form .get-notified i {
            background: #83c76d;
            width: 30px;
            height: 32px;
            font-size: 18px;
            color: #fff;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            margin: 2px 0 0 -30px;
            position: absolute;
            border-radius: 3px;
        }

        .chat_form .message_form {
            margin: 10px 0 0 0;
        }

        .chat_form .message_form input {
            margin: 5px 0 5px 0;
            border: 1px solid #e0e0e0;
        }

        .chat_form .message_form textarea {
            margin: 5px 0 5px 0;
            border: 1px solid #e0e0e0;
            position: relative;
            width: 90%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            color: #4b4b4b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            outline: none;
            background: #fff;
            display: inline-block;
            resize: none;
            padding: 5px;
            border-radius: 3px;
        }

        .chat_form .message_form button {
            margin: 5px 0 5px 0;
            border: 1px solid #e0e0e0;
            position: relative;
            width: 95%;
            font-family: 'Roboto';
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            color: #fff;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            outline: none;
            background: #fff;
            display: inline-block;
            resize: none;
            padding: 5px;
            border-radius: 3px;
            background: #83c76d;
            cursor: pointer;
        }

        #naukriya_chat_boat strong.chat_time {
            padding: 0 1px 1px 0;
            font-weight: 500;
            font-size: 8px;
            display: block;
        }

        /*Chatbox scrollbar*/

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 0;
        }

        ::-webkit-scrollbar-thumb {
            margin: 2px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.2);
        }

        /*Element state*/

        .is-active {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
            -webkit-transition: all 1s ease-in-out;
            transition: all 1s ease-in-out;
        }

        .is-float {
            box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        }

        .is-loading {
            display: block;
            -webkit-animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
            animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
        }

        /*Animation*/

        @-webkit-keyframes zoomIn {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0.0;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0.0;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
        }

        @-webkit-keyframes load {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0.0;
            }

            50% {
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
            }
        }

        @keyframes load {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0.0;
            }

            50% {
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
            }
        }

        /* SMARTPHONES PORTRAIT */

        @media only screen and (min-width: 300px) {
            .chat {
                width: 250px;
            }
        }

        /* SMARTPHONES LANDSCAPE */

        @media only screen and (min-width: 480px) {
            .chat {
                width: 300px;
            }

            .chat_field {
                width: 65%;
            }
        }

        /* TABLETS PORTRAIT */

        @media only screen and (min-width: 768px) {
            .chat {
                width: 300px;
            }

            .chat_field {
                width: 65%;
            }
        }

        /* TABLET LANDSCAPE / DESKTOP */

        @media only screen and (min-width: 1024px) {
            .chat {
                width: 300px;
            }

            .chat_field {
                width: 65%;
            }
        }

        /*Color Options*/



        .blue #naukriya_chat_boat .fab {
            background: #42a5f5;
            color: #fff;
        }



        .blue .chat {
            background: #42a5f5;
            color: #999;
        }


        /* Ripple */

        .ink {
            display: block;
            position: absolute;
            background: rgba(38, 50, 56, 0.4);
            border-radius: 100%;
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            webkit-transform: scale(0);
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        /*animation effect*/

        .ink.animate {
            -webkit-animation: ripple 0.5s ease-in-out;
            animation: ripple 0.5s ease-in-out;
        }

        @-webkit-keyframes ripple {
            /*scale the element to 250% to safely cover the entire link and fade it out*/

            100% {
                opacity: 0;
                -moz-transform: scale(5);
                -ms-transform: scale(5);
                webkit-transform: scale(5);
                -webkit-transform: scale(5);
                transform: scale(5);
            }
        }

        @keyframes ripple {
            /*scale the element to 250% to safely cover the entire link and fade it out*/

            100% {
                opacity: 0;
                -moz-transform: scale(5);
                -ms-transform: scale(5);
                webkit-transform: scale(5);
                -webkit-transform: scale(5);
                transform: scale(5);
            }
        }

        ::-webkit-input-placeholder {
            /* Chrome */
            color: #bbb;
        }

        :-ms-input-placeholder {
            /* IE 10+ */
            color: #bbb;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            color: #bbb;
        }

        :-moz-placeholder {
            /* Firefox 4 - 18 */
            color: #bbb;
        }

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['PT+Sans:400,700', 'Roboto:300,400,500,700,900', 'Merriweather:300,400,700',
                    'Bree Serif:300,400,500,700,900'
                ]
            }
        });

    </script>

    <script>
        var msg = '{{ Session::get('
        alert ') }}';
        var exist = '{{ Session::has('
        alert ') }}';
        if (exist) {
            alert(msg);
        }

    </script>
</head>

<body>

    {{-- <option value="Employer">Employer
                                                    </option> --}}
                                                    <option value="Jobseeker">Jobseeker</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group inputBox">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <div class="input text">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Enter Email" id="email" required="required"
                                                    autocomplete="off" />
                                            </div>

                                        </div>
                                        <div class="form-group inputBox">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <div class="input password">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter Password" id="password" required="required" />
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="remember_me">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="remember_me">
                                                        <span class="checkbox-icon"><i class="fa fa-square-o"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Remember me
                                                    </label>
                                                </div>
                                                <a href="/forget" class="forgot-link fw-700">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <button type="submit" id="loginSubmitJobseeker"
                                                class="btn btn-block btn-lg btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="signText text-center">
                                <p class="mb-0 fs-16">Don't have an account? <a href="" data-toggle="modal"
                                        data-target="#myModal1" data-dismiss="modal" class="fw-700">Sign up</a>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="text-muted text-center mb-0 fs-13">By logging in, I agree to Naukriyan <a
                                    href="">Terms
                                    of Service</a>, <a href="">Cookie Policy </a>,
                                <a href="">Privacy Policy</a> and
                                <a href="">Cancellation</a>.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <!--  end Login for jobseeker -->

            <!-- Modal Login for Employer -->
            <div class="modal fade popupForm" id="myEmployerModal" role="dialog" data-backdrop="false">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">log in to Naukriyan</h5>
                            <button type="button" id="clbemp" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if (session('update'))
                                <div class="alert alert-success alert-dismissable custom-success-box"
                                    style="margin: 15px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong> {{ session('update') }} </strong>
                                </div>
                            @endif

                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#personalAcc">Login</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="personalAcc" class="tab-pane fade show active">
                                    <form id="footeremployerLogin">
                                        <div class="form-group inputBox">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <div class="input text">
                                                <select name="user_type" id="user_type" class="form-control"
                                                    required="">
                                                    <option>---Select User type---</option>
                                                    <option value="Employer">Employer</option>
                                                    {{-- <option value="Jobseeker">
                                                        Jobseeker</option> --}}
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group inputBox">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <div class="input text">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Enter Email" id="email" required="required"
                                                    autocomplete="off" />
                                            </div>

                                        </div>
                                        <div class="form-group inputBox">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                            <div class="input password">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter Password" id="password" required="required" />
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="remember_me">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="remember_me">
                                                        <span class="checkbox-icon"><i class="fa fa-square-o"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Remember me
                                                    </label>
                                                </div>
                                                <a href="/forget" class="forgot-link fw-700">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <button type="submit" id="loginSubmitEmployer"
                                                class="btn btn-block btn-lg btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="signText text-center">
                                <p class="mb-0 fs-16">Don't have an account? <a href="" data-toggle="modal"
                                        data-target="#myModal1" data-dismiss="modal" class="fw-700">Sign up</a>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="text-muted text-center mb-0 fs-13">By logging in, I agree to Naukriyan <a
                                    href="">Terms
                                    of Service</a>, <a href="">Cookie Policy </a>,
                                <a href="">Privacy Policy</a> and
                                <a href="">Cancellation</a>.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <!--  end login For employer -->

            <!-- Modal -->
            <div class="modal fade popupForm " id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title">Sign up in to Naukriyan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissable custom-success-box"
                                    style="margin: 15px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong> {{ session('message') }} </strong>
                                </div>
                            @endif
                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#Candidate">Jobseeker</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#Employeer">Employer</a>
                                </li>


                            </ul>
                            <div class="tab-content">
                                <div id="Candidate" class="tab-pane fade show active">
                                    <form method="post" accept-charset="utf-8"
                                        action="{{ route('jobseekerregister') }}">
                                        @csrf

                                        <div class="form-group row inputBox">
                                            <input type="hidden" name="user_type" value="Jobseeker">
                                            <div class="col-sm-6">
                                                <label>First Name<span style="color: red"> * </span></label>
                                                <div class="input text"><input type="text" name="fname"
                                                        class="form-control" placeholder="Enter First Name"
                                                        required="required" /></div>

                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name<span style="color: red"> * </span></label>
                                                <div class="input text"><input type="text" name="lname"
                                                        class="form-control" placeholder="Enter Last Name"
                                                        required="required" /></div>

                                            </div>
                                        </div>
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>Contact No.<span style="color: red"> * </span></label>
                                                <div class="input text"><input type="number" name="contact"
                                                        id="cand_contact" class="form-control"
                                                        placeholder="Enter Contact No." required="required" /></div>
                                                <span id="c_contact_err" style="color: red; font-size: 12px;"></span>

                                            </div>
                                            <div class="col-sm-6">
                                                <label>Email<span style="color: red"> * </span></label>
                                                <div class="input text"><input type="email" name="email" id="cand_email"
                                                        class="form-control" placeholder="Enter Email"
                                                        required="required" autocomplete="off" /></div>
                                                <span id="c_email_err" style="color: red; font-size: 12px;"></span>

                                            </div>
                                        </div>
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>Password<span style="color: red"> * </span></label>
                                                <div class="input password"><input type="password" name="password"
                                                        id="cand_password" class="form-control"
                                                        placeholder="Enter Password" required="required" /></div>

                                            </div>
                                            <div class="col-sm-6">
                                                <label>Select Gender<span style="color: red"> * </span></label>
                                                <div class="input password">
                                                    <select name="gender" class="form-control" required="">
                                                        <option>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <!-- <div class="col-sm-6">
                                            <label>Designation<span style="color: red"> * </span></label>
                                            <div class="input text"><input type="text" name="designation" class="form-control" placeholder="Enter Designation" required="required" /></div>

                                        </div> -->

                                        </div>
                                        <div class="form-group row inputBox">

                                            <!-- <div class="col-sm-6">
                                            <label>Aadhar No.</label>
                                            <div class="input text"><input type="text" name="aadhar_no" data-type="adhaar-number" onkeyup="aadhar_pan()" id="aadhar" maxLength="14" class="form-control" placeholder="Enter Adhaar No." min="0" /></div>

                                        </div> -->

                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="remember_me3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="remember_me3">
                                                        <span class="checkbox-icon"><i class="fa fa-square-o"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span>All (<span style="color: red">*</span>) fields are
                                                        mandatory.
                                                    </label>
                                                </div>
                                                <!-- <a href=""  class="forgot-link fw-700">Forgot
                                        Password?</a> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit"
                                                class="btn btn-block btn-lg btn-primary">
                                                Signup
                                            </button>
                                        </div>

                                    </form>
                                </div>
                                <div id="Employeer" class="tab-pane fade">
                                    <form method="post" accept-charset="utf-8" action="{{ route('employerregister') }}">
                                        @csrf
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>First Name<span style="color: red"> * </span></label>
                                                <div class="input text"><input type="text" name="emp_fname"
                                                        class="form-control" placeholder="Enter First Name"
                                                        required="required" /></div>

                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name <span style="color: red"> * </span></label>
                                                <div class="input text"><input type="text" name="emp_lname"
                                                        class="form-control" placeholder="Enter Last Name"
                                                        required="required" /></div>

                                            </div>
                                        </div>
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>Contact No. <span style="color: red"> * </span></label>
                                                <div class="input text"><input type="number" name="emp_contact"
                                                        class="form-control" id="emp_contact"
                                                        placeholder="Enter Contact No." required="required" /></div>
                                                <span id="e_contact_err" style="color: red; font-size: 12px;"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Email <span style="color: red"> * </span></label>
                                                <div class="input text"><input type="email" name="emp_email"
                                                        class="form-control" id="emp_email" placeholder="Enter Email"
                                                        required="required" autocomplete="off" /></div>
                                                <span id="e_email_err" style="color: red; font-size: 12px;"></span>

                                            </div>
                                        </div>
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>Password <span style="color: red"> * </span></label>
                                                <div class="input password"><input type="password" name="emp_password"
                                                        id="emp_password" class="form-control"
                                                        placeholder="Enter Password" required="required" /></div>


                                            </div>
                                            <div class="col-sm-6">
                                                <label>Designation <span style="color: red"> * </span></label>
                                                <div class="input text"><input type="text" name="emp_designation"
                                                        class="form-control" placeholder="Enter Designation"
                                                        required="required" /></div>

                                            </div>
                                        </div>
                                        <div class="form-group row inputBox">
                                            <div class="col-sm-6">
                                                <label>Select Gender <span style="color: red"> * </span></label>
                                                <div class="input password">
                                                    <select name="emp_gender" class="form-control" required>
                                                        <option>Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <label>Select User <span style="color: red"> * </span></label>
                                                <div class="input password">
                                                    <select name="user_type" class="form-control" required>
                                                        <option>Select User Type</option>
                                                        <option value="Employer">Employer</option>
                                                        {{-- <option value="Consultant">
                                                            Consultant</option> --}}

                                                    </select>
                                                </div>

                                            </div>
                                            <!-- <div class="col-sm-6">
                                             <label>Aadhar No.</label>
                                            <div class="input text"><input type="text" data-type="adhaar-number" onkeyup="aadhar_pan()" id="aadhar" maxLength="14" min="0" name="emp_aadhar" class="form-control" placeholder="Enter Adhaar No." /></div>

                                        </div> -->

                                        </div>
                                        <div class="form-group row inputBox">

                                            <div class="col-sm-6">
                                                <label>Select Company <span style="color: red"> * * </span></label>
                                                <div class="input password">
                                                    <select name="company_id" style="width: 100%" id="com_search"
                                                        class="select-box" onchange="others(this.value);" required>
                                                        <option value="">Select Company</option>

                                                        @foreach ($companies as $com)
                                                            <option value="{{ $com->id }}">{{ $com->company_name }}
                                                            </option>

                                                        @endforeach
                                                        <option value="{{ $last_company_id->id + 1 }}">Others</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-sm-6" id="other">
                                                <label>Input Company </label>
                                                <div class="input text">
                                                    <input type="text" name="other" class="form-control"
                                                        placeholder="Enter Company Name" />
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="remember_me2">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="remember_me2">
                                                        <span class="checkbox-icon"><i class="fa fa-square-o"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span>
                                                        All (<span style="color: red">*</span>) fields are mandatory.
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between"
                                                style="font-family: sans-serif;">
                                                <em>If Your company name is not in
                                                    your list then you can input your company name by selecting others
                                                    options in this list.</em>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-lg btn-primary">
                                                Sign Up
                                            </button>
                                        </div>
                                    </form>
                                </div>



                            </div>
                            <div class="signText text-center">
                                <p class="mb-0 fs-16">You have already account?
                                    <a href="" data-toggle="modal" data-target="#myModal" data-dismiss="modal"
                                        class="fw-700">Login</a>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="text-muted text-center mb-0 fs-13">By logging in, I agree to Naukriyan <a
                                    href="">Terms
                                    of Service</a>, <a href="">Cookie Policy </a>,
                                <a href="">Privacy Policy</a> and
                                <a href="">Cancellation</a>.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end header -->
            {{--Vue Routing--}}

            <home-main></home-main>

        </div>
    </div>



    <script src="{{ mix('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.0/jquery.nicescroll.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>

    <script>
        $(".select-box").select2();

    </script>
    <script>
        function validateEmail(emailField) {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(emailField.value) === false) {
                alert('Invalid Email Address');
                return false;
            }

            return true;

        }

        // LOGIN WITH AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //for login without click on footer menu
        $('#loginSubmit').on('click', function(e) {
            e.preventDefault();
            let formData = $('#jobseekerLogin').serializeArray();

            $('#loginSubmit').text('Logging...');
            $('#loginSubmit').attr('disabled', 'disabled');

            $.ajax({
                type: "POST",
                url: "/jobseekerlogin",
                dataType: "json",
                data: formData,
                success: function(response) {
                    if (response.status === 'failed') {
                        alert(response.error);
                        $('#loginSubmit').text('Login');
                        $('#loginSubmit').removeAttr('disabled');
                    }

                    if (response.status === 'success') {
                        $('#clb').click();
                        $('#loginSubmit').text('Login');
                        $('#loginSubmit').removeAttr('disabled');
                        switch (response.data.user_type) {
                            case 'Employer':
                                //window.location = '/#/editemployer/';
                                window.location = '/#/empdashboard/';
                                break;

                            case 'Jobseeker':
                                // window.location = '/#/userinfo/';

                                window.location = '/#/dashboard/';
                                break;

                            case 'Consultant':
                                window.location = '/#/consultant-dashboard/';
                                break;

                            default:
                                window.location = '/#/';
                        }
                    }
                },

                error: function(data) {
                    $('#loginSubmit').text('Login');
                    $('#loginSubmit').removeAttr('disabled');
                }
            });
        })
        //for candidate click menu in footer login form
        $('#loginSubmitJobseeker').on('click', function(e) {
            e.preventDefault();
            let formData = $('#footerjobseekerLogin').serializeArray();

            $('#loginSubmitJobseeker').text('Logging...');
            $('#loginSubmitJobseeker').attr('disabled', 'disabled');

            $.ajax({
                type: "POST",
                url: "/jobseekerlogin",
                dataType: "json",
                data: formData,
                success: function(response) {
                    if (response.status === 'failed') {
                        alert(response.error);
                        $('#loginSubmitJobseeker').text('Login');
                        $('#loginSubmitJobseeker').removeAttr('disabled');
                    }

                    if (response.status === 'success') {
                        $('#clbjob').click();
                        $('#loginSubmitJobseeker').text('Login');
                        $('#loginSubmitJobseeker').removeAttr('disabled');
                        switch (response.data.user_type) {
                            case 'Employer':
                                //window.location = '/#/editemployer/';
                                window.location = '/#/empdashboard/';
                                break;

                            case 'Jobseeker':
                                // window.location = '/#/userinfo/';

                                window.location = '/#/dashboard/';
                                break;

                            case 'Consultant':
                                window.location = '/#/consultant-dashboard/';
                                break;

                            default:
                                window.location = '/#/';
                        }
                    }
                },

                error: function(data) {
                    $('#loginSubmitJobseeker').text('Login');
                    $('#loginSubmitJobseeker').removeAttr('disabled');
                }
            });
        })
        //for candidate click menu in footer login form

        //for employer click menu in footer login form
        $('#loginSubmitEmployer').on('click', function(e) {
            e.preventDefault();
            let formData = $('#footeremployerLogin').serializeArray();

            $('#loginSubmitEmployer').text('Logging...');
            $('#loginSubmitEmployer').attr('disabled', 'disabled');

            $.ajax({
                type: "POST",
                url: "/jobseekerlogin",
                dataType: "json",
                data: formData,
                success: function(response) {
                    if (response.status === 'failed') {
                        alert(response.error);
                        $('#loginSubmitEmployer').text('Login');
                        $('#loginSubmitEmployer').removeAttr('disabled');
                    }

                    if (response.status === 'success') {
                        $('#clbemp').click();
                        $('#loginSubmitEmployer').text('Login');
                        $('#loginSubmitEmployer').removeAttr('disabled');
                        switch (response.data.user_type) {
                            case 'Employer':
                                //window.location = '/#/editemployer/';
                                window.location = '/#/empdashboard/';
                                break;

                            case 'Jobseeker':
                                // window.location = '/#/userinfo/';

                                window.location = '/#/dashboard/';
                                break;

                            case 'Consultant':
                                window.location = '/#/consultant-dashboard/';
                                break;

                            default:
                                window.location = '/#/';
                        }
                    }
                },

                error: function(data) {
                    $('#loginSubmitEmployer').text('Login');
                    $('#loginSubmitEmployer').removeAttr('disabled');
                }
            });
        })
        //for employer click menu in footer login form
        $(document).ready(function() {
            let timeout;
            let delay = 1000; // 1 seconds

            // LIVE CHECKING CANDIDATE CONTACT NUMBER
            $('#cand_contact').keyup(function(e) {
                if (timeout) {
                    clearTimeout(timeout);
                }
                let mobileNumber = $(this).val();
                timeout = setTimeout(function() {
                    $.ajax({
                        method: "GET",
                        url: "/check-cand-contact/" + mobileNumber,
                        success: function(response) {
                            if (response.data === 1) {
                                document.getElementById("c_contact_err").innerHTML =
                                    "Contact no. already exist !";
                            } else {
                                document.getElementById("c_contact_err").innerHTML =
                                    "";
                            }
                        },
                        error: function(response) {
                            console.log('Something went wrong...');
                        }
                    })
                }, delay);
            });

            // LIVE CHECKING CANDIDATE EMAIL ADDRESS
            $('#cand_email').keyup(function(e) {
                if (timeout) {
                    clearTimeout(timeout);
                }
                let emailAddress = $(this).val();
                timeout = setTimeout(function() {
                    $.ajax({
                        method: "GET",
                        url: "/check-cand-email/" + emailAddress,
                        success: function(response) {
                            if (response.data === 1) {
                                document.getElementById("c_email_err").innerHTML =
                                    "Email already exist !";
                            } else {
                                document.getElementById("c_email_err").innerHTML =
                                    "";
                            }
                        },
                        error: function(response) {
                            console.log('Something went wrong...');
                        }
                    })
                }, delay);
            });

            // LIVE CHECKING EMPLOYER CONTACT NUMBER
            $('#emp_contact').keyup(function(e) {
                if (timeout) {
                    clearTimeout(timeout);
                }
                let empMobileNumber = $(this).val();
                timeout = setTimeout(function() {
                    $.ajax({
                        method: "GET",
                        url: "/check-emp-contact/" + empMobileNumber,
                        success: function(response) {
                            if (response.data === 1) {
                                document.getElementById("e_contact_err").innerHTML =
                                    "Contact no. already exist !";
                            } else {
                                document.getElementById("e_contact_err").innerHTML =
                                    "";
                            }
                        },
                        error: function(response) {
                            console.log('Something went wrong...');
                        }
                    })
                }, delay);
            });

            // LIVE CHECKING EMPLOYER EMAIL ADDRESS
            $('#emp_email').keyup(function(e) {
                if (timeout) {
                    clearTimeout(timeout);
                }
                let empEmailAddress = $(this).val();
                timeout = setTimeout(function() {
                    $.ajax({
                        method: "GET",
                        url: "/check-emp-email/" + empEmailAddress,
                        success: function(response) {
                            if (response.data === 1) {
                                document.getElementById("e_email_err").innerHTML =
                                    "Email already exist !";
                            } else {
                                document.getElementById("e_email_err").innerHTML =
                                    "";
                            }
                        },
                        error: function(response) {
                            console.log('Something went wrong...');
                        }
                    })
                }, delay);
            });
        });

        $(".custom-compose").click(function() {
            $(".tab-content").hide();
            $(".compose-mail").show();
        });

        $('[data-type="adhaar-number"]').keyup(function() {

            var value = $(this).val();

            value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");

            $(this).val(value);

        });

    </script>
    <script type="text/javascript">
        $('#other').hide();

        function others(val) {
            if (val === "{{ $last_company_id->id + 1 }}") {
                $('#other').show();
            } else if (val !== "{{ $last_company_id->id + 1 }}") {
                $('#other').hide();
            }
        }

        $('input[type="file"]').on("change", function(e) {
            e.preventDefault();
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        });

    </script>

    <script>
        // CONSULTANT REGISTRATION
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submitConsultantReg').click(function(e) {
                e.preventDefault();
                var fullname = $("#c_fullname").val();
                var designation = $("#c_designation").val();
                var email = $("#c_email").val();
                var mobile = $("#c_mobile").val();
                var password = $("#c_password").val();
                var current_pass = $("#c_confirm_pass").val();
                var company_name = $("#c_company_name").val();
                var company_size = $("#c_company_size").val();
                var company_location = $("#c_company_location").val();
                var company_corp_add = $("#c_company_corp_address").val();
                var agreement = $("#c_agreement").val();

                if (fullname == '' || designation == '') {
                    alert('All field are mandatory.');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "/consultant-registration",
                        dataType: "json",
                        data: {
                            'fullname': fullname,
                            'designation': designation,
                            'email': email,
                            'mobile': email,
                            'password': password,
                            'current_pass': current_pass,
                            'company_name': company_name,
                            'company_size': company_size,
                            'company_location': company_location,
                            'company_corp_add': company_corp_add,
                            'agreement': agreement
                        },

                        success: function(response) {
                            console.log(response);
                        },

                        error: function(data) {
                            $('#submitConsultantReg').text('Sign Up');
                            $('#submitConsultantReg').removeAttr('disabled');
                        }
                    });
                }
            })
        })

    </script>

    <!-- ChatBot Script -->
    <script>
        hideChat(0);

        $('#prime').click(function() {
            toggleFab();
        });


        //Toggle chat and links
        function toggleFab() {
            $('.prime').toggleClass('zmdi-comment-outline');
            $('.prime').toggleClass('zmdi-close');
            $('.prime').toggleClass('is-active');
            $('.prime').toggleClass('is-visible');
            $('#prime').toggleClass('is-float');
            $('.chat').toggleClass('is-visible');
            $('#naukriya_chat_boat .fab').toggleClass('is-visible');

        }

        $('#chat_first_screen').click(function(e) {
            hideChat(1);
        });

        $('#chat_second_screen').click(function(e) {
            hideChat(2);
        });

        $('#chat_third_screen').click(function(e) {
            hideChat(3);
        });

        $('#chat_fourth_screen').click(function(e) {
            hideChat(4);
        });

        $('#chat_fullscreen_loader').click(function(e) {
            $('.fullscreen').toggleClass('zmdi-window-maximize');
            $('.fullscreen').toggleClass('zmdi-window-restore');
            $('.chat').toggleClass('chat_fullscreen');
            $('#naukriya_chat_boat .fab').toggleClass('is-hide');
            $('.header_img').toggleClass('change_img');
            $('.img_container').toggleClass('change_img');
            $('.chat_header').toggleClass('chat_header2');
            $('#naukriya_chat_boat .fab_field').toggleClass('fab_field2');
            $('.chat_converse').toggleClass('chat_converse2');
            //$('#chat_converse').css('display', 'none');
            // $('#chat_body').css('display', 'none');
            // $('#chat_form').css('display', 'none');
            // $('.chat_login').css('display', 'none');
            // $('#chat_fullscreen').css('display', 'block');
        });

        function hideChat(hide) {
            switch (hide) {
                case 0:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'block');
                    $('.chat_fullscreen_loader').css('display', 'none');
                    $('#chat_fullscreen').css('display', 'block');
                    break;
                case 1:
                    $('#chat_converse').css('display', 'block');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 2:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'block');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 3:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'block');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 4:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    $('#chat_fullscreen').css('display', 'block');
                    break;
            }
        }

    </script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.queryTxt').click(function(e) {
                var btnValue = e.target.outerText;
                $('#data').val(e.target.outerText);
                $("#formSubmit").submit();
            })

            $(document).on("click", '.moreHelpQueryTxt', function(event) {
                var moreQryBtnValue = event.target.outerText;
                console.log(event.target.outerText);
                $('#data').val(event.target.outerText);
                $("#formSubmit").submit();
            });

            $(document).on("click", '.queryTxtRes', function(event) {
                var moreQryBtnValue = event.target.outerText;
                console.log(event.target.outerText);
                $('#data').val(event.target.outerText);
                $("#formSubmit").submit();
            });

            $("#formSubmit").on("submit", function(e) {
                e.preventDefault();

                $value = $("#data").val();
                $msg = '<span class="chat_msg_item chat_msg_item_user">' + $value + '</span>';
                $("#chat_fullscreen").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: "/chatbot-query",
                    type: 'GET',
                    data: 'query=' + $value,
                    success: function(result) {
                        console.log(result);
                        if ($value == 'Yes' || $value == 'yes') {

                            $replay = result;

                        } else if ($value == 'No' || $value == 'no') {

                            $replay =
                                '<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/chatbot-1876975-1589760.png"/></div>' +
                                result + '</span>';

                        } else {

                            $replay =
                                '<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/chatbot-1876975-1589760.png"/></div>' +
                                result +
                                '</span><span class="chat_msg_item ">Need more help?<ul class="tags"><li class="moreHelpQueryTxt">Yes</li><li class="moreHelpQueryTxt">No</li> </ul></span>';

                        }

                        $("#chat_fullscreen").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $("#chat_fullscreen").scrollTop($("#chat_fullscreen")[0]
                            .scrollHeight);
                    }
                });
            });
        });

    </script>

    <script>
        window.watsonAssistantChatOptions = {
            integrationID: "95be4d61-8b95-4d33-9c35-a8e98d6e9f90", // The ID of this integration.
            region: "eu-gb", // The region your integration is hosted in.
            serviceInstanceID: "dc25712f-732c-46f1-984e-2edd22c155fd", // The ID of your service instance.
            onLoad: function(instance) {
                instance.render();
            }
        };
        setTimeout(function() {
            const t = document.createElement('script');
            t.src = "https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
            document.head.appendChild(t);
        });

    </script>

</body>

</html>
