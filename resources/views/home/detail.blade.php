@include('home.layout.head')
@include('home.layout.header')

<div class="-mt-[82px] flex-grow overflow-x-hidden lg:-mt-[106px]">
    <div
        class="relative overflow-hidden bg-black bg-[url(../images/insurance/banner_line.png)] bg-cover bg-center bg-no-repeat">
        <img src="{{ asset('home') }}/assets/images/insurance/banner_shap.png" alt=""
            class="absolute inset-y-0 right-0 object-cover" />
        <div class="container relative z-[1]">
            <div class="flex flex-col md:flex-row">
                <div class="flex-1 space-y-5 py-24 text-center text-white ltr:md:text-left rtl:md:text-right lg:py-40 xl:py-52"
                    data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-2xl font-extrabold uppercase lg:text-6xl lg:leading-[75px]">
                        {{ $dataKajian->nama }}

                    </h2>

                    <p class="font-semibold lg:text-lg">
                        {{ strtoupper($dataKajian->kategori) }} | {{ $dataKajian->type }}
                    </p>

                    @if ($dataKajian->streaming != null)
                    <a href="{{ $dataKajian->streaming }}" target="_blank" rel="noopener noreferrer"
                        class="group inline-flex items-center justify-center gap-4 rounded-full bg-secondary p-1 font-bold uppercase leading-none text-white duration-300 hover:bg-primary ltr:pl-5 rtl:pr-5">
                        Video Streaming
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-secondary group-hover:text-primary">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5 12L14.5 7M19.5 12L14.5 17M19.5 12L13 12M9.5 12C7.83333 12 4.5 13 4.5 17"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>

                    @endif
                </div>
                <div class="flex flex-1 items-end" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset('home') }}/assets/images/insurance/banner_img.png" alt=""
                        class="w-full max-w-[688px] xl:ml-60" />
                </div>
            </div>
        </div>
    </div>

    <section class="py-10 lg:py-20" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="flex flex-col gap-7 lg:flex-row">
                <div
                    class="mx-auto h-[450px] w-full max-w-[380px] flex-none overflow-hidden rounded-b-[160px] rounded-tl-[200px] rounded-tr-[20px] border-[10px] border-white dark:border-gray-dark">
                    <img src="{{ asset('home') }}/assets/images/insurance/masjid.jpg" alt=""
                        class="h-full w-full object-cover" />
                </div>

                <div class="flex flex-1 flex-col justify-between text-center ltr:md:text-left rtl:md:text-right">
                    <div>
                        <h2
                            class="mb-4 text-2xl font-extrabold text-black dark:text-white md:text-3xl lg:text-[40px] lg:leading-tight">
                            <span class="text-secondary">Tentang</span>
                            Kegiatan
                        </h2>

                        {!! $dataKajian->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('home.layout.footer')
