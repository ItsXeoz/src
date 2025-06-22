import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");

    counters.forEach((counter) => {
        const updateCounter = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText || 0; // Mulai dari 0 jika kosong
            const increment = Math.ceil(target / 200); // Kecepatan animasi

            if (count < target) {
                counter.innerText = count + increment;
                setTimeout(updateCounter, 10); // Ulang setiap 10ms
            } else {
                counter.innerText = target; // Set angka akhir
            }
        };

        updateCounter();
    });

    console.log("Counter script berjalan!");

    // Float-in animation on scroll
    const floatInElements = document.querySelectorAll(".float-in");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                }
            });
        },
        { threshold: 0.1 }
    );

    floatInElements.forEach((element) => {
        observer.observe(element);
    });
});

const avatarButton = document.getElementById("avatarButton");
const avatarDropdown = document.getElementById("avatarDropdown");

avatarButton.addEventListener("click", (e) => {
    e.stopPropagation();
    avatarDropdown.classList.toggle("hidden");
});

document.addEventListener("click", () => {
    avatarDropdown.classList.add("hidden");
});

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const closeSidebar = document.getElementById('closeSidebar');

    // Function to show sidebar
    const showSidebar = () => {
        sidebar.classList.remove('-translate-x-full');
    };

    // Function to hide sidebar
    const hideSidebar = () => {
        sidebar.classList.add('-translate-x-full');
    };

    // Event listener for toggle button
    sidebarToggle.addEventListener('click', showSidebar);

    // Event listener for close button
    closeSidebar.addEventListener('click', hideSidebar);

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
            hideSidebar();
        }
    });
});

const toggleSidebar = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");

toggleSidebar.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});

// Close sidebar on outside click in mobile view
document.addEventListener("click", (e) => {
    if (
        !sidebar.contains(e.target) &&
        !toggleSidebar.contains(e.target) &&
        window.innerWidth < 640
    ) {
        sidebar.classList.add("-translate-x-full");
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const statusDropdown = document.getElementById('status');
    const additionalQuestions = document.getElementById('additional-questions');

    statusDropdown.addEventListener('change', () => {
        if (statusDropdown.value === 'bekerja') {
            additionalQuestions.classList.remove('hidden');
        } else {
            additionalQuestions.classList.add('hidden');
        }
    });
});