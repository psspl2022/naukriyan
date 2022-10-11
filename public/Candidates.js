webpackJsonp([7],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/Candidate.vue":
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "Candidates",

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
      axios.get("/get-candidate-lists", { params: { status: tabValue } }).then(function (response) {
        _this.candidateLists = response.data;
        _this.onChangeStatus = false;
      }).catch(function (error) {
        console.log(error);
        _this.onChangeStatus = false;
      });
    },
    updateCandidateStatus: function updateCandidateStatus(event, candidate_id) {
      var _this2 = this;

      var status_id = event.target.value;
      axios.get("/update-consultant-candidate", {
        params: { status: status_id, can_id: candidate_id }
      }).then(function (response) {
        if (response.data.status === true) {
          toast({
            type: "success",
            title: response.data.message
          });
          _this2.getCandidateLists();
        } else {
          toast({
            type: "warning",
            title: response.data.message
          });
        }
      }).catch(function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Candidate.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.color-white[data-v-fa5d558c] {\r\n  color: white !important;\n}\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-fa5d558c\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/Candidate.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "candidates" } },
    [
      _c("consultant-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "top-adjust section pb-5 mt-0 pt-0" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-md-3" },
              [
                _c(
                  "router-link",
                  {
                    staticClass:
                      "rounded-0 btn-block color-white btn btn-primary btn-icon",
                    attrs: { to: "/candidate-register" }
                  },
                  [_vm._v("\n            Register Candidate\n          ")]
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-9" }, [
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
                          staticClass: "nav-link fs-12 border-right-0",
                          attrs: { "data-toggle": "tab", href: "#tabData" },
                          on: {
                            click: function($event) {
                              _vm.getCandidateLists(
                                (_vm.tabValue = "new candidate")
                              )
                            }
                          }
                        },
                        [_vm._v("New Candidate")]
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
                              _vm.getCandidateLists((_vm.tabValue = "rejected"))
                            }
                          }
                        },
                        [_vm._v("Rejected")]
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
                        [_vm._v("Interview Schedule")]
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
                        [_vm._v("Offer")]
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
                                    _vm._m(2),
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
                                            ]),
                                            _vm._v(" "),
                                            _c("td", { staticClass: "media" }, [
                                              candidateList.gender === "male"
                                                ? _c("img", {
                                                    staticClass:
                                                      "avatar-lg rounded-circle img-thumbnail",
                                                    attrs: {
                                                      src:
                                                        "https://img2.pngio.com/men-profile-icon-png-image-free-download-searchpngcom-male-profile-png-715_657.png",
                                                      alt: "Image description"
                                                    }
                                                  })
                                                : _c("img", {
                                                    staticClass:
                                                      "avatar-lg rounded-circle img-thumbnail",
                                                    attrs: {
                                                      src:
                                                        "https://www.nicepng.com/png/full/52-521023_download-free-icon-female-vectors-blank-facebook-profile.png",
                                                      alt: "Image description"
                                                    }
                                                  })
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
                  _c("li", { staticClass: "active" }, [_vm._v("Candidates")])
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
    return _c("div", { staticClass: "col-sm-3" }, [
      _c("div", { staticClass: "card mt-3 card-dashboard" }, [
        _c("div", { staticClass: "card-body" }, [
          _c("div", { staticClass: "position-search-bar" }, [
            _c("div", { staticClass: "inner" }, [
              _c("form", { attrs: { action: "", method: "GET" } }, [
                _c("div", { staticClass: "gap-10" }, [
                  _c("div", {}, [
                    _c(
                      "div",
                      { staticClass: "form-group form-icon-right mb-10" },
                      [
                        _c("div", { staticClass: "text-center" }, [
                          _c(
                            "button",
                            {
                              staticClass:
                                "rounded-0 btn btn-block btn-primary btn-icon w-100",
                              attrs: { type: "submit" }
                            },
                            [
                              _vm._v(
                                "\n                              Manage JD (S)\n                            "
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          staticClass:
                            "form-control mb-0 ui-autocomplete-input",
                          attrs: {
                            name: "q",
                            type: "text",
                            id: "txtgoingto",
                            placeholder: "Search Positions",
                            autocomplete: "off"
                          }
                        })
                      ]
                    )
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "myaccordion1", attrs: { id: "accordion1" } },
            [
              _c("div", { staticClass: "card border-0" }, [
                _c(
                  "div",
                  { staticClass: "card-header", attrs: { id: "headingOne" } },
                  [
                    _c("h2", { staticClass: "mb-0" }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "d-flex align-items-center justify-content-between btn btn-link accordion-toggle",
                          attrs: {
                            "data-toggle": "collapse",
                            "data-target": "#collapseOne",
                            "aria-expanded": "false",
                            "aria-controls": "collapseOne"
                          }
                        },
                        [
                          _vm._v(
                            "\n                        Active\n                      "
                          )
                        ]
                      )
                    ])
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "collapse",
                    attrs: {
                      id: "collapseOne",
                      "aria-labelledby": "headingOne",
                      "data-parent": "#accordion1"
                    }
                  },
                  [_c("div", { staticClass: "card-body" })]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card border-0" }, [
                _c(
                  "div",
                  { staticClass: "card-header", attrs: { id: "headingThree" } },
                  [
                    _c("h2", { staticClass: "mb-0" }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "d-flex align-items-center justify-content-between btn btn-link collapsed",
                          attrs: {
                            "data-toggle": "collapse",
                            "data-target": "#collapseThree",
                            "aria-expanded": "false",
                            "aria-controls": "collapseThree"
                          }
                        },
                        [
                          _vm._v(
                            "\n                        InActive\n                      "
                          )
                        ]
                      )
                    ])
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "collapse",
                    attrs: {
                      id: "collapseThree",
                      "aria-labelledby": "headingThree",
                      "data-parent": "#accordion"
                    }
                  },
                  [_c("div", { staticClass: "card-body" })]
                )
              ])
            ]
          )
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
        _c("th", [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", [_vm._v("Gender")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-fa5d558c", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Candidate.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Candidate.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("cafbdc3a", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Candidate.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Candidate.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/consultant/Candidate.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-fa5d558c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/Candidate.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/Candidate.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-fa5d558c\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/Candidate.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-fa5d558c"
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
Component.options.__file = "resources/js/components/public/consultant/Candidate.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-fa5d558c", Component.options)
  } else {
    hotAPI.reload("data-v-fa5d558c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});