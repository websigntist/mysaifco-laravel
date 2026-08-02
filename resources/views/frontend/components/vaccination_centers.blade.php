@php
    $targetLocation = $vaccineCenter ?? $vaccine_center ?? (${'vaccine-center'} ?? 'Dubai Centers');

    $dbCenters = \App\Models\backend\VaccinationCenter::active()
        ->where('center_location', $targetLocation)
        ->orderBy('ordering', 'asc')
        ->get();

    $defaultDubai = [
        ['image' => 'vaccine-1.webp',  'name' => 'AL Barsha Health Centre',       'address' => 'Al Barsha - Al Barsha 3 - Dubai - United Arab Emirates',                                   'phone' => '+97800342',    'map' => '#'],
        ['image' => 'vaccine-11.webp', 'name' => 'Al Mankhool Health Center',      'address' => 'Al Mankhool Rd - behind Eid Musalla mosque - Al Mankhool',                                 'phone' => '+97645022(0)', 'map' => '#'],
        ['image' => 'vaccine-2.webp',  'name' => 'Al Kuwait Hospital Dubai',       'address' => 'Deira - Dubai - United Arab Emirates',                                                     'phone' => '+97647078000', 'map' => '#'],
        ['image' => 'vaccine-5.webp',  'name' => 'Apple International Polyclinic',  'address' => 'International City, Greece Cluster Building No Easy access through K16 - Mamzena St - from - Dubai', 'phone' => '+97643578686', 'map' => '#'],
        ['image' => 'vaccine-4.webp',  'name' => 'Badr Al Samaa Medical Centre',   'address' => 'Opp. Musalla Tower - Khalid Bin Al Waleed Rd - Dubai - United Arab Emirates',               'phone' => '+97643578686', 'map' => '#'],
        ['image' => 'vaccine-3.webp',  'name' => 'Thumbay Hospital',               'address' => '13th Street, Near Stadium Metro Station, Behind Lulu Hypermarket, Al Qusais - Dubai - United Arab Emirates', 'phone' => '+97646030555', 'map' => '#'],
    ];

    $defaultSharjah = [
        ['image' => 'vaccine-12.webp', 'name' => 'Zulekha Hospital Sharjah',       'address' => 'Al Zahrah St - Al Sharq - Al Nasserya - Sharjah - UAE',                                    'phone' => '+97800524442', 'map' => '#'],
        ['image' => 'vaccine-6.webp',  'name' => 'Central Hospital Sharjah',       'address' => 'Sheikh Zayed St, Mysaloon Near Clock Tower - Sharjah - UAE',                                'phone' => '+97165639900', 'map' => '#'],
        ['image' => 'vaccine-7.webp',  'name' => 'Medcare Hospital Sharjah',       'address' => 'King Faisal St - Al Qasimia - Al Suof - Sharjah - UAE',                                     'phone' => '+97180061322173', 'map' => '#'],
        ['image' => 'vaccine-10.webp', 'name' => 'Medcare Medical Centre, Sharjah','address' => 'Al Jawhara Building - Al Taawun St - Al Khan - Sharjah - United Arab Emirates',              'phone' => '+97180063322173', 'map' => '#'],
        ['image' => 'vaccine-9.webp',  'name' => 'French Medical Center - Sharjah', 'address' => 'Al Buhaira Building - Corniche St - Al Majaz - Sharjah - United Arab Emirates',              'phone' => '+97165744266', 'map' => '#'],
        ['image' => 'vaccine-8.webp',  'name' => 'Aster Clinic',                   'address' => 'Sultacc Building - King Faisal St - Al Majaz - Al Majaz 1 - Sharjah - United Arab Emirates', 'phone' => '+97644600500', 'map' => '#'],
    ];

    if ($dbCenters->isNotEmpty()) {
        $displayCenters = $dbCenters;
    } else {
        if ($targetLocation === 'Sharjah Centers') {
            $displayCenters = $defaultSharjah;
        } else {
            $displayCenters = $defaultDubai;
        }
    }
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($displayCenters as $center)
        @php
            if (is_array($center)) {
                $cData = $center;
            } else {
                $cData = [
                    'name'    => $center->title,
                    'address' => $center->address,
                    'phone'   => $center->phone,
                    'map'     => $center->map_url,
                    'image'   => $center->image,
                ];
            }
        @endphp
        @include('frontend.pages.includes.partials.vaccine-center-card', $cData)
    @endforeach
</div>
