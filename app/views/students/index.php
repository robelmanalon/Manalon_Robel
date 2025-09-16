STYLE # 1

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Data Protocol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-blue: #00f0ff;
            --neon-pink: #ff0077;
            --bg-color: #1a1a2e;
        }

        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: var(--bg-color);
            color: var(--neon-blue);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            animation: backgroundFade 15s infinite alternate ease-in-out;
            overflow-x: hidden;
        }

        @keyframes backgroundFade {
            0% { background-color: #1a1a2e; }
            50% { background-color: #111122; }
            100% { background-color: #1a1a2e; }
        }

        /* --- Cyberpunk Container and Elements --- */
        .cyber-container {
            background-color: rgba(26, 26, 46, 0.8);
            border: 2px solid var(--neon-blue);
            box-shadow: 0 0 15px var(--neon-blue);
            border-radius: 0.5rem;
            transition: all 0.5s ease-in-out;
            transform-origin: center;
            padding: 2.5rem;
        }
        
        .cyber-container-modal {
            background-color: rgba(26, 26, 46, 0.95);
            border: 2px solid var(--neon-pink);
            box-shadow: 0 0 20px var(--neon-pink);
            transition: all 0.5s ease-in-out;
        }

        .neon-title {
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 10px var(--neon-blue), 0 0 20px var(--neon-blue);
            animation: pulse-glow 2s infinite alternate;
        }

        .neon-input {
            background-color: rgba(0, 0, 0, 0.4);
            border: 1px solid var(--neon-blue);
            color: white;
            transition: all 0.3s ease;
            box-shadow: inset 0 0 5px var(--neon-blue);
        }

        .neon-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .neon-input:focus {
            outline: none;
            border-color: var(--neon-pink);
            box-shadow: 0 0 10px var(--neon-pink), inset 0 0 5px var(--neon-pink);
        }

        .neon-button {
            background-color: var(--neon-blue);
            color: var(--bg-color);
            border: 2px solid var(--neon-blue);
            box-shadow: 0 0 8px var(--neon-blue);
            transition: all 0.2s ease-in-out;
        }

        .neon-button:hover {
            transform: scale(1.05) rotate(2deg);
            background-color: var(--neon-pink);
            color: var(--bg-color);
            border-color: var(--neon-pink);
            box-shadow: 0 0 15px var(--neon-pink), 0 0 30px var(--neon-pink);
        }
        
        .neon-button-danger {
            background-color: var(--neon-pink);
            color: var(--bg-color);
            border: 2px solid var(--neon-pink);
            box-shadow: 0 0 8px var(--neon-pink);
            transition: all 0.2s ease-in-out;
        }

        .neon-button-danger:hover {
            transform: scale(1.05) rotate(-2deg);
            background-color: red;
            border-color: red;
            box-shadow: 0 0 15px red, 0 0 30px red;
        }

        /* --- Animations & Effects --- */
        @keyframes pulse-glow {
            0% { text-shadow: 0 0 10px var(--neon-blue); }
            50% { text-shadow: 0 0 20px var(--neon-blue), 0 0 40px rgba(0, 240, 255, 0.4); }
            100% { text-shadow: 0 0 10px var(--neon-blue); }
        }

        .glitch-text {
            animation: glitch 1.5s infinite;
        }

        @keyframes glitch {
            0% { text-shadow: 2px 2px 0 var(--neon-pink), -2px -2px 0 var(--neon-blue); }
            25% { text-shadow: -2px 2px 0 var(--neon-pink), 2px -2px 0 var(--neon-blue); }
            50% { text-shadow: 2px -2px 0 var(--neon-pink), -2px 2px 0 var(--neon-blue); }
            75% { text-shadow: -2px -2px 0 var(--neon-pink), 2px 2px 0 var(--neon-blue); }
            100% { text-shadow: 2px 2px 0 var(--neon-pink), -2px -2px 0 var(--neon-blue); }
        }

        /* --- Layout specific styles --- */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            transition: opacity 0.3s ease-out;
            opacity: 0;
            pointer-events: none;
        }
        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .action-buttons-container, .search-container {
            display: none;
            position: absolute;
            right: 140px; 
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease-out;
        }

        .search-container {
            right: 210px;
            width: 200px;
        }

        .action-buttons-container.active, .search-container.active {
            display: flex;
        }

        /* --- Table and Card Styles --- */
        #studentsTable {
            border-collapse: collapse;
            text-align: left;
            width: 100%;
        }

        #studentsTable thead tr {
            background-color: rgba(0, 240, 255, 0.1);
            border-bottom: 2px solid var(--neon-blue);
        }
        
        #studentsTable th {
            padding: 1rem;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }

        #studentsTable tbody tr {
            border-bottom: 1px solid rgba(0, 240, 255, 0.3);
            transition: all 0.2s ease-in-out;
        }

        #studentsTable tbody tr:hover {
            background-color: rgba(0, 240, 255, 0.05);
            box-shadow: inset 0 0 10px rgba(0, 240, 255, 0.5);
        }

        #studentsTable td {
            padding: 1rem;
        }

        .student-card {
            background-color: rgba(0, 240, 255, 0.05);
            border: 1px solid var(--neon-blue);
            box-shadow: 0 0 10px var(--neon-blue);
            transition: all 0.3s ease;
        }

        .student-card:hover {
            box-shadow: 0 0 20px var(--neon-pink);
            transform: translateY(-5px);
        }

        .card-header-icon {
            text-shadow: 0 0 5px var(--neon-blue);
        }
    </style>
</head>
<body class="text-white">

    <div class="max-w-7xl w-full mx-auto cyber-container shadow-xl">
        <div class="flex justify-between items-center mb-6 pb-2 border-b border-gray-700">
            <div class="flex items-center space-x-4">
                <button id="layoutToggleButton" class="neon-button w-12 h-12 rounded-lg shadow-lg flex items-center justify-center text-2xl">
                    <i class="fas fa-th-large"></i>
                </button>
                <h1 class="text-4xl font-extrabold neon-title">STUDENT DATABASE 📋</h1>
            </div>
            
            <div class="flex space-x-2 items-center relative">
                <div id="searchContainer" class="search-container">
                    <input type="text" id="searchInput" placeholder="Search protocol..." class="neon-input w-full rounded-full px-4 py-2 text-sm">
                </div>
                <button id="searchToggleButton" class="neon-button w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-2xl">
                    <i class="fas fa-search"></i>
                </button>

                <div id="actionButtons" class="action-buttons-container space-x-2">
                    <button onclick="openModal()" class="neon-button w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-xl">
                        <i class="fas fa-user-plus"></i>
                    </button>
                    <a href="/students/delete_all"
                        onclick="return confirm('WARNING: All data will be purged. Proceed?')"
                        class="neon-button-danger w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-xl">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
                <button id="actionToggleButton" class="neon-button w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <div id="toast-container"></div>

        <div id="studentListView" class="w-full">
            <div id="tableView" class="overflow-x-auto mt-6">
                <table class="w-full" id="studentsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($students)): ?>
                            <?php foreach ($students as $student): ?>
                                <tr data-id="<?= $student['id'] ?>">
                                    <td><?= $student['id'] ?></td>
                                    <td><?= $student['last_name'] ?></td>
                                    <td><?= $student['first_name'] ?></td>
                                    <td><?= $student['email'] ?></td>
                                    <td class="text-center space-x-2 flex justify-center items-center">
                                        <button onclick='openModal(<?= json_encode($student) ?>)'
                                            class="neon-button w-10 h-10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="/students/delete/<?= $student['id'] ?>"
                                            onclick="return confirm('CONFIRM: Delete this record?')"
                                            class="neon-button-danger w-10 h-10 rounded-full flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-6 italic text-gray-500">
                                    <i class="fas fa-exclamation-triangle mr-2"></i> NO DATA PROTOCOLS FOUND.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="cardView" class="hidden mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" style="display: none;">
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $student): ?>
                        <div class="student-card p-6 rounded-lg shadow-lg" data-id="<?= $student['id'] ?>">
                            <div class="flex items-center space-x-4 mb-4">
                                <i class="fas fa-terminal text-4xl card-header-icon"></i>
                                <div>
                                    <p class="text-lg font-bold">ID: <span class="glitch-text"><?= $student['id'] ?></span></p>
                                    <p class="text-xl font-semibold"><?= $student['first_name'] ?> <?= $student['last_name'] ?></p>
                                </div>
                            </div>
                            <p class="text-white/80"><i class="fas fa-at mr-2"></i><?= $student['email'] ?></p>
                            <div class="flex justify-end items-center mt-4 space-x-2">
                                <button onclick='openModal(<?= json_encode($student) ?>)'
                                    class="neon-button w-10 h-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="/students/delete/<?= $student['id'] ?>"
                                    onclick="return confirm('CONFIRM: Delete this record?')"
                                    class="neon-button-danger w-10 h-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-6 italic text-gray-500 col-span-full">
                        <i class="fas fa-exclamation-triangle mr-2"></i> NO DATA PROTOCOLS FOUND.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="studentModal" class="modal-overlay fixed inset-0 z-50 flex justify-center items-center">
        <div class="cyber-container-modal w-full max-w-lg mx-auto p-8 shadow-xl rounded-lg">
            <div class="flex justify-between items-center pb-4 border-b-2 border-gray-700 mb-6">
                <h2 id="modalTitle" class="text-3xl font-extrabold neon-title">Dynamic Title</h2>
                <button onclick="closeModal()" class="neon-button-danger w-10 h-10 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="studentForm" action="/students/store" method="post" class="space-y-6">
                <input type="hidden" name="id" id="studentId">
                <div>
                    <label class="block font-semibold text-white/80 mb-1">Last Name</label>
                    <input type="text" name="last_name" id="lastName" placeholder="Enter last name" class="neon-input w-full rounded-md px-4 py-2">
                </div>
                <div>
                    <label class="block font-semibold text-white/80 mb-1">First Name</label>
                    <input type="text" name="first_name" id="firstName" placeholder="Enter first name" class="neon-input w-full rounded-md px-4 py-2">
                </div>
                <div>
                    <label class="block font-semibold text-white/80 mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address" class="neon-input w-full rounded-md px-4 py-2">
                </div>
                <div class="flex justify-end items-center pt-4 space-x-3">
                    <button type="button" onclick="closeModal()" class="neon-button-danger w-12 h-12 rounded-full flex items-center justify-center text-xl">
                        <i class="fas fa-times-circle"></i>
                    </button>
                    <button type="submit" class="neon-button w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-xl">
                        <i class="fas fa-check-circle"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('studentModal');
        const modalTitle = document.getElementById('modalTitle');
        const studentForm = document.getElementById('studentForm');
        const studentId = document.getElementById('studentId');
        const lastName = document.getElementById('lastName');
        const firstName = document.getElementById('firstName');
        const email = document.getElementById('email');
        const toastContainer = document.getElementById('toast-container');
        const actionToggleButton = document.getElementById('actionToggleButton');
        const actionButtons = document.getElementById('actionButtons');
        const searchToggleButton = document.getElementById('searchToggleButton');
        const searchContainer = document.getElementById('searchContainer');
        const searchInput = document.getElementById('searchInput');
        const tableView = document.getElementById('tableView');
        const cardView = document.getElementById('cardView');
        const layoutToggleButton = document.getElementById('layoutToggleButton');

        let isTableView = true;

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.textContent = message;
            toastContainer.appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        function openModal(student = null) {
            modal.classList.add('active');
            if (student) {
                modalTitle.innerText = 'Edit Data Protocol';
                studentId.value = student.id;
                lastName.value = student.last_name;
                firstName.value = student.first_name;
                email.value = student.email;
            } else {
                modalTitle.innerText = 'Add New Protocol';
                studentId.value = '';
                studentForm.reset();
            }
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        studentForm.addEventListener('submit', async function(event) {
            event.preventDefault(); 
            
            closeModal();
            showToast('Saving...');

            const formData = new FormData(studentForm);
            const id = studentId.value;
            const url = id ? `/students/update/${id}` : '/students/store';

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    window.location.reload(); 
                } else {
                    showToast('Error saving data protocol.');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('System Error: connection failed.');
            }
        });
        
        function filterStudents() {
            const query = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#studentsTable tbody tr');
            const cards = document.querySelectorAll('#cardView .student-card');

            let noTableResults = true;
            tableRows.forEach(row => {
                const textContent = row.textContent.toLowerCase();
                const isNoDataRow = row.querySelector('td[colspan="5"]');
                if (isNoDataRow) {
                    isNoDataRow.style.display = 'none';
                    return;
                }

                if (textContent.includes(query)) {
                    row.style.display = '';
                    noTableResults = false;
                } else {
                    row.style.display = 'none';
                }
            });

            const tableNoResultsRow = document.querySelector('#studentsTable tbody tr td[colspan="5"]');
            if (tableNoResultsRow) {
                tableNoResultsRow.parentElement.style.display = noTableResults ? '' : 'none';
            }

            let noCardResults = true;
            cards.forEach(card => {
                const textContent = card.textContent.toLowerCase();
                if (textContent.includes(query)) {
                    card.style.display = 'block';
                    noCardResults = false;
                } else {
                    card.style.display = 'none';
                }
            });
            
            const cardNoResultsDiv = document.querySelector('#cardView .text-center');
            if (cardNoResultsDiv) {
                cardNoResultsDiv.style.display = noCardResults ? 'block' : 'none';
            }
        }
        
        searchInput.addEventListener('input', filterStudents);

        function toggleView() {
            isTableView = !isTableView;
            if (isTableView) {
                tableView.style.display = 'block';
                cardView.style.display = 'none';
                layoutToggleButton.innerHTML = '<i class="fas fa-th-large"></i>';
            } else {
                tableView.style.display = 'none';
                cardView.style.display = 'grid';
                layoutToggleButton.innerHTML = '<i class="fas fa-list"></i>';
            }
            filterStudents();
        }
        
        layoutToggleButton.addEventListener('click', toggleView);

        actionToggleButton.addEventListener('click', () => {
            actionButtons.classList.toggle('active');
            searchContainer.classList.remove('active');
        });
        
        searchToggleButton.addEventListener('click', () => {
            searchContainer.classList.toggle('active');
            actionButtons.classList.remove('active');
            if (searchContainer.classList.contains('active')) {
                searchInput.focus();
            }
        });

        window.addEventListener('click', (event) => {
            if (!actionToggleButton.contains(event.target) && !actionButtons.contains(event.target)) {
                actionButtons.classList.remove('active');
            }
            if (!searchToggleButton.contains(event.target) && !searchContainer.contains(event.target)) {
                searchContainer.classList.remove('active');
            }
        });
        
        window.onclick = function(event) {
            if (event.target == modal && modal.classList.contains('active')) {
                closeModal();
            }
        }
    </script>
</body>
</html>