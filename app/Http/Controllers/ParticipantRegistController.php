<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParticipantRegist;

class ParticipantRegistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventID = $request->id;
        $payment_status = "Success";

        $validated = $request->validate([
            'participant_name' => 'required|string|max:100',
            'participant_email' => 'required|email|max:100',
            'participant_phone' => 'required|string|max:15',
            'participant_qty' => 'required|integer|min:1|max:10',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $event = Event::where('event_id', $eventID)->first();
        $event_name = $event?->event_title;

        $lastRegist = ParticipantRegist::where('regist_id', 'like', 'REGEVT%')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastRegist) {
            $lastNumber = (int) substr($lastRegist->regist_id, 6); // 'REGEVT001'
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $registID = 'REGEVT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // kode peserta

        $codes = [];
        for ($i = 0; $i < $validated['participant_qty']; $i++) {
            $code = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)); // hasil: 6 karakter
            $codes[] = $code;
        }

        $participant_code = implode(',', $codes);


        ParticipantRegist::create([
            'regist_id' => $registID,
            'event_name' => $event_name,
            'participant_name' => $validated['participant_name'],
            'participant_email' => $validated['participant_email'],
            'participant_phone' => $validated['participant_phone'],
            'participant_qty' => $validated['participant_qty'],
            'participant_code' => $participant_code,
            'subtotal' => $validated['subtotal'],
            'payment_status' => $payment_status
        ]);

        return redirect()->route('events.data')->with('success', 'Pendaftaran peserta berhasil!');
    }

    public function showDataParticipant(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->query('filter');
        $now = Carbon::now();

        $participantRegist = ParticipantRegist::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('event_name', 'like', '%' . $search . '%')
                    ->orWhere('participant_name', 'like', '%' . $search . '%')
                    ->orWhere('payment_status', 'like', '%' . $search . '%');
                });
            })
            ->when($filter && $filter !== 'all', function ($query) use ($filter, $now) {
                switch ($filter) {
                    case 'today':
                        $query->whereDate('created_at', $now->toDateString());
                        break;
                    case 'this_week':
                        $query->whereBetween('created_at', [
                            $now->copy()->startOfWeek()->toDateString(),
                            $now->copy()->endOfWeek()->toDateString(),
                        ]);
                        break;
                    case 'this_month':
                        $query->whereBetween('created_at', [
                            $now->copy()->startOfMonth()->toDateString(),
                            $now->copy()->endOfMonth()->toDateString(),
                        ]);
                        break;
                    case 'this_year':
                        $query->whereBetween('created_at', [
                            $now->copy()->startOfYear()->toDateString(),
                            $now->copy()->endOfYear()->toDateString(),
                        ]);
                        break;
                }
            })
            ->orderBy('created_at', 'desc')->paginate(10);

        $participantRegist->getCollection()->transform(function ($item) {
            return [
                'regist_id' => $item->regist_id,
                'participant_name' => $item->participant_name,
                'event_name' => $item->event_name,
                'subtotal' => $item->subtotal,
                'payment_status' => $item->payment_status,
                'created_at' => Carbon::parse($item->created_at)->format('d M Y'),
            ];
        });

        return view('_admin._transactions.events-page', [
            'title' => 'Data Transaksi Event & Kelas',
            'data' => $participantRegist
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipantRegist $participantRegist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParticipantRegist $participantRegist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipantRegist $participantRegist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipantRegist $participantRegist)
    {
        //
    }
}