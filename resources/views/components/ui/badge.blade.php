@props(['status' => 'pending', 'label' => null])
@php
    $map = [
        'pending'    => ['Pending',        'bg-cvsu-gold-50 text-yellow-800 ring-cvsu-gold/40'],
        'approved'   => ['Approved',       'bg-cvsu-green-50 text-cvsu-green ring-cvsu-green/30'],
        'rejected'   => ['Rejected',       'bg-red-50 text-red-700 ring-red-200'],
        'correction' => ['Needs correction', 'bg-cvsu-gold-50 text-yellow-800 ring-cvsu-gold/40'],
        'scheduled'  => ['Scheduled',      'bg-cvsu-green-50 text-cvsu-green ring-cvsu-green/30'],
        'ready'      => ['Ready for Printing', 'bg-cvsu-green-50 text-cvsu-green ring-cvsu-green/30'],
        'claimed'    => ['Claimed',        'bg-cvsu-green text-white ring-cvsu-green'],
        'flagged'    => ['Face-to-face needed', 'bg-red-50 text-red-700 ring-red-200'],
        'missed'     => ['Missed',         'bg-gray-100 text-gray-600 ring-gray-300'],
        'active'     => ['Active',         'bg-cvsu-green-50 text-cvsu-green ring-cvsu-green/30'],
        'inactive'   => ['Inactive',       'bg-gray-100 text-gray-600 ring-gray-300'],
        'review'     => ['Under review',   'bg-cvsu-gold-50 text-yellow-800 ring-cvsu-gold/40'],
    ];
    [$text, $classes] = $map[$status] ?? $map['pending'];
@endphp
<span {{ $attributes->class(['inline-flex items-center whitespace-nowrap rounded-full px-2.5 py-1 text-xs font-semibold ring-1 ring-inset', $classes]) }}>{{ $label ?? $text }}</span>
