webpackJsonp([4],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/PackageConsultant.vue":
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


/* harmony default export */ __webpack_exports__["default"] = ({
    name: "PackageConsultant",
    data: function data() {
        return {
            packageDetails: null
        };
    },
    mounted: function mounted() {
        this.getPackagesUser();
    },

    methods: {
        getPackagesUser: function getPackagesUser() {
            var _this = this;

            axios.get("/consultant-packages").then(function (response) {
                if (response.data) {
                    console.log(response.data);
                    _this.packageDetails = response.data.data;
                }
            });
        }
    }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/Reports.vue":
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Reports",
  data: function data() {
    return {
      candidateLists: null,
      onChangeStatus: false
    };
  },
  mounted: function mounted() {
    this.getCandidateLists();
  },


  methods: {
    getCandidateLists: function getCandidateLists(tabValue) {
      var _this = this;

      this.onChangeStatus = true;
      axios.get("/get-candidate-report", { params: { status: tabValue } }).then(function (response) {
        _this.candidateLists = response.data;
        _this.onChangeStatus = false;
      }).catch(function (error) {
        console.log(error);
        _this.onChangeStatus = false;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Reports.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/PackageConsultant.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-42ecaf36\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/Reports.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "Reports" } },
    [
      _c("consultant-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "top-adjust section pb-5 mt-0 pt-0" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-sm-12" }, [
              _c("div", { staticClass: "card mt-3" }, [
                _c("div", { staticClass: "card-body" }, [
                  _c("ul", { staticClass: "nav positions-list-tabs" }, [
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link active fs-12",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists((_vm.tabValue = ""))
                            }
                          }
                        },
                        [_vm._v("All")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "cv uploaded")
                              )
                            }
                          }
                        },
                        [_vm._v("CV Uploaded")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "screening pending")
                              )
                            }
                          }
                        },
                        [_vm._v("Screened In pending")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "screening rejected")
                              )
                            }
                          }
                        },
                        [_vm._v("Screened In Rejected")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "shortlisted")
                              )
                            }
                          }
                        },
                        [_vm._v("Shortlisted")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "interview")
                              )
                            }
                          }
                        },
                        [_vm._v("Interviews")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists((_vm.tabValue = "offer"))
                            }
                          }
                        },
                        [_vm._v("Offers")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        {
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists((_vm.tabValue = "joined"))
                            }
                          }
                        },
                        [_vm._v("Joined")]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "tab-content" }, [
                    _c(
                      "div",
                      {
                        staticClass: "tab-pane show active",
                        attrs: { id: "tabData" }
                      },
                      [
                        _vm.onChangeStatus
                          ? _c("p", { staticClass: "mt-3 text-center" }, [
                              _c("strong", [_vm._v("Loading...")])
                            ])
                          : _c(
                              "div",
                              { staticClass: "table-responsive custom-height" },
                              [
                                _c(
                                  "table",
                                  {
                                    staticClass:
                                      "table table-head-fixed positions-list-table mt-2"
                                  },
                                  [
                                    _vm._m(1),
                                    _vm._v(" "),
                                    _c(
                                      "tbody",
                                      _vm._l(_vm.candidateLists, function(
                                        candidateList
                                      ) {
                                        return _c(
                                          "tr",
                                          { key: candidateList.id },
                                          [
                                            _c("td", [
                                              _vm._v(_vm._s(candidateList.name))
                                            ]),
                                            _vm._v(" "),
                                            _c("td", [
                                              _vm._v(
                                                "\n                            " +
                                                  _vm._s(
                                                    candidateList.jobmanager
                                                      .companies.company_name
                                                  ) +
                                                  "\n                          "
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("td", [
                                              _vm._v(
                                                _vm._s(
                                                  candidateList.jobmanager
                                                    .job_role
                                                )
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("td", [
                                              _vm._v(
                                                _vm._s(candidateList.status)
                                              )
                                            ])
                                          ]
                                        )
                                      }),
                                      0
                                    )
                                  ]
                                )
                              ]
                            )
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
      _c("consultant-footer")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "top-adjust pt-5 pb-5" }, [
      _c("div", { attrs: { id: "breadcrumb" } }, [
        _c("div", { staticClass: "breadcrumb-wrapper" }, [
          _c("div", { staticClass: "container" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-xs-12 col-sm-8" }, [
                _c("ol", { staticClass: "breadcrumb" }, [
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", { staticClass: "fa fa-home mr-1" }),
                      _vm._v("Home")
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "active" }, [
                    _vm._v("Consultant Report")
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-xs-12 col-sm-4 hidden-xs" }, [
                _c("p", { staticClass: "hot-line" }, [
                  _c("i", {
                    staticClass: "fa fa-headphones mr-1 Phone is-animating",
                    attrs: { "aria-hidden": "true" }
                  }),
                  _vm._v(" "),
                  _c("a", { attrs: { href: "tel:919711999999" } }, [
                    _vm._v("Hot Line: +91 9711 99 99 99")
                  ])
                ])
              ])
            ])
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Candidate Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Client Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Position")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-42ecaf36", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-57296918\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/PackageConsultant.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "package" } },
    [
      _c("consultant-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "top-adjust section pb-5 mt-0 pt-0" }, [
        _c("div", { staticClass: "container" }, [
          _vm._m(1),
          _vm._v(" "),
          _c("div", { staticClass: "clear", attrs: { id: "pricing-table" } }, [
            _c(
              "div",
              { staticClass: "row" },
              _vm._l(_vm.packageDetails, function(packjs) {
                return _c("div", { key: packjs.id, staticClass: "col-sm-3" }, [
                  _c(
                    "div",
                    { staticClass: "plan" },
                    [
                      _c("h3", [
                        _vm._v(_vm._s(packjs.package_name)),
                        _c("span", [_vm._v("₹" + _vm._s(packjs.package_price))])
                      ]),
                      _vm._v(" "),
                      _c("router-link", { attrs: { to: "" } }, [
                        _c(
                          "a",
                          { staticClass: "signup", attrs: { href: "" } },
                          [_vm._v("Purchase")]
                        )
                      ]),
                      _vm._v(" "),
                      _c("ul", [
                        _c("li", [
                          _c("b", [_vm._v(_vm._s(packjs.package_total_jobs))]),
                          _vm._v(" Total Jobs")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [_vm._v(_vm._s(packjs.basic_job))]),
                          _vm._v(" Basic Jobs")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [_vm._v(_vm._s(packjs.hot_job))]),
                          _vm._v(" Hot Jobs")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [_vm._v(_vm._s(packjs.premium_job))]),
                          _vm._v(" Premium Jobs")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [_vm._v(_vm._s(packjs.validity) + " ")]),
                          _vm._v(" Validity(in days)")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [
                            _vm._v(_vm._s(packjs.package_total_resume_views))
                          ]),
                          _vm._v(" Resume View")
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c("b", [
                            _vm._v(
                              _vm._s(packjs.package_total_resume_downloads) +
                                " "
                            )
                          ]),
                          _vm._v(" Resume Download")
                        ])
                      ])
                    ],
                    1
                  )
                ])
              }),
              0
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c("consultant-footer")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "top-adjust pt-5 pb-5" }, [
      _c("div", { attrs: { id: "breadcrumb" } }, [
        _c("div", { staticClass: "breadcrumb-wrapper" }, [
          _c("div", { staticClass: "container" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-xs-12 col-sm-8" }, [
                _c("ol", { staticClass: "breadcrumb" }, [
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", { staticClass: "fa fa-home mr-1" }),
                      _vm._v("Home")
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "active" }, [_vm._v("Pricing")])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-xs-12 col-sm-4 hidden-xs" }, [
                _c("p", { staticClass: "hot-line" }, [
                  _c("i", {
                    staticClass: "fa fa-headphones mr-1 Phone is-animating",
                    attrs: { "aria-hidden": "true" }
                  }),
                  _vm._v(" "),
                  _c("a", { attrs: { href: "tel:919711999999" } }, [
                    _vm._v(
                      "Hot Line: +91 9711 99 99\n                                    99"
                    )
                  ])
                ])
              ])
            ])
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-sm-12" }, [
        _c("div", { staticClass: "cms-pg-header" }, [
          _c("h2", { staticClass: "hk-pg-title" }, [_vm._v("Pricing")])
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
    require("vue-hot-reload-api")      .rerender("data-v-57296918", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Reports.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Reports.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("6467ccac", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Reports.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Reports.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/PackageConsultant.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/PackageConsultant.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("2601033e", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./PackageConsultant.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./PackageConsultant.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/consultant/PackageConsultant.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-57296918\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/PackageConsultant.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/PackageConsultant.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-57296918\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/PackageConsultant.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-57296918"
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
Component.options.__file = "resources/js/components/public/consultant/PackageConsultant.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-57296918", Component.options)
  } else {
    hotAPI.reload("data-v-57296918", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/components/public/consultant/Reports.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-42ecaf36\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Reports.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/Reports.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-42ecaf36\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/Reports.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-42ecaf36"
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
Component.options.__file = "resources/js/components/public/consultant/Reports.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-42ecaf36", Component.options)
  } else {
    hotAPI.reload("data-v-42ecaf36", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});