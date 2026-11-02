@extends('components.layout.app')

@section('title', 'Coming Soon — ' . config('company.name'))

@section('content')

<style>
/* CSS KHUSUS UNTUK HALAMAN INI */
.coming-page {
  box-sizing: border-box;
  --orange: #FF6A13;
  --orange-deep: #D9520A;
  --peach: #FFE3CF;
  --ink: #2B1A10;
  --muted: #7A6657;
  --line: #EFE3D9;
  --serif: "Instrument Serif", "Iowan Old Style", Georgia, serif;
  --sans: "Manrope", "Segoe UI", system-ui, -apple-system, Arial, sans-serif;
  font-family: var(--sans);
  color: var(--ink);
  background: #fff;
  min-height: calc(100vh - 88px);
}
.coming-page *, .coming-page *::before, .coming-page *::after { box-sizing: inherit; }

.coming-page main {
  max-width: 1180px;
  margin: 0 auto;
  padding: clamp(20px, 4vw, 48px);
  display: grid;
  grid-template-columns: 1.1fr 1fr;
  align-items: center;
  gap: clamp(8px, 4vw, 72px);
}

.coming-page .stage { width: 100%; max-width: 620px; justify-self: center; }
.coming-page .stage svg { width: 100%; height: auto; display: block; overflow: visible; }

.coming-page .copy { display: flex; flex-direction: column; gap: 24px; max-width: 460px; }

/* JUDUL DIPERKECIL */
.coming-page h1 { margin: 0; font-family: var(--serif); font-weight: 400; font-size: clamp(2rem, 4vw, 3rem); line-height: 1.1; letter-spacing: -.02em; }

/* TEKS DIPERKECIL */
.coming-page .lead { margin: 0; color: var(--muted); font-size: 0.95rem; line-height: 1.6; max-width: 42ch; }

.coming-page .progress { display: flex; flex-direction: column; gap: 8px; }
.coming-page .progress .row { display: flex; justify-content: space-between; font-size: 0.85rem; color: var(--muted); }
.coming-page .progress .row b { color: var(--ink); font-weight: 600; }
.coming-page .bar { height: 6px; border-radius: 6px; background: var(--line); overflow: hidden; }
.coming-page .bar span { display: block; height: 100%; width: 0; border-radius: 6px; background: var(--orange); transition: width 1.8s cubic-bezier(.2,.8,.2,1) 1.2s; }

/* COUNTDOWN KOTAK HITAM MINIMALIS */
.coming-page .count { display: flex; gap: 10px; flex-wrap: wrap; }
.coming-page .count div {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2px;
  background: #111111;
  padding: 12px 16px;
  border-radius: 8px; /* Sudut kotak sedikit lebih tegas */
  min-width: 75px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.coming-page .count b {
  font-family: var(--serif);
  font-weight: 400;
  font-size: 1.8rem;
  line-height: 1;
  font-variant-numeric: tabular-nums;
  color: #ffffff;
}
.coming-page .count span {
  font-size: 0.65rem;
  color: #a3a3a3;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.coming-page form { display: flex; gap: 10px; flex-wrap: wrap; }
.coming-page label { position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0); }

/* INPUT & BUTTON RADIUS DIPERKECIL (MINIMALIS) */
.coming-page input {
  flex: 1 1 200px;
  min-height: 48px;
  padding: 0 16px;
  border: 1px solid var(--line);
  border-radius: 8px; /* Dari 999px menjadi 8px */
  font: inherit;
  font-size: 0.9rem;
  color: var(--ink);
  background: #fff;
  outline: none;
}
.coming-page input:focus { border-color: var(--orange); }
.coming-page button {
  min-height: 48px;
  padding: 0 24px;
  border: 0;
  border-radius: 8px; /* Dari 999px menjadi 8px */
  background: var(--orange);
  color: #fff;
  font: inherit;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: background .2s, transform .15s;
}
.coming-page button:hover { background: var(--orange-deep); }
.coming-page button:active { transform: scale(.98); }
.coming-page .msg { flex-basis: 100%; min-height: 1.4em; margin: 0; font-size: 0.85rem; color: var(--orange-deep); }
.coming-page .msg.err { color: #B42318; }

.coming-page .pop { opacity: 0; animation: pop 0.9s cubic-bezier(0.2, 0.8, 0.25, 1) forwards; }
@keyframes pop { from { opacity: 0; transform: translateY(-34px); } to { opacity: 1; transform: none; } }
.coming-page .sway { animation: sway 5s ease-in-out 2.4s infinite; }
@keyframes sway { 50% { transform: translateY(7px); } }

@media (max-width: 860px) {
  .coming-page main { grid-template-columns: 1fr; padding-top: 40px; gap: 40px; }
  .coming-page .copy { max-width: none; text-align: center; align-items: center; }
  .coming-page .stage { max-width: 400px; }
  .coming-page .count { justify-content: center; }
  .coming-page form { flex-direction: column; width: 100%; max-width: 300px; margin: 0 auto; }
  .coming-page input, .coming-page button { width: 100%; }
}
</style>

<div class="coming-page">
  <main>
    <section class="stage" aria-label="3D illustration of a house under construction with a crane">
      <svg viewBox="0 0 600 540" role="img" aria-hidden="true">
        <defs><filter id="bl"><feGaussianBlur stdDeviation="12"/></filter></defs>
        <ellipse cx="300" cy="470" rx="230" ry="42" fill="#8a4a1f" opacity=".16" filter="url(#bl)"/>
        <g id="world"></g>
      </svg>
    </section>

    <section class="copy">
      <h1>Coming Soon</h1>
      <p class="lead">We are currently working on this page. Leave your email and we'll notify you once it's ready.</p>

      <div class="progress">
        <div class="row"><span>Development Progress</span><b>72%</b></div>
        <div class="bar" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" aria-label="Development Progress"><span id="fill"></span></div>
      </div>

      <div class="count" role="timer" aria-label="Launch countdown">
        <div><b id="d">00</b><span>Days</span></div>
        <div><b id="h">00</b><span>Hours</span></div>
        <div><b id="m">00</b><span>Mins</span></div>
        <div><b id="s">00</b><span>Secs</span></div>
      </div>

      <form id="f" novalidate>
        <label for="e">Email</label>
        <input id="e" type="email" placeholder="you@email.com" autocomplete="email" required>
        <button type="submit">Notify Me</button>
        <p class="msg" id="msg" role="status" aria-live="polite"></p>
      </form>
    </section>
  </main>
</div>

<script>
(function(){
  var NS="http://www.w3.org/2000/svg",U=34,OX=300,OY=215;
  function P(x,y,z){return [(OX+(x-y)*0.866*U).toFixed(1),(OY+(x+y)*0.5*U-z*U).toFixed(1)]}
  function quad(g,pts,fill){
    var p=document.createElementNS(NS,"polygon");
    p.setAttribute("points",pts.map(function(q){return P(q[0],q[1],q[2]).join(",")}).join(" "));
    p.setAttribute("fill",fill);p.setAttribute("stroke",fill);p.setAttribute("stroke-width",".7");p.setAttribute("stroke-linejoin","round");
    g.appendChild(p);
  }
  function box(g,x,y,z,dx,dy,dz,c){
    quad(g,[[x,y+dy,z],[x+dx,y+dy,z],[x+dx,y+dy,z+dz],[x,y+dy,z+dz]],c[1]);
    quad(g,[[x+dx,y,z],[x+dx,y+dy,z],[x+dx,y+dy,z+dz],[x+dx,y,z+dz]],c[2]);
    quad(g,[[x,y,z+dz],[x+dx,y,z+dz],[x+dx,y+dy,z+dz],[x,y+dy,z+dz]],c[0]);
  }
  var world=document.getElementById("world"),delay=0;
  function group(cls){var g=document.createElementNS(NS,"g");g.setAttribute("class",cls||"pop");g.style.animationDelay=(delay)+"s";world.appendChild(g);delay+=0.18;return g}

  var GREY=["#FBF7F3","#EFE6DD","#E0D4C8"],
      PEACH=["#FFEBDB","#FFD3B0","#F5B98C"],
      OR=["#FF9A55","#FF6A13","#D9520A"],
      INK=["#6B5040","#43301F","#2E1F14"];

  var g=group();box(g,0,0,0,8,8,.4,GREY);
  g=group();box(g,1,1,.4,6,6,.25,OR);
  g=group();
  box(g,1,1,.65,6,.35,3,PEACH);
  box(g,1,1.35,.65,.35,5.65,2,PEACH);
  quad(g,[[2.1,1.35,1.6],[3.5,1.35,1.6],[3.5,1.35,3.0],[2.1,1.35,3.0]],"#FFFFFF");
  quad(g,[[4.4,1.35,1.6],[5.8,1.35,1.6],[5.8,1.35,3.0],[4.4,1.35,3.0]],"#FFFFFF");
  quad(g,[[1.35,3.2,1.5],[1.35,4.6,1.5],[1.35,4.6,1.5],[1.35,3.2,1.5]],"#FFFFFF");
  g=group();
  box(g,7.4,1.4,.4,.45,.45,6.4,INK);
  box(g,2.6,1.45,6.5,5.3,.35,.3,INK);
  box(g,6.9,1.35,5.9,.6,.55,.6,OR);
  g=group("pop sway");
  box(g,3.6,1.62,4.55,.08,.08,1.95,INK);
  box(g,2.9,1.1,4.05,1.5,1.2,.5,OR);
  box(g,2.9,1.1,4.55,1.5,1.2,.08,INK);
  g=group();
  box(g,6.65,1.2,.65,.3,.3,3,OR);box(g,1.2,6.65,.65,.3,.3,3,OR);
  box(g,6.65,3.9,.65,.3,.3,3,OR);box(g,3.9,6.65,.65,.3,.3,3,OR);
  box(g,6.65,6.65,.65,.3,.3,3,OR);
  g=group();
  box(g,6.65,1.2,3.65,.3,5.75,.22,OR);box(g,1.2,6.65,3.65,5.75,.3,.22,OR);
  g=group();
  box(g,7.1,4.6,.4,.7,.7,.2,PEACH);box(g,7.15,4.65,.6,.6,.6,.2,OR);box(g,7.1,5.7,.4,.7,.7,.2,OR);

  setTimeout(function(){document.getElementById("fill").style.width="72%"},50);

  var target=new Date("2026-11-17T09:00:00+07:00").getTime();

  function pad(n){return String(n).padStart(2,"0")}
  function tick(){
    var s=Math.floor(Math.max(0,target-Date.now())/1000);
    document.getElementById("d").textContent=pad(Math.floor(s/86400));
    document.getElementById("h").textContent=pad(Math.floor(s%86400/3600));
    document.getElementById("m").textContent=pad(Math.floor(s%3600/60));
    document.getElementById("s").textContent=pad(s%60);
  }
  tick();setInterval(tick,1000);

  var f=document.getElementById("f"),msg=document.getElementById("msg"),e=document.getElementById("e");
  f.addEventListener("submit",function(ev){
    ev.preventDefault();
    var ok=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e.value.trim());
    msg.className="msg"+(ok?"":" err");
    msg.textContent=ok?"Thank you! We'll notify you when this page is live.":"Invalid email. Example: you@email.com";
    if(!ok)e.focus();else f.reset();
  });
})();
</script>

@endsection
