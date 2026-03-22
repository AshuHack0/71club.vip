import{r as c,A as N,D as j,P as H,$ as D,Z as Q,aP as q,J as i,aQ as y,N as F,Q as I,R as E,at as O,au as J,ap as S,aj as k,an as X,W as b,T as p,Y as x,av as Y,X as Z,H as A,aR as M}from"./common.modules-62343d57.js";import{G as K,aP as ee,aQ as L,aR as ae,aS as te,c as ne,_ as se}from"./page-activity-ActivityDetail-f331937d.js";import"./native/index-196b79e6.js";import"./en-94a065ad.js";import"./page-turntable-assets-d6267459.js";function oe(R,u,w={immediate:!1}){const n=c(!1);let e=null;const o=()=>{const r=`
      let intervalId = null;
      self.onmessage = (e) => {
        const { command, interval } = e.data;

        switch (command) {
          case 'start':
            if (!intervalId) {
              intervalId = setInterval(() => postMessage('tick'), interval);
            }
            break;
          case 'pause':
            clearInterval(intervalId);
            intervalId = null;
            break;
        }
      };
    `,m=new Blob([r],{type:"application/javascript"});return new Worker(URL.createObjectURL(m))},s=()=>{e&&(n.value=!0,e.postMessage({command:"start",interval:u}))},d=()=>{e&&(n.value=!1,e.postMessage({command:"pause"}))},g=()=>{n.value||s()};return N(()=>{e=o(),e.onmessage=r=>{r.data==="tick"&&R()},w.immediate&&s()}),j(()=>{d(),e==null||e.terminate(),e=null}),{start:s,pause:d,resume:g,isActive:n}}const re={class:"game-right"},le={class:"game-text"},ie=["src"],ce=H({__name:"index",setup(R){const u=D(),w=K(),n=c(null),e=c(!1),o=Q(),{css:s,load:d,unload:g}=q(""),{getSelfCustomerServiceLink:r}=ee({ServerType:2}),m=c(0),P=i(()=>{if(!L)return{};if(!e)return{height:`${window.innerHeight}px`}}),C=i(()=>{const a=u.query.url;if(!a)return"";const t=ae(a||"");return t.startsWith("https:")?t:`data:text/html;charset=utf-8,${encodeURIComponent(t)}`}),v=i(()=>{const a=u.query.vendorCode;return a||""}),G=i(()=>!L&&!["PG"].includes(v.value));i(()=>e.value?!1:!["ARLottery"].includes(v.value));function _(){L&&setTimeout(()=>{window.matchMedia("(orientation: landscape)").matches?(s.value=`
            	    body #app { width: 100%; }
            	`,e.value=!0,document.documentElement.classList.add("landscape")):(s.value="",e.value=!1,document.documentElement.classList.remove("landscape"))},10)}y(window,"resize",_),y(window,"orientationchange",_),y(window,"message",a=>{a.data==="game"&&o.go(-1)});const l=c(null),T=()=>{f()},f=()=>{document.documentElement.style.setProperty("--vh",`${window.innerHeight*.01}px`)},$=()=>{const a=o.resolve({name:"wallet"});window.open(a.href,"_blank")};async function B(){try{const a=await te();a.code===0&&(m.value=a.data.balance)}catch{}}const z=async()=>{w.notifyARGame(!0),o.push({name:"home"})},{pause:U}=oe(()=>{B()},1e3*12,{immediate:!0});return N(async()=>{_(),d(),f(),window.addEventListener("resize",f),setTimeout(()=>{B()},2e3)}),F(()=>{g(),U(),window.removeEventListener("resize",f),document.documentElement.classList.remove("landscape"),l.value&&(l.value.src="about:blank",l.value.remove(),l.value=null)}),(a,t)=>{const h=I("svg-icon"),V=I("NavBar");return G.value?k("v-if",!0):(b(),E("div",{key:0,class:"game-iframe",ref_key:"fullscreenElement",ref:n,style:X({height:P.value})},[["ARLottery"].includes(v.value)?k("v-if",!0):(b(),O(V,{key:0,class:S({"landscape-nav":e.value}),"left-arrow":"",onClickLeft:z},{right:J(()=>[p("div",re,[p("span",le,[x(h,{name:"game_moneyb"}),Y(" "+Z(A(ne)(m.value)),1)]),p("span",{class:"game-icon",onClick:t[0]||(t[0]=M(W=>$(),["stop"]))},[x(h,{name:"icon_addwallet"})]),p("span",{class:"game-icon",onClick:t[1]||(t[1]=M(W=>A(r)(),["stop"]))},[x(h,{name:"icon_customer3"})])])]),_:1},8,["class"])),C.value?(b(),E("iframe",{key:1,class:S({lotteryfull:["ARLottery"].includes(v.value),landscape:e.value}),sandbox:"allow-forms allow-orientation-lock allow-scripts allow-same-origin allow-top-navigation allow-popups",allowfullscreen:"true",ref_key:"iframeRef",ref:l,src:C.value,onLoad:T},null,42,ie)):k("v-if",!0)],4))}}});const pe=se(ce,[["__scopeId","data-v-bc67dde2"],["__file","/usr/local/jenkins-prod/workspace/ar023-india-51game/src/views/home/game/index.vue"]]);export{pe as default};
//# sourceMappingURL=page-home-game-a6d6e050.js.map
