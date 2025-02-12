<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Countdown</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .memory-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
        }

        .memory-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .memory-card:hover {
            transform: translateY(-5px);
        }

        .memory-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .memory-card .unlock-date {
            font-size: 14px;
            color: #777;
        }

        .view-btn {
            padding: 10px 15px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .view-btn:hover {
            background-color: #357ab7;
        }

        /* Countdown Modal */
        #countdown-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .countdown-content {
            font-size: 5rem;
            color: #fff;
            animation: pulse 1s infinite;
            text-align: center;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
    </style>
</head>
<body>
    <!-- Memory List -->
    <div class="memory-list">
        <div class="memory-card" data-unlock="5">
            <h3>Memory 1</h3>
            <div class="unlock-date">Unlock in 5 seconds</div>
            <button class="view-btn" onclick="startCountdown(5)">View</button>
        </div>
        <div class="memory-card" data-unlock="10">
            <h3>Memory 2</h3>
            <div class="unlock-date">Unlock in 10 seconds</div>
            <button class="view-btn" onclick="startCountdown(10)">View</button>
        </div>
        <div class="memory-card" data-unlock="15">
            <h3>Memory 3</h3>
            <div class="unlock-date">Unlock in 15 seconds</div>
            <button class="view-btn" onclick="startCountdown(15)">View</button>
        </div>
    </div>

    <!-- Countdown Modal -->
    <div id="countdown-modal">
        <div class="countdown-content" id="countdown-number"></div>
    </div>

    <script>
        const countdownModal = document.getElementById('countdown-modal');
        const countdownNumber = document.getElementById('countdown-number');

        function startCountdown(seconds) {
            countdownModal.style.display = "flex";
            let remainingTime = seconds;

            countdownNumber.textContent = remainingTime;
            const countdownInterval = setInterval(() => {
                remainingTime -= 1;
                countdownNumber.textContent = remainingTime;

                if (remainingTime <= 0) {
                    clearInterval(countdownInterval);
                    countdownModal.style.display = "none";
                    alert("Memory Unlocked!");
                }
            }, 1000);
        }
    </script>
</body  ```>
</html>
