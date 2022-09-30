webpackJsonp([8],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/front/Contactus.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Contactus",
  data: function data() {
    return {
      form: new Form({
        name: "",
        email: "",
        contact_no: "",
        remarks: ""
      }),
      formStatus: false
    };
  },

  metaInfo: {
    title: "Best recruitment agencies in Delhi | Placement agencies -Naukriyan",
    // Define meta tags here.
    meta: [{ name: "keywords", content: "Best recruitment agencies in Delhi" }, {
      name: "description",
      content: "TBest recruitment Placement agencies in Delhi- Apply for jobs IT and Non-IT jobs through the best Placement consultant agencies in Delhi. Call Us ☎ (+91) 117-962-6411"
    }]
  },
  mounted: function mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
  },

  computed: {
    allProfile: function allProfile() {
      return this.$store.getters.getAllProfile;
    }
  },
  methods: {
    ContactUS: function ContactUS() {
      var _this = this;

      this.formStatus = true;
      this.form.post("/add-contactus-detail").then(function () {
        _this.formStatus = false;
        _this.form = "";
        toast({
          type: "success",
          title: "Thanks for contacting us. Our support team contact within 24 hours"
        });
      }).catch(function (error) {
        _this.formStatus = false;
        toast({
          type: "warning",
          title: "Something went wrong."
        });
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Contactus.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.contact-form[data-v-23eafd9d] {\r\n  background-color: #fff;\r\n  border: 1px solid #eaeaea;\r\n  padding: 2rem;\r\n  -webkit-box-shadow: 1px 1px #ddd;\r\n  box-shadow: 1px 3px 20px #e4e4e4;\n}\n.form-control[data-v-23eafd9d] {\r\n  border-radius: 0;\n}\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-23eafd9d\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/front/Contactus.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "contactus" } },
    [
      _c("main-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "section" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-8 mb-3" }, [
              _c(
                "form",
                {
                  staticClass: "contact-form",
                  attrs: { method: "post", role: "form", action: "" },
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      _vm.ContactUS()
                    }
                  }
                },
                [
                  _c("h3", { staticClass: "text-center" }, [
                    _vm._v("Get in touch")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Your Name ")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.name,
                          expression: "form.name"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text", placeholder: "Enter your name" },
                      domProps: { value: _vm.form.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "name", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Email Address")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.email,
                          expression: "form.email"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "email", placeholder: "Enter your email" },
                      domProps: { value: _vm.form.email },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "email", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Phone No.")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.contact_no,
                          expression: "form.contact_no"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "number",
                        maxlength: "10",
                        placeholder: "Type your phone number"
                      },
                      domProps: { value: _vm.form.contact_no },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "contact_no", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", [_vm._v("Your Massage")]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.remarks,
                          expression: "form.remarks"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        rows: "3",
                        placeholder: "Enter your message here"
                      },
                      domProps: { value: _vm.form.remarks },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "remarks", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary btn-block mb-2",
                      attrs: { type: "submit", disabled: _vm.formStatus }
                    },
                    [
                      _vm._v(
                        "\n              " +
                          _vm._s(_vm.formStatus ? "Sending" : "Submit") +
                          "\n            "
                      )
                    ]
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _vm._m(2)
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
                  staticClass: "masthead-heading pb-4",
                  attrs: { id: "looking" }
                },
                [_vm._v("Contact Us")]
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
    return _c("div", { staticClass: "col-md-12" }, [
      _c("iframe", {
        staticClass: "border mb-2",
        attrs: {
          src:
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.1426525698803!2d77.21302071455732!3d28.535431645220967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce1f700000001%3A0x68dca73f09d47c81!2sPrakhar%20Software%20Solutions%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1580276051518!5m2!1sen!2sin",
          width: "100%",
          height: "170",
          allowfullscreen: ""
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-sm-4" }, [
      _c("div", { staticClass: "card mb-5" }, [
        _c("div", { staticClass: "card-header" }, [
          _c("h3", { staticClass: "card-title" }, [
            _c("span", [_vm._v("Contact Details")])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
          _c("div", { staticClass: "contact-details" }, [
            _c("div", { staticClass: "contact-body" }, [
              _c("div", { staticClass: "media" }, [
                _c("div", { staticClass: "media-icon" }, [
                  _c("i", {
                    staticClass: "fa fa-map-marker",
                    attrs: { "aria-hidden": "true" }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "media-body" }, [
                  _c("h5", [_vm._v("Corporate Office")]),
                  _vm._v(" "),
                  _c("address", [
                    _vm._v(
                      "\n                        C – 11, LGF, Opp. State Bank of India, Malviya Nagar,\n                        New Delhi - 110017, India\n                      "
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("div", { staticClass: "media" }, [
                _c("div", { staticClass: "media-icon" }, [
                  _c("i", {
                    staticClass: "fa fa-envelope",
                    attrs: { "aria-hidden": "true" }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "media-body" }, [
                  _c("h5", [_vm._v("Email ID")]),
                  _vm._v(" "),
                  _c("p", { staticClass: "fs-14" }, [
                    _c(
                      "a",
                      {
                        staticClass: "text-black",
                        attrs: { href: "mailto:info@naukriyan.com" }
                      },
                      [
                        _vm._v(
                          "\n                          info@naukriyan.com\n                        "
                        )
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("div", { staticClass: "media" }, [
                _c("div", { staticClass: "media-icon" }, [
                  _c("i", {
                    staticClass: "fa fa-phone-square",
                    attrs: { "aria-hidden": "true" }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "media-body" }, [
                  _c("h5", [_vm._v("Contact Number")]),
                  _vm._v(" "),
                  _c("p", { staticClass: "fs-14" }, [
                    _c(
                      "a",
                      {
                        staticClass: "text-black",
                        attrs: { href: "tel:+91-1179626411" }
                      },
                      [_vm._v("+91-1179626411")]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("div", { staticClass: "media" }, [
                _c("div", { staticClass: "media-icon" }, [
                  _c("i", {
                    staticClass: "fa fa-globe",
                    attrs: { "aria-hidden": "true" }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "media-body" }, [
                  _c("h5", [_vm._v("Website")]),
                  _vm._v(" "),
                  _c("p", { staticClass: "fs-14" }, [
                    _c(
                      "a",
                      {
                        staticClass: "text-black",
                        attrs: {
                          href: "http://naukriyan.com/",
                          target: "_blank"
                        }
                      },
                      [_vm._v("www.naukriyan.com")]
                    )
                  ])
                ])
              ])
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-23eafd9d", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Contactus.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Contactus.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("19ad3e60", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Contactus.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Contactus.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/front/Contactus.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-23eafd9d\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Contactus.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/front/Contactus.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-23eafd9d\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/front/Contactus.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-23eafd9d"
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
Component.options.__file = "resources/js/components/public/front/Contactus.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-23eafd9d", Component.options)
  } else {
    hotAPI.reload("data-v-23eafd9d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});