/*! For license information please see hs-dropdown.js.LICENSE.txt */
!(function (e, t) {
    if ("object" == typeof exports && "object" == typeof module)
        module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
        var n = t();
        for (var o in n) ("object" == typeof exports ? exports : e)[o] = n[o];
    }
})(self, function () {
    return (() => {
        "use strict";
        var e = {
                765: (e, t, n) => {
                    function o(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var o = t[n];
                            (o.enumerable = o.enumerable || !1),
                                (o.configurable = !0),
                                "value" in o && (o.writable = !0),
                                Object.defineProperty(e, o.key, o);
                        }
                    }
                    n.d(t, { Z: () => r });
                    var r = (function () {
                        function e(t, n) {
                            !(function (e, t) {
                                if (!(e instanceof t))
                                    throw new TypeError(
                                        "Cannot call a class as a function"
                                    );
                            })(this, e),
                                (this.$collection = []),
                                (this.selector = t),
                                (this.config = n),
                                (this.events = {});
                        }
                        var t, n;
                        return (
                            (t = e),
                            (n = [
                                {
                                    key: "_fireEvent",
                                    value: function (e) {
                                        var t =
                                            arguments.length > 1 &&
                                            void 0 !== arguments[1]
                                                ? arguments[1]
                                                : null;
                                        this.events.hasOwnProperty(e) &&
                                            this.events[e](t);
                                    },
                                },
                                {
                                    key: "_dispatch",
                                    value: function (e, t) {
                                        var n =
                                                arguments.length > 2 &&
                                                void 0 !== arguments[2]
                                                    ? arguments[2]
                                                    : null,
                                            o = new CustomEvent(e, {
                                                detail: { payload: n },
                                                bubbles: !0,
                                                cancelable: !0,
                                                composed: !1,
                                            });
                                        t.dispatchEvent(o);
                                    },
                                },
                                {
                                    key: "on",
                                    value: function (e, t) {
                                        this.events[e] = t;
                                    },
                                },
                                {
                                    key: "afterTransition",
                                    value: function (e, t) {
                                        "all 0s ease 0s" !==
                                        window
                                            .getComputedStyle(e, null)
                                            .getPropertyValue("transition")
                                            ? e.addEventListener(
                                                  "transitionend",
                                                  function n() {
                                                      t(),
                                                          e.removeEventListener(
                                                              "transitionend",
                                                              n,
                                                              !0
                                                          );
                                                  },
                                                  !0
                                              )
                                            : t();
                                    },
                                },
                                {
                                    key: "getClassProperty",
                                    value: function (e, t) {
                                        var n =
                                                arguments.length > 2 &&
                                                void 0 !== arguments[2]
                                                    ? arguments[2]
                                                    : "",
                                            o = (
                                                window
                                                    .getComputedStyle(e)
                                                    .getPropertyValue(t) || n
                                            ).replace(" ", "");
                                        return o;
                                    },
                                },
                            ]),
                            n && o(t.prototype, n),
                            Object.defineProperty(t, "prototype", {
                                writable: !1,
                            }),
                            e
                        );
                    })();
                },
                714: (e, t, n) => {
                    function o(e) {
                        if (null == e) return window;
                        if ("[object Window]" !== e.toString()) {
                            var t = e.ownerDocument;
                            return (t && t.defaultView) || window;
                        }
                        return e;
                    }
                    function r(e) {
                        return (
                            e instanceof o(e).Element || e instanceof Element
                        );
                    }
                    function i(e) {
                        return (
                            e instanceof o(e).HTMLElement ||
                            e instanceof HTMLElement
                        );
                    }
                    function a(e) {
                        return (
                            "undefined" != typeof ShadowRoot &&
                            (e instanceof o(e).ShadowRoot ||
                                e instanceof ShadowRoot)
                        );
                    }
                    n.d(t, { fi: () => ce });
                    var s = Math.max,
                        c = Math.min,
                        f = Math.round;
                    function l(e, t) {
                        void 0 === t && (t = !1);
                        var n = e.getBoundingClientRect(),
                            o = 1,
                            r = 1;
                        if (i(e) && t) {
                            var a = e.offsetHeight,
                                s = e.offsetWidth;
                            s > 0 && (o = f(n.width) / s || 1),
                                a > 0 && (r = f(n.height) / a || 1);
                        }
                        return {
                            width: n.width / o,
                            height: n.height / r,
                            top: n.top / r,
                            right: n.right / o,
                            bottom: n.bottom / r,
                            left: n.left / o,
                            x: n.left / o,
                            y: n.top / r,
                        };
                    }
                    function u(e) {
                        var t = o(e);
                        return {
                            scrollLeft: t.pageXOffset,
                            scrollTop: t.pageYOffset,
                        };
                    }
                    function p(e) {
                        return e ? (e.nodeName || "").toLowerCase() : null;
                    }
                    function d(e) {
                        return (
                            (r(e) ? e.ownerDocument : e.document) ||
                            window.document
                        ).documentElement;
                    }
                    function h(e) {
                        return l(d(e)).left + u(e).scrollLeft;
                    }
                    function y(e) {
                        return o(e).getComputedStyle(e);
                    }
                    function m(e) {
                        var t = y(e),
                            n = t.overflow,
                            o = t.overflowX,
                            r = t.overflowY;
                        return /auto|scroll|overlay|hidden/.test(n + r + o);
                    }
                    function v(e, t, n) {
                        void 0 === n && (n = !1);
                        var r,
                            a,
                            s = i(t),
                            c =
                                i(t) &&
                                (function (e) {
                                    var t = e.getBoundingClientRect(),
                                        n = f(t.width) / e.offsetWidth || 1,
                                        o = f(t.height) / e.offsetHeight || 1;
                                    return 1 !== n || 1 !== o;
                                })(t),
                            y = d(t),
                            v = l(e, c),
                            g = { scrollLeft: 0, scrollTop: 0 },
                            b = { x: 0, y: 0 };
                        return (
                            (s || (!s && !n)) &&
                                (("body" !== p(t) || m(y)) &&
                                    (g =
                                        (r = t) !== o(r) && i(r)
                                            ? {
                                                  scrollLeft: (a = r)
                                                      .scrollLeft,
                                                  scrollTop: a.scrollTop,
                                              }
                                            : u(r)),
                                i(t)
                                    ? (((b = l(t, !0)).x += t.clientLeft),
                                      (b.y += t.clientTop))
                                    : y && (b.x = h(y))),
                            {
                                x: v.left + g.scrollLeft - b.x,
                                y: v.top + g.scrollTop - b.y,
                                width: v.width,
                                height: v.height,
                            }
                        );
                    }
                    function g(e) {
                        var t = l(e),
                            n = e.offsetWidth,
                            o = e.offsetHeight;
                        return (
                            Math.abs(t.width - n) <= 1 && (n = t.width),
                            Math.abs(t.height - o) <= 1 && (o = t.height),
                            {
                                x: e.offsetLeft,
                                y: e.offsetTop,
                                width: n,
                                height: o,
                            }
                        );
                    }
                    function b(e) {
                        return "html" === p(e)
                            ? e
                            : e.assignedSlot ||
                                  e.parentNode ||
                                  (a(e) ? e.host : null) ||
                                  d(e);
                    }
                    function w(e) {
                        return ["html", "body", "#document"].indexOf(p(e)) >= 0
                            ? e.ownerDocument.body
                            : i(e) && m(e)
                            ? e
                            : w(b(e));
                    }
                    function x(e, t) {
                        var n;
                        void 0 === t && (t = []);
                        var r = w(e),
                            i =
                                r ===
                                (null == (n = e.ownerDocument)
                                    ? void 0
                                    : n.body),
                            a = o(r),
                            s = i
                                ? [a].concat(
                                      a.visualViewport || [],
                                      m(r) ? r : []
                                  )
                                : r,
                            c = t.concat(s);
                        return i ? c : c.concat(x(b(s)));
                    }
                    function O(e) {
                        return ["table", "td", "th"].indexOf(p(e)) >= 0;
                    }
                    function S(e) {
                        return i(e) && "fixed" !== y(e).position
                            ? e.offsetParent
                            : null;
                    }
                    function j(e) {
                        for (
                            var t = o(e), n = S(e);
                            n && O(n) && "static" === y(n).position;

                        )
                            n = S(n);
                        return n &&
                            ("html" === p(n) ||
                                ("body" === p(n) && "static" === y(n).position))
                            ? t
                            : n ||
                                  (function (e) {
                                      var t =
                                          -1 !==
                                          navigator.userAgent
                                              .toLowerCase()
                                              .indexOf("firefox");
                                      if (
                                          -1 !==
                                              navigator.userAgent.indexOf(
                                                  "Trident"
                                              ) &&
                                          i(e) &&
                                          "fixed" === y(e).position
                                      )
                                          return null;
                                      for (
                                          var n = b(e);
                                          i(n) &&
                                          ["html", "body"].indexOf(p(n)) < 0;

                                      ) {
                                          var o = y(n);
                                          if (
                                              "none" !== o.transform ||
                                              "none" !== o.perspective ||
                                              "paint" === o.contain ||
                                              -1 !==
                                                  [
                                                      "transform",
                                                      "perspective",
                                                  ].indexOf(o.willChange) ||
                                              (t &&
                                                  "filter" === o.willChange) ||
                                              (t &&
                                                  o.filter &&
                                                  "none" !== o.filter)
                                          )
                                              return n;
                                          n = n.parentNode;
                                      }
                                      return null;
                                  })(e) ||
                                  t;
                    }
                    var E = "top",
                        k = "bottom",
                        P = "right",
                        _ = "left",
                        L = "auto",
                        A = [E, k, P, _],
                        D = "start",
                        C = "end",
                        q = "viewport",
                        T = "popper",
                        M = A.reduce(function (e, t) {
                            return e.concat([t + "-" + D, t + "-" + C]);
                        }, []),
                        H = [].concat(A, [L]).reduce(function (e, t) {
                            return e.concat([t, t + "-" + D, t + "-" + C]);
                        }, []),
                        R = [
                            "beforeRead",
                            "read",
                            "afterRead",
                            "beforeMain",
                            "main",
                            "afterMain",
                            "beforeWrite",
                            "write",
                            "afterWrite",
                        ];
                    function V(e) {
                        var t = new Map(),
                            n = new Set(),
                            o = [];
                        function r(e) {
                            n.add(e.name),
                                []
                                    .concat(
                                        e.requires || [],
                                        e.requiresIfExists || []
                                    )
                                    .forEach(function (e) {
                                        if (!n.has(e)) {
                                            var o = t.get(e);
                                            o && r(o);
                                        }
                                    }),
                                o.push(e);
                        }
                        return (
                            e.forEach(function (e) {
                                t.set(e.name, e);
                            }),
                            e.forEach(function (e) {
                                n.has(e.name) || r(e);
                            }),
                            o
                        );
                    }
                    var I = {
                        placement: "bottom",
                        modifiers: [],
                        strategy: "absolute",
                    };
                    function B() {
                        for (
                            var e = arguments.length, t = new Array(e), n = 0;
                            n < e;
                            n++
                        )
                            t[n] = arguments[n];
                        return !t.some(function (e) {
                            return !(
                                e &&
                                "function" == typeof e.getBoundingClientRect
                            );
                        });
                    }
                    function W(e) {
                        void 0 === e && (e = {});
                        var t = e,
                            n = t.defaultModifiers,
                            o = void 0 === n ? [] : n,
                            i = t.defaultOptions,
                            a = void 0 === i ? I : i;
                        return function (e, t, n) {
                            void 0 === n && (n = a);
                            var i,
                                s,
                                c = {
                                    placement: "bottom",
                                    orderedModifiers: [],
                                    options: Object.assign({}, I, a),
                                    modifiersData: {},
                                    elements: { reference: e, popper: t },
                                    attributes: {},
                                    styles: {},
                                },
                                f = [],
                                l = !1,
                                u = {
                                    state: c,
                                    setOptions: function (n) {
                                        var i =
                                            "function" == typeof n
                                                ? n(c.options)
                                                : n;
                                        p(),
                                            (c.options = Object.assign(
                                                {},
                                                a,
                                                c.options,
                                                i
                                            )),
                                            (c.scrollParents = {
                                                reference: r(e)
                                                    ? x(e)
                                                    : e.contextElement
                                                    ? x(e.contextElement)
                                                    : [],
                                                popper: x(t),
                                            });
                                        var s,
                                            l,
                                            d = (function (e) {
                                                var t = V(e);
                                                return R.reduce(function (
                                                    e,
                                                    n
                                                ) {
                                                    return e.concat(
                                                        t.filter(function (e) {
                                                            return (
                                                                e.phase === n
                                                            );
                                                        })
                                                    );
                                                },
                                                []);
                                            })(
                                                ((s = [].concat(
                                                    o,
                                                    c.options.modifiers
                                                )),
                                                (l = s.reduce(function (e, t) {
                                                    var n = e[t.name];
                                                    return (
                                                        (e[t.name] = n
                                                            ? Object.assign(
                                                                  {},
                                                                  n,
                                                                  t,
                                                                  {
                                                                      options:
                                                                          Object.assign(
                                                                              {},
                                                                              n.options,
                                                                              t.options
                                                                          ),
                                                                      data: Object.assign(
                                                                          {},
                                                                          n.data,
                                                                          t.data
                                                                      ),
                                                                  }
                                                              )
                                                            : t),
                                                        e
                                                    );
                                                }, {})),
                                                Object.keys(l).map(function (
                                                    e
                                                ) {
                                                    return l[e];
                                                }))
                                            );
                                        return (
                                            (c.orderedModifiers = d.filter(
                                                function (e) {
                                                    return e.enabled;
                                                }
                                            )),
                                            c.orderedModifiers.forEach(
                                                function (e) {
                                                    var t = e.name,
                                                        n = e.options,
                                                        o =
                                                            void 0 === n
                                                                ? {}
                                                                : n,
                                                        r = e.effect;
                                                    if (
                                                        "function" == typeof r
                                                    ) {
                                                        var i = r({
                                                            state: c,
                                                            name: t,
                                                            instance: u,
                                                            options: o,
                                                        });
                                                        f.push(
                                                            i || function () {}
                                                        );
                                                    }
                                                }
                                            ),
                                            u.update()
                                        );
                                    },
                                    forceUpdate: function () {
                                        if (!l) {
                                            var e = c.elements,
                                                t = e.reference,
                                                n = e.popper;
                                            if (B(t, n)) {
                                                (c.rects = {
                                                    reference: v(
                                                        t,
                                                        j(n),
                                                        "fixed" ===
                                                            c.options.strategy
                                                    ),
                                                    popper: g(n),
                                                }),
                                                    (c.reset = !1),
                                                    (c.placement =
                                                        c.options.placement),
                                                    c.orderedModifiers.forEach(
                                                        function (e) {
                                                            return (c.modifiersData[
                                                                e.name
                                                            ] = Object.assign(
                                                                {},
                                                                e.data
                                                            ));
                                                        }
                                                    );
                                                for (
                                                    var o = 0;
                                                    o <
                                                    c.orderedModifiers.length;
                                                    o++
                                                )
                                                    if (!0 !== c.reset) {
                                                        var r =
                                                                c
                                                                    .orderedModifiers[
                                                                    o
                                                                ],
                                                            i = r.fn,
                                                            a = r.options,
                                                            s =
                                                                void 0 === a
                                                                    ? {}
                                                                    : a,
                                                            f = r.name;
                                                        "function" ==
                                                            typeof i &&
                                                            (c =
                                                                i({
                                                                    state: c,
                                                                    options: s,
                                                                    name: f,
                                                                    instance: u,
                                                                }) || c);
                                                    } else
                                                        (c.reset = !1),
                                                            (o = -1);
                                            }
                                        }
                                    },
                                    update:
                                        ((i = function () {
                                            return new Promise(function (e) {
                                                u.forceUpdate(), e(c);
                                            });
                                        }),
                                        function () {
                                            return (
                                                s ||
                                                    (s = new Promise(function (
                                                        e
                                                    ) {
                                                        Promise.resolve().then(
                                                            function () {
                                                                (s = void 0),
                                                                    e(i());
                                                            }
                                                        );
                                                    })),
                                                s
                                            );
                                        }),
                                    destroy: function () {
                                        p(), (l = !0);
                                    },
                                };
                            if (!B(e, t)) return u;
                            function p() {
                                f.forEach(function (e) {
                                    return e();
                                }),
                                    (f = []);
                            }
                            return (
                                u.setOptions(n).then(function (e) {
                                    !l && n.onFirstUpdate && n.onFirstUpdate(e);
                                }),
                                u
                            );
                        };
                    }
                    var N = { passive: !0 };
                    function U(e) {
                        return e.split("-")[0];
                    }
                    function z(e) {
                        return e.split("-")[1];
                    }
                    function F(e) {
                        return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y";
                    }
                    function X(e) {
                        var t,
                            n = e.reference,
                            o = e.element,
                            r = e.placement,
                            i = r ? U(r) : null,
                            a = r ? z(r) : null,
                            s = n.x + n.width / 2 - o.width / 2,
                            c = n.y + n.height / 2 - o.height / 2;
                        switch (i) {
                            case E:
                                t = { x: s, y: n.y - o.height };
                                break;
                            case k:
                                t = { x: s, y: n.y + n.height };
                                break;
                            case P:
                                t = { x: n.x + n.width, y: c };
                                break;
                            case _:
                                t = { x: n.x - o.width, y: c };
                                break;
                            default:
                                t = { x: n.x, y: n.y };
                        }
                        var f = i ? F(i) : null;
                        if (null != f) {
                            var l = "y" === f ? "height" : "width";
                            switch (a) {
                                case D:
                                    t[f] = t[f] - (n[l] / 2 - o[l] / 2);
                                    break;
                                case C:
                                    t[f] = t[f] + (n[l] / 2 - o[l] / 2);
                            }
                        }
                        return t;
                    }
                    var Y = {
                        top: "auto",
                        right: "auto",
                        bottom: "auto",
                        left: "auto",
                    };
                    function Z(e) {
                        var t,
                            n = e.popper,
                            r = e.popperRect,
                            i = e.placement,
                            a = e.variation,
                            s = e.offsets,
                            c = e.position,
                            l = e.gpuAcceleration,
                            u = e.adaptive,
                            p = e.roundOffsets,
                            h = e.isFixed,
                            m = s.x,
                            v = void 0 === m ? 0 : m,
                            g = s.y,
                            b = void 0 === g ? 0 : g,
                            w =
                                "function" == typeof p
                                    ? p({ x: v, y: b })
                                    : { x: v, y: b };
                        (v = w.x), (b = w.y);
                        var x = s.hasOwnProperty("x"),
                            O = s.hasOwnProperty("y"),
                            S = _,
                            L = E,
                            A = window;
                        if (u) {
                            var D = j(n),
                                q = "clientHeight",
                                T = "clientWidth";
                            D === o(n) &&
                                "static" !== y((D = d(n))).position &&
                                "absolute" === c &&
                                ((q = "scrollHeight"), (T = "scrollWidth")),
                                (D = D),
                                (i === E ||
                                    ((i === _ || i === P) && a === C)) &&
                                    ((L = k),
                                    (b -=
                                        (h && A.visualViewport
                                            ? A.visualViewport.height
                                            : D[q]) - r.height),
                                    (b *= l ? 1 : -1)),
                                (i !== _ &&
                                    ((i !== E && i !== k) || a !== C)) ||
                                    ((S = P),
                                    (v -=
                                        (h && A.visualViewport
                                            ? A.visualViewport.width
                                            : D[T]) - r.width),
                                    (v *= l ? 1 : -1));
                        }
                        var M,
                            H = Object.assign({ position: c }, u && Y),
                            R =
                                !0 === p
                                    ? (function (e) {
                                          var t = e.x,
                                              n = e.y,
                                              o = window.devicePixelRatio || 1;
                                          return {
                                              x: f(t * o) / o || 0,
                                              y: f(n * o) / o || 0,
                                          };
                                      })({ x: v, y: b })
                                    : { x: v, y: b };
                        return (
                            (v = R.x),
                            (b = R.y),
                            l
                                ? Object.assign(
                                      {},
                                      H,
                                      (((M = {})[L] = O ? "0" : ""),
                                      (M[S] = x ? "0" : ""),
                                      (M.transform =
                                          (A.devicePixelRatio || 1) <= 1
                                              ? "translate(" +
                                                v +
                                                "px, " +
                                                b +
                                                "px)"
                                              : "translate3d(" +
                                                v +
                                                "px, " +
                                                b +
                                                "px, 0)"),
                                      M)
                                  )
                                : Object.assign(
                                      {},
                                      H,
                                      (((t = {})[L] = O ? b + "px" : ""),
                                      (t[S] = x ? v + "px" : ""),
                                      (t.transform = ""),
                                      t)
                                  )
                        );
                    }
                    var $ = {
                        left: "right",
                        right: "left",
                        bottom: "top",
                        top: "bottom",
                    };
                    function G(e) {
                        return e.replace(
                            /left|right|bottom|top/g,
                            function (e) {
                                return $[e];
                            }
                        );
                    }
                    var J = { start: "end", end: "start" };
                    function K(e) {
                        return e.replace(/start|end/g, function (e) {
                            return J[e];
                        });
                    }
                    function Q(e, t) {
                        var n = t.getRootNode && t.getRootNode();
                        if (e.contains(t)) return !0;
                        if (n && a(n)) {
                            var o = t;
                            do {
                                if (o && e.isSameNode(o)) return !0;
                                o = o.parentNode || o.host;
                            } while (o);
                        }
                        return !1;
                    }
                    function ee(e) {
                        return Object.assign({}, e, {
                            left: e.x,
                            top: e.y,
                            right: e.x + e.width,
                            bottom: e.y + e.height,
                        });
                    }
                    function te(e, t) {
                        return t === q
                            ? ee(
                                  (function (e) {
                                      var t = o(e),
                                          n = d(e),
                                          r = t.visualViewport,
                                          i = n.clientWidth,
                                          a = n.clientHeight,
                                          s = 0,
                                          c = 0;
                                      return (
                                          r &&
                                              ((i = r.width),
                                              (a = r.height),
                                              /^((?!chrome|android).)*safari/i.test(
                                                  navigator.userAgent
                                              ) ||
                                                  ((s = r.offsetLeft),
                                                  (c = r.offsetTop))),
                                          {
                                              width: i,
                                              height: a,
                                              x: s + h(e),
                                              y: c,
                                          }
                                      );
                                  })(e)
                              )
                            : r(t)
                            ? (function (e) {
                                  var t = l(e);
                                  return (
                                      (t.top = t.top + e.clientTop),
                                      (t.left = t.left + e.clientLeft),
                                      (t.bottom = t.top + e.clientHeight),
                                      (t.right = t.left + e.clientWidth),
                                      (t.width = e.clientWidth),
                                      (t.height = e.clientHeight),
                                      (t.x = t.left),
                                      (t.y = t.top),
                                      t
                                  );
                              })(t)
                            : ee(
                                  (function (e) {
                                      var t,
                                          n = d(e),
                                          o = u(e),
                                          r =
                                              null == (t = e.ownerDocument)
                                                  ? void 0
                                                  : t.body,
                                          i = s(
                                              n.scrollWidth,
                                              n.clientWidth,
                                              r ? r.scrollWidth : 0,
                                              r ? r.clientWidth : 0
                                          ),
                                          a = s(
                                              n.scrollHeight,
                                              n.clientHeight,
                                              r ? r.scrollHeight : 0,
                                              r ? r.clientHeight : 0
                                          ),
                                          c = -o.scrollLeft + h(e),
                                          f = -o.scrollTop;
                                      return (
                                          "rtl" === y(r || n).direction &&
                                              (c +=
                                                  s(
                                                      n.clientWidth,
                                                      r ? r.clientWidth : 0
                                                  ) - i),
                                          { width: i, height: a, x: c, y: f }
                                      );
                                  })(d(e))
                              );
                    }
                    function ne(e) {
                        return Object.assign(
                            {},
                            { top: 0, right: 0, bottom: 0, left: 0 },
                            e
                        );
                    }
                    function oe(e, t) {
                        return t.reduce(function (t, n) {
                            return (t[n] = e), t;
                        }, {});
                    }
                    function re(e, t) {
                        void 0 === t && (t = {});
                        var n = t,
                            o = n.placement,
                            a = void 0 === o ? e.placement : o,
                            f = n.boundary,
                            u = void 0 === f ? "clippingParents" : f,
                            h = n.rootBoundary,
                            m = void 0 === h ? q : h,
                            v = n.elementContext,
                            g = void 0 === v ? T : v,
                            w = n.altBoundary,
                            O = void 0 !== w && w,
                            S = n.padding,
                            _ = void 0 === S ? 0 : S,
                            L = ne("number" != typeof _ ? _ : oe(_, A)),
                            D = g === T ? "reference" : T,
                            C = e.rects.popper,
                            M = e.elements[O ? D : g],
                            H = (function (e, t, n) {
                                var o =
                                        "clippingParents" === t
                                            ? (function (e) {
                                                  var t = x(b(e)),
                                                      n =
                                                          [
                                                              "absolute",
                                                              "fixed",
                                                          ].indexOf(
                                                              y(e).position
                                                          ) >= 0 && i(e)
                                                              ? j(e)
                                                              : e;
                                                  return r(n)
                                                      ? t.filter(function (e) {
                                                            return (
                                                                r(e) &&
                                                                Q(e, n) &&
                                                                "body" !== p(e)
                                                            );
                                                        })
                                                      : [];
                                              })(e)
                                            : [].concat(t),
                                    a = [].concat(o, [n]),
                                    f = a[0],
                                    l = a.reduce(function (t, n) {
                                        var o = te(e, n);
                                        return (
                                            (t.top = s(o.top, t.top)),
                                            (t.right = c(o.right, t.right)),
                                            (t.bottom = c(o.bottom, t.bottom)),
                                            (t.left = s(o.left, t.left)),
                                            t
                                        );
                                    }, te(e, f));
                                return (
                                    (l.width = l.right - l.left),
                                    (l.height = l.bottom - l.top),
                                    (l.x = l.left),
                                    (l.y = l.top),
                                    l
                                );
                            })(
                                r(M)
                                    ? M
                                    : M.contextElement || d(e.elements.popper),
                                u,
                                m
                            ),
                            R = l(e.elements.reference),
                            V = X({
                                reference: R,
                                element: C,
                                strategy: "absolute",
                                placement: a,
                            }),
                            I = ee(Object.assign({}, C, V)),
                            B = g === T ? I : R,
                            W = {
                                top: H.top - B.top + L.top,
                                bottom: B.bottom - H.bottom + L.bottom,
                                left: H.left - B.left + L.left,
                                right: B.right - H.right + L.right,
                            },
                            N = e.modifiersData.offset;
                        if (g === T && N) {
                            var U = N[a];
                            Object.keys(W).forEach(function (e) {
                                var t = [P, k].indexOf(e) >= 0 ? 1 : -1,
                                    n = [E, k].indexOf(e) >= 0 ? "y" : "x";
                                W[e] += U[n] * t;
                            });
                        }
                        return W;
                    }
                    function ie(e, t, n) {
                        return s(e, c(t, n));
                    }
                    function ae(e, t, n) {
                        return (
                            void 0 === n && (n = { x: 0, y: 0 }),
                            {
                                top: e.top - t.height - n.y,
                                right: e.right - t.width + n.x,
                                bottom: e.bottom - t.height + n.y,
                                left: e.left - t.width - n.x,
                            }
                        );
                    }
                    function se(e) {
                        return [E, P, k, _].some(function (t) {
                            return e[t] >= 0;
                        });
                    }
                    var ce = W({
                        defaultModifiers: [
                            {
                                name: "eventListeners",
                                enabled: !0,
                                phase: "write",
                                fn: function () {},
                                effect: function (e) {
                                    var t = e.state,
                                        n = e.instance,
                                        r = e.options,
                                        i = r.scroll,
                                        a = void 0 === i || i,
                                        s = r.resize,
                                        c = void 0 === s || s,
                                        f = o(t.elements.popper),
                                        l = [].concat(
                                            t.scrollParents.reference,
                                            t.scrollParents.popper
                                        );
                                    return (
                                        a &&
                                            l.forEach(function (e) {
                                                e.addEventListener(
                                                    "scroll",
                                                    n.update,
                                                    N
                                                );
                                            }),
                                        c &&
                                            f.addEventListener(
                                                "resize",
                                                n.update,
                                                N
                                            ),
                                        function () {
                                            a &&
                                                l.forEach(function (e) {
                                                    e.removeEventListener(
                                                        "scroll",
                                                        n.update,
                                                        N
                                                    );
                                                }),
                                                c &&
                                                    f.removeEventListener(
                                                        "resize",
                                                        n.update,
                                                        N
                                                    );
                                        }
                                    );
                                },
                                data: {},
                            },
                            {
                                name: "popperOffsets",
                                enabled: !0,
                                phase: "read",
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.name;
                                    t.modifiersData[n] = X({
                                        reference: t.rects.reference,
                                        element: t.rects.popper,
                                        strategy: "absolute",
                                        placement: t.placement,
                                    });
                                },
                                data: {},
                            },
                            {
                                name: "computeStyles",
                                enabled: !0,
                                phase: "beforeWrite",
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.options,
                                        o = n.gpuAcceleration,
                                        r = void 0 === o || o,
                                        i = n.adaptive,
                                        a = void 0 === i || i,
                                        s = n.roundOffsets,
                                        c = void 0 === s || s,
                                        f = {
                                            placement: U(t.placement),
                                            variation: z(t.placement),
                                            popper: t.elements.popper,
                                            popperRect: t.rects.popper,
                                            gpuAcceleration: r,
                                            isFixed:
                                                "fixed" === t.options.strategy,
                                        };
                                    null != t.modifiersData.popperOffsets &&
                                        (t.styles.popper = Object.assign(
                                            {},
                                            t.styles.popper,
                                            Z(
                                                Object.assign({}, f, {
                                                    offsets:
                                                        t.modifiersData
                                                            .popperOffsets,
                                                    position:
                                                        t.options.strategy,
                                                    adaptive: a,
                                                    roundOffsets: c,
                                                })
                                            )
                                        )),
                                        null != t.modifiersData.arrow &&
                                            (t.styles.arrow = Object.assign(
                                                {},
                                                t.styles.arrow,
                                                Z(
                                                    Object.assign({}, f, {
                                                        offsets:
                                                            t.modifiersData
                                                                .arrow,
                                                        position: "absolute",
                                                        adaptive: !1,
                                                        roundOffsets: c,
                                                    })
                                                )
                                            )),
                                        (t.attributes.popper = Object.assign(
                                            {},
                                            t.attributes.popper,
                                            {
                                                "data-popper-placement":
                                                    t.placement,
                                            }
                                        ));
                                },
                                data: {},
                            },
                            {
                                name: "applyStyles",
                                enabled: !0,
                                phase: "write",
                                fn: function (e) {
                                    var t = e.state;
                                    Object.keys(t.elements).forEach(function (
                                        e
                                    ) {
                                        var n = t.styles[e] || {},
                                            o = t.attributes[e] || {},
                                            r = t.elements[e];
                                        i(r) &&
                                            p(r) &&
                                            (Object.assign(r.style, n),
                                            Object.keys(o).forEach(function (
                                                e
                                            ) {
                                                var t = o[e];
                                                !1 === t
                                                    ? r.removeAttribute(e)
                                                    : r.setAttribute(
                                                          e,
                                                          !0 === t ? "" : t
                                                      );
                                            }));
                                    });
                                },
                                effect: function (e) {
                                    var t = e.state,
                                        n = {
                                            popper: {
                                                position: t.options.strategy,
                                                left: "0",
                                                top: "0",
                                                margin: "0",
                                            },
                                            arrow: { position: "absolute" },
                                            reference: {},
                                        };
                                    return (
                                        Object.assign(
                                            t.elements.popper.style,
                                            n.popper
                                        ),
                                        (t.styles = n),
                                        t.elements.arrow &&
                                            Object.assign(
                                                t.elements.arrow.style,
                                                n.arrow
                                            ),
                                        function () {
                                            Object.keys(t.elements).forEach(
                                                function (e) {
                                                    var o = t.elements[e],
                                                        r =
                                                            t.attributes[e] ||
                                                            {},
                                                        a = Object.keys(
                                                            t.styles.hasOwnProperty(
                                                                e
                                                            )
                                                                ? t.styles[e]
                                                                : n[e]
                                                        ).reduce(function (
                                                            e,
                                                            t
                                                        ) {
                                                            return (
                                                                (e[t] = ""), e
                                                            );
                                                        },
                                                        {});
                                                    i(o) &&
                                                        p(o) &&
                                                        (Object.assign(
                                                            o.style,
                                                            a
                                                        ),
                                                        Object.keys(r).forEach(
                                                            function (e) {
                                                                o.removeAttribute(
                                                                    e
                                                                );
                                                            }
                                                        ));
                                                }
                                            );
                                        }
                                    );
                                },
                                requires: ["computeStyles"],
                            },
                            {
                                name: "offset",
                                enabled: !0,
                                phase: "main",
                                requires: ["popperOffsets"],
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.options,
                                        o = e.name,
                                        r = n.offset,
                                        i = void 0 === r ? [0, 0] : r,
                                        a = H.reduce(function (e, n) {
                                            return (
                                                (e[n] = (function (e, t, n) {
                                                    var o = U(e),
                                                        r =
                                                            [_, E].indexOf(o) >=
                                                            0
                                                                ? -1
                                                                : 1,
                                                        i =
                                                            "function" ==
                                                            typeof n
                                                                ? n(
                                                                      Object.assign(
                                                                          {},
                                                                          t,
                                                                          {
                                                                              placement:
                                                                                  e,
                                                                          }
                                                                      )
                                                                  )
                                                                : n,
                                                        a = i[0],
                                                        s = i[1];
                                                    return (
                                                        (a = a || 0),
                                                        (s = (s || 0) * r),
                                                        [_, P].indexOf(o) >= 0
                                                            ? { x: s, y: a }
                                                            : { x: a, y: s }
                                                    );
                                                })(n, t.rects, i)),
                                                e
                                            );
                                        }, {}),
                                        s = a[t.placement],
                                        c = s.x,
                                        f = s.y;
                                    null != t.modifiersData.popperOffsets &&
                                        ((t.modifiersData.popperOffsets.x += c),
                                        (t.modifiersData.popperOffsets.y += f)),
                                        (t.modifiersData[o] = a);
                                },
                            },
                            {
                                name: "flip",
                                enabled: !0,
                                phase: "main",
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.options,
                                        o = e.name;
                                    if (!t.modifiersData[o]._skip) {
                                        for (
                                            var r = n.mainAxis,
                                                i = void 0 === r || r,
                                                a = n.altAxis,
                                                s = void 0 === a || a,
                                                c = n.fallbackPlacements,
                                                f = n.padding,
                                                l = n.boundary,
                                                u = n.rootBoundary,
                                                p = n.altBoundary,
                                                d = n.flipVariations,
                                                h = void 0 === d || d,
                                                y = n.allowedAutoPlacements,
                                                m = t.options.placement,
                                                v = U(m),
                                                g =
                                                    c ||
                                                    (v !== m && h
                                                        ? (function (e) {
                                                              if (U(e) === L)
                                                                  return [];
                                                              var t = G(e);
                                                              return [
                                                                  K(e),
                                                                  t,
                                                                  K(t),
                                                              ];
                                                          })(m)
                                                        : [G(m)]),
                                                b = [m]
                                                    .concat(g)
                                                    .reduce(function (e, n) {
                                                        return e.concat(
                                                            U(n) === L
                                                                ? (function (
                                                                      e,
                                                                      t
                                                                  ) {
                                                                      void 0 ===
                                                                          t &&
                                                                          (t =
                                                                              {});
                                                                      var n = t,
                                                                          o =
                                                                              n.placement,
                                                                          r =
                                                                              n.boundary,
                                                                          i =
                                                                              n.rootBoundary,
                                                                          a =
                                                                              n.padding,
                                                                          s =
                                                                              n.flipVariations,
                                                                          c =
                                                                              n.allowedAutoPlacements,
                                                                          f =
                                                                              void 0 ===
                                                                              c
                                                                                  ? H
                                                                                  : c,
                                                                          l =
                                                                              z(
                                                                                  o
                                                                              ),
                                                                          u = l
                                                                              ? s
                                                                                  ? M
                                                                                  : M.filter(
                                                                                        function (
                                                                                            e
                                                                                        ) {
                                                                                            return (
                                                                                                z(
                                                                                                    e
                                                                                                ) ===
                                                                                                l
                                                                                            );
                                                                                        }
                                                                                    )
                                                                              : A,
                                                                          p =
                                                                              u.filter(
                                                                                  function (
                                                                                      e
                                                                                  ) {
                                                                                      return (
                                                                                          f.indexOf(
                                                                                              e
                                                                                          ) >=
                                                                                          0
                                                                                      );
                                                                                  }
                                                                              );
                                                                      0 ===
                                                                          p.length &&
                                                                          (p =
                                                                              u);
                                                                      var d =
                                                                          p.reduce(
                                                                              function (
                                                                                  t,
                                                                                  n
                                                                              ) {
                                                                                  return (
                                                                                      (t[
                                                                                          n
                                                                                      ] =
                                                                                          re(
                                                                                              e,
                                                                                              {
                                                                                                  placement:
                                                                                                      n,
                                                                                                  boundary:
                                                                                                      r,
                                                                                                  rootBoundary:
                                                                                                      i,
                                                                                                  padding:
                                                                                                      a,
                                                                                              }
                                                                                          )[
                                                                                              U(
                                                                                                  n
                                                                                              )
                                                                                          ]),
                                                                                      t
                                                                                  );
                                                                              },
                                                                              {}
                                                                          );
                                                                      return Object.keys(
                                                                          d
                                                                      ).sort(
                                                                          function (
                                                                              e,
                                                                              t
                                                                          ) {
                                                                              return (
                                                                                  d[
                                                                                      e
                                                                                  ] -
                                                                                  d[
                                                                                      t
                                                                                  ]
                                                                              );
                                                                          }
                                                                      );
                                                                  })(t, {
                                                                      placement:
                                                                          n,
                                                                      boundary:
                                                                          l,
                                                                      rootBoundary:
                                                                          u,
                                                                      padding:
                                                                          f,
                                                                      flipVariations:
                                                                          h,
                                                                      allowedAutoPlacements:
                                                                          y,
                                                                  })
                                                                : n
                                                        );
                                                    }, []),
                                                w = t.rects.reference,
                                                x = t.rects.popper,
                                                O = new Map(),
                                                S = !0,
                                                j = b[0],
                                                C = 0;
                                            C < b.length;
                                            C++
                                        ) {
                                            var q = b[C],
                                                T = U(q),
                                                R = z(q) === D,
                                                V = [E, k].indexOf(T) >= 0,
                                                I = V ? "width" : "height",
                                                B = re(t, {
                                                    placement: q,
                                                    boundary: l,
                                                    rootBoundary: u,
                                                    altBoundary: p,
                                                    padding: f,
                                                }),
                                                W = V ? (R ? P : _) : R ? k : E;
                                            w[I] > x[I] && (W = G(W));
                                            var N = G(W),
                                                F = [];
                                            if (
                                                (i && F.push(B[T] <= 0),
                                                s &&
                                                    F.push(
                                                        B[W] <= 0,
                                                        B[N] <= 0
                                                    ),
                                                F.every(function (e) {
                                                    return e;
                                                }))
                                            ) {
                                                (j = q), (S = !1);
                                                break;
                                            }
                                            O.set(q, F);
                                        }
                                        if (S)
                                            for (
                                                var X = function (e) {
                                                        var t = b.find(
                                                            function (t) {
                                                                var n =
                                                                    O.get(t);
                                                                if (n)
                                                                    return n
                                                                        .slice(
                                                                            0,
                                                                            e
                                                                        )
                                                                        .every(
                                                                            function (
                                                                                e
                                                                            ) {
                                                                                return e;
                                                                            }
                                                                        );
                                                            }
                                                        );
                                                        if (t)
                                                            return (
                                                                (j = t), "break"
                                                            );
                                                    },
                                                    Y = h ? 3 : 1;
                                                Y > 0 && "break" !== X(Y);
                                                Y--
                                            );
                                        t.placement !== j &&
                                            ((t.modifiersData[o]._skip = !0),
                                            (t.placement = j),
                                            (t.reset = !0));
                                    }
                                },
                                requiresIfExists: ["offset"],
                                data: { _skip: !1 },
                            },
                            {
                                name: "preventOverflow",
                                enabled: !0,
                                phase: "main",
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.options,
                                        o = e.name,
                                        r = n.mainAxis,
                                        i = void 0 === r || r,
                                        a = n.altAxis,
                                        f = void 0 !== a && a,
                                        l = n.boundary,
                                        u = n.rootBoundary,
                                        p = n.altBoundary,
                                        d = n.padding,
                                        h = n.tether,
                                        y = void 0 === h || h,
                                        m = n.tetherOffset,
                                        v = void 0 === m ? 0 : m,
                                        b = re(t, {
                                            boundary: l,
                                            rootBoundary: u,
                                            padding: d,
                                            altBoundary: p,
                                        }),
                                        w = U(t.placement),
                                        x = z(t.placement),
                                        O = !x,
                                        S = F(w),
                                        L = "x" === S ? "y" : "x",
                                        A = t.modifiersData.popperOffsets,
                                        C = t.rects.reference,
                                        q = t.rects.popper,
                                        T =
                                            "function" == typeof v
                                                ? v(
                                                      Object.assign(
                                                          {},
                                                          t.rects,
                                                          {
                                                              placement:
                                                                  t.placement,
                                                          }
                                                      )
                                                  )
                                                : v,
                                        M =
                                            "number" == typeof T
                                                ? { mainAxis: T, altAxis: T }
                                                : Object.assign(
                                                      {
                                                          mainAxis: 0,
                                                          altAxis: 0,
                                                      },
                                                      T
                                                  ),
                                        H = t.modifiersData.offset
                                            ? t.modifiersData.offset[
                                                  t.placement
                                              ]
                                            : null,
                                        R = { x: 0, y: 0 };
                                    if (A) {
                                        if (i) {
                                            var V,
                                                I = "y" === S ? E : _,
                                                B = "y" === S ? k : P,
                                                W =
                                                    "y" === S
                                                        ? "height"
                                                        : "width",
                                                N = A[S],
                                                X = N + b[I],
                                                Y = N - b[B],
                                                Z = y ? -q[W] / 2 : 0,
                                                $ = x === D ? C[W] : q[W],
                                                G = x === D ? -q[W] : -C[W],
                                                J = t.elements.arrow,
                                                K =
                                                    y && J
                                                        ? g(J)
                                                        : {
                                                              width: 0,
                                                              height: 0,
                                                          },
                                                Q = t.modifiersData[
                                                    "arrow#persistent"
                                                ]
                                                    ? t.modifiersData[
                                                          "arrow#persistent"
                                                      ].padding
                                                    : {
                                                          top: 0,
                                                          right: 0,
                                                          bottom: 0,
                                                          left: 0,
                                                      },
                                                ee = Q[I],
                                                te = Q[B],
                                                ne = ie(0, C[W], K[W]),
                                                oe = O
                                                    ? C[W] / 2 -
                                                      Z -
                                                      ne -
                                                      ee -
                                                      M.mainAxis
                                                    : $ - ne - ee - M.mainAxis,
                                                ae = O
                                                    ? -C[W] / 2 +
                                                      Z +
                                                      ne +
                                                      te +
                                                      M.mainAxis
                                                    : G + ne + te + M.mainAxis,
                                                se =
                                                    t.elements.arrow &&
                                                    j(t.elements.arrow),
                                                ce = se
                                                    ? "y" === S
                                                        ? se.clientTop || 0
                                                        : se.clientLeft || 0
                                                    : 0,
                                                fe =
                                                    null !=
                                                    (V =
                                                        null == H
                                                            ? void 0
                                                            : H[S])
                                                        ? V
                                                        : 0,
                                                le = N + ae - fe,
                                                ue = ie(
                                                    y
                                                        ? c(X, N + oe - fe - ce)
                                                        : X,
                                                    N,
                                                    y ? s(Y, le) : Y
                                                );
                                            (A[S] = ue), (R[S] = ue - N);
                                        }
                                        if (f) {
                                            var pe,
                                                de = "x" === S ? E : _,
                                                he = "x" === S ? k : P,
                                                ye = A[L],
                                                me =
                                                    "y" === L
                                                        ? "height"
                                                        : "width",
                                                ve = ye + b[de],
                                                ge = ye - b[he],
                                                be = -1 !== [E, _].indexOf(w),
                                                we =
                                                    null !=
                                                    (pe =
                                                        null == H
                                                            ? void 0
                                                            : H[L])
                                                        ? pe
                                                        : 0,
                                                xe = be
                                                    ? ve
                                                    : ye -
                                                      C[me] -
                                                      q[me] -
                                                      we +
                                                      M.altAxis,
                                                Oe = be
                                                    ? ye +
                                                      C[me] +
                                                      q[me] -
                                                      we -
                                                      M.altAxis
                                                    : ge,
                                                Se =
                                                    y && be
                                                        ? (function (e, t, n) {
                                                              var o = ie(
                                                                  e,
                                                                  t,
                                                                  n
                                                              );
                                                              return o > n
                                                                  ? n
                                                                  : o;
                                                          })(xe, ye, Oe)
                                                        : ie(
                                                              y ? xe : ve,
                                                              ye,
                                                              y ? Oe : ge
                                                          );
                                            (A[L] = Se), (R[L] = Se - ye);
                                        }
                                        t.modifiersData[o] = R;
                                    }
                                },
                                requiresIfExists: ["offset"],
                            },
                            {
                                name: "arrow",
                                enabled: !0,
                                phase: "main",
                                fn: function (e) {
                                    var t,
                                        n = e.state,
                                        o = e.name,
                                        r = e.options,
                                        i = n.elements.arrow,
                                        a = n.modifiersData.popperOffsets,
                                        s = U(n.placement),
                                        c = F(s),
                                        f =
                                            [_, P].indexOf(s) >= 0
                                                ? "height"
                                                : "width";
                                    if (i && a) {
                                        var l = (function (e, t) {
                                                return ne(
                                                    "number" !=
                                                        typeof (e =
                                                            "function" ==
                                                            typeof e
                                                                ? e(
                                                                      Object.assign(
                                                                          {},
                                                                          t.rects,
                                                                          {
                                                                              placement:
                                                                                  t.placement,
                                                                          }
                                                                      )
                                                                  )
                                                                : e)
                                                        ? e
                                                        : oe(e, A)
                                                );
                                            })(r.padding, n),
                                            u = g(i),
                                            p = "y" === c ? E : _,
                                            d = "y" === c ? k : P,
                                            h =
                                                n.rects.reference[f] +
                                                n.rects.reference[c] -
                                                a[c] -
                                                n.rects.popper[f],
                                            y = a[c] - n.rects.reference[c],
                                            m = j(i),
                                            v = m
                                                ? "y" === c
                                                    ? m.clientHeight || 0
                                                    : m.clientWidth || 0
                                                : 0,
                                            b = h / 2 - y / 2,
                                            w = l[p],
                                            x = v - u[f] - l[d],
                                            O = v / 2 - u[f] / 2 + b,
                                            S = ie(w, O, x),
                                            L = c;
                                        n.modifiersData[o] =
                                            (((t = {})[L] = S),
                                            (t.centerOffset = S - O),
                                            t);
                                    }
                                },
                                effect: function (e) {
                                    var t = e.state,
                                        n = e.options.element,
                                        o =
                                            void 0 === n
                                                ? "[data-popper-arrow]"
                                                : n;
                                    null != o &&
                                        ("string" != typeof o ||
                                            (o =
                                                t.elements.popper.querySelector(
                                                    o
                                                ))) &&
                                        Q(t.elements.popper, o) &&
                                        (t.elements.arrow = o);
                                },
                                requires: ["popperOffsets"],
                                requiresIfExists: ["preventOverflow"],
                            },
                            {
                                name: "hide",
                                enabled: !0,
                                phase: "main",
                                requiresIfExists: ["preventOverflow"],
                                fn: function (e) {
                                    var t = e.state,
                                        n = e.name,
                                        o = t.rects.reference,
                                        r = t.rects.popper,
                                        i = t.modifiersData.preventOverflow,
                                        a = re(t, {
                                            elementContext: "reference",
                                        }),
                                        s = re(t, { altBoundary: !0 }),
                                        c = ae(a, o),
                                        f = ae(s, r, i),
                                        l = se(c),
                                        u = se(f);
                                    (t.modifiersData[n] = {
                                        referenceClippingOffsets: c,
                                        popperEscapeOffsets: f,
                                        isReferenceHidden: l,
                                        hasPopperEscaped: u,
                                    }),
                                        (t.attributes.popper = Object.assign(
                                            {},
                                            t.attributes.popper,
                                            {
                                                "data-popper-reference-hidden":
                                                    l,
                                                "data-popper-escaped": u,
                                            }
                                        ));
                                },
                            },
                        ],
                    });
                },
            },
            t = {};
        function n(o) {
            var r = t[o];
            if (void 0 !== r) return r.exports;
            var i = (t[o] = { exports: {} });
            return e[o](i, i.exports, n), i.exports;
        }
        (n.d = (e, t) => {
            for (var o in t)
                n.o(t, o) &&
                    !n.o(e, o) &&
                    Object.defineProperty(e, o, { enumerable: !0, get: t[o] });
        }),
            (n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
            (n.r = (e) => {
                "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(e, Symbol.toStringTag, {
                        value: "Module",
                    }),
                    Object.defineProperty(e, "__esModule", { value: !0 });
            });
        var o = {};
        return (
            (() => {
                n.r(o);
                var e = n(714),
                    t = n(765);
                const r = {
                    historyIndex: -1,
                    addHistory: function (e) {
                        this.historyIndex = e;
                    },
                    existsInHistory: function (e) {
                        return e > this.historyIndex;
                    },
                    clearHistory: function () {
                        this.historyIndex = -1;
                    },
                };
                function i(e) {
                    return (
                        (i =
                            "function" == typeof Symbol &&
                            "symbol" == typeof Symbol.iterator
                                ? function (e) {
                                      return typeof e;
                                  }
                                : function (e) {
                                      return e &&
                                          "function" == typeof Symbol &&
                                          e.constructor === Symbol &&
                                          e !== Symbol.prototype
                                          ? "symbol"
                                          : typeof e;
                                  }),
                        i(e)
                    );
                }
                function a(e) {
                    return (
                        (function (e) {
                            if (Array.isArray(e)) return s(e);
                        })(e) ||
                        (function (e) {
                            if (
                                ("undefined" != typeof Symbol &&
                                    null != e[Symbol.iterator]) ||
                                null != e["@@iterator"]
                            )
                                return Array.from(e);
                        })(e) ||
                        (function (e, t) {
                            if (e) {
                                if ("string" == typeof e) return s(e, t);
                                var n = Object.prototype.toString
                                    .call(e)
                                    .slice(8, -1);
                                return (
                                    "Object" === n &&
                                        e.constructor &&
                                        (n = e.constructor.name),
                                    "Map" === n || "Set" === n
                                        ? Array.from(e)
                                        : "Arguments" === n ||
                                          /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(
                                              n
                                          )
                                        ? s(e, t)
                                        : void 0
                                );
                            }
                        })(e) ||
                        (function () {
                            throw new TypeError(
                                "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                            );
                        })()
                    );
                }
                function s(e, t) {
                    (null == t || t > e.length) && (t = e.length);
                    for (var n = 0, o = new Array(t); n < t; n++) o[n] = e[n];
                    return o;
                }
                function c(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        (o.enumerable = o.enumerable || !1),
                            (o.configurable = !0),
                            "value" in o && (o.writable = !0),
                            Object.defineProperty(e, o.key, o);
                    }
                }
                function f(e, t) {
                    return (
                        (f =
                            Object.setPrototypeOf ||
                            function (e, t) {
                                return (e.__proto__ = t), e;
                            }),
                        f(e, t)
                    );
                }
                function l(e, t) {
                    if (t && ("object" === i(t) || "function" == typeof t))
                        return t;
                    if (void 0 !== t)
                        throw new TypeError(
                            "Derived constructors may only return object or undefined"
                        );
                    return (function (e) {
                        if (void 0 === e)
                            throw new ReferenceError(
                                "this hasn't been initialised - super() hasn't been called"
                            );
                        return e;
                    })(e);
                }
                function u(e) {
                    return (
                        (u = Object.setPrototypeOf
                            ? Object.getPrototypeOf
                            : function (e) {
                                  return (
                                      e.__proto__ || Object.getPrototypeOf(e)
                                  );
                              }),
                        u(e)
                    );
                }
                var p = (function (t) {
                    !(function (e, t) {
                        if ("function" != typeof t && null !== t)
                            throw new TypeError(
                                "Super expression must either be null or a function"
                            );
                        (e.prototype = Object.create(t && t.prototype, {
                            constructor: {
                                value: e,
                                writable: !0,
                                configurable: !0,
                            },
                        })),
                            Object.defineProperty(e, "prototype", {
                                writable: !1,
                            }),
                            t && f(e, t);
                    })(d, t);
                    var n,
                        o,
                        i,
                        s,
                        p =
                            ((i = d),
                            (s = (function () {
                                if (
                                    "undefined" == typeof Reflect ||
                                    !Reflect.construct
                                )
                                    return !1;
                                if (Reflect.construct.sham) return !1;
                                if ("function" == typeof Proxy) return !0;
                                try {
                                    return (
                                        Boolean.prototype.valueOf.call(
                                            Reflect.construct(
                                                Boolean,
                                                [],
                                                function () {}
                                            )
                                        ),
                                        !0
                                    );
                                } catch (e) {
                                    return !1;
                                }
                            })()),
                            function () {
                                var e,
                                    t = u(i);
                                if (s) {
                                    var n = u(this).constructor;
                                    e = Reflect.construct(t, arguments, n);
                                } else e = t.apply(this, arguments);
                                return l(this, e);
                            });
                    function d() {
                        var e;
                        return (
                            (function (e, t) {
                                if (!(e instanceof t))
                                    throw new TypeError(
                                        "Cannot call a class as a function"
                                    );
                            })(this, d),
                            ((e = p.call(this, ".hs-dropdown")).positions = {
                                top: "top",
                                "top-left": "top-start",
                                "top-right": "top-end",
                                bottom: "bottom",
                                "bottom-left": "bottom-start",
                                "bottom-right": "bottom-end",
                                right: "right",
                                "right-top": "right-start",
                                "right-bottom": "right-end",
                                left: "left",
                                "left-top": "left-start",
                                "left-bottom": "left-end",
                            }),
                            (e.absoluteStrategyModifiers = function (e) {
                                return [
                                    {
                                        name: "applyStyles",
                                        fn: function (t) {
                                            var n = (
                                                    window
                                                        .getComputedStyle(e)
                                                        .getPropertyValue(
                                                            "--strategy"
                                                        ) || "absolute"
                                                ).replace(" ", ""),
                                                o = (
                                                    window
                                                        .getComputedStyle(e)
                                                        .getPropertyValue(
                                                            "--adaptive"
                                                        ) || "adaptive"
                                                ).replace(" ", "");
                                            (t.state.elements.popper.style.position =
                                                n),
                                                (t.state.elements.popper.style.transform =
                                                    "adaptive" === o
                                                        ? t.state.styles.popper
                                                              .transform
                                                        : null),
                                                (t.state.elements.popper.style.top =
                                                    null),
                                                (t.state.elements.popper.style.bottom =
                                                    null),
                                                (t.state.elements.popper.style.left =
                                                    null),
                                                (t.state.elements.popper.style.right =
                                                    null),
                                                (t.state.elements.popper.style.margin = 0);
                                        },
                                    },
                                    {
                                        name: "computeStyles",
                                        options: { adaptive: !1 },
                                    },
                                ];
                            }),
                            (e._history = r),
                            e
                        );
                    }
                    return (
                        (n = d),
                        (o = [
                            {
                                key: "init",
                                value: function () {
                                    var e = this;
                                    document.addEventListener(
                                        "click",
                                        function (t) {
                                            var n = t.target,
                                                o = n.closest(e.selector),
                                                r =
                                                    n.closest(
                                                        ".hs-dropdown-menu"
                                                    );
                                            if (
                                                ((o &&
                                                    o.classList.contains(
                                                        "open"
                                                    )) ||
                                                    e._closeOthers(o),
                                                r)
                                            ) {
                                                var i = (
                                                    window
                                                        .getComputedStyle(o)
                                                        .getPropertyValue(
                                                            "--auto-close"
                                                        ) || ""
                                                ).replace(" ", "");
                                                if (
                                                    ("false" == i ||
                                                        "inside" == i) &&
                                                    !o.parentElement.closest(
                                                        e.selector
                                                    )
                                                )
                                                    return;
                                            }
                                            o &&
                                                (o.classList.contains("open")
                                                    ? e.close(o)
                                                    : e.open(o));
                                        }
                                    ),
                                        document.addEventListener(
                                            "mousemove",
                                            function (t) {
                                                var n = t.target,
                                                    o = n.closest(e.selector);
                                                if (
                                                    (n.closest(
                                                        ".hs-dropdown-menu"
                                                    ),
                                                    o)
                                                ) {
                                                    var r = (
                                                        window
                                                            .getComputedStyle(o)
                                                            .getPropertyValue(
                                                                "--trigger"
                                                            ) || "click"
                                                    ).replace(" ", "");
                                                    if ("hover" !== r) return;
                                                    (o &&
                                                        o.classList.contains(
                                                            "open"
                                                        )) ||
                                                        e._closeOthers(o),
                                                        "hover" !== r ||
                                                            o.classList.contains(
                                                                "open"
                                                            ) ||
                                                            /iPad|iPhone|iPod/.test(
                                                                navigator.platform
                                                            ) ||
                                                            (navigator.maxTouchPoints &&
                                                                navigator.maxTouchPoints >
                                                                    2 &&
                                                                /MacIntel/.test(
                                                                    navigator.platform
                                                                )) ||
                                                            (navigator.maxTouchPoints &&
                                                                navigator.maxTouchPoints >
                                                                    2 &&
                                                                /MacIntel/.test(
                                                                    navigator.platform
                                                                )) ||
                                                            e._hover(n);
                                                }
                                            }
                                        ),
                                        document.addEventListener(
                                            "keydown",
                                            this._keyboardSupport.bind(this)
                                        ),
                                        window.addEventListener(
                                            "resize",
                                            function () {
                                                document
                                                    .querySelectorAll(
                                                        ".hs-dropdown.open"
                                                    )
                                                    .forEach(function (t) {
                                                        e.close(t, !0);
                                                    });
                                            }
                                        );
                                },
                            },
                            {
                                key: "_closeOthers",
                                value: function () {
                                    var e = this,
                                        t =
                                            arguments.length > 0 &&
                                            void 0 !== arguments[0]
                                                ? arguments[0]
                                                : null,
                                        n = document.querySelectorAll(
                                            "".concat(this.selector, ".open")
                                        );
                                    n.forEach(function (n) {
                                        if (
                                            !t ||
                                            t.closest(".hs-dropdown.open") !== n
                                        ) {
                                            var o = (
                                                window
                                                    .getComputedStyle(n)
                                                    .getPropertyValue(
                                                        "--auto-close"
                                                    ) || ""
                                            ).replace(" ", "");
                                            "false" != o &&
                                                "outside" != o &&
                                                e.close(n);
                                        }
                                    });
                                },
                            },
                            {
                                key: "_hover",
                                value: function (e) {
                                    var t = this,
                                        n = e.closest(this.selector);
                                    this.open(n),
                                        document.addEventListener(
                                            "mousemove",
                                            function e(o) {
                                                (o.target.closest(t.selector) &&
                                                    o.target.closest(
                                                        t.selector
                                                    ) !==
                                                        n.parentElement.closest(
                                                            t.selector
                                                        )) ||
                                                    (t.close(n),
                                                    document.removeEventListener(
                                                        "mousemove",
                                                        e,
                                                        !0
                                                    ));
                                            },
                                            !0
                                        );
                                },
                            },
                            {
                                key: "close",
                                value: function (e) {
                                    var t = this,
                                        n =
                                            arguments.length > 1 &&
                                            void 0 !== arguments[1] &&
                                            arguments[1],
                                        o =
                                            e.querySelector(
                                                ".hs-dropdown-menu"
                                            ),
                                        r = function () {
                                            e.classList.contains("open") ||
                                                (o.classList.remove("block"),
                                                o.classList.add("hidden"),
                                                (o.style.inset = null),
                                                (o.style.position = null),
                                                e._popper &&
                                                    e._popper.destroy());
                                        };
                                    n ||
                                        this.afterTransition(
                                            e.querySelector(
                                                "[data-hs-dropdown-transition]"
                                            ) || o,
                                            function () {
                                                r();
                                            }
                                        ),
                                        (o.style.margin = null),
                                        e.classList.remove("open"),
                                        n && r(),
                                        this._fireEvent("close", e),
                                        this._dispatch(
                                            "close.hs.dropdown",
                                            e,
                                            e
                                        );
                                    var i =
                                        o.querySelectorAll(".hs-dropdown.open");
                                    i.forEach(function (e) {
                                        t.close(e, !0);
                                    });
                                },
                            },
                            {
                                key: "open",
                                value: function (t) {
                                    var n =
                                            t.querySelector(
                                                ".hs-dropdown-menu"
                                            ),
                                        o = (
                                            window
                                                .getComputedStyle(t)
                                                .getPropertyValue(
                                                    "--placement"
                                                ) || ""
                                        ).replace(" ", ""),
                                        r = (
                                            window
                                                .getComputedStyle(t)
                                                .getPropertyValue(
                                                    "--strategy"
                                                ) || "fixed"
                                        ).replace(" ", ""),
                                        i =
                                            ((
                                                window
                                                    .getComputedStyle(t)
                                                    .getPropertyValue(
                                                        "--adaptive"
                                                    ) || "adaptive"
                                            ).replace(" ", ""),
                                            parseInt(
                                                (
                                                    window
                                                        .getComputedStyle(t)
                                                        .getPropertyValue(
                                                            "--offset"
                                                        ) || "10"
                                                ).replace(" ", "")
                                            ));
                                    if ("static" !== r) {
                                        t._popper && t._popper.destroy();
                                        var s = (0, e.fi)(t, n, {
                                            placement:
                                                this.positions[o] ||
                                                "bottom-start",
                                            strategy: r,
                                            modifiers: [].concat(
                                                a(
                                                    "fixed" !== r
                                                        ? this.absoluteStrategyModifiers(
                                                              t
                                                          )
                                                        : []
                                                ),
                                                [
                                                    {
                                                        name: "offset",
                                                        options: {
                                                            offset: [0, i],
                                                        },
                                                    },
                                                ]
                                            ),
                                        });
                                        t._popper = s;
                                    }
                                    (n.style.margin = null),
                                        n.classList.add("block"),
                                        n.classList.remove("hidden"),
                                        setTimeout(function () {
                                            t.classList.add("open");
                                        }),
                                        this._fireEvent("open", t),
                                        this._dispatch(
                                            "open.hs.dropdown",
                                            t,
                                            t
                                        );
                                },
                            },
                            {
                                key: "_keyboardSupport",
                                value: function (e) {
                                    var t =
                                        document.querySelector(
                                            ".hs-dropdown.open"
                                        );
                                    if (t)
                                        return 27 === e.keyCode
                                            ? (e.preventDefault(), this._esc(t))
                                            : 40 === e.keyCode
                                            ? (e.preventDefault(),
                                              this._down(t))
                                            : 38 === e.keyCode
                                            ? (e.preventDefault(), this._up(t))
                                            : 36 === e.keyCode
                                            ? (e.preventDefault(),
                                              this._start(t))
                                            : 35 === e.keyCode
                                            ? (e.preventDefault(), this._end(t))
                                            : void this._byChar(t, e.key);
                                },
                            },
                            {
                                key: "_esc",
                                value: function (e) {
                                    this.close(e);
                                },
                            },
                            {
                                key: "_up",
                                value: function (e) {
                                    var t =
                                            e.querySelector(
                                                ".hs-dropdown-menu"
                                            ),
                                        n = a(t.querySelectorAll("a"))
                                            .reverse()
                                            .filter(function (e) {
                                                return !e.disabled;
                                            }),
                                        o = t.querySelector("a:focus"),
                                        r = n.findIndex(function (e) {
                                            return e === o;
                                        });
                                    r + 1 < n.length && r++, n[r].focus();
                                },
                            },
                            {
                                key: "_down",
                                value: function (e) {
                                    var t =
                                            e.querySelector(
                                                ".hs-dropdown-menu"
                                            ),
                                        n = a(t.querySelectorAll("a")).filter(
                                            function (e) {
                                                return !e.disabled;
                                            }
                                        ),
                                        o = t.querySelector("a:focus"),
                                        r = n.findIndex(function (e) {
                                            return e === o;
                                        });
                                    r + 1 < n.length && r++, n[r].focus();
                                },
                            },
                            {
                                key: "_start",
                                value: function (e) {
                                    var t = a(
                                        e
                                            .querySelector(".hs-dropdown-menu")
                                            .querySelectorAll("a")
                                    ).filter(function (e) {
                                        return !e.disabled;
                                    });
                                    t.length && t[0].focus();
                                },
                            },
                            {
                                key: "_end",
                                value: function (e) {
                                    var t = a(
                                        e
                                            .querySelector(".hs-dropdown-menu")
                                            .querySelectorAll("a")
                                    )
                                        .reverse()
                                        .filter(function (e) {
                                            return !e.disabled;
                                        });
                                    t.length && t[0].focus();
                                },
                            },
                            {
                                key: "_byChar",
                                value: function (e, t) {
                                    var n = this,
                                        o = a(
                                            e
                                                .querySelector(
                                                    ".hs-dropdown-menu"
                                                )
                                                .querySelectorAll("a")
                                        ),
                                        r = function () {
                                            return o.findIndex(function (e, o) {
                                                return (
                                                    e.innerText
                                                        .toLowerCase()
                                                        .charAt(0) ===
                                                        t.toLowerCase() &&
                                                    n._history.existsInHistory(
                                                        o
                                                    )
                                                );
                                            });
                                        },
                                        i = r();
                                    -1 === i &&
                                        (this._history.clearHistory(),
                                        (i = r())),
                                        -1 !== i &&
                                            (o[i].focus(),
                                            this._history.addHistory(i));
                                },
                            },
                            {
                                key: "toggle",
                                value: function (e) {
                                    e.classList.contains("open")
                                        ? this.close(e)
                                        : this.open(e);
                                },
                            },
                        ]),
                        o && c(n.prototype, o),
                        Object.defineProperty(n, "prototype", { writable: !1 }),
                        d
                    );
                })(t.Z);
                (window.HSDropdown = new p()),
                    document.addEventListener("load", window.HSDropdown.init());
            })(),
            o
        );
    })();
});
