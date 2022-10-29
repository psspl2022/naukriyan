webpackJsonp([14],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/Employer/InboxSingle.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ckeditor_ckeditor5_build_classic__ = __webpack_require__("./node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__ckeditor_ckeditor5_build_classic___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__ckeditor_ckeditor5_build_classic__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


var moment = __webpack_require__("./node_modules/moment/moment.js");
/* harmony default export */ __webpack_exports__["default"] = ({
    name: "Inbox",
    data: function data() {
        //let now = new Date()
        return {
            countUnreadMessage: 0,
            status: false,
            editor: __WEBPACK_IMPORTED_MODULE_0__ckeditor_ckeditor5_build_classic___default.a,
            singleMessage: '',
            inboxId: this.$route.params.id,

            form: new Form({
                email_id: '',
                subject: '',
                editorData: '',
                attachment: ''
            })
        };
    },
    mounted: function mounted() {
        var _this = this;

        this.$store.dispatch('getAllProfile', '/userprofile');

        axios.get('/get-single-inbox-message/' + this.inboxId).then(function (response) {
            _this.singleMessage = response.data[0];
        });

        axios.get('/mark-as-read/' + this.inboxId).then(function (response) {});

        axios.get('get-unread-message').then(function (response) {
            _this.countUnreadMessage = response.data;
        });
    },

    computed: {
        allProfile: function allProfile() {
            return this.$store.getters.getAllProfile;
        }
    },
    methods: {
        composeMail: function composeMail() {
            $(".mail-box-section").hide();
            $('.inbox-head h3').text("Compose Mail");
            $(".mail-body").show();
        },
        sendMessage: function sendMessage() {
            var _this2 = this;

            this.status = true;
            axios.post('/send-message-to-jobseeker', this.form).then(function (response) {
                if (response.status === 200) {
                    toast({
                        type: 'success',
                        title: 'Message send successfully'
                    });
                    _this2.status = false;
                    var self = _this2;
                    // Reset form data after success
                    Object.keys(_this2.form).forEach(function (key, index) {
                        self.form[key] = '';
                    });
                }
            }).catch(function (error) {
                console.log(error);
                _this2.status = false;
            });
        },
        com_message: function com_message($nm, id) {
            this.message_box = true;
            this.currentTab = id;
        },
        onResumeChange: function onResumeChange(event) {
            var _this3 = this;

            var file = event.target.files[0];
            if (file.size > 5242880) {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Your file size is too large.'
                });
            } else {
                var reader = new FileReader();
                reader.onload = function (event) {
                    _this3.form.attachment = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        downloadAttachment: function downloadAttachment(id) {
            var _this4 = this;

            this.status = true;
            axios.get('/download-attachment/' + id).then(function (response) {
                // this.downloadFile(response, 'customFilename');
                _this4.status = false;
                if (response.data.error) {
                    toast({
                        type: 'warning',
                        title: response.data.error
                    });
                }
            }).catch(function (error) {
                toast({
                    type: 'warning',
                    title: 'Something went wrong.'
                });
                _this4.status = false;
            });
        },
        downloadFile: function downloadFile(response, filename) {
            // It is necessary to create a new blob object with mime-type explicitly set
            // otherwise only Chrome works like it should
            var newBlob = new Blob([response.data], { type: 'application/pdf' });

            // IE doesn't allow using a blob object directly as link href
            // instead it is necessary to use msSaveOrOpenBlob
            if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                window.navigator.msSaveOrOpenBlob(newBlob);
                return;
            }

            // For other browsers:
            // Create a link pointing to the ObjectURL containing the blob.
            var data = window.URL.createObjectURL(newBlob);
            var link = document.createElement('a');
            link.href = data;
            link.download = filename + '.pdf';
            link.click();
            setTimeout(function () {
                // For Firefox it is necessary to delay revoking the ObjectURL
                window.URL.revokeObjectURL(data);
            }, 100);
        }
    },
    filters: {
        checkCurrentDateTime: function checkCurrentDateTime(date) {
            if (!date) return '';
            var currentDate = moment().format('YYYY-MM-DD');
            var createdDate = moment(date).format('YYYY-MM-DD');
            if (currentDate === createdDate) {
                return moment(date).format('LT'); // 03:55 PM
            } else {
                return moment(date).format('MMM DD'); // JUN 29
            }
        }
    }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/InboxSingle.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.label-danger[data-v-14b56a05] {\n    font-weight: bold;\n}\n.mail-body[data-v-14b56a05] {\n    display: none;\n}\n.mail-box[data-v-14b56a05] {\n    border-collapse: collapse;\n    border-spacing: 0;\n    display: table;\n    table-layout: fixed;\n    width: 100%;\n}\n.mail-box aside[data-v-14b56a05] {\n    display: table-cell;\n    float: none;\n    height: 100%;\n    padding: 0;\n    vertical-align: top;\n}\n.mail-box .sm-side[data-v-14b56a05] {\n    background: none repeat scroll 0 0 #e5e8ef;\n    border-radius: 4px 0 0 4px;\n    width: 25%;\n}\n.mail-box .lg-side[data-v-14b56a05] {\n    background: none repeat scroll 0 0 #fff;\n    border-radius: 0 4px 4px 0;\n    width: 75%;\n}\n.mail-box .sm-side .user-head[data-v-14b56a05] {\n    background: none repeat scroll 0 0 #00a8b3;\n    border-radius: 4px 0 0;\n    color: #fff;\n    min-height: 80px;\n    padding: 10px;\n}\n.user-head .inbox-avatar[data-v-14b56a05] {\n    float: left;\n    width: 65px;\n}\n.user-head .inbox-avatar img[data-v-14b56a05] {\n    border-radius: 4px;\n}\n.user-head .user-name[data-v-14b56a05] {\n    display: inline-block;\n    margin: 0 0 0 10px;\n}\n.user-head .user-name h5[data-v-14b56a05] {\n    font-size: 14px;\n    font-weight: 300;\n    margin-bottom: 0;\n    margin-top: 15px;\n}\n.user-head .user-name h5 a[data-v-14b56a05] {\n    color: #fff;\n}\n.user-head .user-name span a[data-v-14b56a05] {\n    color: #87e2e7;\n    font-size: 12px;\n}\n.inbox-body[data-v-14b56a05] {\n    padding: 20px;\n}\nul.inbox-nav[data-v-14b56a05] {\n    display: inline-block;\n    margin: 0;\n    padding: 0;\n    width: 100%;\n}\n.inbox-divider[data-v-14b56a05] {\n    border-bottom: 1px solid #d5d8df;\n}\nul.inbox-nav li[data-v-14b56a05] {\n    display: inline-block;\n    line-height: 45px;\n    width: 100%;\n}\nul.inbox-nav li a[data-v-14b56a05] {\n    color: #6a6a6a;\n    display: inline-block;\n    line-height: 45px;\n    padding: 0 20px;\n    width: 100%;\n}\nul.inbox-nav li a[data-v-14b56a05]:hover, ul.inbox-nav li.active a[data-v-14b56a05], ul.inbox-nav li a[data-v-14b56a05]:focus {\n    background: none repeat scroll 0 0 #d5d7de;\n    color: #6a6a6a;\n}\nul.inbox-nav li a i[data-v-14b56a05] {\n    color: #6a6a6a;\n    font-size: 16px;\n    padding-right: 10px;\n}\nul.inbox-nav li a span.label[data-v-14b56a05] {\n    margin-top: 13px;\n}\nul.labels-info li h4[data-v-14b56a05] {\n    color: #5c5c5e;\n    font-size: 13px;\n    padding-left: 15px;\n    padding-right: 15px;\n    padding-top: 5px;\n    text-transform: uppercase;\n}\nul.labels-info li[data-v-14b56a05] {\n    margin: 0;\n}\nul.labels-info li a[data-v-14b56a05] {\n    border-radius: 0;\n    color: #6a6a6a;\n}\nul.labels-info li a[data-v-14b56a05]:hover, ul.labels-info li a[data-v-14b56a05]:focus {\n    background: none repeat scroll 0 0 #d5d7de;\n    color: #6a6a6a;\n}\nul.labels-info li a i[data-v-14b56a05] {\n    padding-right: 10px;\n}\n.nav.nav-pills.nav-stacked.labels-info p[data-v-14b56a05] {\n    color: #9d9f9e;\n    font-size: 11px;\n    margin-bottom: 0;\n    padding: 0 22px;\n}\n.inbox-head[data-v-14b56a05] {\n    background: none repeat scroll 0 0 #41cac0;\n    border-radius: 0 4px 0 0;\n    color: #fff;\n    min-height: 80px;\n    padding: 20px;\n}\n.inbox-head h3[data-v-14b56a05] {\n    display: inline-block;\n    font-weight: 300;\n    margin: 0;\n    padding-top: 6px;\n}\n.date-time[data-v-14b56a05] {\n    float: right;\n}\n@media (max-width: 767px) {\n.files .btn span[data-v-14b56a05] {\n        display: none;\n}\n.files .preview *[data-v-14b56a05] {\n        width: 40px;\n}\n.files .name *[data-v-14b56a05] {\n        display: inline-block;\n        width: 80px;\n        word-wrap: break-word;\n}\n}\nul[data-v-14b56a05] {\n    list-style-type: none;\n    padding: 0;\n    margin: 0;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-14b56a05\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/Employer/InboxSingle.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("Emp-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "mail-inbox" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-12" }, [
              _c("div", { staticClass: "mail-box" }, [
                _c("aside", { staticClass: "sm-side" }, [
                  _c("div", { staticClass: "user-head" }, [
                    _c("div", { staticClass: "inbox-avatar" }, [
                      _vm.allProfile.profile_pic_thumb
                        ? _c("img", {
                            attrs: {
                              width: "64",
                              height: "60",
                              src:
                                "/emp_profile_image/" +
                                _vm.allProfile.profile_pic_thumb
                            }
                          })
                        : _c("img", {
                            attrs: {
                              src:
                                "https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/portrait/small/avatar-s-1.png",
                              width: "64",
                              height: "60"
                            }
                          })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "user-name" }, [
                      _c("h5", [
                        _vm._v(
                          _vm._s(_vm.allProfile.fname) +
                            " " +
                            _vm._s(_vm.allProfile.lname)
                        )
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v(_vm._s(_vm.allProfile.email))])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "inbox-body" }, [
                    _c(
                      "a",
                      {
                        staticClass:
                          "btn btn-primary text-white btn-block custom-compose",
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            _vm.composeMail()
                          }
                        }
                      },
                      [_vm._v("Compose")]
                    )
                  ]),
                  _vm._v(" "),
                  _c("ul", { staticClass: "inbox-nav inbox-divider" }, [
                    _c(
                      "li",
                      { staticClass: "active" },
                      [
                        _c("router-link", { attrs: { to: "/emp-inbox" } }, [
                          _c("i", { staticClass: "fa fa-inbox" }),
                          _vm._v(" Inbox "),
                          _vm.countUnreadMessage > 0
                            ? _c(
                                "span",
                                {
                                  staticClass: "label label-danger pull-right"
                                },
                                [
                                  _vm._v(
                                    "(" + _vm._s(_vm.countUnreadMessage) + ")"
                                  )
                                ]
                              )
                            : _vm._e()
                        ])
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "li",
                      [
                        _c("router-link", { attrs: { to: "/emp-send-mail" } }, [
                          _c("i", { staticClass: "fa fa-envelope" }),
                          _vm._v(
                            " Send Mail\n                                    "
                          )
                        ])
                      ],
                      1
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("aside", { staticClass: "lg-side" }, [
                  _c("div", { staticClass: "inbox-head" }, [
                    _c(
                      "span",
                      [
                        _c("router-link", { attrs: { to: "/emp-inbox" } }, [
                          _c("i", { staticClass: "fa fa-arrow-left" })
                        ])
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "inbox-body mail-box-section" }, [
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "subject-body" }, [
                          _c("span", [
                            _c("strong", [_vm._v("Subject:")]),
                            _vm._v(" " + _vm._s(_vm.singleMessage.subject))
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "date-time" }, [
                            _c("strong", [_vm._v("Received on:")]),
                            _vm._v(
                              " " +
                                _vm._s(
                                  _vm._f("checkCurrentDateTime")(
                                    _vm.singleMessage.created_at
                                  )
                                )
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("hr"),
                        _vm._v(" "),
                        _c("div", { staticClass: "message-body mt-5" }, [
                          _c("p", {
                            domProps: {
                              innerHTML: _vm._s(_vm.singleMessage.message)
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _vm.singleMessage.attachment
                          ? _c("div", { staticClass: "attachment-link" }, [
                              _c(
                                "a",
                                {
                                  staticClass:
                                    "btn btn-primary text-white btn-download",
                                  attrs: { href: "#" },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      _vm.downloadAttachment(
                                        _vm.singleMessage.id
                                      )
                                    }
                                  }
                                },
                                [
                                  _c("i", { staticClass: "fa fa-paperclip" }),
                                  _vm._v(
                                    " " +
                                      _vm._s(
                                        _vm.status
                                          ? "Downloading..."
                                          : "Download Attachment"
                                      )
                                  )
                                ]
                              )
                            ])
                          : _vm._e()
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "inbox-body mail-body" }, [
                    _c(
                      "form",
                      {
                        attrs: {
                          method: "post",
                          enctype: "multipart/form-data"
                        },
                        on: {
                          submit: function($event) {
                            $event.preventDefault()
                            _vm.sendMessage()
                          }
                        }
                      },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(1),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.email_id,
                                expression: "form.email_id"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "email",
                              placeholder: "Recipient Email Address"
                            },
                            domProps: { value: _vm.form.email_id },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.form,
                                  "email_id",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(2),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.subject,
                                expression: "form.subject"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Enter Subject..."
                            },
                            domProps: { value: _vm.form.subject },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.form,
                                  "subject",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "form-group" },
                          [
                            _vm._m(3),
                            _vm._v(" "),
                            _c("ckeditor", {
                              attrs: { editor: _vm.editor },
                              model: {
                                value: _vm.form.editorData,
                                callback: function($$v) {
                                  _vm.$set(_vm.form, "editorData", $$v)
                                },
                                expression: "form.editorData"
                              }
                            })
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(4),
                          _vm._v(" "),
                          _c("input", {
                            staticClass: "form-control",
                            attrs: { type: "file" },
                            on: { change: _vm.onResumeChange }
                          })
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "form-group" }, [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-primary text-white",
                              attrs: { type: "submit" }
                            },
                            [_vm._v(_vm._s(_vm.status ? "Sending..." : "Send"))]
                          )
                        ])
                      ]
                    )
                  ])
                ])
              ])
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("main-footer")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "header",
      { staticClass: "masthead1 text-center text-white mt-5" },
      [
        _c(
          "div",
          { staticClass: "masthead-content", attrs: { id: "form-container" } },
          [
            _c("div", { staticClass: "container" }, [
              _c(
                "h1",
                {
                  staticClass: "masthead-heading mb-0 pb-4",
                  attrs: { id: "looking" }
                },
                [_vm._v("Messages")]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "bg-circle-1 bg-circle" }),
        _vm._v(" "),
        _c("div", { staticClass: "bg-circle-2 bg-circle" }),
        _vm._v(" "),
        _c("div", { staticClass: "bg-circle-3 bg-circle" }),
        _vm._v(" "),
        _c("div", { staticClass: "bg-circle-4 bg-circle" })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "" } }, [
      _vm._v("Recipient Email Address "),
      _c("span", { staticClass: "required" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "" } }, [
      _vm._v("Subject "),
      _c("span", { staticClass: "required" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "" } }, [
      _vm._v("Message "),
      _c("span", { staticClass: "required" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "" } }, [
      _vm._v("Upload Attachment "),
      _c("span", { staticClass: "text-muted" }, [_vm._v("(Optional)")])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-14b56a05", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/InboxSingle.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/InboxSingle.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("31e5c628", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./InboxSingle.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./InboxSingle.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/Employer/InboxSingle.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-14b56a05\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/InboxSingle.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/Employer/InboxSingle.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-14b56a05\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/Employer/InboxSingle.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-14b56a05"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/public/Employer/InboxSingle.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-14b56a05", Component.options)
  } else {
    hotAPI.reload("data-v-14b56a05", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});