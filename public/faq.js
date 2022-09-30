webpackJsonp([7],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/front/Faq.vue":
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

/* harmony default export */ __webpack_exports__["default"] = ({
    name: "Faq",
    data: function data() {
        return {
            guideline: ''

        };
    },

    metaInfo: {
        title: 'Best Placement agencies in Delhi | Job portals -Naukriyan',
        // Define meta tags here.
        meta: [{ name: 'keywords', content: 'Placement agencies in Delhi, Best job portals in India' }, { name: 'description', content: 'Thanks To modern technology and online job portals, searching for a job is as easy as one click of your mouse. Here is the list of the best job website used in India' }]
    },
    mounted: function mounted() {
        this.getFaqsData();
        this.$store.dispatch('getAllProfile', '/userprofile');
    },

    computed: {
        allProfile: function allProfile() {
            return this.$store.getters.getAllProfile;
        }
    },
    methods: {
        getFaqsData: function getFaqsData() {
            var _this = this;

            axios.get("/faq/data").then(function (response) {
                _this.guideline = response.data.data;
            });
        }
    }

});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Faq.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-21be9996\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/front/Faq.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { attrs: { id: "faq" } },
    [
      _vm.allProfile != null && _vm.allProfile.user_type === "Jobseeker"
        ? _c("jobseeker-header")
        : _vm._e(),
      _vm._v(" "),
      _vm.allProfile != null && _vm.allProfile.user_type === "Employer"
        ? _c("Emp-header")
        : _vm._e(),
      _vm._v(" "),
      _c("main-header"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("section", { staticClass: "section mb-5" }, [
        _c("div", { staticClass: "container" }, [
          _c(
            "div",
            { staticClass: "row" },
            _vm._l(_vm.guideline, function(faq) {
              return _c("div", { key: faq.id, staticClass: "col-12 mx-auto" }, [
                _c(
                  "div",
                  { staticClass: "accordion", attrs: { id: "faqExample" } },
                  [
                    _c("div", { staticClass: "card mb-2" }, [
                      _c(
                        "div",
                        {
                          staticClass: "card-header pt-1 pb-1",
                          attrs: { id: "headingOne" }
                        },
                        [
                          _c("h5", { staticClass: "mb-0" }, [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-link",
                                attrs: {
                                  type: "button",
                                  "data-toggle": "collapse",
                                  "data-target": "#collapseOne",
                                  "aria-expanded": "true",
                                  "aria-controls": "collapseOne"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                       " +
                                    _vm._s("Q -" + faq.question) +
                                    "\n                                    "
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
                          staticClass: "collapse show",
                          attrs: {
                            id: "collapseOne",
                            "aria-labelledby": "headingOne",
                            "data-parent": "#faqExample"
                          }
                        },
                        [
                          _c("div", { staticClass: "card-body" }, [
                            _c("b", [_vm._v("Answer:")]),
                            _vm._v(" "),
                            _c("p", {
                              domProps: { innerHTML: _vm._s(faq.answer) }
                            })
                          ])
                        ]
                      )
                    ])
                  ]
                )
              ])
            })
          )
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
                [_vm._v("FAQs")]
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
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-21be9996", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Faq.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Faq.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("56f8ccae", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Faq.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Faq.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/js/components/public/front/Faq.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-21be9996\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/js/components/public/front/Faq.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/public/front/Faq.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-21be9996\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/public/front/Faq.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-21be9996"
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
Component.options.__file = "resources/js/components/public/front/Faq.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-21be9996", Component.options)
  } else {
    hotAPI.reload("data-v-21be9996", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});