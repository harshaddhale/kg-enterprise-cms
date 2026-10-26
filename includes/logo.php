<?php
/* KAJARA logo, inlined so the wordmark uses the page's JetBrains Mono. Each copy gets its own gradient id.
   The viewBox is trimmed to the artwork (the original 420×80 canvas had empty space to the right). */
$logo_n = ($logo_n ?? 0) + 1;
$logo_gid = 'kajara-gradient-' . $logo_n;
?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 10 270 64" aria-hidden="true" focusable="false">
  <defs>
    <linearGradient id="<?= $logo_gid ?>" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#2563EB"/>
      <stop offset="100%" stop-color="#1D4ED8"/>
    </linearGradient>
  </defs>
  <g transform="translate(10, 16)">
    <path d="M 0,24 L 14,10 L 28,24 L 14,38 Z" fill="none" stroke="#E2E8F0" stroke-width="3" stroke-linejoin="round"/>
    <path d="M 14,4 L 38,28 L 14,52" fill="none" stroke="url(#<?= $logo_gid ?>)" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M 28,12 L 44,28 L 28,44" fill="none" stroke="#0F172A" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
    <circle cx="44" cy="28" r="4.5" fill="#10B981"/>
  </g>
  <text x="84" y="54" fill="#0F172A" font-family="'JetBrains Mono', 'SF Mono', ui-monospace, monospace" font-size="42" font-weight="800" letter-spacing="0.08em">KAJARA</text>
</svg>
