<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParticipantRegist;

class ParticipantRegistController extends Controller
{
    public function index() {}
    public function create() {}

    /**
     * Menampilkan data transaksi untuk admin
     */
    public function showDataParticipant(Request $request)
    {
        $participantRegist = ParticipantRegist::orderBy('regist_id', 'desc')->paginate(1);

        $participantRegist->getCollection()->transform(function ($item) {
            return [
                'regist_id' => $item->regist_id,
                'participant_name' => $item->participant_name,
                'event_name' => $item->event_name,
                'subtotal' => $item->subtotal,
                'payment_status' => $item->payment_status,
                'created_at' => Carbon::parse($item->created_at)->format('d M Y')
            ];
        });

        return view('_admin._transactions.events-page', [
            'title' => 'Data Transaksi Event & Kelas',
            'data' => $participantRegist
        ]);
    }

    public function riwayatTransaksiUser(Request $request)
    {
        $userId = auth('web')->user()->user_id;

        $riwayat = ParticipantRegist::with('event')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(5); // jumlah data per halaman

        $riwayat->getCollection()->transform(function ($item) {
            return [
                'id' => $item->regist_id,
                'event_name' => $item->event->event_title ?? '-',
                'qty' => $item->participant_qty,
                'total' => number_format($item->subtotal, 0, ',', '.'),
                'status' => $item->payment_status,
                'date' => \Carbon\Carbon::parse($item->created_at)->format('d M Y'),
            ];
        });

        return view('_users._transactions.riwayat-transaction', [
            'title' => 'Riwayat Transaksi',
            'transactions' => $riwayat,
        ]);
    }


    /**
     * Menampilkan riwayat event user login
     */
    public function riwayatEventUser(Request $request)
    {
        $userId = auth('web')->user()->user_id;

        $riwayat = ParticipantRegist::with('event')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->event->event_id ?? null,
                    'title' => $item->event->event_title ?? '-',
                    'date' => Carbon::parse($item->event->event_date)->format('d M Y'),
                    'type' => $item->event->event_type ?? 'Unknown',
                    'status' => $item->event->event_status ?? 'Unknown',
                    'registration_date' => Carbon::parse($item->created_at)->format('d M Y'),
                ];
            });

        return view('_users._events.event-riwayat', [
            'title' => 'Riwayat Event',
            'events' => $riwayat,
        ]);
    }

    /**
     * Simpan data pendaftaran peserta
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

        $nextNumber = $lastRegist
            ? ((int) substr($lastRegist->regist_id, 6)) + 1
            : 1;

        $registID = 'REGEVT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $codes = [];
        for ($i = 0; $i < $validated['participant_qty']; $i++) {
            $code = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
            $codes[] = $code;
        }

        $participant_code = implode(',', $codes);

        ParticipantRegist::create([
            'regist_id' => $registID,
            'user_id' => auth('web')->user()->user_id, // ✅ Tambahkan penyimpanan user_id
            'event_id' => $eventID,
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

    public function show(ParticipantRegist $participantRegist) {}
    public function edit(ParticipantRegist $participantRegist) {}
    public function update(Request $request, ParticipantRegist $participantRegist) {}
    public function destroy(ParticipantRegist $participantRegist) {}
}
