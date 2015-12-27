/*! jQuery v1.10.2 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license
//@ sourceMappingURL=jquery-1.10.2.min.map
*/
(function(e, t) {
    var n, r, i = typeof t,
        o = e.location,
        a = e.document,
        s = a.documentElement,
        l = e.jQuery,
        u = e.$,
        c = {},
        p = [],
        f = "1.10.2",
        d = p.concat,
        h = p.push,
        g = p.slice,
        m = p.indexOf,
        y = c.toString,
        v = c.hasOwnProperty,
        b = f.trim,
        x = function(e, t) {
            return new x.fn.init(e, t, r)
        },
        w = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        T = /\S+/g,
        C = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        N = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        k = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        E = /^[\],:{}\s]*$/,
        S = /(?:^|:|,)(?:\s*\[)+/g,
        A = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        j = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
        D = /^-ms-/,
        L = /-([\da-z])/gi,
        H = function(e, t) {
            return t.toUpperCase()
        },
        q = function(e) {
            (a.addEventListener || "load" === e.type || "complete" === a.readyState) && (_(), x.ready())
        },
        _ = function() {
            a.addEventListener ? (a.removeEventListener("DOMContentLoaded", q, !1), e.removeEventListener("load", q, !1)) : (a.detachEvent("onreadystatechange", q), e.detachEvent("onload", q))
        };
    x.fn = x.prototype = {
        jquery: f,
        constructor: x,
        init: function(e, n, r) {
            var i, o;
            if (!e) return this;
            if ("string" == typeof e) {
                if (i = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : N.exec(e), !i || !i[1] && n) return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e);
                if (i[1]) {
                    if (n = n instanceof x ? n[0] : n, x.merge(this, x.parseHTML(i[1], n && n.nodeType ? n.ownerDocument || n : a, !0)), k.test(i[1]) && x.isPlainObject(n))
                        for (i in n) x.isFunction(this[i]) ? this[i](n[i]) : this.attr(i, n[i]);
                    return this
                }
                if (o = a.getElementById(i[2]), o && o.parentNode) {
                    if (o.id !== i[2]) return r.find(e);
                    this.length = 1, this[0] = o
                }
                return this.context = a, this.selector = e, this
            }
            return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : x.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), x.makeArray(e, this))
        },
        selector: "",
        length: 0,
        toArray: function() {
            return g.call(this)
        },
        get: function(e) {
            return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
        },
        pushStack: function(e) {
            var t = x.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t
        },
        each: function(e, t) {
            return x.each(this, e, t)
        },
        ready: function(e) {
            return x.ready.promise().done(e), this
        },
        slice: function() {
            return this.pushStack(g.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length,
                n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        },
        map: function(e) {
            return this.pushStack(x.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: h,
        sort: [].sort,
        splice: [].splice
    }, x.fn.init.prototype = x.fn, x.extend = x.fn.extend = function() {
        var e, n, r, i, o, a, s = arguments[0] || {},
            l = 1,
            u = arguments.length,
            c = !1;
        for ("boolean" == typeof s && (c = s, s = arguments[1] || {}, l = 2), "object" == typeof s || x.isFunction(s) || (s = {}), u === l && (s = this, --l); u > l; l++)
            if (null != (o = arguments[l]))
                for (i in o) e = s[i], r = o[i], s !== r && (c && r && (x.isPlainObject(r) || (n = x.isArray(r))) ? (n ? (n = !1, a = e && x.isArray(e) ? e : []) : a = e && x.isPlainObject(e) ? e : {}, s[i] = x.extend(c, a, r)) : r !== t && (s[i] = r));
        return s
    }, x.extend({
        expando: "jQuery" + (f + Math.random()).replace(/\D/g, ""),
        noConflict: function(t) {
            return e.$ === x && (e.$ = u), t && e.jQuery === x && (e.jQuery = l), x
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? x.readyWait++ : x.ready(!0)
        },
        ready: function(e) {
            if (e === !0 ? !--x.readyWait : !x.isReady) {
                if (!a.body) return setTimeout(x.ready);
                x.isReady = !0, e !== !0 && --x.readyWait > 0 || (n.resolveWith(a, [x]), x.fn.trigger && x(a).trigger("ready").off("ready"))
            }
        },
        isFunction: function(e) {
            return "function" === x.type(e)
        },
        isArray: Array.isArray || function(e) {
            return "array" === x.type(e)
        },
        isWindow: function(e) {
            return null != e && e == e.window
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? c[y.call(e)] || "object" : typeof e
        },
        isPlainObject: function(e) {
            var n;
            if (!e || "object" !== x.type(e) || e.nodeType || x.isWindow(e)) return !1;
            try {
                if (e.constructor && !v.call(e, "constructor") && !v.call(e.constructor.prototype, "isPrototypeOf")) return !1
            } catch (r) {
                return !1
            }
            if (x.support.ownLast)
                for (n in e) return v.call(e, n);
            for (n in e);
            return n === t || v.call(e, n)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) return !1;
            return !0
        },
        error: function(e) {
            throw Error(e)
        },
        parseHTML: function(e, t, n) {
            if (!e || "string" != typeof e) return null;
            "boolean" == typeof t && (n = t, t = !1), t = t || a;
            var r = k.exec(e),
                i = !n && [];
            return r ? [t.createElement(r[1])] : (r = x.buildFragment([e], t, i), i && x(i).remove(), x.merge([], r.childNodes))
        },
        parseJSON: function(n) {
            return e.JSON && e.JSON.parse ? e.JSON.parse(n) : null === n ? n : "string" == typeof n && (n = x.trim(n), n && E.test(n.replace(A, "@").replace(j, "]").replace(S, ""))) ? Function("return " + n)() : (x.error("Invalid JSON: " + n), t)
        },
        parseXML: function(n) {
            var r, i;
            if (!n || "string" != typeof n) return null;
            try {
                e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
            } catch (o) {
                r = t
            }
            return r && r.documentElement && !r.getElementsByTagName("parsererror").length || x.error("Invalid XML: " + n), r
        },
        noop: function() {},
        globalEval: function(t) {
            t && x.trim(t) && (e.execScript || function(t) {
                e.eval.call(e, t)
            })(t)
        },
        camelCase: function(e) {
            return e.replace(D, "ms-").replace(L, H)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                a = M(e);
            if (n) {
                if (a) {
                    for (; o > i; i++)
                        if (r = t.apply(e[i], n), r === !1) break
                } else
                    for (i in e)
                        if (r = t.apply(e[i], n), r === !1) break
            } else if (a) {
                for (; o > i; i++)
                    if (r = t.call(e[i], i, e[i]), r === !1) break
            } else
                for (i in e)
                    if (r = t.call(e[i], i, e[i]), r === !1) break; return e
        },
        trim: b && !b.call("\ufeff\u00a0") ? function(e) {
            return null == e ? "" : b.call(e)
        } : function(e) {
            return null == e ? "" : (e + "").replace(C, "")
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (M(Object(e)) ? x.merge(n, "string" == typeof e ? [e] : e) : h.call(n, e)), n
        },
        inArray: function(e, t, n) {
            var r;
            if (t) {
                if (m) return m.call(t, e, n);
                for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++)
                    if (n in t && t[n] === e) return n
            }
            return -1
        },
        merge: function(e, n) {
            var r = n.length,
                i = e.length,
                o = 0;
            if ("number" == typeof r)
                for (; r > o; o++) e[i++] = n[o];
            else
                while (n[o] !== t) e[i++] = n[o++];
            return e.length = i, e
        },
        grep: function(e, t, n) {
            var r, i = [],
                o = 0,
                a = e.length;
            for (n = !!n; a > o; o++) r = !!t(e[o], o), n !== r && i.push(e[o]);
            return i
        },
        map: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                a = M(e),
                s = [];
            if (a)
                for (; o > i; i++) r = t(e[i], i, n), null != r && (s[s.length] = r);
            else
                for (i in e) r = t(e[i], i, n), null != r && (s[s.length] = r);
            return d.apply([], s)
        },
        guid: 1,
        proxy: function(e, n) {
            var r, i, o;
            return "string" == typeof n && (o = e[n], n = e, e = o), x.isFunction(e) ? (r = g.call(arguments, 2), i = function() {
                return e.apply(n || this, r.concat(g.call(arguments)))
            }, i.guid = e.guid = e.guid || x.guid++, i) : t
        },
        access: function(e, n, r, i, o, a, s) {
            var l = 0,
                u = e.length,
                c = null == r;
            if ("object" === x.type(r)) {
                o = !0;
                for (l in r) x.access(e, n, l, r[l], !0, a, s)
            } else if (i !== t && (o = !0, x.isFunction(i) || (s = !0), c && (s ? (n.call(e, i), n = null) : (c = n, n = function(e, t, n) {
                    return c.call(x(e), n)
                })), n))
                for (; u > l; l++) n(e[l], r, s ? i : i.call(e[l], l, n(e[l], r)));
            return o ? e : c ? n.call(e) : u ? n(e[0], r) : a
        },
        now: function() {
            return (new Date).getTime()
        },
        swap: function(e, t, n, r) {
            var i, o, a = {};
            for (o in t) a[o] = e.style[o], e.style[o] = t[o];
            i = n.apply(e, r || []);
            for (o in t) e.style[o] = a[o];
            return i
        }
    }), x.ready.promise = function(t) {
        if (!n)
            if (n = x.Deferred(), "complete" === a.readyState) setTimeout(x.ready);
            else if (a.addEventListener) a.addEventListener("DOMContentLoaded", q, !1), e.addEventListener("load", q, !1);
        else {
            a.attachEvent("onreadystatechange", q), e.attachEvent("onload", q);
            var r = !1;
            try {
                r = null == e.frameElement && a.documentElement
            } catch (i) {}
            r && r.doScroll && function o() {
                if (!x.isReady) {
                    try {
                        r.doScroll("left")
                    } catch (e) {
                        return setTimeout(o, 50)
                    }
                    _(), x.ready()
                }
            }()
        }
        return n.promise(t)
    }, x.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
        c["[object " + t + "]"] = t.toLowerCase()
    });

    function M(e) {
        var t = e.length,
            n = x.type(e);
        return x.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }
    r = x(a),
        function(e, t) {
            var n, r, i, o, a, s, l, u, c, p, f, d, h, g, m, y, v, b = "sizzle" + -new Date,
                w = e.document,
                T = 0,
                C = 0,
                N = st(),
                k = st(),
                E = st(),
                S = !1,
                A = function(e, t) {
                    return e === t ? (S = !0, 0) : 0
                },
                j = typeof t,
                D = 1 << 31,
                L = {}.hasOwnProperty,
                H = [],
                q = H.pop,
                _ = H.push,
                M = H.push,
                O = H.slice,
                F = H.indexOf || function(e) {
                    var t = 0,
                        n = this.length;
                    for (; n > t; t++)
                        if (this[t] === e) return t;
                    return -1
                },
                B = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                P = "[\\x20\\t\\r\\n\\f]",
                R = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                W = R.replace("w", "w#"),
                $ = "\\[" + P + "*(" + R + ")" + P + "*(?:([*^$|!~]?=)" + P + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + W + ")|)|)" + P + "*\\]",
                I = ":(" + R + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + $.replace(3, 8) + ")*)|.*)\\)|)",
                z = RegExp("^" + P + "+|((?:^|[^\\\\])(?:\\\\.)*)" + P + "+$", "g"),
                X = RegExp("^" + P + "*," + P + "*"),
                U = RegExp("^" + P + "*([>+~]|" + P + ")" + P + "*"),
                V = RegExp(P + "*[+~]"),
                Y = RegExp("=" + P + "*([^\\]'\"]*)" + P + "*\\]", "g"),
                J = RegExp(I),
                G = RegExp("^" + W + "$"),
                Q = {
                    ID: RegExp("^#(" + R + ")"),
                    CLASS: RegExp("^\\.(" + R + ")"),
                    TAG: RegExp("^(" + R.replace("w", "w*") + ")"),
                    ATTR: RegExp("^" + $),
                    PSEUDO: RegExp("^" + I),
                    CHILD: RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + P + "*(even|odd|(([+-]|)(\\d*)n|)" + P + "*(?:([+-]|)" + P + "*(\\d+)|))" + P + "*\\)|)", "i"),
                    bool: RegExp("^(?:" + B + ")$", "i"),
                    needsContext: RegExp("^" + P + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + P + "*((?:-\\d)?\\d*)" + P + "*\\)|)(?=[^-]|$)", "i")
                },
                K = /^[^{]+\{\s*\[native \w/,
                Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                et = /^(?:input|select|textarea|button)$/i,
                tt = /^h\d$/i,
                nt = /'|\\/g,
                rt = RegExp("\\\\([\\da-f]{1,6}" + P + "?|(" + P + ")|.)", "ig"),
                it = function(e, t, n) {
                    var r = "0x" + t - 65536;
                    return r !== r || n ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(55296 | r >> 10, 56320 | 1023 & r)
                };
            try {
                M.apply(H = O.call(w.childNodes), w.childNodes), H[w.childNodes.length].nodeType
            } catch (ot) {
                M = {
                    apply: H.length ? function(e, t) {
                        _.apply(e, O.call(t))
                    } : function(e, t) {
                        var n = e.length,
                            r = 0;
                        while (e[n++] = t[r++]);
                        e.length = n - 1
                    }
                }
            }

            function at(e, t, n, i) {
                var o, a, s, l, u, c, d, m, y, x;
                if ((t ? t.ownerDocument || t : w) !== f && p(t), t = t || f, n = n || [], !e || "string" != typeof e) return n;
                if (1 !== (l = t.nodeType) && 9 !== l) return [];
                if (h && !i) {
                    if (o = Z.exec(e))
                        if (s = o[1]) {
                            if (9 === l) {
                                if (a = t.getElementById(s), !a || !a.parentNode) return n;
                                if (a.id === s) return n.push(a), n
                            } else if (t.ownerDocument && (a = t.ownerDocument.getElementById(s)) && v(t, a) && a.id === s) return n.push(a), n
                        } else {
                            if (o[2]) return M.apply(n, t.getElementsByTagName(e)), n;
                            if ((s = o[3]) && r.getElementsByClassName && t.getElementsByClassName) return M.apply(n, t.getElementsByClassName(s)), n
                        }
                    if (r.qsa && (!g || !g.test(e))) {
                        if (m = d = b, y = t, x = 9 === l && e, 1 === l && "object" !== t.nodeName.toLowerCase()) {
                            c = mt(e), (d = t.getAttribute("id")) ? m = d.replace(nt, "\\$&") : t.setAttribute("id", m), m = "[id='" + m + "'] ", u = c.length;
                            while (u--) c[u] = m + yt(c[u]);
                            y = V.test(e) && t.parentNode || t, x = c.join(",")
                        }
                        if (x) try {
                            return M.apply(n, y.querySelectorAll(x)), n
                        } catch (T) {} finally {
                            d || t.removeAttribute("id")
                        }
                    }
                }
                return kt(e.replace(z, "$1"), t, n, i)
            }

            function st() {
                var e = [];

                function t(n, r) {
                    return e.push(n += " ") > o.cacheLength && delete t[e.shift()], t[n] = r
                }
                return t
            }

            function lt(e) {
                return e[b] = !0, e
            }

            function ut(e) {
                var t = f.createElement("div");
                try {
                    return !!e(t)
                } catch (n) {
                    return !1
                } finally {
                    t.parentNode && t.parentNode.removeChild(t), t = null
                }
            }

            function ct(e, t) {
                var n = e.split("|"),
                    r = e.length;
                while (r--) o.attrHandle[n[r]] = t
            }

            function pt(e, t) {
                var n = t && e,
                    r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || D) - (~e.sourceIndex || D);
                if (r) return r;
                if (n)
                    while (n = n.nextSibling)
                        if (n === t) return -1;
                return e ? 1 : -1
            }

            function ft(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return "input" === n && t.type === e
                }
            }

            function dt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e
                }
            }

            function ht(e) {
                return lt(function(t) {
                    return t = +t, lt(function(n, r) {
                        var i, o = e([], n.length, t),
                            a = o.length;
                        while (a--) n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                    })
                })
            }
            s = at.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? "HTML" !== t.nodeName : !1
            }, r = at.support = {}, p = at.setDocument = function(e) {
                var n = e ? e.ownerDocument || e : w,
                    i = n.defaultView;
                return n !== f && 9 === n.nodeType && n.documentElement ? (f = n, d = n.documentElement, h = !s(n), i && i.attachEvent && i !== i.top && i.attachEvent("onbeforeunload", function() {
                    p()
                }), r.attributes = ut(function(e) {
                    return e.className = "i", !e.getAttribute("className")
                }), r.getElementsByTagName = ut(function(e) {
                    return e.appendChild(n.createComment("")), !e.getElementsByTagName("*").length
                }), r.getElementsByClassName = ut(function(e) {
                    return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
                }), r.getById = ut(function(e) {
                    return d.appendChild(e).id = b, !n.getElementsByName || !n.getElementsByName(b).length
                }), r.getById ? (o.find.ID = function(e, t) {
                    if (typeof t.getElementById !== j && h) {
                        var n = t.getElementById(e);
                        return n && n.parentNode ? [n] : []
                    }
                }, o.filter.ID = function(e) {
                    var t = e.replace(rt, it);
                    return function(e) {
                        return e.getAttribute("id") === t
                    }
                }) : (delete o.find.ID, o.filter.ID = function(e) {
                    var t = e.replace(rt, it);
                    return function(e) {
                        var n = typeof e.getAttributeNode !== j && e.getAttributeNode("id");
                        return n && n.value === t
                    }
                }), o.find.TAG = r.getElementsByTagName ? function(e, n) {
                    return typeof n.getElementsByTagName !== j ? n.getElementsByTagName(e) : t
                } : function(e, t) {
                    var n, r = [],
                        i = 0,
                        o = t.getElementsByTagName(e);
                    if ("*" === e) {
                        while (n = o[i++]) 1 === n.nodeType && r.push(n);
                        return r
                    }
                    return o
                }, o.find.CLASS = r.getElementsByClassName && function(e, n) {
                    return typeof n.getElementsByClassName !== j && h ? n.getElementsByClassName(e) : t
                }, m = [], g = [], (r.qsa = K.test(n.querySelectorAll)) && (ut(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || g.push("\\[" + P + "*(?:value|" + B + ")"), e.querySelectorAll(":checked").length || g.push(":checked")
                }), ut(function(e) {
                    var t = n.createElement("input");
                    t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("t", ""), e.querySelectorAll("[t^='']").length && g.push("[*^$]=" + P + "*(?:''|\"\")"), e.querySelectorAll(":enabled").length || g.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), g.push(",.*:")
                })), (r.matchesSelector = K.test(y = d.webkitMatchesSelector || d.mozMatchesSelector || d.oMatchesSelector || d.msMatchesSelector)) && ut(function(e) {
                    r.disconnectedMatch = y.call(e, "div"), y.call(e, "[s!='']:x"), m.push("!=", I)
                }), g = g.length && RegExp(g.join("|")), m = m.length && RegExp(m.join("|")), v = K.test(d.contains) || d.compareDocumentPosition ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                } : function(e, t) {
                    if (t)
                        while (t = t.parentNode)
                            if (t === e) return !0;
                    return !1
                }, A = d.compareDocumentPosition ? function(e, t) {
                    if (e === t) return S = !0, 0;
                    var i = t.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(t);
                    return i ? 1 & i || !r.sortDetached && t.compareDocumentPosition(e) === i ? e === n || v(w, e) ? -1 : t === n || v(w, t) ? 1 : c ? F.call(c, e) - F.call(c, t) : 0 : 4 & i ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
                } : function(e, t) {
                    var r, i = 0,
                        o = e.parentNode,
                        a = t.parentNode,
                        s = [e],
                        l = [t];
                    if (e === t) return S = !0, 0;
                    if (!o || !a) return e === n ? -1 : t === n ? 1 : o ? -1 : a ? 1 : c ? F.call(c, e) - F.call(c, t) : 0;
                    if (o === a) return pt(e, t);
                    r = e;
                    while (r = r.parentNode) s.unshift(r);
                    r = t;
                    while (r = r.parentNode) l.unshift(r);
                    while (s[i] === l[i]) i++;
                    return i ? pt(s[i], l[i]) : s[i] === w ? -1 : l[i] === w ? 1 : 0
                }, n) : f
            }, at.matches = function(e, t) {
                return at(e, null, null, t)
            }, at.matchesSelector = function(e, t) {
                if ((e.ownerDocument || e) !== f && p(e), t = t.replace(Y, "='$1']"), !(!r.matchesSelector || !h || m && m.test(t) || g && g.test(t))) try {
                    var n = y.call(e, t);
                    if (n || r.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n
                } catch (i) {}
                return at(t, f, null, [e]).length > 0
            }, at.contains = function(e, t) {
                return (e.ownerDocument || e) !== f && p(e), v(e, t)
            }, at.attr = function(e, n) {
                (e.ownerDocument || e) !== f && p(e);
                var i = o.attrHandle[n.toLowerCase()],
                    a = i && L.call(o.attrHandle, n.toLowerCase()) ? i(e, n, !h) : t;
                return a === t ? r.attributes || !h ? e.getAttribute(n) : (a = e.getAttributeNode(n)) && a.specified ? a.value : null : a
            }, at.error = function(e) {
                throw Error("Syntax error, unrecognized expression: " + e)
            }, at.uniqueSort = function(e) {
                var t, n = [],
                    i = 0,
                    o = 0;
                if (S = !r.detectDuplicates, c = !r.sortStable && e.slice(0), e.sort(A), S) {
                    while (t = e[o++]) t === e[o] && (i = n.push(o));
                    while (i--) e.splice(n[i], 1)
                }
                return e
            }, a = at.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (1 === i || 9 === i || 11 === i) {
                        if ("string" == typeof e.textContent) return e.textContent;
                        for (e = e.firstChild; e; e = e.nextSibling) n += a(e)
                    } else if (3 === i || 4 === i) return e.nodeValue
                } else
                    for (; t = e[r]; r++) n += a(t);
                return n
            }, o = at.selectors = {
                cacheLength: 50,
                createPseudo: lt,
                match: Q,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace(rt, it), e[3] = (e[4] || e[5] || "").replace(rt, it), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || at.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && at.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var n, r = !e[5] && e[2];
                        return Q.CHILD.test(e[0]) ? null : (e[3] && e[4] !== t ? e[2] = e[4] : r && J.test(r) && (n = mt(r, !0)) && (n = r.indexOf(")", r.length - n) - r.length) && (e[0] = e[0].slice(0, n), e[2] = r.slice(0, n)), e.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(e) {
                        var t = e.replace(rt, it).toLowerCase();
                        return "*" === e ? function() {
                            return !0
                        } : function(e) {
                            return e.nodeName && e.nodeName.toLowerCase() === t
                        }
                    },
                    CLASS: function(e) {
                        var t = N[e + " "];
                        return t || (t = RegExp("(^|" + P + ")" + e + "(" + P + "|$)")) && N(e, function(e) {
                            return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== j && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, n) {
                        return function(r) {
                            var i = at.attr(r, e);
                            return null == i ? "!=" === t : t ? (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.slice(0, n.length + 1) === n + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, r, i) {
                        var o = "nth" !== e.slice(0, 3),
                            a = "last" !== e.slice(-4),
                            s = "of-type" === t;
                        return 1 === r && 0 === i ? function(e) {
                            return !!e.parentNode
                        } : function(t, n, l) {
                            var u, c, p, f, d, h, g = o !== a ? "nextSibling" : "previousSibling",
                                m = t.parentNode,
                                y = s && t.nodeName.toLowerCase(),
                                v = !l && !s;
                            if (m) {
                                if (o) {
                                    while (g) {
                                        p = t;
                                        while (p = p[g])
                                            if (s ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) return !1;
                                        h = g = "only" === e && !h && "nextSibling"
                                    }
                                    return !0
                                }
                                if (h = [a ? m.firstChild : m.lastChild], a && v) {
                                    c = m[b] || (m[b] = {}), u = c[e] || [], d = u[0] === T && u[1], f = u[0] === T && u[2], p = d && m.childNodes[d];
                                    while (p = ++d && p && p[g] || (f = d = 0) || h.pop())
                                        if (1 === p.nodeType && ++f && p === t) {
                                            c[e] = [T, d, f];
                                            break
                                        }
                                } else if (v && (u = (t[b] || (t[b] = {}))[e]) && u[0] === T) f = u[1];
                                else
                                    while (p = ++d && p && p[g] || (f = d = 0) || h.pop())
                                        if ((s ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) && ++f && (v && ((p[b] || (p[b] = {}))[e] = [T, f]), p === t)) break; return f -= i, f === r || 0 === f % r && f / r >= 0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var n, r = o.pseudos[e] || o.setFilters[e.toLowerCase()] || at.error("unsupported pseudo: " + e);
                        return r[b] ? r(t) : r.length > 1 ? (n = [e, e, "", t], o.setFilters.hasOwnProperty(e.toLowerCase()) ? lt(function(e, n) {
                            var i, o = r(e, t),
                                a = o.length;
                            while (a--) i = F.call(e, o[a]), e[i] = !(n[i] = o[a])
                        }) : function(e) {
                            return r(e, 0, n)
                        }) : r
                    }
                },
                pseudos: {
                    not: lt(function(e) {
                        var t = [],
                            n = [],
                            r = l(e.replace(z, "$1"));
                        return r[b] ? lt(function(e, t, n, i) {
                            var o, a = r(e, null, i, []),
                                s = e.length;
                            while (s--)(o = a[s]) && (e[s] = !(t[s] = o))
                        }) : function(e, i, o) {
                            return t[0] = e, r(t, null, o, n), !n.pop()
                        }
                    }),
                    has: lt(function(e) {
                        return function(t) {
                            return at(e, t).length > 0
                        }
                    }),
                    contains: lt(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || a(t)).indexOf(e) > -1
                        }
                    }),
                    lang: lt(function(e) {
                        return G.test(e || "") || at.error("unsupported lang: " + e), e = e.replace(rt, it).toLowerCase(),
                            function(t) {
                                var n;
                                do
                                    if (n = h ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
                                while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                    }),
                    target: function(t) {
                        var n = e.location && e.location.hash;
                        return n && n.slice(1) === t.id
                    },
                    root: function(e) {
                        return e === d
                    },
                    focus: function(e) {
                        return e === f.activeElement && (!f.hasFocus || f.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && !!e.checked || "option" === t && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    empty: function(e) {
                        for (e = e.firstChild; e; e = e.nextSibling)
                            if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) return !1;
                        return !0
                    },
                    parent: function(e) {
                        return !o.pseudos.empty(e)
                    },
                    header: function(e) {
                        return tt.test(e.nodeName)
                    },
                    input: function(e) {
                        return et.test(e.nodeName)
                    },
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && "button" === e.type || "button" === t
                    },
                    text: function(e) {
                        var t;
                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type)
                    },
                    first: ht(function() {
                        return [0]
                    }),
                    last: ht(function(e, t) {
                        return [t - 1]
                    }),
                    eq: ht(function(e, t, n) {
                        return [0 > n ? n + t : n]
                    }),
                    even: ht(function(e, t) {
                        var n = 0;
                        for (; t > n; n += 2) e.push(n);
                        return e
                    }),
                    odd: ht(function(e, t) {
                        var n = 1;
                        for (; t > n; n += 2) e.push(n);
                        return e
                    }),
                    lt: ht(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; --r >= 0;) e.push(r);
                        return e
                    }),
                    gt: ht(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; t > ++r;) e.push(r);
                        return e
                    })
                }
            }, o.pseudos.nth = o.pseudos.eq;
            for (n in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) o.pseudos[n] = ft(n);
            for (n in {
                    submit: !0,
                    reset: !0
                }) o.pseudos[n] = dt(n);

            function gt() {}
            gt.prototype = o.filters = o.pseudos, o.setFilters = new gt;

            function mt(e, t) {
                var n, r, i, a, s, l, u, c = k[e + " "];
                if (c) return t ? 0 : c.slice(0);
                s = e, l = [], u = o.preFilter;
                while (s) {
                    (!n || (r = X.exec(s))) && (r && (s = s.slice(r[0].length) || s), l.push(i = [])), n = !1, (r = U.exec(s)) && (n = r.shift(), i.push({
                        value: n,
                        type: r[0].replace(z, " ")
                    }), s = s.slice(n.length));
                    for (a in o.filter) !(r = Q[a].exec(s)) || u[a] && !(r = u[a](r)) || (n = r.shift(), i.push({
                        value: n,
                        type: a,
                        matches: r
                    }), s = s.slice(n.length));
                    if (!n) break
                }
                return t ? s.length : s ? at.error(e) : k(e, l).slice(0)
            }

            function yt(e) {
                var t = 0,
                    n = e.length,
                    r = "";
                for (; n > t; t++) r += e[t].value;
                return r
            }

            function vt(e, t, n) {
                var r = t.dir,
                    o = n && "parentNode" === r,
                    a = C++;
                return t.first ? function(t, n, i) {
                    while (t = t[r])
                        if (1 === t.nodeType || o) return e(t, n, i)
                } : function(t, n, s) {
                    var l, u, c, p = T + " " + a;
                    if (s) {
                        while (t = t[r])
                            if ((1 === t.nodeType || o) && e(t, n, s)) return !0
                    } else
                        while (t = t[r])
                            if (1 === t.nodeType || o)
                                if (c = t[b] || (t[b] = {}), (u = c[r]) && u[0] === p) {
                                    if ((l = u[1]) === !0 || l === i) return l === !0
                                } else if (u = c[r] = [p], u[1] = e(t, n, s) || i, u[1] === !0) return !0
                }
            }

            function bt(e) {
                return e.length > 1 ? function(t, n, r) {
                    var i = e.length;
                    while (i--)
                        if (!e[i](t, n, r)) return !1;
                    return !0
                } : e[0]
            }

            function xt(e, t, n, r, i) {
                var o, a = [],
                    s = 0,
                    l = e.length,
                    u = null != t;
                for (; l > s; s++)(o = e[s]) && (!n || n(o, r, i)) && (a.push(o), u && t.push(s));
                return a
            }

            function wt(e, t, n, r, i, o) {
                return r && !r[b] && (r = wt(r)), i && !i[b] && (i = wt(i, o)), lt(function(o, a, s, l) {
                    var u, c, p, f = [],
                        d = [],
                        h = a.length,
                        g = o || Nt(t || "*", s.nodeType ? [s] : s, []),
                        m = !e || !o && t ? g : xt(g, f, e, s, l),
                        y = n ? i || (o ? e : h || r) ? [] : a : m;
                    if (n && n(m, y, s, l), r) {
                        u = xt(y, d), r(u, [], s, l), c = u.length;
                        while (c--)(p = u[c]) && (y[d[c]] = !(m[d[c]] = p))
                    }
                    if (o) {
                        if (i || e) {
                            if (i) {
                                u = [], c = y.length;
                                while (c--)(p = y[c]) && u.push(m[c] = p);
                                i(null, y = [], u, l)
                            }
                            c = y.length;
                            while (c--)(p = y[c]) && (u = i ? F.call(o, p) : f[c]) > -1 && (o[u] = !(a[u] = p))
                        }
                    } else y = xt(y === a ? y.splice(h, y.length) : y), i ? i(null, a, y, l) : M.apply(a, y)
                })
            }

            function Tt(e) {
                var t, n, r, i = e.length,
                    a = o.relative[e[0].type],
                    s = a || o.relative[" "],
                    l = a ? 1 : 0,
                    c = vt(function(e) {
                        return e === t
                    }, s, !0),
                    p = vt(function(e) {
                        return F.call(t, e) > -1
                    }, s, !0),
                    f = [function(e, n, r) {
                        return !a && (r || n !== u) || ((t = n).nodeType ? c(e, n, r) : p(e, n, r))
                    }];
                for (; i > l; l++)
                    if (n = o.relative[e[l].type]) f = [vt(bt(f), n)];
                    else {
                        if (n = o.filter[e[l].type].apply(null, e[l].matches), n[b]) {
                            for (r = ++l; i > r; r++)
                                if (o.relative[e[r].type]) break;
                            return wt(l > 1 && bt(f), l > 1 && yt(e.slice(0, l - 1).concat({
                                value: " " === e[l - 2].type ? "*" : ""
                            })).replace(z, "$1"), n, r > l && Tt(e.slice(l, r)), i > r && Tt(e = e.slice(r)), i > r && yt(e))
                        }
                        f.push(n)
                    }
                return bt(f)
            }

            function Ct(e, t) {
                var n = 0,
                    r = t.length > 0,
                    a = e.length > 0,
                    s = function(s, l, c, p, d) {
                        var h, g, m, y = [],
                            v = 0,
                            b = "0",
                            x = s && [],
                            w = null != d,
                            C = u,
                            N = s || a && o.find.TAG("*", d && l.parentNode || l),
                            k = T += null == C ? 1 : Math.random() || .1;
                        for (w && (u = l !== f && l, i = n); null != (h = N[b]); b++) {
                            if (a && h) {
                                g = 0;
                                while (m = e[g++])
                                    if (m(h, l, c)) {
                                        p.push(h);
                                        break
                                    }
                                w && (T = k, i = ++n)
                            }
                            r && ((h = !m && h) && v--, s && x.push(h))
                        }
                        if (v += b, r && b !== v) {
                            g = 0;
                            while (m = t[g++]) m(x, y, l, c);
                            if (s) {
                                if (v > 0)
                                    while (b--) x[b] || y[b] || (y[b] = q.call(p));
                                y = xt(y)
                            }
                            M.apply(p, y), w && !s && y.length > 0 && v + t.length > 1 && at.uniqueSort(p)
                        }
                        return w && (T = k, u = C), x
                    };
                return r ? lt(s) : s
            }
            l = at.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    o = E[e + " "];
                if (!o) {
                    t || (t = mt(e)), n = t.length;
                    while (n--) o = Tt(t[n]), o[b] ? r.push(o) : i.push(o);
                    o = E(e, Ct(i, r))
                }
                return o
            };

            function Nt(e, t, n) {
                var r = 0,
                    i = t.length;
                for (; i > r; r++) at(e, t[r], n);
                return n
            }

            function kt(e, t, n, i) {
                var a, s, u, c, p, f = mt(e);
                if (!i && 1 === f.length) {
                    if (s = f[0] = f[0].slice(0), s.length > 2 && "ID" === (u = s[0]).type && r.getById && 9 === t.nodeType && h && o.relative[s[1].type]) {
                        if (t = (o.find.ID(u.matches[0].replace(rt, it), t) || [])[0], !t) return n;
                        e = e.slice(s.shift().value.length)
                    }
                    a = Q.needsContext.test(e) ? 0 : s.length;
                    while (a--) {
                        if (u = s[a], o.relative[c = u.type]) break;
                        if ((p = o.find[c]) && (i = p(u.matches[0].replace(rt, it), V.test(s[0].type) && t.parentNode || t))) {
                            if (s.splice(a, 1), e = i.length && yt(s), !e) return M.apply(n, i), n;
                            break
                        }
                    }
                }
                return l(e, f)(i, t, !h, n, V.test(e)), n
            }
            r.sortStable = b.split("").sort(A).join("") === b, r.detectDuplicates = S, p(), r.sortDetached = ut(function(e) {
                return 1 & e.compareDocumentPosition(f.createElement("div"))
            }), ut(function(e) {
                return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
            }) || ct("type|href|height|width", function(e, n, r) {
                return r ? t : e.getAttribute(n, "type" === n.toLowerCase() ? 1 : 2)
            }), r.attributes && ut(function(e) {
                return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
            }) || ct("value", function(e, n, r) {
                return r || "input" !== e.nodeName.toLowerCase() ? t : e.defaultValue
            }), ut(function(e) {
                return null == e.getAttribute("disabled")
            }) || ct(B, function(e, n, r) {
                var i;
                return r ? t : (i = e.getAttributeNode(n)) && i.specified ? i.value : e[n] === !0 ? n.toLowerCase() : null
            }), x.find = at, x.expr = at.selectors, x.expr[":"] = x.expr.pseudos, x.unique = at.uniqueSort, x.text = at.getText, x.isXMLDoc = at.isXML, x.contains = at.contains
        }(e);
    var O = {};

    function F(e) {
        var t = O[e] = {};
        return x.each(e.match(T) || [], function(e, n) {
            t[n] = !0
        }), t
    }
    x.Callbacks = function(e) {
        e = "string" == typeof e ? O[e] || F(e) : x.extend({}, e);
        var n, r, i, o, a, s, l = [],
            u = !e.once && [],
            c = function(t) {
                for (r = e.memory && t, i = !0, a = s || 0, s = 0, o = l.length, n = !0; l && o > a; a++)
                    if (l[a].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        r = !1;
                        break
                    }
                n = !1, l && (u ? u.length && c(u.shift()) : r ? l = [] : p.disable())
            },
            p = {
                add: function() {
                    if (l) {
                        var t = l.length;
                        (function i(t) {
                            x.each(t, function(t, n) {
                                var r = x.type(n);
                                "function" === r ? e.unique && p.has(n) || l.push(n) : n && n.length && "string" !== r && i(n)
                            })
                        })(arguments), n ? o = l.length : r && (s = t, c(r))
                    }
                    return this
                },
                remove: function() {
                    return l && x.each(arguments, function(e, t) {
                        var r;
                        while ((r = x.inArray(t, l, r)) > -1) l.splice(r, 1), n && (o >= r && o--, a >= r && a--)
                    }), this
                },
                has: function(e) {
                    return e ? x.inArray(e, l) > -1 : !(!l || !l.length)
                },
                empty: function() {
                    return l = [], o = 0, this
                },
                disable: function() {
                    return l = u = r = t, this
                },
                disabled: function() {
                    return !l
                },
                lock: function() {
                    return u = t, r || p.disable(), this
                },
                locked: function() {
                    return !u
                },
                fireWith: function(e, t) {
                    return !l || i && !u || (t = t || [], t = [e, t.slice ? t.slice() : t], n ? u.push(t) : c(t)), this
                },
                fire: function() {
                    return p.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!i
                }
            };
        return p
    }, x.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", x.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", x.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", x.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return x.Deferred(function(n) {
                            x.each(t, function(t, o) {
                                var a = o[0],
                                    s = x.isFunction(e[t]) && e[t];
                                i[o[1]](function() {
                                    var e = s && s.apply(this, arguments);
                                    e && x.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[a + "With"](this === r ? n.promise() : this, s ? [e] : arguments)
                                })
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? x.extend(e, r) : r
                    }
                },
                i = {};
            return r.pipe = r.then, x.each(t, function(e, o) {
                var a = o[2],
                    s = o[3];
                r[o[1]] = a.add, s && a.add(function() {
                    n = s
                }, t[1 ^ e][2].disable, t[2][2].lock), i[o[0]] = function() {
                    return i[o[0] + "With"](this === i ? r : this, arguments), this
                }, i[o[0] + "With"] = a.fireWith
            }), r.promise(i), e && e.call(i, i), i
        },
        when: function(e) {
            var t = 0,
                n = g.call(arguments),
                r = n.length,
                i = 1 !== r || e && x.isFunction(e.promise) ? r : 0,
                o = 1 === i ? e : x.Deferred(),
                a = function(e, t, n) {
                    return function(r) {
                        t[e] = this, n[e] = arguments.length > 1 ? g.call(arguments) : r, n === s ? o.notifyWith(t, n) : --i || o.resolveWith(t, n)
                    }
                },
                s, l, u;
            if (r > 1)
                for (s = Array(r), l = Array(r), u = Array(r); r > t; t++) n[t] && x.isFunction(n[t].promise) ? n[t].promise().done(a(t, u, n)).fail(o.reject).progress(a(t, l, s)) : --i;
            return i || o.resolveWith(u, n), o.promise()
        }
    }), x.support = function(t) {
        var n, r, o, s, l, u, c, p, f, d = a.createElement("div");
        if (d.setAttribute("className", "t"), d.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = d.getElementsByTagName("*") || [], r = d.getElementsByTagName("a")[0], !r || !r.style || !n.length) return t;
        s = a.createElement("select"), u = s.appendChild(a.createElement("option")), o = d.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t.getSetAttribute = "t" !== d.className, t.leadingWhitespace = 3 === d.firstChild.nodeType, t.tbody = !d.getElementsByTagName("tbody").length, t.htmlSerialize = !!d.getElementsByTagName("link").length, t.style = /top/.test(r.getAttribute("style")), t.hrefNormalized = "/a" === r.getAttribute("href"), t.opacity = /^0.5/.test(r.style.opacity), t.cssFloat = !!r.style.cssFloat, t.checkOn = !!o.value, t.optSelected = u.selected, t.enctype = !!a.createElement("form").enctype, t.html5Clone = "<:nav></:nav>" !== a.createElement("nav").cloneNode(!0).outerHTML, t.inlineBlockNeedsLayout = !1, t.shrinkWrapBlocks = !1, t.pixelPosition = !1, t.deleteExpando = !0, t.noCloneEvent = !0, t.reliableMarginRight = !0, t.boxSizingReliable = !0, o.checked = !0, t.noCloneChecked = o.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !u.disabled;
        try {
            delete d.test
        } catch (h) {
            t.deleteExpando = !1
        }
        o = a.createElement("input"), o.setAttribute("value", ""), t.input = "" === o.getAttribute("value"), o.value = "t", o.setAttribute("type", "radio"), t.radioValue = "t" === o.value, o.setAttribute("checked", "t"), o.setAttribute("name", "t"), l = a.createDocumentFragment(), l.appendChild(o), t.appendChecked = o.checked, t.checkClone = l.cloneNode(!0).cloneNode(!0).lastChild.checked, d.attachEvent && (d.attachEvent("onclick", function() {
            t.noCloneEvent = !1
        }), d.cloneNode(!0).click());
        for (f in {
                submit: !0,
                change: !0,
                focusin: !0
            }) d.setAttribute(c = "on" + f, "t"), t[f + "Bubbles"] = c in e || d.attributes[c].expando === !1;
        d.style.backgroundClip = "content-box", d.cloneNode(!0).style.backgroundClip = "", t.clearCloneStyle = "content-box" === d.style.backgroundClip;
        for (f in x(t)) break;
        return t.ownLast = "0" !== f, x(function() {
            var n, r, o, s = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                l = a.getElementsByTagName("body")[0];
            l && (n = a.createElement("div"), n.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", l.appendChild(n).appendChild(d), d.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", o = d.getElementsByTagName("td"), o[0].style.cssText = "padding:0;margin:0;border:0;display:none", p = 0 === o[0].offsetHeight, o[0].style.display = "", o[1].style.display = "none", t.reliableHiddenOffsets = p && 0 === o[0].offsetHeight, d.innerHTML = "", d.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", x.swap(l, null != l.style.zoom ? {
                zoom: 1
            } : {}, function() {
                t.boxSizing = 4 === d.offsetWidth
            }), e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(d, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(d, null) || {
                width: "4px"
            }).width, r = d.appendChild(a.createElement("div")), r.style.cssText = d.style.cssText = s, r.style.marginRight = r.style.width = "0", d.style.width = "1px", t.reliableMarginRight = !parseFloat((e.getComputedStyle(r, null) || {}).marginRight)), typeof d.style.zoom !== i && (d.innerHTML = "", d.style.cssText = s + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === d.offsetWidth, d.style.display = "block", d.innerHTML = "<div></div>", d.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== d.offsetWidth, t.inlineBlockNeedsLayout && (l.style.zoom = 1)), l.removeChild(n), n = d = o = r = null)
        }), n = s = l = u = r = o = null, t
    }({});
    var B = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        P = /([A-Z])/g;

    function R(e, n, r, i) {
        if (x.acceptData(e)) {
            var o, a, s = x.expando,
                l = e.nodeType,
                u = l ? x.cache : e,
                c = l ? e[s] : e[s] && s;
            if (c && u[c] && (i || u[c].data) || r !== t || "string" != typeof n) return c || (c = l ? e[s] = p.pop() || x.guid++ : s), u[c] || (u[c] = l ? {} : {
                toJSON: x.noop
            }), ("object" == typeof n || "function" == typeof n) && (i ? u[c] = x.extend(u[c], n) : u[c].data = x.extend(u[c].data, n)), a = u[c], i || (a.data || (a.data = {}), a = a.data), r !== t && (a[x.camelCase(n)] = r), "string" == typeof n ? (o = a[n], null == o && (o = a[x.camelCase(n)])) : o = a, o
        }
    }

    function W(e, t, n) {
        if (x.acceptData(e)) {
            var r, i, o = e.nodeType,
                a = o ? x.cache : e,
                s = o ? e[x.expando] : x.expando;
            if (a[s]) {
                if (t && (r = n ? a[s] : a[s].data)) {
                    x.isArray(t) ? t = t.concat(x.map(t, x.camelCase)) : t in r ? t = [t] : (t = x.camelCase(t), t = t in r ? [t] : t.split(" ")), i = t.length;
                    while (i--) delete r[t[i]];
                    if (n ? !I(r) : !x.isEmptyObject(r)) return
                }(n || (delete a[s].data, I(a[s]))) && (o ? x.cleanData([e], !0) : x.support.deleteExpando || a != a.window ? delete a[s] : a[s] = null)
            }
        }
    }
    x.extend({
        cache: {},
        noData: {
            applet: !0,
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function(e) {
            return e = e.nodeType ? x.cache[e[x.expando]] : e[x.expando], !!e && !I(e)
        },
        data: function(e, t, n) {
            return R(e, t, n)
        },
        removeData: function(e, t) {
            return W(e, t)
        },
        _data: function(e, t, n) {
            return R(e, t, n, !0)
        },
        _removeData: function(e, t) {
            return W(e, t, !0)
        },
        acceptData: function(e) {
            if (e.nodeType && 1 !== e.nodeType && 9 !== e.nodeType) return !1;
            var t = e.nodeName && x.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), x.fn.extend({
        data: function(e, n) {
            var r, i, o = null,
                a = 0,
                s = this[0];
            if (e === t) {
                if (this.length && (o = x.data(s), 1 === s.nodeType && !x._data(s, "parsedAttrs"))) {
                    for (r = s.attributes; r.length > a; a++) i = r[a].name, 0 === i.indexOf("data-") && (i = x.camelCase(i.slice(5)), $(s, i, o[i]));
                    x._data(s, "parsedAttrs", !0)
                }
                return o
            }
            return "object" == typeof e ? this.each(function() {
                x.data(this, e)
            }) : arguments.length > 1 ? this.each(function() {
                x.data(this, e, n)
            }) : s ? $(s, e, x.data(s, e)) : null
        },
        removeData: function(e) {
            return this.each(function() {
                x.removeData(this, e)
            })
        }
    });

    function $(e, n, r) {
        if (r === t && 1 === e.nodeType) {
            var i = "data-" + n.replace(P, "-$1").toLowerCase();
            if (r = e.getAttribute(i), "string" == typeof r) {
                try {
                    r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : B.test(r) ? x.parseJSON(r) : r
                } catch (o) {}
                x.data(e, n, r)
            } else r = t
        }
        return r
    }

    function I(e) {
        var t;
        for (t in e)
            if (("data" !== t || !x.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
        return !0
    }
    x.extend({
        queue: function(e, n, r) {
            var i;
            return e ? (n = (n || "fx") + "queue", i = x._data(e, n), r && (!i || x.isArray(r) ? i = x._data(e, n, x.makeArray(r)) : i.push(r)), i || []) : t
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = x.queue(e, t),
                r = n.length,
                i = n.shift(),
                o = x._queueHooks(e, t),
                a = function() {
                    x.dequeue(e, t)
                };
            "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, a, o)), !r && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return x._data(e, n) || x._data(e, n, {
                empty: x.Callbacks("once memory").add(function() {
                    x._removeData(e, t + "queue"), x._removeData(e, n)
                })
            })
        }
    }), x.fn.extend({
        queue: function(e, n) {
            var r = 2;
            return "string" != typeof e && (n = e, e = "fx", r--), r > arguments.length ? x.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = x.queue(this, e, n);
                x._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && x.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                x.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = x.fx ? x.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var r, i = 1,
                o = x.Deferred(),
                a = this,
                s = this.length,
                l = function() {
                    --i || o.resolveWith(a, [a])
                };
            "string" != typeof e && (n = e, e = t), e = e || "fx";
            while (s--) r = x._data(a[s], e + "queueHooks"), r && r.empty && (i++, r.empty.add(l));
            return l(), o.promise(n)
        }
    });
    var z, X, U = /[\t\r\n\f]/g,
        V = /\r/g,
        Y = /^(?:input|select|textarea|button|object)$/i,
        J = /^(?:a|area)$/i,
        G = /^(?:checked|selected)$/i,
        Q = x.support.getSetAttribute,
        K = x.support.input;
    x.fn.extend({
        attr: function(e, t) {
            return x.access(this, x.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                x.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return x.access(this, x.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = x.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                l = "string" == typeof e && e;
            if (x.isFunction(e)) return this.each(function(t) {
                x(this).addClass(e.call(this, t, this.className))
            });
            if (l)
                for (t = (e || "").match(T) || []; s > a; a++)
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(U, " ") : " ")) {
                        o = 0;
                        while (i = t[o++]) 0 > r.indexOf(" " + i + " ") && (r += i + " ");
                        n.className = x.trim(r)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                l = 0 === arguments.length || "string" == typeof e && e;
            if (x.isFunction(e)) return this.each(function(t) {
                x(this).removeClass(e.call(this, t, this.className))
            });
            if (l)
                for (t = (e || "").match(T) || []; s > a; a++)
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(U, " ") : "")) {
                        o = 0;
                        while (i = t[o++])
                            while (r.indexOf(" " + i + " ") >= 0) r = r.replace(" " + i + " ", " ");
                        n.className = e ? x.trim(r) : ""
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e;
            return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : x.isFunction(e) ? this.each(function(n) {
                x(this).toggleClass(e.call(this, n, this.className, t), t)
            }) : this.each(function() {
                if ("string" === n) {
                    var t, r = 0,
                        o = x(this),
                        a = e.match(T) || [];
                    while (t = a[r++]) o.hasClass(t) ? o.removeClass(t) : o.addClass(t)
                } else(n === i || "boolean" === n) && (this.className && x._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : x._data(this, "__className__") || "")
            })
        },
        hasClass: function(e) {
            var t = " " + e + " ",
                n = 0,
                r = this.length;
            for (; r > n; n++)
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(U, " ").indexOf(t) >= 0) return !0;
            return !1
        },
        val: function(e) {
            var n, r, i, o = this[0]; {
                if (arguments.length) return i = x.isFunction(e), this.each(function(n) {
                    var o;
                    1 === this.nodeType && (o = i ? e.call(this, n, x(this).val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : x.isArray(o) && (o = x.map(o, function(e) {
                        return null == e ? "" : e + ""
                    })), r = x.valHooks[this.type] || x.valHooks[this.nodeName.toLowerCase()], r && "set" in r && r.set(this, o, "value") !== t || (this.value = o))
                });
                if (o) return r = x.valHooks[o.type] || x.valHooks[o.nodeName.toLowerCase()], r && "get" in r && (n = r.get(o, "value")) !== t ? n : (n = o.value, "string" == typeof n ? n.replace(V, "") : null == n ? "" : n)
            }
        }
    }), x.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = x.find.attr(e, "value");
                    return null != t ? t : e.text
                }
            },
            select: {
                get: function(e) {
                    var t, n, r = e.options,
                        i = e.selectedIndex,
                        o = "select-one" === e.type || 0 > i,
                        a = o ? null : [],
                        s = o ? i + 1 : r.length,
                        l = 0 > i ? s : o ? i : 0;
                    for (; s > l; l++)
                        if (n = r[l], !(!n.selected && l !== i || (x.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && x.nodeName(n.parentNode, "optgroup"))) {
                            if (t = x(n).val(), o) return t;
                            a.push(t)
                        }
                    return a
                },
                set: function(e, t) {
                    var n, r, i = e.options,
                        o = x.makeArray(t),
                        a = i.length;
                    while (a--) r = i[a], (r.selected = x.inArray(x(r).val(), o) >= 0) && (n = !0);
                    return n || (e.selectedIndex = -1), o
                }
            }
        },
        attr: function(e, n, r) {
            var o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) return typeof e.getAttribute === i ? x.prop(e, n, r) : (1 === s && x.isXMLDoc(e) || (n = n.toLowerCase(), o = x.attrHooks[n] || (x.expr.match.bool.test(n) ? X : z)), r === t ? o && "get" in o && null !== (a = o.get(e, n)) ? a : (a = x.find.attr(e, n), null == a ? t : a) : null !== r ? o && "set" in o && (a = o.set(e, r, n)) !== t ? a : (e.setAttribute(n, r + ""), r) : (x.removeAttr(e, n), t))
        },
        removeAttr: function(e, t) {
            var n, r, i = 0,
                o = t && t.match(T);
            if (o && 1 === e.nodeType)
                while (n = o[i++]) r = x.propFix[n] || n, x.expr.match.bool.test(n) ? K && Q || !G.test(n) ? e[r] = !1 : e[x.camelCase("default-" + n)] = e[r] = !1 : x.attr(e, n, ""), e.removeAttribute(Q ? n : r)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!x.support.radioValue && "radio" === t && x.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function(e, n, r) {
            var i, o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) return a = 1 !== s || !x.isXMLDoc(e), a && (n = x.propFix[n] || n, o = x.propHooks[n]), r !== t ? o && "set" in o && (i = o.set(e, r, n)) !== t ? i : e[n] = r : o && "get" in o && null !== (i = o.get(e, n)) ? i : e[n]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = x.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : Y.test(e.nodeName) || J.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        }
    }), X = {
        set: function(e, t, n) {
            return t === !1 ? x.removeAttr(e, n) : K && Q || !G.test(n) ? e.setAttribute(!Q && x.propFix[n] || n, n) : e[x.camelCase("default-" + n)] = e[n] = !0, n
        }
    }, x.each(x.expr.match.bool.source.match(/\w+/g), function(e, n) {
        var r = x.expr.attrHandle[n] || x.find.attr;
        x.expr.attrHandle[n] = K && Q || !G.test(n) ? function(e, n, i) {
            var o = x.expr.attrHandle[n],
                a = i ? t : (x.expr.attrHandle[n] = t) != r(e, n, i) ? n.toLowerCase() : null;
            return x.expr.attrHandle[n] = o, a
        } : function(e, n, r) {
            return r ? t : e[x.camelCase("default-" + n)] ? n.toLowerCase() : null
        }
    }), K && Q || (x.attrHooks.value = {
        set: function(e, n, r) {
            return x.nodeName(e, "input") ? (e.defaultValue = n, t) : z && z.set(e, n, r)
        }
    }), Q || (z = {
        set: function(e, n, r) {
            var i = e.getAttributeNode(r);
            return i || e.setAttributeNode(i = e.ownerDocument.createAttribute(r)), i.value = n += "", "value" === r || n === e.getAttribute(r) ? n : t
        }
    }, x.expr.attrHandle.id = x.expr.attrHandle.name = x.expr.attrHandle.coords = function(e, n, r) {
        var i;
        return r ? t : (i = e.getAttributeNode(n)) && "" !== i.value ? i.value : null
    }, x.valHooks.button = {
        get: function(e, n) {
            var r = e.getAttributeNode(n);
            return r && r.specified ? r.value : t
        },
        set: z.set
    }, x.attrHooks.contenteditable = {
        set: function(e, t, n) {
            z.set(e, "" === t ? !1 : t, n)
        }
    }, x.each(["width", "height"], function(e, n) {
        x.attrHooks[n] = {
            set: function(e, r) {
                return "" === r ? (e.setAttribute(n, "auto"), r) : t
            }
        }
    })), x.support.hrefNormalized || x.each(["href", "src"], function(e, t) {
        x.propHooks[t] = {
            get: function(e) {
                return e.getAttribute(t, 4)
            }
        }
    }), x.support.style || (x.attrHooks.style = {
        get: function(e) {
            return e.style.cssText || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), x.support.optSelected || (x.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    }), x.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        x.propFix[this.toLowerCase()] = this
    }), x.support.enctype || (x.propFix.enctype = "encoding"), x.each(["radio", "checkbox"], function() {
        x.valHooks[this] = {
            set: function(e, n) {
                return x.isArray(n) ? e.checked = x.inArray(x(e).val(), n) >= 0 : t
            }
        }, x.support.checkOn || (x.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    });
    var Z = /^(?:input|select|textarea)$/i,
        et = /^key/,
        tt = /^(?:mouse|contextmenu)|click/,
        nt = /^(?:focusinfocus|focusoutblur)$/,
        rt = /^([^.]*)(?:\.(.+)|)$/;

    function it() {
        return !0
    }

    function ot() {
        return !1
    }

    function at() {
        try {
            return a.activeElement
        } catch (e) {}
    }
    x.event = {
        global: {},
        add: function(e, n, r, o, a) {
            var s, l, u, c, p, f, d, h, g, m, y, v = x._data(e);
            if (v) {
                r.handler && (c = r, r = c.handler, a = c.selector), r.guid || (r.guid = x.guid++), (l = v.events) || (l = v.events = {}), (f = v.handle) || (f = v.handle = function(e) {
                    return typeof x === i || e && x.event.triggered === e.type ? t : x.event.dispatch.apply(f.elem, arguments)
                }, f.elem = e), n = (n || "").match(T) || [""], u = n.length;
                while (u--) s = rt.exec(n[u]) || [], g = y = s[1], m = (s[2] || "").split(".").sort(), g && (p = x.event.special[g] || {}, g = (a ? p.delegateType : p.bindType) || g, p = x.event.special[g] || {}, d = x.extend({
                    type: g,
                    origType: y,
                    data: o,
                    handler: r,
                    guid: r.guid,
                    selector: a,
                    needsContext: a && x.expr.match.needsContext.test(a),
                    namespace: m.join(".")
                }, c), (h = l[g]) || (h = l[g] = [], h.delegateCount = 0, p.setup && p.setup.call(e, o, m, f) !== !1 || (e.addEventListener ? e.addEventListener(g, f, !1) : e.attachEvent && e.attachEvent("on" + g, f))), p.add && (p.add.call(e, d), d.handler.guid || (d.handler.guid = r.guid)), a ? h.splice(h.delegateCount++, 0, d) : h.push(d), x.event.global[g] = !0);
                e = null
            }
        },
        remove: function(e, t, n, r, i) {
            var o, a, s, l, u, c, p, f, d, h, g, m = x.hasData(e) && x._data(e);
            if (m && (c = m.events)) {
                t = (t || "").match(T) || [""], u = t.length;
                while (u--)
                    if (s = rt.exec(t[u]) || [], d = g = s[1], h = (s[2] || "").split(".").sort(), d) {
                        p = x.event.special[d] || {}, d = (r ? p.delegateType : p.bindType) || d, f = c[d] || [], s = s[2] && RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), l = o = f.length;
                        while (o--) a = f[o], !i && g !== a.origType || n && n.guid !== a.guid || s && !s.test(a.namespace) || r && r !== a.selector && ("**" !== r || !a.selector) || (f.splice(o, 1), a.selector && f.delegateCount--, p.remove && p.remove.call(e, a));
                        l && !f.length && (p.teardown && p.teardown.call(e, h, m.handle) !== !1 || x.removeEvent(e, d, m.handle), delete c[d])
                    } else
                        for (d in c) x.event.remove(e, d + t[u], n, r, !0);
                x.isEmptyObject(c) && (delete m.handle, x._removeData(e, "events"))
            }
        },
        trigger: function(n, r, i, o) {
            var s, l, u, c, p, f, d, h = [i || a],
                g = v.call(n, "type") ? n.type : n,
                m = v.call(n, "namespace") ? n.namespace.split(".") : [];
            if (u = f = i = i || a, 3 !== i.nodeType && 8 !== i.nodeType && !nt.test(g + x.event.triggered) && (g.indexOf(".") >= 0 && (m = g.split("."), g = m.shift(), m.sort()), l = 0 > g.indexOf(":") && "on" + g, n = n[x.expando] ? n : new x.Event(g, "object" == typeof n && n), n.isTrigger = o ? 2 : 3, n.namespace = m.join("."), n.namespace_re = n.namespace ? RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, n.result = t, n.target || (n.target = i), r = null == r ? [n] : x.makeArray(r, [n]), p = x.event.special[g] || {}, o || !p.trigger || p.trigger.apply(i, r) !== !1)) {
                if (!o && !p.noBubble && !x.isWindow(i)) {
                    for (c = p.delegateType || g, nt.test(c + g) || (u = u.parentNode); u; u = u.parentNode) h.push(u), f = u;
                    f === (i.ownerDocument || a) && h.push(f.defaultView || f.parentWindow || e)
                }
                d = 0;
                while ((u = h[d++]) && !n.isPropagationStopped()) n.type = d > 1 ? c : p.bindType || g, s = (x._data(u, "events") || {})[n.type] && x._data(u, "handle"), s && s.apply(u, r), s = l && u[l], s && x.acceptData(u) && s.apply && s.apply(u, r) === !1 && n.preventDefault();
                if (n.type = g, !o && !n.isDefaultPrevented() && (!p._default || p._default.apply(h.pop(), r) === !1) && x.acceptData(i) && l && i[g] && !x.isWindow(i)) {
                    f = i[l], f && (i[l] = null), x.event.triggered = g;
                    try {
                        i[g]()
                    } catch (y) {}
                    x.event.triggered = t, f && (i[l] = f)
                }
                return n.result
            }
        },
        dispatch: function(e) {
            e = x.event.fix(e);
            var n, r, i, o, a, s = [],
                l = g.call(arguments),
                u = (x._data(this, "events") || {})[e.type] || [],
                c = x.event.special[e.type] || {};
            if (l[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
                s = x.event.handlers.call(this, e, u), n = 0;
                while ((o = s[n++]) && !e.isPropagationStopped()) {
                    e.currentTarget = o.elem, a = 0;
                    while ((i = o.handlers[a++]) && !e.isImmediatePropagationStopped())(!e.namespace_re || e.namespace_re.test(i.namespace)) && (e.handleObj = i, e.data = i.data, r = ((x.event.special[i.origType] || {}).handle || i.handler).apply(o.elem, l), r !== t && (e.result = r) === !1 && (e.preventDefault(), e.stopPropagation()))
                }
                return c.postDispatch && c.postDispatch.call(this, e), e.result
            }
        },
        handlers: function(e, n) {
            var r, i, o, a, s = [],
                l = n.delegateCount,
                u = e.target;
            if (l && u.nodeType && (!e.button || "click" !== e.type))
                for (; u != this; u = u.parentNode || this)
                    if (1 === u.nodeType && (u.disabled !== !0 || "click" !== e.type)) {
                        for (o = [], a = 0; l > a; a++) i = n[a], r = i.selector + " ", o[r] === t && (o[r] = i.needsContext ? x(r, this).index(u) >= 0 : x.find(r, this, null, [u]).length), o[r] && o.push(i);
                        o.length && s.push({
                            elem: u,
                            handlers: o
                        })
                    }
            return n.length > l && s.push({
                elem: this,
                handlers: n.slice(l)
            }), s
        },
        fix: function(e) {
            if (e[x.expando]) return e;
            var t, n, r, i = e.type,
                o = e,
                s = this.fixHooks[i];
            s || (this.fixHooks[i] = s = tt.test(i) ? this.mouseHooks : et.test(i) ? this.keyHooks : {}), r = s.props ? this.props.concat(s.props) : this.props, e = new x.Event(o), t = r.length;
            while (t--) n = r[t], e[n] = o[n];
            return e.target || (e.target = o.srcElement || a), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, o) : e
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, n) {
                var r, i, o, s = n.button,
                    l = n.fromElement;
                return null == e.pageX && null != n.clientX && (i = e.target.ownerDocument || a, o = i.documentElement, r = i.body, e.pageX = n.clientX + (o && o.scrollLeft || r && r.scrollLeft || 0) - (o && o.clientLeft || r && r.clientLeft || 0), e.pageY = n.clientY + (o && o.scrollTop || r && r.scrollTop || 0) - (o && o.clientTop || r && r.clientTop || 0)), !e.relatedTarget && l && (e.relatedTarget = l === e.target ? n.toElement : l), e.which || s === t || (e.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0), e
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== at() && this.focus) try {
                        return this.focus(), !1
                    } catch (e) {}
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === at() && this.blur ? (this.blur(), !1) : t
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return x.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : t
                },
                _default: function(e) {
                    return x.nodeName(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    e.result !== t && (e.originalEvent.returnValue = e.result)
                }
            }
        },
        simulate: function(e, t, n, r) {
            var i = x.extend(new x.Event, n, {
                type: e,
                isSimulated: !0,
                originalEvent: {}
            });
            r ? x.event.trigger(i, null, t) : x.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
        }
    }, x.removeEvent = a.removeEventListener ? function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    } : function(e, t, n) {
        var r = "on" + t;
        e.detachEvent && (typeof e[r] === i && (e[r] = null), e.detachEvent(r, n))
    }, x.Event = function(e, n) {
        return this instanceof x.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? it : ot) : this.type = e, n && x.extend(this, n), this.timeStamp = e && e.timeStamp || x.now(), this[x.expando] = !0, t) : new x.Event(e, n)
    }, x.Event.prototype = {
        isDefaultPrevented: ot,
        isPropagationStopped: ot,
        isImmediatePropagationStopped: ot,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = it, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = it, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = it, this.stopPropagation()
        }
    }, x.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function(e, t) {
        x.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, r = this,
                    i = e.relatedTarget,
                    o = e.handleObj;
                return (!i || i !== r && !x.contains(r, i)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
            }
        }
    }), x.support.submitBubbles || (x.event.special.submit = {
        setup: function() {
            return x.nodeName(this, "form") ? !1 : (x.event.add(this, "click._submit keypress._submit", function(e) {
                var n = e.target,
                    r = x.nodeName(n, "input") || x.nodeName(n, "button") ? n.form : t;
                r && !x._data(r, "submitBubbles") && (x.event.add(r, "submit._submit", function(e) {
                    e._submit_bubble = !0
                }), x._data(r, "submitBubbles", !0))
            }), t)
        },
        postDispatch: function(e) {
            e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && x.event.simulate("submit", this.parentNode, e, !0))
        },
        teardown: function() {
            return x.nodeName(this, "form") ? !1 : (x.event.remove(this, "._submit"), t)
        }
    }), x.support.changeBubbles || (x.event.special.change = {
        setup: function() {
            return Z.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (x.event.add(this, "propertychange._change", function(e) {
                "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
            }), x.event.add(this, "click._change", function(e) {
                this._just_changed && !e.isTrigger && (this._just_changed = !1), x.event.simulate("change", this, e, !0)
            })), !1) : (x.event.add(this, "beforeactivate._change", function(e) {
                var t = e.target;
                Z.test(t.nodeName) && !x._data(t, "changeBubbles") && (x.event.add(t, "change._change", function(e) {
                    !this.parentNode || e.isSimulated || e.isTrigger || x.event.simulate("change", this.parentNode, e, !0)
                }), x._data(t, "changeBubbles", !0))
            }), t)
        },
        handle: function(e) {
            var n = e.target;
            return this !== n || e.isSimulated || e.isTrigger || "radio" !== n.type && "checkbox" !== n.type ? e.handleObj.handler.apply(this, arguments) : t
        },
        teardown: function() {
            return x.event.remove(this, "._change"), !Z.test(this.nodeName)
        }
    }), x.support.focusinBubbles || x.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = 0,
            r = function(e) {
                x.event.simulate(t, e.target, x.event.fix(e), !0)
            };
        x.event.special[t] = {
            setup: function() {
                0 === n++ && a.addEventListener(e, r, !0)
            },
            teardown: function() {
                0 === --n && a.removeEventListener(e, r, !0)
            }
        }
    }), x.fn.extend({
        on: function(e, n, r, i, o) {
            var a, s;
            if ("object" == typeof e) {
                "string" != typeof n && (r = r || n, n = t);
                for (a in e) this.on(a, n, r, e[a], o);
                return this
            }
            if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) i = ot;
            else if (!i) return this;
            return 1 === o && (s = i, i = function(e) {
                return x().off(e), s.apply(this, arguments)
            }, i.guid = s.guid || (s.guid = x.guid++)), this.each(function() {
                x.event.add(this, e, i, r, n)
            })
        },
        one: function(e, t, n, r) {
            return this.on(e, t, n, r, 1)
        },
        off: function(e, n, r) {
            var i, o;
            if (e && e.preventDefault && e.handleObj) return i = e.handleObj, x(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
            if ("object" == typeof e) {
                for (o in e) this.off(o, n, e[o]);
                return this
            }
            return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = ot), this.each(function() {
                x.event.remove(this, e, r, n)
            })
        },
        trigger: function(e, t) {
            return this.each(function() {
                x.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, n) {
            var r = this[0];
            return r ? x.event.trigger(e, n, r, !0) : t
        }
    });
    var st = /^.[^:#\[\.,]*$/,
        lt = /^(?:parents|prev(?:Until|All))/,
        ut = x.expr.match.needsContext,
        ct = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    x.fn.extend({
        find: function(e) {
            var t, n = [],
                r = this,
                i = r.length;
            if ("string" != typeof e) return this.pushStack(x(e).filter(function() {
                for (t = 0; i > t; t++)
                    if (x.contains(r[t], this)) return !0
            }));
            for (t = 0; i > t; t++) x.find(e, r[t], n);
            return n = this.pushStack(i > 1 ? x.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n
        },
        has: function(e) {
            var t, n = x(e, this),
                r = n.length;
            return this.filter(function() {
                for (t = 0; r > t; t++)
                    if (x.contains(this, n[t])) return !0
            })
        },
        not: function(e) {
            return this.pushStack(ft(this, e || [], !0))
        },
        filter: function(e) {
            return this.pushStack(ft(this, e || [], !1))
        },
        is: function(e) {
            return !!ft(this, "string" == typeof e && ut.test(e) ? x(e) : e || [], !1).length
        },
        closest: function(e, t) {
            var n, r = 0,
                i = this.length,
                o = [],
                a = ut.test(e) || "string" != typeof e ? x(e, t || this.context) : 0;
            for (; i > r; r++)
                for (n = this[r]; n && n !== t; n = n.parentNode)
                    if (11 > n.nodeType && (a ? a.index(n) > -1 : 1 === n.nodeType && x.find.matchesSelector(n, e))) {
                        n = o.push(n);
                        break
                    }
            return this.pushStack(o.length > 1 ? x.unique(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? x.inArray(this[0], x(e)) : x.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            var n = "string" == typeof e ? x(e, t) : x.makeArray(e && e.nodeType ? [e] : e),
                r = x.merge(this.get(), n);
            return this.pushStack(x.unique(r))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    });

    function pt(e, t) {
        do e = e[t]; while (e && 1 !== e.nodeType);
        return e
    }
    x.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return x.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return x.dir(e, "parentNode", n)
        },
        next: function(e) {
            return pt(e, "nextSibling")
        },
        prev: function(e) {
            return pt(e, "previousSibling")
        },
        nextAll: function(e) {
            return x.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return x.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return x.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return x.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return x.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return x.sibling(e.firstChild)
        },
        contents: function(e) {
            return x.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : x.merge([], e.childNodes)
        }
    }, function(e, t) {
        x.fn[e] = function(n, r) {
            var i = x.map(this, t, n);
            return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = x.filter(r, i)), this.length > 1 && (ct[e] || (i = x.unique(i)), lt.test(e) && (i = i.reverse())), this.pushStack(i)
        }
    }), x.extend({
        filter: function(e, t, n) {
            var r = t[0];
            return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? x.find.matchesSelector(r, e) ? [r] : [] : x.find.matches(e, x.grep(t, function(e) {
                return 1 === e.nodeType
            }))
        },
        dir: function(e, n, r) {
            var i = [],
                o = e[n];
            while (o && 9 !== o.nodeType && (r === t || 1 !== o.nodeType || !x(o).is(r))) 1 === o.nodeType && i.push(o), o = o[n];
            return i
        },
        sibling: function(e, t) {
            var n = [];
            for (; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n
        }
    });

    function ft(e, t, n) {
        if (x.isFunction(t)) return x.grep(e, function(e, r) {
            return !!t.call(e, r, e) !== n
        });
        if (t.nodeType) return x.grep(e, function(e) {
            return e === t !== n
        });
        if ("string" == typeof t) {
            if (st.test(t)) return x.filter(t, e, n);
            t = x.filter(t, e)
        }
        return x.grep(e, function(e) {
            return x.inArray(e, t) >= 0 !== n
        })
    }

    function dt(e) {
        var t = ht.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement)
            while (t.length) n.createElement(t.pop());
        return n
    }
    var ht = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        gt = / jQuery\d+="(?:null|\d+)"/g,
        mt = RegExp("<(?:" + ht + ")[\\s/>]", "i"),
        yt = /^\s+/,
        vt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        bt = /<([\w:]+)/,
        xt = /<tbody/i,
        wt = /<|&#?\w+;/,
        Tt = /<(?:script|style|link)/i,
        Ct = /^(?:checkbox|radio)$/i,
        Nt = /checked\s*(?:[^=]|=\s*.checked.)/i,
        kt = /^$|\/(?:java|ecma)script/i,
        Et = /^true\/(.*)/,
        St = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        At = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: x.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
        },
        jt = dt(a),
        Dt = jt.appendChild(a.createElement("div"));
    At.optgroup = At.option, At.tbody = At.tfoot = At.colgroup = At.caption = At.thead, At.th = At.td, x.fn.extend({
        text: function(e) {
            return x.access(this, function(e) {
                return e === t ? x.text(this) : this.empty().append((this[0] && this[0].ownerDocument || a).createTextNode(e))
            }, null, e, arguments.length)
        },
        append: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Lt(this, e);
                    t.appendChild(e)
                }
            })
        },
        prepend: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Lt(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        remove: function(e, t) {
            var n, r = e ? x.filter(e, this) : this,
                i = 0;
            for (; null != (n = r[i]); i++) t || 1 !== n.nodeType || x.cleanData(Ft(n)), n.parentNode && (t && x.contains(n.ownerDocument, n) && _t(Ft(n, "script")), n.parentNode.removeChild(n));
            return this
        },
        empty: function() {
            var e, t = 0;
            for (; null != (e = this[t]); t++) {
                1 === e.nodeType && x.cleanData(Ft(e, !1));
                while (e.firstChild) e.removeChild(e.firstChild);
                e.options && x.nodeName(e, "select") && (e.options.length = 0)
            }
            return this
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                return x.clone(this, e, t)
            })
        },
        html: function(e) {
            return x.access(this, function(e) {
                var n = this[0] || {},
                    r = 0,
                    i = this.length;
                if (e === t) return 1 === n.nodeType ? n.innerHTML.replace(gt, "") : t;
                if (!("string" != typeof e || Tt.test(e) || !x.support.htmlSerialize && mt.test(e) || !x.support.leadingWhitespace && yt.test(e) || At[(bt.exec(e) || ["", ""])[1].toLowerCase()])) {
                    e = e.replace(vt, "<$1></$2>");
                    try {
                        for (; i > r; r++) n = this[r] || {}, 1 === n.nodeType && (x.cleanData(Ft(n, !1)), n.innerHTML = e);
                        n = 0
                    } catch (o) {}
                }
                n && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = x.map(this, function(e) {
                    return [e.nextSibling, e.parentNode]
                }),
                t = 0;
            return this.domManip(arguments, function(n) {
                var r = e[t++],
                    i = e[t++];
                i && (r && r.parentNode !== i && (r = this.nextSibling), x(this).remove(), i.insertBefore(n, r))
            }, !0), t ? this : this.remove()
        },
        detach: function(e) {
            return this.remove(e, !0)
        },
        domManip: function(e, t, n) {
            e = d.apply([], e);
            var r, i, o, a, s, l, u = 0,
                c = this.length,
                p = this,
                f = c - 1,
                h = e[0],
                g = x.isFunction(h);
            if (g || !(1 >= c || "string" != typeof h || x.support.checkClone) && Nt.test(h)) return this.each(function(r) {
                var i = p.eq(r);
                g && (e[0] = h.call(this, r, i.html())), i.domManip(e, t, n)
            });
            if (c && (l = x.buildFragment(e, this[0].ownerDocument, !1, !n && this), r = l.firstChild, 1 === l.childNodes.length && (l = r), r)) {
                for (a = x.map(Ft(l, "script"), Ht), o = a.length; c > u; u++) i = l, u !== f && (i = x.clone(i, !0, !0), o && x.merge(a, Ft(i, "script"))), t.call(this[u], i, u);
                if (o)
                    for (s = a[a.length - 1].ownerDocument, x.map(a, qt), u = 0; o > u; u++) i = a[u], kt.test(i.type || "") && !x._data(i, "globalEval") && x.contains(s, i) && (i.src ? x._evalUrl(i.src) : x.globalEval((i.text || i.textContent || i.innerHTML || "").replace(St, "")));
                l = r = null
            }
            return this
        }
    });

    function Lt(e, t) {
        return x.nodeName(e, "table") && x.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }

    function Ht(e) {
        return e.type = (null !== x.find.attr(e, "type")) + "/" + e.type, e
    }

    function qt(e) {
        var t = Et.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function _t(e, t) {
        var n, r = 0;
        for (; null != (n = e[r]); r++) x._data(n, "globalEval", !t || x._data(t[r], "globalEval"))
    }

    function Mt(e, t) {
        if (1 === t.nodeType && x.hasData(e)) {
            var n, r, i, o = x._data(e),
                a = x._data(t, o),
                s = o.events;
            if (s) {
                delete a.handle, a.events = {};
                for (n in s)
                    for (r = 0, i = s[n].length; i > r; r++) x.event.add(t, n, s[n][r])
            }
            a.data && (a.data = x.extend({}, a.data))
        }
    }

    function Ot(e, t) {
        var n, r, i;
        if (1 === t.nodeType) {
            if (n = t.nodeName.toLowerCase(), !x.support.noCloneEvent && t[x.expando]) {
                i = x._data(t);
                for (r in i.events) x.removeEvent(t, r, i.handle);
                t.removeAttribute(x.expando)
            }
            "script" === n && t.text !== e.text ? (Ht(t).text = e.text, qt(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), x.support.html5Clone && e.innerHTML && !x.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Ct.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
        }
    }
    x.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        x.fn[e] = function(e) {
            var n, r = 0,
                i = [],
                o = x(e),
                a = o.length - 1;
            for (; a >= r; r++) n = r === a ? this : this.clone(!0), x(o[r])[t](n), h.apply(i, n.get());
            return this.pushStack(i)
        }
    });

    function Ft(e, n) {
        var r, o, a = 0,
            s = typeof e.getElementsByTagName !== i ? e.getElementsByTagName(n || "*") : typeof e.querySelectorAll !== i ? e.querySelectorAll(n || "*") : t;
        if (!s)
            for (s = [], r = e.childNodes || e; null != (o = r[a]); a++) !n || x.nodeName(o, n) ? s.push(o) : x.merge(s, Ft(o, n));
        return n === t || n && x.nodeName(e, n) ? x.merge([e], s) : s
    }

    function Bt(e) {
        Ct.test(e.type) && (e.defaultChecked = e.checked)
    }
    x.extend({
        clone: function(e, t, n) {
            var r, i, o, a, s, l = x.contains(e.ownerDocument, e);
            if (x.support.html5Clone || x.isXMLDoc(e) || !mt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (Dt.innerHTML = e.outerHTML, Dt.removeChild(o = Dt.firstChild)), !(x.support.noCloneEvent && x.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || x.isXMLDoc(e)))
                for (r = Ft(o), s = Ft(e), a = 0; null != (i = s[a]); ++a) r[a] && Ot(i, r[a]);
            if (t)
                if (n)
                    for (s = s || Ft(e), r = r || Ft(o), a = 0; null != (i = s[a]); a++) Mt(i, r[a]);
                else Mt(e, o);
            return r = Ft(o, "script"), r.length > 0 && _t(r, !l && Ft(e, "script")), r = s = i = null, o
        },
        buildFragment: function(e, t, n, r) {
            var i, o, a, s, l, u, c, p = e.length,
                f = dt(t),
                d = [],
                h = 0;
            for (; p > h; h++)
                if (o = e[h], o || 0 === o)
                    if ("object" === x.type(o)) x.merge(d, o.nodeType ? [o] : o);
                    else if (wt.test(o)) {
                s = s || f.appendChild(t.createElement("div")), l = (bt.exec(o) || ["", ""])[1].toLowerCase(), c = At[l] || At._default, s.innerHTML = c[1] + o.replace(vt, "<$1></$2>") + c[2], i = c[0];
                while (i--) s = s.lastChild;
                if (!x.support.leadingWhitespace && yt.test(o) && d.push(t.createTextNode(yt.exec(o)[0])), !x.support.tbody) {
                    o = "table" !== l || xt.test(o) ? "<table>" !== c[1] || xt.test(o) ? 0 : s : s.firstChild, i = o && o.childNodes.length;
                    while (i--) x.nodeName(u = o.childNodes[i], "tbody") && !u.childNodes.length && o.removeChild(u)
                }
                x.merge(d, s.childNodes), s.textContent = "";
                while (s.firstChild) s.removeChild(s.firstChild);
                s = f.lastChild
            } else d.push(t.createTextNode(o));
            s && f.removeChild(s), x.support.appendChecked || x.grep(Ft(d, "input"), Bt), h = 0;
            while (o = d[h++])
                if ((!r || -1 === x.inArray(o, r)) && (a = x.contains(o.ownerDocument, o), s = Ft(f.appendChild(o), "script"), a && _t(s), n)) {
                    i = 0;
                    while (o = s[i++]) kt.test(o.type || "") && n.push(o)
                }
            return s = null, f
        },
        cleanData: function(e, t) {
            var n, r, o, a, s = 0,
                l = x.expando,
                u = x.cache,
                c = x.support.deleteExpando,
                f = x.event.special;
            for (; null != (n = e[s]); s++)
                if ((t || x.acceptData(n)) && (o = n[l], a = o && u[o])) {
                    if (a.events)
                        for (r in a.events) f[r] ? x.event.remove(n, r) : x.removeEvent(n, r, a.handle);
                    u[o] && (delete u[o], c ? delete n[l] : typeof n.removeAttribute !== i ? n.removeAttribute(l) : n[l] = null, p.push(o))
                }
        },
        _evalUrl: function(e) {
            return x.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                "throws": !0
            })
        }
    }), x.fn.extend({
        wrapAll: function(e) {
            if (x.isFunction(e)) return this.each(function(t) {
                x(this).wrapAll(e.call(this, t))
            });
            if (this[0]) {
                var t = x(e, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                    var e = this;
                    while (e.firstChild && 1 === e.firstChild.nodeType) e = e.firstChild;
                    return e
                }).append(this)
            }
            return this
        },
        wrapInner: function(e) {
            return x.isFunction(e) ? this.each(function(t) {
                x(this).wrapInner(e.call(this, t))
            }) : this.each(function() {
                var t = x(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = x.isFunction(e);
            return this.each(function(n) {
                x(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                x.nodeName(this, "body") || x(this).replaceWith(this.childNodes)
            }).end()
        }
    });
    var Pt, Rt, Wt, $t = /alpha\([^)]*\)/i,
        It = /opacity\s*=\s*([^)]*)/,
        zt = /^(top|right|bottom|left)$/,
        Xt = /^(none|table(?!-c[ea]).+)/,
        Ut = /^margin/,
        Vt = RegExp("^(" + w + ")(.*)$", "i"),
        Yt = RegExp("^(" + w + ")(?!px)[a-z%]+$", "i"),
        Jt = RegExp("^([+-])=(" + w + ")", "i"),
        Gt = {
            BODY: "block"
        },
        Qt = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Kt = {
            letterSpacing: 0,
            fontWeight: 400
        },
        Zt = ["Top", "Right", "Bottom", "Left"],
        en = ["Webkit", "O", "Moz", "ms"];

    function tn(e, t) {
        if (t in e) return t;
        var n = t.charAt(0).toUpperCase() + t.slice(1),
            r = t,
            i = en.length;
        while (i--)
            if (t = en[i] + n, t in e) return t;
        return r
    }

    function nn(e, t) {
        return e = t || e, "none" === x.css(e, "display") || !x.contains(e.ownerDocument, e)
    }

    function rn(e, t) {
        var n, r, i, o = [],
            a = 0,
            s = e.length;
        for (; s > a; a++) r = e[a], r.style && (o[a] = x._data(r, "olddisplay"), n = r.style.display, t ? (o[a] || "none" !== n || (r.style.display = ""), "" === r.style.display && nn(r) && (o[a] = x._data(r, "olddisplay", ln(r.nodeName)))) : o[a] || (i = nn(r), (n && "none" !== n || !i) && x._data(r, "olddisplay", i ? n : x.css(r, "display"))));
        for (a = 0; s > a; a++) r = e[a], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? o[a] || "" : "none"));
        return e
    }
    x.fn.extend({
        css: function(e, n) {
            return x.access(this, function(e, n, r) {
                var i, o, a = {},
                    s = 0;
                if (x.isArray(n)) {
                    for (o = Rt(e), i = n.length; i > s; s++) a[n[s]] = x.css(e, n[s], !1, o);
                    return a
                }
                return r !== t ? x.style(e, n, r) : x.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return rn(this, !0)
        },
        hide: function() {
            return rn(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                nn(this) ? x(this).show() : x(this).hide()
            })
        }
    }), x.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Wt(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": x.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, r, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o, a, s, l = x.camelCase(n),
                    u = e.style;
                if (n = x.cssProps[l] || (x.cssProps[l] = tn(u, l)), s = x.cssHooks[n] || x.cssHooks[l], r === t) return s && "get" in s && (o = s.get(e, !1, i)) !== t ? o : u[n];
                if (a = typeof r, "string" === a && (o = Jt.exec(r)) && (r = (o[1] + 1) * o[2] + parseFloat(x.css(e, n)), a = "number"), !(null == r || "number" === a && isNaN(r) || ("number" !== a || x.cssNumber[l] || (r += "px"), x.support.clearCloneStyle || "" !== r || 0 !== n.indexOf("background") || (u[n] = "inherit"), s && "set" in s && (r = s.set(e, r, i)) === t))) try {
                    u[n] = r
                } catch (c) {}
            }
        },
        css: function(e, n, r, i) {
            var o, a, s, l = x.camelCase(n);
            return n = x.cssProps[l] || (x.cssProps[l] = tn(e.style, l)), s = x.cssHooks[n] || x.cssHooks[l], s && "get" in s && (a = s.get(e, !0, r)), a === t && (a = Wt(e, n, i)), "normal" === a && n in Kt && (a = Kt[n]), "" === r || r ? (o = parseFloat(a), r === !0 || x.isNumeric(o) ? o || 0 : a) : a
        }
    }), e.getComputedStyle ? (Rt = function(t) {
        return e.getComputedStyle(t, null)
    }, Wt = function(e, n, r) {
        var i, o, a, s = r || Rt(e),
            l = s ? s.getPropertyValue(n) || s[n] : t,
            u = e.style;
        return s && ("" !== l || x.contains(e.ownerDocument, e) || (l = x.style(e, n)), Yt.test(l) && Ut.test(n) && (i = u.width, o = u.minWidth, a = u.maxWidth, u.minWidth = u.maxWidth = u.width = l, l = s.width, u.width = i, u.minWidth = o, u.maxWidth = a)), l
    }) : a.documentElement.currentStyle && (Rt = function(e) {
        return e.currentStyle
    }, Wt = function(e, n, r) {
        var i, o, a, s = r || Rt(e),
            l = s ? s[n] : t,
            u = e.style;
        return null == l && u && u[n] && (l = u[n]), Yt.test(l) && !zt.test(n) && (i = u.left, o = e.runtimeStyle, a = o && o.left, a && (o.left = e.currentStyle.left), u.left = "fontSize" === n ? "1em" : l, l = u.pixelLeft + "px", u.left = i, a && (o.left = a)), "" === l ? "auto" : l
    });

    function on(e, t, n) {
        var r = Vt.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }

    function an(e, t, n, r, i) {
        var o = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0,
            a = 0;
        for (; 4 > o; o += 2) "margin" === n && (a += x.css(e, n + Zt[o], !0, i)), r ? ("content" === n && (a -= x.css(e, "padding" + Zt[o], !0, i)), "margin" !== n && (a -= x.css(e, "border" + Zt[o] + "Width", !0, i))) : (a += x.css(e, "padding" + Zt[o], !0, i), "padding" !== n && (a += x.css(e, "border" + Zt[o] + "Width", !0, i)));
        return a
    }

    function sn(e, t, n) {
        var r = !0,
            i = "width" === t ? e.offsetWidth : e.offsetHeight,
            o = Rt(e),
            a = x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, o);
        if (0 >= i || null == i) {
            if (i = Wt(e, t, o), (0 > i || null == i) && (i = e.style[t]), Yt.test(i)) return i;
            r = a && (x.support.boxSizingReliable || i === e.style[t]), i = parseFloat(i) || 0
        }
        return i + an(e, t, n || (a ? "border" : "content"), r, o) + "px"
    }

    function ln(e) {
        var t = a,
            n = Gt[e];
        return n || (n = un(e, t), "none" !== n && n || (Pt = (Pt || x("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (Pt[0].contentWindow || Pt[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = un(e, t), Pt.detach()), Gt[e] = n), n
    }

    function un(e, t) {
        var n = x(t.createElement(e)).appendTo(t.body),
            r = x.css(n[0], "display");
        return n.remove(), r
    }
    x.each(["height", "width"], function(e, n) {
        x.cssHooks[n] = {
            get: function(e, r, i) {
                return r ? 0 === e.offsetWidth && Xt.test(x.css(e, "display")) ? x.swap(e, Qt, function() {
                    return sn(e, n, i)
                }) : sn(e, n, i) : t
            },
            set: function(e, t, r) {
                var i = r && Rt(e);
                return on(e, t, r ? an(e, n, r, x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, i), i) : 0)
            }
        }
    }), x.support.opacity || (x.cssHooks.opacity = {
        get: function(e, t) {
            return It.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                r = e.currentStyle,
                i = x.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                o = r && r.filter || n.filter || "";
            n.zoom = 1, (t >= 1 || "" === t) && "" === x.trim(o.replace($t, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || r && !r.filter) || (n.filter = $t.test(o) ? o.replace($t, i) : o + " " + i)
        }
    }), x(function() {
        x.support.reliableMarginRight || (x.cssHooks.marginRight = {
            get: function(e, n) {
                return n ? x.swap(e, {
                    display: "inline-block"
                }, Wt, [e, "marginRight"]) : t
            }
        }), !x.support.pixelPosition && x.fn.position && x.each(["top", "left"], function(e, n) {
            x.cssHooks[n] = {
                get: function(e, r) {
                    return r ? (r = Wt(e, n), Yt.test(r) ? x(e).position()[n] + "px" : r) : t
                }
            }
        })
    }), x.expr && x.expr.filters && (x.expr.filters.hidden = function(e) {
        return 0 >= e.offsetWidth && 0 >= e.offsetHeight || !x.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || x.css(e, "display"))
    }, x.expr.filters.visible = function(e) {
        return !x.expr.filters.hidden(e)
    }), x.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        x.cssHooks[e + t] = {
            expand: function(n) {
                var r = 0,
                    i = {},
                    o = "string" == typeof n ? n.split(" ") : [n];
                for (; 4 > r; r++) i[e + Zt[r] + t] = o[r] || o[r - 2] || o[0];
                return i
            }
        }, Ut.test(e) || (x.cssHooks[e + t].set = on)
    });
    var cn = /%20/g,
        pn = /\[\]$/,
        fn = /\r?\n/g,
        dn = /^(?:submit|button|image|reset|file)$/i,
        hn = /^(?:input|select|textarea|keygen)/i;
    x.fn.extend({
        serialize: function() {
            return x.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = x.prop(this, "elements");
                return e ? x.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !x(this).is(":disabled") && hn.test(this.nodeName) && !dn.test(e) && (this.checked || !Ct.test(e))
            }).map(function(e, t) {
                var n = x(this).val();
                return null == n ? null : x.isArray(n) ? x.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(fn, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(fn, "\r\n")
                }
            }).get()
        }
    }), x.param = function(e, n) {
        var r, i = [],
            o = function(e, t) {
                t = x.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        if (n === t && (n = x.ajaxSettings && x.ajaxSettings.traditional), x.isArray(e) || e.jquery && !x.isPlainObject(e)) x.each(e, function() {
            o(this.name, this.value)
        });
        else
            for (r in e) gn(r, e[r], n, o);
        return i.join("&").replace(cn, "+")
    };

    function gn(e, t, n, r) {
        var i;
        if (x.isArray(t)) x.each(t, function(t, i) {
            n || pn.test(e) ? r(e, i) : gn(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
        });
        else if (n || "object" !== x.type(t)) r(e, t);
        else
            for (i in t) gn(e + "[" + i + "]", t[i], n, r)
    }
    x.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        x.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }), x.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        },
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    });
    var mn, yn, vn = x.now(),
        bn = /\?/,
        xn = /#.*$/,
        wn = /([?&])_=[^&]*/,
        Tn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        Cn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Nn = /^(?:GET|HEAD)$/,
        kn = /^\/\//,
        En = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        Sn = x.fn.load,
        An = {},
        jn = {},
        Dn = "*/".concat("*");
    try {
        yn = o.href
    } catch (Ln) {
        yn = a.createElement("a"), yn.href = "", yn = yn.href
    }
    mn = En.exec(yn.toLowerCase()) || [];

    function Hn(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var r, i = 0,
                o = t.toLowerCase().match(T) || [];
            if (x.isFunction(n))
                while (r = o[i++]) "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
        }
    }

    function qn(e, n, r, i) {
        var o = {},
            a = e === jn;

        function s(l) {
            var u;
            return o[l] = !0, x.each(e[l] || [], function(e, l) {
                var c = l(n, r, i);
                return "string" != typeof c || a || o[c] ? a ? !(u = c) : t : (n.dataTypes.unshift(c), s(c), !1)
            }), u
        }
        return s(n.dataTypes[0]) || !o["*"] && s("*")
    }

    function _n(e, n) {
        var r, i, o = x.ajaxSettings.flatOptions || {};
        for (i in n) n[i] !== t && ((o[i] ? e : r || (r = {}))[i] = n[i]);
        return r && x.extend(!0, e, r), e
    }
    x.fn.load = function(e, n, r) {
        if ("string" != typeof e && Sn) return Sn.apply(this, arguments);
        var i, o, a, s = this,
            l = e.indexOf(" ");
        return l >= 0 && (i = e.slice(l, e.length), e = e.slice(0, l)), x.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (a = "POST"), s.length > 0 && x.ajax({
            url: e,
            type: a,
            dataType: "html",
            data: n
        }).done(function(e) {
            o = arguments, s.html(i ? x("<div>").append(x.parseHTML(e)).find(i) : e)
        }).complete(r && function(e, t) {
            s.each(r, o || [e.responseText, t, e])
        }), this
    }, x.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        x.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), x.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: yn,
            type: "GET",
            isLocal: Cn.test(mn[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Dn,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": x.parseJSON,
                "text xml": x.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? _n(_n(e, x.ajaxSettings), t) : _n(x.ajaxSettings, e)
        },
        ajaxPrefilter: Hn(An),
        ajaxTransport: Hn(jn),
        ajax: function(e, n) {
            "object" == typeof e && (n = e, e = t), n = n || {};
            var r, i, o, a, s, l, u, c, p = x.ajaxSetup({}, n),
                f = p.context || p,
                d = p.context && (f.nodeType || f.jquery) ? x(f) : x.event,
                h = x.Deferred(),
                g = x.Callbacks("once memory"),
                m = p.statusCode || {},
                y = {},
                v = {},
                b = 0,
                w = "canceled",
                C = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === b) {
                            if (!c) {
                                c = {};
                                while (t = Tn.exec(a)) c[t[1].toLowerCase()] = t[2]
                            }
                            t = c[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return 2 === b ? a : null
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return b || (e = v[n] = v[n] || e, y[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return b || (p.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e)
                            if (2 > b)
                                for (t in e) m[t] = [m[t], e[t]];
                            else C.always(e[C.status]);
                        return this
                    },
                    abort: function(e) {
                        var t = e || w;
                        return u && u.abort(t), k(0, t), this
                    }
                };
            if (h.promise(C).complete = g.add, C.success = C.done, C.error = C.fail, p.url = ((e || p.url || yn) + "").replace(xn, "").replace(kn, mn[1] + "//"), p.type = n.method || n.type || p.method || p.type, p.dataTypes = x.trim(p.dataType || "*").toLowerCase().match(T) || [""], null == p.crossDomain && (r = En.exec(p.url.toLowerCase()), p.crossDomain = !(!r || r[1] === mn[1] && r[2] === mn[2] && (r[3] || ("http:" === r[1] ? "80" : "443")) === (mn[3] || ("http:" === mn[1] ? "80" : "443")))), p.data && p.processData && "string" != typeof p.data && (p.data = x.param(p.data, p.traditional)), qn(An, p, n, C), 2 === b) return C;
            l = p.global, l && 0 === x.active++ && x.event.trigger("ajaxStart"), p.type = p.type.toUpperCase(), p.hasContent = !Nn.test(p.type), o = p.url, p.hasContent || (p.data && (o = p.url += (bn.test(o) ? "&" : "?") + p.data, delete p.data), p.cache === !1 && (p.url = wn.test(o) ? o.replace(wn, "$1_=" + vn++) : o + (bn.test(o) ? "&" : "?") + "_=" + vn++)), p.ifModified && (x.lastModified[o] && C.setRequestHeader("If-Modified-Since", x.lastModified[o]), x.etag[o] && C.setRequestHeader("If-None-Match", x.etag[o])), (p.data && p.hasContent && p.contentType !== !1 || n.contentType) && C.setRequestHeader("Content-Type", p.contentType), C.setRequestHeader("Accept", p.dataTypes[0] && p.accepts[p.dataTypes[0]] ? p.accepts[p.dataTypes[0]] + ("*" !== p.dataTypes[0] ? ", " + Dn + "; q=0.01" : "") : p.accepts["*"]);
            for (i in p.headers) C.setRequestHeader(i, p.headers[i]);
            if (p.beforeSend && (p.beforeSend.call(f, C, p) === !1 || 2 === b)) return C.abort();
            w = "abort";
            for (i in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) C[i](p[i]);
            if (u = qn(jn, p, n, C)) {
                C.readyState = 1, l && d.trigger("ajaxSend", [C, p]), p.async && p.timeout > 0 && (s = setTimeout(function() {
                    C.abort("timeout")
                }, p.timeout));
                try {
                    b = 1, u.send(y, k)
                } catch (N) {
                    if (!(2 > b)) throw N;
                    k(-1, N)
                }
            } else k(-1, "No Transport");

            function k(e, n, r, i) {
                var c, y, v, w, T, N = n;
                2 !== b && (b = 2, s && clearTimeout(s), u = t, a = i || "", C.readyState = e > 0 ? 4 : 0, c = e >= 200 && 300 > e || 304 === e, r && (w = Mn(p, C, r)), w = On(p, w, C, c), c ? (p.ifModified && (T = C.getResponseHeader("Last-Modified"), T && (x.lastModified[o] = T), T = C.getResponseHeader("etag"), T && (x.etag[o] = T)), 204 === e || "HEAD" === p.type ? N = "nocontent" : 304 === e ? N = "notmodified" : (N = w.state, y = w.data, v = w.error, c = !v)) : (v = N, (e || !N) && (N = "error", 0 > e && (e = 0))), C.status = e, C.statusText = (n || N) + "", c ? h.resolveWith(f, [y, N, C]) : h.rejectWith(f, [C, N, v]), C.statusCode(m), m = t, l && d.trigger(c ? "ajaxSuccess" : "ajaxError", [C, p, c ? y : v]), g.fireWith(f, [C, N]), l && (d.trigger("ajaxComplete", [C, p]), --x.active || x.event.trigger("ajaxStop")))
            }
            return C
        },
        getJSON: function(e, t, n) {
            return x.get(e, t, n, "json")
        },
        getScript: function(e, n) {
            return x.get(e, t, n, "script")
        }
    }), x.each(["get", "post"], function(e, n) {
        x[n] = function(e, r, i, o) {
            return x.isFunction(r) && (o = o || i, i = r, r = t), x.ajax({
                url: e,
                type: n,
                dataType: o,
                data: r,
                success: i
            })
        }
    });

    function Mn(e, n, r) {
        var i, o, a, s, l = e.contents,
            u = e.dataTypes;
        while ("*" === u[0]) u.shift(), o === t && (o = e.mimeType || n.getResponseHeader("Content-Type"));
        if (o)
            for (s in l)
                if (l[s] && l[s].test(o)) {
                    u.unshift(s);
                    break
                }
        if (u[0] in r) a = u[0];
        else {
            for (s in r) {
                if (!u[0] || e.converters[s + " " + u[0]]) {
                    a = s;
                    break
                }
                i || (i = s)
            }
            a = a || i
        }
        return a ? (a !== u[0] && u.unshift(a), r[a]) : t
    }

    function On(e, t, n, r) {
        var i, o, a, s, l, u = {},
            c = e.dataTypes.slice();
        if (c[1])
            for (a in e.converters) u[a.toLowerCase()] = e.converters[a];
        o = c.shift();
        while (o)
            if (e.responseFields[o] && (n[e.responseFields[o]] = t), !l && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = o, o = c.shift())
                if ("*" === o) o = l;
                else if ("*" !== l && l !== o) {
            if (a = u[l + " " + o] || u["* " + o], !a)
                for (i in u)
                    if (s = i.split(" "), s[1] === o && (a = u[l + " " + s[0]] || u["* " + s[0]])) {
                        a === !0 ? a = u[i] : u[i] !== !0 && (o = s[0], c.unshift(s[1]));
                        break
                    }
            if (a !== !0)
                if (a && e["throws"]) t = a(t);
                else try {
                    t = a(t)
                } catch (p) {
                    return {
                        state: "parsererror",
                        error: a ? p : "No conversion from " + l + " to " + o
                    }
                }
        }
        return {
            state: "success",
            data: t
        }
    }
    x.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return x.globalEval(e), e
            }
        }
    }), x.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), x.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, r = a.head || x("head")[0] || a.documentElement;
            return {
                send: function(t, i) {
                    n = a.createElement("script"), n.async = !0, e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, t) {
                        (t || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, n.parentNode && n.parentNode.removeChild(n), n = null, t || i(200, "success"))
                    }, r.insertBefore(n, r.firstChild)
                },
                abort: function() {
                    n && n.onload(t, !0)
                }
            }
        }
    });
    var Fn = [],
        Bn = /(=)\?(?=&|$)|\?\?/;
    x.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Fn.pop() || x.expando + "_" + vn++;
            return this[e] = !0, e
        }
    }), x.ajaxPrefilter("json jsonp", function(n, r, i) {
        var o, a, s, l = n.jsonp !== !1 && (Bn.test(n.url) ? "url" : "string" == typeof n.data && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Bn.test(n.data) && "data");
        return l || "jsonp" === n.dataTypes[0] ? (o = n.jsonpCallback = x.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, l ? n[l] = n[l].replace(Bn, "$1" + o) : n.jsonp !== !1 && (n.url += (bn.test(n.url) ? "&" : "?") + n.jsonp + "=" + o), n.converters["script json"] = function() {
            return s || x.error(o + " was not called"), s[0]
        }, n.dataTypes[0] = "json", a = e[o], e[o] = function() {
            s = arguments
        }, i.always(function() {
            e[o] = a, n[o] && (n.jsonpCallback = r.jsonpCallback, Fn.push(o)), s && x.isFunction(a) && a(s[0]), s = a = t
        }), "script") : t
    });
    var Pn, Rn, Wn = 0,
        $n = e.ActiveXObject && function() {
            var e;
            for (e in Pn) Pn[e](t, !0)
        };

    function In() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function zn() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }
    x.ajaxSettings.xhr = e.ActiveXObject ? function() {
        return !this.isLocal && In() || zn()
    } : In, Rn = x.ajaxSettings.xhr(), x.support.cors = !!Rn && "withCredentials" in Rn, Rn = x.support.ajax = !!Rn, Rn && x.ajaxTransport(function(n) {
        if (!n.crossDomain || x.support.cors) {
            var r;
            return {
                send: function(i, o) {
                    var a, s, l = n.xhr();
                    if (n.username ? l.open(n.type, n.url, n.async, n.username, n.password) : l.open(n.type, n.url, n.async), n.xhrFields)
                        for (s in n.xhrFields) l[s] = n.xhrFields[s];
                    n.mimeType && l.overrideMimeType && l.overrideMimeType(n.mimeType), n.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (s in i) l.setRequestHeader(s, i[s])
                    } catch (u) {}
                    l.send(n.hasContent && n.data || null), r = function(e, i) {
                        var s, u, c, p;
                        try {
                            if (r && (i || 4 === l.readyState))
                                if (r = t, a && (l.onreadystatechange = x.noop, $n && delete Pn[a]), i) 4 !== l.readyState && l.abort();
                                else {
                                    p = {}, s = l.status, u = l.getAllResponseHeaders(), "string" == typeof l.responseText && (p.text = l.responseText);
                                    try {
                                        c = l.statusText
                                    } catch (f) {
                                        c = ""
                                    }
                                    s || !n.isLocal || n.crossDomain ? 1223 === s && (s = 204) : s = p.text ? 200 : 404
                                }
                        } catch (d) {
                            i || o(-1, d)
                        }
                        p && o(s, c, p, u)
                    }, n.async ? 4 === l.readyState ? setTimeout(r) : (a = ++Wn, $n && (Pn || (Pn = {}, x(e).unload($n)), Pn[a] = r), l.onreadystatechange = r) : r()
                },
                abort: function() {
                    r && r(t, !0)
                }
            }
        }
    });
    var Xn, Un, Vn = /^(?:toggle|show|hide)$/,
        Yn = RegExp("^(?:([+-])=|)(" + w + ")([a-z%]*)$", "i"),
        Jn = /queueHooks$/,
        Gn = [nr],
        Qn = {
            "*": [function(e, t) {
                var n = this.createTween(e, t),
                    r = n.cur(),
                    i = Yn.exec(t),
                    o = i && i[3] || (x.cssNumber[e] ? "" : "px"),
                    a = (x.cssNumber[e] || "px" !== o && +r) && Yn.exec(x.css(n.elem, e)),
                    s = 1,
                    l = 20;
                if (a && a[3] !== o) {
                    o = o || a[3], i = i || [], a = +r || 1;
                    do s = s || ".5", a /= s, x.style(n.elem, e, a + o); while (s !== (s = n.cur() / r) && 1 !== s && --l)
                }
                return i && (a = n.start = +a || +r || 0, n.unit = o, n.end = i[1] ? a + (i[1] + 1) * i[2] : +i[2]), n
            }]
        };

    function Kn() {
        return setTimeout(function() {
            Xn = t
        }), Xn = x.now()
    }

    function Zn(e, t, n) {
        var r, i = (Qn[t] || []).concat(Qn["*"]),
            o = 0,
            a = i.length;
        for (; a > o; o++)
            if (r = i[o].call(n, t, e)) return r
    }

    function er(e, t, n) {
        var r, i, o = 0,
            a = Gn.length,
            s = x.Deferred().always(function() {
                delete l.elem
            }),
            l = function() {
                if (i) return !1;
                var t = Xn || Kn(),
                    n = Math.max(0, u.startTime + u.duration - t),
                    r = n / u.duration || 0,
                    o = 1 - r,
                    a = 0,
                    l = u.tweens.length;
                for (; l > a; a++) u.tweens[a].run(o);
                return s.notifyWith(e, [u, o, n]), 1 > o && l ? n : (s.resolveWith(e, [u]), !1)
            },
            u = s.promise({
                elem: e,
                props: x.extend({}, t),
                opts: x.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: Xn || Kn(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var r = x.Tween(e, u.opts, t, n, u.opts.specialEasing[t] || u.opts.easing);
                    return u.tweens.push(r), r
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? u.tweens.length : 0;
                    if (i) return this;
                    for (i = !0; r > n; n++) u.tweens[n].run(1);
                    return t ? s.resolveWith(e, [u, t]) : s.rejectWith(e, [u, t]), this
                }
            }),
            c = u.props;
        for (tr(c, u.opts.specialEasing); a > o; o++)
            if (r = Gn[o].call(u, e, c, u.opts)) return r;
        return x.map(c, Zn, u), x.isFunction(u.opts.start) && u.opts.start.call(e, u), x.fx.timer(x.extend(l, {
            elem: e,
            anim: u,
            queue: u.opts.queue
        })), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
    }

    function tr(e, t) {
        var n, r, i, o, a;
        for (n in e)
            if (r = x.camelCase(n), i = t[r], o = e[n], x.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), a = x.cssHooks[r], a && "expand" in a) {
                o = a.expand(o), delete e[r];
                for (n in o) n in e || (e[n] = o[n], t[n] = i)
            } else t[r] = i
    }
    x.Animation = x.extend(er, {
        tweener: function(e, t) {
            x.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            var n, r = 0,
                i = e.length;
            for (; i > r; r++) n = e[r], Qn[n] = Qn[n] || [], Qn[n].unshift(t)
        },
        prefilter: function(e, t) {
            t ? Gn.unshift(e) : Gn.push(e)
        }
    });

    function nr(e, t, n) {
        var r, i, o, a, s, l, u = this,
            c = {},
            p = e.style,
            f = e.nodeType && nn(e),
            d = x._data(e, "fxshow");
        n.queue || (s = x._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, l = s.empty.fire, s.empty.fire = function() {
            s.unqueued || l()
        }), s.unqueued++, u.always(function() {
            u.always(function() {
                s.unqueued--, x.queue(e, "fx").length || s.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], "inline" === x.css(e, "display") && "none" === x.css(e, "float") && (x.support.inlineBlockNeedsLayout && "inline" !== ln(e.nodeName) ? p.zoom = 1 : p.display = "inline-block")), n.overflow && (p.overflow = "hidden", x.support.shrinkWrapBlocks || u.always(function() {
            p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
        }));
        for (r in t)
            if (i = t[r], Vn.exec(i)) {
                if (delete t[r], o = o || "toggle" === i, i === (f ? "hide" : "show")) continue;
                c[r] = d && d[r] || x.style(e, r)
            }
        if (!x.isEmptyObject(c)) {
            d ? "hidden" in d && (f = d.hidden) : d = x._data(e, "fxshow", {}), o && (d.hidden = !f), f ? x(e).show() : u.done(function() {
                x(e).hide()
            }), u.done(function() {
                var t;
                x._removeData(e, "fxshow");
                for (t in c) x.style(e, t, c[t])
            });
            for (r in c) a = Zn(f ? d[r] : 0, r, u), r in d || (d[r] = a.start, f && (a.end = a.start, a.start = "width" === r || "height" === r ? 1 : 0))
        }
    }

    function rr(e, t, n, r, i) {
        return new rr.prototype.init(e, t, n, r, i)
    }
    x.Tween = rr, rr.prototype = {
        constructor: rr,
        init: function(e, t, n, r, i, o) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (x.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = rr.propHooks[this.prop];
            return e && e.get ? e.get(this) : rr.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = rr.propHooks[this.prop];
            return this.pos = t = this.options.duration ? x.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : rr.propHooks._default.set(this), this
        }
    }, rr.prototype.init.prototype = rr.prototype, rr.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = x.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
            },
            set: function(e) {
                x.fx.step[e.prop] ? x.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[x.cssProps[e.prop]] || x.cssHooks[e.prop]) ? x.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, rr.propHooks.scrollTop = rr.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, x.each(["toggle", "show", "hide"], function(e, t) {
        var n = x.fn[t];
        x.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ir(t, !0), e, r, i)
        }
    }), x.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(nn).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = x.isEmptyObject(e),
                o = x.speed(t, n, r),
                a = function() {
                    var t = er(this, x.extend({}, e), o);
                    (i || x._data(this, "finish")) && t.stop(!0)
                };
            return a.finish = a, i || o.queue === !1 ? this.each(a) : this.queue(o.queue, a)
        },
        stop: function(e, n, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(r)
            };
            return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    n = null != e && e + "queueHooks",
                    o = x.timers,
                    a = x._data(this);
                if (n) a[n] && a[n].stop && i(a[n]);
                else
                    for (n in a) a[n] && a[n].stop && Jn.test(n) && i(a[n]);
                for (n = o.length; n--;) o[n].elem !== this || null != e && o[n].queue !== e || (o[n].anim.stop(r), t = !1, o.splice(n, 1));
                (t || !r) && x.dequeue(this, e)
            })
        },
        finish: function(e) {
            return e !== !1 && (e = e || "fx"), this.each(function() {
                var t, n = x._data(this),
                    r = n[e + "queue"],
                    i = n[e + "queueHooks"],
                    o = x.timers,
                    a = r ? r.length : 0;
                for (n.finish = !0, x.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = o.length; t--;) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
                for (t = 0; a > t; t++) r[t] && r[t].finish && r[t].finish.call(this);
                delete n.finish
            })
        }
    });

    function ir(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = Zt[i], r["margin" + n] = r["padding" + n] = e;
        return t && (r.opacity = r.width = e), r
    }
    x.each({
        slideDown: ir("show"),
        slideUp: ir("hide"),
        slideToggle: ir("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        x.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }), x.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? x.extend({}, e) : {
            complete: n || !n && t || x.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !x.isFunction(t) && t
        };
        return r.duration = x.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in x.fx.speeds ? x.fx.speeds[r.duration] : x.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
            x.isFunction(r.old) && r.old.call(this), r.queue && x.dequeue(this, r.queue)
        }, r
    }, x.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        }
    }, x.timers = [], x.fx = rr.prototype.init, x.fx.tick = function() {
        var e, n = x.timers,
            r = 0;
        for (Xn = x.now(); n.length > r; r++) e = n[r], e() || n[r] !== e || n.splice(r--, 1);
        n.length || x.fx.stop(), Xn = t
    }, x.fx.timer = function(e) {
        e() && x.timers.push(e) && x.fx.start()
    }, x.fx.interval = 13, x.fx.start = function() {
        Un || (Un = setInterval(x.fx.tick, x.fx.interval))
    }, x.fx.stop = function() {
        clearInterval(Un), Un = null
    }, x.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, x.fx.step = {}, x.expr && x.expr.filters && (x.expr.filters.animated = function(e) {
        return x.grep(x.timers, function(t) {
            return e === t.elem
        }).length
    }), x.fn.offset = function(e) {
        if (arguments.length) return e === t ? this : this.each(function(t) {
            x.offset.setOffset(this, e, t)
        });
        var n, r, o = {
                top: 0,
                left: 0
            },
            a = this[0],
            s = a && a.ownerDocument;
        if (s) return n = s.documentElement, x.contains(n, a) ? (typeof a.getBoundingClientRect !== i && (o = a.getBoundingClientRect()), r = or(s), {
            top: o.top + (r.pageYOffset || n.scrollTop) - (n.clientTop || 0),
            left: o.left + (r.pageXOffset || n.scrollLeft) - (n.clientLeft || 0)
        }) : o
    }, x.offset = {
        setOffset: function(e, t, n) {
            var r = x.css(e, "position");
            "static" === r && (e.style.position = "relative");
            var i = x(e),
                o = i.offset(),
                a = x.css(e, "top"),
                s = x.css(e, "left"),
                l = ("absolute" === r || "fixed" === r) && x.inArray("auto", [a, s]) > -1,
                u = {},
                c = {},
                p, f;
            l ? (c = i.position(), p = c.top, f = c.left) : (p = parseFloat(a) || 0, f = parseFloat(s) || 0), x.isFunction(t) && (t = t.call(e, n, o)), null != t.top && (u.top = t.top - o.top + p), null != t.left && (u.left = t.left - o.left + f), "using" in t ? t.using.call(e, u) : i.css(u)
        }
    }, x.fn.extend({
        position: function() {
            if (this[0]) {
                var e, t, n = {
                        top: 0,
                        left: 0
                    },
                    r = this[0];
                return "fixed" === x.css(r, "position") ? t = r.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), x.nodeName(e[0], "html") || (n = e.offset()), n.top += x.css(e[0], "borderTopWidth", !0), n.left += x.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - n.top - x.css(r, "marginTop", !0),
                    left: t.left - n.left - x.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || s;
                while (e && !x.nodeName(e, "html") && "static" === x.css(e, "position")) e = e.offsetParent;
                return e || s
            })
        }
    }), x.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, n) {
        var r = /Y/.test(n);
        x.fn[e] = function(i) {
            return x.access(this, function(e, i, o) {
                var a = or(e);
                return o === t ? a ? n in a ? a[n] : a.document.documentElement[i] : e[i] : (a ? a.scrollTo(r ? x(a).scrollLeft() : o, r ? o : x(a).scrollTop()) : e[i] = o, t)
            }, e, i, arguments.length, null)
        }
    });

    function or(e) {
        return x.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
    }
    x.each({
        Height: "height",
        Width: "width"
    }, function(e, n) {
        x.each({
            padding: "inner" + e,
            content: n,
            "": "outer" + e
        }, function(r, i) {
            x.fn[i] = function(i, o) {
                var a = arguments.length && (r || "boolean" != typeof i),
                    s = r || (i === !0 || o === !0 ? "margin" : "border");
                return x.access(this, function(n, r, i) {
                    var o;
                    return x.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (o = n.documentElement, Math.max(n.body["scroll" + e], o["scroll" + e], n.body["offset" + e], o["offset" + e], o["client" + e])) : i === t ? x.css(n, r, s) : x.style(n, r, i, s)
                }, n, a ? i : t, a, null)
            }
        })
    }), x.fn.size = function() {
        return this.length
    }, x.fn.andSelf = x.fn.addBack, "object" == typeof module && module && "object" == typeof module.exports ? module.exports = x : (e.jQuery = e.$ = x, "function" == typeof define && define.amd && define("jquery", [], function() {
        return x
    }))
})(window);

;
window.Modernizr = function(a, b, c) {
        function u(a) {
            j.cssText = a
        }

        function v(a, b) {
            return u(prefixes.join(a + ";") + (b || ""))
        }

        function w(a, b) {
            return typeof a === b
        }

        function x(a, b) {
            return !!~("" + a).indexOf(b)
        }

        function y(a, b, d) {
            for (var e in a) {
                var f = b[a[e]];
                if (f !== c) return d === !1 ? a[e] : w(f, "function") ? f.bind(d || b) : f
            }
            return !1
        }
        var d = "2.8.0",
            e = {},
            f = !0,
            g = b.documentElement,
            h = "modernizr",
            i = b.createElement(h),
            j = i.style,
            k, l = {}.toString,
            m = {},
            n = {},
            o = {},
            p = [],
            q = p.slice,
            r, s = {}.hasOwnProperty,
            t;
        !w(s, "undefined") && !w(s.call, "undefined") ? t = function(a, b) {
            return s.call(a, b)
        } : t = function(a, b) {
            return b in a && w(a.constructor.prototype[b], "undefined")
        }, Function.prototype.bind || (Function.prototype.bind = function(b) {
            var c = this;
            if (typeof c != "function") throw new TypeError;
            var d = q.call(arguments, 1),
                e = function() {
                    if (this instanceof e) {
                        var a = function() {};
                        a.prototype = c.prototype;
                        var f = new a,
                            g = c.apply(f, d.concat(q.call(arguments)));
                        return Object(g) === g ? g : f
                    }
                    return c.apply(b, d.concat(q.call(arguments)))
                };
            return e
        });
        for (var z in m) t(m, z) && (r = z.toLowerCase(), e[r] = m[z](), p.push((e[r] ? "" : "no-") + r));
        return e.addTest = function(a, b) {
            if (typeof a == "object")
                for (var d in a) t(a, d) && e.addTest(d, a[d]);
            else {
                a = a.toLowerCase();
                if (e[a] !== c) return e;
                b = typeof b == "function" ? b() : b, typeof f != "undefined" && f && (g.className += " " + (b ? "" : "no-") + a), e[a] = b
            }
            return e
        }, u(""), i = k = null, e._version = d, g.className = g.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (f ? " js " + p.join(" ") : ""), e
    }(this, this.document),
    function(a, b, c) {
        function d(a) {
            return "[object Function]" == o.call(a)
        }

        function e(a) {
            return "string" == typeof a
        }

        function f() {}

        function g(a) {
            return !a || "loaded" == a || "complete" == a || "uninitialized" == a
        }

        function h() {
            var a = p.shift();
            q = 1, a ? a.t ? m(function() {
                ("c" == a.t ? B.injectCss : B.injectJs)(a.s, 0, a.a, a.x, a.e, 1)
            }, 0) : (a(), h()) : q = 0
        }

        function i(a, c, d, e, f, i, j) {
            function k(b) {
                if (!o && g(l.readyState) && (u.r = o = 1, !q && h(), l.onload = l.onreadystatechange = null, b)) {
                    "img" != a && m(function() {
                        t.removeChild(l)
                    }, 50);
                    for (var d in y[c]) y[c].hasOwnProperty(d) && y[c][d].onload()
                }
            }
            var j = j || B.errorTimeout,
                l = b.createElement(a),
                o = 0,
                r = 0,
                u = {
                    t: d,
                    s: c,
                    e: f,
                    a: i,
                    x: j
                };
            1 === y[c] && (r = 1, y[c] = []), "object" == a ? l.data = c : (l.src = c, l.type = a), l.width = l.height = "0", l.onerror = l.onload = l.onreadystatechange = function() {
                k.call(this, r)
            }, p.splice(e, 0, u), "img" != a && (r || 2 === y[c] ? (t.insertBefore(l, s ? null : n), m(k, j)) : y[c].push(l))
        }

        function j(a, b, c, d, f) {
            return q = 0, b = b || "j", e(a) ? i("c" == b ? v : u, a, b, this.i++, c, d, f) : (p.splice(this.i++, 0, a), 1 == p.length && h()), this
        }

        function k() {
            var a = B;
            return a.loader = {
                load: j,
                i: 0
            }, a
        }
        var l = b.documentElement,
            m = a.setTimeout,
            n = b.getElementsByTagName("script")[0],
            o = {}.toString,
            p = [],
            q = 0,
            r = "MozAppearance" in l.style,
            s = r && !!b.createRange().compareNode,
            t = s ? l : n.parentNode,
            l = a.opera && "[object Opera]" == o.call(a.opera),
            l = !!b.attachEvent && !l,
            u = r ? "object" : l ? "script" : "img",
            v = l ? "script" : u,
            w = Array.isArray || function(a) {
                return "[object Array]" == o.call(a)
            },
            x = [],
            y = {},
            z = {
                timeout: function(a, b) {
                    return b.length && (a.timeout = b[0]), a
                }
            },
            A, B;
        B = function(a) {
            function b(a) {
                var a = a.split("!"),
                    b = x.length,
                    c = a.pop(),
                    d = a.length,
                    c = {
                        url: c,
                        origUrl: c,
                        prefixes: a
                    },
                    e, f, g;
                for (f = 0; f < d; f++) g = a[f].split("="), (e = z[g.shift()]) && (c = e(c, g));
                for (f = 0; f < b; f++) c = x[f](c);
                return c
            }

            function g(a, e, f, g, h) {
                var i = b(a),
                    j = i.autoCallback;
                i.url.split(".").pop().split("?").shift(), i.bypass || (e && (e = d(e) ? e : e[a] || e[g] || e[a.split("/").pop().split("?")[0]]), i.instead ? i.instead(a, e, f, g, h) : (y[i.url] ? i.noexec = !0 : y[i.url] = 1, f.load(i.url, i.forceCSS || !i.forceJS && "css" == i.url.split(".").pop().split("?").shift() ? "c" : c, i.noexec, i.attrs, i.timeout), (d(e) || d(j)) && f.load(function() {
                    k(), e && e(i.origUrl, h, g), j && j(i.origUrl, h, g), y[i.url] = 2
                })))
            }

            function h(a, b) {
                function c(a, c) {
                    if (a) {
                        if (e(a)) c || (j = function() {
                            var a = [].slice.call(arguments);
                            k.apply(this, a), l()
                        }), g(a, j, b, 0, h);
                        else if (Object(a) === a)
                            for (n in m = function() {
                                    var b = 0,
                                        c;
                                    for (c in a) a.hasOwnProperty(c) && b++;
                                    return b
                                }(), a) a.hasOwnProperty(n) && (!c && !--m && (d(j) ? j = function() {
                                var a = [].slice.call(arguments);
                                k.apply(this, a), l()
                            } : j[n] = function(a) {
                                return function() {
                                    var b = [].slice.call(arguments);
                                    a && a.apply(this, b), l()
                                }
                            }(k[n])), g(a[n], j, b, n, h))
                    } else !c && l()
                }
                var h = !!a.test,
                    i = a.load || a.both,
                    j = a.callback || f,
                    k = j,
                    l = a.complete || f,
                    m, n;
                c(h ? a.yep : a.nope, !!i), i && c(i)
            }
            var i, j, l = this.yepnope.loader;
            if (e(a)) g(a, 0, l, 0);
            else if (w(a))
                for (i = 0; i < a.length; i++) j = a[i], e(j) ? g(j, 0, l, 0) : w(j) ? B(j) : Object(j) === j && h(j, l);
            else Object(a) === a && h(a, l)
        }, B.addPrefix = function(a, b) {
            z[a] = b
        }, B.addFilter = function(a) {
            x.push(a)
        }, B.errorTimeout = 1e4, null == b.readyState && b.addEventListener && (b.readyState = "loading", b.addEventListener("DOMContentLoaded", A = function() {
            b.removeEventListener("DOMContentLoaded", A, 0), b.readyState = "complete"
        }, 0)), a.yepnope = k(), a.yepnope.executeStack = h, a.yepnope.injectJs = function(a, c, d, e, i, j) {
            var k = b.createElement("script"),
                l, o, e = e || B.errorTimeout;
            k.src = a;
            for (o in d) k.setAttribute(o, d[o]);
            c = j ? h : c || f, k.onreadystatechange = k.onload = function() {
                !l && g(k.readyState) && (l = 1, c(), k.onload = k.onreadystatechange = null)
            }, m(function() {
                l || (l = 1, c(1))
            }, e), i ? k.onload() : n.parentNode.insertBefore(k, n)
        }, a.yepnope.injectCss = function(a, c, d, e, g, i) {
            var e = b.createElement("link"),
                j, c = i ? h : c || f;
            e.href = a, e.rel = "stylesheet", e.type = "text/css";
            for (j in d) e.setAttribute(j, d[j]);
            g || (n.parentNode.insertBefore(e, n), m(c, 0))
        }
    }(this, document), Modernizr.load = function() {
        yepnope.apply(window, [].slice.call(arguments, 0))
    };
if (typeof JSON !== 'object') {
    JSON = {};
}
(function() {
    'use strict';

    function f(n) {
        return n < 10 ? '0' + n : n;
    }
    if (typeof Date.prototype.toJSON !== 'function') {
        Date.prototype.toJSON = function() {
            return isFinite(this.valueOf()) ? this.getUTCFullYear() + '-' +
                f(this.getUTCMonth() + 1) + '-' +
                f(this.getUTCDate()) + 'T' +
                f(this.getUTCHours()) + ':' +
                f(this.getUTCMinutes()) + ':' +
                f(this.getUTCSeconds()) + 'Z' : null;
        };
        String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
            return this.valueOf();
        };
    }
    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        gap, indent, meta = {
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"': '\\"',
            '\\': '\\\\'
        },
        rep;

    function quote(string) {
        escapable.lastIndex = 0;
        return escapable.test(string) ? '"' + string.replace(escapable, function(a) {
            var c = meta[a];
            return typeof c === 'string' ? c : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
        }) + '"' : '"' + string + '"';
    }

    function str(key, holder) {
        var i, k, v, length, mind = gap,
            partial, value = holder[key];
        if (value && typeof value === 'object' && typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }
        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }
        switch (typeof value) {
            case 'string':
                return quote(value);
            case 'number':
                return isFinite(value) ? String(value) : 'null';
            case 'boolean':
            case 'null':
                return String(value);
            case 'object':
                if (!value) {
                    return 'null';
                }
                gap += indent;
                partial = [];
                if (Object.prototype.toString.apply(value) === '[object Array]') {
                    length = value.length;
                    for (i = 0; i < length; i += 1) {
                        partial[i] = str(i, value) || 'null';
                    }
                    v = partial.length === 0 ? '[]' : gap ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']' : '[' + partial.join(',') + ']';
                    gap = mind;
                    return v;
                }
                if (rep && typeof rep === 'object') {
                    length = rep.length;
                    for (i = 0; i < length; i += 1) {
                        if (typeof rep[i] === 'string') {
                            k = rep[i];
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                } else {
                    for (k in value) {
                        if (Object.prototype.hasOwnProperty.call(value, k)) {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                }
                v = partial.length === 0 ? '{}' : gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}' : '{' + partial.join(',') + '}';
                gap = mind;
                return v;
        }
    }
    if (typeof JSON.stringify !== 'function') {
        JSON.stringify = function(value, replacer, space) {
            var i;
            gap = '';
            indent = '';
            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }
            } else if (typeof space === 'string') {
                indent = space;
            }
            rep = replacer;
            if (replacer && typeof replacer !== 'function' && (typeof replacer !== 'object' || typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }
            return str('', {
                '': value
            });
        };
    }
    if (typeof JSON.parse !== 'function') {
        JSON.parse = function(text, reviver) {
            var j;

            function walk(holder, key) {
                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.prototype.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }
            text = String(text);
            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function(a) {
                    return '\\u' +
                        ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }
            if (/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                j = eval('(' + text + ')');
                return typeof reviver === 'function' ? walk({
                    '': j
                }, '') : j;
            }
            throw new SyntaxError('JSON.parse');
        };
    }
}());
if (typeof HtmlFormControlsCollection == 'undefined') {
    function HtmlFormControlsCollection(arr) {
        for (var i = 0; i < arr.length; i += 1) {
            this[i] = arr[i];
        }
        Object.defineProperty(this, 'length', {
            get: function() {
                return arr.length;
            }
        });
        Object.freeze(this);
    }
    HtmlFormControlsCollection.prototype = {
        item: function(i) {
            return this[i] != null ? this[i] : null;
        },
        namedItem: function(name) {
            var ret = [];
            for (var i = 0; i < this.length; i += 1) {
                if (this[i].id === name || this[i].name === name) {
                    ret.push(this[i]);
                }
            }
            return ret.length ? ret : null;
        }
    };
}
var oldElements = HTMLFormElement.prototype.__lookupGetter__('elements');
HTMLFormElement.prototype.__defineGetter__('elements', function() {
    var elems = oldElements.call(this);
    if (typeof HtmlFormControlsCollection !== 'undefined' && elems instanceof HtmlFormControlsCollection) {
        return elems;
    }
    return new HtmlFormControlsCollection(elems);
});
(function(global, factory) {
    if (typeof define === 'function' && define.amd) {
        define(function() {
            return factory(global);
        });
    } else if (typeof module === 'object' && typeof module.exports === 'object') {
        module.exports = factory(global);
    } else {
        global.Nette = factory(global);
        global.Nette.initOnLoad();
    }
}(typeof window !== 'undefined' ? window : this, function(window) {
    'use strict';
    var Nette = {};
    Nette.addEvent = function(element, on, callback) {
        var original = element['on' + on];
        element['on' + on] = function() {
            if (typeof original === 'function' && original.apply(element, arguments) === false) {
                return false;
            }
            return callback.apply(element, arguments);
        };
    };
    Nette.getValue = function(elem) {
        var i, len;
        if (!elem) {
            return null;
        } else if (!elem.tagName) {
            var multi = elem[0] && !!elem[0].name.match(/\[\]$/),
                res = [];
            for (i = 0, len = elem.length; i < len; i++) {
                if (elem[i].type in {
                        checkbox: 1,
                        radio: 1
                    } && !elem[i].checked) {
                    continue;
                } else if (multi) {
                    res.push(elem[i].value);
                } else {
                    return elem[i].value;
                }
            }
            return multi ? res : null;
        } else if (elem.name && !elem.form.elements.namedItem(elem.name).tagName) {
            return Nette.getValue(elem.form.elements.namedItem(elem.name));
        } else if (elem.type === 'file') {
            return elem.files || elem.value;
        } else if (elem.name.match(/\[\]$/)) {
            return Nette.getValue([elem]);
        } else if (elem.tagName.toLowerCase() === 'select') {
            var index = elem.selectedIndex,
                options = elem.options,
                values = [];
            if (elem.type === 'select-one') {
                return index < 0 ? null : options[index].value;
            }
            for (i = 0, len = options.length; i < len; i++) {
                if (options[i].selected) {
                    values.push(options[i].value);
                }
            }
            return values;
        } else if (elem.type === 'checkbox') {
            return elem.checked;
        } else if (elem.type === 'radio') {
            return elem.checked && elem.value;
        } else if (elem.tagName.toLowerCase() === 'textarea') {
            return elem.value.replace("\r", '');
        } else {
            return elem.value.replace("\r", '').replace(/^\s+|\s+$/g, '');
        }
    };
    Nette.getEffectiveValue = function(elem) {
        var val = Nette.getValue(elem);
        if (elem.getAttribute) {
            if (val === elem.getAttribute('data-nette-empty-value')) {
                val = '';
            }
        }
        return val;
    };
    Nette.validateControl = function(elem, rules, onlyCheck, value) {
        elem = elem.tagName ? elem : elem[0];
        rules = rules || Nette.parseJSON(elem.getAttribute('data-nette-rules'));
        value = value === undefined ? {
            value: Nette.getEffectiveValue(elem)
        } : value;
        for (var id = 0, len = rules.length; id < len; id++) {
            var rule = rules[id],
                op = rule.op.match(/(~)?([^?]+)/),
                curElem = rule.control ? elem.form.elements.namedItem(rule.control) : elem;
            if (!curElem) {
                continue;
            }
            rule.neg = op[1];
            rule.op = op[2];
            rule.condition = !!rule.rules;
            curElem = curElem.tagName ? curElem : curElem[0];
            var curValue = elem === curElem ? value : {
                    value: Nette.getEffectiveValue(curElem)
                },
                success = Nette.validateRule(curElem, rule.op, rule.arg, curValue);
            if (success === null) {
                continue;
            } else if (rule.neg) {
                success = !success;
            }
            if (rule.condition && success) {
                if (!Nette.validateControl(elem, rule.rules, onlyCheck, value)) {
                    return false;
                }
            } else if (!rule.condition && !success) {
                if (Nette.isDisabled(curElem)) {
                    continue;
                }
                if (!onlyCheck) {
                    var arr = Nette.isArray(rule.arg) ? rule.arg : [rule.arg],
                        message = rule.msg.replace(/%(value|\d+)/g, function(foo, m) {
                            return Nette.getValue(m === 'value' ? curElem : elem.form.elements.namedItem(arr[m].control));
                        });
                    Nette.addError(curElem, message);
                }
                return false;
            }
        }
        return true;
    };
    Nette.validateForm = function(sender) {
        var form = sender.form || sender,
            scope = false;
        if (form['nette-submittedBy'] && form['nette-submittedBy'].getAttribute('formnovalidate') !== null) {
            var scopeArr = Nette.parseJSON(form['nette-submittedBy'].getAttribute('data-nette-validation-scope'));
            if (scopeArr.length) {
                scope = new RegExp('^(' + scopeArr.join('-|') + '-)');
            } else {
                return true;
            }
        }
        var radios = {},
            i, elem;
        for (i = 0; i < form.elements.length; i++) {
            elem = form.elements[i];
            if (elem.tagName && !(elem.tagName.toLowerCase() in {
                    input: 1,
                    select: 1,
                    textarea: 1,
                    button: 1
                })) {
                continue;
            } else if (elem.type === 'radio') {
                if (radios[elem.name]) {
                    continue;
                }
                radios[elem.name] = true;
            }
            if ((scope && !elem.name.replace(/]\[|\[|]|$/g, '-').match(scope)) || Nette.isDisabled(elem)) {
                continue;
            }
            if (!Nette.validateControl(elem)) {
                return false;
            }
        }
        return true;
    };
    Nette.isDisabled = function(elem) {
        if (elem.type === 'radio') {
            elem = elem.form.elements.namedItem(elem.name).tagName ? [elem] : elem.form.elements.namedItem(elem.name);
            for (var i = 0; i < elem.length; i++) {
                if (!elem[i].disabled) {
                    return false;
                }
            }
            return true;
        }
        return elem.disabled;
    };
    Nette.addError = function(elem, message) {
        if (message) {
            alert(message);
        }
        if (elem.focus) {
            elem.focus();
        }
    };
    Nette.expandRuleArgument = function(form, arg) {
        if (arg && arg.control) {
            arg = Nette.getEffectiveValue(form.elements.namedItem(arg.control));
        }
        return arg;
    };
    Nette.validateRule = function(elem, op, arg, value) {
        value = value === undefined ? {
            value: Nette.getEffectiveValue(elem)
        } : value;
        if (op.charAt(0) === ':') {
            op = op.substr(1);
        }
        op = op.replace('::', '_');
        op = op.replace(/\\/g, '');
        var arr = Nette.isArray(arg) ? arg.slice(0) : [arg];
        for (var i = 0, len = arr.length; i < len; i++) {
            arr[i] = Nette.expandRuleArgument(elem.form, arr[i]);
        }
        return Nette.validators[op] ? Nette.validators[op](elem, Nette.isArray(arg) ? arr : arr[0], value.value, value) : null;
    };
    Nette.validators = {
        filled: function(elem, arg, val) {
            return val !== '' && val !== false && val !== null && (!Nette.isArray(val) || !!val.length) && (!window.FileList || !(val instanceof window.FileList) || val.length);
        },
        blank: function(elem, arg, val) {
            return !Nette.validators.filled(elem, arg, val);
        },
        valid: function(elem, arg, val) {
            return Nette.validateControl(elem, null, true);
        },
        equal: function(elem, arg, val) {
            if (arg === undefined) {
                return null;
            }
            val = Nette.isArray(val) ? val : [val];
            arg = Nette.isArray(arg) ? arg : [arg];
            loop: for (var i1 = 0, len1 = val.length; i1 < len1; i1++) {
                for (var i2 = 0, len2 = arg.length; i2 < len2; i2++) {
                    if (val[i1] == arg[i2]) {
                        continue loop;
                    }
                }
                return false;
            }
            return true;
        },
        notEqual: function(elem, arg, val) {
            return arg === undefined ? null : !Nette.validators.equal(elem, arg, val);
        },
        minLength: function(elem, arg, val) {
            return val.length >= arg;
        },
        maxLength: function(elem, arg, val) {
            return val.length <= arg;
        },
        length: function(elem, arg, val) {
            arg = Nette.isArray(arg) ? arg : [arg, arg];
            return (arg[0] === null || val.length >= arg[0]) && (arg[1] === null || val.length <= arg[1]);
        },
        email: function(elem, arg, val) {
            return (/^("([ !\x23-\x5B\x5D-\x7E]*|\\[ -~])+"|[-a-z0-9!#$%&'*+\/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+\/=?^_`{|}~]+)*)@([0-9a-z\u00C0-\u02FF\u0370-\u1EFF]([-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,61}[0-9a-z\u00C0-\u02FF\u0370-\u1EFF])?\.)+[a-z\u00C0-\u02FF\u0370-\u1EFF][-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,17}[a-z\u00C0-\u02FF\u0370-\u1EFF]$/i).test(val);
        },
        url: function(elem, arg, val, value) {
            if (!(/^[a-z\d+.-]+:/).test(val)) {
                val = 'http://' + val;
            }
            if ((/^https?:\/\/([0-9a-z\u00C0-\u02FF\u0370-\u1EFF](([-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,61}[0-9a-z\u00C0-\u02FF\u0370-\u1EFF])?\.)*[a-z\u00C0-\u02FF\u0370-\u1EFF][-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,17}[a-z\u00C0-\u02FF\u0370-\u1EFF]|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}|\[[0-9a-f:]{3,39}\])(:\d{1,5})?(\/\S*)?$/i).test(val)) {
                value.value = val;
                return true;
            }
            return false;
        },
        regexp: function(elem, arg, val) {
            var parts = typeof arg === 'string' ? arg.match(/^\/(.*)\/([imu]*)$/) : false;
            try {
                return parts && (new RegExp(parts[1], parts[2].replace('u', ''))).test(val);
            } catch (e) {}
        },
        pattern: function(elem, arg, val) {
            try {
                return typeof arg === 'string' ? (new RegExp('^(' + arg + ')$')).test(val) : null;
            } catch (e) {}
        },
        integer: function(elem, arg, val) {
            return (/^-?[0-9]+$/).test(val);
        },
        'float': function(elem, arg, val, value) {
            val = val.replace(' ', '').replace(',', '.');
            if ((/^-?[0-9]*[.,]?[0-9]+$/).test(val)) {
                value.value = val;
                return true;
            }
            return false;
        },
        min: function(elem, arg, val) {
            return Nette.validators.range(elem, [arg, null], val);
        },
        max: function(elem, arg, val) {
            return Nette.validators.range(elem, [null, arg], val);
        },
        range: function(elem, arg, val) {
            return Nette.isArray(arg) ? ((arg[0] === null || parseFloat(val) >= arg[0]) && (arg[1] === null || parseFloat(val) <= arg[1])) : null;
        },
        submitted: function(elem, arg, val) {
            return elem.form['nette-submittedBy'] === elem;
        },
        fileSize: function(elem, arg, val) {
            if (window.FileList) {
                for (var i = 0; i < val.length; i++) {
                    if (val[i].size > arg) {
                        return false;
                    }
                }
            }
            return true;
        },
        image: function(elem, arg, val) {
            if (window.FileList && val instanceof window.FileList) {
                for (var i = 0; i < val.length; i++) {
                    var type = val[i].type;
                    if (type && type !== 'image/gif' && type !== 'image/png' && type !== 'image/jpeg') {
                        return false;
                    }
                }
            }
            return true;
        }
    };
    Nette.toggleForm = function(form, elem) {
        var i;
        Nette.toggles = {};
        for (i = 0; i < form.elements.length; i++) {
            if (form.elements[i].tagName.toLowerCase() in {
                    input: 1,
                    select: 1,
                    textarea: 1,
                    button: 1
                }) {
                Nette.toggleControl(form.elements[i], null, null, !elem);
            }
        }
        for (i in Nette.toggles) {
            Nette.toggle(i, Nette.toggles[i], elem);
        }
    };
    Nette.toggleControl = function(elem, rules, success, firsttime, value) {
        rules = rules || Nette.parseJSON(elem.getAttribute('data-nette-rules'));
        value = value === undefined ? {
            value: Nette.getEffectiveValue(elem)
        } : value;
        var has = false,
            handled = [],
            handler = function() {
                Nette.toggleForm(elem.form, elem);
            },
            curSuccess;
        for (var id = 0, len = rules.length; id < len; id++) {
            var rule = rules[id],
                op = rule.op.match(/(~)?([^?]+)/),
                curElem = rule.control ? elem.form.elements.namedItem(rule.control) : elem;
            if (!curElem) {
                continue;
            }
            curSuccess = success;
            if (success !== false) {
                rule.neg = op[1];
                rule.op = op[2];
                var curValue = elem === curElem ? value : {
                    value: Nette.getEffectiveValue(curElem)
                };
                curSuccess = Nette.validateRule(curElem, rule.op, rule.arg, curValue);
                if (curSuccess === null) {
                    continue;
                } else if (rule.neg) {
                    curSuccess = !curSuccess;
                }
                if (!rule.rules) {
                    success = curSuccess;
                }
            }
            if ((rule.rules && Nette.toggleControl(elem, rule.rules, curSuccess, firsttime, value)) || rule.toggle) {
                has = true;
                if (firsttime) {
                    var oldIE = !document.addEventListener,
                        els = curElem.tagName ? [curElem] : curElem;
                    for (var i = 0; i < els.length; i++) {
                        if (!Nette.inArray(handled, els[i])) {
                            Nette.addEvent(els[i], oldIE && curElem.type in {
                                checkbox: 1,
                                radio: 1
                            } ? 'click' : 'change', handler);
                            handled.push(els[i]);
                        }
                    }
                }
                for (var id2 in rule.toggle || []) {
                    if (Object.prototype.hasOwnProperty.call(rule.toggle, id2)) {
                        Nette.toggles[id2] = Nette.toggles[id2] || (rule.toggle[id2] ? curSuccess : !curSuccess);
                    }
                }
            }
        }
        return has;
    };
    Nette.parseJSON = function(s) {
        s = s || '[]';
        if (s.substr(0, 3) === '{op') {
            return eval('[' + s + ']');
        }
        return window.JSON && window.JSON.parse ? JSON.parse(s) : eval(s);
    };
    Nette.toggle = function(id, visible, srcElement) {
        var elem = document.getElementById(id);
        if (elem) {
            elem.style.display = visible ? '' : 'none';
        }
    };
    Nette.initForm = function(form) {
        form.noValidate = 'novalidate';
        Nette.addEvent(form, 'submit', function(e) {
            if (!Nette.validateForm(form)) {
                if (e && e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    event.cancelBubble = true;
                }
                return false;
            }
        });
        Nette.addEvent(form, 'click', function(e) {
            e = e || event;
            var target = e.target || e.srcElement;
            form['nette-submittedBy'] = (target.type in {
                submit: 1,
                image: 1
            }) ? target : null;
        });
        Nette.toggleForm(form);
    };
    Nette.initOnLoad = function() {
        Nette.addEvent(window, 'load', function() {
            for (var i = 0; i < document.forms.length; i++) {
                Nette.initForm(document.forms[i]);
            }
        });
    };
    Nette.isArray = function(arg) {
        return Object.prototype.toString.call(arg) === '[object Array]';
    };
    Nette.inArray = function(arr, val) {
        if ([].indexOf) {
            return arr.indexOf(val) > -1;
        } else {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] === val) {
                    return true;
                }
            }
            return false;
        }
    };
    Nette.webalize = function(s) {
        s = s.toLowerCase();
        var res = '',
            i, ch;
        for (i = 0; i < s.length; i++) {
            ch = Nette.webalizeTable[s.charAt(i)];
            res += ch ? ch : s.charAt(i);
        }
        return res.replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    };
    Nette.webalizeTable = {
	 /*
	   \
        u00e1: 'a',
        \u00e4: 'a',
        \u010d: 'c',
        \u010f: 'd',
        \u00e9: 'e',
        \u011b: 'e',
        \u00ed: 'i',
        \u013e: 'l',
        \u0148: 'n',
        \u00f3: 'o',
        \u00f4: 'o',
        \u0159: 'r',
        \u0161: 's',
        \u0165: 't',
        \u00fa: 'u',
        \u016f: 'u',
        \u00fd: 'y',
        \u017e: 'z'
		*/
    };
    return Nette;
}));
(function(window, $, undefined) {
    if (typeof $ !== 'function') {
        return console.error('nette.ajax.js: jQuery is missing, load it please');
    }
    var nette = function() {
        var inner = {
            self: this,
            initialized: false,
            contexts: {},
            on: {
                init: {},
                load: {},
                prepare: {},
                before: {},
                start: {},
                success: {},
                complete: {},
                error: {}
            },
            fire: function() {
                var result = true;
                var args = Array.prototype.slice.call(arguments);
                var props = args.shift();
                var name = (typeof props === 'string') ? props : props.name;
                var off = (typeof props === 'object') ? props.off || {} : {};
                args.push(inner.self);
                $.each(inner.on[name], function(index, reaction) {
                    if (reaction === undefined || $.inArray(index, off) !== -1) return true;
                    var temp = reaction.apply(inner.contexts[index], args);
                    return result = (temp === undefined || temp);
                });
                return result;
            },
            requestHandler: function(e) {
                var xhr = inner.self.ajax({}, this, e);
                if (xhr && xhr._returnFalse) {
                    return false;
                }
            },
            ext: function(callbacks, context, name) {
                while (!name) {
                    name = 'ext_' + Math.random();
                    if (inner.contexts[name]) {
                        name = undefined;
                    }
                }
                $.each(callbacks, function(event, callback) {
                    inner.on[event][name] = callback;
                });
                inner.contexts[name] = $.extend(context ? context : {}, {
                    name: function() {
                        return name;
                    },
                    ext: function(name, force) {
                        var ext = inner.contexts[name];
                        if (!ext && force) throw "Extension '" + this.name() + "' depends on disabled extension '" + name + "'.";
                        return ext;
                    }
                });
            }
        };
        this.ext = function(name, callbacks, context) {
            if (typeof name === 'object') {
                inner.ext(name, callbacks);
            } else if (callbacks === undefined) {
                return inner.contexts[name];
            } else if (!callbacks) {
                $.each(['init', 'load', 'prepare', 'before', 'start', 'success', 'complete', 'error'], function(index, event) {
                    inner.on[event][name] = undefined;
                });
                inner.contexts[name] = undefined;
            } else if (typeof name === 'string' && inner.contexts[name] !== undefined) {
                throw "Cannot override already registered nette-ajax extension '" + name + "'.";
            } else {
                inner.ext(callbacks, context, name);
            }
            return this;
        };
        this.init = function(load, loadContext) {
            if (inner.initialized) throw 'Cannot initialize nette-ajax twice.';
            if (typeof load === 'function') {
                this.ext('init', null);
                this.ext('init', {
                    load: load
                }, loadContext);
            } else if (typeof load === 'object') {
                this.ext('init', null);
                this.ext('init', load, loadContext);
            } else if (load !== undefined) {
                throw 'Argument of init() can be function or function-hash only.';
            }
            inner.initialized = true;
            inner.fire('init');
            this.load();
            return this;
        };
        this.load = function() {
            inner.fire('load', inner.requestHandler);
            return this;
        };
        this.ajax = function(settings, ui, e) {
            if (!settings.nette && ui && e) {
                var $el = $(ui),
                    xhr, originalBeforeSend;
                var analyze = settings.nette = {
                    e: e,
                    ui: ui,
                    el: $el,
                    isForm: $el.is('form'),
                    isSubmit: $el.is('input[type=submit]') || $el.is('button[type=submit]'),
                    isImage: $el.is('input[type=image]'),
                    form: null
                };
                if (analyze.isSubmit || analyze.isImage) {
                    analyze.form = analyze.el.closest('form');
                } else if (analyze.isForm) {
                    analyze.form = analyze.el;
                }
                if (!settings.url) {
                    settings.url = analyze.form ? analyze.form.attr('action') : ui.href;
                }
                if (!settings.type) {
                    settings.type = analyze.form ? analyze.form.attr('method') : 'get';
                }
                if ($el.is('[data-ajax-off]')) {
                    var rawOff = $el.attr('data-ajax-off');
                    if (rawOff.indexOf('[') === 0) {
                        settings.off = $el.data('ajaxOff');
                    } else if (rawOff.indexOf(',') !== -1) {
                        settings.off = rawOff.split(',');
                    } else if (rawOff.indexOf(' ') !== -1) {
                        settings.off = rawOff.split(' ');
                    } else {
                        settings.off = rawOff;
                    }
                    if (typeof settings.off === 'string') settings.off = [settings.off];
                    settings.off = $.grep($.each(settings.off, function(off) {
                        return $.trim(off);
                    }), function(off) {
                        return off.length;
                    });
                }
            }
            inner.fire({
                name: 'prepare',
                off: settings.off || {}
            }, settings);
            if (settings.prepare) {
                settings.prepare(settings);
            }
            originalBeforeSend = settings.beforeSend;
            settings.beforeSend = function(xhr, settings) {
                var result = inner.fire({
                    name: 'before',
                    off: settings.off || {}
                }, xhr, settings);
                if ((result || result === undefined) && originalBeforeSend) {
                    result = originalBeforeSend(xhr, settings);
                }
                return result;
            };
            return this.handleXHR($.ajax(settings), settings);
        };
        this.handleXHR = function(xhr, settings) {
            settings = settings || {};
            if (xhr && (typeof xhr.statusText === 'undefined' || xhr.statusText !== 'canceled')) {
                xhr.done(function(payload, status, xhr) {
                    inner.fire({
                        name: 'success',
                        off: settings.off || {}
                    }, payload, status, xhr, settings);
                }).fail(function(xhr, status, error) {
                    inner.fire({
                        name: 'error',
                        off: settings.off || {}
                    }, xhr, status, error, settings);
                }).always(function(xhr, status) {
                    inner.fire({
                        name: 'complete',
                        off: settings.off || {}
                    }, xhr, status, settings);
                });
                inner.fire({
                    name: 'start',
                    off: settings.off || {}
                }, xhr, settings);
                if (settings.start) {
                    settings.start(xhr, settings);
                }
            }
            return xhr;
        };
    };
    $.nette = new($.extend(nette, $.nette ? $.nette : {}));
    $.fn.netteAjax = function(e, options) {
        return $.nette.ajax(options || {}, this[0], e);
    };
    $.fn.netteAjaxOff = function() {
        return this.off('.nette');
    };
    $.nette.ext('validation', {
        before: function(xhr, settings) {
            if (!settings.nette) return true;
            else var analyze = settings.nette;
            var e = analyze.e;
            var validate = $.extend({
                keys: true,
                url: true,
                form: true
            }, settings.validate || (function() {
                if (!analyze.el.is('[data-ajax-validate]')) return;
                var attr = analyze.el.data('ajaxValidate');
                if (attr === false) return {
                    keys: false,
                    url: false,
                    form: false
                };
                else if (typeof attr === 'object') return attr;
            })() || {});
            var passEvent = false;
            if (analyze.el.attr('data-ajax-pass') !== undefined) {
                passEvent = analyze.el.data('ajaxPass');
                passEvent = typeof passEvent === 'bool' ? passEvent : true;
            }
            if (validate.keys) {
                var explicitNoAjax = e.button || e.ctrlKey || e.shiftKey || e.altKey || e.metaKey;
                if (analyze.form) {
                    if (explicitNoAjax && analyze.isSubmit) {
                        this.explicitNoAjax = true;
                        return false;
                    } else if (analyze.isForm && this.explicitNoAjax) {
                        this.explicitNoAjax = false;
                        return false;
                    }
                } else if (explicitNoAjax) return false;
            }
            if (validate.form && analyze.form && !((analyze.isSubmit || analyze.isImage) && analyze.el.attr('formnovalidate') !== undefined)) {
                var ie = this.ie();
                if (analyze.form.get(0).onsubmit && analyze.form.get(0).onsubmit((typeof ie !== 'undefined' && ie < 9) ? undefined : e) === false) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    return false;
                }
            }
            if (validate.url) {
                if (/:|^#/.test(analyze.form ? settings.url : analyze.el.attr('href'))) return false;
            }
            if (!passEvent) {
                e.stopPropagation();
                e.preventDefault();
                xhr._returnFalse = true;
            }
            return true;
        }
    }, {
        explicitNoAjax: false,
        ie: function(undefined) {
            var v = 3;
            var div = document.createElement('div');
            var all = div.getElementsByTagName('i');
            while (div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->', all[0]);
            return v > 4 ? v : undefined;
        }
    });
    $.nette.ext('forms', {
        init: function() {
            var snippets;
            if (!window.Nette || !(snippets = this.ext('snippets'))) return;
            snippets.after(function($el) {
                $el.find('form').each(function() {
                    window.Nette.initForm(this);
                });
            });
        },
        prepare: function(settings) {
            var analyze = settings.nette;
            if (!analyze || !analyze.form) return;
            var e = analyze.e;
            var originalData = settings.data || {};
            var formData = {};
            if (analyze.isSubmit) {
                formData[analyze.el.attr('name')] = analyze.el.val() || '';
            } else if (analyze.isImage) {
                var offset = analyze.el.offset();
                var name = analyze.el.attr('name');
                var dataOffset = [Math.max(0, e.pageX - offset.left), Math.max(0, e.pageY - offset.top)];
                if (name.indexOf('[', 0) !== -1) {
                    formData[name] = dataOffset;
                } else {
                    formData[name + '.x'] = dataOffset[0];
                    formData[name + '.y'] = dataOffset[1];
                }
            }
            if (typeof originalData !== 'string') {
                originalData = $.param(originalData);
            }
            formData = $.param(formData);
            settings.data = analyze.form.serialize() + (formData ? '&' + formData : '') + '&' + originalData;
        }
    });
    $.nette.ext('snippets', {
        success: function(payload) {
            if (payload.snippets) {
                this.updateSnippets(payload.snippets);
            }
        }
    }, {
        beforeQueue: $.Callbacks(),
        afterQueue: $.Callbacks(),
        completeQueue: $.Callbacks(),
        before: function(callback) {
            this.beforeQueue.add(callback);
        },
        after: function(callback) {
            this.afterQueue.add(callback);
        },
        complete: function(callback) {
            this.completeQueue.add(callback);
        },
        updateSnippets: function(snippets, back) {
            var that = this;
            var elements = [];
            for (var i in snippets) {
                var $el = this.getElement(i);
                if ($el.get(0)) {
                    elements.push($el.get(0));
                }
                this.updateSnippet($el, snippets[i], back);
            }
            $(elements).promise().done(function() {
                that.completeQueue.fire();
            });
        },
        updateSnippet: function($el, html, back) {
            if ($el.is('title')) {
                document.title = html;
            } else {
                this.beforeQueue.fire($el);
                this.applySnippet($el, html, back);
                this.afterQueue.fire($el);
            }
        },
        getElement: function(id) {
            return $('#' + this.escapeSelector(id));
        },
        applySnippet: function($el, html, back) {
            if (!back && $el.is('[data-ajax-append]')) {
                $el.append(html);
            } else {
                $el.html(html);
            }
        },
        escapeSelector: function(selector) {
            return selector.replace(/[\!"#\$%&'\(\)\*\+,\.\/:;<=>\?@\[\\\]\^`\{\|\}~]/g, '\\$&');
        }
    });
    $.nette.ext('redirect', {
        success: function(payload) {
            if (payload.redirect) {
                window.location.href = payload.redirect;
                return false;
            }
        }
    });
    $.nette.ext('state', {
        success: function(payload) {
            if (payload.state) {
                this.state = payload.state;
            }
        }
    }, {
        state: null
    });
    $.nette.ext('unique', {
        start: function(xhr) {
            if (this.xhr) {
                this.xhr.abort();
            }
            this.xhr = xhr;
        },
        complete: function() {
            this.xhr = null;
        }
    }, {
        xhr: null
    });
    $.nette.ext('abort', {
        init: function() {
            $('body').keydown($.proxy(function(e) {
                if (this.xhr && (e.keyCode.toString() === '27' && !(e.ctrlKey || e.shiftKey || e.altKey || e.metaKey))) {
                    this.xhr.abort();
                }
            }, this));
        },
        start: function(xhr) {
            this.xhr = xhr;
        },
        complete: function() {
            this.xhr = null;
        }
    }, {
        xhr: null
    });
    $.nette.ext('load', {
        success: function() {
            $.nette.load();
        }
    });
    $.nette.ext('init', {
        load: function(rh) {
            $(this.linkSelector).off('click.nette', rh).on('click.nette', rh);
            $(this.formSelector).off('submit.nette', rh).on('submit.nette', rh).off('click.nette', ':image', rh).on('click.nette', ':image', rh).off('click.nette', ':submit', rh).on('click.nette', ':submit', rh);
            $(this.buttonSelector).closest('form').off('click.nette', this.buttonSelector, rh).on('click.nette', this.buttonSelector, rh);
        }
    }, {
        linkSelector: 'a.ajax',
        formSelector: 'form.ajax',
        buttonSelector: 'input.ajax[type="submit"], button.ajax[type="submit"], input.ajax[type="image"]'
    });
})(window, window.jQuery);
/*! http://mths.be/placeholder v2.0.7 by @mathias */
;
(function(window, document, $) {
    var isInputSupported = 'placeholder' in document.createElement('input'),
        isTextareaSupported = 'placeholder' in document.createElement('textarea'),
        prototype = $.fn,
        valHooks = $.valHooks,
        hooks, placeholder;
    if (isInputSupported && isTextareaSupported) {
        placeholder = prototype.placeholder = function() {
            return this;
        };
        placeholder.input = placeholder.textarea = true;
    } else {
        placeholder = prototype.placeholder = function() {
            var $this = this;
            $this.filter((isInputSupported ? 'textarea' : ':input') + '[placeholder]').not('.placeholder').bind({
                'focus.placeholder': clearPlaceholder,
                'blur.placeholder': setPlaceholder
            }).data('placeholder-enabled', true).trigger('blur.placeholder');
            return $this;
        };
        placeholder.input = isInputSupported;
        placeholder.textarea = isTextareaSupported;
        hooks = {
            'get': function(element) {
                var $element = $(element);
                return $element.data('placeholder-enabled') && $element.hasClass('placeholder') ? '' : element.value;
            },
            'set': function(element, value) {
                var $element = $(element);
                if (!$element.data('placeholder-enabled')) {
                    return element.value = value;
                }
                if (value == '') {
                    element.value = value;
                    if (element != document.activeElement) {
                        setPlaceholder.call(element);
                    }
                } else if ($element.hasClass('placeholder')) {
                    clearPlaceholder.call(element, true, value) || (element.value = value);
                } else {
                    element.value = value;
                }
                return $element;
            }
        };
        isInputSupported || (valHooks.input = hooks);
        isTextareaSupported || (valHooks.textarea = hooks);
        $(function() {
            $(document).delegate('form', 'submit.placeholder', function() {
                var $inputs = $('.placeholder', this).each(clearPlaceholder);
                setTimeout(function() {
                    $inputs.each(setPlaceholder);
                }, 10);
            });
        });
        $(window).bind('beforeunload.placeholder', function() {
            $('.placeholder').each(function() {
                this.value = '';
            });
        });
    }

    function args(elem) {
        var newAttrs = {},
            rinlinejQuery = /^jQuery\d+$/;
        $.each(elem.attributes, function(i, attr) {
            if (attr.specified && !rinlinejQuery.test(attr.name)) {
                newAttrs[attr.name] = attr.value;
            }
        });
        return newAttrs;
    }

    function clearPlaceholder(event, value) {
        var input = this,
            $input = $(input);
        if (input.value == $input.attr('placeholder') && $input.hasClass('placeholder')) {
            if ($input.data('placeholder-password')) {
                $input = $input.hide().next().show().attr('id', $input.removeAttr('id').data('placeholder-id'));
                if (event === true) {
                    return $input[0].value = value;
                }
                $input.focus();
            } else {
                input.value = '';
                $input.removeClass('placeholder');
                input == document.activeElement && input.select();
            }
        }
    }

    function setPlaceholder() {
        var $replacement, input = this,
            $input = $(input),
            $origInput = $input,
            id = this.id;
        if (input.value == '') {
            if (input.type == 'password') {
                if (!$input.data('placeholder-textinput')) {
                    try {
                        $replacement = $input.clone().attr({
                            'type': 'text'
                        });
                    } catch (e) {
                        $replacement = $('<input>').attr($.extend(args(this), {
                            'type': 'text'
                        }));
                    }
                    $replacement.removeAttr('name').data({
                        'placeholder-password': true,
                        'placeholder-id': id
                    }).bind('focus.placeholder', clearPlaceholder);
                    $input.data({
                        'placeholder-textinput': $replacement,
                        'placeholder-id': id
                    }).before($replacement);
                }
                $input = $input.removeAttr('id').hide().prev().attr('id', id).show();
            }
            $input.addClass('placeholder');
            $input[0].value = $input.attr('placeholder');
        } else {
            $input.removeClass('placeholder');
        }
    }
}(this, document, jQuery));
/*
 * zClip :: jQuery ZeroClipboard v1.1.1
 * http://steamdev.com/zclip
 *
 * Copyright 2011, SteamDev
 * Released under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Date: Wed Jun 01, 2011
 */

(function(a) {
    a.fn.zclip = function(c) {
        if (typeof c == "object" && !c.length) {
            var b = a.extend({
                path: "ZeroClipboard.swf",
                copy: null,
                beforeCopy: null,
                afterCopy: null,
                clickAfter: true,
                setHandCursor: true,
                setCSSEffects: true
            }, c);
            return this.each(function() {
                var e = a(this);
                if (e.is(":visible") && (typeof b.copy == "string" || a.isFunction(b.copy))) {
                    ZeroClipboard.setMoviePath(b.path);
                    var d = new ZeroClipboard.Client();
                    if (a.isFunction(b.copy)) {
                        e.bind("zClip_copy", b.copy)
                    }
                    if (a.isFunction(b.beforeCopy)) {
                        e.bind("zClip_beforeCopy", b.beforeCopy)
                    }
                    if (a.isFunction(b.afterCopy)) {
                        e.bind("zClip_afterCopy", b.afterCopy)
                    }
                    d.setHandCursor(b.setHandCursor);
                    d.setCSSEffects(b.setCSSEffects);
                    d.addEventListener("mouseOver", function(f) {
                        e.trigger("mouseenter")
                    });
                    d.addEventListener("mouseOut", function(f) {
                        e.trigger("mouseleave")
                    });
                    d.addEventListener("mouseDown", function(f) {
                        e.trigger("mousedown");
                        if (!a.isFunction(b.copy)) {
                            d.setText(b.copy)
                        } else {
                            d.setText(e.triggerHandler("zClip_copy"))
                        }
                        if (a.isFunction(b.beforeCopy)) {
                            e.trigger("zClip_beforeCopy")
                        }
                    });
                    d.addEventListener("complete", function(f, g) {
                        if (a.isFunction(b.afterCopy)) {
                            e.trigger("zClip_afterCopy")
                        } else {
                            if (g.length > 500) {
                                g = g.substr(0, 500) + "...\n\n(" + (g.length - 500) + " characters not shown)"
                            }
                            e.removeClass("hover");
                            alert("Copied text to clipboard:\n\n " + g)
                        }
                        if (b.clickAfter) {
                            e.trigger("click")
                        }
                    });
                    d.glue(e[0], e.parent()[0]);
                    a(window).bind("load resize", function() {
                        d.reposition()
                    })
                }
            })
        } else {
            if (typeof c == "string") {
                return this.each(function() {
                    var f = a(this);
                    c = c.toLowerCase();
                    var e = f.data("zclipId");
                    var d = a("#" + e + ".zclip");
                    if (c == "remove") {
                        d.remove();
                        f.removeClass("active hover")
                    } else {
                        if (c == "hide") {
                            d.hide();
                            f.removeClass("active hover")
                        } else {
                            if (c == "show") {
                                d.show()
                            }
                        }
                    }
                })
            }
        }
    }
})(jQuery);
var ZeroClipboard = {
    version: "1.0.7",
    clients: {},
    moviePath: "ZeroClipboard.swf",
    nextId: 1,
    $: function(a) {
        if (typeof(a) == "string") {
            a = document.getElementById(a)
        }
        if (!a.addClass) {
            a.hide = function() {
                this.style.display = "none"
            };
            a.show = function() {
                this.style.display = ""
            };
            a.addClass = function(b) {
                this.removeClass(b);
                this.className += " " + b
            };
            a.removeClass = function(d) {
                var e = this.className.split(/\s+/);
                var b = -1;
                for (var c = 0; c < e.length; c++) {
                    if (e[c] == d) {
                        b = c;
                        c = e.length
                    }
                }
                if (b > -1) {
                    e.splice(b, 1);
                    this.className = e.join(" ")
                }
                return this
            };
            a.hasClass = function(b) {
                return !!this.className.match(new RegExp("\\s*" + b + "\\s*"))
            }
        }
        return a
    },
    setMoviePath: function(a) {
        this.moviePath = a
    },
    dispatch: function(d, b, c) {
        var a = this.clients[d];
        if (a) {
            a.receiveEvent(b, c)
        }
    },
    register: function(b, a) {
        this.clients[b] = a
    },
    getDOMObjectPosition: function(c, a) {
        var b = {
            left: 0,
            top: 0,
            width: c.width ? c.width : c.offsetWidth,
            height: c.height ? c.height : c.offsetHeight
        };
        if (c && (c != a)) {
            b.left += c.offsetLeft;
            b.top += c.offsetTop
        }
        return b
    },
    Client: function(a) {
        this.handlers = {};
        this.id = ZeroClipboard.nextId++;
        this.movieId = "ZeroClipboardMovie_" + this.id;
        ZeroClipboard.register(this.id, this);
        if (a) {
            this.glue(a)
        }
    }
};
ZeroClipboard.Client.prototype = {
    id: 0,
    ready: false,
    movie: null,
    clipText: "",
    handCursorEnabled: true,
    cssEffects: true,
    handlers: null,
    glue: function(d, b, e) {
        this.domElement = ZeroClipboard.$(d);
        var f = 99;
        if (this.domElement.style.zIndex) {
            f = parseInt(this.domElement.style.zIndex, 10) + 1
        }
        if (typeof(b) == "string") {
            b = ZeroClipboard.$(b)
        } else {
            if (typeof(b) == "undefined") {
                b = document.getElementsByTagName("body")[0]
            }
        }
        var c = ZeroClipboard.getDOMObjectPosition(this.domElement, b);
        this.div = document.createElement("div");
        this.div.className = "zclip";
        this.div.id = "zclip-" + this.movieId;
        $(this.domElement).data("zclipId", "zclip-" + this.movieId);
        var a = this.div.style;
        a.position = "absolute";
        a.left = "" + c.left + "px";
        a.top = "" + c.top + "px";
        a.width = "" + c.width + "px";
        a.height = "" + c.height + "px";
        a.zIndex = f;
        if (typeof(e) == "object") {
            for (addedStyle in e) {
                a[addedStyle] = e[addedStyle]
            }
        }
        b.appendChild(this.div);
        this.div.innerHTML = this.getHTML(c.width, c.height)
    },
    getHTML: function(d, a) {
        var c = "";
        var b = "id=" + this.id + "&width=" + d + "&height=" + a;
        if (navigator.userAgent.match(/MSIE/)) {
            var e = location.href.match(/^https/i) ? "https://" : "http://";
            c += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="' + e + 'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="' + d + '" height="' + a + '" id="' + this.movieId + '" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="' + ZeroClipboard.moviePath + '" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="' + b + '"/><param name="wmode" value="transparent"/></object>'
        } else {
            c += '<embed id="' + this.movieId + '" src="' + ZeroClipboard.moviePath + '" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="' + d + '" height="' + a + '" name="' + this.movieId + '" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="' + b + '" wmode="transparent" />'
        }
        return c
    },
    hide: function() {
        if (this.div) {
            this.div.style.left = "-2000px"
        }
    },
    show: function() {
        this.reposition()
    },
    destroy: function() {
        if (this.domElement && this.div) {
            this.hide();
            this.div.innerHTML = "";
            var a = document.getElementsByTagName("body")[0];
            try {
                a.removeChild(this.div)
            } catch (b) {}
            this.domElement = null;
            this.div = null
        }
    },
    reposition: function(c) {
        if (c) {
            this.domElement = ZeroClipboard.$(c);
            if (!this.domElement) {
                this.hide()
            }
        }
        if (this.domElement && this.div) {
            var b = ZeroClipboard.getDOMObjectPosition(this.domElement);
            var a = this.div.style;
            a.left = "" + b.left + "px";
            a.top = "" + b.top + "px"
        }
    },
    setText: function(a) {
        this.clipText = a;
        if (this.ready) {
            this.movie.setText(a)
        }
    },
    addEventListener: function(a, b) {
        a = a.toString().toLowerCase().replace(/^on/, "");
        if (!this.handlers[a]) {
            this.handlers[a] = []
        }
        this.handlers[a].push(b)
    },
    setHandCursor: function(a) {
        this.handCursorEnabled = a;
        if (this.ready) {
            this.movie.setHandCursor(a)
        }
    },
    setCSSEffects: function(a) {
        this.cssEffects = !!a
    },
    receiveEvent: function(d, f) {
        d = d.toString().toLowerCase().replace(/^on/, "");
        switch (d) {
            case "load":
                this.movie = document.getElementById(this.movieId);
                if (!this.movie) {
                    var c = this;
                    setTimeout(function() {
                        c.receiveEvent("load", null)
                    }, 1);
                    return
                }
                if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) {
                    var c = this;
                    setTimeout(function() {
                        c.receiveEvent("load", null)
                    }, 100);
                    this.ready = true;
                    return
                }
                this.ready = true;
                try {
                    this.movie.setText(this.clipText)
                } catch (h) {}
                try {
                    this.movie.setHandCursor(this.handCursorEnabled)
                } catch (h) {}
                break;
            case "mouseover":
                if (this.domElement && this.cssEffects) {
                    this.domElement.addClass("hover");
                    if (this.recoverActive) {
                        this.domElement.addClass("active")
                    }
                }
                break;
            case "mouseout":
                if (this.domElement && this.cssEffects) {
                    this.recoverActive = false;
                    if (this.domElement.hasClass("active")) {
                        this.domElement.removeClass("active");
                        this.recoverActive = true
                    }
                    this.domElement.removeClass("hover")
                }
                break;
            case "mousedown":
                if (this.domElement && this.cssEffects) {
                    this.domElement.addClass("active")
                }
                break;
            case "mouseup":
                if (this.domElement && this.cssEffects) {
                    this.domElement.removeClass("active");
                    this.recoverActive = false
                }
                break
        }
        if (this.handlers[d]) {
            for (var b = 0, a = this.handlers[d].length; b < a; b++) {
                var g = this.handlers[d][b];
                if (typeof(g) == "function") {
                    g(this, f)
                } else {
                    if ((typeof(g) == "object") && (g.length == 2)) {
                        g[0][g[1]](this, f)
                    } else {
                        if (typeof(g) == "string") {
                            window[g](this, f)
                        }
                    }
                }
            }
        }
    }
};

$(window).load(function() {
    $.nette.ext('snippets').afterQueue.add(function(snippet) {
        var gag_ui_filter_push = snippet.find("div[data-gag-ui-filter-push]").data("gag-ui-filter-push");
        if (gag_ui_filter_push !== undefined && gag_ui_filter_push !== null) {
            if ('undefined' !== typeof _gaq) _gaq.push(['_trackEvent', 'UI', 'Restaurant list filter', gag_ui_filter_push]);
        }
    });
});
/*!

    Copyright (c) 2011 Peter van der Spek

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.

 */
(function($) {
    var liveUpdatingTargetSelectors = {};
    var liveUpdaterIntervalId;
    var liveUpdaterRunning = false;
    var defaultSettings = {
        ellipsis: '...',
        setTitle: 'never',
        live: false
    };
    $.fn.ellipsis = function(selector, options) {
        var subjectElements, settings;
        subjectElements = $(this);
        if (typeof selector !== 'string') {
            options = selector;
            selector = undefined;
        }
        settings = $.extend({}, defaultSettings, options);
        settings.selector = selector;
        subjectElements.each(function() {
            var elem = $(this);
            ellipsisOnElement(elem, settings);
        });
        if (settings.live) {
            addToLiveUpdater(subjectElements.selector, settings);
        } else {
            removeFromLiveUpdater(subjectElements.selector);
        }
        return this;
    };

    function ellipsisOnElement(containerElement, settings) {
        var containerData = containerElement.data('jqae');
        if (!containerData) containerData = {};
        var wrapperElement = containerData.wrapperElement;
        if (!wrapperElement) {
            wrapperElement = containerElement.wrapInner('<div/>').find('>div');
            wrapperElement.css({
                margin: 0,
                padding: 0,
                border: 0
            });
        }
        var wrapperElementData = wrapperElement.data('jqae');
        if (!wrapperElementData) wrapperElementData = {};
        var wrapperOriginalContent = wrapperElementData.originalContent;
        if (wrapperOriginalContent) {
            wrapperElement = wrapperElementData.originalContent.clone(true).data('jqae', {
                originalContent: wrapperOriginalContent
            }).replaceAll(wrapperElement);
        } else {
            wrapperElement.data('jqae', {
                originalContent: wrapperElement.clone(true)
            });
        }
        containerElement.data('jqae', {
            wrapperElement: wrapperElement,
            containerWidth: containerElement.width(),
            containerHeight: containerElement.height()
        });
        var containerElementHeight = containerElement.height();
        var wrapperOffset = (parseInt(containerElement.css('padding-top'), 10) || 0) + (parseInt(containerElement.css('border-top-width'), 10) || 0) - (wrapperElement.offset().top - containerElement.offset().top);
        var deferAppendEllipsis = false;
        var selectedElements = wrapperElement;
        if (settings.selector) selectedElements = $(wrapperElement.find(settings.selector).get().reverse());
        selectedElements.each(function() {
            var selectedElement = $(this),
                originalText = selectedElement.text(),
                ellipsisApplied = false;
            if (wrapperElement.innerHeight() - selectedElement.innerHeight() > containerElementHeight + wrapperOffset) {
                selectedElement.remove();
            } else {
                removeLastEmptyElements(selectedElement);
                if (selectedElement.contents().length) {
                    if (deferAppendEllipsis) {
                        getLastTextNode(selectedElement).get(0).nodeValue += settings.ellipsis;
                        deferAppendEllipsis = false;
                    }
                    while (wrapperElement.innerHeight() > containerElementHeight + wrapperOffset) {
                        ellipsisApplied = ellipsisOnLastTextNode(selectedElement);
                        if (ellipsisApplied) {
                            removeLastEmptyElements(selectedElement);
                            if (selectedElement.contents().length) {
                                getLastTextNode(selectedElement).get(0).nodeValue += settings.ellipsis;
                            } else {
                                deferAppendEllipsis = true;
                                selectedElement.remove();
                                break;
                            }
                        } else {
                            deferAppendEllipsis = true;
                            selectedElement.remove();
                            break;
                        }
                    }
                    if (((settings.setTitle == 'onEllipsis') && ellipsisApplied) || (settings.setTitle == 'always')) {
                        selectedElement.attr('title', originalText);
                    } else if (settings.setTitle != 'never') {
                        selectedElement.removeAttr('title');
                    }
                }
            }
        });
    }

    function ellipsisOnLastTextNode(element) {
        var lastTextNode = getLastTextNode(element);
        if (lastTextNode.length) {
            var text = lastTextNode.get(0).nodeValue;
            var pos = text.lastIndexOf(' ');
            if (pos > -1) {
                text = $.trim(text.substring(0, pos));
                lastTextNode.get(0).nodeValue = text;
            } else {
                lastTextNode.get(0).nodeValue = '';
            }
            return true;
        }
        return false;
    }

    function getLastTextNode(element) {
        if (element.contents().length) {
            var contents = element.contents();
            var lastNode = contents.eq(contents.length - 1);
            if (lastNode.filter(textNodeFilter).length) {
                return lastNode;
            } else {
                return getLastTextNode(lastNode);
            }
        } else {
            element.append('');
            var contents = element.contents();
            return contents.eq(contents.length - 1);
        }
    }

    function removeLastEmptyElements(element) {
        if (element.contents().length) {
            var contents = element.contents();
            var lastNode = contents.eq(contents.length - 1);
            if (lastNode.filter(textNodeFilter).length) {
                var text = lastNode.get(0).nodeValue;
                text = $.trim(text);
                if (text == '') {
                    lastNode.remove();
                    return true;
                } else {
                    return false;
                }
            } else {
                while (removeLastEmptyElements(lastNode)) {}
                if (lastNode.contents().length) {
                    return false;
                } else {
                    lastNode.remove();
                    return true;
                }
            }
        }
        return false;
    }

    function textNodeFilter() {
        return this.nodeType === 3;
    }

    function addToLiveUpdater(targetSelector, settings) {
        liveUpdatingTargetSelectors[targetSelector] = settings;
        if (!liveUpdaterIntervalId) {
            liveUpdaterIntervalId = window.setInterval(function() {
                doLiveUpdater();
            }, 200);
        }
    }

    function removeFromLiveUpdater(targetSelector) {
        if (liveUpdatingTargetSelectors[targetSelector]) {
            delete liveUpdatingTargetSelectors[targetSelector];
            if (!liveUpdatingTargetSelectors.length) {
                if (liveUpdaterIntervalId) {
                    window.clearInterval(liveUpdaterIntervalId);
                    liveUpdaterIntervalId = undefined;
                }
            }
        }
    };

    function doLiveUpdater() {
        if (!liveUpdaterRunning) {
            liveUpdaterRunning = true;
            for (var targetSelector in liveUpdatingTargetSelectors) {
                $(targetSelector).each(function() {
                    var containerElement, containerData;
                    containerElement = $(this);
                    containerData = containerElement.data('jqae');
                    if ((containerData.containerWidth != containerElement.width()) || (containerData.containerHeight != containerElement.height())) {
                        ellipsisOnElement(containerElement, liveUpdatingTargetSelectors[targetSelector]);
                    }
                });
            }
            liveUpdaterRunning = false;
        }
    };
})(jQuery);
/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function(factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(jQuery);
    }
}(function($) {
    var pluses = /\+/g;

    function raw(s) {
        return s;
    }

    function decoded(s) {
        return decodeURIComponent(s.replace(pluses, ' '));
    }

    function converted(s) {
        if (s.indexOf('"') === 0) {
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }
        try {
            return config.json ? JSON.parse(s) : s;
        } catch (er) {}
    }
    var config = $.cookie = function(key, value, options) {
        if (value !== undefined) {
            options = $.extend({}, config.defaults, options);
            if (typeof options.expires === 'number') {
                var days = options.expires,
                    t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }
            value = config.json ? JSON.stringify(value) : String(value);
            return (document.cookie = [config.raw ? key : encodeURIComponent(key), '=', config.raw ? value : encodeURIComponent(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''].join(''));
        }
        var decode = config.raw ? raw : decoded;
        var cookies = document.cookie.split('; ');
        var result = key ? undefined : {};
        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = decode(parts.join('='));
            if (key && key === name) {
                result = converted(cookie);
                break;
            }
            if (!key) {
                result[name] = converted(cookie);
            }
        }
        return result;
    };
    config.defaults = {};
    $.removeCookie = function(key, options) {
        if ($.cookie(key) !== undefined) {
            $.cookie(key, '', $.extend({}, options, {
                expires: -1
            }));
            return true;
        }
        return false;
    };
}));
/*! perfect-scrollbar - v0.4.11
 * http://noraesae.github.com/perfect-scrollbar/
 * Copyright (c) 2014 Hyeonje Alex Jun; Licensed MIT */
(function(e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? e(require("jquery")) : e(jQuery)
})(function(e) {
    "use strict";
    var t = {
            wheelSpeed: 10,
            wheelPropagation: !1,
            minScrollbarLength: null,
            maxScrollbarLength: null,
            useBothWheelAxes: !1,
            useKeyboard: !0,
            suppressScrollX: !1,
            suppressScrollY: !1,
            scrollXMarginOffset: 0,
            scrollYMarginOffset: 0,
            includePadding: !1
        },
        o = function() {
            var e = 0;
            return function() {
                var t = e;
                return e += 1, ".perfect-scrollbar-" + t
            }
        }();
    e.fn.perfectScrollbar = function(n, r) {
        return this.each(function() {
            var l = e.extend(!0, {}, t),
                s = e(this);
            if ("object" == typeof n ? e.extend(!0, l, n) : r = n, "update" === r) return s.data("perfect-scrollbar-update") && s.data("perfect-scrollbar-update")(), s;
            if ("destroy" === r) return s.data("perfect-scrollbar-destroy") && s.data("perfect-scrollbar-destroy")(), s;
            if (s.data("perfect-scrollbar")) return s.data("perfect-scrollbar");
            s.addClass("ps-container");
            var a, i, c, u, d, p, f, h, v, b, g = e("<div class='ps-scrollbar-x-rail'></div>").appendTo(s),
                m = e("<div class='ps-scrollbar-y-rail'></div>").appendTo(s),
                w = e("<div class='ps-scrollbar-x'></div>").appendTo(g),
                L = e("<div class='ps-scrollbar-y'></div>").appendTo(m),
                T = parseInt(g.css("bottom"), 10),
                y = T === T,
                x = y ? null : parseInt(g.css("top"), 10),
                S = parseInt(m.css("right"), 10),
                I = S === S,
                P = I ? null : parseInt(m.css("left"), 10),
                D = "rtl" === s.css("direction"),
                M = o(),
                C = parseInt(g.css("borderLeftWidth"), 10) + parseInt(g.css("borderRightWidth"), 10),
                X = parseInt(g.css("borderTopWidth"), 10) + parseInt(g.css("borderBottomWidth"), 10),
                Y = function(e, t) {
                    var o = e + t,
                        n = u - v;
                    b = 0 > o ? 0 : o > n ? n : o;
                    var r = parseInt(b * (p - u) / (u - v), 10);
                    s.scrollTop(r), y ? g.css({
                        bottom: T - r
                    }) : g.css({
                        top: x + r
                    })
                },
                k = function(e, t) {
                    var o = e + t,
                        n = c - f;
                    h = 0 > o ? 0 : o > n ? n : o;
                    var r = parseInt(h * (d - c) / (c - f), 10);
                    s.scrollLeft(r), I ? m.css({
                        right: S - r
                    }) : m.css({
                        left: P + r
                    })
                },
                W = function(e) {
                    return l.minScrollbarLength && (e = Math.max(e, l.minScrollbarLength)), l.maxScrollbarLength && (e = Math.min(e, l.maxScrollbarLength)), e
                },
                j = function() {
                    var e = {
                        width: c,
                        display: a ? "inherit" : "none"
                    };
                    e.left = D ? s.scrollLeft() + c - d : s.scrollLeft(), y ? e.bottom = T - s.scrollTop() : e.top = x + s.scrollTop(), g.css(e);
                    var t = {
                        top: s.scrollTop(),
                        height: u,
                        display: i ? "inherit" : "none"
                    };
                    I ? t.right = D ? d - s.scrollLeft() - S - L.outerWidth() : S - s.scrollLeft() : t.left = D ? s.scrollLeft() + 2 * c - d - P - L.outerWidth() : P + s.scrollLeft(), m.css(t), w.css({
                        left: h,
                        width: f - C
                    }), L.css({
                        top: b,
                        height: v - X
                    }), a ? s.addClass("ps-active-x") : s.removeClass("ps-active-x"), i ? s.addClass("ps-active-y") : s.removeClass("ps-active-y")
                },
                O = function() {
                    c = l.includePadding ? s.innerWidth() : s.width(), u = l.includePadding ? s.innerHeight() : s.height(), d = s.prop("scrollWidth"), p = s.prop("scrollHeight"), !l.suppressScrollX && d > c + l.scrollXMarginOffset ? (a = !0, f = W(parseInt(c * c / d, 10)), h = parseInt(s.scrollLeft() * (c - f) / (d - c), 10)) : (a = !1, f = 0, h = 0, s.scrollLeft(0)), !l.suppressScrollY && p > u + l.scrollYMarginOffset ? (i = !0, v = W(parseInt(u * u / p, 10)), b = parseInt(s.scrollTop() * (u - v) / (p - u), 10)) : (i = !1, v = 0, b = 0, s.scrollTop(0)), b >= u - v && (b = u - v), h >= c - f && (h = c - f), j()
                },
                E = function() {
                    var t, o;
                    w.bind("mousedown" + M, function(e) {
                        o = e.pageX, t = w.position().left, g.addClass("in-scrolling"), e.stopPropagation(), e.preventDefault()
                    }), e(document).bind("mousemove" + M, function(e) {
                        g.hasClass("in-scrolling") && (k(t, e.pageX - o), e.stopPropagation(), e.preventDefault())
                    }), e(document).bind("mouseup" + M, function() {
                        g.hasClass("in-scrolling") && g.removeClass("in-scrolling")
                    }), t = o = null
                },
                H = function() {
                    var t, o;
                    L.bind("mousedown" + M, function(e) {
                        o = e.pageY, t = L.position().top, m.addClass("in-scrolling"), e.stopPropagation(), e.preventDefault()
                    }), e(document).bind("mousemove" + M, function(e) {
                        m.hasClass("in-scrolling") && (Y(t, e.pageY - o), e.stopPropagation(), e.preventDefault())
                    }), e(document).bind("mouseup" + M, function() {
                        m.hasClass("in-scrolling") && m.removeClass("in-scrolling")
                    }), t = o = null
                },
                A = function(e, t) {
                    var o = s.scrollTop();
                    if (0 === e) {
                        if (!i) return !1;
                        if (0 === o && t > 0 || o >= p - u && 0 > t) return !l.wheelPropagation
                    }
                    var n = s.scrollLeft();
                    if (0 === t) {
                        if (!a) return !1;
                        if (0 === n && 0 > e || n >= d - c && e > 0) return !l.wheelPropagation
                    }
                    return !0
                },
                q = function() {
                    l.wheelSpeed /= 10;
                    var e = !1;
                    s.bind("mousewheel" + M, function(t, o, n, r) {
                        var c = t.deltaX * t.deltaFactor || n,
                            u = t.deltaY * t.deltaFactor || r;
                        e = !1, l.useBothWheelAxes ? i && !a ? (u ? s.scrollTop(s.scrollTop() - u * l.wheelSpeed) : s.scrollTop(s.scrollTop() + c * l.wheelSpeed), e = !0) : a && !i && (c ? s.scrollLeft(s.scrollLeft() + c * l.wheelSpeed) : s.scrollLeft(s.scrollLeft() - u * l.wheelSpeed), e = !0) : (s.scrollTop(s.scrollTop() - u * l.wheelSpeed), s.scrollLeft(s.scrollLeft() + c * l.wheelSpeed)), O(), e = e || A(c, u), e && (t.stopPropagation(), t.preventDefault())
                    }), s.bind("MozMousePixelScroll" + M, function(t) {
                        e && t.preventDefault()
                    })
                },
                B = function() {
                    var t = !1;
                    s.bind("mouseenter" + M, function() {
                        t = !0
                    }), s.bind("mouseleave" + M, function() {
                        t = !1
                    });
                    var o = !1;
                    e(document).bind("keydown" + M, function(n) {
                        if (!(n.isDefaultPrevented && n.isDefaultPrevented() || !t || e(document.activeElement).is(":input,[contenteditable]"))) {
                            var r = 0,
                                l = 0;
                            switch (n.which) {
                                case 37:
                                    r = -30;
                                    break;
                                case 38:
                                    l = 30;
                                    break;
                                case 39:
                                    r = 30;
                                    break;
                                case 40:
                                    l = -30;
                                    break;
                                case 33:
                                    l = 90;
                                    break;
                                case 32:
                                case 34:
                                    l = -90;
                                    break;
                                case 35:
                                    l = -u;
                                    break;
                                case 36:
                                    l = u;
                                    break;
                                default:
                                    return
                            }
                            s.scrollTop(s.scrollTop() - l), s.scrollLeft(s.scrollLeft() + r), o = A(r, l), o && n.preventDefault()
                        }
                    })
                },
                F = function() {
                    var e = function(e) {
                        e.stopPropagation()
                    };
                    L.bind("click" + M, e), m.bind("click" + M, function(e) {
                        var t = parseInt(v / 2, 10),
                            o = e.pageY - m.offset().top - t,
                            n = u - v,
                            r = o / n;
                        0 > r ? r = 0 : r > 1 && (r = 1), s.scrollTop((p - u) * r)
                    }), w.bind("click" + M, e), g.bind("click" + M, function(e) {
                        var t = parseInt(f / 2, 10),
                            o = e.pageX - g.offset().left - t,
                            n = c - f,
                            r = o / n;
                        0 > r ? r = 0 : r > 1 && (r = 1), s.scrollLeft((d - c) * r)
                    })
                },
                z = function() {
                    var t = function(e, t) {
                            s.scrollTop(s.scrollTop() - t), s.scrollLeft(s.scrollLeft() - e), O()
                        },
                        o = {},
                        n = 0,
                        r = {},
                        l = null,
                        a = !1;
                    e(window).bind("touchstart" + M, function() {
                        a = !0
                    }), e(window).bind("touchend" + M, function() {
                        a = !1
                    }), s.bind("touchstart" + M, function(e) {
                        var t = e.originalEvent.targetTouches[0];
                        o.pageX = t.pageX, o.pageY = t.pageY, n = (new Date).getTime(), null !== l && clearInterval(l), e.stopPropagation()
                    }), s.bind("touchmove" + M, function(e) {
                        if (!a && 1 === e.originalEvent.targetTouches.length) {
                            var l = e.originalEvent.targetTouches[0],
                                s = {};
                            s.pageX = l.pageX, s.pageY = l.pageY;
                            var i = s.pageX - o.pageX,
                                c = s.pageY - o.pageY;
                            t(i, c), o = s;
                            var u = (new Date).getTime(),
                                d = u - n;
                            d > 0 && (r.x = i / d, r.y = c / d, n = u), e.preventDefault()
                        }
                    }), s.bind("touchend" + M, function() {
                        clearInterval(l), l = setInterval(function() {
                            return .01 > Math.abs(r.x) && .01 > Math.abs(r.y) ? (clearInterval(l), void 0) : (t(30 * r.x, 30 * r.y), r.x *= .8, r.y *= .8, void 0)
                        }, 10)
                    })
                },
                K = function() {
                    s.bind("scroll" + M, function() {
                        O()
                    })
                },
                Q = function() {
                    s.unbind(M), e(window).unbind(M), e(document).unbind(M), s.data("perfect-scrollbar", null), s.data("perfect-scrollbar-update", null), s.data("perfect-scrollbar-destroy", null), w.remove(), L.remove(), g.remove(), m.remove(), g = m = w = L = a = i = c = u = d = p = f = h = T = y = x = v = b = S = I = P = D = M = null
                },
                R = function(t) {
                    s.addClass("ie").addClass("ie" + t);
                    var o = function() {
                            var t = function() {
                                    e(this).addClass("hover")
                                },
                                o = function() {
                                    e(this).removeClass("hover")
                                };
                            s.bind("mouseenter" + M, t).bind("mouseleave" + M, o), g.bind("mouseenter" + M, t).bind("mouseleave" + M, o), m.bind("mouseenter" + M, t).bind("mouseleave" + M, o), w.bind("mouseenter" + M, t).bind("mouseleave" + M, o), L.bind("mouseenter" + M, t).bind("mouseleave" + M, o)
                        },
                        n = function() {
                            j = function() {
                                var e = {
                                    left: h + s.scrollLeft(),
                                    width: f
                                };
                                y ? e.bottom = T : e.top = x, w.css(e);
                                var t = {
                                    top: b + s.scrollTop(),
                                    height: v
                                };
                                I ? t.right = S : t.left = P, L.css(t), w.hide().show(), L.hide().show()
                            }
                        };
                    6 === t && (o(), n())
                },
                N = "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
                Z = function() {
                    var e = navigator.userAgent.toLowerCase().match(/(msie) ([\w.]+)/);
                    e && "msie" === e[1] && R(parseInt(e[2], 10)), O(), K(), E(), H(), F(), N && z(), s.mousewheel && q(), l.useKeyboard && B(), s.data("perfect-scrollbar", s), s.data("perfect-scrollbar-update", O), s.data("perfect-scrollbar-destroy", Q)
                };
            return Z(), s
        })
    }
}),
function(e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e : e(jQuery)
}(function(e) {
    function t(t) {
        var s = t || window.event,
            a = i.call(arguments, 1),
            c = 0,
            u = 0,
            d = 0,
            p = 0;
        if (t = e.event.fix(s), t.type = "mousewheel", "detail" in s && (d = -1 * s.detail), "wheelDelta" in s && (d = s.wheelDelta), "wheelDeltaY" in s && (d = s.wheelDeltaY), "wheelDeltaX" in s && (u = -1 * s.wheelDeltaX), "axis" in s && s.axis === s.HORIZONTAL_AXIS && (u = -1 * d, d = 0), c = 0 === d ? u : d, "deltaY" in s && (d = -1 * s.deltaY, c = d), "deltaX" in s && (u = s.deltaX, 0 === d && (c = -1 * u)), 0 !== d || 0 !== u) {
            if (1 === s.deltaMode) {
                var f = e.data(this, "mousewheel-line-height");
                c *= f, d *= f, u *= f
            } else if (2 === s.deltaMode) {
                var h = e.data(this, "mousewheel-page-height");
                c *= h, d *= h, u *= h
            }
            return p = Math.max(Math.abs(d), Math.abs(u)), (!l || l > p) && (l = p, n(s, p) && (l /= 40)), n(s, p) && (c /= 40, u /= 40, d /= 40), c = Math[c >= 1 ? "floor" : "ceil"](c / l), u = Math[u >= 1 ? "floor" : "ceil"](u / l), d = Math[d >= 1 ? "floor" : "ceil"](d / l), t.deltaX = u, t.deltaY = d, t.deltaFactor = l, t.deltaMode = 0, a.unshift(t, c, u, d), r && clearTimeout(r), r = setTimeout(o, 200), (e.event.dispatch || e.event.handle).apply(this, a)
        }
    }

    function o() {
        l = null
    }

    function n(e, t) {
        return u.settings.adjustOldDeltas && "mousewheel" === e.type && 0 === t % 120
    }
    var r, l, s = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        a = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        i = Array.prototype.slice;
    if (e.event.fixHooks)
        for (var c = s.length; c;) e.event.fixHooks[s[--c]] = e.event.mouseHooks;
    var u = e.event.special.mousewheel = {
        version: "3.1.9",
        setup: function() {
            if (this.addEventListener)
                for (var o = a.length; o;) this.addEventListener(a[--o], t, !1);
            else this.onmousewheel = t;
            e.data(this, "mousewheel-line-height", u.getLineHeight(this)), e.data(this, "mousewheel-page-height", u.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var e = a.length; e;) this.removeEventListener(a[--e], t, !1);
            else this.onmousewheel = null
        },
        getLineHeight: function(t) {
            return parseInt(e(t)["offsetParent" in e.fn ? "offsetParent" : "parent"]().css("fontSize"), 10)
        },
        getPageHeight: function(t) {
            return e(t).height()
        },
        settings: {
            adjustOldDeltas: !0
        }
    };
    e.fn.extend({
        mousewheel: function(e) {
            return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
        },
        unmousewheel: function(e) {
            return this.unbind("mousewheel", e)
        }
    })
});
/*! perfect-scrollbar - v0.4.11
 * http://noraesae.github.com/perfect-scrollbar/
 * Copyright (c) 2014 Hyeonje Alex Jun; Licensed MIT */
(function(e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? e(require("jquery")) : e(jQuery)
})(function(e) {
    "use strict";
    var t = {
            wheelSpeed: 10,
            wheelPropagation: !1,
            minScrollbarLength: null,
            maxScrollbarLength: null,
            useBothWheelAxes: !1,
            useKeyboard: !0,
            suppressScrollX: !1,
            suppressScrollY: !1,
            scrollXMarginOffset: 0,
            scrollYMarginOffset: 0,
            includePadding: !1
        },
        o = function() {
            var e = 0;
            return function() {
                var t = e;
                return e += 1, ".perfect-scrollbar-" + t
            }
        }();
    e.fn.perfectScrollbar = function(r, n) {
        return this.each(function() {
            var l = e.extend(!0, {}, t),
                s = e(this);
            if ("object" == typeof r ? e.extend(!0, l, r) : n = r, "update" === n) return s.data("perfect-scrollbar-update") && s.data("perfect-scrollbar-update")(), s;
            if ("destroy" === n) return s.data("perfect-scrollbar-destroy") && s.data("perfect-scrollbar-destroy")(), s;
            if (s.data("perfect-scrollbar")) return s.data("perfect-scrollbar");
            s.addClass("ps-container");
            var a, c, i, u, d, p, f, h, v, b, g = e("<div class='ps-scrollbar-x-rail'></div>").appendTo(s),
                m = e("<div class='ps-scrollbar-y-rail'></div>").appendTo(s),
                w = e("<div class='ps-scrollbar-x'></div>").appendTo(g),
                T = e("<div class='ps-scrollbar-y'></div>").appendTo(m),
                L = parseInt(g.css("bottom"), 10),
                y = L === L,
                I = y ? null : parseInt(g.css("top"), 10),
                S = parseInt(m.css("right"), 10),
                x = S === S,
                C = x ? null : parseInt(m.css("left"), 10),
                P = "rtl" === s.css("direction"),
                D = o(),
                X = parseInt(g.css("borderLeftWidth"), 10) + parseInt(g.css("borderRightWidth"), 10),
                Y = parseInt(g.css("borderTopWidth"), 10) + parseInt(g.css("borderBottomWidth"), 10),
                k = function(e, t) {
                    var o = e + t,
                        r = u - v;
                    b = 0 > o ? 0 : o > r ? r : o;
                    var n = parseInt(b * (p - u) / (u - v), 10);
                    s.scrollTop(n), y ? g.css({
                        bottom: L - n
                    }) : g.css({
                        top: I + n
                    })
                },
                M = function(e, t) {
                    var o = e + t,
                        r = i - f;
                    h = 0 > o ? 0 : o > r ? r : o;
                    var n = parseInt(h * (d - i) / (i - f), 10);
                    s.scrollLeft(n), x ? m.css({
                        right: S - n
                    }) : m.css({
                        left: C + n
                    })
                },
                W = function(e) {
                    return l.minScrollbarLength && (e = Math.max(e, l.minScrollbarLength)), l.maxScrollbarLength && (e = Math.min(e, l.maxScrollbarLength)), e
                },
                j = function() {
                    var e = {
                        width: i,
                        display: a ? "inherit" : "none"
                    };
                    e.left = P ? s.scrollLeft() + i - d : s.scrollLeft(), y ? e.bottom = L - s.scrollTop() : e.top = I + s.scrollTop(), g.css(e);
                    var t = {
                        top: s.scrollTop(),
                        height: u,
                        display: c ? "inherit" : "none"
                    };
                    x ? t.right = P ? d - s.scrollLeft() - S - T.outerWidth() : S - s.scrollLeft() : t.left = P ? s.scrollLeft() + 2 * i - d - C - T.outerWidth() : C + s.scrollLeft(), m.css(t), w.css({
                        left: h,
                        width: f - X
                    }), T.css({
                        top: b,
                        height: v - Y
                    }), a ? s.addClass("ps-active-x") : s.removeClass("ps-active-x"), c ? s.addClass("ps-active-y") : s.removeClass("ps-active-y")
                },
                E = function() {
                    i = l.includePadding ? s.innerWidth() : s.width(), u = l.includePadding ? s.innerHeight() : s.height(), d = s.prop("scrollWidth"), p = s.prop("scrollHeight"), !l.suppressScrollX && d > i + l.scrollXMarginOffset ? (a = !0, f = W(parseInt(i * i / d, 10)), h = parseInt(s.scrollLeft() * (i - f) / (d - i), 10)) : (a = !1, f = 0, h = 0, s.scrollLeft(0)), !l.suppressScrollY && p > u + l.scrollYMarginOffset ? (c = !0, v = W(parseInt(u * u / p, 10)), b = parseInt(s.scrollTop() * (u - v) / (p - u), 10)) : (c = !1, v = 0, b = 0, s.scrollTop(0)), b >= u - v && (b = u - v), h >= i - f && (h = i - f), j()
                },
                O = function() {
                    var t, o;
                    w.bind("mousedown" + D, function(e) {
                        o = e.pageX, t = w.position().left, g.addClass("in-scrolling"), e.stopPropagation(), e.preventDefault()
                    }), e(document).bind("mousemove" + D, function(e) {
                        g.hasClass("in-scrolling") && (M(t, e.pageX - o), e.stopPropagation(), e.preventDefault())
                    }), e(document).bind("mouseup" + D, function() {
                        g.hasClass("in-scrolling") && g.removeClass("in-scrolling")
                    }), t = o = null
                },
                q = function() {
                    var t, o;
                    T.bind("mousedown" + D, function(e) {
                        o = e.pageY, t = T.position().top, m.addClass("in-scrolling"), e.stopPropagation(), e.preventDefault()
                    }), e(document).bind("mousemove" + D, function(e) {
                        m.hasClass("in-scrolling") && (k(t, e.pageY - o), e.stopPropagation(), e.preventDefault())
                    }), e(document).bind("mouseup" + D, function() {
                        m.hasClass("in-scrolling") && m.removeClass("in-scrolling")
                    }), t = o = null
                },
                A = function(e, t) {
                    var o = s.scrollTop();
                    if (0 === e) {
                        if (!c) return !1;
                        if (0 === o && t > 0 || o >= p - u && 0 > t) return !l.wheelPropagation
                    }
                    var r = s.scrollLeft();
                    if (0 === t) {
                        if (!a) return !1;
                        if (0 === r && 0 > e || r >= d - i && e > 0) return !l.wheelPropagation
                    }
                    return !0
                },
                B = function() {
                    l.wheelSpeed /= 10;
                    var e = !1;
                    s.bind("mousewheel" + D, function(t, o, r, n) {
                        var i = t.deltaX * t.deltaFactor || r,
                            u = t.deltaY * t.deltaFactor || n;
                        e = !1, l.useBothWheelAxes ? c && !a ? (u ? s.scrollTop(s.scrollTop() - u * l.wheelSpeed) : s.scrollTop(s.scrollTop() + i * l.wheelSpeed), e = !0) : a && !c && (i ? s.scrollLeft(s.scrollLeft() + i * l.wheelSpeed) : s.scrollLeft(s.scrollLeft() - u * l.wheelSpeed), e = !0) : (s.scrollTop(s.scrollTop() - u * l.wheelSpeed), s.scrollLeft(s.scrollLeft() + i * l.wheelSpeed)), E(), e = e || A(i, u), e && (t.stopPropagation(), t.preventDefault())
                    }), s.bind("MozMousePixelScroll" + D, function(t) {
                        e && t.preventDefault()
                    })
                },
                F = function() {
                    var t = !1;
                    s.bind("mouseenter" + D, function() {
                        t = !0
                    }), s.bind("mouseleave" + D, function() {
                        t = !1
                    });
                    var o = !1;
                    e(document).bind("keydown" + D, function(r) {
                        if (!(r.isDefaultPrevented && r.isDefaultPrevented() || !t || e(document.activeElement).is(":input,[contenteditable]"))) {
                            var n = 0,
                                l = 0;
                            switch (r.which) {
                                case 37:
                                    n = -30;
                                    break;
                                case 38:
                                    l = 30;
                                    break;
                                case 39:
                                    n = 30;
                                    break;
                                case 40:
                                    l = -30;
                                    break;
                                case 33:
                                    l = 90;
                                    break;
                                case 32:
                                case 34:
                                    l = -90;
                                    break;
                                case 35:
                                    l = -u;
                                    break;
                                case 36:
                                    l = u;
                                    break;
                                default:
                                    return
                            }
                            s.scrollTop(s.scrollTop() - l), s.scrollLeft(s.scrollLeft() + n), o = A(n, l), o && r.preventDefault()
                        }
                    })
                },
                H = function() {
                    var e = function(e) {
                        e.stopPropagation()
                    };
                    T.bind("click" + D, e), m.bind("click" + D, function(e) {
                        var t = parseInt(v / 2, 10),
                            o = e.pageY - m.offset().top - t,
                            r = u - v,
                            n = o / r;
                        0 > n ? n = 0 : n > 1 && (n = 1), s.scrollTop((p - u) * n)
                    }), w.bind("click" + D, e), g.bind("click" + D, function(e) {
                        var t = parseInt(f / 2, 10),
                            o = e.pageX - g.offset().left - t,
                            r = i - f,
                            n = o / r;
                        0 > n ? n = 0 : n > 1 && (n = 1), s.scrollLeft((d - i) * n)
                    })
                },
                K = function() {
                    var t = function(e, t) {
                            s.scrollTop(s.scrollTop() - t), s.scrollLeft(s.scrollLeft() - e), E()
                        },
                        o = {},
                        r = 0,
                        n = {},
                        l = null,
                        a = !1;
                    e(window).bind("touchstart" + D, function() {
                        a = !0
                    }), e(window).bind("touchend" + D, function() {
                        a = !1
                    }), s.bind("touchstart" + D, function(e) {
                        var t = e.originalEvent.targetTouches[0];
                        o.pageX = t.pageX, o.pageY = t.pageY, r = (new Date).getTime(), null !== l && clearInterval(l), e.stopPropagation()
                    }), s.bind("touchmove" + D, function(e) {
                        if (!a && 1 === e.originalEvent.targetTouches.length) {
                            var l = e.originalEvent.targetTouches[0],
                                s = {};
                            s.pageX = l.pageX, s.pageY = l.pageY;
                            var c = s.pageX - o.pageX,
                                i = s.pageY - o.pageY;
                            t(c, i), o = s;
                            var u = (new Date).getTime(),
                                d = u - r;
                            d > 0 && (n.x = c / d, n.y = i / d, r = u), e.preventDefault()
                        }
                    }), s.bind("touchend" + D, function() {
                        clearInterval(l), l = setInterval(function() {
                            return .01 > Math.abs(n.x) && .01 > Math.abs(n.y) ? (clearInterval(l), void 0) : (t(30 * n.x, 30 * n.y), n.x *= .8, n.y *= .8, void 0)
                        }, 10)
                    })
                },
                z = function() {
                    s.bind("scroll" + D, function() {
                        E()
                    })
                },
                Q = function() {
                    s.unbind(D), e(window).unbind(D), e(document).unbind(D), s.data("perfect-scrollbar", null), s.data("perfect-scrollbar-update", null), s.data("perfect-scrollbar-destroy", null), w.remove(), T.remove(), g.remove(), m.remove(), g = m = w = T = a = c = i = u = d = p = f = h = L = y = I = v = b = S = x = C = P = D = null
                },
                R = function(t) {
                    s.addClass("ie").addClass("ie" + t);
                    var o = function() {
                            var t = function() {
                                    e(this).addClass("hover")
                                },
                                o = function() {
                                    e(this).removeClass("hover")
                                };
                            s.bind("mouseenter" + D, t).bind("mouseleave" + D, o), g.bind("mouseenter" + D, t).bind("mouseleave" + D, o), m.bind("mouseenter" + D, t).bind("mouseleave" + D, o), w.bind("mouseenter" + D, t).bind("mouseleave" + D, o), T.bind("mouseenter" + D, t).bind("mouseleave" + D, o)
                        },
                        r = function() {
                            j = function() {
                                var e = {
                                    left: h + s.scrollLeft(),
                                    width: f
                                };
                                y ? e.bottom = L : e.top = I, w.css(e);
                                var t = {
                                    top: b + s.scrollTop(),
                                    height: v
                                };
                                x ? t.right = S : t.left = C, T.css(t), w.hide().show(), T.hide().show()
                            }
                        };
                    6 === t && (o(), r())
                },
                G = "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
                J = function() {
                    var e = navigator.userAgent.toLowerCase().match(/(msie) ([\w.]+)/);
                    e && "msie" === e[1] && R(parseInt(e[2], 10)), E(), z(), O(), q(), H(), G && K(), s.mousewheel && B(), l.useKeyboard && F(), s.data("perfect-scrollbar", s), s.data("perfect-scrollbar-update", E), s.data("perfect-scrollbar-destroy", Q)
                };
            return J(), s
        })
    }
});
/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.3.15
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */

! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : "undefined" != typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function(a) {
    "use strict";
    var b = window.Slick || {};
    b = function() {
        function c(c, d) {
            var f, g, e = this;
            if (e.defaults = {
                    accessibility: !0,
                    adaptiveHeight: !1,
                    appendArrows: a(c),
                    appendDots: a(c),
                    arrows: !0,
                    asNavFor: null,
                    prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
                    nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
                    autoplay: !1,
                    autoplaySpeed: 3e3,
                    centerMode: !1,
                    centerPadding: "50px",
                    cssEase: "ease",
                    customPaging: function(a, b) {
                        return '<button type="button" data-role="none">' + (b + 1) + "</button>"
                    },
                    dots: !1,
                    dotsClass: "slick-dots",
                    draggable: !0,
                    easing: "linear",
                    fade: !1,
                    focusOnSelect: !1,
                    infinite: !0,
                    initialSlide: 0,
                    lazyLoad: "ondemand",
                    onBeforeChange: null,
                    onAfterChange: null,
                    onInit: null,
                    onReInit: null,
                    onSetPosition: null,
                    pauseOnHover: !0,
                    pauseOnDotsHover: !1,
                    respondTo: "window",
                    responsive: null,
                    rtl: !1,
                    slide: "div",
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 500,
                    swipe: !0,
                    swipeToSlide: !1,
                    touchMove: !0,
                    touchThreshold: 5,
                    useCSS: !0,
                    variableWidth: !1,
                    vertical: !1,
                    waitForAnimate: !0
                }, e.initials = {
                    animating: !1,
                    dragging: !1,
                    autoPlayTimer: null,
                    currentDirection: 0,
                    currentLeft: null,
                    currentSlide: 0,
                    direction: 1,
                    $dots: null,
                    listWidth: null,
                    listHeight: null,
                    loadIndex: 0,
                    $nextArrow: null,
                    $prevArrow: null,
                    slideCount: null,
                    slideWidth: null,
                    $slideTrack: null,
                    $slides: null,
                    sliding: !1,
                    slideOffset: 0,
                    swipeLeft: null,
                    $list: null,
                    touchObject: {},
                    transformsEnabled: !1
                }, a.extend(e, e.initials), e.activeBreakpoint = null, e.animType = null, e.animProp = null, e.breakpoints = [], e.breakpointSettings = [], e.cssTransitions = !1, e.paused = !1, e.positionProp = null, e.respondTo = null, e.shouldClick = !0, e.$slider = a(c), e.$slidesCache = null, e.transformType = null, e.transitionType = null, e.windowWidth = 0, e.windowTimer = null, e.options = a.extend({}, e.defaults, d), e.currentSlide = e.options.initialSlide, e.originalSettings = e.options, f = e.options.responsive || null, f && f.length > -1) {
                e.respondTo = e.options.respondTo || "window";
                for (g in f) f.hasOwnProperty(g) && (e.breakpoints.push(f[g].breakpoint), e.breakpointSettings[f[g].breakpoint] = f[g].settings);
                e.breakpoints.sort(function(a, b) {
                    return b - a
                })
            }
            e.autoPlay = a.proxy(e.autoPlay, e), e.autoPlayClear = a.proxy(e.autoPlayClear, e), e.changeSlide = a.proxy(e.changeSlide, e), e.clickHandler = a.proxy(e.clickHandler, e), e.selectHandler = a.proxy(e.selectHandler, e), e.setPosition = a.proxy(e.setPosition, e), e.swipeHandler = a.proxy(e.swipeHandler, e), e.dragHandler = a.proxy(e.dragHandler, e), e.keyHandler = a.proxy(e.keyHandler, e), e.autoPlayIterator = a.proxy(e.autoPlayIterator, e), e.instanceUid = b++, e.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, e.init(), e.checkResponsive()
        }
        var b = 0;
        return c
    }(), b.prototype.addSlide = function(b, c, d) {
        var e = this;
        if ("boolean" == typeof c) d = c, c = null;
        else if (0 > c || c >= e.slideCount) return !1;
        e.unload(), "number" == typeof c ? 0 === c && 0 === e.$slides.length ? a(b).appendTo(e.$slideTrack) : d ? a(b).insertBefore(e.$slides.eq(c)) : a(b).insertAfter(e.$slides.eq(c)) : d === !0 ? a(b).prependTo(e.$slideTrack) : a(b).appendTo(e.$slideTrack), e.$slides = e.$slideTrack.children(this.options.slide), e.$slideTrack.children(this.options.slide).detach(), e.$slideTrack.append(e.$slides), e.$slides.each(function(b, c) {
            a(c).attr("index", b)
        }), e.$slidesCache = e.$slides, e.reinit()
    }, b.prototype.animateSlide = function(b, c) {
        var d = {},
            e = this;
        if (1 === e.options.slidesToShow && e.options.adaptiveHeight === !0 && e.options.vertical === !1) {
            var f = e.$slides.eq(e.currentSlide).outerHeight(!0);
            e.$list.animate({
                height: f
            }, e.options.speed)
        }
        e.options.rtl === !0 && e.options.vertical === !1 && (b = -b), e.transformsEnabled === !1 ? e.options.vertical === !1 ? e.$slideTrack.animate({
            left: b
        }, e.options.speed, e.options.easing, c) : e.$slideTrack.animate({
            top: b
        }, e.options.speed, e.options.easing, c) : e.cssTransitions === !1 ? a({
            animStart: e.currentLeft
        }).animate({
            animStart: b
        }, {
            duration: e.options.speed,
            easing: e.options.easing,
            step: function(a) {
                e.options.vertical === !1 ? (d[e.animType] = "translate(" + a + "px, 0px)", e.$slideTrack.css(d)) : (d[e.animType] = "translate(0px," + a + "px)", e.$slideTrack.css(d))
            },
            complete: function() {
                c && c.call()
            }
        }) : (e.applyTransition(), d[e.animType] = e.options.vertical === !1 ? "translate3d(" + b + "px, 0px, 0px)" : "translate3d(0px," + b + "px, 0px)", e.$slideTrack.css(d), c && setTimeout(function() {
            e.disableTransition(), c.call()
        }, e.options.speed))
    }, b.prototype.asNavFor = function(b) {
        var c = this,
            d = null != c.options.asNavFor ? a(c.options.asNavFor).getSlick() : null;
        null != d && d.slideHandler(b, !0)
    }, b.prototype.applyTransition = function(a) {
        var b = this,
            c = {};
        c[b.transitionType] = b.options.fade === !1 ? b.transformType + " " + b.options.speed + "ms " + b.options.cssEase : "opacity " + b.options.speed + "ms " + b.options.cssEase, b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
    }, b.prototype.autoPlay = function() {
        var a = this;
        a.autoPlayTimer && clearInterval(a.autoPlayTimer), a.slideCount > a.options.slidesToShow && a.paused !== !0 && (a.autoPlayTimer = setInterval(a.autoPlayIterator, a.options.autoplaySpeed))
    }, b.prototype.autoPlayClear = function() {
        var a = this;
        a.autoPlayTimer && clearInterval(a.autoPlayTimer)
    }, b.prototype.autoPlayIterator = function() {
        var a = this;
        a.options.infinite === !1 ? 1 === a.direction ? (a.currentSlide + 1 === a.slideCount - 1 && (a.direction = 0), a.slideHandler(a.currentSlide + a.options.slidesToScroll)) : (0 === a.currentSlide - 1 && (a.direction = 1), a.slideHandler(a.currentSlide - a.options.slidesToScroll)) : a.slideHandler(a.currentSlide + a.options.slidesToScroll)
    }, b.prototype.buildArrows = function() {
        var b = this;
        b.options.arrows === !0 && b.slideCount > b.options.slidesToShow && (b.$prevArrow = a(b.options.prevArrow), b.$nextArrow = a(b.options.nextArrow), b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.appendTo(b.options.appendArrows), b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.appendTo(b.options.appendArrows), b.options.infinite !== !0 && b.$prevArrow.addClass("slick-disabled"))
    }, b.prototype.buildDots = function() {
        var c, d, b = this;
        if (b.options.dots === !0 && b.slideCount > b.options.slidesToShow) {
            for (d = '<ul class="' + b.options.dotsClass + '">', c = 0; c <= b.getDotCount(); c += 1) d += "<li>" + b.options.customPaging.call(this, b, c) + "</li>";
            d += "</ul>", b.$dots = a(d).appendTo(b.options.appendDots), b.$dots.find("li").first().addClass("slick-active")
        }
    }, b.prototype.buildOut = function() {
        var b = this;
        b.$slides = b.$slider.children(b.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), b.slideCount = b.$slides.length, b.$slides.each(function(b, c) {
            a(c).attr("index", b)
        }), b.$slidesCache = b.$slides, b.$slider.addClass("slick-slider"), b.$slideTrack = 0 === b.slideCount ? a('<div class="slick-track"/>').appendTo(b.$slider) : b.$slides.wrapAll('<div class="slick-track"/>').parent(), b.$list = b.$slideTrack.wrap('<div class="slick-list"/>').parent(), b.$slideTrack.css("opacity", 0), b.options.centerMode === !0 && (b.options.slidesToScroll = 1), a("img[data-lazy]", b.$slider).not("[src]").addClass("slick-loading"), b.setupInfinite(), b.buildArrows(), b.buildDots(), b.updateDots(), b.options.accessibility === !0 && b.$list.prop("tabIndex", 0), b.setSlideClasses("number" == typeof this.currentSlide ? this.currentSlide : 0), b.options.draggable === !0 && b.$list.addClass("draggable")
    }, b.prototype.checkResponsive = function() {
        var c, d, e, b = this,
            f = b.$slider.width(),
            g = window.innerWidth || a(window).width();
        if ("window" === b.respondTo ? e = g : "slider" === b.respondTo ? e = f : "min" === b.respondTo && (e = Math.min(g, f)), b.originalSettings.responsive && b.originalSettings.responsive.length > -1 && null !== b.originalSettings.responsive) {
            d = null;
            for (c in b.breakpoints) b.breakpoints.hasOwnProperty(c) && e < b.breakpoints[c] && (d = b.breakpoints[c]);
            null !== d ? null !== b.activeBreakpoint ? d !== b.activeBreakpoint && (b.activeBreakpoint = d, b.options = a.extend({}, b.originalSettings, b.breakpointSettings[d]), b.refresh()) : (b.activeBreakpoint = d, b.options = a.extend({}, b.originalSettings, b.breakpointSettings[d]), b.refresh()) : null !== b.activeBreakpoint && (b.activeBreakpoint = null, b.options = b.originalSettings, b.refresh())
        }
    }, b.prototype.changeSlide = function(b, c) {
        var f, g, h, i, j, d = this,
            e = a(b.target);
        switch (e.is("a") && b.preventDefault(), h = 0 !== d.slideCount % d.options.slidesToScroll, f = h ? 0 : (d.slideCount - d.currentSlide) % d.options.slidesToScroll, b.data.message) {
            case "previous":
                g = 0 === f ? d.options.slidesToScroll : d.options.slidesToShow - f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide - g, !1, c);
                break;
            case "next":
                g = 0 === f ? d.options.slidesToScroll : f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide + g, !1, c);
                break;
            case "index":
                var k = 0 === b.data.index ? 0 : b.data.index || a(b.target).parent().index() * d.options.slidesToScroll;
                if (i = d.getNavigableIndexes(), j = 0, i[k] && i[k] === k)
                    if (k > i[i.length - 1]) k = i[i.length - 1];
                    else
                        for (var l in i) {
                            if (k < i[l]) {
                                k = j;
                                break
                            }
                            j = i[l]
                        }
                    d.slideHandler(k, !1, c);
            default:
                return
        }
    }, b.prototype.clickHandler = function(a) {
        var b = this;
        b.shouldClick === !1 && (a.stopImmediatePropagation(), a.stopPropagation(), a.preventDefault())
    }, b.prototype.destroy = function() {
        var b = this;
        b.autoPlayClear(), b.touchObject = {}, a(".slick-cloned", b.$slider).remove(), b.$dots && b.$dots.remove(), b.$prevArrow && "object" != typeof b.options.prevArrow && b.$prevArrow.remove(), b.$nextArrow && "object" != typeof b.options.nextArrow && b.$nextArrow.remove(), b.$slides.parent().hasClass("slick-track") && b.$slides.unwrap().unwrap(), b.$slides.removeClass("slick-slide slick-active slick-center slick-visible").removeAttr("index").css({
            position: "",
            left: "",
            top: "",
            zIndex: "",
            opacity: "",
            width: ""
        }), b.$slider.removeClass("slick-slider"), b.$slider.removeClass("slick-initialized"), b.$list.off(".slick"), a(window).off(".slick-" + b.instanceUid), a(document).off(".slick-" + b.instanceUid)
    }, b.prototype.disableTransition = function(a) {
        var b = this,
            c = {};
        c[b.transitionType] = "", b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
    }, b.prototype.fadeSlide = function(a, b, c) {
        var d = this;
        d.cssTransitions === !1 ? (d.$slides.eq(b).css({
            zIndex: 1e3
        }), d.$slides.eq(b).animate({
            opacity: 1
        }, d.options.speed, d.options.easing, c), d.$slides.eq(a).animate({
            opacity: 0
        }, d.options.speed, d.options.easing)) : (d.applyTransition(b), d.applyTransition(a), d.$slides.eq(b).css({
            opacity: 1,
            zIndex: 1e3
        }), d.$slides.eq(a).css({
            opacity: 0
        }), c && setTimeout(function() {
            d.disableTransition(b), d.disableTransition(a), c.call()
        }, d.options.speed))
    }, b.prototype.filterSlides = function(a) {
        var b = this;
        null !== a && (b.unload(), b.$slideTrack.children(this.options.slide).detach(), b.$slidesCache.filter(a).appendTo(b.$slideTrack), b.reinit())
    }, b.prototype.getCurrent = function() {
        var a = this;
        return a.currentSlide
    }, b.prototype.getDotCount = function() {
        var a = this,
            b = 0,
            c = 0,
            d = 0;
        if (a.options.infinite === !0) d = Math.ceil(a.slideCount / a.options.slidesToScroll);
        else
            for (; b < a.slideCount;) ++d, b = c + a.options.slidesToShow, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
        return d - 1
    }, b.prototype.getLeft = function(a) {
        var c, d, g, b = this,
            e = 0;
        return b.slideOffset = 0, d = b.$slides.first().outerHeight(), b.options.infinite === !0 ? (b.slideCount > b.options.slidesToShow && (b.slideOffset = -1 * b.slideWidth * b.options.slidesToShow, e = -1 * d * b.options.slidesToShow), 0 !== b.slideCount % b.options.slidesToScroll && a + b.options.slidesToScroll > b.slideCount && b.slideCount > b.options.slidesToShow && (a > b.slideCount ? (b.slideOffset = -1 * (b.options.slidesToShow - (a - b.slideCount)) * b.slideWidth, e = -1 * (b.options.slidesToShow - (a - b.slideCount)) * d) : (b.slideOffset = -1 * b.slideCount % b.options.slidesToScroll * b.slideWidth, e = -1 * b.slideCount % b.options.slidesToScroll * d))) : a + b.options.slidesToShow > b.slideCount && (b.slideOffset = (a + b.options.slidesToShow - b.slideCount) * b.slideWidth, e = (a + b.options.slidesToShow - b.slideCount) * d), b.slideCount <= b.options.slidesToShow && (b.slideOffset = 0, e = 0), b.options.centerMode === !0 && b.options.infinite === !0 ? b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2) - b.slideWidth : b.options.centerMode === !0 && (b.slideOffset = 0, b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2)), c = b.options.vertical === !1 ? -1 * a * b.slideWidth + b.slideOffset : -1 * a * d + e, b.options.variableWidth === !0 && (g = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow), c = g[0] ? -1 * g[0].offsetLeft : 0, b.options.centerMode === !0 && (g = b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow + 1), c = g[0] ? -1 * g[0].offsetLeft : 0, c += (b.$list.width() - g.outerWidth()) / 2)), c
    }, b.prototype.getNavigableIndexes = function() {
        for (var a = this, b = 0, c = 0, d = []; b < a.slideCount;) d.push(b), b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
        return d
    }, b.prototype.getSlideCount = function() {
        var c, b = this;
        if (b.options.swipeToSlide === !0) {
            var d = null;
            return b.$slideTrack.find(".slick-slide").each(function(c, e) {
                return e.offsetLeft + a(e).outerWidth() / 2 > -1 * b.swipeLeft ? (d = e, !1) : void 0
            }), c = Math.abs(a(d).attr("index") - b.currentSlide)
        }
        return b.options.slidesToScroll
    }, b.prototype.init = function() {
        var b = this;
        a(b.$slider).hasClass("slick-initialized") || (a(b.$slider).addClass("slick-initialized"), b.buildOut(), b.setProps(), b.startLoad(), b.loadSlider(), b.initializeEvents(), b.updateArrows(), b.updateDots()), null !== b.options.onInit && b.options.onInit.call(this, b)
    }, b.prototype.initArrowEvents = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.on("click.slick", {
            message: "previous"
        }, a.changeSlide), a.$nextArrow.on("click.slick", {
            message: "next"
        }, a.changeSlide))
    }, b.prototype.initDotEvents = function() {
        var b = this;
        b.options.dots === !0 && b.slideCount > b.options.slidesToShow && a("li", b.$dots).on("click.slick", {
            message: "index"
        }, b.changeSlide), b.options.dots === !0 && b.options.pauseOnDotsHover === !0 && b.options.autoplay === !0 && a("li", b.$dots).on("mouseenter.slick", function() {
            b.paused = !0, b.autoPlayClear()
        }).on("mouseleave.slick", function() {
            b.paused = !1, b.autoPlay()
        })
    }, b.prototype.initializeEvents = function() {
        var b = this;
        b.initArrowEvents(), b.initDotEvents(), b.$list.on("touchstart.slick mousedown.slick", {
            action: "start"
        }, b.swipeHandler), b.$list.on("touchmove.slick mousemove.slick", {
            action: "move"
        }, b.swipeHandler), b.$list.on("touchend.slick mouseup.slick", {
            action: "end"
        }, b.swipeHandler), b.$list.on("touchcancel.slick mouseleave.slick", {
            action: "end"
        }, b.swipeHandler), b.$list.on("click.slick", b.clickHandler), b.options.pauseOnHover === !0 && b.options.autoplay === !0 && (b.$list.on("mouseenter.slick", function() {
            b.paused = !0, b.autoPlayClear()
        }), b.$list.on("mouseleave.slick", function() {
            b.paused = !1, b.autoPlay()
        })), b.options.accessibility === !0 && b.$list.on("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.options.slide, b.$slideTrack).on("click.slick", b.selectHandler), a(window).on("orientationchange.slick.slick-" + b.instanceUid, function() {
            b.checkResponsive(), b.setPosition()
        }), a(window).on("resize.slick.slick-" + b.instanceUid, function() {
            a(window).width() !== b.windowWidth && (clearTimeout(b.windowDelay), b.windowDelay = window.setTimeout(function() {
                b.windowWidth = a(window).width(), b.checkResponsive(), b.setPosition()
            }, 50))
        }), a("*[draggable!=true]", b.$slideTrack).on("dragstart", function(a) {
            a.preventDefault()
        }), a(window).on("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).on("ready.slick.slick-" + b.instanceUid, b.setPosition)
    }, b.prototype.initUI = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.show(), a.$nextArrow.show()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.show(), a.options.autoplay === !0 && a.autoPlay()
    }, b.prototype.keyHandler = function(a) {
        var b = this;
        37 === a.keyCode && b.options.accessibility === !0 ? b.changeSlide({
            data: {
                message: "previous"
            }
        }) : 39 === a.keyCode && b.options.accessibility === !0 && b.changeSlide({
            data: {
                message: "next"
            }
        })
    }, b.prototype.lazyLoad = function() {
        function g(b) {
            a("img[data-lazy]", b).each(function() {
                var b = a(this),
                    c = a(this).attr("data-lazy");
                b.load(function() {
                    b.animate({
                        opacity: 1
                    }, 200)
                }).css({
                    opacity: 0
                }).attr("src", c).removeAttr("data-lazy").removeClass("slick-loading")
            })
        }
        var c, d, e, f, b = this;
        b.options.centerMode === !0 ? b.options.infinite === !0 ? (e = b.currentSlide + (b.options.slidesToShow / 2 + 1), f = e + b.options.slidesToShow + 2) : (e = Math.max(0, b.currentSlide - (b.options.slidesToShow / 2 + 1)), f = 2 + (b.options.slidesToShow / 2 + 1) + b.currentSlide) : (e = b.options.infinite ? b.options.slidesToShow + b.currentSlide : b.currentSlide, f = e + b.options.slidesToShow, b.options.fade === !0 && (e > 0 && e--, f <= b.slideCount && f++)), c = b.$slider.find(".slick-slide").slice(e, f), g(c), b.slideCount <= b.options.slidesToShow ? (d = b.$slider.find(".slick-slide"), g(d)) : b.currentSlide >= b.slideCount - b.options.slidesToShow ? (d = b.$slider.find(".slick-cloned").slice(0, b.options.slidesToShow), g(d)) : 0 === b.currentSlide && (d = b.$slider.find(".slick-cloned").slice(-1 * b.options.slidesToShow), g(d))
    }, b.prototype.loadSlider = function() {
        var a = this;
        a.setPosition(), a.$slideTrack.css({
            opacity: 1
        }), a.$slider.removeClass("slick-loading"), a.initUI(), "progressive" === a.options.lazyLoad && a.progressiveLazyLoad()
    }, b.prototype.postSlide = function(a) {
        var b = this;
        null !== b.options.onAfterChange && b.options.onAfterChange.call(this, b, a), b.animating = !1, b.setPosition(), b.swipeLeft = null, b.options.autoplay === !0 && b.paused === !1 && b.autoPlay()
    }, b.prototype.progressiveLazyLoad = function() {
        var c, d, b = this;
        c = a("img[data-lazy]", b.$slider).length, c > 0 && (d = a("img[data-lazy]", b.$slider).first(), d.attr("src", d.attr("data-lazy")).removeClass("slick-loading").load(function() {
            d.removeAttr("data-lazy"), b.progressiveLazyLoad()
        }).error(function() {
            d.removeAttr("data-lazy"), b.progressiveLazyLoad()
        }))
    }, b.prototype.refresh = function() {
        var b = this,
            c = b.currentSlide;
        b.destroy(), a.extend(b, b.initials), b.init(), b.changeSlide({
            data: {
                message: "index",
                index: c
            }
        }, !0)
    }, b.prototype.reinit = function() {
        var b = this;
        b.$slides = b.$slideTrack.children(b.options.slide).addClass("slick-slide"), b.slideCount = b.$slides.length, b.currentSlide >= b.slideCount && 0 !== b.currentSlide && (b.currentSlide = b.currentSlide - b.options.slidesToScroll), b.slideCount <= b.options.slidesToShow && (b.currentSlide = 0), b.setProps(), b.setupInfinite(), b.buildArrows(), b.updateArrows(), b.initArrowEvents(), b.buildDots(), b.updateDots(), b.initDotEvents(), b.options.focusOnSelect === !0 && a(b.options.slide, b.$slideTrack).on("click.slick", b.selectHandler), b.setSlideClasses(0), b.setPosition(), null !== b.options.onReInit && b.options.onReInit.call(this, b)
    }, b.prototype.removeSlide = function(a, b, c) {
        var d = this;
        return "boolean" == typeof a ? (b = a, a = b === !0 ? 0 : d.slideCount - 1) : a = b === !0 ? --a : a, d.slideCount < 1 || 0 > a || a > d.slideCount - 1 ? !1 : (d.unload(), c === !0 ? d.$slideTrack.children().remove() : d.$slideTrack.children(this.options.slide).eq(a).remove(), d.$slides = d.$slideTrack.children(this.options.slide), d.$slideTrack.children(this.options.slide).detach(), d.$slideTrack.append(d.$slides), d.$slidesCache = d.$slides, d.reinit(), void 0)
    }, b.prototype.setCSS = function(a) {
        var d, e, b = this,
            c = {};
        b.options.rtl === !0 && (a = -a), d = "left" == b.positionProp ? a + "px" : "0px", e = "top" == b.positionProp ? a + "px" : "0px", c[b.positionProp] = a, b.transformsEnabled === !1 ? b.$slideTrack.css(c) : (c = {}, b.cssTransitions === !1 ? (c[b.animType] = "translate(" + d + ", " + e + ")", b.$slideTrack.css(c)) : (c[b.animType] = "translate3d(" + d + ", " + e + ", 0px)", b.$slideTrack.css(c)))
    }, b.prototype.setDimensions = function() {
        var b = this;
        if (b.options.vertical === !1 ? b.options.centerMode === !0 && b.$list.css({
                padding: "0px " + b.options.centerPadding
            }) : (b.$list.height(b.$slides.first().outerHeight(!0) * b.options.slidesToShow), b.options.centerMode === !0 && b.$list.css({
                padding: b.options.centerPadding + " 0px"
            })), b.listWidth = b.$list.width(), b.listHeight = b.$list.height(), b.options.vertical === !1 && b.options.variableWidth === !1) b.slideWidth = Math.ceil(b.listWidth / b.options.slidesToShow), b.$slideTrack.width(Math.ceil(b.slideWidth * b.$slideTrack.children(".slick-slide").length));
        else if (b.options.variableWidth === !0) {
            var c = 0;
            b.slideWidth = Math.ceil(b.listWidth / b.options.slidesToShow), b.$slideTrack.children(".slick-slide").each(function() {
                c += Math.ceil(a(this).outerWidth(!0))
            }), b.$slideTrack.width(Math.ceil(c) + 1)
        } else b.slideWidth = Math.ceil(b.listWidth), b.$slideTrack.height(Math.ceil(b.$slides.first().outerHeight(!0) * b.$slideTrack.children(".slick-slide").length));
        var d = b.$slides.first().outerWidth(!0) - b.$slides.first().width();
        b.options.variableWidth === !1 && b.$slideTrack.children(".slick-slide").width(b.slideWidth - d)
    }, b.prototype.setFade = function() {
        var c, b = this;
        b.$slides.each(function(d, e) {
            c = -1 * b.slideWidth * d, b.options.rtl === !0 ? a(e).css({
                position: "relative",
                right: c,
                top: 0,
                zIndex: 800,
                opacity: 0
            }) : a(e).css({
                position: "relative",
                left: c,
                top: 0,
                zIndex: 800,
                opacity: 0
            })
        }), b.$slides.eq(b.currentSlide).css({
            zIndex: 900,
            opacity: 1
        })
    }, b.prototype.setHeight = function() {
        var a = this;
        if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) {
            var b = a.$slides.eq(a.currentSlide).outerHeight(!0);
            a.$list.css("height", b)
        }
    }, b.prototype.setPosition = function() {
        var a = this;
        a.setDimensions(), a.setHeight(), a.options.fade === !1 ? a.setCSS(a.getLeft(a.currentSlide)) : a.setFade(), null !== a.options.onSetPosition && a.options.onSetPosition.call(this, a)
    }, b.prototype.setProps = function() {
        var a = this,
            b = document.body.style;
        a.positionProp = a.options.vertical === !0 ? "top" : "left", "top" === a.positionProp ? a.$slider.addClass("slick-vertical") : a.$slider.removeClass("slick-vertical"), (void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.msTransition) && a.options.useCSS === !0 && (a.cssTransitions = !0), void 0 !== b.OTransform && (a.animType = "OTransform", a.transformType = "-o-transform", a.transitionType = "OTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.MozTransform && (a.animType = "MozTransform", a.transformType = "-moz-transform", a.transitionType = "MozTransition", void 0 === b.perspectiveProperty && void 0 === b.MozPerspective && (a.animType = !1)), void 0 !== b.webkitTransform && (a.animType = "webkitTransform", a.transformType = "-webkit-transform", a.transitionType = "webkitTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.msTransform && (a.animType = "msTransform", a.transformType = "-ms-transform", a.transitionType = "msTransition", void 0 === b.msTransform && (a.animType = !1)), void 0 !== b.transform && a.animType !== !1 && (a.animType = "transform", a.transformType = "transform", a.transitionType = "transition"), a.transformsEnabled = null !== a.animType && a.animType !== !1
    }, b.prototype.setSlideClasses = function(a) {
        var c, d, e, f, b = this;
        b.$slider.find(".slick-slide").removeClass("slick-active").removeClass("slick-center"), d = b.$slider.find(".slick-slide"), b.options.centerMode === !0 ? (c = Math.floor(b.options.slidesToShow / 2), b.options.infinite === !0 && (a >= c && a <= b.slideCount - 1 - c ? b.$slides.slice(a - c, a + c + 1).addClass("slick-active") : (e = b.options.slidesToShow + a, d.slice(e - c + 1, e + c + 2).addClass("slick-active")), 0 === a ? d.eq(d.length - 1 - b.options.slidesToShow).addClass("slick-center") : a === b.slideCount - 1 && d.eq(b.options.slidesToShow).addClass("slick-center")), b.$slides.eq(a).addClass("slick-center")) : a >= 0 && a <= b.slideCount - b.options.slidesToShow ? b.$slides.slice(a, a + b.options.slidesToShow).addClass("slick-active") : d.length <= b.options.slidesToShow ? d.addClass("slick-active") : (f = b.slideCount % b.options.slidesToShow, e = b.options.infinite === !0 ? b.options.slidesToShow + a : a, b.options.slidesToShow == b.options.slidesToScroll && b.slideCount - a < b.options.slidesToShow ? d.slice(e - (b.options.slidesToShow - f), e + f).addClass("slick-active") : d.slice(e, e + b.options.slidesToShow).addClass("slick-active")), "ondemand" === b.options.lazyLoad && b.lazyLoad()
    }, b.prototype.setupInfinite = function() {
        var c, d, e, b = this;
        if (b.options.fade === !0 && (b.options.centerMode = !1), b.options.infinite === !0 && b.options.fade === !1 && (d = null, b.slideCount > b.options.slidesToShow)) {
            for (e = b.options.centerMode === !0 ? b.options.slidesToShow + 1 : b.options.slidesToShow, c = b.slideCount; c > b.slideCount - e; c -= 1) d = c - 1, a(b.$slides[d]).clone(!0).attr("id", "").attr("index", d - b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned");
            for (c = 0; e > c; c += 1) d = c, a(b.$slides[d]).clone(!0).attr("id", "").attr("index", d + b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned");
            b.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                a(this).attr("id", "")
            })
        }
    }, b.prototype.selectHandler = function(b) {
        var c = this,
            d = parseInt(a(b.target).parents(".slick-slide").attr("index"));
        return d || (d = 0), c.slideCount <= c.options.slidesToShow ? (c.$slider.find(".slick-slide").removeClass("slick-active"), c.$slides.eq(d).addClass("slick-active"), c.options.centerMode === !0 && (c.$slider.find(".slick-slide").removeClass("slick-center"), c.$slides.eq(d).addClass("slick-center")), c.asNavFor(d), void 0) : (c.slideHandler(d), void 0)
    }, b.prototype.slideHandler = function(a, b, c) {
        var d, e, f, g, i = null,
            j = this;
        return b = b || !1, j.animating === !0 && j.options.waitForAnimate === !0 || j.options.fade === !0 && j.currentSlide === a || j.slideCount <= j.options.slidesToShow ? void 0 : (b === !1 && j.asNavFor(a), d = a, i = j.getLeft(d), g = j.getLeft(j.currentSlide), j.currentLeft = null === j.swipeLeft ? g : j.swipeLeft, j.options.infinite === !1 && j.options.centerMode === !1 && (0 > a || a > j.getDotCount() * j.options.slidesToScroll) ? (j.options.fade === !1 && (d = j.currentSlide, c !== !0 ? j.animateSlide(g, function() {
            j.postSlide(d)
        }) : j.postSlide(d)), void 0) : j.options.infinite === !1 && j.options.centerMode === !0 && (0 > a || a > j.slideCount - j.options.slidesToScroll) ? (j.options.fade === !1 && (d = j.currentSlide, c !== !0 ? j.animateSlide(g, function() {
            j.postSlide(d)
        }) : j.postSlide(d)), void 0) : (j.options.autoplay === !0 && clearInterval(j.autoPlayTimer), e = 0 > d ? 0 !== j.slideCount % j.options.slidesToScroll ? j.slideCount - j.slideCount % j.options.slidesToScroll : j.slideCount + d : d >= j.slideCount ? 0 !== j.slideCount % j.options.slidesToScroll ? 0 : d - j.slideCount : d, j.animating = !0, null !== j.options.onBeforeChange && a !== j.currentSlide && j.options.onBeforeChange.call(this, j, j.currentSlide, e), f = j.currentSlide, j.currentSlide = e, j.setSlideClasses(j.currentSlide), j.updateDots(), j.updateArrows(), j.options.fade === !0 ? (c !== !0 ? j.fadeSlide(f, e, function() {
            j.postSlide(e)
        }) : j.postSlide(e), void 0) : (c !== !0 ? j.animateSlide(i, function() {
            j.postSlide(e)
        }) : j.postSlide(e), void 0)))
    }, b.prototype.startLoad = function() {
        var a = this;
        a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.hide(), a.$nextArrow.hide()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.hide(), a.$slider.addClass("slick-loading")
    }, b.prototype.swipeDirection = function() {
        var a, b, c, d, e = this;
        return a = e.touchObject.startX - e.touchObject.curX, b = e.touchObject.startY - e.touchObject.curY, c = Math.atan2(b, a), d = Math.round(180 * c / Math.PI), 0 > d && (d = 360 - Math.abs(d)), 45 >= d && d >= 0 ? e.options.rtl === !1 ? "left" : "right" : 360 >= d && d >= 315 ? e.options.rtl === !1 ? "left" : "right" : d >= 135 && 225 >= d ? e.options.rtl === !1 ? "right" : "left" : "vertical"
    }, b.prototype.swipeEnd = function() {
        var b = this;
        if (b.dragging = !1, b.shouldClick = b.touchObject.swipeLength > 10 ? !1 : !0, void 0 === b.touchObject.curX) return !1;
        if (b.touchObject.swipeLength >= b.touchObject.minSwipe) switch (b.swipeDirection()) {
            case "left":
                b.slideHandler(b.currentSlide + b.getSlideCount()), b.currentDirection = 0, b.touchObject = {};
                break;
            case "right":
                b.slideHandler(b.currentSlide - b.getSlideCount()), b.currentDirection = 1, b.touchObject = {}
        } else b.touchObject.startX !== b.touchObject.curX && (b.slideHandler(b.currentSlide), b.touchObject = {})
    }, b.prototype.swipeHandler = function(a) {
        var b = this;
        if (!(b.options.swipe === !1 || "ontouchend" in document && b.options.swipe === !1 || b.options.draggable === !1 && -1 !== a.type.indexOf("mouse"))) switch (b.touchObject.fingerCount = a.originalEvent && void 0 !== a.originalEvent.touches ? a.originalEvent.touches.length : 1, b.touchObject.minSwipe = b.listWidth / b.options.touchThreshold, a.data.action) {
            case "start":
                b.swipeStart(a);
                break;
            case "move":
                b.swipeMove(a);
                break;
            case "end":
                b.swipeEnd(a)
        }
    }, b.prototype.swipeMove = function(a) {
        var c, d, e, f, b = this;
        return f = void 0 !== a.originalEvent ? a.originalEvent.touches : null, !b.dragging || f && 1 !== f.length ? !1 : (c = b.getLeft(b.currentSlide), b.touchObject.curX = void 0 !== f ? f[0].pageX : a.clientX, b.touchObject.curY = void 0 !== f ? f[0].pageY : a.clientY, b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curX - b.touchObject.startX, 2))), d = b.swipeDirection(), "vertical" !== d ? (void 0 !== a.originalEvent && b.touchObject.swipeLength > 4 && a.preventDefault(), e = (b.options.rtl === !1 ? 1 : -1) * (b.touchObject.curX > b.touchObject.startX ? 1 : -1), b.swipeLeft = b.options.vertical === !1 ? c + b.touchObject.swipeLength * e : c + b.touchObject.swipeLength * (b.$list.height() / b.listWidth) * e, b.options.fade === !0 || b.options.touchMove === !1 ? !1 : b.animating === !0 ? (b.swipeLeft = null, !1) : (b.setCSS(b.swipeLeft), void 0)) : void 0)
    }, b.prototype.swipeStart = function(a) {
        var c, b = this;
        return 1 !== b.touchObject.fingerCount || b.slideCount <= b.options.slidesToShow ? (b.touchObject = {}, !1) : (void 0 !== a.originalEvent && void 0 !== a.originalEvent.touches && (c = a.originalEvent.touches[0]), b.touchObject.startX = b.touchObject.curX = void 0 !== c ? c.pageX : a.clientX, b.touchObject.startY = b.touchObject.curY = void 0 !== c ? c.pageY : a.clientY, b.dragging = !0, void 0)
    }, b.prototype.unfilterSlides = function() {
        var a = this;
        null !== a.$slidesCache && (a.unload(), a.$slideTrack.children(this.options.slide).detach(), a.$slidesCache.appendTo(a.$slideTrack), a.reinit())
    }, b.prototype.unload = function() {
        var b = this;
        a(".slick-cloned", b.$slider).remove(), b.$dots && b.$dots.remove(), b.$prevArrow && "object" != typeof b.options.prevArrow && b.$prevArrow.remove(), b.$nextArrow && "object" != typeof b.options.nextArrow && b.$nextArrow.remove(), b.$slides.removeClass("slick-slide slick-active slick-visible").css("width", "")
    }, b.prototype.updateArrows = function() {
        var b, a = this;
        b = Math.floor(a.options.slidesToShow / 2), a.options.arrows === !0 && a.options.infinite !== !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.removeClass("slick-disabled"), a.$nextArrow.removeClass("slick-disabled"), 0 === a.currentSlide ? (a.$prevArrow.addClass("slick-disabled"), a.$nextArrow.removeClass("slick-disabled")) : a.currentSlide >= a.slideCount - a.options.slidesToShow && a.options.centerMode === !1 ? (a.$nextArrow.addClass("slick-disabled"), a.$prevArrow.removeClass("slick-disabled")) : a.currentSlide > a.slideCount - a.options.slidesToShow + b && a.options.centerMode === !0 && (a.$nextArrow.addClass("slick-disabled"), a.$prevArrow.removeClass("slick-disabled")))
    }, b.prototype.updateDots = function() {
        var a = this;
        null !== a.$dots && (a.$dots.find("li").removeClass("slick-active"), a.$dots.find("li").eq(Math.floor(a.currentSlide / a.options.slidesToScroll)).addClass("slick-active"))
    }, a.fn.slick = function(a) {
        var c = this;
        return c.each(function(c, d) {
            d.slick = new b(d, a)
        })
    }, a.fn.slickAdd = function(a, b, c) {
        var d = this;
        return d.each(function(d, e) {
            e.slick.addSlide(a, b, c)
        })
    }, a.fn.slickCurrentSlide = function() {
        var a = this;
        return a.get(0).slick.getCurrent()
    }, a.fn.slickFilter = function(a) {
        var b = this;
        return b.each(function(b, c) {
            c.slick.filterSlides(a)
        })
    }, a.fn.slickGoTo = function(a, b) {
        var c = this;
        return c.each(function(c, d) {
            d.slick.changeSlide({
                data: {
                    message: "index",
                    index: parseInt(a)
                }
            }, b)
        })
    }, a.fn.slickNext = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.changeSlide({
                data: {
                    message: "next"
                }
            })
        })
    }, a.fn.slickPause = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.autoPlayClear(), b.slick.paused = !0
        })
    }, a.fn.slickPlay = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.paused = !1, b.slick.autoPlay()
        })
    }, a.fn.slickPrev = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.changeSlide({
                data: {
                    message: "previous"
                }
            })
        })
    }, a.fn.slickRemove = function(a, b) {
        var c = this;
        return c.each(function(c, d) {
            d.slick.removeSlide(a, b)
        })
    }, a.fn.slickRemoveAll = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.removeSlide(null, null, !0)
        })
    }, a.fn.slickGetOption = function(a) {
        var b = this;
        return b.get(0).slick.options[a]
    }, a.fn.slickSetOption = function(a, b, c) {
        var d = this;
        return d.each(function(d, e) {
            e.slick.options[a] = b, c === !0 && (e.slick.unload(), e.slick.reinit())
        })
    }, a.fn.slickUnfilter = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick.unfilterSlides()
        })
    }, a.fn.unslick = function() {
        var a = this;
        return a.each(function(a, b) {
            b.slick && b.slick.destroy()
        })
    }, a.fn.getSlick = function() {
        var a = null,
            b = this;
        return b.each(function(b, c) {
            a = c.slick
        }), a
    }
});

/*!
 *
 *  Project:  Dame Jidlo
 *  Author:   Petr Urbanek - www.r4ms3s.cz
 *  Twitter:  @r4ms3scz
 *
 * @param {Object} window, document, undefined
 *
 */
(function() {
    "use strict";
    var r4 = window.r4 = {
        utils: {},
        validate: {},
        cache: {},
        vars: {}
    };
    if ("undefined" === typeof console) {
        window.console = {
            log: function() {}
        };
    }
    window.BrowserDetect = {
        init: function() {
            this.browser = this.searchString(this.dataBrowser) || "Other";
            this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
        },
        searchString: function(data) {
            for (var i = 0; i < data.length; i++) {
                var dataString = data[i].string;
                this.versionSearchString = data[i].subString;
                if (dataString.indexOf(data[i].subString) != -1) {
                    return data[i].identity;
                }
            }
        },
        searchVersion: function(dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index == -1) return;
            return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
        },
        dataBrowser: [{
            string: navigator.userAgent,
            subString: "Chrome",
            identity: "Chrome"
        }, {
            string: navigator.userAgent,
            subString: "MSIE",
            identity: "Explorer"
        }, {
            string: navigator.userAgent,
            subString: "Firefox",
            identity: "Firefox"
        }, {
            string: navigator.userAgent,
            subString: "Safari",
            identity: "Safari"
        }, {
            string: navigator.userAgent,
            subString: "Opera",
            identity: "Opera"
        }]
    };
    window.BrowserDetect.init();
    r4.validate.email = function(email) {
        return (/^("([ !\x23-\x5B\x5D-\x7E]*|\\[ -~])+"|[-a-z0-9!#$%&'*+\/=?^_`{|}~]+(\.[-a-z0-9!#$%&'*+\/=?^_`{|}~]+)*)@([0-9a-z\u00C0-\u02FF\u0370-\u1EFF]([-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,61}[0-9a-z\u00C0-\u02FF\u0370-\u1EFF])?\.)+[a-z\u00C0-\u02FF\u0370-\u1EFF][-0-9a-z\u00C0-\u02FF\u0370-\u1EFF]{0,17}[a-z\u00C0-\u02FF\u0370-\u1EFF]$/i).test(email);
    };
    r4.cache.window = $(window);
    r4.cache.document = $(document);
    r4.cache.html = $('html');
    r4.cache.body = $('body');
    r4.cache.user = r4.cache.html.find('body > .user');
    r4.cache.page = r4.cache.body.find('.page');
    r4.cache.header = r4.cache.body.find('header');
    r4.cache.footer = r4.cache.body.find('footer');
    r4.cache.section = r4.cache.body.find('section');
    r4.cache.overlay = r4.cache.body.find('.overlay');
    r4.cache.login = r4.cache.body.find('.lightbox.login');
    r4.cache.ingredients = r4.cache.body.find('.popup.additions');
    r4.cache.basePath = r4.cache.body.data("basepath");
    r4.cache.baseUrl = r4.cache.body.data("baseurl");
    r4.cache.body.on('mouseenter mouseleave', 'a.tip, a.inlinetip, span.tip[data-tip]', function(e) {
        e.preventDefault();
        var a = $(this),
            tooltip = $('.tooltip'),
            text = null,
            l = e.pageX - Math.round((tooltip.width() + parseInt(tooltip.css("padding-left"), 10) + parseInt(tooltip.css("padding-right"), 10)) / 2),
            t = e.pageY;
        var attr = $(this).attr('data-tip');
        if (typeof attr !== typeof undefined && attr !== false) {
            text = a.data("tip");
        } else {
            text = a.attr('rel');
        }
        if (e.type === 'mouseenter') {
            tooltip.html(text).show();
            tooltip.css({
                left: l + 'px',
                top: t - tooltip.innerHeight() - 25 + 'px'
            });
        } else {
            tooltip.removeAttr('style').html('').hide();
        }
    });
    if ($('aside:not(".rightColumn")').length) {
        $('div.breadcrumb').addClass('aside');
    }
    r4.cache.body.on('click', '.filters li.more > a', function(e) {
        e.preventDefault();
        var more = $(this).closest('li.more').find('ul');
        more.css({
            marginLeft: '-20px'
        }).toggle();
    });
    r4.cache.body.ready(function() {
        r4.cache.body.find("#lightbox-address-required input[name=street]").focus();
    });
    r4.cache.body.on('change', 'select[data-expand]', function() {
        var sel = $(this),
            values = sel.data('expand'),
            value = values[sel.val()];
        $.each(sel.data('expand-map'), function(key, id) {
            $('#' + id).val(value[key]);
        });
    });
    r4.cache.body.find('.filter .time form select').on('change', function() {
        $(this.form).trigger('submit');
    });
    r4.cache.body.on('click', '.onClickSelect', function() {
        $(this).select();
    });
    r4.cache.body.on('click', '.detail-cart button[name=order]', function(e) {
        var button = $(this);
        if (button.is('.confirmAdditionalCharge')) {
            $("#" + $(this).attr("rel")).show();
            $(".overlay").show();
            e.preventDefault();
            return false;
        }
        $.nette.ajax({}, button, e);
    });
    r4.cache.body.on('click', '.lightbox-charge .continue', function() {
        $(".lightbox-charge").hide();
        $(".overlay").hide();
        return false;
    });
})(window, document);
$.nette.ext('addressControl', {
    init: function() {
        this.bind(r4.cache.body.find(this.selector));
    },
    success: function(payload) {
        var snippets, self = this;
        if (!payload.snippets || !(snippets = this.ext('snippets'))) return;
        for (var id in payload.snippets) {
            snippets.getElement(id).find(self.selector).each(function() {
                self.bind($(this));
            });
        }
    }
}, {
    selector: "input[data-name=addresses]",
    bind: function(inputs) {
        var extension = this;
        inputs.each(function() {
            var self = $(this);
            var form = self.closest('form');
            self.on('typeahead:selected', function(e) {
                if (extension.shouldAutoSubmit(self)) {
                    form.submit();
                }
            });
            var options = {};
            $.each(self.data(), function(key, val) {
                options[key] = val;
            });
            var engine = new Bloodhound({
                name: options.name,
                local: options.local.map(function(str) {
                    return {
                        value: str
                    };
                }),
                datumTokenizer: function(d) {
                    return Bloodhound.tokenizers.whitespace(d.value);
                },
                filter: function(s) {
                    console.log(s)
                },
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                limit: options.limit
            });
            engine.initialize();
            engine.ttAdapter('brno', function(data) {
                console.log('success');
            });
            self.typeahead({
                hint: false
            }, {
                name: options.name,
                source: engine.ttAdapter()
            });
        });
    },
    shouldAutoSubmit: function(input) {
        return input.is(":visible") && input.hasClass("autosubmit");
    }
});
$.nette.ext('ajaxOverlay', {
    before: function(xhr, settings) {
        if (!settings.nette || !settings.nette.el) {
            return;
        }
        var tar = $(settings.nette.el);
        var container = tar.closest('.overlay-on-ajax');
        var text = container.data('overlay-text');
        if (typeof text == 'undefined') {
            text = 'Načítám, počkejte prosím...';
        }
        if (container.length == 0) {
            return;
        }
        var otherTarget = $(container.data('overlay-el'));
        if (otherTarget.length) {
            container = otherTarget.css({
                'position': 'relative'
            });
        }
        if (!this.overlay) {
            this.overlay = $('<div class="overlay ajaxOverlay"><p>' + text + '</p></div>');
        }
        this.container = container;
        this.overlay.appendTo(this.container);
        this.overlay.show();
    },
    success: function(payload) {
        if (!this.overlay) {
            return;
        }
        this.hide();
    },
    error: function(xhr, status) {
        this.showMessageAndFade("Je nám líto, ale něco se pokazilo.<br>Zkuste to za chvíli znovu.");
        $('html').removeClass('disableBodyScroll');
    }
}, {
    container: null,
    overlay: null,
    keepOpen: false,
    hide: function() {
        if (!this.overlay || this.keepOpen) {
            return;
        }
        this.overlay.remove();
        this.overlay = null;
    },
    message: function(message) {
        if (!this.overlay) {
            return;
        }
        this.overlay.find('p').html(message);
    },
    showMessageAndFade: function(message, delay) {
        var self = this;
        if (typeof(delay) == 'undefined') {
            delay = 3000;
        }
        this.keepOpen = false;
        this.message(message);
        setTimeout(function() {
            self.hide();
        }, delay);
    }
});
$.nette.ext('autocomplete', {
    init: function() {
        var self = this;
        this.ext('snippets').after(function($el) {
            $el.find(self.selector).each(self.autocomplete);
        });
        $(this.selector).each(self.autocomplete);
    }
}, {
    selector: '[data-autocomplete-url]',
    autocomplete: function() {
        var $el = $(this);
        var url = $el.data('autocomplete-url');
        var warehouseId = $el.data('warehouse-id');
        $el.on('typeahead:selected', function(e, item) {
            if (item.hasOwnProperty('popupLink')) {
                $.nette.ext('productPopup').open(item.popupLink, this, e);
            } else if (item.hasOwnProperty('link')) {
                window.location = item.link;
            }
        });
        var resultInfo = {
            productsFooter: ''
        };
        var requests = {};
        var source = function(filter) {
            return function(query, cb) {
                if (!requests.hasOwnProperty(query)) {
                    requests[query] = $.ajax({
                        url: url,
                        type: 'get',
                        crossDomain: true,
                        data: {
                            search: query,
                            warehouse_id: warehouseId
                        }
                    });
                }
                requests[query].done(function(data) {
                    resultInfo.productsFooter = data.productsFooter;
                    cb(filter(data));
                });
            };
        };
        var productsDataset = {
            source: source(function(data) {
                return data.products;
            }),
            templates: {
                header: '<h3 class="headline topBorder">Nalezené produkty</h3>',
                footer: function() {
                    return resultInfo.productsFooter;
                },
                suggestion: function(item) {
                    if (item.hasOwnProperty('html')) {
                        return item.html;
                    }
                    var div = document.createElement('div');
                    div.className = 'tt-suggestion';
                    div.appendChild(document.createTextNode(item.value));
                    return div;
                }
            }
        };
        var categoriesDataset = {
            source: source(function(data) {
                return data.categories;
            }),
            templates: {
                header: '<h3 class="headline">Nalezené kategorie</h3>',
                suggestion: function(item) {
                    if (item.hasOwnProperty('html')) {
                        return item.html;
                    }
                    var div = document.createElement('div');
                    div.className = 'tt-suggestion';
                    div.appendChild(document.createTextNode(item.value));
                    return div;
                }
            }
        };
        $el.typeahead({
            minLength: 3,
            hint: false
        }, categoriesDataset, productsDataset);
    }
});
(function() {
    $.nette.ext('basket', {
        init: function() {
            if ($('div.basket').length) {
                this.firstInit();
            }
        },
        success: function() {
            this.place();
        }
    }, {
        element: false,
        items: 0,
        head: 0,
        foot: 0,
        footer: 0,
        offset: 0,
        mobileRecipes: false,
        basketHeaderButton: null,
        firstInit: function() {
            var self = this;
            this.offset = $('div.basket').offset().top;
            this.isMobileRecipes();
            this.place();
        },
        isMobileRecipes: function() {
            if ($('nav.recipesNav a.menu').is(":visible")) {
                this.mobileRecipes = true;
            }
        },
        place: function() {
            var self = this;
            this.element = $('div.basket');
            if (!this.element.length) {
                return false;
            }
            this.basketHeaderButton = this.element.find('div.header button');
            this.isInCart();
            this.setPosition();
            $(window).scroll(function() {
                self.setPosition();
            });
            $(window).resize(function() {
                self.setPosition();
            });
        },
        mobileRecipesClickCart: function() {
            this.basketHeaderButton.on('click', function() {
                if (this.element.hasClass('basketOverlay')) {
                    $('html').removeClass('overlay');
                    this.element.removeClass('basketOverlay');
                } else {
                    $('html').addClass('overlay');
                    this.element.addClass('basketOverlay');
                }
                return false;
            });
        },
        setPosition: function() {
            if (this.mobileRecipes) {
                this.mobileRecipesClickCart();
            } else {
                this.basketHeaderButton.off('click');
                this.footer = $('footer').height();
                this.items = this.element.find('div.items').height();
                this.head = this.element.find('div.header').height();
                this.foot = this.element.find('div.footer').height();
                var view = $(window).height();
                var bodyHeight = $('body').height();
                var page = $(document).height();
                var top = $(document).scrollTop();
                var larger = top < this.offset ? top : this.offset;
                var shorter;
                if (top > page - view - this.footer) {
                    shorter = this.footer - (page - top - view);
                } else {
                    shorter = 0;
                }
                var height = view - this.offset - this.head - this.foot + larger - shorter;
                if (bodyHeight < view) {
                    height -= view - bodyHeight;
                }
                this.element.find('div.items').height(height + "px");
                if (this.offset < top) {
                    $('div.basket').addClass('fixed');
                } else {
                    $('div.basket').removeClass('fixed');
                }
            }
            this.setScrollBar();
        },
        setScrollBar: function() {
            this.element.find('div.items').perfectScrollbar({
                suppressScrollX: true,
                wheelPropagation: true
            });
        },
        isInCart: function() {
            var contentList = $('div.content.list');
            if (contentList.length) {
                if (this.element.hasClass("productsInBasket") && !contentList.hasClass("open")) {
                    contentList.addClass("open");
                } else if (!this.element.hasClass("productsInBasket") && contentList.hasClass("open")) {
                    contentList.removeClass("open");
                }
            }
        }
    });
})();
(function() {
    $.nette.ext('carousel', {
        init: function() {
            var self = this;
            $('div.hpCarousel').each(function(index, element) {
                self.initCarousel($(element));
            })
        }
    }, {
        initCarousel: function(obj) {
            var slidesCount = obj.data("slides-count");
            if (!slidesCount) {
                slidesCount = 5;
            }
            var smallResSlidesCount = obj.data("slides-count-small");
            if (!smallResSlidesCount) {
                smallResSlidesCount = 4;
            }
            this.bindCarousel(obj, slidesCount, smallResSlidesCount);
        },
        bindCarousel: function(obj, slides, smallResSlides) {
            obj.find('.items').slick({
                infinite: true,
                slidesToShow: slides,
                slidesToScroll: slides,
                prevArrow: '<a href="javascript:;" class="hpSlider slick-prev gtmPushClick">&lsaquo;</a>',
                nextArrow: '<a href="javascript:;" class="hpSlider slick-next gtmPushClick">&rsaquo;</a>',
                slide: 'article',
                appendArrows: obj.find('.container'),
                autoplay: true,
                autoplaySpeed: 20000,
                responsive: [{
                    breakpoint: 1260,
                    settings: {
                        slidesToShow: smallResSlides,
                        slidesToScroll: smallResSlides
                    }
                }]
            });
        },
        bindPopup: function(tabs) {
            var bindCarousel = function(el) {
                el.slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    prevArrow: '<a href="javascript:;" class="detailSlider prev slick-prev gtmPushClick">&lsaquo;</a>',
                    nextArrow: '<a href="javascript:;" class="detailSlider next slick-next gtmPushClick">&rsaquo;</a>',
                    slide: 'article',
                    appendArrows: el.closest('.tab')
                });
            };
            tabs.find('.items .productList').each(function() {
                bindCarousel($(this));
            });
            var bindRecipesCarousel = function(el) {
                el.slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    prevArrow: '<a href="javascript:;" class="detailSlider prev slick-prev gtmPushClick">&lsaquo;</a>',
                    nextArrow: '<a href="javascript:;" class="detailSlider next slick-next gtmPushClick">&rsaquo;</a>',
                    slide: 'article',
                    appendArrows: el.closest('.tab')
                });
            };
            tabs.find('.recipes .productList').each(function() {
                bindRecipesCarousel($(this));
            });
        }
    });
})();
$.nette.ext('confirm', {
    before: function(xhr, settings) {
        var analyze = settings.nette;
        if (!analyze) return;
        var e = analyze.e;
        var $el = $(analyze.el);
        if ($el.is('[data-confirm]')) {
            var confirm = window.confirm($el.data('confirm'));
            if (!confirm) {
                e.stopImmediatePropagation();
                e.preventDefault();
                return false;
            }
        }
    }
});
$.nette.ext('copyAddressFromHeader', {
    init: function() {
        var self = this;
        this.bind($('body'));
        this.ext('snippets').after(function($snippet) {
            self.bind($snippet);
        });
    }
}, {
    bind: function($el) {
        $el.find('a#copyAddressFromHeader').each(function() {
            var el = $(this);
            el.zclip({
                path: el.data('basepath') + '/js/ZeroClipboard.swf',
                copy: function() {
                    return el.data('url');
                },
                clickAfter: false
            });
        });
    }
});
(function() {
    $.nette.ext('copyToClipboard', {
        init: function() {
            var elements = $('body').find(".copyToClipboard");
            if (elements.length) {
                this.assignZclip(elements);
            }
            var self = this;
            this.ext('snippets').after(function($el) {
                var elements = $el.find(".copyToClipboard");
                if (elements.length) {
                    self.assignZclip(elements);
                }
            });
        }
    }, {
        assignZclip: function($el) {
            $el.each(function() {
                var el = $(this);
                el.zclip({
                    path: el.data('basepath') + '/js/ZeroClipboard.swf',
                    copy: function() {
                        return el.data('url');
                    },
                    afterCopy: function() {
                        el.text("zkopírováno");
                    },
                    setHandCursor: true,
                    clickAfter: false,
                    setCSSEffects: true
                });
            });
        }
    });
})();
(function(undefined) {
    $.nette.ext('damejidlo', {
        init: function() {
            if ($('.popup.additions').length) {
                $(".overlay").addClass("white").show();
                this.displayIngredients();
            }
            this.addressTypeahead($("body"));
        },
        success: function(payload) {
            var snippets, self = this,
                id, el;
            if (!payload || !payload.snippets || !(snippets = this.ext('snippets'))) return;
            for (id in payload.snippets) {
                el = snippets.getElement(id);
                el.find('input[type=checkbox], input[type=radio]').each(function() {
                    self.ext('inputReplacement').replace(this);
                });
                el.find('input[type=text], textarea').each(function() {
                    self.ext('inputPlaceholder').inputPlaceholderHide(this);
                });
                el.find('.additions').each(function() {
                    $(".overlay").addClass("white").show();
                    self.displayIngredients();
                    if (BrowserDetect.browser !== 'Explorer' || BrowserDetect.version > 8) {
                        $(this).on('click', 'input[type=submit], button[type=submit]', function(e) {
                            e.preventDefault();
                            $.nette.ajax({
                                success: function() {
                                    $(".overlay").removeClass("white").hide();
                                }
                            }, this, e);
                        });
                    }
                });
                this.addressTypeahead(el);
            }
        }
    }, {
        displayIngredients: function() {
            var a = $('.popup.additions');
            var h = $(window).height();
            var itemId = a.data("item");
            if (itemId !== undefined && itemId !== null) {
                var top = $("#item" + itemId).offset().top;
                if (top !== undefined) {
                    a.css({
                        top: (top - $('header').outerHeight()) + "px"
                    });
                    $('html,body').animate({
                        scrollTop: top
                    }, 200);
                }
            } else {
                a.css({
                    top: ((h - a.height()) / 2) + 'px'
                });
            }
            a.show();
            a.find('a.close').off('click').on('click', function(e) {
                $(".overlay").hide();
                e.preventDefault();
                if (!$('.basket li.cartitem').length) {
                    $('.basket').addClass('hidden');
                }
                a.hide();
            });
        },
        addressTypeahead: function(el) {
            el.find('header .container .user').each(function() {
                var el = $(this);
                el.on('click', '.change-wrapper', function(e) {
                    var input = $('#' + $(this).find('a').attr('rel')).find('input[name=address]')[0];
                    input.focus();
                    input.select();
                });
            });
        }
    });
})();
(function() {
    $.nette.ext('earnForRecommend', {
        init: function() {
            $('body').on('click', '.addInviteEmail', function() {
                var input = $('div.suggest div.email input.recommend-email:last');
                var newInput = input.clone();
                var nth = newInput.attr('name').match(/\[([0-9]+)\]/)[1] * 1 + 1;
                newInput.val('').attr('id', null).attr('name', newInput.attr('name').replace(/\[[0-9]+\]/, '[' + nth + ']'));
                input.after(newInput);
                return false;
            });
        }
    });
})();
(function() {
    $.nette.ext('fadeInAfter', {
        init: function() {
            var self = this;
            if ($('.fadeInAfter').length) {
                $(document).ready(function() {
                    $('.fadeInAfter').each(function() {
                        var object = $(this);
                        setTimeout(function() {
                            object.fadeIn();
                        }, parseInt(object.data("fade-in-timeout")) * 1000);
                    });
                });
            }
        }
    });
})();
(function() {
    $.nette.ext('fbSharePopup', {
        init: function() {
            $('body').on('click', '.fbSharePopup', function(e) {
                e.preventDefault();
                window.open($(this).attr("href"), "fbShare", "width=600, height=300, menubar=no");
            });
        }
    });
})();
$.nette.ext('fixBodyOnClick', {
    init: function() {
        this.bindClick();
    },
    success: function() {
        this.bindClick();
    }
}, {
    isBound: false,
    bindClick: function() {
        if (this.isBound || !$('.fixBodyOnClick').length) {
            return;
        } else {
            this.isBound = true;
        }
        $('body').on('click', '.fixBodyOnClick', function(e) {
            $.nette.ajax({
                success: function() {
                    $('html').addClass('disableBodyScroll');
                    $.nette.ext('onClickFadeOut').onAfterFadeOut.add(function() {
                        $('html').removeClass('disableBodyScroll');
                    });
                }
            }, this, e);
        });
    }
});
(function() {
    $.nette.ext('forgottenPassword.js', {
        init: function() {
            $("#forgottenPassword-opener, [rel=forgottenPassword-opener]").click(function() {
                $(".forgotten-password").show().find('a.close').on('click', function(e) {
                    e.preventDefault();
                    $(".forgotten-password").hide();
                    $(".overlay").hide();
                });
                $(".overlay").show();
            });
        }
    });
})();
(function() {
    $.nette.ext('formPredefinedValues', {
        init: function() {
            $('body').on('change', '.form-predefined-values', function(e) {
                var input = $(this),
                    values = input.data('predefined-values'),
                    form = this.form;
                $.each(values[input.val()], function(index, value) {
                    $(form[index]).val(value);
                });
            });
        }
    });
})();
(function() {
    $.nette.ext('googleTagManager', {
        before: function(xhr, settings) {
            if (!settings.nette || typeof dataLayer === 'undefined') {
                return
            }
            var el = settings.nette.form ? settings.nette.form : settings.nette.el;
            var event = el.data('gtmEvent');
            if (!event) {
                return;
            }
            if (typeof event === 'string') {
                event = {
                    'event': event
                }
            }
            if (!event.url) {
                event.url = settings.url;
            }
            dataLayer.push(event);
        }
    });
})();
(function() {
    $.nette.ext('hideElement', {
        init: function() {
            $('body').on('click', '.hideElement[rel]', function(e) {
                $('body').find($(this).attr("rel")).hide();
                if ($(this).hasClass("ajaxAfterClose")) {
                    e.preventDefault();
                    $.nette.ajax({}, this, e);
                }
            });
        }
    });
})();
(function() {
    $.nette.ext('hpSlider', {
        init: function() {
            if ($('div.hpSlider').length) {
                this.firstInit();
            }
        }
    }, {
        items: 0,
        timer: 6000,
        timerObject: null,
        activeSlide: 0,
        sliderBoxElement: $('div.hpSlider'),
        sliderNavElement: $('div.hpSlider ul.nav'),
        firstInit: function() {
            var self = this;
            this.items = self.sliderBoxElement.find('ul.nav li').length;
            this.hover();
            if (this.sliderBoxElement.hasClass("autoSlide")) {
                this.setSlideInterval();
            }
        },
        setSlideInterval: function() {
            var self = this;
            this.timerObject = setInterval(function() {
                self.slide(self.activeSlide + 1, true);
            }, self.timer);
        },
        clearSlideInterval: function() {
            var self = this;
            clearInterval(self.timerObject);
        },
        slide: function(no, fade) {
            if (no >= this.items) {
                no = 0;
            }
            var self = this;
            self.activeSlide = no;
            var targetBox = $(self.sliderBoxElement.find('ul.nav li:eq(' + (no) + ') a').data('slide'));
            if (fade) {
                targetBox.addClass('next');
                $('div.hpSliderBox.next').hide().fadeIn('fast', function() {
                    $('div.hpSliderBox.active').removeClass('active');
                    $(this).removeClass('next').addClass('active');
                });
            } else {
                $('div.hpSliderBox.active').removeClass('active');
                targetBox.addClass('active');
            }
            self.sliderNavElement.find('li').removeClass('active');
            self.sliderNavElement.find('li:eq(' + (no) + ')').addClass('active');
        },
        hover: function() {
            var self = this;
            var body = $('body');
            body.on('mouseout', 'div.hpSlider ul.nav li a, div.hpSliderBox', function() {
                var index = $(this).parent('li').index();
                if (self.sliderBoxElement.hasClass("autoSlide")) {
                    self.setSlideInterval();
                }
            });
            body.on('mouseover', 'div.hpSlider ul.nav li a', function() {
                var index = $(this).parent('li').index();
                self.clearSlideInterval();
                self.slide(index, false);
            });
            body.on('mouseover', 'div.hpSliderBox', function() {
                self.clearSlideInterval();
            });
        }
    });
})();
(function() {
    $.nette.ext('infinitescroll', {
        init: function() {
            var self = this;
            this.register($(this.selector));
            this.ext('snippets').after(function(snippet) {
                self.register(snippet.parents(self.selector));
                self.register(snippet.find(self.selector));
            });
        }
    }, {
        selector: '.infinitescroll',
        findLink: function(el) {
            return el.find(el.data('infinitescroll-link'));
        },
        register: function(el) {
            var self = this;
            el.each(function() {
                var el = $(this);
                if (!el.data('waypoint') && self.findLink(el).length > 0) {
                    self.createWaypoint(el);
                }
            });
        },
        createWaypoint: function(el) {
            var self = this;
            el.data('waypoint', true);
            el.waypoint({
                handler: function(direction) {
                    if (direction === 'down') {
                        el.waypoint('destroy');
                        el.data('waypoint', false);
                        self.findLink(el).click();
                    }
                },
                offset: function() {
                    var itemEl = $(el.find(el.data('infinitescroll-item'))[0]);
                    return $(window).height() - $(this).outerHeight() + itemEl.height() + 16;
                }
            });
        }
    });
})();
(function() {
    $.nette.ext('inputPlaceholder', {
        init: function() {
            var self = this;
            $('body').find('input[type=text], textarea').each(function(event) {
                self.inputPlaceholderHide(this);
            });
            $('input, textarea').placeholder();
        }
    }, {
        inputPlaceholderHide: function(el) {
            var $this = $(el);
            $this.data('plholder', $this.attr('placeholder'));
            $this.on('click', function() {
                $this.attr('placeholder', '');
            });
            $this.on('blur', function() {
                $this.attr('placeholder', $this.data('plholder'));
            });
        }
    });
})();
$.nette.ext('inputReplacement', {
    init: function() {
        var self = this;
        $('body').find('input[type=checkbox], input[type=radio]').each(function(event) {
            self.replace(this);
        });
    }
}, {
    replace: function(el) {
        var $this = $(el);
        if ($this.is(".noreplace")) {
            return;
        }
        var $span = $('<span/>').addClass('like-' + ($this.is(':checkbox') ? 'checkbox' : 'radio'));
        $this.before($span);
        if ($this.is(':checked')) {
            $this.parent().addClass('active');
        }
        if ($this.is(':disabled')) {
            $this.parent().addClass('disabled');
        }
        if (!$this.parent().is("label")) {
            $span.on({
                click: function() {
                    $this.attr('checked', !$this.is(':checked'));
                    $this.trigger('change');
                }
            });
        }
        $this.css({
            position: 'absolute',
            left: '-9999px'
        });
        $this.on({
            change: function() {
                if ($this.is(':radio')) {
                    $(this).closest('form,.inputClosePackage').find('input[name="' + $this.attr("name") + '"]').each(function() {
                        $(this).parent().removeClass('active');
                    });
                }
                var tip = $('.ordertip');
                var spanTip = tip.find('span');
                if ($this.attr("name") === 'payment') {
                    switch ($this.val()) {
                        case "1":
                            if (($this.closest('div').find('input[name=rememberPayment]').is(':checked') || $this.closest('div').find('input[name=useRememberedCard]').is(':checked')) && !tip.data('is-grocery')) {
                                tip.show();
                                spanTip.html(tip.data('we-have-app'));
                            } else {
                                tip.show();
                                spanTip.html(tip.data('use-remembered-card'));
                            }
                            break;
                        case "2":
                            var useCreditsInput = $('#use-credits').find('input');
                            useCreditsInput.attr('checked', false);
                            useCreditsInput.trigger('change');
                            tip.show();
                            spanTip.html(tip.data('use-card'));
                            break;
                        case "3":
                            if (!tip.data('is-grocery')) {
                                tip.show();
                                spanTip.html(tip.data('we-have-app'));
                            } else {
                                tip.hide();
                            }
                            break;
                        default:
                            tip.hide();
                    }
                }
                if ($this.attr("name") === "rememberPayment" || $this.attr("name") === "useRememberedCard") {
                    if ($this.is(':checked') && !tip.data('is-grocery')) {
                        tip.show();
                        spanTip.html(tip.data('we-have-app'));
                    } else if ($this.is(':checked')) {
                        tip.hide();
                    } else {
                        tip.show();
                        spanTip.html(tip.data('use-remembered-card'));
                    }
                }
                $this.parent().toggleClass('active', $this.is(':checked'));
            }
        });
    }
});
(function() {
    $.nette.ext('landingPageV1', {
        init: function() {
            if ($('body').hasClass("welcomeLandingPage") || $('body').hasClass("videoBigPopup")) {
                this.tabHover();
                this.videoPopup();
            }
        }
    }, {
        tabHover: function() {
            $('body').on('click', '.tabsHoverControl a[rel]', function() {
                var tabsTarget = $(this).closest('.tabsHoverControl').attr("rel");
                var targetTab = $(this).attr('rel');
                $(this).closest('.tabsHoverControl').find('li').removeClass("active");
                $(this).parent('li').addClass("active");
                $(tabsTarget).find('.tab[id!=' + targetTab + ']').hide();
                $(tabsTarget).find('#' + targetTab).show();
            });
        },
        videoPopup: function() {
            var body = $('body');
            body.on('click', '.openVideo', function() {
                $('.bigVideo').show();
                $('#videoPlayer').attr("src", $(this).data("embed"));
                return false;
            });
            body.on('click', '.bigVideo .close', function() {
                $('.bigVideo').hide();
                $('#videoPlayer').attr("src", "");
            });
        }
    });
})();
(function() {
    $.nette.ext('lightbox', {
        init: function() {
            var body = $('body');
            body.on('click', '.closelightbox[rel]', function(e) {
                var link = $(this);
                e.preventDefault();
                if (link.hasClass("closeClass")) {
                    $("." + link.attr("rel")).hide();
                } else {
                    $("#" + link.attr("rel")).hide();
                }
                $(".overlay").hide();
                if (link.closest('.tipPopupLightbox').length) {
                    $.cookie('tipPopupLightbox-closed', true, {
                        path: '/',
                        domain: $('body').data('cookie-domain')
                    });
                }
            });
            body.on('click', 'a.registration', function(e) {
                var link = $(this);
                e.preventDefault();
                var box = $("#registrationLightbox");
                box.show();
                box.find('a.close').on('click', function(e) {
                    e.preventDefault();
                    box.hide();
                    $(".overlay").hide();
                });
                $(".overlay").show();
            });
            body.on('click', '.openLightbox[rel]', function(e) {
                var link = $(this);
                e.preventDefault();
                var box = $("#" + link.attr("rel"));
                var success = link.attr("data-success");
                if (link.hasClass("showHideBeforeOpen")) {
                    box.find(".showBeforeOpen").show();
                    box.find(".hideBeforeOpen").hide();
                }
                box.show();
                box.find('a.close').on('click', function(e) {
                    e.preventDefault();
                    box.hide();
                    $(".overlay").hide();
                });
                $(".overlay").show();
                if (link.data().hasOwnProperty("lightboxScrollToDelay")) {
                    var scrollDelay = parseInt(link.data("lightboxScrollToDelay"));
                    $('html, body').animate({
                        scrollTop: box.offset().top
                    }, scrollDelay);
                }
                if (success !== undefined && success !== "") {
                    window[success]();
                }
                return false;
            });
        }
    });
    $.nette.ext('overlayAutoOpen', {
        init: function() {
            this.autoOpen($('body'));
            var self = this;
            this.ext('snippets').after(function(snippet) {
                self.autoOpen(snippet);
            });
        }
    }, {
        autoOpen: function($el) {
            var overlay = $el.find('.autoOpenOverlay');
            if (overlay.length) {
                $(".overlay").show();
                var showElement = overlay.data('show-element');
                if (showElement) {
                    $(showElement).show();
                }
            }
            var lightbox = $el.find('.autoOpenWhiteOverlay');
            if (lightbox.length && !$.cookie('specifyGroceryAddress-closed')) {
                $(".overlay").addClass("white").show();
                lightbox.show();
            }
        }
    });
    $.nette.ext('setBodyNoScroll', {
        init: function() {
            this.autoOpen($('body'));
            var self = this;
            this.ext('snippets').after(function(snippet) {
                self.autoOpen(snippet);
            });
        }
    }, {
        autoOpen: function($el) {
            var obj = $el.find('.autoSetBodyNoScroll');
            if (obj.length) {
                $('html,body').addClass("noscroll");
            }
        }
    });
    $.nette.ext('lightbox-credit-opener', {
        init: function() {
            var opener = $("#lightbox-credit-opener");
            opener.on('click', function(e) {
                e.preventDefault();
                $("#lightbox-credit").show().find('a.close').on('click', function(e) {
                    e.preventDefault();
                    $("#lightbox-credit").hide();
                    $(".overlay").hide();
                });
                $(".overlay").show();
            });
            if ($("#lightbox-credit").hasClass('autoOpen')) {
                opener.trigger('click');
            }
        }
    });
})();
(function() {
    $.nette.ext('onClickFadeOut', {
        init: function() {
            var self = this;
            $('body').on('click', '.onClickFadeOut', function() {
                var el = $(this);
                var selector = el.attr('rel');
                var cookieName = el.data('hide-cookie');
                var cookieExpire = el.data('expire');
                if (!cookieExpire) {
                    cookieExpire = 14;
                }
                if (selector) {
                    el = $(selector);
                }
                if (cookieName) {
                    $.cookie(cookieName, true, {
                        path: '/',
                        domain: $('body').data('cookie-domain'),
                        expires: cookieExpire
                    });
                }
                el.fadeOut();
                self.after();
                $(".overlay").hide();
            });
        }
    }, {
        onAfterFadeOut: $.Callbacks(),
        after: function() {
            this.onAfterFadeOut.fire();
        }
    });
})();
$.nette.ext('onInputChangeOpenUrl', {
    init: function() {
        $('body').on('change', '.onChangeAjax[data-onchange-href]', function(e) {
            $.nette.ajax({
                url: $(this).attr("data-onchange-href")
            }, $(this), e);
        });
    }
});
(function() {
    $.nette.ext('openColleagueFoodList', {
        init: function() {
            var body = $('body');
            body.on('click', 'a.openColleagueFoodList', function() {
                var objects = body.find('.' + $(this).attr("rel"));
                if (objects.is(":visible")) {
                    $(this).find('small').text($(this).data("opentext"));
                    objects.hide();
                } else {
                    $(this).find('small').text($(this).data("hidetext"));
                    objects.show();
                }
            });
        }
    });
})();
(function() {
    $.nette.ext('openForm', {
        init: function() {
            $('body').on('click', '.openForm[rel]', function(e) {
                $(this).hide();
                $("#" + $(this).attr("rel")).show();
                return false;
            });
        }
    });
})();
(function() {
    var Order = function(initialPrices) {
        this.initialPrices = initialPrices;
        this.initPrices(initialPrices);
    };
    Order.prototype.initPrices = function(initialPrices) {
        var self = this;
        this.current = {
            totalPrice: 0,
            food: 0,
            discount: 0,
            delivery: 0,
            packing: 0,
            additionalCharge: 0,
            courierTip: 0,
            credits: 0
        };
        $.each(initialPrices, function(key, val) {
            self.current[key] = parseFloat(val);
        });
    };
    Order.prototype.totalCost = function() {
        return this.current['food'] + this.current['delivery'] + this.current['additionalCharge'] + this.current['courierTip'] + this.current['packing'];
    };
    Order.prototype.usedCredits = function() {
        return this.current['credits'];
    };
    Order.prototype.customerPays = function() {
        return this.totalCost() - this.usedCredits();
    };
    Order.prototype.courierTip = function() {
        return this.current['courierTip'];
    };
    Order.prototype.delivery = function() {
        return this.current['delivery']
    };
    Order.prototype.collect = function() {
        var form = $('#frm-orderForm-form');
        if (!form.length) {
            return;
        }
        this.initPrices(this.initialPrices);
        var creditsPayment = form.find('input[name=payment][value=3]'),
            useCredits = form.find('input[name=useCredits]');
        if (creditsPayment.is(':checked')) {
            this.current['credits'] = this.totalCost();
        } else if (useCredits.is(':checked')) {
            this.current['credits'] = parseFloat(useCredits.data('calculation-value')) || 0;
        } else {
            this.current['credits'] = 0;
        }
        this.current['courierTip'] = $('input[name=payment]:checked').data('has-tip') ? (parseFloat(form.find('select[name=tip]').val()) || 0) : 0;
    };
    Order.prototype.write = function() {
        var order = this;
        $('.order-calculation-view').each(function() {
            var el = $(this),
                template = '',
                zeroText, amount;
            if (order.current['credits'] && el.data('calculation-template-withcredits')) {
                template = el.data('calculation-template-withcredits');
            } else {
                template = el.data('calculation-template');
            }
            template = template.replace(/([0-9])/g, function(m) {;
                m = parseInt(m);
                if (m == 1) {
                    amount = order.totalCost();
                } else if (m == 2) {
                    amount = order.customerPays();
                } else if (m == 3) {
                    amount = order.usedCredits();
                } else if (m == 4) {
                    amount = order.courierTip();
                } else if (m == 5) {
                    amount = order.delivery();
                }
                return amount;
            });
            el.html(amount == 0 && (zeroText = el.data('calculation-zero')) ? zeroText : template);
        });
        $('.order-calculation-dependent').each(function() {
            var el = $(this);
            var rule;
            if (rule = el.data('order-total-price-max')) {
                if (order.customerPays() <= rule) {
                    el.show();
                } else {
                    el.hide();
                    el.find('input[type=radio]:checked').each(function() {
                        $(this).prop('checked', false);
                        $(this.form).find('input[name="' + this.name + '"]:first').prop('checked', true);
                    });
                }
            }
        });
    };
    $.nette.ext('orderCalculation', {
        init: function() {
            var self = this;
            this.ext('snippets').after(function($snippet) {
                self.bind();
            });
            this.bind();
        }
    }, {
        order: null,
        bind: function($el) {
            var orderForm = $('form#frm-orderForm-form');
            var sum = orderForm.find('.sum[data-calculation]');
            if (!orderForm.length || !sum.length) {
                return;
            }
            this.order = new Order(sum.data('calculation'));
            this.order.collect();
            this.order.write();
            orderForm.on('change', 'select, input[type=checkbox], input[type=radio]', $.proxy(function(e) {
                this.order.collect();
                this.order.write();
            }, this));
        }
    });
})();
(function() {
    $.nette.ext('orderFormSwitchTab', {
        init: function() {
            var body = $('body');
            body.on('click', '.orderForm ul li a.switchTab', function(e) {
                e.preventDefault();
                if (!$(this).hasClass("active")) {
                    body.find('.studentLpForm').toggle();
                    body.find('.orderForm ul li a.switchTab').removeClass("active");
                    $(this).addClass("active");
                }
            });
        }
    });
})();
(function() {
    $.nette.ext('piecesInput', {
        init: function() {
            var self = this,
                body = $('body');
            body.on('click', '.decreasePieces[rel], .increasePieces[rel]', function(e) {
                var piecesInput = $($(this).attr('rel'));
                var pieces = parseInt(piecesInput.val());
                var storePieces = parseInt(piecesInput.data('max-amount'));
                var alreadyPieces = parseInt(piecesInput.data('basket-amount'));
                var minPieces = piecesInput.data('min-amount');
                var maxPieces = storePieces - alreadyPieces;
                var isLimited = piecesInput.hasClass('limited');
                minPieces = typeof minPieces === 'undefined' ? 1 : parseInt(minPieces);
                if ($(this).hasClass('decreasePieces')) {
                    if (pieces <= minPieces) {
                        pieces = minPieces;
                    } else {
                        pieces--;
                    }
                } else if ($(this).hasClass('increasePieces')) {
                    if (pieces >= maxPieces) {
                        setTimeout($.proxy(self.setTipText, self, $(this), storePieces, alreadyPieces, isLimited), 0);
                        pieces = maxPieces;
                    } else {
                        pieces++;
                    }
                }
                piecesInput.val(pieces);
            });
            body.on('keyup', '.maxAmountValidate', function(e) {
                var storePieces = parseInt($(this).data('max-amount'));
                var alreadyPieces = parseInt($(this).data('basket-amount'));
                var minPieces = $(this).data('min-amount');
                var maxPieces = storePieces - alreadyPieces;
                var pieces = parseInt($(this).val());
                var isLimited = $(this).hasClass('limited');
                minPieces = typeof minPieces === 'undefined' ? 1 : parseInt(minPieces);
                if (pieces < minPieces) {
                    $(this).val(minPieces);
                } else if (pieces > maxPieces) {
                    $(this).select();
                    setTimeout($.proxy(self.setTipText, self, $(this), storePieces, alreadyPieces, isLimited), 0);
                    $(this).val(maxPieces);
                }
            });
        }
    }, {
        setTipText: function(obj, storeAmount, alreadyAmount, isLimited) {
            var self = this;
            var a = obj,
                tooltip = $('.tooltip'),
                text = 'Bohužel máme skladem poslední ' + storeAmount + ' ks',
                l = a.offset().left - Math.round((tooltip.width() + parseInt(tooltip.css('padding-left'), 10) + parseInt(tooltip.css('padding-right'), 10)) / 2) + Math.round(a.width() / 2),
                t = a.offset().top,
                timeout = 1500;
            if (isLimited) {
                text = 'Aby se dostalo na všechny, můžete nakoupit maximálně ' + storeAmount + ' ks';
            }
            if (alreadyAmount > 0) {
                text += '<br>V košíku už máte ' + alreadyAmount + ' ks, přidat můžete ' + (storeAmount - alreadyAmount) + ' ks';
                timeout = 4000;
            }
            tooltip.html(text).show();
            tooltip.css({
                left: l + 'px',
                top: t - tooltip.innerHeight() - 25 + 'px'
            });
            setTimeout($.proxy(self.fadeOutTooltip, self), timeout);
        },
        fadeOutTooltip: function(tooltip) {
            $('.tooltip').fadeOut(function() {
                $(this).removeAttr('style').html('').hide();
            });
        }
    });
})();
$.nette.ext('popups', {
    before: function(xhr, settings) {
        this.popup = false;
        if (!settings.nette) return true;
        else var analyze = settings.nette;
        var inPopup = analyze.el.closest('.popup');
        if (inPopup.length) {
            this.popup = inPopup;
        }
    },
    complete: function() {
        if (!this.popup) return;
        if (!this.popup.closest('body').length) {
            $('.overlay').hide();
        }
    }
}, {
    popup: false
});
$.nette.ext('premiumOrder', {
    init: function() {
        var body = $('body');
        body.on('change', '.premium .order .radios input[type=radio][name=subscription]', function(e) {
            $.nette.ajax({
                off: ['validation']
            }, $(this).closest('form'), e);
        });
        body.on('change', '.premium .order .student input[type=checkbox][name=student]', function(e) {
            $.nette.ajax({
                off: ['validation']
            }, $(this).closest('form'), e);
        });
    }
});
(function() {
    $.nette.ext('print', {
        init: function() {
            $('.openPrintDialog').on('click', function() {
                window.print();
                return false;
            });
        }
    });
})();
$.nette.ext('productAdded', {
    init: function() {
        var self = this;
        var count = 0;
        this.overlay = $('<div class="added">Přidáno do košíku</div>');
        this.ext('snippets').before(function($el) {
            var product = self.findProduct($el),
                basket = self.findBasket($el);
            if (product !== null && basket !== null) {
                count = basket.data('count');
            }
        });
        this.ext('snippets').after(function($el) {
            var product = self.findProduct($el),
                basket = self.findBasket($el);
            if (product !== null && basket !== null && basket.data('count') > count) {
                self.showOverlayOn(product);
            }
        });
    }
}, {
    overlay: null,
    findProduct: function($el) {
        var els = $el.closest('article.product');
        return els.length ? els : null;
    },
    findBasket: function($el) {
        var els = $el.find('.basket');
        return els.length ? els : null;
    },
    showOverlayOn: function(el) {
        var overlay = this.overlay;
        overlay.appendTo(el).show();
        setTimeout(function() {
            overlay.fadeOut('200', overlay.remove);
        }, 2000);
    }
});
(function() {
    $.nette.ext('productPopup', {
        init: function() {
            var self = this;
            var body = $('body');
            var selector = '.popupDetail';
            body.on('click', selector + ' .tabs ul.nav li a', function(e) {
                var link = $(e.target),
                    tabs = link.closest('.tabs');
                tabs.find('ul.nav li.active').removeClass('active');
                link.closest('li').addClass('active');
                tabs.find('div.tab').hide();
                var tab = tabs.find(link.attr('rel'));
                tab.show();
                self.ext('carousel').bindPopup(tab);
            });
            body.on('click', selector, function(e) {
                var target = $(e.target);
                if (!target.is('article') && target.parents('article').length === 0) {
                    $(this).remove();
                    self.close();
                }
            });
            body.on('click', selector + ' .close', function(e) {
                $(this).parents(selector).remove();
                self.close();
            });
            body.on('click', selector + ' .show[rel]', function(e) {
                var el = $(this);
                var newText = el.data('text-toggle');
                el.data('text-toggle', el.text()).text(newText);
                $(el.attr('rel')).toggleClass('ellipsis');
            });
            this.ext('snippets').after(function(snippet) {
                snippet.find(selector + ' .show[rel]').each(function() {
                    var toggle = $(this);
                    var el = $(toggle.attr('rel'));
                    if (el.height() > 128) {
                        toggle.show();
                        el.addClass('ellipsis');
                    }
                });
                if (snippet.parents(selector).length > 0 || snippet.find(selector).length > 0) {
                    snippet.find('.tab:visible').each(function() {
                        self.ext('carousel').bindPopup($(this));
                    });
                }
            });
            body.on('click', '.product a[data-popuplink]', function(e) {
                var link = $(this).data('popuplink');
                self.open(link, this, e);
                e.preventDefault();
            });
            body.on('keyup', function(e) {
                if (e.which === 27) {
                    $(selector).remove();
                    self.close();
                }
            });
        }
    }, {
        request: null,
        open: function(link, ui, e) {
            var snippet = $('#snippet--productPopup');
            $('html').addClass('overflowHidden');
            snippet.html('<div class="popupDetail loading"><div class=table><div class=cell><article></article></div></div></div>');
            this.request = $.nette.ajax({
                url: link
            }, ui, e);
        },
        close: function() {
            $('html').removeClass('overflowHidden');
            if (this.request) {
                this.request.abort();
            }
        }
    });
})();
$.nette.ext('pushCheckedToGtm', {
    init: function() {
        $('body').on('change', '.pushCheckToGtm[data-gtm-event-check]', function(e) {
            if ($(this).is(":checked")) {
                var event = $(this).data('data-gtm-event-check');
                if (!event) {
                    return;
                }
                if (typeof event === 'string') {
                    event = {
                        'event': event
                    }
                }
                dataLayer.push(event);
            }
        });
    }
});
$.nette.ext('pushEventToGa', {
    init: function() {
        var self = this,
            body = $('body');
        body.find('.onLoadPushGa[data-ga-event]').each(function() {
            self.pushToGa($(this));
        });
        body.on('click', '.onClickPushGa[data-ga-event]', function(e) {
            if ($(this).hasClass("doAjax")) {
                e.preventDefault();
                $.nette.ajax({}, this, e);
            }
            self.pushToGa($(this));
        });
        this.ext('snippets').after(function($el) {
            $el.find('.onLoadPushGa[data-ga-event]:not(.gaOnlyOnLoad)').each(function() {
                self.pushToGa($(this));
            });
        });
    }
}, {
    pushToGa: function($el) {
        if ('undefined' !== typeof _gaq) {
            _gaq.push(['_trackEvent', $el.attr("data-ga-event"), $el.attr("data-ga-action"), $el.attr("data-ga-value")]);
        }
    }
});
$.nette.ext('pushScrollToGa', {
    init: function() {
        var self = this;
        this.recalculateModel();
        this.window = $(window);
        this.window.on('scroll', $.proxy(this.onScroll, this));
        this.ext('snippets').after(function($el) {
            if ($el.find("#restaurantListItems").length) {
                self.recalculateModel();
            }
        });
    }
}, {
    topOffset: 0,
    boxHeight: 0,
    prev: 0,
    recalculateModel: function() {
        var listObject = $("#restaurantListItems");
        if (listObject.length > 0) {
            this.topOffset = listObject.offset().top;
            var listHeight = listObject.outerHeight() - listObject.find("li.close").outerHeight();
            var listCount = listObject.find("li").length - listObject.find("li.close").length;
            this.boxHeight = Math.round(listHeight / Math.ceil(listCount / 3));
            this.prev = 0;
        }
    },
    onScroll: function(e) {
        var scroll = this.window.scrollTop();
        var lines = Math.floor((this.window.height() - this.topOffset + scroll) / this.boxHeight);
        if (lines > this.prev) {
            this.prev = lines;
            this.pushToGa(lines);
        }
    },
    pushToGa: function(numberOfRestaurants) {
        if ('undefined' !== typeof _gaq) {
            _gaq.push(['_trackEvent', 'UI', 'Restaurant list scroll', numberOfRestaurants + ' lines']);
        }
    }
});
(function() {
    $.nette.ext('radioChecked', {
        init: function() {
            if (BrowserDetect.browser === 'Explorer' && BrowserDetect.version < 9) {
                var body = $('body');
                body.find('.radios input[type=radio]').each(function() {
                    if ($(this).is(':checked')) {
                        $(this).closest('label').addClass("active");
                    }
                });
                body.on('change', '.radios input[type=radio]', function() {
                    $(this).closest('.radios').find('label').removeClass("active");
                    $(this).closest('label').addClass("active");
                });
            }
        }
    });
})();
(function() {
    $.nette.ext('rate-content', {
        init: function() {
            $('body').find('.rate-content .rate:not(.disabled)').each(function() {
                var ratebox = $(this);
                var input = $(this).find('input[type=hidden]');
                if (input.val() != '') {
                    var index = parseInt(input.val(), 10) - 1;
                    ratebox.children('a').each(function(i, star) {
                        if (i > index) return;
                        $(star).addClass('active');
                    });
                }
                ratebox.children('a').on('mouseover', function() {
                    var index = $(this).index();
                    ratebox.children('a').each(function(i, star) {
                        if (i > index) {
                            $(star).removeClass('active');
                            return;
                        }
                        $(star).addClass('active');
                    });
                }).on('mouseout', function() {
                    ratebox.children('a').removeClass('active');
                }).on('click', function(e) {
                    e.preventDefault();
                    var index = $(this).index();
                    ratebox.children('a').removeClass('selected');
                    ratebox.children('a').each(function(i, star) {
                        if (i > index) return;
                        $(star).addClass('selected');
                    });
                    input.val(index + 1);
                });
            })
        }
    });
})();
$.nette.ext('ratingField', {
    init: function() {
        $('body').on('change', 'input[type=radio][name=again]', this.saveValues);
    }
}, {
    saveValues: function(e) {
        var submit = $(this).closest('form').find('button[type=submit]');
        $.nette.ajax({}, submit, e);
    }
});
(function() {
    $.nette.ext('recipesResponsive', {
        init: function() {
            if ($("body").hasClass("recipesProject")) {
                $('nav a.menu').on('click', function() {
                    if ($(this).parent().hasClass('open')) {
                        $(this).parent().removeClass('open');
                    } else {
                        $(this).parent().addClass('open');
                    }
                    return false;
                });
            }
        }
    });
})();
(function() {
    $.nette.ext('relToggle', {
        init: function() {
            $('body').on('click', '.toggle[rel]', function(e) {
                e.preventDefault();
                $('body').find($(this).attr("rel")).toggle();
                if ($(this).has("[data-text-toggle]")) {
                    var cText = $(this).text();
                    $(this).text($(this).data("text-toggle"));
                    $(this).data("text-toggle", cText);
                }
            });
        }
    });
})();
(function() {
    $.nette.ext('repeatOrder', {
        init: function() {
            if ($('div.repeatPurchase').length) {
                this.firstInit();
            }
        }
    }, {
        element: false,
        mainElement: false,
        footerOffset: 0,
        offset: 0,
        firstInit: function() {
            var self = this;
            this.footerOffset = $('footer').offset().top;
            this.element = $('.repeatPurchase .buy');
            this.mainElement = $('.repeatPurchase .main');
            this.place();
        },
        place: function() {
            var self = this;
            this.setPosition();
            $(window).scroll(function() {
                self.setPosition();
            });
            $(window).resize(function() {
                self.setPosition();
            });
        },
        setPosition: function() {
            var view = $(window).height();
            var bodyHeight = $('body').height();
            var page = $(document).height();
            var top = $(document).scrollTop();
            if (top + view + 45 >= this.footerOffset) {
                this.mainElement.addClass("noFixed");
                this.element.addClass("noFixed");
            } else {
                this.mainElement.removeClass("noFixed");
                this.element.removeClass("noFixed");
            }
        }
    });
})();
$.nette.ext('reviewTipScroll', {
    init: function() {
        var el = $('.reviewTipScroll');
        if (!el.length) {
            return;
        }
        this.object = el;
        this.topOffset = el.offset().top;
        $(window).scroll($.proxy(this.scroll, this));
        $(window).resize($.proxy(this.scroll, this));
    }
}, {
    object: false,
    topOffset: 0,
    scroll: function() {
        var scroll = $(document).scrollTop();
        if (scroll > this.topOffset) {
            this.object.addClass("fixed");
            $('.order .items').addClass("scrollingTip");
        } else {
            this.object.removeClass("fixed");
            $('.order .items').removeClass("scrollingTip");
        }
    }
});
(function() {
    $.nette.ext('reviewUpsellFade', {
        init: function() {
            var upsellBox = $('.upsellReview .hpCarousel');
            if (upsellBox.length > 0) {
                setTimeout(function() {
                    if (upsellBox.hasClass("hidden")) {
                        upsellBox.css({
                            opacity: 0.0,
                            visibility: "visible"
                        }).animate({
                            opacity: 1.0
                        }, 250);
                    }
                }, 1000);
            }
        }
    });
})();
(function() {
    $.nette.ext('scrollToTop', {
        init: function() {
            if ($('a.scrollToTop').length) {
                this.firstInit();
            }
            $('body').on('click', 'a.scrollToTop', function() {
                $('html,body').animate({
                    scrollTop: 0
                }, 300);
                return false;
            });
        }
    }, {
        element: false,
        items: 0,
        head: 0,
        foot: 0,
        footer: 0,
        offset: 0,
        firstInit: function() {
            var self = this;
            this.linkObject = $('a.scrollToTop');
            this.linkObjectBottomMargin = parseInt(this.linkObject.css("bottom"));
            this.linkObjectHeight = this.linkObject.outerHeight();
            $(window).scroll(function() {
                self.setPosition();
            });
            $(window).resize(function() {
                self.setPosition();
            });
        },
        setPosition: function() {
            var aside = $('aside');
            var topOffset = $('header').outerHeight() + $('nav').outerHeight() + $('.breadcrumb').outerHeight() + aside.outerHeight() + parseInt(aside.css("margin-bottom"));
            var topOffsetTolerance = 10;
            var topSafeZone = 20;
            var footerOffset = $('footer').offset().top;
            var top = $(document).scrollTop();
            var view = $(window).height();
            var body = $('body').height();
            if (body <= view) {
                return;
            }
            if (top - topOffsetTolerance >= 0 && view - (topOffset - top) - topSafeZone - this.linkObjectBottomMargin >= this.linkObjectHeight) {
                if (top + view >= footerOffset) {
                    this.linkObject.addClass("bottom");
                } else {
                    this.linkObject.removeClass("bottom");
                }
                this.linkObject.show();
            } else {
                this.linkObject.hide();
            }
        }
    });
})();
$.nette.ext('scrollToWithAnimation', {
    init: function() {
        var body = $('body');
        body.on('click', '.scrollToWithAnimation', function() {
            var top = body.find($(this).attr("href")).offset().top;
            if ($(this).hasClass("fixedNav")) {
                top -= $('nav').outerHeight();
            }
            $('html,body').animate({
                scrollTop: top
            }, 300);
            return false;
        });
    }
});
(function() {
    $.nette.ext('setNavPosition', {
        init: function() {
            var nav = $('body > nav > ul > li > ul > li > ul');
            nav.each(function() {
                var parentIndex = $(this).closest('li').index();
                var totalParentElements = $(this).closest('li').closest('ul').find('> li').length;
                var elementsCount = $(this).find('li').length;
                var elmHeight = 30;
                var yPos = parentIndex;
                if (yPos + elementsCount > totalParentElements) {
                    yPos = totalParentElements - elementsCount;
                }
                $(this).css("top", (yPos * elmHeight) + "px");
            });
        }
    });
})();
$(function() {
    $.nette.ext('shoppingList', {
        init: function() {
            var self = this;
            var body = $('body');
            if (body.find(self.addAllSelector).length === 0) {
                return;
            }
            body.on('click', self.addAllSelector, function(e) {
                var el = $(this);
                var amounts = {};
                for (var index = 0; index < self.amountSelectors.length; ++index) {
                    body.find(self.amountSelectors[index]).each(function() {
                        var amount = $(this);
                        var productId = amount.data('productId');
                        if (typeof amounts[productId] === "undefined") {
                            amounts[productId] = 0;
                        }
                        amounts[productId] += +amount.val();
                    });
                }
                e.preventDefault();
                $.nette.ajax({
                    url: el.attr('href'),
                    method: 'POST',
                    data: {
                        amounts: JSON.stringify(amounts)
                    }
                }, el, e);
            });
            for (var index = 0; index < self.amountSelectors.length; ++index) {
                body.on('change', self.amountSelectors[index], function() {
                    self.clearTimeoutAndRefreshSumAndTotal();
                });
                body.on('keyup', self.amountSelectors[index], function() {
                    if (self.timeout !== null) {
                        clearTimeout(self.timeout);
                    }
                    self.timeout = setTimeout(function() {
                        self.refreshSum();
                    }, 400);
                });
            }
            body.on('click', self.selector + ' .decreasePieces, ' + self.selector + ' .increasePieces', function() {
                self.clearTimeoutAndRefreshSumAndTotal();
            });
        },
        success: function() {
            this.clearTimeoutAndRefreshSumAndTotal();
        }
    }, {
        selector: '.shopping-list',
        addAllSelector: '.shopping-list .add-all-to-basket',
        amountSelectors: ['.shopping-list .product form input[name=amount]', '.shopping-list .productAmount'],
        totalAmountSelector: '.shopping-list .totalAmount',
        timeout: null,
        clearTimeoutAndRefreshSumAndTotal: function() {
            if (this.timeout !== null) {
                clearTimeout(this.timeout);
            }
            this.refreshSum();
            this.refreshTotalAmount();
        },
        refreshSum: function() {
            var el = $(this.addAllSelector);
            if (el.length > 0) {
                el.html(el.data('template').replace('0', this.sum()));
            }
        },
        refreshTotalAmount: function() {
            var el = $(this.totalAmountSelector);
            if (el.length > 0) {
                el.html(el.data('template').replace('0', this.totalAmount()));
            }
        },
        sum: function() {
            var sum = 0;
            for (var index = 0; index < this.amountSelectors.length; ++index) {
                $(this.amountSelectors[index]).each(function() {
                    var el = $(this);
                    var current = el.data('productPrice') * el.val();
                    sum += current;
                    if (el.data('priceTarget')) {
                        var el2 = $(el.data('priceTarget'));
                        if (el2.length > 0) {
                            el2.html(el2.data('template').replace('0', current));
                        }
                    }
                });
            }
            return sum;
        },
        totalAmount: function() {
            var sum = 0;
            for (var index = 0; index < this.amountSelectors.length; ++index) {
                $(this.amountSelectors[index]).each(function() {
                    var el = $(this);
                    sum += parseInt(el.val());
                });
            }
            return sum;
        }
    });
});
(function() {
    $.nette.ext('showHiddenInDiv', {
        init: function() {
            $('body').on('click', '.showHiddenInDiv', function(e) {
                e.preventDefault();
                $(this).closest('div').find('.hidden').show();
                $(this).closest('div').find('.more').hide();
            });
        }
    });
})();
$.nette.ext('supermarket-images', {
    init: function() {
        var self = this;
        this.replaceAll($('body'));
        this.ext('snippets').after(function($snippet) {
            self.replaceAll($snippet);
        });
    }
}, {
    replaceAll: function($rootEl) {
        this.replace($rootEl.find('img.grocery-image-placeholder[data-replace]'));
    },
    replace: function(images) {
        images.each(function() {
            var img = $(this),
                replaceImg = new Image;
            replaceImg.src = $(this).data('replace');
            replaceImg.onload = function() {
                img.prop('src', this.src);
            };
        });
    }
});
$.nette.ext('toggleOrderDetail', {
    init: function() {
        $('body').on('click', '.profile .archive .toggleOrderDetail', function(e) {
            var target = $(this).attr("rel");
            $('.' + target).toggleClass("active");
            var currentText = $(this).text();
            var targetText = $(this).attr("data-switch-text");
            $(this).text(targetText);
            $(this).attr("data-switch-text", currentText);
            return false;
        });
    }
});
(function() {
    $.nette.ext('topic-tag-filtering', {
        init: function() {
            $('body').on('click', '.topic-tag-filtering', function(e) {
                $('.topic-tag-menu').each(function() {
                    $(this).removeClass('active');
                });
                $(this).parent().addClass('active');
                var tagName = this.getAttribute('data-tags');
                $('.tagFilter .product').each(function() {
                    var tags = jQuery.parseJSON(this.getAttribute('data-tags')).toString();
                    if (!tags) {
                        $(this).show();
                        return;
                    }
                    if (tags.indexOf(tagName) != -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        }
    });
})();
(function() {
    $.nette.ext('touchEvents', {
        init: function() {
            $('body').on('touchstart', 'aside > ul > li > strong', function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).closest('li').css('&:hover', '');
                $(this).closest('li').toggleClass('hover');
                return false;
            });
        }
    });
})();
(function() {
    $.nette.ext('twisto', {
        init: function() {
            var self = this;
            self.bindForm($('body'));
            this.ext('snippets').after(function($el) {
                self.bindForm($el);
            });
        }
    }, {
        orderFormId: '#frm-orderForm-form',
        orderForm: false,
        bindForm: function($el) {
            var self = this;
            $el.find(this.orderFormId).each(function() {
                self.orderform = $(this);
                self.orderform.on('submit', $.proxy(self.submitHandler, self));
                self.orderform.find('input[type=submit], button[type=submit]').on('click', $.proxy(self.submitHandler, self));
                self.twistoInit();
            });
        },
        submitHandler: function(e) {
            var ui = $(e.target),
                self = this;
            e.preventDefault();
            this.ext('ajaxOverlay').keepOpen = true;
            self.findTransactionIdInput().val('');
            ui.netteAjax(e, {
                success: function(payload) {
                    if ('twisto' in payload && payload.twisto) {
                        if (!self.isTwistoAllowed()) {
                            return;
                        }
                        self.twistoCheck(payload.twisto);
                    } else if ('redirect' in payload) {} else {
                        self.ext('ajaxOverlay').keepOpen = false;
                        self.ext('ajaxOverlay').hide();
                    }
                }
            });
        },
        isTwistoLoaded: false,
        findTwistoInput: function() {
            return $(this.orderFormId).find('.pay label.twisto input[name="payment"][value="5"]');
        },
        findTransactionIdInput: function() {
            return this.orderform.find('input[name=twistoTransactionId]');
        },
        isTwistoAllowed: function() {
            return this.findTwistoInput().length > 0 && this.findTransactionIdInput().length > 0;
        },
        twistoCheck: function(payload) {
            var self = this;
            Twisto.check(payload, function(response, code) {
                if (response.status == 'accepted') {
                    self.findTransactionIdInput().val(response.transaction_id);
                    self.twistoAccepted(response);
                } else {
                    self.twistoRejected(response, code);
                }
            }, function(response, code) {
                self.twistoRejected(response, code);
            });
        },
        twistoAccepted: function(response) {
            this.ext('ajaxOverlay').keepOpen = false;
            this.orderform.netteAjax(jQuery.Event('submit'), {});
        },
        twistoRejected: function(response, code) {
            this.ext('ajaxOverlay').keepOpen = false;
            $.nette.ajax({
                type: 'post',
                url: this.findTwistoInput().data('twisto-response-signal'),
                data: {
                    response: response,
                    httpCode: code
                }
            });
        },
        twistoInit: function() {
            if (this.isTwistoLoaded || !this.isTwistoAllowed()) {
                return;
            }
            this.isTwistoLoaded = true;
            window._twisto_config = {
                public_key: this.findTwistoInput().data('twisto'),
                script: 'https://static.twisto.cz/api/v2/twisto.js'
            };
            (function(e, g, a) {
                var b = e || {},
                    c = document.createElement(a);
                b._ = [];
                this[g] = b;
                c.type = "text/javascript";
                c.async = !0;
                c.src = e.script;
                var head = document.getElementsByTagName("head")[0];
                (head || document.body).appendChild(c);
                delete e.script;
            }).call(window, _twisto_config, "Twisto", "script");
        }
    });
})();
(function() {
    $.nette.ext('updateDeliveryTime', {
        init: function() {
            var self = this;
            this.ext('snippets').after(function($snippet) {
                self.bind($snippet);
            });
            this.bind($('body').find('form#frm-orderForm-form'));
        }
    }, {
        bind: function($el) {
            $el.find('select[data-update-delivery-time-url]').off().on('change', null, function(e) {
                var self = $(this);
                $.nette.ajax({
                    method: 'POST',
                    url: self.data('update-delivery-time-url'),
                    data: self.closest('form').serialize()
                }, self, e);
            });
        }
    });
})();
(function() {
    $.nette.ext('userForm', {
        init: function() {
            var self = this;
            $('body').on('click', 'a.login,a.registration', function(e) {
                e.preventDefault();
                var a = $(this);
                $('html,body').animate({
                    scrollTop: 0
                }, 300);
                if (!a.hasClass("registration")) {
                    self.initForm(a);
                }
            });
        }
    }, {
        opened: false,
        initForm: function(a) {
            var self = this,
                body = $('body');
            if (a.hasClass('login')) {
                if (this.opened != 'login') {
                    self.close();
                    this.opened = 'login';
                }
                body.find('.form-login').toggleClass('act');
            }
            body.find('.user .form').off('mouseenter mouseleave');
            body.find('.user .form').on('mouseenter mouseleave', function(e) {
                if (e.type == 'mouseenter') {
                    body.off('click');
                } else {
                    body.on('click', function() {
                        self.close();
                    });
                }
            });
            $(document).off('keydown');
            $(document).on('keydown', function(e) {
                if (e.keyCode == '27') {
                    self.close();
                }
            });
        },
        close: function() {
            var body = $('body');
            body.find('.form.close').removeClass('act');
            body.find('.user .form').off('mouseenter mouseleave');
            $(document).off('keydown');
        }
    });
})();
(function() {
    $.nette.ext('userInfoPopup', {
        init: function() {
            var user = $('body > .user');
            user.on('click', '.profile a.open', function() {
                user.find(".userInfoPopup").show();
            });
            user.on('mouseenter', '.profile a.hover', function() {
                user.find(".userInfoPopup").show();
            });
            user.on('click', '.userInfoPopup a.hide', function() {
                user.find(".userInfoPopup").hide();
            });
            user.on('mouseleave', '.userInfoPopup', function() {
                user.find(".userInfoPopup").hide();
            });
        }
    });
})();
(function() {
    $.nette.ext('welcomeLandingPage', {
        init: function() {
            $('body.welcomeLandingPage').on('click', 'div.firstOrder p a.mail', function() {
                $(this).parent().slideToggle(function() {
                    $('div.firstOrder div.loginRequired').slideToggle(function() {
                        $('html,body').animate({
                            scrollTop: $('div.firstOrder').offset().top
                        }, 800);
                    });
                });
                return false;
            });
        }
    });
})();
(function() {
    $.nette.ext('wineTabs', {
        init: function() {
            if ($('.wineDetail').length) {
                this.tabInit();
            }
        }
    }, {
        tabInit: function() {
            this.clickable();
        },
        clickable: function() {
            $('body').on('click', '.wineDetail .list ul li', function(e) {
                e.preventDefault();
                var productTargetId = $(this).data('product-id');
                if (!$('.productDetail[data-product-id=' + productTargetId + ']').length) {
                    return;
                }
                if (!$(this).hasClass('arrow')) {
                    $('.wineDetail .list ul').find('.arrow').removeClass('arrow');
                    $(this).addClass('arrow');
                    $('.wineDetail .list ul li').find('a').removeClass('active');
                    $(this).find('a').addClass('active');
                    $('.productDetail.active').hide().removeClass('active');
                    $('.productDetail[data-product-id=' + productTargetId + ']').show().addClass('active');
                }
            });
        }
    });
})();
/*!
 * typeahead.js 0.10.5
 * https://github.com/twitter/typeahead.js
 * Copyright 2013-2014 Twitter, Inc. and other contributors; Licensed MIT
 */
(function($) {
    var _ = function() {
        "use strict";
        return {
            isMsie: function() {
                return /(msie|trident)/i.test(navigator.userAgent) ? navigator.userAgent.match(/(msie |rv:)(\d+(.\d+)?)/i)[2] : false;
            },
            isBlankString: function(str) {
                return !str || /^\s*$/.test(str);
            },
            escapeRegExChars: function(str) {
                return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            },
            isString: function(obj) {
                return typeof obj === "string";
            },
            isNumber: function(obj) {
                return typeof obj === "number";
            },
            isArray: $.isArray,
            isFunction: $.isFunction,
            isObject: $.isPlainObject,
            isUndefined: function(obj) {
                return typeof obj === "undefined";
            },
            toStr: function toStr(s) {
                return _.isUndefined(s) || s === null ? "" : s + "";
            },
            bind: $.proxy,
            each: function(collection, cb) {
                $.each(collection, reverseArgs);

                function reverseArgs(index, value) {
                    return cb(value, index);
                }
            },
            map: $.map,
            filter: $.grep,
            every: function(obj, test) {
                var result = true;
                if (!obj) {
                    return result;
                }
                $.each(obj, function(key, val) {
                    if (!(result = test.call(null, val, key, obj))) {
                        return false;
                    }
                });
                return !!result;
            },
            some: function(obj, test) {
                var result = false;
                if (!obj) {
                    return result;
                }
                $.each(obj, function(key, val) {
                    if (result = test.call(null, val, key, obj)) {
                        return false;
                    }
                });
                return !!result;
            },
            mixin: $.extend,
            getUniqueId: function() {
                var counter = 0;
                return function() {
                    return counter++;
                };
            }(),
            templatify: function templatify(obj) {
                return $.isFunction(obj) ? obj : template;

                function template() {
                    return String(obj);
                }
            },
            defer: function(fn) {
                setTimeout(fn, 0);
            },
            debounce: function(func, wait, immediate) {
                var timeout, result;
                return function() {
                    var context = this,
                        args = arguments,
                        later, callNow;
                    later = function() {
                        timeout = null;
                        if (!immediate) {
                            result = func.apply(context, args);
                        }
                    };
                    callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) {
                        result = func.apply(context, args);
                    }
                    return result;
                };
            },
            throttle: function(func, wait) {
                var context, args, timeout, result, previous, later;
                previous = 0;
                later = function() {
                    previous = new Date();
                    timeout = null;
                    result = func.apply(context, args);
                };
                return function() {
                    var now = new Date(),
                        remaining = wait - (now - previous);
                    context = this;
                    args = arguments;
                    if (remaining <= 0) {
                        clearTimeout(timeout);
                        timeout = null;
                        previous = now;
                        result = func.apply(context, args);
                    } else if (!timeout) {
                        timeout = setTimeout(later, remaining);
                    }
                    return result;
                };
            },
            noop: function() {}
        };
    }();
    var VERSION = "0.10.5";
    var tokenizers = function() {
        "use strict";
        return {
            nonword: nonword,
            whitespace: whitespace,
            obj: {
                nonword: getObjTokenizer(nonword),
                whitespace: getObjTokenizer(whitespace)
            }
        };

        function whitespace(str) {
            str = _.toStr(str);
            return str ? str.split(/\s+/) : [];
        }

        function nonword(str) {
            str = _.toStr(str);
            return str ? str.split(/\W+/) : [];
        }

        function getObjTokenizer(tokenizer) {
            return function setKey() {
                var args = [].slice.call(arguments, 0);
                return function tokenize(o) {
                    var tokens = [];
                    _.each(args, function(k) {
                        tokens = tokens.concat(tokenizer(_.toStr(o[k])));
                    });
                    return tokens;
                };
            };
        }
    }();
    var LruCache = function() {
        "use strict";

        function LruCache(maxSize) {
            this.maxSize = _.isNumber(maxSize) ? maxSize : 100;
            this.reset();
            if (this.maxSize <= 0) {
                this.set = this.get = $.noop;
            }
        }
        _.mixin(LruCache.prototype, {
            set: function set(key, val) {
                var tailItem = this.list.tail,
                    node;
                if (this.size >= this.maxSize) {
                    this.list.remove(tailItem);
                    delete this.hash[tailItem.key];
                }
                if (node = this.hash[key]) {
                    node.val = val;
                    this.list.moveToFront(node);
                } else {
                    node = new Node(key, val);
                    this.list.add(node);
                    this.hash[key] = node;
                    this.size++;
                }
            },
            get: function get(key) {
                var node = this.hash[key];
                if (node) {
                    this.list.moveToFront(node);
                    return node.val;
                }
            },
            reset: function reset() {
                this.size = 0;
                this.hash = {};
                this.list = new List();
            }
        });

        function List() {
            this.head = this.tail = null;
        }
        _.mixin(List.prototype, {
            add: function add(node) {
                if (this.head) {
                    node.next = this.head;
                    this.head.prev = node;
                }
                this.head = node;
                this.tail = this.tail || node;
            },
            remove: function remove(node) {
                node.prev ? node.prev.next = node.next : this.head = node.next;
                node.next ? node.next.prev = node.prev : this.tail = node.prev;
            },
            moveToFront: function(node) {
                this.remove(node);
                this.add(node);
            }
        });

        function Node(key, val) {
            this.key = key;
            this.val = val;
            this.prev = this.next = null;
        }
        return LruCache;
    }();
    var PersistentStorage = function() {
        "use strict";
        var ls, methods;
        try {
            ls = window.localStorage;
            ls.setItem("~~~", "!");
            ls.removeItem("~~~");
        } catch (err) {
            ls = null;
        }

        function PersistentStorage(namespace) {
            this.prefix = ["__", namespace, "__"].join("");
            this.ttlKey = "__ttl__";
            this.keyMatcher = new RegExp("^" + _.escapeRegExChars(this.prefix));
        }
        if (ls && window.JSON) {
            methods = {
                _prefix: function(key) {
                    return this.prefix + key;
                },
                _ttlKey: function(key) {
                    return this._prefix(key) + this.ttlKey;
                },
                get: function(key) {
                    if (this.isExpired(key)) {
                        this.remove(key);
                    }
                    return decode(ls.getItem(this._prefix(key)));
                },
                set: function(key, val, ttl) {
                    if (_.isNumber(ttl)) {
                        ls.setItem(this._ttlKey(key), encode(now() + ttl));
                    } else {
                        ls.removeItem(this._ttlKey(key));
                    }
                    return ls.setItem(this._prefix(key), encode(val));
                },
                remove: function(key) {
                    ls.removeItem(this._ttlKey(key));
                    ls.removeItem(this._prefix(key));
                    return this;
                },
                clear: function() {
                    var i, key, keys = [],
                        len = ls.length;
                    for (i = 0; i < len; i++) {
                        if ((key = ls.key(i)).match(this.keyMatcher)) {
                            keys.push(key.replace(this.keyMatcher, ""));
                        }
                    }
                    for (i = keys.length; i--;) {
                        this.remove(keys[i]);
                    }
                    return this;
                },
                isExpired: function(key) {
                    var ttl = decode(ls.getItem(this._ttlKey(key)));
                    return _.isNumber(ttl) && now() > ttl ? true : false;
                }
            };
        } else {
            methods = {
                get: _.noop,
                set: _.noop,
                remove: _.noop,
                clear: _.noop,
                isExpired: _.noop
            };
        }
        _.mixin(PersistentStorage.prototype, methods);
        return PersistentStorage;

        function now() {
            return new Date().getTime();
        }

        function encode(val) {
            return JSON.stringify(_.isUndefined(val) ? null : val);
        }

        function decode(val) {
            return JSON.parse(val);
        }
    }();
    var Transport = function() {
        "use strict";
        var pendingRequestsCount = 0,
            pendingRequests = {},
            maxPendingRequests = 6,
            sharedCache = new LruCache(10);

        function Transport(o) {
            o = o || {};
            this.cancelled = false;
            this.lastUrl = null;
            this._send = o.transport ? callbackToDeferred(o.transport) : $.ajax;
            this._get = o.rateLimiter ? o.rateLimiter(this._get) : this._get;
            this._cache = o.cache === false ? new LruCache(0) : sharedCache;
        }
        Transport.setMaxPendingRequests = function setMaxPendingRequests(num) {
            maxPendingRequests = num;
        };
        Transport.resetCache = function resetCache() {
            sharedCache.reset();
        };
        _.mixin(Transport.prototype, {
            _get: function(url, o, cb) {
                var that = this,
                    jqXhr;
                if (this.cancelled || url !== this.lastUrl) {
                    return;
                }
                if (jqXhr = pendingRequests[url]) {
                    jqXhr.done(done).fail(fail);
                } else if (pendingRequestsCount < maxPendingRequests) {
                    pendingRequestsCount++;
                    pendingRequests[url] = this._send(url, o).done(done).fail(fail).always(always);
                } else {
                    this.onDeckRequestArgs = [].slice.call(arguments, 0);
                }

                function done(resp) {
                    cb && cb(null, resp);
                    that._cache.set(url, resp);
                }

                function fail() {
                    cb && cb(true);
                }

                function always() {
                    pendingRequestsCount--;
                    delete pendingRequests[url];
                    if (that.onDeckRequestArgs) {
                        that._get.apply(that, that.onDeckRequestArgs);
                        that.onDeckRequestArgs = null;
                    }
                }
            },
            get: function(url, o, cb) {
                var resp;
                if (_.isFunction(o)) {
                    cb = o;
                    o = {};
                }
                this.cancelled = false;
                this.lastUrl = url;
                if (resp = this._cache.get(url)) {
                    _.defer(function() {
                        cb && cb(null, resp);
                    });
                } else {
                    this._get(url, o, cb);
                }
                return !!resp;
            },
            cancel: function() {
                this.cancelled = true;
            }
        });
        return Transport;

        function callbackToDeferred(fn) {
            return function customSendWrapper(url, o) {
                var deferred = $.Deferred();
                fn(url, o, onSuccess, onError);
                return deferred;

                function onSuccess(resp) {
                    _.defer(function() {
                        deferred.resolve(resp);
                    });
                }

                function onError(err) {
                    _.defer(function() {
                        deferred.reject(err);
                    });
                }
            };
        }
    }();
    var SearchIndex = function() {
        "use strict";

        function SearchIndex(o) {
            o = o || {};
            if (!o.datumTokenizer || !o.queryTokenizer) {
                $.error("datumTokenizer and queryTokenizer are both required");
            }
            this.datumTokenizer = o.datumTokenizer;
            this.queryTokenizer = o.queryTokenizer;
            this.reset();
        }
        _.mixin(SearchIndex.prototype, {
            bootstrap: function bootstrap(o) {
                this.datums = o.datums;
                this.trie = o.trie;
            },
            add: function(data) {
                var that = this;
                data = _.isArray(data) ? data : [data];
                _.each(data, function(datum) {
                    var id, tokens;
                    id = that.datums.push(datum) - 1;
                    tokens = normalizeTokens(that.datumTokenizer(datum));
                    _.each(tokens, function(token) {
                        var node, chars, ch;
                        node = that.trie;
                        chars = token.split("");
                        while (ch = chars.shift()) {
                            node = node.children[ch] || (node.children[ch] = newNode());
                            node.ids.push(id);
                        }
                    });
                });
            },
            get: function get(query) {
                var that = this,
                    tokens, matches;
                tokens = normalizeTokens(this.queryTokenizer(query));
                _.each(tokens, function(token) {
                    var node, chars, ch, ids;
                    if (matches && matches.length === 0) {
                        return false;
                    }
                    node = that.trie;
                    chars = token.split("");
                    while (node && (ch = chars.shift())) {
                        node = node.children[ch];
                    }
                    if (node && chars.length === 0) {
                        ids = node.ids.slice(0);
                        matches = matches ? getIntersection(matches, ids) : ids;
                    } else {
                        matches = [];
                        return false;
                    }
                });
                return matches ? _.map(unique(matches), function(id) {
                    return that.datums[id];
                }) : [];
            },
            reset: function reset() {
                this.datums = [];
                this.trie = newNode();
            },
            serialize: function serialize() {
                return {
                    datums: this.datums,
                    trie: this.trie
                };
            }
        });
        return SearchIndex;

        function normalizeTokens(tokens) {
            tokens = _.filter(tokens, function(token) {
                return !!token;
            });
            tokens = _.map(tokens, function(token) {
                return token.toLowerCase();
            });
            return tokens;
        }

        function newNode() {
            return {
                ids: [],
                children: {}
            };
        }

        function unique(array) {
            var seen = {},
                uniques = [];
            for (var i = 0, len = array.length; i < len; i++) {
                if (!seen[array[i]]) {
                    seen[array[i]] = true;
                    uniques.push(array[i]);
                }
            }
            return uniques;
        }

        function getIntersection(arrayA, arrayB) {
            var ai = 0,
                bi = 0,
                intersection = [];
            arrayA = arrayA.sort(compare);
            arrayB = arrayB.sort(compare);
            var lenArrayA = arrayA.length,
                lenArrayB = arrayB.length;
            while (ai < lenArrayA && bi < lenArrayB) {
                if (arrayA[ai] < arrayB[bi]) {
                    ai++;
                } else if (arrayA[ai] > arrayB[bi]) {
                    bi++;
                } else {
                    intersection.push(arrayA[ai]);
                    ai++;
                    bi++;
                }
            }
            return intersection;

            function compare(a, b) {
                return a - b;
            }
        }
    }();
    var oParser = function() {
        "use strict";
        return {
            local: getLocal,
            prefetch: getPrefetch,
            remote: getRemote
        };

        function getLocal(o) {
            return o.local || null;
        }

        function getPrefetch(o) {
            var prefetch, defaults;
            defaults = {
                url: null,
                thumbprint: "",
                ttl: 24 * 60 * 60 * 1e3,
                filter: null,
                ajax: {}
            };
            if (prefetch = o.prefetch || null) {
                prefetch = _.isString(prefetch) ? {
                    url: prefetch
                } : prefetch;
                prefetch = _.mixin(defaults, prefetch);
                prefetch.thumbprint = VERSION + prefetch.thumbprint;
                prefetch.ajax.type = prefetch.ajax.type || "GET";
                prefetch.ajax.dataType = prefetch.ajax.dataType || "json";
                !prefetch.url && $.error("prefetch requires url to be set");
            }
            return prefetch;
        }

        function getRemote(o) {
            var remote, defaults;
            defaults = {
                url: null,
                cache: true,
                wildcard: "%QUERY",
                replace: null,
                rateLimitBy: "debounce",
                rateLimitWait: 300,
                send: null,
                filter: null,
                ajax: {}
            };
            if (remote = o.remote || null) {
                remote = _.isString(remote) ? {
                    url: remote
                } : remote;
                remote = _.mixin(defaults, remote);
                remote.rateLimiter = /^throttle$/i.test(remote.rateLimitBy) ? byThrottle(remote.rateLimitWait) : byDebounce(remote.rateLimitWait);
                remote.ajax.type = remote.ajax.type || "GET";
                remote.ajax.dataType = remote.ajax.dataType || "json";
                delete remote.rateLimitBy;
                delete remote.rateLimitWait;
                !remote.url && $.error("remote requires url to be set");
            }
            return remote;

            function byDebounce(wait) {
                return function(fn) {
                    return _.debounce(fn, wait);
                };
            }

            function byThrottle(wait) {
                return function(fn) {
                    return _.throttle(fn, wait);
                };
            }
        }
    }();
    (function(root) {
        "use strict";
        var old, keys;
        old = root.Bloodhound;
        keys = {
            data: "data",
            protocol: "protocol",
            thumbprint: "thumbprint"
        };
        root.Bloodhound = Bloodhound;

        function Bloodhound(o) {
            if (!o || !o.local && !o.prefetch && !o.remote) {
                $.error("one of local, prefetch, or remote is required");
            }
            this.limit = o.limit || 5;
            this.sorter = getSorter(o.sorter);
            this.dupDetector = o.dupDetector || ignoreDuplicates;
            this.local = oParser.local(o);
            this.prefetch = oParser.prefetch(o);
            this.remote = oParser.remote(o);
            this.cacheKey = this.prefetch ? this.prefetch.cacheKey || this.prefetch.url : null;
            this.index = new SearchIndex({
                datumTokenizer: o.datumTokenizer,
                queryTokenizer: o.queryTokenizer
            });
            this.storage = this.cacheKey ? new PersistentStorage(this.cacheKey) : null;
        }
        Bloodhound.noConflict = function noConflict() {
            root.Bloodhound = old;
            return Bloodhound;
        };
        Bloodhound.tokenizers = tokenizers;
        _.mixin(Bloodhound.prototype, {
            _loadPrefetch: function loadPrefetch(o) {
                var that = this,
                    serialized, deferred;
                if (serialized = this._readFromStorage(o.thumbprint)) {
                    this.index.bootstrap(serialized);
                    deferred = $.Deferred().resolve();
                } else {
                    deferred = $.ajax(o.url, o.ajax).done(handlePrefetchResponse);
                }
                return deferred;

                function handlePrefetchResponse(resp) {
                    that.clear();
                    that.add(o.filter ? o.filter(resp) : resp);
                    that._saveToStorage(that.index.serialize(), o.thumbprint, o.ttl);
                }
            },
            _getFromRemote: function getFromRemote(query, cb) {
                var that = this,
                    url, uriEncodedQuery;
                if (!this.transport) {
                    return;
                }
                query = query || "";
                uriEncodedQuery = encodeURIComponent(query);
                url = this.remote.replace ? this.remote.replace(this.remote.url, query) : this.remote.url.replace(this.remote.wildcard, uriEncodedQuery);
                return this.transport.get(url, this.remote.ajax, handleRemoteResponse);

                function handleRemoteResponse(err, resp) {
                    err ? cb([]) : cb(that.remote.filter ? that.remote.filter(resp) : resp);
                }
            },
            _cancelLastRemoteRequest: function cancelLastRemoteRequest() {
                this.transport && this.transport.cancel();
            },
            _saveToStorage: function saveToStorage(data, thumbprint, ttl) {
                if (this.storage) {
                    this.storage.set(keys.data, data, ttl);
                    this.storage.set(keys.protocol, location.protocol, ttl);
                    this.storage.set(keys.thumbprint, thumbprint, ttl);
                }
            },
            _readFromStorage: function readFromStorage(thumbprint) {
                var stored = {},
                    isExpired;
                if (this.storage) {
                    stored.data = this.storage.get(keys.data);
                    stored.protocol = this.storage.get(keys.protocol);
                    stored.thumbprint = this.storage.get(keys.thumbprint);
                }
                isExpired = stored.thumbprint !== thumbprint || stored.protocol !== location.protocol;
                return stored.data && !isExpired ? stored.data : null;
            },
            _initialize: function initialize() {
                var that = this,
                    local = this.local,
                    deferred;
                deferred = this.prefetch ? this._loadPrefetch(this.prefetch) : $.Deferred().resolve();
                local && deferred.done(addLocalToIndex);
                this.transport = this.remote ? new Transport(this.remote) : null;
                return this.initPromise = deferred.promise();

                function addLocalToIndex() {
                    that.add(_.isFunction(local) ? local() : local);
                }
            },
            initialize: function initialize(force) {
                return !this.initPromise || force ? this._initialize() : this.initPromise;
            },
            add: function add(data) {
                this.index.add(data);
            },
            get: function get(query, cb) {
                var that = this,
                    matches = [],
                    cacheHit = false;
                matches = this.index.get(query);
                matches = this.sorter(matches).slice(0, this.limit);
                matches.length < this.limit ? cacheHit = this._getFromRemote(query, returnRemoteMatches) : this._cancelLastRemoteRequest();
                if (!cacheHit) {
                    (matches.length > 0 || !this.transport) && cb && cb(matches);
                }

                function returnRemoteMatches(remoteMatches) {
                    var matchesWithBackfill = matches.slice(0);
                    _.each(remoteMatches, function(remoteMatch) {
                        var isDuplicate;
                        isDuplicate = _.some(matchesWithBackfill, function(match) {
                            return that.dupDetector(remoteMatch, match);
                        });
                        !isDuplicate && matchesWithBackfill.push(remoteMatch);
                        return matchesWithBackfill.length < that.limit;
                    });
                    cb && cb(that.sorter(matchesWithBackfill));
                }
            },
            clear: function clear() {
                this.index.reset();
            },
            clearPrefetchCache: function clearPrefetchCache() {
                this.storage && this.storage.clear();
            },
            clearRemoteCache: function clearRemoteCache() {
                this.transport && Transport.resetCache();
            },
            ttAdapter: function ttAdapter() {
                return _.bind(this.get, this);
            }
        });
        return Bloodhound;

        function getSorter(sortFn) {
            return _.isFunction(sortFn) ? sort : noSort;

            function sort(array) {
                return array.sort(sortFn);
            }

            function noSort(array) {
                return array;
            }
        }

        function ignoreDuplicates() {
            return false;
        }
    })(this);
})(window.jQuery);
/*!
 * typeahead.js 0.10.5
 * https://github.com/twitter/typeahead.js
 * Copyright 2013-2014 Twitter, Inc. and other contributors; Licensed MIT
 */
(function($) {
    var _ = function() {
        "use strict";
        return {
            isMsie: function() {
                return /(msie|trident)/i.test(navigator.userAgent) ? navigator.userAgent.match(/(msie |rv:)(\d+(.\d+)?)/i)[2] : false;
            },
            isBlankString: function(str) {
                return !str || /^\s*$/.test(str);
            },
            escapeRegExChars: function(str) {
                return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            },
            isString: function(obj) {
                return typeof obj === "string";
            },
            isNumber: function(obj) {
                return typeof obj === "number";
            },
            isArray: $.isArray,
            isFunction: $.isFunction,
            isObject: $.isPlainObject,
            isUndefined: function(obj) {
                return typeof obj === "undefined";
            },
            toStr: function toStr(s) {
                return _.isUndefined(s) || s === null ? "" : s + "";
            },
            bind: $.proxy,
            each: function(collection, cb) {
                $.each(collection, reverseArgs);

                function reverseArgs(index, value) {
                    return cb(value, index);
                }
            },
            map: $.map,
            filter: $.grep,
            every: function(obj, test) {
                var result = true;
                if (!obj) {
                    return result;
                }
                $.each(obj, function(key, val) {
                    if (!(result = test.call(null, val, key, obj))) {
                        return false;
                    }
                });
                return !!result;
            },
            some: function(obj, test) {
                var result = false;
                if (!obj) {
                    return result;
                }
                $.each(obj, function(key, val) {
                    if (result = test.call(null, val, key, obj)) {
                        return false;
                    }
                });
                return !!result;
            },
            mixin: $.extend,
            getUniqueId: function() {
                var counter = 0;
                return function() {
                    return counter++;
                };
            }(),
            templatify: function templatify(obj) {
                return $.isFunction(obj) ? obj : template;

                function template() {
                    return String(obj);
                }
            },
            defer: function(fn) {
                setTimeout(fn, 0);
            },
            debounce: function(func, wait, immediate) {
                var timeout, result;
                return function() {
                    var context = this,
                        args = arguments,
                        later, callNow;
                    later = function() {
                        timeout = null;
                        if (!immediate) {
                            result = func.apply(context, args);
                        }
                    };
                    callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) {
                        result = func.apply(context, args);
                    }
                    return result;
                };
            },
            throttle: function(func, wait) {
                var context, args, timeout, result, previous, later;
                previous = 0;
                later = function() {
                    previous = new Date();
                    timeout = null;
                    result = func.apply(context, args);
                };
                return function() {
                    var now = new Date(),
                        remaining = wait - (now - previous);
                    context = this;
                    args = arguments;
                    if (remaining <= 0) {
                        clearTimeout(timeout);
                        timeout = null;
                        previous = now;
                        result = func.apply(context, args);
                    } else if (!timeout) {
                        timeout = setTimeout(later, remaining);
                    }
                    return result;
                };
            },
            noop: function() {}
        };
    }();
    var VERSION = "0.10.5";
    var tokenizers = function() {
        "use strict";
        return {
            nonword: nonword,
            whitespace: whitespace,
            obj: {
                nonword: getObjTokenizer(nonword),
                whitespace: getObjTokenizer(whitespace)
            }
        };

        function whitespace(str) {
            str = _.toStr(str);
            return str ? str.split(/\s+/) : [];
        }

        function nonword(str) {
            str = _.toStr(str);
            return str ? str.split(/\W+/) : [];
        }

        function getObjTokenizer(tokenizer) {
            return function setKey() {
                var args = [].slice.call(arguments, 0);
                return function tokenize(o) {
                    var tokens = [];
                    _.each(args, function(k) {
                        tokens = tokens.concat(tokenizer(_.toStr(o[k])));
                    });
                    return tokens;
                };
            };
        }
    }();
    var LruCache = function() {
        "use strict";

        function LruCache(maxSize) {
            this.maxSize = _.isNumber(maxSize) ? maxSize : 100;
            this.reset();
            if (this.maxSize <= 0) {
                this.set = this.get = $.noop;
            }
        }
        _.mixin(LruCache.prototype, {
            set: function set(key, val) {
                var tailItem = this.list.tail,
                    node;
                if (this.size >= this.maxSize) {
                    this.list.remove(tailItem);
                    delete this.hash[tailItem.key];
                }
                if (node = this.hash[key]) {
                    node.val = val;
                    this.list.moveToFront(node);
                } else {
                    node = new Node(key, val);
                    this.list.add(node);
                    this.hash[key] = node;
                    this.size++;
                }
            },
            get: function get(key) {
                var node = this.hash[key];
                if (node) {
                    this.list.moveToFront(node);
                    return node.val;
                }
            },
            reset: function reset() {
                this.size = 0;
                this.hash = {};
                this.list = new List();
            }
        });

        function List() {
            this.head = this.tail = null;
        }
        _.mixin(List.prototype, {
            add: function add(node) {
                if (this.head) {
                    node.next = this.head;
                    this.head.prev = node;
                }
                this.head = node;
                this.tail = this.tail || node;
            },
            remove: function remove(node) {
                node.prev ? node.prev.next = node.next : this.head = node.next;
                node.next ? node.next.prev = node.prev : this.tail = node.prev;
            },
            moveToFront: function(node) {
                this.remove(node);
                this.add(node);
            }
        });

        function Node(key, val) {
            this.key = key;
            this.val = val;
            this.prev = this.next = null;
        }
        return LruCache;
    }();
    var PersistentStorage = function() {
        "use strict";
        var ls, methods;
        try {
            ls = window.localStorage;
            ls.setItem("~~~", "!");
            ls.removeItem("~~~");
        } catch (err) {
            ls = null;
        }

        function PersistentStorage(namespace) {
            this.prefix = ["__", namespace, "__"].join("");
            this.ttlKey = "__ttl__";
            this.keyMatcher = new RegExp("^" + _.escapeRegExChars(this.prefix));
        }
        if (ls && window.JSON) {
            methods = {
                _prefix: function(key) {
                    return this.prefix + key;
                },
                _ttlKey: function(key) {
                    return this._prefix(key) + this.ttlKey;
                },
                get: function(key) {
                    if (this.isExpired(key)) {
                        this.remove(key);
                    }
                    return decode(ls.getItem(this._prefix(key)));
                },
                set: function(key, val, ttl) {
                    if (_.isNumber(ttl)) {
                        ls.setItem(this._ttlKey(key), encode(now() + ttl));
                    } else {
                        ls.removeItem(this._ttlKey(key));
                    }
                    return ls.setItem(this._prefix(key), encode(val));
                },
                remove: function(key) {
                    ls.removeItem(this._ttlKey(key));
                    ls.removeItem(this._prefix(key));
                    return this;
                },
                clear: function() {
                    var i, key, keys = [],
                        len = ls.length;
                    for (i = 0; i < len; i++) {
                        if ((key = ls.key(i)).match(this.keyMatcher)) {
                            keys.push(key.replace(this.keyMatcher, ""));
                        }
                    }
                    for (i = keys.length; i--;) {
                        this.remove(keys[i]);
                    }
                    return this;
                },
                isExpired: function(key) {
                    var ttl = decode(ls.getItem(this._ttlKey(key)));
                    return _.isNumber(ttl) && now() > ttl ? true : false;
                }
            };
        } else {
            methods = {
                get: _.noop,
                set: _.noop,
                remove: _.noop,
                clear: _.noop,
                isExpired: _.noop
            };
        }
        _.mixin(PersistentStorage.prototype, methods);
        return PersistentStorage;

        function now() {
            return new Date().getTime();
        }

        function encode(val) {
            return JSON.stringify(_.isUndefined(val) ? null : val);
        }

        function decode(val) {
            return JSON.parse(val);
        }
    }();
    var Transport = function() {
        "use strict";
        var pendingRequestsCount = 0,
            pendingRequests = {},
            maxPendingRequests = 6,
            sharedCache = new LruCache(10);

        function Transport(o) {
            o = o || {};
            this.cancelled = false;
            this.lastUrl = null;
            this._send = o.transport ? callbackToDeferred(o.transport) : $.ajax;
            this._get = o.rateLimiter ? o.rateLimiter(this._get) : this._get;
            this._cache = o.cache === false ? new LruCache(0) : sharedCache;
        }
        Transport.setMaxPendingRequests = function setMaxPendingRequests(num) {
            maxPendingRequests = num;
        };
        Transport.resetCache = function resetCache() {
            sharedCache.reset();
        };
        _.mixin(Transport.prototype, {
            _get: function(url, o, cb) {
                var that = this,
                    jqXhr;
                if (this.cancelled || url !== this.lastUrl) {
                    return;
                }
                if (jqXhr = pendingRequests[url]) {
                    jqXhr.done(done).fail(fail);
                } else if (pendingRequestsCount < maxPendingRequests) {
                    pendingRequestsCount++;
                    pendingRequests[url] = this._send(url, o).done(done).fail(fail).always(always);
                } else {
                    this.onDeckRequestArgs = [].slice.call(arguments, 0);
                }

                function done(resp) {
                    cb && cb(null, resp);
                    that._cache.set(url, resp);
                }

                function fail() {
                    cb && cb(true);
                }

                function always() {
                    pendingRequestsCount--;
                    delete pendingRequests[url];
                    if (that.onDeckRequestArgs) {
                        that._get.apply(that, that.onDeckRequestArgs);
                        that.onDeckRequestArgs = null;
                    }
                }
            },
            get: function(url, o, cb) {
                var resp;
                if (_.isFunction(o)) {
                    cb = o;
                    o = {};
                }
                this.cancelled = false;
                this.lastUrl = url;
                if (resp = this._cache.get(url)) {
                    _.defer(function() {
                        cb && cb(null, resp);
                    });
                } else {
                    this._get(url, o, cb);
                }
                return !!resp;
            },
            cancel: function() {
                this.cancelled = true;
            }
        });
        return Transport;

        function callbackToDeferred(fn) {
            return function customSendWrapper(url, o) {
                var deferred = $.Deferred();
                fn(url, o, onSuccess, onError);
                return deferred;

                function onSuccess(resp) {
                    _.defer(function() {
                        deferred.resolve(resp);
                    });
                }

                function onError(err) {
                    _.defer(function() {
                        deferred.reject(err);
                    });
                }
            };
        }
    }();
    var SearchIndex = function() {
        "use strict";

        function SearchIndex(o) {
            o = o || {};
            if (!o.datumTokenizer || !o.queryTokenizer) {
                $.error("datumTokenizer and queryTokenizer are both required");
            }
            this.datumTokenizer = o.datumTokenizer;
            this.queryTokenizer = o.queryTokenizer;
            this.reset();
        }
        _.mixin(SearchIndex.prototype, {
            bootstrap: function bootstrap(o) {
                this.datums = o.datums;
                this.trie = o.trie;
            },
            add: function(data) {
                var that = this;
                data = _.isArray(data) ? data : [data];
                _.each(data, function(datum) {
                    var id, tokens;
                    id = that.datums.push(datum) - 1;
                    tokens = normalizeTokens(that.datumTokenizer(datum));
                    _.each(tokens, function(token) {
                        var node, chars, ch;
                        node = that.trie;
                        chars = token.split("");
                        while (ch = chars.shift()) {
                            node = node.children[ch] || (node.children[ch] = newNode());
                            node.ids.push(id);
                        }
                    });
                });
            },
            get: function get(query) {
                var that = this,
                    tokens, matches;
                tokens = normalizeTokens(this.queryTokenizer(query));
                _.each(tokens, function(token) {
                    var node, chars, ch, ids;
                    if (matches && matches.length === 0) {
                        return false;
                    }
                    node = that.trie;
                    chars = token.split("");
                    while (node && (ch = chars.shift())) {
                        node = node.children[ch];
                    }
                    if (node && chars.length === 0) {
                        ids = node.ids.slice(0);
                        matches = matches ? getIntersection(matches, ids) : ids;
                    } else {
                        matches = [];
                        return false;
                    }
                });
                return matches ? _.map(unique(matches), function(id) {
                    return that.datums[id];
                }) : [];
            },
            reset: function reset() {
                this.datums = [];
                this.trie = newNode();
            },
            serialize: function serialize() {
                return {
                    datums: this.datums,
                    trie: this.trie
                };
            }
        });
        return SearchIndex;

        function normalizeTokens(tokens) {
            tokens = _.filter(tokens, function(token) {
                return !!token;
            });
            tokens = _.map(tokens, function(token) {
                return token.toLowerCase();
            });
            return tokens;
        }

        function newNode() {
            return {
                ids: [],
                children: {}
            };
        }

        function unique(array) {
            var seen = {},
                uniques = [];
            for (var i = 0, len = array.length; i < len; i++) {
                if (!seen[array[i]]) {
                    seen[array[i]] = true;
                    uniques.push(array[i]);
                }
            }
            return uniques;
        }

        function getIntersection(arrayA, arrayB) {
            var ai = 0,
                bi = 0,
                intersection = [];
            arrayA = arrayA.sort(compare);
            arrayB = arrayB.sort(compare);
            var lenArrayA = arrayA.length,
                lenArrayB = arrayB.length;
            while (ai < lenArrayA && bi < lenArrayB) {
                if (arrayA[ai] < arrayB[bi]) {
                    ai++;
                } else if (arrayA[ai] > arrayB[bi]) {
                    bi++;
                } else {
                    intersection.push(arrayA[ai]);
                    ai++;
                    bi++;
                }
            }
            return intersection;

            function compare(a, b) {
                return a - b;
            }
        }
    }();
    var oParser = function() {
        "use strict";
        return {
            local: getLocal,
            prefetch: getPrefetch,
            remote: getRemote
        };

        function getLocal(o) {
            return o.local || null;
        }

        function getPrefetch(o) {
            var prefetch, defaults;
            defaults = {
                url: null,
                thumbprint: "",
                ttl: 24 * 60 * 60 * 1e3,
                filter: null,
                ajax: {}
            };
            if (prefetch = o.prefetch || null) {
                prefetch = _.isString(prefetch) ? {
                    url: prefetch
                } : prefetch;
                prefetch = _.mixin(defaults, prefetch);
                prefetch.thumbprint = VERSION + prefetch.thumbprint;
                prefetch.ajax.type = prefetch.ajax.type || "GET";
                prefetch.ajax.dataType = prefetch.ajax.dataType || "json";
                !prefetch.url && $.error("prefetch requires url to be set");
            }
            return prefetch;
        }

        function getRemote(o) {
            var remote, defaults;
            defaults = {
                url: null,
                cache: true,
                wildcard: "%QUERY",
                replace: null,
                rateLimitBy: "debounce",
                rateLimitWait: 300,
                send: null,
                filter: null,
                ajax: {}
            };
            if (remote = o.remote || null) {
                remote = _.isString(remote) ? {
                    url: remote
                } : remote;
                remote = _.mixin(defaults, remote);
                remote.rateLimiter = /^throttle$/i.test(remote.rateLimitBy) ? byThrottle(remote.rateLimitWait) : byDebounce(remote.rateLimitWait);
                remote.ajax.type = remote.ajax.type || "GET";
                remote.ajax.dataType = remote.ajax.dataType || "json";
                delete remote.rateLimitBy;
                delete remote.rateLimitWait;
                !remote.url && $.error("remote requires url to be set");
            }
            return remote;

            function byDebounce(wait) {
                return function(fn) {
                    return _.debounce(fn, wait);
                };
            }

            function byThrottle(wait) {
                return function(fn) {
                    return _.throttle(fn, wait);
                };
            }
        }
    }();
    (function(root) {
        "use strict";
        var old, keys;
        old = root.Bloodhound;
        keys = {
            data: "data",
            protocol: "protocol",
            thumbprint: "thumbprint"
        };
        root.Bloodhound = Bloodhound;

        function Bloodhound(o) {
            if (!o || !o.local && !o.prefetch && !o.remote) {
                $.error("one of local, prefetch, or remote is required");
            }
            this.limit = o.limit || 5;
            this.sorter = getSorter(o.sorter);
            this.dupDetector = o.dupDetector || ignoreDuplicates;
            this.local = oParser.local(o);
            this.prefetch = oParser.prefetch(o);
            this.remote = oParser.remote(o);
            this.cacheKey = this.prefetch ? this.prefetch.cacheKey || this.prefetch.url : null;
            this.index = new SearchIndex({
                datumTokenizer: o.datumTokenizer,
                queryTokenizer: o.queryTokenizer
            });
            this.storage = this.cacheKey ? new PersistentStorage(this.cacheKey) : null;
        }
        Bloodhound.noConflict = function noConflict() {
            root.Bloodhound = old;
            return Bloodhound;
        };
        Bloodhound.tokenizers = tokenizers;
        _.mixin(Bloodhound.prototype, {
            _loadPrefetch: function loadPrefetch(o) {
                var that = this,
                    serialized, deferred;
                if (serialized = this._readFromStorage(o.thumbprint)) {
                    this.index.bootstrap(serialized);
                    deferred = $.Deferred().resolve();
                } else {
                    deferred = $.ajax(o.url, o.ajax).done(handlePrefetchResponse);
                }
                return deferred;

                function handlePrefetchResponse(resp) {
                    that.clear();
                    that.add(o.filter ? o.filter(resp) : resp);
                    that._saveToStorage(that.index.serialize(), o.thumbprint, o.ttl);
                }
            },
            _getFromRemote: function getFromRemote(query, cb) {
                var that = this,
                    url, uriEncodedQuery;
                if (!this.transport) {
                    return;
                }
                query = query || "";
                uriEncodedQuery = encodeURIComponent(query);
                url = this.remote.replace ? this.remote.replace(this.remote.url, query) : this.remote.url.replace(this.remote.wildcard, uriEncodedQuery);
                return this.transport.get(url, this.remote.ajax, handleRemoteResponse);

                function handleRemoteResponse(err, resp) {
                    err ? cb([]) : cb(that.remote.filter ? that.remote.filter(resp) : resp);
                }
            },
            _cancelLastRemoteRequest: function cancelLastRemoteRequest() {
                this.transport && this.transport.cancel();
            },
            _saveToStorage: function saveToStorage(data, thumbprint, ttl) {
                if (this.storage) {
                    this.storage.set(keys.data, data, ttl);
                    this.storage.set(keys.protocol, location.protocol, ttl);
                    this.storage.set(keys.thumbprint, thumbprint, ttl);
                }
            },
            _readFromStorage: function readFromStorage(thumbprint) {
                var stored = {},
                    isExpired;
                if (this.storage) {
                    stored.data = this.storage.get(keys.data);
                    stored.protocol = this.storage.get(keys.protocol);
                    stored.thumbprint = this.storage.get(keys.thumbprint);
                }
                isExpired = stored.thumbprint !== thumbprint || stored.protocol !== location.protocol;
                return stored.data && !isExpired ? stored.data : null;
            },
            _initialize: function initialize() {
                var that = this,
                    local = this.local,
                    deferred;
                deferred = this.prefetch ? this._loadPrefetch(this.prefetch) : $.Deferred().resolve();
                local && deferred.done(addLocalToIndex);
                this.transport = this.remote ? new Transport(this.remote) : null;
                return this.initPromise = deferred.promise();

                function addLocalToIndex() {
                    that.add(_.isFunction(local) ? local() : local);
                }
            },
            initialize: function initialize(force) {
                return !this.initPromise || force ? this._initialize() : this.initPromise;
            },
            add: function add(data) {
                this.index.add(data);
            },
            get: function get(query, cb) {
                var that = this,
                    matches = [],
                    cacheHit = false;
                matches = this.index.get(query);
                matches = this.sorter(matches).slice(0, this.limit);
                matches.length < this.limit ? cacheHit = this._getFromRemote(query, returnRemoteMatches) : this._cancelLastRemoteRequest();
                if (!cacheHit) {
                    (matches.length > 0 || !this.transport) && cb && cb(matches);
                }

                function returnRemoteMatches(remoteMatches) {
                    var matchesWithBackfill = matches.slice(0);
                    _.each(remoteMatches, function(remoteMatch) {
                        var isDuplicate;
                        isDuplicate = _.some(matchesWithBackfill, function(match) {
                            return that.dupDetector(remoteMatch, match);
                        });
                        !isDuplicate && matchesWithBackfill.push(remoteMatch);
                        return matchesWithBackfill.length < that.limit;
                    });
                    cb && cb(that.sorter(matchesWithBackfill));
                }
            },
            clear: function clear() {
                this.index.reset();
            },
            clearPrefetchCache: function clearPrefetchCache() {
                this.storage && this.storage.clear();
            },
            clearRemoteCache: function clearRemoteCache() {
                this.transport && Transport.resetCache();
            },
            ttAdapter: function ttAdapter() {
                return _.bind(this.get, this);
            }
        });
        return Bloodhound;

        function getSorter(sortFn) {
            return _.isFunction(sortFn) ? sort : noSort;

            function sort(array) {
                return array.sort(sortFn);
            }

            function noSort(array) {
                return array;
            }
        }

        function ignoreDuplicates() {
            return false;
        }
    })(this);
    var html = function() {
        return {
            wrapper: '<span class="twitter-typeahead"></span>',
            dropdown: '<span class="tt-dropdown-menu"></span>',
            dataset: '<div class="tt-dataset-%CLASS%"></div>',
            suggestions: '<span class="tt-suggestions"></span>',
            suggestion: '<div class="tt-suggestion"></div>'
        };
    }();
    var css = function() {
        "use strict";
        var css = {
            wrapper: {
                position: "relative",
                display: "inline-block"
            },
            hint: {
                position: "absolute",
                top: "0",
                left: "0",
                borderColor: "transparent",
                boxShadow: "none",
                opacity: "1"
            },
            input: {
                position: "relative",
                verticalAlign: "top",
                backgroundColor: "transparent"
            },
            inputWithNoHint: {
                position: "relative",
                verticalAlign: "top"
            },
            dropdown: {
                position: "absolute",
                top: "100%",
                left: "0",
                zIndex: "100",
                display: "none"
            },
            suggestions: {
                display: "block"
            },
            suggestion: {
                whiteSpace: "nowrap",
                cursor: "pointer"
            },
            suggestionChild: {
                whiteSpace: "normal"
            },
            ltr: {
                left: "0",
                right: "auto"
            },
            rtl: {
                left: "auto",
                right: " 0"
            }
        };
        if (_.isMsie()) {
            _.mixin(css.input, {
                backgroundImage: "url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"
            });
        }
        if (_.isMsie() && _.isMsie() <= 7) {
            _.mixin(css.input, {
                marginTop: "-1px"
            });
        }
        return css;
    }();
    var EventBus = function() {
        "use strict";
        var namespace = "typeahead:";

        function EventBus(o) {
            if (!o || !o.el) {
                $.error("EventBus initialized without el");
            }
            this.$el = $(o.el);
        }
        _.mixin(EventBus.prototype, {
            trigger: function(type) {
                var args = [].slice.call(arguments, 1);
                this.$el.trigger(namespace + type, args);
            }
        });
        return EventBus;
    }();
    var EventEmitter = function() {
        "use strict";
        var splitter = /\s+/,
            nextTick = getNextTick();
        return {
            onSync: onSync,
            onAsync: onAsync,
            off: off,
            trigger: trigger
        };

        function on(method, types, cb, context) {
            var type;
            if (!cb) {
                return this;
            }
            types = types.split(splitter);
            cb = context ? bindContext(cb, context) : cb;
            this._callbacks = this._callbacks || {};
            while (type = types.shift()) {
                this._callbacks[type] = this._callbacks[type] || {
                    sync: [],
                    async: []
                };
                this._callbacks[type][method].push(cb);
            }
            return this;
        }

        function onAsync(types, cb, context) {
            return on.call(this, "async", types, cb, context);
        }

        function onSync(types, cb, context) {
            return on.call(this, "sync", types, cb, context);
        }

        function off(types) {
            var type;
            if (!this._callbacks) {
                return this;
            }
            types = types.split(splitter);
            while (type = types.shift()) {
                delete this._callbacks[type];
            }
            return this;
        }

        function trigger(types) {
            var type, callbacks, args, syncFlush, asyncFlush;
            if (!this._callbacks) {
                return this;
            }
            types = types.split(splitter);
            args = [].slice.call(arguments, 1);
            while ((type = types.shift()) && (callbacks = this._callbacks[type])) {
                syncFlush = getFlush(callbacks.sync, this, [type].concat(args));
                asyncFlush = getFlush(callbacks.async, this, [type].concat(args));
                syncFlush() && nextTick(asyncFlush);
            }
            return this;
        }

        function getFlush(callbacks, context, args) {
            return flush;

            function flush() {
                var cancelled;
                for (var i = 0, len = callbacks.length; !cancelled && i < len; i += 1) {
                    cancelled = callbacks[i].apply(context, args) === false;
                }
                return !cancelled;
            }
        }

        function getNextTick() {
            var nextTickFn;
            if (window.setImmediate) {
                nextTickFn = function nextTickSetImmediate(fn) {
                    setImmediate(function() {
                        fn();
                    });
                };
            } else {
                nextTickFn = function nextTickSetTimeout(fn) {
                    setTimeout(function() {
                        fn();
                    }, 0);
                };
            }
            return nextTickFn;
        }

        function bindContext(fn, context) {
            return fn.bind ? fn.bind(context) : function() {
                fn.apply(context, [].slice.call(arguments, 0));
            };
        }
    }();
    var highlight = function(doc) {
        "use strict";
        var defaults = {
            node: null,
            pattern: null,
            tagName: "strong",
            className: null,
            wordsOnly: false,
            caseSensitive: false
        };
        return function hightlight(o) {
            var regex;
            o = _.mixin({}, defaults, o);
            if (!o.node || !o.pattern) {
                return;
            }
            o.pattern = _.isArray(o.pattern) ? o.pattern : [o.pattern];
            regex = getRegex(o.pattern, o.caseSensitive, o.wordsOnly);
            traverse(o.node, hightlightTextNode);

            function hightlightTextNode(textNode) {
                var match, patternNode, wrapperNode;
                if (match = regex.exec(textNode.data)) {
                    wrapperNode = doc.createElement(o.tagName);
                    o.className && (wrapperNode.className = o.className);
                    patternNode = textNode.splitText(match.index);
                    patternNode.splitText(match[0].length);
                    wrapperNode.appendChild(patternNode.cloneNode(true));
                    textNode.parentNode.replaceChild(wrapperNode, patternNode);
                }
                return !!match;
            }

            function traverse(el, hightlightTextNode) {
                var childNode, TEXT_NODE_TYPE = 3;
                for (var i = 0; i < el.childNodes.length; i++) {
                    childNode = el.childNodes[i];
                    if (childNode.nodeType === TEXT_NODE_TYPE) {
                        i += hightlightTextNode(childNode) ? 1 : 0;
                    } else {
                        traverse(childNode, hightlightTextNode);
                    }
                }
            }
        };

        function getRegex(patterns, caseSensitive, wordsOnly) {
            var escapedPatterns = [],
                regexStr;
            for (var i = 0, len = patterns.length; i < len; i++) {
                escapedPatterns.push(_.escapeRegExChars(patterns[i]));
            }
            regexStr = wordsOnly ? "\\b(" + escapedPatterns.join("|") + ")\\b" : "(" + escapedPatterns.join("|") + ")";
            return caseSensitive ? new RegExp(regexStr) : new RegExp(regexStr, "i");
        }
    }(window.document);
    var Input = function() {
        "use strict";
        var specialKeyCodeMap;
        specialKeyCodeMap = {
            9: "tab",
            27: "esc",
            37: "left",
            39: "right",
            13: "enter",
            38: "up",
            40: "down"
        };

        function Input(o) {
            var that = this,
                onBlur, onFocus, onKeydown, onInput;
            o = o || {};
            if (!o.input) {
                $.error("input is missing");
            }
            onBlur = _.bind(this._onBlur, this);
            onFocus = _.bind(this._onFocus, this);
            onKeydown = _.bind(this._onKeydown, this);
            onInput = _.bind(this._onInput, this);
            this.$hint = $(o.hint);
            this.$input = $(o.input).on("blur.tt", onBlur).on("focus.tt", onFocus).on("keydown.tt", onKeydown);
            if (this.$hint.length === 0) {
                this.setHint = this.getHint = this.clearHint = this.clearHintIfInvalid = _.noop;
            }
            if (!_.isMsie()) {
                this.$input.on("input.tt", onInput);
            } else {
                this.$input.on("keydown.tt keypress.tt cut.tt paste.tt", function($e) {
                    if (specialKeyCodeMap[$e.which || $e.keyCode]) {
                        return;
                    }
                    _.defer(_.bind(that._onInput, that, $e));
                });
            }
            this.query = this.$input.val();
            this.$overflowHelper = buildOverflowHelper(this.$input);
        }
        Input.normalizeQuery = function(str) {
            return (str || "").replace(/^\s*/g, "").replace(/\s{2,}/g, " ");
        };
        _.mixin(Input.prototype, EventEmitter, {
            _onBlur: function onBlur() {
                this.resetInputValue();
                this.trigger("blurred");
            },
            _onFocus: function onFocus() {
                this.trigger("focused");
            },
            _onKeydown: function onKeydown($e) {
                var keyName = specialKeyCodeMap[$e.which || $e.keyCode];
                this._managePreventDefault(keyName, $e);
                if (keyName && this._shouldTrigger(keyName, $e)) {
                    this.trigger(keyName + "Keyed", $e);
                }
            },
            _onInput: function onInput() {
                this._checkInputValue();
            },
            _managePreventDefault: function managePreventDefault(keyName, $e) {
                var preventDefault, hintValue, inputValue;
                switch (keyName) {
                    case "tab":
                        hintValue = this.getHint();
                        inputValue = this.getInputValue();
                        preventDefault = hintValue && hintValue !== inputValue && !withModifier($e);
                        break;
                    case "up":
                    case "down":
                        preventDefault = !withModifier($e);
                        break;
                    default:
                        preventDefault = false;
                }
                preventDefault && $e.preventDefault();
            },
            _shouldTrigger: function shouldTrigger(keyName, $e) {
                var trigger;
                switch (keyName) {
                    case "tab":
                        trigger = !withModifier($e);
                        break;
                    default:
                        trigger = true;
                }
                return trigger;
            },
            _checkInputValue: function checkInputValue() {
                var inputValue, areEquivalent, hasDifferentWhitespace;
                inputValue = this.getInputValue();
                areEquivalent = areQueriesEquivalent(inputValue, this.query);
                hasDifferentWhitespace = areEquivalent ? this.query.length !== inputValue.length : false;
                this.query = inputValue;
                if (!areEquivalent) {
                    this.trigger("queryChanged", this.query);
                } else if (hasDifferentWhitespace) {
                    this.trigger("whitespaceChanged", this.query);
                }
            },
            focus: function focus() {
                this.$input.focus();
            },
            blur: function blur() {
                this.$input.blur();
            },
            getQuery: function getQuery() {
                return this.query;
            },
            setQuery: function setQuery(query) {
                this.query = query;
            },
            getInputValue: function getInputValue() {
                return this.$input.val();
            },
            setInputValue: function setInputValue(value, silent) {
                this.$input.val(value);
                silent ? this.clearHint() : this._checkInputValue();
            },
            resetInputValue: function resetInputValue() {
                this.setInputValue(this.query, true);
            },
            getHint: function getHint() {
                return this.$hint.val();
            },
            setHint: function setHint(value) {
                this.$hint.val(value);
            },
            clearHint: function clearHint() {
                this.setHint("");
            },
            clearHintIfInvalid: function clearHintIfInvalid() {
                var val, hint, valIsPrefixOfHint, isValid;
                val = this.getInputValue();
                hint = this.getHint();
                valIsPrefixOfHint = val !== hint && hint.indexOf(val) === 0;
                isValid = val !== "" && valIsPrefixOfHint && !this.hasOverflow();
                !isValid && this.clearHint();
            },
            getLanguageDirection: function getLanguageDirection() {
                return (this.$input.css("direction") || "ltr").toLowerCase();
            },
            hasOverflow: function hasOverflow() {
                var constraint = this.$input.width() - 2;
                this.$overflowHelper.text(this.getInputValue());
                return this.$overflowHelper.width() >= constraint;
            },
            isCursorAtEnd: function() {
                var valueLength, selectionStart, range;
                valueLength = this.$input.val().length;
                selectionStart = this.$input[0].selectionStart;
                if (_.isNumber(selectionStart)) {
                    return selectionStart === valueLength;
                } else if (document.selection) {
                    range = document.selection.createRange();
                    range.moveStart("character", -valueLength);
                    return valueLength === range.text.length;
                }
                return true;
            },
            destroy: function destroy() {
                this.$hint.off(".tt");
                this.$input.off(".tt");
                this.$hint = this.$input = this.$overflowHelper = null;
            }
        });
        return Input;

        function buildOverflowHelper($input) {
            return $('<pre aria-hidden="true"></pre>').css({
                position: "absolute",
                visibility: "hidden",
                whiteSpace: "pre",
                fontFamily: $input.css("font-family"),
                fontSize: $input.css("font-size"),
                fontStyle: $input.css("font-style"),
                fontVariant: $input.css("font-variant"),
                fontWeight: $input.css("font-weight"),
                wordSpacing: $input.css("word-spacing"),
                letterSpacing: $input.css("letter-spacing"),
                textIndent: $input.css("text-indent"),
                textRendering: $input.css("text-rendering"),
                textTransform: $input.css("text-transform")
            }).insertAfter($input);
        }

        function areQueriesEquivalent(a, b) {
            return Input.normalizeQuery(a) === Input.normalizeQuery(b);
        }

        function withModifier($e) {
            return $e.altKey || $e.ctrlKey || $e.metaKey || $e.shiftKey;
        }
    }();
    var Dataset = function() {
        "use strict";
        var datasetKey = "ttDataset",
            valueKey = "ttValue",
            datumKey = "ttDatum";

        function Dataset(o) {
            o = o || {};
            o.templates = o.templates || {};
            if (!o.source) {
                $.error("missing source");
            }
            if (o.name && !isValidName(o.name)) {
                $.error("invalid dataset name: " + o.name);
            }
            this.query = null;
            this.highlight = !!o.highlight;
            this.name = o.name || _.getUniqueId();
            this.source = o.source;
            this.displayFn = getDisplayFn(o.display || o.displayKey);
            this.templates = getTemplates(o.templates, this.displayFn);
            this.$el = $(html.dataset.replace("%CLASS%", this.name));
        }
        Dataset.extractDatasetName = function extractDatasetName(el) {
            return $(el).data(datasetKey);
        };
        Dataset.extractValue = function extractDatum(el) {
            return $(el).data(valueKey);
        };
        Dataset.extractDatum = function extractDatum(el) {
            return $(el).data(datumKey);
        };
        _.mixin(Dataset.prototype, EventEmitter, {
            _render: function render(query, suggestions) {
                if (!this.$el) {
                    return;
                }
                var that = this,
                    hasSuggestions;
                this.$el.empty();
                hasSuggestions = suggestions && suggestions.length;
                if (!hasSuggestions && this.templates.empty) {
                    this.$el.html(getEmptyHtml()).prepend(that.templates.header ? getHeaderHtml() : null).append(that.templates.footer ? getFooterHtml() : null);
                } else if (hasSuggestions) {
                    this.$el.html(getSuggestionsHtml()).prepend(that.templates.header ? getHeaderHtml() : null).append(that.templates.footer ? getFooterHtml() : null);
                }
                this.trigger("rendered");

                function getEmptyHtml() {
                    return that.templates.empty({
                        query: query,
                        isEmpty: true
                    });
                }

                function getSuggestionsHtml() {
                    var $suggestions, nodes;
                    $suggestions = $(html.suggestions).css(css.suggestions);
                    nodes = _.map(suggestions, getSuggestionNode);
                    $suggestions.append.apply($suggestions, nodes);
                    that.highlight && highlight({
                        className: "tt-highlight",
                        node: $suggestions[0],
                        pattern: query
                    });
                    return $suggestions;

                    function getSuggestionNode(suggestion) {
                        var $el;
                        $el = $(html.suggestion).append(that.templates.suggestion(suggestion)).data(datasetKey, that.name).data(valueKey, that.displayFn(suggestion)).data(datumKey, suggestion);
                        $el.children().each(function() {
                            $(this).css(css.suggestionChild);
                        });
                        return $el;
                    }
                }

                function getHeaderHtml() {
                    return that.templates.header({
                        query: query,
                        isEmpty: !hasSuggestions
                    });
                }

                function getFooterHtml() {
                    return that.templates.footer({
                        query: query,
                        isEmpty: !hasSuggestions
                    });
                }
            },
            getRoot: function getRoot() {
                return this.$el;
            },
            update: function update(query) {
                var that = this;
                this.query = query;
                this.canceled = false;
                this.source(query, render);

                function render(suggestions) {
                    if (!that.canceled && query === that.query) {
                        that._render(query, suggestions);
                    }
                }
            },
            cancel: function cancel() {
                this.canceled = true;
            },
            clear: function clear() {
                this.cancel();
                this.$el.empty();
                this.trigger("rendered");
            },
            isEmpty: function isEmpty() {
                return this.$el.is(":empty");
            },
            destroy: function destroy() {
                this.$el = null;
            }
        });
        return Dataset;

        function getDisplayFn(display) {
            display = display || "value";
            return _.isFunction(display) ? display : displayFn;

            function displayFn(obj) {
                return obj[display];
            }
        }

        function getTemplates(templates, displayFn) {
            return {
                empty: templates.empty && _.templatify(templates.empty),
                header: templates.header && _.templatify(templates.header),
                footer: templates.footer && _.templatify(templates.footer),
                suggestion: templates.suggestion || suggestionTemplate
            };

            function suggestionTemplate(context) {
                return "<p>" + displayFn(context) + "</p>";
            }
        }

        function isValidName(str) {
            return /^[_a-zA-Z0-9-]+$/.test(str);
        }
    }();
    var Dropdown = function() {
        "use strict";

        function Dropdown(o) {
            var that = this,
                onSuggestionClick, onSuggestionMouseEnter, onSuggestionMouseLeave;
            o = o || {};
            if (!o.menu) {
                $.error("menu is required");
            }
            this.isOpen = false;
            this.isEmpty = true;
            this.datasets = _.map(o.datasets, initializeDataset);
            onSuggestionClick = _.bind(this._onSuggestionClick, this);
            onSuggestionMouseEnter = _.bind(this._onSuggestionMouseEnter, this);
            onSuggestionMouseLeave = _.bind(this._onSuggestionMouseLeave, this);
            this.$menu = $(o.menu).on("click.tt", ".tt-suggestion", onSuggestionClick).on("mouseenter.tt", ".tt-suggestion", onSuggestionMouseEnter).on("mouseleave.tt", ".tt-suggestion", onSuggestionMouseLeave);
            _.each(this.datasets, function(dataset) {
                that.$menu.append(dataset.getRoot());
                dataset.onSync("rendered", that._onRendered, that);
            });
        }
        _.mixin(Dropdown.prototype, EventEmitter, {
            _onSuggestionClick: function onSuggestionClick($e) {
                this.trigger("suggestionClicked", $($e.currentTarget));
            },
            _onSuggestionMouseEnter: function onSuggestionMouseEnter($e) {
                this._removeCursor();
                this._setCursor($($e.currentTarget), true);
            },
            _onSuggestionMouseLeave: function onSuggestionMouseLeave() {
                this._removeCursor();
            },
            _onRendered: function onRendered() {
                this.isEmpty = _.every(this.datasets, isDatasetEmpty);
                this.isEmpty ? this._hide() : this.isOpen && this._show();
                this.trigger("datasetRendered");

                function isDatasetEmpty(dataset) {
                    return dataset.isEmpty();
                }
            },
            _hide: function() {
                this.$menu.hide();
            },
            _show: function() {
                this.$menu.css("display", "block");
            },
            _getSuggestions: function getSuggestions() {
                return this.$menu.find(".tt-suggestion");
            },
            _getCursor: function getCursor() {
                return this.$menu.find(".tt-cursor").first();
            },
            _setCursor: function setCursor($el, silent) {
                $el.first().addClass("tt-cursor");
                !silent && this.trigger("cursorMoved");
            },
            _removeCursor: function removeCursor() {
                this._getCursor().removeClass("tt-cursor");
            },
            _moveCursor: function moveCursor(increment) {
                var $suggestions, $oldCursor, newCursorIndex, $newCursor;
                if (!this.isOpen) {
                    return;
                }
                $oldCursor = this._getCursor();
                $suggestions = this._getSuggestions();
                this._removeCursor();
                newCursorIndex = $suggestions.index($oldCursor) + increment;
                newCursorIndex = (newCursorIndex + 1) % ($suggestions.length + 1) - 1;
                if (newCursorIndex === -1) {
                    this.trigger("cursorRemoved");
                    return;
                } else if (newCursorIndex < -1) {
                    newCursorIndex = $suggestions.length - 1;
                }
                this._setCursor($newCursor = $suggestions.eq(newCursorIndex));
                this._ensureVisible($newCursor);
            },
            _ensureVisible: function ensureVisible($el) {
                var elTop, elBottom, menuScrollTop, menuHeight;
                elTop = $el.position().top;
                elBottom = elTop + $el.outerHeight(true);
                menuScrollTop = this.$menu.scrollTop();
                menuHeight = this.$menu.height() + parseInt(this.$menu.css("paddingTop"), 10) + parseInt(this.$menu.css("paddingBottom"), 10);
                if (elTop < 0) {
                    this.$menu.scrollTop(menuScrollTop + elTop);
                } else if (menuHeight < elBottom) {
                    this.$menu.scrollTop(menuScrollTop + (elBottom - menuHeight));
                }
            },
            close: function close() {
                if (this.isOpen) {
                    this.isOpen = false;
                    this._removeCursor();
                    this._hide();
                    this.trigger("closed");
                }
            },
            open: function open() {
                if (!this.isOpen) {
                    this.isOpen = true;
                    !this.isEmpty && this._show();
                    this.trigger("opened");
                }
            },
            setLanguageDirection: function setLanguageDirection(dir) {
                this.$menu.css(dir === "ltr" ? css.ltr : css.rtl);
            },
            moveCursorUp: function moveCursorUp() {
                this._moveCursor(-1);
            },
            moveCursorDown: function moveCursorDown() {
                this._moveCursor(+1);
            },
            getDatumForSuggestion: function getDatumForSuggestion($el) {
                var datum = null;
                if ($el.length) {
                    datum = {
                        raw: Dataset.extractDatum($el),
                        value: Dataset.extractValue($el),
                        datasetName: Dataset.extractDatasetName($el)
                    };
                }
                return datum;
            },
            getDatumForCursor: function getDatumForCursor() {
                return this.getDatumForSuggestion(this._getCursor().first());
            },
            getDatumForTopSuggestion: function getDatumForTopSuggestion() {
                return this.getDatumForSuggestion(this._getSuggestions().first());
            },
            update: function update(query) {
                _.each(this.datasets, updateDataset);

                function updateDataset(dataset) {
                    dataset.update(query);
                }
            },
            empty: function empty() {
                _.each(this.datasets, clearDataset);
                this.isEmpty = true;

                function clearDataset(dataset) {
                    dataset.clear();
                }
            },
            isVisible: function isVisible() {
                return this.isOpen && !this.isEmpty;
            },
            destroy: function destroy() {
                this.$menu.off(".tt");
                this.$menu = null;
                _.each(this.datasets, destroyDataset);

                function destroyDataset(dataset) {
                    dataset.destroy();
                }
            }
        });
        return Dropdown;

        function initializeDataset(oDataset) {
            return new Dataset(oDataset);
        }
    }();
    var Typeahead = function() {
        "use strict";
        var attrsKey = "ttAttrs";

        function Typeahead(o) {
            var $menu, $input, $hint;
            o = o || {};
            if (!o.input) {
                $.error("missing input");
            }
            this.isActivated = false;
            this.autoselect = !!o.autoselect;
            this.minLength = _.isNumber(o.minLength) ? o.minLength : 1;
            this.$node = buildDom(o.input, o.withHint);
            $menu = this.$node.find(".tt-dropdown-menu");
            $input = this.$node.find(".tt-input");
            $hint = this.$node.find(".tt-hint");
            $input.on("blur.tt", function($e) {
                var active, isActive, hasActive;
                active = document.activeElement;
                isActive = $menu.is(active);
                hasActive = $menu.has(active).length > 0;
                if (_.isMsie() && (isActive || hasActive)) {
                    $e.preventDefault();
                    $e.stopImmediatePropagation();
                    _.defer(function() {
                        $input.focus();
                    });
                }
            });
            $menu.on("mousedown.tt", function($e) {
                $e.preventDefault();
            });
            this.eventBus = o.eventBus || new EventBus({
                el: $input
            });
            this.dropdown = new Dropdown({
                menu: $menu,
                datasets: o.datasets
            }).onSync("suggestionClicked", this._onSuggestionClicked, this).onSync("cursorMoved", this._onCursorMoved, this).onSync("cursorRemoved", this._onCursorRemoved, this).onSync("opened", this._onOpened, this).onSync("closed", this._onClosed, this).onAsync("datasetRendered", this._onDatasetRendered, this);
            this.input = new Input({
                input: $input,
                hint: $hint
            }).onSync("focused", this._onFocused, this).onSync("blurred", this._onBlurred, this).onSync("enterKeyed", this._onEnterKeyed, this).onSync("tabKeyed", this._onTabKeyed, this).onSync("escKeyed", this._onEscKeyed, this).onSync("upKeyed", this._onUpKeyed, this).onSync("downKeyed", this._onDownKeyed, this).onSync("leftKeyed", this._onLeftKeyed, this).onSync("rightKeyed", this._onRightKeyed, this).onSync("queryChanged", this._onQueryChanged, this).onSync("whitespaceChanged", this._onWhitespaceChanged, this);
            this._setLanguageDirection();
        }
        _.mixin(Typeahead.prototype, {
            _onSuggestionClicked: function onSuggestionClicked(type, $el) {
                var datum;
                if (datum = this.dropdown.getDatumForSuggestion($el)) {
                    this._select(datum);
                }
            },
            _onCursorMoved: function onCursorMoved() {
                var datum = this.dropdown.getDatumForCursor();
                this.input.setInputValue(datum.value, true);
                this.eventBus.trigger("cursorchanged", datum.raw, datum.datasetName);
            },
            _onCursorRemoved: function onCursorRemoved() {
                this.input.resetInputValue();
                this._updateHint();
            },
            _onDatasetRendered: function onDatasetRendered() {
                this._updateHint();
            },
            _onOpened: function onOpened() {
                this._updateHint();
                this.eventBus.trigger("opened");
            },
            _onClosed: function onClosed() {
                this.input.clearHint();
                this.eventBus.trigger("closed");
            },
            _onFocused: function onFocused() {
                this.isActivated = true;
                this.dropdown.open();
            },
            _onBlurred: function onBlurred() {
                this.isActivated = false;
                this.dropdown.empty();
                this.dropdown.close();
            },
            _onEnterKeyed: function onEnterKeyed(type, $e) {
                var cursorDatum, topSuggestionDatum;
                cursorDatum = this.dropdown.getDatumForCursor();
                topSuggestionDatum = this.dropdown.getDatumForTopSuggestion();
                if (cursorDatum) {
                    this._select(cursorDatum);
                    $e.preventDefault();
                } else if (this.autoselect && topSuggestionDatum) {
                    this._select(topSuggestionDatum);
                    $e.preventDefault();
                }
            },
            _onTabKeyed: function onTabKeyed(type, $e) {
                var datum;
                if (datum = this.dropdown.getDatumForCursor()) {
                    this._select(datum);
                    $e.preventDefault();
                } else {
                    this._autocomplete(true);
                }
            },
            _onEscKeyed: function onEscKeyed() {
                this.dropdown.close();
                this.input.resetInputValue();
            },
            _onUpKeyed: function onUpKeyed() {
                var query = this.input.getQuery();
                this.dropdown.isEmpty && query.length >= this.minLength ? this.dropdown.update(query) : this.dropdown.moveCursorUp();
                this.dropdown.open();
            },
            _onDownKeyed: function onDownKeyed() {
                var query = this.input.getQuery();
                this.dropdown.isEmpty && query.length >= this.minLength ? this.dropdown.update(query) : this.dropdown.moveCursorDown();
                this.dropdown.open();
            },
            _onLeftKeyed: function onLeftKeyed() {
                this.dir === "rtl" && this._autocomplete();
            },
            _onRightKeyed: function onRightKeyed() {
                this.dir === "ltr" && this._autocomplete();
            },
            _onQueryChanged: function onQueryChanged(e, query) {
                this.input.clearHintIfInvalid();
                query.length >= this.minLength ? this.dropdown.update(query) : this.dropdown.empty();
                this.dropdown.open();
                this._setLanguageDirection();
            },
            _onWhitespaceChanged: function onWhitespaceChanged() {
                this._updateHint();
                this.dropdown.open();
            },
            _setLanguageDirection: function setLanguageDirection() {
                var dir;
                if (this.dir !== (dir = this.input.getLanguageDirection())) {
                    this.dir = dir;
                    this.$node.css("direction", dir);
                    this.dropdown.setLanguageDirection(dir);
                }
            },
            _updateHint: function updateHint() {
                var datum, val, query, escapedQuery, frontMatchRegEx, match;
                datum = this.dropdown.getDatumForTopSuggestion();
                if (datum && this.dropdown.isVisible() && !this.input.hasOverflow()) {
                    val = this.input.getInputValue();
                    query = Input.normalizeQuery(val);
                    escapedQuery = _.escapeRegExChars(query);
                    frontMatchRegEx = new RegExp("^(?:" + escapedQuery + ")(.+$)", "i");
                    match = frontMatchRegEx.exec(datum.value);
                    match ? this.input.setHint(val + match[1]) : this.input.clearHint();
                } else {
                    this.input.clearHint();
                }
            },
            _autocomplete: function autocomplete(laxCursor) {
                var hint, query, isCursorAtEnd, datum;
                hint = this.input.getHint();
                query = this.input.getQuery();
                isCursorAtEnd = laxCursor || this.input.isCursorAtEnd();
                if (hint && query !== hint && isCursorAtEnd) {
                    datum = this.dropdown.getDatumForTopSuggestion();
                    datum && this.input.setInputValue(datum.value);
                    this.eventBus.trigger("autocompleted", datum.raw, datum.datasetName);
                }
            },
            _select: function select(datum) {
                this.input.setQuery(datum.value);
                this.input.setInputValue(datum.value, true);
                this._setLanguageDirection();
                this.eventBus.trigger("selected", datum.raw, datum.datasetName);
                this.dropdown.close();
                _.defer(_.bind(this.dropdown.empty, this.dropdown));
            },
            open: function open() {
                this.dropdown.open();
            },
            close: function close() {
                this.dropdown.close();
            },
            setVal: function setVal(val) {
                val = _.toStr(val);
                if (this.isActivated) {
                    this.input.setInputValue(val);
                } else {
                    this.input.setQuery(val);
                    this.input.setInputValue(val, true);
                }
                this._setLanguageDirection();
            },
            getVal: function getVal() {
                return this.input.getQuery();
            },
            destroy: function destroy() {
                this.input.destroy();
                this.dropdown.destroy();
                destroyDomStructure(this.$node);
                this.$node = null;
            }
        });
        return Typeahead;

        function buildDom(input, withHint) {
            var $input, $wrapper, $dropdown, $hint;
            $input = $(input);
            $wrapper = $(html.wrapper).css(css.wrapper);
            $dropdown = $(html.dropdown).css(css.dropdown);
            $hint = $input.clone().css(css.hint).css(getBackgroundStyles($input));
            $hint.val("").removeData().addClass("tt-hint").removeAttr("id name placeholder required").prop("readonly", true).attr({
                autocomplete: "off",
                spellcheck: "false",
                tabindex: -1
            });
            $input.data(attrsKey, {
                dir: $input.attr("dir"),
                autocomplete: $input.attr("autocomplete"),
                spellcheck: $input.attr("spellcheck"),
                style: $input.attr("style")
            });
            $input.addClass("tt-input").attr({
                autocomplete: "off",
                spellcheck: false
            }).css(withHint ? css.input : css.inputWithNoHint);
            try {
                !$input.attr("dir") && $input.attr("dir", "auto");
            } catch (e) {}
            return $input.wrap($wrapper).parent().prepend(withHint ? $hint : null).append($dropdown);
        }

        function getBackgroundStyles($el) {
            return {
                backgroundAttachment: $el.css("background-attachment"),
                backgroundClip: $el.css("background-clip"),
                backgroundColor: $el.css("background-color"),
                backgroundImage: $el.css("background-image"),
                backgroundOrigin: $el.css("background-origin"),
                backgroundPosition: $el.css("background-position"),
                backgroundRepeat: $el.css("background-repeat"),
                backgroundSize: $el.css("background-size")
            };
        }

        function destroyDomStructure($node) {
            var $input = $node.find(".tt-input");
            _.each($input.data(attrsKey), function(val, key) {
                _.isUndefined(val) ? $input.removeAttr(key) : $input.attr(key, val);
            });
            $input.detach().removeData(attrsKey).removeClass("tt-input").insertAfter($node);
            $node.remove();
        }
    }();
    (function() {
        "use strict";
        var old, typeaheadKey, methods;
        old = $.fn.typeahead;
        typeaheadKey = "ttTypeahead";
        methods = {
            initialize: function initialize(o, datasets) {
                datasets = _.isArray(datasets) ? datasets : [].slice.call(arguments, 1);
                o = o || {};
                return this.each(attach);

                function attach() {
                    var $input = $(this),
                        eventBus, typeahead;
                    _.each(datasets, function(d) {
                        d.highlight = !!o.highlight;
                    });
                    typeahead = new Typeahead({
                        input: $input,
                        eventBus: eventBus = new EventBus({
                            el: $input
                        }),
                        withHint: _.isUndefined(o.hint) ? true : !!o.hint,
                        minLength: o.minLength,
                        autoselect: o.autoselect,
                        datasets: datasets
                    });
                    $input.data(typeaheadKey, typeahead);
                }
            },
            open: function open() {
                return this.each(openTypeahead);

                function openTypeahead() {
                    var $input = $(this),
                        typeahead;
                    if (typeahead = $input.data(typeaheadKey)) {
                        typeahead.open();
                    }
                }
            },
            close: function close() {
                return this.each(closeTypeahead);

                function closeTypeahead() {
                    var $input = $(this),
                        typeahead;
                    if (typeahead = $input.data(typeaheadKey)) {
                        typeahead.close();
                    }
                }
            },
            val: function val(newVal) {
                return !arguments.length ? getVal(this.first()) : this.each(setVal);

                function setVal() {
                    var $input = $(this),
                        typeahead;
                    if (typeahead = $input.data(typeaheadKey)) {
                        typeahead.setVal(newVal);
                    }
                }

                function getVal($input) {
                    var typeahead, query;
                    if (typeahead = $input.data(typeaheadKey)) {
                        query = typeahead.getVal();
                    }
                    return query;
                }
            },
            destroy: function destroy() {
                return this.each(unattach);

                function unattach() {
                    var $input = $(this),
                        typeahead;
                    if (typeahead = $input.data(typeaheadKey)) {
                        typeahead.destroy();
                        $input.removeData(typeaheadKey);
                    }
                }
            }
        };
        $.fn.typeahead = function(method) {
            var tts;
            if (methods[method] && method !== "initialize") {
                tts = this.filter(function() {
                    return !!$(this).data(typeaheadKey);
                });
                return methods[method].apply(tts, [].slice.call(arguments, 1));
            } else {
                return methods.initialize.apply(this, arguments);
            }
        };
        $.fn.typeahead.noConflict = function noConflict() {
            $.fn.typeahead = old;
            return this;
        };
    })();
})(window.jQuery);;
(function($, undefined) {
    function TextExt() {};

    function ItemManager() {};

    function TextExtPlugin() {};
    var stringify = (JSON || {}).stringify,
        slice = Array.prototype.slice,
        p, UNDEFINED = 'undefined',
        OPT_ITEM_MANAGER = 'item.manager',
        OPT_PLUGINS = 'plugins',
        OPT_EXT = 'ext',
        OPT_HTML_WRAP = 'html.wrap',
        OPT_HTML_HIDDEN = 'html.hidden',
        OPT_KEYS = 'keys',
        EVENT_PRE_INVALIDATE = 'preInvalidate',
        EVENT_POST_INVALIDATE = 'postInvalidate',
        EVENT_GET_FORM_DATA = 'getFormData',
        EVENT_SET_FORM_DATA = 'setFormData',
        EVENT_SET_INPUT_DATA = 'setInputData',
        EVENT_POST_INIT = 'postInit',
        EVENT_READY = 'ready',
        DEFAULT_OPTS = {
            itemManager: ItemManager,
            plugins: [],
            ext: {},
            html: {
                wrap: '<div class="text-core"><div class="text-wrap"/></div>',
                hidden: '<input type="hidden" />'
            },
            keys: {
                8: 'backspace',
                9: 'tab',
                13: 'enter!',
                27: 'escape!',
                32: 'space!',
                37: 'left',
                38: 'up!',
                39: 'right',
                40: 'down!',
                46: 'delete',
                108: 'numpadEnter'
            }
        };
    if (!stringify)
        throw new Error('JSON.stringify() not found');

    function getProperty(source, name) {
        if (typeof(name) === 'string')
            name = name.split('.');
        var fullCamelCaseName = name.join('.').replace(/\.(\w)/g, function(match, letter) {
                return letter.toUpperCase()
            }),
            nestedName = name.shift(),
            result;
        if (typeof(result = source[fullCamelCaseName]) != UNDEFINED)
            result = result;
        else if (typeof(result = source[nestedName]) != UNDEFINED && name.length > 0)
            result = getProperty(result, name);
        return result;
    };

    function hookupEvents() {
        var args = slice.apply(arguments),
            self = this,
            target = args.length === 1 ? self : args.shift(),
            event;
        args = args[0] || {};

        function bind(event, handler) {
            target.bind(event, function() {
                return handler.apply(self, arguments);
            });
        }
        for (event in args)
            bind(event, args[event]);
    };

    function formDataObject(input, form) {
        return {
            'input': input,
            'form': form
        };
    };
    p = ItemManager.prototype;
    p.init = function(core) {};
    p.filter = function(list, query) {
        var result = [],
            i, item;
        for (i = 0; i < list.length; i++) {
            item = list[i];
            if (this.itemContains(item, query))
                result.push(item);
        }
        return result;
    };
    p.itemContains = function(item, needle) {
        return this.itemToString(item).toLowerCase().indexOf(needle.toLowerCase()) != -1;
    };
    p.stringToItem = function(str) {
        return str;
    };
    p.itemToString = function(item) {
        return item;
    };
    p.compareItems = function(item1, item2) {
        return item1 == item2;
    };
    p = TextExt.prototype;
    p.init = function(input, opts) {
        var self = this,
            hiddenInput, itemManager, container;
        self._defaults = $.extend({}, DEFAULT_OPTS);
        self._opts = opts || {};
        self._plugins = {};
        self._itemManager = itemManager = new(self.opts(OPT_ITEM_MANAGER))();
        input = $(input);
        container = $(self.opts(OPT_HTML_WRAP));
        hiddenInput = $(self.opts(OPT_HTML_HIDDEN));
        input.wrap(container).keydown(function(e) {
            return self.onKeyDown(e)
        }).keyup(function(e) {
            return self.onKeyUp(e)
        }).data('textext', self);
        $(self).data({
            'hiddenInput': hiddenInput,
            'wrapElement': input.parents('.text-wrap').first(),
            'input': input
        });
        hiddenInput.attr('name', input.attr('name'));
        input.attr('name', null);
        hiddenInput.insertAfter(input);
        $.extend(true, itemManager, self.opts(OPT_EXT + '.item.manager'));
        $.extend(true, self, self.opts(OPT_EXT + '.*'), self.opts(OPT_EXT + '.core'));
        self.originalWidth = input.outerWidth();
        self.invalidateBounds();
        itemManager.init(self);
        self.initPatches();
        self.initPlugins(self.opts(OPT_PLUGINS), $.fn.textext.plugins);
        self.on({
            setFormData: self.onSetFormData,
            getFormData: self.onGetFormData,
            setInputData: self.onSetInputData,
            anyKeyUp: self.onAnyKeyUp
        });
        self.trigger(EVENT_POST_INIT);
        self.trigger(EVENT_READY);
        self.getFormData(0);
    };
    p.initPatches = function() {
        var list = [],
            source = $.fn.textext.patches,
            name;
        for (name in source)
            list.push(name);
        this.initPlugins(list, source);
    };
    p.initPlugins = function(plugins, source) {
        var self = this,
            ext, name, plugin, initList = [],
            i;
        if (typeof(plugins) == 'string')
            plugins = plugins.split(/\s*,\s*|\s+/g);
        for (i = 0; i < plugins.length; i++) {
            name = plugins[i];
            plugin = source[name];
            if (plugin) {
                self._plugins[name] = plugin = new plugin();
                self[name] = (function(plugin) {
                    return function() {
                        return plugin;
                    }
                })(plugin);
                initList.push(plugin);
                $.extend(true, plugin, self.opts(OPT_EXT + '.*'), self.opts(OPT_EXT + '.' + name));
            }
        }
        initList.sort(function(p1, p2) {
            p1 = p1.initPriority();
            p2 = p2.initPriority();
            return p1 === p2 ? 0 : p1 < p2 ? 1 : -1;
        });
        for (i = 0; i < initList.length; i++)
            initList[i].init(self);
    };
    p.hasPlugin = function(name) {
        return !!this._plugins[name];
    };
    p.on = hookupEvents;
    p.bind = function(event, handler) {
        this.input().bind(event, handler);
    };
    p.trigger = function() {
        var args = arguments;
        this.input().trigger(args[0], slice.call(args, 1));
    };
    p.itemManager = function() {
        return this._itemManager;
    };
    p.input = function() {
        return $(this).data('input');
    };
    p.opts = function(name) {
        var result = getProperty(this._opts, name);
        return typeof(result) == 'undefined' ? getProperty(this._defaults, name) : result;
    };
    p.wrapElement = function() {
        return $(this).data('wrapElement');
    };
    p.invalidateBounds = function() {
        var self = this,
            input = self.input(),
            wrap = self.wrapElement(),
            container = wrap.parent(),
            width = self.originalWidth + 'px',
            height;
        self.trigger(EVENT_PRE_INVALIDATE);
        height = input.outerHeight() + 'px';
        input.css({
            'width': width
        });
        wrap.css({
            'width': width,
            'height': height
        });
        container.css({
            'height': height
        });
        self.trigger(EVENT_POST_INVALIDATE);
    };
    p.focusInput = function() {
        this.input()[0].focus();
    };
    p.serializeData = stringify;
    p.hiddenInput = function(value) {
        return $(this).data('hiddenInput');
    };
    p.getWeightedEventResponse = function(event, args) {
        var self = this,
            data = {},
            maxWeight = 0;
        self.trigger(event, data, args);
        for (var weight in data)
            maxWeight = Math.max(maxWeight, weight);
        return data[maxWeight];
    };
    p.getFormData = function(keyCode) {
        var self = this,
            data = self.getWeightedEventResponse(EVENT_GET_FORM_DATA, keyCode || 0);
        self.trigger(EVENT_SET_FORM_DATA, data['form']);
        self.trigger(EVENT_SET_INPUT_DATA, data['input']);
    };
    p.onAnyKeyUp = function(e, keyCode) {
        this.getFormData(keyCode);
    };
    p.onSetInputData = function(e, data) {
        this.input().val(data);
    };
    p.onSetFormData = function(e, data) {
        var self = this;
        self.hiddenInput().val(self.serializeData(data));
    };
    p.onGetFormData = function(e, data) {
        var val = this.input().val();
        data[0] = formDataObject(val, val);
    };
    $(['Down', 'Up']).each(function() {
        var type = this.toString();
        p['onKey' + type] = function(e) {
            var self = this,
                keyName = self.opts(OPT_KEYS)[e.keyCode],
                defaultResult = true;
            if (keyName) {
                defaultResult = keyName.substr(-1) != '!';
                keyName = keyName.replace('!', '');
                self.trigger(keyName + 'Key' + type);
                if (type == 'Up' && self._lastKeyDown == e.keyCode) {
                    self._lastKeyDown = null;
                    self.trigger(keyName + 'KeyPress');
                }
                if (type == 'Down')
                    self._lastKeyDown = e.keyCode;
            }
            self.trigger('anyKey' + type, e.keyCode);
            return defaultResult;
        };
    });
    p = TextExtPlugin.prototype;
    p.on = hookupEvents;
    p.formDataObject = formDataObject;
    p.init = function(core) {
        throw new Error('Not implemented')
    };
    p.baseInit = function(core, defaults) {
        var self = this;
        core._defaults = $.extend(true, core._defaults, defaults);
        self._core = core;
        self._timers = {};
    };
    p.startTimer = function(name, delay, callback) {
        var self = this;
        self.stopTimer(name);
        self._timers[name] = setTimeout(function() {
            delete self._timers[name];
            callback.apply(self);
        }, delay * 1000);
    };
    p.stopTimer = function(name) {
        clearTimeout(this._timers[name]);
    };
    p.core = function() {
        return this._core;
    };
    p.opts = function(name) {
        return this.core().opts(name);
    };
    p.itemManager = function() {
        return this.core().itemManager();
    };
    p.input = function() {
        return this.core().input();
    };
    p.val = function(value) {
        var input = this.input();
        if (typeof(value) === UNDEFINED)
            return input.val();
        else
            input.val(value);
    };
    p.trigger = function() {
        var core = this.core();
        core.trigger.apply(core, arguments);
    };
    p.bind = function(event, handler) {
        this.core().bind(event, handler);
    };
    p.initPriority = function() {
        return 0;
    };
    var cssInjected = false;
    var textext = $.fn.textext = function(opts) {
        var css;
        if (!cssInjected && (css = $.fn.textext.css) != null) {
            $('head').append('<style>' + css + '</style>');
            cssInjected = true;
        }
        return this.map(function() {
            var self = $(this);
            if (opts == null)
                return self.data('textext');
            var instance = new TextExt();
            instance.init(self, opts);
            self.data('textext', instance);
            return instance.input()[0];
        });
    };
    textext.addPlugin = function(name, constructor) {
        textext.plugins[name] = constructor;
        constructor.prototype = new textext.TextExtPlugin();
    };
    textext.addPatch = function(name, constructor) {
        textext.patches[name] = constructor;
        constructor.prototype = new textext.TextExtPlugin();
    };
    textext.TextExt = TextExt;
    textext.TextExtPlugin = TextExtPlugin;
    textext.ItemManager = ItemManager;
    textext.plugins = {};
    textext.patches = {};
})(jQuery);
(function($) {
    function TextExtIE9Patches() {};
    $.fn.textext.TextExtIE9Patches = TextExtIE9Patches;
    $.fn.textext.addPatch('ie9', TextExtIE9Patches);
    var p = TextExtIE9Patches.prototype;
    p.init = function(core) {
        if (navigator.userAgent.indexOf('MSIE 9') == -1)
            return;
        var self = this;
        core.on({
            postInvalidate: self.onPostInvalidate
        });
    };
    p.onPostInvalidate = function() {
        var self = this,
            input = self.input(),
            val = input.val();
        input.val(Math.random());
        input.val(val);
    };
})(jQuery);;
(function($) {
    function TextExtAjax() {};
    $.fn.textext.TextExtAjax = TextExtAjax;
    $.fn.textext.addPlugin('ajax', TextExtAjax);
    var p = TextExtAjax.prototype,
        OPT_DATA_CALLBACK = 'ajax.data.callback',
        OPT_CACHE_RESULTS = 'ajax.cache.results',
        OPT_LOADING_DELAY = 'ajax.loading.delay',
        OPT_LOADING_MESSAGE = 'ajax.loading.message',
        OPT_TYPE_DELAY = 'ajax.type.delay',
        EVENT_SET_SUGGESTION = 'setSuggestions',
        EVENT_SHOW_DROPDOWN = 'showDropdown',
        TIMER_LOADING = 'loading',
        DEFAULT_OPTS = {
            ajax: {
                typeDelay: 0.5,
                loadingMessage: 'Loading...',
                loadingDelay: 0.5,
                cacheResults: false,
                dataCallback: null
            }
        };
    p.init = function(core) {
        var self = this;
        self.baseInit(core, DEFAULT_OPTS);
        self.on({
            getSuggestions: self.onGetSuggestions
        });
        self._suggestions = null;
    };
    p.load = function(query) {
        var self = this,
            dataCallback = self.opts(OPT_DATA_CALLBACK) || function(query) {
                return {
                    q: query
                }
            },
            opts;
        opts = $.extend(true, {
            data: dataCallback(query),
            success: function(data) {
                self.onComplete(data, query)
            },
            error: function(jqXHR, message) {
                console.error(message, query)
            }
        }, self.opts('ajax'));
        $.ajax(opts);
    };
    p.onComplete = function(data, query) {
        var self = this,
            result = data;
        self.dontShowLoading();
        if (self.opts(OPT_CACHE_RESULTS) == true) {
            self._suggestions = data;
            result = self.itemManager().filter(data, query);
        }
        self.trigger(EVENT_SET_SUGGESTION, {
            result: result
        });
    };
    p.dontShowLoading = function() {
        this.stopTimer(TIMER_LOADING);
    };
    p.showLoading = function() {
        var self = this;
        self.dontShowLoading();
        self.startTimer(TIMER_LOADING, self.opts(OPT_LOADING_DELAY), function() {
            self.trigger(EVENT_SHOW_DROPDOWN, function(autocomplete) {
                autocomplete.clearItems();
                var node = autocomplete.addDropdownItem(self.opts(OPT_LOADING_MESSAGE));
                node.addClass('text-loading');
            });
        });
    };
    p.onGetSuggestions = function(e, data) {
        var self = this,
            suggestions = self._suggestions,
            query = (data || {}).query || '';
        if (suggestions && self.opts(OPT_CACHE_RESULTS) === true)
            return self.onComplete(suggestions, query);
        self.startTimer('ajax', self.opts(OPT_TYPE_DELAY), function() {
            self.showLoading();
            self.load(query);
        });
    };
})(jQuery);;
(function($) {
    function TextExtAutocomplete() {};
    $.fn.textext.TextExtAutocomplete = TextExtAutocomplete;
    $.fn.textext.addPlugin('autocomplete', TextExtAutocomplete);
    var p = TextExtAutocomplete.prototype,
        CSS_DOT = '.',
        CSS_SELECTED = 'text-selected',
        CSS_DOT_SELECTED = CSS_DOT + CSS_SELECTED,
        CSS_SUGGESTION = 'text-suggestion',
        CSS_DOT_SUGGESTION = CSS_DOT + CSS_SUGGESTION,
        CSS_LABEL = 'text-label',
        CSS_DOT_LABEL = CSS_DOT + CSS_LABEL,
        OPT_ENABLED = 'autocomplete.enabled',
        OPT_POSITION = 'autocomplete.dropdown.position',
        OPT_MAX_HEIGHT = 'autocomplete.dropdown.maxHeight',
        OPT_RENDER = 'autocomplete.render',
        OPT_HTML_DROPDOWN = 'html.dropdown',
        OPT_HTML_SUGGESTION = 'html.suggestion',
        EVENT_HIDE_DROPDOWN = 'hideDropdown',
        EVENT_SHOW_DROPDOWN = 'showDropdown',
        EVENT_GET_SUGGESTIONS = 'getSuggestions',
        EVENT_GET_FORM_DATA = 'getFormData',
        EVENT_TOGGLE_DROPDOWN = 'toggleDropdown',
        POSITION_ABOVE = 'above',
        POSITION_BELOW = 'below',
        DATA_MOUSEDOWN_ON_AUTOCOMPLETE = 'mousedownOnAutocomplete',
        DEFAULT_OPTS = {
            autocomplete: {
                enabled: true,
                dropdown: {
                    position: POSITION_BELOW,
                    maxHeight: '100px'
                }
            },
            html: {
                dropdown: '<div class="text-dropdown"><div class="text-list"/></div>',
                suggestion: '<div class="text-suggestion"><span class="text-label"/></div>'
            }
        };
    p.init = function(core) {
        var self = this;
        self.baseInit(core, DEFAULT_OPTS);
        var input = self.input(),
            container;
        if (self.opts(OPT_ENABLED) === true) {
            self.on({
                blur: self.onBlur,
                anyKeyUp: self.onAnyKeyUp,
                deleteKeyUp: self.onAnyKeyUp,
                backspaceKeyPress: self.onBackspaceKeyPress,
                enterKeyPress: self.onEnterKeyPress,
                spaceKeyPress: self.onEnterKeyPress,
                escapeKeyPress: self.onEscapeKeyPress,
                setSuggestions: self.onSetSuggestions,
                showDropdown: self.onShowDropdown,
                hideDropdown: self.onHideDropdown,
                toggleDropdown: self.onToggleDropdown,
                postInvalidate: self.positionDropdown,
                getFormData: self.onGetFormData,
                downKeyDown: self.onDownKeyDown,
                upKeyDown: self.onUpKeyDown
            });
            container = $(self.opts(OPT_HTML_DROPDOWN));
            container.insertAfter(input);
            self.on(container, {
                mouseover: self.onMouseOver,
                mousedown: self.onMouseDown,
                click: self.onClick
            });
            container.css('maxHeight', self.opts(OPT_MAX_HEIGHT)).addClass('text-position-' + self.opts(OPT_POSITION));
            $(self).data('container', container);
            $(document.body).click(function(e) {
                if (self.isDropdownVisible() && !self.withinWrapElement(e.target))
                    self.trigger(EVENT_HIDE_DROPDOWN);
            });
            self.positionDropdown();
        }
    };
    p.containerElement = function() {
        return $(this).data('container');
    };
    p.onMouseOver = function(e) {
        var self = this,
            target = $(e.target);
        if (target.is(CSS_DOT_SUGGESTION)) {
            self.clearSelected();
            target.addClass(CSS_SELECTED);
        }
    };
    p.onMouseDown = function(e) {
        this.containerElement().data(DATA_MOUSEDOWN_ON_AUTOCOMPLETE, true);
    };
    p.onClick = function(e) {
        var self = this,
            target = $(e.target);
        if (target.is(CSS_DOT_SUGGESTION) || target.is(CSS_DOT_LABEL))
            self.trigger('enterKeyPress');
        if (self.core().hasPlugin('tags'))
            self.val('');
    };
    p.onBlur = function(e) {
        var self = this,
            container = self.containerElement(),
            isBlurByMousedown = container.data(DATA_MOUSEDOWN_ON_AUTOCOMPLETE) === true;
        if (self.isDropdownVisible())
            isBlurByMousedown ? self.core().focusInput() : self.trigger(EVENT_HIDE_DROPDOWN);
        container.removeData(DATA_MOUSEDOWN_ON_AUTOCOMPLETE);
    };
    p.onBackspaceKeyPress = function(e) {
        var self = this,
            isEmpty = self.val().length > 0;
        if (isEmpty || self.isDropdownVisible())
            self.getSuggestions();
    };
    p.onAnyKeyUp = function(e, keyCode) {
        var self = this,
            isFunctionKey = self.opts('keys.' + keyCode) != null;
        if (self.val().length > 0 && !isFunctionKey)
            self.getSuggestions();
    };
    p.onDownKeyDown = function(e) {
        var self = this;
        self.isDropdownVisible() ? self.toggleNextSuggestion() : self.getSuggestions();
    };
    p.onUpKeyDown = function(e) {
        this.togglePreviousSuggestion();
    };
    p.onEnterKeyPress = function(e) {
        var self = this;
        if (self.isDropdownVisible())
            self.selectFromDropdown();
    };
    p.onEscapeKeyPress = function(e) {
        var self = this;
        if (self.isDropdownVisible())
            self.trigger(EVENT_HIDE_DROPDOWN);
    };
    p.positionDropdown = function() {
        var self = this,
            container = self.containerElement(),
            direction = self.opts(OPT_POSITION),
            height = self.core().wrapElement().outerHeight(),
            css = {};
        css[direction === POSITION_ABOVE ? 'bottom' : 'top'] = height + 'px';
        container.css(css);
    };
    p.suggestionElements = function() {
        return this.containerElement().find(CSS_DOT_SUGGESTION);
    };
    p.setSelectedSuggestion = function(suggestion) {
        if (!suggestion)
            return;
        var self = this,
            all = self.suggestionElements(),
            target = all.first(),
            item, i;
        self.clearSelected();
        for (i = 0; i < all.length; i++) {
            item = $(all[i]);
            if (self.itemManager().compareItems(item.data(CSS_SUGGESTION), suggestion)) {
                target = item.addClass(CSS_SELECTED);
                break;
            }
        }
        target.addClass(CSS_SELECTED);
        self.scrollSuggestionIntoView(target);
    };
    p.selectedSuggestionElement = function() {
        return this.suggestionElements().filter(CSS_DOT_SELECTED).first();
    };
    p.isDropdownVisible = function() {
        return this.containerElement().is(':visible') === true;
    };
    p.onGetFormData = function(e, data, keyCode) {
        var self = this,
            val = self.val(),
            inputValue = val,
            formValue = val;
        data[100] = self.formDataObject(inputValue, formValue);
    };
    p.initPriority = function() {
        return 200;
    };
    p.onHideDropdown = function(e) {
        this.hideDropdown();
    };
    p.onToggleDropdown = function(e) {
        var self = this;
        self.trigger(self.containerElement().is(':visible') ? EVENT_HIDE_DROPDOWN : EVENT_SHOW_DROPDOWN);
    };
    p.onShowDropdown = function(e, renderCallback) {
        var self = this,
            current = self.selectedSuggestionElement().data(CSS_SUGGESTION),
            suggestions = self._suggestions;
        if (!suggestions)
            return self.trigger(EVENT_GET_SUGGESTIONS);
        if ($.isFunction(renderCallback)) {
            renderCallback(self);
        } else {
            self.renderSuggestions(self._suggestions);
            self.toggleNextSuggestion();
        }
        self.showDropdown(self.containerElement());
        self.setSelectedSuggestion(current);
    };
    p.onSetSuggestions = function(e, data) {
        var self = this,
            suggestions = self._suggestions = data.result;
        if (data.showHideDropdown !== false)
            self.trigger(suggestions === null || suggestions.length === 0 ? EVENT_HIDE_DROPDOWN : EVENT_SHOW_DROPDOWN);
    };
    p.getSuggestions = function() {
        var self = this,
            val = self.val();
        if (self._previousInputValue == val)
            return;
        if (val == '')
            current = null;
        self._previousInputValue = val;
        self.trigger(EVENT_GET_SUGGESTIONS, {
            query: val
        });
    };
    p.clearItems = function() {
        this.containerElement().find('.text-list').children().remove();
    };
    p.renderSuggestions = function(suggestions) {
        var self = this;
        self.clearItems();
        $.each(suggestions || [], function(index, item) {
            self.addSuggestion(item);
        });
    };
    p.showDropdown = function() {
        this.containerElement().show();
    };
    p.hideDropdown = function() {
        var self = this,
            dropdown = self.containerElement();
        self._previousInputValue = null;
        dropdown.hide();
    };
    p.addSuggestion = function(suggestion) {
        var self = this,
            renderer = self.opts(OPT_RENDER),
            node = self.addDropdownItem(renderer ? renderer.call(self, suggestion) : self.itemManager().itemToString(suggestion));
        node.data(CSS_SUGGESTION, suggestion);
    };
    p.addDropdownItem = function(html) {
        var self = this,
            container = self.containerElement().find('.text-list'),
            node = $(self.opts(OPT_HTML_SUGGESTION));
        node.find('.text-label').html(html);
        container.append(node);
        return node;
    };
    p.clearSelected = function() {
        this.suggestionElements().removeClass(CSS_SELECTED);
    };
    p.toggleNextSuggestion = function() {
        var self = this,
            selected = self.selectedSuggestionElement(),
            next;
        if (selected.length > 0) {
            next = selected.next();
            if (next.length > 0)
                selected.removeClass(CSS_SELECTED);
        } else {
            next = self.suggestionElements().first();
        }
        next.addClass(CSS_SELECTED);
        self.scrollSuggestionIntoView(next);
    };
    p.togglePreviousSuggestion = function() {
        var self = this,
            selected = self.selectedSuggestionElement(),
            prev = selected.prev();
        if (prev.length == 0)
            return;
        self.clearSelected();
        prev.addClass(CSS_SELECTED);
        self.scrollSuggestionIntoView(prev);
    };
    p.scrollSuggestionIntoView = function(item) {
        var itemHeight = item.outerHeight(),
            dropdown = this.containerElement(),
            dropdownHeight = dropdown.innerHeight(),
            scrollPos = dropdown.scrollTop(),
            itemTop = (item.position() || {}).top,
            scrollTo = null,
            paddingTop = parseInt(dropdown.css('paddingTop'));
        if (itemTop == null)
            return;
        if (itemTop + itemHeight > dropdownHeight)
            scrollTo = itemTop + scrollPos + itemHeight - dropdownHeight + paddingTop;
        if (itemTop < 0)
            scrollTo = itemTop + scrollPos - paddingTop;
        if (scrollTo != null)
            dropdown.scrollTop(scrollTo);
    };
    p.selectFromDropdown = function() {
        var self = this,
            suggestion = self.selectedSuggestionElement().data(CSS_SUGGESTION);
        if (suggestion) {
            self.val(self.itemManager().itemToString(suggestion));
            self.core().getFormData();
        }
        self.trigger(EVENT_HIDE_DROPDOWN);
    };
    p.withinWrapElement = function(element) {
        return this.core().wrapElement().find(element).size() > 0;
    }
})(jQuery);;
(function($) {
    function TextExtSuggestions() {};
    $.fn.textext.TextExtSuggestions = TextExtSuggestions;
    $.fn.textext.addPlugin('suggestions', TextExtSuggestions);
    var p = TextExtSuggestions.prototype,
        OPT_SUGGESTIONS = 'suggestions',
        DEFAULT_OPTS = {
            suggestions: null
        };
    p.init = function(core) {
        var self = this;
        self.baseInit(core, DEFAULT_OPTS);
        self.on({
            getSuggestions: self.onGetSuggestions,
            postInit: self.onPostInit
        });
    };
    p.setSuggestions = function(suggestions, showHideDropdown) {
        this.trigger('setSuggestions', {
            result: suggestions,
            showHideDropdown: showHideDropdown != false
        });
    };
    p.onPostInit = function(e) {
        var self = this;
        self.setSuggestions(self.opts(OPT_SUGGESTIONS), false);
    };
    p.onGetSuggestions = function(e, data) {
        var self = this,
            suggestions = self.opts(OPT_SUGGESTIONS);
        suggestions.sort();
        self.setSuggestions(self.itemManager().filter(suggestions, data.query));
    };
})(jQuery);;
(function($) {
    function TextExtTags() {};
    $.fn.textext.TextExtTags = TextExtTags;
    $.fn.textext.addPlugin('tags', TextExtTags);
    var p = TextExtTags.prototype,
        CSS_DOT = '.',
        CSS_TAGS_ON_TOP = 'text-tags-on-top',
        CSS_DOT_TAGS_ON_TOP = CSS_DOT + CSS_TAGS_ON_TOP,
        CSS_TAG = 'text-tag',
        CSS_DOT_TAG = CSS_DOT + CSS_TAG,
        CSS_TAGS = 'text-tags',
        CSS_DOT_TAGS = CSS_DOT + CSS_TAGS,
        CSS_LABEL = 'text-label',
        CSS_DOT_LABEL = CSS_DOT + CSS_LABEL,
        CSS_REMOVE = 'text-remove',
        CSS_DOT_REMOVE = CSS_DOT + CSS_REMOVE,
        OPT_ENABLED = 'tags.enabled',
        OPT_ITEMS = 'tags.items',
        OPT_HTML_TAG = 'html.tag',
        OPT_HTML_TAGS = 'html.tags',
        EVENT_IS_TAG_ALLOWED = 'isTagAllowed',
        EVENT_TAG_CLICK = 'tagClick',
        DEFAULT_OPTS = {
            tags: {
                enabled: true,
                items: null
            },
            html: {
                tags: '<div class="text-tags"/>',
                tag: '<div class="text-tag"><div class="text-button"><span class="text-label"/><a class="text-remove"/></div></div>'
            }
        };
    p.init = function(core) {
        this.baseInit(core, DEFAULT_OPTS);
        var self = this,
            input = self.input(),
            container;
        if (self.opts(OPT_ENABLED)) {
            container = $(self.opts(OPT_HTML_TAGS));
            input.after(container);
            $(self).data('container', container);
            self.on({
                enterKeyPress: self.onEnterKeyPress,
                spaceKeyPress: self.onEnterKeyPress,
                commaKeyPress: self.onEnterKeyPress,
                backspaceKeyDown: self.onBackspaceKeyDown,
                preInvalidate: self.onPreInvalidate,
                postInit: self.onPostInit,
                getFormData: self.onGetFormData
            });
            self.on(container, {
                click: self.onClick,
                mousemove: self.onContainerMouseMove
            });
            self.on(input, {
                mousemove: self.onInputMouseMove
            });
        }
        self._originalPadding = {
            left: parseInt(input.css('paddingLeft') || 0),
            top: parseInt(input.css('paddingTop') || 0)
        };
        self._paddingBox = {
            left: 0,
            top: 0
        };
        self.updateFormCache();
    };
    p.containerElement = function() {
        return $(this).data('container');
    };
    p.onPostInit = function(e) {
        var self = this;
        self.addTags(self.opts(OPT_ITEMS));
    };
    p.onGetFormData = function(e, data, keyCode) {
        var self = this,
            inputValue = (keyCode === 13 || keyCode === 32) ? '' : self.val(),
            formValue = self._formData;
        data[200] = self.formDataObject(inputValue, formValue);
    };
    p.initPriority = function() {
        return 100;
    };
    p.onInputMouseMove = function(e) {
        this.toggleZIndex(e);
    };
    p.onContainerMouseMove = function(e) {
        this.toggleZIndex(e);
    };
    p.onBackspaceKeyDown = function(e) {
        var self = this,
            lastTag = self.tagElements().last();
        if (self.val().length == 0)
            self.removeTag(lastTag);
    };
    p.onPreInvalidate = function(e) {
        var self = this,
            lastTag = self.tagElements().last(),
            pos = lastTag.position();
        if (lastTag.length > 0)
            pos.top += lastTag.innerHeight();
        else
            pos = self._originalPadding;
        self._paddingBox = pos;
        self.input().css({
            paddingTop: pos.top
        });
    };
    p.onClick = function(e) {
        var self = this,
            core = self.core(),
            source = $(e.target),
            focus = 0,
            tag;
        if (source.is(CSS_DOT_TAGS)) {
            focus = 1;
        } else if (source.is(CSS_DOT_REMOVE)) {
            self.removeTag(source.parents(CSS_DOT_TAG + ':first'));
            focus = 1;
        } else if (source.is(CSS_DOT_LABEL)) {
            tag = source.parents(CSS_DOT_TAG + ':first');
            self.trigger(EVENT_TAG_CLICK, tag, tag.data(CSS_TAG), tagClickCallback);
        }

        function tagClickCallback(newValue, refocus) {
            tag.data(CSS_TAG, newValue);
            tag.find(CSS_DOT_LABEL).text(self.itemManager().itemToString(newValue));
            self.updateFormCache();
            core.getFormData();
            core.invalidateBounds();
            if (refocus)
                core.focusInput();
        }
        if (focus)
            core.focusInput();
    };
    p.onEnterKeyPress = function(e) {
        var self = this,
            val = self.val(),
            tag = self.itemManager().stringToItem(val);
        if (self.isTagAllowed(tag)) {
            self.addTags([tag]);
            self.core().focusInput();
        }
    };
    p.updateFormCache = function() {
        var self = this,
            result = [];
        self.tagElements().each(function() {
            result.push($(this).data(CSS_TAG));
        });
        self._formData = result;
    };
    p.toggleZIndex = function(e) {
        var self = this,
            offset = self.input().offset(),
            mouseX = e.clientX - offset.left,
            mouseY = e.clientY - offset.top,
            box = self._paddingBox,
            container = self.containerElement(),
            isOnTop = container.is(CSS_DOT_TAGS_ON_TOP),
            isMouseOverText = mouseX > box.left && mouseY > box.top;
        if (!isOnTop && !isMouseOverText || isOnTop && isMouseOverText)
            container[(!isOnTop ? 'add' : 'remove') + 'Class'](CSS_TAGS_ON_TOP);
    };
    p.tagElements = function() {
        return this.containerElement().find(CSS_DOT_TAG);
    };
    p.isTagAllowed = function(tag) {
        var opts = {
            tag: tag,
            result: true
        };
        this.trigger(EVENT_IS_TAG_ALLOWED, opts);
        return opts.result === true;
    };
    p.addTags = function(tags) {
        if (!tags || tags.length == 0)
            return;
        var self = this,
            core = self.core(),
            container = self.containerElement(),
            i, tag;
        for (i = 0; i < tags.length; i++) {
            tag = tags[i];
            if (tag && self.isTagAllowed(tag))
                container.append(self.renderTag(tag));
        }
        self.updateFormCache();
        core.getFormData();
        core.invalidateBounds();
    };
    p.getTagElement = function(tag) {
        var self = this,
            list = self.tagElements(),
            i, item;
        for (i = 0; i < list.length, item = $(list[i]); i++)
            if (self.itemManager().compareItems(item.data(CSS_TAG), tag))
                return item;
    };
    p.removeTag = function(tag) {
        var self = this,
            core = self.core(),
            element;
        if (tag instanceof $) {
            element = tag;
            tag = tag.data(CSS_TAG);
        } else {
            element = self.getTagElement(tag);
        }
        element.remove();
        self.updateFormCache();
        core.getFormData();
        core.invalidateBounds();
    };
    p.renderTag = function(tag) {
        var self = this,
            node = $(self.opts(OPT_HTML_TAG));
        node.find('.text-label').text(self.itemManager().itemToString(tag));
        node.data(CSS_TAG, tag);
        return node;
    };
})(jQuery);
(function($) {
    $.fn.jCarouselLite = function(o) {
        o = $.extend({
            btnPrev: null,
            btnNext: null,
            btnGo: null,
            mouseWheel: false,
            auto: null,
            speed: 200,
            easing: null,
            vertical: false,
            circular: true,
            visible: 3,
            start: 0,
            scroll: 1,
            beforeStart: null,
            afterEnd: null
        }, o || {});
        return this.each(function() {
            var b = false,
                animCss = o.vertical ? "top" : "left",
                sizeCss = o.vertical ? "height" : "width";
            var c = $(this),
                ul = $("ul", c),
                tLi = $("li", ul),
                tl = tLi.size(),
                v = o.visible;
            if (o.circular) {
                ul.prepend(tLi.slice(tl - v - 1 + 1).clone()).append(tLi.slice(0, v).clone());
                o.start += v
            }
            var f = $("li", ul),
                itemLength = f.size(),
                curr = o.start;
            c.css("visibility", "visible");
            f.css({
                overflow: "hidden",
                float: o.vertical ? "none" : "left"
            });
            ul.css({
                margin: "0",
                padding: "0",
                position: "relative",
                "list-style-type": "none",
                "z-index": "1"
            });
            c.css({
                overflow: "hidden",
                position: "relative",
                "z-index": "2",
                left: "0px"
            });
            var g = o.vertical ? height(f) : width(f);
            var h = g * itemLength;
            var j = g * v;
            f.css({
                width: f.width(),
                height: f.height()
            });
            ul.css(sizeCss, h + "px").css(animCss, -(curr * g));
            c.css(sizeCss, j + "px");
            if (o.btnPrev) $(o.btnPrev).click(function() {
                return go(curr - o.scroll)
            });
            if (o.btnNext) $(o.btnNext).click(function() {
                return go(curr + o.scroll)
            });
            if (o.btnGo) $.each(o.btnGo, function(i, a) {
                $(a).click(function() {
                    return go(o.circular ? o.visible + i : i)
                })
            });
            if (o.mouseWheel && c.mousewheel) c.mousewheel(function(e, d) {
                return d > 0 ? go(curr - o.scroll) : go(curr + o.scroll)
            });
            if (o.auto) setInterval(function() {
                go(curr + o.scroll)
            }, o.auto + o.speed);

            function vis() {
                return f.slice(curr).slice(0, v)
            };

            function go(a) {
                if (!b) {
                    if (o.beforeStart) o.beforeStart.call(this, vis());
                    if (o.circular) {
                        if (a <= o.start - v - 1) {
                            ul.css(animCss, -((itemLength - (v * 2)) * g) + "px");
                            curr = a == o.start - v - 1 ? itemLength - (v * 2) - 1 : itemLength - (v * 2) - o.scroll
                        } else if (a >= itemLength - v + 1) {
                            ul.css(animCss, -((v) * g) + "px");
                            curr = a == itemLength - v + 1 ? v + 1 : v + o.scroll
                        } else curr = a
                    } else {
                        if (a < 0 || a > itemLength - v) return;
                        else curr = a
                    }
                    b = true;
                    ul.animate(animCss == "left" ? {
                        left: -(curr * g)
                    } : {
                        top: -(curr * g)
                    }, o.speed, o.easing, function() {
                        if (o.afterEnd) o.afterEnd.call(this, vis());
                        b = false
                    });
                    if (!o.circular) {
                        $(o.btnPrev + "," + o.btnNext).removeClass("disabled");
                        $((curr - o.scroll < 0 && o.btnPrev) || (curr + o.scroll > itemLength - v && o.btnNext) || []).addClass("disabled")
                    }
                }
                return false
            }
        })
    };

    function css(a, b) {
        return parseInt($.css(a[0], b)) || 0
    };

    function width(a) {
        return a[0].offsetWidth + css(a, 'marginLeft') + css(a, 'marginRight')
    };

    function height(a) {
        return a[0].offsetHeight + css(a, 'marginTop') + css(a, 'marginBottom')
    }
})(jQuery);

jQuery(function() {
    var lang = document.getElementsByTagName("html")[0].getAttribute('lang');
    window.__lc = {};
    __lc.license = (4893231);
    setTimeout(function() {
        var lc = document.createElement('script');
        lc.type = 'text/javascript';
        lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + ''; // cdn.livechatinc.com/tracking.js
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(lc, s);
    }, 5000);
});
jQuery(function($) {
    var initFb = function(d, s, id) {
        var jsVariables = $('.jsVariables');
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/" + jsVariables.data('fb-language-code') + "/all.js#xfbml=1&appId=" + jsVariables.data('fb-app-id');
        fjs.parentNode.insertBefore(js, fjs);
    };
    setTimeout(function() {
        initFb(document, 'script', 'facebook-jssdk');
    }, 5000);
});
jQuery(function($) {
    $.nette.init();
});
/*!
jQuery Waypoints - v2.0.5
Copyright (c) 2011-2014 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/
(function() {
    var __indexOf = [].indexOf || function(item) {
            for (var i = 0, l = this.length; i < l; i++) {
                if (i in this && this[i] === item) return i;
            }
            return -1;
        },
        __slice = [].slice;
    (function(root, factory) {
        if (typeof define === 'function' && define.amd) {
            return define('waypoints', ['jquery'], function($) {
                return factory($, root);
            });
        } else {
            return factory(root.jQuery, root);
        }
    })(window, function($, window) {
        var $w, Context, Waypoint, allWaypoints, contextCounter, contextKey, contexts, isTouch, jQMethods, methods, resizeEvent, scrollEvent, waypointCounter, waypointKey, wp, wps;
        $w = $(window);
        isTouch = __indexOf.call(window, 'ontouchstart') >= 0;
        allWaypoints = {
            horizontal: {},
            vertical: {}
        };
        contextCounter = 1;
        contexts = {};
        contextKey = 'waypoints-context-id';
        resizeEvent = 'resize.waypoints';
        scrollEvent = 'scroll.waypoints';
        waypointCounter = 1;
        waypointKey = 'waypoints-waypoint-ids';
        wp = 'waypoint';
        wps = 'waypoints';
        Context = (function() {
            function Context($element) {
                var _this = this;
                this.$element = $element;
                this.element = $element[0];
                this.didResize = false;
                this.didScroll = false;
                this.id = 'context' + contextCounter++;
                this.oldScroll = {
                    x: $element.scrollLeft(),
                    y: $element.scrollTop()
                };
                this.waypoints = {
                    horizontal: {},
                    vertical: {}
                };
                this.element[contextKey] = this.id;
                contexts[this.id] = this;
                $element.bind(scrollEvent, function() {
                    var scrollHandler;
                    if (!(_this.didScroll || isTouch)) {
                        _this.didScroll = true;
                        scrollHandler = function() {
                            _this.doScroll();
                            return _this.didScroll = false;
                        };
                        return window.setTimeout(scrollHandler, $[wps].settings.scrollThrottle);
                    }
                });
                $element.bind(resizeEvent, function() {
                    var resizeHandler;
                    if (!_this.didResize) {
                        _this.didResize = true;
                        resizeHandler = function() {
                            $[wps]('refresh');
                            return _this.didResize = false;
                        };
                        return window.setTimeout(resizeHandler, $[wps].settings.resizeThrottle);
                    }
                });
            }
            Context.prototype.doScroll = function() {
                var axes, _this = this;
                axes = {
                    horizontal: {
                        newScroll: this.$element.scrollLeft(),
                        oldScroll: this.oldScroll.x,
                        forward: 'right',
                        backward: 'left'
                    },
                    vertical: {
                        newScroll: this.$element.scrollTop(),
                        oldScroll: this.oldScroll.y,
                        forward: 'down',
                        backward: 'up'
                    }
                };
                if (isTouch && (!axes.vertical.oldScroll || !axes.vertical.newScroll)) {
                    $[wps]('refresh');
                }
                $.each(axes, function(aKey, axis) {
                    var direction, isForward, triggered;
                    triggered = [];
                    isForward = axis.newScroll > axis.oldScroll;
                    direction = isForward ? axis.forward : axis.backward;
                    $.each(_this.waypoints[aKey], function(wKey, waypoint) {
                        var _ref, _ref1;
                        if ((axis.oldScroll < (_ref = waypoint.offset) && _ref <= axis.newScroll)) {
                            return triggered.push(waypoint);
                        } else if ((axis.newScroll < (_ref1 = waypoint.offset) && _ref1 <= axis.oldScroll)) {
                            return triggered.push(waypoint);
                        }
                    });
                    triggered.sort(function(a, b) {
                        return a.offset - b.offset;
                    });
                    if (!isForward) {
                        triggered.reverse();
                    }
                    return $.each(triggered, function(i, waypoint) {
                        if (waypoint.options.continuous || i === triggered.length - 1) {
                            return waypoint.trigger([direction]);
                        }
                    });
                });
                return this.oldScroll = {
                    x: axes.horizontal.newScroll,
                    y: axes.vertical.newScroll
                };
            };
            Context.prototype.refresh = function() {
                var axes, cOffset, isWin, _this = this;
                isWin = $.isWindow(this.element);
                cOffset = this.$element.offset();
                this.doScroll();
                axes = {
                    horizontal: {
                        contextOffset: isWin ? 0 : cOffset.left,
                        contextScroll: isWin ? 0 : this.oldScroll.x,
                        contextDimension: this.$element.width(),
                        oldScroll: this.oldScroll.x,
                        forward: 'right',
                        backward: 'left',
                        offsetProp: 'left'
                    },
                    vertical: {
                        contextOffset: isWin ? 0 : cOffset.top,
                        contextScroll: isWin ? 0 : this.oldScroll.y,
                        contextDimension: isWin ? $[wps]('viewportHeight') : this.$element.height(),
                        oldScroll: this.oldScroll.y,
                        forward: 'down',
                        backward: 'up',
                        offsetProp: 'top'
                    }
                };
                return $.each(axes, function(aKey, axis) {
                    return $.each(_this.waypoints[aKey], function(i, waypoint) {
                        var adjustment, elementOffset, oldOffset, _ref, _ref1;
                        adjustment = waypoint.options.offset;
                        oldOffset = waypoint.offset;
                        elementOffset = $.isWindow(waypoint.element) ? 0 : waypoint.$element.offset()[axis.offsetProp];
                        if ($.isFunction(adjustment)) {
                            adjustment = adjustment.apply(waypoint.element);
                        } else if (typeof adjustment === 'string') {
                            adjustment = parseFloat(adjustment);
                            if (waypoint.options.offset.indexOf('%') > -1) {
                                adjustment = Math.ceil(axis.contextDimension * adjustment / 100);
                            }
                        }
                        waypoint.offset = elementOffset - axis.contextOffset + axis.contextScroll - adjustment;
                        if ((waypoint.options.onlyOnScroll && (oldOffset != null)) || !waypoint.enabled) {
                            return;
                        }
                        if (oldOffset !== null && (oldOffset < (_ref = axis.oldScroll) && _ref <= waypoint.offset)) {
                            return waypoint.trigger([axis.backward]);
                        } else if (oldOffset !== null && (oldOffset > (_ref1 = axis.oldScroll) && _ref1 >= waypoint.offset)) {
                            return waypoint.trigger([axis.forward]);
                        } else if (oldOffset === null && axis.oldScroll >= waypoint.offset) {
                            return waypoint.trigger([axis.forward]);
                        }
                    });
                });
            };
            Context.prototype.checkEmpty = function() {
                if ($.isEmptyObject(this.waypoints.horizontal) && $.isEmptyObject(this.waypoints.vertical)) {
                    this.$element.unbind([resizeEvent, scrollEvent].join(' '));
                    return delete contexts[this.id];
                }
            };
            return Context;
        })();
        Waypoint = (function() {
            function Waypoint($element, context, options) {
                var idList, _ref;
                if (options.offset === 'bottom-in-view') {
                    options.offset = function() {
                        var contextHeight;
                        contextHeight = $[wps]('viewportHeight');
                        if (!$.isWindow(context.element)) {
                            contextHeight = context.$element.height();
                        }
                        return contextHeight - $(this).outerHeight();
                    };
                }
                this.$element = $element;
                this.element = $element[0];
                this.axis = options.horizontal ? 'horizontal' : 'vertical';
                this.callback = options.handler;
                this.context = context;
                this.enabled = options.enabled;
                this.id = 'waypoints' + waypointCounter++;
                this.offset = null;
                this.options = options;
                context.waypoints[this.axis][this.id] = this;
                allWaypoints[this.axis][this.id] = this;
                idList = (_ref = this.element[waypointKey]) != null ? _ref : [];
                idList.push(this.id);
                this.element[waypointKey] = idList;
            }
            Waypoint.prototype.trigger = function(args) {
                if (!this.enabled) {
                    return;
                }
                if (this.callback != null) {
                    this.callback.apply(this.element, args);
                }
                if (this.options.triggerOnce) {
                    return this.destroy();
                }
            };
            Waypoint.prototype.disable = function() {
                return this.enabled = false;
            };
            Waypoint.prototype.enable = function() {
                this.context.refresh();
                return this.enabled = true;
            };
            Waypoint.prototype.destroy = function() {
                delete allWaypoints[this.axis][this.id];
                delete this.context.waypoints[this.axis][this.id];
                return this.context.checkEmpty();
            };
            Waypoint.getWaypointsByElement = function(element) {
                var all, ids;
                ids = element[waypointKey];
                if (!ids) {
                    return [];
                }
                all = $.extend({}, allWaypoints.horizontal, allWaypoints.vertical);
                return $.map(ids, function(id) {
                    return all[id];
                });
            };
            return Waypoint;
        })();
        methods = {
            init: function(f, options) {
                var _ref;
                options = $.extend({}, $.fn[wp].defaults, options);
                if ((_ref = options.handler) == null) {
                    options.handler = f;
                }
                this.each(function() {
                    var $this, context, contextElement, _ref1;
                    $this = $(this);
                    contextElement = (_ref1 = options.context) != null ? _ref1 : $.fn[wp].defaults.context;
                    if (!$.isWindow(contextElement)) {
                        contextElement = $this.closest(contextElement);
                    }
                    contextElement = $(contextElement);
                    context = contexts[contextElement[0][contextKey]];
                    if (!context) {
                        context = new Context(contextElement);
                    }
                    return new Waypoint($this, context, options);
                });
                $[wps]('refresh');
                return this;
            },
            disable: function() {
                return methods._invoke.call(this, 'disable');
            },
            enable: function() {
                return methods._invoke.call(this, 'enable');
            },
            destroy: function() {
                return methods._invoke.call(this, 'destroy');
            },
            prev: function(axis, selector) {
                return methods._traverse.call(this, axis, selector, function(stack, index, waypoints) {
                    if (index > 0) {
                        return stack.push(waypoints[index - 1]);
                    }
                });
            },
            next: function(axis, selector) {
                return methods._traverse.call(this, axis, selector, function(stack, index, waypoints) {
                    if (index < waypoints.length - 1) {
                        return stack.push(waypoints[index + 1]);
                    }
                });
            },
            _traverse: function(axis, selector, push) {
                var stack, waypoints;
                if (axis == null) {
                    axis = 'vertical';
                }
                if (selector == null) {
                    selector = window;
                }
                waypoints = jQMethods.aggregate(selector);
                stack = [];
                this.each(function() {
                    var index;
                    index = $.inArray(this, waypoints[axis]);
                    return push(stack, index, waypoints[axis]);
                });
                return this.pushStack(stack);
            },
            _invoke: function(method) {
                this.each(function() {
                    var waypoints;
                    waypoints = Waypoint.getWaypointsByElement(this);
                    return $.each(waypoints, function(i, waypoint) {
                        waypoint[method]();
                        return true;
                    });
                });
                return this;
            }
        };
        $.fn[wp] = function() {
            var args, method;
            method = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            if (methods[method]) {
                return methods[method].apply(this, args);
            } else if ($.isFunction(method)) {
                return methods.init.apply(this, arguments);
            } else if ($.isPlainObject(method)) {
                return methods.init.apply(this, [null, method]);
            } else if (!method) {
                return $.error("jQuery Waypoints needs a callback function or handler option.");
            } else {
                return $.error("The " + method + " method does not exist in jQuery Waypoints.");
            }
        };
        $.fn[wp].defaults = {
            context: window,
            continuous: true,
            enabled: true,
            horizontal: false,
            offset: 0,
            triggerOnce: false
        };
        jQMethods = {
            refresh: function() {
                return $.each(contexts, function(i, context) {
                    return context.refresh();
                });
            },
            viewportHeight: function() {
                var _ref;
                return (_ref = window.innerHeight) != null ? _ref : $w.height();
            },
            aggregate: function(contextSelector) {
                var collection, waypoints, _ref;
                collection = allWaypoints;
                if (contextSelector) {
                    collection = (_ref = contexts[$(contextSelector)[0][contextKey]]) != null ? _ref.waypoints : void 0;
                }
                if (!collection) {
                    return [];
                }
                waypoints = {
                    horizontal: [],
                    vertical: []
                };
                $.each(waypoints, function(axis, arr) {
                    $.each(collection[axis], function(key, waypoint) {
                        return arr.push(waypoint);
                    });
                    arr.sort(function(a, b) {
                        return a.offset - b.offset;
                    });
                    waypoints[axis] = $.map(arr, function(waypoint) {
                        return waypoint.element;
                    });
                    return waypoints[axis] = $.unique(waypoints[axis]);
                });
                return waypoints;
            },
            above: function(contextSelector) {
                if (contextSelector == null) {
                    contextSelector = window;
                }
                return jQMethods._filter(contextSelector, 'vertical', function(context, waypoint) {
                    return waypoint.offset <= context.oldScroll.y;
                });
            },
            below: function(contextSelector) {
                if (contextSelector == null) {
                    contextSelector = window;
                }
                return jQMethods._filter(contextSelector, 'vertical', function(context, waypoint) {
                    return waypoint.offset > context.oldScroll.y;
                });
            },
            left: function(contextSelector) {
                if (contextSelector == null) {
                    contextSelector = window;
                }
                return jQMethods._filter(contextSelector, 'horizontal', function(context, waypoint) {
                    return waypoint.offset <= context.oldScroll.x;
                });
            },
            right: function(contextSelector) {
                if (contextSelector == null) {
                    contextSelector = window;
                }
                return jQMethods._filter(contextSelector, 'horizontal', function(context, waypoint) {
                    return waypoint.offset > context.oldScroll.x;
                });
            },
            enable: function() {
                return jQMethods._invoke('enable');
            },
            disable: function() {
                return jQMethods._invoke('disable');
            },
            destroy: function() {
                return jQMethods._invoke('destroy');
            },
            extendFn: function(methodName, f) {
                return methods[methodName] = f;
            },
            _invoke: function(method) {
                var waypoints;
                waypoints = $.extend({}, allWaypoints.vertical, allWaypoints.horizontal);
                return $.each(waypoints, function(key, waypoint) {
                    waypoint[method]();
                    return true;
                });
            },
            _filter: function(selector, axis, test) {
                var context, waypoints;
                context = contexts[$(selector)[0][contextKey]];
                if (!context) {
                    return [];
                }
                waypoints = [];
                $.each(context.waypoints[axis], function(i, waypoint) {
                    if (test(context, waypoint)) {
                        return waypoints.push(waypoint);
                    }
                });
                waypoints.sort(function(a, b) {
                    return a.offset - b.offset;
                });
                return $.map(waypoints, function(waypoint) {
                    return waypoint.element;
                });
            }
        };
        $[wps] = function() {
            var args, method;
            method = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            if (jQMethods[method]) {
                return jQMethods[method].apply(null, args);
            } else {
                return jQMethods.aggregate.call(null, method);
            }
        };
        $[wps].settings = {
            resizeThrottle: 100,
            scrollThrottle: 30
        };
        return $w.on('load.waypoints', function() {
            return $[wps]('refresh');
        });
    });
}).call(this);