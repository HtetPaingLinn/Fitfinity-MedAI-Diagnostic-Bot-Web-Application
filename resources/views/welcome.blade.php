<x-layout_white>
    <div class="space-y-10 mb-20">
        <section class="justify-center items-center flex flex-col">
            <h3 class="text-4xl text-center font-bold text-customGray"> Welcome to FitFinity </h3>
            <form action="">
                <input type="text" placeholder="Cardiology" class="bg-black/10 px-3 py-2 w-80 justify-self-start custom-font rounded-xl mt-6 text-customGray/5">
            </form>
        </section>
        <section>
            <x-section-heading> Services </x-section-heading>
            <div class="grid lg:grid-cols-3 gap-6 mt-6">
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
                <x-job-card></x-job-card>
            </div>
        </section>
        <section>
            <x-section-heading> Tags </x-section-heading>
            <div class="mt-6 space-x-1.5">
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
                <x-tag> Tag </x-tag>
            </div>
        </section>
        <section>
            <x-section-heading> Recent Jobs </x-section-heading>
            <x-job-card-wide></x-job-card-wide>
            <x-job-card-wide></x-job-card-wide>
            <x-job-card-wide></x-job-card-wide>
        </section>
    </div>
</x-layout_white>
