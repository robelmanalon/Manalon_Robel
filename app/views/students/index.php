<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neural-Link Student Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a0a1a;
            --primary: #52e690;
            --secondary: #e652a0;
            --text-light: #f0f0f5;
        }

        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: var(--bg-dark);
            color: var(--text-light);
            overflow-x: hidden;
            transition: background-color 0.5s ease;
        }

        /* Neural Background Effect */
        .neural-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background-image: radial-gradient(circle, var(--primary) 1px, transparent 1px),
                              radial-gradient(circle, var(--primary) 1px, transparent 1px);
            background-size: 50px 50px, 50px 50px;
            background-position: 0 0, 25px 25px;
            animation: move-bg 60s linear infinite;
            transition: background-image 0.5s ease;
        }

        @keyframes move-bg {
            from { background-position: 0 0, 25px 25px; }
            to { background-position: -500px -500px, -525px -525px; }
        }

        /* Main Container */
        .main-container {
            position: relative;
            z-index: 10;
            transition: filter 0.5s ease-in-out;
        }
        
        .main-container.blurred {
            filter: blur(8px);
        }

        /* Student Card Styles */
        .student-card {
            background-color: rgba(20, 20, 40, 0.8);
            border: 2px solid var(--primary);
            border-radius: 1rem;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease, border 0.5s, box-shadow 0.5s;
            box-shadow: 0 0 15px rgba(82, 230, 144, 0.5);
            animation: pulse-card 5s infinite ease-in-out;
        }

        .student-card:hover {
            transform: scale(1.03) rotate(-1deg);
            box-shadow: 0 0 30px var(--primary);
        }

        @keyframes pulse-card {
            0%, 100% { box-shadow: 0 0 15px rgba(82, 230, 144, 0.5); }
            50% { box-shadow: 0 0 30px rgba(82, 230, 144, 0.8); }
        }

        /* Functional Icons */
        .icon-btn {
            background-color: var(--secondary);
            color: var(--text-light);
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(230, 82, 160, 0.5);
        }

        .icon-btn:hover {
            transform: scale(1.2) rotate(10deg);
            box-shadow: 0 0 20px var(--secondary);
        }

        .icon-btn.delete:hover {
            background-color: #ff3333;
            box-shadow: 0 0 20px #ff3333;
        }
        
        .icon-btn.add:hover {
            background-color: var(--primary);
            box-shadow: 0 0 20px var(--primary);
        }

        /* Modal & Form */
        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
            z-index: 50;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .form-container {
            background-color: rgba(20, 20, 40, 0.95);
            border: 2px solid var(--secondary);
            border-radius: 1rem;
            box-shadow: 0 0 20px var(--secondary);
            padding: 2rem;
            transform: scale(0.8);
            transition: transform 0.5s ease-in-out;
        }

        .modal.active .form-container {
            transform: scale(1);
        }

        .input-field {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--primary);
            color: var(--text-light);
            transition: all 0.3s;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--secondary);
        }

        .btn-main {
            background-color: var(--primary);
            color: var(--bg-dark);
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-main:hover {
            background-color: var(--secondary);
            box-shadow: 0 0 15px var(--secondary);
        }

        /* Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: rgba(20, 20, 40, 0.9);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 10;
            border: 1px solid var(--primary);
        }
        .dropdown-content a {
            color: var(--text-light);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }
        .dropdown-content a:hover {
            background-color: var(--primary);
            color: var(--bg-dark);
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body class="p-8">

    <div id="bgEffect" class="neural-background"></div>

    <div id="mainContainer" class="main-container">
        <header class="flex flex-col md:flex-row justify-between items-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold font-['Orbitron'] mb-4 md:mb-0">NEURAL-LINK STUDENT HUB</h1>
            <div class="flex items-center space-x-4">
                <input type="text" id="searchInput" placeholder="Search students..." class="input-field px-4 py-2 rounded-full text-sm md:w-64">
                <div class="dropdown">
                    <button class="icon-btn">
                        <i class="fas fa-palette"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#" onclick="setTheme('neural')">Neural</a>
                        <a href="#" onclick="setTheme('solar')">Solar</a>
                        <a href="#" onclick="setTheme('oceanic')">Oceanic</a>
                        <a href="#" onclick="setTheme('crimson')">Crimson</a>
                        <a href="#" onclick="setTheme('forest')">Forest</a>
                    </div>
                </div>
                <button id="addBtn" onclick="toggleAddModal()" class="icon-btn add">
                    <i class="fas fa-plus"></i>
                </button>
                <a href="/students/delete_all" onclick="return confirm('WARNING: Are you sure you want to purge all data? This cannot be undone.')" class="icon-btn delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </header>

        <div id="student-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php foreach ($students as $student): ?>
                <div class="student-card p-6 flex flex-col justify-between" data-id="<?= $student['id'] ?>" data-search="<?= strtolower(htmlspecialchars($student['last_name'] . ' ' . $student['first_name'] . ' ' . $student['email'])) ?>">
                    <div>
                        <h3 class="text-xl font-bold text-secondary mb-2">ID: <?= htmlspecialchars($student['id']) ?></h3>
                        <p class="mb-1"><span class="text-primary font-bold">Last Name:</span> <?= htmlspecialchars($student['last_name']) ?></p>
                        <p class="mb-1"><span class="text-primary font-bold">First Name:</span> <?= htmlspecialchars($student['first_name']) ?></p>
                        <p class="mb-4"><span class="text-primary font-bold">Email:</span> <?= htmlspecialchars($student['email']) ?></p>
                    </div>
                    <div class="flex justify-end space-x-3 mt-4">
                        <button onclick="editData(<?= htmlspecialchars(json_encode($student)) ?>)" class="icon-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="/students/delete/<?= $student['id'] ?>" onclick="return confirm('Confirm deletion of this student?')" class="icon-btn delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="addModal" class="modal">
        <div class="form-container w-full max-w-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 id="modal-title" class="text-3xl font-bold text-secondary font-['Orbitron']">ADD NEW STUDENT</h2>
                <button onclick="toggleAddModal()" class="text-xl text-red-500 hover:text-red-300">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            <form id="student-form" action="/students/store" method="post" class="space-y-4">
                <input type="hidden" name="id" id="student-id">
                <div>
                    <label class="block mb-1">Last Name</label>
                    <input type="text" name="last_name" id="last-name" class="input-field w-full p-2" required>
                </div>
                <div>
                    <label class="block mb-1">First Name</label>
                    <input type="text" name="first_name" id="first-name" class="input-field w-full p-2" required>
                </div>
                <div>
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" id="email" class="input-field w-full p-2" required>
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="btn-main py-2 px-6 rounded-lg">SAVE STUDENT</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const addModal = document.getElementById('addModal');
        const mainContainer = document.getElementById('mainContainer');
        const studentForm = document.getElementById('student-form');
        const modalTitle = document.getElementById('modal-title');
        const studentId = document.getElementById('student-id');
        const lastName = document.getElementById('last-name');
        const firstName = document.getElementById('first-name');
        const email = document.getElementById('email');
        const searchInput = document.getElementById('searchInput');
        const studentCards = document.querySelectorAll('.student-card');
        const root = document.documentElement;
        const bgEffect = document.getElementById('bgEffect');

        // Theme Definitions
        const themes = {
            neural: { bg: '#0a0a1a', primary: '#52e690', secondary: '#e652a0' },
            solar: { bg: '#1a0a0a', primary: '#ffc400', secondary: '#ff3333' },
            oceanic: { bg: '#0a1a1a', primary: '#00ccff', secondary: '#33ff99' },
            crimson: { bg: '#1a0a0a', primary: '#ff3333', secondary: '#ff0077' },
            forest: { bg: '#0a1a0a', primary: '#66ff66', secondary: '#00cc00' }
        };

        function toggleAddModal() {
            if (addModal.classList.contains('active')) {
                addModal.classList.remove('active');
                mainContainer.classList.remove('blurred');
            } else {
                modalTitle.innerText = 'ADD NEW STUDENT';
                studentForm.action = '/students/store';
                studentForm.reset();
                studentId.value = '';
                
                addModal.classList.add('active');
                mainContainer.classList.add('blurred');
            }
        }

        function editData(student) {
            modalTitle.innerText = 'UPDATE STUDENT';
            studentForm.action = `/students/update/${student.id}`;
            studentId.value = student.id;
            lastName.value = student.last_name;
            firstName.value = student.first_name;
            email.value = student.email;
            
            addModal.classList.add('active');
            mainContainer.classList.add('blurred');
        }

        addModal.addEventListener('click', (e) => {
            if (e.target === addModal) {
                toggleAddModal();
            }
        });

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            studentCards.forEach(card => {
                const searchContent = card.getAttribute('data-search');
                if (searchContent.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        function setTheme(themeName) {
            const theme = themes[themeName];
            root.style.setProperty('--bg-dark', theme.bg);
            root.style.setProperty('--primary', theme.primary);
            root.style.setProperty('--secondary', theme.secondary);

            const allCards = document.querySelectorAll('.student-card');
            const allIcons = document.querySelectorAll('.icon-btn');
            const modalForm = document.querySelector('.form-container');

            allCards.forEach(card => {
                card.style.borderColor = theme.primary;
                card.style.boxShadow = `0 0 15px ${theme.primary}50`;
            });

            allIcons.forEach(icon => {
                icon.style.backgroundColor = theme.secondary;
                icon.style.boxShadow = `0 0 10px ${theme.secondary}50`;
            });
            
            modalTitle.style.color = theme.secondary;
            studentForm.querySelector('.btn-main').style.backgroundColor = theme.primary;
            modalForm.style.borderColor = theme.secondary;
            modalForm.style.boxShadow = `0 0 20px ${theme.secondary}`;
            
            bgEffect.style.backgroundImage = `radial-gradient(circle, ${theme.primary} 1px, transparent 1px), radial-gradient(circle, ${theme.primary} 1px, transparent 1px)`;
        }
        
        // Initial setup for the theme
        window.onload = () => {
            setTheme('neural');
        };
    </script>
</body>
</html>