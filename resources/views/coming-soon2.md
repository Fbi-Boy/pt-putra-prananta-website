@extends('components.layout.app')

@section('title', 'Segera Hadir — ' . config('company.name'))

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=Manrope:wght@400;500;600&display=swap" rel="stylesheet">
@endpush

@section('content')

<style>
/* SCOPE CSS */
.page-v2 {
  box-sizing: border-box;
  --ink: #2B1A10;
  --muted: #6F5D50;
  --line: #E6DCD0;
  --stone: #F2ECE4;
  --orange: #FF6A13;
  --orange-deep: #C94A06;
  --err: #B42318;
  --serif: "Instrument Serif", "Iowan Old Style", Georgia, serif;
  --sans: "Manrope", "Segoe UI", system-ui, -apple-system, Arial, sans-serif;
  font-family: var(--sans);
  color: var(--ink);
  background: #fff;
  min-height: calc(100vh - 88px);
}
.page-v2 *, .page-v2 *::before, .page-v2 *::after { box-sizing: inherit; }

.page-v2 .v2-layout {
  display: grid;
  grid-template-columns: 52fr 48fr; /* Proporsi kolom disesuaikan sedikit */
  min-height: calc(100vh - 88px);
}

/* KIRI: ILUSTRASI (DIPERKECIL) */
.page-v2 .v2-art {
  position: relative;
  background: var(--stone);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: clamp(20px, 3vw, 40px);
  overflow: hidden;
}
.page-v2 .v2-art::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  mix-blend-mode: multiply;
  opacity: 0.55;
  background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 .35 0 0 0 0 .25 0 0 0 0 .15 0 0 0 .6 0'/></filter><rect width='100%' height='100%' filter='url(%23n)' opacity='.35'/></svg>");
}
.page-v2 .v2-art svg {
  width: 100%;
  height: 100%;
  max-height: 65vh; /* Dibatasi agar tidak terlalu raksasa */
  max-width: 500px; /* Batas lebar gambar */
  display: block;
  position: relative;
  z-index: 1;
}

/* ANIMASI SVG */
.page-v2 .d { fill: none; stroke: var(--ink); stroke-width: 1.5; stroke-dasharray: 1; stroke-dashoffset: 1; animation: draw 1.5s cubic-bezier(.5,0,.2,1) forwards; animation-delay: var(--d, 0s); }
.page-v2 .f { opacity: 0; animation: fade 0.9s ease forwards; animation-delay: calc(var(--d, 0s) + 0.5s); }
@keyframes draw { to { stroke-dashoffset: 0; } }
@keyframes fade { to { opacity: 1; } }
.page-v2 .sway { transform-origin: 400px 128px; animation: sway 6s ease-in-out infinite alternate; }
@keyframes sway { from { transform: rotate(-1.6deg); } to { transform: rotate(1.6deg); } }
.page-v2 .dim text { font: 500 11px var(--sans); letter-spacing: .06em; fill: var(--muted); }

/* KANAN: KONTEN (DIPERKECIL) */
.page-v2 .v2-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 24px; /* Gap dikurangi */
  padding: clamp(24px, 4vw, 56px) clamp(24px, 5vw, 64px);
}

.page-v2 .v2-main { display: flex; flex-direction: column; gap: 20px; max-width: 460px; }

/* UKURAN FONT DIPERKECIL */
.page-v2 h1 { margin: 0; font-family: var(--serif); font-weight: 400; font-size: clamp(2.2rem, 3.5vw, 3.2rem); line-height: 1.05; letter-spacing: -.02em; }
.page-v2 .sub { margin: -8px 0 0; font-size: 1rem; font-weight: 500; color: var(--orange-deep); }
.page-v2 .desc { margin: 0; color: var(--muted); font-size: 0.9rem; line-height: 1.6; max-width: 40ch; }

/* PROGRESS BAR */
.page-v2 .progress { display: flex; flex-direction: column; gap: 6px; margin-top: 4px; }
.page-v2 .progress .row { display: flex; justify-content: space-between; font-size: 0.75rem; color: var(--muted); }
.page-v2 .progress .row b { color: var(--ink); font-weight: 600; }
.page-v2 .bar { height: 4px; border-radius: 4px; background: var(--line); overflow: hidden; }
.page-v2 .bar span { display: block; height: 100%; width: 0; border-radius: 4px; background: var(--orange); transition: width 1.8s cubic-bezier(.2,.8,.2,1) 1.2s; }

/* COUNTDOWN (DIPERKECIL) */
.page-v2 .count { display: grid; grid-template-columns: repeat(4, 1fr); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); }
.page-v2 .count div { padding: 12px 0 10px 12px; border-left: 1px solid var(--line); display: flex; flex-direction: column; gap: 2px; }
.page-v2 .count div:first-child { border-left: 0; padding-left: 0; }
.page-v2 .count b { font-family: var(--serif); font-weight: 400; font-size: clamp(1.6rem, 2.5vw, 2.2rem); line-height: 1; font-variant-numeric: tabular-nums; }
.page-v2 .count span { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.5px; }

/* FORM (DIPERKECIL) */
.page-v2 .signup { display: grid; }
.page-v2 .signup > * { grid-area: 1/1; transition: opacity .5s ease, transform .5s ease, visibility .5s; }
.page-v2 form { display: flex; flex-direction: column; gap: 8px; }
.page-v2 .row { display: flex; gap: 10px; align-items: flex-end; }
.page-v2 .field { position: relative; flex: 1; min-width: 0; }
.page-v2 label { position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0); }
.page-v2 input { width: 100%; min-height: 44px; padding: 0; border: 0; border-bottom: 1px solid var(--ink); background: transparent; font: inherit; font-size: 0.85rem; color: var(--ink); border-radius: 0; }
.page-v2 input::placeholder { color: #A8978A; }
.page-v2 input:focus { outline: none; }
.page-v2 .field::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0; height: 2px; background: var(--orange); transform: scaleX(0); transform-origin: left; transition: transform .4s ease; }
.page-v2 .field:focus-within::after { transform: scaleX(1); }
.page-v2 .field.bad { animation: nudge .4s; }
.page-v2 .field.bad input { border-bottom-color: var(--err); }
@keyframes nudge { 25% { transform: translateX(-4px); } 75% { transform: translateX(4px); } }

.page-v2 button { min-height: 44px; padding: 0 20px; border: 0; background: var(--ink); color: #fff; font: inherit; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: background .25s, transform .15s; }
.page-v2 button:hover { background: var(--orange-deep); }
.page-v2 button:active { transform: scale(.98); }
.page-v2 button:focus-visible { outline: 2px solid var(--orange); outline-offset: 2px; }
.page-v2 .err { min-height: 1.2em; margin: 0; font-size: 0.75rem; color: var(--err); }

.page-v2 .ok { display: flex; flex-direction: column; gap: 6px; opacity: 0; visibility: hidden; transform: translateY(6px); }
.page-v2 .ok h2 { margin: 0; font-family: var(--serif); font-weight: 400; font-size: 1.4rem; }
.page-v2 .ok p { margin: 0; color: var(--muted); font-size: 0.85rem; line-height: 1.5; }
.page-v2 .ok button { align-self: flex-start; min-height: 0; padding: 0; background: none; color: var(--ink); text-decoration: underline; text-underline-offset: 3px; font-weight: 500; font-size: 0.8rem; }
.page-v2 .ok button:hover { background: none; color: var(--orange-deep); }
.page-v2 .ok svg { width: 20px; height: 20px; stroke: var(--orange); fill: none; stroke-width: 2; }
.page-v2 .signup.done form { opacity: 0; visibility: hidden; transform: translateY(-6px); }
.page-v2 .signup.done .ok { opacity: 1; visibility: visible; transform: none; }
.page-v2 .foot { margin: 0; font-size: 0.75rem; color: var(--muted); }

.page-v2 .rise { opacity: 0; transform: translateY(10px); animation: rise .9s cubic-bezier(.2,.7,.2,1) forwards; animation-delay: calc(.3s + var(--i)*.08s); }
@keyframes rise { to { opacity: 1; transform: none; } }

@media (max-width: 980px) {
  .page-v2 .v2-layout { grid-template-columns: 1fr; }
  .page-v2 .v2-art { padding: 20px 20px 0; }
  .page-v2 .v2-art svg { max-height: 40vh; }
  .page-v2 .v2-content { gap: 24px; padding: 24px 20px calc(24px + env(safe-area-inset-bottom, 0px)); }
  .page-v2 .v2-main { max-width: none; }
}
@media (max-width: 420px) {
  .page-v2 .row { flex-direction: column; align-items: stretch; }
  .page-v2 button { width: 100%; margin-top: 8px; }
  .page-v2 .count div { padding-left: 8px; }
}
@media (prefers-reduced-motion: reduce) {
  .page-v2 .d { animation: none; stroke-dashoffset: 0; }
  .page-v2 .f, .page-v2 .rise { animation: none; opacity: 1; transform: none; }
  .page-v2 .sway { animation: none; }
  .page-v2 .field::after, .page-v2 .signup > * { transition: none; }
}
</style>

<div class="page-v2">
  <div class="v2-layout">
    {{-- KIRI: ILUSTRASI SVG --}}
    <section class="v2-art" aria-label="Architectural elevation drawing">
      <svg viewBox="0 0 800 850" preserveAspectRatio="xMidYMid meet" role="img" aria-hidden="true">
        <defs>
          <pattern id="g" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M40 0H0V40" fill="none" stroke="#E2D6C8" stroke-width=".6"/></pattern>
          <pattern id="h" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M0 10L10 0" stroke="#B9A892" stroke-width=".8"/></pattern>
          <pattern id="b" width="24" height="12" patternUnits="userSpaceOnUse"><rect width="24" height="12" fill="#F6E9D9"/><path d="M0 0H24M0 6H24M0 12H24M0 0V6M12 6V12" stroke="#C9B8A5" stroke-width=".7" fill="none"/></pattern>
        </defs>
        <rect width="800" height="850" fill="url(#g)"/>
        <g id="draw"></g>
        <g class="dim f" style="--d:2.4s">
          <text x="340" y="824" text-anchor="middle">12.40 m</text>
          <text x="120" y="503" text-anchor="middle" transform="rotate(-90 120 503)">7.20 m</text>
        </g>
      </svg>
    </section>

    {{-- KANAN: KONTEN --}}
    <section class="v2-content">
      <div class="v2-main">
        <h1 class="rise" style="--i:1">Something Great Is Taking Shape.</h1>
        <p class="sub rise" style="--i:2">We’re Building Something New.</p>
        <p class="desc rise" style="--i:3">We are preparing to introduce a new digital experience. Leave your email and be the first to step inside.</p>

        <div class="progress rise" style="--i:4">
          <div class="row"><span>Development Progress</span><b>72%</b></div>
          <div class="bar" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"><span id="fill"></span></div>
        </div>

        <div class="count rise" style="--i:5" role="timer" aria-label="Time until launch">
          <div><b id="d">00</b><span>Days</span></div>
          <div><b id="h">00</b><span>Hours</span></div>
          <div><b id="m">00</b><span>Mins</span></div>
          <div><b id="s">00</b><span>Secs</span></div>
        </div>

        <div class="signup rise" style="--i:6" id="signup">
          <form id="f" novalidate>
            <div class="row">
              <div class="field" id="field">
                <label for="e">Email address</label>
                <input id="e" type="email" placeholder="Enter your email address" autocomplete="email" required aria-describedby="err">
              </div>
              <button type="submit">Notify Me</button>
            </div>
            <p class="err" id="err" role="alert"></p>
          </form>
          <div class="ok" id="ok" role="status" aria-live="polite">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12.5l5 5L20 6.5" stroke-linecap="square"/></svg>
            <h2>You’re on the list.</h2>
            <p>We’ll write to <span id="who"></span> the moment we open.</p>
            <button type="button" id="again">Use a different email</button>
          </div>
        </div>
      </div>
      <p class="foot rise" style="--i:7">Stay connected. Something exciting is coming.</p>
    </section>
  </div>
</div>

@push('scripts')
<script>
(function(){
  // 1. Animasi SVG Rumah
  var NS="http://www.w3.org/2000/svg",g=document.getElementById("draw"),INK="#2B1A10",OR="#FF6A13",SL="#CDBFAF";
  function mk(d,cls,t,to){var p=document.createElementNS(NS,"path");p.setAttribute("d",d);p.setAttribute("class",cls);p.style.setProperty("--d",t+"s");(to||g).appendChild(p);return p}
  function P(d,t,o,to){var p=mk(d,"d",t,to);p.setAttribute("pathLength","1");if(o){if(o.w)p.style.strokeWidth=o.w;if(o.round)p.style.strokeLinecap="round"}return p}
  function F(d,c,t,to){var p=mk(d,"f",t,to);p.style.fill=c;return p}
  function S(d,c,t,o){F(d,c,t);P(d,t,o)}

  F("M40 740H760V768H40Z","url(#h)",.3);P("M40 740H760",.1,{w:2.2});
  S("M180 740V712H500V740Z",SL,.4);
  S("M190 712V540H340V712Z","url(#b)",.6);
  S("M208 584h44v66h-44Z","#fff",.8,{w:1.2});S("M278 584h44v66h-44Z","#fff",.8,{w:1.2});
  F("M202 650h56v6h-56Z",OR,.9);F("M272 650h56v6h-56Z",OR,.9);
  P("M340 712V540M415 712V540M490 712V540",.9);
  S("M180 540V526H500V540Z",SL,1.0);
  S("M190 526V446H340V526Z","url(#b)",1.2);
  P("M190 526V380M265 526V380M340 526V380M415 526V380M490 526V380",1.3);
  P("M340 526L415 380M415 526L490 380",1.4,{w:1});
  S("M180 380V366H500V380Z",SL,1.5);
  P("M180 366L340 266L500 366",1.7,{w:2.5});
  P("M340 266V366M258 366L340 316L422 366M219 366L340 291M461 366L340 291",1.8,{w:1.1});
  F("M166 368L340 259V278L180 378Z",OR,2.0);

  var ys=[740,640,540,440,340],xs=[520,580,640],i;
  xs.forEach(function(x){P("M"+x+" 740V340",1.3,{w:1.4})});
  ys.slice(0,4).forEach(function(y,k){
    S("M520 "+y+"H640V"+(y+6)+"H520Z",SL,1.4+k*.1,{w:1});
    P("M520 "+(y-34)+"H640",1.5+k*.1,{w:1});
    P("M520 "+y+"L580 "+ys[k+1]+(k%2?"":"M580 "+y+"L640 "+ys[k+1]),1.6+k*.1,{w:.9});
  });
  S("M520 340H640V346H520Z",SL,1.9,{w:1});

  P("M670 740V104M710 740V104",1.9,{w:2});
  var lat="",up=0;for(var y=740;y>120;y-=40){lat+="M670 "+y+"H710M"+(up?710:670)+" "+y+"L"+(up?670:710)+" "+(y-40);up^=1}
  P(lat,2.0,{w:1});
  S("M650 740V728H730V740Z",SL,2.0);
  P("M250 104H770M250 124H770",2.2,{w:1.8});
  var zz="M250 124";for(var x=250;x<770;x+=26)zz+="L"+(x+13)+" 104L"+(x+26)+" 124";
  P(zz,2.3,{w:.9});
  P("M670 104L690 54L710 104",2.3,{w:1.8});
  P("M690 54L250 104M690 54L770 104",2.4,{w:.8});
  S("M742 124h30v40h-30Z",SL,2.4);S("M705 124h24v22h-24Z","#fff",2.4,{w:1.2});
  F("M392 124h16v8h-16Z",INK,2.5);

  var sw=document.createElementNS(NS,"g");sw.setAttribute("class","sway");g.appendChild(sw);
  P("M400 132V330",2.6,{w:1},sw);
  P("M400 330V338M400 338L370 372M400 338L430 372",2.7,{w:1},sw);
  F("M364 372h72v12h-72Z",OR,2.8,sw);P("M364 372h72v12h-72Z",2.8,{w:1.2},sw);
  P("M376 384V396M400 384V396M424 384V396",2.9,{w:1},sw);

  S("M60 740V724H120V740Z","url(#b)",1.0,{w:1});S("M70 724V708H110V724Z","url(#b)",1.1,{w:1});

  function W(x,y,t){
    P("M"+x+" "+(y-14)+"V"+(y-30),t,{w:5,round:1});
    P("M"+x+" "+(y-14)+"L"+(x-5)+" "+y+"M"+x+" "+(y-14)+"L"+(x+5)+" "+y,t,{w:2.5,round:1});
    P("M"+x+" "+(y-27)+"L"+(x+12)+" "+(y-33),t,{w:2.5,round:1});
    F("M"+(x-5)+" "+(y-37)+"a5 5 0 1 0 10 0a5 5 0 1 0 -10 0",INK,t+.2);
    F("M"+(x-7)+" "+(y-39)+"a7 6 0 0 1 14 0Z",OR,t+.2);
  }
  W(550,540,2.9);W(610,440,3.0);W(150,740,3.1);

  // 2. Progress Bar
  setTimeout(function(){
    var fill = document.getElementById("fill");
    if(fill) fill.style.width = "72%";
  }, 50);

  // 3. Hitung Mundur
  var target=new Date("2026-12-01T09:00:00+07:00").getTime();
  function pad(n){return String(n).padStart(2,"0")}
  function tick(){
    var s=Math.floor(Math.max(0,target-Date.now())/1000);
    document.getElementById("d").textContent=pad(Math.floor(s/86400));
    document.getElementById("h").textContent=pad(Math.floor(s%86400/3600));
    document.getElementById("m").textContent=pad(Math.floor(s%3600/60));
    document.getElementById("s").textContent=pad(s%60);
  }
  tick(); setInterval(tick,1000);

  // 4. Form
  var f=document.getElementById("f"),e=document.getElementById("e"),err=document.getElementById("err"),
      field=document.getElementById("field"),box=document.getElementById("signup"),who=document.getElementById("who");

  function done(v){who.textContent=v;box.classList.add("done")}
  try{var saved=localStorage.getItem("launch-email");if(saved)done(saved)}catch(x){}

  e.addEventListener("input",function(){err.textContent="";field.classList.remove("bad")});
  f.addEventListener("submit",function(ev){
    ev.preventDefault();var v=e.value.trim();
    if(!v){err.textContent="Please enter your email address.";bad();return}
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)){err.textContent="That doesn’t look like a valid email. Try name@example.com.";bad();return}
    try{localStorage.setItem("launch-email",v)}catch(x){}
    done(v);f.reset();
  });
  function bad(){field.classList.remove("bad");void field.offsetWidth;field.classList.add("bad");e.focus()}

  document.getElementById("again").addEventListener("click",function(){
    try{localStorage.removeItem("launch-email")}catch(x){}
    box.classList.remove("done");e.focus();
  });
})();
</script>
@endpush

@endsection
