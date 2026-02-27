<script>
    const modal = document.getElementById('myModal');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });
</script>

<script>
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.header-content');

        if (window.scrollY > 120) {
            header.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
        }
    });
</script>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById(id + 'Arrow');
        dropdown.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>
