@extends('layout.app')

@section('title', 'Blank Words Game')

@section('content')
<div class="image-container">
    <img src="{{ asset('image/Ingame.png') }}" alt="Background Image">
    <p class="soal-text">
        <b>In the dense forest, a group of <span class="drop-area" id="area1" ondrop="drop(event)" ondragover="allowDrop(event)"></span> ventured into abandoned <span class="drop-area" id="area2" ondrop="drop(event)" ondragover="allowDrop(event)"></span>. They were looking for the mysteries hidden treasure within, fueled by excitement and curiosity. Despite the lurking dangers <span class="drop-area" id="area3" ondrop="drop(event)" ondragover="allowDrop(event)"></span> every sight, they pressed on in hopes of discovering the legendary <span class="drop-area" id="area4" ondrop="drop(event)" ondragover="allowDrop(event)"></span>.</b>
    </p>
    
    <div class="text-answer text-answer1" id="answer1" draggable="true" ondragstart="drag(event)">On</div>
    <div class="text-answer text-answer2" id="answer2" draggable="true" ondragstart="drag(event)">Pirates</div>
    <div class="text-answer text-answer3" id="answer3" draggable="true" ondragstart="drag(event)">Treasure</div>
    <div class="text-answer text-answer4" id="answer4" draggable="true" ondragstart="drag(event)">Island</div>
</div>

<div id="result"></div>
@endsection