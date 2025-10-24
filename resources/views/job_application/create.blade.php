<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('job.index'),
        $job->title => route('job.show', $job),
        'Apply' => '#',
    ]" />

    <x-job-card :$job />

    <x-card>
        <h2 class="mb-2 text-lg font-medium">
            Your Job Application
        </h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">
                    Expected Salary
                </x-label>
                <x-text-input type="number" name="expected_salary" show=0 />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">Upload My CV</x-label>
                <x-text-input type="file" name="cv" show=0 />
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
