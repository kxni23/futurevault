<?php 
include('api/config.php');
$category = $_GET['cat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Memories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body{
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }


        /* Memory Grid */
        .memory-list{
            display: flex
;
    flex-direction: row;
    width: 100%;
    gap: 20px;
    padding: 20px 0px;
    align-items: center;
    justify-content: center;
        }

        .memory-card {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: relative;
            cursor: pointer;
            padding: 15px;
        }

        .memory-card:hover {
            transform: translateY(-5px);
        }

        .memory-card h3 {
            font-size: 20px;
            margin: 0;
            color: #333;
            font-weight: 600;
        }

        .memory-card .unlock-date {
            font-size: 14px;
            color: #aaa;
            margin-top: 5px;
        }

        /* View Button */
        .view-btn {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .view-btn:hover {
            background-color: #357ab7;
        }

        /* Modal (Detailed Memory View) */
        @keyframes popIn {
    0% {
        transform: scale(0.8); /* Start small */
        opacity: 0;
    }
    50% {
        transform: scale(1.1); /* Make it slightly larger than the final size */
        opacity: 1;
    }
    100% {
        transform: scale(1); /* End at normal size */
        opacity: 1;
    }

}

        .memory-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    justify-content: center;
    align-items: center;
    overflow-y: auto;
    padding: 20px;
    z-index: 9999;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.memory-modal-content {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 25px;
    max-width: 700px;
    width: 90%;
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
    max-height: 80vh;
    overflow-y: auto;
    position: relative;
    text-align: center;
    animation: fadeIn 0.3s ease-in-out;
}




.memory-modal-content .image-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 5%; /* Adjust based on screen size */
    margin-top: 5%; /* Adjust based on screen size */
    /* Remove background color */
    background-color: transparent; /* Set to transparent if you want no background */
    max-height: 50vh; /* Responsive height */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 5%; /* Adjust padding to be relative */
    border-radius: 8px;
}




.memory-modal-content img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.memory-modal-content img:hover {
    transform: scale(1.05);
}

.memory-modal-content p {
    font-size: 1.1em;
    color: #444;
    margin: 20px 0;
}

.memory-modal-content .unlock-date {
    font-size: 1em;
    color: #777;
    background: #eef2f3;
    padding: 8px 12px;
    border-radius: 5px;
    display: inline-block;
    margin-top: 10px;
}

.memory-modal-content .close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.7);
    border: none;
    font-size: 20px;
    cursor: pointer;
    border-radius: 50%;
    padding: 6px 10px;
    transition: background 0.3s ease-in-out;
}

.memory-modal-content .close-btn:hover {
    background: rgba(255, 255, 255, 1);
}

       /* Modal Control Buttons Container */
        .modal-controls {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
            z-index: 2;
        }

        /* Maximize Button */
        .maximize-modal {
            font-size: 16px;
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .maximize-modal:hover {
            background: #357ab7;
        }

        /* Close Button */
        .close-modal {
            font-size: 16px;
            background: #ff4d4d;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .close-modal:hover {
            background: #d43c3c;
        }

        /* Adjustments for Maximized Modal */
        .memory-modal.maximized .memory-modal-content {
            width: 100%;
            height: 100%;
            max-width: none;
            max-height: none;
            border-radius: 0;
            padding: 20px;
        }

    </style>
</head>
<body>

<!-- Header Section -->
<?php include('header.php')?>
<!-- Memory List -->
<div class="memory-list" id="memory-list">
    <!-- Memory cards will be dynamically added here -->
</div>

<!-- Memory Modal -->
<div id="memory-modal" class="memory-modal">
    <div class="memory-modal-content">
        <!-- Control Buttons (Close and Maximize) -->
        <div class="modal-controls">
            <button class="maximize-modal" onclick="toggleMaximize()">⛶</button>
            <button class="close-modal" onclick="closeMemoryModal()">×</button>
        </div>

        <!-- Memory Title -->
        <h2 id="modal-title"></h2>

        <!-- Images/Media Container -->
        <div class="image-container" id="modal-images"></div>

        <!-- Memory Description -->
        <p id="modal-description"></p>

        <!-- Unlock Date -->
        <div class="unlock-date" id="modal-unlock-date"></div>
    </div>
</div>


<script>
    const memoryList = document.getElementById('memory-list');

    async function fetchMemories() {
    try {
        const url = `api/fetch_memories.php?cat=<?php echo $category; ?>`;
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const result = await response.json();

        if (result.error) {
            console.error(result.error);
            return;
        }

        if (result.message) {
            memoryList.innerHTML = `<h1 style=" background: rgba(255, 255, 255, 0.623) ; width: 800px; text-align: center; margin: 0 auto; padding: 20px; display: flex; justify-content: center; align-items: center;">
                                    ${result.message}
                                    </h1>
                                    `;
            return;
        }

        // Add memories to the page
        result.forEach(memory => addMemory(memory));
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}



// Function to add memory to the vault (same as before)
function addMemory(memory) {
    const card = document.createElement('div');
    card.classList.add('memory-card');
    card.setAttribute('data-unlock-date', memory.unlockDate);
    card.setAttribute('data-content', memory.description);
    card.setAttribute('data-images', JSON.stringify(memory.file));

    const title = document.createElement('h3');
    title.textContent = memory.title;

    const unlockDate = document.createElement('div');
    unlockDate.classList.add('unlock-date');

    const currentDate = new Date().toISOString().split('T')[0];
    if (memory.unlockDate > currentDate) {
        const daysRemaining = Math.ceil((new Date(memory.unlockDate) - new Date(currentDate)) / (1000 * 60 * 60 * 24));
        unlockDate.textContent = `Locked - ${daysRemaining} days remaining`;
    } else {
        unlockDate.textContent = `Unlock on: ${memory.unlockDate}`;
    }

    const viewButton = document.createElement('button');
    viewButton.classList.add('view-btn');
    viewButton.textContent = 'View';
    viewButton.onclick = function() {
        openMemoryModal(card);
    };

    card.appendChild(title);
    card.appendChild(unlockDate);
    card.appendChild(viewButton);

    memoryList.appendChild(card);
}

// Fetch and display memories on page load
fetchMemories();


function openMemoryModal(card) {
    const unlockDate = card.getAttribute('data-unlock-date');
    const currentDate = new Date().toISOString().split('T')[0];

    if (unlockDate > currentDate) {
        alert("This memory is still locked.");
        return;
    }

    const title = card.querySelector('h3').textContent;
    const content = card.getAttribute('data-content');
    let files = card.getAttribute('data-images');

    // Remove any surrounding quotes from the file paths and split by commas
    files = files.split(',').map(file => file.trim().replace(/^"|"$/g, ''));

    const unlockDateText = `Unlock Date: ${unlockDate}`;
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-description').textContent = content;
    document.getElementById('modal-unlock-date').textContent = unlockDateText;

    const mediaContainer = document.getElementById('modal-images');
    mediaContainer.innerHTML = ''; // Clear previous content

    const basePath = 'api/uploads/'; // Define the base path for files

    files.forEach(src => {
        if (src) { // Check for non-empty string
            const fileExtension = src.split('.').pop().toLowerCase();

            let mediaElement;

            if (['mp4', 'webm', 'ogg'].includes(fileExtension)) {
                // Create a video element
                mediaElement = document.createElement('video');
                mediaElement.controls = true; // Add controls (play, pause, etc.)
                mediaElement.src = basePath + src; // Prepend the file path
            } else if (['mp3', 'wav', 'ogg'].includes(fileExtension)) {
                // Create an audio element
                mediaElement = document.createElement('audio');
                mediaElement.controls = true; // Add controls (play, pause, etc.)
                mediaElement.src = basePath + src; // Prepend the file path
            } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                // Create an image element
                mediaElement = document.createElement('img');
                mediaElement.src = basePath + src; // Prepend the file path
            }

            if (mediaElement) {
                mediaContainer.appendChild(mediaElement);
            }
        }
    });

    document.getElementById('memory-modal').style.display = 'flex';
}

// Function to close memory modal
function closeMemoryModal() {
    document.getElementById('memory-modal').style.display = 'none';
}

function toggleMaximize() {
    const modal = document.getElementById('memory-modal');
    const modalContent = modal.querySelector('.memory-modal-content');

    // Toggle "maximized" class on the modal
    modal.classList.toggle('maximized');

    // Change the button text based on the state
    const maximizeButton = modal.querySelector('.maximize-modal');
    if (modal.classList.contains('maximized')) {
        maximizeButton.textContent = '❐'; // Restore icon
    } else {
        maximizeButton.textContent = '⛶'; // Maximize icon
    }
}


</script>
</body>

</html>
