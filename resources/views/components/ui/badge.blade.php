@props(['status' => 'pending', 'label' => null])
@php
    $blue = 'bg-blue-50 text-blue-700 ring-blue-200';
    $orange = 'bg-orange-50 text-orange-700 ring-orange-200';
    $green = 'bg-cvsu-green-50 text-cvsu-green ring-cvsu-green/25';
    $red = 'bg-red-50 text-red-700 ring-red-200';
    $gray = 'bg-gray-100 text-gray-600 ring-gray-200';
    $map = [
        'pending' => ['Pending', 'bg-amber-50 text-amber-800 ring-amber-200'],
        'review' => ['Under review', $blue],
        'correction' => ['Needs correction', $orange],
        'rejected' => ['Rejected', $red],
        'approved' => ['Approved', $green],
        'scheduled' => ['Scheduled', $green],
        'checkedin' => ['Checked in', 'bg-teal-50 text-teal-700 ring-teal-200'],
        'ready' => ['Ready for printing', $green],
        'claimed' => ['Claimed', 'bg-cvsu-green text-white ring-cvsu-green'],
        'flagged' => ['Face-to-face needed', $red],
        'missed' => ['Missed', $gray],
        'rescheduled' => ['Rescheduled', $blue],
        'draft' => ['Not yet submitted', $gray],
        'active' => ['Active', $green],
        'inactive' => ['Inactive', $gray],
        'match' => ['Match', $green],
        'check' => ['Check', 'bg-amber-50 text-amber-800 ring-amber-200'],
    ];
    [$text, $classes] = $map[$status] ?? $map['pending'];
@endphp
<span {{ $attributes->class(['inline-flex items-center whitespace-nowrap rounded-full px-2.5 py-0.5 text-xs font-medium ring-1 ring-inset', $classes]) }}>{{ $label ?? $text }}</span>
