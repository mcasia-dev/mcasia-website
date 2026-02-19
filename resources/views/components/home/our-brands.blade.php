@php
    $brandLogos = [
        ['name' => 'ABC', 'src' => asset('images/home/our-brands/abc.png'), 'url' => 'abc'],
        ['name' => 'Daisho', 'src' => asset('images/home/our-brands/daisho.png'), 'url' => 'daisho'],
        ['name' => 'Oxford', 'src' => asset('images/home/our-brands/oxford.png'), 'url' => 'oxford'],
        ['name' => 'Hengs', 'src' => asset('images/home/our-brands/hengs.png'), 'url' => 'heng'],
        ['name' => 'Milcasa', 'src' => asset('images/home/our-brands/milcasa.png'), 'url' => 'milcasa'],
        ['name' => 'Otafuku', 'src' => asset('images/home/our-brands/otafuku.png'), 'url' => 'otafuku'],
        ['name' => 'Sea Chef', 'src' => asset('images/home/our-brands/seachef.png'), 'url' => 'seachef'],
        ['name' => 'Ummami', 'src' => asset('images/home/our-brands/um-mami.png'), 'url' => 'ummami'],
        ['name' => 'King Chef', 'src' => asset('images/home/our-brands/kingchef.png'), 'url' => 'kingchef'],
        ['name' => 'Niigata', 'src' => asset('images/home/our-brands/niigata.png'), 'url' => null],
        ['name' => 'Ozaki', 'src' => asset('images/home/our-brands/ozaki.png'), 'url' => 'ozaki'],
        ['name' => 'Marukome', 'src' => asset('images/home/our-brands/marukome.jpg'), 'url' => null],
        ['name' => 'Somi', 'src' => asset('images/home/our-brands/somi.jpg'), 'url' => null],
        ['name' => 'Hamasaen', 'src' => asset('images/home/our-brands/hamasa-en.png'), 'url' => 'hamasaen'],
        ['name' => 'LongBeach', 'src' => asset('images/home/our-brands/longbeach.png'), 'url' => 'longbeach'],
        ['name' => 'Yamasa', 'src' => asset('images/home/our-brands/yamasa.png'), 'url' => null],
    ];
@endphp

<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div data-aos="fade-right" data-aos-duration="650" data-aos-delay="200">
            <h2 class="text-3xl sm:text-5xl font-bold text-gray-900 mb-4">Discover Our Brands</h2>
            <p class="text-gray-600 leading-relaxed max-w-md">
                From everyday meals to special occasions, our brands deliver authentic Asian flavors designed to
                inspire, connect, and delight.
            </p>
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-4 gap-6 items-center">
            @foreach ($brandLogos as $brand)
                @if ($brand['url'] != null)
                    <a href="{{ $brand['url'] }}"
                        data-aos="zoom-in-up" data-aos-duration="650" data-aos-delay="{{ $loop->index * 60 }}" class="group relative flex items-center justify-center rounded-xl overflow-hidden bg-white h-20">
                        <img src="{{ $brand['src'] }}" alt="{{ $brand['name'] }}" class="h-28 w-28 object-contain p-3 ">
                        <div
                            class="absolute inset-x-0 bottom-0 bg-red-600/95 text-white text-xs font-semibold tracking-wide uppercase px-3 py-2 transform translate-y-full transition-transform duration-300 group-hover:translate-y-0 flex items-center justify-center">
                            {{ $brand['name'] }}
                        </div>
                    </a>
                @else
                    <div
                        data-aos="zoom-in-up" data-aos-duration="650" data-aos-delay="{{ $loop->index * 60 }}" class="group relative flex items-center justify-center rounded-xl overflow-hidden bg-white h-20">
                        <img src="{{ $brand['src'] }}" alt="{{ $brand['name'] }}" class="h-28 w-28 object-contain p-3 ">
                        <div
                            class="absolute inset-x-0 bottom-0 bg-red-600/95 text-white text-xs font-semibold tracking-wide uppercase px-3 py-2 transform translate-y-full transition-transform duration-300 group-hover:translate-y-0 flex items-center justify-center">
                            {{ $brand['name'] }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

