@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'imageAlt' => '',
    'video' => '',
    'primaryButton' => [
        'text' => __('hero.view_program'),
        'url' => route('programs.work'),
    ],
    'secondaryButton' => null,
    'stats' => [],
    'bgColor' => 'bg-[#202124]',
    'textColor' => 'text-white',
])


<div class="relative {{ $bgColor }} {{ $textColor }} overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Текстовая колонка -->
            <div class="relative z-10">
                @if ($title)
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                        {!! $title !!}
                    </h1>
                @endif

                @if ($description)
                    <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
                        {{ $description }}
                    </p>
                @endif

                <div class="flex flex-col sm:flex-row gap-4">
                    @if ($primaryButton)
                        <a href="{{ $primaryButton['url'] }}"
                            class="bg-[#800F12] hover:bg-[#5C0B0D] text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300 transform hover:scale-105">
                            {{ $primaryButton['text'] }}
                        </a>
                    @endif

                    @if ($secondaryButton)
                        <a href="{{ $secondaryButton['url'] }}"
                            class="border-2 border-white hover:bg-white hover:text-[#202124] px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300">
                            {{ $secondaryButton['text'] }}
                        </a>
                    @endif
                </div>

                @if (!empty($stats))
                    <div class="mt-10 flex flex-wrap gap-6">
                        @foreach ($stats as $stat)
                            <div class="flex items-center">
                                @if ($stat['icon'] ?? false)
                                    <x-dynamic-component :component="$stat['icon']" class="w-8 h-8 text-[#800F12]" />
                                @endif
                                <span class="ml-2">{{ $stat['text'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Колонка с изображением -->
            @if ($image)
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
                    </div>
                    <div
                        class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset($image) }}" alt="{{ $imageAlt }}" class="w-full h-full object-cover" />
                    </div>
                    <!-- Декоративные элементы -->
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-[#800F12] opacity-20 blur-xl">
                    </div>
                    <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-[#800F12] opacity-20 blur-xl"></div>
                </div>
            @endif
        </div>
    </div>

    <!-- Фоновые элементы -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-1/4 -right-20 w-64 h-64 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
        <div class="absolute bottom-0 -left-40 w-80 h-80 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
    </div>
</div>
