<?php

use App\Models\Beer;
use App\Models\Event;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $upcoming = Event::where('is_active', true)->whereDate('date', '>=', now())->orderBy('date', 'asc')->get();
    $past = Event::where('is_active', true)->whereDate('date', '<', now())->orderBy('date', 'desc')->get();
    $events = $upcoming->concat($past)->take(3);
    $beers = Beer::catalogOrdered()->get();

    return view('welcome', compact('beers', 'events'));
});

Route::get('/nosotros', function () {
    return view('pages.nosotros');
});

Route::get('/galeria', function () {
    $tiles = GalleryItem::publicTiles();

    return view('pages.galeria', compact('tiles'));
});

Route::view('/terminos-fotos', 'pages.terminos-fotos');

Route::get('/guia', function () {
    return view('pages.guia');
});

Route::view('/maridajes', 'pages.maridajes');

Route::get('/cervezas/{slug}', function (string $slug) {
    $beer = Beer::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();

    return view('pages.cervezas.show', compact('beer'));
});

Route::get('/eventos', function () {
    $events = Event::where('is_active', true)->orderBy('date', 'asc')->get();

    return view('pages.eventos.index', compact('events'));
});

Route::get('/eventos/{slug}', function (string $slug) {
    $event = Event::with(['reviews' => function ($query) {
        $query->where('is_approved', true);
    }])->where('slug', $slug)->firstOrFail();

    return view('pages.eventos.show', compact('event'));
})->name('events.show');
