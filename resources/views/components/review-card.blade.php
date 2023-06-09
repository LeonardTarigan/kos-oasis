<div class="flex flex-col rounded-xl p-5 gap-5 shadow-lg bg-white justify-between">
    <p class="text-sm italic">{{ $text }}</p>

    <div class="flex items-center gap-2">
        <div class="w-10 h-10 rounded-full overflow-hidden">
            <img src="{{ $image }}" alt="profile pic" class="h-full object-cover">
        </div>
        <div class="font-semibold">
            <div class="flex gap-2">
                <img src="/img/star.svg" alt="star">
                <span>{{ $rating }}/5</span>
            </div>
            <span>{{ $sender }}</span>
        </div>
    </div>
</div>
