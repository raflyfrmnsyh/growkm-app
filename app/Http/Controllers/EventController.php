<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'event_name' => 'required|string|max:100',
            'event_desc' => 'required|string',
            'event_banner_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags_event' => 'nullable|array',
            'event_type_paid' => 'required|string',
            'event_price' => 'required|numeric',
            'event_location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_start_time' => 'required',
            'event_end_time' => 'required|after:start_date_time',
            'event_registration_deadline' => 'required|date',
            'event_quota' => 'required|integer|min:0',
            'event_speaker_name' => 'required|string|max:100',
            'event_speaker_job' => 'required|string|max:100',
        ]);

        // Generate event ID baru
        $lastEvent = DB::table('events')->latest('event_id')->first();

        if ($lastEvent) {
            $lastNumber = (int) substr($lastEvent->event_id, 6);

            $newId = 'TRXEVT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'TRXEVT001';
        }
        $validated['event_id'] = $newId;

        // Handle file upload
        if ($request->hasFile('event_banner_img')) {
            $image = $request->file('event_banner_img');
            $path = $image->store('public/event_banner');
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
        $validated['event_speaker_name'] = $request->event_speaker_name;
        $validated['event_speaker_job'] = $request->event_speaker_job;

        // Tanggal dan waktu
        $validated['event_date'] = Carbon::parse($request->event_date)->format('Y-m-d');
        $validated['event_start_time'] = Carbon::parse($request->event_start_time)->format('H:i:s');
        $validated['event_end_time'] = Carbon::parse($request->event_end_time)->format('H:i:s');
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

    public function index(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->query('filter');

        $query = Event::query();

        // Handle search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('event_title', 'like', '%' . $search . '%')
                    ->orWhere('event_type', 'like', '%' . $search . '%')
                    ->orWhere('event_quota', 'like', '%' . $search . '%');
            });
        }

        // Handle time filter
        if ($filter) {
            $now = Carbon::now();

            switch ($filter) {
                case 'today':
                    $query->whereDate('event_date', $now->toDateString());
                    break;

                case 'this_week':
                    $startOfWeek = $now->startOfWeek()->toDateString();
                    $endOfWeek = $now->endOfWeek()->toDateString();
                    $query->whereBetween('event_date', [$startOfWeek, $endOfWeek]);
                    break;

                case 'this_month':
                    $startOfMonth = $now->startOfMonth()->toDateString();
                    $endOfMonth = $now->endOfMonth()->toDateString();
                    $query->whereBetween('event_date', [$startOfMonth, $endOfMonth]);
                    break;

                case 'this_year':
                    $startOfYear = $now->startOfYear()->toDateString();
                    $endOfYear = $now->endOfYear()->toDateString();
                    $query->whereBetween('event_date', [$startOfYear, $endOfYear]);
                    break;
            }
        }

        $events = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('_admin._manage.event-data', [
            'title' => 'Kelola data event',
            'events' => $events,
            'search' => $search,
            'filter' => $filter
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

    public function view($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('_admin._manage._update.detail-event', compact('event'));
    }

    public function update(Request $request, $event_id)
    {
        $event = Event::findOrFail($event_id);

        // Validasi data
        $validated = $request->validate([
            'event_banner_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'event_name' => 'required|string|max:255',
            'event_desc' => 'required|string',
            'tags_event' => 'nullable|array',
            'event_type_paid' => 'required|in:Online_Berbayar,Online_Gratis,Offline_Berbayar,Offline_Gratis',
            'event_price' => 'required|numeric|min:0',
            'event_location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_start_time' => 'required',
            'event_end_time' => 'required',
            'event_registration_deadline' => 'required|date_format:Y-m-d\TH:i',
            'event_quota' => 'required|integer|min:1',
            'event_speaker_name' => 'required|string|max:255',
            'event_speaker_job' => 'required|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('event_banner_img')) {
            // Hapus gambar lama jika ada
            if ($event->event_banner_img) {
                Storage::delete(public_path($event->event_banner_img));
            }

            $path = $request->file('event_banner_img')->store('event_banners', 'public');
            $validated['event_banner_img'] = '/storage/' . $path;
        } else {
            $validated['event_banner_img'] = $event->event_banner_img;
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
        $validated['event_speaker_name'] = $request->event_speaker_name;
        $validated['event_speaker_job'] = $request->event_speaker_job;

        // Tanggal dan waktu
        $validated['event_date'] = Carbon::parse($request->event_date)->format('Y-m-d');
        $validated['event_start_time'] = Carbon::parse($request->event_start_time)->format('H:i:s');
        $validated['event_end_time'] = Carbon::parse($request->event_end_time)->format('H:i:s');
        $validated['event_registration_deadline'] = Carbon::parse($request->event_registration_deadline)->format('Y-m-d H:i:s');

        // Pisahkan event_type_paid menjadi event_type dan event_is_paid
        $typePaid = explode('_', $request->event_type_paid);
        $validated['event_type'] = $typePaid[0]; // Online atau Offline
        $validated['event_is_paid'] = $typePaid[1]; // Berbayar atau Gratis

        // Update data
        $event->update($validated);

        return redirect()->route('admin.manage.event')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($event_id)
    {
        $event = Event::findOrFail($event_id);

        // Hapus gambar banner jika ada
        if ($event->event_banner_img) {
            $imagePath = str_replace('/storage', 'public', $event->event_banner_img);
            Storage::delete($imagePath);
        }

        // Hapus event dari database
        $event->delete();

        return redirect()->route('admin.manage.event')
            ->with('success', 'Event berhasil dihapus!');
    }
}
