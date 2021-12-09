(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_SignInSignUpLiMobile_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    //флажок переключатель состояния гость/авторизирован
    switchDisable: {
      required: true
    },
    //url в меню для конкретного пользователя
    routeUser: {
      type: String,
      required: true
    },
    //описание для url в меню конкретного пользователя
    routeUserName: {
      type: String,
      required: true
    },
    //вх. парам. имя пользователя
    getUserName: {
      type: String,
      required: false
    },
    //старое имя пользователя из сессии
    oldName: {
      type: String,
      required: false
    }
  },
  data: function data() {
    return {};
  },
  computed: {
    //Имя пользователя
    userName: function userName() {
      if (this.oldName != '') {
        return this.oldName;
      } else if (this.getUserName != '') {
        return this.getUserName;
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/components/SignInSignUpLiMobile.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/SignInSignUpLiMobile.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8& */ "./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8&");
/* harmony import */ var _SignInSignUpLiMobile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SignInSignUpLiMobile.vue?vue&type=script&lang=js& */ "./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _SignInSignUpLiMobile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__.render,
  _SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/SignInSignUpLiMobile.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SignInSignUpLiMobile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SignInSignUpLiMobile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SignInSignUpLiMobile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SignInSignUpLiMobile_vue_vue_type_template_id_291c0ab8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/SignInSignUpLiMobile.vue?vue&type=template&id=291c0ab8& ***!
  \********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("ul", [
    _vm.switchDisable
      ? _c("ul", [
          _c("li", [
            _c(
              "a",
              {
                staticClass: "nav-link",
                attrs: { href: "javascript:void(0);" }
              },
              [
                _c("i", { staticClass: "icon icon-user mr-3" }),
                _vm._v(" "),
                _c("span", [_vm._v(_vm._s(_vm.userName))])
              ]
            )
          ]),
          _vm._v(" "),
          _c("li", [
            _c(
              "a",
              { staticClass: "nav-link", attrs: { href: _vm.routeUser } },
              [
                _c("i", { staticClass: "icon icon-card mr-3" }),
                _vm._v(" "),
                _c("span", [_vm._v(_vm._s(_vm.routeUserName))])
              ]
            )
          ])
        ])
      : _c("li", [_vm._m(0)])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      { staticClass: "nav-link", attrs: { href: "javascript:void(0);" } },
      [
        _c("i", { staticClass: "icon icon-user mr-3" }),
        _vm._v(" "),
        _c(
          "span",
          { attrs: { "data-toggle": "modal", "data-target": "#loginModal" } },
          [_vm._v("Вхід / Реєстрація")]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ })

}]);