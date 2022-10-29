webpackJsonp([7],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/ManagePositionList.vue":
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "ManagePositionList",

  data: function data() {
    return {
      applyJobActive: null,
      applyJobInactive: null,
      appliedJobs: null,

      loadingStatus: false
    };
  },
  created: function created() {
    this.getAppliedActiveJobs();
    this.getAppliedInactiveJobs();
    this.appliedJobByConsultant();
  },


  methods: {
    getAppliedActiveJobs: function getAppliedActiveJobs() {
      var _this = this;

      axios.get("/get-applied-active-jobs").then(function (response) {
        _this.applyJobActive = response.data.data;
      });
    },
    getAppliedInactiveJobs: function getAppliedInactiveJobs() {
      var _this2 = this;

      axios.get("/get-applied-inactive-jobs").then(function (response) {
        _this2.applyJobInactive = response.data.data;
      });
    },
    appliedJobByConsultant: function appliedJobByConsultant() {
      var _this3 = this;

      this.loadingStatus = true;
      axios.get("/get-accepted-consultant-jobs").then(function (response) {
        _this3.loadingStatus = false;
        if (response.data) {
          _this3.appliedJobs = response.data;
        }
      }).catch(function (error) {
        _this3.loadingStatus = false;
        console.log('not loading');
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/ManagePositionList.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.img-loading[data-v-d874c776] {\n  width: 100px!important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-d874c776\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/ManagePositionList.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "managePositionList" } },
    [
      _c("consultant-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "top-adjust section pb-5 mt-0 pt-0" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-9" }, [
              _c("div", { staticClass: "card mt-3" }, [
                _c("div", { staticClass: "card-body" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("div", { staticClass: "tab-content" }, [
                    _c(
                      "div",
                      {
                        staticClass: "tab-pane fade active show",
                        attrs: { id: "AppliedJob" }
                      },
                      [
                        _c(
                          "table",
                          { staticClass: "table table-bordered mt-2" },
                          [
                            _vm._m(3),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              [
                                _vm.loadingStatus
                                  ? _c("tr", [_vm._m(4)])
                                  : _vm._l(_vm.appliedJobs, function(
                                      appliedJob
                                    ) {
                                      return _c("tr", { key: appliedJob.id }, [
                                        _c("td", [
                                          _vm._v(
                                            "\n                        " +
                                              _vm._s(
                                                appliedJob.jobmanager.companies
                                                  .company_name
                                              ) +
                                              "\n                      "
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            _vm._s(
                                              appliedJob.jobmanager.job_role
                                            )
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            _vm._s(
                                              appliedJob.jobmanager.job_exp
                                            )
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            _vm._s(
                                              appliedJob.jobmanager.job_ctc
                                            )
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            _vm._s(
                                              appliedJob.percentage
                                                ? appliedJob.percentage + "%"
                                                : "N/A"
                                            )
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          _vm._v(
                                            _vm._s(
                                              appliedJob.jobmanager.companies
                                                .ratings.length > 0
                                                ? appliedJob.jobmanager
                                                    .companies.ratings[0]
                                                    .avg_rating /
                                                    5 +
                                                    "/" +
                                                    5
                                                : "N/A"
                                            )
                                          )
                                        ]),
                                        _vm._v(" "),
                                        _c("td", [
                                          appliedJob.assigned === "Yes"
                                            ? _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "badge badge-success"
                                                },
                                                [_vm._v("Assigned")]
                                              )
                                            : appliedJob.assigned === "No"
                                            ? _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "badge badge-warning"
                                                },
                                                [_vm._v("Not assigned")]
                                              )
                                            : _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "badge badge-danger"
                                                },
                                                [_vm._v("Rejected")]
                                              )
                                        ])
                                      ])
                                    })
                              ],
                              2
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "tab-pane show", attrs: { id: "Active" } },
                      [
                        _c(
                          "table",
                          { staticClass: "table table-bordered mt-2" },
                          [
                            _vm._m(5),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.applyJobActive, function(activeJob) {
                                return _c("tr", { key: activeJob.id }, [
                                  _c("td", [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          activeJob.jobmanager.companies
                                            .company_name
                                        ) +
                                        "\n                      "
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(activeJob.jobmanager.job_role)
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(_vm._s(activeJob.jobmanager.job_exp))
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(_vm._s(activeJob.jobmanager.job_ctc))
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        activeJob.percentage
                                          ? activeJob.percentage + "%"
                                          : "N/A"
                                      )
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        activeJob.jobmanager.companies.ratings
                                          .length > 0
                                          ? activeJob.jobmanager.companies
                                              .ratings[0].avg_rating /
                                              5 +
                                              "/" +
                                              5
                                          : "N/A"
                                      )
                                    )
                                  ])
                                ])
                              })
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "tab-pane fade",
                        attrs: { id: "InActive" }
                      },
                      [
                        _c(
                          "table",
                          { staticClass: "table table-bordered mt-2" },
                          [
                            _vm._m(6),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.applyJobInactive, function(
                                inactiveJob
                              ) {
                                return _c("tr", { key: inactiveJob.id }, [
                                  _c("td", [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          inactiveJob.jobmanager.companies
                                            .company_name
                                        ) +
                                        "\n                      "
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(inactiveJob.jobmanager.job_role)
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(inactiveJob.jobmanager.job_exp)
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(inactiveJob.jobmanager.job_ctc)
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        inactiveJob.jobmanager.companies.ratings
                                          .length > 0
                                          ? inactiveJob.jobmanager.companies
                                              .ratings[0].avg_rating /
                                              5 +
                                              "/" +
                                              5
                                          : "N/A"
                                      )
                                    )
                                  ])
                                ])
                              })
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
                    _vm._v("Manage Position")
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
            { staticClass: "myaccordion1", attrs: { id: "accordion" } },
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
                            "\n                        Clients\n                      "
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
                      "data-parent": "#accordion"
                    }
                  },
                  [_c("div", { staticClass: "card-body" })]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card border-0" }, [
                _c(
                  "div",
                  { staticClass: "card-header", attrs: { id: "headingTwo" } },
                  [
                    _c("h2", { staticClass: "mb-0" }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "d-flex align-items-center justify-content-between btn btn-link collapsed",
                          attrs: {
                            "data-toggle": "collapse",
                            "data-target": "#collapseTwo",
                            "aria-expanded": "false",
                            "aria-controls": "collapseTwo"
                          }
                        },
                        [
                          _vm._v(
                            "\n                        End Clients\n                      "
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
                      id: "collapseTwo",
                      "aria-labelledby": "headingTwo",
                      "data-parent": "#accordion"
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
                            "\n                        Positions\n                      "
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
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card border-0" }, [
                _c(
                  "div",
                  { staticClass: "card-header", attrs: { id: "headingFour" } },
                  [
                    _c("h2", { staticClass: "mb-0" }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "d-flex align-items-center justify-content-between btn btn-link collapsed",
                          attrs: {
                            "data-toggle": "collapse",
                            "data-target": "#collapseFour",
                            "aria-expanded": "false",
                            "aria-controls": "collapseFour"
                          }
                        },
                        [
                          _vm._v(
                            "\n                        Locations\n                      "
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
                      id: "collapseFour",
                      "aria-labelledby": "headingFour",
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
    return _c("ul", { staticClass: "nav positions-list-tabs" }, [
      _c("li", { staticClass: "nav-item" }, [
        _c(
          "a",
          {
            staticClass: "nav-link active fs-12",
            attrs: { "data-toggle": "tab", href: "#AppliedJob" }
          },
          [_vm._v("Applied Job")]
        )
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "nav-item" }, [
        _c(
          "a",
          {
            staticClass: "nav-link fs-12",
            attrs: { "data-toggle": "tab", href: "#Active" }
          },
          [_vm._v("Active")]
        )
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "nav-item" }, [
        _c(
          "a",
          {
            staticClass: "nav-link fs-12",
            attrs: { "data-toggle": "tab", href: "#InActive" }
          },
          [_vm._v("InActive")]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Client Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Position")]),
        _vm._v(" "),
        _c("th", [_vm._v("Location")]),
        _vm._v(" "),
        _c("th", [_vm._v("CTC")]),
        _vm._v(" "),
        _c("th", [_vm._v("Commission")]),
        _vm._v(" "),
        _c("th", [_vm._v("Avg. Rating")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", { staticClass: "text-center", attrs: { colspan: "7" } }, [
      _c("p", [_vm._v("Loading Please wait...")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Client Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Position")]),
        _vm._v(" "),
        _c("th", [_vm._v("Location")]),
        _vm._v(" "),
        _c("th", [_vm._v("CTC")]),
        _vm._v(" "),
        _c("th", [_vm._v("Commission")]),
        _vm._v(" "),
        _c("th", [_vm._v("Avg. Rating")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Client Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Position")]),
        _vm._v(" "),
        _c("th", [_vm._v("Location")]),
        _vm._v(" "),
        _c("th", [_vm._v("CTC")]),
        _vm._v(" "),
        _c("th", [_vm._v("Avg. Rating")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-d874c776", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/ManagePositionList.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/ManagePositionList.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("0606ab12", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./ManagePositionList.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./ManagePositionList.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/consultant/ManagePositionList.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d874c776\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/consultant/ManagePositionList.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/consultant/ManagePositionList.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-d874c776\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/consultant/ManagePositionList.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-d874c776"
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
Component.options.__file = "resources/js/components/public/consultant/ManagePositionList.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-d874c776", Component.options)
  } else {
    hotAPI.reload("data-v-d874c776", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});