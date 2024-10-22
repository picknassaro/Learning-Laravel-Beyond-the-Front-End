@props(['job', 'strLimit' => null, 'cardSize' => 'normal'])

<li
    class="{{ $cardSize === 'mini' ? 'md:max-w-xl' : 'max-w-5xl' }} justify-self-center overflow-hidden rounded-xl bg-white p-4 shadow-lg md:p-8">
    <p class="mb-2">
        <strong>Title:</strong> <a href="{{ route('showSingleJob', ['job' => $job->id]) }}"
           class="underline">{{ $job['title'] }}</a>
    </p>
    <p class="mb-2"><strong>Company:</strong> {{ $job->employer->employer_name }}</p>
    <p class="mb-2"><strong>Description:</strong>
        {{ isset($strLimit) ? Str::limit($job['description'], $strLimit, '...') : $job['description'] }}</p>
    <p class="mb-2"><strong>Location:</strong> {{ $job['location'] }}</p>
    <p class="mb-2"><strong>Type:</strong> {{ $job['job_type'] }}</p>
    <p><strong>Salary:</strong> {{ $job['salary'] }}</p>
</li>
