/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./public/assets/App.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/App.js":
/*!******************************!*\
  !*** ./public/assets/App.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_FormReset__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/FormReset */ \"./public/assets/modules/FormReset.js\");\n/* harmony import */ var _modules_HeroRemove__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/HeroRemove */ \"./public/assets/modules/HeroRemove.js\");\n\n\n\n\n\nnew _modules_HeroRemove__WEBPACK_IMPORTED_MODULE_1__[\"default\"]();\n\n// form reset will block all other js modules\n// need to refactor to onload form reset when a user visits a page with a  button the has an id of clear \nnew _modules_FormReset__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\n\n\n\n\n//# sourceURL=webpack:///./public/assets/App.js?");

/***/ }),

/***/ "./public/assets/modules/FormReset.js":
/*!********************************************!*\
  !*** ./public/assets/modules/FormReset.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nclass FormReset{\n    constructor(){\n        console.log(\"form reset\");\n        this.form = document.querySelector('#form');\n        this.button = document.getElementById('clear');\n        console.log(this.button);\n        this.events();\n        \n    }\n    events(){\n        \n        this.button.addEventListener('click', ()=>this.clear());\n        \n    }\n    clear(){\n        this.form.reset();\n    }\n\n\n}\n/* harmony default export */ __webpack_exports__[\"default\"] = (FormReset);\n\n//# sourceURL=webpack:///./public/assets/modules/FormReset.js?");

/***/ }),

/***/ "./public/assets/modules/HeroRemove.js":
/*!*********************************************!*\
  !*** ./public/assets/modules/HeroRemove.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nclass HeroRemove{\n    constructor(){\n        this.tl = gsap.timeline({delay: 2});\n        this.hero = document.querySelector(\".hero\");\n        this.textContainer = document.querySelector(\".hero > container\");\n        this.logo = document.querySelector('#hero-logo');\n        this.row = document.querySelector('.row');\n        this.main = document.querySelector('#wrapper');\n        this.animate();\n    }\n    \n    animate(){\n        this.tl.to(this.row, {height: '0vh', duration: 2.5, opacity:0, display:\"none\"})\n        this.tl.to(this.logo, {opacity:0, display:\"none\", sclae:'.6'}, \"<\")\n        this.tl.to(this.main, {height: '100%', zIndex:3}, \"<\")\n        this.tl.to(this.hero, {padding:0, height: '0vh', duration: 3}, \"<.2\")\n    }\n    \n}\n/* harmony default export */ __webpack_exports__[\"default\"] = (HeroRemove);\n\n//# sourceURL=webpack:///./public/assets/modules/HeroRemove.js?");

/***/ })

/******/ });