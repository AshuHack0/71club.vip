import {
    P as V,
    aC as oe,
    Z as ne,
    $ as Y,
    J as C,
    Q as A,
    W as p,
    R as k,
    U as G,
    V as ee,
    T as t,
    Y as b,
    aj as $,
    X as c,
    ap as J,
    H as u,
    av as F,
    A as H,
    N as ie,
    r as y,
    q as he,
    ai as be,
    G as R,
    at as D,
    au as T,
    aq as ye,
    al as P,
    K as we,
    bf as ke,
    aO as te,
    bB as $e,
    a7 as Se,
    ao as W,
    an as Ie,
    B as Ce,
    bC as Le,
    bD as Te,
    bE as Ae,
    bF as De,
    bG as Pe,
    am as j,
    aD as Be,
    n as le,
    bw as Ne,
    b4 as Oe,
    bH as Ve,
    bI as Fe,
    bJ as Re,
    bK as Ee,
    bL as Ue,
    bM as je,
    bN as We,
    bO as Ge,
    bb as He,
    bP as ze,
    b9 as xe,
    bQ as Me,
    bR as Ke,
    bS as qe,
    bT as Ye,
    bU as Je,
    bV as Qe,
    bW as Xe,
    ba as Ze,
    bX as et,
    bY as tt,
    bZ as at,
    b_ as st,
    b$ as ot,
    c0 as nt,
    c1 as it,
    be as lt,
    c2 as rt,
    c3 as ct,
    c4 as ut,
    c5 as dt,
    c6 as vt,
    c7 as mt,
    c8 as _t,
    c9 as pt,
    ca as gt,
    cb as ft,
    cc as ht,
    cd as bt,
    ce as yt,
    cf as wt,
    cg as kt,
    ch as $t
} from "./common.modules-62343d57.js";
import {
    v as z,
    a as Q,
    c as q,
    _ as B,
    G as re,
    k as X,
    i as ce,
    g as K,
    a0 as St,
    a1 as It,
    dD as Ct,
    dE as Lt,
    dF as Tt,
    dG as At,
    a$ as Dt,
    aW as Pt,
    b0 as Bt,
    b1 as Nt,
    K as ue,
    d as Ot,
    aP as Vt,
    dH as Ft,
    av as Rt,
    dI as ae,
    dJ as Et,
    aB as de
} from "./page-activity-ActivityDetail-f331937d.js";
import {
    f as Ut
} from "./page-activity-FirstRecharge-eb727fb6.js";
import "./native/index-196b79e6.js";
import "./en-94a065ad.js";
import "./page-turntable-assets-d6267459.js";
import "./page-activity-DailySignIn-30f2473c.js";
import "./page-activity-Championship-a1412aa9.js";
window.getBuildInfo = function() {
    return {
        buildTime: "7/18/2025, 6:23:56 PM",
        branch: " commitId:89d3a6d8c69f284504e0af420c6d1e27de524ac0"
    }
};
(function() {
    const e = document.createElement("link").relList;
    if (e && e.supports && e.supports("modulepreload")) return;
    for (const o of document.querySelectorAll('link[rel="modulepreload"]')) i(o);
    new MutationObserver(o => {
        for (const l of o)
            if (l.type === "childList")
                for (const g of l.addedNodes) g.tagName === "LINK" && g.rel === "modulepreload" && i(g)
    }).observe(document, {
        childList: !0,
        subtree: !0
    });

    function s(o) {
        const l = {};
        return o.integrity && (l.integrity = o.integrity), o.referrerPolicy && (l.referrerPolicy = o.referrerPolicy), o.crossOrigin === "use-credentials" ? l.credentials = "include" : o.crossOrigin === "anonymous" ? l.credentials = "omit" : l.credentials = "same-origin", l
    }

    function i(o) {
        if (o.ep) return;
        o.ep = !0;
        const l = s(o);
        fetch(o.href, l)
    }
})();
const jt = {
        key: 0,
        class: "tabbar__container"
    },
    Wt = ["onClick"],
    Gt = {
        key: 0,
        class: "promotionBg"
    },
    Ht = {
        key: 1,
        class: "tabbar__container"
    },
    zt = ["onClick"],
    xt = {
        key: 0,
        class: "turntableBg"
    },
    Mt = {
        key: 1,
        class: "turntable-text"
    },
    Kt = {
        key: 2
    },
    qt = V({
        __name: "index",
        setup(a) {
            oe(m => ({
                "6ab3f23e-getInvitedWheelImgUrl": l.value
            }));
            const e = ne(),
                s = Y();
            async function i(m) {
                await e.push({
                    name: m
                })
            }
            const o = z(),
                l = C(() => `url(${o.getInvitedWheelImgUrl?o.getInvitedWheelImgUrl:Q("common","wheel")})`),
                g = C(() => o.getInvitedWheelTotalPrizeAmount),
                _ = [{
                    name: "home"
                }, {
                    name: "activity"
                }, {
                    name: "promotion"
                }, {
                    name: "wallet"
                }, {
                    name: "main"
                }],
                f = [{
                    name: "home"
                }, {
                    name: "activity"
                }, {
                    name: "turntable"
                }, {
                    name: "promotion"
                }, {
                    name: "main"
                }],
                v = C(() => o.getIsOpenInvitedWheel);
            return (m, w) => {
                const S = A("svg-icon");
                return v.value ? (p(), k("div", Ht, [(p(), k(G, null, ee(f, (n, r) => t("div", {
                    class: J(["tabbar__container-item", {
                        active: n.name === u(s).name
                    }]),
                    key: n + "" + r,
                    onClick: I => i(n.name)
                }, [b(S, {
                    name: n.name === "promotion" ? "promotion2" : n.name
                }, null, 8, ["name"]), n.name === "turntable" ? (p(), k("div", xt)) : $("v-if", !0), n.name === "turntable" ? (p(), k("span", Mt, [$(" {{ $t('invitedWheel') }} "), F(" " + c(m.$t("getMoney", [u(q)(g.value, "", 0)])), 1)])) : (p(), k("span", Kt, c(m.$t(n.name)), 1))], 10, zt)), 64))])) : (p(), k("div", jt, [(p(), k(G, null, ee(_, (n, r) => t("div", {
                    class: J(["tabbar__container-item", {
                        active: n.name === u(s).name
                    }]),
                    key: n + "" + r,
                    onClick: I => i(n.name)
                }, [b(S, {
                    name: n.name
                }, null, 8, ["name"]), n.name === "promotion" ? (p(), k("div", Gt)) : $("v-if", !0), t("span", null, c(m.$t(n.name)), 1)], 10, Wt)), 64))]))
            }
        }
    });
const Yt = B(qt, [
    ["__scopeId", "data-v-6ab3f23e"],
    ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/TabBar/index.vue"]
]);

function Jt() {
    const a = re(),
        e = () => {
            document.visibilityState === "visible" ? a.setvisibility() : a.setvisibility(0)
        };
    H(() => {
        document.addEventListener("visibilitychange", e)
    }), ie(() => {
        document.removeEventListener("visibilitychange", e)
    })
}
const Qt = {},
    Xt = {
        class: "start-page"
    };

function Zt(a, e) {
    return p(), k("div", Xt)
}
const ea = B(Qt, [
        ["render", Zt],
        ["__scopeId", "data-v-5eb72be7"],
        ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/entrance/ar023/StartPage.vue"]
    ]),
    ta = {
        class: "header"
    },
    aa = {
        class: "title"
    },
    sa = {
        class: "tip"
    },
    oa = {
        class: "container"
    },
    na = {
        class: "footer"
    },
    ia = V({
        __name: "dialog",
        setup(a) {
            const e = ne(),
                s = Y(),
                i = y(!1),
                {
                    closeFirstSave: o
                } = X(),
                {
                    ActiveSotre: l,
                    getFirstRechargeList: g
                } = ce(),
                _ = he(new Date).format("YYYY-MM-DD"),
                f = be("firstSave", null),
                v = C(() => f.value == _),
                m = () => {
                    v.value ? (f.value = "", localStorage.removeItem("firstSave")) : f.value = _
                },
                w = () => {
                    i.value = !1, o()
                },
                S = ["activity", "home", "main", "wallet", "promotion"];
            R(() => s.name, h => {
                S.includes(s.name) && n()
            });
            const n = () => {
                    if (f.value == _) return o();
                    g().then(h => {
                        if (!h.length) {
                            i.value = !1, o();
                            return
                        }
                        const d = h.find(N => N.isFinshed);
                        d && (l.value.isShowFirstSaveDialog = !1), d || (i.value = !0)
                    })
                },
                r = () => {
                    i.value = !1, o(!0), e.push({
                        name: "FirstRecharge"
                    })
                },
                I = () => {
                    i.value = !1, o(!0), e.push({
                        name: "Recharge"
                    })
                };
            return H(() => {
                S.includes(s.name) && n()
            }), (h, d) => {
                const N = A("van-checkbox"),
                    E = A("van-dialog");
                return p(), D(E, {
                    show: i.value,
                    "onUpdate:show": d[1] || (d[1] = U => i.value = U),
                    className: "firstSaveDialog"
                }, {
                    title: T(() => [t("div", ta, [t("div", aa, c(h.$t("firstDialogH")), 1), t("div", sa, c(h.$t("firstDialogTip")), 1)])]),
                    footer: T(() => [t("div", na, [$(` <div class="active" :class="{ a: isActive}" @click="changeActive"><svg-icon name="active" />{{ $t('noTipToday') }}</div> `), t("div", {
                        class: J(["active", {
                            a: v.value
                        }]),
                        onClick: m
                    }, [b(N, {
                        modelValue: v.value,
                        "onUpdate:modelValue": d[0] || (d[0] = U => v.value = U)
                    }, null, 8, ["modelValue"]), F(c(h.$t("noTipToday")), 1)], 2), t("div", {
                        class: "btn",
                        onClick: r
                    }, c(h.$t("activity")), 1)])]),
                    default: T(() => [t("div", oa, [b(Ut, {
                        list: u(l).FirstRechargeList,
                        onGorecharge: I
                    }, null, 8, ["list"])]), t("div", {
                        class: "close",
                        onClick: w
                    })]),
                    _: 1
                }, 8, ["show"])
            }
        }
    });
const la = B(ia, [
        ["__scopeId", "data-v-9cd12fb2"],
        ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/Activity/FirstRecharge/dialog.vue"]
    ]),
    ra = {
        class: "dialog-window"
    },
    ca = {
        class: "dialog-wrapper"
    },
    ua = {
        class: "dialog-title"
    },
    da = {
        class: "dialog-content"
    },
    va = {
        class: "dialog-window"
    },
    ma = {
        class: "dialog-wrapper"
    },
    _a = {
        class: "dialog-title"
    },
    pa = {
        class: "dialog-tips"
    },
    ga = {
        class: "dialog-content"
    },
    fa = {
        class: "dialog-tips",
        style: {
            "margin-bottom": "0"
        }
    },
    ha = {
        class: "dialog-window"
    },
    ba = {
        class: "dialog-wrapper"
    },
    ya = {
        class: "dialog-tips",
        style: {
            "margin-top": "10px"
        }
    },
    wa = {
        class: "dialog-title",
        style: {
            "margin-top": "0"
        }
    },
    ka = {
        class: "dialog-tips"
    },
    $a = {
        class: "dialog-content"
    },
    Sa = {
        class: "dialog-18"
    },
    Ia = {
        class: "tip_txt"
    },
    Ca = {
        class: "dialog-footer"
    },
    La = {
        class: "dialog-18"
    },
    Ta = {
        class: "dialog-footer"
    },
    Aa = V({
        __name: "AllPageDialog",
        setup(a) {
            const {
                ActiveSotre: e
            } = ce(), {
                store: s,
                closeInvite: i,
                showFirstSave: o,
                onReturnAwards: l
            } = X(), g = y(!1), _ = y(!1), f = localStorage.getItem("is18") || void 0, v = z(), m = ["poppg", "POP888", "POP555", "pop", "POP678"], w = C(() => m.includes(v.projectName)), S = n => {
                n ? (localStorage.setItem("is18", "1"), g.value = !1) : _.value = !0
            };
            return R(() => w.value, n => {
                n && (g.value = !(f && f === "1"))
            }, {
                immediate: !0
            }), (n, r) => {
                const I = A("van-dialog"),
                    h = ye("lazy");
                return p(), k(G, null, [u(o) ? (p(), D(la, {
                    key: 0
                })) : $("v-if", !0), b(I, {
                    show: u(e).showReceiveDialog,
                    "onUpdate:show": r[1] || (r[1] = d => u(e).showReceiveDialog = d),
                    "show-confirm-button": !1,
                    className: "noOverHidden"
                }, {
                    default: T(() => [t("div", ra, [t("div", ca, [P(t("img", null, null, 512), [
                        [h, u(K)("public", "succeed")]
                    ]), t("div", ua, c(n.$t("awardsReceived")), 1), t("div", da, [P(t("img", null, null, 512), [
                        [h, u(K)("activity/DailyTask", "amountIcon")]
                    ]), t("span", null, c(u(q)(u(e).receiveAmount)), 1)]), t("div", {
                        class: "dialog-btn",
                        onClick: r[0] || (r[0] = d => u(e).showReceiveDialog = !1)
                    }, c(n.$t("confirm")), 1)])])]),
                    _: 1
                }, 8, ["show"]), b(I, {
                    show: u(s).invite,
                    "onUpdate:show": r[3] || (r[3] = d => u(s).invite = d),
                    "show-confirm-button": !1,
                    className: "noOverHidden"
                }, {
                    default: T(() => [t("div", va, [t("div", ma, [P(t("img", null, null, 512), [
                        [h, u(K)("public", "succeed")]
                    ]), t("div", _a, c(n.$t("inviteTips")), 1), t("p", pa, c(n.$t("inviteAmount")), 1), t("div", ga, [t("span", fa, c(n.$t("commissionAmount")), 1), t("span", null, c(u(q)(u(s).rebateAmount)), 1)]), t("div", {
                        class: "dialog-btn",
                        onClick: r[2] || (r[2] = d => u(i)())
                    }, c(n.$t("receive")), 1)])])]),
                    _: 1
                }, 8, ["show"]), b(I, {
                    show: u(s).oldUser,
                    "onUpdate:show": r[5] || (r[5] = d => u(s).oldUser = d),
                    "show-confirm-button": !1,
                    "close-on-click-overlay": !0,
                    className: "noOverHidden"
                }, {
                    default: T(() => [t("div", ha, [t("div", ba, [P(t("img", null, null, 512), [
                        [h, u(K)("public", "succeed")]
                    ]), t("p", ya, c(n.$t("oldPromptTip")), 1), t("div", wa, c(n.$t("oldPrompt")), 1), t("p", ka, c(n.$t("oldPromptGift")), 1), t("div", $a, [t("span", null, c(u(q)(u(s).returnAwards)), 1)]), t("div", {
                        class: "dialog-btn",
                        onClick: r[4] || (r[4] = d => u(l)())
                    }, c(n.$t("receive")), 1)])])]),
                    _: 1
                }, 8, ["show"]), b(I, {
                    show: g.value,
                    "onUpdate:show": r[8] || (r[8] = d => g.value = d),
                    className: "custom18dialog noOverHidden",
                    "show-confirm-button": !1,
                    "close-on-click-overlay": !1
                }, {
                    default: T(() => [t("div", Sa, [t("div", null, [t("span", null, c(n.$t("loginTips", [u(v).projectName])), 1), t("div", Ia, c(n.$t("brazildialog1")), 1)]), t("div", Ca, [t("div", {
                        class: "btn-cnf dialog-btn",
                        onClick: r[6] || (r[6] = d => S(!0))
                    }, c(n.$t("brazildialog2")), 1), t("div", {
                        class: "btn-cancel dialog-btn",
                        onClick: r[7] || (r[7] = d => S(!1))
                    }, c(n.$t("brazildialog3")), 1)])])]),
                    _: 1
                }, 8, ["show"]), b(I, {
                    show: _.value,
                    "onUpdate:show": r[10] || (r[10] = d => _.value = d),
                    className: "custom18dialog noAge",
                    "show-confirm-button": !1,
                    "close-on-click-overlay": !1
                }, {
                    default: T(() => [t("div", La, [t("div", null, [t("span", null, c(n.$t("brazildialog4")), 1)]), t("div", Ta, [t("div", {
                        class: "btn-cancel dialog-btn no-btn",
                        onClick: r[9] || (r[9] = d => _.value = !1)
                    }, c(n.$t("confirm")), 1)])])]),
                    _: 1
                }, 8, ["show"])], 64)
            }
        }
    });
const Da = B(Aa, [
        ["__scopeId", "data-v-3d4fafbb"],
        ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/common/AllPageDialog.vue"]
    ]),
    Pa = V({
        __name: "App",
        setup(a) {
            oe(L => ({
                "f13b4d11-currentFontFamily": E.value
            }));
            const {
                openAll: e
            } = X(), s = Pt(), i = y(!1), o = y(!1), l = Y(), g = St(), _ = z(), {
                locale: f
            } = we(), v = re(), m = y(!1), w = C(() => l.meta.tabBar), S = "electronic";
            C(() => ["electronic", "blackGoldHome"].includes(S) ? !1 : !["/wallet/Withdraw/C2cDetail", "/wallet/RechargeHistory/RechargeUpiDetail", "/wallet/Withdraw/Upi", "/wallet/Withdraw/AddUpi", "/wallet/Withdraw/c2cCancelWithdrawal/index.vue", "/wallet/otherPay?type=C2C", "/home/game"].includes(l.path));
            const n = y(0),
                r = y(Math.floor(Math.random() * 1e4)),
                I = C(() => l.name + r.value),
                h = () => {
                    s.on("changeKeepAliveKey", () => {
                        r.value = Math.floor(Math.random() * 1e4)
                    })
                };
            sessionStorage.getItem("isload") ? i.value = !1 : (o.value = !0, sessionStorage.setItem("isload", o.value.toString()), i.value = !0), _.getHomeSetting(), R(() => _.getAreacode, L => {
                L && g.setNumberType(L.substring(1))
            }), R(() => _.getDL, L => {
                f.value = L, v.updateLanguage(L), Bt(L), Nt(ue.global.t)
            }), setTimeout(() => {
                i.value = !1
            }, 2e3);
            const d = y(!1),
                N = It();
            N.$subscribe((L, O) => {
                d.value = O.isLoading, N.setLoading(d.value)
            });
            const E = y("bahnschrift");
            let U = Ct(),
                me = _.getLanguage,
                _e = Lt(U, me);
            const pe = async L => {
                    const O = [{
                            title: "vi",
                            fontStyle: "bahnschrift"
                        }, {
                            title: "else",
                            fontStyle: "'Roboto', 'Inter', sans-serif"
                        }],
                        x = O.findIndex(M => M.title == _e);
                    x >= 0 ? E.value = O[x].fontStyle : E.value = O[O.length - 1].fontStyle
                },
                ge = () => {
                    s.on("keyChange", () => {
                        n.value++
                    }), s.on("changeIsGame", () => {
                        m.value = !m.value, d.value = !d.value
                    })
                },
                fe = () => {
                    s.off("keyChange"), s.off("changeKeepAliveKey"), s.off("changeIsGame")
                };
            return g.setNumberType(_.getAreacode.substring(1)), pe(), H(() => {
                Tt() && At(), e(), fe(), ge(), h(), localStorage.getItem("language") && Dt(localStorage.getItem("language"))
            }), Jt(), (L, O) => {
                const x = A("LoadingView");
                return p(), k(G, null, [b(x, {
                    loading: d.value,
                    type: "loading",
                    isGame: m.value
                }, {
                    default: T(() => [(p(), D(u($e), {
                        key: n.value
                    }, {
                        default: T(({
                            Component: M
                        }) => [(p(), D(ke, {
                            max: 1
                        }, [u(l).meta.keepAlive ? (p(), D(te(M), {
                            key: I.value
                        })) : $("v-if", !0)], 1024)), u(l).meta.keepAlive ? $("v-if", !0) : (p(), D(te(M), {
                            key: 0
                        }))]),
                        _: 1
                    })), $("online custom service"), w.value ? (p(), D(Yt, {
                        key: 0
                    })) : $("v-if", !0)]),
                    _: 1
                }, 8, ["loading", "isGame"]), i.value ? (p(), D(ea, {
                    key: 0
                })) : $("v-if", !0), b(Da)], 64)
            }
        }
    });
const Ba = B(Pa, [
    ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/entrance/ar023/App.vue"]
]);
const Na = {
        mounted(a, e) {
            if (typeof e.value[0] != "function" || typeof e.value[1] != "number") throw new Error("v-debounce: value must be an array that includes a function and a number");
            let s = null;
            const i = e.value[0],
                o = e.value[1];
            a.__handleClick__ = function() {
                s && clearTimeout(s), s = setTimeout(() => {
                    i()
                }, o || 500)
            }, a.addEventListener("click", a.__handleClick__)
        },
        beforeUnmount(a) {
            a.removeEventListener("click", a.__handleClick__)
        }
    },
    Oa = {
        mounted(a, e) {
            if (typeof e.value[0] != "function" || typeof e.value[1] != "number") throw new Error("v-throttle: value must be an array that includes a function and a number");
            let s = null;
            const i = e.value[0],
                o = e.value[1];
            a.__handleClick__ = function() {
                s && clearTimeout(s), a.disabled || (a.disabled = !0, i(), s = setTimeout(() => {
                    a.disabled = !1
                }, o || 500))
            }, a.addEventListener("click", a.__handleClick__)
        },
        beforeUnmount(a) {
            a.removeEventListener("click", a.__handleClick__)
        }
    },
    Va = {
        mounted(a, e) {
            a.addEventListener("input", s => {
                const o = a.value.replace(/\D+/g, "");
                a.value = o, e.value = o
            })
        }
    },
    Fa = a => ({
        beforeMount: (e, s) => {
            e.classList.add("ar-lazyload");
            const {
                value: i
            } = s;
            e.dataset.origin = i, a.observe(e)
        },
        updated(e, s) {
            e.dataset.origin = s.value, a.observe(e)
        },
        unmounted(e, s) {
            a.unobserve(e)
        },
        mounted(e, s) {
            a.observe(e)
        }
    }),
    Ra = {
        mounted(a, e) {
            let s = 0;
            const i = e.value && e.value.wait ? e.value.wait : 3e3,
                o = l => {
                    const g = Date.now();
                    g - s >= i && (s = g, e.value && e.value.handler && e.value.handler(l))
                };
            a.addEventListener("click", o), a._throttleClickCleanup = () => {
                a.removeEventListener("click", o)
            }
        },
        unmounted(a) {
            a._throttleClickCleanup && a._throttleClickCleanup(), delete a._throttleClickCleanup
        }
    },
    Ea = {
        mounted(a, e) {
            const {
                value: s
            } = e;
            let i = Se("permission", null);
            i.value === null || !s || (i && (i = JSON.parse(i.value)), i && i[s] === !1 && (a.style.display = "none"))
        }
    },
    se = {
        debounce: Na,
        throttle: Oa,
        onlyNum: Va,
        throttleClick: Ra,
        haspermission: Ea
    },
    Ua = {
        install: function(a) {
            Object.keys(se).forEach(s => {
                a.directive(s, se[s])
            });
            const e = new IntersectionObserver(s => {
                s.forEach(i => {
                    if (i.isIntersecting) {
                        const o = i.target;
                        o.src = o.dataset.origin || Q("images", "avatar"), o.onerror = () => {
                            e.unobserve(o);
                            let l = o.dataset.img || Q("images", "avatar");
                            if (!l || l != null && l.includes("undefined")) {
                                o.onerror = null;
                                return
                            }
                            o.src = l, o.style.objectFit = "contain"
                        }, o.classList.remove("ar-lazyload"), e.unobserve(o)
                    }
                })
            }, {
                rootMargin: "0px 0px -50px 0px"
            });
            a.directive("lazy", Fa(e))
        }
    },
    ja = {
        class: "navbar-fixed"
    },
    Wa = {
        class: "navbar__content"
    },
    Ga = {
        class: "navbar__content-center"
    },
    Ha = {
        class: "navbar__content-title"
    },
    za = V({
        __name: "NavBar",
        props: {
            title: {
                type: String,
                default: ""
            },
            placeholder: {
                type: Boolean,
                default: !0
            },
            leftArrow: {
                type: Boolean,
                default: !1
            },
            backgroundColor: {
                type: String,
                default: "#f7f8ff"
            },
            classN: {
                type: String,
                default: ""
            },
            headLogo: {
                type: Boolean,
                default: !1
            },
            headerUrl: {
                type: String,
                default: ""
            }
        },
        emits: ["click-left", "click-right"],
        setup(a, {
            emit: e
        }) {
            const s = y(),
                i = z(),
                o = C(() => i.getHeadLogo),
                l = () => {
                    e("click-left")
                },
                g = () => {
                    e("click-right")
                };
            return H(() => {}), (_, f) => {
                const v = A("van-icon");
                return p(), k("div", {
                    class: "navbar",
                    ref_key: "navbar",
                    ref: s
                }, [t("div", ja, [t("div", Wa, [t("div", {
                    class: "navbar__content-left",
                    onClick: l
                }, [W(_.$slots, "left", {}, () => [a.leftArrow ? (p(), D(v, {
                    key: 0,
                    name: "arrow-left"
                })) : $("v-if", !0)], !0)]), t("div", Ga, [a.headLogo ? (p(), k("div", {
                    key: 0,
                    class: "headLogo",
                    style: Ie({
                        backgroundImage: "url(" + (a.headerUrl || o.value) + ")"
                    })
                }, null, 4)) : $("v-if", !0), W(_.$slots, "center", {}, () => [t("div", Ha, c(a.title), 1)], !0)]), t("div", {
                    class: "navbar__content-right",
                    onClick: g
                }, [W(_.$slots, "right", {}, void 0, !0)])])])], 512)
            }
        }
    });
const xa = B(za, [
        ["__scopeId", "data-v-12a80a3e"],
        ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/common/NavBar.vue"]
    ]),
    Ma = () => {
        const a = z(),
            e = C(() => a.getFirebaseConfig),
            s = y(!1),
            i = y(!1),
            o = y(!1),
            l = y(null),
            g = async () => {
                var v;
                if (!(s.value || !((v = e.value) != null && v.projectId))) try {
                    const m = {
                            apiKey: e.value.apiKey,
                            authDomain: e.value.authDomain,
                            projectId: e.value.projectId,
                            storageBucket: e.value.storageBucket,
                            messagingSenderId: e.value.messagingSenderId,
                            appId: e.value.appId,
                            measurementId: e.value.measurementId
                        },
                        w = Le(m);
                    l.value = Te(w), s.value = !0, _(), f()
                } catch (m) {
                    console.error("[Firebase] init error:", m)
                }
            },
            _ = async () => {
                if (!s.value || !l.value) return console.warn("Firebase not init"), null;
                try {
                    if (i.value = !0, await Notification.requestPermission() !== "granted") return console.warn("not permission"), null;
                    const m = await Ae(l.value, {
                        vapidKey: e.value.keyPair
                    });
                    return localStorage.setItem("fireBaseToken", m), o.value = !0, m
                } catch (v) {
                    return console.error("[Firebase]  Token error:", v), null
                } finally {
                    i.value = !1
                }
            },
            f = () => {
                if (!l.value) {
                    console.warn("Firebase not init");
                    return
                }
                De(l.value, v => {
                    const {
                        title: m,
                        body: w,
                        image: S
                    } = v.notification || {};
                    navigator.serviceWorker && navigator.serviceWorker.controller && navigator.serviceWorker.controller.postMessage({
                        type: "SHOW_NOTIFICATION",
                        payload: {
                            title: m,
                            body: w,
                            image: S
                        }
                    }), m && w && (Pe({
                        type: "primary",
                        message: `${m}：
${w}`,
                        className: "firebase-notify-with-img",
                        duration: 3e3
                    }), document.documentElement.style.setProperty("--notify-icon", `url(${S})`))
                })
            };
        return R(e, async v => {
            v != null && v.projectId && (await Ce(), await g())
        }, {
            immediate: !0
        }), {
            requestPermissionAndToken: _,
            listenForeground: f,
            isLoading: i,
            isReady: o
        }
    },
    Ka = {
        class: "ar-loading-view"
    },
    qa = {
        class: "loading-wrapper"
    },
    Ya = {
        class: "com__box"
    },
    Ja = Be('<div class="loading" data-v-647954c7><div class="shape shape-1" data-v-647954c7></div><div class="shape shape-2" data-v-647954c7></div><div class="shape shape-3" data-v-647954c7></div><div class="shape shape-4" data-v-647954c7></div></div>', 1),
    Qa = {
        class: "skeleton-wrapper"
    },
    Xa = {
        class: "iosDialog"
    },
    Za = {
        class: "title"
    },
    es = {
        class: "websit_info"
    },
    ts = ["src"],
    as = {
        class: "link"
    },
    ss = {
        class: "text"
    },
    os = {
        class: "text"
    },
    ns = {
        class: "text"
    },
    is = ["src"],
    ls = V({
        __name: "LoadingView",
        props: {
            loading: {
                type: Boolean,
                required: !0
            },
            type: {
                type: String,
                required: !0
            },
            isGame: {
                type: Boolean,
                required: !0
            }
        },
        setup(a) {
            const e = a,
                s = y();
            let i = null;
            const {
                homeState: o,
                downloadIcon: l
            } = Ot(), g = Y(), {
                getSelfCustomerServiceLink: _
            } = Vt({
                ServerType: 2
            }), f = window.location.href, v = C(() => location.origin || ""), m = C(() => g.name === "game"), w = y(!1), S = Ft(() => le(() =>
                import ("./lottie_light-14303d2c.js").then(n => n.l), ["assets/js/lottie_light-14303d2c.js", "assets/js/common.modules-62343d57.js", "assets/css/common-e210f711.css"]));
            return H(async () => {
                if (f.includes("?")) {
                    const n = new URLSearchParams(f.split("?")[1]);
                    n.size && n.get("goTo") === "worktraking" && _("worktraking")
                }
                "serviceWorker" in navigator && navigator.serviceWorker.register("/firebase-messaging-sw.js").then(() => {
                    const {
                        listenForeground: n
                    } = Ma();
                    n()
                })
            }), R(() => e.loading, async () => {
                e.type === "loading" && !e.isGame && (!i && !w.value && (w.value = !0, i = (await S()).loadAnimation({
                    container: s.value,
                    renderer: "svg",
                    loop: !0,
                    autoplay: !0,
                    path: "/data.json"
                }), w.value = !1), e.loading ? i && i.play() : i && i.stop())
            }), ie(() => {
                i && i.destroy(), i = null
            }), (n, r) => {
                const I = A("VanSkeleton"),
                    h = A("svg-icon"),
                    d = A("van-popup");
                return p(), k(G, null, [P(t("div", Ka, [W(n.$slots, "template", {}, () => [P(t("div", qa, [$(" <VanLoading /> "), P(t("div", {
                    ref_key: "element",
                    ref: s,
                    class: "loading-animat"
                }, null, 512), [
                    [j, !n.isGame]
                ]), P(t("div", Ya, [$(" loading "), Ja, $(" 说明：组件名 ")], 512), [
                    [j, n.isGame]
                ]), $(' <div class="animation"></div> ')], 512), [
                    [j, n.type === "loading"]
                ]), P(t("div", Qa, [b(I, {
                    row: 10
                }), b(I, {
                    title: "",
                    avatar: "",
                    row: 5
                }), b(I, {
                    title: "",
                    row: 5
                })], 512), [
                    [j, n.type === "skeleton"]
                ])], !0)], 512), [
                    [j, n.loading && !m.value]
                ]), W(n.$slots, "default", {}, void 0, !0), b(d, {
                    show: u(o).iosDialog,
                    "onUpdate:show": r[0] || (r[0] = N => u(o).iosDialog = N),
                    round: "",
                    closeable: "",
                    position: "bottom",
                    style: {
                        height: "40%"
                    }
                }, {
                    default: T(() => [t("div", Xa, [t("div", Za, c(n.$t("pwaInstall")), 1), t("div", es, [t("img", {
                        class: "icon",
                        src: u(l)
                    }, null, 8, ts), t("div", as, [t("div", null, c(v.value.split("://")[1]), 1), t("div", null, c(v.value), 1)])]), t("div", ss, [F("1. " + c(n.$t("pwaText1")) + " ", 1), b(h, {
                        name: "share"
                    })]), t("div", os, [F("2. " + c(n.$t("pwaText2")) + " ", 1), t("span", null, [F(c(n.$t("pwaText3")) + " ", 1), b(h, {
                        name: "add_icon"
                    })])]), t("div", ns, [F("3. " + c(n.$t("pwaText4")) + " ", 1), t("img", {
                        class: "icon",
                        src: u(l)
                    }, null, 8, is)])])]),
                    _: 1
                }, 8, ["show"])], 64)
            }
        }
    });
const rs = B(ls, [
    ["__scopeId", "data-v-647954c7"],
    ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/common/LoadingView.vue"]
]);
const cs = ["xlink:href"],
    us = {
        __name: "svgIcons",
        props: {
            name: {
                type: String,
                required: !0
            },
            color: {
                type: String,
                default: ""
            }
        },
        setup(a) {
            const e = a,
                s = C(() => `#icon-${e.name}`),
                i = C(() => e.name ? `svg-icon icon-${e.name}` : "svg-icon");
            return (o, l) => (p(), k("svg", Ne({
                class: i.value
            }, o.$attrs, {
                style: {
                    color: a.color
                }
            }), [t("use", {
                "xlink:href": s.value
            }, null, 8, cs)], 16))
        }
    },
    ds = B(us, [
        ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/common/svgIcons.vue"]
    ]),
    vs = {
        class: "ar-searchbar__selector"
    },
    ms = {
        class: "ar-searchbar__selector-default"
    },
    _s = V({
        __name: "ArSelect",
        props: {
            selectName: {
                type: String,
                default: ""
            }
        },
        emits: ["click-select"],
        setup(a, {
            emit: e
        }) {
            const s = () => {
                e("click-select")
            };
            return (i, o) => {
                const l = A("van-icon");
                return p(), k("div", vs, [t("div", {
                    onClick: s
                }, [t("span", ms, c(u(Rt)(a.selectName)), 1), b(l, {
                    name: "arrow-down"
                })])])
            }
        }
    });
const ps = B(_s, [
    ["__scopeId", "data-v-fa757a88"],
    ["__file", "/usr/local/jenkins-prod/workspace/ar023-india-51game/src/components/common/ArSelect.vue"]
]);
Oe({
    duration: 3500,
    zIndex: 4e3
});
const gs = a => {
    a.component("NavBar", xa), a.component("LoadingView", rs), a.component("ArSelect", ps), a.component("svg-icon", ds), a.use(Ve).use(Fe).use(Re).use(Ee).use(Ue).use(je).use(We).use(Ge).use(He).use(ze).use(xe).use(Me).use(Ke).use(qe).use(Ye).use(Je).use(Qe).use(Xe).use(Ze).use(et).use(tt).use(at).use(st).use(ot).use(nt).use(it).use(lt).use(rt).use(ct).use(ut).use(dt).use(vt).use(mt).use(_t).use(pt).use(gt).use(ft).use(ue).use(Ua).use(ht).use(bt).use(yt);
    let e = a.config.globalProperties,
        s = {};
    s.TopHeight = 38, Object.keys(ae.refiter).forEach(i => {
        s[i] = ae.refiter[i]
    }), e.$u = s
};
({}).VITE_POINT && Et[{}.VITE_POINT]();
de.addRoute({
    path: "/",
    name: "home",
    component: () => le(() =>
        import ("./page-home-other-29946647.js").then(a => a.e), ["assets/js/page-home-other-29946647.js", "assets/js/common.modules-62343d57.js", "assets/css/common-e210f711.css", "assets/js/page-activity-ActivityDetail-f331937d.js", "assets/js/native/index-196b79e6.js", "assets/js/en-94a065ad.js", "assets/js/page-turntable-assets-d6267459.js", "assets/css/page-activity-ActivityDetail-a597c4a3.css", "assets/js/page-home-AllGames-cc81151b.js", "assets/css/page-home-AllGames-995c8a96.css", "assets/css/page-home-other-eb07065c.css"]),
    meta: {
        title: "home",
        tabBar: !0,
        keepAlive: !1
    }
});
const Z = wt(Ba),
    ve = kt();
gs(Z);
ve.use($t);
Z.use(de).use(ve);
Z.mount("#app");
//# sourceMappingURL=index-27bd5b4f.js.map