/*! pageNotification - v1.0 - 2013-09-24 9:31:50 PM
* Copyright (c) 2013 鱼相; Licensed  */
KISSY.add("gallery/pageNotification/1.0/index",
function(a, b, c) {
    function d(a) {
        var b = this;
        d.superclass.constructor.call(b, a),
        b.init(a)
    }
    var e = b.all,
    f = {
        wrapClass: "page-notification-wrap",
        className: "page-notification",
        containerId: "J_pageNotification",
        showMethod: "fadeIn",
        showDuration: 300,
        showEasing: "swing",
        onShown: null,
        hideMethod: "fadeOut",
        hideDuration: 1e3,
        hideEasing: "swing",
        onHidden: null,
        extendedTimeOut: 1e3,
        iconClasses: {
            error: "page-notification-error",
            info: "page-notification-info",
            success: "page-notification-success",
            warning: "page-notification-warning"
        },
        iconClass: "page-notification-info",
        positionClass: "page-notification-top-right",
        timeOut: 5e3,
        titleClass: "page-notification-title",
        messageClass: "page-notification-message",
        target: "body",
        closeHtml: "<button>&times;</button>",
        newestOnTop: !0
    };
    return a.extend(d, c, {
        init: function(b) {
            var c = this;
            c.config = a.merge({},
            f, b),
            c.index = 0
        },
        getContainer: function() {
            var a, b = this,
            c = b.config;
            return a = e("#" + c.containerId),
            a.length ? a: (a = e("<div/>"), a.attr("id", c.containerId), a.addClass(c.wrapClass), a.addClass(c.positionClass), a.appendTo(e(c.target)), a)
        },
        notify: function(b) {
            var c, d, f = this,
            g = f.config,
            h = b.iconClass || g.iconClass,
            i = e("<div/>"),
            j = e("<div/>"),
            k = e("<div/>"),
            l = function() {
                i[g.hideMethod]({
                    speed: g.hideDuration,
                    easing: g.hideEasing,
                    complete: function() {
                        console.info("\u6211\u5173\u95ed\u5566"),
                        f.remove(i),
                        g.onHidden && g.onHidden()
                    }
                })
            },
            m = function() { (g.timeOut > 0 || g.extendedTimeOut > 0) && (d = setTimeout(l, g.extendedTimeOut))
            },
            n = function() {
                clearTimeout(d),
                i.stop(!0, !0)[g.showMethod]({
                    speed: g.showDuration,
                    easing: g.showEasing
                })
            },
            o = f.getContainer();
            return "undefined" != typeof b.optionsOverride && (o.replaceClass(g.positionClass, b.optionsOverride.positionClass), g = a.merge(g, b.optionsOverride), h = b.optionsOverride.iconClass || h),
            f.index++,
            c = e(g.closeHtml),
            b.iconClass && i.addClass(g.className).addClass(h),
            b.title && (j.append(b.title).addClass(g.titleClass), i.append(j)),
            b.message && (k.append(b.message).addClass(g.messageClass), i.append(k)),
            g.closeButton && (c.addClass("page-notification-close-button"), i.prepend(c)),
            i.hide(),
            g.newestOnTop ? o.prepend(i) : o.append(i),
            i[g.showMethod]({
                speed: g.showDuration,
                easing: g.showEasing,
                complete: g.onShown
            }),
            g.timeOut > 0 && (d = setTimeout(l, g.timeOut)),
            i.on("mouseenter", n),
            i.on("mouseleave", m),
            g.closeButton && c && c.on("click",
            function(a) {
                a.stopPropagation(),
                l()
            }),
            g.onclick && i.on("click", g.onclick),
            i
        },
        success: function(a, b, c) {
            var d = this,
            e = d.config;
            return d.notify({
                type: "success",
                iconClass: e.iconClasses.success,
                message: a,
                optionsOverride: c,
                title: b
            })
        },
        info: function(a, b, c) {
            var d = this,
            e = d.config;
            return d.notify({
                type: "info",
                iconClass: e.iconClasses.info,
                message: a,
                optionsOverride: c,
                title: b
            })
        },
        warning: function(a, b, c) {
            var d = this,
            e = d.config;
            return d.notify({
                type: "warning",
                iconClass: e.iconClasses.warning,
                message: a,
                optionsOverride: c,
                title: b
            })
        },
        error: function(a, b, c) {
            var d = this,
            e = d.config;
            return d.notify({
                type: "error",
                iconClass: e.iconClasses.error,
                message: a,
                optionsOverride: c,
                title: b
            })
        },
        clear: function(a) {
            var b = this,
            c = b.config,
            d = b.getContainer();
            return a && 0 === e(":focus", a).length ? (a[c.hideMethod]({
                speed: c.hideDuration,
                easing: c.hideEasing,
                complete: function() {
                    b.remove(a)
                }
            }), void 0) : (d.children().length && d[c.hideMethod]({
                speed: c.hideDuration,
                easing: c.hideEasing,
                complete: function() {
                    d.remove()
                }
            }), void 0)
        },
        remove: function(a) {
            var b = this,
            c = b.getContainer();
            a.remove(),
            a = null,
            0 === c.children().length && c.remove()
        }
    },
    {
        ATTRS: {}
    }),
    d
},
{
    requires: ["node", "base", "anim", "./index.css"]
});
