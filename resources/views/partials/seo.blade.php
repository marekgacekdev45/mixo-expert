@php
$schemaData = [
"@context" => "https://schema.org",
"@type" => "NGO",
"name" => $home->name,
"url" => config('app.url'),
"logo" => asset('storage/'.$home->logo),
"contactPoint" => [
"@type" => "ContactPoint",
"telephone" => $home->phone,
"email" => $home->email,
"contactType" => "customer service",
"areaServed" => "PL",
"availableLanguage" => ["Polish", "Slovak"]
]
];
@endphp

<script type="application/ld+json">
  {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>


@php
$addressLocality = 'Sieniawa 101A';
$postalCode = '34-723';
$addressCountry = 'Sieniawa';




$schemaData = [
"@context" => "https://schema.org",
"@type" => "LocalBusiness",
"name" => $home->name,
"image" => asset('storage/' . $home->ogImage),
"@id" => "",
"url" => config('app.url'),
"telephone" => $home->phone,
"mail" => $home->email,
"address" => [
"@type" => "PostalAddress",
"streetAddress" => $home->address,
"addressLocality" => $addressLocality,
"postalCode" => $postalCode,
"addressCountry" => $addressCountry,
],

"openingHoursSpecification" => [
"@type" => "OpeningHoursSpecification",
"dayOfWeek" => [
"Sunday", "Saturday", "Friday", "Thursday", "Wednesday", "Tuesday", "Monday"
],

]
];
@endphp

<script type="application/ld+json">
  {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>