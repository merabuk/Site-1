(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_CartModuleHome_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    cartRoute: {
      type: String,
      required: false,
      "default": '/cart'
    },
    onCartPage: {
      type: Boolean,
      required: true,
      "default": false
    }
  },
  data: function data() {
    return {
      cartRouteData: this.cartRoute,
      errors: []
    };
  },
  mounted: function mounted() {
    this.loadStore();
  },
  computed: {
    cart: function cart() {
      var cart_view = [];
      var cart_store = this.$store.state.cart;
      $.each(cart_store, function (index, cart_item) {
        $.each(cart_item['attributes'], function (index, item) {
          var arr_item = {
            'attributes': item,
            'product': cart_item['product']
          };
          cart_view.push(arr_item);
        });
      });
      return cart_view;
    }
  },
  methods: {
    showModal: function showModal(index) {
      $(".block-mini-cart .mini-cart").hide();
      $('#removeModuleHomeCart' + index).modal('show');
    },
    removeCart: function removeCart(item, index) {
      var _this = this;

      axios.post(window.origin + '/cart/remove', {
        product: item['product'],
        attributes: item['attributes']
      }).then(function (response) {
        if (response.data.result) {
          _this.loadStore();

          $('#removeModuleHomeCart' + index).modal('hide');
        }

        ;
      })["catch"](function (e) {
        console.log('CartModuleHome:removeCart');
        console.log(e);
      });
    },
    loadStore: function loadStore() {
      var _this2 = this;

      axios.post(window.origin + '/cart/update', {}).then(function (response) {
        var data = response.data;

        _this2.clearStore();

        $.each(data, function (index, value) {
          _this2.$store.commit('add', value);
        });

        _this2.totalStore();
      })["catch"](function (e) {
        console.log('CartModuleHome:loadStore');
        console.log(e);
      });
    },
    clearStore: function clearStore() {
      this.$store.commit('clear');
    },
    totalStore: function totalStore() {
      var _this3 = this;

      axios.post(window.origin + '/cart/total', {}).then(function (response) {
        var data = response.data;

        _this3.$store.commit('total', {
          count: data.count,
          cost: data.cost
        });
      })["catch"](function (e) {
        console.log('CartModuleHome:totalStore');
        console.log(e);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.cart-delete-item {\n    cursor: pointer;\n}\n.modal-backdrop {\n    position: relative;\n}\n.cart-list {\n    max-height: 455px;\n    overflow-y: auto;\n    padding-right: 16px;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartModuleHome.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./resources/js/components/CartModuleHome.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/CartModuleHome.vue ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CartModuleHome.vue?vue&type=template&id=79d7f354& */ "./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354&");
/* harmony import */ var _CartModuleHome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CartModuleHome.vue?vue&type=script&lang=js& */ "./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js&");
/* harmony import */ var _CartModuleHome_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./CartModuleHome.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _CartModuleHome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__.render,
  _CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/CartModuleHome.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartModuleHome.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartModuleHome.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartModuleHome_vue_vue_type_template_id_79d7f354___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartModuleHome.vue?vue&type=template&id=79d7f354& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/CartModuleHome.vue?vue&type=template&id=79d7f354& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "li",
    {
      staticClass: "block-mini-cart",
      class: { "d-none": _vm.onCartPage },
      attrs: { id: "block-mini-cart" }
    },
    [
      _c("a", { attrs: { href: "#" } }, [
        _c("i", { staticClass: "icon icon-basket" }),
        _vm._v(" "),
        _c("span", { staticClass: "number-product-in-cart" }, [
          _vm._v(_vm._s(_vm.$store.state.allCartCount))
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "mini-cart" }, [
        _c("div", {}, [
          _c(
            "ul",
            { staticClass: "cart-list" },
            _vm._l(_vm.cart, function(item, index) {
              return _c(
                "li",
                { key: index, staticClass: "item-product-in-cart" },
                [
                  _c("div", { staticClass: "block-img" }, [
                    _c("img", {
                      staticClass: "img",
                      attrs: {
                        src:
                          item["product"].main_image.length > 0
                            ? "/storage/" + item["product"].main_image["0"].path
                            : "/images/backend/no-image.png",
                        alt: "photo-product"
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "info-product" }, [
                    _c(
                      "a",
                      {
                        staticClass: "title-product",
                        attrs: { href: "/product/" + item["product"].id }
                      },
                      [_vm._v(_vm._s(item["product"].name))]
                    ),
                    _vm._v(" "),
                    _c("span", { staticClass: "new-price" }, [
                      _vm._v(
                        _vm._s(item["product"].actual_price_by_role) + " грн."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "icon-close cart-delete-item",
                    on: {
                      click: function($event) {
                        $event.preventDefault()
                        return _vm.showModal(index)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "modal fade modal-custom-moto",
                      attrs: {
                        id: "removeModuleHomeCart" + index,
                        tabindex: "-1",
                        role: "dialog",
                        "aria-labelledby": "#removeModuleHomeCart" + index,
                        "aria-hidden": "true"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "modal-dialog",
                          attrs: { role: "document" }
                        },
                        [
                          _c("div", { staticClass: "modal-content" }, [
                            _vm._m(0, true),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "modal-bottom btn-group" },
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn full-color",
                                    attrs: { "data-dismiss": "modal" }
                                  },
                                  [_vm._v("Закрити")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn",
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.removeCart(item, index)
                                      }
                                    }
                                  },
                                  [_vm._v("Видалити")]
                                )
                              ]
                            )
                          ])
                        ]
                      )
                    ]
                  )
                ]
              )
            }),
            0
          ),
          _vm._v(" "),
          _c("div", { staticClass: "total-info" }, [
            _c("div", { staticClass: "block-number" }, [
              _c("span", [_vm._v("Загалом товарів : ")]),
              _vm._v(" "),
              _c("span", { staticClass: "number" }, [
                _vm._v("  " + _vm._s(_vm.$store.state.allCartCount))
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "block-sum" }, [
              _c("span", [_vm._v(" Сума: ")]),
              _vm._v(" "),
              _c("div", [
                _c("span", { staticClass: "sum" }, [
                  _vm._v(_vm._s(_vm.$store.state.allCost))
                ]),
                _vm._v(" "),
                _c("span", [_vm._v(" грн.")])
              ])
            ])
          ]),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass: "btn-custom-project",
              attrs: { href: _vm.cartRouteData }
            },
            [_vm._v("Перейти до кошика")]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("h5", { staticClass: "title" }, [
      _c("span", [_vm._v("Видалити")]),
      _vm._v(" товар з кошика?")
    ])
  }
]
render._withStripped = true



/***/ })

}]);