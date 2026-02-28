@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <main class="layout-container flex h-full grow flex-col items-center w-full">
        <div class="w-full max-w-[1400px] px-6 lg:px-8 py-10 flex flex-col gap-10">
            <div class="flex flex-col md:flex-row items-center justify-between min-h-[480px] bg-cover bg-center bg-no-repeat rounded-3xl p-8 md:p-12 relative overflow-hidden shadow-xl shadow-sky-200/50"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD-khyIKnefmWj0fqn55vC3UfE_14_BasfitlJyJkgmt9StKUxH0LEE0nDznyDsdiF3HkC2zKMKIOVDvNnGi4vPMuaSqhExHuOlG7a22DR5jKqTFCylYyBrToQ3T17C7ZU2AHRy758Fkotb7xV-35PIp8IkCTAJWpUx7e2zMJrcrqgEa62o5wY7LJaDlaoUVIjE7SyBwpp2VZqaiYb8sVN_-LoWKpdFRR9CymxjJFeJhhDoGHgAtjLtP3AnZ47rf4qgUmrO-GSaWik");'>

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-sky-900/50 backdrop-blur-[2px]"></div>

                {{-- Content --}}
                <div class="flex flex-col gap-4 max-w-2xl relative z-10 text-white">

                    <div
                        class="inline-flex self-start items-center gap-2 px-4 py-2 rounded-full bg-white text-slate-900 shadow-sm font-bold">
                        <span class="animate-bounce">👋</span>
                        Halo Teman-teman!
                    </div>

                    <h1 class="text-4xl md:text-6xl font-black leading-tight tracking-tight drop-shadow-md">
                        Temukan Petualangan
                        <span class="underline decoration-wavy decoration-yellow-300">
                            Seru
                        </span>
                        Berikutnya!
                    </h1>

                    <p class="text-sky-100 text-xl font-medium max-w-lg mt-2 drop-shadow-sm">
                        Ayo jelajahi ribuan buku cerita, sains, dan komik yang siap menemani
                        hari-harimu belajar dan bermain.
                    </p>

                </div>

                {{-- Icon kanan --}}
                <div class="hidden md:block relative z-10">
                    <span
                        class="material-symbols-outlined text-[180px] text-yellow-300 rotate-12 drop-shadow-2xl opacity-90">
                        local_library
                    </span>
                </div>

            </div>
            <div
                class="flex flex-col lg:flex-row items-stretch lg:items-center gap-4 w-full sticky top-24 z-40 bg-background-light/95 py-4 backdrop-blur-sm">

                {{-- Wrapper supaya search full --}}
                <div class="flex w-full gap-3">

                    {{-- SEARCH FULL WIDTH --}}
                    <div class="flex-1">
                        <label
                            class="group flex items-center w-full h-14 rounded-2xl bg-white border-2 border-slate-200 focus-within:border-primary focus-within:ring-4 focus-within:ring-primary/20 transition-all shadow-md">

                            <div class="pl-5 text-slate-400 flex items-center justify-center">
                                <span
                                    class="material-symbols-outlined text-2xl group-focus-within:text-primary transition-colors">
                                    search
                                </span>
                            </div>

                            <input
                                class="w-full h-full bg-transparent border-none text-slate-800 placeholder:text-slate-400 focus:ring-0 px-4 text-lg font-medium"
                                placeholder="Cari judul buku atau pengarang..." />
                        </label>
                    </div>

                    <div class="flex gap-3">

                        <button
                            class="flex h-14 items-center gap-2 px-6 rounded-2xl bg-accent-blue text-dark text-base font-bold shadow-md hover:scale-105 transition">
                            <span class="material-symbols-outlined text-[20px]">
                                grid_view
                            </span>
                            Fiksi
                        </button>

                        <button
                            class="flex h-14 items-center gap-2 px-6 rounded-2xl bg-white border-2 border-slate-200 text-slate-700 font-bold text-base hover:bg-slate-100 transition">
                            <span class="material-symbols-outlined text-[20px]">
                                rocket_launch
                            </span>
                            Non Fiksi
                        </button>

                    </div>

                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md rotate-3 uppercase tracking-wide">Cerita
                            Seru</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAynFto-TkjmU-U9cu9HXPkCvtUWoDNkNPGLmkggc9lgSSQEteyDsvU7cf91AVr_kNY0jrBWOWbxefp5P6WHEw-FwjJVRg7QgNs6sM8MnGLZWykMZWdFhSzUKAQ8HPq74GLhUN7SLVo8HzBDd0yLxXKvZdIpHlDRX_Jkm29h0EoaaxZDbyzt6dPvnzMPqA79SHXe2or11aGb2WjhgT-P907dgOWYgHqLiN82hQ_VfmcftugD7JZRDW3TgXb3wLo0m5j6i0ky687mp8");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star_half</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.8)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            The Great Gatsby</h3>
                        <p class="text-slate-500 text-sm font-semibold">F. Scott Fitzgerald</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md -rotate-2 uppercase tracking-wide">Fiksi</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDESRMyIVuZehGq3YDzaLrfPYJ6yaXsKYWxWEWKLxrGZx_cJDkV19rTjxNODMr4EqgoUHXih19QUUeu5e_wf12lVt0xTbttHfSAjPelcq2ihgLY6rcnJhZNf-Smtz4aEsaTdpsgMojYYV7h87iYNM35xK9ArrLxDonaxPLM8BbwRe1h2hDKYGfzyDZ-gUsmVOpck7JrHqskwGJFHxBIw2S3W9nCoA-yE2fQJqbVsgBQ9JGvyWkRjHXB0cLHwTkYMOF_FJvNmfy3cpE");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl text-slate-200">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.0)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Norwegian Wood</h3>
                        <p class="text-slate-500 text-sm font-semibold">Haruki Murakami</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-slate-200 text-slate-500 font-bold text-base flex items-center justify-center gap-2 cursor-not-allowed">
                        <span class="material-symbols-outlined">schedule</span>
                        Antrian
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-science text-white text-xs font-black shadow-md rotate-1 uppercase tracking-wide">Sains
                            &amp; Alam</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAr_YkeonWNHi7eAmmvUEMZXwCMf_feV0fY13G7H84v2wdmdfEHhp2OeurUAvYgvd6irJBXMYCKYelRY2TsusASNiVAyCIoHcWtlpdFq-L03fgzbm4w_gnfXvqdfhiFA08--ewYEKl_-FDQZeSnHXLxsq1QjgIrM-aYytk7DFbsCB3YW1UA2oZ6G-Q70EGX5JhhYztpgVxDU-qnCfY00ycjmXbrBGihqnQlyOmQhq8CFGzsQyw9tNqTsR1RwiYxFKfWJN6wXfRTD58");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(5.0)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Dune</h3>
                        <p class="text-slate-500 text-sm font-semibold">Frank Herbert</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-slate-500 text-white text-xs font-black shadow-md -rotate-3 uppercase tracking-wide">Filsafat</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAOny9M9LJwsXbyeNVcouv_2XpsG1uafycCBIwpzO7id_dYXV2yfIKhsRKzgQ9ZfgEeg0U7iYAV74HDmOw7v1raJ8ca_6cg_aK8OJyVPqvtPYib4X9sDfrC-TXkEQpTcXuZGz76DiKx0tI-swI9TBLzuBlVxVSFU_gu8Ghne-RJvnU5fpsaq_tComcRDanhYq2ZUMBvWph53YHbd-o80YW9w63G1ioApmaGO9R3Jt4T0nqt-bwjH4KKAfEVjtwBHjygoZzDGFANI0M");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl text-slate-200">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.2)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Meditations</h3>
                        <p class="text-slate-500 text-sm font-semibold">Marcus Aurelius</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-science text-white text-xs font-black shadow-md rotate-2 uppercase tracking-wide">Psikologi</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZlX0KNBoCEw_V-BxkXt20p8knZx25MtXPAjXI9y2vMQe2rmZ2ZaTXqzFDXWAgSNP_754ZKcZRj8pwLiCQYXBmQ4EnCNQmKUp94Tkudz5PsUYNT1v5vauEAL9qnOq2a9uFdeDOxQtC6JJqQzm08PlXsKPNa99ZybJYtg3i3KHdBPTo0IsHVkn1xEMIiFAU7hne9CBbSOCf8eUNZ99eRFcUnX4mDfwVkTIwfWIsnDPx874vQRNhxvmCbIUkaC0GoBiqeTNCkfhcezw");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star_half</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.6)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Thinking, Fast and Slow</h3>
                        <p class="text-slate-500 text-sm font-semibold">Daniel Kahneman</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md -rotate-1 uppercase tracking-wide">Sejarah</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuANb127GCyoyEqe16sSeTI6JrbaLLecDGiQBXexpIk9mkYgrcNbi-0_zga1xfmf7tmJmv9y1lDY_37dMAtCPZQDHKITikGmJEeFH965pGUbboQG6rjW-PxtemahNbfHnsR1xdWN9QpMSmT1rq6jwLWcJgjP56wm_YQ-n1kQcFx7i6gr7ya1EuoVTEafzJBP06gRekqaykYOEUVK2HVJNS0PKWV3vEtGh1Z5fUw-iTBTn6EJT5Bl76c5_RKo80AIRYTpjGFn6qp8ZDg");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.9)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Sapiens</h3>
                        <p class="text-slate-500 text-sm font-semibold">Yuval Noah Harari</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md rotate-3 uppercase tracking-wide">Biografi</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBLlh7BjiO9UU7DmAh5wtFaapXJEzR-YBOJgEdwpiOtUmDMSjGA2mbBMZ3Kw9kZSnykqCpkdePqbcjW09FJJGQsfnqu0n_s7K8xxclVGKJCp37h1FSnog-Sz6Eg4OC6zXR07g_7C8ukySh8mtwhA7OdqARTVEXv-J4z9JUSMBRNCcwUYpduvopIDcFxVtixVAgyPfvLQD7pazQ7bduJlcfOczNU-Neltz-bGbQyhXKQiIi_7du85EEKRvci9zWWKLwO7RlLUzx7jYU");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl text-slate-200">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.3)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Educated</h3>
                        <p class="text-slate-500 text-sm font-semibold">Tara Westover</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-comic text-white text-xs font-black shadow-md -rotate-2 uppercase tracking-wide">Seni</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuChaBfoIrBN-rcs0TtcwgdscsYbS8NDsTSfDZKZym3NdUZV6FRJJgZP9q8_Do1KvLFOwTN87NWMdrhNoa2CkRXSFc-nGh5qzAMG-kW4LWxODs4q1FdX9ckenNifOo1R8K5TwAQEBFFvjurvlf3rE5h--OCyqlIaOvT_3SaAB_TUT_wztiZYU7RgYSOL7_6C9sIauEHadAcOlBvfVMLSMV0xVaOSHQfnT2tqcmgv7i58nghBI0FtGd-oMaov54oh8xwpjMmX7GdeY5c");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star_half</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.5)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            Design as Art</h3>
                        <p class="text-slate-500 text-sm font-semibold">Bruno Munari</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-slate-200 text-slate-500 font-bold text-base flex items-center justify-center gap-2 cursor-not-allowed">
                        <span class="material-symbols-outlined">schedule</span>
                        Antrian
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md rotate-1 uppercase tracking-wide">Fiksi</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCcsjgXMyEwJP5cSmiKxSiwIk1lBkZZRj8GalGysrYeLXyGP83FE3z76izMrckmHtyMrkNo-QNRFyHH9oW_XmY0WoOvmbuKy5xrKXjMU6KNsz9FnESRYONbMXr5mDq_2-OPJDojS7oQ62sj0rO9ot7JUJnXuX5066J0_U-vuvayaER3uWqj7PPZSkKiJumPbKB8aqCwcecLYXWWJ_U9DpaKBgRCeXGtRYov4m5-X8vuCxqjBUWP5-vbmKLnBqPW96Jln3m31UdllLs");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(5.0)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            The Alchemist</h3>
                        <p class="text-slate-500 text-sm font-semibold">Paulo Coelho</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
                <div
                    class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-3xl p-4 shadow-soft hover:shadow-hover transition-all duration-300 border border-slate-100 dark:border-slate-700">
                    <div class="absolute -top-3 -right-3 z-10">
                        <span
                            class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-tag-fun text-white text-xs font-black shadow-md -rotate-2 uppercase tracking-wide">Thriller</span>
                    </div>
                    <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4 bg-slate-100">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBOHgRH5mzA8gZHzzZi9t203hR0tHN9kn8Hb64r1GLgVN1eUoscm8GO7KRGpRdVZiv_jL0-a2LW21OIXbtlDyCFEhrSuBhXUIoeeab42RUGLIxB3wU58O-PawHpGbBir-KPQClQ9eoXiyPmcQbscNKqXPBzP2kvO-AwyreCwdf59l8gdAUgbhDWRnvkPYb0oe0ZVYre-DamvATc5ptjvvja_0na0HIQ5wIcCOOnqRSNXoFFXB8KR160NZFD3ws-wyb1Br1XuhaKYVU");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 flex-grow">
                        <div class="flex items-center gap-1 text-accent-yellow">
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star</span>
                            <span class="material-symbols-outlined text-xl fill-1">star_half</span>
                            <span class="text-slate-400 text-xs font-bold ml-1">(4.7)</span>
                        </div>
                        <h3 class="text-accent-blue dark:text-white text-xl font-extrabold leading-snug line-clamp-2">
                            The Silent Patient</h3>
                        <p class="text-slate-500 text-sm font-semibold">Alex Michaelides</p>
                    </div>
                    <button
                        class="mt-4 w-full h-12 rounded-xl bg-secondary text-white font-bold text-base shadow-bubbly btn-bounce flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors">
                        <span class="material-symbols-outlined">menu_book</span>
                        Pinjam Buku
                    </button>
                </div>
            </div>
            <div class="flex items-center justify-center gap-4 py-8">
                <button
                    class="flex size-12 items-center justify-center rounded-2xl bg-white border-2 border-slate-100 hover:border-primary text-slate-500 hover:text-primary transition-all shadow-sm">
                    <span class="material-symbols-outlined text-2xl">chevron_left</span>
                </button>
                <div class="flex items-center gap-2 bg-white px-2 py-1 rounded-2xl border-2 border-slate-100">
                    <button
                        class="flex size-10 items-center justify-center rounded-xl bg-primary text-white font-bold text-lg shadow-md">1</button>
                    <button
                        class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold text-lg transition-colors">2</button>
                    <button
                        class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold text-lg transition-colors">3</button>
                    <span class="text-slate-300 font-bold px-1">...</span>
                    <button
                        class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold text-lg transition-colors">12</button>
                </div>
                <button
                    class="flex size-12 items-center justify-center rounded-2xl bg-white border-2 border-slate-100 hover:border-primary text-slate-500 hover:text-primary transition-all shadow-sm">
                    <span class="material-symbols-outlined text-2xl">chevron_right</span>
                </button>
            </div>
        </div>
    </main>

@endsection
