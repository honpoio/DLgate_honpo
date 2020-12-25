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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/hoge.js":
/*!******************************!*\
  !*** ./resources/js/hoge.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /var/www/html/laravel/resources/js/hoge.js: Support for the experimental syntax 'jsx' isn't currently enabled (1:1):\n\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 1 | \u001b[39m\u001b[33m<\u001b[39m\u001b[33mscript\u001b[39m\u001b[33m>\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m   | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 2 | \u001b[39m\u001b[36mfunction\u001b[39m copyToClipboard(index){\u001b[0m\n\u001b[0m \u001b[90m 3 | \u001b[39m    \u001b[90m// コピー対象をJavaScript上で変数として定義する\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 4 | \u001b[39m    \u001b[36mvar\u001b[39m copyTarget \u001b[33m=\u001b[39m document\u001b[33m.\u001b[39mgetElementById(\u001b[32m\"copyTarget\"\u001b[39m \u001b[33m+\u001b[39m index)\u001b[33m;\u001b[39m\u001b[0m\n\nAdd @babel/preset-react (https://git.io/JfeDR) to the 'presets' section of your Babel config to enable transformation.\nIf you want to leave it as-is, add @babel/plugin-syntax-jsx (https://git.io/vb4yA) to the 'plugins' section to enable parsing.\n    at Parser._raise (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:748:17)\n    at Parser.raiseWithData (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:741:17)\n    at Parser.expectOnePlugin (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9116:18)\n    at Parser.parseExprAtom (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:10569:22)\n    at Parser.parseExprSubscripts (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:10150:23)\n    at Parser.parseUpdate (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:10130:21)\n    at Parser.parseMaybeUnary (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:10119:17)\n    at Parser.parseExprOps (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9989:23)\n    at Parser.parseMaybeConditional (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9963:23)\n    at Parser.parseMaybeAssign (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9926:21)\n    at Parser.parseExpressionBase (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9871:23)\n    at allowInAnd (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9865:39)\n    at Parser.allowInAnd (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:11541:16)\n    at Parser.parseExpression (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:9865:17)\n    at Parser.parseStatementContent (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:11807:23)\n    at Parser.parseStatement (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:11676:17)\n    at Parser.parseBlockOrModuleBlockBody (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:12258:25)\n    at Parser.parseBlockBody (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:12249:10)\n    at Parser.parseTopLevel (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:11607:10)\n    at Parser.parse (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:13415:10)\n    at parse (/var/www/html/laravel/node_modules/@babel/parser/lib/index.js:13468:38)\n    at parser (/var/www/html/laravel/node_modules/@babel/core/lib/parser/index.js:54:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/var/www/html/laravel/node_modules/@babel/core/lib/transformation/normalize-file.js:99:38)\n    at normalizeFile.next (<anonymous>)\n    at run (/var/www/html/laravel/node_modules/@babel/core/lib/transformation/index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (/var/www/html/laravel/node_modules/@babel/core/lib/transform.js:27:41)\n    at transform.next (<anonymous>)\n    at step (/var/www/html/laravel/node_modules/gensync/index.js:261:32)\n    at gen.next (/var/www/html/laravel/node_modules/gensync/index.js:273:13)\n    at async.call.value (/var/www/html/laravel/node_modules/gensync/index.js:223:11)\n    at errback.call (/var/www/html/laravel/node_modules/gensync/index.js:189:28)\n    at runGenerator.errback (/var/www/html/laravel/node_modules/@babel/core/lib/gensync-utils/async.js:72:7)\n    at val (/var/www/html/laravel/node_modules/gensync/index.js:113:33)\n    at step (/var/www/html/laravel/node_modules/gensync/index.js:287:14)");

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/hoge.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/laravel/resources/js/hoge.js */"./resources/js/hoge.js");


/***/ })

/******/ });