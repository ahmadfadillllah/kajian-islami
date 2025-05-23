@include('home.layout.head')
@include('home.layout.header')
<style>
    table,
    th,
    td {
        border: 1px solid #d1d5db;
        border-collapse: collapse;
    }

    thead {
        background-color: #f3f4f6;
        /* Abu-abu untuk header */
    }

    tbody tr:nth-child(odd) {
        /* background-color: #ffffff; */
        color: #000000;
    }

    tbody tr:nth-child(even) {
        background-color: #D9D9D9;
        color: #000000;
    }

    tbody tr {
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background-color: #FFF2CC !important;
        color: #000 !important;
    }

    .fade {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .swal2-confirm {
        background-color: #2563eb !important; /* Tailwind blue-600 */
        color: white !important;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }

    .swal2-cancel {
        background-color: #6b7280 !important; /* Tailwind gray-500 */
        color: white !important;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }

    .swal2-popup {
        font-size: 1rem;
    }
</style>



<div class="-mt-[82px] flex-grow overflow-x-hidden lg:-mt-[106px]">
    <div class="bg-[url(../images/inner-page-hero-bg.png)] bg-cover bg-bottom bg-no-repeat pt-[82px] lg:pt-[106px]">
        <div class="relative">
            <div class="container">
                <div class="items-center justify-between py-10 md:flex md:h-[400px] md:py-0">
                    <div class="heading relative mb-0 text-center ltr:md:text-left rtl:md:text-right">
                        <h6>{{ config('app.name') }}</h6>
                        <div id="slogan-container" class="!text-white">
                            <h4 id="slogan-text" style="color: white">Cahaya Ilmu, Jalan Menuju Surga.</h4>
                        </div>
                    </div>
                    <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                        <svg width="302" height="300" viewBox="0 0 302 300" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mx-auto rtl:rotate-y-180 md:mx-0">
                            <path
                                d="M94.4236 81.8323C95.2652 76.3572 99.8962 70.702 104.226 67.9645C104.677 67.6644 105.127 67.3927 105.579 67.1226C115.381 73.9151 133.304 84.9015 154.352 88.2409C155.976 88.511 157.96 88.1193 159.194 89.2329C163.071 92.6923 163.853 104.786 173.445 105.056C174.77 108.427 175.971 111.675 177.265 114.443C175.697 112.245 164.238 114.329 161.328 114.984C158.474 115.616 146.159 118.973 146.684 121.603C144.519 116.938 145.36 112.217 146.774 107.282C129.604 103.974 105.819 91.8204 94.4236 81.8323Z"
                                fill="#B476E5" />
                            <path
                                d="M244.589 132.582C247.643 135.519 251.499 137.484 255.669 138.228C259.839 138.972 264.136 138.463 268.016 136.764C271.897 135.065 275.187 132.253 277.47 128.684C279.753 125.114 280.927 120.947 280.843 116.71C280.759 112.473 279.421 108.356 276.999 104.88C274.576 101.404 271.177 98.7245 267.233 97.1808C263.288 95.637 258.974 95.2983 254.837 96.2072C250.699 97.1163 246.924 99.2322 243.989 102.288C242.038 104.315 240.506 106.708 239.481 109.328C238.455 111.949 237.956 114.746 238.011 117.559C238.067 120.373 238.677 123.148 239.806 125.726C240.934 128.304 242.56 130.634 244.589 132.582Z"
                                fill="#B476E5" />
                            <path
                                d="M14.4388 216.784C12.2741 209.294 5.05674 211.579 1.08727 207.066C0.365696 213.957 4.15517 220.876 11.0109 221.206L14.4388 216.784Z"
                                fill="#B476E5" />
                            <path
                                d="M177.626 231.615C180.362 233.21 185.473 229.901 191.066 223.582C190.968 225.762 190.35 227.888 189.263 229.781C185.473 236.88 185.653 254.388 181.444 253.159C180.271 252.798 178.888 246.841 177.654 240.014C177.016 236.715 176.172 233.46 175.128 230.266C175.651 230.532 177.102 231.265 177.626 231.615Z"
                                fill="#47BDFF" />
                            <path
                                d="M160.125 80.7505C159.573 82.3565 158.76 83.8605 157.719 85.2019C155.074 84.8118 152.134 84.0093 151.586 82.7961C151.49 82.5917 151.41 82.3805 151.345 82.1643C152.036 84.36 156.036 82.8862 160.125 80.7505Z"
                                fill="#47BDFF" />
                            <path
                                d="M156.577 64.5948C161.9 58.9997 179.249 63.3911 191.006 71.9054C202.823 80.4482 199.425 88.4507 184.12 84.7812C185.022 85.0513 194.826 87.9989 201.23 95.3648C210.642 106.195 202.463 110.346 191.914 108.181C179.316 105.593 168.49 95.2448 164.822 88.0842C163.138 83.8654 161.995 79.4497 161.421 74.9431C165.811 71.3636 163.135 68.1143 160.73 70.5817C159.437 71.9054 157.993 71.2736 159.587 66.9485C157.981 65.9517 156.053 65.6327 156.577 64.5948Z"
                                fill="#47BDFF" />
                            <path
                                d="M116.434 239.497C116.99 232.354 116.909 225.176 116.194 218.047C121.899 219.658 127.951 219.565 133.604 217.777C133.484 222.772 135.047 225.298 133.754 228.397C132.977 230.134 131.875 231.706 130.507 233.028C124.853 238.745 120.012 255.59 116.314 253.185C115.291 252.52 115.683 246.416 116.434 239.497Z"
                                fill="#47BDFF" />
                            <path
                                d="M172.995 113.481C173.265 114.877 173.689 116.239 174.258 117.542C179.159 115.105 178.016 113.511 172.995 113.481Z"
                                fill="#47BDFF" />
                            <path
                                d="M146.654 121.567C146.775 122.139 147.587 122.5 148.94 122.673C148.428 121.741 147.977 120.897 147.587 120.055C146.895 120.64 146.565 121.151 146.654 121.567Z"
                                fill="#47BDFF" />
                            <path
                                d="M133.183 167.719L136.341 176.773C136.461 173.254 136.581 169.794 136.643 166.395L133.183 167.719Z"
                                fill="#47BDFF" />
                            <path
                                d="M241.172 231.644C249.247 217.816 259.962 206.038 265.024 207.989C271.875 210.63 262.58 231.81 257.249 241.06C248.289 256.583 237.463 267.112 232.948 264.682C226.384 261.024 237.107 238.605 241.172 231.644Z"
                                fill="#47BDFF" />
                            <path
                                d="M185.653 199.065C194.554 183.662 205.349 173.254 209.8 175.844C214.28 178.43 210.672 192.991 201.801 208.393C192.931 223.795 182.105 234.174 177.656 231.614C173.175 229.028 176.783 214.467 185.653 199.065Z"
                                fill="#47BDFF" />
                            <path
                                d="M175.13 230.26C176.171 233.454 177.015 236.71 177.656 240.008C178.875 246.839 180.269 252.803 181.445 253.154C185.647 254.418 185.489 236.884 189.264 229.775C190.354 227.884 190.972 225.758 191.068 223.577"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M71.0597 117.06C71.6597 116.088 72.4649 115.261 73.4202 114.635C74.3755 114.01 75.4555 113.603 76.586 113.442C77.7165 113.281 78.8676 113.371 79.9586 113.705C81.0497 114.039 82.0555 114.609 82.9018 115.374C83.2365 114.231 83.8318 113.181 84.637 112.305C85.4439 111.429 86.4418 110.751 87.5533 110.324C88.6633 109.896 89.8586 109.73 91.0444 109.839C92.2302 109.947 93.3733 110.328 94.3886 110.951C95.2665 111.492 96.0291 112.201 96.6323 113.037C97.237 113.873 97.6696 114.82 97.9065 115.824C99.1554 114.883 100.659 114.34 102.22 114.268C103.782 114.196 105.329 114.598 106.659 115.42C107.988 116.243 109.038 117.449 109.671 118.879C110.304 120.309 110.489 121.897 110.205 123.435C111.22 123.169 112.278 123.109 113.315 123.259C114.354 123.409 115.351 123.766 116.249 124.309C117.263 124.931 118.119 125.778 118.753 126.784C119.388 127.791 119.783 128.929 119.907 130.112C120.032 131.295 119.884 132.491 119.473 133.608C119.064 134.724 118.403 135.732 117.542 136.553C118.597 136.968 119.547 137.61 120.327 138.432C121.107 139.253 121.7 140.236 122.06 141.311C122.421 142.385 122.543 143.526 122.416 144.652C122.292 145.779 121.921 146.864 121.332 147.833C120.509 149.194 119.279 150.262 117.819 150.888C116.356 151.513 114.735 151.665 113.183 151.322L71.2065 125.574C70.1502 124.937 68.8665 120.603 71.0597 117.06Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M102.902 129.002C101.911 129.937 101.271 131.185 101.091 132.537C100.911 133.888 101.202 135.261 101.916 136.423C102.629 137.585 103.72 138.465 105.006 138.916C106.292 139.368 107.694 139.362 108.977 138.9"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M84.1997 123.709C84.367 124.926 84.9039 126.062 85.7407 126.961C86.5776 127.86 87.6718 128.478 88.8718 128.732C90.0733 128.985 91.3239 128.861 92.4528 128.377C93.5802 127.892 94.5307 127.071 95.1749 126.025C95.4481 125.573 95.6597 125.088 95.8065 124.581"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M82.9067 115.374C83.7152 116.137 84.3862 117.033 84.8915 118.023" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M114.805 136.046C115.738 136.093 116.66 136.265 117.547 136.557" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M97.9113 115.826C98.1087 116.806 98.1403 117.812 98.0077 118.803" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M107.23 124.831C108.132 124.192 109.141 123.72 110.21 123.436" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M60.3547 134.448C62.5858 130.772 67.1899 130.116 67.992 130.718L110 156.499C111.201 157.221 112.851 161.589 110.57 165.282C109.976 166.247 109.179 167.072 108.235 167.696C107.289 168.322 106.218 168.731 105.097 168.897C103.976 169.061 102.833 168.979 101.747 168.655C100.662 168.331 99.6594 167.773 98.813 167.02C98.3315 168.677 97.3083 170.125 95.9094 171.135C94.5104 172.144 92.8147 172.656 91.0904 172.591C89.3662 172.525 87.7131 171.885 86.3946 170.772C85.0762 169.659 84.1683 168.137 83.8131 166.448C82.572 167.399 81.072 167.953 79.5105 168.037C77.9489 168.122 76.3984 167.732 75.061 166.919C73.7252 166.105 72.6657 164.908 72.0215 163.481C71.3789 162.055 71.1815 160.468 71.4547 158.927C69.7889 159.349 68.0299 159.205 66.4542 158.52C64.8784 157.833 63.5742 156.642 62.7484 155.135C61.9226 153.626 61.621 151.887 61.891 150.187C62.161 148.49 62.9868 146.929 64.2389 145.751C63.1731 145.347 62.2084 144.713 61.4142 143.893C60.6215 143.074 60.0168 142.09 59.6457 141.011C59.2763 139.932 59.1468 138.785 59.27 137.65C59.3916 136.516 59.7626 135.422 60.3547 134.448Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M85.463 157.461C85.7725 156.414 86.363 155.472 87.1714 154.739C87.9798 154.006 88.973 153.51 90.0451 153.305C91.1172 153.1 92.224 153.195 93.2456 153.577C94.2672 153.961 95.1641 154.616 95.8367 155.476C96.4951 156.324 96.9198 157.33 97.0698 158.393"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M72.2614 143.207C73.4188 142.808 74.6724 142.775 75.8503 143.113C77.0267 143.452 78.0719 144.145 78.8409 145.098C79.6098 146.052 80.0677 147.22 80.1482 148.443C80.2303 149.666 79.9335 150.885 79.2988 151.932C79.0272 152.387 78.6925 152.802 78.3056 153.166"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M64.2341 145.759C65.2936 146.151 66.413 146.355 67.542 146.361" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M97.1488 164.849C97.5988 165.651 98.1593 166.386 98.813 167.033" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M71.4498 158.935C72.4177 158.657 73.3335 158.223 74.1609 157.649" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M83.7231 163.233C83.5794 164.306 83.6094 165.393 83.8083 166.456" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M110 156.499L114.479 159.205" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M113.186 151.324L117.607 154.001" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M136.49 172.592L184.24 201.591" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M137.453 166.064L187.278 196.358" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M95.0552 82.3733C84.361 81.3836 73.6084 83.5062 64.0921 88.4856C54.5758 93.4648 46.6985 101.089 41.4106 110.441C25.438 137.903 33.8048 173.371 60.0847 189.649C76.5231 199.831 81.0847 194.448 113.006 203.55"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M177.312 231.381C162.71 223.762 149.66 217.102 136.22 211.61" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M175.641 150.21C185.773 158.333 196.87 166.245 209.83 175.812" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M132.1 102.98C138.402 112.459 145.472 121.404 153.239 129.724" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M105.609 67.1526C100.528 70.0102 95.3552 75.877 94.4236 81.8323C105.82 91.8204 129.604 103.974 146.774 107.282C145.36 112.217 144.519 116.94 146.684 121.603C146.159 118.976 158.294 115.662 161.328 114.984C164.29 114.322 175.709 112.266 177.265 114.443C175.971 111.675 174.768 108.426 173.445 105.056C163.853 104.786 163.087 92.675 159.194 89.2329C157.967 88.1493 156.036 88.5126 154.352 88.2409C133.316 84.8178 115.381 73.9214 105.579 67.1226L105.609 67.1526Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M175.543 119.798C166.935 119.661 158.457 121.914 151.051 126.306" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M151.484 82.4842C152.464 84.1997 156.254 82.7717 160.125 80.7466C159.573 82.3528 158.76 83.8569 157.719 85.198"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M155.467 88.3522C157.562 87.8372 157.002 86.8167 157.719 85.2008C152.066 84.3651 151.087 83.3241 151.319 80.4903C151.659 76.3737 154.075 67.4044 156.577 64.5942"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M146.773 107.282C148.518 107.613 150.201 107.854 151.766 108.005" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M159.583 66.9428C157.99 71.2742 159.425 71.9061 160.726 70.576C163.133 68.1102 165.808 71.3659 161.418 74.9374C161.99 79.4456 163.132 83.8628 164.816 88.0833C168.484 95.2438 179.309 105.592 191.907 108.18C202.463 110.345 210.642 106.194 201.223 95.3639C194.819 87.9932 185.015 85.0456 184.114 84.7802C199.419 88.4498 202.813 80.452 191 71.9045C179.24 63.3949 161.893 58.9988 156.571 64.5939C156.062 65.6238 158.038 65.9871 159.583 66.9428Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M173.445 105.056C171.857 100.757 169.81 96.642 167.341 92.7819C166.364 91.3206 165.529 89.7697 164.846 88.1504"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M153.193 129.676C151.108 126.604 149.23 123.396 147.571 120.075" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M87.8678 65.6792C83.3283 64.5956 79.591 66.6428 79.9004 68.3867C79.9699 68.7363 80.1136 69.0671 80.3204 69.3573C80.5288 69.6476 80.7941 69.8906 81.102 70.0706"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M88.2893 62.9107C83.5083 61.7671 78.7572 64.1745 80.8019 66.7019" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M94.9349 79.6664C92.1055 76.4353 88.4755 74.0076 84.4097 72.6274" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M88.0494 68.9266C83.6283 68.0246 80.7168 69.7686 80.892 71.4841C81.1083 73.5897 85.3131 76.779 88.861 74.7334"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M91.7773 61.3158C91.7173 61.2558 89.8825 58.6999 90.6941 57.8864C91.3857 57.1945 101.369 65.4071 104.166 68.0246"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M86.0345 62.6099C78.0956 58.7903 75.964 54.1825 77.464 55.0276C82.4693 57.5345 87.6103 59.764 92.8603 61.7064C96.9245 63.2533 100.742 65.3816 104.196 68.025"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M116.194 218.047C116.903 225.176 116.983 232.354 116.434 239.497C115.668 246.414 115.292 252.521 116.314 253.185C120.015 255.587 124.864 238.756 130.507 233.028C131.878 231.708 132.98 230.134 133.753 228.397C135.05 225.293 133.479 222.762 133.605 217.751"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M185.654 199.065C176.772 214.461 173.172 229.033 177.656 231.606C182.102 234.168 192.931 223.785 201.801 208.385C210.672 192.985 214.277 178.434 209.8 175.841C205.324 173.249 194.543 183.656 185.654 199.065Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M231.293 256.205C233.541 242.204 247.057 218.911 258.031 210.499C263.699 206.106 267.759 206.883 267.294 214.251C266.413 228.231 250.853 255.201 239.238 263.115C232.79 267.507 230.017 264.152 231.293 256.205Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M232.649 264.525L223.722 259.358C222.862 258.683 222.277 257.718 222.078 256.644C221.878 255.57 222.078 254.459 222.639 253.521C219.086 258.875 212.115 253.347 214.911 248.708C212.317 253.131 204.16 250.275 207.514 243.565C206.754 244.55 205.67 245.234 204.455 245.498C203.24 245.763 201.97 245.59 200.87 245.008C197.238 242.689 198.585 238.18 200.838 230.839C205.053 218.232 211.738 206.591 220.504 196.6C222.61 194.09 225.022 191.852 227.683 189.94C231.891 187.329 236.625 189.286 234.997 196.39C236.336 194.158 237.907 192.698 240.561 193.411C241.231 193.597 241.849 193.937 242.366 194.401C242.884 194.867 243.286 195.445 243.542 196.093C243.798 196.739 243.901 197.437 243.843 198.131C243.785 198.824 243.567 199.494 243.206 200.089C243.206 200.089 246.321 196.15 249.852 198.947C250.728 199.631 251.319 200.617 251.508 201.712C251.697 202.808 251.472 203.934 250.875 204.873C251.159 204.37 251.54 203.931 251.995 203.577C252.451 203.223 252.971 202.964 253.528 202.813C254.084 202.661 254.665 202.623 255.236 202.697C255.808 202.772 256.359 202.96 256.857 203.249L265.261 208.086"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M14.4389 216.785C18.1479 218.833 21.7037 221.146 25.0826 223.704C35.0078 231.373 44.6884 241.001 43.3984 242.686C42.1084 244.372 30.3752 237.456 20.4263 229.78C17.0915 227.158 13.9558 224.293 11.0442 221.206"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M14.4388 216.785C12.2741 209.295 5.05674 211.58 1.08727 207.067C0.365696 213.958 4.15517 220.877 11.0109 221.207L14.4388 216.785Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M23.8353 222.761L19.1901 228.787" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.37158 72.6875L11.311 81.5162H4.09527L8.06473 90.3464" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M147.587 290.758L163.583 291.24" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M155.344 299L155.826 282.995" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M172.995 113.481C173.265 114.877 173.689 116.239 174.258 117.542C179.159 115.105 178.016 113.511 172.995 113.481Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M146.683 121.603C146.829 122.148 147.601 122.503 148.907 122.68" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M172.995 113.481C173.488 116.899 175.222 120.015 177.866 122.234C189.683 131.62 189.866 144.766 181.234 154.604"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M265.786 208.415L279.11 215.972" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M233.26 264.856L245.221 271.836" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M250.995 275.476L259.865 280.65" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M285.304 219.852L294.354 224.997" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M257.219 241.06L286.357 258.297" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M292.159 261.939L301 267.082" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M244.589 132.582C247.643 135.519 251.499 137.484 255.669 138.228C259.839 138.972 264.136 138.463 268.016 136.764C271.897 135.065 275.187 132.253 277.47 128.684C279.753 125.114 280.927 120.947 280.843 116.71C280.759 112.473 279.421 108.356 276.999 104.88C274.576 101.404 271.177 98.7245 267.233 97.1808C263.288 95.637 258.974 95.2983 254.837 96.2072C250.699 97.1163 246.924 99.2322 243.989 102.288C242.038 104.315 240.506 106.708 239.481 109.328C238.455 111.949 237.956 114.746 238.011 117.559C238.067 120.373 238.677 123.148 239.805 125.726C240.934 128.304 242.56 130.634 244.589 132.582Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M238.035 118.408C231.389 121.567 227.456 124.568 228.021 126.464C229.033 129.887 243.989 128.57 261.458 123.515C278.928 118.46 292.284 111.584 291.288 108.156C290.719 106.199 285.665 105.778 278.183 106.712"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M180.053 140.765C179.181 146.24 176.105 151.26 171.964 152.558C159.031 156.606 136.633 166.426 136.633 166.426C136.354 181.919 134.952 198.967 136.452 216.785C129.28 219.806 121.231 219.987 113.93 217.296C112.667 200.48 111.857 184.355 112.157 169.464C112.225 165.758 113.082 162.111 114.673 158.763C116.267 155.418 118.555 152.449 121.387 150.061C133.073 140.396 146.102 132.482 160.065 126.567"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M136.641 166.426L133.183 167.72L136.34 176.774" stroke="white" stroke-width="0.75"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M135.828 204.901C128.518 207.411 120.647 207.797 113.126 206.015" stroke="white"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M142.444 1V6.02486" stroke="white" stroke-width="0.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M132.672 10.7759H137.694" stroke="white" stroke-width="0.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M142.444 20.5542V15.5293" stroke="white" stroke-width="0.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M152.216 10.7759H147.192" stroke="white" stroke-width="0.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M137.694 10.777C138.318 10.7786 138.937 10.6569 139.513 10.4187C140.091 10.1805 140.615 9.83047 141.056 9.38895C141.498 8.94744 141.847 8.423 142.085 7.84564C142.324 7.26846 142.445 6.64984 142.444 6.02539C142.442 6.64972 142.564 7.26821 142.802 7.84532C143.039 8.42252 143.39 8.94681 143.83 9.38848C144.272 9.82999 144.797 10.1799 145.373 10.4183C145.949 10.6565 146.568 10.7784 147.192 10.777C146.568 10.7756 145.949 10.8975 145.373 11.1359C144.795 11.3743 144.271 11.7243 143.83 12.1661C143.39 12.6078 143.039 13.1324 142.801 13.7098C142.564 14.287 142.442 14.9057 142.444 15.5302C142.445 14.9056 142.324 14.2868 142.085 13.7093C141.849 13.1319 141.498 12.6072 141.058 12.1655C140.615 11.7238 140.091 11.3738 139.515 11.1354C138.937 10.897 138.318 10.7753 137.694 10.777Z"
                                stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-12 pb-14 md:pb-[100px]">
        <div class="container">
            <!-- Filter Button -->
            <div class="overflow-x-auto">
                <ul
                    class="filters portfolio-filter mx-auto flex w-max gap-7 whitespace-nowrap pb-2.5 font-bold dark:text-white">
                    <li class="active filter" data-filter="all">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">Semua</button>
                    </li>
                    <li class="filter" data-filter="pengajian">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">Pengajian</button>
                    </li>
                    <li class="filter" data-filter="tpa">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">TPA</button>
                    </li>
                    <li class="filter" data-filter="kultum">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">Kultum</button>
                    </li>
                    <li class="filter" data-filter="majelis">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">Majelis</button>
                    </li>
                    <li class="filter" data-filter="hari besar">
                        <button type="button"
                            class="rounded-[10px] bg-gray/5 py-4 px-5 leading-5 transition hover:bg-secondary hover:text-white">Hari
                            Besar</button>
                    </li>
                </ul>
            </div>

            <!-- Table -->
            <table class="table-auto w-full mt-8 border border-gray-300 text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Nama Kegiatan</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Type</th>
                        <th class="p-2 border">Harga</th>
                        <th class="p-2 border">Link</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($dataKajian as $kajian)
                    <tr class="fade" data-filter="{{ $kajian->kategori }}">
                        <td class="p-2 border">
                            <a href="{{ route('home.detail', ['kategori' => $kajian->kategori, 'uuid' => $kajian->uuid]) }}" class="inline-block"> {{ $kajian->nama }} </a>
                        </td>
                        <td class="p-2 border">{{ ucwords($kajian->kategori) }}</td>
                        <td class="p-2 border">
                            @if ($kajian->type == 'Berbayar')
                            <span class="inline-block bg-danger px-4 py-1 text-xs capitalize text-white rounded">
                                {{ $kajian->type }}
                              </span>
                            @else
                            <span class="inline-block bg-secondary px-4 py-1 text-xs capitalize text-white rounded">
                                {{ $kajian->type }}
                              </span>
                            @endif
                          </td>
                        <td class="p-2 border">
                            @if ($kajian->type == 'Berbayar')
                                Rp{{ number_format($kajian->harga, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="p-2 border">
                            <a href="#"
                               onclick="handleDaftarClick(this)"
                               data-type="{{ $kajian->type }}"
                                data-uuid="{{ $kajian->uuid }}"
                                data-kategori="{{ $kajian->kategori }}"
                               class="inline-block bg-primary px-4 py-1 text-xs capitalize text-white rounded dark:bg-white dark:text-black dark:hover:bg-secondary transition">
                                Daftar
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </section>

</div>
<script>
    const slogans = [
        "Cahaya Ilmu, Jalan Menuju Surga.",
        "Bersama dalam Ilmu, Bergerak dalam Iman.",
        "Upgrade Iman, Bareng Kajian!",
        "Bangkitkan Hati, Sebarkan Kebaikan.",
        "Kajian Hari Ini, Bekal Hidup Abadi.",
        "Mendekat kepada Allah, Menenangkan Jiwa.",
        "Ngaji Asik, Hidup Lebih Baik!"
    ];

    let index = 0;
    const sloganText = document.getElementById("slogan-text");

    function changeSlogan() {
        // Fade out
        sloganText.classList.remove("show");

        // Setelah fade out selesai, ganti teks dan fade in
        setTimeout(() => {
            index = (index + 1) % slogans.length;
            sloganText.textContent = slogans[index];
            sloganText.classList.add("show");
        }, 1000); // Waktu fade-out: 1 detik
    }

    // Mulai dengan teks pertama yang langsung muncul
    window.onload = () => {
        sloganText.classList.add("show");
        setInterval(changeSlogan, 4000); // Ganti setiap 4 detik
    };

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter");
        const rows = document.querySelectorAll("#tableBody tr");

        filterButtons.forEach(button => {
            button.addEventListener("click", function () {
                const filter = this.getAttribute("data-filter");

                // Tambahkan/ubah kelas "active"
                filterButtons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                rows.forEach(row => {
                    const rowFilter = row.getAttribute("data-filter");

                    if (filter === "all" || filter === rowFilter) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            });
        });
    });

</script>
<script>
    function handleDaftarClick(element) {
        const isLoggedIn = @json(Auth::check());
        const type = element.getAttribute('data-type');
        const uuid = element.getAttribute('data-uuid');
        const kategori = element.getAttribute('data-kategori');

        if (!isLoggedIn) {
            // Tampilkan peringatan jika belum login
            Swal.fire({
                title: 'Oops!',
                text: 'Silakan login terlebih dahulu untuk mendaftar.',
                icon: 'warning',
                confirmButtonText: 'Login',
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        } else {
            if (type === 'Berbayar') {
                Swal.fire({
                    title: 'Upload Bukti Pembayaran',
                    html: `
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <input type="file" id="bukti" class="swal2-file" accept="image/*">
                            <label style="font-size:8pt">
                                <input type="checkbox" id="persetujuan" checked disabled style="margin-right: 8px;">
                                Saya menyetujui syarat dan ketentuan yang berlaku
                            </label>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Kirim',
                    cancelButtonText: 'Batal',
                    didOpen: () => {
                        document.getElementById('bukti').addEventListener('change', function () {
                            console.log('File selected:', this.files[0]);
                        });
                    },
                    preConfirm: () => {
                        const fileInput = document.getElementById('bukti');
                        const file = fileInput.files[0];
                        const setuju = document.getElementById('persetujuan').checked;

                        if (!file) {
                            Swal.showValidationMessage('Silakan unggah bukti pembayaran terlebih dahulu.');
                            return false;
                        }

                        const formData = new FormData();
                        formData.append('bukti', file);
                        formData.append('persetujuan', setuju);
                        formData.append('uuid', uuid);
                        formData.append('kategori', kategori);

                        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                        const token = tokenMeta ? tokenMeta.getAttribute('content') : '{{ csrf_token() }}';

                        return fetch('{{ route("daftar.submit") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token
                                // Jangan tambahkan Content-Type!
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Gagal mengirim data');
                            return response.json();
                        })
                        .then(data => {
                            Swal.fire('Berhasil!', 'Pendaftaran berhasil dikirim.', 'success')
                            .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '{{ route("verifikasi.index") }}'; // Ganti dengan URL tujuan
                                    }
                                });
                        })
                        .catch(error => {
                            Swal.fire('Error!', error.message, 'error');
                        });
                    }
                });

            } else {
                Swal.fire({
                    title: 'Agreement',
                    html: `
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <label style="font-size:8pt">
                                <input type="checkbox" id="persetujuan" checked disabled style="margin-right: 8px;">
                                Saya menyetujui syarat dan ketentuan yang berlaku
                            </label>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Kirim',
                    cancelButtonText: 'Batal',
                    didOpen: () => {
                        document.getElementById('bukti').addEventListener('change', function () {
                            console.log('File selected:', this.files[0]);
                        });
                    },
                    preConfirm: () => {
                        const setuju = document.getElementById('persetujuan').checked;

                        const formData = new FormData();
                        formData.append('persetujuan', setuju);
                        formData.append('uuid', uuid);
                        formData.append('kategori', kategori);

                        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                        const token = tokenMeta ? tokenMeta.getAttribute('content') : '{{ csrf_token() }}';

                        return fetch('{{ route("daftar.submit") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token
                                // Jangan tambahkan Content-Type!
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Gagal mengirim data');
                            return response.json();
                        })
                        .then(data => {
                            Swal.fire('Berhasil!', 'Pendaftaran berhasil dikirim.', 'success')
                            .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '{{ route("verifikasi.index") }}'; // Ganti dengan URL tujuan
                                    }
                                });
                        })
                        .catch(error => {
                            Swal.fire('Error!', error.message, 'error');
                        });
                    }
                });
            }
        }
    }
</script>

@include('home.layout.footer')
