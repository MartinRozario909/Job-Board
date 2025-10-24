<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Job Title</x-label>
                    <x-text-input name="title" show=0 :value="$job->title" />
                </div>

                <div>
                    <x-label for="location">Location</x-label>
                    <x-text-input name="location" show=0 :value="$job->location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" type="number" show=0 :value="$job->salary" />
                </div>

                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-text-input name="description" type="textarea" show=0 :value="$job->description" />
                </div>

                <div>
                    <x-label for="experience">Experience</x-label>
                    <x-radio-group name="experience" :value="$job->experience" :all-option="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>

                <div>
                    <x-label for="category">Category</x-label>
                    <x-radio-group name="category" :value="$job->category" :all-option="false" :options="\App\Models\Job::$category" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
