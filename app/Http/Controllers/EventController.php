<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Waktu Server: ' . now());
        \Log::info('Waktu Jakarta: ' . now()->setTimezone('Asia/Jakarta'));

        // Validasi data
        $validated = $request->validate([
            'event_name' => 'required|string|max:100',
            'event_desc' => 'required|string',
            'event_banner_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags_event' => 'nullable|array',
            'event_type_paid' => 'required|string',
            'event_price' => 'required|numeric',
            'event_location' => 'required|string|max:255',
            'start_date_time' => 'required|date',
            'end_date_time' => 'required|date|after:start_date_time',
            'event_registration_deadline' => 'required|date',
            'event_quota' => 'required|integer|min:0',
        ]);

        // Generate event ID baru
        $lastEvent = Event::where('event_id', 'like', '#TRXEVT%')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastEvent) {
            // Ambil angka terakhir dari ID
            $lastNumber = (int) substr($lastEvent->event_id, 8); // #TRXEVT001 -> ambil "001"
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        // Format angka menjadi 3 digit
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $validated['event_id'] = '#TRXEVT' . $formattedNumber;

        // Handle file upload
        if ($request->hasFile('event_banner_img')) {
            $image = $request->file('event_banner_img');
            $path = $image->store('public/image/banners');
            $validated['event_banner_img'] = Storage::url($path);
        }

        // Convert tags array to string
        $tags = $request->input('tags_event', []);
        $validated['event_tags'] = !empty($tags) ? implode(',', $tags) : null;

        // Sesuaikan dengan nama kolom di database
        $validated['event_title'] = $request->event_name;
        $validated['event_description'] = $request->event_desc;
        $validated['event_location'] = $request->event_location;
        $validated['event_price'] = $request->event_price;
        $validated['event_quota'] = $request->event_quota;

        // Tanggal dan waktu
        $validated['event_date'] = Carbon::parse($request->start_date_time)->format('Y-m-d');
        $validated['event_start_time'] = Carbon::parse($request->start_date_time)->format('H:i:s');
        $validated['event_end_time'] = Carbon::parse($request->end_date_time)->format('H:i:s');
        $validated['event_registration_deadline'] = Carbon::parse($request->event_registration_deadline)->format('Y-m-d H:i:s');

        // Pisahkan event_type_paid menjadi event_type dan event_is_paid
        $typePaid = explode('_', $request->event_type_paid);
        $validated['event_type'] = $typePaid[0]; // Online atau Offline
        $validated['event_is_paid'] = $typePaid[1]; // Berbayar atau Gratis

        // Status default
        $validated['event_status'] = 'Open Regist';

        // Create event
        Event::create($validated);

        return redirect()->route('admin.manage.event')->with('success', 'Event berhasil ditambahkan!');
    }

    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(10);

        return view('_admin._manage.event-data', [
            'title' => 'Kelola data event',
            'events' => $events
        ]);
    }

    public function show($event_id)
    {
        $event = Event::findOrFail($event_id);

        return view('_admin._manage._create.add-event-data', [
            'title' => 'Detail Event',
            'event' => $event
        ]);
    }
}
