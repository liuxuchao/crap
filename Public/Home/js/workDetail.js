webpackJsonp([14],{0:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function r(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var o=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=e(6),c=t(l),i=e(7),u=e(8),s=t(u),f=e(40),d=t(f),m=e(41),p=t(m),y=e(42),b=t(y),h=e(43),v=t(h);e(1);var _=window.INTERFACE,w=function(e){function t(){a(this,t);var e=n(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return e.state={data:""},e.timer=null,e}return r(t,e),o(t,[{key:"render",value:function(){var e=this.state.data;return""!=e?c.default.createElement("div",null,c.default.createElement(d.default,{data:e}),c.default.createElement(v.default,{data:e}),c.default.createElement(b.default,{data:e}),c.default.createElement(p.default,{data:e})):null}},{key:"componentWillMount",value:function(){function e(){ajaxData[window.ajaxType]({url:_.workDetailsUrl,data:s.default}).done(function(a){function n(e){return e=$.trim(e),""==e||null==e||void 0==e}var r;if(0==a.error_code){r=a.data;var o=[];o.push(n(r.name)),o.push(n(r.work_address)),o.push(n(r.work_details)),o.push(n(r.company_name));var l=o.some(function(e,t,a){return 1==e});if(1==l)return this.timer?($("[data-outTime]").show(),void window.clearTimeout(t.timer)):void(this.timer=window.setTimeout(function(){e()},5e3));this.setState({data:r}),alert("加载完成")}else t.setState({message:a.msg})}.bind(t))}var t=this;e()}}]),t}(c.default.Component);(0,i.render)(c.default.createElement(w,null),document.getElementById("reactApp"))},1:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}var a=e(2),n=t(a);window.$=n.default;var r="get";(/(www\.)?[\w]+\.[a-zA-Z]+/.test(window.location.host)||/((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))/.test(window.location.host))&&(r="post"),window.ajaxType=r},2:function(module,exports,e){module.exports=e(3)(1)},3:function(module,exports){module.exports=vendors},6:function(module,exports,e){module.exports=e(3)(2)},7:function(module,exports,e){module.exports=e(3)(29)},8:function(module,exports,e){var t;t=function(){function e(){var e,t,a=location.href,n=a.indexOf("?");a=a.substr(n+1);for(var r=a.split("&"),o=0;o<r.length;o++)n=r[o].indexOf("="),n>0&&(e=r[o].substring(0,n),t=r[o].substr(n+1),this[e]=t)}return new e}.call(exports,e,exports,module),!(void 0!==t&&(module.exports=t))},10:function(module,exports){"use strict";function e(e){return""==e||null==e||void 0==e||"object"==("undefined"==typeof e?"undefined":n(e))&&0==e.length?{display:"none"}:{}}function t(e){return{__html:e}}function a(e,t){return""==e||""==t?{display:"none"}:{}}Object.defineProperty(exports,"__esModule",{value:!0});var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};exports.display=e,exports.createMarkup=t,exports.displayTwo=a},40:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function r(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(exports,"__esModule",{value:!0});var o=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=e(6),c=t(l),i=e(10),u=function(e){function t(e){return a(this,t),n(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e))}return r(t,e),o(t,[{key:"render",value:function(){var e=this,t=e.props.data;return c.default.createElement("article",{className:"block-item"},c.default.createElement("hgroup",{className:"block-title "},c.default.createElement("div",{className:"title"},"职位信息")),c.default.createElement("section",{className:"block-content"},c.default.createElement("div",null,c.default.createElement("div",{className:"f16 c333 title"},t.name),c.default.createElement("div",{className:"c999 mt5"},t.company_name),c.default.createElement("div",{className:"fl c999 mt5"},c.default.createElement("span",{className:"mr10 orange",style:(0,i.display)(t.salary)},t.salary),c.default.createElement("span",{className:"mr10",style:(0,i.display)(t.work_address)},t.work_address),c.default.createElement("span",{className:"mr10",style:(0,i.display)(t.degree)},t.degree),c.default.createElement("span",{className:"mr10",style:(0,i.display)(t.work_years)},t.work_years)),c.default.createElement("div",{className:"clearfix"})),c.default.createElement("div",{style:(0,i.display)(t.job_tags)},t.job_tags.split(",").map(function(e,t){return c.default.createElement("div",{key:t,className:"c_stroke_blue_box"},e)}))))}}]),t}(c.default.Component);exports.default=u},41:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function r(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(exports,"__esModule",{value:!0});var o=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=e(6),c=t(l),i=e(10),u=function(e){function t(e){a(this,t);var r=n(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return r.state={imageStatus:e.data.company_logo},r}return r(t,e),o(t,[{key:"handleImageErrored",value:function(){this.setState({imageStatus:"/Home/images/view/company_default_logo.png?apiversion=2.0.0&t=1495162538731&v=b3ec5ebb75?apiversion=2.0.0&t=1495155292855&v=b3ec5ebb75?apiversion=2.0.0&t=version1495155242716&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb753ec5ebb753ec5ebb753ec5ebb75"})}},{key:"render",value:function(){var e=this,t=e.props.data;return c.default.createElement("article",{className:"block-item"},c.default.createElement("hgroup",{className:"block-title "},c.default.createElement("h2",{className:"title"},"公司信息")),c.default.createElement("section",{className:"block-content"},c.default.createElement("div",{className:"company-name",style:(0,i.display)(t.company_name)},t.company_name),c.default.createElement("div",{className:"company-block"},c.default.createElement("img",{className:"company-logo",src:this.state.imageStatus,onError:this.handleImageErrored.bind(this),width:"72",height:"72"}),c.default.createElement("div",{className:"company-other"},c.default.createElement("div",null,c.default.createElement("div",{className:"icon-item",style:(0,i.display)(t.company_size)},c.default.createElement("img",{src:"/Home/images/common/icon/3.png?apiversion=2.0.0&t=1495162538731&v=a6bf19df3b?apiversion=2.0.0&t=1495155292855&v=a6bf19df3b?apiversion=2.0.0&t=version1495155242716&v=a6bf19df3b?apiversion=2.0.0&v=a6bf19df3b?apiversion=2.0.0&v=a6bf19df3b?apiversion=2.0.0&v=a6bf19df3b6bf19df3b6bf19df3b6bf19df3b",width:"20",alt:""}),c.default.createElement("em",null,t.company_size)),c.default.createElement("div",{className:"icon-item",style:(0,i.display)(t.company_nature)},c.default.createElement("img",{src:"/Home/images/common/icon/4.png?apiversion=2.0.0&t=1495162538731&v=a946adf04f?apiversion=2.0.0&t=1495155292855&v=a946adf04f?apiversion=2.0.0&t=version1495155242716&v=a946adf04f?apiversion=2.0.0&v=a946adf04f?apiversion=2.0.0&v=a946adf04f?apiversion=2.0.0&v=a946adf04f946adf04f946adf04f946adf04f",width:"20",alt:""}),c.default.createElement("em",null,t.company_nature))),c.default.createElement("div",{className:"icon-item",style:(0,i.display)(t.company_trade)},c.default.createElement("img",{src:"/Home/images/common/icon/2.png?apiversion=2.0.0&t=1495162538731&v=370005eaa7?apiversion=2.0.0&t=1495155292855&v=370005eaa7?apiversion=2.0.0&t=version1495155242716&v=370005eaa7?apiversion=2.0.0&v=370005eaa7?apiversion=2.0.0&v=370005eaa7?apiversion=2.0.0&v=370005eaa770005eaa770005eaa770005eaa7",width:"20",alt:""}),c.default.createElement("em",null,t.company_trade)),c.default.createElement("div",{className:"icon-item",style:(0,i.display)(t.company_address)},c.default.createElement("img",{className:"fl",src:"/Home/images/common/icon/1.png?apiversion=2.0.0&t=1495162538731&v=b64f2dc699?apiversion=2.0.0&t=1495155292855&v=b64f2dc699?apiversion=2.0.0&t=version1495155242716&v=b64f2dc699?apiversion=2.0.0&v=b64f2dc699?apiversion=2.0.0&v=b64f2dc699?apiversion=2.0.0&v=b64f2dc69964f2dc69964f2dc69964f2dc699",width:"20",alt:""}),c.default.createElement("em",null,t.company_address," ")))),c.default.createElement("div",{className:"company-detail",dangerouslySetInnerHTML:(0,i.createMarkup)(t.company_details)})))}}]),t}(c.default.Component);exports.default=u},42:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function r(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(exports,"__esModule",{value:!0});var o=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=e(6),c=t(l),i=(e(10),function(e){function t(e){a(this,t);var r=n(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return r.state={imageStatus:e.data.company_logo},r}return r(t,e),o(t,[{key:"handleImageErrored",value:function(){this.setState({imageStatus:"/Home/images/view/company_default_logo.png?apiversion=2.0.0&t=1495162538731&v=b3ec5ebb75?apiversion=2.0.0&t=1495155292855&v=b3ec5ebb75?apiversion=2.0.0&t=version1495155242716&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb75?apiversion=2.0.0&v=b3ec5ebb753ec5ebb753ec5ebb753ec5ebb75"})}},{key:"render",value:function(){function e(){$(".load-map").toggleClass("active",!1),t.map(a.company_address)}var t=this,a=t.props.data;return a.work_address_detail?c.default.createElement("article",{className:"block-item"},c.default.createElement("hgroup",{className:"block-title "},c.default.createElement("h2",{className:"title"},"工作地点")),c.default.createElement("section",{className:"block-content"},c.default.createElement("div",{className:"f12 c333"},c.default.createElement("div",{className:" lh20"},a.work_address_detail)),c.default.createElement("section",{className:"load-main"},c.default.createElement("div",{className:"load-map"},c.default.createElement("div",{id:"allmap",className:"content"}),c.default.createElement("div",{className:"map-close",onClick:e}))))):c.default.createElement("div",null)}},{key:"componentDidMount",value:function(){var e=this.props.data;this.map(e.work_address_detail)}},{key:"map",value:function e(t){function a(){var a=new BMap.Geocoder;a.getPoint(t,function(t){if(t){var a=new BMap.Marker(t);a.setIcon(new BMap.Icon("/Home/images/view/baidu_icon.png?apiversion=2.0.0&t=1495162538731&v=6a838f825e?apiversion=2.0.0&t=1495155292855&v=6a838f825e?apiversion=2.0.0&t=version1495155242716&v=6a838f825e?apiversion=2.0.0&v=6a838f825e?apiversion=2.0.0&v=6a838f825e?apiversion=2.0.0&v=6a838f825ea838f825ea838f825ea838f825e","30")),e.centerAndZoom(t,16),e.addOverlay(a)}},"全国")}function n(e){$(".load-map").toggleClass("active",!0),a()}if(t){var e=new BMap.Map("allmap");e.disableKeyboard(),e.addEventListener("click",n);var r=new BMap.Point(116.331398,39.897445);e.centerAndZoom(r,12),a()}}}]),t}(c.default.Component));exports.default=i},43:function(module,exports,e){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function r(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(exports,"__esModule",{value:!0});var o=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=e(6),c=t(l),i=e(10),u=function(e){function t(e){a(this,t);var r=n(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return r.state={height:"150px",case:!0},r}return r(t,e),o(t,[{key:"extendShow",value:function(){this.setState({height:"auto",case:!1})}},{key:"extendHide",value:function(){this.setState({height:"150px",case:!0})}},{key:"render",value:function(){var e=this,t=e.props.data;return c.default.createElement("article",{className:"block-item",style:(0,i.display)(t.work_details)},c.default.createElement("hgroup",{className:"block-title "},c.default.createElement("div",{className:"title"},"职位要求")),c.default.createElement("section",{className:"block-content"},c.default.createElement("div",{className:"c333 f12 lh24 overflow",style:{height:this.state.height}},c.default.createElement("pre",null,c.default.createElement("div",{dangerouslySetInnerHTML:(0,i.createMarkup)(t.work_details)}))),c.default.createElement("div",{className:"case-block",onClick:this.extendShow.bind(this),style:(0,i.display)(e.state.case)},c.default.createElement("div",{className:"btn"},"展开")),c.default.createElement("div",{className:"case-block",onClick:this.extendHide.bind(this),style:(0,i.display)(!e.state.case)},c.default.createElement("div",{className:"btn"},"收起"))))}}]),t}(c.default.Component);exports.default=u}});