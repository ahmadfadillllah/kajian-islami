<footer class="mt-auto bg-white dark:bg-transparent dark:bg-gradient-to-b dark:from-white/[0.03] dark:to-transparent">
    <div
        class="bg-gradient-to-r from-[#FCF1F4] to-[#EDFBF9] py-5 dark:border-t-2 dark:border-white/5 dark:bg-none">
        <div class="container">
            <div
                class="flex flex-col items-center justify-between text-center font-bold dark:text-white md:flex-row">
                <div>
                    Copyright© <span class="curr-year">2022</span>
                    <a href="javascript:" class="text-primary transition hover:text-secondary">{{ config('app.name') }}</a>
                </div>
                <div>Butuh bantuan?  <a href="{{ route('home.contact') }}" class="text-secondary transition hover:text-primary">Hubungi Kami</a></div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Return to Top -->
<button type="button" id="scrollToTopBtn" class="fixed bottom-5 z-10 hidden animate-bounce ltr:right-5 rtl:left-5" onclick="scrollToTop()">
<div
    class="group flex h-14 w-14 items-center justify-center rounded-full border border-black/20 bg-black text-white transition duration-500 hover:bg-secondary dark:bg-primary dark:hover:bg-secondary"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6 transition group-hover:text-black"
    >
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
    </svg>
</div>
</button>

<!-- Swiper Slider JS -->
<script src="{{ asset('home') }}/assets/js/swiper-bundle.min.js"></script>
<!-- accordion -->
<script src="{{ asset('home') }}/assets/js/accordion.min.js"></script>
<!-- AOS Animation JS -->
<script src="{{ asset('home') }}/assets/js/aos.js"></script>
<!-- Custom Js -->
<script src="{{ asset('home') }}/assets/js/custom.js"></script>


</body>
</html>
