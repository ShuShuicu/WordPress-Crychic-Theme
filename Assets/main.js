//** 2024 Typecho Theme Development Framework ©️ Copyright By Tomoriゞ */
const printLogo = () => { console.log("\n%c %s %c %s %c %s\n", "color: #fff; background: #34495e; padding:5px 0;", "基于TTDF开发框架", "background: #fadfa3; padding:5px 0;", "B站@Tomoriゞ", "color:#fff;background:rgb(255, 225, 0); padding:5px 0;", "https://github.com/ShuShuicu/Typecho-Nijika-Theme"); };
printLogo();

/**
 * 注册Vue组件
 */
document.addEventListener('DOMContentLoaded', () => {
    // 确保 Vue 和 Vuetify 已经正确引入
    if (typeof Vue === 'undefined' || typeof Vuetify === 'undefined') {
        console.error('Vue 或 Vuetify 未正确引入');
        return;
    }

    const { createApp } = Vue;
    const { createVuetify } = Vuetify;

    // 创建 Vuetify 实例，并传入配置选项（如果需要）
    const vuetify = createVuetify({
        icons: {
            defaultSet: 'mdi', 
        },
    });

    const app = createApp({
        // 根组件选项
    });

    // 注册组件
    app.use(vuetify);
    app.use(ArcoVue);

    // 确保挂载点存在
    const mountPoint = document.querySelector('#app');
    if (!mountPoint) {
        console.error('未找到挂载点 #app');
        return;
    }

    // 挂载 Vue 应用
    app.mount(mountPoint);
});

/**
 * ViewImage
 */
var $jscomp = $jscomp || {}; $jscomp.scope = {}; $jscomp.createTemplateTagFirstArg = function (b) { return b.raw = b }; $jscomp.createTemplateTagFirstArgWithRaw = function (b, a) { b.raw = a; return b }; $jscomp.arrayIteratorImpl = function (b) { var a = 0; return function () { return a < b.length ? { done: !1, value: b[a++] } : { done: !0 } } }; $jscomp.arrayIterator = function (b) { return { next: $jscomp.arrayIteratorImpl(b) } }; $jscomp.makeIterator = function (b) { var a = "undefined" != typeof Symbol && Symbol.iterator && b[Symbol.iterator]; return a ? a.call(b) : $jscomp.arrayIterator(b) };
$jscomp.arrayFromIterator = function (b) { for (var a, d = []; !(a = b.next()).done;)d.push(a.value); return d }; $jscomp.arrayFromIterable = function (b) { return b instanceof Array ? b : $jscomp.arrayFromIterator($jscomp.makeIterator(b)) };
(function () {
    window.ViewImage = new function () {
        var b = this; this.target = "[view-image] img"; this.listener = function (a) { if (!(a.ctrlKey || a.metaKey || a.shiftKey || a.altKey)) { var d = String(b.target.split(",").map(function (g) { return g.trim() + ":not([no-view])" })), c = a.target.closest(d); if (c) { var e = c.closest("[view-image]") || document.body; d = [].concat($jscomp.arrayFromIterable(e.querySelectorAll(d))).map(function (g) { return g.href || g.src }); b.display(d, c.href || c.src); a.stopPropagation(); a.preventDefault() } } }; this.init =
            function (a) { a && (b.target = a);["removeEventListener", "addEventListener"].forEach(function (d) { document[d]("click", b.listener, !1) }) }; this.display = function (a, d) {
                var c = a.indexOf(d), e = (new DOMParser).parseFromString('\n                <div class="view-image">\n                    <style>.view-image{position:fixed;inset:0;z-index:500;padding:1rem;display:flex;flex-direction:column;animation:view-image-in 300ms;backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px)}.view-image__out{animation:view-image-out 300ms}@keyframes view-image-in{0%{opacity:0}}@keyframes view-image-out{100%{opacity:0}}.view-image-btn{width:32px;height:32px;display:flex;justify-content:center;align-items:center;cursor:pointer;border-radius:3px;background-color:rgba(255,255,255,0.2)}.view-image-btn:hover{background-color:rgba(255,255,255,0.5)}.view-image-close__full{position:absolute;inset:0;background-color:rgba(48,55,66,0.3);z-index:unset;cursor:zoom-out;margin:0}.view-image-container{height:0;flex:1;display:flex;align-items:center;justify-content:center;}.view-image-lead{display:contents}.view-image-lead img{position:relative;z-index:1;max-width:100%;max-height:100%;object-fit:contain;border-radius:3px}.view-image-lead__in img{animation:view-image-lead-in 300ms}.view-image-lead__out img{animation:view-image-lead-out 300ms forwards}@keyframes view-image-lead-in{0%{opacity:0;transform:translateY(-20px)}}@keyframes view-image-lead-out{100%{opacity:0;transform:translateY(20px)}}[class*=__out] ~ .view-image-loading{display:block}.view-image-loading{position:absolute;inset:50%;width:8rem;height:2rem;color:#aab2bd;overflow:hidden;text-align:center;margin:-1rem -4rem;z-index:1;display:none}.view-image-loading::after{content:"";position:absolute;inset:50% 0;width:100%;height:3px;background:rgba(255,255,255,0.5);transform:translateX(-100%) translateY(-50%);animation:view-image-loading 800ms -100ms ease-in-out infinite}@keyframes view-image-loading{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}.view-image-tools{position:relative;display:flex;justify-content:space-between;align-content:center;color:#fff;max-width:600px;position: absolute; bottom: 5%; left: 1rem; right: 1rem; backdrop-filter: blur(10px);margin:0 auto;padding:10px;border-radius:5px;background:rgba(0,0,0,0.1);margin-bottom:constant(safe-area-inset-bottom);margin-bottom:env(safe-area-inset-bottom);z-index:1}.view-image-tools__count{width:60px;display:flex;align-items:center;justify-content:center}.view-image-tools__flip{display:flex;gap:10px}.view-image-tools [class*=-close]{margin:0 10px}</style>\n                    <div class="view-image-container">\n                        <div class="view-image-lead"></div>\n                        <div class="view-image-loading"></div>\n                        <div class="view-image-close view-image-close__full"></div>\n                    </div>\n                    <div class="view-image-tools">\n                        <div class="view-image-tools__count">\n                            <span><b class="view-image-index">' +
                    (c + 1) + "</b>/" + a.length + '</span>\n                        </div>\n                        <div class="view-image-tools__flip">\n                            <div class="view-image-btn view-image-tools__flip-prev">\n                                <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><path d="M31 36L19 24L31 12" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>\n                            </div>\n                            <div class="view-image-btn view-image-tools__flip-next">\n                                <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><path d="M19 12L31 24L19 36" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>\n                            </div>\n                        </div>\n                        <div class="view-image-btn view-image-close">\n                            <svg width="16" height="16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"/><path d="M8 8L40 40" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 40L40 8" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>\n                        </div>\n                    </div>\n                </div>\n            ',
                    "text/html").body.firstChild, g = function (f) { var h = { Escape: "close", ArrowLeft: "tools__flip-prev", ArrowRight: "tools__flip-next" }; h[f.key] && e.querySelector(".view-image-" + h[f.key]).click() }, l = function (f) {
                        var h = new Image, k = e.querySelector(".view-image-lead"); k.className = "view-image-lead view-image-lead__out"; setTimeout(function () {
                            k.innerHTML = ""; h.onload = function () { setTimeout(function () { k.innerHTML = '<img src="' + h.src + '" alt="ViewImage" no-view/>'; k.className = "view-image-lead view-image-lead__in" }, 100) };
                            h.src = f
                        }, 300)
                    }; document.body.appendChild(e); l(d); window.addEventListener("keydown", g); e.onclick = function (f) { f.target.closest(".view-image-close") ? (window.removeEventListener("keydown", g), e.onclick = null, e.classList.add("view-image__out"), setTimeout(function () { return e.remove() }, 290)) : f.target.closest(".view-image-tools__flip") && (c = f.target.closest(".view-image-tools__flip-prev") ? 0 === c ? a.length - 1 : c - 1 : c === a.length - 1 ? 0 : c + 1, l(a[c]), e.querySelector(".view-image-index").innerHTML = c + 1) }
            }
    }
})();

window.ViewImage && ViewImage.init('.Nijika-typo img');

/**
 * TheiaStickySidebar
 */
!function (i) { i.fn.theiaStickySidebar = function (t) { function e(t, e) { var a = o(t, e); a || (console.log("TSS: Body width smaller than options.minWidth. Init is delayed."), i(document).on("scroll." + t.namespace, function (t, e) { return function (a) { var n = o(t, e); n && i(this).unbind(a) } }(t, e)), i(window).on("resize." + t.namespace, function (t, e) { return function (a) { var n = o(t, e); n && i(this).unbind(a) } }(t, e))) } function o(t, e) { return t.initialized === !0 || !(i("body").width() < t.minWidth) && (a(t, e), !0) } function a(t, e) { t.initialized = !0; var o = i("#theia-sticky-sidebar-stylesheet-" + t.namespace); 0 === o.length && i("head").append(i('<style id="theia-sticky-sidebar-stylesheet-' + t.namespace + '">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>')), e.each(function () { function e() { a.fixedScrollTop = 0, a.sidebar.css({ "min-height": "1px" }), a.stickySidebar.css({ position: "static", width: "", transform: "none" }) } function o(t) { var e = t.height(); return t.children().each(function () { e = Math.max(e, i(this).height()) }), e } var a = {}; if (a.sidebar = i(this), a.options = t || {}, a.container = i(a.options.containerSelector), 0 == a.container.length && (a.container = a.sidebar.parent()), a.sidebar.parents().css("-webkit-transform", "none"), a.sidebar.css({ position: a.options.defaultPosition, overflow: "visible", "-webkit-box-sizing": "border-box", "-moz-box-sizing": "border-box", "box-sizing": "border-box" }), a.stickySidebar = a.sidebar.find(".theiaStickySidebar"), 0 == a.stickySidebar.length) { var s = /(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i; a.sidebar.find("script").filter(function (i, t) { return 0 === t.type.length || t.type.match(s) }).remove(), a.stickySidebar = i("<div>").addClass("theiaStickySidebar").append(a.sidebar.children()), a.sidebar.append(a.stickySidebar) } a.marginBottom = parseInt(a.sidebar.css("margin-bottom")), a.paddingTop = parseInt(a.sidebar.css("padding-top")), a.paddingBottom = parseInt(a.sidebar.css("padding-bottom")); var r = a.stickySidebar.offset().top, d = a.stickySidebar.outerHeight(); a.stickySidebar.css("padding-top", 1), a.stickySidebar.css("padding-bottom", 1), r -= a.stickySidebar.offset().top, d = a.stickySidebar.outerHeight() - d - r, 0 == r ? (a.stickySidebar.css("padding-top", 0), a.stickySidebarPaddingTop = 0) : a.stickySidebarPaddingTop = 1, 0 == d ? (a.stickySidebar.css("padding-bottom", 0), a.stickySidebarPaddingBottom = 0) : a.stickySidebarPaddingBottom = 1, a.previousScrollTop = null, a.fixedScrollTop = 0, e(), a.onScroll = function (a) { if (a.stickySidebar.is(":visible")) { if (i("body").width() < a.options.minWidth) return void e(); if (a.options.disableOnResponsiveLayouts) { var s = a.sidebar.outerWidth("none" == a.sidebar.css("float")); if (s + 50 > a.container.width()) return void e() } var r = i(document).scrollTop(), d = "static"; if (r >= a.sidebar.offset().top + (a.paddingTop - a.options.additionalMarginTop)) { var c, p = a.paddingTop + t.additionalMarginTop, b = a.paddingBottom + a.marginBottom + t.additionalMarginBottom, l = a.sidebar.offset().top, f = a.sidebar.offset().top + o(a.container), h = 0 + t.additionalMarginTop, g = a.stickySidebar.outerHeight() + p + b < i(window).height(); c = g ? h + a.stickySidebar.outerHeight() : i(window).height() - a.marginBottom - a.paddingBottom - t.additionalMarginBottom; var u = l - r + a.paddingTop, S = f - r - a.paddingBottom - a.marginBottom, y = a.stickySidebar.offset().top - r, m = a.previousScrollTop - r; "fixed" == a.stickySidebar.css("position") && "modern" == a.options.sidebarBehavior && (y += m), "stick-to-top" == a.options.sidebarBehavior && (y = t.additionalMarginTop), "stick-to-bottom" == a.options.sidebarBehavior && (y = c - a.stickySidebar.outerHeight()), y = m > 0 ? Math.min(y, h) : Math.max(y, c - a.stickySidebar.outerHeight()), y = Math.max(y, u), y = Math.min(y, S - a.stickySidebar.outerHeight()); var k = a.container.height() == a.stickySidebar.outerHeight(); d = (k || y != h) && (k || y != c - a.stickySidebar.outerHeight()) ? r + y - a.sidebar.offset().top - a.paddingTop <= t.additionalMarginTop ? "static" : "absolute" : "fixed" } if ("fixed" == d) { var v = i(document).scrollLeft(); a.stickySidebar.css({ position: "fixed", width: n(a.stickySidebar) + "px", transform: "translateY(" + y + "px)", left: a.sidebar.offset().left + parseInt(a.sidebar.css("padding-left")) - v + "px", top: "0px" }) } else if ("absolute" == d) { var x = {}; "absolute" != a.stickySidebar.css("position") && (x.position = "absolute", x.transform = "translateY(" + (r + y - a.sidebar.offset().top - a.stickySidebarPaddingTop - a.stickySidebarPaddingBottom) + "px)", x.top = "0px"), x.width = n(a.stickySidebar) + "px", x.left = "", a.stickySidebar.css(x) } else "static" == d && e(); "static" != d && 1 == a.options.updateSidebarHeight && a.sidebar.css({ "min-height": a.stickySidebar.outerHeight() + a.stickySidebar.offset().top - a.sidebar.offset().top + a.paddingBottom }), a.previousScrollTop = r } }, a.onScroll(a), i(document).on("scroll." + a.options.namespace, function (i) { return function () { i.onScroll(i) } }(a)), i(window).on("resize." + a.options.namespace, function (i) { return function () { i.stickySidebar.css({ position: "static" }), i.onScroll(i) } }(a)), "undefined" != typeof ResizeSensor && new ResizeSensor(a.stickySidebar[0], function (i) { return function () { i.onScroll(i) } }(a)) }) } function n(i) { var t; try { t = i[0].getBoundingClientRect().width } catch (i) { } return "undefined" == typeof t && (t = i.width()), t } var s = { containerSelector: "", additionalMarginTop: 0, additionalMarginBottom: 0, updateSidebarHeight: !0, minWidth: 0, disableOnResponsiveLayouts: !0, sidebarBehavior: "modern", defaultPosition: "relative", namespace: "TSS" }; return t = i.extend(s, t), t.additionalMarginTop = parseInt(t.additionalMarginTop) || 0, t.additionalMarginBottom = parseInt(t.additionalMarginBottom) || 0, e(t, this), this } }(jQuery);

jQuery(document).ready(function () {
    jQuery('#Sidebar').theiaStickySidebar({
        // 顶部距离
        additionalMarginTop: 30
    });
});