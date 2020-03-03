@extends('statamic::layout')
@section('title', 'Oh Dear')

@section('content')
    <div class="mb-3">
        @include('oh-dear::partials.back')
        <h1 class="flex-1">Uptime</h1>
    </div>

    <div class="card pl-4 py-4">

        <!-- TODO: make is up dynamically -->
        <p class="rounded border-l-4 border-green-light pl-1" style="background-color: #f0fff4;">
            <span class="inline-block items-center px-1 py-1">
                <a href="#" class="underline">jonassiewertsen.com</a> is up.
            </span>
        </p>

        <h2 class="font-bold mt-4 mb-1">Past 7 days</h2>
        <table class="w-full pt-1">
            @forelse ($pastDays as $day)
                <tr>
                    <td class="w-1/4">{{ $day['datetime'] }}</td>
                    <td>{{ $day['uptimePercentage'] }}%</td>
                </tr>
             @empty
                No Entries yet
            @endforelse
        </table>

        <h2 class="font-bold mt-4 mb-1">Past 12 months</h2>
        <table class="w-full pt-1">
            @forelse ($pastMonths as $month)
                <tr>
                    <td class="w-1/4">{{ $month['datetime'] }}</td>
                    <td>{{ $month['uptimePercentage'] }}%</td>
                </tr>
            @empty
                No Entries yet
            @endforelse
        </table>

        <h2 class="font-bold mt-4 mb-1">Latest downtime periods</h2>
        <table class="w-full pt-1">
            <thead>
                <tr class="text-xs">
                    <th class="w-2/5 text-left">Started at</th>
                    <th class="w-2/5 text-left">Ended at</th>
                    <th class="w-1/5 text-left">Duration</th>
                </tr>
            </thead>
            @forelse($downtimes as $downtime)
                <tbody>
                    <tr>
                        <th class="w-2/5 text-left font-normal">{{ $downtime->startedAt }}</th>
                        <th class="w-2/5 text-left font-normal">{{ $downtime->endedAt }}</th>
                        <th class="w-1/5 text-left font-normal">Duration</th>
                    </tr>
                </tbody>
            @empty
                <tr>
                    <td colspan="3">No downtimes detected in the past 6 month</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection