@extends('admin_web_visitor.index')
@section('content')

@php
    // Produk terbaru (dipakai untuk slider & Latest products)
    $latest = $sandal->sortByDesc('created_at')->values();
@endphp

<!-- Slider -->
<section id="product-slider">
    {{-- Jangan tambah class "swiper" di sini: script.js sudah membuat new Swiper('.main-slider') --}}
    <div class="main-slider swiper-container">
        <div class="swiper-wrapper">
            @foreach ($latest->take(5) as $item)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}">
                <div class="slide-overlay"></div>

                <div class="swiper-slide-content">
                    <h2 class="text-3xl md:text-7xl font-bold text-white mb-2 md:mb-4">{{ $item->nama_sandal }}</h2>
                    <p class="mb-4 text-white md:text-2xl">{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</p>
                    <a href="#popular-products"
                       class="bg-primary hover:bg-transparent text-white hover:text-white border border-transparent hover:border-white font-semibold px-4 py-2 rounded-full inline-block">Shop now</a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Tombol navigasi di dalam .main-slider agar tidak tertukar dengan slider brand --}}
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<!-- Product banner section -->
<section id="product-banners">
    <div class="container mx-auto py-10 px-4">
        <div class="product-grid">
            @foreach ($sandal as $item)
            <div class="grid-item {{ $loop->index >= 3 ? 'is-extra is-collapsed' : '' }}" data-group="banner">
                <div class="category-banner">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}">
                    <div class="category-banner-overlay"></div>
                    <div class="category-banner-content">
                        <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ $item->nama_sandal }}</h2>
                        <a href="#popular-products"
                           class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if ($sandal->count() > 3)
        <div class="see-more-wrap">
            <button type="button" class="btn-see-more" data-group="banner">See more</button>
        </div>
        @endif
    </div>
</section>

<!-- Popular product section -->
<section id="popular-products" class="py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-8">
            <h2 class="text-2xl font-bold m-0">Popular products</h2>

            {{-- Fitur urutkan termurah / termahal --}}
            <div class="sort-control">
                <label for="sort-popular" class="mr-2 text-sm font-medium">Urutkan:</label>
                <select id="sort-popular" class="js-sort-price rounded-full border border-gray-300 px-3 py-1 text-sm" data-group="popular">
                    <option value="default">Default</option>
                    <option value="asc">Harga Termurah</option>
                    <option value="desc">Harga Termahal</option>
                </select>
            </div>
        </div>

        <div class="product-grid" data-group-container="popular">
            @foreach ($sandal as $item)
            <div class="grid-item {{ $loop->index >= 3 ? 'is-extra is-collapsed' : '' }}" data-group="popular" data-harga="{{ $item->harga }}" data-original-index="{{ $loop->index }}">
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}">
                    </div>
                    <div class="product-body">
                        <a href="#" class="product-name">{{ $item->nama_sandal }}</a>
                        <p class="my-2">Ukuran: {{ $item->ukuran }}</p>
                        <p class="my-2">Stok: {{ $item->stok }}</p>
                        <span class="text-lg font-bold text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-cart">Add to Cart</button>
                        <button type="button" class="btn-detail js-view-detail"
                            data-name="{{ $item->nama_sandal }}"
                            data-image="{{ asset('storage/' . $item->gambar) }}"
                            data-size="{{ $item->ukuran }}"
                            data-stock="{{ $item->stok }}"
                            data-price="Rp {{ number_format($item->harga, 0, ',', '.') }}"
                            data-desc="{{ $item->deskripsi }}">View Details</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if ($sandal->count() > 3)
        <div class="see-more-wrap">
            <button type="button" class="btn-see-more" data-group="popular">See more</button>
        </div>
        @endif
    </div>
</section>

<!-- Latest product section -->
<section id="latest-products" class="py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-8">
            <h2 class="text-2xl font-bold m-0">Latest products</h2>

            {{-- Fitur urutkan termurah / termahal --}}
            <div class="sort-control">
                <label for="sort-latest" class="mr-2 text-sm font-medium">Urutkan:</label>
                <select id="sort-latest" class="js-sort-price rounded-full border border-gray-300 px-3 py-1 text-sm" data-group="latest">
                    <option value="default">Default</option>
                    <option value="asc">Harga Termurah</option>
                    <option value="desc">Harga Termahal</option>
                </select>
            </div>
        </div>

        <div class="product-grid" data-group-container="latest">
            @foreach ($latest as $item)
            <div class="grid-item {{ $loop->index >= 3 ? 'is-extra is-collapsed' : '' }}" data-group="latest" data-harga="{{ $item->harga }}" data-original-index="{{ $loop->index }}">
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}">
                    </div>
                    <div class="product-body">
                        <a href="#" class="product-name">{{ $item->nama_sandal }}</a>
                        <p class="my-2">Ukuran: {{ $item->ukuran }}</p>
                        <p class="my-2">Stok: {{ $item->stok }}</p>
                        <span class="text-lg font-bold text-gray-900">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-cart">Add to Cart</button>
                        <button type="button" class="btn-detail js-view-detail"
                            data-name="{{ $item->nama_sandal }}"
                            data-image="{{ asset('storage/' . $item->gambar) }}"
                            data-size="{{ $item->ukuran }}"
                            data-stock="{{ $item->stok }}"
                            data-price="Rp {{ number_format($item->harga, 0, ',', '.') }}"
                            data-desc="{{ $item->deskripsi }}">View Details</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if ($latest->count() > 3)
        <div class="see-more-wrap">
            <button type="button" class="btn-see-more" data-group="latest">See more</button>
        </div>
        @endif
    </div>
</section>

    <!-- Brand section -->
    <section id="brands" class="bg-white py-16 px-4">
        <div class="container mx-auto max-w-screen-xl px-4 testimonials">
          <div class="text-center mb-12 lg:mb-20">
            <h2 class="text-5xl font-bold mb-4">Discover <span class="text-primary">Our Brands</span></h2>
            <p class="my-7">Explore the top brands we feature in our store</p>
        </div>
            <div class="swiper brands-swiper-slider">
                <div class="swiper-wrapper">
                    <!-- Brand Logo 1 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://thumb.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/3840px-Adidas_Logo.svg.png?utm_source=id.wikipedia.org&utm_campaign=index&utm_content=thumbnail')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 2 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaP-_6agzKZy5b8CkI6W87MrhRf-__tfc0PxfUwfV4CA&s')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 3 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://media.licdn.com/dms/image/v2/C510BAQHohIsbnU10VA/company-logo_200_200/company-logo_200_200/0/1630604606332/buccheri_logo?e=2147483647&v=beta&t=n0lZ0Cn5rqA0fqEKtz3Z2nSemK7eBfhXQaA7H6PPO9I')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 4 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://i.pinimg.com/564x/89/72/88/89728843603f7fa1f452a55daf586db9.jpg')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 5 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRT78zpDjFIMcT57HkbRBNB5XmiJUxq0GZ2E0t7wN8TQQ&s')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 6 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="{{ asset('https://brandlogos.net/wp-content/uploads/2022/01/birkenstock-logo-brandlogo.net_-1.png')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>

                    <!-- Brand Logo 7 -->
                    <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                      <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6BnrygJxXWI4NvYtF7fmSomeK6tZarCM0x2CTvv2UhtdCzEnXzxIZss4&s=10')}}" alt="Client Logo" class="max-h-full max-w-full">
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
    </section>

    <!-- Banner section -->
    <section id="banner" class="relative my-16">
        <div class="container mx-auto px-4 py-20 rounded-lg relative bg-cover bg-center" style="background-image: url('{{ asset('web_visitor/assets/images/banner1.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
            <div class="relative flex flex-col items-center justify-center h-full text-center text-white py-20">
                <h2 class="text-4xl font-bold mb-4">Welcome to Our Shop</h2>
                <div class="flex space-x-4">
                    <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Shop Now</a>
                    <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">New Arrivals</a>
                    <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Sale</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog section (diambil dari data sandal yang sudah ada) -->
    <section id="blog" class="py-16">
        <div class="text-center mb-12 lg:mb-20">
            <h2 class="text-5xl font-bold mb-4">Discover <span class="text-primary">Our</span> Blog</h2>
            <p class="my-7">Stay updated with the latest trends, tips, and stories in the world of fashion</p>
        </div>

        <div class="container mx-auto px-4 blog-wrap">
            @if ($latest->isEmpty())
                <p class="text-center">Belum ada data.</p>
            @else
            <div class="product-grid">
                @foreach ($latest->take(3) as $item)
                <article class="blog-card">
                    <div class="blog-img-wrap">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_sandal }}">
                    </div>
                    <p class="blog-cat">Ukuran {{ $item->ukuran }}</p>
                    <h3 class="blog-title">{{ $item->nama_sandal }}</h3>
                    <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit($item->deskripsi, 130) }}</p>
                    <button type="button" class="btn-see-more blog-readmore js-view-detail"
                        data-name="{{ $item->nama_sandal }}"
                        data-image="{{ asset('storage/' . $item->gambar) }}"
                        data-size="{{ $item->ukuran }}"
                        data-stock="{{ $item->stok }}"
                        data-price="Rp {{ number_format($item->harga, 0, ',', '.') }}"
                        data-desc="{{ $item->deskripsi }}">Read more</button>
                </article>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- Subscribe section -->
    <section id="subscribe" class="py-6 lg:py-24 bg-white border-t border-gray-line">
      <div class="container mx-auto">
          <div class="flex flex-col items-center rounded-lg p-4 sm:p-0 ">
              <div class="mb-8">
                  <h2 class="text-center text-xl font-bold sm:text-2xl lg:text-left lg:text-3xl">Join our newsletter and <span class="text-primary">get $50 discount</span> for your first order
                  </h2>
              </div>
              <div class="flex flex-col items-center w-96 ">
                  <form class="flex w-full gap-2">
                      <input placeholder="Enter your email address"
                             class="w-full flex-1 rounded-full px-3 py-2 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" />
                      <button
                          class="bg-primary border border-primary hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Subscribe</button>
                  </form>
              </div>
          </div>
      </div>
    </section>

<script>
    // Tombol See more / See less (per grup: banner, popular, latest)
    document.querySelectorAll('.btn-see-more').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var items = document.querySelectorAll('.grid-item.is-extra[data-group="' + btn.dataset.group + '"]');
            var willShow = items.length && items[0].classList.contains('is-collapsed');
            items.forEach(function (el) { el.classList.toggle('is-collapsed', !willShow); });
            btn.textContent = willShow ? 'See less' : 'See more';
        });
    });
</script>

<!-- Fitur: Urutkan Termurah / Termahal -->
<script>
    (function () {
        // Terapkan ulang aturan "is-extra is-collapsed" (tampil 3 pertama, sisanya disembunyikan
        // sampai tombol "See more" ditekan) berdasarkan urutan tampilan SAAT INI di DOM.
        function reapplyExtraState(group) {
            var items = document.querySelectorAll('.grid-item[data-group="' + group + '"]');
            items.forEach(function (el, index) {
                if (index >= 3) {
                    el.classList.add('is-extra');
                } else {
                    el.classList.remove('is-extra');
                }
                // Sembunyikan kembali item "extra" setiap kali urutan berubah,
                // dan pastikan tombol See more kembali ke kondisi awal.
                if (index >= 3) {
                    el.classList.add('is-collapsed');
                } else {
                    el.classList.remove('is-collapsed');
                }
            });

            var seeMoreBtn = document.querySelector('.btn-see-more[data-group="' + group + '"]');
            if (seeMoreBtn) {
                seeMoreBtn.textContent = 'See more';
            }
        }

        function sortGroup(group, order) {
            var container = document.querySelector('.product-grid[data-group-container="' + group + '"]');
            if (!container) return;

            var items = Array.prototype.slice.call(
                container.querySelectorAll('.grid-item[data-group="' + group + '"]')
            );

            if (order === 'default') {
                // Kembalikan ke urutan asli berdasarkan data-original-index
                items.sort(function (a, b) {
                    return parseInt(a.dataset.originalIndex, 10) - parseInt(b.dataset.originalIndex, 10);
                });
            } else {
                items.sort(function (a, b) {
                    var priceA = parseFloat(a.dataset.harga) || 0;
                    var priceB = parseFloat(b.dataset.harga) || 0;
                    return order === 'asc' ? priceA - priceB : priceB - priceA;
                });
            }

            // Susun ulang elemen di DOM sesuai urutan hasil sort
            items.forEach(function (item) {
                container.appendChild(item);
            });

            reapplyExtraState(group);
        }

        document.querySelectorAll('.js-sort-price').forEach(function (select) {
            select.addEventListener('change', function () {
                sortGroup(select.dataset.group, select.value);
            });
        });
    })();
</script>

<!-- Modal detail produk -->
<div id="detail-modal" class="detail-modal is-collapsed" role="dialog" aria-modal="true" aria-labelledby="detail-name">
    <div class="detail-backdrop" data-close></div>
    <div class="detail-dialog">
        <button type="button" class="detail-close" data-close aria-label="Tutup">&times;</button>
        <div class="detail-image"><img id="detail-image" src="" alt=""></div>
        <div class="detail-info">
            <h3 id="detail-name"></h3>
            <p class="detail-price" id="detail-price"></p>
            <p><strong>Ukuran:</strong> <span id="detail-size"></span></p>
            <p><strong>Stok:</strong> <span id="detail-stock"></span></p>
            <p class="detail-desc" id="detail-desc"></p>
            <div class="product-actions">
                <button type="button" class="btn-cart">Add to Cart</button>
                <button type="button" class="btn-detail" data-close>Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Modal View Details
    (function () {
        var modal = document.getElementById('detail-modal');
        function open(btn) {
            document.getElementById('detail-image').src = btn.dataset.image;
            document.getElementById('detail-image').alt = btn.dataset.name;
            document.getElementById('detail-name').textContent  = btn.dataset.name;
            document.getElementById('detail-price').textContent = btn.dataset.price;
            document.getElementById('detail-size').textContent  = btn.dataset.size;
            document.getElementById('detail-stock').textContent = btn.dataset.stock;
            document.getElementById('detail-desc').textContent  = btn.dataset.desc;
            modal.classList.remove('is-collapsed');
            document.body.style.overflow = 'hidden';
        }
        function close() {
            modal.classList.add('is-collapsed');
            document.body.style.overflow = '';
        }
        document.querySelectorAll('.js-view-detail').forEach(function (b) {
            b.addEventListener('click', function () { open(b); });
        });
        modal.querySelectorAll('[data-close]').forEach(function (el) {
            el.addEventListener('click', close);
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
    })();
</script>

@endsection
