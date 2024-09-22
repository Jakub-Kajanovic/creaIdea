<title>{{ $title ?? 'Crea Idea - Kreatívne Riešenia pre Vaše Podnikanie' }}</title>
<meta name="description"
    content="{{ $description ?? 'Objavte, ako vám Crea Idea pomôže vyniknúť na trhu! Od brandovej stratégie po webový dizajn a PPC kampane.' }}" />

<!-- Open Graph Tags -->
<meta property="og:title" content="{{ $ogTitle ?? 'Crea Idea - Kreatívne Riešenia pre Vaše Podnikanie' }}" />
<meta property="og:description"
    content="{{ $ogDescription ?? 'Objavte, ako vám Crea Idea pomôže vyniknúť na trhu! Od brandovej stratégie po webový dizajn a PPC kampane.' }}" />
<meta property="og:image" content="{{ asset('images/og-twitter.webp') }}" />
<meta property="og:url" content="https://www.creaidea.sk" />
<meta property="og:type" content="website" />

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $twitterTitle ?? 'Crea Idea - Kreatívne Riešenia pre Vaše Podnikanie' }}" />
<meta name="twitter:description"
    content="{{ $twitterDescription ?? 'Objavte, ako vám Crea Idea pomôže vyniknúť na trhu! Od brandovej stratégie po webový dizajn a PPC kampane.' }}" />
<meta name="twitter:image" content="{{ asset('images/og-twitter.webp') }}" />

<!-- Canonical Tag -->
<link rel="canonical" href="https://www.creaidea.sk" />

<!-- Robots Meta Tag -->
<meta name="robots" content="index, follow" />
