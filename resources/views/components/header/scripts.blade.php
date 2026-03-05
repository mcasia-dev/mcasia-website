<script>
    const modal = document.getElementById('myModal');

    function openModal() {
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });
    }
</script>

<script>
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.header-content');
        if (!header) return;

        if (window.scrollY > 120) {
            header.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
        }
    });
</script>

<script>
    function setMobileMenuState(open) {
        const menu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('mobileMenuIcon');
        if (!menu) return;

        if (menu._hideTimer) {
            clearTimeout(menu._hideTimer);
            menu._hideTimer = null;
        }

        if (open) {
            menu.classList.remove('hidden');
            requestAnimationFrame(() => {
                menu.classList.remove('opacity-0', '-translate-y-2');
                menu.classList.add('opacity-100', 'translate-y-0');
            });
        } else {
            menu.classList.remove('opacity-100', 'translate-y-0');
            menu.classList.add('opacity-0', '-translate-y-2');
            menu._hideTimer = setTimeout(() => {
                menu.classList.add('hidden');
            }, 300);
        }

        if (menuIcon) {
            menuIcon.classList.toggle('fa-bars', !open);
            menuIcon.classList.toggle('fa-xmark', open);
            menuIcon.classList.toggle('rotate-90', open);
        }
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (!menu) return;
        const isOpen = !menu.classList.contains('hidden') && menu.classList.contains('opacity-100');
        setMobileMenuState(!isOpen);
    }
</script>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById(id + 'Arrow');

        if (!dropdown) return;
        dropdown.classList.toggle('hidden');
        if (arrow) {
            arrow.classList.toggle('rotate-180');
        }
    }
</script>
