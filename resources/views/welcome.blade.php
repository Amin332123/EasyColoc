    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Easy Coloc – Home</title>
 <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>

*, *::before, *::after {
    box-sizing: border-box; margin: 0; padding: 0;
}

:root {
    --teal-dark: #006d77;
    --teal-mid: #83c5be;
    --teal-light: #edf6f9;
    --white: #ffffff;
    --text: #1a2e31;
    --muted: #5a7c80;
}

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--teal-light);
    color: var(--text);
}

/* ─── Layout ─── */
header {
    background: var(--white);
    box-shadow: 0 2px 10px rgba(0,109,119,.1);
    position: sticky; top: 0; z-index: 100;
}

.header-inner, .footer-inner {
    max-width: 1100px; margin: 0 auto; padding: 0 32px;
}

.header-inner {
    height: 64px; display: flex; align-items: center; justify-content: space-between;
}

.logo {
    font-family: 'DM Serif Display', serif;
    font-size: 1.45rem; color: var(--teal-dark); text-decoration: none; font-weight: 600;
}

/* ─── Navigation ─── */
nav { display: flex; gap: 32px; align-items: center; }
nav a { 
    font-size: .92rem; font-weight: 500; color: var(--muted); text-decoration: none; 
}
nav a:hover { color: var(--teal-dark); }
.btn-nav { 
    background: var(--teal-dark); color: var(--white) !important; 
    padding: 9px 22px; border-radius: 8px; font-weight: 600; 
}
.btn-nav:hover { background: #005960; }

/* ─── Hero ─── */
.hero {
    max-width: 1100px; margin: 0 auto; padding: 110px 32px 90px;
    display: flex; flex-direction: column; align-items: flex-start; gap: 20px;
}

.hero-tag {
    background: var(--teal-mid); color: var(--teal-dark); font-size: .78rem; 
    font-weight: 600; letter-spacing: .07em; padding: 5px 14px; 
    border-radius: 20px; text-transform: uppercase; display: inline-block;
}

.hero h1 {
    font-family: 'DM Serif Display', serif; font-size: 3.6rem; line-height: 1.15; 
    color: var(--teal-dark); max-width: 700px;
}

.hero p { font-size: 1.08rem; line-height: 1.72; color: var(--muted); max-width: 520px; }

/* ─── Buttons ─── */
.hero-actions { display: flex; gap: 14px; flex-wrap: wrap; margin-top: 8px; }

.btn-primary, .btn-secondary, .btn-white {
    padding: 13px 30px; border-radius: 9px; font-size: .95rem; 
    font-weight: 600; text-decoration: none; display: inline-block;
}

.btn-primary {
    background: var(--teal-dark); color: var(--white); 
    box-shadow: 0 4px 14px rgba(0,109,119,.25);
}
.btn-primary:hover { background: #005960; }

.btn-secondary {
    background: var(--white); color: var(--teal-dark); 
    border: 1.5px solid var(--teal-mid); box-shadow: 0 2px 8px rgba(0,109,119,.08);
}
.btn-secondary:hover { border-color: var(--teal-dark); }

.btn-white {
    background: var(--white); color: var(--teal-dark); 
    box-shadow: 0 4px 14px rgba(0,0,0,.1);
}
.btn-white:hover { background: var(--teal-light); }

/* ─── Stats ─── */
.stats { background: var(--white); box-shadow: 0 2px 16px rgba(0,109,119,.07); }
.stats-inner {
    max-width: 1100px; margin: 0 auto; padding: 44px 32px;
    display: flex; justify-content: space-around; gap: 24px; flex-wrap: wrap;
}

.stat { text-align: center; }
.stat-num {
    font-family: 'DM Serif Display', serif; font-size: 2.6rem; color: var(--teal-dark);
}
.stat-label { font-size: .88rem; color: var(--muted); margin-top: 4px; }

/* ─── Sections ─── */
.section {
    max-width: 1100px; margin: 0 auto; padding: 88px 32px;
}

.section-title {
    font-family: 'DM Serif Display', serif; font-size: 2.1rem; 
    color: var(--teal-dark); margin-bottom: 14px;
}

.section-tag, .hero-tag {
    background: var(--teal-mid); color: var(--teal-dark); font-size: .78rem;
    font-weight: 600; letter-spacing: .07em; padding: 5px 14px;
    border-radius: 20px; text-transform: uppercase; margin-bottom: 16px;
    display: inline-block;
}

.section-sub {
    font-size: 1rem; color: var(--muted); max-width: 480px; 
    line-height: 1.68; margin-bottom: 48px;
}

/* ─── About ─── */
.about-bg { background: var(--white); box-shadow: 0 2px 16px rgba(0,109,119,.06); }
.about-wrap { display: flex; gap: 80px; align-items: center; }
.about-block {
    flex: 1; background: var(--teal-light); border-radius: 16px; 
    padding: 48px 36px; border-left: 4px solid var(--teal-dark);
}
.about-text { flex: 1; }

/* ─── Steps ─── */
.steps {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px;
}

.step-card {
    background: var(--white); border-radius: 14px; padding: 28px 24px;
    box-shadow: 0 4px 18px rgba(0,109,119,.09);
}

.step-num {
    width: 42px; height: 42px; border-radius: 12px; background: var(--teal-light);
    color: var(--teal-dark); font-weight: 700; font-size: 1rem;
    display: flex; align-items: center; justify-content: center; margin-bottom: 16px;
}

/* ─── CTA ─── */
.cta-wrap { padding: 0 32px 88px; }
.cta-banner {
    background: var(--teal-dark); border-radius: 18px; padding: 64px 48px;
    text-align: center; max-width: 1036px; margin: 0 auto;
    box-shadow: 0 8px 32px rgba(0,109,119,.22);
}

.cta-banner h2 {
    font-family: 'DM Serif Display', serif; font-size: 2.1rem; color: var(--white);
    margin-bottom: 14px;
}

.cta-banner p { color: var(--teal-mid); font-size: 1rem; margin-bottom: 30px; line-height: 1.6; }

/* ─── Footer ─── */
footer { background: var(--white); border-top: 1px solid #ddeef1; }
.footer-inner {
    padding: 32px; display: flex; align-items: center; 
    justify-content: space-between; flex-wrap: wrap; gap: 16px;
}
.footer-logo {
    font-family: 'DM Serif Display', serif; font-size: 1.2rem; color: var(--teal-dark);
}

footer p { font-size: .83rem; color: var(--muted); }

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .hero { padding: 64px 24px; }
    .hero h1 { font-size: 2.4rem; }
    .about-wrap { flex-direction: column; gap: 32px; }
    .cta-banner { padding: 44px 24px; }
    .cta-wrap { padding: 0 24px 64px; }
}

 

</style>
</head>
<body>

<header>
  <div class="header-inner">
    <a href="index.html" class="logo">Easy Coloc</a>
    <nav>
      
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('signup') }}" class="btn-nav">Sign up</a>
    </nav>
  </div>
</header>

<section class="hero">
  <span class="hero-tag">Find your perfect roommate</span>
  <h1>Shared living,<br>made simple.</h1>
  <p>Easy Coloc connects you with the right roommates and the best shared apartments — all in one clean, easy platform. No agencies, no hassle.</p>
  <div class="hero-actions">
    <a href="{{ route('signup') }}" class="btn-primary">Get started free</a>
    <a href="#how" class="btn-secondary">See how it works</a>
  </div>
</section>

<div class="stats">
  <div class="stats-inner">
    <div class="stat"><div class="stat-num">{{ $colsNumber }}+</div><div class="stat-label">Active Colocation</div></div>
    <div class="stat"><div class="stat-num">{{ $roommates }}+</div><div class="stat-label"> roommates</div></div>
    

  </div>
</div>

<div class="about-bg">
  <section class="section" id="about">
    <div class="about-wrap">
      <div class="about-text">
        <span class="section-tag">About us</span>
        <h2 class="section-title">Good coliving starts with good matching</h2>
        <p>Easy Coloc was born out of the frustration of finding a roommate through endless Facebook groups and word of mouth. We built a platform that respects your time and your privacy.</p>
        <p>Our mission is simple: help people find a home they feel comfortable in, with people they actually get along with.</p>
        <a href="signup.html" class="btn-primary" style="margin-top:10px;display:inline-block;">Join the community</a>
      </div>
      <div class="about-block">
        <p>"Finding the right coloc used to be exhausting. We wanted to change that — for everyone, in every city."</p>
        <p>We are a small team who have all been through the roommate search ourselves. That is why we built Easy Coloc with simplicity and trust at its core.</p>
        <p>Every listing is checked. Every profile is real. And you stay in control of who you talk to.</p>
      </div>
    </div>
  </section>
</div>

<section class="section" id="how">
  <span class="section-tag">How it works</span>
  <h2 class="section-title">Three steps to your new home</h2>
  <p class="section-sub">Finding a shared flat has never been this straightforward. No agencies, no fees, no unnecessary steps.</p>
  <div class="steps">
    <div class="step-card">
      <div class="step-num">1</div>
      <h4>Create your profile</h4>
      <p>Tell us about yourself — your lifestyle, budget, and the kind of place you are looking for.</p>
    </div>
    <div class="step-card">
      <div class="step-num">2</div>
      <h4>Browse listings</h4>
      <p>Filter by city, budget, and preferences. Every listing is verified and up to date.</p>
    </div>
    <div class="step-card">
      <div class="step-num">3</div>
      <h4>Connect and move in</h4>
      <p>Message your future roommates directly and schedule a visit — all inside the platform.</p>
    </div>
  </div>
</section>

<div class="cta-wrap">
  <div class="cta-banner">
    <h2>Ready to find your perfect coloc?</h2>
    <p>Join thousands of people who found their home through Easy Coloc.</p>
    <a href="{{ route('signup') }}" class="btn-white">Create a free account</a>
  </div>
</div>

<footer>
  <div class="footer-inner">
    <span class="footer-logo">Easy Coloc</span>
    <p>© 2025 Easy Coloc. All rights reserved.</p>
    <p>Made with care</p>
  </div>
</footer>

</body>
</html>