<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Job Title</x-label>
                    <x-text-input name="title" show=0 />
                </div>

                <div>
                    <x-label for="location">Location</x-label>
                    <x-text-input name="location" show=0 />
                </div>

                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" type="number" show=0 />
                </div>

                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-text-input name="description" type="textarea" show=0 />
                </div>

                <div>
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience')" :all-option="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>

                <div>
                    <x-label for="category">Category</x-label>
                    <x-radio-group name="category" :value="old('category')" :all-option="false" :options="\App\Models\Job::$category" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
