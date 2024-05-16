<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blank Words')</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .soal-text {
            position: absolute;
            top: 10%;
            left: 32%;
            transform: translateX(-50%);
            font-size: 20px;
            max-width: 44%;
            text-align: justify;
        }
        .drop-area {
            display: inline-block;
            min-width: 100px;
            border-bottom: 2px dashed #000;
            margin: 0 5px;
            vertical-align: middle;
            min-height: 30px; /* Added to improve visibility and drag-and-drop */
        }
        .text-answer {
            font-size: 20px;
            font-weight: bold;
            text-align: justify;
            cursor: grab;
            display: inline-block;
        }
        .text-answer1 {
            position: absolute;
            top: 11%;
            right: 16%;
            transform: translateX(-50%);
            font-size: 50px;
            font-weight: bold;
            cursor: grab;
        }
        .text-answer2 {
            position: absolute;
            top: 30%;
            right: 11%;
            transform: translateX(-50%);
            font-size: 50px;
            font-weight: bold;
            cursor: grab;
        }
        .text-answer3 {
            position: absolute;
            top: 48%;
            right: 19%;
            transform: translateX(-50%);
            font-size: 50px;
            font-weight: bold;
            cursor: grab;
        }
        .text-answer4 {
            position: absolute;
            top: 66%;
            right: 7%;
            transform: translateX(-50%);
            font-size: 50px;
            font-weight: bold;
            cursor: grab;
        }
        /* #result {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            font-weight: bold;
            color: red;
        } */
    .custom-alert {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        z-index: 1000;
        text-align: center;
    }

    .custom-alert.success {
        border-color: green;
        color: green;
    }

    .custom-alert.error {
        border-color: red;
        color: red;
    }

    .custom-alert button {
        margin-top: 10px;
        padding: 5px 10px;
        background-color: #ccc;
        border: none;
        cursor: pointer;
    }

    .custom-alert button:hover {
        background-color: #bbb;
    }

    .custom-alert-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
    </style>
</head>
<body>
    @yield('content')
    <script>
        var correctAnswers = @json($correctAnswers ?? []);

        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            var element = document.getElementById(data);
            if (event.target.classList.contains('drop-area')) {
                if (event.target.children.length === 0) {
                    event.target.textContent = '';
                    event.target.appendChild(element);
                    element.style.position = 'relative';
                    element.style.top = '0';
                    element.style.left = '0';
                    element.style.transform = 'none';
                    element.style.fontSize = 'inherit';
                    element.style.fontWeight = 'inherit';
                    element.style.cursor = 'grab';
                    checkCompletion();
                }
            }
        }

        function checkCompletion() {
            var dropAreas = document.querySelectorAll('.drop-area');
            var isComplete = true;
            var userAnswers = [];

            dropAreas.forEach(function(area, index) {
                if (area.children.length > 0) {
                    userAnswers.push(area.children[0].textContent);
                } else {
                    isComplete = false;
                }
            });
            if (isComplete) {
            checkAnswers(userAnswers);
        }
    }

    function checkAnswers(userAnswers) {
        var isCorrect = true;

        userAnswers.forEach(function(answer, index) {
            if (answer !== correctAnswers[index]) {
                isCorrect = false;
            }
        });

        if (isCorrect) {
            showAlert('Jawaban Anda Benar!', 'success');
        } else {
            showAlert('Jawaban Anda Salah!', 'error');
        }
    }

    function showAlert(message, type) {
        var alertBox = document.getElementById('custom-alert');
        var alertMessage = document.getElementById('custom-alert-message');

        alertBox.classList.remove('success', 'error');
        alertBox.classList.add(type);
        alertMessage.textContent = message;
        alertBox.style.display = 'block';
        document.querySelector('.custom-alert-overlay').style.display = 'block';
    }

    function closeAlert() {
        var alertBox = document.getElementById('custom-alert');
        alertBox.style.display = 'none';
        document.querySelector('.custom-alert-overlay').style.display = 'none';
    }
    </script>
</body>
</html>