  
var _createClass = function() {
    function e(e, t) {
        for (var n = 0; n < t.length; n++) {
            var i = t[n];
            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
    }
    return function(t, n, i) {
        return n && e(t.prototype, n), i && e(t, i), t
    }
}();

/*Slide*/
function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}! function(e) {
    var t = 240,
        n = 1440,
        i = 2,
        o = .3,
        r = -.5,
        a = -.3,
        s = .5,
        l = 10,
        c = function() {
            function c(u, d) {
                var f = this;
                _classCallCheck(this, c);
                var h = !1,
                    p = {
                        MENU_WIDTH: t,
                        edge: "left",
                        closeOnClick: !1
                    };
                d = e.extend(p, d), this.options = d;
                var g = u;
                this.menu_id = e("#" + g.attr("data-activates"));
                var m = e("#" + this.menu_id.attr("id") + "> .sidenav-bg");
                d.MENU_WIDTH !== t && (this.menu_id.css("width", d.MENU_WIDTH), m.css("width", d.MENU_WIDTH));
                var v = e('<div class="drag-target"></div>');
                e("body").append(v), "left" === d.edge ? (this.menu_id.css("transform", "translateX(-100%)"), v.css({
                    left: 0
                })) : (this.menu_id.addClass("right-aligned").css("transform", "translateX(100%)"), v.css({
                    right: 0
                })), this.menu_id.hasClass("fixed") && (window.innerWidth > n && this.menu_id.css("transform", "translateX(0)"), e(window).resize(function() {
                    window.innerWidth > n ? e("#sidenav-overlay").length ? f.removeMenu(!0) : f.menu_id.css("transform", "translateX(0%)") : !1 === h && ("left" === d.edge ? f.menu_id.css("transform", "translateX(-100%)") : f.menu_id.css("transform", "translateX(100%)"))
                })), !0 === this.options.closeOnClick && this.menu_id.on("click", "a:not(.collapsible-header)", function() {
                    f.removeMenu()
                }), g.click(function(t) {
                    if (t.preventDefault(), !0 === h) h = !1, f.removeMenu();
                    else {
                        var n = e("body"),
                            i = e('<div id="sidenav-overlay"></div>');
                        n.append(i), "left" === f.options.edge ? f.menu_id.velocity({
                            translateX: [0, -1 * d.MENU_WIDTH]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }) : f.menu_id.velocity({
                            translateX: [0, d.MENU_WIDTH]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), i.click(function() {
                            f.removeMenu()
                        })
                    }
                }), v.click(function() {
                    f.removeMenu()
                }), v.hammer({
                    prevent_default: !1
                }).bind("pan", function(t) {
                    if ("touch" === t.gesture.pointerType) {
                        var n = t.gesture.center.x,
                            o = e("body"),
                            r = o.innerWidth();
                        if (o.css("overflow", "hidden"), o.width(r), 0 === e("#sidenav-overlay").length) {
                            var a = e('<div id="sidenav-overlay"></div>');
                            a.css("opacity", 0).click(function() {
                                f.removeMenu()
                            }), e("body").append(a)
                        }
                        if ("left" === d.edge && (n > d.MENU_WIDTH ? n = d.MENU_WIDTH : n < 0 && (n = 0)), "left" === d.edge) n < d.MENU_WIDTH / i ? h = !1 : n >= d.MENU_WIDTH / i && (h = !0), f.menu_id.css("transform", "translateX(" + (n - d.MENU_WIDTH) + "px)");
                        else {
                            n < window.innerWidth - d.MENU_WIDTH / i ? h = !0 : n >= window.innerWidth - d.MENU_WIDTH / i && (h = !1);
                            var s = n - d.MENU_WIDTH / i;
                            s < 0 && (s = 0), f.menu_id.css("transform", "translateX(" + s + "px)")
                        }
                        var l = void 0;
                        "left" === d.edge ? (l = n / d.MENU_WIDTH, e("#sidenav-overlay").velocity({
                            opacity: l
                        }, {
                            duration: 10,
                            queue: !1,
                            easing: "easeOutQuad"
                        })) : (l = Math.abs((n - window.innerWidth) / d.MENU_WIDTH), e("#sidenav-overlay").velocity({
                            opacity: l
                        }, {
                            duration: 10,
                            queue: !1,
                            easing: "easeOutQuad"
                        }))
                    }
                }).bind("panend", function(t) {
                    if ("touch" === t.gesture.pointerType) {
                        var n = t.gesture.velocityX,
                            c = t.gesture.center.x,
                            u = c - d.MENU_WIDTH,
                            p = c - d.MENU_WIDTH / i;
                        u > 0 && (u = 0), p < 0 && (p = 0), "left" === d.edge ? h && n <= o || n < r ? (0 !== u && f.menu_id.velocity({
                            translateX: [0, u]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), e("#sidenav-overlay").velocity({
                            opacity: 1
                        }, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), v.css({
                            width: "10px",
                            right: "",
                            left: 0
                        })) : (!h || n > o) && (e("body").css({
                            overflow: "",
                            width: ""
                        }), f.menu_id.velocity({
                            translateX: [-1 * d.MENU_WIDTH - l, u]
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), e("#sidenav-overlay").velocity({
                            opacity: 0
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                e(this).remove()
                            }
                        }), v.css({
                            width: "10px",
                            right: "",
                            left: 0
                        })) : h && n >= a || n > s ? (f.menu_id.velocity({
                            translateX: [0, p]
                        }, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), e("#sidenav-overlay").velocity({
                            opacity: 1
                        }, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), v.css({
                            width: "50%",
                            right: "",
                            left: 0
                        })) : (!h || n < a) && (e("body").css({
                            overflow: "",
                            width: ""
                        }), f.menu_id.velocity({
                            translateX: [d.MENU_WIDTH + l, p]
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), e("#sidenav-overlay").velocity({
                            opacity: 0
                        }, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function() {
                                e(f).remove()
                            }
                        }), v.css({
                            width: "10px",
                            right: 0,
                            left: ""
                        }))
                    }
                })
            }
            return _createClass(c, [{
                key: "removeMenu",
                value: function(t) {
                    var n = this;
                    e("body").css({
                        overflow: "",
                        width: ""
                    }), "left" === this.options.edge ? this.menu_id.velocity({
                        translateX: "-100%"
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutCubic",
                        complete: function() {
                            !0 === t && (n.menu_id.removeAttr("style"), n.menu_id.css("width", n.options.MENU_WIDTH))
                        }
                    }) : this.menu_id.velocity({
                        translateX: "100%"
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutCubic",
                        complete: function() {
                            !0 === t && (n.menu_id.removeAttr("style"), n.menu_id.css("width", n.options.MENU_WIDTH))
                        }
                    }), e("#sidenav-overlay").velocity({
                        opacity: 0
                    }, {
                        duration: 200,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function() {
                            e("#sidenav-overlay").remove()
                        }
                    })
                }
            }, {
                key: "show",
                value: function() {
                    this.trigger("click")
                }
            }, {
                key: "hide",
                value: function() {
                    e("#sidenav-overlay").trigger("click")
                }
            }]), c
        }();
    e.fn.sideNav = function(t) {
        return this.each(function() {
            new c(e(this), t)
        })
    }
}(jQuery),

/*Slide*/

    function(e) {
        e.fn.collapsible = function(t) {
            var n = {
                accordion: void 0
            };
            return t = e.extend(n, t), this.each(function() {
                var n = e(this),
                    i = e(this).find("> li > .collapsible-header"),
                    o = n.data("collapsible");

                function r(t) {
                    i = n.find("> li > .collapsible-header"), t.hasClass("active") ? t.parent().addClass("active") : t.parent().removeClass("active"), t.parent().hasClass("active") ? t.siblings(".collapsible-body").stop(!0, !1).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            e(this).css("height", "")
                        }
                    }) : t.siblings(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            e(this).css("height", "")
                        }
                    }), i.not(t).removeClass("active").parent().removeClass("active"), i.not(t).parent().children(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            e(this).css("height", "")
                        }
                    })
                }

                function a(t) {
                    t.hasClass("active") ? t.parent().addClass("active") : t.parent().removeClass("active"), t.parent().hasClass("active") ? t.siblings(".collapsible-body").stop(!0, !1).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            e(this).css("height", "")
                        }
                    }) : t.siblings(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function() {
                            e(this).css("height", "")
                        }
                    })
                }

                function s(e) {
                    return l(e).length > 0
                }

                function l(e) {
                    return e.closest("li > .collapsible-header")
                }
                n.off("click.collapse", ".collapsible-header"), i.off("click.collapse"), t.accordion || "accordion" === o || void 0 === o ? ((i = n.find("> li > .collapsible-header")).on("click.collapse", function(t) {
                    var n = e(t.target);
                    s(n) && (n = l(n)), n.toggleClass("active"), r(n)
                }), r(i.filter(".active").first())) : i.each(function() {
                    e(this).on("click.collapse", function(t) {
                        var n = e(t.target);
                        s(n) && (n = l(n)), n.toggleClass("active"), a(n)
                    }), e(this).hasClass("active") && a(e(this))
                })
            })
        }, e(document).ready(function() {
            e(".collapsible").collapsible()
        })
    }(jQuery),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(e) {
        var t = function(e, t) {
            var n, i = document.createElement("canvas");
            e.appendChild(i), "object" == typeof G_vmlCanvasManager && G_vmlCanvasManager.initElement(i);
            var o = i.getContext("2d");
            i.width = i.height = t.size;
            var r = 1;
            window.devicePixelRatio > 1 && (r = window.devicePixelRatio, i.style.width = i.style.height = [t.size, "px"].join(""), i.width = i.height = t.size * r, o.scale(r, r)), o.translate(t.size / 2, t.size / 2), o.rotate((t.rotate / 180 - .5) * Math.PI);
            var a = (t.size - t.lineWidth) / 2;
            t.scaleColor && t.scaleLength && (a -= t.scaleLength + 2), Date.now = Date.now || function() {
                return +new Date
            };
            var s = function(e, t, n) {
                    var i = (n = Math.min(Math.max(-1, n || 0), 1)) <= 0;
                    o.beginPath(), o.arc(0, 0, a, 0, 2 * Math.PI * n, i), o.strokeStyle = e, o.lineWidth = t, o.stroke()
                },
                l = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(e) {
                    window.setTimeout(e, 1e3 / 60)
                },
                c = function() {
                    t.scaleColor && function() {
                        var e, n;
                        o.lineWidth = 1, o.fillStyle = t.scaleColor, o.save();
                        for (var i = 24; i > 0; --i) i % 6 == 0 ? (n = t.scaleLength, e = 0) : (n = .6 * t.scaleLength, e = t.scaleLength - n), o.fillRect(-t.size / 2 + e, 0, n, 1), o.rotate(Math.PI / 12);
                        o.restore()
                    }(), t.trackColor && s(t.trackColor, t.trackWidth || t.lineWidth, 1)
                };
            this.getCanvas = function() {
                return i
            }, this.getCtx = function() {
                return o
            }, this.clear = function() {
                o.clearRect(t.size / -2, t.size / -2, t.size, t.size)
            }, this.draw = function(e) {
                var i;
                t.scaleColor || t.trackColor ? o.getImageData && o.putImageData ? n ? o.putImageData(n, 0, 0) : (c(), n = o.getImageData(0, 0, t.size * r, t.size * r)) : (this.clear(), c()) : this.clear(), o.lineCap = t.lineCap, i = "function" == typeof t.barColor ? t.barColor(e) : t.barColor, s(i, t.lineWidth, e / 100)
            }.bind(this), this.animate = function(e, n) {
                var i = Date.now();
                t.onStart(e, n);
                var o = function() {
                    var r = Math.min(Date.now() - i, t.animate.duration),
                        a = t.easing(this, r, e, n - e, t.animate.duration);
                    this.draw(a), t.onStep(e, n, a), r >= t.animate.duration ? t.onStop(e, n) : l(o)
                }.bind(this);
                l(o)
            }.bind(this)
        };
        e.fn.easyPieChart = function(n) {
            return this.each(function() {
                var i;
                e.data(this, "easyPieChart") || (i = e.extend({}, n, e(this).data()), e.data(this, "easyPieChart", new function(e, n) {
                    var i = {
                        barColor: "#ef1e25",
                        trackColor: "#f9f9f9",
                        scaleColor: "#dfe0e0",
                        scaleLength: 5,
                        lineCap: "round",
                        lineWidth: 3,
                        trackWidth: void 0,
                        size: 110,
                        rotate: 0,
                        animate: {
                            duration: 1e3,
                            enabled: !0
                        },
                        easing: function(e, t, n, i, o) {
                            return (t /= o / 2) < 1 ? i / 2 * t * t + n : -i / 2 * (--t * (t - 2) - 1) + n
                        },
                        onStart: function(e, t) {},
                        onStep: function(e, t, n) {},
                        onStop: function(e, t) {}
                    };
                    i.renderer = t;
                    var o = {},
                        r = 0,
                        a = function() {
                            for (var t in this.el = e, this.options = o, i) i.hasOwnProperty(t) && (o[t] = n && void 0 !== n[t] ? n[t] : i[t], "function" == typeof o[t] && (o[t] = o[t].bind(this)));
                            "string" == typeof o.easing && "undefined" != typeof jQuery && jQuery.isFunction(jQuery.easing[o.easing]) ? o.easing = jQuery.easing[o.easing] : o.easing = i.easing, "number" == typeof o.animate && (o.animate = {
                                duration: o.animate,
                                enabled: !0
                            }), "boolean" != typeof o.animate || o.animate || (o.animate = {
                                duration: 1e3,
                                enabled: o.animate
                            }), this.renderer = new o.renderer(e, o), this.renderer.draw(r), e.dataset && e.dataset.percent ? this.update(parseFloat(e.dataset.percent)) : e.getAttribute && e.getAttribute("data-percent") && this.update(parseFloat(e.getAttribute("data-percent")))
                        }.bind(this);
                    this.update = function(e) {
                        return e = parseFloat(e), o.animate.enabled ? this.renderer.animate(r, e) : this.renderer.draw(e), r = e, this
                    }.bind(this), this.disableAnimation = function() {
                        return o.animate.enabled = !1, this
                    }, this.enableAnimation = function() {
                        return o.animate.enabled = !0, this
                    }, a()
                }(this, i)))
            })
        }
    }),
    function(e) {
        var t = "input[type=range]",
            n = !1,
            i = void 0;
        e(document).on("change", t, function() {
            var t = e(this);
            t.siblings(".thumb").find(".value").html(t.val())
        }), e(document).on("input mousedown touchstart", t, function(o) {
            var r = e(this),
                a = r.siblings(".thumb"),
                s = r.outerWidth();
            if (!a.length && function() {
                var n = e('<span class="thumb"><span class="value"></span></span>');
                e(t).after(n)
            }(), a.find(".value").html(r.val()), n = !0, r.addClass("active"), a.hasClass("active") || a.velocity({
                height: "30px",
                width: "30px",
                top: "-20px",
                marginLeft: "-15px"
            }, {
                duration: 300,
                easing: "easeOutExpo"
            }), "input" !== o.type) {
                var l = void 0 === o.pageX || null === o.pageX;
                (i = l ? o.originalEvent.touches[0].pageX - e(this).offset().left : o.pageX - e(this).offset().left) < 0 ? i = 0 : i > s && (i = s), a.addClass("active").css("left", i)
            }
            a.find(".value").html(r.val())
        }), e(document).on("mouseup touchend", ".range-field", function() {
            n = !1, e(this).removeClass("active")
        }), e(document).on("mousemove touchmove", ".range-field", function(i) {
            var o = e(this).children(".thumb"),
                r = void 0;
            if (n) {
                o.hasClass("active") || o.velocity({
                    height: "30px",
                    width: "30px",
                    top: "-20px",
                    marginLeft: "-15px"
                }, {
                    duration: 300,
                    easing: "easeOutExpo"
                }), r = void 0 === i.pageX || null === i.pageX ? i.originalEvent.touches[0].pageX - e(this).offset().left : i.pageX - e(this).offset().left;
                var a = e(this).outerWidth();
                r < 0 ? r = 0 : r > a && (r = a), o.addClass("active").css("left", r), o.find(".value").html(o.siblings(t).val())
            }
        }), e(document).on("mouseout touchleave", ".range-field", function() {
            if (!n) {
                var t = e(this).children(".thumb");
                t.hasClass("active") && t.velocity({
                    height: "0",
                    width: "0",
                    top: "10px",
                    marginLeft: "-6px"
                }, {
                    duration: 100
                }), t.removeClass("active")
            }
        })
    }(jQuery),
    function(e) {
        e(document).on("change", '.file-field input[type="file"]', function(t) {
            for (var n = e(t.target), i = n.closest(".file-field").find("input.file-path"), o = n[0].files, r = [], a = 0; a < o.length; a++) {
                var s = o[a].name;
                r.push(s)
            }
            i.val(r.join(", ")), i.trigger("change")
        })
    }(jQuery),
    function(e) {
        e.fn.material_select = function(t) {
            function n(e, t, n) {
                var i = e.indexOf(t),
                    o = -1 === i;
                return o ? e.push(t) : e.splice(i, 1), n.siblings("ul.dropdown-content").find("li:not(.optgroup)").eq(t).toggleClass("active"), n.find("option").eq(t).prop("selected", o),
                    function(e, t) {
                        for (var n = "", i = 0, o = e.length; i < o; i++) {
                            var r = t.find("option").eq(e[i]).text();
                            n += 0 === i ? r : ", " + r
                        }
                        "" === n && (n = t.find("option:disabled").eq(0).text());
                        t.siblings("input.select-dropdown").val(n)
                    }(e, n), o
            }
            e(this).each(function() {
                var i = e(this);
                if (!i.hasClass("browser-default")) {
                    var o = Boolean(i.attr("multiple")),
                        r = i.data("select-id");
                    if (r && (i.parent().find("span.caret").remove(), i.parent().find("input").remove(), i.unwrap(), e("ul#select-options-" + r).remove()), "destroy" !== t) {
                        var a, s = (a = (new Date).getTime(), "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(e) {
                            var t = (a + 16 * Math.random()) % 16 | 0;
                            return a = Math.floor(a / 16), ("x" == e ? t : 3 & t | 8).toString(16)
                        }));
                        i.data("select-id", s);
                        var l = e('<div class="select-wrapper"></div>');
                        l.addClass(i.attr("class"));
                        var c, u, d = e('<ul id="select-options-' + s + '" class="dropdown-content select-dropdown ' + (o ? "multiple-select-dropdown" : "") + '"></ul>'),
                            f = i.children("option, optgroup"),
                            h = [],
                            p = !1,
                            g = i.find("option:selected").html() || i.find("option:first").html() || "",
                            m = function() {
                                var t = e(this).closest("ul"),
                                    n = e(this).val();
                                t.find("li").find("span.filtrable").each(function() {
                                    "string" == typeof this.outerHTML && (-1 === this.textContent.toLowerCase().indexOf(n.toLowerCase()) ? (e(this).hide(), e(this).parent().hide()) : (e(this).show(), e(this).parent().show()))
                                })
                            },
                            v = Boolean(i.attr("searchable"));
                        v && (c = i.attr("searchable"), u = e('<span class="search-wrap ml-2"><div class="md-form mt-0"><input type="text" class="search form-control" placeholder="' + c + '"></div></span>'), d.append(u), u.find(".search").keyup(m));
                        var y = function(t, n, i) {
                            var o = n.is(":disabled") ? "disabled " : "",
                                r = "optgroup-option" === i ? "optgroup-option " : "",
                                a = n.data("icon"),
                                s = n.attr("class");
                            if (a) {
                                var l = "";
                                return s && (l = ' class="' + s + '"'), "multiple" === i ? d.append(e('<li class="' + o + '"><img alt="" src="' + a + '"' + l + '><span class="filtrable"><input type="checkbox"' + o + "/><label></label>" + n.html() + "</span></li>")) : d.append(e('<li class="' + o + r + '"><img alt="" src="' + a + '"' + l + '><span class="filtrable">' + n.html() + "</span></li>")), !0
                            }
                            "multiple" === i ? d.append(e('<li class="' + o + '"><span class="filtrable"><input type="checkbox"' + o + "/><label></label>" + n.html() + "</span></li>")) : d.append(e('<li class="' + o + r + '"><span class="filtrable">' + n.html() + "</span></li>"))
                        };
                        f.length && f.each(function() {
                            if (e(this).is("option")) o ? y(0, e(this), "multiple") : y(0, e(this));
                            else if (e(this).is("optgroup")) {
                                var t = e(this).children("option");
                                d.append(e('<li class="optgroup"><span>' + e(this).attr("label") + "</span></li>")), t.each(function() {
                                    y(0, e(this), "optgroup-option")
                                })
                            }
                        });
                        var b = !1;
                        i.find("optgroup").length && (b = !0);
                        var x = i.parent().find("button.btn-save");
                        x.length && (d.append(x), x.on("click", function() {
                            e("input.select-dropdown").trigger("close")
                        })), d.find("li:not(.optgroup)").each(function(r) {
                            e(this).click(function(a) {
                                if (!e(this).hasClass("disabled") && !e(this).hasClass("optgroup")) {
                                    var s = !0;
                                    o ? (e('input[type="checkbox"]', this).prop("checked", function(e, t) {
                                        return !t
                                    }), s = n(h, v ? b ? e(this).index() - e(this).prevAll(".optgroup").length - 1 : e(this).index() - 1 : b ? e(this).index() - e(this).prevAll(".optgroup").length : e(this).index(), i), k.trigger("focus")) : (d.find("li").removeClass("active"), e(this).toggleClass("active"), k.val(e(this).text())), T(d, e(this)), i.find("option").eq(r).prop("selected", s), i.trigger("change"), void 0 !== t && t()
                                }
                                a.stopPropagation()
                            })
                        }), i.wrap(l);
                        var w = e('<span class="caret">&#9660;</span>');
                        i.is(":disabled") && w.addClass("disabled");
                        var C = g.replace(/"/g, "&quot;"),
                            k = e('<input type="text" class="select-dropdown" readonly="true" ' + (i.is(":disabled") ? "disabled" : "") + ' data-activates="select-options-' + s + '" value="' + C + '"/>');
                        i.before(k), k.before(w), k.after(d), i.is(":disabled") || k.dropdown({
                            hover: !1,
                            closeOnClick: !1
                        }), i.attr("tabindex") && e(k[0]).attr("tabindex", i.attr("tabindex")), i.addClass("initialized"), k.on({
                            focus: function() {
                                if (e("ul.select-dropdown").not(d[0]).is(":visible") && e("input.select-dropdown").trigger("close"), !d.is(":visible")) {
                                    e(this).trigger("open", ["focus"]);
                                    var t = e(this).val(),
                                        n = d.find("li").filter(function() {
                                            return e(this).text().toLowerCase() === t.toLowerCase()
                                        })[0];
                                    T(d, n)
                                }
                            },
                            click: function(e) {
                                e.stopPropagation()
                            }
                        }), k.on("blur", function() {
                            o || v || e(this).trigger("close"), d.find("li.selected").removeClass("selected")
                        }), !o && v && d.find("li").on("click", function() {
                            k.trigger("close")
                        }), d.hover(function() {
                            p = !0
                        }, function() {
                            p = !1
                        }), d.on("mousedown", function(t) {
                            e(".modal-content").find(d).length && this.scrollHeight > this.offsetHeight && t.preventDefault()
                        }), e(window).on({
                            click: function() {
                                (o || v) && (p || k.trigger("close"))
                            }
                        }), o && i.find("option:selected:not(:disabled)").each(function() {
                            var t = e(this).index();
                            n(h, t, i), d.find("li").eq(t).find(":checkbox").prop("checked", !0)
                        });
                        var T = function(t, n) {
                                n && (t.find("li.selected").removeClass("selected"), e(n).addClass("selected"))
                            },
                            _ = [];
                        k.on("keydown", function(t) {
                            if (9 != t.which)
                                if (40 != t.which || d.is(":visible")) {
                                    if (13 != t.which || d.is(":visible")) {
                                        t.preventDefault();
                                        var n = String.fromCharCode(t.which).toLowerCase();
                                        if (n && -1 === [9, 13, 27, 38, 40].indexOf(t.which)) {
                                            _.push(n);
                                            var i = _.join(""),
                                                r = d.find("li").filter(function() {
                                                    return 0 === e(this).text().toLowerCase().indexOf(i)
                                                })[0];
                                            r && T(d, r)
                                        }
                                        if (13 == t.which) {
                                            var a = d.find("li.selected:not(.disabled)")[0];
                                            a && (e(a).trigger("click"), o || k.trigger("close"))
                                        }
                                        40 == t.which && (r = d.find("li.selected").length ? d.find("li.selected").next("li:not(.disabled)")[0] : d.find("li:not(.disabled)")[0], T(d, r)), 27 == t.which && k.trigger("close"), 38 == t.which && (r = d.find("li.selected").prev("li:not(.disabled)")[0]) && T(d, r), setTimeout(function() {
                                            _ = []
                                        }, 1e3)
                                    }
                                } else k.trigger("open");
                            else k.trigger("close")
                        })
                    } else i.data("select-id", null).removeClass("initialized")
                }
            })
        }
    }(jQuery), jQuery("select").siblings("input.select-dropdown").on("mousedown", function(e) {
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && (e.clientX >= e.target.clientWidth || e.clientY >= e.target.clientHeight) && e.preventDefault()
}),
    function(e) {
        "function" == typeof define && define.amd ? define("picker", ["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : this.Picker = e(jQuery)
    }(function(e) {
        var t = e(window),
            n = e(document),
            i = e(document.documentElement),
            o = null != document.documentElement.style.transition;

        function r(t, l, u, d) {
            if (!t) return r;
            var f = !1,
                h = {
                    id: t.id || "P" + Math.abs(~~(Math.random() * new Date))
                },
                p = u ? e.extend(!0, {}, u.defaults, d) : d || {},
                g = e.extend({}, r.klasses(), p.klass),
                m = e(t),
                v = function() {
                    return this.start()
                },
                y = v.prototype = {
                    constructor: v,
                    $node: m,
                    start: function() {
                        return h && h.start ? y : (h.methods = {}, h.start = !0, h.open = !1, h.type = t.type, t.autofocus = t == c(), t.readOnly = !p.editable, t.id = t.id || h.id, "text" != t.type && (t.type = "text"), y.component = new u(y, p), y.$root = e('<div class="' + g.picker + '" id="' + t.id + '_root" />'), s(y.$root[0], "hidden", !0), y.$holder = e(b()).appendTo(y.$root), x(), p.formatSubmit && function() {
                            var n;
                            !0 === p.hiddenName ? (n = t.name, t.name = "") : n = (n = ["string" == typeof p.hiddenPrefix ? p.hiddenPrefix : "", "string" == typeof p.hiddenSuffix ? p.hiddenSuffix : "_submit"])[0] + t.name + n[1];
                            y._hidden = e('<input type=hidden name="' + n + '"' + (m.data("value") || t.value ? ' value="' + y.get("select", p.formatSubmit) + '"' : "") + ">")[0], m.on("change." + h.id, function() {
                                y._hidden.value = t.value ? y.get("select", p.formatSubmit) : ""
                            })
                        }(), function() {
                            m.data(l, y).addClass(g.input).val(m.data("value") ? y.get("select", p.format) : t.value), p.editable || m.on("focus." + h.id + " click." + h.id, function(e) {
                                e.preventDefault(), y.open()
                            }).on("keydown." + h.id, C);
                            s(t, {
                                haspopup: !0,
                                expanded: !1,
                                readonly: !1,
                                owns: t.id + "_root"
                            })
                        }(), p.containerHidden ? e(p.containerHidden).append(y._hidden) : m.after(y._hidden), p.container ? e(p.container).append(y.$root) : m.after(y.$root), y.on({
                            start: y.component.onStart,
                            render: y.component.onRender,
                            stop: y.component.onStop,
                            open: y.component.onOpen,
                            close: y.component.onClose,
                            set: y.component.onSet
                        }).on({
                            start: p.onStart,
                            render: p.onRender,
                            stop: p.onStop,
                            open: p.onOpen,
                            close: p.onClose,
                            set: p.onSet
                        }), f = function(e) {
                            var t;
                            e.currentStyle ? t = e.currentStyle.position : window.getComputedStyle && (t = getComputedStyle(e).position);
                            return "fixed" == t
                        }(y.$holder[0]), t.autofocus && y.open(), y.trigger("start").trigger("render"))
                    },
                    render: function(t) {
                        return t ? (y.$holder = e(b()), x(), y.$root.html(y.$holder)) : y.$root.find("." + g.box).html(y.component.nodes(h.open)), y.trigger("render")
                    },
                    stop: function() {
                        return h.start ? (y.close(), y._hidden && y._hidden.parentNode.removeChild(y._hidden), y.$root.remove(), m.removeClass(g.input).removeData(l), setTimeout(function() {
                            m.off("." + h.id)
                        }, 0), t.type = h.type, t.readOnly = !1, y.trigger("stop"), h.methods = {}, h.start = !1, y) : y
                    },
                    open: function(l) {
                        return h.open ? y : (m.addClass(g.active), s(t, "expanded", !0), setTimeout(function() {
                            y.$root.addClass(g.opened), s(y.$root[0], "hidden", !1)
                        }, 0), !1 !== l && (h.open = !0, f && i.css("overflow", "hidden").css("padding-right", "+=" + a()), f && o ? y.$holder.find("." + g.frame).one("transitionend", function() {
                            y.$holder[0].focus()
                            y.$holder[0].focus()
                        }) : y.$holder[0].focus(), n.on("click." + h.id + " focusin." + h.id, function(e) {
                            var n = e.target;
                            n != t && n != document && 3 != e.which && y.close(n === y.$holder[0])
                        }).on("keydown." + h.id, function(t) {
                            var n = t.keyCode,
                                i = y.component.key[n],
                                o = t.target;
                            27 == n ? y.close(!0) : o != y.$holder[0] || !i && 13 != n ? e.contains(y.$root[0], o) && 13 == n && (t.preventDefault(), o.click()) : (t.preventDefault(), i ? r._.trigger(y.component.key.go, y, [r._.trigger(i)]) : y.$root.find("." + g.highlighted).hasClass(g.disabled) || (y.set("select", y.component.item.highlight), p.closeOnSelect && y.close(!0)))
                        })), y.trigger("open"))
                    },
                    close: function(e) {
                        return e && (p.editable ? t.focus() : (y.$holder.off("focus.toOpen").focus(), setTimeout(function() {
                            y.$holder.on("focus.toOpen", w)
                        }, 0))), m.removeClass(g.active), s(t, "expanded", !1), setTimeout(function() {
                            y.$root.removeClass(g.opened + " " + g.focused), s(y.$root[0], "hidden", !0)
                        }, 0), h.open ? (h.open = !1, f && i.css("overflow", "").css("padding-right", "-=" + a()), n.off("." + h.id), y.trigger("close")) : y
                    },
                    clear: function(e) {
                        return y.set("clear", null, e)
                    },
                    set: function(t, n, i) {
                        var o, r, a = e.isPlainObject(t),
                            s = a ? t : {};
                        if (i = a && e.isPlainObject(n) ? n : i || {}, t) {
                            for (o in a || (s[t] = n), s) r = s[o], o in y.component.item && (void 0 === r && (r = null), y.component.set(o, r, i)), "select" != o && "clear" != o || m.val("clear" == o ? "" : y.get(o, p.format)).trigger("change");
                            y.render()
                        }
                        return i.muted ? y : y.trigger("set", s)
                    },
                    get: function(e, n) {
                        if (null != h[e = e || "value"]) return h[e];
                        if ("valueSubmit" == e) {
                            if (y._hidden) return y._hidden.value;
                            e = "value"
                        }
                        if ("value" == e) return t.value;
                        if (e in y.component.item) {
                            if ("string" == typeof n) {
                                var i = y.component.get(e);
                                return i ? r._.trigger(y.component.formats.toString, y.component, [n, i]) : ""
                            }
                            return y.component.get(e)
                        }
                    },
                    on: function(t, n, i) {
                        var o, r, a = e.isPlainObject(t),
                            s = a ? t : {};
                        if (t)
                            for (o in a || (s[t] = n), s) r = s[o], i && (o = "_" + o), h.methods[o] = h.methods[o] || [], h.methods[o].push(r);
                        return y
                    },
                    off: function() {
                        var e, t, n = arguments;
                        for (e = 0, namesCount = n.length; e < namesCount; e += 1)(t = n[e]) in h.methods && delete h.methods[t];
                        return y
                    },
                    trigger: function(e, t) {
                        var n = function(e) {
                            var n = h.methods[e];
                            n && n.map(function(e) {
                                r._.trigger(e, y, [t])
                            })
                        };
                        return n("_" + e), n(e), y
                    }
                };

            function b() {
                return r._.node("div", r._.node("div", r._.node("div", r._.node("div", y.component.nodes(h.open), g.box), g.wrap), g.frame), g.holder, 'tabindex="-1"')
            }

            function x() {
                y.$holder.on({
                    keydown: C,
                    "focus.toOpen": w,
                    blur: function() {
                        m.removeClass(g.target)
                    },
                    focusin: function(e) {
                        y.$root.removeClass(g.focused), e.stopPropagation()
                    },
                    "mousedown click": function(t) {
                        var n = t.target;
                        n != y.$holder[0] && (t.stopPropagation(), "mousedown" != t.type || e(n).is("input, select, textarea, button, option") || (t.preventDefault(), y.$holder[0].focus()))
                    }
                }).on("click", "[data-pick], [data-nav], [data-clear], [data-close]", function() {
                    var t = e(this),
                        n = t.data(),
                        i = t.hasClass(g.navDisabled) || t.hasClass(g.disabled),
                        o = c();
                    o = o && (o.type || o.href), (i || o && !e.contains(y.$root[0], o)) && y.$holder[0].focus(), !i && n.nav ? y.set("highlight", y.component.item.highlight, {
                        nav: n.nav
                    }) : !i && "pick" in n ? (y.set("select", n.pick), p.closeOnSelect && y.close(!0)) : n.clear ? (y.clear(), p.closeOnClear && y.close(!0)) : n.close && y.close(!0)
                })
            }

            function w(e) {
                e.stopPropagation(), m.addClass(g.target), y.$root.addClass(g.focused), y.open()
            }

            function C(e) {
        
                var t = e.keyCode,
                    n = /^(8|46)$/.test(t);
                if (27 == t) return y.close(!0), !1;
                (32 == t || n || !h.open && y.component.key[t]) && (e.preventDefault(), e.stopPropagation(), n ? y.clear().close() : y.open())

            }
            return new v
        }

        function a() {
            if (i.height() <= t.height()) return 0;
            var n = e('<div style="visibility:hidden;width:100px" />').appendTo("body"),
                o = n[0].offsetWidth;
            n.css("overflow", "scroll");
            var r = e('<div style="width:100%" />').appendTo(n)[0].offsetWidth;
            return n.remove(), o - r
        }

        function s(t, n, i) {
            if (e.isPlainObject(n))
                for (var o in n) l(t, o, n[o]);
            else l(t, n, i)
        }

        function l(e, t, n) {
            e.setAttribute(("role" == t ? "" : "aria-") + t, n)
        }

        function c() {
            try {
                return document.activeElement
            } catch (e) {}
        }
        return r.klasses = function(e) {
            return {
                picker: e = e || "picker",
                opened: e + "--opened",
                focused: e + "--focused",
                input: e + "__input",
                active: e + "__input--active",
                target: e + "__input--target",
                holder: e + "__holder",
                frame: e + "__frame",
                wrap: e + "__wrap",
                box: e + "__box"
            }
        }, r._ = {
            group: function(e) {
                for (var t, n = "", i = r._.trigger(e.min, e); i <= r._.trigger(e.max, e, [i]); i += e.i) t = r._.trigger(e.item, e, [i]), n += r._.node(e.node, t[0], t[1], t[2]);
                return n
            },
            node: function(t, n, i, o) {
                return n ? (n = e.isArray(n) ? n.join("") : n, "<" + t + (i = i ? ' class="' + i + '"' : "") + (o = o ? " " + o : "") + ">" + n + "</" + t + ">") : ""
            },
            lead: function(e) {
                return (e < 10 ? "0" : "") + e
            },
            trigger: function(e, t, n) {
                return "function" == typeof e ? e.apply(t, n || []) : e
            },
            digits: function(e) {
                return /\d/.test(e[1]) ? 2 : 1
            },
            isDate: function(e) {
                return {}.toString.call(e).indexOf("Date") > -1 && this.isInteger(e.getDate())
            },
            isInteger: function(e) {
                return {}.toString.call(e).indexOf("Number") > -1 && e % 1 == 0
            },
            ariaAttr: function(t, n) {
                e.isPlainObject(t) || (t = {
                    attribute: n
                });
                for (var i in n = "", t) {
                    var o = ("role" == i ? "" : "aria-") + i,
                        r = t[i];
                    n += null == r ? "" : o + '="' + t[i] + '"'
                }
                return n
            }
        }, r.extend = function(t, n) {
            e.fn[t] = function(i, o) {
                var a = this.data(t);
                return "picker" == i ? a : a && "string" == typeof i ? r._.trigger(a[i], a, [o]) : this.each(function() {
                    e(this).data(t) || new r(this, t, n, i)
                })
            }, e.fn[t].defaults = n.defaults
        }, r
    }),
    function(e) {
        "function" == typeof define && define.amd ? define(["picker", "jquery"], e) : "object" == typeof exports ? module.exports = e(require("./picker.js"), require("jquery")) : e(Picker, jQuery)
    }(function(e, t) {
        var n, i = e._;

        function o(e, t) {
            var n, i = this,
                o = e.$node[0],
                r = o.value,
                a = e.$node.data("value"),
                s = a || r,
                l = a ? t.formatSubmit : t.format,
                c = function() {
                    return o.currentStyle ? "rtl" == o.currentStyle.direction : "rtl" == getComputedStyle(e.$root[0]).direction
                };
            i.settings = t, i.$node = e.$node, i.queue = {
                min: "measure create",
                max: "measure create",
                now: "now create",
                select: "parse create validate",
                highlight: "parse navigate create validate",
                view: "parse create validate viewset",
                disable: "deactivate",
                enable: "activate"
            }, i.item = {}, i.item.clear = null, i.item.disable = (t.disable || []).slice(0), i.item.enable = -(!0 === (n = i.item.disable)[0] ? n.shift() : -1), i.set("min", t.min).set("max", t.max).set("now"), s ? i.set("select", s, {
                format: l,
                defaultValue: !0
            }) : i.set("select", null).set("highlight", i.item.now), i.key = {
                40: 7,
                38: -7,
                39: function() {
                    return c() ? -1 : 1
                },
                37: function() {
                    return c() ? 1 : -1
                },
                go: function(e) {
                    var t = i.item.highlight,
                        n = new Date(t.year, t.month, t.date + e);
                    i.set("highlight", n, {
                        interval: e
                    }), this.render()
                }
            }, e.on("render", function() {
                e.$root.find("." + t.klass.selectMonth).on("change", function() {
                    var n = this.value;
                    n && (e.set("highlight", [e.get("view").year, n, e.get("highlight").date]), e.$root.find("." + t.klass.selectMonth).trigger("focus"))
                }), e.$root.find("." + t.klass.selectYear).on("change", function() {
                    var n = this.value;
                    n && (e.set("highlight", [n, e.get("view").month, e.get("highlight").date]), e.$root.find("." + t.klass.selectYear).trigger("focus"))
                })
            }, 1).on("open", function() {
                var n = "";
                i.disabled(i.get("now")) && (n = ":not(." + t.klass.buttonToday + ")"), e.$root.find("button" + n + ", select").attr("disabled", !1)
            }, 1).on("close", function() {
                e.$root.find("button, select").attr("disabled", !0)
            }, 1)
        }
        o.prototype.set = function(e, t, n) {
            var i = this,
                o = i.item;
            return null === t ? ("clear" == e && (e = "select"), o[e] = t, i) : (o["enable" == e ? "disable" : "flip" == e ? "enable" : e] = i.queue[e].split(" ").map(function(o) {
                return t = i[o](e, t, n)
            }).pop(), "select" == e ? i.set("highlight", o.select, n) : "highlight" == e ? i.set("view", o.highlight, n) : e.match(/^(flip|min|max|disable|enable)$/) && (o.select && i.disabled(o.select) && i.set("select", o.select, n), o.highlight && i.disabled(o.highlight) && i.set("highlight", o.highlight, n)), i)
        }, o.prototype.get = function(e) {
            return this.item[e]
        }, o.prototype.create = function(e, n, o) {
            var r;
            return (n = void 0 === n ? e : n) == -1 / 0 || n == 1 / 0 ? r = n : t.isPlainObject(n) && i.isInteger(n.pick) ? n = n.obj : t.isArray(n) ? (n = new Date(n[0], n[1], n[2]), n = i.isDate(n) ? n : this.create().obj) : n = i.isInteger(n) || i.isDate(n) ? this.normalize(new Date(n), o) : this.now(e, n, o), {
                year: r || n.getFullYear(),
                month: r || n.getMonth(),
                date: r || n.getDate(),
                day: r || n.getDay(),
                obj: r || n,
                pick: r || n.getTime()
            }
        }, o.prototype.createRange = function(e, n) {
            var o = this,
                r = function(e) {
                    return !0 === e || t.isArray(e) || i.isDate(e) ? o.create(e) : e
                };
            return i.isInteger(e) || (e = r(e)), i.isInteger(n) || (n = r(n)), i.isInteger(e) && t.isPlainObject(n) ? e = [n.year, n.month, n.date + e] : i.isInteger(n) && t.isPlainObject(e) && (n = [e.year, e.month, e.date + n]), {
                from: r(e),
                to: r(n)
            }
        }, o.prototype.withinRange = function(e, t) {
            return e = this.createRange(e.from, e.to), t.pick >= e.from.pick && t.pick <= e.to.pick
        }, o.prototype.overlapRanges = function(e, t) {
            return e = this.createRange(e.from, e.to), t = this.createRange(t.from, t.to), this.withinRange(e, t.from) || this.withinRange(e, t.to) || this.withinRange(t, e.from) || this.withinRange(t, e.to)
        }, o.prototype.now = function(e, t, n) {
            return t = new Date, n && n.rel && t.setDate(t.getDate() + n.rel), this.normalize(t, n)
        }, o.prototype.navigate = function(e, n, i) {
            var o, r, a, s, l = t.isArray(n),
                c = t.isPlainObject(n),
                u = this.item.view;
            if (l || c) {
                for (c ? (r = n.year, a = n.month, s = n.date) : (r = +n[0], a = +n[1], s = +n[2]), i && i.nav && u && u.month !== a && (r = u.year, a = u.month), r = (o = new Date(r, a + (i && i.nav ? i.nav : 0), 1)).getFullYear(), a = o.getMonth(); new Date(r, a, s).getMonth() !== a;) s -= 1;
                n = [r, a, s]
            }
            return n
        }, o.prototype.normalize = function(e) {
            return e.setHours(0, 0, 0, 0), e
        }, o.prototype.measure = function(e, t) {
            return t ? "string" == typeof t ? t = this.parse(e, t) : i.isInteger(t) && (t = this.now(e, t, {
                rel: t
            })) : t = "min" == e ? -1 / 0 : 1 / 0, t
        }, o.prototype.viewset = function(e, t) {
            return this.create([t.year, t.month, 1])
        }, o.prototype.validate = function(e, n, o) {
            var r, a, s, l, c = this,
                u = n,
                d = o && o.interval ? o.interval : 1,
                f = -1 === c.item.enable,
                h = c.item.min,
                p = c.item.max,
                g = f && c.item.disable.filter(function(e) {
                    if (t.isArray(e)) {
                        var o = c.create(e).pick;
                        o < n.pick ? r = !0 : o > n.pick && (a = !0)
                    }
                    return i.isInteger(e)
                }).length;
            if ((!o || !o.nav && !o.defaultValue) && (!f && c.disabled(n) || f && c.disabled(n) && (g || r || a) || !f && (n.pick <= h.pick || n.pick >= p.pick)))
                for (f && !g && (!a && d > 0 || !r && d < 0) && (d *= -1); c.disabled(n) && (Math.abs(d) > 1 && (n.month < u.month || n.month > u.month) && (n = u, d = d > 0 ? 1 : -1), n.pick <= h.pick ? (s = !0, d = 1, n = c.create([h.year, h.month, h.date + (n.pick === h.pick ? 0 : -1)])) : n.pick >= p.pick && (l = !0, d = -1, n = c.create([p.year, p.month, p.date + (n.pick === p.pick ? 0 : 1)])), !s || !l);) n = c.create([n.year, n.month, n.date + d]);
            return n
        }, o.prototype.disabled = function(e) {
            var n = this,
                o = n.item.disable.filter(function(o) {
                    return i.isInteger(o) ? e.day === (n.settings.firstDay ? o : o - 1) % 7 : t.isArray(o) || i.isDate(o) ? e.pick === n.create(o).pick : t.isPlainObject(o) ? n.withinRange(o, e) : void 0
                });
            return o = o.length && !o.filter(function(e) {
                return t.isArray(e) && "inverted" == e[3] || t.isPlainObject(e) && e.inverted
            }).length, -1 === n.item.enable ? !o : o || e.pick < n.item.min.pick || e.pick > n.item.max.pick
        }, o.prototype.parse = function(e, t, n) {
            var o = this,
                r = {};
            return t && "string" == typeof t ? (n && n.format || ((n = n || {}).format = o.settings.format), o.formats.toArray(n.format).map(function(e) {
                var n = o.formats[e],
                    a = n ? i.trigger(n, o, [t, r]) : e.replace(/^!/, "").length;
                n && (r[e] = t.substr(0, a)), t = t.substr(a)
            }), [r.yyyy || r.yy, +(r.mm || r.m) - 1, r.dd || r.d]) : t
        }, o.prototype.formats = function() {
            function e(e, t, n) {
                var i = e.match(/[^\x00-\x7F]+|\w+/)[0];
                return n.mm || n.m || (n.m = t.indexOf(i) + 1), i.length
            }

            function t(e) {
                return e.match(/\w+/)[0].length
            }
            return {
                d: function(e, t) {
                    return e ? i.digits(e) : t.date
                },
                dd: function(e, t) {
                    return e ? 2 : i.lead(t.date)
                },
                ddd: function(e, n) {
                    return e ? t(e) : this.settings.weekdaysShort[n.day]
                },
                dddd: function(e, n) {
                    return e ? t(e) : this.settings.weekdaysFull[n.day]
                },
                m: function(e, t) {
                    return e ? i.digits(e) : t.month + 1
                },
                mm: function(e, t) {
                    return e ? 2 : i.lead(t.month + 1)
                },
                mmm: function(t, n) {
                    var i = this.settings.monthsShort;
                    return t ? e(t, i, n) : i[n.month]
                },
                mmmm: function(t, n) {
                    var i = this.settings.monthsFull;
                    return t ? e(t, i, n) : i[n.month]
                },
                yy: function(e, t) {
                    return e ? 2 : ("" + t.year).slice(2)
                },
                yyyy: function(e, t) {
                    return e ? 4 : t.year
                },
                toArray: function(e) {
                    return e.split(/(d{1,4}|m{1,4}|y{4}|yy|!.)/g)
                },
                toString: function(e, t) {
                    var n = this;
                    return n.formats.toArray(e).map(function(e) {
                        return i.trigger(n.formats[e], n, [0, t]) || e.replace(/^!/, "")
                    }).join("")
                }
            }
        }(), o.prototype.isDateExact = function(e, n) {
            return i.isInteger(e) && i.isInteger(n) || "boolean" == typeof e && "boolean" == typeof n ? e === n : (i.isDate(e) || t.isArray(e)) && (i.isDate(n) || t.isArray(n)) ? this.create(e).pick === this.create(n).pick : !(!t.isPlainObject(e) || !t.isPlainObject(n)) && (this.isDateExact(e.from, n.from) && this.isDateExact(e.to, n.to))
        }, o.prototype.isDateOverlap = function(e, n) {
            var o = this.settings.firstDay ? 1 : 0;
            return i.isInteger(e) && (i.isDate(n) || t.isArray(n)) ? (e = e % 7 + o) === this.create(n).day + 1 : i.isInteger(n) && (i.isDate(e) || t.isArray(e)) ? (n = n % 7 + o) === this.create(e).day + 1 : !(!t.isPlainObject(e) || !t.isPlainObject(n)) && this.overlapRanges(e, n)
        }, o.prototype.flipEnable = function(e) {
            var t = this.item;
            t.enable = e || (-1 == t.enable ? 1 : -1)
        }, o.prototype.deactivate = function(e, n) {
            var o = this,
                r = o.item.disable.slice(0);
            return "flip" == n ? o.flipEnable() : !1 === n ? (o.flipEnable(1), r = []) : !0 === n ? (o.flipEnable(-1), r = []) : n.map(function(e) {
                for (var n, a = 0; a < r.length; a += 1)
                    if (o.isDateExact(e, r[a])) {
                        n = !0;
                        break
                    }
                n || (i.isInteger(e) || i.isDate(e) || t.isArray(e) || t.isPlainObject(e) && e.from && e.to) && r.push(e)
            }), r
        }, o.prototype.activate = function(e, n) {
            var o = this,
                r = o.item.disable,
                a = r.length;
            return "flip" == n ? o.flipEnable() : !0 === n ? (o.flipEnable(1), r = []) : !1 === n ? (o.flipEnable(-1), r = []) : n.map(function(e) {
                var n, s, l, c;
                for (l = 0; l < a; l += 1) {
                    if (s = r[l], o.isDateExact(s, e)) {
                        n = r[l] = null, c = !0;
                        break
                    }
                    if (o.isDateOverlap(s, e)) {
                        t.isPlainObject(e) ? (e.inverted = !0, n = e) : t.isArray(e) ? (n = e)[3] || n.push("inverted") : i.isDate(e) && (n = [e.getFullYear(), e.getMonth(), e.getDate(), "inverted"]);
                        break
                    }
                }
                if (n)
                    for (l = 0; l < a; l += 1)
                        if (o.isDateExact(r[l], e)) {
                            r[l] = null;
                            break
                        }
                if (c)
                    for (l = 0; l < a; l += 1)
                        if (o.isDateOverlap(r[l], e)) {
                            r[l] = null;
                            break
                        }
                n && r.push(n)
            }), r.filter(function(e) {
                return null != e
            })
        }, o.prototype.nodes = function(e) {
            var t, n, o = this,
                r = o.settings,
                a = o.item,
                s = a.now,
                l = a.select,
                c = a.highlight,
                u = a.view,
                d = a.disable,
                f = a.min,
                h = a.max,
                p = (t = (r.showWeekdaysFull ? r.weekdaysFull : r.weekdaysShort).slice(0), n = r.weekdaysFull.slice(0), r.firstDay && (t.push(t.shift()), n.push(n.shift())), i.node("thead", i.node("tr", i.group({
                    min: 0,
                    max: 6,
                    i: 1,
                    node: "th",
                    item: function(e) {
                        return [t[e], r.klass.weekdays, 'scope=col title="' + n[e] + '"']
                    }
                })))),
                g = function(e) {
                    return i.node("div", " ", r.klass["nav" + (e ? "Next" : "Prev")] + (e && u.year >= h.year && u.month >= h.month || !e && u.year <= f.year && u.month <= f.month ? " " + r.klass.navDisabled : ""), "data-nav=" + (e || -1) + " " + i.ariaAttr({
                        role: "button",
                        controls: o.$node[0].id + "_table"
                    }) + ' title="' + (e ? r.labelMonthNext : r.labelMonthPrev) + '"')
                },
                m = function() {
                    var t = r.showMonthsShort ? r.monthsShort : r.monthsFull;
                    return r.selectMonths ? i.node("select", i.group({
                        min: 0,
                        max: 11,
                        i: 1,
                        node: "option",
                        item: function(e) {
                            return [t[e], 0, "value=" + e + (u.month == e ? " selected" : "") + (u.year == f.year && e < f.month || u.year == h.year && e > h.month ? " disabled" : "")]
                        }
                    }), r.klass.selectMonth, (e ? "" : "disabled") + " " + i.ariaAttr({
                        controls: o.$node[0].id + "_table"
                    }) + ' title="' + r.labelMonthSelect + '"') : i.node("div", t[u.month], r.klass.month)
                },
                v = function() {
                    var t = u.year,
                        n = !0 === r.selectYears ? 5 : ~~(r.selectYears / 2);
                    if (n) {
                        var a = f.year,
                            s = h.year,
                            l = t - n,
                            c = t + n;
                        if (a > l && (c += a - l, l = a), s < c) {
                            var d = l - a,
                                p = c - s;
                            l -= d > p ? p : d, c = s
                        }
                        return i.node("select", i.group({
                            min: l,
                            max: c,
                            i: 1,
                            node: "option",
                            item: function(e) {
                                return [e, 0, "value=" + e + (t == e ? " selected" : "")]
                            }
                        }), r.klass.selectYear, (e ? "" : "disabled") + " " + i.ariaAttr({
                            controls: o.$node[0].id + "_table"
                        }) + ' title="' + r.labelYearSelect + '"')
                    }
                    return i.node("div", t, r.klass.year)
                };
            return i.node("div", (r.selectYears ? v() + m() : m() + v()) + g() + g(1), r.klass.header) + i.node("table", p + i.node("tbody", i.group({
                min: 0,
                max: 5,
                i: 1,
                node: "tr",
                item: function(e) {
                    var t = r.firstDay && 0 === o.create([u.year, u.month, 1]).day ? -7 : 0;
                    return [i.group({
                        min: 7 * e - u.day + t + 1,
                        max: function() {
                            return this.min + 7 - 1
                        },
                        i: 1,
                        node: "td",
                        item: function(e) {
                            e = o.create([u.year, u.month, e + (r.firstDay ? 1 : 0)]);
                            var t, n = l && l.pick == e.pick,
                                a = c && c.pick == e.pick,
                                p = d && o.disabled(e) || e.pick < f.pick || e.pick > h.pick,
                                g = i.trigger(o.formats.toString, o, [r.format, e]);
                            return [i.node("div", e.date, (t = [r.klass.day], t.push(u.month == e.month ? r.klass.infocus : r.klass.outfocus), s.pick == e.pick && t.push(r.klass.now), n && t.push(r.klass.selected), a && t.push(r.klass.highlighted), p && t.push(r.klass.disabled), t.join(" ")), "data-pick=" + e.pick + " " + i.ariaAttr({
                                role: "gridcell",
                                label: g,
                                selected: !(!n || o.$node.val() !== g) || null,
                                activedescendant: !!a || null,
                                disabled: !!p || null
                            })), "", i.ariaAttr({
                                role: "presentation"
                            })]
                        }
                    })]
                }
            })), r.klass.table, 'id="' + o.$node[0].id + '_table" ' + i.ariaAttr({
                role: "grid",
                controls: o.$node[0].id,
                readonly: !0
            })) + i.node("div", i.node("button", r.today, r.klass.buttonToday, "type=button data-pick=" + s.pick + (e && !o.disabled(s) ? "" : " disabled") + " " + i.ariaAttr({
                controls: o.$node[0].id
            })) + i.node("button", r.clear, r.klass.buttonClear, "type=button data-clear=1" + (e ? "" : " disabled") + " " + i.ariaAttr({
                controls: o.$node[0].id
            })) + i.node("button", r.close, r.klass.buttonClose, "type=button data-close=true " + (e ? "" : " disabled") + " " + i.ariaAttr({
                controls: o.$node[0].id
            })), r.klass.footer)
        }, o.defaults = {
            labelMonthNext: "Next month",
            labelMonthPrev: "Previous month",
            labelMonthSelect: "Select a month",
            labelYearSelect: "Select a year",
            monthsFull: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            weekdaysFull: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            weekdaysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            today: "Today",
            clear: "Clear",
            close: "Close",
            closeOnSelect: !0,
            closeOnClear: !0,
            format: "d mmmm, yyyy",
            klass: {
                table: (n = e.klasses().picker + "__") + "table",
                header: n + "header",
                navPrev: n + "nav--prev",
                navNext: n + "nav--next",
                navDisabled: n + "nav--disabled",
                month: n + "month",
                year: n + "year",
                selectMonth: n + "select--month",
                selectYear: n + "select--year",
                weekdays: n + "weekday",
                day: n + "day",
                disabled: n + "day--disabled",
                selected: n + "day--selected",
                highlighted: n + "day--highlighted",
                now: n + "day--today",
                infocus: n + "day--infocus",
                outfocus: n + "day--outfocus",
                footer: n + "footer",
                buttonClear: n + "button--clear",
                buttonToday: n + "button--today",
                buttonClose: n + "button--close"
            }
        }, e.extend("pickadate", o)
    }), $.extend($.fn.pickadate.defaults, {
    selectMonths: !0,
    selectYears: 15,
    onRender: function() {
        var e = this.$root,
            t = this.get("highlight", "yyyy"),
            n = this.get("highlight", "dd"),
            i = this.get("highlight", "mmm"),
            o = this.get("highlight", "dddd");
        e.find(".picker__header").prepend('<div class="picker__date-display"><div class="picker__weekday-display">' + o + '</div><div class="picker__month-display"><div>' + i + '</div></div><div class="picker__day-display"><div>' + n + '</div></div><div    class="picker__year-display"><div>' + t + "</div></div></div>")
    }
}),
    function() {
        var e, t, n, i = window.jQuery,
            o = i(window),
            r = i(document),
            a = "http://www.w3.org/2000/svg",
            s = "SVGAngle" in window && ((t = document.createElement("div")).innerHTML = "<svg/>", e = (t.firstChild && t.firstChild.namespaceURI) == a, t.innerHTML = "", e),
            l = "transition" in (n = document.createElement("div").style) || "WebkitTransition" in n || "MozTransition" in n || "msTransition" in n || "OTransition" in n,
            c = "ontouchstart" in window,
            u = "mousedown" + (c ? " touchstart" : ""),
            d = "mousemove.clockpicker" + (c ? " touchmove.clockpicker" : ""),
            f = "mouseup.clockpicker" + (c ? " touchend.clockpicker" : ""),
            h = navigator.vibrate ? "vibrate" : navigator.webkitVibrate ? "webkitVibrate" : null;

        function p(e) {
            return document.createElementNS(a, e)
        }

        function g(e) {
            return (e < 10 ? "0" : "") + e
        }
        var m = 0;
        var v = 135,
            y = 110,
            b = 80,
            x = 20,
            w = 2 * v,
            C = l ? 350 : 1,
            k = ['<div class="clockpicker picker">', '<div class="picker__holder">', '<div class="picker__frame">', '<div class="picker__wrap">', '<div class="picker__box">', '<div class="picker__date-display">', '<div class="clockpicker-display">', '<div class="clockpicker-display-column">', '<span class="clockpicker-span-hours text-primary"></span>', ":", '<span class="clockpicker-span-minutes"></span>', "</div>", '<div class="clockpicker-display-column clockpicker-display-am-pm">', '<div class="clockpicker-span-am-pm"></div>', "</div>", "</div>", "</div>", '<div class="picker__calendar-container">', '<div class="clockpicker-plate">', '<div class="clockpicker-canvas"></div>', '<div class="clockpicker-dial clockpicker-hours"></div>', '<div class="clockpicker-dial clockpicker-minutes clockpicker-dial-out"></div>', "</div>", '<div class="clockpicker-am-pm-block">', "</div>", "</div>", '<div class="picker__footer">', "</div>", "</div>", "</div>", "</div>", "</div>", "</div>"].join("");

        function T(e, t) {
            var n, o, a = i(k),
                l = a.find(".clockpicker-plate"),
                c = a.find(".picker__holder"),
                h = a.find(".clockpicker-hours"),
                T = a.find(".clockpicker-minutes"),
                S = a.find(".clockpicker-am-pm-block"),
                E = "INPUT" === e.prop("tagName"),
                A = E ? e : e.find("input"),
                I = (A.prop("type"), i("label[for=" + A.attr("id") + "]")),
                D = this;
            if (this.id = (o = ++m + "", (n = "cp") ? n + o : o), this.element = e, this.holder = c, this.options = t, this.isAppended = !1, this.isShown = !1, this.currentView = "hours", this.isInput = E, this.input = A, this.label = I, this.popover = a, this.plate = l, this.hoursView = h, this.minutesView = T, this.amPmBlock = S, this.spanHours = a.find(".clockpicker-span-hours"), this.spanMinutes = a.find(".clockpicker-span-minutes"), this.spanAmPm = a.find(".clockpicker-span-am-pm"), this.footer = a.find(".picker__footer"), this.amOrPm = "", t.twelvehour) {
                var P = ['<div class="clockpicker-am-pm-block">', '<button type="button" class="btn-floating btn-flat clockpicker-button clockpicker-am-button">', "AM", "</button>", '<button type="button" class="btn-floating btn-flat clockpicker-button clockpicker-pm-button">', "PM", "</button>", "</div>"].join("");
                i(P);
                t.ampmclickable ? (this.spanAmPm.empty(), i('<div id="click-am">AM</div>').on("click", function() {
                    D.spanAmPm.children("#click-am").addClass("text-primary"), D.spanAmPm.children("#click-pm").removeClass("text-primary"), D.amOrPm = "AM"
                }).appendTo(this.spanAmPm), i('<div id="click-pm">PM</div>').on("click", function() {
                    D.spanAmPm.children("#click-pm").addClass("text-primary"), D.spanAmPm.children("#click-am").removeClass("text-primary"), D.amOrPm = "PM"
                }).appendTo(this.spanAmPm)) : (i('<button type="button" class="btn-floating btn-flat clockpicker-button am-button" tabindex="1">AM</button>').on("click", function() {
                    D.amOrPm = "AM", D.amPmBlock.children(".pm-button").removeClass("active"), D.amPmBlock.children(".am-button").addClass("active"), D.spanAmPm.empty().append("AM")
                }).appendTo(this.amPmBlock), i('<button type="button" class="btn-floating btn-flat clockpicker-button pm-button" tabindex="2">PM</button>').on("click", function() {
                    D.amOrPm = "PM", D.amPmBlock.children(".am-button").removeClass("active"), D.amPmBlock.children(".pm-button").addClass("active"), D.spanAmPm.empty().append("PM")
                }).appendTo(this.amPmBlock))
            }
            t.darktheme && a.addClass("darktheme"), i('<button type="button" class="btn btn-flat clockpicker-button" tabindex="' + (t.twelvehour ? "3" : "1") + '">' + t.donetext + "</button>").click(i.proxy(this.done, this)).appendTo(this.footer), this.spanHours.click(i.proxy(this.toggleView, this, "hours")), this.spanMinutes.click(i.proxy(this.toggleView, this, "minutes")), A.on("focus.clockpicker click.clockpicker", i.proxy(this.show, this));
            var M, O, N, L, R = i('<div class="clockpicker-tick"></div>');
            if (t.twelvehour)
                for (M = 0; M < 12; M += t.hourstep) O = R.clone(), N = M / 6 * Math.PI, L = y, O.css("font-size", "140%"), O.css({
                    left: v + Math.sin(N) * L - x,
                    top: v - Math.cos(N) * L - x
                }), O.html(0 === M ? 12 : M), h.append(O), O.on(u, H);
            else
                for (M = 0; M < 24; M += t.hourstep) {
                    O = R.clone(), N = M / 6 * Math.PI;
                    var F = M > 0 && M < 13;
                    L = F ? b : y, O.css({
                        left: v + Math.sin(N) * L - x,
                        top: v - Math.cos(N) * L - x
                    }), F && O.css("font-size", "120%"), O.html(0 === M ? "00" : M), h.append(O), O.on(u, H)
                }
            var j = Math.max(t.minutestep, 5);
            for (M = 0; M < 60; M += j)
                for (M = 0; M < 60; M += 5) O = R.clone(), N = M / 30 * Math.PI, O.css({
                    left: v + Math.sin(N) * y - x,
                    top: v - Math.cos(N) * y - x
                }), O.css("font-size", "140%"), O.html(g(M)), T.append(O), O.on(u, H);

            function H(e, n) {
                var i = l.offset(),
                    o = /^touch/.test(e.type),
                    a = i.left + v,
                    c = i.top + v,
                    u = (o ? e.originalEvent.touches[0] : e).pageX - a,
                    h = (o ? e.originalEvent.touches[0] : e).pageY - c,
                    p = Math.sqrt(u * u + h * h),
                    g = !1;
                if (!n || !(p < y - x || p > y + x)) {
                    e.preventDefault();
                    var m = setTimeout(function() {
                        D.popover.addClass("clockpicker-moving")
                    }, 200);
                    s && l.append(D.canvas), D.setHand(u, h, !n, !0), r.off(d).on(d, function(e) {
                        e.preventDefault();
                        var t = /^touch/.test(e.type),
                            n = (t ? e.originalEvent.touches[0] : e).pageX - a,
                            i = (t ? e.originalEvent.touches[0] : e).pageY - c;
                        (g || n !== u || i !== h) && (g = !0, D.setHand(n, i, !1, !0))
                    }), r.off(f).on(f, function(e) {
                        r.off(f), e.preventDefault();
                        var i = /^touch/.test(e.type),
                            o = (i ? e.originalEvent.changedTouches[0] : e).pageX - a,
                            s = (i ? e.originalEvent.changedTouches[0] : e).pageY - c;
                        (n || g) && o === u && s === h && D.setHand(o, s), "hours" === D.currentView ? D.toggleView("minutes", C / 2) : t.autoclose && (D.minutesView.addClass("clockpicker-dial-out"), setTimeout(function() {
                            D.done()
                        }, C / 2)), l.prepend(W), clearTimeout(m), D.popover.removeClass("clockpicker-moving"), r.off(d)
                    })
                }
            }
            if (l.on(u, function(e) {
                0 === i(e.target).closest(".clockpicker-tick").length && H(e, !0)
            }), s) {
                var W = a.find(".clockpicker-canvas"),
                    B = p("svg");
                B.setAttribute("class", "clockpicker-svg"), B.setAttribute("width", w), B.setAttribute("height", w);
                var z = p("g");
                z.setAttribute("transform", "translate(" + v + "," + v + ")");
                var V = p("circle");
                V.setAttribute("class", "clockpicker-canvas-bearing"), V.setAttribute("cx", 0), V.setAttribute("cy", 0), V.setAttribute("r", 2);
                var q = p("line");
                q.setAttribute("x1", 0), q.setAttribute("y1", 0);
                var $ = p("circle");
                $.setAttribute("class", "clockpicker-canvas-bg"), $.setAttribute("r", x);
                var Y = p("circle");
                Y.setAttribute("class", "clockpicker-canvas-fg"), Y.setAttribute("r", 5), z.appendChild(q), z.appendChild($), z.appendChild(Y), z.appendChild(V), B.appendChild(z), W.append(B), this.hand = q, this.bg = $, this.fg = Y, this.bearing = V, this.g = z, this.canvas = W
            }
            _(this.options.init)
        }

        function _(e) {
            e && "function" == typeof e && e()
        }
        T.DEFAULTS = {
            default: "",
            fromnow: 0,
            donetext: "Done",
            autoclose: !1,
            ampmclickable: !1,
            darktheme: !1,
            twelvehour: !1,
            vibrate: !0,
            hourstep: 1,
            minutestep: 1,
            ampmSubmit: !1
        }, T.prototype.toggle = function() {
            this[this.isShown ? "hide" : "show"]()
        }, T.prototype.locate = function() {
            var e = this.element,
                t = this.popover;
            e.offset(), e.outerWidth(), e.outerHeight(), this.options.align;
            t.show()
        }, T.prototype.parseInputValue = function() {
            var e = this.input.prop("value") || this.options.default || "";
            if ("now" === e && (e = new Date(+new Date + this.options.fromnow)), e instanceof Date && (e = e.getHours() + ":" + e.getMinutes()), e = e.split(":"), this.hours = +e[0] || 0, this.minutes = +(e[1] + "").replace(/\D/g, "") || 0, this.hours = Math.round(this.hours / this.options.hourstep) * this.options.hourstep, this.minutes = Math.round(this.minutes / this.options.minutestep) * this.options.minutestep, this.options.twelvehour) {
                var t = (e[1] + "").replace(/\d+/g, "").toLowerCase();
                this.amOrPm = this.hours > 12 || "pm" === t ? "PM" : "AM"
            }
        }, T.prototype.show = function(e) {
            if (!this.isShown) {
                _(this.options.beforeShow), i(":input").each(function() {
                    i(this).attr("tabindex", -1)
                });
                var t = this;
                this.input.blur(), this.popover.addClass("picker--opened"), this.input.addClass("picker__input picker__input--active"), i(document.body).css("overflow", "hidden"), this.isAppended || (this.popover.insertAfter(this.input), this.options.twelvehour && (this.amOrPm = "PM", this.options.ampmclickable ? (this.spanAmPm.children("#click-pm").addClass("text-primary"), this.spanAmPm.children("#click-am").removeClass("text-primary")) : (this.amPmBlock.children(".am-button").removeClass("active"), this.amPmBlock.children(".pm-button").addClass("active"), this.spanAmPm.empty().append("PM"))), o.on("resize.clockpicker" + this.id, function() {
                    t.isShown && t.locate()
                }), this.isAppended = !0), this.parseInputValue(), this.spanHours.html(g(this.hours)), this.spanMinutes.html(g(this.minutes)), this.options.twelvehour && this.spanAmPm.empty().append(this.amOrPm), this.toggleView("hours"), this.locate(), this.isShown = !0, r.on("click.clockpicker." + this.id + " focusin.clockpicker." + this.id, function(e) {
                    var n = i(e.target);
                    0 === n.closest(t.popover.find(".picker__wrap")).length && 0 === n.closest(t.input).length && t.hide()
                }), r.on("keyup.clockpicker." + this.id, function(e) {
                    27 === e.keyCode && t.hide()
                }), _(this.options.afterShow)
            }
        }, T.prototype.hide = function() {
            _(this.options.beforeHide), this.input.removeClass("picker__input picker__input--active"), this.popover.removeClass("picker--opened"), i(document.body).css("overflow", "visible"), this.isShown = !1, i(":input").each(function(e) {
                i(this).attr("tabindex", e + 1)
            }), r.off("click.clockpicker." + this.id + " focusin.clockpicker." + this.id), r.off("keyup.clockpicker." + this.id), this.popover.hide(), _(this.options.afterHide)
        }, T.prototype.toggleView = function(e, t) {
            var n = !1;
            "minutes" === e && "visible" === i(this.hoursView).css("visibility") && (_(this.options.beforeHourSelect), n = !0);
            var o = "hours" === e,
                r = o ? this.hoursView : this.minutesView,
                a = o ? this.minutesView : this.hoursView;
            this.currentView = e, this.spanHours.toggleClass("text-primary", o), this.spanMinutes.toggleClass("text-primary", !o), a.addClass("clockpicker-dial-out"), r.css("visibility", "visible").removeClass("clockpicker-dial-out"), this.resetClock(t), clearTimeout(this.toggleViewTimer), this.toggleViewTimer = setTimeout(function() {
                a.css("visibility", "hidden")
            }, C), n && _(this.options.afterHourSelect)
        }, T.prototype.resetClock = function(e) {
            var t = this.currentView,
                n = this[t],
                i = "hours" === t,
                o = n * (Math.PI / (i ? 6 : 30)),
                r = i && n > 0 && n < 13 ? b : y,
                a = Math.sin(o) * r,
                l = -Math.cos(o) * r,
                c = this;
            s && e ? (c.canvas.addClass("clockpicker-canvas-out"), setTimeout(function() {
                c.canvas.removeClass("clockpicker-canvas-out"), c.setHand(a, l)
            }, e)) : this.setHand(a, l)
        }, T.prototype.setHand = function(e, t, n, o) {
            var r, a, l = Math.atan2(e, -t),
                c = "hours" === this.currentView,
                u = Math.sqrt(e * e + t * t),
                d = this.options,
                f = c && u < (y + b) / 2,
                p = f ? b : y;
            if (r = c ? d.hourstep / 6 * Math.PI : d.minutestep / 30 * Math.PI, d.twelvehour && (p = y), l < 0 && (l = 2 * Math.PI + l), l = (a = Math.round(l / r)) * r, c ? (a *= d.hourstep, d.twelvehour || !f != a > 0 || (a += 12), d.twelvehour && 0 === a && (a = 12), 24 === a && (a = 0)) : 60 === (a *= d.minutestep) && (a = 0), c ? this.fg.setAttribute("class", "clockpicker-canvas-fg") : a % 5 == 0 ? this.fg.setAttribute("class", "clockpicker-canvas-fg") : this.fg.setAttribute("class", "clockpicker-canvas-fg active"), this[this.currentView] !== a && h && this.options.vibrate && (this.vibrateTimer || (navigator[h](10), this.vibrateTimer = setTimeout(i.proxy(function() {
                this.vibrateTimer = null
            }, this), 100))), this[this.currentView] = a, this[c ? "spanHours" : "spanMinutes"].html(g(a)), s) {
                o || !c && a % 5 ? (this.g.insertBefore(this.hand, this.bearing), this.g.insertBefore(this.bg, this.fg), this.bg.setAttribute("class", "clockpicker-canvas-bg clockpicker-canvas-bg-trans")) : (this.g.insertBefore(this.hand, this.bg), this.g.insertBefore(this.fg, this.bg), this.bg.setAttribute("class", "clockpicker-canvas-bg"));
                var m = Math.sin(l) * p,
                    v = -Math.cos(l) * p;
                this.hand.setAttribute("x2", m), this.hand.setAttribute("y2", v), this.bg.setAttribute("cx", m), this.bg.setAttribute("cy", v), this.fg.setAttribute("cx", m), this.fg.setAttribute("cy", v)
            } else this[c ? "hoursView" : "minutesView"].find(".clockpicker-tick").each(function() {
                var e = i(this);
                e.toggleClass("active", a === +e.html())
            })
        }, T.prototype.getTime = function(e) {
            this.parseInputValue();
            var t = this.hours;
            this.options.twelvehour && t < 12 && "PM" === this.amOrPm && (t += 12);
            var n = new Date;
            return n.setMinutes(this.minutes), n.setHours(t), n.setSeconds(0), e && e.apply(this.element, n) || n
        }, T.prototype.done = function() {
            _(this.options.beforeDone), this.hide(), this.label.addClass("active");
            var e = this.input.prop("value"),
                t = this.hours,
                n = ":" + g(this.minutes);
            this.isHTML5 && this.options.twelvehour && (this.hours < 12 && "PM" === this.amOrPm && (t += 12), 12 === this.hours && "AM" === this.amOrPm && (t = 0)), n = g(t) + n, !this.isHTML5 && this.options.twelvehour && (n += this.amOrPm), this.input.prop("value", n), n !== e && (this.input.trigger("change"), this.isInput || this.element.trigger("change")), this.options.autoclose && this.input.trigger("blur"), _(this.options.afterDone)
        }, T.prototype.remove = function() {
            this.element.removeData("clockpicker"), this.input.off("focus.clockpicker click.clockpicker"), this.isShown && this.hide(), this.isAppended && (o.off("resize.clockpicker" + this.id), this.popover.remove())
        }, i.fn.pickatime = function(e) {
            var t = Array.prototype.slice.call(arguments, 1);

            function n() {
                var n = i(this),
                    o = n.data("clockpicker");
                if (o) "function" == typeof o[e] && o[e].apply(o, t);
                else {
                    var r = i.extend({}, T.DEFAULTS, n.data(), "object" == typeof e && e);
                    n.data("clockpicker", new T(n, r))
                }
            }
            if (1 == this.length) {
                var o = n.apply(this[0]);
                return void 0 !== o ? o : this
            }
            return this.each(n)
        }
    }(),
    function(e, t) {
        "function" == typeof define && define.amd ? define(t) : "object" == typeof exports ? module.exports = t() : e.PhotoSwipe = t()
    }(this, function() {
        "use strict";
        return function(e, t, n, i) {
            var o = {
                features: null,
                bind: function(e, t, n, i) {
                    var o = (i ? "remove" : "add") + "EventListener";
                    t = t.split(" ");
                    for (var r = 0; r < t.length; r++) t[r] && e[o](t[r], n, !1)
                },
                isArray: function(e) {
                    return e instanceof Array
                },
                createEl: function(e, t) {
                    var n = document.createElement(t || "div");
                    return e && (n.className = e), n
                },
                getScrollY: function() {
                    var e = window.pageYOffset;
                    return void 0 !== e ? e : document.documentElement.scrollTop
                },
                unbind: function(e, t, n) {
                    o.bind(e, t, n, !0)
                },
                removeClass: function(e, t) {
                    var n = new RegExp("(\\s|^)" + t + "(\\s|$)");
                    e.className = e.className.replace(n, " ").replace(/^\s\s*/, "").replace(/\s\s*$/, "")
                },
                addClass: function(e, t) {
                    o.hasClass(e, t) || (e.className += (e.className ? " " : "") + t)
                },
                hasClass: function(e, t) {
                    return e.className && new RegExp("(^|\\s)" + t + "(\\s|$)").test(e.className)
                },
                getChildByClass: function(e, t) {
                    for (var n = e.firstChild; n;) {
                        if (o.hasClass(n, t)) return n;
                        n = n.nextSibling
                    }
                },
                arraySearch: function(e, t, n) {
                    for (var i = e.length; i--;)
                        if (e[i][n] === t) return i;
                    return -1
                },
                extend: function(e, t, n) {
                    for (var i in t)
                        if (t.hasOwnProperty(i)) {
                            if (n && e.hasOwnProperty(i)) continue;
                            e[i] = t[i]
                        }
                },
                easing: {
                    sine: {
                        out: function(e) {
                            return Math.sin(e * (Math.PI / 2))
                        },
                        inOut: function(e) {
                            return -(Math.cos(Math.PI * e) - 1) / 2
                        }
                    },
                    cubic: {
                        out: function(e) {
                            return --e * e * e + 1
                        }
                    }
                },
                detectFeatures: function() {
                    if (o.features) return o.features;
                    var e = o.createEl().style,
                        t = "",
                        n = {};
                    if (n.oldIE = document.all && !document.addEventListener, n.touch = "ontouchstart" in window, window.requestAnimationFrame && (n.raf = window.requestAnimationFrame, n.caf = window.cancelAnimationFrame), n.pointerEvent = navigator.pointerEnabled || navigator.msPointerEnabled, !n.pointerEvent) {
                        var i = navigator.userAgent;
                        if (/iP(hone|od)/.test(navigator.platform)) {
                            var r = navigator.appVersion.match(/OS (\d+)_(\d+)_?(\d+)?/);
                            r && r.length > 0 && (r = parseInt(r[1], 10)) >= 1 && 8 > r && (n.isOldIOSPhone = !0)
                        }
                        var a = i.match(/Android\s([0-9\.]*)/),
                            s = a ? a[1] : 0;
                        (s = parseFloat(s)) >= 1 && (4.4 > s && (n.isOldAndroid = !0), n.androidVersion = s), n.isMobileOpera = /opera mini|opera mobi/i.test(i)
                    }
                    for (var l, c, u = ["transform", "perspective", "animationName"], d = ["", "webkit", "Moz", "ms", "O"], f = 0; 4 > f; f++) {
                        t = d[f];
                        for (var h = 0; 3 > h; h++) l = u[h], c = t + (t ? l.charAt(0).toUpperCase() + l.slice(1) : l), !n[l] && c in e && (n[l] = c);
                        t && !n.raf && (t = t.toLowerCase(), n.raf = window[t + "RequestAnimationFrame"], n.raf && (n.caf = window[t + "CancelAnimationFrame"] || window[t + "CancelRequestAnimationFrame"]))
                    }
                    if (!n.raf) {
                        var p = 0;
                        n.raf = function(e) {
                            var t = (new Date).getTime(),
                                n = Math.max(0, 16 - (t - p)),
                                i = window.setTimeout(function() {
                                    e(t + n)
                                }, n);
                            return p = t + n, i
                        }, n.caf = function(e) {
                            clearTimeout(e)
                        }
                    }
                    return n.svg = !!document.createElementNS && !!document.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect, o.features = n, n
                }
            };
            o.detectFeatures(), o.features.oldIE && (o.bind = function(e, t, n, i) {
                t = t.split(" ");
                for (var o, r = (i ? "detach" : "attach") + "Event", a = function() {
                    n.handleEvent.call(n)
                }, s = 0; s < t.length; s++)
                    if (o = t[s])
                        if ("object" == typeof n && n.handleEvent) {
                            if (i) {
                                if (!n["oldIE" + o]) return !1
                            } else n["oldIE" + o] = a;
                            e[r]("on" + o, n["oldIE" + o])
                        } else e[r]("on" + o, n)
            });
            var r = this,
                a = {
                    allowPanToNext: !0,
                    spacing: .12,
                    bgOpacity: 1,
                    mouseUsed: !1,
                    loop: !0,
                    pinchToClose: !0,
                    closeOnScroll: !0,
                    closeOnVerticalDrag: !0,
                    verticalDragRange: .75,
                    hideAnimationDuration: 333,
                    showAnimationDuration: 333,
                    showHideOpacity: !1,
                    focus: !0,
                    escKey: !0,
                    arrowKeys: !0,
                    mainScrollEndFriction: .35,
                    panEndFriction: .35,
                    isClickableElement: function(e) {
                        return "A" === e.tagName
                    },
                    getDoubleTapZoom: function(e, t) {
                        return e ? 1 : t.initialZoomLevel < .7 ? 1 : 1.33
                    },
                    maxSpreadZoom: 1.33,
                    modal: !0,
                    scaleMode: "fit"
                };
            o.extend(a, i);
            var s, l, c, u, d, f, h, p, g, m, v, y, b, x, w, C, k, T, _, S, E, A, I, D, P, M, O, N, L, R, F, j, H, W, B, z, V, q, $, Y, X, U, Q, K, Z, G, J, ee, te, ne, ie, oe, re, ae, se, le = {
                    x: 0,
                    y: 0
                },
                ce = {
                    x: 0,
                    y: 0
                },
                ue = {
                    x: 0,
                    y: 0
                },
                de = {},
                fe = 0,
                he = {},
                pe = {
                    x: 0,
                    y: 0
                },
                ge = 0,
                me = !0,
                ve = [],
                ye = {},
                be = !1,
                xe = function(e, t) {
                    o.extend(r, t.publicMethods), ve.push(e)
                },
                we = function(e) {
                    var t = Wt();
                    return e > t - 1 ? e - t : 0 > e ? t + e : e
                },
                Ce = {},
                ke = function(e, t) {
                    return Ce[e] || (Ce[e] = []), Ce[e].push(t)
                },
                Te = function(e) {
                    var t = Ce[e];
                    if (t) {
                        var n = Array.prototype.slice.call(arguments);
                        n.shift();
                        for (var i = 0; i < t.length; i++) t[i].apply(r, n)
                    }
                },
                _e = function() {
                    return (new Date).getTime()
                },
                Se = function(e) {
                    re = e, r.bg.style.opacity = e * a.bgOpacity
                },
                Ee = function(e, t, n, i, o) {
                    (!be || o && o !== r.currItem) && (i /= o ? o.fitRatio : r.currItem.fitRatio), e[A] = y + t + "px, " + n + "px" + b + " scale(" + i + ")"
                },
                Ae = function(e) {
                    ee && (e && (m > r.currItem.fitRatio ? be || (Qt(r.currItem, !1, !0), be = !0) : be && (Qt(r.currItem), be = !1)), Ee(ee, ue.x, ue.y, m))
                },
                Ie = function(e) {
                    e.container && Ee(e.container.style, e.initialPosition.x, e.initialPosition.y, e.initialZoomLevel, e)
                },
                De = function(e, t) {
                    t[A] = y + e + "px, 0px" + b
                },
                Pe = function(e, t) {
                    if (!a.loop && t) {
                        var n = u + (pe.x * fe - e) / pe.x,
                            i = Math.round(e - ct.x);
                        (0 > n && i > 0 || n >= Wt() - 1 && 0 > i) && (e = ct.x + i * a.mainScrollEndFriction)
                    }
                    ct.x = e, De(e, d)
                },
                Me = function(e, t) {
                    var n = ut[e] - he[e];
                    return ce[e] + le[e] + n - n * (t / v)
                },
                Oe = function(e, t) {
                    e.x = t.x, e.y = t.y, t.id && (e.id = t.id)
                },
                Ne = function(e) {
                    e.x = Math.round(e.x), e.y = Math.round(e.y)
                },
                Le = null,
                Re = function() {
                    Le && (o.unbind(document, "mousemove", Re), o.addClass(e, "pswp--has_mouse"), a.mouseUsed = !0, Te("mouseUsed")), Le = setTimeout(function() {
                        Le = null
                    }, 100)
                },
                Fe = function(e, t) {
                    var n = $t(r.currItem, de, e);
                    return t && (J = n), n
                },
                je = function(e) {
                    return e || (e = r.currItem), e.initialZoomLevel
                },
                He = function(e) {
                    return e || (e = r.currItem), e.w > 0 ? a.maxSpreadZoom : 1
                },
                We = function(e, t, n, i) {
                    return i === r.currItem.initialZoomLevel ? (n[e] = r.currItem.initialPosition[e], !0) : (n[e] = Me(e, i), n[e] > t.min[e] ? (n[e] = t.min[e], !0) : n[e] < t.max[e] && (n[e] = t.max[e], !0))
                },
                Be = function(e) {


                    var t = "";
                    a.escKey && 27 === e.keyCode ? t = "close" : a.arrowKeys && (37 === e.keyCode ? t = "prev" : 39 === e.keyCode && (t = "next")), t && (e.ctrlKey || e.altKey || e.shiftKey || e.metaKey || (e.preventDefault ? e.preventDefault() : e.returnValue = !1, r[t]()))

                },
                ze = function(e) {
                    e && (X || Y || te || z) && (e.preventDefault(), e.stopPropagation())
                },
                Ve = function() {
                    r.setScrollOffset(0, o.getScrollY())
                },
                qe = {},
                $e = 0,
                Ye = function(e) {
                    qe[e] && (qe[e].raf && M(qe[e].raf), $e--, delete qe[e])
                },
                Xe = function(e) {
                    qe[e] && Ye(e), qe[e] || ($e++, qe[e] = {})
                },
                Ue = function() {
                    for (var e in qe) qe.hasOwnProperty(e) && Ye(e)
                },
                Qe = function(e, t, n, i, o, r, a) {
                    var s, l = _e();
                    Xe(e);
                    var c = function() {
                        if (qe[e]) {
                            if ((s = _e() - l) >= i) return Ye(e), r(n), void(a && a());
                            r((n - t) * o(s / i) + t), qe[e].raf = P(c)
                        }
                    };
                    c()
                },
                Ke = {
                    shout: Te,
                    listen: ke,
                    viewportSize: de,
                    options: a,
                    isMainScrollAnimating: function() {
                        return te
                    },
                    getZoomLevel: function() {
                        return m
                    },
                    getCurrentIndex: function() {
                        return u
                    },
                    isDragging: function() {
                        return q
                    },
                    isZooming: function() {
                        return Z
                    },
                    setScrollOffset: function(e, t) {
                        he.x = e, R = he.y = t, Te("updateScrollOffset", he)
                    },
                    applyZoomPan: function(e, t, n, i) {
                        ue.x = t, ue.y = n, m = e, Ae(i)
                    },
                    init: function() {
                        if (!s && !l) {
                            var n;
                            r.framework = o, r.template = e, r.bg = o.getChildByClass(e, "pswp__bg"), O = e.className, s = !0, F = o.detectFeatures(), P = F.raf, M = F.caf, A = F.transform, L = F.oldIE, r.scrollWrap = o.getChildByClass(e, "pswp__scroll-wrap"), r.container = o.getChildByClass(r.scrollWrap, "pswp__container"), d = r.container.style, r.itemHolders = C = [{
                                el: r.container.children[0],
                                wrap: 0,
                                index: -1
                            }, {
                                el: r.container.children[1],
                                wrap: 0,
                                index: -1
                            }, {
                                el: r.container.children[2],
                                wrap: 0,
                                index: -1
                            }], C[0].el.style.display = C[2].el.style.display = "none",
                                function() {
                                    if (A) {
                                        var t = F.perspective && !D;
                                        return y = "translate" + (t ? "3d(" : "("), void(b = F.perspective ? ", 0px)" : ")")
                                    }
                                    A = "left", o.addClass(e, "pswp--ie"), De = function(e, t) {
                                        t.left = e + "px"
                                    }, Ie = function(e) {
                                        var t = e.fitRatio > 1 ? 1 : e.fitRatio,
                                            n = e.container.style,
                                            i = t * e.w,
                                            o = t * e.h;
                                        n.width = i + "px", n.height = o + "px", n.left = e.initialPosition.x + "px", n.top = e.initialPosition.y + "px"
                                    }, Ae = function() {
                                        if (ee) {
                                            var e = ee,
                                                t = r.currItem,
                                                n = t.fitRatio > 1 ? 1 : t.fitRatio,
                                                i = n * t.w,
                                                o = n * t.h;
                                            e.width = i + "px", e.height = o + "px", e.left = ue.x + "px", e.top = ue.y + "px"
                                        }
                                    }
                                }(), g = {
                                resize: r.updateSize,
                                scroll: Ve,
                                keydown: Be,
                                click: ze
                            };
                            var i = F.isOldIOSPhone || F.isOldAndroid || F.isMobileOpera;
                            for (F.animationName && F.transform && !i || (a.showAnimationDuration = a.hideAnimationDuration = 0), n = 0; n < ve.length; n++) r["init" + ve[n]]();
                            t && (r.ui = new t(r, o)).init(), Te("firstUpdate"), u = u || a.index || 0, (isNaN(u) || 0 > u || u >= Wt()) && (u = 0), r.currItem = Ht(u), (F.isOldIOSPhone || F.isOldAndroid) && (me = !1), e.setAttribute("aria-hidden", "false"), a.modal && (me ? e.style.position = "fixed" : (e.style.position = "absolute", e.style.top = o.getScrollY() + "px")), void 0 === R && (Te("initialLayout"), R = N = o.getScrollY());
                            var c = "pswp--open ";
                            for (a.mainClass && (c += a.mainClass + " "), a.showHideOpacity && (c += "pswp--animate_opacity "), c += D ? "pswp--touch" : "pswp--notouch", c += F.animationName ? " pswp--css_animation" : "", c += F.svg ? " pswp--svg" : "", o.addClass(e, c), r.updateSize(), f = -1, ge = null, n = 0; 3 > n; n++) De((n + f) * pe.x, C[n].el.style);
                            L || o.bind(r.scrollWrap, p, r), ke("initialZoomInEnd", function() {
                                r.setContent(C[0], u - 1), r.setContent(C[2], u + 1), C[0].el.style.display = C[2].el.style.display = "block", a.focus && e.focus(), o.bind(document, "keydown", r), F.transform && o.bind(r.scrollWrap, "click", r), a.mouseUsed || o.bind(document, "mousemove", Re), o.bind(window, "resize scroll", r), Te("bindEvents")
                            }), r.setContent(C[1], u), r.updateCurrItem(), Te("afterInit"), me || (x = setInterval(function() {
                                $e || q || Z || m !== r.currItem.initialZoomLevel || r.updateSize()
                            }, 1e3)), o.addClass(e, "pswp--visible")
                        }
                    },
                    close: function() {
                        s && (s = !1, l = !0, Te("close"), o.unbind(window, "resize", r), o.unbind(window, "scroll", g.scroll), o.unbind(document, "keydown", r), o.unbind(document, "mousemove", Re), F.transform && o.unbind(r.scrollWrap, "click", r), q && o.unbind(window, h, r), Te("unbindEvents"), Bt(r.currItem, null, !0, r.destroy))
                    },
                    destroy: function() {
                        Te("destroy"), Lt && clearTimeout(Lt), e.setAttribute("aria-hidden", "true"), e.className = O, x && clearInterval(x), o.unbind(r.scrollWrap, p, r), o.unbind(window, "scroll", r), ht(), Ue(), Ce = null
                    },
                    panTo: function(e, t, n) {
                        n || (e > J.min.x ? e = J.min.x : e < J.max.x && (e = J.max.x), t > J.min.y ? t = J.min.y : t < J.max.y && (t = J.max.y)), ue.x = e, ue.y = t, Ae()
                    },
                    handleEvent: function(e) {
                        e = e || window.event, g[e.type] && g[e.type](e)
                    },
                    goTo: function(e) {
                        var t = (e = we(e)) - u;
                        ge = t, u = e, r.currItem = Ht(u), fe -= t, Pe(pe.x * fe), Ue(), te = !1, r.updateCurrItem()
                    },
                    next: function() {
                        r.goTo(u + 1)
                    },
                    prev: function() {
                        r.goTo(u - 1)
                    },
                    updateCurrZoomItem: function(e) {
                        if (e && Te("beforeChange", 0), C[1].el.children.length) {
                            var t = C[1].el.children[0];
                            ee = o.hasClass(t, "pswp__zoom-wrap") ? t.style : null
                        } else ee = null;
                        J = r.currItem.bounds, v = m = r.currItem.initialZoomLevel, ue.x = J.center.x, ue.y = J.center.y, e && Te("afterChange")
                    },
                    invalidateCurrItems: function() {
                        w = !0;
                        for (var e = 0; 3 > e; e++) C[e].item && (C[e].item.needsUpdate = !0)
                    },
                    updateCurrItem: function(e) {
                        if (0 !== ge) {
                            var t, n = Math.abs(ge);
                            if (!(e && 2 > n)) {
                                r.currItem = Ht(u), be = !1, Te("beforeChange", ge), n >= 3 && (f += ge + (ge > 0 ? -3 : 3), n = 3);
                                for (var i = 0; n > i; i++) ge > 0 ? (t = C.shift(), C[2] = t, De((++f + 2) * pe.x, t.el.style), r.setContent(t, u - n + i + 1 + 1)) : (t = C.pop(), C.unshift(t), De(--f * pe.x, t.el.style), r.setContent(t, u + n - i - 1 - 1));
                                if (ee && 1 === Math.abs(ge)) {
                                    var o = Ht(k);
                                    o.initialZoomLevel !== m && ($t(o, de), Qt(o), Ie(o))
                                }
                                ge = 0, r.updateCurrZoomItem(), k = u, Te("afterChange")
                            }
                        }
                    },
                    updateSize: function(t) {
                        if (!me && a.modal) {
                            var n = o.getScrollY();
                            if (R !== n && (e.style.top = n + "px", R = n), !t && ye.x === window.innerWidth && ye.y === window.innerHeight) return;
                            ye.x = window.innerWidth, ye.y = window.innerHeight, e.style.height = ye.y + "px"
                        }
                        if (de.x = r.scrollWrap.clientWidth, de.y = r.scrollWrap.clientHeight, Ve(), pe.x = de.x + Math.round(de.x * a.spacing), pe.y = de.y, Pe(pe.x * fe), Te("beforeResize"), void 0 !== f) {
                            for (var i, s, l, c = 0; 3 > c; c++) i = C[c], De((c + f) * pe.x, i.el.style), l = u + c - 1, a.loop && Wt() > 2 && (l = we(l)), (s = Ht(l)) && (w || s.needsUpdate || !s.bounds) ? (r.cleanSlide(s), r.setContent(i, l), 1 === c && (r.currItem = s, r.updateCurrZoomItem(!0)), s.needsUpdate = !1) : -1 === i.index && l >= 0 && r.setContent(i, l), s && s.container && ($t(s, de), Qt(s), Ie(s));
                            w = !1
                        }
                        v = m = r.currItem.initialZoomLevel, (J = r.currItem.bounds) && (ue.x = J.center.x, ue.y = J.center.y, Ae(!0)), Te("resize")
                    },
                    zoomTo: function(e, t, n, i, r) {
                        t && (v = m, ut.x = Math.abs(t.x) - ue.x, ut.y = Math.abs(t.y) - ue.y, Oe(ce, ue));
                        var a = Fe(e, !1),
                            s = {};
                        We("x", a, s, e), We("y", a, s, e);
                        var l = m,
                            c = ue.x,
                            u = ue.y;
                        Ne(s);
                        var d = function(t) {
                            1 === t ? (m = e, ue.x = s.x, ue.y = s.y) : (m = (e - l) * t + l, ue.x = (s.x - c) * t + c, ue.y = (s.y - u) * t + u), r && r(t), Ae(1 === t)
                        };
                        n ? Qe("customZoomTo", 0, 1, n, i || o.easing.sine.inOut, d) : d(1)
                    }
                },
                Ze = {},
                Ge = {},
                Je = {},
                et = {},
                tt = {},
                nt = [],
                it = {},
                ot = [],
                rt = {},
                at = 0,
                st = {
                    x: 0,
                    y: 0
                },
                lt = 0,
                ct = {
                    x: 0,
                    y: 0
                },
                ut = {
                    x: 0,
                    y: 0
                },
                dt = {
                    x: 0,
                    y: 0
                },
                ft = function(e, t) {
                    return rt.x = Math.abs(e.x - t.x), rt.y = Math.abs(e.y - t.y), Math.sqrt(rt.x * rt.x + rt.y * rt.y)
                },
                ht = function() {
                    U && (M(U), U = null)
                },
                pt = function() {
                    q && (U = P(pt), At())
                },
                gt = function(e, t) {
                    return !(!e || e === document) && !(e.getAttribute("class") && e.getAttribute("class").indexOf("pswp__scroll-wrap") > -1) && (t(e) ? e : gt(e.parentNode, t))
                },
                mt = {},
                vt = function(e, t) {
                    return mt.prevent = !gt(e.target, a.isClickableElement), Te("preventDragEvent", e, t, mt), mt.prevent
                },
                yt = function(e, t) {
                    return t.x = e.pageX, t.y = e.pageY, t.id = e.identifier, t
                },
                bt = function(e, t, n) {
                    n.x = .5 * (e.x + t.x), n.y = .5 * (e.y + t.y)
                },
                xt = function() {
                    var e = ue.y - r.currItem.initialPosition.y;
                    return 1 - Math.abs(e / (de.y / 2))
                },
                wt = {},
                Ct = {},
                kt = [],
                Tt = function(e) {
                    for (; kt.length > 0;) kt.pop();
                    return I ? (se = 0, nt.forEach(function(e) {
                        0 === se ? kt[0] = e : 1 === se && (kt[1] = e), se++
                    })) : e.type.indexOf("touch") > -1 ? e.touches && e.touches.length > 0 && (kt[0] = yt(e.touches[0], wt), e.touches.length > 1 && (kt[1] = yt(e.touches[1], Ct))) : (wt.x = e.pageX, wt.y = e.pageY, wt.id = "", kt[0] = wt), kt
                },
                _t = function(e, t) {
                    var n, i, o, s, l = ue[e] + t[e],
                        c = t[e] > 0,
                        u = ct.x + t.x,
                        d = ct.x - it.x;
                    return n = l > J.min[e] || l < J.max[e] ? a.panEndFriction : 1, l = ue[e] + t[e] * n, !a.allowPanToNext && m !== r.currItem.initialZoomLevel || (ee ? "h" !== ne || "x" !== e || Y || (c ? (l > J.min[e] && (n = a.panEndFriction, J.min[e], i = J.min[e] - ce[e]), (0 >= i || 0 > d) && Wt() > 1 ? (s = u, 0 > d && u > it.x && (s = it.x)) : J.min.x !== J.max.x && (o = l)) : (l < J.max[e] && (n = a.panEndFriction, J.max[e], i = ce[e] - J.max[e]), (0 >= i || d > 0) && Wt() > 1 ? (s = u, d > 0 && u < it.x && (s = it.x)) : J.min.x !== J.max.x && (o = l))) : s = u, "x" !== e) ? void(te || Q || m > r.currItem.fitRatio && (ue[e] += t[e] * n)) : (void 0 !== s && (Pe(s, !0), Q = s !== it.x), J.min.x !== J.max.x && (void 0 !== o ? ue.x = o : Q || (ue.x += t.x * n)), void 0 !== s)
                },
                St = function(e) {
                    if (!("mousedown" === e.type && e.button > 0)) {
                        if (jt) return void e.preventDefault();
                        if (!V || "mousedown" !== e.type) {
                            if (vt(e, !0) && e.preventDefault(), Te("pointerDown"), I) {
                                var t = o.arraySearch(nt, e.pointerId, "id");
                                0 > t && (t = nt.length), nt[t] = {
                                    x: e.pageX,
                                    y: e.pageY,
                                    id: e.pointerId
                                }
                            }
                            var n = Tt(e),
                                i = n.length;
                            K = null, Ue(), q && 1 !== i || (q = ie = !0, o.bind(window, h, r), B = ae = oe = z = Q = X = $ = Y = !1, ne = null, Te("firstTouchStart", n), Oe(ce, ue), le.x = le.y = 0, Oe(et, n[0]), Oe(tt, et), it.x = pe.x * fe, ot = [{
                                x: et.x,
                                y: et.y
                            }], H = j = _e(), Fe(m, !0), ht(), pt()), !Z && i > 1 && !te && !Q && (v = m, Y = !1, Z = $ = !0, le.y = le.x = 0, Oe(ce, ue), Oe(Ze, n[0]), Oe(Ge, n[1]), bt(Ze, Ge, dt), ut.x = Math.abs(dt.x) - ue.x, ut.y = Math.abs(dt.y) - ue.y, G = ft(Ze, Ge))
                        }
                    }
                },
                Et = function(e) {
                    if (e.preventDefault(), I) {
                        var t = o.arraySearch(nt, e.pointerId, "id");
                        if (t > -1) {
                            var n = nt[t];
                            n.x = e.pageX, n.y = e.pageY
                        }
                    }
                    if (q) {
                        var i = Tt(e);
                        if (ne || X || Z) K = i;
                        else if (ct.x !== pe.x * fe) ne = "h";
                        else {
                            var r = Math.abs(i[0].x - et.x) - Math.abs(i[0].y - et.y);
                            Math.abs(r) >= 10 && (ne = r > 0 ? "h" : "v", K = i)
                        }
                    }
                },
                At = function() {
                    if (K) {
                        var e = K.length;
                        if (0 !== e)
                            if (Oe(Ze, K[0]), Je.x = Ze.x - et.x, Je.y = Ze.y - et.y, Z && e > 1) {
                                if (et.x = Ze.x, et.y = Ze.y, !Je.x && !Je.y && function(e, t) {
                                    return e.x === t.x && e.y === t.y
                                }(K[1], Ge)) return;
                                Oe(Ge, K[1]), Y || (Y = !0, Te("zoomGestureStarted"));
                                var t = ft(Ze, Ge),
                                    n = Ot(t);
                                n > r.currItem.initialZoomLevel + r.currItem.initialZoomLevel / 15 && (ae = !0);
                                var i = 1,
                                    o = je(),
                                    s = He();
                                if (o > n)
                                    if (a.pinchToClose && !ae && v <= r.currItem.initialZoomLevel) {
                                        var l = 1 - (o - n) / (o / 1.2);
                                        Se(l), Te("onPinchClose", l), oe = !0
                                    } else(i = (o - n) / o) > 1 && (i = 1), n = o - i * (o / 3);
                                else n > s && ((i = (n - s) / (6 * o)) > 1 && (i = 1), n = s + i * o);
                                0 > i && (i = 0), bt(Ze, Ge, st), le.x += st.x - dt.x, le.y += st.y - dt.y, Oe(dt, st), ue.x = Me("x", n), ue.y = Me("y", n), B = n > m, m = n, Ae()
                            } else {
                                if (!ne) return;
                                if (ie && (ie = !1, Math.abs(Je.x) >= 10 && (Je.x -= K[0].x - tt.x), Math.abs(Je.y) >= 10 && (Je.y -= K[0].y - tt.y)), et.x = Ze.x, et.y = Ze.y, 0 === Je.x && 0 === Je.y) return;
                                if ("v" === ne && a.closeOnVerticalDrag && "fit" === a.scaleMode && m === r.currItem.initialZoomLevel) {
                                    le.y += Je.y, ue.y += Je.y;
                                    var c = xt();
                                    return z = !0, Te("onVerticalDrag", c), Se(c), void Ae()
                                }(function(e, t, n) {
                                    if (e - H > 50) {
                                        var i = ot.length > 2 ? ot.shift() : {};
                                        i.x = t, i.y = n, ot.push(i), H = e
                                    }
                                })(_e(), Ze.x, Ze.y), X = !0, J = r.currItem.bounds, _t("x", Je) || (_t("y", Je), Ne(ue), Ae())
                            }
                    }
                },
                It = function(e) {
                    if (F.isOldAndroid) {
                        if (V && "mouseup" === e.type) return;
                        e.type.indexOf("touch") > -1 && (clearTimeout(V), V = setTimeout(function() {
                            V = 0
                        }, 600))
                    }
                    var t;
                    if (Te("pointerUp"), vt(e, !1) && e.preventDefault(), I) {
                        var n = o.arraySearch(nt, e.pointerId, "id");
                        n > -1 && (t = nt.splice(n, 1)[0], navigator.pointerEnabled ? t.type = e.pointerType || "mouse" : (t.type = {
                            4: "mouse",
                            2: "touch",
                            3: "pen"
                        }[e.pointerType], t.type || (t.type = e.pointerType || "mouse")))
                    }
                    var i, s = Tt(e),
                        l = s.length;
                    if ("mouseup" === e.type && (l = 0), 2 === l) return K = null, !0;
                    1 === l && Oe(tt, s[0]), 0 !== l || ne || te || (t || ("mouseup" === e.type ? t = {
                        x: e.pageX,
                        y: e.pageY,
                        type: "mouse"
                    } : e.changedTouches && e.changedTouches[0] && (t = {
                        x: e.changedTouches[0].pageX,
                        y: e.changedTouches[0].pageY,
                        type: "touch"
                    })), Te("touchRelease", e, t));
                    var c = -1;
                    if (0 === l && (q = !1, o.unbind(window, h, r), ht(), Z ? c = 0 : -1 !== lt && (c = _e() - lt)), lt = 1 === l ? _e() : -1, i = -1 !== c && 150 > c ? "zoom" : "swipe", Z && 2 > l && (Z = !1, 1 === l && (i = "zoomPointerUp"), Te("zoomGestureEnded")), K = null, X || Y || te || z)
                        if (Ue(), W || (W = Dt()), W.calculateSwipeSpeed("x"), z)
                            if (xt() < a.verticalDragRange) r.close();
                            else {
                                var u = ue.y,
                                    d = re;
                                Qe("verticalDrag", 0, 1, 300, o.easing.cubic.out, function(e) {
                                    ue.y = (r.currItem.initialPosition.y - u) * e + u, Se((1 - d) * e + d), Ae()
                                }), Te("onVerticalDrag", 1)
                            }
                        else {
                            if ((Q || te) && 0 === l) {
                                if (Mt(i, W)) return;
                                i = "zoomPointerUp"
                            }
                            if (!te) return "swipe" !== i ? void Nt() : void(!Q && m > r.currItem.fitRatio && Pt(W))
                        }
                },
                Dt = function() {
                    var e, t, n = {
                        lastFlickOffset: {},
                        lastFlickDist: {},
                        lastFlickSpeed: {},
                        slowDownRatio: {},
                        slowDownRatioReverse: {},
                        speedDecelerationRatio: {},
                        speedDecelerationRatioAbs: {},
                        distanceOffset: {},
                        backAnimDestination: {},
                        backAnimStarted: {},
                        calculateSwipeSpeed: function(i) {
                            ot.length > 1 ? (e = _e() - H + 50, t = ot[ot.length - 2][i]) : (e = _e() - j, t = tt[i]), n.lastFlickOffset[i] = et[i] - t, n.lastFlickDist[i] = Math.abs(n.lastFlickOffset[i]), n.lastFlickDist[i] > 20 ? n.lastFlickSpeed[i] = n.lastFlickOffset[i] / e : n.lastFlickSpeed[i] = 0, Math.abs(n.lastFlickSpeed[i]) < .1 && (n.lastFlickSpeed[i] = 0), n.slowDownRatio[i] = .95, n.slowDownRatioReverse[i] = 1 - n.slowDownRatio[i], n.speedDecelerationRatio[i] = 1
                        },
                        calculateOverBoundsAnimOffset: function(e, t) {
                            n.backAnimStarted[e] || (ue[e] > J.min[e] ? n.backAnimDestination[e] = J.min[e] : ue[e] < J.max[e] && (n.backAnimDestination[e] = J.max[e]), void 0 !== n.backAnimDestination[e] && (n.slowDownRatio[e] = .7, n.slowDownRatioReverse[e] = 1 - n.slowDownRatio[e], n.speedDecelerationRatioAbs[e] < .05 && (n.lastFlickSpeed[e] = 0, n.backAnimStarted[e] = !0, Qe("bounceZoomPan" + e, ue[e], n.backAnimDestination[e], t || 300, o.easing.sine.out, function(t) {
                                ue[e] = t, Ae()
                            }))))
                        },
                        calculateAnimOffset: function(e) {
                            n.backAnimStarted[e] || (n.speedDecelerationRatio[e] = n.speedDecelerationRatio[e] * (n.slowDownRatio[e] + n.slowDownRatioReverse[e] - n.slowDownRatioReverse[e] * n.timeDiff / 10), n.speedDecelerationRatioAbs[e] = Math.abs(n.lastFlickSpeed[e] * n.speedDecelerationRatio[e]), n.distanceOffset[e] = n.lastFlickSpeed[e] * n.speedDecelerationRatio[e] * n.timeDiff, ue[e] += n.distanceOffset[e])
                        },
                        panAnimLoop: function() {
                            return qe.zoomPan && (qe.zoomPan.raf = P(n.panAnimLoop), n.now = _e(), n.timeDiff = n.now - n.lastNow, n.lastNow = n.now, n.calculateAnimOffset("x"), n.calculateAnimOffset("y"), Ae(), n.calculateOverBoundsAnimOffset("x"), n.calculateOverBoundsAnimOffset("y"), n.speedDecelerationRatioAbs.x < .05 && n.speedDecelerationRatioAbs.y < .05) ? (ue.x = Math.round(ue.x), ue.y = Math.round(ue.y), Ae(), void Ye("zoomPan")) : void 0
                        }
                    };
                    return n
                },
                Pt = function(e) {
                    return e.calculateSwipeSpeed("y"), J = r.currItem.bounds, e.backAnimDestination = {}, e.backAnimStarted = {}, Math.abs(e.lastFlickSpeed.x) <= .05 && Math.abs(e.lastFlickSpeed.y) <= .05 ? (e.speedDecelerationRatioAbs.x = e.speedDecelerationRatioAbs.y = 0, e.calculateOverBoundsAnimOffset("x"), e.calculateOverBoundsAnimOffset("y"), !0) : (Xe("zoomPan"), e.lastNow = _e(), void e.panAnimLoop())
                },
                Mt = function(e, t) {
                    var n, i, s;
                    if (te || (at = u), "swipe" === e) {
                        var l = et.x - tt.x,
                            c = t.lastFlickDist.x < 10;
                        l > 30 && (c || t.lastFlickOffset.x > 20) ? i = -1 : -30 > l && (c || t.lastFlickOffset.x < -20) && (i = 1)
                    }
                    i && (0 > (u += i) ? (u = a.loop ? Wt() - 1 : 0, s = !0) : u >= Wt() && (u = a.loop ? 0 : Wt() - 1, s = !0), (!s || a.loop) && (ge += i, fe -= i, n = !0));
                    var d, f = pe.x * fe,
                        h = Math.abs(f - ct.x);
                    return n || f > ct.x == t.lastFlickSpeed.x > 0 ? (d = Math.abs(t.lastFlickSpeed.x) > 0 ? h / Math.abs(t.lastFlickSpeed.x) : 333, d = Math.min(d, 400), d = Math.max(d, 250)) : d = 333, at === u && (n = !1), te = !0, Te("mainScrollAnimStart"), Qe("mainScroll", ct.x, f, d, o.easing.cubic.out, Pe, function() {
                        Ue(), te = !1, at = -1, (n || at !== u) && r.updateCurrItem(), Te("mainScrollAnimComplete")
                    }), n && r.updateCurrItem(!0), n
                },
                Ot = function(e) {
                    return 1 / G * e * v
                },
                Nt = function() {
                    var e = m,
                        t = je(),
                        n = He();
                    t > m ? e = t : m > n && (e = n);
                    var i, a = re;
                    return oe && !B && !ae && t > m ? (r.close(), !0) : (oe && (i = function(e) {
                        Se((1 - a) * e + a)
                    }), r.zoomTo(e, 0, 200, o.easing.cubic.out, i), !0)
                };
            xe("Gestures", {
                publicMethods: {
                    initGestures: function() {
                        var e = function(e, t, n, i, o) {
                            T = e + t, _ = e + n, S = e + i, E = o ? e + o : ""
                        };
                        (I = F.pointerEvent) && F.touch && (F.touch = !1), I ? navigator.pointerEnabled ? e("pointer", "down", "move", "up", "cancel") : e("MSPointer", "Down", "Move", "Up", "Cancel") : F.touch ? (e("touch", "start", "move", "end", "cancel"), D = !0) : e("mouse", "down", "move", "up"), h = _ + " " + S + " " + E, p = T, I && !D && (D = navigator.maxTouchPoints > 1 || navigator.msMaxTouchPoints > 1), r.likelyTouchDevice = D, g[T] = St, g[_] = Et, g[S] = It, E && (g[E] = g[S]), F.touch && (p += " mousedown", h += " mousemove mouseup", g.mousedown = g[T], g.mousemove = g[_], g.mouseup = g[S]), D || (a.allowPanToNext = !1)
                    }
                }
            });
            var Lt, Rt, Ft, jt, Ht, Wt, Bt = function(t, n, i, s) {
                    var l;
                    Lt && clearTimeout(Lt), jt = !0, Ft = !0, t.initialLayout ? (l = t.initialLayout, t.initialLayout = null) : l = a.getThumbBoundsFn && a.getThumbBoundsFn(u);
                    var d = i ? a.hideAnimationDuration : a.showAnimationDuration,
                        f = function() {
                            Ye("initialZoom"), i ? (r.template.removeAttribute("style"), r.bg.removeAttribute("style")) : (Se(1), n && (n.style.display = "block"), o.addClass(e, "pswp--animated-in"), Te("initialZoom" + (i ? "OutEnd" : "InEnd"))), s && s(), jt = !1
                        };
                    if (!d || !l || void 0 === l.x) return Te("initialZoom" + (i ? "Out" : "In")), m = t.initialZoomLevel, Oe(ue, t.initialPosition), Ae(), e.style.opacity = i ? 0 : 1, Se(1), void(d ? setTimeout(function() {
                        f()
                    }, d) : f());
                    ! function() {
                        var n = c,
                            s = !r.currItem.src || r.currItem.loadError || a.showHideOpacity;
                        t.miniImg && (t.miniImg.style.webkitBackfaceVisibility = "hidden"), i || (m = l.w / t.w, ue.x = l.x, ue.y = l.y - N, r[s ? "template" : "bg"].style.opacity = .001, Ae()), Xe("initialZoom"), i && !n && o.removeClass(e, "pswp--animated-in"), s && (i ? o[(n ? "remove" : "add") + "Class"](e, "pswp--animate_opacity") : setTimeout(function() {
                            o.addClass(e, "pswp--animate_opacity")
                        }, 30)), Lt = setTimeout(function() {
                            if (Te("initialZoom" + (i ? "Out" : "In")), i) {
                                var r = l.w / t.w,
                                    a = {
                                        x: ue.x,
                                        y: ue.y
                                    },
                                    c = m,
                                    u = re,
                                    h = function(t) {
                                        1 === t ? (m = r, ue.x = l.x, ue.y = l.y - R) : (m = (r - c) * t + c, ue.x = (l.x - a.x) * t + a.x, ue.y = (l.y - R - a.y) * t + a.y), Ae(), s ? e.style.opacity = 1 - t : Se(u - t * u)
                                    };
                                n ? Qe("initialZoom", 0, 1, d, o.easing.cubic.out, h, f) : (h(1), Lt = setTimeout(f, d + 20))
                            } else m = t.initialZoomLevel, Oe(ue, t.initialPosition), Ae(), Se(1), s ? e.style.opacity = 1 : Se(1), Lt = setTimeout(f, d + 20)
                        }, i ? 25 : 90)
                    }()
                },
                zt = {},
                Vt = [],
                qt = {
                    index: 0,
                    errorMsg: '<div class="pswp__error-msg"><a href="%url%" target="_blank">The image</a> could not be loaded.</div>',
                    forceProgressiveLoading: !1,
                    preload: [1, 1],
                    getNumItemsFn: function() {
                        return Rt.length
                    }
                },
                $t = function(e, t, n) {
                    if (e.src && !e.loadError) {
                        var i = !n;
                        if (i && (e.vGap || (e.vGap = {
                            top: 0,
                            bottom: 0
                        }), Te("parseVerticalMargin", e)), zt.x = t.x, zt.y = t.y - e.vGap.top - e.vGap.bottom, i) {
                            var o = zt.x / e.w,
                                r = zt.y / e.h;
                            e.fitRatio = r > o ? o : r;
                            var s = a.scaleMode;
                            "orig" === s ? n = 1 : "fit" === s && (n = e.fitRatio), n > 1 && (n = 1), e.initialZoomLevel = n, e.bounds || (e.bounds = {
                                center: {
                                    x: 0,
                                    y: 0
                                },
                                max: {
                                    x: 0,
                                    y: 0
                                },
                                min: {
                                    x: 0,
                                    y: 0
                                }
                            })
                        }
                        if (!n) return;
                        return function(e, t, n) {
                            var i = e.bounds;
                            i.center.x = Math.round((zt.x - t) / 2), i.center.y = Math.round((zt.y - n) / 2) + e.vGap.top, i.max.x = t > zt.x ? Math.round(zt.x - t) : i.center.x, i.max.y = n > zt.y ? Math.round(zt.y - n) + e.vGap.top : i.center.y, i.min.x = t > zt.x ? 0 : i.center.x, i.min.y = n > zt.y ? e.vGap.top : i.center.y
                        }(e, e.w * n, e.h * n), i && n === e.initialZoomLevel && (e.initialPosition = e.bounds.center), e.bounds
                    }
                    return e.w = e.h = 0, e.initialZoomLevel = e.fitRatio = 1, e.bounds = {
                        center: {
                            x: 0,
                            y: 0
                        },
                        max: {
                            x: 0,
                            y: 0
                        },
                        min: {
                            x: 0,
                            y: 0
                        }
                    }, e.initialPosition = e.bounds.center, e.bounds
                },
                Yt = function(e, t, n, i, o, a) {
                    t.loadError || i && (t.imageAppended = !0, Qt(t, i, t === r.currItem && be), n.appendChild(i), a && setTimeout(function() {
                        t && t.loaded && t.placeholder && (t.placeholder.style.display = "none", t.placeholder = null)
                    }, 500))
                },
                Xt = function(e) {
                    e.loading = !0, e.loaded = !1;
                    var t = e.img = o.createEl("pswp__img", "img"),
                        n = function() {
                            e.loading = !1, e.loaded = !0, e.loadComplete ? e.loadComplete(e) : e.img = null, t.onload = t.onerror = null, t = null
                        };
                    return t.onload = n, t.onerror = function() {
                        e.loadError = !0, n()
                    }, t.src = e.src, t
                },
                Ut = function(e, t) {
                    return e.src && e.loadError && e.container ? (t && (e.container.innerHTML = ""), e.container.innerHTML = a.errorMsg.replace("%url%", e.src), !0) : void 0
                },
                Qt = function(e, t, n) {
                    if (e.src) {
                        t || (t = e.container.lastChild);
                        var i = n ? e.w : Math.round(e.w * e.fitRatio),
                            o = n ? e.h : Math.round(e.h * e.fitRatio);
                        e.placeholder && !e.loaded && (e.placeholder.style.width = i + "px", e.placeholder.style.height = o + "px"), t.style.width = i + "px", t.style.height = o + "px"
                    }
                },
                Kt = function() {
                    if (Vt.length) {
                        for (var e, t = 0; t < Vt.length; t++)(e = Vt[t]).holder.index === e.index && Yt(e.index, e.item, e.baseDiv, e.img, 0, e.clearPlaceholder);
                        Vt = []
                    }
                };
            xe("Controller", {
                publicMethods: {
                    lazyLoadItem: function(e) {
                        e = we(e);
                        var t = Ht(e);
                        t && (!t.loaded && !t.loading || w) && (Te("gettingData", e, t), t.src && Xt(t))
                    },
                    initController: function() {
                        o.extend(a, qt, !0), r.items = Rt = n, Ht = r.getItemAt, Wt = a.getNumItemsFn, a.loop, Wt() < 3 && (a.loop = !1), ke("beforeChange", function(e) {
                            var t, n = a.preload,
                                i = null === e || e >= 0,
                                o = Math.min(n[0], Wt()),
                                s = Math.min(n[1], Wt());
                            for (t = 1;
                                 (i ? s : o) >= t; t++) r.lazyLoadItem(u + t);
                            for (t = 1;
                                 (i ? o : s) >= t; t++) r.lazyLoadItem(u - t)
                        }), ke("initialLayout", function() {
                            r.currItem.initialLayout = a.getThumbBoundsFn && a.getThumbBoundsFn(u)
                        }), ke("mainScrollAnimComplete", Kt), ke("initialZoomInEnd", Kt), ke("destroy", function() {
                            for (var e, t = 0; t < Rt.length; t++)(e = Rt[t]).container && (e.container = null), e.placeholder && (e.placeholder = null), e.img && (e.img = null), e.preloader && (e.preloader = null), e.loadError && (e.loaded = e.loadError = !1);
                            Vt = null
                        })
                    },
                    getItemAt: function(e) {
                        return e >= 0 && void 0 !== Rt[e] && Rt[e]
                    },
                    allowProgressiveImg: function() {
                        return a.forceProgressiveLoading || !D || a.mouseUsed || screen.width > 1200
                    },
                    setContent: function(e, t) {
                        a.loop && (t = we(t));
                        var n = r.getItemAt(e.index);
                        n && (n.container = null);
                        var i, l = r.getItemAt(t);
                        if (l) {
                            Te("gettingData", t, l), e.index = t, e.item = l;
                            var c = l.container = o.createEl("pswp__zoom-wrap");
                            if (!l.src && l.html && (l.html.tagName ? c.appendChild(l.html) : c.innerHTML = l.html), Ut(l), $t(l, de), !l.src || l.loadError || l.loaded) l.src && !l.loadError && ((i = o.createEl("pswp__img", "img")).style.opacity = 1, i.src = l.src, Qt(l, i), Yt(0, l, c, i));
                            else {
                                if (l.loadComplete = function(n) {
                                    if (s) {
                                        if (e && e.index === t) {
                                            if (Ut(n, !0)) return n.loadComplete = n.img = null, $t(n, de), Ie(n), void(e.index === u && r.updateCurrZoomItem());
                                            n.imageAppended ? !jt && n.placeholder && (n.placeholder.style.display = "none", n.placeholder = null) : F.transform && (te || jt) ? Vt.push({
                                                item: n,
                                                baseDiv: c,
                                                img: n.img,
                                                index: t,
                                                holder: e,
                                                clearPlaceholder: !0
                                            }) : Yt(0, n, c, n.img, 0, !0)
                                        }
                                        n.loadComplete = null, n.img = null, Te("imageLoadComplete", t, n)
                                    }
                                }, o.features.transform) {
                                    var d = "pswp__img pswp__img--placeholder";
                                    d += l.msrc ? "" : " pswp__img--placeholder--blank";
                                    var f = o.createEl(d, l.msrc ? "img" : "");
                                    l.msrc && (f.src = l.msrc), Qt(l, f), c.appendChild(f), l.placeholder = f
                                }
                                l.loading || Xt(l), r.allowProgressiveImg() && (!Ft && F.transform ? Vt.push({
                                    item: l,
                                    baseDiv: c,
                                    img: l.img,
                                    index: t,
                                    holder: e
                                }) : Yt(0, l, c, l.img, 0, !0))
                            }
                            Ft || t !== u ? Ie(l) : (ee = c.style, Bt(l, i || l.img)), e.el.innerHTML = "", e.el.appendChild(c)
                        } else e.el.innerHTML = ""
                    },
                    cleanSlide: function(e) {
                        e.img && (e.img.onload = e.img.onerror = null), e.loaded = e.loading = e.img = e.imageAppended = !1
                    }
                }
            });
            var Zt, Gt, Jt = {},
                en = function(e, t, n) {
                    var i = document.createEvent("CustomEvent"),
                        o = {
                            origEvent: e,
                            target: e.target,
                            releasePoint: t,
                            pointerType: n || "touch"
                        };
                    i.initCustomEvent("pswpTap", !0, !0, o), e.target.dispatchEvent(i)
                };
            xe("Tap", {
                publicMethods: {
                    initTap: function() {
                        ke("firstTouchStart", r.onTapStart), ke("touchRelease", r.onTapRelease), ke("destroy", function() {
                            Jt = {}, Zt = null
                        })
                    },
                    onTapStart: function(e) {
                        e.length > 1 && (clearTimeout(Zt), Zt = null)
                    },
                    onTapRelease: function(e, t) {
                        if (t && !X && !$ && !$e) {
                            var n = t;
                            if (Zt && (clearTimeout(Zt), Zt = null, function(e, t) {
                                return Math.abs(e.x - t.x) < 25 && Math.abs(e.y - t.y) < 25
                            }(n, Jt))) return void Te("doubleTap", n);
                            if ("mouse" === t.type) return void en(e, t, "mouse");
                            if ("BUTTON" === e.target.tagName.toUpperCase() || o.hasClass(e.target, "pswp__single-tap")) return void en(e, t);
                            Oe(Jt, n), Zt = setTimeout(function() {
                                en(e, t), Zt = null
                            }, 300)
                        }
                    }
                }
            }), xe("DesktopZoom", {
                publicMethods: {
                    initDesktopZoom: function() {
                        L || (D ? ke("mouseUsed", function() {
                            r.setupDesktopZoom()
                        }) : r.setupDesktopZoom(!0))
                    },
                    setupDesktopZoom: function(t) {
                        Gt = {};
                        var n = "wheel mousewheel DOMMouseScroll";
                        ke("bindEvents", function() {
                            o.bind(e, n, r.handleMouseWheel)
                        }), ke("unbindEvents", function() {
                            Gt && o.unbind(e, n, r.handleMouseWheel)
                        }), r.mouseZoomedIn = !1;
                        var i, a = function() {
                                r.mouseZoomedIn && (o.removeClass(e, "pswp--zoomed-in"), r.mouseZoomedIn = !1), 1 > m ? o.addClass(e, "pswp--zoom-allowed") : o.removeClass(e, "pswp--zoom-allowed"), s()
                            },
                            s = function() {
                                i && (o.removeClass(e, "pswp--dragging"), i = !1)
                            };
                        ke("resize", a), ke("afterChange", a), ke("pointerDown", function() {
                            r.mouseZoomedIn && (i = !0, o.addClass(e, "pswp--dragging"))
                        }), ke("pointerUp", s), t || a()
                    },
                    handleMouseWheel: function(e) {
                        if (m <= r.currItem.fitRatio) return a.modal && (!a.closeOnScroll || $e || q ? e.preventDefault() : A && Math.abs(e.deltaY) > 2 && (c = !0, r.close())), !0;
                        if (e.stopPropagation(), Gt.x = 0, "deltaX" in e) 1 === e.deltaMode ? (Gt.x = 18 * e.deltaX, Gt.y = 18 * e.deltaY) : (Gt.x = e.deltaX, Gt.y = e.deltaY);
                        else if ("wheelDelta" in e) e.wheelDeltaX && (Gt.x = -.16 * e.wheelDeltaX), e.wheelDeltaY ? Gt.y = -.16 * e.wheelDeltaY : Gt.y = -.16 * e.wheelDelta;
                        else {
                            if (!("detail" in e)) return;
                            Gt.y = e.detail
                        }
                        Fe(m, !0);
                        var t = ue.x - Gt.x,
                            n = ue.y - Gt.y;
                        (a.modal || t <= J.min.x && t >= J.max.x && n <= J.min.y && n >= J.max.y) && e.preventDefault(), r.panTo(t, n)
                    },
                    toggleDesktopZoom: function(t) {
                        t = t || {
                            x: de.x / 2 + he.x,
                            y: de.y / 2 + he.y
                        };
                        var n = a.getDoubleTapZoom(!0, r.currItem),
                            i = m === n;
                        r.mouseZoomedIn = !i, r.zoomTo(i ? r.currItem.initialZoomLevel : n, t, 333), o[(i ? "remove" : "add") + "Class"](e, "pswp--zoomed-in")
                    }
                }
            });
            var tn, nn, on, rn, an, sn, ln, cn, un, dn, fn, hn, pn = {
                    history: !0,
                    galleryUID: 1
                },
                gn = function() {
                    return fn.hash.substring(1)
                },
                mn = function() {
                    tn && clearTimeout(tn), on && clearTimeout(on)
                },
                vn = function() {
                    var e = gn(),
                        t = {};
                    if (e.length < 5) return t;
                    var n, i = e.split("&");
                    for (n = 0; n < i.length; n++)
                        if (i[n]) {
                            var o = i[n].split("=");
                            o.length < 2 || (t[o[0]] = o[1])
                        }
                    if (a.galleryPIDs) {
                        var r = t.pid;
                        for (t.pid = 0, n = 0; n < Rt.length; n++)
                            if (Rt[n].pid === r) {
                                t.pid = n;
                                break
                            }
                    } else t.pid = parseInt(t.pid, 10) - 1;
                    return t.pid < 0 && (t.pid = 0), t
                },
                yn = function() {
                    if (on && clearTimeout(on), $e || q) on = setTimeout(yn, 500);
                    else {
                        rn ? clearTimeout(nn) : rn = !0;
                        var e = u + 1,
                            t = Ht(u);
                        t.hasOwnProperty("pid") && (e = t.pid);
                        var n = ln + "&gid=" + a.galleryUID + "&pid=" + e;
                        cn || -1 === fn.hash.indexOf(n) && (dn = !0);
                        var i = fn.href.split("#")[0] + "#" + n;
                        hn ? "#" + n !== window.location.hash && history[cn ? "replaceState" : "pushState"]("", document.title, i) : cn ? fn.replace(i) : fn.hash = n, cn = !0, nn = setTimeout(function() {
                            rn = !1
                        }, 60)
                    }
                };
            xe("History", {
                publicMethods: {
                    initHistory: function() {
                        if (o.extend(a, pn, !0), a.history) {
                            fn = window.location, dn = !1, un = !1, cn = !1, ln = gn(), hn = "pushState" in history, ln.indexOf("gid=") > -1 && (ln = (ln = ln.split("&gid=")[0]).split("?gid=")[0]), ke("afterChange", r.updateURL), ke("unbindEvents", function() {
                                o.unbind(window, "hashchange", r.onHashChange)
                            });
                            var e = function() {
                                sn = !0, un || (dn ? history.back() : ln ? fn.hash = ln : hn ? history.pushState("", document.title, fn.pathname + fn.search) : fn.hash = ""), mn()
                            };
                            ke("unbindEvents", function() {
                                c && e()
                            }), ke("destroy", function() {
                                sn || e()
                            }), ke("firstUpdate", function() {
                                u = vn().pid
                            });
                            var t = ln.indexOf("pid=");
                            t > -1 && "&" === (ln = ln.substring(0, t)).slice(-1) && (ln = ln.slice(0, -1)), setTimeout(function() {
                                s && o.bind(window, "hashchange", r.onHashChange)
                            }, 40)
                        }
                    },
                    onHashChange: function() {
                        return gn() === ln ? (un = !0, void r.close()) : void(rn || (an = !0, r.goTo(vn().pid), an = !1))
                    },
                    updateURL: function() {
                        mn(), an || (cn ? tn = setTimeout(yn, 800) : yn())
                    }
                }
            }), o.extend(r, Ke)
        }
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(t) : "object" == typeof exports ? module.exports = t() : e.PhotoSwipeUI_Default = t()
    }(this, function() {
        "use strict";
        return function(e, t) {
            var n, i, o, r, a, s, l, c, u, d, f, h, p, g, m, v, y, b, x = this,
                w = !1,
                C = !0,
                k = !0,
                T = {
                    barsSize: {
                        top: 44,
                        bottom: "auto"
                    },
                    closeElClasses: ["item", "caption", "zoom-wrap", "ui", "top-bar"],
                    timeToIdle: 4e3,
                    timeToIdleOutside: 1e3,
                    loadingIndicatorDelay: 1e3,
                    addCaptionHTMLFn: function(e, t) {
                        return e.title ? (t.children[0].innerHTML = e.title, !0) : (t.children[0].innerHTML = "", !1)
                    },
                    closeEl: !0,
                    captionEl: !0,
                    fullscreenEl: !0,
                    zoomEl: !0,
                    shareEl: !0,
                    counterEl: !0,
                    arrowEl: !0,
                    preloaderEl: !0,
                    tapToClose: !1,
                    tapToToggleControls: !0,
                    clickToCloseNonZoomable: !0,
                    shareButtons: [{
                        id: "facebook",
                        label: "Share on Facebook",
                        url: "https://www.facebook.com/sharer/sharer.php?u={{url}}"
                    }, {
                        id: "twitter",
                        label: "Tweet",
                        url: "https://twitter.com/intent/tweet?text={{text}}&url={{url}}"
                    }, {
                        id: "pinterest",
                        label: "Pin it",
                        url: "http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}"
                    }, {
                        id: "download",
                        label: "Download image",
                        url: "{{raw_image_url}}",
                        download: !0
                    }],
                    getImageURLForShare: function() {
                        return e.currItem.src || ""
                    },
                    getPageURLForShare: function() {
                        return window.location.href
                    },
                    getTextForShare: function() {
                        return e.currItem.title || ""
                    },
                    indexIndicatorSep: " / ",
                    fitControlsWidth: 1200
                },
                _ = function(e) {
                    if (v) return !0;
                    e = e || window.event, m.timeToIdle && m.mouseUsed && !u && L();
                    for (var n, i, o = (e.target || e.srcElement).getAttribute("class") || "", r = 0; r < H.length; r++)(n = H[r]).onTap && o.indexOf("pswp__" + n.name) > -1 && (n.onTap(), i = !0);
                    if (i) {
                        e.stopPropagation && e.stopPropagation(), v = !0;
                        var a = t.features.isOldAndroid ? 600 : 30;
                        setTimeout(function() {
                            v = !1
                        }, a)
                    }
                },
                S = function() {
                    return !e.likelyTouchDevice || m.mouseUsed || screen.width > m.fitControlsWidth
                },
                E = function(e, n, i) {
                    t[(i ? "add" : "remove") + "Class"](e, "pswp__" + n)
                },
                A = function() {
                    var e = 1 === m.getNumItemsFn();
                    e !== g && (E(i, "ui--one-slide", e), g = e)
                },
                I = function() {
                    E(l, "share-modal--hidden", k)
                },
                D = function() {
                    return (k = !k) ? (t.removeClass(l, "pswp__share-modal--fade-in"), setTimeout(function() {
                        k && I()
                    }, 300)) : (I(), setTimeout(function() {
                        k || t.addClass(l, "pswp__share-modal--fade-in")
                    }, 30)), k || M(), !1
                },
                P = function(t) {
                    var n = (t = t || window.event).target || t.srcElement;
                    return e.shout("shareLinkClick", t, n), !(!n.href || !n.hasAttribute("download") && (window.open(n.href, "pswp_share", "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,top=100,left=" + (window.screen ? Math.round(screen.width / 2 - 275) : 100)), k || D(), 1))
                },
                M = function() {
                    for (var e, t, n, i, o = "", r = 0; r < m.shareButtons.length; r++) e = m.shareButtons[r], t = m.getImageURLForShare(e), n = m.getPageURLForShare(e), i = m.getTextForShare(e), o += '<a href="' + e.url.replace("{{url}}", encodeURIComponent(n)).replace("{{image_url}}", encodeURIComponent(t)).replace("{{raw_image_url}}", t).replace("{{text}}", encodeURIComponent(i)) + '" target="_blank" class="pswp__share--' + e.id + '"' + (e.download ? "download" : "") + ">" + e.label + "</a>", m.parseShareButtonOut && (o = m.parseShareButtonOut(e, o));
                    l.children[0].innerHTML = o, l.children[0].onclick = P
                },
                O = function(e) {
                    for (var n = 0; n < m.closeElClasses.length; n++)
                        if (t.hasClass(e, "pswp__" + m.closeElClasses[n])) return !0
                },
                N = 0,
                L = function() {
                    clearTimeout(b), N = 0, u && x.setIdle(!1)
                },
                R = function(e) {
                    var t = (e = e || window.event).relatedTarget || e.toElement;
                    t && "HTML" !== t.nodeName || (clearTimeout(b), b = setTimeout(function() {
                        x.setIdle(!0)
                    }, m.timeToIdleOutside))
                },
                F = function(e) {
                    h !== e && (E(f, "preloader--active", !e), h = e)
                },
                j = function(e) {
                    var n = e.vGap;
                    if (S()) {
                        var a = m.barsSize;
                        if (m.captionEl && "auto" === a.bottom)
                            if (r || ((r = t.createEl("pswp__caption pswp__caption--fake")).appendChild(t.createEl("pswp__caption__center")), i.insertBefore(r, o), t.addClass(i, "pswp__ui--fit")), m.addCaptionHTMLFn(e, r, !0)) {
                                var s = r.clientHeight;
                                n.bottom = parseInt(s, 10) || 44
                            } else n.bottom = a.top;
                        else n.bottom = "auto" === a.bottom ? 0 : a.bottom;
                        n.top = a.top
                    } else n.top = n.bottom = 0
                },
                H = [{
                    name: "caption",
                    option: "captionEl",
                    onInit: function(e) {
                        o = e
                    }
                }, {
                    name: "share-modal",
                    option: "shareEl",
                    onInit: function(e) {
                        l = e
                    },
                    onTap: function() {
                        D()
                    }
                }, {
                    name: "button--share",
                    option: "shareEl",
                    onInit: function(e) {
                        s = e
                    },
                    onTap: function() {
                        D()
                    }
                }, {
                    name: "button--zoom",
                    option: "zoomEl",
                    onTap: e.toggleDesktopZoom
                }, {
                    name: "counter",
                    option: "counterEl",
                    onInit: function(e) {
                        a = e
                    }
                }, {
                    name: "button--close",
                    option: "closeEl",
                    onTap: e.close
                }, {
                    name: "button--arrow--left",
                    option: "arrowEl",
                    onTap: e.prev
                }, {
                    name: "button--arrow--right",
                    option: "arrowEl",
                    onTap: e.next
                }, {
                    name: "button--fs",
                    option: "fullscreenEl",
                    onTap: function() {
                        n.isFullscreen() ? n.exit() : n.enter()
                    }
                }, {
                    name: "preloader",
                    option: "preloaderEl",
                    onInit: function(e) {
                        f = e
                    }
                }];
            x.init = function() {
                t.extend(e.options, T, !0), m = e.options, i = t.getChildByClass(e.scrollWrap, "pswp__ui"), d = e.listen,
                    function() {
                        var e;
                        d("onVerticalDrag", function(e) {
                            C && .95 > e ? x.hideControls() : !C && e >= .95 && x.showControls()
                        }), d("onPinchClose", function(t) {
                            C && .9 > t ? (x.hideControls(), e = !0) : e && !C && t > .9 && x.showControls()
                        }), d("zoomGestureEnded", function() {
                            (e = !1) && !C && x.showControls()
                        })
                    }(), d("beforeChange", x.update), d("doubleTap", function(t) {
                    var n = e.currItem.initialZoomLevel;
                    e.getZoomLevel() !== n ? e.zoomTo(n, t, 333) : e.zoomTo(m.getDoubleTapZoom(!1, e.currItem), t, 333)
                }), d("preventDragEvent", function(e, t, n) {
                    var i = e.target || e.srcElement;
                    i && i.getAttribute("class") && e.type.indexOf("mouse") > -1 && (i.getAttribute("class").indexOf("__caption") > 0 || /(SMALL|STRONG|EM)/i.test(i.tagName)) && (n.prevent = !1)
                }), d("bindEvents", function() {
                    t.bind(i, "pswpTap click", _), t.bind(e.scrollWrap, "pswpTap", x.onGlobalTap), e.likelyTouchDevice || t.bind(e.scrollWrap, "mouseover", x.onMouseOver)
                }), d("unbindEvents", function() {
                    k || D(), y && clearInterval(y), t.unbind(document, "mouseout", R), t.unbind(document, "mousemove", L), t.unbind(i, "pswpTap click", _), t.unbind(e.scrollWrap, "pswpTap", x.onGlobalTap), t.unbind(e.scrollWrap, "mouseover", x.onMouseOver), n && (t.unbind(document, n.eventK, x.updateFullscreen), n.isFullscreen() && (m.hideAnimationDuration = 0, n.exit()), n = null)
                }), d("destroy", function() {
                    m.captionEl && (r && i.removeChild(r), t.removeClass(o, "pswp__caption--empty")), l && (l.children[0].onclick = null), t.removeClass(i, "pswp__ui--over-close"), t.addClass(i, "pswp__ui--hidden"), x.setIdle(!1)
                }), m.showAnimationDuration || t.removeClass(i, "pswp__ui--hidden"), d("initialZoomIn", function() {
                    m.showAnimationDuration && t.removeClass(i, "pswp__ui--hidden")
                }), d("initialZoomOut", function() {
                    t.addClass(i, "pswp__ui--hidden")
                }), d("parseVerticalMargin", j),
                    function() {
                        var e, n, o, r = function(i) {
                            if (i)
                                for (var r = i.length, a = 0; r > a; a++) {
                                    e = i[a], n = e.className;
                                    for (var s = 0; s < H.length; s++) o = H[s], n.indexOf("pswp__" + o.name) > -1 && (m[o.option] ? (t.removeClass(e, "pswp__element--disabled"), o.onInit && o.onInit(e)) : t.addClass(e, "pswp__element--disabled"))
                                }
                        };
                        r(i.children);
                        var a = t.getChildByClass(i, "pswp__top-bar");
                        a && r(a.children)
                    }(), m.shareEl && s && l && (k = !0), A(), m.timeToIdle && d("mouseUsed", function() {
                    t.bind(document, "mousemove", L), t.bind(document, "mouseout", R), y = setInterval(function() {
                        2 == ++N && x.setIdle(!0)
                    }, m.timeToIdle / 2)
                }), m.fullscreenEl && !t.features.isOldAndroid && (n || (n = x.getFullscreenAPI()), n ? (t.bind(document, n.eventK, x.updateFullscreen), x.updateFullscreen(), t.addClass(e.template, "pswp--supports-fs")) : t.removeClass(e.template, "pswp--supports-fs")), m.preloaderEl && (F(!0), d("beforeChange", function() {
                    clearTimeout(p), p = setTimeout(function() {
                        e.currItem && e.currItem.loading ? (!e.allowProgressiveImg() || e.currItem.img && !e.currItem.img.naturalWidth) && F(!1) : F(!0)
                    }, m.loadingIndicatorDelay)
                }), d("imageLoadComplete", function(t, n) {
                    e.currItem === n && F(!0)
                }))
            }, x.setIdle = function(e) {
                u = e, E(i, "ui--idle", e)
            }, x.update = function() {
                C && e.currItem ? (x.updateIndexIndicator(), m.captionEl && (m.addCaptionHTMLFn(e.currItem, o), E(o, "caption--empty", !e.currItem.title)), w = !0) : w = !1, k || D(), A()
            }, x.updateFullscreen = function(i) {
                i && setTimeout(function() {
                    e.setScrollOffset(0, t.getScrollY())
                }, 50), t[(n.isFullscreen() ? "add" : "remove") + "Class"](e.template, "pswp--fs")
            }, x.updateIndexIndicator = function() {
                m.counterEl && (a.innerHTML = e.getCurrentIndex() + 1 + m.indexIndicatorSep + m.getNumItemsFn())
            }, x.onGlobalTap = function(n) {
                var i = (n = n || window.event).target || n.srcElement;
                if (!v)
                    if (n.detail && "mouse" === n.detail.pointerType) {
                        if (O(i)) return void e.close();
                        t.hasClass(i, "pswp__img") && (1 === e.getZoomLevel() && e.getZoomLevel() <= e.currItem.fitRatio ? m.clickToCloseNonZoomable && e.close() : e.toggleDesktopZoom(n.detail.releasePoint))
                    } else if (m.tapToToggleControls && (C ? x.hideControls() : x.showControls()), m.tapToClose && (t.hasClass(i, "pswp__img") || O(i))) return void e.close()
            }, x.onMouseOver = function(e) {
                var t = (e = e || window.event).target || e.srcElement;
                E(i, "ui--over-close", O(t))
            }, x.hideControls = function() {
                t.addClass(i, "pswp__ui--hidden"), C = !1
            }, x.showControls = function() {
                C = !0, w || x.update(), t.removeClass(i, "pswp__ui--hidden")
            }, x.supportsFullscreen = function() {
                var e = document;
                return !!(e.exitFullscreen || e.mozCancelFullScreen || e.webkitExitFullscreen || e.msExitFullscreen)
            }, x.getFullscreenAPI = function() {
                var t, n = document.documentElement,
                    i = "fullscreenchange";
                return n.requestFullscreen ? t = {
                    enterK: "requestFullscreen",
                    exitK: "exitFullscreen",
                    elementK: "fullscreenElement",
                    eventK: i
                } : n.mozRequestFullScreen ? t = {
                    enterK: "mozRequestFullScreen",
                    exitK: "mozCancelFullScreen",
                    elementK: "mozFullScreenElement",
                    eventK: "moz" + i
                } : n.webkitRequestFullscreen ? t = {
                    enterK: "webkitRequestFullscreen",
                    exitK: "webkitExitFullscreen",
                    elementK: "webkitFullscreenElement",
                    eventK: "webkit" + i
                } : n.msRequestFullscreen && (t = {
                    enterK: "msRequestFullscreen",
                    exitK: "msExitFullscreen",
                    elementK: "msFullscreenElement",
                    eventK: "MSFullscreenChange"
                }), t && (t.enter = function() {
                    return c = m.closeOnScroll, m.closeOnScroll = !1, "webkitRequestFullscreen" !== this.enterK ? e.template[this.enterK]() : void e.template[this.enterK](Element.ALLOW_KEYBOARD_INPUT)
                }, t.exit = function() {
                    return m.closeOnScroll = c, document[this.exitK]()
                }, t.isFullscreen = function() {
                    return document[this.elementK]
                }), t
            }
        }
    });
/*EndMat*/






