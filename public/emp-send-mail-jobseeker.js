webpackJsonp([12],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/Employer/SendMail.vue":
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
  name: "SendMail",
  data: function data() {
    //let now = new Date()
    return {
      moment: moment,
      message_box: false,
      editor: __WEBPACK_IMPORTED_MODULE_0__ckeditor_ckeditor5_build_classic___default.a,
      status: false,
      countUnreadMessage: 0,
      sendMailLists: [],

      form: new Form({
        email_id: "",
        subject: "",
        editorData: "",
        attachment: ""
      })
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$store.dispatch("getAllProfile", "/userprofile");
    axios.get("get-unread-message").then(function (response) {
      _this.countUnreadMessage = response.data;
    });

    axios.get("get-send-mail-lists").then(function (response) {
      _this.sendMailLists = response.data.data;
    }).catch(function (error) {
      console.log(error);
    });
  },

  computed: {
    getSendMailData: function getSendMailData() {
      axios.get("get-message-for-jobseeker").then(function (response) {
        console.log(response);
      }).then(function (error) {
        console.log(error);
      });
    },
    allProfile: function allProfile() {
      return this.$store.getters.getAllProfile;
    }
  },
  methods: {
    composeMail: function composeMail() {
      $(".mail-box-section").hide();
      $(".inbox-head h3").text("Compose Mail");
      $(".mail-body").show();
    },
    sendMessage: function sendMessage() {
      var _this2 = this;

      this.status = true;
      axios.post("/send-message-to-jobseeker", this.form).then(function (response) {
        if (response.status === 200) {
          toast({
            type: "success",
            title: "Message send successfully"
          });
          _this2.status = false;
          var self = _this2;
          // Reset form data after success
          Object.keys(_this2.form).forEach(function (key, index) {
            self.form[key] = "";
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
          type: "error",
          title: "Oops...",
          text: "Your file size is too large."
        });
      } else {
        var reader = new FileReader();
        reader.onload = function (event) {
          _this3.form.attachment = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    }
  },
  filters: {
    checkCurrentDateTime: function checkCurrentDateTime(date) {
      if (!date) return "";
      var currentDate = moment().format("YYYY-MM-DD");
      var createdDate = moment(date).format("YYYY-MM-DD");
      if (currentDate === createdDate) {
        return moment(date).format("LT"); // 03:55 PM
      } else {
        return moment(date).format("MMM DD"); // JUN 29
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/SendMail.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.label-danger[data-v-784ec0d8] {\r\n  font-weight: bold;\n}\n.mail-body[data-v-784ec0d8] {\r\n  display: none;\n}\n.required[data-v-784ec0d8] {\r\n  color: red !important;\n}\n.mail-box[data-v-784ec0d8] {\r\n  border-collapse: collapse;\r\n  border-spacing: 0;\r\n  display: table;\r\n  table-layout: fixed;\r\n  width: 100%;\n}\n.mail-box aside[data-v-784ec0d8] {\r\n  display: table-cell;\r\n  float: none;\r\n  height: 100%;\r\n  padding: 0;\r\n  vertical-align: top;\n}\n.mail-box .sm-side[data-v-784ec0d8] {\r\n  background: none repeat scroll 0 0 #e5e8ef;\r\n  border-radius: 4px 0 0 4px;\r\n  width: 25%;\n}\n.mail-box .lg-side[data-v-784ec0d8] {\r\n  background: none repeat scroll 0 0 #fff;\r\n  border-radius: 0 4px 4px 0;\r\n  width: 75%;\n}\n.mail-box .sm-side .user-head[data-v-784ec0d8] {\r\n  background: none repeat scroll 0 0 #00a8b3;\r\n  border-radius: 4px 0 0;\r\n  color: #fff;\r\n  min-height: 80px;\r\n  padding: 10px;\n}\n.user-head .inbox-avatar[data-v-784ec0d8] {\r\n  float: left;\r\n  width: 65px;\n}\n.user-head .inbox-avatar img[data-v-784ec0d8] {\r\n  border-radius: 4px;\n}\n.user-head .user-name[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  margin: 0 0 0 10px;\n}\n.user-head .user-name h5[data-v-784ec0d8] {\r\n  font-size: 14px;\r\n  font-weight: 300;\r\n  margin-bottom: 0;\r\n  margin-top: 15px;\n}\n.user-head .user-name h5 a[data-v-784ec0d8] {\r\n  color: #fff;\n}\n.user-head .user-name span a[data-v-784ec0d8] {\r\n  color: #87e2e7;\r\n  font-size: 12px;\n}\n.inbox-body[data-v-784ec0d8] {\r\n  padding: 20px;\n}\nul.inbox-nav[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  margin: 0;\r\n  padding: 0;\r\n  width: 100%;\n}\n.inbox-divider[data-v-784ec0d8] {\r\n  border-bottom: 1px solid #d5d8df;\n}\nul.inbox-nav li[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  line-height: 45px;\r\n  width: 100%;\n}\nul.inbox-nav li a[data-v-784ec0d8] {\r\n  color: #6a6a6a;\r\n  display: inline-block;\r\n  line-height: 45px;\r\n  padding: 0 20px;\r\n  width: 100%;\n}\nul.inbox-nav li a[data-v-784ec0d8]:hover,\r\nul.inbox-nav li.active a[data-v-784ec0d8],\r\nul.inbox-nav li a[data-v-784ec0d8]:focus {\r\n  background: none repeat scroll 0 0 #d5d7de;\r\n  color: #6a6a6a;\n}\nul.inbox-nav li a i[data-v-784ec0d8] {\r\n  color: #6a6a6a;\r\n  font-size: 16px;\r\n  padding-right: 10px;\n}\nul.labels-info li h4[data-v-784ec0d8] {\r\n  color: #5c5c5e;\r\n  font-size: 13px;\r\n  padding-left: 15px;\r\n  padding-right: 15px;\r\n  padding-top: 5px;\r\n  text-transform: uppercase;\n}\nul.labels-info li[data-v-784ec0d8] {\r\n  margin: 0;\n}\nul.labels-info li a[data-v-784ec0d8] {\r\n  border-radius: 0;\r\n  color: #6a6a6a;\n}\nul.labels-info li a[data-v-784ec0d8]:hover,\r\nul.labels-info li a[data-v-784ec0d8]:focus {\r\n  background: none repeat scroll 0 0 #d5d7de;\r\n  color: #6a6a6a;\n}\nul.labels-info li a i[data-v-784ec0d8] {\r\n  padding-right: 10px;\n}\n.nav.nav-pills.nav-stacked.labels-info p[data-v-784ec0d8] {\r\n  color: #9d9f9e;\r\n  font-size: 11px;\r\n  margin-bottom: 0;\r\n  padding: 0 22px;\n}\n.inbox-head[data-v-784ec0d8] {\r\n  background: none repeat scroll 0 0 #41cac0;\r\n  border-radius: 0 4px 0 0;\r\n  color: #fff;\r\n  min-height: 80px;\r\n  padding: 20px;\n}\n.inbox-head h3[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  font-weight: 300;\r\n  margin: 0;\r\n  padding-top: 6px;\n}\n.table-inbox[data-v-784ec0d8] {\r\n  border: 1px solid #d3d3d3;\r\n  margin-bottom: 0;\n}\n.table-inbox tr td[data-v-784ec0d8] {\r\n  padding: 12px !important;\n}\n.table-inbox tr td[data-v-784ec0d8]:hover {\r\n  cursor: pointer;\n}\n.table-inbox tr.unread td[data-v-784ec0d8] {\r\n  background: none repeat scroll 0 0 #f7f7f7;\r\n  font-weight: 600;\n}\nul.inbox-pagination li[data-v-784ec0d8] {\r\n  float: left;\n}\n.mail-option .chk-all input[type=\"checkbox\"][data-v-784ec0d8] {\r\n  margin-top: 0;\n}\n.inbox-pagination li span[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  margin-right: 5px;\r\n  margin-top: 7px;\n}\n.inbox-body .modal .modal-body input[data-v-784ec0d8],\r\n.inbox-body .modal .modal-body textarea[data-v-784ec0d8] {\r\n  border: 1px solid #e6e6e6;\r\n  -webkit-box-shadow: none;\r\n          box-shadow: none;\n}\n.modal-body label[data-v-784ec0d8] {\r\n  font-family: \"Open Sans\", sans-serif;\r\n  font-weight: 400;\n}\n.heading-inbox h4[data-v-784ec0d8] {\r\n  border-bottom: 1px solid #ddd;\r\n  color: #444;\r\n  font-size: 18px;\r\n  margin-top: 20px;\r\n  padding-bottom: 10px;\n}\n.sender-info img[data-v-784ec0d8] {\r\n  height: 30px;\r\n  width: 30px;\n}\n.view-mail a[data-v-784ec0d8] {\r\n  color: #ff6c60;\n}\n.attachment-mail ul[data-v-784ec0d8] {\r\n  display: inline-block;\r\n  margin-bottom: 30px;\r\n  width: 100%;\n}\n.attachment-mail ul li[data-v-784ec0d8] {\r\n  float: left;\r\n  margin-bottom: 10px;\r\n  margin-right: 10px;\r\n  width: 150px;\n}\n.attachment-mail ul li img[data-v-784ec0d8] {\r\n  width: 100%;\n}\n.attachment-mail ul li span[data-v-784ec0d8] {\r\n  float: right;\n}\n.fileinput-button input[data-v-784ec0d8] {\r\n  cursor: pointer;\r\n  direction: ltr;\r\n  font-size: 23px;\r\n  margin: 0;\r\n  opacity: 0;\r\n  position: absolute;\r\n  right: 0;\r\n  top: 0;\r\n  -webkit-transform: translate(-300px, 0px) scale(4);\r\n          transform: translate(-300px, 0px) scale(4);\n}\n@media (max-width: 767px) {\n.files .btn span[data-v-784ec0d8] {\r\n    display: none;\n}\n.files .preview *[data-v-784ec0d8] {\r\n    width: 40px;\n}\n.files .name *[data-v-784ec0d8] {\r\n    display: inline-block;\r\n    width: 80px;\r\n    word-wrap: break-word;\n}\n}\nul[data-v-784ec0d8] {\r\n  list-style-type: none;\r\n  padding: 0;\r\n  margin: 0;\n}\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-784ec0d8\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/Employer/SendMail.vue":
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
      _c("section", { staticClass: "my-send-mail mt-3" }, [
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
                              width: "60",
                              height: "60",
                              src:
                                "/emp_profile_image/" +
                                _vm.allProfile.profile_pic_thumb
                            }
                          })
                        : _c("img", {
                            attrs: {
                              src: "default_images/no_image_available.png",
                              width: "60",
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
                            return _vm.composeMail()
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
                      [
                        _c("router-link", { attrs: { to: "/emp-inbox" } }, [
                          _c("i", { staticClass: "fa fa-inbox" }),
                          _vm._v(" Inbox\n                    "),
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
                          _vm._v(" Send Mail\n                  ")
                        ])
                      ],
                      1
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("aside", { staticClass: "lg-side" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c("div", { staticClass: "inbox-body mail-box-section" }, [
                    _c(
                      "table",
                      {
                        staticClass:
                          "table table-inbox table-bordered table-hover"
                      },
                      [
                        _c(
                          "tbody",
                          [
                            _vm._m(2),
                            _vm._v(" "),
                            _vm._l(_vm.sendMailLists, function(sendMailList) {
                              return _c("tr", { key: sendMailList.id }, [
                                _vm._m(3, true),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  { staticClass: "view-message dont-show" },
                                  [
                                    _c(
                                      "router-link",
                                      {
                                        attrs: {
                                          to:
                                            "/emp-inbox-single/" +
                                            sendMailList.id
                                        }
                                      },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            sendMailList.company_name
                                              ? sendMailList.company_name
                                              : "Invalid Company"
                                          )
                                        )
                                      ]
                                    )
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  { staticClass: "view-message" },
                                  [
                                    _c(
                                      "router-link",
                                      {
                                        attrs: {
                                          to:
                                            "/emp-inbox-single/" +
                                            sendMailList.id
                                        }
                                      },
                                      [_vm._v(_vm._s(sendMailList.subject))]
                                    )
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                sendMailList.attachment
                                  ? _c(
                                      "td",
                                      {
                                        staticClass:
                                          "view-message inbox-small-cells",
                                        attrs: { width: "5%" }
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "fa fa-paperclip"
                                        })
                                      ]
                                    )
                                  : _c(
                                      "td",
                                      {
                                        staticClass:
                                          "view-message inbox-small-cells",
                                        attrs: { width: "5%" }
                                      },
                                      [
                                        _vm._v(
                                          "\n                        No Attachment\n                      "
                                        )
                                      ]
                                    ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass: "view-message text-right",
                                    attrs: { width: "14%" }
                                  },
                                  [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          _vm._f("checkCurrentDateTime")(
                                            sendMailList.created_at
                                          )
                                        ) +
                                        "\n                      "
                                    )
                                  ]
                                )
                              ])
                            })
                          ],
                          2
                        )
                      ]
                    )
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
                            return _vm.sendMessage()
                          }
                        }
                      },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(4),
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
                          _vm._m(5),
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
                            _vm._m(6),
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
                          _vm._m(7),
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
                            [
                              _vm._v(
                                "\n                      " +
                                  _vm._s(_vm.status ? "Sending..." : "Send") +
                                  "\n                    "
                              )
                            ]
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
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("header", { staticClass: "masthead1 text-center text-white" }, [
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
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "inbox-head" }, [
      _c("h3", [_vm._v("Send Mail List")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("tr", { staticClass: "dark" }, [
      _c("td", [_vm._v("#")]),
      _vm._v(" "),
      _c("td", [_vm._v("Company Name")]),
      _vm._v(" "),
      _c("td", [_vm._v("Subject")]),
      _vm._v(" "),
      _c("td", [_vm._v("Attachment")]),
      _vm._v(" "),
      _c("td", [_vm._v("Time")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", { staticClass: "inbox-small-cells" }, [
      _c("input", { staticClass: "mail-checkbox", attrs: { type: "checkbox" } })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "" } }, [
      _vm._v("Recipient Email Address\n                      "),
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
      _vm._v("Upload Attachment\n                      "),
      _c("span", { staticClass: "text-muted" }, [_vm._v("(Optional)")])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-784ec0d8", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/SendMail.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/SendMail.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("2b8d19a3", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./SendMail.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./SendMail.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/Employer/SendMail.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-784ec0d8\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/Employer/SendMail.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/Employer/SendMail.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-784ec0d8\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/Employer/SendMail.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-784ec0d8"
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
Component.options.__file = "resources/js/components/public/Employer/SendMail.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-784ec0d8", Component.options)
  } else {
    hotAPI.reload("data-v-784ec0d8", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});